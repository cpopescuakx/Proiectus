<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company; //afegit
use Redirect; //afegit
use PDF; //afegit

class CompanyController extends Controller
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

















    //GRUP1 ACCIONS
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCompany()
    {
      $data['companies'] = Company::orderBy('id_company','desc')->paginate(10);
      return view('companies.indexCompany',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCompany()
    {
        return view('companies.createCompany');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCompany(Request $request)
    {
        // POSAR ELS CAMPS DE LA TAULA OBLIGATORIS
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'nif' => 'required',
            'sector' => 'required',
            'status' => 'active',
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
    public function showCompany($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCompany($id)
    {
        $where = array('id_company' => $id);
        $data['company_info'] = Company::where($where)->first();

        return view('companies.editCompany', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(Request $request,Company $id)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'nif' => 'required',
            'sector' => 'required',
            'status' => 'required',
        ]);


         Company::findOrFail($id)->first()->fill($request->all())->save();
         //Company::find($request->id)->update($request->all());
         return redirect()->route('companies.indexCompany')
                          ->with('Éxit','L empresa s ha modificat correctament!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCompany($id)
    {
        Company::where('id_company',$id)->delete();

        return Redirect::to('companies')->with('Éxit','L empresa s ha eliminat correctament!');
    }
}
