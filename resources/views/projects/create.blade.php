@extends('layouts.app')

@section('content')
    <form action="/projects" method="POST">
        @csrf

        <h1 class="heading is-1">Create a project</h1>

        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <input type="text" class="input" name="description" placeholder="Description">
            </div>
        </div>

        <div class="field">
            <label class="label" for="title">Title</label>
            <div class="control">
                <button type="submit" class="button is-link">Create Button</button>
                <a href="/projects">Cancel</a>
            </div>
        </div>
    </form>
@endsection('content')
