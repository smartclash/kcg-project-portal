<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Models\Project;
use App\Models\Vertical;

class ProjectController extends Controller
{
    public function create()
    {
        $this->authorize('create', Project::class);

        return view('projects.create')->with([
            'verticals' => Vertical::all()
        ]);
    }

    public function handleCreate()
    {
        $this->authorize('create', Project::class);

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

        return redirect()->route('project.show', $project);
    }

    public function list()
    {
        $projects = \Auth::user()->type->is(UserType::Mentor())
            ? \Auth::user()->projects
            : Project::whereTeamId(null)->get();

        if (\Auth::user()->team) {
            if (\Auth::user()->team->project) {
                // If the user has a team, and team has already selected a project,
                // then redirect them to that particular project's page.
                return redirect()->route('project.show', \Auth::user()->team->project_id);
            }
        }

        return view('projects.list')->with([
            'projects' => $projects
        ]);
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('projects.show')->with([
            'project' => $project,
            'tracks' => $project->tracks
        ]);
    }
}
