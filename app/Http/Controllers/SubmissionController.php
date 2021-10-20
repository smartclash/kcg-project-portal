<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Track;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function create(Project $project, Track $track)
    {
        // TODO: Only students who chose this project can submit
        return view('submissions.create')->with([
            'project' => $project,
            'track' => $track,
        ]);
    }

    public function handleCreate(Project $project, Track $track)
    {
        // TODO: Only students who chose this project can submit
        return \request()->all();
    }
}
