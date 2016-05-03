<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ATHLETEEC</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="{{ asset('asset/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <header>
        <div class="header-bottom">
           <div class="container">
              <div class="header-bottom_left">
                  <i class="fa fa-phone-square" aria-hidden="true"></i><span>0712345678</span>
              </div>
              <div class="social">
                 <ul>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li class="google"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li class="tumblr"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                    <li class="instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li class="rss"><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                 </ul>
             </div>
             <div class="clear"></div>
          </div>
        </div>
        <div class="menu" id="menu">
        <div class="container">
           <div class="logo">
              <a href="index.html"><img class="logo" src="asset/img/logo.svg" alt=""/></a>
           </div>
           <div class="h_menu4">
             <a class="toggleMenu" href="#">Menu</a>
               <ul class="nav">
                 <li class="active"><a href="index.html">Accueil</a></li>
                 <li><a href="about.html">A propos</a></li>
                 <li><a href="trainers.html">Trainers</a></li>
                 <li><a href="classes.html">Classes</a></li>
                 <li><a href="pricing.html">Pricing</a></li>
                 <li><a href="contact.html">Contact</a></li>
               </ul>
                <script type="text/javascript" src="js/nav.js"></script>
            </div>
           <div class="clear"></div>
        </div>
        </div>
    </header>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <footer>
        <div class="footer-bottom">
		   <div class="container">
		 	 <div class="row section group">
				<div class="col-md-4">
				   <h4 class="m_7">Newsletter Signup</h4>
				   <p class="m_8">Lorem ipsum dolor sit amet, consectetuer adipiscing elit sed diam nonummy.</p>
				      <form class="subscribe">
			             <input type="text" value="Insert Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Insert Email';}">
					  </form>
			          <div class="subscribe1">
			            <a href="#">Submit Email<i class="but_arrow"> </i></a>
			          </div>
				</div>
				<div class="col-md-4">
					<p class="m_9">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis</p>
					<p class="address">Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">(00) 222 666 444</span></p>
					<p class="address">Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">info[at]mycompany.com</span></p>
                    <div class="f-logo">
						<img class="logo" src="asset/img/logo.svg" alt=""/>
					</div>
				</div>
				<div class="col-md-4">
					<ul class="list">
						<h4 class="m_7">Menu</h4>
						<li><a href="#">About</a></li>
						<li><a href="#">Trainers</a></li>
						<li><a href="#">Classes</a></li>
						<li><a href="#">Pricing</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
					<ul class="list1">
						<h4 class="m_7">Community</h4>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Forum</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Newsletter</a></li>
					</ul>
				</div>
				<div class="clear"></div>
	  		  </div>
		 	</div>
		 </div>
		 <div class="copyright">
		  <div class="container">
		    <div class="copy">
		        <p>© 2016 ATHLETEEC</p>
		    </div>
		    <div class="social">
			   <ul>
                   <li class="facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                   <li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                   <li class="pinterest"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                   <li class="google"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                   <li class="tumblr"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                   <li class="instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                   <li class="rss"><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
			   </ul>
		    </div>
		   <div class="clear"></div>
		  </div>
    </footer>
</body>
</html>
