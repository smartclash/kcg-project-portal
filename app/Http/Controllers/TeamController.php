<?php

namespace App\Http\Controllers;

use App\Models\Team;

class TeamController extends Controller
{
    public function create()
    {
        // TODO: only for students, should not be in any team or own a team
        return view('teams.create');
    }

    public function handleCreate()
    {
        // TODO: only for students, should not be in any team or own a team
        \request()->validate([ 'name' => 'required' ]);

        return Team::create([
            'name' => request('name'),
            'user_id' => \Auth::id()
        ]);
    }
}
