<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use App\School_users;
use App\User;

class School_usersController extends Controller
{
    /**
     * 
     */

    public function index()
    {
        $users = User::all()->sortBy('firstname');
        return view('schools/schoolUser', compact('users'));
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
     *  Relaciona l'usuari que es passa com a request a l'escola passada
     *  com a paràmetre també.
     *
     *  @param  \Illuminate\Http\Request  $request
     *  @param  $idSchool
     *  @return Redirect
     */

    public function store($idSchool, Request $request)
    {
        $schoolUser = new School_users;
        $schoolUser -> id_user = $request->input('user');
        $schoolUser -> id_school = $idSchool;

        $schoolUser->save();

        return redirect()->route('schools.index'); 
        
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

    /**
     * Retorna el centre al qual pertany l'usuari que li entrem
     *
     * @param $id
     * @return mixed
     */
    public static function getUsersSchoolName($id) {
        $school_user = School_users::where('id_user',$id)->first();
        if (!isset($school_user->id_school)) {
            return "Cap";
        } else {
            return School::find($school_user->id_school);
        }
    }

    /** Comprova si l'usuari passat com a paràmetre pertany a un institut
     *  @param int $id
     */

    public static function checkUser($id) {
        $user = School_users::where('id_user', $id)->first();

        if(isset($user)) {
            return true;
        }
        else {
            return false;
        }
    }
}
