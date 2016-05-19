@extends('layouts.app')

@section('content')
<div class="main">
   <div class="login_top">
     <div class="container">
       <div class="col-md-6">
          <div class="login-page">
             <h4 class="title">Nouveau sur Athleteec?</h4>
             <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
             <div class="button1">
                <a href="register.html"><input type="submit" name="Submit" value="Create an Account"></a>
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
                           <label for="modlgn_remember"><a href="#">Mot de passe oublié ? </a></label>
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
