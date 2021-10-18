<?php

namespace App\Http\Controllers;

use App\Enums\UserType;

class DashboardController extends Controller
{
    public function show()
    {
        switch (\Auth::user()->type->value) {
            case UserType::Student:
                return 'Student';
            case UserType::Mentor:
                return redirect()->route('mentor.dashboard');
            case UserType::Head:
                return 'Head';
            case UserType::Admin:
                return 'Admin';
            default:
                return abort(500);
        }
    }
}
