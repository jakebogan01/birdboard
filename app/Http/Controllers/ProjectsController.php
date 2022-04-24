<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        request()->validate(['title' => 'required', 'description' => 'required']);

        Project::create(request(['title', 'description']));

        return redirect('projects');
    }
}
