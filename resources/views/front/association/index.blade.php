@extends('layouts.front')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div style="width: 90%;margin:auto">
                <h1 style="float: left;">Associations <small>({{ $associations->count()}})</small></h1>
                <div>
                    <a href="{{ route('association.create') }}" class="btn btn-default btn-xs">Créer une association</a>
                </div>
            </div>
            <div style="border-bottom: solid black 1px;width: 90%;margin:auto"></div>
        </div>
    </div>
@endsection

@section('js')
@endsection
