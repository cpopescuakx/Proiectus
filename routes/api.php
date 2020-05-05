<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Ruta per a l'API d'empleats
Route::resource('empleats', 'UserController');

//Ruta per a l'API de posts
Route::get('posts', 'PostController@showApi');

//Ruta per a l'API de propostes
Route::get('proposals', 'ProposalController@showApi');

//Ruta per a l'API de gestors
Route::get('companies', 'CompanyController@showApi');

//Ruta per a l'API de professors (retorna la quantitat de professors existens)
Route::get('professors/num', 'UserController@getNumProfessors');

//Ruta per a l'API de projectes
Route::get('projects', 'ProjectController@indexApi');

//Ruta per a l'API de estudiants (retorna tots els usuaris amb rol 3)
Route::get('students', 'UserController@getStudents');

//Ruta per a l'API de cities
Route::get('cities', 'CityController@showApi');

// API FAQ
Route::get('faq', 'FaqController@getApi');
