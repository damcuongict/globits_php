<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Services\PersonService;
use App\Services\UserService;
use App\Services\CompanyService;

class PersonController extends Controller
{

    protected $personService;
    protected $userService;
    protected $companyService;

    public function __construct(PersonService $personService, UserService $userService ,CompanyService $companyService)
    {
        $this->personService = $personService;
        $this->userService = $userService;
        $this->companyService = $companyService;
    }
    public function index()
    {
        $persons = $this->personService->getAllPersonsWithUser();
        return view('persons.index', compact('persons'));
    }
    public function create()
{
    $users = $this->personService->getUnlinkedUsers();
    $companies = $this->companyService->getAllCompanies();
    return view('persons.create', compact('users','companies'));
}

    public function store(PersonRequest $request)
    {     
        $this->personService->create($request->all());
        return redirect()->route('persons.index');
    }

    public function edit($id)
    {
        $person = $this->personService->getPersonById($id);
        $user = $this->userService->getUserById($person->user_id);
        $companies = $this->companyService->getAllCompanies();
        return view('persons.edit', compact('person', 'user', 'companies'));
    }
    public function update(PersonRequest $request, $id)
    {

        $this->personService->update($id,$request->all());
        return redirect()->route('persons.index');
    }

    public function destroy($id)
    {
        // Xóa thông tin cá nhân
        $this->personService->delete($id);
        return redirect()->route('users.index');
    }
}
