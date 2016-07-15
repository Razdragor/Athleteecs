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
                                        <img src="{{ $user->picture}}" alt="Avatar" class="img-thumbnail img-responsive">
                                    </div>
                                </div>
                                @if(Auth::user() != $user)
                                    <div>
                                        <a class="btn btn-block btn-success"><i class="fa fa-envelope-alt"></i>Envoyer un message</a>
                                    </div>
                                    @foreach($user->friends as $friend)
                                        @if($friend->id == Auth::user()->id)
                                            <div>
                                                <a href="{{ route('front.friends.destroy', ['friend' => $user]) }}" class="btn btn-block btn-success">Retirer de la liste des amis</a>
                                            </div>
                                        @else
                                            @foreach($user->demandsfrom as $friend)
                                                    <?php echo $friend->id ?>
                                                @if( $friend->id == Auth::user()->id)
                                                    <div>
                                                        <a href="{{ route('front.friends.cancel', ['friend' => $user]) }}" class="btn btn-block btn-success">Annuler la demande</a>
                                                    </div>
                                                @else
                                                    @foreach($user->demandsto as $friend)
                                                        @if( $friend->id == Auth::user()->id)
                                                            <div>
                                                                <a href="{{ route('front.friends.accept', ['friend' => $user]) }}" class="btn btn-block btn-success">Accepter</a>
                                                            </div>
                                                            <div>
                                                                <a href="{{ route('front.friends.cancel', ['friend' => $user]) }}" class="btn btn-block btn-success">Annuler</a>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <a href="{{ route('front.friends.add', ['friend' => $user]) }}" class="btn btn-block btn-success">Ajouter</a>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
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
                                        <li id="amis" class="ok">
                                            <a href="#">{{count($user->friends)}} @if(count($user->friends)>1) amis @else ami @endif</a>
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
                                        <div class="tab-pane active photos">
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
                                                <article class="col-md-4 isotopeItem webdesign">
                                                    <div class="section-portfolio-item">
                                                        {{--<img src="../../assets/img/gallery/sunset.jpg" alt="">--}}
                                                        <div class="section-portfolio-desc align-center">
                                                            <div class="folio-info">
                                                                <h5><a href="#">section-portfolio name</a></h5>
                                                                {{--<a href="../../assets/img/gallery/sunset.jpg" class="fancybox">--}}
                                                                    <i class="fa fa-plus fa-2x"></i>
                                                                {{--</a>--}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="tab-pane active videos">
                                            <div id="3" class="section-portfolio-items isotopeWrapper clearfix">
                                                <div class="post_picture_video">
                                                    @if(!is_null($user->videos))
                                                        <div class="video-container"><iframe src="https://www.youtube.com/embed/{{$publication->video->url}}" frameborder="0" allowfullscreen></iframe></div>
                                                    @elseif(!is_null($publication->picture))
                                                        <img src="{{ asset($publication->picture) }}" alt="" class="img-responsive">
                                                    @endif
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
    </div>
</div>
@endsection

@section('js')
        <script src="{{ asset('asset/js/plugins/isotope/jquery.isotope.min.js') }}"></script>
@endsection
