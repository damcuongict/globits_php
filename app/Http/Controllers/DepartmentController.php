<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = $this->departmentService->getAllDepartments();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        $companies = $this->departmentService->getAllCompanies();
        $departments = $this->departmentService->getAllDepartments();
        return view('departments.create', compact('companies', 'departments'));
    }

    public function store(DepartmentRequest $request)
    {
        $validatedData = $request->validated();
        $this->departmentService->createDepartment($validatedData);
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function show(string $id)
    {
        $department = $this->departmentService->getDepartmentById($id);
        return view('departments.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = $this->departmentService->getDepartmentById($id);
        return view('departments.edit', compact('department'));
    }

    public function update(DepartmentRequest $request, string $id)
    {
        $validatedData = $request->validated();
        if ($request->has('child_departments')) {
            foreach ($request->child_departments as $childId => $childData) {
                $this->departmentService->updateDepartment($childId, $childData);
            }
        }
        $this->departmentService->updateDepartment($id, $validatedData);
        
        return redirect()->route('departments.index');
    }
    

    public function destroy(string $id)
    {
        $this->departmentService->deleteDepartment($id);
        return redirect()->route('departments.index');
    }
}
