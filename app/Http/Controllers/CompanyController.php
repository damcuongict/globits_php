<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $companies = $this->companyService->getAllCompanies();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
       
        $this->companyService->createCompany($request->all());
        return redirect()->route('companies.index')->with('success', 'Thông tin công ty đã được thêm thành công.');;
    }

    public function edit($id)
    {
        $company = $this->companyService->getCompanyById($id);
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
       
        $this->companyService->updateCompany($id, $request->all());
        return redirect()->route('companies.index')->with('success', 'Thông tin công ty đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $this->companyService->deleteCompany($id);
        return redirect()->route('companies.index')->with('success', 'Công ty đã được xóa thành công.');
    }
}
