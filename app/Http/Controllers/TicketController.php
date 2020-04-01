<?php

namespace App\Http\Controllers;
use App\User;
use App\Ticket;
use Illuminate\Http\Request;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        $users['users'] = User::all();
        return view('tickets.index', compact('tickets'), $users)
            ->with('i', (request()->input('page', 1) -1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::all();
        return view('tickets.create', $data);
    }

    public function createNotManager()
    {
        $urlPrevious = url()->previous();
        $urlBase = url()->to('/');

        // Set the previous url that we came from to redirect to after successful login but only if is internal
        if(($urlPrevious != $urlBase . '/tickets/create') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
            session()->put('url.intended', $urlPrevious);
        }
        $data['users'] = User::all();
        return view('tickets.externalTicket', $data);
    }

    /**
     *  FUNCIÓ PER A QUAN ÉS UN GESTOR
     *  
     *  Guarda el ticket a partir del request que li arriba
     *  i la ID  de l'autor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Redirect
     */
    
    public function store($id_author, Request $request)
    {
         // Instanciar
         $ticket = new Ticket;

         // Assignació de valors a les propietats
         $ticket -> topic = $request->input('topic');
         $ticket -> type = $request->input('type');
         $ticket -> priority = $request->input('priority');
         //Usuari assignat
         $ticket -> id_assigned_user = $request->input('assigned');
         $ticket -> id_author = $id_author;
         
 
         // Guardar alumne a la BBDD
         $ticket -> save();
 
         // Tornar a la llista d'alumnes
         return redirect()->route('tickets.index',compact('tickets'))
         ->with('i', (request()->input('page', 1) -1));
    }

    /**
     *  FUNCIÓ PER A QUAN NO ÉS UN GESTOR
     * 
     *  Guarda el ticket a partir del request que li arriba
     *  i la ID de l'autor. Per defecte assigna a l'usuari 
     *  administrador com a responsable.
     * 
     *  @param Request $request
     *  @param $id_author
     */

    public function storeNotManager ($id_author, Request $request) {
        
         // Instanciar
         $ticket = new Ticket;

         // Assignació de valors a les propietats
         $ticket -> topic = $request->input('topic');
         $ticket -> type = $request->input('type');
         $ticket -> priority = $request->input('priority');
         //Usuari assignat
         $ticket -> id_assigned_user = 1;
         $ticket -> id_author = $id_author;
         
 
         // Guardar alumne a la BBDD
        $ticket -> save();
        return redirect()->intended('/');
 
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
        $where = array('id_ticket' => $id);
        $data['ticket'] = Ticket::where($where)->first();
        $user['users'] = User::all();

        return view('tickets.edit', $data, $user);
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
        // Cercar el projecte amb la mateixa ID de la BBDD
        $ticket = Ticket::find($id);

        // Assignar els valors del formulari
        $ticket -> topic = $request->input('topic');
        $ticket -> type = $request->input('type');
        $ticket -> priority = $request->input('priority');
        $ticket -> id_assigned_user = $request->input('assigned');
        $ticket -> status = $request->input('status');
        
        //Id de l'usuari autor és 5
        $ticket -> id_author = 5;
        
        // Guardar alumne a la BBDD
        $ticket -> save();

        // Redireccionar a la llista de tickets
        $ticket = Ticket::all();
        return redirect()->route('tickets.index',compact('tickets'))
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
        Ticket::destroy($id);

        $tickets = Ticket::all();
        $users['users'] = User::all();
        return view('tickets.index', compact('tickets'), $users)
            ->with('i', (request()->input('page', 1) -1));
        
    }
}