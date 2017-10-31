@extends('layouts.master')

@section('content')
<h1>Edit Task</h1>
<form action="{{ route('projects.tasks.update', [$project->slug, $task->slug]) }}" method="POST">
	{{ method_field('PUT') }}
	@include('tasks.form', ['submit' => 'Update Task'])
</form>
<a href="{{ route('projects.show', $project->slug) }}" class="lead m-2">Back to Project</a>
@endsection