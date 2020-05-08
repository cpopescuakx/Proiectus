<?php

namespace App\Http\Controllers;

use App\faq;
use App\faq_votes;
use App\School_users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    /**
     * Llistat de totes les preguntes i respostes amb el tòpic blog.
     *
     * @return faqs 
     */
    public function indexBlog()
    {
        $faqs = faq::where('topic',"Blog")->get();
        return $faqs;
    }

    /**
     * Llistat de totes les preguntes i respostes amb el tòpic wiki.
     *
     * @return faqs
     */
    public function indexWiki()
    {
        $faqs = faq::where('topic',"Wiki")->get();
        return $faqs;
    }

    /**
     * Llistat de totes les preguntes i respostes amb el tòpic xat.
     *
     * @return faqs
     */
    public function indexXat()
    {
        $faqs = faq::where('topic',"Xat")->get();
        return $faqs;
    }

    /**
     * Llistat de totes les preguntes i respostes amb el tòpic correu.
     *
     * @return faqs
     */
    public function indexCorreu()
    {
        $faqs = faq::where('topic',"Correu")->get();
        return $faqs;
    }

    /**
     * Llistat de totes les preguntes i respostes amb el tòpic proposta.
     *
     * @return faqs
     */
    public function indexProposta()
    {
        $faqs = faq::where('topic',"Proposta")->get();
        return $faqs;
    }

    /**
     * Llistat de totes les preguntes i respostes amb el tòpic projecte.
     *
     * @return faqs
     */
    public function indexProjecte()
    {
        $faqs = faq::where('topic',"Projecte")->get();
        return $faqs;
    }

    /**
     * Comprovació del tipus de vot per a cada pregunta del FAQ.
     *
     * @return vots
     */
    public function checkVote(){

        //Obtenim l'id de l'usuari loggeat
        $id_user = auth()->user()->id;

        //Fem la cerca de les preguntes votades per aquest usuari
        $vote = faq_votes::where('id_user',$id_user)->get();

        //Creem 3 arrays per a guardar tots els tipus de vots amb les seves preguntes.
        $vots = array();
        $keys = array();
        $values = array();

        //Recorrem cada pregunta del resultat de la recerca anterior i guardem el tipus de vot i la pregunta a la qual pertany.
        foreach($vote as $vot){
            array_push($keys,$vot['id_faq']);
            array_push($values,$vot['vote_type']);
        } 

        //Afegim les 2 arrays anteriors a la de $vots la qual posteriorment retornarem.
        $vots=array_combine ($keys,$values);

        return $vots;
    }

    /**
     * Fem la crida a les diferents accions per a poder passar a la vista el contingut d'aquestes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BlogFAQS = FaqController::indexBlog();
        $PropostaFAQS = FaqController::indexProposta();
        $ProjecteFAQS = FaqController::indexProjecte();
        $XatFAQS = FaqController::indexXat();
        $CorreuFAQS = FaqController::indexCorreu();
        $WikiFAQS = FaqController::indexWiki();
        $checkVot = FaqController::checkVote();

        return view('FAQ.index',compact('BlogFAQS','PropostaFAQS','ProjecteFAQS','XatFAQS','CorreuFAQS','WikiFAQS','checkVot'));
    }
    
    /**
     * Llistat de preguntes i respostes amb format JSON.
     *
     * @return faqs
     */
    public function getApi() 
    {
        return response(FAQ::all()->jsonSerialize());
    }

     /**
     * Afegeix un like a la pregunta seleccionada.
     *
     *  @param Request $request
     */
    public function like(Request $request)
    {
        //Obtenim l'id de la pregunta seleccionada.
        $id_faq = $request->route('id_faq');

        //Instanciem l'objecte faq_votes
        $faq_vote = new faq_votes;
        
        //Obtenim l'id de l'usuari loggeat
        $id_user = auth()->user()->id;

        //Busquem la pregunta amb l'id de l'usuari per si ja ha estat votada anteriorment.
        $vote = faq_votes::where('id_faq',$id_faq)->where('id_user',$id_user)->first();

        //Comprovem si ha estat votada anteriorment
        if(isset($vote)){

            //Si ha estat votada i amb un dislike, incrementem els likes, desincrementem els dislikes i guardem les dades de votació.
            if($vote -> vote_type == "dislike"){
                faq::find($id_faq)->increment('like');
                faq::find($id_faq)->decrement('dislike');
                $vote -> id_user = $id_user;
                $vote -> id_faq = $id_faq;
                $vote -> vote_type = "like";
                $vote->save();
                Log::info('[ UPDATE ] - faq_votes - Nova votació '.($vote -> vote_type).' del usuari: ' .$id_user. ', sobre la pregunta: '.$id_faq.' inserida!');

            }

            //Si ha estat votada i amb un like no realitzem cap acció.
            elseif($vote -> vote_type == "like"){
            }
        }

        //Si no ha estat votada incrementem els likes i guardem les dades de votació.
        else{
            faq::find($id_faq)->increment('like');
            $faq_vote -> id_user = $id_user;
            $faq_vote -> id_faq = $id_faq;
            $faq_vote -> vote_type = "like";
            $faq_vote->save();
            Log::info('[ INSERT ] - faq_votes - Nova votació '.($vote -> vote_type).' del usuari: ' .$id_user. ', sobre la pregunta: '.$id_faq.' inserida!');
        }
    }

    
    /**
    * Afegeix un dislike a la pregunta seleccionada.
    *
    * @return \Illuminate\Http\Response
    */
    public function dislike(Request $request)
    {
        //Obtenim l'id de la pregunta seleccionada
        $id_faq = $request->route('id_faq');

        //Instanciem l'objecte faq_votes
        $faq_vote = new faq_votes;
        
        //Obtenim l'id de l'usuari loggeat
        $id_user = auth()->user()->id;

        //Busquem la pregunta amb l'id de l'usuari per si ja ha estat votada anteriorment.
        $vote = faq_votes::where('id_faq',$id_faq)->where('id_user',$id_user)->first();
        
        //Comprovem si ha estat votada anteriorment.
        if(isset($vote)){

            //Si ha estat votada i amb un like, incrementem els dislikes, desincrementem els likes i guardem les dades de votació.
            if($vote -> vote_type == "like"){
                faq::find($id_faq)->increment('dislike');
                faq::find($id_faq)->decrement('like');
                $vote -> id_user = $id_user;
                $vote -> id_faq = $id_faq;
                $vote -> vote_type = "dislike";
                $vote->save();
                Log::info('[ UPDATE ] - faq_votes - Nova votació '.($vote -> vote_type).' del usuari: ' .$id_user. ', sobre la pregunta: '.$id_faq.' inserida!');
            }

            //Si ha estat votada i amb un like no realitzem cap acció.
            elseif($vote->vote_type == "dislike"){
            }
        }

        //Si no ha estat votada incrementem els dislikes i guardem les dades de votació.
        else{
            faq::find($id_faq)->increment('dislike');
            $faq_vote -> id_user = $id_user;
            $faq_vote -> id_faq = $id_faq;
            $faq_vote -> vote_type = "dislike";
            $faq_vote->save();
            Log::info('[ INSERT ] - faq_votes - Nova votació '.($vote -> vote_type).' del usuari: ' .$id_user. ', sobre la pregunta: '.$id_faq.' inserida!');
        }
    }
}
