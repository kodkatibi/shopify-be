<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * @param null $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public static function success($data = null, string $message = 'Success', int $status = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * @param string $message
     * @param int $status
     * @param null $errors
     * @return JsonResponse
     */
    public static function error(string $message = 'An error occurred', int $status = 400, $errors = null): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}
