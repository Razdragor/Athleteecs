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
                                            <span class="feed-time"><em>{{$notification->timeAgo($notification->updated_at)}}</em></span>
                                        </a>
                                    </li>
                                @endif
                            @elseif($notification->notification=='events')
                                <li class="list-group-item">
                                    <a href="/event/{{$notification->userL_id}}">
                                        <div class="label label-danger feed-icon"><i class="fa fa-times"></i></div>
                                        <span>&nbsp;A créer l'évènement &nbsp;</span>
                                        <span class="label label-primary hidden-xs">{{$notification->libelle}}</span>
                                        <span class="feed-time"><em>{{$notification->timeAgo($notification->updated_at)}}</em></span>
                                    </a>
                                </li>
                            @elseif($notification->notification=='groups')
                                <li class="list-group-item">
                                    <a href="/event/{{$notification->userL_id}}">
                                        <div class="label label-danger feed-icon"><i class="fa fa-times"></i></div>
                                        <span>&nbsp;A créer l'évènement &nbsp;</span>
                                        <span class="label label-primary hidden-xs">{{$notification->libelle}}</span>
                                        <span class="feed-time"><em>{{$notification->timeAgo($notification->updated_at)}}</em></span>
                                    </a>
                                </li>
                            @else
                                <li class="list-group-item">
                                    <a href="/association/{{$notification->userL_id}}">
                                        <div class="label label-danger feed-icon"><i class="fa fa-times"></i></div>
                                        <span>&nbsp;A créer l'association &nbsp;</span>
                                        <span class="label label-primary hidden-xs">{{$notification->libelle}}</span>
                                        <span class="feed-time"><em>{{$notification->timeAgo($notification->updated_at)}}</em></span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

