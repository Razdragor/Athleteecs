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



                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.category.update',['category' => $category]) }}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Nom :</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control-static" name="name" value="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">

                                    <label class="col-sm-2 control-label" for="name">Liste des détails associé :</label>
                                    <div class="col-sm-10">
                                        @if($category->details)
                                            @foreach($category->details as $detailnow)
                                                <p class="form-control-static">{{ $detailnow->name }}
                                                <input type="checkbox" id="{{$detailnow->id}}" name="detailsuppr[]" value="{{$detailnow->id}}"></p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="name">Liste des détails disponible :</label>
                                    <div class="col-sm-10">

                                        @if($details)
                                            @foreach($details as $detail)
                                                <p class="form-control-static">{{ $detail->name }}
                                                    <input type="checkbox" id="{{$detail->id}}" name="detailadd[]" value="{{$detail->id}}"></p>
                                            @endforeach
                                        @endif
                                    </div>
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
                        <a href="{{ route('admin.category.show', ['category' => $category]) }}" class="btn btn-default">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
@endsection