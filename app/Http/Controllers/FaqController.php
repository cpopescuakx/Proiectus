<?php

namespace App\Http\Controllers;

use App\faq;
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
    public function index()
    {
        $BlogFAQS = FaqController::indexBlog();
        $PropostaFAQS = FaqController::indexProposta();
        $ProjecteFAQS = FaqController::indexProjecte();
        $XatFAQS = FaqController::indexXat();
        $CorreuFAQS = FaqController::indexCorreu();
        $WikiFAQS = FaqController::indexWiki();

        return view('FAQ.index',compact('BlogFAQS','PropostaFAQS','ProjecteFAQS','XatFAQS','CorreuFAQS','WikiFAQS'));
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
