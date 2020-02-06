<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
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

    /** Extreu els usuaris que tenen ID de rol 3 (Alumne), després retorna la vista per a llistar-los. */

    public function indexStudent()
    {
        //
        $students = DB::table('users')->where('id_role', 3)->get();

        return view ('students.index', compact('students'));
    }

    /**
     * Retorna la vista amb el formulari de creació d'alumnes.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStudent()
    {
        return view('students.create');
    }

    /** Crea el nou alumne a partir de les dades donades al formulari.
     *  @param $request
     */

    public function storeStudent(Request $request)
    {
        // Instanciar
        $student = new User;

        // Assignació de valors a les propietats
        $student -> firstname = $request->input('firstname');
        $student -> lastname = $request->input('lastname');
        $student -> name = $request->input('name');
        $student -> dni = $request->input('dni');
        $student -> email = $request->input('email');
        $student -> birthdate = $request->input('birthdate');
        $student -> password = $request->input('password');
        $student -> id_city = 1;
        $student -> profile_pic = "Res";
        $student -> bio = "Res";
        $student -> id_role = 3;
        $student -> status = "active";

        // Guardar alumne a la BBDD
        $student -> save();

        // Tornar a la llista d'alumnes

        $students = DB::table('users')->where('id_role', 3)->get();

        return redirect()->route('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) -1));
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
