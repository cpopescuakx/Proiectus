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

Route::get('Professors/create', 'UserController@createProfessor')->name('professors.create');

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
//Route::resource('companies', 'CompanyController');
Route::get('companies', 'CompanyController@indexCompany')->name('companies');
//Route::get('/companies', 'CompanyController@indexCompany')->name('companies.index');
Route::get('/companies/create', 'CompanyController@createCompany')->name('companies.create');
Route::get('/companies/{id}/edit', 'CompanyController@editCompany')->name('companies.edit');;
Route::delete('/companies/{id}/delete', 'CompanyController@destroyCompany')->name('companies.destroy');
Route::post('/companies/create', 'CompanyController@storeCompany')->name('companies.store');
Route::post('/companies/{id}/update', 'CompanyController@updateCompany')->name('companies.update');

/* Users */
Route::get('managers', 'UserController@indexManager')->name('managers.index');
Route::get('managers/create', 'UserController@createManager')->name('managers.create');
Route::get('managers/{id}/edit', 'UserController@editManager')->name('managers.edit');
Route::get('managers/{id}/delete', 'UserController@destroyManager')->name('managers.destroy');
Route::post('managers/create', 'UserController@storeManager')->name('managers.store');
Route::post('managers/{id}/update', 'UserController@updateManager')->name('managers.update');

/* Schools */
Route::get('/schools', 'SchoolController@indexSchool')->name('schools.index');
Route::get('/schools/create', 'SchoolController@createSchool')->name('schools.create');
Route::get('/schools/{id}/edit', 'SchoolController@editSchool')->name('schools.edit');
Route::delete('/schools/{id}/delete', 'SchoolController@destroySchool')->name('schools.destroy');
Route::post('/schools/create', 'SchoolController@storeSchool')->name('schools.store');
Route::post('/schools/{id}/update', 'SchoolController@updateSchool')->name('schools.update');


//GRUP3
/* Propostes */
Route::get('Proposals','ProposalController@indexProposal')-> name('proposals.index');
Route::get('Proposals/create', 'ProposalController@createProposal')->name('proposals.create');
Route::post('Proposals/create/success', 'ProposalController@storeProposal')->name('proposals.store');
Route::get('Proposals/{id}/edit', 'ProposalController@editProposal')->name('proposals.edit');
Route::post('Proposals/{id}/edit/success', 'ProposalController@updateProposal')->name('proposals.update');
Route::get('Proposals/{id}', 'ProposalController@destroyProposal')->name('proposals.destroy');

/* Empleats */
Route::get('/Employees/Active', 'UserController@indexEmployeeActive')->name('employee.indexActive');
Route::get('/Employees/Inactive', 'UserController@indexEmployeeInactive')->name('employee.indexInactive');
Route::get('/Employees/create', 'UserController@createEmployee')->name('employee.create');
Route::get('/Employees/{id}/edit', 'UserController@edit')->name('employee.edit');
Route::get('/Employees/{id}/delete', 'UserController@destroy')->name('employee.destroy');
Route::post('/Employees/store', 'UserController@store')->name('employee.store');
Route::post('/Employees/{id}/update', 'UserController@update')->name('employee.update');
Route::get('/Employees/{id}/active', 'UserController@activeUser')->name('employee.active');

