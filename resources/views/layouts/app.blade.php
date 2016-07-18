<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="OZ5EaazJ8k-vftAyTNRIeoewQVsBYfDNSkqTnlYwt-Y" />

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
    <link href="{{ asset('asset/js/plugins/google-code-prettify/prettify.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/js/plugins/google-code-prettify/styles/bootstrap-light.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/signin.css') }}" rel="stylesheet">
    @yield('css')

</head>
<body id="app-layout">
    <div class="wrapper">
        <header>
            <nav id="navbar" role="navigation" class="social-navbar navbar navbar-default navbar-fixed-top">
                <div class="container logocentrer">
                    <div class="navbar-header">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img class="logo-athleteec" src="{{ asset('asset/img/logo.svg') }}" alt=""/>
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <div class="main">
            @yield('content')
        </div>
        <footer class="section footer">
            <div class="container">
                <div class="row social-network-footer">
                    <div class="col-sm-12 align-center">
                        <ul>
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
                        <p class="blanc">2016 - <a href="/" target="_blank">ATHLETEEC</a> / <a href="{{ route('front.obligatoire.confidentialite')}}">Confidentialité</a> / <a href="{{ route('front.obligatoire.mentionslegales')}}">Mentions Légales</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- jQuery-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{asset('asset/js/jquery/jquery.min.js') }}"><\/script>')
    </script>
    <!-- Bootstrap JS-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script>
        $.fn.modal || document.write('<script src="{{ asset('asset/js/plugins/bootstrap/bootstrap.min.js') }}"><\/script>')
    </script>
    <!-- Bootstrap Hover Dropdown-->
    <script src="{{ asset('asset/js/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/google-code-prettify/prettify.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js') }}"></script>
    <script src="{{ asset('asset/js/app.js') }}"></script>
    <script>
        /*<![CDATA[*/
        $(function() {
            prettyPrint();
        });
        /*]]>*/
    </script>
    <script src="{{ asset('asset/js/sidebar.js') }}"></script>
    <script src="{{ asset('asset/js/panels.js') }}"></script>
    <!-- BEGIN GENERAL SCRIPTS-->
    <script>
        /*<![CDATA[*/
        $(function() {
            $(".social-sidebar").socialSidebar();
            $('.main').panels();
            $(".main a[href='#ignore']").click(function(e) {
                e.stopPropagation()
            });
        });
        $(document).on('click', '.navbar-super .navbar-super-fw', function(e) {
            e.stopPropagation()
        });
        /*]]>*/
    </script>


    <!-- JavaScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
    @yield('js')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
