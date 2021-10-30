<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        if (!\Auth::user()->team) {
            return redirect()->route('team.create');
        }

        $team = \Auth::user()->team;
        return view('student.dashboard')->with([
            'team' => $team
        ]);
    }
}
