@extends('layouts.app')

@section('content')


<section class="section panel panel-default">
<div class="container panel-body">
    <div class="row add-margin-top">
        <div class="col-md-7 text-explicatif">
            <blockquote>
                <div class="media">
            <span style="width: 74px;" class="pull-left text-center"><i class="fa fa-code fa-4x media-object"></i>
            </span>
                    <div class="media-body">
                        <h4 class="media-heading"><strong>CONSTRUISEZ VOTRE RÉSEAU SPORTIF</strong></h4>Recherchez vos partenaires selon votre sport, constituez vos équipes, créez vos événements, challengez vos amis, découvrez de nouveaux sports
                    </div>
                </div>
            </blockquote>
            <blockquote>
                <div class="media">
            <span style="width: 74px;" class="pull-left text-center"><i class="fa fa-terminal fa-4x media-object"></i>
            </span>
                    <div class="media-body">
                        <h4 class="media-heading"><strong>PARTAGEZ DES EXPÉRIENCES</strong></h4>Echangez sur Le Hub, plateforme unique d'échanges live entre les sportifs et les champions, découvrez les tribunes de champions
                    </div>
                </div>
            </blockquote>
            <blockquote>
                <div class="media">
            <span style="width: 74px;" class="pull-left text-center"><i class="fa fa-bolt fa-4x media-object"></i>
            </span>
                    <div class="media-body">
                        <h4 class="media-heading"><strong>AMÉLIOREZ VOS COMPÉTENCES</strong></h4>Evaluez votre réseau, suivez vos statistiques personnelles, gardez un historique de vos événements sportifs, comparez vous face aux champions
                    </div>
                </div>
            </blockquote>
        </div>
        <div class="col-md-5 well well-sm">

            <form role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}
                <form action="#" method="post" role="form" class="form">
                <h4 class="text-center">Inscription</h4>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <input name="firstname" placeholder="Prénom" type="text" required autofocus="" class="form-control">
                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input name="lastname" placeholder="Nom" type="text" required class="form-control">

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input name="email" placeholder="E-mail" type="email" class="form-control" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                    @endif
                </div>
                <div class="form-group">
                    <input name="email_confirmation" placeholder="Confirmation votre e-mail" type="email" required class="form-control">
                </div>
                <div class="form-group">
                    <input name="password" placeholder="Nouveau mot de passe" type="password" required class="form-control">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input name="password_confirmation" placeholder="Confirmer votre mot de passe" type="password" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Date de naissance</label>
                    @if ($errors->has('day'))
                        <span class="help-block">
                            <strong>{{ $errors->first('day') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('month'))
                        <span class="help-block">
                            <strong>{{ $errors->first('month') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="day">
                                <option value="">Jour</option>
                                @for ($i = 1 ; $i <= 31 ; $i++ )
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>

                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="month" >
                                <?php
                                $months = array(
                                '1' => 'Janvier',
                                '2' => 'Février',
                                '3' => 'Mars',
                                '4' => 'Avril',
                                '5' => 'Mai',
                                '6' => 'Juin',
                                '7' => 'Juillet',
                                '8' => 'Août',
                                '9' => 'Septembre',
                                '10' => 'Octobre',
                                '11' => 'Novembre',
                                '12' => 'Décembre');?>

                                <option value="">Mois</option>
                                @foreach($months as $key => $value)
                                    <option value="{{ $key }}">{{ $value  }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="year">
                                <option value="">Année</option>
                                @for ( $i = date("Y"); $i > date("Y")-100 ; $i-- )
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    @if ($errors->has('birthday'))
                        <span class="help-block">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </span>
                    @endif

                </div>
                <div class="form-group text-center">
                    <label class="radio-inline">
                        <input id="inlineCheckbox1" type="radio" name="sexe" value="homme" required>Homme
                    </label>
                    <label class="radio-inline">
                        <input id="inlineCheckbox2" type="radio" name="sexe" value="femme">Femme
                    </label>
                    @if ($errors->has('sexe'))
                        <span class="help-block">
                                <strong>{{ $errors->first('sexe') }}</strong>
                            </span>
                    @endif
                </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="newsletter" checked="checked"> S'inscrire à la newsletter ?
                        </label>
                    </div>
                <button id="register" type="submit" class="btn btn-lg btn-inverse btn-block">S'inscrire</button>
            </form>
        </div>
    </div>
</div>
</section>

@endsection
