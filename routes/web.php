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

Route::get('Project','ProjectController@index')
-> name('projects.index');

Route::get('Project/create', function(){
    return view ('projects.create');
})->name('projects.create');

Route::post('Project/create/success', 'ProjectController@store')
->name('projects.store');

Route::get('Students', 'UserController@indexStudent')
->name('students.index');

/* Route::post('projects', 'ProjectController@destroy')
->name('projects.destroy'); */
