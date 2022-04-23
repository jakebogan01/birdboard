<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', function () {
    return view('projects', [
        'projects' => Project::all()
    ]);
});

Route::post('/projects', function () {
    Project::create(request(['title', 'description']));
});
