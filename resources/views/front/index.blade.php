@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/indexall.css') }}" rel="stylesheet">

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
                            <div class="panel-body" style="padding: 0px">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab_home">
                                        <form role="form" style="position: relative" action="{{ route("publication.store")}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                        <textarea id="user-post" name="message_status" placeholder="Partage ton statut" rows="3" class="form-control" style="resize: none;border: none;box-shadow: none"></textarea>
                                        <div class="form-actions panel-foo">
                                            <div class="btn-group">
                                                <div class="image-upload">
                                                    <label for="file-input">
                                                        <div class="btn btn-default"><i class="fa fa-camera"></i></div>
                                                    </label>
                                                    <input id="file-input" name="picture_status" type="file"/>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary pull-right">Publier</button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="tab_profile">
                                        <form role="form" style="position: relative" action="{{ route("activity.store")}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div style="padding: 10px;">
                                                <div class="form-group">
                                                    <label for="select-beast" class="" >Sport :</label>
                                                    <select id="select-beast" class="demo-default" name="sport_act" required>
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
                                                        <input type="text" class="form-control" placeholder="__/__/____ __:__" name="date_start_act" required readonly>
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
                                                    <textarea id="user-post" name="message_status" placeholder="Message..." rows="3" class="form-control" style="resize: none;border: none;" required ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-actions panel-foo">
                                                <div class="btn-group">
                                                    <div class="image-upload">
                                                        <label for="file-input2">
                                                            <div class="btn btn-default"><i class="fa fa-camera"></i></div>
                                                        </label>
                                                        <input id="file-input2" name="picture_status" type="file"/>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary pull-right">Publier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php $i = 1;$y = 0; ?>
                    @for($z =0; $z < count($publications);$z++)
                        @if($y < count($events) && $i % 3 == 0)
                            <?php
                                $event = $events[$y];
                                $y++;
                                $z--;
                            ?>
                            <li class="<?php if($i%2){echo 'timeline-inverted';} ?>">
                                <div class="timeline-badge primary">
                                    <a href="#"><i rel="tooltip" title="{{ $event->created_at }}" class="glyphicon glyphicon-record <?php if($i%2){echo 'timeline-inverted';} $i++; ?>"></i>
                                    </a>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-body">
                                        <div class="post_picture_video">
                                            <img src="{{ asset($event->picture) }}" alt="" class="img-responsive">
                                        </div>
                                        <div class="post_activity_msg">
                                            {{$event->started_at}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @else
                        <?php
                            $publication = $publications[$z];
                        ?>
                        <li id="<?php
                                if(is_null($publication->activity)){
                                    echo "publication-".$publication->id;
                                }else{
                                    echo "activite-".$publication->activity->id;
                                }
                            ?>" class="<?php if($i%2){echo 'timeline-inverted';} ?> publicationJS">
                            <div class="timeline-badge primary">
                                <a href="#"><i rel="tooltip" title="{{ $publication->date_start }}" class="glyphicon glyphicon-record <?php if($i%2){echo 'timeline-inverted';} $i++; ?>"></i>
                                </a>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading row" style="margin: 0;">
                                    <div style="margin:0 10px 0 0;float:left;">
                                        <a href="{{ route("user.show", $publication->user->id ) }}">
                                            <img src="<?php echo $publication->user->picture ?>" alt="Image" class="img-responsive" style="width: 50px;height:50px; margin: 5px;display: inline-block;">
                                        </a>
                                    </div>
                                    <div style="margin: 10px;float:left;">
                                        @if($publication->user->star == true)
                                            <img src="{{ asset('images/medal-1.png') }}" alt="medal">
                                        @endif
                                        @if(!is_null($publication->association))
                                            <span>{{$publication->user->firstname.' '.$publication->user->lastname}} - <a href="{{ route('association.show',['association' => $publication->association->id]) }}">{{ $publication->association->name }}</a></span><br>
                                        @elseif(!is_null($publication->event))
                                            <span>{{ $publication->user->firstname.' '.$publication->user->lastname}} - <a href="{{ route('event.show',['event' => $publication->event->id]) }}">{{ $publication->event->name }}</a></span><br>
                                        @else
                                            <span>{{ $publication->user->firstname.' '.$publication->user->lastname}}</span><br>
                                        @endif
                                        <small><i aria-hidden="true" class="fa fa-clock-o"></i> {{ $publication->timeAgo($publication->created_at) }}</small>

                                        <div class="btn-group dropdown-post">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="font-size: 8px;"><i class="fa fa-chevron-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                @if(Auth::user()->id == $publication->user_id)
                                                    <li>
                                                        <a href="#" onclick="
                                                            <?php
                                                                if(is_null($publication->activity)){
                                                                    echo "editpost(".$publication->id.")";
                                                                }else{
                                                                    echo "editact(".$publication->activity->id.")";
                                                                }
                                                            ?>">
                                                            {{--@if(!is_null($publication->product))--}}
                                                                <span class="fa fa-pencil"></span>Modifier</a>
                                                            {{--@endif--}}
                                                    </li>
                                                    <li>
                                                        <a href="#" id="deletepost">
                                                            <span class="fa fa-trash-o"></span> Supprimer</a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a href="#" id="signalepost">
                                                        <span class="fa fa-exclamation-triangle"></span> Signaler</a>
                                                </li>
                                            </ul>
                                        </div>
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
                                    @if(!is_null($publication->product))
                                        <div class="post_equipement">
                                            <div class="col-md-6">
                                                <div class="post_equipement_image">
                                                    <a href="{{ route('product.show',['product' => $publication->product]) }}">
                                                        <img src="{{ asset($publication->product->picture) }}" alt="{{ $publication->product->name }}" width="150px" height="150px">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product_name">
                                                    <br><span class="product_name_content">{{ $publication->product->name }}</span>
                                                </div>
<br>
                                                <div class="rating" id="{{ $publication->product->id }}">
                                                    @if($publication->product->ratesvalue() != 0 )
                                                        <strong>Note global</strong> <br> {{ceil($publication->product->ratesvalue())}}/5<div class="ui massive star rating user" data-rating="{{ceil($publication->product->ratesvalue())}}" data-max-rating="5"></div>
                                                    @else
                                                        <strong>Note global </strong> <br> 0/5<div class="ui massive star rating user" data-rating="0" data-max-rating="5"></div>
                                                    @endif
                                                    @if(!empty($user->rates))
                                                        @foreach($user->rates as $rateuser)
                                                            @if($rateuser->product_id == $product->id)
                                                                <strong>Votre note </strong><br> <div class="ui massive star rating user" data-rating="{{ceil($rateuser->value)}}" data-max-rating="5"></div>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                </div>
                                            </div>

                                        </div>
                                    @endif


                                </div>
                                <div class="timeline-footer">
                                    <div class="comments" id="comments-{{ $publication->id }}">
                                        @foreach($publication->commentspost as $comment)
                                            <div class="comment" id="comment-{{$comment->id}}">
                                                <a class="pull-left" href="{{ route("user.show", $comment->user->id ) }}">
                                                    <img width="35" height="35" class="comment-avatar" alt="{{ $comment->user->firstname.' '.$comment->user->lastname }}" src="{{ $comment->user->picture }}">
                                                </a>
                                                <div class="comment-body">
                                                    <span class="message"><strong>{{ $comment->user->firstname.' '.$comment->user->lastname }}</strong> {{ $comment->message }}</span>
                                                    <span class="time">{{ $comment->timeago($comment->created_at) }}</span>
                                                </div>
                                                <span class="action">
                                                    <i class="fa fa-warning" id="signalComment"></i>
                                                    @if(Auth::user()->id == $comment->user->id)
                                                        <i class="fa fa-close" id="deleteComment"></i>
                                                    @endif
                                                </span>
                                            </div>
                                        @endforeach
                                        @if($publication->comments->count() > 3)
                                             <p class='moreComment' data-url="1">Plus de commentaires</p>
                                        @endif
                                        <div class="comment">
                                            <a class="pull-left" href="{{ route("user.show", $publication->user->id ) }}">
                                                <img width="35" height="35" class="comment-avatar" alt="{{Auth::user()->name}}" src="{{ Auth::user()->picture }}">
                                            </a>
                                            <div class="comment-body">
                                                <input type="text" class="form-control" name="{{ $publication->id }}" id="post-comment" placeholder="Ecris un commentaire...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                    @endfor
                    <li style="float: none;" class="clearfix"></li>
                </ul>
                <input id="loadAllPublication" value="1" type="hidden" />
            </div>
        </div>
    </div>
    <div class="modal fade modal-post" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Modifier votre publication</h4>
                </div>
                <div class="modal-body">
                    <form id="submit-modal-post" method="post" enctype="multipart/form-data">
                    <textarea id="user-post-modal-post" name="message_status_modal" placeholder="Partage ton statut" rows="3" class="form-control" style="resize: none;border: none;box-shadow: none" ></textarea>
                    <div class="form-actions panel-foo">
                        <div class="btn-group">
                            <div class="image-upload">
                                <label for="file-input-modal">
                                    <div class="btn btn-default"><i class="fa fa-camera"></i></div>
                                </label>
                                <input id="file-input-modal" name="picture_status_modal" type="file" accept="image/*"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" >Poster</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-activity" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-activity">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Modifier votre activité</h4>
                </div>
                <div class="modal-body">
                    <form id="submit-modal-activity" method="post" enctype="multipart/form-data">
                    <div style="padding: 10px;">
                        <div class="form-group">
                            <label for="select-beast-act" class="">Sport :</label>
                            <select id="select-beast-act" class="demo-default" name="sport_act_modal">
                                @foreach($sports as $sport)
                                    <option value="{{ $sport->id }}">
                                        {{ $sport->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="datetimepicker1-modal" class="">Date de début :</label>
                            <div class="input-group date" id="datetimepicker1-modal">
                                <input type="text" class="form-control" placeholder="__/__/____ __:__" name="date_start_act_modal" id="date_start_act_modal" readonly>
                                <span class="input-group-addon">
                                    <span class="fa-calendar fa"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="datetimepicker2-modal" class="">Durée</label>
                            <div id="datetimepicker2-modal">
                                <div class="input-group time">
                                    <input type="text" class="form-control" placeholder="00" aria-describedby="basic-addon1" name="time_h_act_modal" id="time_h_act_modal">
                                    <span class="input-group-addon" id="basic-addon1">H</span>
                                </div>
                                <div class="input-group time">
                                    <input type="text" class="form-control" placeholder="00" aria-describedby="basic-addon2" name="time_m_act_modal" id="time_m_act_modal">
                                    <span class="input-group-addon" id="basic-addon2">MIN</span>
                                </div>
                                <div class="input-group time">
                                    <input type="text" class="form-control" placeholder="00" aria-describedby="basic-addon3" name="time_s_act_modal" id="time_s_act_modal">
                                    <span class="input-group-addon" id="basic-addon3">SEC</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user-post-modal">Donne ton ressenti</label>
                            <textarea id="user-post-modal-act" name="message_act_modal" placeholder="Message..." rows="3" class="form-control" style="resize: none;border: none;" ></textarea>
                        </div>
                    </div>
                    <div class="form-actions panel-foo">
                        <div class="btn-group">
                            <div class="image-upload">
                                <label for="file-input2-modal">
                                    <div class="btn btn-default"><i class="fa fa-camera"></i></div>
                                </label>
                                <input id="file-input2-modal" name="picture_act_modal" type="file"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Poster</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-delete">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Suppression de votre publication</h4>
                </div>
                <div class="modal-body">
                    Etes vous sur de vouloir supprimer cette publication ?
                </div>
                <form id="delete-modal-post" method="post">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="confirm">Oui</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-signal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-signal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Signalement de la publication</h4>
                </div>
                <div class="modal-body">
                    Le signalement a bien été pris en compte! Merci
                </div>
                <form id="signal-modal-post" method="post">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modal-signal-comment" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-signal-comment">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4>Signalement du commentaire</h4>
                </div>
                <div class="modal-body">
                   Le signalement a bien été pris en compte! Merci
                </div>
                <form id="signal-modal-post" method="post">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('asset/js/plugins/moment.js/moment-with-locales.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/locales/bootstrap-datetimepicker.fr.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/selectize.js/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('asset/js/scroll.js') }}"></script>
    {{--<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.4/semantic.min.js">    </script>--}}
    <script>
        $('.ui.star.rating.user').rating('disable');
    </script>
@endsection
