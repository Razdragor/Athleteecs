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
            <div class="panel panel-primary panel-fixed-top">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil</h3>
                </div>
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
                                    @if(Auth::user() == $user)
                                    <div class="col-sm-2 col-md-2 hidden-xs">
                                        <a id="edit-profile-button" href="{{ route('user.edit',['user' => $user]) }}" class="btn btn-block btn-primary">Editer le profil</a>
                                    </div>
                                    @endif
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
                                        <div class="tab-pane active infos">
                                            <br>
                                            <dl class="dl-horizontal">
                                                <dt>Sexe</dt>
                                                <dd>{{ $user->sexe }}</dd>
                                                <dd class="divider"></dd>
                                                <dt>Poste actuel</dt>
                                                <dd>A rajouté !</dd>
                                                <dd class="divider"></dd>
                                                <dt>Entreprise</dt>
                                                <dd>A rajouté</dd>
                                                <dd class="divider"></dd>
                                                <dt>Scolarité</dt>
                                                <dd>A ajouté</dd>
                                                <dd class="divider"></dd>
                                                <dt>Sports pratiqué</dt>
                                                @foreach($user->sports as $sport)
                                                    <dd>{{ $sport->name }}</dd>
                                                @endforeach
                                                <dd class="divider"></dd>
                                                <dt>Adresse postal</dt>
                                                <dd>
                                                    <img src="http://maps.googleapis.com/maps/api/staticmap?center=-12.043333,-77.028333&amp;size=450x150&amp;sensor=true&amp;zoom=15" alt="Map" class="img-responsive">
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <!-- END TABS SECTIONS-->
                                    <div id="user-links" class="col-sm-3 col-md-3">
                                        <h4>Other Profiles</h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#"><i class="fa fa-github"></i>Gihub</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-pinterest"></i>Pinterest</a>
                                            </li>
                                        </ul>
                                        <h4>Recomended Links</h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#"><i class="fa fa-css3"></i>CS3 Documentation</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-hospital-o"></i>Local Hospital</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-html5"></i>HTML5 Documentation</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">User Cards</h3>
                </div>
                <div class="panel-body">
                    <!-- BEGIN USER CARD SIMPLE EXAMPLE-->
                    <!--Notice .user-card-simple class-->
                    <div class="col-md-5 user-card-simple">
                        <div class="text-center">
                            <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                                <img src="{{ asset('asset/img/avatars/avatar.png') }}" alt="Avatar" class="img-circle">
                            </a>
                            <h3>John Doe</h3>
                            <em>click my face for more</em>
                        </div>
                    </div>
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"></button>
                                    <h4 id="myModalLabel" class="modal-title">More About John</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="center">
                                        <img src="{{ asset('asset/img/avatars/avatar.png') }}" width="140" height="140" alt="Avatar" class="img-circle">
                                        <h3 class="media-heading">John Doe
                                            <small>NOWHERE</small>
                                        </h3>
                        <span><strong>Skills:</strong>
                        </span>
                                        <span class="label label-warning">HTML5/CSS</span>
                                        <span class="label label-info">Adobe CS 5.5</span>
                                        <span class="label label-info">Microsoft Office</span>
                                        <span class="label label-success">Windows XP, Vista, 7</span>
                                    </div>
                                    <hr>
                                    <div class="center">
                                        <p class="text-left"><strong>Bio:</strong>
                                            <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                                        <br>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="center">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">I've heard enough about John</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END USER CARD SIMPLE EXAMPLE-->
                    <!--Notice .user-card-tabs class-->
                    <div class="col-md-5 col-md-offset-2 user-card-tabs">
                        <div class="user-image">
                            <img src="{{ asset('asset/img/avatars/avatar.png') }}" alt="Karan Singh Sisodia" title="Karan Singh Sisodia" class="img-rounded">
                        </div>
                        <div class="user-info">
                            <div class="user-heading">
                                <h3>John Doe</h3>
                                <span class="help-block">Nowhere, DC</span>
                            </div>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active">
                                    <a data-toggle="tab" href="#information">
                                        <span class="fa fa-user fa-lg"></span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#settings">
                                        <span class="fa fa-cog fa-lg"></span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#email">
                                        <span class="fa fa-envelope fa-lg"></span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#events">
                                        <span class="fa fa-calendar fa-lg"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navigation"></ul>
                            <div class="user-body">
                                <div class="tab-content">
                                    <div id="information" class="tab-pane active">
                                        <h4>Account Information</h4>
                                    </div>
                                    <div id="settings" class="tab-pane">
                                        <h4>Settings</h4>
                                    </div>
                                    <div id="email" class="tab-pane">
                                        <h4>Send Message</h4>
                                    </div>
                                    <div id="events" class="tab-pane">
                                        <h4>Events</h4>
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