<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ATHLETEEC</title>

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
    <link href="{{ asset('asset/css/front.css') }}" rel="stylesheet">
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
                        <img width="25" height="25" src="{{ asset('asset/img/logo.svg') }}" alt="Social" class="light">
                        <img width="25" height="25" src="{{ asset('asset/img/logo.svg') }}" alt="Social" class="dark">
                    </a>
                </div>
                <div class="navbar-toggle"><i class="fa fa-align-justify"></i>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="dropdown navbar-super-fw hidden-xs">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Mega Menu<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-warning alert-dismissable">
                                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button><strong>Warning!</strong>Better check yourself, you're not looking too good.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="btn-icon col-md-3">
                                            <a href="#" role="button" class="btn btn-neutral"><i class="fa fa-dashboard fa-lg"></i>
                                                <div class="title">Dashboard</div>
                                                <span class="label label-warning">2</span>
                                            </a>
                                        </div>
                                        <div class="btn-icon col-md-3">
                                            <a href="#" role="button" class="btn btn-primary"><i class="fa fa-calendar fa-lg"></i>
                                                <div class="title">Calendar</div>
                                                <span class="label label-danger">4</span>
                                            </a>
                                        </div>
                                        <div class="btn-icon col-md-3">
                                            <a href="#" role="button" class="btn btn-danger"><i class="fa fa-inbox fa-lg"></i>
                                                <div class="title">Inbox</div>
                                                <span class="label label-success">2</span>
                                            </a>
                                        </div>
                                        <div class="btn-icon col-md-3">
                                            <a href="#" role="button" class="btn btn-success"><i class="fa fa-money fa-lg"></i>
                                                <div class="title">Finances</div>
                                                <span class="label label-primary">256$</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="media well">
                                                <a href="#" class="pull-left">
                                                    <img src="../../assets/img/avatars/user1_55.jpg" style="width: 55px; height: 55px;" alt="User" class="media-object">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Media heading</h4>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="panel panel-default">
                                                <!-- Table-->
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
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- END DROPDOWN MESSAGES-->
                        <li class="divider-vertical"></li>
                        <!-- BEGIN EXTRA DROPDOWN-->
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle"><i class="fa fa-caret-down fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><i class="fa fa-user"></i>&nbsp;My Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-cogs"></i>&nbsp;Settings</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-sign-out"></i>&nbsp;Log Out</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#"><i class="fa fa-info"></i>&nbsp;Help</a>
                                </li>
                            </ul>
                        </li>
                        <!-- END EXTRA DROPDOWN-->
                    </ul>
                    <div class="nav-indicators">
                        <ul class="nav navbar-nav navbar-right nav-indicators-body">
                            <!-- BEGIN DROPDOWN NOTIFICATIONS-->
                            <li class="dropdown nav-notifications">
                                <!-- BEGIN DROPDOWN TOGGLE-->
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="0" class="dropdown-toggle">
                                    <span class="badge">9</span><i class="fa fa-warning fa-lg"></i>
                                </a>
                                <!-- END DROPDOWN TOGGLE-->
                                <!-- BEGIN DROPDOWN MENU-->
                                <ul class="dropdown-menu">
                                    <!-- BEGIN DROPDOWN HEADER-->
                                    <li class="nav-notifications-header">
                                        <a tabindex="-1" href="#">You have <strong>9</strong> new notifications</a>
                                    </li>
                                    <!-- END DROPDOWN HEADER-->
                                    <!-- BEGIN NOTIFICATION ITEMS-->
                                    <li class="nav-notifications-body">
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
                    </div>
                </div>
                <!-- /.navbar-collapse-->
            </nav>
        </header>
        <div class="main">
            @yield('content')
        </div>
        <footer>2014 © cesarlab.com | Social - Premium Responsive Admin Template</footer>
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
                $('#'+chat_class).append('<div class="col-xs-8">Vous :<p>'+chat_msg[0]['message']+'</p></div>');
            }
            else
            {
                var chat_class = 'conv_messages_'+chat_msg[0]['conv_id'];
                $('#'+chat_class).append('<div class="col-xs-8 col-xs-offset-4">'+chat_msg[0]['firstname']+' '+chat_msg[0]['lastname']+'<p>'+chat_msg[0]['message']+'</p></div>');
            }
          });
        
        $('users-list li').on('click',function(){
            
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
                    var to_append = '<div class="container" style="position: absolute;bottom: 0px;left: 20%;width: 350px;height: 500px;z-index: 9999;background-color: white;"><div class="row"><h3 class="text-center">'+data.conv['name']+'</h3><hr><div id="conv_messages_'+data.conv['id']+'" ></div>';
                    data.messages.forEach(function(message){
                        if(message['user_id'] == {{ $user->id }})
                        {
                            to_append = to_append + '<div class="col-xs-8">Vous :<p>'+message['message']+'</p></div>';
                        }
                        else
                        {
                            data.users.forEach(function(user){
                                if(message['user_id'] == user['id'])
                                {
                                    to_append = to_append + '<div class="col-xs-8 col-xs-offset-4">'+user['firstname']+' '+user['lastname']+'<p>'+message['message']+'</p></div>';
                                }
                            });
                        }
                    });
                    //foreach()
                    //<div id="messages" >Messages</div></div><div class="col-lg-8 col-lg-offset-2 text-right" ><div id="messages" >Messages de l\'interloc</div></div></div></div>';
                    to_append = to_append + '<form action="sendmessage" method="POST" class="test"><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="conversation_id" value="'+data.conv['id']+'"><input type="text" name="message" ><input type="submit" value="send"></form>';
                    $('.users-list').after(to_append);
                },
                error:function(jqXHR)
                {
                    $('.return').html(jqXHR.responseText);
                    
                }
            });
            
        });
        
        
        //$('.test').on("submit",function(e){
        $('body').on('submit','.test', function(e){
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