<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function addMembers(Team $team)
    {
        $this->authorize('addMembers', $team);

        return \request()->all();
    }
}
