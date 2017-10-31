@extends('layouts.master')

@section('content')
<h1>Projects</h1>
@if(count($projects))
<ul class="list-unstyled container-fluid">
	@foreach($projects as $project)
	<li>
		<form action="/projects/{{ $project->slug }}" method="post">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<div class="form-group">
				<a href="{{ route('projects.show', $project->slug) }}" class="m-2">{{ $project->name }}</a>
				<a href="{{ route('projects.edit', $project->slug) }}" class="btn btn-info">EDIT</a>
				<button type="submit" class="btn btn-danger">DELETE</button>
			</div>
		</form>
	</li>
	@endforeach
</ul>
@else
<p>You have no projects to show</p>
@endif
<a href="{{ route('projects.create') }}" class="lead m-2">Create Project</a>
@endsection