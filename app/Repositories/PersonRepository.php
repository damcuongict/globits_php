<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository
{
    public function all()
    {
        return Person::all();
    }

    public function create(array $data)
    {
        return Person::create($data);
    }

    public function find($id)
    {
        return Person::find($id);
    }

    public function update(Person $person, array $data)
    {
        return $person->update($data);
    }

    public function delete(Person $person)
    {
        return $person->delete();
    }
}
