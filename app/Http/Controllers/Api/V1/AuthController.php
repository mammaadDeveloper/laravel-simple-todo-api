<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\CreateUserAction;
use App\Actions\CreateUserTokenAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, CreateUserAction $createUserAction)
    {
        $user = $createUserAction->run($request->validated());

        if (! $user)
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Shomething wrong!',
            ], 500);

        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'User registered successfully!',
        ]);
    }
    public function login(LoginRequest $request, CreateUserTokenAction $createTokenAction)
    {
        $result = $createTokenAction->run($request->validated());

        if (! $result)
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => '',
            ], 500);

        return response()->json([
            'success'=> true,
            'status'=> 200,
            'messsage' => 'User logged in successfully!',
            'data' => [
                'token'=> $result,
                'user'
            ]
            ]);
    }
    public function logout() {}
}
