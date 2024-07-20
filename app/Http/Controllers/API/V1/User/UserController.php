<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\CoreController;
use App\Http\Resources\User\UserResource;
use App\Service\User\UserService;
use Illuminate\Support\Facades\Route;

class UserController extends CoreController
{
    protected static $routePrefix = 'user';

    public static function routers(): void
    {
        Route::group(
            [
                'prefix' => static::$routePrefix,
            ],
            function () {
                Route::get('getUsers', [self::class, 'getAllUsers']);
                Route::get('getUserById/{id}', [self::class, 'getUserById']);
                Route::get('getRoles', [self::class, 'getRoles']);
                Route::get('getUsersByRoles/{roleId}', [self::class, 'getUsersByRoles']);
            }
        );
    }

    public function getAllUsers()
    {
        $users = (new UserService())->getAllUsers();

        return $this->responseSuccess(UserResource::collection($users));
    }

    public function getUserById($id)
    {
        $user = (new UserService())->getUserById($id);

        return $this->responseSuccess(UserResource::make($user));
    }

    public function getRoles()
    {
        $roles = (new UserService())->getRoles();

        return $this->responseSuccess($roles);
    }

    public function getUsersByRoles($roleId)
    {
        $usersWithRole = (new UserService())->getUsersByRoles($roleId);

        return $this->responseSuccess(UserResource::collection($usersWithRole));
    }
}
