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
Route::resource('proposals', 'ProposalAPI');
//Ruta per a l'API de gestors
Route::get('companies', 'CompanyController@showApi');
