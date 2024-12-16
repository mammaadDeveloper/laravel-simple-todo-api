<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());

        return response()->json([
            'success' => true,
            'status' => 201,
            'message'=> 'User registered successfully!',
        ]);
    }
    public function login(Request $request){}
    public function logout(){}
}
