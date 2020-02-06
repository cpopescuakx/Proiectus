<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Proposal;

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
        return view('projects.index', compact('projects'))
            ->with('i', (request()->input('page', 1) -1));
        // return view('projects.index');

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
     * Guardar un projecte nou a la base dades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idProj = Project::max('id_project');
        $idProp = Proposal::max('id_proposal');

        if($idProj < $idProp){
        // Instanciar
        $projecte = new Project;

        // Assignar al
        $projecte -> name = $request->input('name');
        $projecte -> budget = $request->input('budget');
        $projecte -> description = $request->input('desc');
        $projecte -> professional_family = $request->input('pro_family');

        // Guardar projecte a la BBDD
        $projecte -> save();

        // Tornar a la llista de projectes
        $projects = Project::all();
        return redirect()->route('projects.index',compact('projects'))
        ->with('i', (request()->input('page', 1) -1));

    }
    
    else{return redirect()->route('projects.x');

    }
        // **** PREGUNTAR A TONI SI FALTA CONSIDERAR CREAR UNA PROPOSTA ****    //
        // **** SI EL PROJECTE NO POT ESTAR RELACIONAT A NINGUNA PROPOSTA ****  //
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
    public function edit(Project $project)
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
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Projecte esborrat correctament');
    }
}
