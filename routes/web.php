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
})-> name('index.index');

Auth::routes(['verify' => true]);

Route::post('entityRegistration/{type}', 'EntityRegistration@store')->name('entityRegistration.store');


Route::middleware(['registeredEntity'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })-> name('home.index');


    Route::get('entityRegistration', 'EntityRegistration@index')->name('entityRegistration.index');

    //GRUP2
    /** Rutes per a l'apartat de gestió de projectes */

    Route::get('Project', 'ProjectController@index')
        ->name('projects.index');

    Route::get('Project/create', function () {
        return view('projects.create');
    })->name('projects.create');

    Route::post('Project/create/success', 'ProjectController@store')
        ->name('projects.store');

    Route::get('Project/{id}/edit', 'ProjectController@edit')
        ->name('projects.edit');

    Route::post('Project/{id}/edit/success', 'ProjectController@update')
        ->name('projects.update');

    Route::get('Project/{id}', 'ProjectController@destroy')
        ->name('projects.destroy');

Route::get('Dashboard/projects', 'ProjectController@dashboardProject')
->name('projects.dashboard');

Route::get('Project/{id}/principal', 'ProjectController@show')
->name('projects.show');

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
    Route::get('/ticket', 'TicketController@index')->name('tickets.index');
    Route::get('/ticket/create', 'TicketController@create')->name('tickets.create');
    Route::get('/ticket/{id}/edit', 'TicketController@edit')->name('tickets.edit');
    Route::get('/ticket/{id}/delete', 'TicketController@destroy')->name('tickets.destroy');
    Route::post('/ticket/create', 'TicketController@store')->name('tickets.store');
    Route::post('/ticket/{id}/update', 'TicketController@update')->name('tickets.update');

    /* Companies */
    //Route::resource('companies', 'CompanyController');
    Route::get('companies', 'CompanyController@indexCompany')->name('companies');
    //Route::get('/companies', 'CompanyController@indexCompany')->name('companies.index');
    Route::get('/companies/create', 'CompanyController@createCompany')->name('companies.create');
    Route::get('/companies/{id}/edit', 'CompanyController@editCompany')->name('companies.edit');;
    Route::delete('/companies/{id}/delete', 'CompanyController@destroyCompany')->name('companies.destroy');
    Route::post('/companies/create', 'CompanyController@storeCompany')->name('companies.store');
    Route::post('/companies/{id}/update', 'CompanyController@updateCompany')->name('companies.update');

    /* Gestors */
    Route::get('managerProfile/{id}', 'UserController@indexProfile')->name('managers.indexP');
    Route::get('managerProfile/{id}/edit', 'UserController@editProfile')->name('managers.editP');
    Route::post('managersProfile/{id}/update', 'UserController@updateProfile')->name('managers.update');
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

    /* DOCUMENT MANAGER OLD */
    //Route::get('/dm','DMController@index');
    //Route::post('/dm/fileupload/','DMController@fileupload')->name('dm.fileupload');



//GRUP3
/* Propostes */
Route::get('Proposals','ProposalController@indexProposal')-> name('proposals.index');
Route::get('Proposals/create', 'ProposalController@createProposal')->name('proposals.create');
Route::post('Proposals/create/success', 'ProposalController@storeProposal')->name('proposals.store');
Route::get('Proposals/{id}/edit', 'ProposalController@editProposal')->name('proposals.edit');
Route::post('Proposals/{id}/edit/success', 'ProposalController@updateProposal')->name('proposals.update');
Route::get('Proposals/{id}', 'ProposalController@destroyProposal')->name('proposals.destroy');
Route::get('Proposals/{id}/active', 'ProposalController@activeProposal')->name('proposals.active');
Route::get('Proposals/{id}/inactive', 'ProposalController@inactiveProposal')->name('proposals.inactive');
Route::get('Dashboard/proposals', 'ProposalController@dashboardProposal')->name('proposals.dashboard');
Route::get('Proposal/{id}/principal', 'ProposalController@show')->name('proposals.show');


/* Empleats */
Route::get('/Employees', 'UserController@indexEmployee')->name('employee.index');
Route::get('/Employees/create', 'UserController@createEmployee')->name('employee.create');
Route::get('/Employees/{id}/edit', 'UserController@editEmployee')->name('employee.edit');
Route::get('/Employees/{id}/delete', 'UserController@destroyEmployee')->name('employee.destroy');
Route::post('/Employees/store', 'UserController@storeEmployees')->name('employee.store');
Route::post('/Employees/{id}/update', 'UserController@updateEmployee')->name('employee.update');
Route::get('/Employees/{id}/active', 'UserController@activeUser')->name('employee.active');
});
