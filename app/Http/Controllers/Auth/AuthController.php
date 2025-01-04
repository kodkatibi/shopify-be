<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\Auth\LoginException;
use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->authService->register($data);

        return ApiResponse::success(UserResource::make($user));
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws LoginException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->authService->login($data);

        return ApiResponse::success(UserResource::make($user));
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return ApiResponse::success([], 'Successfully logged out');
    }
}
