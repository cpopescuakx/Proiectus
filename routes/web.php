<?php

use Illuminate\Http\Request;
use App\Project;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Project','ProjectController');

Route::get('projects/create', function(){
    return view ('projects.create');
})->name('projects.create');

Route::post('projects', function(Request $request){
    //return $request->all();

    // Instanciar
    $projecte = new Project;

    // Assignar valors del formulari
    $projecte -> name = $request->input('name');
    $projecte -> budget = $request->input('budget');
    $projecte -> description = $request->input('desc');
    $projecte -> professional_family = $request->input('pro_family');

    // Guardar
    $projecte -> save();
})->name('projects.store');