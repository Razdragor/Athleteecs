@extends('layouts.app')

@section('css')
    <link href="{{ asset('asset/css/layouts/user-profile.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-cards.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/social.core.css') }}" rel="stylesheet">
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
                    <h3 class="panel-title">User Profile</h3>
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
                                <div>
                                    <a class="btn btn-block btn-success"><i class="fa fa-envelope-alt"></i>Send message</a>
                                </div>
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
                                        <h3>Julio Marquez</h3>
                                        <h5>Geophysical Engineer, Company Inc., USA</h5>
                                    </div>
                                    <!-- END USER STATUS-->
                                    <div class="col-sm-2 col-md-2 hidden-xs">
                                        <a id="edit-profile-button" href="#edit" class="btn btn-block btn-primary">Edit Profile</a>
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
                                        <li>
                                            <a href="#pots">Posts</a>
                                        </li>
                                        <li class="active">
                                            <a href="#info" data-toggle="tab">Info</a>
                                        </li>
                                        <li>
                                            <a href="#profile">Photos</a>
                                        </li>
                                        <li>
                                            <a href="#profile">Videos</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END TABS SELECTIONS-->
                                <div class="row">
                                    <!-- BEGIN TABS SECTIONS-->
                                    <div id="profileTabContent" class="tab-content col-sm-9 col-md-9">
                                        <div id="info" class="tab-pane active">
                                            <br>
                                            <dl class="dl-horizontal">
                                                <dt>Introduction</dt>
                                                <dd>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, magnam voluptates cum non doloremque tenetur minima voluptas est ipsam delectus.</dd>
                                                <dd class="divider"></dd>
                                                <dt>Occupation</dt>
                                                <dd>Geophysical Engineer</dd>
                                                <dd class="divider"></dd>
                                                <dt>Employment</dt>
                                                <dd>Geophysical Engineer</dd>
                                                <dd>Company Inc.</dd>
                                                <dd class="divider"></dd>
                                                <dt>Education</dt>
                                                <dd>College Name</dd>
                                                <dd>Geophisics</dd>
                                                <dd class="divider"></dd>
                                                <dd>School Name</dd>
                                                <dd>High School</dd>
                                                <dd class="divider"></dd>
                                                <dt>Places Lived</dt>
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