@extends('layouts.app').
@section('css')
    <link href="{{ asset('asset/css/layouts/login2.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="backgroundsignin">
        <div class="container">
            <!-- BEGIN SIGNIN SECTION-->
            <div class="signin">
                <!-- //Notice .title class-->
                <h3 class="title">
                    Connectez vous
                </h3>
                <div class="row row-sm-offset-3 social-buttons">
                    <div class="col-xs-4 col-sm-2">
                        <a href="login/redirect/facebook" class="btn btn-lg btn-block btn-facebook"><i class="fa fa-facebook fa-lg visible-xs"></i>
                            <span class="hidden-xs">Facebook</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="login/redirect/twitter" class="btn btn-lg btn-block btn-twitter"><i class="fa fa-twitter fa-lg visible-xs"></i>
                            <span class="hidden-xs">Twitter</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="login/redirect/google" class="btn btn-lg btn-block btn-google-plus"><i class="fa fa-google-plus fa-lg visible-xs"></i>
                            <span class="hidden-xs">Google+</span>
                        </a>
                    </div>
                </div>
                <!-- //Notice .signin-or class-->
                <div class="row row-sm-offset-3 signin-or">
                    <div class="col-xs-12 col-sm-6">
                        <!-- //Notice .hr-or class-->
                        <hr class="hr-or">
                        <!-- //Notice .span-or class-->

                    </div>
                </div>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12 col-sm-6">
                        <form action="" autocomplete="off" method="POST" class="signin-form">
                            {{ csrf_field() }}
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="email" placeholder="Adresse email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <span class="help-block">
                                @if ($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i>
                                </span>
                                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                            </div>
                            <span class="help-block">
                                @if ($errors->has('password'))
                                    <strong>{{ $errors->first('password') }}</strong>
                                @endif
                            </span>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Connexion</button>
                        </form>
                    </div>
                </div>
                <div class="row row-sm-offset-3">
                    <div class="col-xs-12 col-md-6">
                        <p>
                            <a id="register" href="{{ url("/register") }}"> Inscription</a><a class="forgot-password" href="{{ url("/password/reset") }}">Mot de passe oublié ?</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END SIGNIN SECTION-->
        </div>
    </div>
@endsection
