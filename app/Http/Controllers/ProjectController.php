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

    public function list()
    {
        // TODO: Show all projects for students.
        //  and mentor projects for mentors.
        return view('projects.list')->with([
            'projects' => \Auth::user()->projects
        ]);
    }

    public function show(Project $project)
    {
        // TODO: Hide for other mentors.
        //  Show selection button for students
        return view('projects.show')->with([
            'project' => $project,
            'tracks' => $project->tracks
        ]);
    }
}
