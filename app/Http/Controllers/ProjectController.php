<?php
/**
 * Controlador de Projectes
 */

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Proposal;
use App\User_project;
use App\Blog;
use App\Post;
use App\Resource_center;
use App\Wiki;
use App\Article;
use Illuminate\Support\Facades\Log;


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
    public function index()
    {
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
        $idProj = Project::max('id_project');
        $idProp = Proposal::max('id_proposal');

        if($idProj < $idProp){
            // Instanciar
            $projecte = new Project;

            // Assignar valors
            $projecte -> name = $request->input('name');
            $projecte -> budget = $request->input('budget');
            $projecte -> description = $request->input('desc');
            $projecte -> professional_family = $request->input('pro_family');
            $projecte -> ending_date = $request->input('end_date');

            // Guardar projecte a la BBDD i generar missatge de log
            $projecte -> save();
            Log::info('[ INSERT ] - projects - Nou projecte: ' .$projecte -> name. ' inserit!');

            // Tornar a la llista de projectes
            $projects = Project::all();
            return redirect()->route('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) -1));

        }
        // Si el nº de projectes no és major que el de propostes haurem de crear una proposta primer i després crear
        // el projecte associat.
        else{
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

            // Assignar valors
            $projecte -> name = $request->input('name');
            $projecte -> budget = $request->input('budget');
            $projecte -> description = $request->input('desc');
            $projecte -> professional_family = $request->input('pro_family');
            $projecte -> ending_date = $request->input('end_date');

            // Guardar projecte a la BBDD
            $projecte -> save();

            // Tornar a la llista de projectes
            $projects = Project::all();
            return redirect()->route('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) -1));
        }
    }


    public function show(Request $request, $id_project)
    {
        $posts = Post::all()->sortByDesc('created_at')->where('id_project', '=', $id_project)->where('status', '=', 'active');

        $blog = Blog::find($id_project);

        $project = Project::find($id_project);

        $participants = User_project::select()->where('id_project', $id_project)->get();

        $resources = Resource_center::all()->where('id_project', '=', $id_project);

        $articles = Article::all()->sortByDesc('created_at')->where('id_project', '=', $id_project)->where('status', '=', 'active');

        $wiki = Wiki::find($id_project);

        $check = $request->get('check');

        return view ('projects.show', compact('project', 'participants', 'posts', 'blog', 'resources', 'id_project', 'articles','wiki','check'));

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
