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

Route::get('Project/{id}/edit', 'ProjectController@edit')
->name('projects.edit');

Route::post('Project/{id}/edit/success', 'ProjectController@update')
->name('projects.update');

Route::get('Project/{id}', 'ProjectController@destroy')
->name('projects.destroy');

/** Rutes per a l'apartat de gestió d'alumnes */

Route::get('Students', 'UserController@indexStudent')
->name('students.index');

Route::get('Students/create', 'UserController@createStudent')->name('students.create');

Route::post('Students/create/success', 'UserController@storeStudent')
->name('students.store');

Route::get('Students/{id}/edit', 'UserController@editStudent')
->name('students.edit');

Route::post('Students/{id}/edit/success', 'UserController@updateStudent')
->name('students.update');

Route::get('Students/{id}', 'UserController@destroyStudent')
->name('students.destroy');


/** Rutes per a l'apartat de gestió de profes */

Route::get('Professors', 'UserController@indexProfessor')
->name('professors.index');

Route::get('Professors/create', function () {
    return view('professors.create');
})->name('professors.create');

Route::post('Professors/create/success', 'UserController@storeProfessor')
->name('professors.store');

/** Rutes per a l'apartat del blog */
Route::resource('post', 'PostController');

Route::pattern('id_project', '[0-9]+');

Route::post('blog/{id_project}/post/store', 'PostController@store');

Route::get('blog/{id_project}', [
    'Middleware' => 'auth',
    'uses' => 'BlogController@index'
]);

Route::get('blog/{id_project}/post/{id_post}/edit', [
    'Middleware' => 'auth',
    'uses' => 'PostController@edit'
]);


/** Rutes per a l'apartat de la wiki */


/** Rutes per a l'apartat de perfils d'usuari */

