<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAllPeople()
    {
        return $this->personRepository->all();
    }

    public function createPerson(array $data)
    {
        return $this->personRepository->create($data);
    }

    public function getPersonById($id)
    {
        return $this->personRepository->find($id);
    }

    public function updatePerson($id, array $data)
    {
        $person = $this->getPersonById($id);
        if ($person) {
            return $this->personRepository->update($person, $data);
        }
        return false;
    }

    public function deletePerson($id)
    {
        $person = $this->getPersonById($id);
        if ($person) {
            return $this->personRepository->delete($person);
        }
        return false;
    }
}
