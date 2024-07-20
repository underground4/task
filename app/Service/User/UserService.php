<?php

namespace App\Service\User;

use App\Exceptions\NotFoundException;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserService
{
    public function getAllUsers()
    {
        return User::query()->get();
    }

    public function getUserById($id)
    {
        $user = User::query()->where('id', $id)->first();

        if (empty($user)) {
            throw new NotFoundException("Пользователь не найден");
        }

        return $user;
    }

    public function getRoles()
    {
        return Role::all()->pluck('name');
    }

    public function getUsersByRoleId($roleId)
    {
        $role = Role::query()->where('id', $roleId)->first();

        if (empty($role)) {
            throw new NotFoundException("Роль не найдена");
        }

        return User::role($role->name)->get();
    }
}
