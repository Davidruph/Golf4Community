<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Find or create user
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'username' => Str::slug($socialUser->getName() ?? $socialUser->getNickname(), '_'),
                    'password' => Hash::make(Str::random(12)),
                ]
            );

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Logged in successfully with ' . ucfirst($provider));
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Login with ' . ucfirst($provider) . ' failed.');
        }
    }
}
