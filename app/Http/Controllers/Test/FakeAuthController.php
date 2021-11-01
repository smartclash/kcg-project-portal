<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\User;

class FakeAuthController extends Controller
{
    public function asMentor()
    {
        \Auth::login(User::whereEmail('mentor@kcgcollege.com')->first());
        return redirect()->home();
    }

    public function asAdmin()
    {
        \Auth::login(User::whereEmail('admin@kcgcollege.com')->first());
        return redirect()->home();
    }

    public function asCSEHead()
    {
        \Auth::login(User::whereEmail('hod.cse@kcgcollege.com')->first());
        return redirect()->home();
    }

    public function asECEHead()
    {
        \Auth::login(User::whereEmail('hod.ece@kcgcollege.com')->first());
        return redirect()->home();
    }
}
