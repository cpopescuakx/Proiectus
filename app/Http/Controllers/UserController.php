<?php

namespace App\Http\Controllers;
use App\User;
use App\City;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CityController;
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

    /** LLISTAR ALUMNES
     *
     *  Extreu els usuaris que tenen ID de rol 3 (Alumne), després retorna la vista per a llistar-los.
     *
     *  @param void
     *  @return void
     * */

    public function indexStudent()
    {
        //
        $students = DB::table('users')->where('id_role', 3)->get();

        return view ('students.index', compact('students'));
    }

    /** CREAR ALUMNE
     *
     *  Retorna la vista amb el formulari de creació d'alumnes. Passant els noms de les ciutats
     *  que tenim a la base de dades, per a poder fer el datalist.
     *
     *  @param void
     *  @return \Illuminate\Http\Response
     */
    public function createStudent()
    {
        $cities = DB::table('cities')->distinct()->select("name")->get();
        return view('students.create',compact('cities'));
    }

    /** GUARDAR ALUMNE
     *
     *  Guarda el nou alumne a la base de dades a partir de les dades donades al formulari.
     *
     *  @param Request $request
     *  @return void
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
        $nom = $request->input('city');
        $student -> id_city = CityController::agafarID($nom);
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


    /** EDITAR ALUMNE
     *
     *  Retorna el formulari de modificació d'alumnes. Passant l'alumne a partir de l'ID.
     *
     *  @param int $id
     *  @return void
     */
    public function editStudent ($id) {
        $student = User::find($id);
        $cities = DB::table('cities')->distinct()->select("name")->get();
        $nomCiutat = CityController::agafarNom($student->id_city);

        return view('students.edit', compact('student', 'cities', 'nomCiutat'));
    }

    public function updateStudent (Request $request) {
        // Agafar la id de la ruta (parametre)
        $id = $request->route('id');

        // Cercar l'alumne amb la mateixa ID de la BBDD
        $student = User::find($id);

        // Assignar els valors del formulari
        $student -> firstname = $request->input('firstname');
        $student -> lastname = $request->input('lastname');
        $student -> name = $request->input('name');
        $student -> dni = $request->input('dni');
        $student -> email = $request->input('email');
        $student -> birthdate = $request->input('birthdate');
        $student -> password = $request->input('password');
        $nom = $request->input('city');
        $student -> id_city = CityController::agafarID($nom);
        $student -> profile_pic = "Res";
        $student -> bio = "Res";
        $student -> id_role = 3;
        $student -> status = $request->input('status');

        // Guardar l'alumne a la BBDD amb les noves dades
        $student -> save();

        // Tornar a la llista d'alumnes

        $students = DB::table('users')->where('id_role', 3)->get();

        return redirect()->route('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) -1));


    }

    public function destroyStudent ($id) {
        $student = User::find($id);
        $student -> status = 'inactive';
        $student -> save();

        $students = DB::table('users')->where('id_role', 3)->get();

        return redirect()->route('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) -1));
    }

        /** Extreu els usuaris que tenen ID de rol 3 (Alumne), després retorna la vista per a llistar-los. */

    public function indexProfessor()
    {
        //
        $professors = DB::table('users')->where('id_role', 4)->get();

        return view ('professors.index', compact('professors'));
    }

    /**
     * Retorna la vista amb el formulari de creació d'alumnes.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProfessor()
    {
        return view('professors.create');
    }

    /** Crea el nou alumne a partir de les dades donades al formulari.
     *  @param $request
     */

    public function storeProfessor(Request $request)
    {
        // Instanciar
        $professor = new User;

        // Assignació de valors a les propietats
        $professor -> firstname = $request->input('firstname');
        $professor -> lastname = $request->input('lastname');
        $professor -> name = $request->input('name');
        $professor -> dni = $request->input('dni');
        $professor -> email = $request->input('email');
        $professor -> birthdate = $request->input('birthdate');
        $professor -> password = $request->input('password');
        $professor -> id_city = 1;
        $professor -> profile_pic = "Res";
        $professor -> bio = "Res";
        $professor -> id_role = 4;
        $professor -> status = "active";

        // Guardar alumne a la BBDD
        $professor -> save();

        // Tornar a la llista d'alumnes

        $professors = DB::table('users')->where('id_role', 4)->get();

        return redirect()->route('professors.index',compact('professors'))
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
