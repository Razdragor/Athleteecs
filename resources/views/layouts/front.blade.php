<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(Auth::user()->getnotifications()->count()>0)({{Auth::user()->getnotifications()->count()}})@endif ATHLETEEC</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="{{ asset('asset/css/social.core.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.social.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/jquery-ui/social/jquery.ui.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/js/plugins/google-code-prettify/prettify.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/js/plugins/google-code-prettify/styles/bootstrap-light.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/themes/admin/facebook.css') }}" rel="stylesheet">
    @yield('css')
    <link href="{{ asset('asset/css/front.search.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/tchat.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
<div class="wrapper">
    <aside class="social-sidebar">
        <!-- BEGIN CHAT SECTION-->
        <div class="chat visible-lg visible-md">
            <ul class="users-list">

                <?php
                $user = Auth::user();
                //dd($user->conversations_interlocutor);
                ?>
                @foreach($user->friends as $friend)
                    <li>

                        <form class="create_conversation">
                            <input type="hidden" name="id" value="{{ $friend->id }}"></input>
                            <a data-firstname="{{ $friend->firstname }}" data-lastname="{{ $friend->lastname }}" data-status="online" data-userid="{{ $friend->id }}" href="#ignore">
                                <img src="../../assets/img/avatars/{{ $friend->firstname }}" alt="User">
                                <span>{{ $friend->firstname }} {{ $friend->lastname }}</span><i class="fa fa-circle user-status online"></i>
                            </a>
                        </form>
                    </li>
                @endforeach
            </ul>
            <!--
                   <div class="container" style="position: absolute;bottom: 0px;left: 20%;width: 350px;height: 500px;z-index: 9999;background-color: white;">
                       <div class="row">
                           <h3 class="text-center">Interlocuteur</h3>
                           <hr>
                           <div class="col-lg-8 col-lg-offset-2 " >
                             <div id="messages" >Messages</div>
                           </div>
                           <div class="col-lg-8 col-lg-offset-2 text-right" >
                             <div id="messages" >Messages de l'interloc'</div>
                           </div>
                       </div>
                   </div>
           -->
            <form class="chat-options">
                <div class="input-group">
                    <div class="input-group-btn dropup">
                        <button type="button" tabindex="-1" data-toggle="dropdown" class="btn dropdown-toggle btn-xs"><i class="fa fa-cog"></i>
                        </button>
                        <ul role="menu" class="dropdown-menu pull-left">
                            <li>
                                <a href="#">Chat Sounds</a>
                            </li>
                            <li>
                                <a href="#">Advanced Settings...</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">Turn Off Chat</a>
                            </li>
                        </ul>
                    </div>
                    <input type="text" placeholder="Search user..." class="form-control">
                </div>
            </form>
        </div>
        <!-- END CHAT SECTION-->
    </aside>
    <header>
        <nav role="navigation" class="navbar navbar-fixed-top navbar-super social-navbar">
            <div class="navbar-header">
                <a href="{{ url('/') }}" title="Social" class="navbar-brand">
                    <img class ="logo-front" width="25" height="25" src="{{ asset('asset/img/logo.svg') }}" alt="Social">
                </a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <!-- END DROPDOWN MESSAGES-->
                    <li class="divider-vertical"></li>
                    <!-- BEGIN EXTRA DROPDOWN-->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle"><i class="fa fa-caret-down fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('user.show',['user' => Auth::user()->id]) }}"><i class="fa fa-user"></i>&nbsp;Mon Profil</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-object-group"></i>&nbsp;Groupes</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-circle-thin"></i>&nbsp;Associations</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-cogs"></i>&nbsp;Paramètres</a>
                            </li>
                            <li>
                                <a href="/logout"><i class="fa fa-sign-out"></i>&nbsp;Déconnexion</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-info"></i>&nbsp;Aide</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END EXTRA DROPDOWN-->
                </ul>
                <div class="nav-indicators">
                    <ul class="nav navbar-nav navbar-right nav-indicators-body">
                        <!-- DEBUT AMIS-->
                        <a href="{{ route('user.show',['user' => Auth::user()->id]) }}"><img src="{{ Auth::user()->picture}}" alt="Avatar" class="dropdown nav-notifications img-navbarre"></a>
                        <li class="dropdown nav-notifications">
                            <!-- <a href="{{ route('front.friends.show') }}" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle"> -->
                            <a href="{{ url('/friends') }}" >
                                @if(Auth::user()->getfriendsnotificationstrue()->count()>0)<span class="badge">{{Auth::user()->getfriendsnotificationstrue()->count()}}</span>@endif<i class="fa fa-users fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->friends()->count()>0)
                                    <li class="nav-notifications-header">
                                        <a href="{{ route('front.friends.show') }}">Voir tous les amis ({{Auth::user()->friends()->count() }})</a>
                                    </li>
                                @endif
                                <li class="nav-notifications-body">
                                    @foreach (Auth::user()->getfriendsnotifications as $notification)
                                        <a href="/friends/accept/{{$notification->userL_id}}" class="text-info"><i class="fa fa-user"></i>&nbsp;@if($notification->afficher==true)Demande de @else Ajout de @endif{{$notification->libelle}}
                                            <small class="pull-right">{{$notification->timeAgo($notification->updated_at)}}</small>
                                        </a>
                                    @endforeach
                                </li>
                                @if(Auth::user()->getfriendsnotificationstrue()->count()>0)
                                    <li class="nav-notifications-footer">
                                        <a tabindex="-1" href="{{ route('front.friends.show') }}">Vous avez <strong>{{Auth::user()->getfriendsnotificationstrue()->count()}}</strong> @if(Auth::user()->getfriendsnotificationstrue()->count()>1)nouveaux amis @else nouvel ami @endif</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <!-- FIN AMIS-->
                        <!-- BEGIN DROPDOWN EVENTS-->
                        <li class="dropdown nav-notifications">
                            <!-- BEGIN DROPDOWN TOGGLE-->
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                @if(Auth::user()->geteventsnotificationstrue()->count()>0)<span class="badge">{{Auth::user()->geteventsnotificationstrue()->count()}}</span>@endif<i class="fa fa-calendar fa-lg"></i>
                            </a>
                            <!-- END DROPDOWN TOGGLE-->
                            <!-- BEGIN DROPDOWN MENU-->
                            <ul class="dropdown-menu">
                                <!-- BEGIN DROPDOWN HEADER-->
                                <li class="nav-notifications-header">
                                    <a tabindex="-1" href="#">Vous avez <strong>{{Auth::user()->geteventsnotifications()->count()}}</strong> @if(Auth::user()->geteventsnotifications()->count()>1)évènements @else évènement @endif</a>
                                </li>
                                <!-- END DROPDOWN HEADER-->
                                <!-- BEGIN NOTIFICATION ITEMS-->
                                <li class="nav-notifications-body">
                                    @foreach (Auth::user()->geteventsnotifications as $notification)
                                        {{$notification->firstname}}
                                    @endforeach
                                    <a href="#" class="text-info"><i class="fa fa-user"></i>&nbsp;New User
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-danger"><i class="fa fa-user"></i>&nbsp;User Deleted
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-warning"><i class="fa fa-cogs"></i>&nbsp;Sever is overloaded
                                        <small class="pull-right">2 minutes ago</small>
                                    </a>
                                    <a href="#"><i class="fa fa-briefcase"></i>&nbsp;Backup is completed
                                        <small class="pull-right">4 minutes ago</small>
                                    </a>
                                    <a href="#" class="text-info"><i class="fa fa-user"></i>&nbsp;New User
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-danger"><i class="fa fa-user"></i>&nbsp;User Deleted
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-warning"><i class="fa fa-cogs"></i>&nbsp;Sever is overloaded
                                        <small class="pull-right">3 minutes ago</small>
                                    </a>
                                    <a href="#"><i class="fa fa-briefcase"></i>&nbsp;Backup is completed
                                        <small class="pull-right">6 minutes ago</small>
                                    </a>
                                </li>
                                <!-- END NOTIFICATION ITEMS-->
                                <!-- BEGIN DROPDOWN FOOTER-->
                                <li class="nav-notifications-footer">
                                    <a href="#">View all messages</a>
                                </li>
                                <!-- END DROPDOWN FOOTER-->
                            </ul>
                            <!-- END DROPDOWN MENU-->
                        </li>
                        <!-- END DROPDOWN EVENTS-->
                        <!-- BEGIN DROPDOWN NOTIFICATIONS-->
                        <li class="dropdown nav-notifications">
                            <!-- BEGIN DROPDOWN TOGGLE-->
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                <span class="badge">{{Auth::user()->getnotifications()->count()}}</span><i class="fa fa-warning fa-lg"></i>
                            </a>
                            <!-- END DROPDOWN TOGGLE-->
                            <!-- BEGIN DROPDOWN MENU-->
                            <ul class="dropdown-menu">
                                <!-- BEGIN DROPDOWN HEADER-->
                                <li class="nav-notifications-header">
                                    <a tabindex="-1" href="#">Vous avez <strong>{{Auth::user()->getnotifications()->count()}}</strong> @if(Auth::user()->getnotifications()->count()>1)nouvelles notifications @else nouvelle notification @endif</a>
                                </li>
                                <!-- END DROPDOWN HEADER-->
                                <!-- BEGIN NOTIFICATION ITEMS-->
                                <li class="nav-notifications-body">
                                    @foreach (Auth::user()->getnotifications as $notification)
                                        {{$notification->firstname}}
                                    @endforeach
                                    <a href="#" class="text-info"><i class="fa fa-user"></i>&nbsp;New User
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-danger"><i class="fa fa-user"></i>&nbsp;User Deleted
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-warning"><i class="fa fa-cogs"></i>&nbsp;Sever is overloaded
                                        <small class="pull-right">2 minutes ago</small>
                                    </a>
                                    <a href="#"><i class="fa fa-briefcase"></i>&nbsp;Backup is completed
                                        <small class="pull-right">4 minutes ago</small>
                                    </a>
                                    <a href="#" class="text-info"><i class="fa fa-user"></i>&nbsp;New User
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-danger"><i class="fa fa-user"></i>&nbsp;User Deleted
                                        <small class="pull-right">Just Now</small>
                                    </a>
                                    <a href="#" class="text-warning"><i class="fa fa-cogs"></i>&nbsp;Sever is overloaded
                                        <small class="pull-right">3 minutes ago</small>
                                    </a>
                                    <a href="#"><i class="fa fa-briefcase"></i>&nbsp;Backup is completed
                                        <small class="pull-right">6 minutes ago</small>
                                    </a>
                                </li>
                                <!-- END NOTIFICATION ITEMS-->
                                <!-- BEGIN DROPDOWN FOOTER-->
                                <li class="nav-notifications-footer">
                                    <a href="#">View all messages</a>
                                </li>
                                <!-- END DROPDOWN FOOTER-->
                            </ul>
                            <!-- END DROPDOWN MENU-->
                        </li>
                        <!-- END DROPDOWN NOTIFICATIONS-->

                        <!-- BEGIN DROPDOWN TASKS-->
                        <li class="dropdown nav-tasks">
                            <!-- BEGIN DROPDOWN TOGGLE-->
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                <span class="badge">13</span><i class="fa fa-tasks fa-lg"></i>
                            </a>
                            <!-- END DROPDOWN TOGGLE-->
                            <!-- BEGIN DROPDOWN MENU-->
                            <ul class="dropdown-menu">
                                <!-- BEGIN DROPDOWN HEADER-->
                                <li class="nav-tasks-header">
                                    <a href="#">You have <strong>13</strong> tasks in progress</a>
                                </li>
                                <!-- END DROPDOWN HEADER-->
                                <!-- BEGIN DROPDOWN ITEMS-->
                                <li class="nav-tasks-body">
                                    <a>Prepare Report
                                        <span class="pull-right">30%</span>
                                        <div class="progress">
                                            <div role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%" class="progress-bar progress-bar-danger">
                                                <span class="sr-only">30% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a>Make new update
                                        <span class="pull-right">40%</span>
                                        <div class="progress">
                                            <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%" class="progress-bar progress-bar-info">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a>Fix critical bugs
                                        <span class="pull-right">80%</span>
                                        <div class="progress progress-striped active">
                                            <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%" class="progress-bar">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a>Complete project
                                        <span class="pull-right">5%</span>
                                        <div class="progress">
                                            <div role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%" class="progress-bar progress-bar-success">
                                                <span class="sr-only">5% Complete (success)</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a>Others
                                        <span class="pull-right">15%</span>
                                        <div class="progress">
                                            <div role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%" class="progress-bar progress-bar-warning">
                                                <span class="sr-only">15% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- END DROPDOWN ITEMS-->
                                <!-- BEGIN DROPDOWN FOOTER-->
                                <li class="nav-tasks-footer">
                                    <a href="#">View all tasks</a>
                                </li>
                                <!-- END DROPDOWN FOOTER-->
                            </ul>
                            <!-- END DROPDOWN MENU-->
                        </li>
                        <!-- END DROPDOWN TASKS-->
                        <!-- BEGIN DROPDOWN MESSAGES-->
                        <li class="dropdown nav-messages">
                            <!-- BEGIN DROPDOWN TOGGLE-->
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                <span class="badge">8</span><i class="fa fa-envelope fa-lg"></i>
                            </a>
                            <!-- END DROPDOWN TOGGLE-->
                            <!-- BEGIN DROPDOWN MENU-->
                            <ul class="dropdown-menu">
                                <!-- BEGIN DROPDOWN HEADER-->
                                <li class="nav-messages-header">
                                    <a tabindex="-1" href="#">You have <strong>8</strong> new messages</a>
                                </li>
                                <!-- END DROPDOWN HEADER-->
                                <!-- BEGIN DROPDOWN ITEMS-->
                                <li class="nav-messages-body">
                                    <a>
                                        <img src="../../assets/img/avatars/user1_55.jpg" alt="User" class="avatar">
                                        <div class="title">
                                            <small class="pull-right">Just Now</small><strong>Yadra Abels</strong>
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet, consectetur...</div>
                                    </a>
                                    <a>
                                        <img src="../../assets/img/avatars/user2_55.jpg" alt="User" class="avatar">
                                        <div class="title">
                                            <small class="pull-right">Just Now</small><strong>Cesar Mendoza</strong>
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet, consectetur...</div>
                                    </a>
                                    <a>
                                        <img src="../../assets/img/avatars/user3_55.jpg" alt="User" class="avatar">
                                        <div class="title">
                                            <small class="pull-right">Just Now</small><strong>John Doe</strong>
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet, consectetur...</div>
                                    </a>
                                    <a>
                                        <img src="../../assets/img/avatars/user4_55.jpg" alt="User" class="avatar">
                                        <div class="title">
                                            <small class="pull-right">Just Now</small><strong>Tobei Tsumura</strong>
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet, consectetur...</div>
                                    </a>
                                </li>
                                <!-- END DROPDOWN ITEMS-->
                                <!-- BEGIN DROPDOWN FOOTER-->
                                <li class="nav-messages-footer">
                                    <a tabindex="-1" href="#">View all messages</a>
                                </li>
                                <!-- END DROPDOWN FOOTER-->
                            </ul>
                            <!-- END DROPDOWN MENU-->
                        </li>
                    </ul>
                    <form class="onefriend nav navbar-nav" method="GET" action="{{ route('front.search.show')}}">
                        {{ csrf_field() }}
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input id="terme" class="form-control input-lg" placeholder="Chercher des utilisateurs, des associations ou d'autre choses" name="terme" type="text" value="">
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.navbar-collapse-->
        </nav>
    </header>
    <div class="main">
        @yield('content')
    </div>
    <footer>2016 - <a href="http://localhost" target="_blank">ATHLETEEC</a></footer>
</div>


<div class="return"></div>
<!-- jQuery-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
<script>
    /*<![CDATA[*/
    $(function() {
        prettyPrint();
    });
    /*]]>*/
</script>
<script src="{{ asset('asset/js/sidebar.js') }}"></script>
<script src="{{ asset('asset/js/panels.js') }}"></script>
<script src="{{ asset('asset/js/front.js') }}"></script>

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
<script src="{{ asset('asset/js/front.js') }}"></script>

<!-- BEGIN GENERAL SCRIPTS-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
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

<script>
    var socket = io.connect('http://localhost:8890');
    socket.on('message', function (data) {
        var chat_msg = $.parseJSON('[' + data + ']');
        if(chat_msg[0]['user']['id'] == {{ $user->id }})
        {
            var chat_class = 'conv_messages_'+chat_msg[0]['conv_id'];
            $('#'+chat_class).append('<li class="right clearfix"><span class="chat-avatar pull-right"><img src="{{ $user->picture }}" alt="{{ $user->firstname.' '. $user->lastname }}" width="55px" height="55px"></span>'+
                    '<div id="chat_sender1" class="chat-body clearfix"><div class="header">'+
                    '<small class="text-muted"><span class="fa fa-clock-o">&nbsp;8 mins ago</span>'+
                    '</small><strong class="pull-right primary-font">{{ $user->firstname }} {{$user->lastname }}</strong>'+
                    '</div>'+
                    '<p>'+chat_msg[0]['message']+'</p></div></li>');
        }
        else
        {
            var chat_class = 'conv_messages_'+chat_msg[0]['conv_id'];
            if($('#'+chat_class).length)
            {
                console.log(chat_msg[0]['user']['firstname']);
                $('#'+chat_class).append('<li class="left clearfix"><span class="chat-avatar pull-left"><img src="'+chat_msg[0]['user']['picture']+'" alt="'+chat_msg[0]['user']['firstname']+' '+chat_msg[0]['user']['lastname']+
                        '" width="55px" height="55px"></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+chat_msg[0]['user']['firstname']+' '+chat_msg[0]['user']['lastname']+
                        '</strong><small class="pull-right text-muted"><span class="fa fa-clock-o">&nbsp;9 mins ago</span></small></div><p>'+chat_msg[0]['message']+'</p></div></li>');
            }
            else
            {
                var form = $(document).find('input[name="id"][value="'+chat_msg[0]['user']['id']+'"]').parent();

                var fdata = $(form).serialize();
                console.log(fdata);
                $.ajax({
                    type:'POST',
                    url:'create_conversation', // url, from form
                    data:fdata,
                    processData: false,
                    success:function(data) {
                        console.log(data);
                        var to_append = '<div class="tchat-box"><div class="panel panel-default panel-chat"><div class="head-tchat"><div class="head-tchat-left">'+data.conv['name']+'</div><div class="head-tchat-right"><i id="close" class="fa fa-times" aria-hidden="true"></i></div></div><div></div><div class="panel-body scroll-chat-box"><ul id="conv_messages_'+data.conv['id']+'" class="scroll">';
                        data.messages.forEach(function(message){
                            if(message['user_id'] == {{ $user->id }})
                            {
                                to_append = to_append + '<li class="right clearfix"><span class="chat-avatar pull-right"><img src="{{ $user->picture }}" alt="{{ $user->firstname.' '. $user->lastname }}" width="55px" height="55px"></span>'+
                                        '<div id="chat_sender1" class="chat-body clearfix"><div class="header">'+
                                        '<small class="text-muted"><span class="fa fa-clock-o">&nbsp;8 mins ago</span>'+
                                        '</small><strong class="pull-right primary-font">{{ $user->firstname }} {{$user->lastname }}</strong>'+
                                        '</div>'+
                                        '<p>'+message['message']+'</p></div></li>';
                            }
                            else
                            {
                                data.users.forEach(function(user){
                                    if(message['user_id'] == user['id'])
                                    {
                                        to_append = to_append + '<li class="left clearfix"><span class="chat-avatar pull-left"><img src="'+user['picture']+'" alt="'+user['firstname']+' '+user['lastname']+
                                                '" width="55px" height="55px"></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+user['firstname']+' '+user['lastname']+
                                                '</strong><small class="pull-right text-muted"><span class="fa fa-clock-o">&nbsp;9 mins ago</span></small></div><p>'+message['message']+'</p></div></li>';
                                    }
                                });
                            }
                        });
                        to_append = to_append + '</ul></div><div class="panel-footer"><form action="sendmessage" method="POST" class="chat_send_message"><div class="input-group">'+
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="conversation_id" value="'+data.conv['id']+'">'+
                                '<input id="btn-input" name="message" type="text" placeholder="Ecrivez un message..." class="form-control input-sm">'+
                                '<span class="input-group-btn"><input type="submit" value="Envoyer" class="btn btn-success btn-sm"></span></div></form></div>';

                        $('.users-list').after(to_append);
                    },
                    error:function(jqXHR)
                    {
                        $('.return').html(jqXHR.responseText);

                    }
                });
                $('#'+chat_class).append('<div class="col-xs-8 col-xs-offset-4">'+chat_msg[0]['firstname']+' '+chat_msg[0]['lastname']+'<p>'+chat_msg[0]['message']+'</p></div>');
            }
        }
    });

    $('.create_conversation').on("click",function(){
        var fdata = $(this).serialize();

        $.ajax({
            type:'POST',
            url:'create_conversation', // url, from form
            data:fdata,
            processData: false,
            success:function(data) {
                console.log(data);
                var to_append = '<div class="tchat-box"><div class="panel panel-default panel-chat"><div class="head-tchat"><div class="head-tchat-left">'+data.conv['name']+'</div><div class="head-tchat-right"><i id="close" class="fa fa-times" aria-hidden="true"></i></div></div><div></div><div class="panel-body scroll-chat-box"><ul id="conv_messages_'+data.conv['id']+'" class="scroll">';
                data.messages.forEach(function(message){
                    if(message['user_id'] == {{ $user->id }})
                    {
                        to_append = to_append + '<li class="right clearfix"><span class="chat-avatar pull-right"><img src="{{ $user->picture }}" alt="{{ $user->firstname.' '. $user->lastname }}" width="55px" height="55px"></span>'+
                                '<div id="chat_sender1" class="chat-body clearfix"><div class="header">'+
                                '<small class="text-muted"><span class="fa fa-clock-o">&nbsp;8 mins ago</span>'+
                                '</small><strong class="pull-right primary-font">{{ $user->firstname }} {{$user->lastname }}</strong>'+
                                '</div>'+
                                '<p>'+message['message']+'</p></div></li>';
                    }
                    else
                    {
                        data.users.forEach(function(user){
                            if(message['user_id'] == user['id'])
                            {
                                to_append = to_append + '<li class="left clearfix"><span class="chat-avatar pull-left"><img src="'+user['picture']+'" alt="'+user['firstname']+' '+user['lastname']+
                                        '" width="55px" height="55px"></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+user['firstname']+' '+user['lastname']+
                                        '</strong><small class="pull-right text-muted"><span class="fa fa-clock-o">&nbsp;9 mins ago</span></small></div><p>'+message['message']+'</p></div></li>';
                            }
                        });
                    }
                });
                to_append = to_append + '</ul></div><div class="panel-footer"><form action="sendmessage" method="POST" class="chat_send_message"><div class="input-group">'+
                        '<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="conversation_id" value="'+data.conv['id']+'">'+
                        '<input id="btn-input" name="message" type="text" placeholder="Ecrivez un message..." class="form-control input-sm">'+
                        '<span class="input-group-btn"><input type="submit" value="Envoyer" class="btn btn-success btn-sm"></span></div></form></div>';

                $('.users-list').after(to_append);
            },
            error:function(jqXHR)
            {
                $('.return').html(jqXHR.responseText);

            }
        });

    });
    // probleme à ce niveau là   le click sur le #close ne se fait pas
    $('body').on('click','#close', function(){
        console.log('fermer tchat box');
        $('div.tchat-box').remove();
    });



    $('body').on('submit','.chat_send_message', function(e){
        e.preventDefault();
        var fdata = $(this).serialize();
        $.ajax({
            type:'POST',
            url:'sendmessage', // url, from form
            data:fdata,
            processData: false,
            success:function(data) {
                console.log('Success !');
            },
            error:function(jqXHR)
            {
                $('.return').html(jqXHR.responseText);

            }
        });
    });
</script>


<!-- JavaScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
@yield('js')
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>