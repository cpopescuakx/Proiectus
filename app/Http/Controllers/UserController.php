<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = Users::orderBy('id', 'desc')->paginate(10);
        return view('user.list', $data);
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
        $request->validate([
            'name' => 'required',
            'firstname' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'password' => 'required'
        ]);

        User::create($request->all());

        return Redirect::to('users')
        ->with('Éxit! L usuari s ha creat correctament!');
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
        $where = array('id' => $id);
        $data['user_info'] = User::where($where)->first();

        return view('user.edit', $data);
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
        $request->validate([
            'name' => 'required',
            'firstname' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'password' => 'required'
        ]);

        $update = ['name' => $request->name, 
        'firstname' =>$request->firstname,
        'email' => $request->email,
        'dni' => $request->dni,
        'password' => $request->password
        ];
        User::where('id', $id)->update($update);

        return Redirect::to('users')
        ->with('Éxit! L usuari s ha modificat correctament!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return Redirect::to('users')
        ->with('Éxit! L usuari s ha eliminar correctament!');
    }
}
