@extends('layouts.app')

@section('content')
<div class="main">
  <div class="register-grids">
    <div class="container">
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}
                        <div class="register-top-grid">
                                <h3>INFORMATIONS PERSONELLES</h3>
                                <div style="width: 100%;">
                                    <span>Sexe<label>*</label></span>
                                    <span style="float: left; margin-left: 20px; margin-right: 20px;"> <input type="radio" name="sexe" value="Femme"> Femme </span>
                                    <span> <input type="radio" name="sexe" value="Homme" > Homme </span>
                                </div>
                                <div>
                                    <span>Prénom<label>*</label></span>
                                    <input type="text" name="firstname" value="{{ old('firstname') }}">

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <span>Nom de famille<label>*</label></span>
                                    <input type="text" name="lastname" value="{{ old('lastname') }}">

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <span>Addresse Email<label>*</label></span>
                                    <input type="email" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <span>Confirmation Addresse Email<label>*</label></span>
                                    <input type="email" name="email_confirmation" value="{{ old('email_confirmation') }}">

                                    @if ($errors->has('email_confirmation'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email_confirmation') }}</strong>
                                            </span>
                                    @endif
                                </div>
                        </div>
                        <div class="clear"> </div>
                        <div class="register-bottom-grid">
                                <h3>INFORMATIONS DE CONNEXION</h3>
                                <div>
                                    <span>Mot de passe<label>*</label></span>
                                    <input type="password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <span>Confirmation du mot de passe<label>*</label></span>
                                    <input type="password" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="clear"> </div>
                        </div>
                        <div class="clear"> </div>
                        <div class="news-letter">
                            <input type="checkbox" name="newsletter" checked=""><i> </i>S'inscrire à la newsletter
                        </div>
                        <div class="clear"> </div>
                        <input type="submit" value="S'inscrire">
                </form>
            </div>
        </div>
 </div>
@endsection
