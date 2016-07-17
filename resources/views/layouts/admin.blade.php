<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Athleteec | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('asset/css/social.core.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/jquery-ui/social/jquery.ui.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/themes/admin/facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/plugins/jqvmap/jqvmap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/plugins/pnotify/pnotify.custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/themes/admin/facebook.css') }}" rel="stylesheet">

    @yield('css')
    <link href="{{ asset('asset/css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/admin.css') }}" rel="stylesheet">

    <style>
        .wrapper .main {
            margin-top: 40px;
        }
        @media screen and (max-width: 480px) {
            .wrapper .main {
                margin-top: 80px;
            }
        }
    </style>

    <![endif]-->
</head>
<body>
<div class="wrapper">
    <!-- BEGIN SIDEBAR-->
    <aside class="social-sidebar">
        <div class="social-sidebar-content">
            <!-- BEGIN USER SECTION-->
            <div class="user">
                <!-- //Notice .avatar class-->
                <img width="25" height="25" src="{{ Auth::user()->picture }}" alt="{{ Auth::user()->firstname.' '.Auth::user()->lastname }}" class="avatar">
                <span>{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</span>
                <i data-toggle="dropdown" class="trigger-user-settings fa fa-user"></i>
                <div class="user-settings">
                    <h3 class="user-settings-title">Settings shortcuts</h3>
                    <div class="user-settings-content">
                        <a href="#my-profile">
                            <div class="icon"><i class="fa fa-user"></i>
                            </div>
                            <div class="title">My Profile</div>
                            <div class="content">View your profile</div>
                        </a>
                        <a href="#view-messages">
                            <div class="icon"><i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="title">View Messages</div>
                            <div class="content">
                                You have <strong>17</strong>
                                new messages
                            </div>
                        </a>
                        <a href="#view-pending-tasks">
                            <div class="icon"><i class="fa fa-tasks"></i>
                            </div>
                            <div class="title">View Tasks</div>
                            <div class="content">You have <strong>8</strong> pending tasks</div>
                        </a>
                    </div>
                    <div class="user-settings-footer">
                        <a href="#more-settings">See more settings</a>
                    </div>
                </div>
            </div>
            <div class="menu">
                <div class="menu-content">
                    <ul id="social-sidebar-menu">
                        <!-- BEGIN ELEMENT MENU-->
                        <li>
                            <a href="{{ route('admin.user.index') }}">
                                <!-- icon--><i class="fa fa-users"></i>
                                <span>Utilisateurs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.publication.index') }}">
                                <!-- icon--><i class="fa fa-list-alt"></i>
                                <span>Publications</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sport.index') }}">
                                <!-- icon--><i class="fa fa-star"></i>
                                <span>Sports</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.newsletter.index') }}">
                                <!-- icon--><i class="fa fa-envelope-o"></i>
                                <span>Newsletter</span>
                            </a>
                        </li>

        <!-- BEGIN CHAT SECTION-->
        <div class="chat visible-lg visible-md">
            <ul class="users-list">
                <li>
                    <a data-firstname="Cesar" data-lastname="Mendoza" data-status="online" data-userid="1" href="#ignore">
                        <img src="../../assets/img/avatars/user2_22.jpg" alt="User">
                        <span>Cesar Mendoza</span><i class="fa fa-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="2" href="#ignore">
                        <img src="../../assets/img/avatars/user1_22.jpg" alt="User">
                        <span>Yadra Abels</span><i class="fa fa-circle user-status offline"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="Tobei" data-lastname="Tsumura" data-status="online" data-userid="3" href="#ignore">
                        <img src="../../assets/img/avatars/user4_22.jpg" alt="User">
                        <span>Tobei Tsumura</span><i class="fa fa-circle user-status online"></i>
                    </a>
                </li>
                <li>
                    <a data-firstname="John" data-lastname="Doe" data-status="offline" data-userid="4" href="#ignore">
                        <img src="../../assets/img/avatars/user3_22.jpg" alt="User">
                        <span>John Doe</span><i class="fa fa-circle user-status offline"></i>
                    </a>
                </li>
            </ul>
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
    <!-- END SIDEBAR-->
    <header>
        <!-- BEGIN NAVBAR-->
        <nav role="navigation" class="navbar navbar-fixed-top navbar-super social-navbar">
            <div class="navbar-header">
                <a href="#home" title="Social" class="navbar-brand">
                    <img width="25" height="25" src="../../assets/img/logo-white-181.png" alt="Social" class="light">
                    <img width="25" height="25" src="../../assets/img/logo-gray-181.png" alt="Social" class="dark">
                    <span>&nbsp;Social</span>
                </a>
            </div>
            <div class="navbar-toggle"><i class="fa fa-align-justify"></i>
            </div>
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
        <!-- END NAVBAR-->
    </header>
    <div class="main">
        @yield('content')
    </div>
    <footer>2014 © cesarlab.com | Social - Premium Responsive Admin Template</footer>
</div>
<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                <h4 id="myModalLabel" class="modal-title">Modal Settings</h4>
            </div>
            <div class="modal-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, deserunt!</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END THEME SWITCHER-->
<!-- jQuery-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/jquery/jquery.min.js"><\/script>')
</script>
<!-- Bootstrap JS-->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script>
    $.fn.modal || document.write('<script src="../../assets/js/plugins/bootstrap/bootstrap.min.js"><\/script>')
    // Prevent jQueryUI Conflicts
    var bootstrapTooltip = $.fn.tooltip.noConflict()
    $.fn.bootstrapTooltip = bootstrapTooltip
</script>
<!-- jQueryUI-->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    window.jQuery.ui || document.write('<script src="../../assets/js/jquery-ui/jquery-ui.min.js"><\/script>')
</script>

@yield('js')

</body>
</html>