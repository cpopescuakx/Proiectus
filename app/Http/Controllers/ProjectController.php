<?php
/**
 * Controlador de Projectes
 */

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use App\Proposal;
use App\User_project;
use App\Blog;
use App\Post;
use App\Resource_center;
use App\Wiki;
use App\Article;
use App\User;
use App\Chat;
use App\Chat_member;
use Illuminate\Support\Facades\Log;
use DB;
use Auth;
use App\Project_invite;
use App\Mail\ProjectInvite;
use App\Jobs\SendProjectInvite;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{

    /**
     * Llistar tots els projectes
     *
     * Retorna la vista projects.index i li injecta la variable $projects
     * que conté una llista de tots els projectes.
     *
     * @return void
     *
     */
    public function index(Request $request)
    {
        Log::info("L'usuari " . $request->user()->username . " ha accedit a la gestió dels projectes.");
        $projects = Project::all();
        return view('projects.index', compact('projects'))
            ->with('i', (request()->input('page', 1) -1));
    }


    /**
     * Formulari de creació de projectes
     *
     * Retorna la vista projects.create la qual és un formulari per a
     * crear projectes nous
     *
     * @return void
     *
     */
    public function create()
    {
        return view('projects.create');
    }


    /**
     * Crear un projecte nou
     *
     * Comprova si és possible crear un projecte nou (hi han suficients propostes).
     *
     * Si és aixi, utilitzara el parametre $request per a conseguir les dades del
     * formulari i crearà un projecte nou.
     *
     * Sinó crearà primer una proposta amb els mateixos valors + l'usuari autor i
     * el tipus de proposta (centre o empresa) segons l'usuari que l'hagi creat
     * i després crearà el projecte.
     *
     * @param Request $request
     *
     * @return void
     *
     */
    public function store(Request $request)
    {
        // Agafar la ID que tindrà el nou projecte
        $statement = DB::select("SHOW TABLE STATUS LIKE 'projects'");
        $idProj = $statement[0]->Auto_increment;
        // ------------------------------  PROPOSTA  ------------------------------  //
        // Instanciar
        $proposta = new Proposal;

        // Assignar valors
        $proposta -> name = $request->input('name');
        $proposta -> description = $request->input('desc');
        $proposta -> professional_family = $request->input('pro_family');
        $proposta -> limit_date = $request->input('end_date');
        $proposta -> id_author = 1;
        $proposta -> category = 'company';

        // Guardar proposta a la BBDD
        $proposta -> save();

        // ------------------------------  PROJECTE  ------------------------------  //
        // Instanciar
        $projecte = new Project;
        $blog = new Blog;
        $wiki = new Wiki;

        // Assignar valors
        $projecte -> name = $request->input('name');
        $projecte -> budget = $request->input('budget');
        $projecte -> description = $request->input('desc');
        $projecte -> professional_family = $request->input('pro_family');
        $projecte -> ending_date = $request->input('end_date');

        // Guardar projecte a la BBDD
        $projecte -> save();
        Log::info('[ INSERT ] - projects - Nou porjecte: ' .$projecte -> name. ' inserit!');

        //Creació d'un blog per a cada projecte
        $blog -> id_project = $idProj;
        $blog -> title = $projecte -> name;

        //Creació d'una wiki per a cada projecte
        $wiki -> id_project = $idProj;
        $wiki -> title = $projecte -> name;

        // Guardar blog a la BBDD i generar missatge de log
        $blog -> save();
        Log::info('[ INSERT ] - blogs - Nou blog: ' .$projecte -> name. ' inserit!');

        // Guardar wiki a la BBDD i generar missatge de log
        $wiki -> save();
        Log::info('[ INSERT ] - wikis - Nova wiki: ' .$projecte -> name. ' inserit!');

        // ----------------------------  NOTIFICACIONS  -----------------------------  //
        // Envia una notificació als usuaris implicats
        $user = User::find(auth()->user()->getAuthIdentifier());
        $data = "<b>" . $user->firstname . " " . $user->lastname .  "</b> t'ha afegit al projecte <b>" . $projecte->name . "</b>.";
        $notificationDetails = [
            'data' => $data,
            'sender' => $user->id,
            'project' => $projecte->id_project
        ];

        $users = array($user);

        foreach ($users as $u) {
            $u->notify(new \App\Notifications\AddedToAProject($notificationDetails));
        }

        // Tornar a la llista de projectes
        $projects = Project::all();
        return redirect()->route('projects.index',compact('projects'))
        ->with('i', (request()->input('page', 1) -1));
    }


    public function show(Request $request, $id_project)
    {
        $posts = Post::all()->sortByDesc('created_at')
            ->where('id_project', '=', $id_project)
            ->where('status', '=', 'active');

        $blog = Blog::find($id_project);

        $project = Project::find($id_project);

        $participants = User_project::select()->where('id_project', $id_project)->get();

        $resources = Resource_center::all()->where('id_project', '=', $id_project);

        $articles = Article::all()->sortByDesc('created_at')
            ->where('id_project', '=', $id_project)
            ->where('status', '=', 'active');

        $wiki = Wiki::find($id_project);

        $check = $request->get('check');

        $memberof = Chat_member::select()->where('id_user', auth()->user()->id)->get();
        $chats = collect();

        foreach ($memberof as $m) {
            $chats->push($m->chats()->get()->first());
        }

        $users = collect();
        foreach ($participants as $p) {
            $users->push($p->user()->get()->first());
        }
        $user = auth()->user();

        return view ('projects.show', compact('chats', 'users', 'user', 'project', 'participants', 'posts', 'blog', 'resources', 'id_project', 'articles','wiki','check'));

    }


    /**
     * Formulari editar
     *
     * Retorna la vista projects.edit i li injecta la variable $project que conté
     * el projecte que correspon a la id del parametre ($id)
     *
     * @param mixed $id
     *
     * @return void
     *
     */
    public function edit($id)
    {
        // ******************* PREGUNTAR A TONI ******************* //
        // Fa falta considerar a excloure id invalides?
        // (si un usuari canvia manualment la URL i fica una ID que no existeix)

        $project = Project::find($id);
        return view('projects.edit', compact('project'));

    }


    /**
     * Editar un projecte existent
     *
     * Busca el projecte en qüestió (utilitzant la ID de la ruta),
     * li assigna els valors obtinguts del formulari utilitzant la variable
     * $request i guarda els canvis.
     *
     * Després redirecciona a la llista de projectes.
     *
     * @param Request $request
     *
     * @return void
     *
     */
    public function update(Request $request)
    {
        // Agafar la id de la ruta (parametre)
        $id = $request->route('id');

        // Cercar el projecte amb la mateixa ID de la BBDD
        $projecte = Project::find($id);

        // Assignar els valors del formulari
        $projecte-> name = $request->input('name');
        $projecte -> budget = $request->input('budget');
        $projecte -> description = $request->input('description');
        $projecte -> professional_family = $request->input('professional_family');
        $projecte -> ending_date = $request->input('end_date');

        // Guardar els canvis
        $projecte ->save();
        Log::info("L'usuari " . $request->user()->username . " ha modificat el projecte amb la id " . $id . ".");
        // Redireccionar a la llista de projectes
        $projects = Project::all();
        return redirect()->route('projects.index',compact('projects'))
        ->with('i', (request()->input('page', 1) -1));

    }


    /**
     * Donar de baixa un projecte
     *
     * Busca el projecte en qüestió (utilitzant el parametre $id),
     * modifica el camp status (inactive) i guarda els canvis.
     *
     * Després redirecciona a la llista de projectes.
     *
     * @param mixed $id
     *
     * @return void
     *
     */
    public function destroy($id)
    {
        $projecte = Project::find($id);
        $projecte -> status = 'inactive';
        $projecte ->save();

        $projects = Project::all();
            return redirect()->route('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) -1));
    }

    /**
     * Aquesta acció rep un email o més estan separats per coma
     * Per cada email fa les següents comparacions:
     * 
     * 1. Mira si l'email es valid
     * 2. Comprova que l'usuari estigui registrat a la base de dades
     * 3. Si aquest existeix, mira si ja està dins del projecte
     * 4. Si ja està al projecte, passa al següent email, en cas contrari s'afegeix l'usuari a una array que serà la que contindrà tots els usuaris que invitarà.
     *    Assignarem un atribut a l'usuari depenent de si ha estat invitat previament o no.
     * 
     * Després, per cada usuari d'aquesta array, farà un token de 32 caràcters, i depenent de si ha estat invitat o no, 
     * crearà o agafarà l'invitació a la base de dades actualitzant el token i la persona que l'ha invitat.
     * 
     * Es generarà un enllaç que caduca en un dia, aquest contindrà l'id del projecte, el token
     * i una firma que genera amb un timestamp que serà el moment en el que l'enllaç caduca.
     * 
     * Per acabar, fa una cua del correu que te que enviar al usuari i redirecciona al mateix projecte
     * amb els errors que hagin surgit.
     * 
     * @param Request $request
     * @param mixed $id_project
     * 
     * @return void
     */
    public function invite(Request $request, $id_project) {
        $emails = explode(',', $request->input('emails'));

        $errors = array();
        $users = array();
        $participants = User_project::where('id_project', $id_project)->get();
        foreach ($emails as $email) {
            $email = trim($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $u = User::where('email', $email)->first();

                $found = false;
                if ($u != null) {
                    foreach ($participants as $participant) {
                        if ($participant->id_user == $u->id) {
                            array_push($errors, "$email ja participa en aquest projecte.");
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $alreadyInvited = Project_invite::where([
                            ['id_project', '=', $id_project],
                            ['email', '=', $email]
                        ])->first();

                        if ($alreadyInvited != null) {
                            $u->alreadyInvited = true;
                        } else {
                            $u->alreadyInvited = false;
                        }
                        array_push($users, $u);
                    }
                } else {
                    array_push($errors, "$email no està registrat.");
                }
            } else {
                array_push($errors, "$email no es un email valid.");
            }
        }

        foreach ($users as $user) {
            $token = Str::random(32);
            $invite;
            if (!$user->alreadyInvited) {
                $invite = new Project_invite;
                $invite->id_project = $id_project;
                $invite->email = $user->email;
            } else {
                $invite = Project_invite::where([
                    ['id_project', $id_project],
                    ['email', $email]
                ])->first();
            }
            $invite->invited_by = Auth::user()->id;
            $invite->token = $token;
            $invite->save();

            $url = URL::temporarySignedRoute(
                'projects.validateinvite', now()->addHours(24), [
                        'id_project' => $invite->id_project,
                        'token' => $token
                    ]
            );

            Mail::to($invite->email)->queue(new ProjectInvite($invite, $url));
        }

        return redirect()->route('projects.show', $id_project)->withErrors($errors);
    }

    /**
     * Aquesta acció es la responsable de verificar que l'invitació es vàlida i si ho és, afegirà l'usuari al projecte i crearà una notificació.
     * 
     * Per a fer això, primer comproba que la firma de l'URL no ha expirat i es vàlida, si no ho és redirecciona a tots els projectes amb un error
     * En cas contrari, mirarà que l'invitació existeix i que l'usuari ha iniciat sessió per a acceptar-la i si està iniciat sessió que sigui el mateix usuari que al que han invitat
     * 
     * Si l'invitació no existeix, el redirecciona a tots els projectes.
     * Si l'usuari no ha iniciat sessió, el redireccionarà al login, i una vegada estigui faci el login, el redireccionarà a l'invitació.
     * Un cop allà havent passat totes les comprovacions, mira si aquest usuari ja està al projecte, si no està, l'afegeix.
     * Després crea una notificació a l'usuari, borra l'invitació i rediregeix al projecte
     * 
     * @param Request $request
     * @param mixed $id_project
     * @param mixed $token
     * 
     * @return void
     */
    public function validateInvite(Request $request, $id_project, $token) {
        $project = Project::where('id_project', $id_project)->first();
        $invite = Project_invite::where('token', $token)->first();
        if (!$request->hasValidSignature()) {
            if ($invite != null) {
                $invite->delete();
            }
            return redirect()->route('projects.dashboard')->withErrors(["Aquesta invitació ha expirat."]);
        } else {
            if ($invite != null) {
                if (Auth::user() != null) {
                    if (Auth::user()->email == $invite->email) {
                        $alreadyIn = User_project::where([
                            ['id_user', Auth::user()->id],
                            ['id_project', $id_project]
                        ])->first();
    
                        if ($alreadyIn == null) {
                            $projectuser = new User_project;
                            $projectuser->id_user = Auth::user()->id;
                            $projectuser->id_project = $id_project;
                            $projectuser->save();
                        }
    
                        $invitedBy = User::find($invite->invited_by);
                        $data = "<b>" . $invitedBy->firstname . " " . $invitedBy->lastname .  "</b> t'ha afegit al projecte <b>" . $project->name . "</b>.";
                        $notificationDetails = [
                            'data' => $data,
                            'sender' => $invitedBy->id,
                            'project' => $id_project
                        ];
    
                        $users = array(Auth::user());
    
                        foreach ($users as $u) {
                            $u->notify(new \App\Notifications\AddedToAProject($notificationDetails));
                        }
    
                        $invite->delete();
                        return redirect()->route('projects.show', $id_project);
                    } else {
                        return redirect()->route('projects.dashboard')->withErrors(["L'invitació no pertany a aquest usuari."]);
                    }
                } else {
                    return redirect()->route('login');
                }
            } else {
                return redirect()->route('projects.dashboard')->withErrors(["Aquesta invitació no existeix."]);
            }
        }
    }

    /** Llistar els projectes per al dashboard
    *
    *   Busca els projectes que hi ha a la base de dades i els pagina de 12 en 12
    *   Si s'ha escrit algo al buscador busca els projectes que coincideixen amb la cerca
    *   (Scope al model de PROJECTE).
    *
    *  @param Request $request
    *  @return void
    */
    public function dashboardProject(Request $request)
    {

        $projects = Project::name($request->get('name'))->paginate(12);

        return view('projects.dashboard', compact('projects'));
    }
    /** Llistar els projectes per a l'api
    *
    *   Busca els projectes que hi ha a la base de dades i els presenta en format JSON
    *
    *  @return Response
    */
    public function indexApi() {
      return response(Project::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
