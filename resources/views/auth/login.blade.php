@extends('layouts.app')
<link href="{{ asset('asset/css/layouts/login2.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <!-- BEGIN SIGNIN SECTION-->
        <div class="signin">
            <!-- //Notice .title class-->
            <h3 class="title">Login or
                <a href="#"> Sign up</a>
            </h3>
            <div class="row row-sm-offset-3 social-buttons">
                <div class="col-xs-4 col-sm-2">
                    <a href="login/redirect/facebook" class="btn btn-lg btn-block btn-facebook"><i class="fa fa-facebook fa-lg visible-xs"></i>
                        <span class="hidden-xs">Facebook</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="login/redirect/google" class="btn btn-lg btn-block btn-twitter"><i class="fa fa-twitter fa-lg visible-xs"></i>
                        <span class="hidden-xs">Twitter</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="login/redirect/twitter" class="btn btn-lg btn-block btn-google-plus"><i class="fa fa-google-plus fa-lg visible-xs"></i>
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
                    <span class="span-or">or</span>
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
                            <input type="text" name="email" placeholder="Email Address" class="form-control" value="{{ old('email') }}">
                        </div>
                        <span class="help-block">
                            @if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                            @endif
                        </span>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i>
                            </span>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <span class="help-block">
                            @if ($errors->has('password'))
                                <strong>{{ $errors->first('password') }}</strong>
                            @endif
                        </span>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
            <div class="row row-sm-offset-3">
                <div class="col-xs-12 col-md-6">
                    <!-- //Notice .forgot-password class-->
                    <p class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- END SIGNIN SECTION-->
    </div>
<div class="main">
   <div class="login_top">
     <div class="container">
       <div class="col-md-6">
          <div class="login-page">
             <h4 class="title">Nouveau sur Athleteec?</h4>
             <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
             <div class="button1">
                <a href="{{ url('/register') }}"><input type="submit" name="Submit" value="Create an Account"></a>
              </div>
              <div class="clear"></div>
           </div>
         </div>
         <div class="col-md-6">
          <div class="login-page">
           <div class="login-title">
             <h4 class="title">Compte existant</h4>
             <div id="loginbox" class="loginbox">
                 <form action="{{ url('/login') }}" method="post" name="login" id="login-form">
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
                   <fieldset class="input">
                     <p id="login-form-username">
                       <label for="modlgn_username">Email</label>
                       <input type="email" class="inputbox" name="email" value="{{ old('email') }}">

                       @if ($errors->has('email'))
                           <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                           </span>
                       @endif
                     </p>
                     <p id="login-form-password">
                       <label for="modlgn_passwd">Password</label>
                       <input type="password" class="inputbox" name="password">

                       @if ($errors->has('password'))
                           <span class="help-block">
                               <strong>{{ $errors->first('password') }}</strong>
                           </span>
                       @endif
                     </p>
                     <div class="remember">
                         <p id="login-form-remember">
                           <label for="modlgn_remember"><a href="{{ url('/password/reset') }}">Mot de passe oublié ? </a></label>
                        </p>
                         <input type="submit" name="Submit" class="button" value="Login"><div class="clear"></div>
                      </div>
                   </fieldset>
                  </form>
             </div>
           </div>
         </div>
         <div class="clear"></div>
       </div>
     </div>
   </div>
  </div>
@endsection
