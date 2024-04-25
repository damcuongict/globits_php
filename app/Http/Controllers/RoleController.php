<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->createRole($request->validated());
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = $this->roleService->getRoleById($id);
        return view('roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->roleService->updateRole($id, $request->validated());
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $this->roleService->deleteRole($id);
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
