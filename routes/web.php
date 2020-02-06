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
Route::resource('companies', 'userController');
Route::get('companies', 'userController@show')->name('user');
Route::get('/companies', 'userController@index')->name('user.index');
Route::get('/companies/create', 'userController@create')->name('user.create');
Route::get('/companies/{id}/edit', 'userController@edit')->name('user.edit');
Route::get('/companies/{id}/delete', 'userController@destroy')->name('user.destroy');
Route::post('/companies/create', 'userController@store')->name('user.store');
Route::post('/companies/{id}/update', 'userController@update')->name('user.update');

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
