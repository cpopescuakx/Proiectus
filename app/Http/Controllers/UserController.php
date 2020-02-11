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
    public function indexManager(){
        $managers = DB::table('users')->where('id_role', 5)->get();
        return view ('managers.index', compact('managers'));
    }

    public function createManager(){
        $cities = DB::table('cities')->distinct()->select("name")->get();
        return view('managers.create',compact('cities'));
    }

    public function storeManager(Request $request){
      
        $manager = new User;

        // Assignació de valors a les propietats
        $manager -> firstname = $request->input('firstname');
        $manager -> lastname = $request->input('lastname');
        $manager -> name = $request->input('name');
        $manager -> dni = $request->input('dni');
        $manager -> email = $request->input('email');
        $manager -> birthdate = $request->input('birthdate');
        $manager -> password = $request->input('password');
        $nom = $request->input('city');
        $manager -> id_city = CityController::agafarID($nom);
        $manager -> profile_pic = "Res";
        $manager -> bio = "Res";
        $manager -> id_role = 5;
        $manager -> status = "active";

        // Guardar alumne a la BBDD
        $manager -> save();

        // Tornar a la llista d'alumnes

        $managers = DB::table('users')->where('id_role', 5)->get();

        return redirect()->route('managers.index',compact('managers'))
        ->with('i', (request()->input('page', 1) -1));
    }

    public function editManager($id){
        $manager = User::find($id);
        $cities = DB::table('cities')->distinct()->select("name")->get();
        $nomCiutat = CityController::agafarNom($student->id_city);

        return view('students.edit', compact('student', 'cities', 'nomCiutat'));
    }

    public function updateManager (Request $request) {

        $id = $request->route('id'); // Agafar l'ID de la URL

        // Cercar l'alumne amb la mateixa ID de la BBDD
        $manager = User::find($id);

        // Assignar els valors del formulari
        $manager -> firstname = $request->input('firstname');
        $manager -> lastname = $request->input('lastname');
        $manager -> name = $request->input('name');
        $manager -> dni = $request->input('dni');
        $manager -> email = $request->input('email');
        $manager -> birthdate = $request->input('birthdate');
        $manager -> password = $request->input('password');
        $nom = $request->input('city');
        $manager -> id_city = CityController::agafarID($nom);
        $manager -> profile_pic = "Res";
        $manager -> bio = "Res";
        $manager -> id_role = 3;
        $manager -> status = $request->input('status');

        // Guardar l'alumne a la BBDD amb les noves dades
        $manager -> save();

        // Tornar a la llista d'alumnes

        $managers = DB::table('users')->where('id_role', 5)->get();

        return redirect()->route('managers.index',compact('managers'))
        ->with('i', (request()->input('page', 1) -1));

    }

    public function destroyManager ($id) {
        $manager = User::find($id);
        $manager -> status = 'inactive';
        $manager -> save();

        $manager = DB::table('users')->where('id_role', 5)->get();

        return redirect()->route('managers.index',compact('managers'))
        ->with('i', (request()->input('page', 1) -1));
    }

    public function indexStudent()
    {
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
     **/

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

    /** UPDATE ALUMNE
     *
     *  Guarda les noves dades de l'alumne a la base de dades. Llavors, redirecciona
     *  al llistat d'alumnes.
     *
     *  @param Request $request
     *  @return void
     */

    public function updateStudent (Request $request) {

        $id = $request->route('id'); // Agafar l'ID de la URL

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

    /** DESTROY STUDENT
     *
     *  Busca l'alumne amb l'ID passada com a paràmetre i passa el seu estat a inactive.
     *  Redirecciona al llistat d'alumnes.
     *
     *  @param int $id
     *  @return void
     */

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

    /** EDITAR Professor
     *
     *  Retorna el formulari de modificació d'profes. Passant l'profe a partir de l'ID.
     *
     *  @param int $id
     *  @return void
     */
    public function editProfessor ($id) {
        $professor = User::find($id);
        $cities = DB::table('cities')->distinct()->select("name")->get();
        $nomCiutat = CityController::agafarNom($professor->id_city);

        return view('professors.edit', compact('professor', 'cities', 'nomCiutat'));
    }

    /** UPDATE Professor
     *
     *  Guarda les noves dades de l'profe a la base de dades. Llavors, redirecciona
     *  al llistat d'profes.
     *
     *  @param Request $request
     *  @return void
     */

    public function updateProfessor (Request $request) {

        $id = $request->route('id'); // Agafar l'ID de la URL

        // Cercar l'profe amb la mateixa ID de la BBDD
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
        $professor -> id_role = 3;
        $professor -> status = $request->input('status');

        // Guardar l'profe a la BBDD amb les noves dades
        $professor -> save();

        // Tornar a la llista d'profes

        $professors = DB::table('users')->where('id_role', 4)->get();

        return redirect()->route('professors.index',compact('professors'))
        ->with('i', (request()->input('page', 1) -1));

    }

    /** DESTROY Professor
     *
     *  Busca l'profe amb l'ID passada com a paràmetre i passa el seu estat a inactive.
     *  Redirecciona al llistat d'profes.
     *
     *  @param int $id
     *  @return void
     */

    public function destroyProfessor ($id) {
        $professor = User::find($id);
        $professor -> status = 'inactive';
        $professor -> save();

        $professors = DB::table('users')->where('id_role', 4)->get();

        return redirect()->route('professors.index',compact('professors'))
        ->with('i', (request()->input('page', 1) -1));
    }

    /** LLISTAR EMPLEATS
     *
     *  Extreu els empleats que tenen ID de rol 4 (Empleat), després retorna la vista per a llistar-los.
     *
     *  @param void
     *  @return void
     * */

    public function indexEmployee()
    {
        //
        $employees = DB::table('users')->where('id_role', 4)->get();

        return view ('employees.index', compact('employees'));
    }

    /** CREAR EMPLEAT
     *
     *  Retorna la vista amb el formulari de creació d'empleats. Passant els noms de les ciutats
     *  que tenim a la base de dades, per a poder fer el datalist.
     *
     *  @param void
     *  @return \Illuminate\Http\Response
     */
    public function createEmployee()
    {
        $cities = DB::table('cities')->distinct()->select("name")->get();
        return view('employees.create',compact('cities'));
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
