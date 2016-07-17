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
                                            <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('user.update',['user' => $user]) }}">
                                                {{ csrf_field() }}

                                                <img src="{{ asset('asset/img/avatars/avatar.png') }}" alt="Avatar" class="img-thumbnail img-responsive">
                                            <input type="file" name="picture" id="picture">
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
                                        <div class="col-sm-2 col-md-2 hidden-xs">
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

                                                </dl>
                                            </div>
                                            <div class="tab-pane active equipement" style="display: none;">
                                                <div class="row">
                                                    @foreach($user->products as $equipment)
                                                        <div class="row">
                                                            <ul class="list-unstyled"></dd>
                                                                <li>
                                                                    <div class="col-md-1">
                                                                        <input type="checkbox" id="{{$equipment->id}}" name="equipement[]" value="{{$equipment->id}}" checked>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="equipement-cadre">
                                                                            <div class="equipement-box">
                                                                                <img src="{{asset('images/'.$equipment->picture)}}"
                                                                                     alt="Avatar" class="img-thumbnail img-responsive">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <a href="{{ $equipment->url }}">
                                                                            <dd>{{ $equipment->name }}</dd>
                                                                        </a>
                                                                        <dd>{{ $equipment->description }}</dd>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach

                                                    @foreach($equipements as $equip)
                                                        <div class="row">
                                                            <ul class="list-unstyled"></dd>
                                                                <li>
                                                                    <div class="col-md-1">
                                                                        <input type="checkbox" id="{{$equip->id}}" name="equipement[]" value="{{$equip->id}}">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="equipement-cadre">
                                                                            <div class="equipement-box">
                                                                                <img src="{{asset('images/'.$equip->picture)}}"
                                                                                     alt="Avatar" class="img-thumbnail img-responsive">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <a href="{{ $equip->url }}">
                                                                            <dd>{{ $equip->name }}</dd>
                                                                        </a>
                                                                        <dd>{{ $equip->description }}</dd>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach

                                                    <a href="#" id="addproduct">
                                                        <span class="fa fa-plus"></span> Ajouter un équipement</a>
                                                </div>
                                            </div>
                                        </div>

                                        </form>
                                        <div class="modal fade modal-product" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-product">
                                            <div class="modal-dialog modal-sm ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4>Ajouter un équipement</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="submit-modal-product" method="post" action="{{ route("product.store")}}" enctype="multipart/form-data">

                                                            <div class="col-md-12 padding-bottom-correct">
                                                                <label for="productname" class="col-md-2">Nom de l'équipement</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="productname" placeholder="...">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 padding-bottom-correct">
                                                                <label for="description" class="col-md-2 control-label">Description</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="description" placeholder="...">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 padding-bottom-correct">
                                                                <label for="price" class="col-md-2 control-label">Prix</label>
                                                                <div class="col-md-10">
                                                                    <input type="number" class="form-control" name="price" placeholder="...">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 padding-bottom-correct">
                                                                <label for="url" class="col-md-2 control-label">Lien vers l'équipement</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="url" placeholder="...">
                                                                </div>
                                                            </div>
                                                            <div class="form-actions panel-foo">
                                                                <div class="btn-group">
                                                                    <div class="image-upload">
                                                                        <label for="file-input-modal">
                                                                            <div class="btn btn-default"><i class="fa fa-camera"></i></div>
                                                                        </label>
                                                                        <input id="file-input-modal" name="productpicture" type="file" accept="image/*"/>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary pull-right" >Ajouter</button>
                                                            </div>
                                                        </form>
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