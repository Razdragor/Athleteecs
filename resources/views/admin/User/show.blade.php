@extends('layouts.admin')

@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <style type="text/css">
        #map {height: 250px; }

        .timeline-2-cols::before {
            content: normal;
        }
        .timeline-2-cols > li > .timeline-panel::before {
            content: normal;
        }

        .timeline-2-cols > li > .timeline-panel::after {
            content: normal;
        }
        .timeline-2-cols > li > .timeline-panel {
            width: 100%;
        }
        .timeline-2-cols > li {
            width: 100%;
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
<div class="container" style="margin-bottom: 50px;">
    <div class="row padding">
            <div class="col-md-2 col-sm-12">
                <img src="{{ $user->picture}}">
            </div>
            <div class="col-md-10 col-sm-12">
                <h1>{{$user->firstname." ".$user->lastname }}</h1>
            </div>

    </div>
    <div class="row padding">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Informations</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Publications</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Photos</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Videos</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div>Prénom : {{ $user->firstname }}</div>
                <div>Nom : {{ $user->lastname }}</div>
                <div>Sexe : {{ $user->sexe }}</div>
                <div>Date de naissance : {{ $user->birthday }}</div>
                <div>Date de création : {{ $user->created_at }}</div>
                <div>Status : {{ $user->status }}</div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="col-md-offset-2 col-md-8">
                    <ul class="timeline-2-cols">
                        @foreach($user->publications as $publication)
                            <li id="<?php
                            if(is_null($publication->activity)){
                                echo "publication-".$publication->id;
                            }else{
                                echo "activite-".$publication->activity->id;
                            }
                            ?>" class="publicationJS">
                                <div class="timeline-badge primary">
                                    <a href="#"><i rel="tooltip" title="{{ $publication->date_start }}" class="glyphicon glyphicon-record>"></i>
                                    </a>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading row" style="margin: 0;">
                                        <div style="margin:0 10px 0 0;float:left;">
                                            <a href="{{ route("admin.user.show", $publication->user->id ) }}">
                                                <img src="{{ asset($publication->user->picture) }}" alt="Image" class="img-responsive" style="width: 50px; margin: 5px;display: inline-block;">
                                            </a>
                                        </div>
                                        <div style="margin: 10px;float:left;">
                                            <span>{{ $publication->user->firstname.' '.$publication->user->lastname}}</span><br>
                                            <small><i aria-hidden="true" class="fa fa-clock-o"></i> {{ $publication->timeAgo($publication->created_at) }}</small>
                                        </div>
                                    </div>
                                    <div class="timeline-body">
                                        @if(is_null($publication->activity))
                                            <div class="post_activity_msg">
                                                {{$publication->message}}
                                            </div>
                                            <div class="post_picture_video">
                                                @if(!is_null($publication->video))
                                                    <div class="video-container"><iframe src="https://www.youtube.com/embed/{{$publication->video->url}}" frameborder="0" allowfullscreen></iframe></div>
                                                @elseif(!is_null($publication->picture))
                                                    <img src="{{ asset($publication->picture) }}" alt="" class="img-responsive">
                                                @endif
                                            </div>

                                        @else
                                            <div class="post_picture_video">
                                                @if(!is_null($publication->video))
                                                    <div class="video-container"><iframe src="https://www.youtube.com/embed/{{$publication->video->url}}" frameborder="0" allowfullscreen></iframe></div>
                                                @elseif(!is_null($publication->picture))
                                                    <img src="{{ asset($publication->picture) }}" alt="" class="img-responsive">
                                                @endif
                                            </div>
                                            <div class="post_activity">
                                                <div class="post_activity_img">
                                                    <img src="{{ asset("../images/icons/".$publication->activity->sport->icon) }}" alt="{{ $publication->activity->sport->name }}" class="img-responsive">
                                                </div>
                                                <div class="post_activity_stats">
                                                    <span data-text="{{$publication->activity->date_start}}"><i aria-hidden="true" class="fa fa-calendar"></i>{{$publication->activity->getDateStartString() }}</span>
                                                    <span data-text="{{$publication->activity->getTimeSecondes() }}">Durée : {{$publication->activity->time }}</span>
                                                </div>

                                            </div>
                                            <div class="post_activity_msg">
                                                {{$publication->message}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="timeline-footer">
                                        <div class="comments" id="comments-{{ $publication->id }}">
                                            @foreach($publication->commentspost as $comment)
                                                <div class="comment">
                                                    <a class="pull-left" href="{{ route("admin.user.show", $comment->user->id ) }}">
                                                        <img width="35" height="35" class="comment-avatar" alt="{{ $comment->user->firstname.' '.$comment->user->lastname }}" src="{{ asset($comment->user->picture) }}">
                                                    </a>
                                                    <div class="comment-body">
                                                        <span class="message"><strong>{{ $comment->user->firstname.' '.$comment->user->lastname }}</strong> {{ $comment->message }}</span>
                                                        <span class="time">{{ $comment->timeago($comment->created_at) }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if($publication->comments->count() > 3)
                                                <p class='moreComment' data-url="1">Plus de commentaires</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">

            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                @foreach($user->videos() as $video)
                    <div class="col-sm-6 col-md-6">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/{{$video->url}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection