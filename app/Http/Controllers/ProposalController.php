<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;

class ProposalController extends Controller
{
  public function __construct()
{
$this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /** LLISTAR PROPOSTES
     *
     *  Extreu les propostes 
     *
     *  @param Request $request Obtenim el tipo d'estat dels empleats a mostrar.
     *  @return void
     * */
    public function indexProposal(Request $request)
    {
        $tipo = $request->get('tipo');

        $proposals = Proposal::tipo($tipo)->paginate(5);

        return view('proposals.index', compact('proposals'));
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
        return redirect()
                ->route('proposals.index')
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
      $proposal = Proposal::find($id);
      return view ('proposals.show', compact('proposal'));
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
    public function editProposal($id, $url){
      $proposal = Proposal::find($id);
      return view('proposals.edit', compact('proposal','url'));
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
     * @return \Illuminate\Http\Response
     */

    public function updateProposal(Request $request, $id, $url)
    {
              // Cercar la proposta amb la mateixa ID de la BBDD
              $proposal = Proposal::find($id);

              // Assignar els valors del formulari
              $proposal -> name = $request->input('name');
              $proposal -> limit_date = $request->input('limit_date');
              $proposal -> description = $request->input('description');
              $proposal -> professional_family = $request->input('professional_family');

              // Guardar la proposta a la BBDD amb les noves dades
              $proposal -> save();

                // Tornar a la llista de propostes
              return redirect($url);
     }

    /** BAIXA PROPOSTA
     *
     * Donem de baixa la proposta que indiquem amb la seva ID
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function inactiveProposal($id)
    {
        $proposal = Proposal::find($id);
        $proposal -> status = 'inactive';
        $proposal -> save();

        $proposals = Proposal::all();

        return redirect()->route('proposals.index',compact('proposals'))
        ->with('i', (request()->input('page', 1) -1));
    }

    public function destroyProposal($id)
    {
        $proposal = Proposal::find($id);
        $proposal ->status = 'deleted';
        $proposal ->save();

        $proposals = Proposal::all();

        return redirect()->route('proposals.index',compact('proposals'))
                ->with('success','Proposal deleted successfully.');
    }

    /** DONAR D'ALTA PROPOSTA
     *
     *  Indiquem la id de la proposta la qual volem donar d'alta i redireccionem a la vista anterior.
     *
     *  @param $id Conté la ID de la proposta
     *  @return \Illuminate\Http\Response
     * */

    public function activeProposal($id)
    {
        $proposal = Proposal::find($id);
        $proposal->status = 'active';
        $proposal->save();
        return redirect()->back();
    }

    /** DASHBOARD PROPOSTES
     *
     *  
     * 
     *  @param $id Conté la ID de la proposta
     *  @return \Illuminate\Http\Response
     * */
    public function dashboardProposal(Request $request)
    {

        $proposals = Proposal::nameAuthor($request->get('name'), $request->user()->id)->paginate(12);
        return view('proposals.dashboard', compact('proposals'));
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
}
