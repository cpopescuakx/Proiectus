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

Route::get('/companies', 'CompanyController@index')->name('company.index');
Route::get('/companies/create', 'CompanyController@create')->name('company.create');
Route::get('/companies/{id}/edit', 'CompanyController@edit')->name('company.edit');
Route::get('/companies/{id}/delete', 'CompanyController@destroy')->name('company.destroy');
Route::post('/companies/create', 'CompanyController@store')->name('company.store');
Route::post('/companies/update', 'CompanyController@update')->name('company.update');

/* Users */
Route::get('/gestor', 'UserController@index')->name('user.index');
Route::get('/gestor/create', 'UserController@create')->name('user.create');
Route::get('/gestor/{id}/edit', 'UserController@edit')->name('user.edit');
Route::get('/gestor/{id}/delete', 'UserController@destroy')->name('user.destroy');
Route::post('/gestor/create', 'UserController@store')->name('user.store');
Route::post('/gestor/update', 'UserController@update')->name('user.update');

/* School */
Route::get('/school', 'SchoolController@index')->name('school.index');
Route::get('/school/create', 'SchoolController@create')->name('school.create');
Route::get('/school/{id}/edit', 'SchoolController@edit')->name('school.edit');
Route::get('/school/{id}/delete', 'SchoolController@destroy')->name('school.destroy');
Route::post('/school/create', 'SchoolController@store')->name('school.store');
Route::post('/school/update', 'SchoolController@update')->name('school.update');
