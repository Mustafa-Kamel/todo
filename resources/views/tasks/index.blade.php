@extends('layouts.master')

@section('content')
<h1>{{ $project->name }} Tasks</h1>
@if(count($tasks))
	<ul class="list-unstyled container-fluid">
		@foreach($tasks as $task)
		<li>
			<form action="{{ route('projects.tasks.destroy', [$project->slug, $task->slug]) }}" method="post">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<div class="form-group">
					<a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a>
					<a href="{{ route('projects.tasks.edit', [$project->slug, $task->slug]) }}" class="btn btn-info">EDIT</a>
					<button type="submit" class="btn btn-danger">DELETE</button>
				</div>
			</form>
		</li>
		@endforeach
	</ul>
@else
	<p>Your project has no tasks to show</p>
@endif
<a href="/projects" class="lead m-2">Back to Projects</a>
<p class="lead d-inline text-primary">|</p>
<a href="{{ route('projects.tasks.create', $project->slug) }}" class="lead m-2">Create Task</a>
@endsection