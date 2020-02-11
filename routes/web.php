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





//GRUP2
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

Route::get('Professors/{id}/edit', 'UserController@editProfessor')
->name('professors.edit');

Route::post('Professors/{id}/edit/success', 'UserController@updateProfessor')
->name('professors.update');

Route::get('Professors/{id}', 'UserController@destroyProfessor')
->name('professors.destroy');










//GRUP1
/* Tickets */
Route::get('/ticket', 'TicketController@index')->name('ticket.index');
Route::get('/ticket/create', 'TicketController@create')->name('ticket.create');
Route::get('/ticket/{id}/edit', 'TicketController@edit')->name('ticket.edit');
Route::get('/ticket/{id}/delete', 'TickerController@destroy')->name('ticket.destroy');
Route::post('/ticket/create', 'TicketController@store')->name('ticket.store');
Route::post('/ticket/update', 'TicketController@update')->name('ticket.update');

/* Companies */
Route::resource('companies', 'CompanyController');
Route::get('companies', 'CompanyController@showCompany')->name('companies');
Route::get('/companies', 'CompanyController@indexCompany')->name('companies.index');
Route::get('/companies/create', 'CompanyController@createCompany')->name('companies.create');
Route::get('/companies/{id}/edit', 'CompanyController@editCompany')->name('companies.edit');
Route::get('/companies/{id}/delete', 'CompanyController@destroyCompany')->name('companies.destroy');
Route::post('/companies/create', 'CompanyController@storeCompany')->name('companies.store');
Route::post('/companies/{id}/update', 'CompanyController@updateCompany')->name('companies.update');

/* Users */
Route::get('/gestor', 'UserController@index')->name('user.index');
Route::get('/gestor/create', 'UserController@create')->name('user.create');
Route::get('/gestor/{id}/edit', 'UserController@edit')->name('user.edit');
Route::get('/gestor/{id}/delete', 'UserController@destroy')->name('user.destroy');
Route::post('/gestor/create', 'UserController@store')->name('user.store');
Route::post('/gestor/{id}/update', 'UserController@update')->name('user.update');

/* School */
Route::get('/school', 'SchoolController@index')->name('school.index');
Route::get('/school/create', 'SchoolController@create')->name('school.create');
Route::get('/school/{id}/edit', 'SchoolController@edit')->name('school.edit');
Route::delete('/school/{id}/delete', 'SchoolController@destroy')->name('school.destroy');
Route::post('/school/create', 'SchoolController@store')->name('school.store');
Route::post('/school/{id}/update', 'SchoolController@update')->name('school.update');


//GRUP3
/* Propostes */
Route::get('Proposal','ProposalController@indexProposal')-> name('proposal.index');
Route::get('Proposal/create', function(){return view ('proposal.create');})->name('proposal.create');
Route::post('Proposal/create/success', 'ProposalController@storeProposal')->name('proposal.store');
Route::get('Proposal/{id}/edit', 'ProposalController@editProposal')->name('proposal.edit');
Route::post('Proposal/{id}/edit/success', 'ProposalController@updateProposal')->name('proposal.update');
Route::get('Proposal/{id}', 'ProposalController@destroyProposal')->name('proposal.destroy');

/* Empleats */
Route::get('/employee', 'EmployeeController@index')->name('employee.index');
Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
Route::get('/employee/{id}/edit', 'EmployeeController@edit')->name('employee.edit');
Route::get('/employee/{id}/delete', 'EmployeeController@destroy')->name('employee.destroy');
Route::post('/employee/create', 'EmployeeController@store')->name('employee.store');
Route::post('/employee/{id}/update', 'EmployeeController@update')->name('employee.update');

/* Escoles */
Route::get('/school', 'SchoolController@index')->name('schools.index');
Route::get('/school/create', 'SchoolController@create')->name('schools.create');
Route::get('/school/{id}/edit', 'SchoolController@edit')->name('schools.edit');
Route::delete('/school/{id}/delete', 'SchoolController@destroy')->name('schools.destroy');
Route::post('/school/create', 'SchoolController@store')->name('schools.store');
Route::post('/school/{id}/update', 'SchoolController@update')->name('schools.update');
