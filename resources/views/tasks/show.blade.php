@extends('layouts.master')

@section('content')
<h1>{{ $project->name }}</h1>
<h3>{{ $task->name }}</h3>
<p>{{ $task->description }}</p>
<a href="{{ route('projects.show', $project->slug) }}" class="lead m-2">Back to Project</a>
@endsection