<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function create()
    {
        //TODO: Make it available only to mentors
        return view('tracks.create');
    }
}
