@extends('layouts.app')

@section('content')
    <p>{{ $project->title }}</p>
    <p>{{ $project->description }}</p>
    <a href="/projects">Go Back</a>
@endsection('content')
