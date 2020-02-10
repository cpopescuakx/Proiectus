<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class ProposalController extends Controller
{
    /**
     * Llistar totes les propostes
     * 
     * Retorna la vista proposals.index i li injecta la variable $proposals 
     * que conté una llista de totes les propostes.
     *  
     * @return void
     * 
     */
    public function indexProposals()
    {
        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'))
            ->with('i', (request()->input('page', 1) -1));
    }


    /**
     * Formulari de creació de propostes
     * 
     * Retorna la vista projects.create la qual és un formulari per a 
     * crear projectes nous
     * 
     * @return void
     * 
     */
    public function createProposals()
    {
        return view('proposal.create');
    }

    /**
     * Crear una Proposta nova
     *  
     * Utilitzem el parametre $request per a conseguir les dades del
     * formulari i crearà una proposta nova.
     *  
     * @param Request $request
     * 
     * @return void
     * 
     */
    public function storeProposals(Request $request){

            // Instanciar
            $proposal = new Proposal;

            // Assignar valors
            $proposal -> name = $request->input('name');
            $proposal -> budget = $request->input('budget');
            $proposal -> description = $request->input('desc');
            $proposal -> professional_family = $request->input('pro_family');
            $proposal -> ending_date = $request->input('end_date');

            // Guardar projecte a la BBDD
            $proposal -> save();

            // Tornar a la llista de projectes
            $proposal = Proposal::all();
            return redirect()->route('proposal.index',compact('proposals'))
            ->with('i', (request()->input('page', 1) -1));

        }
        
    

    public function showProposals(Proposal $proposal)
    {
        //return view('projects.show',compact('project'));
    }

    /**
     * Formulari editar
     * 
     * Retorna la vista projects.edit i li injecta la variable $project que conté
     * el projecte que correspon a la id del parametre ($id)
     * 
     * @param mixed $id
     * 
     * @return void
     * 
     */
    public function editProposals($id)
    {
        // ******************* PREGUNTAR A TONI ******************* //
        // Fa falta considerar a excloure id invalides?
        // (si un usuari canvia manualment la URL i fica una ID que no existeix)
        
        $proposal = Proposal::find($id);
        return view('proposals.edit', compact('proposal'));
        
    }

  /**
     * Editar un projecte existent
     * 
     * Busca el projecte en qüestió (utilitzant la ID de la ruta),
     * li assigna els valors obtinguts del formulari utilitzant la variable 
     * $request i guarda els canvis.
     * 
     * Després redirecciona a la llista de projectes.
     * 
     * @param Request $request
     * 
     * @return void
     * 
     */
    public function updateProposals(Request $request)
    {
        // Agafar la id de la ruta (parametre)
        $id = $request->route('id');

        // Cercar el projecte amb la mateixa ID de la BBDD
        $proposal = Proposal::find($id);

        // Assignar els valors del formulari
        $proposal-> name = $request->input('name');
        $proposal -> budget = $request->input('budget');
        $proposal -> description = $request->input('description');
        $proposal -> professional_family = $request->input('professional_family');
        $proposal -> ending_date = $request->input('end_date');
        
        // Guardar els canvis
        $proposal ->save();

        // Redireccionar a la llista de projectes
        $proposal = Proposal::all();
        return redirect()->route('proposal.index',compact('proposals'))
        ->with('i', (request()->input('page', 1) -1));

    }
    /**
     * Donar de baixa un projecte
     * 
     * Busca el projecte en qüestió (utilitzant el parametre $id),
     * modifica el camp status (inactive) i guarda els canvis.
     * 
     * Després redirecciona a la llista de projectes.
     * 
     * @param mixed $id
     * 
     * @return void
     * 
     */
    public function destroyProposals($id)
    {
        $proposal = Proposal::find($id);
        $proposal -> status = 'inactive';
        $proposal ->save();
        
        $proposal = Proposal::all();
            return redirect()->route('proposal.index',compact('proposals'))
            ->with('i', (request()->input('page', 1) -1));
    }
}
