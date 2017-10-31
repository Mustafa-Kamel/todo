{{ csrf_field() }}
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" class="form-control" value="@isset($task){{ $task->name }}@endisset">
</div>

<div class="form-group">
	<label for="slug">Slug</label>
	<input type="text" name="slug" id="slug" class="form-control" value="@isset($task){{ $task->slug }}@endisset">
</div>

<div class="form-group">
	<label for="description">Description</label>
	<textarea name="description" id="description" class="form-control">@isset($task){{ $task->description }}@endisset</textarea>
</div>

<div class="form-group text-center">
	<button type="submit" class="btn btn-success btn-block">{{ $submit }}</button>
</div>