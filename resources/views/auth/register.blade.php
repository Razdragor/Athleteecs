@extends('layouts.app')

@section('content')
<div class="main">
  <div class="register-grids">
    <div class="container">
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}
                        <div class="register-top-grid">
                                <h3>INFORMATIONS PERSONELLES</h3>
                                <div>
                                    <span>Prénom<label>*</label></span>
                                    <input type="text">
                                </div>
                                <div>
                                    <span>Nom de famille<label>*</label></span>
                                    <input type="text" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                                <div class="clear"> </div>
                                    <a class="news-letter" href="#">
                                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>S'inscrire à la newsletter</label>
                                    </a>
                                <div class="clear"> </div>
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
                        <input type="submit" value="S'inscrire">
                </form>
            </div>
        </div>
 </div>
@endsection
