<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }

    public function updateUser($id, array $data)
    {
        $user = $this->getUserById($id);
        if ($user) {
            return $this->userRepository->update($user, $data);
        }
        return false;
    }

    public function deleteUser($id)
    {
        $user = $this->getUserById($id);
        if ($user) {
            return $this->userRepository->delete($user);
        }
        return false;
    }
}
