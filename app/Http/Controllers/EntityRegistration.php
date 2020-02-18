<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Controllers\School_for_validationController;
use Illuminate\Http\Request;

class EntityRegistration extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::distinct()->select("name")->get();
        return view('entityRegistration.index', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, String $type)
    {
        if ($type == 'school') {
            $school = new School_for_validationController;
            $school->store($request);
        } else if ($type == 'company') {
            $company = new CompanyController;
            $company->store($request);
        }
    }

}
