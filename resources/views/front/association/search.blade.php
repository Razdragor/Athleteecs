@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div style="width: 90%;margin:auto;position: relative">
                <div><h1>Associations <small>({{ $associations->count()}})</small></h1></div>
                <div style="position: absolute;right: 0px;top:20px">
                    <a href="{{ route('association.create') }}" class="btn btn-default btn-xs">Créer une association</a>
                </div>
            </div>
            <div style="border-bottom: solid black 1px;width: 90%;margin:auto"></div>
        </div>

        @foreach($associations as $association)
            <div class="row media" style="padding: 30px;">
                <div class="col-lg-2 col-sm-12">
                    <div class="media-left media-middle">
                        <a href="{{ route("association.show", ["association" => $association->association_id]) }}">
                            <img class="media-object" src="{{ $association->association->picture }}" alt="..." width="100%">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-12">
                    <h4 class="media-heading">{{$association->association->name}}</h4>
                    <span>{{$association->association->description}}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
@endsection
