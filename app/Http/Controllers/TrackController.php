<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Track;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function create(Project $project)
    {
        //TODO: Make it available only to mentors
        return view('tracks.create')->with('project', $project);
    }

    public function list(Project $project)
    {
        //TODO: Make it available only to mentors
        // and the students who selected this project
        return view('tracks.list');
    }

    public function show(Project $project, Track $track)
    {
        // TODO: Make it available to only mentor
        //  and the students who selected
        return view('tracks.show')->with([
            'project' => $project,
            'track' => $track,
        ]);
    }

    public function handleCreate(Project $project)
    {
        //TODO: Make it available only to mentors
        \request()->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'due_date' => 'required|date',
            'lock_date' => 'required|date',
            'due_time' => 'required',
            'lock_time' => 'required',
        ]);

        $due_date = Carbon::parse(\request('due_date') . ' ' . \request('due_time'));
        $lock_date = Carbon::parse(\request('lock_date') . ' ' . \request('lock_time'));

        return Track::create([
            'name' => request('name'),
            'content' => \request('content'),
            'due_date' => $due_date,
            'lock_date' => $lock_date,
            'project_id' => $project->id,
            'locked' => false
        ]);
    }
}
