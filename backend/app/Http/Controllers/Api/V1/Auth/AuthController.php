<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;

class AuthController extends Controller
{
    public function __construct(private readonly UserService $service)
    {
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $token = $this->service->login(new Fluent($request->validated()));
            return response()->json([
                'token' => $token
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception->getCode());
        }
    }
}
