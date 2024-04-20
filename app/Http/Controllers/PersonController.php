<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Services\PersonService;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function index()
    {
        $people = $this->personService->getAllPeople();
        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(PersonRequest $request)
    {
        $data = $request->validated();
        $this->personService->createPerson($data);
        return redirect()->route('people.index')->with('success', 'Người dùng được tạo thành công.');
    }

    public function edit($id)
    {
        $person = $this->personService->getPersonById($id);
        return view('people.edit', compact('person'));
    }

    public function update(PersonRequest $request, $id)
    {
        $data = $request->validated();
        $this->personService->updatePerson($id, $data);
        return redirect()->route('people.index')->with('success', 'Người dùng được tạo thành công.');
    }

    public function destroy($id)
    {
        $this->personService->deletePerson($id);
        return redirect()->route('people.index')->with('success', 'Person deleted successfully.');
    }
}
