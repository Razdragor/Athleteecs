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
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::check())
                                <li class="dropdown navbar-super-fw hidden-xs">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">Mega Menu<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="alert alert-warning alert-dismissable">
                                                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button><strong>Warning!</strong>Better check yourself, you're not looking too good.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="btn-icon col-md-3">
                                                    <a class="btn btn-neutral" role="button" href="#"><i class="fa fa-dashboard fa-lg"></i>
                                                        <div class="title">Dashboard</div>
                                                        <span class="label label-warning">2</span>
                                                    </a>
                                                </div>
                                                <div class="btn-icon col-md-3">
                                                    <a class="btn btn-primary" role="button" href="#"><i class="fa fa-calendar fa-lg"></i>
                                                        <div class="title">Calendar</div>
                                                        <span class="label label-danger">4</span>
                                                    </a>
                                                </div>
                                                <div class="btn-icon col-md-3">
                                                    <a class="btn btn-danger" role="button" href="#"><i class="fa fa-inbox fa-lg"></i>
                                                        <div class="title">Inbox</div>
                                                        <span class="label label-success">2</span>
                                                    </a>
                                                </div>
                                                <div class="btn-icon col-md-3">
                                                    <a class="btn btn-success" role="button" href="#"><i class="fa fa-money fa-lg"></i>
                                                        <div class="title">Finances</div>
                                                        <span class="label label-primary">256$</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="media well">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" alt="User" style="width: 55px; height: 55px;" src="../../assets/img/avatars/user1_55.jpg">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">Media heading</h4>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="panel panel-default">

                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Username</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Mark</td>
                                                                <td>Otto</td>
                                                                <td>@mdo</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Jacob</td>
                                                                <td>Thornton</td>
                                                                <td>@fat</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
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
                        <p>2016 - <a href="/" target="_blank">ATHLETEEC</a> / <a href="{{ route('front.confidentialite.index')}}">Confidentialité</a></p>
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
