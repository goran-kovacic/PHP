<?php

namespace App\Http\Controllers;

use App\Models\Objava;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ObjavaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($project_id)
    {
        $project = Project::find($project_id);
        $objava = Objava::where('project_id', $project_id)->get();

        return view('objava.index', compact('project','objava'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($project_id)
    {
        $project = Project::find($project_id);
        return view('objava.create', compact('project','project_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($project_id, Request $request)
    {
        $project = Project::find($project_id);

        $data = $request -> validate (['tekst' => ['required','string']]);
        $data['project_id'] = $project_id;
        $objava = Objava::create($data);
        // return to_route('objava.show', (['project','objava']));
        return to_route('project.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show($project_id)
    {
        $project = Project::find($project_id);
        $objava = Objava::where('project_id', $project_id)->get();

        return view('objava.index', compact('project','objava'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('objava.edit', ['objava' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
