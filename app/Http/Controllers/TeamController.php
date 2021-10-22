<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function create()
    {
        return view('teams.create');
    }
}
