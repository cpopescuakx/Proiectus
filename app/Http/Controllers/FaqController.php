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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBlog()
    {
        $faqs = faq::where('topic',"Blog")->get();
        return $faqs;
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWiki()
    {
        $faqs = faq::where('topic',"Wiki")->get();
        return $faqs;
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexXat()
    {
        $faqs = faq::where('topic',"Xat")->get();
        return $faqs;
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCorreu()
    {
        $faqs = faq::where('topic',"Correu")->get();
        return $faqs;
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProposta()
    {
        $faqs = faq::where('topic',"Proposta")->get();
        return $faqs;
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProjecte()
    {
        $faqs = faq::where('topic',"Projecte")->get();
        return $faqs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkLike(){
        $id_user = auth()->user()->id;
        $vote = faq_votes::where('id_user',$id_user)->get();
        
        foreach($vote as $checked){
            if($checked[4] == "like"){
                return "like";
            }else{
                return "dislike";
            }
        }  */  
    }

    /**
     * Display a listing of the resource.
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
        $checkLike = FaqController::checkLike();

        return view('FAQ.index',compact('BlogFAQS','PropostaFAQS','ProjecteFAQS','XatFAQS','CorreuFAQS','WikiFAQS','checkLike'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    {
        $id_faq = $request->route('id_faq');
        $faq_vote = new faq_votes;
        $id_user = auth()->user()->id;
        $vote = faq_votes::where('id_faq',$id_faq)->where('id_user',$id_user)->first();

        if(isset($vote)){
            if($vote -> vote_type == "dislike"){
                faq::find($id_faq)->increment('like');
                faq::find($id_faq)->decrement('dislike');
                $vote -> id_user = $id_user;
                $vote -> id_faq = $id_faq;
                $vote -> vote_type = "like";
                $vote->save();
            }
            elseif($vote -> vote_type == "like"){
            }
        }
        else{
            faq::find($id_faq)->increment('like');
            $faq_vote -> id_user = $id_user;
            $faq_vote -> id_faq = $id_faq;
            $faq_vote -> vote_type = "like";
            $faq_vote->save();
        }
    }

    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function dislike(Request $request)
    {
        $id_faq = $request->route('id_faq');
        $faq_vote = new faq_votes;
        $id_user = auth()->user()->id;
        $vote = faq_votes::where('id_faq',$id_faq)->where('id_user',$id_user)->first();

        if(isset($vote)){
            if($vote -> vote_type == "like"){
                faq::find($id_faq)->increment('dislike');
                faq::find($id_faq)->decrement('like');
                $vote -> id_user = $id_user;
                $vote -> id_faq = $id_faq;
                $vote -> vote_type = "dislike";
                $vote->save();
            }
            elseif($vote->vote_type == "dislike"){
            }
        }
        else{
            faq::find($id_faq)->increment('dislike');
            $faq_vote -> id_user = $id_user;
            $faq_vote -> id_faq = $id_faq;
            $faq_vote -> vote_type = "dislike";
            $faq_vote->save();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(faq $faq)
    {
        //
    }
}
