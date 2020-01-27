<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('projects.index', compact('projects'));
            ->with('i', (request()->input('page', 1) -1));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar que els camps estiguin correctes.
        $validator = Validator::make($request->all(),
        ['name' => 'required|unique:projects|max:50',
        'budget' => 'required|numeric',
        'description' => 'required',
        'professional_family' => 'required|max:50',
        ]);

        // Si no ho estan, redirigir al formulari de creació i mostrar els errors
        if ($validator->fails()) {
            return redirect('project/create')
            ->withErrors($validator)
            ->withInput();
        }
        else{
            $project = Project::create($request->except('csrf'));
            // Mostra les dades amb JSON
            return $post->toJson();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        self::store($request);
        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('succes','Projecte actualitzat correctament');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
