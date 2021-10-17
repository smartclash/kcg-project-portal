<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function googleRedirect()
    {
        return \Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = \Socialite::driver('google')->user();

        $user = User::whereEmail($user->getEmail())->firstOrCreate([
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ]);

        \Auth::login($user, true);
        return $user;
    }
}
