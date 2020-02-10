<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexManager()
    {
        $data['users'] = User::orderBy('id', 'desc')->paginate(10);
        return view('user.index', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createManager()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeManager(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'name' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('user.index')
                         ->with('funciona');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showManager(User $user)
    {
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editManager(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateManager(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'name' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'password' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('user.index')
                         ->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyManager(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
                         ->with('success');
    }
}
