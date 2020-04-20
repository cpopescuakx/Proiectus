<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSchool()
    {
        $data['schools'] = School::orderBy('id_school','desc')->paginate(10);
        return view('schools.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSchool()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSchool(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'code' => 'required',
            'type' => 'required',
        ]);

        School::create($request->all());
        Log::info($request->user()->username. ' - [ INSERT ] - schools - Nou centre: ' .$request -> name. ' inserit!');

        return redirect()->route('schools.index')->with('Éxit','L institut s ha modificat correctament!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSchool($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSchool($id)
    {
        $where = array('id_school' => $id);
        $data['school'] = School::where($where)->firstOrFail();

        return view('schools.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSchool(Request $request, $id)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'code' => 'required',
            'type' => 'required',
        ]);

        $schoolVell = School::find($request->id);
        School::find($request->id)->update($request->all());
        
        Log::info($request->user()->username. ' - [ UPDATE ] - schools - Centre: ' .$schoolVell -> name. ' modificat! - (' .$schoolVell -> name. ', ' .$schoolVell -> email. ', ' .$schoolVell -> code. ', ' .$schoolVell -> type. ' -> ' .$request -> name. ', ' .$request -> email. ', ' .$request -> code. ', ' .$request -> type. ').');
        return redirect()->route('schools.index')->with('Éxit','L institut s ha modificat correctament!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySchool(Request $request, $id)
    {
        $school = School::find($id);
        $school->delete();
        Log::info($request->user()->username. ' - [ DELETE ] - schools - Centre: ' .$school -> name. ' eliminat!');
        return redirect()->route('schools.index')->with('Exit', 'L institut s ha borrat correctament!');
    }
}
