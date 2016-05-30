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
    <link href="{{ asset('asset/css/social.core.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/social.frontend.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.social.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/jquery-ui/social/jquery.ui.css') }}" rel="stylesheet">
    @yield('css')

    <style>

    </style>
</head>
<body id="app-layout">
    <div class="wrapper">
        <header>
            <nav id="navbar" role="navigation" class="social-navbar navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img class="logo-athleteec" src="{{ asset('asset/img/logo.svg') }}" alt=""/>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::check())
                                <li>
                                    <a href="./index.html">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">Pages<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="./pages_login.html">Log in</a>
                                        </li>
                                        <li>
                                            <a href="./pages_signup.html">Sign Up</a>
                                        </li>
                                        <li>
                                            <a href="./pages_about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a href="./pages_blog_category.html">Blog Category</a>
                                        </li>
                                        <li>
                                            <a href="./pages_blog_page.html">Blog Page</a>
                                        </li>
                                        <li>
                                            <a href="./pages_pricing_tables.html">Pricing Tables</a>
                                        </li>
                                        <li>
                                            <a href="./pages_faq.html">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="./pages_search_results.html">Search Results</a>
                                        </li>
                                        <li>
                                            <a href="./pages_error_404.html">404 Error Page</a>
                                        </li>
                                        <li>
                                            <a href="./pages_error_500.html">500 Error Page</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="./features.html">Features</a>
                                </li>
                                <li>
                                    <a href="./portfolio.html">Portfolio</a>
                                </li>
                                <li>
                                    <a href="./contact.html">Contact</a>
                                </li>
                                <li>
                                    <a href="../admin/index.html">Admin</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                    <!-- /.nav-collapse-->
                </div>
            </nav>
        </header>
        <div class="main">
            @yield('content')
        </div>
        <footer class="section footer">
            <div class="container">
                <div class="row website-info">
                    <div class="col-sm-4 col-md-4">
                        <h4>Latest Posts</h4>
                        <ul class="posts-list">
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
                            </li>
                            <li>
                                <a href="#">Lorem ipsum.</a>
                            </li>
                            <li>
                                <a href="#">Lorem ipsum dolor.</a>
                            </li>
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing.</a>
                            </li>
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing.</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <h4>Social Networks</h4>
                        <div class="social-timeline">
                            <dl class="dl-horizontal">
                                <dt><i class="fa fa-twitter"></i>
                                </dt>
                                <dd>
                                    <a href="#ignore">@juliomrqz</a>&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, modi.&nbsp;
                                    <small>5 min ago</small>
                                </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt><i class="fa fa-facebook"></i>
                                </dt>
                                <dd>
                                    <a href="#ignore">Julio Marquez</a>&nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, modi.&nbsp;
                                    <small>7 min ago</small>
                                </dd>
                            </dl>
                        </div>
                        <form action="#" class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-inverse">Subscribe</button>
                  </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-4 company-info">
                        <h4>Who Are We?</h4>
                        <p>Lorem ipsum dolor slo onsec tueraliquet Morbi nec In Curabitur lreaoreet nisl lorem in pellente pellente eget. Lorem ipsum dolor slo onsec Vivamus.</p>
                        <address><strong>CESARLAB, Inc.</strong>
                            <br>795 Street Ave, Suite 000
                            <br>San Vegas, WT 9407
                            <br><i class="fa fa-phone"></i>&nbsp;+1 (914) 820-6220</address><i class="fa fa-envelope"></i>&nbsp;support@cesarlab.com
                    </div>
                </div>
                <div class="row social-network-footer">
                    <div class="col-sm-12 align-center">
                        <ul>
                            <li>
                                <a title="RSS" class="btn btn-social-icon btn-warning"><i class="fa fa-rss"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Facebook" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Twitter" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Google+" class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a title="Linkedin" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-sm-12">
                        <p>Copyright © 2014 Social - by&nbsp;
                            <a href="http://cesarlab.com" target="_blank">cesarlab.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('asset/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js') }}"></script>
    <script src="{{ asset('asset/js/demo/theme-switcher-frontend.js') }}"></script>
    <script src="{{ asset('asset/js/app.js') }}"></script>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    @yield('js')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
