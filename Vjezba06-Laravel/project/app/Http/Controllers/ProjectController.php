<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()
            ->where('user_id', request()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(); //paginate default 15
        // dd($projects); //dump
        return view('project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['nullable', 'numeric', 'min:0'], 
        ], [
            'price.min' => 'The price must be positive.',
        ]);

        $data['price'] = $data['price'] ?? 0;

        $data['user_id'] = $request->user()->id;
        $project = Project::create($data);
        return to_route('project.show', $project)->with('message', 'Project created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        if ($project->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if ($project->user_id !== request()->user()->id) {
            abort(403);
        }
        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['nullable', 'numeric', 'min:0'], 
        ], [
            'price.min' => 'The price must be positive.',
        ]);

        $data['price'] = $data['price'] ?? 0;

        $project->update($data);
        return to_route('project.show', $project)->with('message', 'Project updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->user_id !== request()->user()->id) {
            abort(403);
        }
        $project->delete();
        return to_route('project.index')->with('message', 'Project was deleted');
    }
}
