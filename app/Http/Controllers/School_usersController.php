<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School_users;
use App\Http\Controllers\Scool_usersController;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
}
