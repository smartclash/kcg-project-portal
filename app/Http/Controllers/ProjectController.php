<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        //TODO: Allow only mentors to do it
        return view('projects.create');
    }
}
