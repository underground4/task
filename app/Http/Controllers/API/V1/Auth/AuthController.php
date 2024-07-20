<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\CoreController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AuthController extends CoreController
{
    protected static $routePrefix = 'auth';

    public static function routers()
    {
        Route::group(
            [
                'middleware' => 'api',
                'prefix' => static::$routePrefix = 'auth'
            ],
            function () {
                Route::post('login', [self::class, 'login']);
            });
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
