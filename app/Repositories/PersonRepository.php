<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository
{
    public function all()
    {
        return Person::all();
    }
    public function getAllPersonsWithUser()
    {
        return Person::with('user')->get();
    }
    public function find($id)
    {
        return Person::find($id);
    }

    public function create(array $data)
    {
        return Person::create($data);
    }

    public function update($id, array $data)
    {
        $person = $this->find($id);
        if ($person) {
            return $person->update($data);
        }
        return false;
    }

    public function delete($id)
    {
        $person = $this->find($id);
        if ($person) {
            return $person->delete();
        }
        return false;
    }
}
