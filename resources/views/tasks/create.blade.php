@extends('layouts.master')

@section('content')
<h1>CREATE Task</h1>
<form action="{{ route('projects.tasks.store', $project->slug) }}" method="POST">
	@include('tasks.form', ['submit' => 'Create Task'])
</form>
<a href="{{ route('projects.show', $project->slug) }}" class="lead m-2">Back to Project</a>
@endsection