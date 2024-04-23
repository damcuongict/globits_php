<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Services\PersonService;
use App\Services\UserService;

class PersonController extends Controller
{

    protected $personService;
    protected $userService;

    public function __construct(PersonService $personService, UserService $userService)
    {
        $this->personService = $personService;
        $this->userService = $userService;
    }
    public function index()
    {
        $persons = $this->personService->getAllPersonsWithUser();
        return view('persons.index', compact('persons'));
    }
    public function create()
{
    $users = $this->userService->getAllUsers();
    return view('persons.create', compact('users'));
}

    public function store(PersonRequest $request)
    {     
        $this->personService->create($request->all());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa thông tin cá nhân
        $person = $this->personService->getPersonById($id);
        return view('persons.edit', compact('person'));
    }

    public function update(PersonRequest $request, $id)
    {

        $this->personService->update($id,$request->all());

        // Redirect về trang danh sách người dùng hoặc trang chính
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        // Xóa thông tin cá nhân
        $this->personService->delete($id);

        // Redirect về trang danh sách người dùng hoặc trang chính
        return redirect()->route('users.index');
    }
}
