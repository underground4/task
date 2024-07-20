<?php

namespace App\Http\Controllers\API\V1\User;

use App\Enum\User\PermissionEnum;
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
                Route::get('getUsers', [self::class, 'getAllUsers'])
                    ->middleware(['can:'.PermissionEnum::ANY_USER_MANAGE]);

                Route::get('getUserById/{id}', [self::class, 'getUserById'])
                    ->middleware(['can:'.PermissionEnum::ANY_USER_MANAGE]);

                Route::get('getRoles', [self::class, 'getRoles'])
                    ->middleware(['can:'.PermissionEnum::ANY_USER_MANAGE]);

                Route::get('getUsersByRoles/{roleId}', [self::class, 'getUsersByRoles'])
                    ->middleware(['can:'.PermissionEnum::ANY_USER_MANAGE]);
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
