@extends('layouts.app')

@section('content')


<section class="section panel panel-default">
<div class="container panel-body">
    <div class="row">
        <div class="col-md-7">
            <blockquote>
                <div class="media">
            <span style="width: 74px;" class="pull-left text-center"><i class="fa fa-code fa-4x media-object"></i>
            </span>
                    <div class="media-body">
                        <h4 class="media-heading"><strong>Valid HTML5</strong></h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                    </div>
                </div>
            </blockquote>
            <blockquote>
                <div class="media">
            <span style="width: 74px;" class="pull-left text-center"><i class="fa fa-terminal fa-4x media-object"></i>
            </span>
                    <div class="media-body">
                        <h4 class="media-heading"><strong>Responsive</strong></h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                    </div>
                </div>
            </blockquote>
            <blockquote>
                <div class="media">
            <span style="width: 74px;" class="pull-left text-center"><i class="fa fa-bolt fa-4x media-object"></i>
            </span>
                    <div class="media-body">
                        <h4 class="media-heading"><strong>Customizable</strong></h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
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
                            <input name="firstname" placeholder="Prénom" type="text" required="" autofocus="" class="form-control">
                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <input name="lastname" placeholder="Nom" type="text" required="" class="form-control">

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input name="email" placeholder="E-mail" type="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                    @endif
                </div>
                <div class="form-group">
                    <input name="email_confirmation" placeholder="Confirmation votre e-mail" type="email" class="form-control">
                    @if ($errors->has('email_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group">
                    <input name="password" placeholder="Nouveau mot de passe" type="password" class="form-control">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="form-group">
                    <input name="password_confirmation" placeholder="Confirmer votre mot de passe" type="password" class="form-control">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Date de naissance</label>
                    <div class="row">
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="day">
                                <option value="day">Jour</option>
                                @for ($i = 1 ; $i <= 31 ; $i++ )
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>

                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="month">
                                <?php
                                $months = array(
                                '01' => 'Janvier',
                                '02' => 'Février',
                                '03' => 'Mars',
                                '04' => 'Avril',
                                '05' => 'Mai',
                                '06' => 'Juin',
                                '07' => 'Juillet',
                                '08' => 'Août',
                                '09' => 'Septembre',
                                '10' => 'Octobre',
                                '11' => 'Novembre',
                                '12' => 'Décembre');?>

                                <option name="Month">Mois</option>
                                @foreach($months as $key => $value)
                                    <option value="{{ $key }}">{{ $value  }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select class="form-control" name="year">
                                <option value="Year">Année</option>
                                @for ( $i = date("Y"); $i > date("Y")-100 ; $i-- )
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    @if ($errors->has('birthdate'))
                        <span class="help-block">
                                <strong>{{ $errors->first('birthdate') }}</strong>
                            </span>
                    @endif

                </div>
                <div class="form-group text-center">
                    <label class="radio-inline">
                        <input id="inlineCheckbox1" type="radio" name="sex" value="male">Homme
                    </label>
                    <label class="radio-inline">
                        <input id="inlineCheckbox2" type="radio" name="sex" value="female">Femme
                    </label>
                @if ($errors->has('sexe'))
                    <span class="help-block">
                            <strong>{{ $errors->first('sexe') }}</strong>
                        </span>
                @endif

                </div>
                <button type="submit" class="btn btn-lg btn-inverse btn-block">S'inscrire</button>
            </form>
        </div>
    </div>
</div>
</section>

@endsection
