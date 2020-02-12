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
        return view('tickets.index', compact('tickets'))
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Instanciar
         $ticket = new Ticket;

         // Assignació de valors a les propietats
         $ticket -> topic = $request->input('topic');
         $ticket -> type = $request->input('type');
         $ticket -> priority = $request->input('priority');
         //Usuari assignat
         $ticket -> id_assigned_user = $request->input('assigned');
         //Id de l'usuari autor és 5
         $ticket -> id_author = 5;
         
 
         // Guardar alumne a la BBDD
         $ticket -> save();
 
         // Tornar a la llista d'alumnes
         return redirect()->route('tickets.index',compact('tickets'))
         ->with('i', (request()->input('page', 1) -1));
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

        return view('tickets.edit', $data);
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