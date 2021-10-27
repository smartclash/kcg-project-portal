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

        return Team::create([
            'name' => request('name'),
            'user_id' => \Auth::id()
        ]);
    }
}
