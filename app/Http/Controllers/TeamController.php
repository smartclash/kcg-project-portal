<?php

namespace App\Http\Controllers;

use App\Models\Team;

class TeamController extends Controller
{
    public function create()
    {
        $this->authorize('create', Team::class);
        return view('teams.create');
    }

    public function handleCreate()
    {
        $this->authorize('create', Team::class);
        \request()->validate([ 'name' => 'required' ]);

        $team = Team::create([
            'name' => request('name'),
            'user_id' => \Auth::id()
        ]);

        \Auth::user()->team()->associate($team)->save();

        return $team;
    }

    public function addMembers(Team $team)
    {
        $this->authorize('addMembers', $team);

        return view('teams.members')->with([
            'team' => $team
        ]);
    }

    public function handleAddMembers(Team $team)
    {
        $team->authorize('addMembers', $team);

        return request()->all();
    }
}
