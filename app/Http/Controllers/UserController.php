<?php

namespace App\Http\Controllers;
use App\School;
use App\School_users;
use App\User;
use App\City;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\Log;


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

    //Mostrar dades al perfil del usuari
    public function indexProfile($id){
        $managers = User::where('id', $id)->get();

        return view('managers.indexP1', compact('managers'));
    }

    //Editar les dades del usuari
    public function editProfile($id){
        $managers = User::find($id);
        $cities = City::distinct()->select("name")->get();
        $nomCiutat = CityController::agafarNom($managers->id_city);

        return view('managers.editP', compact('managers', 'cities', 'nomCiutat'));
    }

    //Modificar les dades del usuari de la base de dades
    public function updateProfile(Request $request){
        $id = $request->route('id'); // Agafar l'ID de la URL

        // Cercar el gestor amb la mateixa ID de la BBDD
        $managers = User::find($id);

        // Assignar els valors del formulari
        $managers -> firstname = $request->input('firstname');
        $managers -> lastname = $request->input('lastname');
        $managers -> username = $request->input('username');
        $managers -> dni = $request->input('dni');
        $managers -> email = $request->input('email');
        $managers -> birthdate = $request->input('birthdate');
        $managers -> password = $request->input('password');
        $nom = $request->input('city');
        $managers -> id_city = CityController::agafarID($nom);
        $managers -> profile_pic = "Res";
        $managers -> bio = "Res";
        $managers -> status = $request->input('status');

        // Guardar el gestor a la BBDD amb les noves dades
        $managers -> save();

        // Tornar a la llista de gestors

        $managers = User::where('id', $id)->get();

        return redirect()->route('managers.indexP1',compact('managers', 'id'));
    }
    /** DESACTIVAR MANAGER
     *
     *  Cambia a estado inactivo a un determinado manager
     *
     *  @author cmasana 
     *  @param id
     *  @var user
     *  @return view index.index (Página inicio)
     * */
    public function destroyProfile ($id) {

        $user = User::find($id);
        $user->status = 'inactive';
        $user->save();

        return redirect()->back();

    }

    /** ACTIVAR MANAGER
     *
     *  Cambia a estado activo a un determinado manager
     *
     *  @author cmasana 
     *  @param id
     *  @var user
     *  @return view managers.indexP1 (Página perfil)
     * */

    public function activeProfile($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();

        return redirect()->back();
    }

    /** LLISTAR GESTORS
     *
     *  Extreu els usuaris que tenen ID de rol 5 (gestor), després retorna la vista per a llistar-los.
     *
     *  @author xavier romeu
     *  @param void
     *  @var managers variable per emmagatzemar les dades del usuari i llistar-los
     *  @return view managers.index
     * */
    public function indexManager(){
        //Mostrem tots els usuaris amb id de rol 5 (gestors)
        $data['managers'] = User::where('id_role', 5)->get();

        return view('managers.index',$data);

    }

    /** CREAR GESTORS
     *
     *  Retorna la vista amb el formulari de creació de gestors. Passant els noms de les ciutats
     *  que tenim a la base de dades, per a poder fer el datalist.
     *
     *  @author xavier romeu
     *  @param void
     *  @var cities variable per agafar la id de la ciutat seleccionada al crear un gestor i emmagatzemarla
     *  @return \Illuminate\Http\Response
     **/

    public function createManager(){

        $cities = City::all();
        return view('managers.create',compact('cities'));

    }
    /** GUARDAR GESTORS
     *
     *  Emmagatzema les dades del nou gestor entrades per l'usuari i les emmagatzema a la base de dades
     *
     *  @author xavier romeu
     *  @param void
     *  @var manager variable per emmagatzemar les dades del usuari introduides per crear un nou manager
     *  @return \Illuminate\Http\Response
     **/
    public function storeManager(Request $request){

         // Instanciar
        $manager = new User;

        // Assignació de valors a les propietats
        $manager -> firstname = $request->input('firstname');
        $manager -> lastname = $request->input('lastname');
        $manager -> username = $request->input('username');
        $manager -> dni = $request->input('dni');
        $manager -> email = $request->input('email');
        $manager -> birthdate = $request->input('birthdate');
        $manager -> password = $request->input('password');
        $postalcode = $request->input('city');
        $manager -> id_city = CityController::getIdFromPostalCode($postalcode);
        $manager -> profile_pic = "Res";
        $manager -> bio = "Res";
        $manager -> id_role = 5;
        $manager -> status = "active";

        // Guardar gestors a la BBDD
        $manager -> save();

        // Tornar a la llista de gestors
        $manager = User::where('id_role', 5)->get();

        return redirect()->route('managers.index',compact('manager'));

    }

    /** EDITAR GESTOR
     *
     *  Retorna el formulari de modificació de gestors. Passant els gestors a partir de l'ID.
     *
     *  @author xavier romeu
     *  @param int $id
     *  @var managers variable per emmagatzemar les dades del usuari a modificades
     *  @return view managers.edit per a mostrar el formulari d'edicio de managers
     */
    public function editManager($id){

        $managers = User::find($id);
        $cities = City::all();
        $nomCiutat = CityController::agafarNom($managers->id_city);

        return view('managers.edit', compact('managers', 'cities', 'nomCiutat'));
    }

    /** UPDATE GESTORS
     *
     *  Guarda les noves dades dels gestors a la base de dades. Llavors, redirecciona
     *  al llistat de gestors.
     *
     *  @author xavier romeu
     *  @param Request $request
     *  @var managers variable per emmagatzemar les dades del usuari modificades a la base de dades
     *  @return void
     */
    public function updateManager (Request $request) {

        $id = $request->route('id'); // Agafar l'ID de la URL

        // Cercar el gestor amb la mateixa ID de la BBDD
        $managers = User::find($id);

        // Assignar els valors del formulari
        $managers -> firstname = $request->input('firstname');
        $managers -> lastname = $request->input('lastname');
        $managers -> username = $request->input('username');
        $managers -> dni = $request->input('dni');
        $managers -> email = $request->input('email');
        $managers -> birthdate = $request->input('birthdate');
        $managers -> password = $request->input('password');
        $nom = $request->input('city');
        $managers -> id_city = CityController::agafarID($nom);
        $managers -> profile_pic = "Res";
        $managers -> bio = "Res";
        $managers -> id_role = 5;
        $managers -> status = $request->input('status');

        // Guardar el gestor a la BBDD amb les noves dades
        $managers -> save();

        // Tornar a la llista de gestors

        $managers = User::where('id_role', 5)->get();

        return redirect()->route('managers.index',compact('managers'));
    }
    /** DESTROY GESTORS
     *
     *  Busca al gestor amb l'ID passada com a paràmetre i passa el seu estat a inactive.
     *  Redirecciona al llistat de gestors.
     *
     *  @author xavier romeu
     *  @param int $id
     *  @var managers variable per emmagatzemar les dades del usuari canviant a inactiu el camp d'estat dels managers
     *  @return void
     */

    public function destroyManager ($id) {

        $managers = User::find($id);
        $managers -> status = 'inactive';
        $managers -> save();

        $managers = User::where('id_role', 5)->get();

        return redirect()->route('managers.index',compact('managers'));
    }

    /** INDEX DELS ALUMNES
     *
     * Retorna la vista que conte la taula amb el llistat de tots els alumnes, així com les opcions d'aquests
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexStudent()
    {
        $students = User::where('id_role', 3)->get();

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
        $cities = City::all();
        $schools = School::all();

        return view('students.create',compact('cities', 'schools'));
    }

    /** GUARDAR ALUMNE
     *
     *  Guarda el nou alumne a la base de dades a partir de les dades donades al formulari.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeStudent(Request $request)
    {
        //dd($request);
        
        DB::transaction(function() use ($request){
            // Instanciar
            $student = new User;

            // Assignació de valors a les propietats del alumne
            $student -> firstname = $request->input('firstname');
            $student -> lastname = $request->input('lastname');
            $student -> username = $request->input('username');
            $student -> dni = $request->input('dni');
            $student -> email = $request->input('email');
            $student -> birthdate = $request->input('birthdate');
            $student -> password = Hash::make($request->input('password'));
            $postalcode = $request->input('city');
            $student -> id_city = CityController::getIdFromPostalCode($postalcode);
            $student -> profile_pic = "Res";
            $student -> bio = "Res";
            $student -> id_role = 3;
            $student -> status = "active";

            // Guardar alumne a la BBDD
            $student -> save();

            // Creem un objecte school_users per a controlar a quin institut pertany l'alumne
            $school_user = new School_users;
            $school_user -> id_user = $student->id;
            $school_user -> id_school = $request->input('school');

            // Guardar a quin centre pertany l'alumne
            $school_user -> save();
            Log::info($request->user()->username. ' - [ INSERT ] - school_users - Nou alumne: ' .$school_user -> id_user. ' inserit!');

        }, 2);

        // Tornar a la llista d'alumnes
        $student = User::where('id_role', 3)->get();
        Log::info($request->user()->username. ' - [ INSERT ] - users - Nou alumne: ' .$request -> username. ' inserit!');

        return redirect()->route('students.index',compact('student'));
    }


    /** EDITAR ALUMNE
     *
     *  Retorna el formulari de modificació d'alumnes. Passant l'alumne a partir de l'ID.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editStudent ($id) {
        $student = User::find($id);
        $cities = City::all();
        $schools = School::all();


        return view('students.edit', compact('student', 'cities', 'schools'));
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
        $students = User::find($id);
        $studentVell = User::find($id);

        // Assignar els valors del formulari
        $students -> firstname = $request->input('firstname');
        $students -> lastname = $request->input('lastname');
        $students -> username = $request->input('username');
        $students -> dni = $request->input('dni');
        $students -> email = $request->input('email');
        $students -> birthdate = $request->input('birthdate');
        $password = $request->input('password');
        if (isset($password)) {
            $students -> password = Hash::make($password);
        }
        $postalcode = $request->input('city');
        $students -> id_city = CityController::getIdFromPostalCode($postalcode);
        $students -> profile_pic = "Res";
        $students -> bio = "Res";
        $students -> id_role = 3;
        $students -> status = $request->input('status');

        // Guardar l'alumne a la BBDD amb les noves dades
        $students -> save();

        $school_user = School_users::where('id_user',$id)->first();
        $school_userVell = School_users::where('id_user',$id)->first();

        if(!is_object($school_user)) {
            $school_user = new School_users();
            $school_user -> id_school = $request->input('school');
            $school_user -> id_user = $id;
            $school_user->save();
        } else {
            $school_user = School_users::where('id_user', $id)->first();
            //dd($school_user);
            $school_user -> id_school = $request->input('school');
            $school_user->save();
        }

        // Tornar a la llista d'alumnes
        Log::info($request->user()->username. ' - [ UPDATE ] - users - Alumne: ' .$studentVell -> username. ' modificat! - (' .$studentVell -> firstname. ', ' .$studentVell -> lastname. ', ' .$studentVell -> username. ', ' .$studentVell -> email. ', ' .$studentVell -> id_city. ', ' .$studentVell -> dni. ', ' .$studentVell -> birthdate. ', ' .$studentVell -> status.' -> ' .$students -> firstname. ', ' .$students -> lastname. ', ' .$students -> username. ', ' .$students -> email. ', ' .$students -> id_city. ', ' .$students -> dni. ', ' .$students -> birthdate. ', ' .$students -> status. ').');
        Log::info($request->user()->username. ' - [ UPDATE ] - school_users - Alumne: ' .$school_userVell -> id_user. ' modificat! - (' .$school_userVell -> id_user. ', ' .$school_userVell -> id_school.' -> ' .$school_user -> id_user. ', ' .$school_user -> id_school. ').');

        $students = User::where('id_role', 3)->get();
        return redirect()->route('students.index',compact('students'));
    }

    /** DESTROY STUDENT
     *
     *  Busca l'alumne amb l'ID passada com a paràmetre i passa el seu estat a inactive.
     *  Redirecciona al llistat d'alumnes.
     *
     *  @param int $id
     *  @return void
     */
    public function destroyStudent (Request $request, $id) {
        $students = User::find($id);
        $students -> status = 'inactive';
        $students -> save();
        Log::info($request->user()->username. ' - [ UPDATE ] - users - Alumne: ' .$students -> username. ' donat de baixa!');

        $students = User::where('id_role', 3)->get();
        return redirect()->route('students.index',compact('students'));
    }

    public function enableStudent (Request $request, $id) {
        $students = User::find($id);
        $students -> status = 'active';
        $students -> save();
        Log::info($request->user()->username. ' - [ UPDATE ] - users - Alumne: ' .$students -> username. ' donat de alta!');

        $students = User::where('id_role', 3)->get();
        return redirect()->route('students.index',compact('students'));
    }



        /** Extreu els usuaris que tenen ID de rol 4 (Professor), després retorna la vista per a llistar-los. */

    public function indexProfessor()
    {
        //
        $professors = User::where('id_role', 4)->get();

        return view ('professors.index', compact('professors'));
    }

    /**
     * Retorna la vista amb el formulari de creació d'professors.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProfessor()
    {
      $cities = City::distinct()->select("name")->get();
      return view('professors.create',compact('cities'));
    }

    /** Crea el nou professor a partir de les dades donades al formulari.
     *  @param $request
     */

    public function storeProfessor(Request $request)
    {
        // Instanciar
        $professor = new User;

        // Assignació de valors a les propietats
        $professor -> firstname = $request->input('firstname');
        $professor -> lastname = $request->input('lastname');
        $professor -> username = $request->input('username');
        $professor -> dni = $request->input('dni');
        $professor -> email = $request->input('email');
        $professor -> birthdate = $request->input('birthdate');
        $professor -> password = $request->input('password');
        $nom = $request->input('city');
        $professor -> id_city = CityController::agafarID($nom);
        $professor -> profile_pic = "Res";
        $professor -> bio = "Res";
        $professor -> id_role = 4;
        $professor -> status = "active";

        // Guardar professor a la BBDD
        $professor -> save();

        // Tornar a la llista d'professors

        $professors = User::where('id_role', 4)->get();

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
        $cities = City::distinct()->select("name")->get();
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
        $professor -> username = $request->input('username');
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

        $professors = User::where('id_role', 4)->get();

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

        $professors = User::where('id_role', 4)->get();

        return redirect()->route('professors.index',compact('professors'))
        ->with('i', (request()->input('page', 1) -1));
    }

    /** LLISTAR EMPLEATS
     *
     *  Extreu els usuaris que tenen ID de rol 2 (Empleat), mostrar-ne els actius/innactius, indicats amb el deplegable,
     *  després els retorna la vista per a llistar-los.
     *
     *  @param Request $request Obtenim el tipo d'estat dels empleats a mostrar.
     *  @return void
     * */
    public function indexEmployee(Request $request)
    {
        $tipo = $request->get('tipo');

        $employees = User::where('id_role',2)->tipo($tipo)->paginate(5);

        return view ('employees.index', compact('employees'));

    }


    /** CREAR EMPLEAT
     *
     *  Retorna la vista amb el formulari de creació d'empleats. Passant els noms de les ciutats
     *  que tenim a la base de dades, per a poder fer el datalist.
     *
     *  @param void
     *  @return void
     */
    public function createEmployee()
    {
        $cities = City::distinct()->select("name")->get();
        return view('employees.create',compact('cities'));
    }


    /** DONAR D'ALTA TOT TIPUS D'USUARIS
     *
     *  Indiquem la id de l'usuari el qual volem donar d'alta i redireccionem a la vista anterior.
     *
     *  @param int $id Conté la ID de l'usuari.
     *  @return void
     * */

    public function activeUser($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();
        return redirect()->back();
    }

    /** EDITAR EMPLEAT
     *
     *  Retorna el formulari de modificació d'empleats. Passant l'empleat a partir de l'ID.
     *
     *  @param int $id Conté la ID de l'usuari.
     *  @return void
     */
    public function editEmployee ($id) {
        $employee = User::find($id);
        $cities = DB::table('cities')->distinct()->select("name")->get();
        $nomCiutat = CityController::agafarNom($employee->id_city);

        return view('employees.edit', compact('employee', 'cities', 'nomCiutat'));
    }

    /** UPDATE Empleat
     *
     *  Guarda les noves dades de l'empleat a la base de dades. Llavors, redirecciona
     *  al llistat d'empleats.
     *
     *  @param Request $request Conté totes les dades de l'empleat.
     *  @return void
     */

    public function updateEmployee (Request $request) {

        $id = $request->route('id'); // Agafar l'ID de la URL

        // Cercar l'empleat amb la mateixa ID de la BBDD
        $employee = User::find($id);

        // Assignar els valors del formulari
        $employee -> firstname = $request->input('firstname');
        $employee -> lastname = $request->input('lastname');
        $employee -> username = $request->input('username');
        $employee -> dni = $request->input('dni');
        $employee -> email = $request->input('email');
        $employee -> birthdate = $request->input('birthdate');
        $employee -> password = $request->input('password');
        $nom = $request->input('city');
        $employee -> id_city = CityController::agafarID($nom);
        $employee -> profile_pic = "Res";
        $employee-> bio = $request->input('bio');
        $employee -> id_role = 2;

        // Guardar l'empleat a la BBDD amb les noves dades
        $employee -> save();


        // Tornem a carregar la llista d'empleats
        $employees = User::where('id_role', 2);

        // Retornem la vista on mostrarem els empleats i ell llistat d'aquests
        return redirect()->route('employee.index',compact('employees'));

    }

    /** STORE Empleat
     *
     * Guardar l'empleat a la base de dades
     *
     * @param  Request $request Conté les dades de l'empleat.
     * @return void
     */
    public function storeEmployees(Request $request)
    {
         // Instanciar
        $employee= new User;

        // Assignació de valors a les propietats
        $employee-> firstname = $request->input('firstname');
        $employee-> lastname = $request->input('lastname');
        $employee-> username = $request->input('username');
        $employee-> dni = $request->input('dni');
        $employee-> email = $request->input('email');
        $employee-> birthdate = $request->input('birthdate');
        $employee-> password = $request->input('password');
        $nom = $request->input('city');
        $employee-> id_city = CityController::agafarID($nom);
        $employee-> profile_pic = "Res";
        $employee-> bio = $request->input('bio');
        $employee-> id_role = 2;
        $employee-> status = "active";

        // Guardar alumne a la BBDD
        $employee-> save();

        // Tornar a la llista d'empleats
        $employees = User::where('id_role', 2)->get();

        return redirect()->route('employee.index',compact('employees'));
    }

     /** DESTROY Empleat
      *
     * Donar de baixa un empleat (Canvia l'estat a inactiu)
     *
     * @param  int  $id Conté la id de l'empleat
     * @return void
     */
    public function destroyEmployee($id)
    {
        $employee = User::find($id);
        $employee -> status = 'inactive';
        $employee -> save();

        $employees = User::where('id_role', 2)->get();

        return redirect()->route('employee.index',compact('employees'))
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



    /** Buscar usuari
     *
     *  Busca l'usuari que té l'ID passada com a paràmetre.
     *
     *  @param void
     *  @return User $user
     */

    public static function getUser ($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function getNumProfessors()
    {
        return count(User::where('id_role', 4)->get());
    }

    public function getStudents()
    {
        return User::where('id_role', 3)->get();
    }

}
