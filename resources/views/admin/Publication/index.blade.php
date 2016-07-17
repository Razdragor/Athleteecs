@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row padding margin-top-admin">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des publications</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Utilisateur</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Video</th>
                        <th>Nb. commentaires</th>
                        <th>Signalement</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publications as $publication)
                        <tr>
                            <td>{{ $publication->id }}</td>
                            <td><a href="{{ route('admin.user.show', ['user' => $publication->user->id]) }}" ><img src="{{ $publication->user->picture }}" alt="{{ $publication->user->firstname.' '.$publication->user->lastname }}" class="avatar" width="25" height="25"></a></td>
                            <td style="max-width: 10%;">{{ $publication->message }}</td>
                            <td>
                                @if(!is_null($publication->picture))
                                    <img src="{{ $publication->picture }}" alt="image" class="avatar" width="25" height="25">
                                @endif
                            </td>
                            <td>
                                @if(!is_null($publication->video))
                                    <a href=https://www.youtube.com/embed/{{$publication->video->url}}>{{$publication->video->url}}</a>
                                @endif
                            </td>
                            <td>{{ $publication->commentsALl->count() }}</td>
                            <td>
                                @if($publication->score < 5)
                                    <span class="label label-success">{{ $publication->score }}</span>
                                @elseif($publication < 15)
                                    <span class="label label-warning">{{ $publication->score }}</span>
                                @else
                                    <span class="label label-danger">{{ $publication->score }}</span>
                                @endif
                            </td>
                            <td>
                                @if($publication->status == "Success")
                                    <span class="label label-success">Valide</span>
                                @elseif($publication->status == "Signaled")
                                    <span class="label label-warning">Signalé</span>
                                @else
                                    <span class="label label-danger">Bloqué</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.publication.show', ['publication' => $publication->id]) }}">Consulter</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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