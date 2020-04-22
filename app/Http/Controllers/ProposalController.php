<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Tag;
use App\Proposal_tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ProposalController extends Controller
{
  /*public function __construct()
{
$this->middleware('auth');
}*/
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

        $proposals = Proposal::tipo($tipo)->latest()->paginate(10); // Añadido latest para ordenar por fecha de creación

        return view('proposals.index', compact('proposals'));
    }

    public function createProposal()
    {
        $tags = Tag::All();
        return view('proposals.create', compact('tags'));
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

    /**
     * Almacena una propuesta en la bbdd
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function storeProposal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'limit_date' => 'required',
            'description' => 'required',
            'professional_family' => 'required'
        ]);

        $proposal = new Proposal();

        // Assignar els valors del formulari
        $proposal -> name = $request->input('name');
        $proposal -> limit_date = $request->input('limit_date');
        $proposal -> description = $request->input('description');
        $proposal -> professional_family = $request->input('professional_family');
        $proposal -> category = $request->input('category');
        $proposal -> id_author = Auth::user()->id;

        $proposal->save();
        
        Log::info($request->user()->username. ' - [ INSERT ] - proposals - Nova proposta: ' .$request -> name. ' inserida!');
        
        // AFEGIR TAGS A LES PROPOSTES

        $proposta = Proposal::select('*')->where('name', $request->name)->where('status', 'active')->where('id_author', $proposal->id_author)->first();
        
        if($request->tags) {

            foreach ($request->tags as $tag) {

                $proposalTags = new Proposal_tag;
                $proposalTags->id_proposal = $proposta->id_proposal;
                $proposalTags->id_tag = $tag;
                $proposalTags->save();

            }
        }
        
        return redirect()
                ->route('proposals.index')
                ->with('success','Proposta creada correctament.');
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
     * Display the specified resource.
     *
     * @return Proposal
     *
     */
    public function showApi(){

        return Proposal::All();

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
        $tagsActuals = Proposal_tag::select()->where('id_proposal', $id)->get();
        $tags = Tag::All();
        return view('proposals.edit', compact('proposal', 'tagsActuals', 'tags'));
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

    public function updateProposal(Request $request)
    {
        // Cercar la proposta amb la mateixa ID de la BBDD
        $proposal = Proposal::find($request->input('id'));
        $proposalVella = Proposal::find($request->input('id'));
        
        // Assignar els valors del formulari
        $proposal -> name = $request->input('name');
        $proposal -> limit_date = $request->input('limit_date');
        $proposal -> description = $request->input('description');
        $proposal -> professional_family = $request->input('professional_family');
        $proposal -> category = $request->input('category');
        $proposal -> id_author = Auth::user()->id;

        // Guardar la proposta a la BBDD amb les noves dades
        $proposal -> save();

        $tipo = $request->get('tipo');

        $proposals = Proposal::tipo($tipo)->paginate(10);
        Log::info($request->user()->username. ' - [ UPDATE ] - proposals - Proposta: ' .$proposalVella -> name. ' modificada! - (' .$proposalVella -> name. ', ' .$proposalVella -> limit_date. ', ' .$proposalVella -> description. ', ' .$proposalVella -> professional_family. ' -> ' .$proposal -> name. ', ' .$proposal -> limit_date. ', ' .$proposal -> description. ', ' .$proposal -> professional_family. ').');
            
        // AFEGIR TAGS A LES PROPOSTES

        Proposal_tag::where('id_proposal', $proposal->id_proposal)->delete();

        if($request->tags) {
            foreach ($request->tags as $tag) {

                $proposalTags = new Proposal_tag;
                $proposalTags->id_proposal = $proposal->id_proposal;
                $proposalTags->id_tag = $tag;
                $proposalTags->save();
    
            }

        }


            return redirect()
            ->route('proposals.index')
            ->with('success','Proposta actualitzada correctament.');
     }


    /** BAIXA PROPOSTA
     *
     * Donem de baixa la proposta que indiquem amb la seva ID
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function inactiveProposal(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        $proposal -> status = 'inactive';
        $proposal -> save();

        $proposals = Proposal::all();
        Log::info($request->user()->username. ' - [ UPDATE ] - proposals - Proposta: ' .$proposal -> name. ' donada de baixa!');

        return redirect()->route('proposals.index',compact('proposals'))
                ->with('success','Proposta desactivada correctament.');
    }

    public function destroyProposal(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        $proposal ->status = 'deleted';
        $proposal ->save();

        $proposals = Proposal::all();
        Log::info($request->user()->username. ' - [ DELETE ] - proposals - Proposta: ' .$proposal -> name. ' eliminada!');

        return redirect()->route('proposals.index',compact('proposals'))
                ->with('success','Proposta eliminada correctament.');
    }

    /** DONAR D'ALTA PROPOSTA
     *
     *  Indiquem la id de la proposta la qual volem donar d'alta i redireccionem a la vista anterior.
     *
     *  @param $id Conté la ID de la proposta
     *  @return \Illuminate\Http\Response
     * */

    public function activeProposal(Request $request, $id)
    {
        $proposal = Proposal::find($id);
        $proposal->status = 'active';
        $proposal->save();
        Log::info($request->user()->username. ' - [ UPDATE ] - proposals - Proposta: ' .$proposal -> name. ' donada de alta!');

        return redirect()->route('proposals.index',compact('proposals'))
            ->with('success','Proposta activada correctament.');
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
