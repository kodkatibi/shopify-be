<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\LoginException;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseService
{

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * Register a new user
     *
     * @param array $data
     * @return User
     */
    public function register(array $data): User
    {
        return $this->create($data);
    }

    /**
     * Login a user
     *
     * @param array $data
     * @return Authenticatable|null
     * @throws LoginException
     */
    public function login(array $data): Authenticatable|null
    {
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $user->token = $user->createToken('api_token')->plainTextToken;
            return $user;
        }
       throw new LoginException('Invalid credentials', 401);
    }
}
