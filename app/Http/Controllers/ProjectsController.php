<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
	protected $rules = ['name' => 'string|required|min:3', 'slug' => 'string|required|min:3'];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
    	$projects = Project::all();
    	return view('projects.index', compact('projects'));
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function create()
    {
    	return view('projects.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->validate(request(), $this->rules);
		Project::create(request(['name', 'slug']));
		return redirect()->route('projects.index')->with('message', 'Project created successfully!');
	}

    /**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
    public function show(Project $project)
    {
    	return view('projects.show', compact('project'));
    }

    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
    public function edit(Project $project)
    {
    	return view('projects.edit', compact('project'));
    }

    /**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
    public function update(Project $project)
    {
    	$this->validate(request(), $this->rules);
    	$project->update(request(['name', 'slug']));
    	return redirect()->route('projects.show', $project->slug)->with('message', 'Project updated successfully!');
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function destroy(Project $project)
	{
		$project->delete();
		return redirect()->route('projects.index')->with('message', 'Project deleted successfully!');
	}

}
