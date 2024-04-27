<?php

namespace App\Http\Controllers;
use App\Services\DepartmentService;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    protected $companyService;
    protected $departmentService;
    public function __construct(CompanyService $companyService,DepartmentService $departmentService)
    {
        $this->companyService = $companyService;
        $this->departmentService = $departmentService;
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
        $departments = $this->departmentService->getAllDepartmentsByCompanyId($id);
        $company = $this->companyService->getCompanyById($id);
        return view('companies.edit', compact('company', 'departments'));
    }
    public function update(CompanyRequest $request, $id)
    {
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'department_') === 0) {
                $departmentId = substr($key, strlen('department_'));
                $this->departmentService->updateDepartment($departmentId, ['name' => $value]);
            }
        }
        $this->companyService->updateCompany($id, $request->except('nameDepartment'));
        return redirect()->route('companies.index')->with('success', 'Thông tin công ty và phòng ban đã được cập nhật thành công.');
    }
    public function destroy($id)
    {
        $this->companyService->deleteCompany($id);
        return redirect()->route('companies.index')->with('success', 'Công ty đã được xóa thành công.');
    }
}
