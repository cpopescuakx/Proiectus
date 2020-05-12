<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


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

        return redirect()->route('schools.index')->with('Èxit','L institut s ha modificat correctament!');
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

    /** 
     * Llista quantes propostes han creat els instituts.
     * -- Necessari utilitzar QUERY BUILDER --
     *  
     *  @param void
     *  @return 
     */


    public function leaderBoardSchools() {

        /** SELECT COUNT(school_users.id_school), schools.name FROM school_users, schools, proposals 
         *  WHERE school_users.id_user = proposals.id_author and school_users.id_school = schools.id_school group by school_users.id_school; */

        $instituts = DB::table(DB::raw('school_users, schools, proposals'))
                        ->select(DB::raw('count(school_users.id_school) as quantitat, schools.name'))
                        ->whereRaw(DB::raw('school_users.id_user = proposals.id_author'))
                        ->whereRaw(DB::raw('school_users.id_school = schools.id_school'))
                        ->groupBy(DB::raw('schools.name'))
                        ->orderBy('quantitat', 'DESC')
                        ->get();

        return view('schools.leaderBoard',  compact('instituts'));

    }
}
