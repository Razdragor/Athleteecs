@extends('layouts.front')


@section('css')
    <link href="{{ asset('asset/css/layouts/user-profile.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-cards.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/js/plugins/isotope/isotope.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--Notice .user-profile class-->
                <div class="user-profile">
                    <div class="row">
                        <div class="col-sm-2 col-md-2">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="{{asset('images/'.$user->picture)}}" alt="Avatar"
                                         class="img-thumbnail img-responsive">
                                </div>
                            </div>

                            @if(Auth::user()->isfriend(Auth::user()->id,$user->id)==='demandsfrom')
                                <div>
                                    <a href="{{ route('front.friends.cancel', ['friend' => $user->id]) }}" class="btn btn-block btn-success">Annuler la demande</a>
                                </div>
                            @elseif(Auth::user()->isfriend(Auth::user()->id,$user->id)==='demandsto')
                                <div>
                                    <a href="{{ route('front.friends.accept', ['friend' => $user->id]) }}" class="btn btn-block btn-success">Accepter la demande</a>
                                </div>
                                <div>
                                    <a href="{{ route('front.friends.cancel', ['friend' =>$user->id]) }}" class="btn btn-block btn-success">Refuser la demande</a>
                                </div>
                            @elseif(Auth::user()->isfriend(Auth::user()->id,$user->id)==='estami')
                                <div>
                                    <a href="{{ route('front.friends.destroy', ['friend' => $user->id]) }}" class="btn btn-block btn-success">Retirer de la liste d'amis</a>
                                </div>
                            @else
                                <div>
                                    <a href="{{ route('front.friends.add', ['friend' => $user->id]) }}" class="btn btn-block btn-success">Ajouter un ami</a>
                                </div>
                            @endif
                        @endif
                        <br>
                        <!-- BEGIN SOCIAL ICONS-->
                        <div class="text-center social-icons">
                            <a href="#">

                <span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook"></i>
                </span>
                                </a>
                                <a href="#">
                <span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter"></i>
                </span>
                                </a>
                                <a href="#">
                <span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-google-plus"></i>
                </span>
                                </a>
                            </div>
                            <!-- END SOCIAL ICONS-->
                        </div>
                        <div class="col-sm-10 col-md-10">
                            <div class="row">
                                <!-- BEGIN USER STATUS-->
                                <div id="user-status" class="text-left col-sm-10 col-md-10">
                                    <h3>{{ $user->firstname}} {{$user->lastname }}</h3>
                                </div>
                                <!-- END USER STATUS-->
                                @if(Auth::user() == $user)
                                    <div class="col-sm-2 col-md-2 hidden-xs">
                                        <a id="edit-profile-button" href="{{ route('user.edit',['user' => $user]) }}"
                                           class="btn btn-block btn-primary">Editer le profil</a>
                                    </div>
                                @endif
                            </div>
                            <!-- BEGIN USER PANORAMIC-->
                            <p id="panoramic" class="hidden-xs">
                                <img src="{{ asset('asset/img/gallery/thecity_panoramic.jpg') }}" height="160"
                                     alt="Avatar" class="img-rounded img-responsive">
                            </p>
                            <!-- END USER PANORAMIC-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-md-2"></div>
                        <div class="col-sm-10 col-md-10">
                            <!-- BEGIN TABS SELECTIONS-->
                            <div class="row">
                                <ul id="profileTab" class="nav nav-tabs">
                                    <li id="pots" class="ok">
                                        <a href="#">Dernières publications</a>
                                    </li>
                                    <li class="active ok" id="infos">
                                        <a href="#" data-toggle="tab">Information</a>
                                    </li>
                                    <li id="amis" class="ok">
                                        <a href="#">{{count($user->friends)}} @if(count($user->friends)>1) Amis @else
                                                Ami @endif</a>
                                    </li>
                                    <li id="equipement" class="ok">
                                        <a href="#">Equipements</a>
                                    </li>
                                    <li id="photos" class="ok">
                                        <a href="#">Photos</a>
                                    </li>

                                </ul>
                            </div>
                            <!-- END TABS SELECTIONS-->
                            <div class="row">
                                <!-- BEGIN TABS SECTIONS-->
                                <div id="profileTabContent" class="tab-content col-sm-9 col-md-9">
                                    <div class="tab-pane active pots" style="display: none;">
                                        @foreach($user->publications as $publication)
                                            <br>

                                            <div class="timeline-panel">
                                                <!-- //Notice .timeline-heading class-->
                                                <div class="timeline-heading">
                                                    <img src="http://lorempixel.com/800/250/sports/5/" alt="Image"
                                                         class="img-responsive">
                                                </div>
                                                <!-- //Notice .timeline-body class-->
                                                <div class="timeline-body">
                                                    <p>{{ $publication->message }}</p>
                                                </div>
                                                <!-- //Notice .timeline-footer class-->
                                                <div class="timeline-footer">
                                                    <!---->
                                                    <a href="#"><i class="fa fa-thu mbs-up"></i>
                                                    </a>
                                                    <!---->
                                                    <a href="#"><i class="fa fa-comment"></i>
                                                    </a>
                                                    <!---->
                                                    <a href="#"><i class="fa fa-share"></i>
                                                    </a>
                                                    <!---->
                                                    <a class="late-reading">Continue Reading</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane active infos">
                                        <br>
                                        <dl class="dl-horizontal">
                                            <dt>Sexe</dt>
                                            <dd>{{ $user->sexe }}</dd>
                                            <dd class="divider"></dd>
                                            <dt>Poste actuel</dt>
                                            <dd>{{ $user->job }}</dd>
                                            <dd class="divider"></dd>
                                            <dt>Entreprise</dt>
                                            <dd>{{ $user->firm }}</dd>
                                            <dd class="divider"></dd>
                                            <dt>Scolarité</dt>
                                            <dd>{{ $user->school }}</dd>
                                            <dd class="divider"></dd>
                                            <dt>Sports pratiqué</dt>
                                            @foreach($user->sports as $sport)
                                                <dd>{{ $sport->name }}</dd>
                                            @endforeach
                                            <dd class="divider"></dd>

                                            <dt>Adresse postal</dt>
                                            <dd>{{ $user->address}}</dd>

                                        </dl>
                                    </div>
                                    <div class="tab-pane active photos" style="display: none;">
                                        <div id="3" class="section-portfolio-items isotopeWrapper clearfix">
                                            @foreach($user->pictures as $picture)
                                                <article class="col-md-4 isotopeItem webdesign">
                                                    <div class="section-portfolio-item">
                                                        <div class="picture-cadre">
                                                            <div class="picture-box">
                                                                <img src="{{ $picture->link }}" alt="image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane active equipement" style="display: none;">
                                        <div class="row">
                                            @foreach($user->products as $equipment)
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="equipement-cadre">
                                                            <div class="equipement-box">
                                                                <img src="{{asset('images/'.$equipment->picture)}}"
                                                                     alt="Avatar" class="img-thumbnail img-responsive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <a href="{{ $equipment->url }}">
                                                            <dd>{{ $equipment->name }}</dd>
                                                        </a>
                                                        <dd>{{ $equipment->description }}</dd>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="tab-pane active amis" style="display: none;">
                                        <div class="row">
                                            @forelse($user->friends as $friend)
                                                <div class="col-md-2 onefriend">
                                                    <div class="team-member">
                                                        <a href="/user/{{ $friend->id }}">
                                                            <figure class="member-photo">
                                                                <img class="imgonefriend" src="{{ $friend->picture }}"
                                                                     alt="{{ $friend->firstname }} {{ $friend->lastname }}"
                                                                     width="100px" height="100px">
                                                            </figure>
                                                            <div class="team-detail">
                                                                <h4>{{ $friend->firstname }} {{ $friend->lastname }}</h4>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <a href="{{ route('front.friends.destroy', ['friend' => $friend]) }}">Retirer
                                                        de la liste d'amis</a>
                                                </div>
                                            @empty
                                                <p class="onefriend">Vous n'avez pas encore ajoutés d'amis.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/plugins/isotope/jquery.isotope.min.js') }}"></script>
@endsection
