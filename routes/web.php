<?php

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
})->name('home');

/* Tickets */
Route::get('/ticket', 'TicketController@index')->name('ticket.index');
Route::get('/ticket/create', 'TicketController@create')->name('ticket.create');
Route::get('/ticket/{id}/edit', 'TicketController@edit')->name('ticket.edit');
Route::get('/ticket/{id}/delete', 'TickerController@destroy')->name('ticket.destroy');
Route::post('/ticket/create', 'TicketController@store')->name('ticket.store');
Route::post('/ticket/update', 'TicketController@update')->name('ticket.update');

/* Companies */
Route::resource('companies', 'CompanyController');
Route::get('companies', 'CompanyController@show')->name('company');
Route::get('/companies', 'CompanyController@index')->name('company.index');
Route::get('/companies/create', 'CompanyController@create')->name('company.create');
Route::get('/companies/{id}/edit', 'CompanyController@edit')->name('company.edit');
Route::get('/companies/{id}/delete', 'CompanyController@destroy')->name('company.destroy');
Route::post('/companies/create', 'CompanyController@store')->name('company.store');
Route::post('/companies/{id}/update', 'CompanyController@update')->name('company.update');

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
