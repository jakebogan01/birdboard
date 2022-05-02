<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/projects', [ProjectsController::class, 'index']);

    Route::get('/projects/create', [ProjectsController::class, 'create']);

    Route::post('/projects', [ProjectsController::class, 'store']);

    Route::get('/projects/{project}', [ProjectsController::class, 'show']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');
});


Auth::routes();


Auth::routes();

