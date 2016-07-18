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
                <div><h1>Evénements <small>({{ $events->count()}})</small></h1></div>
                <div style="position: absolute;right: 0px;top:20px">
                    <a href="{{ route('event.create') }}" class="btn btn-default btn-xs">Créer un événement</a>
                </div>
            </div>
            <div style="border-bottom: solid black 1px;width: 90%;margin:auto"></div>
        </div>

        @foreach($events as $event)
            <div class="row media" style="padding: 30px;">
                <div class="col-lg-2 col-sm-12">
                    <div class="media-left media-middle">
                        <a href="{{ route("event.show", ["event" => $event->event_id]) }}">
                            <img class="media-object" src="{{ $event->event->picture }}" alt="..." width="100%">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-12">
                    <h4 class="media-heading">{{$event->event->name}}</h4>
                    <span>{{$event->event->description}}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
@endsection
