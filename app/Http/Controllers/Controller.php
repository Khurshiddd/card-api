<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function response($data, $info = null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'info' => $info ?? null
        ]);
    }
    public function success($message = null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message ?? 'operation successfully'
        ]);
    }
    public function error(string $message): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message ?? 'error occured'
        ]);
    }
}
