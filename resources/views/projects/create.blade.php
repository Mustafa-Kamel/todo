@extends('layouts.master')

@section('content')
<h1>CREATE Project</h1>
<form action="{{ route('projects.store') }}" method="POST">
	@include('projects.form', ['submit' => 'Create Project'])
</form>
<a href="/projects" class="lead m-2">Back to Projects</a>
@endsection