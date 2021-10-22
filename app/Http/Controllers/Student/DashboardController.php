<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        if (!\Auth::user()->team) {
            return redirect()->route('team.create');
        }

        return view('student.dashboard');
    }
}
