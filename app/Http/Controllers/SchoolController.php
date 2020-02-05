<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['schools'] = School::orderBy('id_school','desc')->paginate(10);
        return view('school.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('school.create');
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
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'code' => 'required',
            'type' => 'required',
        ]);

        School::create($request->all());

        return Redirect::to('school')
       ->with('Éxit! L institut s ha creat correctament!');

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
        $where = array('id_school' => $id);
        $data['school'] = School::where($where)->first();

        return view('school.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $insti)
    {
        //
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'code' => 'required',
            'type' => 'required',
        ]);

        School::find($request->id)->update($request->all());
        return redirect()->route('school.index')
                         ->with('Éxit','L institut s ha modificat correctament!');

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
        School::destroy($id);
        return redirect()->route('school.index')
                         ->with('Exit', 'L institut s ha borrat correctament!');
    }
}
