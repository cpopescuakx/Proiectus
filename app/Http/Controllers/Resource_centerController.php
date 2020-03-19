<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Resource_centerController extends Controller
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

    public function resources()
    {
        return view('resourceCenter.upload');
    }

    public function uploadResource(Request $request)
    {
        $dbFile = new Resource_center;
        $resources=array();
        if($files=$request->file('resources')){
            foreach($files as $file){
                $path = time().$file->getClientOriginalName();
                $file->move('resources', $path);
                $nomOriginal = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $size = 100;

                $dbFile -> f_name = $nomOriginal;
                $dbFile -> f_ext = $ext;
                $dbFile -> f_route = 'resources/'.$path;
                $dbFile -> f_weight = $size;
                $dbFile -> id_project = 12;
                $dbFile -> save();
            }
        }
        return redirect()->back();
    }
}
