@extends('layouts.app')

@section('content')
    <div class="login">
        <div class="row login_details">
          <div class="col-md-6">
              <div class="join">
                 <h3>Why Join ?</h3>
                 <h4>sed diam nonummy nibh euismod</h4>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam<br> nibh euismod tincidunt ut laoreet dolore magna . </p>
                 <div class="btn3">
                   <a href="{{ url('/register') }}">Inscription</a>
                 </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="join-right">
                 <h3>Why Join ?</h3>
                 <h4>sed diam nonummy nibh euismod</h4>
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam<br> nibh euismod tincidunt ut laoreet dolore magna . </p>
                 <div class="buttons_login">
                     <div class="btn4">
                       <a href="{{ url('/login') }}">Connexion</a>
                     </div>
                     <div class="btn4">
                       <a class="coulfb" href="#"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a>
                   </div><br><br><br>
                     <div class="btn4">
                       <a class="coulgplus" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i>Google +</a>
                     </div>
                     <div class="btn4">
                       <a class="coultwitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a>
                     </div>

                 <div class="clear"></div>
              </div>
              </div>
            </div>
            <div class="clear"></div>
       </div>
    </div>
@endsection
