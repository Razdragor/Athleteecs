@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- //Notice .timeline-2-cols class-->
                <ul class="timeline-2-cols">
                    <li>

                        <!-- //Notice .timeline-badge class-->
                        <div class="timeline-badge primary">
                            <a href=""><i rel="tooltip" title="11 hours ago via Twitter" class="glyphicon glyphicon-record"></i>
                            </a>
                        </div>
                        <div class="timeline-panel panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Quoi de neuf ?</div>

                                <div class="panel-tools pull-right">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_home" aria-expanded="true">Statut</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_profile" aria-expanded="false">Activité</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <style>
                                .image-upload > input
                                {
                                    display: none;
                                }
                                .btn-group > div{
                                    float: left;
                                    margin-left: 10px;
                                }

                                 .time{
                                     width: 33%;
                                     float: left !important;
                                     padding: 0 10px 10px 10px !important;
                                 }
                                .panel-foo{
                                    background-color: #f5f5f5;
                                    border-color: #dddddd;
                                    color: #333333;
                                    padding:6px;
                                }
                            </style>
                            <div class="panel-body" style="padding: 0px">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab_home">
                                        <form role="form" style="position: relative" action="{{ route("publication.store")}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                        <textarea id="user-post" name="message_status" placeholder="Partage ton statut" rows="3" class="form-control" style="resize: none;border: none;box-shadow: none" ></textarea>
                                        <div class="form-actions panel-foo">
                                            <div class="btn-group">
                                                <div class="image-upload">
                                                    <label for="file-input">
                                                        <div class="btn btn-default"><i class="fa fa-camera"></i></div>
                                                    </label>
                                                    <input id="file-input" name="picture_status" type="file"/>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary pull-right">Post</button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tab_profile">
                                        <form role="form" style="position: relative" action="{{ route("activity.store")}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div style="padding: 10px;">
                                                <div class="form-group">
                                                    <label for="select-beast" class="">Sport :</label>
                                                    <select id="select-beast" class="demo-default" name="sport_act">
                                                        @foreach($sports as $sport)
                                                            <option value="{{ $sport->id }}">
                                                                {{ $sport->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="datetimepicker1" class="">Date de début :</label>
                                                    <div class="input-group date" id="datetimepicker1">
                                                        <input type="text" class="form-control" placeholder="__/__/____ __:__" name="date_start_act">
                                                        <span class="input-group-addon">
                                                        <span class="fa-calendar fa"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="datetimepicker2" class="">Durée</label>
                                                    <div id="datetimepicker2">
                                                        <div class="input-group time">
                                                            <input type="text" class="form-control" placeholder="00" aria-describedby="basic-addon1" name="time_h_act">
                                                            <span class="input-group-addon" id="basic-addon1">H</span>
                                                        </div>
                                                        <div class="input-group time">
                                                            <input type="text" class="form-control" placeholder="00" aria-describedby="basic-addon2" name="time_m_act">
                                                            <span class="input-group-addon" id="basic-addon2">MIN</span>
                                                        </div>
                                                        <div class="input-group time">
                                                            <input type="text" class="form-control" placeholder="00" aria-describedby="basic-addon3" name="time_s_act">
                                                            <span class="input-group-addon" id="basic-addon3">SEC</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="user-post">Donne ton ressenti</label>
                                                    <textarea id="user-post" name="message_act" placeholder="Message..." rows="3" class="form-control" style="resize: none;border: none;" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-actions panel-foo">
                                                <div class="btn-group">
                                                    <div class="image-upload">
                                                        <label for="file-input">
                                                            <div class="btn btn-default"><i class="fa fa-camera"></i></div>
                                                        </label>
                                                        <input id="file-input" name="picture_act" type="file"/>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary pull-right">Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php $i = 1; ?>
                    @foreach($publications as $publication)
                        <li class="<?php if($i%2){echo 'timeline-inverted';} $i++; ?>">
                            <!-- //Notice .timeline-badge class-->
                            <div class="timeline-badge primary">
                                <a href="#"><i rel="tooltip" title="{{ $publication->date_start }}" class="glyphicon glyphicon-record invert"></i>
                                </a>
                            </div>
                            <!-- //Notice .timeline-panel class-->
                            <div class="timeline-panel">
                                <!-- //Notice .timeline-heading class-->
                                <div class="timeline-heading row" style="margin: 0;">
                                    <div style="margin:0 10px 0 0;float:left;">
                                        <img src="{{ asset($publication->user->picture) }}" alt="Image" class="img-responsive" style="width: 50px; margin: 5px;display: inline-block;">

                                    </div>
                                    <div style="margin: 10px;">
                                        <span>{{ $publication->user->firstname.' '.$publication->user->lastname}}</span><br>
                                        <small><i aria-hidden="true" class="fa fa-clock-o"></i> {{ $publication->timeAgo($publication->created_at) }}</small>
                                    </div>
                                </div>

                                <!-- //Notice .timeline-body class-->
                                <div class="timeline-body">
                                    <p>
                                        {{$publication->message}}
                                    </p>
                                    @if(!is_null($publication->picture))
                                        <img src="{{ asset($publication->picture) }}" alt="Image" class="img-responsive">
                                    @endif

                                </div>
                                <!-- //Notice .timeline-footer class-->
                                <div class="timeline-footer">
                                    <div class="comments" id="comments-{{ $publication->id }}">
                                        <?php $y = 1;$class=""; ?>
                                        @foreach($publication->commentspost as $comment)
                                            <div class="comment">
                                                <a class="pull-left" href="#">
                                                    <img width="30" height="30" class="comment-avatar" alt="Julio Marquez" src="{{ asset($comment->user->picture) }}">
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
                                        <div class="comment">
                                            <a class="pull-left" href="#">
                                                <img width="30" height="30" class="comment-avatar" alt="Julio Marquez" src="{{ asset(Auth::user()->picture) }}">
                                            </a>
                                            <div class="comment-body">
                                                <input type="text" class="form-control" name="{{ $publication->id }}" id="post-comment" placeholder="Ecris un commentaire...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li style="float: none;" class="clearfix"></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/plugins/moment.js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/locales/bootstrap-datetimepicker.fr.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/selectize.js/standalone/selectize.min.js') }}"></script>

    <script>
        $("#datetimepicker1").datetimepicker({language: "fr",icons:{time:"fa fa-clock-o",date:"fa fa-calendar",up:"fa fa-arrow-up",down:"fa fa-arrow-down"}});
        $("#datetimepicker22").datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            useSeconds: true,
            pickDate: false
        });
        $('#select-beast').selectize({
            create: true,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            dropdownParent: 'body'
        });
    </script>
@endsection
