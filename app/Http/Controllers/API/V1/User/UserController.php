<?php

namespace App\Http\Controllers\API\V1\User;

use App\Http\Controllers\CoreController;
use App\Service\User\UserService;
use Illuminate\Support\Facades\Route;

class UserController extends CoreController
{
    protected static $routePrefix = 'user';
    protected static $itemService = UserService::class;

    public static function routers(): void
    {
        Route::group(
            [
                'prefix' => static::$routePrefix,
            ],
            function () {
                Route::get('getUsers', [self::class, 'getAllUsersWithRoles']);
            }
        );
    }

    public function getAllUsersWithRoles()
    {
        return $this->responseSuccess(1);
    }
}
