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

            // Assignar valors
            $projecte -> name = $request->input('name');
            $projecte -> budget = $request->input('budget');
            $projecte -> description = $request->input('desc');
            $projecte -> professional_family = $request->input('pro_family');
            $projecte -> ending_date = $request->input('end_date');

            // Guardar projecte a la BBDD
            $projecte -> save();

            // Tornar a la llista de projectes
            $projects = Project::all();
            return redirect()->route('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) -1));

        }
        // Si el nº de projectes no és major que el de propostes haurem de crear una proposta primer i després crear
        // el projecte associat.
        else{
            // ------------------------------  PROPOSTA  ------------------------------  //

            // Instanciar
            $proposta = new Proposal;

            // Assignar valors
            $proposta -> name = $request->input('name');
            $proposta -> description = $request->input('desc');
            $proposta -> professional_family = $request->input('pro_family');
            $proposta -> limit_date = $request->input('end_date');
            $proposta -> id_author = 1;
            $proposta -> category = 'company';

            // Guardar proposta a la BBDD
            $proposta -> save();

            // ------------------------------  PROJECTE  ------------------------------  //
            // Instanciar
            $projecte = new Project;

            // Assignar valors
            $projecte -> name = $request->input('name');
            $projecte -> budget = $request->input('budget');
            $projecte -> description = $request->input('desc');
            $projecte -> professional_family = $request->input('pro_family');
            $projecte -> ending_date = $request->input('end_date');

            // Guardar projecte a la BBDD
            $projecte -> save();

            // Tornar a la llista de projectes
            $projects = Project::all();
            return redirect()->route('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) -1));
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
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Agafar la id de la ruta (parametre)
        $id = $request->route('id');

        // Cercar el projecte amb la mateixa ID de la BBDD
        $projecte = Project::find($id);

        // Assignar els valors del formulari
        $projecte-> name = $request->input('name');
        $projecte -> budget = $request->input('budget');
        $projecte -> description = $request->input('description');
        $projecte -> professional_family = $request->input('professional_family');
        $projecte -> ending_date = $request->input('end_date');
        
        // Guardar els canvis
        $projecte ->save();

        // Redireccionar a la llista de projectes
        $projects = Project::all();
        return redirect()->route('projects.index',compact('projects'))
        ->with('i', (request()->input('page', 1) -1));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projecte = Project::find($id);
        $projecte -> status = 'inactive';
        $projecte ->save();
        
        $projects = Project::all();
            return redirect()->route('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) -1));
    }
}
