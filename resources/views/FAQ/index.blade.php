@extends('layouts.default')
@section('content')
<body>
<div class="container">
<h1 class="text-center">FAQ</h1>
<br>
    <div class="row">
        <div class="col-lg-4">
            <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1" aria-selected="true">
                    <i class="mdi mdi-help-circle"></i> Projecte
                </a>
                <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2" aria-selected="false">
                    <i class="mdi mdi-account"></i> Proposta
                </a>
                <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3" aria-selected="false">
                    <i class="mdi mdi-account-settings"></i> Blog
                </a>
                <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4" aria-selected="false">
                    <i class="mdi mdi-heart"></i> Wiki
                </a>
                <a href="#tab5" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab5" aria-selected="false">
                    <i class="mdi mdi-coin"></i> Xat
                </a>
                <a href="#tab6" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab6" aria-selected="false">
                    <i class="mdi mdi-help"></i> Correu
                </a>
                <a href="#tab7" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab7" aria-selected="false">
                    <i class="mdi mdi-help"></i> Compte
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tab-content" id="faq-tab-content">
                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                    <div class="accordion" id="accordion-tab-1">
                        <div class="card">
                            <div class="card-header" id="accordion-tab-1-heading-1">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-1" aria-expanded="false" aria-controls="accordion-tab-1-content-1">Just once I'd like to eat dinner with a celebrity?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-1-content-1" aria-labelledby="accordion-tab-1-heading-1" data-parent="#accordion-tab-1">
                                <div class="card-body">
                                    <p>Yes, if you make it look like an electrical fire. When you do things right, people won't be sure you've done anything at all. I was having the most wonderful dream. Except you were there, and you were there, and you were there! No argument here. Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords. Cruel though they may be.</p>
                                    <p><strong>Example: </strong>Shut up and get to the point!</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-1-heading-2">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-2" aria-expanded="false" aria-controls="accordion-tab-1-content-2">Bender, I didn't know you liked cooking?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-1-content-2" aria-labelledby="accordion-tab-1-heading-2" data-parent="#accordion-tab-1">
                                <div class="card-body">
                                    <p>That's so cute. Can we have Bender Burgers again? Is the Space Pope reptilian!? I wish! It's a nickel. Bender! Ship! Stop bickering or I'm going to come back there and change your opinions manually!</p>
                                    <p><strong>Example: </strong>Okay, I like a challenge. Is that a cooking show? No argument here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-1-heading-3">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-3" aria-expanded="false" aria-controls="accordion-tab-1-content-3">My fellow Earthicans?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-1-content-3" aria-labelledby="accordion-tab-1-heading-3" data-parent="#accordion-tab-1">
                                <div class="card-body">
                                    <p>As I have explained in my book 'Earth in the Balance', and the much more popular 'Harry Potter and the Balance of Earth', we need to defend our planet against pollution. Also dark wizards. Fry, you can't just sit here in the dark listening to classical music.</p>
                                    <p><strong>Example: </strong>Actually, that's still true. Well, let's just dump it in the sewer and say we delivered it.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-1-heading-4">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-4" aria-expanded="false" aria-controls="accordion-tab-1-content-4">Who am I making this out to?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-1-content-4" aria-labelledby="accordion-tab-1-heading-4" data-parent="#accordion-tab-1">
                                <div class="card-body">
                                    <p>Morbo can't understand his teleprompter because he forgot how you say that letter that's shaped like a man wearing a hat. Also Zoidberg. Can we have Bender Burgers again? Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.</p>
                                    <p><strong>Example: </strong>Cruel though they may be...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                    <div class="accordion" id="accordion-tab-2">
                        <div class="card">
                            <div class="card-header" id="accordion-tab-2-heading-1">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-1" aria-expanded="false" aria-controls="accordion-tab-2-content-1"></button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-2-content-1" aria-labelledby="accordion-tab-2-heading-1" data-parent="#accordion-tab-2">
                                <div class="card-body">
                                    <p>Un blog és un lloc web on es va publicant contingut cada cert temps en forma de posts, els quals estan ordenats per data de creació, de manera que els més recents apareixen primers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-2-heading-2">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-2" aria-expanded="false" aria-controls="accordion-tab-2-content-2">This opera's as lousy as it is brilliant?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-2-content-2" aria-labelledby="accordion-tab-2-heading-2" data-parent="#accordion-tab-2">
                                <div class="card-body">
                                    <p>Your lyrics lack subtlety. You can't just have your characters announce how they feel. That makes me feel angry! It's okay, Bender. I like cooking too. Interesting. No, wait, the other thing: tedious.</p>
                                    <p><strong>Example: </strong>Of all the friends I've had… you're the first. But I know you in the future. I cleaned your poop. Then we'll go with that data file!</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-2-heading-3">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-3" aria-expanded="false" aria-controls="accordion-tab-2-content-3">Who are you, my warranty?!</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-2-content-3" aria-labelledby="accordion-tab-2-heading-3" data-parent="#accordion-tab-2">
                                <div class="card-body">
                                    <p>Oh, I think we should just stay friends. I'll tell them you went down prying the wedding ring off his cold, dead finger. Aww, it's true. I've been hiding it for so long. Say it in Russian! Then throw her in the laundry room, which will hereafter be referred to as "the brig".</p>
                                    <p><strong>Example: </strong> We're rescuing ya. Robot 1-X, save my friends! And Zoidberg! <em>Then we'll go with that data file!</em> Okay, I like a challenge.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-2-heading-4">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-4" aria-expanded="false" aria-controls="accordion-tab-2-content-4">I haven't felt much of anything since my guinea pig died?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-2-content-4" aria-labelledby="accordion-tab-2-heading-4" data-parent="#accordion-tab-2">
                                <div class="card-body">
                                    <p>And I'm his friend Jesus. Oh right. I forgot about the battle. OK, if everyone's finished being stupid. We'll need to have a look inside you with this camera. I'm just glad my fat, ugly mama isn't alive to see this day.</p>
                                    <p><strong>Example: </strong> Isn't it true that you have been paid for your testimony? Quite possible.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                    <div class="accordion" id="accordion-tab-3">
                        <div class="card">
                            <div class="card-header" id="accordion-tab-3-heading-1">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-1" aria-expanded="false" aria-controls="accordion-tab-3-content-1">Què és un blog?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-3-content-1" aria-labelledby="accordion-tab-3-heading-1" data-parent="#accordion-tab-3">
                                <div class="card-body">
                                    <p>Un <strong>blog</strong> és un lloc web on es va publicant contingut cada cert temps en forma de <strong>posts</strong>, els quals estan <strong>ordenats</strong> per data de <strong>creació</strong>, de manera que els més <strong>recents</strong> apareixen primers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-3-heading-2">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-2" aria-expanded="false" aria-controls="accordion-tab-3-content-2">Qui pot accedir al blog d'un projecte?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-3-content-2" aria-labelledby="accordion-tab-3-heading-2" data-parent="#accordion-tab-3">
                                <div class="card-body">
                                    <p> Només poden <strong>accedir</strong> aquests que formin part del mateix <strong>projecte</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-3-heading-3">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-3" aria-expanded="false" aria-controls="accordion-tab-3-content-3">Què és un post?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-3-content-3" aria-labelledby="accordion-tab-3-heading-3" data-parent="#accordion-tab-3">
                                <div class="card-body">
                                    <p>Un <strong>post</strong> és cada entrada de <strong>contingut</strong> que publiquem en un <strong>blog</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-3-heading-4">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-4" aria-expanded="false" aria-controls="accordion-tab-3-content-4">Qui pot crear un post?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-3-content-4" aria-labelledby="accordion-tab-3-heading-4" data-parent="#accordion-tab-3">
                                <div class="card-body">
                                    <p>Un <strong>post</strong> pot ser <strong>creat</strong> per qualsevol <strong>membre</strong> d'un <strong>projecte</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-3-heading-5">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-5" aria-expanded="false" aria-controls="accordion-tab-3-content-5">Qui pot editar un post ja creat?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-3-content-5" aria-labelledby="accordion-tab-3-heading-5" data-parent="#accordion-tab-3">
                                <div class="card-body">
                                    <p>Un <strong>post</strong> creat només pot ser <strong>editat</strong> pel seu <strong>propietari</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-3-heading-6">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-6" aria-expanded="false" aria-controls="accordion-tab-3-content-6">Qui pot eliminar un post ja creat?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-3-content-6" aria-labelledby="accordion-tab-3-heading-6" data-parent="#accordion-tab-3">
                                <div class="card-body">
                                    <p>Un <strong>post</strong> ja creat només pot ser <strong>eliminat</strong> pel seu<strong> propietari</strong>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                    <div class="accordion" id="accordion-tab-4">
                        <div class="card">
                            <div class="card-header" id="accordion-tab-4-heading-1">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-1" aria-expanded="false" aria-controls="accordion-tab-4-content-1">Què és una Wiki?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-4-content-1" aria-labelledby="accordion-tab-4-heading-1" data-parent="#accordion-tab-4">
                                <div class="card-body">
                                    <p>Una <strong>wiki</strong> és un lloc web <strong>col·laboratiu</strong>, on els <strong>usuaris</strong> d'aquesta poden <strong>crear</strong>, <strong>modificar</strong>, <strong>enllaçar</strong> i <strong>esborrar</strong> articles, de forma <strong>interactiva</strong>, <strong>fàcil</strong> i <strong>ràpida</strong>. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-4-heading-2">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-2" aria-expanded="false" aria-controls="accordion-tab-4-content-2">Qui pot accedir a la wiki d'un projecte?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-4-content-2" aria-labelledby="accordion-tab-4-heading-2" data-parent="#accordion-tab-4">
                                <div class="card-body">
                                    <p>Només poden <strong>accedir</strong> aquests que formin part del mateix <strong>projecte</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-4-heading-3">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-3" aria-expanded="false" aria-controls="accordion-tab-4-content-3">Què és un article?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-4-content-3" aria-labelledby="accordion-tab-4-heading-3" data-parent="#accordion-tab-4">
                                <div class="card-body">
                                    <p>Un <strong>article</strong> és cada entrada de <strong>contingut</strong> que publiquem en una <strong>wiki</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-4-heading-4">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-4" aria-expanded="false" aria-controls="accordion-tab-4-content-4">Qui pot crear un article?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-4-content-4" aria-labelledby="accordion-tab-4-heading-4" data-parent="#accordion-tab-4">
                                <div class="card-body">
                                    <p>Un <strong>article</strong> pot ser <strong>creat</strong> per qualsevol <strong>membre</strong> d'un <strong>projecte</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-4-heading-5">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-5" aria-expanded="false" aria-controls="accordion-tab-4-content-5">Qui pot editar un article ja creat?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-4-content-5" aria-labelledby="accordion-tab-4-heading-5" data-parent="#accordion-tab-4">
                                <div class="card-body">
                                    <p>Un <strong>article</strong> només pot ser <strong>editat</strong> pel seu <strong>propietari</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-4-heading-6">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-6" aria-expanded="false" aria-controls="accordion-tab-4-content-6">Qui pot eliminar un article ja creat?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-4-content-6" aria-labelledby="accordion-tab-4-heading-6" data-parent="#accordion-tab-4">
                                <div class="card-body">
                                    <p>Un <strong>article</strong> només pot ser <strong>eliminat</strong> pel seu <strong>propietari</strong>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5">
                    <div class="accordion" id="accordion-tab-5">
                        <div class="card">
                            <div class="card-header" id="accordion-tab-5-heading-1">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-1" aria-expanded="false" aria-controls="accordion-tab-5-content-1">Què és un xat?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-5-content-1" aria-labelledby="accordion-tab-5-heading-1" data-parent="#accordion-tab-5">
                                <div class="card-body">
                                <p>Un <strong>xat</strong> és un <strong>recurs</strong> de <strong>comunicació</strong> en <strong>temps</strong> real. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-5-heading-2">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-2" aria-expanded="false" aria-controls="accordion-tab-5-content-2">Amb qui puc xatejar?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-5-content-2" aria-labelledby="accordion-tab-5-heading-2" data-parent="#accordion-tab-5">
                                <div class="card-body">
                                <p>El xat només és <strong>intern</strong> i <strong>exclusiu</strong> per a un <strong>projecte</strong>, és a dir que per cada <strong>projecte</strong> hi ha un <strong>xat</strong> on poden <strong>xatejar</strong> tots els <strong>membres</strong> d'aquest.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-5-heading-3">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-3" aria-expanded="false" aria-controls="accordion-tab-5-content-3">Puc tenir més d'un xat?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-5-content-3" aria-labelledby="accordion-tab-5-heading-3" data-parent="#accordion-tab-5">
                                <div class="card-body">
                                <p>Esclar que si, és poden <strong>tenir</strong> tants de <strong>xats</strong> com <strong>projectes</strong> als quals <strong>pertanys</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-5-heading-4">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-4" aria-expanded="false" aria-controls="accordion-tab-5-content-4">Es poden esborrar els missatges d'un xat?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-5-content-4" aria-labelledby="accordion-tab-5-heading-4" data-parent="#accordion-tab-5">
                                <div class="card-body">
                                <p>No, un cop s'envia el <strong>missatge</strong> aquest ja no es pot <strong>esborrar</strong>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-5-heading-5">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-5" aria-expanded="false" aria-controls="accordion-tab-5-content-5">Es poden editar els missatges d'un xat?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-5-content-5" aria-labelledby="accordion-tab-5-heading-5" data-parent="#accordion-tab-5">
                                <div class="card-body">
                                <p>No, un cop s'envia el <strong>missatge</strong> aquest ja no es pot <strong>editar</strong>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab6" role="tabpanel" aria-labelledby="tab6">
                    <div class="accordion" id="accordion-tab-6">
                        <div class="card">
                            <div class="card-header" id="accordion-tab-6-heading-1">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-1" aria-expanded="false" aria-controls="accordion-tab-6-content-1">Què és un correu?</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-6-content-1" aria-labelledby="accordion-tab-6-heading-1" data-parent="#accordion-tab-6">
                                <div class="card-body">
                                    <p>Ah, now the ball's in Farnsworth's court! We'll need to have a look inside you with this camera. Stop it, stop it. It's fine. I will 'destroy' you! Bender! Ship! Stop bickering or I'm going to come back there and change your opinions manually!</p>
                                    <p><strong>Example: </strong>So I really am important? How I feel when I'm drunk is correct?</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-6-heading-2">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-2" aria-expanded="false" aria-controls="accordion-tab-6-content-2">A qui puc enviar correus?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-6-content-2" aria-labelledby="accordion-tab-6-heading-2" data-parent="#accordion-tab-6">
                                <div class="card-body">
                                    <p>Nibbler, who's gone to a place where I, too, hope one day to go. The toilet. But existing is basically all I do! I suppose I could part with 'one' and still be feared. I just told you! You've killed me!</p>
                                    <p><strong>Example: </strong>What's with you kids? Every other day it's food, food, food.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-6-heading-3">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-3" aria-expanded="false" aria-controls="accordion-tab-6-content-3">De qui puc rebre correus?</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-6-content-3" aria-labelledby="accordion-tab-6-heading-3" data-parent="#accordion-tab-6">
                                <div class="card-body">
                                    <p>It has nothing to do with mating. Soon enough. There, now he's trapped in a book I wrote: a crummy world of plot holes and spelling errors! Daylight and everything. Hey! I'm a porno-dealing monster, what do I care what you think?</p>
                                    <p><strong>Example: </strong>Is that a cooking show? It doesn't look so shiny to me. And why did 'I' have to take a cab?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab7" role="tabpanel" aria-labelledby="tab6">
                    <div class="accordion" id="accordion-tab-7">
                        <div class="card">
                            <div class="card-header" id="accordion-tab-7-heading-1">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-7-content-1" aria-expanded="false" aria-controls="accordion-tab-7-content-1">Pregunta</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-7-content-1" aria-labelledby="accordion-tab-7-heading-1" data-parent="#accordion-tab-7">
                                <div class="card-body">
                                <p>Resposta</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-7-heading-2">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-7-content-2" aria-expanded="false" aria-controls="accordion-tab-7-content-2">Pregunta 2</button>
                                </h5>
                            </div>
                            <div class="collapse show" id="accordion-tab-7-content-2" aria-labelledby="accordion-tab-7-heading-1" data-parent="#accordion-tab-7">
                                <div class="card-body">
                                <p>Resposta 2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>body {
  margin-top: 30px;
  background-color: #eee;
}

.faq-nav {
  flex-direction: column;
  margin: 0 0 32px;
  border-radius: 2px;
  border: 1px solid #ddd;
  box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
.faq-nav .nav-link {
  position: relative;
  display: block;
  margin: 0;
  padding: 13px 16px;
  background-color: #fff;
  border: 0;
  border-bottom: 1px solid #ddd;
  border-radius: 0;
  color: #616161;
  transition: background-color 0.2s ease;
}
.faq-nav .nav-link:hover {
  background-color: #f6f6f6;
}
.faq-nav .nav-link.active {
  background-color: #f6f6f6;
  font-weight: 700;
  color: rgba(0, 0, 0, 0.87);
}
.faq-nav .nav-link:last-of-type {
  border-bottom-left-radius: 2px;
  border-bottom-right-radius: 2px;
  border-bottom: 0;
}
.faq-nav .nav-link i.mdi {
  margin-right: 5px;
  font-size: 18px;
  position: relative;
}

.tab-content {
  box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
.tab-content .card {
  border-radius: 0;
}
.tab-content .card-header {
  padding: 15px 16px;
  border-radius: 0;
  background-color: #f6f6f6;
}
.tab-content .card-header h5 {
  margin: 0;
}
.tab-content .card-header h5 button {
  display: block;
  width: 100%;
  padding: 0;
  border: 0;
  font-weight: 700;
  color: rgba(0, 0, 0, 0.87);
  text-align: left;
  white-space: normal;
}
.tab-content .card-header h5 button:hover, .tab-content .card-header h5 button:focus, .tab-content .card-header h5 button:active, .tab-content .card-header h5 button:hover:active {
  text-decoration: none;
}
.tab-content .card-body p {
  color: #616161;
}
.tab-content .card-body p:last-of-type {
  margin: 0;
}

.accordion > .card:not(:first-child) {
  border-top: 0;
}

.collapse.show .card-body {
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}</style>

@stop