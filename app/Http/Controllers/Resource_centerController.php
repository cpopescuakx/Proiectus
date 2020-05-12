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
     * Busca el fitxer passat com a paràmetre i l'esborra tant del servidor 
     * com de la base de dades. Llavors torna a la pàgina principal del projecte.
     *
     * @param  String $path
     * @return void
     */

    public function destroy($path)
    {
        $file = Resource_center::where('f_route', '=', $path)->first();
        File::delete(public_path('resources/'.$file -> f_route));
        Resource_center::where('f_route', '=', $path)->delete();  // S'ha de tornar a utilitzar eloquent perque no té la columna id (té id_file)     
        return redirect()->back();
    }


    /** Puja el/els fitxer/s seleccionats a la carpeta public/resources,
     *  afegint al seu nom el temps actual per a evitar duplicats (i sobreescriptures).
     *  També ho registra a la base de dades.
     * 
     *  @param Request $request
     *  @param Integer $id_project
     *  @return void
     *  
     */

    public function uploadResource(Request $request, $id_project)
    {
        
        $resources=array();
        if($files=$request->file('resources')){
            foreach($files as $file){
                $dbFile = new Resource_center;
                $path = time().$file->getClientOriginalName();
                $file->move(public_path('resources'), $path);
                $nomOriginal = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $size = File::size(public_path('resources/'.$path));

                $dbFile -> f_name = $nomOriginal;
                $dbFile -> f_ext = $ext;
                $dbFile -> f_route = $path;
                $dbFile -> f_weight = $size;
                $dbFile -> id_project = $id_project;
                $dbFile -> save();
            }
        }
        return redirect()->back();
    }

    /**
     * Busca l'arxiu seleccionat passant la seva ruta com a paràmetre.
     * Canvia el nom del fitxer per l'original i el descarrega.
     * 
     * @param $path
     * @return \Illuminate\Http\Response
     */

    public function downloadFile($path)
    {
        $pathFile = public_path('resources/'.$path);
        $original = Resource_center::where('f_route', '=', $path)->get();
        $originalName = $original[0]->f_name;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];


        return response()->download($pathFile, $originalName, $headers);
    }
}
