@extends('layouts.front')

@section('css')
    <link href="{{ asset('asset/css/layouts/timeline-facebook.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/timeline-2-cols.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-profile.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/layouts/user-cards.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/js/plugins/isotope/isotope.css') }}" rel="stylesheet">

    <link href="{{ asset('asset/css/plugins/selectizejs/selectize-default.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_free/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/glyphicons_pro/glyphicons.halflings.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/friends.css') }}" rel="stylesheet">

    <style>
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
            margin-top: 0 !important;
            margin-bottom: 40px;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="container">

            <h1>Creation d'un produit</h1>
            <div style="border-bottom: solid black 1px;width: 100%;margin:auto"></div>

                <div class="container" style="margin-top:40px;">
                    <div class="row">
                        <div class="col-md-12 padding" >
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Information</h4>
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
                                </div>
                                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="name">Nom :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control-static" name="name" placeholder="Nom...">
                                            @if($errors->first('name'))
                                                <div class="alert alert-danger">
                                                    {{$errors->first('name')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="brand">Marque :</label>
                                        <div class="col-sm-10">
                                            <select name="brand" class="form-control">
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="sport">Sport :</label>
                                        <div class="col-sm-10">
                                            <select name="sport" class="form-control">
                                                @foreach($sports as $sport)
                                                    <option value="{{ $sport->id }}">{{$sport->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="category">Categorie :</label>
                                        <div class="col-sm-10">
                                            <select name="category" id="category" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">Description :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control-static" name="description" placeholder="Description..."/>
                                            @if($errors->first('description'))
                                                <div class="alert alert-danger">
                                                    {{$errors->first('description')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="url" class="col-sm-2 control-label">Url :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control-static" name="url" placeholder="Url..."/>
                                            @if($errors->first('url'))
                                                <div class="alert alert-danger">
                                                    {{$errors->first('url')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="picture" class="col-sm-2 control-label">Image :</label>
                                        <div class="col-sm-10">
                                            <div class="image-upload">
                                                <label for="picture">
                                                    <div class="btn btn-default">
                                                        <i class="fa fa-camera"></i>
                                                    </div>
                                                </label>
                                                <input type="file" name="picture" id="picture" class="filehide"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-sm-2 control-label">Prix :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control-static" name="price" placeholder="Prix..."/>
                                                @if($errors->first('price'))
                                                    <div class="alert alert-danger">
                                                        {{$errors->first('price')}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="caracteristique" class="col-sm-2 control-label">Caractéristiques:</label>
                                            <div class="col-sm-10" id="caracteristique">
                                                @foreach($details as $categorydetails)
                                                    <p class="form-control-static"><b>{{$categorydetails->name}}</b></p>
                                                    <input type="text" class="form-control-static" name="caracteristiques[{{$categorydetails->id}}]"/>
                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control-static" name="id_demande" value="{{\Illuminate\Support\Facades\Auth::user()->id}}"/>

                                    </div>
                                    <div class="form-button-add">
                                        <button type="submit" class="btn btn-default">Demander un nouvel équipement</button>
                                        <a href="{{ route('product.index', ['products' => $products]) }}" class="btn btn-default">Retour</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



        </div>
    </div>
@endsection


@section('js')
    <script>


    </script>

@endsection