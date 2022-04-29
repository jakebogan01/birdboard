<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function store()
    {

        // validate
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'owner_id' => 'required',
        ]);

        Project::create([
            'owner_id' => auth()->user()->id,
            'title' => request('title'),
            'description' => request('description')
        ]);

        return redirect('/projects');
    }
}
