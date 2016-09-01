@extends('layouts.front')


@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-profile.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-cards.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/useredit.css') }}" rel="stylesheet">


@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('user.update',['user' => $user]) }}">
                        {{ csrf_field() }}
                        <!--Notice .user-profile class-->
                        <div class="user-profile">
                            <div class="row">
                                <div class="col-sm-2 col-md-2">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img src="{{$user->picture}}" alt="Avatar"
                                                 class="img-thumbnail img-responsive">
                                            <div class="image-upload">
                                                <label for="picture">
                                                    <div class="btn btn-default">
                                                        <i class="fa fa-camera"></i>
                                                    </div>
                                                </label>
                                                <input type="file" name="picture" id="picture" class="filehide"/>

                                            </div>
                                            @if ($errors->has('picture'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('picture') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-10 col-md-10">
                                    <div class="row">
                                        <!-- BEGIN USER STATUS-->
                                        <div id="user-status" class="text-left col-sm-10 col-md-10">
                                            <h3>{{ $user->firstname}} {{$user->lastname }}</h3>
                                        </div>
                                        <!-- END USER STATUS-->
                                        <div class="col-sm-2 col-md-2 hidden-xs  padding-bottom-correct">
                                            <a id="edit-profile-button" href="{{ route('user.show',['user'=>$user])}}" class="btn btn-block btn-primary">Annuler</a>
                                        </div>
                                        <div class="col-sm-2 col-md-2 hidden-xs" style="float: right;">
                                         <button type="submit" class="btn btn-block btn-primary">Modifier</button>
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
                                <div class="col-sm-10 col-md-8-2">
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
                                            <li id="photo" class="ok">
                                                <a href="#">Photos</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <!-- END TABS SELECTIONS-->
                                    <div class="row">
                                        <!-- BEGIN TABS SECTIONS-->
                                        <div id="profileTabContent" class="tab-content">
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
                                                    <dt>Statut</dt>
                                                    <dd>
                                                        @if($user->star == true)
                                                            Personnalité <br>
                                                            <button type="button" class="btn btn-default" id="demandeStarRemove">Ne plus être reconnu en tant que personnalité</button>
                                                            <span id="responseDemandeStar"></span>
                                                        @else
                                                            Athlète <br>
                                                            <button type="button" class="btn btn-default" id="demandeStar">Etre reconnu en tant que personnalité</button>
                                                            <span id="responseDemandeStar"></span>
                                                        @endif
                                                    </dd>
                                                    <dd class="divider"></dd>
                                                    <dt>Poste actuel</dt>
                                                    <dd><input type="text" class="form-control" name="job" value="{{ $user->job }}">
                                                    <dd class="divider"></dd>
                                                    <dt>Entreprise</dt>
                                                    <dd><input type="text" class="form-control" name="firm" value="{{ $user->firm }}">
                                                    <dd class="divider"></dd>
                                                    <dt>Nom de votre école</dt>
                                                    <dd><input type="text" class="form-control" name="school" value="{{ $user->school }}">
                                                    <dd class="divider"></dd>

                                                    @if($user->sports->count() > 0)
                                                        <dt>Sports pratiqué</dt>
                                                        <dd>(Cocher pour supprimer)</dd>
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
                                                    @endif
                                                    <dt>Sports disponibles</dt>
                                                    <dd>(Cocher pour selectionner)</dd>
                                                    <ul class="list-unstyled">
                                                        @foreach($sports as $sport)
                                                        <dd>
                                                            <li>
                                                                <input type="checkbox" id="{{$sport->id}}" name="sport[]" value="{{$sport->id}}">{{ $sport->name }}
                                                            </li>
                                                        </dd>
                                                        @endforeach
                                                    </ul>
                                                    <dd class="divider"></dd>
                                                    <dt>Adresse postale</dt>
                                                    <dd><input type="text" class="form-control" name="address" value="{{ $user->address }}">
                                                    <dd class="divider"></dd>
                                                    <dt>Newsletter</dt>
                                                    @if($user->newsletter == true)
                                                        <dd><input type="checkbox" class="" name="newsletter" checked="checked"></dd>
                                                    @else
                                                        <dd><input type="checkbox" class="" name="newsletter"></dd>
                                                    @endif


                                                </dl>
                                            </div>
                                            <div class="tab-pane active equipement" style="display: none;">
                                                <div class="container equip">
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
                                                </div>
                                                @endforeach
                                                    <div class="container">
                                                    <div class="col-md-12 text-center">
                                                    <a href="{{ route('product.create') }}" id="addproduct">
                                                    <span class="fa fa-plus"></span> Demander un nouvel équipement</a>

                                                    </div>
                                                    </div>
                                            </div>

                                            </div>
                                            <div class="tab-pane active pots" style="display: none;">
                                                <ul class="timeline-2-cols">
                                                    <?php $i = 0; ?>
                                                    @foreach($user->publications as $publication)
                                                        <li id="<?php
                                                        if(is_null($publication->activity)){
                                                            echo "publication-".$publication->id;
                                                        }else{
                                                            echo "activite-".$publication->activity->id;
                                                        }
                                                        ?>" class="<?php if($i%2){echo 'timeline-inverted';} ?> publicationJS">
                                                            <div class="timeline-badge primary">
                                                                <a href="#"><i rel="tooltip" title="{{ $publication->date_start }}" class="glyphicon glyphicon-record <?php if($i%2){echo 'timeline-inverted';} $i++; ?>"></i>
                                                                </a>
                                                            </div>
                                                            <div class="timeline-panel">
                                                                <div class="timeline-heading row" style="margin: 0;">
                                                                    <div style="margin:0 10px 0 0;float:left;">
                                                                        <a href="{{ route("user.show", $publication->user->id ) }}">
                                                                            <img src="<?php echo $publication->user->picture ?>" alt="Image" class="img-responsive" style="width: 50px;height:50px; margin: 5px;display: inline-block;">
                                                                        </a>
                                                                    </div>
                                                                    <div style="margin: 10px;float:left;">
                                                                        <span>{{ $publication->user->firstname.' '.$publication->user->lastname}}</span><br>
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
                                                </ul>
                                            </div>
                                            <div class="tab-pane active photo"  style="display: none;">
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

                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
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