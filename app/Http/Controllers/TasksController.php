<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class TasksController extends Controller
{
	protected $rules = ['name' => 'string|required|min:3', 'slug' => 'string|required|min:3', 'description' => 'string|required'];

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
    public function index(Project $project)
    {
    	$tasks = $project->tasks;
    	return view('tasks.index', compact('project', 'tasks'));
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
    public function create(Project $project)
    {
    	return view('tasks.create', compact('project'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function store(Project $project)
	{
		$this->validate(request(), $this->rules);
		$project->tasks()->create(request(['name', 'slug', 'description']));
		return redirect()->route('projects.tasks.index', $project->slug)->with('message', 'Task created successfully!');
	}
	
    /**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
    public function show(Project $project, Task $task)
    {
    	return view('tasks.show', compact('project', 'task'));
    }

    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
    public function edit(Project $project, Task $task)
    {
    	return view('tasks.edit', compact('project', 'task'));
    }

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
	public function update(Project $project, Task $task)
	{
		$this->validate(request(), $this->rules);
		$task->update(request(['name', 'slug', 'description']));
		return redirect()->route('projects.tasks.show', [$project->slug, $task->slug])->with('message', 'Task updated successfully!');
	}

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @param  \App\Task    $task
	 * @return Response
	 */
    public function destroy(Project $project, Task $task)
    {
    	$task->delete();
    	return redirect()->route('projects.tasks.index', $project->slug)->with('message', 'Task deleted successfully!');
    }
}
