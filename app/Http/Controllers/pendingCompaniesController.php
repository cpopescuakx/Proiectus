<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pendingCompaniesController extends Controller
{
    public function index()
    {
        return view('pendingCompanies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deny($id)
    {
        //
    }

}
