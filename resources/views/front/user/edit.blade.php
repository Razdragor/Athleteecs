@extends('layouts.front')


@section('css')
    <link href="{{ asset('asset/css/layouts/user-profile.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-cards.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/social.core.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="panel-body">
                        <!--Notice .user-profile class-->
                        <div class="user-profile">
                            <div class="row">
                                <div class="col-sm-2 col-md-2">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img src="{{ asset('asset/img/avatars/avatar.png') }}" alt="Avatar" class="img-thumbnail img-responsive">
                                        </div>
                                    </div>

                                    @if(Auth::user() != $user)
                                        <div>
                                            <a class="btn btn-block btn-success"><i class="fa fa-envelope-alt"></i>Envoyer un message</a>
                                        </div>
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
                                        <div class="col-sm-2 col-md-2 hidden-xs">
                                            <a id="edit-profile-button" href="{{ route('user.show',['user'=>$user])}}" class="btn btn-block btn-primary">Annuler</a>
                                        </div>
                                    </div>
                                    <!-- BEGIN USER PANORAMIC-->
                                    <p id="panoramic" class="hidden-xs">
                                        <img src="{{ asset('asset/img/gallery/thecity_panoramic.jpg') }}" height="160" alt="Avatar" class="img-rounded img-responsive">
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
                                                <a href="#">Posts</a>
                                            </li>
                                            <li class="active ok" id="infos">
                                                <a href="#" data-toggle="tab">Info</a>
                                            </li>
                                            <li id="photos" class="ok">
                                                <a href="#">Photos</a>
                                            </li>
                                            <li id="videos" class="ok">
                                                <a href="#">Videos</a>
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
                                                            <img src="http://lorempixel.com/800/250/sports/5/" alt="Image" class="img-responsive">
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

                                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('user.update',['user' => $user]) }}">
                                                {{ csrf_field() }}
                                                <div class="tab-pane active infos">
                                                    <br>
                                                    <dl class="dl-horizontal">
                                                        <dt>Prénom</dt>
                                                        <dd><input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                                                        @if ($errors->has('firstname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('firstname') }}</strong>
                                                            </span>
                                                        @endif

                                                        <dd class="divider"></dd>
                                                        <dt>Nom</dt>
                                                        <dd><input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                                                        @if ($errors->has('lastname'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('lastname') }}</strong>
                                                        </span>
                                                        @endif

                                                        <dd class="divider"></dd>
                                                        <dt>Sexe</dt>
                                                        <dd><select id="select-beast" class="form-control" name="sexe">
                                                            <option value="Homme" @if($user->sexe == "Homme") selected="selected" @endif>
                                                                Homme
                                                            </option>
                                                            <option value="Femme" @if($user->sexe == "Femme") selected="selected" @endif>
                                                                Femme
                                                            </option>
                                                            <option value="Autre" @if($user->sexe == "Autre") selected="selected" @endif>
                                                                Autre
                                                            </option>
                                                        </select></dd>

                                                        <dd class="divider"></dd>
                                                        <dt>Poste actuel</dt>
                                                        <dd><input type="text" class="form-control" name="job" value="{{ $user->job }}">
                                                        <dd class="divider"></dd>
                                                        <dt>Entreprise</dt>
                                                        <dd><input type="text" class="form-control" name="firm" value="{{ $user->firm }}">
                                                        <dd class="divider"></dd>
                                                        <dt>Scolarité</dt>
                                                        <dd><input type="text" class="form-control" name="school" value="{{ $user->school }}">
                                                        <dd class="divider"></dd>
                                                        <dt>Sports pratiqué</dt>
                                                        <ul class="list-unstyled"></dd>
                                                        @foreach($user->sports as $sport)
                                                            <dd>
                                                                <li>
                                                                    <input type="checkbox" id="{{$sport->id}}" name="sportsuppr[]" value="{{$sport->id}}">{{ $sport->name }}
                                                                </li>
                                                            </dd>

                                                        @endforeach
                                                        </ul>
                                                        <dd class="divider"></dd>

                                                        <dt>Sports disponibles</dt>
                                                        <ul class="list-unstyled"></dd>
                                                            @foreach($sports as $sport)
                                                            <dd>
                                                                <li>
                                                                    <input type="checkbox" id="{{$sport->id}}" name="sport[]" value="{{$sport->id}}">{{ $sport->name }}
                                                                </li>
                                                            </dd>
                                                            @endforeach
                                                        </ul>
                                                        <dd class="divider"></dd>
                                                        <dt>Adresse postal</dt>
                                                        <dd><input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                                        <dd class="divider"></dd>
                                                        <dd>
                                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                                        </dd>
                                                    </dl>
                                                </div>

                                            </form>
                                        </div>
                                        <!-- END TABS SECTIONS-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection