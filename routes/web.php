<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('auth/google', [\App\Http\Controllers\AuthController::class, 'googleRedirect'])->name('login');
Route::get('auth/google/callback', [\App\Http\Controllers\AuthController::class, 'googleCallback']);

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'show'])->name('home');

Route::middleware(['auth', 'only.mentor'])->prefix('mentor')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\Mentor\DashboardController::class, 'show'])
        ->name('mentor.dashboard');
});

Route::middleware(['auth', 'only.student'])->prefix('student')->group(function() {
    Route::get('dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'show'])
        ->name('student.dashboard');
});

Route::middleware('auth')->prefix('teams')->group(function () {
    Route::prefix('{team}/members')->group(function () {
        Route::get('create', [\App\Http\Controllers\TeamController::class, 'addMembers'])
            ->name('team.members.create');

        Route::post('create', [\App\Http\Controllers\TeamController::class, 'handleAddMembers']);
    });

    Route::get('{team}', [\App\Http\Controllers\TeamController::class, 'show'])
        ->name('team.show');
    Route::get('create', [\App\Http\Controllers\TeamController::class, 'create'])
        ->name('team.create');

    Route::post('create', [\App\Http\Controllers\TeamController::class, 'handleCreate']);
});

Route::middleware('auth')->prefix('projects')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProjectController::class, 'list'])->name('project.list');
    Route::get('create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
    Route::get('/{project}', [\App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');

    Route::post('create', [\App\Http\Controllers\ProjectController::class, 'handleCreate']);

    Route::prefix('{project}/tracks')->group(function () {
        Route::get('/', [\App\Http\Controllers\TrackController::class, 'list'])->name('track.list');
        Route::get('create', [\App\Http\Controllers\TrackController::class, 'create'])->name('track.create');

        Route::prefix('{track:id}/submissions')->group(function () {
            Route::get('create', [\App\Http\Controllers\SubmissionController::class, 'create'])
                ->name('submission.create');

            Route::post('create', [\App\Http\Controllers\SubmissionController::class, 'handleCreate']);
        });

        Route::get('/{track:id}', [\App\Http\Controllers\TrackController::class, 'show'])->name('track.show');

        Route::post('create', [\App\Http\Controllers\TrackController::class, 'handleCreate']);
    });
});

Route::view('/', 'welcome');
