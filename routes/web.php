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

Route::middleware('auth')->prefix('projects')->group(function () {
    Route::get('create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');

    Route::prefix('{project}/tracks')->group(function () {
        Route::get('create', [\App\Http\Controllers\TrackController::class, 'create'])->name('track.create');
    });
});

Route::view('/', 'welcome');
