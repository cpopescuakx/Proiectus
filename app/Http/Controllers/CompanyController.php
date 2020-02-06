<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//USE AFEGITS!!!!!
use App\user;
use Redirect;
use PDF;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['companies'] = user::orderBy('id_user','desc')->paginate(10);
      return view('user.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POSAR ELS CAMPS DE LA TAULA OBLIGATORIS
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'nif' => 'required',
            'sector' => 'required',
            'status' => 'active',
        ]);

        user::create($request->all());

        return Redirect::to('companies')
       ->with('Éxit! L empresa s ha creat correctament!');
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
        $where = array('id_user' => $id);
        $data['user_info'] = user::where($where)->first();

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,user $id)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'nif' => 'required',
            'sector' => 'required',
            'status' => 'required',
        ]);


         user::findOrFail($id)->first()->fill($request->all())->save();
         //user::find($request->id)->update($request->all());
         return redirect()->route('user.index')
                          ->with('Éxit','L empresa s ha modificat correctament!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::where('id_user',$id)->delete();

        return Redirect::to('companies')->with('Éxit','L empresa s ha eliminat correctament!');
    }
}
