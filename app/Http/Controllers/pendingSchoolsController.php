<?php

namespace App\Http\Controllers;

use App\School;
use App\School_for_validation;
use App\School_users;
use App\User;
use Illuminate\Http\Request;

class pendingSchoolsController extends Controller
{
    public function index()
    {
        $data['schools'] = School_for_validation::orderBy('id_school','desc')->paginate(10);
        return view('pendingSchools.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request)
    {
        $school_ = School_for_validation::findOrFail($request->id);
        $school = new School();
        $school->name = $school_->name;
        $school->email = $school_->email;
        $school->address = $school_->address;
        $school->id_city = $school_->id_city;
        $school->phone = $school_->phone;
        $school->type = $school_->type;
        $school->code = $school_->code;
        $school->save();

        School_users::create(array(
            'id_user' => $school_->id_user,
            'id_school' => $school->id_school
        ));

        User::findOrFail($school_->id_user)->update(array(
            'pending_entity_registration' => 0,
            'pending_entity_verification' => 0,
            'id_role' => 5
        ));

        School_for_validation::destroy($request->id);
        return redirect()->route('pendingSchools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deny(Request $request)
    {
        $school_ = School_for_validation::findOrFail($request->id);
        $school_->destroy();
        return redirect()->route('pendingSchools.index');
    }

}
