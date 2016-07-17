@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/social.admin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/font-awesome/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/themes/admin/facebook.css') }}">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="panel-body">
        <div class="tab-content">
            <h1>La page des notifications</h1>
            <div id="activities-feed" class="tab-pane active activities-feed">
                <div class="scroll">
                    <ul class="list-group">
                        @foreach (Auth::user()->getallnotifications as $notification)
                            @if($notification->notification=='users_links')
                                @if($notification->afficher==true)
                                    <li class="list-group-item">
                                        <a href="/friends/accept/{{$notification->userL_id}}">
                                            <div class="label label-info feed-icon"><i class="fa fa-info"></i></div>
                                            <span>&nbsp;Demande d'ami de &nbsp;</span>
                                            <span class="label label-primary hidden-xs">{{$notification->libelle}}</span>
                                            <span class="feed-time">
                                                <em>{{$notification->timeAgo($notification->updated_at)}}</em>
                                            </span>
                                        </a>
                                    </li>
                                @else
                                    <li class="list-group-item">
                                        <a href="/user/{{$notification->userL_id}}">
                                            <div class="label label-info feed-icon"><i class="fa fa-info"></i></div>
                                            <span>&nbsp;Ajout de &nbsp;</span>
                                            <span class="label label-primary hidden-xs">{{$notification->libelle}}</span>
                                            <span>&nbsp; à votre liste d'amis.&nbsp;</span>
                                        <span class="feed-time">
                                        <em>{{$notification->timeAgo($notification->updated_at)}}</em>
                                        </span>
                                        </a>
                                    </li>
                                @endif
                            @elseif($notification->notification=='events')
                                <li class="list-group-item">
                                    <a href="#ignore">
                                        <!-- //Notice .feed-icon class-->
                                        <div class="label label-danger feed-icon"><i class="fa fa-times"></i>
                                        </div>
                                        <span>&nbsp;Emails couldn't be sent</span>
                                        <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>4 minutes ago</em>
                              </span>
                                    </a>
                                </li>
                            @elseif($notification->notification=='groups')

                            @else

                            @endif
                        @endforeach
                        <li class="list-group-item">
                            <a href="#ignore">
                                <div class="label label-warning feed-icon"><i class="fa fa-warning"></i>
                                </div>
                                <span>&nbsp;System overload&nbsp;</span>
                                <span class="label label-success hidden-xs">warning</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>3 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-danger feed-icon"><i class="fa fa-times"></i>
                                </div>
                                <span>&nbsp;Emails couldn't be sent</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>4 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-info feed-icon"><i class="fa fa-info"></i>
                                </div>
                                <span>&nbsp;New user registered&nbsp;</span>
                                <span class="label label-primary hidden-xs">username</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>5 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-success feed-icon"><i class="fa fa-check"></i>
                                </div>
                                <span>&nbsp;The backup has been created</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>6 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <div class="label label-warning feed-icon"><i class="fa fa-warning"></i>
                                </div>
                                <span>&nbsp;System overload&nbsp;</span>
                                <span class="label label-success hidden-xs">warning</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>5 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-danger feed-icon"><i class="fa fa-times"></i>
                                </div>
                                <span>&nbsp;Emails couldn't be sent</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>6 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-info feed-icon"><i class="fa fa-info"></i>
                                </div>
                                <span>&nbsp;New user registered&nbsp;</span>
                                <span class="label label-primary hidden-xs">username</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>7 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-success feed-icon"><i class="fa fa-check"></i>
                                </div>
                                <span>&nbsp;The backup has been created</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>8 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <div class="label label-warning feed-icon"><i class="fa fa-warning"></i>
                                </div>
                                <span>&nbsp;System overload&nbsp;</span>
                                <span class="label label-success hidden-xs">warning</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>7 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-danger feed-icon"><i class="fa fa-times"></i>
                                </div>
                                <span>&nbsp;Emails couldn't be sent</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>8 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-info feed-icon"><i class="fa fa-info"></i>
                                </div>
                                <span>&nbsp;New user registered&nbsp;</span>
                                <span class="label label-primary hidden-xs">username</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>9 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-success feed-icon"><i class="fa fa-check"></i>
                                </div>
                                <span>&nbsp;The backup has been created</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>10 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <div class="label label-warning feed-icon"><i class="fa fa-warning"></i>
                                </div>
                                <span>&nbsp;System overload&nbsp;</span>
                                <span class="label label-success hidden-xs">warning</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>9 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-danger feed-icon"><i class="fa fa-times"></i>
                                </div>
                                <span>&nbsp;Emails couldn't be sent</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>10 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-info feed-icon"><i class="fa fa-info"></i>
                                </div>
                                <span>&nbsp;New user registered&nbsp;</span>
                                <span class="label label-primary hidden-xs">username</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>11 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-success feed-icon"><i class="fa fa-check"></i>
                                </div>
                                <span>&nbsp;The backup has been created</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>12 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <div class="label label-warning feed-icon"><i class="fa fa-warning"></i>
                                </div>
                                <span>&nbsp;System overload&nbsp;</span>
                                <span class="label label-success hidden-xs">warning</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>11 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-danger feed-icon"><i class="fa fa-times"></i>
                                </div>
                                <span>&nbsp;Emails couldn't be sent</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>12 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-info feed-icon"><i class="fa fa-info"></i>
                                </div>
                                <span>&nbsp;New user registered&nbsp;</span>
                                <span class="label label-primary hidden-xs">username</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>13 minutes ago</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-icon class-->
                                <div class="label label-success feed-icon"><i class="fa fa-check"></i>
                                </div>
                                <span>&nbsp;The backup has been created</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>14 minutes ago</em>
                              </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END ACTIVITIES FEED-->
            <!-- BEGIN USERS FEED-->
            <!-- //Notice .users-feed class-->
            <div id="users-feed" class="tab-pane users-feed">
                <div class="scroll">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user1_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Removing user</span>
                                <span class="label label-success">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>1 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user2_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Email registration</span>
                                <span class="label label-warning">confirming</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>2 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user3_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>New terms of services.</span>
                                <span class="label label-primary">notified</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>3 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user4_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>User deletion.</span>
                                <span class="label label-danger">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>4 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user1_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Removing user</span>
                                <span class="label label-success">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>3 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user2_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Email registration</span>
                                <span class="label label-warning">confirming</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>4 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user3_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>New terms of services.</span>
                                <span class="label label-primary">notified</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>5 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user4_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>User deletion.</span>
                                <span class="label label-danger">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>6 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user1_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Removing user</span>
                                <span class="label label-success">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>5 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user2_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Email registration</span>
                                <span class="label label-warning">confirming</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>6 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user3_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>New terms of services.</span>
                                <span class="label label-primary">notified</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>7 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user4_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>User deletion.</span>
                                <span class="label label-danger">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>8 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user1_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Removing user</span>
                                <span class="label label-success">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>7 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user2_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Email registration</span>
                                <span class="label label-warning">confirming</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>8 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user3_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>New terms of services.</span>
                                <span class="label label-primary">notified</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>9 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user4_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>User deletion.</span>
                                <span class="label label-danger">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>10 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user1_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Removing user</span>
                                <span class="label label-success">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>9 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user2_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Email registration</span>
                                <span class="label label-warning">confirming</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>10 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user3_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>New terms of services.</span>
                                <span class="label label-primary">notified</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>11 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user4_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>User deletion.</span>
                                <span class="label label-danger">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>12 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user1_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Removing user</span>
                                <span class="label label-success">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>11 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user2_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>Email registration</span>
                                <span class="label label-warning">confirming</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>12 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user3_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>New terms of services.</span>
                                <span class="label label-primary">notified</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>13 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#ignore">
                                <!-- //Notice .feed-avatar class-->
                                <img src="../../assets/img/avatars/user4_55.jpg" alt="John Doe" class="feed-avatar">
                                <span>User deletion.</span>
                                <span class="label label-danger">completed</span>
                                <!-- //Notice .feed-time class-->
                              <span class="feed-time">
                                <em>14 Sept 2013 3:45pm</em>
                              </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END USERS FEED-->
        </div>
    </div>
@endsection

