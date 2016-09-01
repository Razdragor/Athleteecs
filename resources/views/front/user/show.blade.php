@extends('layouts.front')


@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-profile.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-cards.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/js/plugins/isotope/isotope.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/product.css') }}" rel="stylesheet">
    <style>
        .timeline-2-cols::before {
            content: normal;
        }
        .timeline-2-cols > li > .timeline-panel::before {
            content: normal;
        }

        .timeline-2-cols > li > .timeline-panel::after {
            content: normal;
        }
        .timeline-2-cols > li > .timeline-panel {
            width: 100%;
        }
        .timeline-2-cols > li {
            width: 100%;
            margin-top: 0 !important;
            margin-bottom: 40px;
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--Notice .user-profile class-->
            <div class="user-profile">
                <div class="row">
                    <div class="col-md-2 col-md-2">
                        <div class="row">
                            <div class="col-md-12 text-center" style="position: relative">
                                @if($user->star == true)
                                    <img src="{{ asset('images/medal-1-s.png') }}" alt="medal" class="img-star">
                                @endif
                                <img src="{{$user->picture}}" alt="Avatar" class="img-thumbnail img-responsive">
                            </div>
                        </div>

                        @if(Auth::user() != $user)
                            <div>
                                <a href="{{ url('conversation/'.$user->user_id) }}" class="btn btn-block btn-success"><i class="fa fa-envelope-alt"></i>Envoyer un
                                    message</a>
                            </div>

                            <br>
                            <!-- BEGIN SOCIAL ICONS-->
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

                    </div>
                    <div class="col-sm-10 col-md-10">
                        <div class="row">
                            <!-- BEGIN USER STATUS-->
                            <div id="user-status" class="text-left col-sm-10 col-md-10">

                                <h3>
                                    {{ $user->firstname}} {{$user->lastname }}
                                </h3>
                            </div>
                            <!-- END USER STATUS-->
                            @if(Auth::user() == $user)
                                <div class="col-sm-2 col-md-2 hidden-xs">
                                    <a id="edit-profile-button" href="{{ route('user.edit',['user' => $user]) }}"
                                       class="btn btn-block btn-primary">Editer le profil</a>
                                </div>
                            @endif
                        </div>
                        <p id="panoramic" class="hidden-xs">
                            <img src="{{ asset('asset/img/gallery/thecity_panoramic.jpg') }}" height="160"
                                 alt="Avatar" class="img-rounded img-responsive">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-md-2"></div>
                    <div class="col-sm-10 col-md-8-2">
                        <!-- BEGIN TABS SELECTIONS-->
                        <div class="row">
                            <ul id="profileTab" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#pots" data-toggle="tab" aria-expanded="true">Actualités</a>
                                </li>
                                <li>
                                    <a href="#infos" data-toggle="tab" aria-expanded="false">Informations</a>
                                </li>
                                <li>
                                    <a href="#amis" data-toggle="tab" aria-expanded="false">{{count($user->friends)}} @if(count($user->friends)>1) Amis @else
                                            Ami @endif</a>
                                </li>
                                <li>
                                    <a href="#equipement" data-toggle="tab" aria-expanded="false">Equipements</a>
                                </li>
                                <li>
                                    <a href="#photo" data-toggle="tab" aria-expanded="false">Photos</a>
                                </li>

                            </ul>
                        </div>
                        <!-- END TABS SELECTIONS-->
                        <div class="row">
                            <!-- BEGIN TABS SECTIONS-->
                            <div id="profileTabContent" class="tab-content">
                                <div class="tab-pane fade active in" id="pots">
                                    <ul class="timeline-2-cols">

                                        @if($user->publications->count() > 0)
                                            <?php $i = 0; ?>
                                            @foreach($user->publications as $publication)
                                                <li id="<?php
                                                if(is_null($publication->activity)){
                                                    echo "publication-".$publication->id;
                                                }else{
                                                    echo "activite-".$publication->activity->id;
                                                }
                                                ?>" class="publicationJS">
                                                    <div class="timeline-badge primary">
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-heading row" style="margin: 0;">
                                                            <div style="margin:0 10px 0 0;float:left;">
                                                                <a href="{{ route("user.show", $publication->user->id ) }}">
                                                                    <img src="<?php echo $publication->user->picture ?>" alt="Image" class="img-responsive" style="width: 50px;height:50px; margin: 5px;display: inline-block;">
                                                                </a>
                                                            </div>
                                                            <div style="margin: 10px;float:left;">
                                                                @if($publication->user->star == true)
                                                                    <img src="{{ asset('images/medal-1.png') }}" alt="medal">
                                                                @endif
                                                                @if(!is_null($publication->association))
                                                                    <span>{{$publication->user->firstname.' '.$publication->user->lastname}} - <a href="{{ route('association.show',['association' => $publication->association->id]) }}">{{ $publication->association->name }}</a></span><br>
                                                                @elseif(!is_null($publication->event))
                                                                    <span>{{ $publication->user->firstname.' '.$publication->user->lastname}} - <a href="{{ route('event.show',['event' => $publication->event->id]) }}">{{ $publication->event->name }}</a></span><br>
                                                                @else
                                                                    <span>{{ $publication->user->firstname.' '.$publication->user->lastname}}</span><br>
                                                                @endif
                                                                <small><i aria-hidden="true" class="fa fa-clock-o"></i> {{ $publication->timeAgo($publication->created_at) }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-body">
                                                            @if(is_null($publication->activity))
                                                                <div class="post_activity_msg">
                                                                    {{$publication->message}}
                                                                </div>
                                                                <div class="post_picture_video">
                                                                    @if(!is_null($publication->video))
                                                                        <div class="video-container"><iframe src="https://www.youtube.com/embed/{{$publication->video->url}}" frameborder="0" allowfullscreen></iframe></div>
                                                                    @elseif(!is_null($publication->picture))
                                                                        <img src="{{ asset($publication->picture) }}" alt="" class="img-responsive">
                                                                    @endif
                                                                </div>

                                                            @else
                                                                <div class="post_picture_video">
                                                                    @if(!is_null($publication->video))
                                                                        <div class="video-container"><iframe src="https://www.youtube.com/embed/{{$publication->video->url}}" frameborder="0" allowfullscreen></iframe></div>
                                                                    @elseif(!is_null($publication->picture))
                                                                        <img src="{{ asset($publication->picture) }}" alt="" class="img-responsive">
                                                                    @endif
                                                                </div>
                                                                <div class="post_activity">
                                                                    <div class="post_activity_img">
                                                                        <img src="{{ asset("../images/icons/".$publication->activity->sport->icon) }}" alt="{{ $publication->activity->sport->name }}" class="img-responsive">
                                                                    </div>
                                                                    <div class="post_activity_stats">
                                                                        <span data-text="{{$publication->activity->date_start}}"><i aria-hidden="true" class="fa fa-calendar"></i>{{$publication->activity->getDateStartString() }}</span>
                                                                        <span data-text="{{$publication->activity->getTimeSecondes() }}">Durée : {{$publication->activity->time }}</span>
                                                                    </div>

                                                                </div>
                                                                <div class="post_activity_msg">
                                                                    {{$publication->message}}
                                                                </div>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <dt>Aucune publication pour le moment</dt>
                                        @endif
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="infos">
                                    <br>
                                    <dl class="dl-horizontal">
                                        <dt>Sexe</dt>
                                        <dd>{{ $user->sexe }}</dd>
                                        <dd class="divider"></dd>
                                        <dt>Poste actuel</dt>
                                        <dd>@if(!empty(($user->job)))
                                                {{ $user->job }}
                                            @else
                                                Non renseigné
                                            @endif
                                        </dd>
                                        <dd class="divider"></dd>
                                        <dt>Entreprise</dt>
                                        <dd>@if(!empty(($user->firm)))
                                                {{ $user->firm}}
                                            @else
                                                Non renseigné
                                            @endif
                                        </dd>
                                        <dd class="divider"></dd>
                                        <dt>Scolarité</dt>
                                        <dd>@if(!empty(($user->school)))
                                                {{ $user->school}}
                                            @else
                                                Non renseigné
                                            @endif
                                        </dd>
                                        <dd class="divider"></dd>
                                        <dt>Sports pratiqués</dt>

                                        @if((count($user->sports)) > 0)
                                            @foreach($user->sports as $sport)
                                                <dd>{{ $sport->name }}</dd>
                                            @endforeach
                                        @else
                                            <dd>Non renseigné</dd>
                                        @endif
                                                <dd class="divider"></dd>
                                        <dt>Adresse postale</dt>
                                        <dd>@if(!empty(($user->address)))
                                                {{ $user->address}}
                                            @else
                                                Non renseigné
                                            @endif
                                        </dd>

                                    </dl>
                                </div>
                                <div class="tab-pane fade" id="photo">
                                    @foreach($user->pictures as $picture)
                                        <article class="col-md-4 isotopeItem webdesign">
                                            <div class="section-portfolio-item">
                                                <div class="picture-cadre">
                                                    <div class="picture-box">
                                                        <img src="{{ $picture->link }}" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('picture.delete',['$picture' => $picture]) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="link_button_product">Retirer l'image</button>
                                            </form>
                                        </article>


                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="equipement">
                                    <div class="container">
                                        @foreach($user->products as $product)
                                            <div class="product col-md-2" id="{{$product->id}}">
                                                <div class="product_image">
                                                    <a href="{{ route('product.show', ['product' => $product]) }}">
                                                        <img alt="{{$product->name}}" src="{{asset($product->picture)}}" class="product_visuel" height="180px" width="180px" style="display: block">
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <div class="rating product__list_left" id="{{ $product->id }}">
                                                        @if($product->ratesvalue() != 0 )
                                                            <div class="ui star rating user" data-rating="{{ceil($product->ratesvalue())}}" data-max-rating="5"></div>
                                                        @else
                                                            <div class="ui star rating user" data-rating="0" data-max-rating="5"></div>
                                                        @endif
                                                        <div class="more_info_star">
                                    <span class="info_it">Note des utilisateurs :
                                    <span class='info_enstock'><strong>{{ceil($product->ratesvalue())}}/5</strong></span></span><br/>
                                                            <span class='info_count'><strong>{{ $product->ratescount()}} avis</strong></span>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="product_brand product__list_left">{{$product->brand->name}}</a>
                                                    <a href="{{ route('product.show', ['product' => $product])}}" class="product_name product__list_left">{{$product->name}}</a>
                                                    <div class="product_price">
                                                        <span class="a_partir_de">À partir de</span>
                                                        <span class="product_price_span">{{$product->price}} €</span>
                                                    </div>
                                                    <div class="more_info">
                                                        <div class="more_info_content">
                                                            <a href="{{ route('product.show', ['product' => $product])}}" class="more_info_title" title="">
                                                                PLUS D’INFOS
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_action_bar">
                                                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('product.remove',['$product' => $product]) }}">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="link_button_product">Supprimer de votre profil</button>
                                                    </form>
                                                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('product.post',['$product' => $product]) }}">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="link_button_product">Partager l'équipement sur votre mur</button>
                                                    </form>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                    <div class="container" style="padding-top: 40px;">
                                        <div class="col-md-12 text-center">
                                            <a href="{{ route('product.create') }}" id="addproduct">
                                                <span class="fa fa-plus"></span> Demander un nouvel équipement</a>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="amis">
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
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.4/semantic.min.js">    </script>

    <script>

        $('.ui.star.rating.user').rating('disable');
        $('.more_info').hide();
        $('.more_info_star').hide();


        $('.rating.product__list_left').hover(
                function() {
                    $(this).find( ".more_info_star").show();
                }, function() {
                    $('.more_info_star').hide();
                }
        );


        $(".product.col-md-2").hover(
                function() {
                    $(this).find( ".more_info").show();
                }, function() {
                    $('.more_info').hide();
                }
        );
    </script>
@endsection
