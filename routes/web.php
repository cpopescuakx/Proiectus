<?php

use Illuminate\Http\Request;

use App\Proposal;
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
})-> name('proposal.x');

/** Rutes per a l'apartat de gestió de propostes */

Route::get('Proposal','ProposalController@index')
-> name('proposal.index');

Route::get('Proposal/create', function(){
    return view ('projects.create');
})->name('proposal.create');

Route::post('Proposal/create/success', 'ProposalController@store')
->name('proposal.store');

Route::get('Proposal/{id}/edit', 'ProposalController@edit')
->name('proposal.edit');

Route::post('Proposal/{id}/edit/success', 'ProposalController@update')
->name('proposal.update');

Route::get('Proposal/{id}', 'ProposalController@destroy')
->name('proposal.destroy');

/** Rutes per a l'apartat de gestió d'empleats */

Route::get('Employee', 'UserController@indexEmployee')
->name('employee.index');

Route::get('Employee/create', 'UserController@createEmployee')->name('employee.create');

Route::post('Employee/create/success', 'UserController@storeEmployee')
->name('employee.store');

Route::get('Employee/{id}/edit', 'UserController@editEmployee')
->name('employee.edit');

Route::post('Employee/{id}/edit/success', 'UserController@updateEmployee')
->name('employee.update');

Route::get('Employee/{id}', 'UserController@destroyEmployee')
->name('employee.destroy');