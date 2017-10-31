@extends('layouts.master')

@section('content')
<h1>Edit Project</h1>
<form action="{{ route('projects.update', $project->slug) }}" method="POST">
	{{ method_field('PUT') }}
	@include('projects.form', ['submit' => 'Edit Project'])
</form>
<a href="/projects" class="lead m-2">Back to Projects</a>
<p class="lead d-inline text-primary">|</p>
<a href="{{ route('projects.create') }}" class="lead m-2">Create Project</a>
@endsection