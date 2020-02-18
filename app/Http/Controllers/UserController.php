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
        $managers = User::where([['id_role', 5],['status','active'],])->get();

        return view('managers.index', compact('managers'));
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

        $cities = City::distinct()->select("name")->get();
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
        $cities = City::distinct()->select("name")->get();
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
        $managers -> name = $request->input('name');
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
        $cities = City::distinct()->select("name")->get();
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

        // Guardar gestors a la BBDD
        $student -> save();

        // Tornar a la llista de gestors
        $student = User::where('id_role', 3)->get();

        return redirect()->route('students.index',compact('student'));
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
        $cities = City::distinct()->select("name")->get();
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
        $students = User::find($id);

        // Assignar els valors del formulari
        $students -> firstname = $request->input('firstname');
        $students -> lastname = $request->input('lastname');
        $students -> name = $request->input('name');
        $students -> dni = $request->input('dni');
        $students -> email = $request->input('email');
        $students -> birthdate = $request->input('birthdate');
        $students -> password = $request->input('password');
        $nom = $request->input('city');
        $students -> id_city = CityController::agafarID($nom);
        $students -> profile_pic = "Res";
        $students -> bio = "Res";
        $students -> id_role = 3;
        $students -> status = $request->input('status');

        // Guardar l'alumne a la BBDD amb les noves dades
        $students -> save();

        // Tornar a la llista d'alumnes

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

    public function destroyStudent ($id) {
        $students = User::find($id);
        $students -> status = 'inactive';
        $students -> save();

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

    /** LLISTAR EMPLEATS ACTIUS
     *
     *  Extreu els empleats que tenen ID de rol 2 (Empleat) els quals tinguin com a estat (active), després retorna la vista per a llistar-los.
     *
     *  @param \Illuminate\Http\Request $request Obtenim el tipo d'estat dels empleats a mostrar
     *  @return \Illuminate\Http\Response
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
     *  @return \Illuminate\Http\Response
     */
    public function createEmployee()
    {
        $cities = DB::table('cities')->distinct()->select("name")->get();
        return view('employees.create',compact('cities'));
    }


    /** DONAR D'ALTA TOT TIPUS D'USUARIS
     *
     *  Indiquem la id de l'usuari el qual volem donar d'alta i redireccionem a la vista anterior.
     *
     *  @param $id Conté la ID de l'usuari
     *  @return \Illuminate\Http\Response
     * */

    public function activeUser($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();
        return redirect()->back();
    }

    /** EDITAR Empleat
     *
     *  Retorna el formulari de modificació d'empleats. Passant l'profe a partir de l'ID.
     *
     *  @param int $id
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
     *  @param Request $request
     *  @return void
     */

    public function updateEmployee (Request $request) {

        $id = $request->route('id'); // Agafar l'ID de la URL

        // Cercar l'empleat amb la mateixa ID de la BBDD
        $employee = User::find($id);

        // Assignar els valors del formulari
        $employee -> firstname = $request->input('firstname');
        $employee -> lastname = $request->input('lastname');
        $employee -> name = $request->input('username');
        $employee -> dni = $request->input('dni');
        $employee -> email = $request->input('email');
        $employee -> birthdate = $request->input('birthdate');
        $employee -> password = $request->input('password');
        $nom = $request->input('city');
        $employee -> id_city = CityController::agafarID($nom);
        $employee -> profile_pic = "Res";
        $employee-> bio = $request->input('bio');
        $employee -> id_role = 2;

        // Guardar l'empelat a la BBDD amb les noves dades
        $employee -> save();


        // Tornem a carregar la llista d'empleats
        $employees = User::where('id_role', 2);

        // Retornem la vista on mostrarem els empleats i ell llistat d'aquests
        return redirect()->route('employee.index',compact('employees'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployees(Request $request)
    {
         // Instanciar
        $employee= new User;

        // Assignació de valors a les propietats
        $employee-> firstname = $request->input('firstname');
        $employee-> lastname = $request->input('lastname');
        $employee-> name = $request->input('username');
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
    public function destroyEmployee($id)
    {
        $employee = User::find($id);
        $employee -> status = 'inactive';
        $employee -> save();

        $employees = User::where('id_role', 2)->get();

        return redirect()->route('employee.index',compact('employees'))
        ->with('i', (request()->input('page', 1) -1));
    }

    /** Buscar usuari
     *
     *  Busca l'usuari que té l'ID passada com a paràmetre.
     *
     *  @param void
     *  @return User $user
     */

    public function getUser ($id)
    {
        $user = User::find($id);
        return $user;
    }

}
