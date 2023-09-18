<?php

namespace App\Http\Controllers;

use App\Facades\UserRepositoryFacade;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('web.welcome');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(RegisterRequest $request)
    {
        $user = UserRepositoryFacade::createUser(
            $request->only(['name', 'email', 'password'])
        );

        if($user) {
            return redirect()->route('web.welcome');
        }
        return redirect()->intended();
    }
}
