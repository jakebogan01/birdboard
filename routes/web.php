<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', function () {
    $projects = Project::all();
    return view('projects.index', compact('projects'));
});

Route::post('/projects', function () {
    Project::create(request(['title', 'description']));
});
