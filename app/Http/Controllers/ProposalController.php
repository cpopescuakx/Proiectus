<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexProposal()
    {
      $proposals = Proposal::paginate(5);
      return view('proposals.index', compact('proposals'))
          ->with('i', (request()->input('page', 1) -1));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function createProposal()
    {
        return view('proposals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    //! TO-DO
    public function storeProposal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'limit_date' => 'required',
            'description' => 'required',
            'professional_family' => 'required'
        ]);

        Proposal::create($request->all());
        return redirect()->route('proposals.index')
                        ->with('success','Proposal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
    /** EDITAR Proposta
     *
     *  Retorna el formulari de modificació de propostes. Passant la proposta a partir de l'ID.
     *
     *  @param int $id
     *  @return \Illuminate\Http\Response
     */
    public function editProposal($id){
      $proposal = Proposal::find($id);
      return view('proposals.edit', compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /** UPDATE PROPOSTA
     *
     *  Guarda les noves dades de la proposta a la base de dades. Llavors, redirecciona
     *  al llistat de propostes
     *
     *  @param Request $request
     *  @return void
     */

    public function updateProposal(Request $request, $id)
    {
              $id = $request->route('id'); // Agafar l'ID de la URL

              // Cercar la proposta amb la mateixa ID de la BBDD
              $professor = User::find($id);

              // Assignar els valors del formulari
              $professor -> firstname = $request->input('firstname');
              $professor -> lastname = $request->input('lastname');
              $professor -> name = $request->input('name');
              $professor -> dni = $request->input('dni');
              $professor -> email = $request->input('email');
              $professor -> birthdate = $request->input('birthdate');
              $professor -> password = $request->input('password');
              $nom = $request->input('city');
              $professor -> id_city = CityController::agafarID($nom);
              $professor -> profile_pic = "Res";
              $professor -> bio = "Res";
              $professor -> id_role = 4;
              $professor -> status = $request->input('status');

              // Guardar l'profe a la BBDD amb les noves dades
              $professor -> save();

              // Tornar a la llista d'profes

              $professors = DB::table('users')->where('id_role', 4)->get();

              return redirect()->route('professors.index',compact('professors'))
              ->with('i', (request()->input('page', 1) -1));//
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
