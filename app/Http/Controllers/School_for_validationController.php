<?php

namespace App\Http\Controllers;

use App\School_for_validation;
use App\School_users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class School_for_validationController extends Controller
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
        //dd($request->input('name'));
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'code' => 'required',
        ]);

        $school = new School_for_validation();
        $school->id_user = Auth::user()->id;
        $school->name = $request->name;
        $school->email = Auth::user()->email;
        $school->address = $request->address;
        $school->id_city = CityController::agafarID($request->city);
        $school->phone = $request->phone;
        $school->type = $request->type;
        $school->code = $request->code;
        $school->save();

        User::findOrFail(Auth::user()->id)->update(array('pending_entity_verification' => 1));
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
