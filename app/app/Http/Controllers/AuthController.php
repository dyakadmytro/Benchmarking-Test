<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
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
        list($name, $email, $password) = array_values($request->only(['name', 'email', 'password']));
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        if($user) {
            return redirect()->route('web.welcome');
        }
        return redirect()->intended();
    }
}
