<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [ProjectsController::class, 'index']);

Route::post('/projects', [ProjectsController::class, 'store'])
->middleware('auth');

Route::get('/projects/{project}', [ProjectsController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
