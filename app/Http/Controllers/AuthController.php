<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function googleRedirect()
    {
        return \Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = \Socialite::driver('google')->user();

        return [
            'id' => $user->getId(),
            'nickname' => $user->getNickname(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),
        ];
    }
}
