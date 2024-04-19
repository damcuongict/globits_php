<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;
use App\Services\CountryService;

class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        $countries = $this->countryService->all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryRequest  $request)
    {
        $this->countryService->create($request->all());
        return redirect()->route('countries.index');
    }

    public function edit($id)
    {
        $country = $this->countryService->find($id);
        return view('countries.edit', compact('country'));
    }

    public function update(CountryRequest  $request, $id)
    {
        $this->countryService->update($id, $request->all());
        return redirect()->route('countries.index');
    }

    public function destroy($id)
    {
        $this->countryService->delete($id);
        return redirect()->route('countries.index');
    }
}
