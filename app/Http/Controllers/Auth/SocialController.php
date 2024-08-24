<?php
// app/Http/Controllers/Auth/SocialController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;


class SocialController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Unable to login, try again']);
        }

        // Find or create the user
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'first_name' => $socialUser->user['given_name'] ?? $socialUser->getName(),
                'last_name' => $socialUser->user['family_name'] ?? '',
                'mobile_number' => $socialUser->user['phone_number'] ?? 'N/A',
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'password' => bcrypt(Str::random(16)),
                'provider' => 'google',
            ]
        );

        // Log the user in
        Auth::login($user, true);

        // Redirect to the intended URL or default to the dashboard
        return redirect()->intended('home');
    }
}
