<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function all()
    {
        return User::all();
    }
    public function getAllRoles()
    {
        return Role::all();
    }
    public function find($id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        if (isset($data['roles'])) {
            $user->roles()->attach($data['roles']);
        } 
        return $user;
    }
    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        if (isset($data['roles'])) {
            $user->roles()->sync($data['roles']);
        } else {
            $user->roles()->detach();
        }
        return $user;
    }
    

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}
