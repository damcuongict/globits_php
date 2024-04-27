<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;
use App\Repositories\CompanyRepository;

class DepartmentService
{
    protected $departmentRepo;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepo = $departmentRepo;
    }
    public function getAllCompanies()
    {
        return $this->departmentRepo->getAll();
    }
    public function getAllDepartments()
    {
        return $this->departmentRepo->getAllDepartments();
    }
    public function getAllDepartmentsByCompanyId($companyId)
    {
        return $this->departmentRepo->getAllDepartmentsByCompanyId($companyId);
    }
    public function getDepartmentById($departmentId)
    {
        return $this->departmentRepo->getDepartmentById($departmentId);
    }

    public function createDepartment($data)
    {
        return $this->departmentRepo->createDepartment($data);
    }

    public function updateDepartment($departmentId, $data)
    {
        return $this->departmentRepo->updateDepartment($departmentId, $data);
    }

    public function deleteDepartment($departmentId)
    {
        return $this->departmentRepo->deleteDepartment($departmentId);
    }
}
