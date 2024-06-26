<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->userService->getAllRoles();
        return view('users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
      

        $this->userService->createUser($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = $this->userService->getAllRoles();
        return view('users.edit', compact('user','roles'));
    }

    public function update(UserRequest $request, $id)
    {
        $this->userService->updateUser($id, $request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
