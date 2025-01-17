<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleProfile = Socialite::driver('google')->user();

        $user = User::where('google_id', $googleProfile->id)->first();

        if (! $user) {
            $user = User::where('email', $googleProfile->email)->first();

            if ($user) {
                $user->update(['google_id' => $googleProfile->id, 'image' => $googleProfile->avatar]);
                Auth::login($user);
            } else {
                $user = User::create([
                    'name'      => $googleProfile->name,
                    'email'     => $googleProfile->email,
                    'google_id' => $googleProfile->id,
                    'image'     => $googleProfile->avatar,
                ]);
            }
        }
        Auth::login($user);
        return redirect('/');
    }
}
