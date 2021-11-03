<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function student()
    {
        return User::search(\request('query'))->get()
            ->filter(function (User $user) {
                return !in_array($user->id, \request('except'), true)
                    && $user->type->is(\App\Enums\UserType::Student())
                    && !$user->team_id;
            });
    }
}
