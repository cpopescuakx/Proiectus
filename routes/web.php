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

Route::get('/', function () {return view('welcome');})->name('index.index');

/** Apartat AJUDA lloc WEB  */

Route::get('/help', function () {return view('help');})->name('help.index');

/** Apartat FAQ lloc WEB  */
Route::get('/FAQ', function () {return view('FAQ.index');})->name('faq.index');


Auth::routes(['verify' => true]);

Route::post('entityRegistration/{type}', 'EntityRegistration@store')->name('entityRegistration.store');

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/pendingSchools', 'pendingSchoolsController@index')->name('pendingSchools.index');
    Route::get('pendingSchools/{id}/approve', 'pendingSchoolsController@approve')
        ->name('pendingSchools.approve');

    Route::get('pendingSchools/{id}/deny', 'pendingSchoolsController@deny')
        ->name('pendingSchools.deny');
});

Route::middleware(['registeredEntity'])->group(function () {

    Route::middleware(['verified'])->group(function () {
        Route::get('/home', function () {
            return view('home');
        })->name('home.index');

        Route::get('entityRegistration', 'EntityRegistration@index')->name('entityRegistration.index');

        Route::get('/pendingVerification', function () {
            return view('pendingVerification.index');
        })->name('pendingVerification.index');
    });

    //GRUP2
    /** Rutes per a l'apartat de gestió de projectes */

    Route::get('Project', 'ProjectController@index')
        ->name('projects.index')->middleware('auth', 'isAdminOrGestor');

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

    Route::get('Project/{id_project}/principal', 'ProjectController@show')
        ->name('projects.show');

    /** Rutes per a l'apartat de gestió d'alumnes */
    Route::middleware(['auth', 'administracioEstudiants'])->group(function () {
        Route::get('students', ['Middleware' => 'auth','uses' => 'UserController@indexStudent'])
            ->name('students.index');

        Route::get('students/create', 'UserController@createStudent')->name('students.create');

        Route::post('students/create/success', 'UserController@storeStudent')
            ->name('students.store');

        Route::get('students/{id}/edit', 'UserController@editStudent')
            ->name('students.edit');

        Route::post('students/{id}/edit/success', 'UserController@updateStudent')
            ->name('students.update');

        Route::get('students/{id}/delete', 'UserController@destroyStudent')
            ->name('students.destroy');

        Route::get('students/{id}/enable', 'UserController@enableStudent')
            ->name('students.enable');
            Route::get('students/import', 'UserController@indexImportStudents')
            ->name('students.import');

        Route::post('students/import/upload', 'UserController@importStudents')
            ->name('students.upload');
    });

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
    Route::get('/tickets/create', 'TicketController@createNotManager')->name('tickets.createNotManager');

    Route::get('/ticket/{id}/edit', 'TicketController@edit')->name('tickets.edit');
    Route::get('/ticket/{id}/delete', 'TicketController@destroy')->name('tickets.destroy');
    Route::post('/ticket/store/{id_author}', 'TicketController@store')->name('tickets.store');
    Route::post('/tickets/store/{id_author}', 'TicketController@storeNotManager')->name('tickets.storeNotManager');

    Route::post('/ticket/{id}/update', 'TicketController@update')->name('tickets.update');

    /* Companies */
    //Route::resource('companies', 'CompanyController');
    Route::middleware(['isAdmin'])->group(function () {
    Route::get('companies', 'CompanyController@indexCompany')->name('companies.index');
    //Route::get('/companies', 'CompanyController@indexCompany')->name('companies.index');
    Route::get('/companies/create', 'CompanyController@createCompany')->name('companies.create');
    Route::get('/companies/{id}/edit', 'CompanyController@editCompany')->name('companies.edit');;
    Route::get('/companies/{id}/delete', 'CompanyController@destroyCompany')->name('companies.destroy');
    Route::post('/companies/create', 'CompanyController@storeCompany')->name('companies.store');
    Route::post('/companies/{id}/update', 'CompanyController@updateCompany')->name('companies.update');

    /* Gestor afegir empresa*/
    Route::get('companiesUser/{id}/index', 'Company_userController@index')->name('companiesUser.index');
    Route::post('/companiesUser/{id}/store', 'Company_userController@store')->name('companiesUser.store');
    });

    /* Gestors */
Route::get('/', function () {
    return view('welcome');
})->name('index.index');

Auth::routes(['verify' => true]);

Route::middleware(['CheckRole'])->group(function () {

    Route::get('managerProfile/{id}', 'UserController@indexProfile')->name('managers.indexP1');
    Route::get('managerProfile/{id}/edit', 'UserController@editProfile')->name('managers.editP');
    Route::post('managerProfile/{id}/update', 'UserController@updateProfile')->name('managers.updateP');
    Route::get('managerProfile/{id}/delete', 'UserController@destroyProfile')->name('managers.destroyP');
    Route::get('managerProfile/{id}/active', 'UserController@activeProfile')->name('managers.activeP');

    Route::get('managers', 'UserController@indexManager')->name('managers.index');
    Route::get('managers/create', 'UserController@createManager')->name('managers.create');
    Route::get('managers/{id}/edit', 'UserController@editManager')->name('managers.edit');
    Route::get('managers/{id}/delete', 'UserController@updateManager')->name('managers.destroy');
    Route::post('managers/create', 'UserController@storeManager')->name('managers.store');
    Route::post('managers/{id}/update', 'UserController@updateManager')->name('managers.update');
    });
    /* Schools */
    Route::middleware(['isAdmin'])->group(function () {
    Route::get('/schools', 'SchoolController@indexSchool')->name('schools.index');
    Route::get('/schools/create', 'SchoolController@createSchool')->name('schools.create');
    Route::get('/schools/{id}/edit', 'SchoolController@editSchool')->name('schools.edit');
    Route::get('/schools/{id}/delete', 'SchoolController@destroySchool')->name('schools.destroy');
    Route::post('/schools/create', 'SchoolController@storeSchool')->name('schools.store');
    Route::post('/schools/{id}/update', 'SchoolController@updateSchool')->name('schools.update');

    Route::get('schools/{id}/addUser', 'School_usersController@index')->name('schoolsUsers.manager');
    Route::post('schools/{id}/storeUser', 'School_usersController@store')->name('schoolsUsers.store');
    });
    /* DOCUMENT MANAGER OLD */
    //Route::get('/dm','DMController@index');
    //Route::post('/dm/fileupload/','DMController@fileupload')->name('dm.fileupload');

    /* DOCUMENT MANAGER NEW */
    // Route::get('/dm','DMController@fileCreate');
    // Route::post('/dm/store','DMController@fileStore');
    // Route::post('/dm/delete','DMController@fileDestroy');

    //GRUP3
    /* Propostes */
    Route::get('Proposals', 'ProposalController@indexProposal')->name('proposals.index');
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


// Routes Grup4
    /** ------Rutes per a l'apartat del BLOG------ */
                                    /** MIDDLEWARE */
    /** Middleware per a controlar que només pugui editar o eliminar un post el seu owner */
    Route::middleware(['CheckRoleBlog','auth'])->group(function () {
        /** Ruta per al INDEX d'un blog d'un projecte */
        Route::get('blog/{id_project}','BlogController@index')->name('blog.index');
        /** Ruta per al SHOW d'un post */
        Route::get('blog/{id_project}/post/{id_post}', 'PostController@show')->name('posts.show');
        /** Ruta per al UPDATE d'un post */
        Route::get('blog/{id_project}/post/{id_post}/edit', 'PostController@edit')->name('posts.edit');
        Route::post('blog/{id_project}/post/{id_post}/update', 'PostController@update')->name('posts.update');
        /** Ruta eliminar un post*/
        Route::get('blog/{id_project}/post/{id_post}/destroy', 'PostController@destroy')->name('posts.destroy');
        /** Ruta per a l'update del titul de blog */
        Route::get('blog/{id_project}/edit', 'BlogController@edit')->name('blogs.edit');
        Route::PATCH('blog/{id_project}/update', 'BlogController@update')->name('blogs.update');
    });
       /** Ruta per al STORE de post */
       Route::post('blog/{id_project}/post/store', 'PostController@store')->name('posts.store');

    /** ------Rutes per a l'apartat de WIKI------ */
                                    /** MIDDLEWARE */
    /** Middleware per a controlar que només pugui editar o eliminar un article el seu owner */
    Route::middleware(['CheckRoleWiki'])->group(function () {
        /** Rutes per a l'apartat de la gestio dels articles de la wiki */
        Route::get('wiki/{id_project}', 'WikiController@index');
        /** Ruta per a eliminar un article */
        Route::get('wiki/{id_project}/article/{id_post}/destroy', 'ArticleController@destroy');
        /** Ruta per a l'update d'un article */
        Route::get('wiki/{id_project}/article/{id_article}/edit', 'ArticleController@edit');
        Route::post('wiki/{id_project}/article/{id_article}/update', 'ArticleController@update');
        /** Ruta per a l'update d''una wiki */
        Route::get('wiki/{id_project}/edit', 'WikiController@edit')->name('wiki.edit');
        Route::PATCH('wiki/{id_project}/update', 'WikiController@update');
    });
    /** Ruta per a guardar l'article creat */
    Route::post('wiki/{id_project}/article/store', 'ArticleController@store') ->name('article.store');


    /** Rutes per a l'apartat de perfils d'usuari */

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    // RSS
    Route::middleware(['isAdmin'])->group(function () {
      Route::feeds();
    });
    Route::get('/feed', function () {return view('feed.feed');})->name('feed.feed');


    /** Resource center */

    Route::get('recursos/{id_project}', 'Resource_centerController@resources')->name('resource.index');
    Route::post('uploadResource/{id_project}', 'Resource_centerController@uploadResource')->name('resource.upload');
    Route::get('resources/download/{path}', 'Resource_centerController@downloadFile')->name('resource.download');
    Route::get('resources/delete/{path}', 'Resource_centerController@destroy')->name('resource.delete');
});
