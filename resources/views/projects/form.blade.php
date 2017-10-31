{{ csrf_field() }}
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" class="form-control" value="@isset($project){{ $project->name }}@endisset">
</div>

<div class="form-group">
	<label for="slug">Slug</label>
	<input type="text" name="slug" id="slug" class="form-control" value="@isset($project){{ $project->slug }}@endisset">
</div>

<div class="form-group text-center">
	<button type="submit" class="btn btn-success btn-block">{{ $submit }}</button>
</div>