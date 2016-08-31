@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="margin-top:40px;">
        <div class="row">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
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



                        <form class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Nom :</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Marque :</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->brand->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Sport :</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->sport->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Categorie :</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->category->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="existicon" class="col-sm-2 control-label">Image :</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($product->picture) }}" alt="{{ $product->name }}" class="img-responsive" width="45px" height="45px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="existicon" class="col-sm-2 control-label">Prix :</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->price }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="existicon" class="col-sm-2 control-label">Description :</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="existicon" class="col-sm-2 control-label">Caractéristiques:</label>
                                <div class="col-sm-10">
                                    @foreach($product->caracteristiques as $caracteristique)
                                        <p class="form-control-static"><b>{{$caracteristique->detail->name}}</b></p>
                                        <p class="form-control-static">{{$caracteristique->value}}</p>
                                    @endforeach
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 padding">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Actions</h4>
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('admin.product.edit', ['product' => $product]) }}" class="btn btn-default">Modifier</a>
                        <a href="{{ route('admin.product.delete', ['product' => $product]) }}" class="btn btn-default">Supprimer</a>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-default">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
@endsection