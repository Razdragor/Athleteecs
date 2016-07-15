@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
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
<div class="container" style="margin-top:40px;">
    <div class="row">
        <div class="col-md-6">
            <ul class="timeline-2-cols">
                <li class="publicationJS">
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
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-6" style="padding:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Informations</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route("admin.publication.update", ['publication' => $publication->id]) }}">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Crée le : </label>
                            <div class="col-sm-8">
                                <p class="form-control-static">{{ $publication->created_at }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Modifié le : </label>
                            <div class="col-sm-8">
                                <p class="form-control-static">{{ $publication->updated_at }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nombre de signalement : </label>
                            <div class="col-sm-8">
                                <p class="form-control-static">{{ $publication->score }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-4 control-label">Status :</label>
                            <div class="col-sm-8">
                                <select id="status" class="form-control" name="status" required>
                                    @if($publication->status == "Success")
                                        <option value="Success" selected>
                                            Valide
                                        </option>
                                    @else
                                        <option value="Success">
                                            Valide
                                        </option>
                                    @endif
                                    @if($publication->status == "Signaled")
                                        <option value="Signaled" selected>
                                            Signalé
                                        </option>
                                    @else
                                        <option value="Signaled">
                                            Signalé
                                        </option>
                                    @endif
                                    @if($publication->status == "Blocked")
                                        <option value="Blocked" selected>
                                            Bloqué
                                        </option>
                                    @else
                                        <option value="Blocked">
                                            Bloqué
                                        </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row padding">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Liste des commentaires</h3>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Utilisateurs</th>
                            <th>Message</th>
                            <th>Date de création</th>
                            <th>Signalement</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($publication->comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td><a href="{{ route('admin.user.show', ['user' => $comment->user->id]) }}">{{ $comment->user->firstname.' '.$comment->user->lastname }}</a></td>
                                <td>{{ $comment->message }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td>
                                    @if($comment->score < 5)
                                        <span class="label label-success">{{ $comment->score }}</span>
                                    @elseif($comment < 15)
                                        <span class="label label-warning">{{ $comment->score }}</span>
                                    @else
                                        <span class="label label-danger">{{ $comment->score }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.comment.destroy', ['comment' => $comment->id]) }}">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('asset/js/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script>
        $(function(){
            $('#example').DataTable();
        });
    </script>
@endsection