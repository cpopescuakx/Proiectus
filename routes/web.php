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
})-> name('projects.x');

/** Rutes per a l'apartat de gestió de projectes */

Route::get('Project','ProjectController@index')
-> name('projects.index');

Route::get('Project/create', function(){
    return view ('projects.create');
})->name('projects.create');

Route::post('Project/create/success', 'ProjectController@store')
->name('projects.store');

Route::get('Project/{id}/edit', function ($id) {
    Project::edit($id);
})->name('projects.edit');

/** Rutes per a l'apartat de gestió d'alumnes */

Route::get('Students', 'UserController@indexStudent')
->name('students.index');

Route::get('Students/create', function () {
    return view('students.create');
})->name('students.create');

Route::post('Students/create/success', 'UserController@storeStudent')
->name('students.store');

/** Rutes per a l'apartat de gestió de profes */

Route::get('Professors', 'UserController@indexProfessor')
->name('professors.index');

Route::get('Professors/create', function () {
    return view('professors.create');
})->name('professors.create');

Route::post('Professors/create/success', 'UserController@storeProfessor')
->name('professors.store');

/* Route::post('projects', 'ProjectController@destroy')
->name('projects.destroy'); */
