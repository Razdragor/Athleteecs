@extends('layouts.admin')


@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row padding margin-top-admin ">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Newsletter</h3>
                </div>
                <div class="panel-body">
                    <p>Objet : {{ $newsletter->objet }}</p>
                    <div>
                        <?php
                            echo $newsletter->text;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Actions</h3>
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('admin.newsletter.edit', ['newsletter' => $newsletter->id]) }}" class="btn btn-default">Modifier</a>
                        <a href="{{ route('admin.newsletter.delete', ['newsletter' => $newsletter->id]) }}" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Envoyer</h3>
                    </div>
                    <div class="panel-body">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        <a href="{{ route('admin.newsletter.send', ['newsletter' => $newsletter->id]) }}" class="btn btn-default">Envoyé</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
@endsection