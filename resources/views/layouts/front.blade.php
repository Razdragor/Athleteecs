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
<?php
$user = Auth::user();
?>

<div class="wrapper">
    <aside class="social-sidebar">
        <div class="visible-lg visible-md">
            <h4>Events :</h4>

            <ul>
                @foreach($user->events as $user_event)
                    @if($user->isMemberEvent($user_event->event->id))
                        <li>
                            <a href="{{ route('event.index', ['events' => $user_event->event->id]) }}">
                                {{$user_event->event->name}}

                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <a href="{{ route('event.create') }}">Créer un event</a>


            <h4>Associations :</h4>

            <ul>
                @foreach($user->associations as $association)
                    @if($user->isMemberAssociation($association->association->id))
                        <li>
                            <a href="{{ route('association.index', ['association' => $association->association->id]) }}">
                                {{$association->association->name}}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <a href="{{ route('association.create') }}">Créer une association</a>

            <h4>Conversations :</h4>

            <ul>
                @foreach($user->conversations as $conversation)
                    @if($conversation->conversation->group)
                        <form class="chat_show">
                            <li>
                                <input type="hidden" name="conv_id" value="{{$conversation->conversation->id}}">
                                {{$conversation->conversation->name}}
                            </li>
                        </form>
                    @endif
                @endforeach
            </ul>
            <a href="#">Créer un groupe</a>

            <div class="chat visible-lg visible-md">
                <ul class="users-list">
                    @foreach($user->friends as $friend)
                        <li>

                            <form class="create_conversation alignement-utilisateurs">
                                <input type="hidden" name="id" value="{{ $friend->id }}"></input>
                                <a data-firstname="{{ $friend->firstname }}" data-lastname="{{ $friend->lastname }}" data-status="online" data-userid="{{ $friend->id }}" class="hauteur-utilisateurs-liste">
                                    <img src="{{ $friend->picture }}" alt="{{ $friend->firstname.' '.$friend->lastname }}">
                                    <span>{{ $friend->firstname.' '.$friend->lastname }}</span><i class="fa fa-circle user-status online"></i>
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
            </div>
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
                    <li class="divider-vertical"></li>
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
                                <a href="{{ route('association.index') }}"><i class="fa fa-circle-thin"></i>&nbsp;Associations</a>
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
                </ul>
                <div class="nav-indicators">
                    <ul class="nav navbar-nav navbar-right nav-indicators-body">
                        <a href="{{ route('user.show',['user' => Auth::user()->id]) }}"><img src="{{ Auth::user()->picture}}" alt="Avatar" class="dropdown nav-notifications img-navbarre"></a>

                        <li class="dropdown nav-notifications">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
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
                                        @if($notification->afficher==true)
                                        <a href="/friends/accept/{{$notification->userL_id}}" class="text-info"><i class="fa fa-user"></i>&nbsp;Demande de
                                        @else
                                        <a href="/user/{{$notification->userL_id}}" class="text-info"><i class="fa fa-user"></i>&nbsp;Ajout de
                                        @endif
                                            {{$notification->libelle}} <small class="pull-right">{{$notification->timeAgo($notification->updated_at)}}</small>
                                        </a>
                                    @endforeach
                                </li>
                                @if(Auth::user()->getfriendsnotificationstrue()->count()>0)
                                    <li class="nav-notifications-footer">
                                        <a tabindex="-1" href="{{ route('front.friends.show') }}">Vous avez <strong>{{Auth::user()->getfriendsnotificationstrue()->count()}}</strong> @if(Auth::user()->getfriendsnotificationstrue()->count()>1)nouvelles demandes @else nouvelle demande @endif</a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                        <li class="dropdown nav-notifications">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                <span class="badge">{{Auth::user()->getnotifications()->count()}}</span><i class="fa fa-warning fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-notifications-header">
                                    <a tabindex="-1" href="#">Vous avez <strong>{{Auth::user()->getnotifications()->count()}}</strong> @if(Auth::user()->getnotifications()->count()>1)nouvelles notifications @else nouvelle notification @endif</a>
                                </li>
                                <li class="nav-notifications-body">
                                    @foreach(Auth::user()->notifications as $notification)
                                        @if($notification->notification == 'events')
                                            <a href="#" style="white-space: normal" name="{{$notification->id}}">
                                                <span>{{$notification->libelle}}</span>
                                                <small class="pull-right">{{$notification->timeAgo($notification->created_at)}}</small>
                                            </a>
                                        @endif
                                        @if($notification->notification == 'associations')
                                            <a href="{{ route('association.show', ['association' => $notification->userL_id]) }}" style="white-space: normal" name="{{$notification->id}}">
                                                <span>{{$notification->libelle}}</span>
                                                <small class="pull-right">{{$notification->timeAgo($notification->created_at)}}</small>
                                            </a>
                                        @endif
                                        @if($notification->notification == 'events')
                                            <a href="#" style="white-space: normal" name="{{$notification->id}}">
                                                <span>{{$notification->libelle}}</span>
                                                <small class="pull-right">{{$notification->timeAgo($notification->created_at)}}</small>
                                            </a>
                                        @endif
                                    @endforeach
                                </li>
                                <li class="nav-notifications-footer">
                                    <a href="#">View all messages</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-tasks">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                <span class="badge">13</span><i class="fa fa-tasks fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-tasks-header">
                                    <a href="#">You have <strong>13</strong> tasks in progress</a>
                                </li>
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
                                <li class="nav-tasks-footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown nav-messages">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                <span class="badge">8</span><i class="fa fa-envelope fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-messages-header">
                                    <a tabindex="-1" href="#">You have <strong>8</strong> new messages</a>
                                </li>
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
                                <li class="nav-messages-footer">
                                    <a tabindex="-1" href="#">View all messages</a>
                                </li>
                            </ul>
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
        </nav>
    </header>
    <div class="main">
        @yield('content')
    </div>
    <footer>2016 - <a href="http://localhost" target="_blank">ATHLETEEC</a></footer>
</div>


<div class="return"></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{asset('asset/js/jquery/jquery.min.js') }}"><\/script>')
</script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script>
    $.fn.modal || document.write('<script src="{{ asset('asset/js/plugins/bootstrap/bootstrap.min.js') }}"><\/script>')
</script>
<script src="{{ asset('asset/js/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('asset/js/plugins/google-code-prettify/prettify.js') }}"></script>
<script src="{{ asset('asset/js/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js') }}"></script>

<script src="{{ asset('asset/js/chat/socketio.js') }}"></script>
<script src="{{ asset('asset/js/app.js') }}"></script>
<script>
    $(function() {
        prettyPrint();
    });
</script>
<script src="{{ asset('asset/js/sidebar.js') }}"></script>
<script src="{{ asset('asset/js/panels.js') }}"></script>
<script src="{{ asset('asset/js/front.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
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
</script>

<script>

    var chatbox_pos = 200;
    // créer la tchatbox
    $('.create_conversation').on("click",function(){
        create_or_show_chat($(this),"{{ route('create_conversation') }}");
    });

    // envoyer des éléments dans tchatbox
    var socket = io.connect('http://localhost:8890');


    socket.on('add_user', function (data)
    {
        var chat_msg = $.parseJSON('[' + data + ']'),
                now = new Date().getDay(),
                chat_class = 'conv_messages_'+chat_msg[0]['conv_id'],
                check_concerned = false;


        $.each(chat_msg[0]['users'],function(i,user){
            if(user.user_id == {{$user->id}})
            {
                check_concerned = true;
                return false;
            }
        });
        if(check_concerned)
        {
            if($('.'+chat_class).length)
            {
                $('.'+chat_class).append('<li class="right clearfix"><p>'+chat_msg[0]['friend']['firstname']+' '+chat_msg[0]['friend']['lastname']+' à été ajouté à la conversation</p></li>');
                $('.'+chat_class).parent().scrollTop($(".scroll-chat-box")[0].scrollHeight);
            }
            else
            {
                $('.users-list').append('<form class="create_conversation"><input type="hidden" name="conv_id" value="'+chat_msg[0]['conv_id']+'"></input></form>');
                var form = $(document).find('input[name="conv_id"][value="'+chat_msg[0]['conv_id']+'"]').parent();
                create_or_show_chat(form,"{{ route('show_conversation') }}");
                $('.'+chat_class).append('<li class="right clearfix"><p>'+chat_msg[0]['friend']['firstname']+' '+chat_msg[0]['friend']['lastname']+' à été ajouté à la conversation</p></li>');
                $('.'+chat_class).parent().scrollTop($(".scroll-chat-box")[0].scrollHeight);
            }
        }
    });



    socket.on('change_name', function (data)
    {
        var chat_msg = $.parseJSON('[' + data + ']'),
                now = new Date().getDay(),
                chat_class = 'conv_messages_'+chat_msg[0]['conv_id'];

        var check_concerned = false;

        $.each(chat_msg[0]['users'],function(i,user){
            if(user.user_id == {{$user->id}})
            {
                check_concerned = true;
                return false;
            }
        });
        if(check_concerned)
        {
            if($('.'+chat_class).length)
            {
                $(".chat_conv_name").after('<div class="head-tchat-left">'+chat_msg[0]['conv_name']+'</div>');
                $(".chat_conv_name").remove();
                $('.'+chat_class).append('<li class="right clearfix"><p>'+chat_msg[0]['user']['firstname']+' '+chat_msg[0]['user']['lastname']+' à changé le nom de la conversation en : '+chat_msg[0]['conv_name']+'</p></li>');
                $('.'+chat_class).parent().scrollTop($(".scroll-chat-box")[0].scrollHeight);

            }
            else
            {
                var form = $(document).find('input[name="id"][value="'+chat_msg[0]['user']['id']+'"]').parent();
                create_or_show_chat(form,"{{ route('create_conversation') }}");

                $(".chat_conv_name").after('<div class="head-tchat-left">'+chat_msg[0]['conv_name']+'</div>');
                $(".chat_conv_name").remove();
                $('.'+chat_class).append('<li class="right clearfix"><p>'+chat_msg[0]['user']['firstname']+' '+chat_msg[0]['user']['lastname']+' à changé le nom de la conversation en : '+chat_msg[0]['conv_name']+'</p></li>');
                $('.'+chat_class).parent().scrollTop($(".scroll-chat-box")[0].scrollHeight);
            }
        }

    });

    socket.on('message', function (data) {
        var chat_msg = $.parseJSON('[' + data + ']'),
                chat_class = 'conv_messages_'+chat_msg[0]['conv_id'],
                check_concerned = false;
        var heureMessage = chat_msg[0]['message_h']['created_at'];

        $.each(chat_msg[0]['users'],function(i,user){
            if(user.user_id == {{$user->id}})
            {
                check_concerned = true;
                return false;
            }
        });

        if(check_concerned)
        {
            if(chat_msg[0]['user']['id'] == {{ $user->id }})
            {
                $('.'+chat_class).append('<li class="right clearfix"><span class="chat-avatar pull-right"><img src="{{ $user->picture }}" alt="{{ $user->firstname.' '. $user->lastname }}" width="55px" height="55px"></span>'+
                        '<div id="chat_sender1" class="chat-body clearfix"><div class="header">'+
                        '<small class="text-muted"><span class="fa fa-clock-o">&nbsp;'+heureMessage+'</span>'+
                        '</small><strong class="pull-right primary-font">{{ $user->firstname }} {{$user->lastname }}</strong>'+
                        '</div>'+
                        '<p>'+chat_msg[0]['message']+'</p></div></li>');
                $('.'+chat_class).parent().scrollTop($(".scroll-chat-box")[0].scrollHeight);
            }
            else
            {
                if($('.'+chat_class).length)
                {
                    $('.'+chat_class).append('<li class="left clearfix"><span class="chat-avatar pull-left"><img src="'+chat_msg[0]['user']['picture']+'" alt="'+chat_msg[0]['user']['firstname']+' '+chat_msg[0]['user']['lastname']+
                            '" width="55px" height="55px"></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+chat_msg[0]['user']['firstname']+' '+chat_msg[0]['user']['lastname']+

                            '</strong><small class="pull-right text-muted"><span class="fa fa-clock-o">&nbsp;'+heureMessage+'</span></small></div><p>'+chat_msg[0]['message']+'</p></div></li>');

                    $('.'+chat_class).parent().scrollTop($(".scroll-chat-box")[0].scrollHeight);
                }
                else
                {
                    var form = $(document).find('input[name="id"][value="'+chat_msg[0]['user']['id']+'"]').parent();
                    create_or_show_chat(form,"{{ route('create_conversation') }}");
                    $('.'+chat_class).append('<div class="col-xs-8 col-xs-offset-4">'+chat_msg[0]['firstname']+' '+chat_msg[0]['lastname']+'<p>'+chat_msg[0]['message']+'</p></div>');
                    $('.'+chat_class).parent().scrollTop($(".scroll-chat-box")[0].scrollHeight);
                }
            }
        }
    });


    // fermer la tchatbox
    $('body').on('click','.close', function(){
        $(this).parent().parent().parent().parent().remove();
        $.each($('.tchat-box'),function(i,box){
            if(parseInt(box.style.left) > 200 )
            {
                var val = parseInt(box.style.left) - 370;
                $(box).css({ left: val+"px" });
            }
        });

        if(chatbox_pos > 200)
        {
            chatbox_pos = chatbox_pos -370;
        }
    });


    //Envoyer un message via la chat box
    $('body').on('submit','.chat_send_message', function(e){
        e.preventDefault();
        var fdata = $(this).serialize();
        $.ajax({
            type:'POST',
            url:"{{ route('sendmessage') }}",
            data:fdata,
            processData: false,
            success:function(data) {
                console.log('Success !');
                $('#btn-input').val('');
                $(".scroll-chat-box").scrollTop($(".scroll-chat-box")[0].scrollHeight);
            },
            error:function()
            {
                console.log('erreur chat');
            }
        });
    });

    // Input pour changer nom de la conversation
    $('body').on('click','.head-tchat-left', function(e){
        e.preventDefault();
        var conv_name = $(this).html();
        $(this).html('');
        var conv_id = $(this).parent().parent().find('input[type="hidden"][name="conversation_id"]').val();
        $(this).after('<form action="change_conversation_name" method="POST" class="chat_conv_name"><input class="quit_on_blur" type="text" name="conv_name" value="'+conv_name+'"><input type="hidden" name="conversation_id" value="'+conv_id+'"><input type="submit" value="OK" class=" btn-primary"></form>');
        $(this).remove();
    });

    //Changement du nom de la conversation
    $('body').on('submit','.chat_conv_name', function(e){
        e.preventDefault();
        var fdata = $(this).serialize();
        $.ajax({
            type:'POST',
            url:"{{route('change_conversation_name')}}",
            data:fdata,
            processData: false,
            success:function(data) {
                console.log('Success !');
            },
            error:function()
            {
                console.log('erreur chat');
            }
        });
    });

    //Input pour Ajout d'utilisateur à la conversation
    $('body').on('click','.chat_user_add_button', function(e){
        var div_for_input = $(this).parent().parent().parent().find(".chat_user_add_div");
        var conv_id = $(this).parent().parent().parent().find('input[type="hidden"][name="conversation_id"]').val();
        $(div_for_input).html('');
        $(div_for_input).append('<form action="chat_add_user" method="POST" class="chat_user_add"><input type="text" name="add_user" class="form-control chat_json_user_add"><input type="hidden" name="conversation_id" value="'+conv_id+'"><br><div class="chat_show_user_div"></div></form>');
        $(".chat_json_user_add").focus();
    });

    //Listes d'utilisateur ajoutables à la conversation
    $('body').on('keyup','.chat_json_user_add', function(e){
        e.preventDefault();
        var fdata = $(this).parent().serialize();
        $.ajax({
            type:'POST',
            url:"{{ route('chat_show_user') }}",
            data:fdata,
            processData: false,
            success:function(data) {
                console.log('Success !');
                console.log(data);
                var to_append='';
                $.each(data.friends,function(i,friend){
                    console.log(friend);
                    to_append = to_append+'<span value="'+friend.id+'" class="chat_show_user_span"><img src="'+friend.picture+'" class="search-add-user-chat-img">'+friend.firstname+' '+friend.lastname+'</span>';
                });
                $('.chat_show_user_div').html(to_append);
            },
            error:function()
            {
                console.log('erreur chat');
            }
        });
    });


    //Ajout d'input lors de clic sur user + submit du form d'ajout d'user à la conv
    $('body').on('click','.chat_show_user_span', function(e){
        var chat_friend_id = $(this).attr('value');
        $(this).parent().parent().append('<input type="hidden" name="friend_id" value="'+chat_friend_id+'">'); //ajout de l'input

        var fdata = $(this).parent().parent().serialize();
        console.log(fdata);
        $.ajax({
            type:'POST',
            url:"{{route('chat_add_user')}}",
            data:fdata,
            processData: false,
            success:function(data) {
                console.log('Success !');
            },
            error:function()
            {
                console.log('erreur chat');
            }
        });


        $('.chat_user_add').remove(); //on supprimme le form pour nettoyer la chat box
    });

    //Ajout d'utilisateur à la conversation
    $('body').on('click','.chat_show', function(){
        var form = $(this);
        create_or_show_chat($(this),"{{route('show_conversation') }}");
    });


    function create_or_show_chat(form, url,view = 0){
        var now = new Date().getDay();
        var fdata = $(form).serialize();
        $.ajax({
            type:'POST',
            url:url, // url, from form
            data:fdata,
            processData: false,
            success:function(data) {
                var to_append = '';
                var chat_class = 'conv_messages_'+data.conv['id'];
                if(!($('.'+chat_class).length))
                {
                    to_append = to_append+'<div class="tchat-box" style="left:'+chatbox_pos+'px"><div class="panel panel-default panel-chat"><div class="head-tchat"><div class="head-tchat-left">'+data.conv['name']+'</div><div class="head-tchat-right"><i class="fa fa-user-plus chat_user_add_button" aria-hidden="true"></i><i class="fa fa-times close" aria-hidden="true"></i></div></div><div class="chat_user_add_div"></div><div class="panel-body scroll-chat-box"><ul class="scroll conv_messages_'+data.conv['id']+'">';
                    chatbox_pos+=370;

                    if(chatbox_pos > ($(document).width()-400))
                    {
                        chatbox_pos = 200;
                        $.each($('.tchat-box'),function(i,box){
                            if($(box).css("left") == 200 )
                            {
                                $(box).remove();
                            }
                        });
                    }
                }
                data.messages.forEach(function(message){
                    var heureMessage = message['created_at'];
                    if(message['user_id'] == {{ $user->id }})
                    {
                        to_append = to_append + '<li class="right clearfix"><span class="chat-avatar pull-right"><img src="{{ $user->picture }}" alt="{{ $user->firstname.' '. $user->lastname }}" width="55px" height="55px"></span>'+
                                '<div id="chat_sender1" class="chat-body clearfix"><div class="header">'+
                                '<small class="text-muted"><span class="fa fa-clock-o">&nbsp;'+heureMessage+'</span>'+
                                '</small><strong class="pull-right primary-font">{{ $user->firstname }} {{$user->lastname }}</strong>'+
                                '</div>'+
                                '<p>'+message['message']+'</p></div></li>';
                    }
                    else
                    {
                        data.users.forEach(function(user){
                            if(message['user_id'] == user['id'])
                            {
                                var heureMessage = message['created_at'];
                                console.log(heureMessage);
                                to_append = to_append + '<li class="left clearfix"><span class="chat-avatar pull-left"><img src="'+user['picture']+'" alt="'+user['firstname']+' '+user['lastname']+
                                        '" width="55px" height="55px"></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+user['firstname']+' '+user['lastname']+
                                        '</strong><small class="pull-right text-muted"><span class="fa fa-clock-o">&nbsp;'+heureMessage+'</span></small></div><p>'+message['message']+'</p></div></li>';
                            }
                        });
                    }
                });

                if(!($('.'+chat_class).length))
                {
                    to_append = to_append + '</ul></div><div class="panel-footer"><form action="sendmessage" method="POST" class="chat_send_message"><div class="input-group">'+
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="conversation_id" value="'+data.conv['id']+'">'+
                            '<input id="btn-input" name="message" type="text" autocomplete="off" placeholder="Ecrivez un message..." class="form-control input-sm">'+
                            '<span class="input-group-btn"><input type="submit" value="Envoyer" class="btn btn-success btn-sm"></span></div></form></div>';
                }
                if(view == 1)
                {
                    $('.conv_users-list').after(to_append);
                    chatbox_pos = chatbox_pos-370;
                }
                else
                {
                    if($('.'+chat_class).length)
                    {
                        $('.conv_messages_'+data.conv['id']).html(to_append);
                        $(".scroll-chat-box").scrollTop($(".scroll-chat-box")[0].scrollHeight);
                    }
                    else
                    {
                        $('.users-list').after(to_append);
                        $(".scroll-chat-box").scrollTop($(".scroll-chat-box")[0].scrollHeight);
                    }
                }
            },
            error:function()
            {
                console.log('erreur du chat');
            }
        });
    }


</script>


<!-- JavaScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
@yield('js')
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>
