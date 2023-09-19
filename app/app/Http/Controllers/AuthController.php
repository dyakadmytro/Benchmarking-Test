<?php

namespace App\Http\Controllers;

use App\Facades\UserRepositoryFacade;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->get('remember', false);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('web.home');
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

        if ($user) {
            $user->sendEmailVerificationNotification();
            return redirect()->route('web.home');
        }
        return redirect()->intended();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->scopes(['openid', 'profile', 'email'])->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            Log::error('Google callback error', [$e->getMessage()]);
            Log::error('Google callback error request', request()->toArray());
        }

        $haveUser = User::where('google_id', $user->id)->first();

        if ($haveUser) {
            Auth::login($haveUser);
        } else {
            $newUser = UserRepositoryFacade::createUser([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => encrypt(Str::password(8))
            ]);
            Auth::login($newUser);
        }

        return redirect()->route('web.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('web.welcome');
    }
}
