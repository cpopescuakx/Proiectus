<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;

class CityController extends Controller
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

    /**
     * Aquest mètode retorna la id de la ciutat, codipostal de la qual li entrem
     *
     * @param $postalcode
     * @return mixed
     */
    public static function getIdFromPostalCode($postalcode) {
        return (City::where("postalcode", $postalcode)->get()->first()) -> id_city;
    }

    /** AGAFAR ID
     *
     *  Agafa l'ID de la ciutat a partir del seu nom, com que hi ha duplicats a la base de dades
     *  agafa el primer resultat que troba.
     *
     *  @param String $name
     *  @return int $id
     */
    public static function agafarID ($name)
    {
        $city = City::where("name", $name)->get()->first();
        $id = $city->id_city;
        return $id;
    }

    /** AGAFAR NOM
     *
     *  Mostra el nom de la ciutat a partir de l'ID donada com a paràmetre.
     *
     *  @param int $id
     *  @return String $nomCiutat
     */

    public static function agafarNom ($id) {
        $city = City::where("id_city", $id)->get();
        $nomCiutat = $city[0]->name;
        return $nomCiutat;
    }

    /**
     * Retorna totes les ciutats per a la api de les ciutats
     *
     * @return City[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function showApi(){
        return City::All();
    }
}
