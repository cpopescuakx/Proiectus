<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Resource_center;
use Illuminate\Support\Facades\File;

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

    public function resources($id_project)
    {
        return view('resourceCenter.upload', 'id_project');
    }

    public function uploadResource(Request $request, $id_project)
    {
        
        $resources=array();
        if($files=$request->file('resources')){
            foreach($files as $file){
                $dbFile = new Resource_center;
                $path = time().$file->getClientOriginalName();
                $file->move('resources', $path);
                $nomOriginal = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $size = File::size(public_path('resources/'.$path));

                $dbFile -> f_name = $nomOriginal;
                $dbFile -> f_ext = $ext;
                $dbFile -> f_route = 'resources/'.$path;
                $dbFile -> f_weight = $size;
                $dbFile -> id_project = $id_project;
                $dbFile -> save();
            }
        }
        return redirect()->back();
    }
}
