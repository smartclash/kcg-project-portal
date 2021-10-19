<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Vertical;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        //TODO: Allow only mentors to do it
        return view('projects.create')->with([
            'verticals' => Vertical::all()
        ]);
    }

    public function handleCreate()
    {
        //TODO: Allow only mentors to do it
        \request()->validate([
            'name' => 'required',
            'content' => 'required'
        ]);

        $project = Project::create([
            'name' => \request('name'),
            'content' => \request('content'),
            'user_id' => \Auth::id(),
        ]);

        $project->verticals()->attach(\request('verticals'));

        return $project;
    }
}
