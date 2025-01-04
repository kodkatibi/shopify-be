<?php

namespace App\Exceptions\Auth;

use App\Http\Controllers\ApiResponse;
use Exception;

class LoginException extends Exception
{
    protected $message = 'Invalid credentials';
    protected $code = 401;

    public function __construct($message = null, $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }

    public function render($request)
    {
        return ApiResponse::error($this->message, $this->code, $this->getMessage());
    }
}
