<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);
    Route::post('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/update', [AuthController::class, 'update']);
    Route::post('/auth/change-password', [AuthController::class, 'changePassword']);
    Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/auth/mfa-send-otp', [AuthController::class, 'mfaSendOtp']);
    Route::post('/auth/mfa-verify', [AuthController::class, 'mfaVerify']);
});
