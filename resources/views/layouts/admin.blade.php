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
                <img width="25" height="25" src="{{ $user->picture }}" alt="{{ $user->firstname.' '.$user->lastname }}" class="avatar">
                <span>@if(isset($user)){{ $user->firstname.' '.$user->lastname }}@endif</span>
                <!-- BEGIN USER SETTINGS SECTION--><i data-toggle="dropdown" class="trigger-user-settings fa fa-user"></i>
                <div class="user-settings">
                    <!-- BEGIN USER SETTINGS TITLE-->
                    <h3 class="user-settings-title">Settings shortcuts</h3>
                    <!-- END USER SETTINGS TITLE-->
                    <!-- BEGIN USER SETTINGS CONTENT-->
                    <div class="user-settings-content">
                        <a href="#my-profile">
                            <!-- //Notice .icon class-->
                            <div class="icon"><i class="fa fa-user"></i>
                            </div>
                            <!-- //Notice .title class-->
                            <div class="title">My Profile</div>
                            <!-- //Notice .content class-->
                            <div class="content">View your profile</div>
                        </a>
                        <a href="#view-messages">
                            <!-- //Notice .icon class-->
                            <div class="icon"><i class="fa fa-envelope-o"></i>
                            </div>
                            <!-- //Notice .title class-->
                            <div class="title">View Messages</div>
                            <!-- //Notice .content class-->
                            <div class="content">
                                You have <strong>17</strong>
                                new messages
                            </div>
                        </a>
                        <a href="#view-pending-tasks">
                            <!-- //Notice .icon class-->
                            <div class="icon"><i class="fa fa-tasks"></i>
                            </div>
                            <!-- //Notice .title class-->
                            <div class="title">View Tasks</div>
                            <!-- //Notice .content class-->
                            <div class="content">You have <strong>8</strong> pending tasks</div>
                        </a>
                    </div>
                    <!-- END USER SETTINGS CONTENT-->
                    <!-- BEGIN USER SETTINGS FOOTER-->
                    <div class="user-settings-footer">
                        <a href="#more-settings">See more settings</a>
                    </div>
                    <!-- END USER SETTINGS FOOTER-->
                </div>
            </div>
            <!-- END USER SETTINGS SECTION-->
            <!-- EDN USER SECTION-->
            <!-- BEGIN SEARCH SECTION-->
            <div class="search-sidebar">
                <form class="search-sidebar-form has-icon">
                    <label for="sidebar-query" class="fa fa-search"></label>
                    <input id="sidebar-query" type="text" placeholder="Search" class="search-query">
                </form>
            </div>
            <div class="clearfix"></div>
            <!-- END SEARCH SECTION-->

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
<!-- BEGIN THEME SWITCHER-->
<div class="theme-switcher">
    <a href="#"><i class="fa fa-cogs"></i>
    </a>
    <div class="content"><strong>Color Style</strong>
        <select name="colorpicker" class="styles">
            <option value="#fff" data-theme="../../assets/css/themes/admin/default.css">Default</option>
            <option value="#647AAB" data-theme="../../assets/css/themes/admin/facebook.css">Facebook</option>
            <option value="#242424" data-theme="../../assets/css/themes/admin/inverse.css">Inverse</option>
            <option value="#62c462" data-theme="../../assets/css/themes/admin/green.css">Green</option>
            <option value="#394263" data-theme="../../assets/css/themes/admin/blue-sidebar.css">Blue Sidebar</option>
        </select>
        <hr>
        <a href="../admin-rtl/index.html"><strong>RTL Version</strong>
        </a>
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
<!-- Bootstrap Hover Dropdown-->
<script src="../../assets/js/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<!-- jQuery slimScroll-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.1/jquery.slimscroll.min.js"></script>
<script>
    window.jQuery.ui || document.write('<script src="../../assets/js/plugins/jquery.slimscroll/jquery.slimscroll.min.js"><\/script>')
</script>
<!-- BEGIN THEME SWITCHER SCRIPTS-->
<script>
    var assets_dir = '../../assets/'
</script>
<script src="../../assets/js/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
<script src="../../assets/js/demo/theme-switcher-admin.js"></script>
<!-- END THEME SWITCHER SCRIPTS-->
<script src="../../assets/js/sidebar.js"></script>
<script src="../../assets/js/panels.js"></script>
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
<!-- END GENERAL SCRIPTS-->
<!-- BEGIN CURRENT PAGE SCRIPTS-->
<script src="../../assets/js/plugins/flot/jquery.flot.js"></script>
<script src="../../assets/js/plugins/flot/jquery.flot.selection.js"></script>
<script src="../../assets/js/plugins/jqvmap/jquery.vmap.js"></script>
<script src="../../assets/js/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="../../assets/js/plugins/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="../../assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="../../assets/js/plugins/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="../../assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="../../assets/js/plugins/justgage/lib/raphael.2.1.0.min.js"></script>
<script src="../../assets/js/plugins/justgage/justgage.js"></script>
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="../../assets/js/plugins/gmaps/gmaps.js"></script>
<script src="../../assets/js/plugins/pnotify/pnotify.custom.min.js"></script>
<script src="../../assets/js/demo/dashboard.js"></script>
<!-- END CURRENT PAGE SCRIPTS-->
</body>
</html>