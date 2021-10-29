<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // TODO: Make this a separate controller class
    Route::post('user/search', function (Request $request) {
        return \App\Models\User::search($request->get('query'))->get()
            ->filter(function (\App\Models\User $user) use ($request) {
                return !in_array($user->id, $request->get('except'), true)
                    && $user->type->is(\App\Enums\UserType::Student())
                    && !$user->team_id;
            });
    })->name('user.search');
});
