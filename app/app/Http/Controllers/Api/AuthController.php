<?php

namespace App\Http\Controllers\Api;

use App\Facades\UserRepositoryFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = Auth::user();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
    }

    public function register(RegisterRequest $request)
    {
        $user = UserRepositoryFacade::createUser(
            $request->only(['name', 'email', 'password'])
        );

        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'User Registered In Successfully',
            ], 201);
        }
        // return bad response
    }

    public function logout() {
        request()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
