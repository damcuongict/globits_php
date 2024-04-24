<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function getAll()
    {
        return Company::all();
    }

    public function getById($id)
    {
        return Company::findOrFail($id);
    }

    public function create($data)
    {
        return Company::create($data);
    }

    public function update($id, $data)
    {
        $company = $this->getById($id);
        $company->update($data);
        return $company;
    }

    public function delete($id)
    {
        $company = $this->getById($id);
        $company->delete();
    }
}
