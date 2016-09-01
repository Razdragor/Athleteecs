@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="margin-top:40px;">
        <div class="row">
            <div class="col-md-6 padding" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Informations</h4>
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.sport.update',['sport' => $sport]) }}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Nom :</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control-static" name="name" value="{{ $sport->name }}">
                                </div>
                            </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6 padding">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Actions</h4>
                    </div>
                    <div class="panel-body">
                        <button type="submit" class="btn btn-default">Modifier</button>
                        </form>
                        <a href="{{ route('admin.sport.show', ['sport' => $sport]) }}" class="btn btn-default">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
@endsection