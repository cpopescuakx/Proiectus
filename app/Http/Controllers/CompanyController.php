<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//USE AFEGITS!!!!!
use App\Company;
use Redirect;
use PDF;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['companies'] = Company::orderBy('id_company','desc')->paginate(10);
      return view('company.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
        ]);

        Company::create($request->all());

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
        $where = array('id_company' => $id);
        $data['company_info'] = Company::where($where)->first();

        return view('company.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $id)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'nif' => 'required',
            'sector' => 'required',
        ]);


         Company::findOrFail($id)->first()->fill($request->all())->save();
         //Company::find($request->id)->update($request->all());
         return redirect()->route('company.index')
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
        Company::where('id_company',$id)->delete();

        return Redirect::to('companies')->with('Éxit','L empresa s ha eliminat correctament!');
    }
}
