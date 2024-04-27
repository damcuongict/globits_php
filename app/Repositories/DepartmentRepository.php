<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Department;

class DepartmentRepository
{
    public function getAllDepartments()
    {
        return Department::all();
    }
    public function getAllDepartmentsByCompanyId($companyId)
    {
        return Department::where('company_id', $companyId)->get();
    }
    public function getAll()
    {
        return Company::all();
    }
    public function getDepartmentById($departmentId)
    {
        return Department::find($departmentId);
    }

    public function createDepartment($data)
    {
        return Department::create($data);
    }

    public function updateDepartment($departmentId, $data)
    {
        $department = Department::find($departmentId);
        $department->update($data);
        return $department;
    }

    public function deleteDepartment($departmentId)
    {
        return Department::destroy($departmentId);
    }
}
