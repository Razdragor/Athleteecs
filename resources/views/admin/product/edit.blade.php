@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="margin-top:40px;">
        <div class="row">
            <div class="col-md-12 padding" >
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
                    </div>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('admin.product.update',['product' => $product]) }}">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Nom :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-static" name="name" value="{{ $product->name }}">
                                @if($errors->first('name'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="active">Status :</label>
                            <div class="col-sm-10">
                                <select name="active" class="form-control">
                                    <option value="0" @if($product->active == 0) selected="selected" @endif>Non validé</option>
                                    <option value="1" @if($product->active == 1) selected="selected" @endif>Validé</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="brand">Marque :</label>
                            <div class="col-sm-10">
                                <select name="brand" class="form-control">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" @if($brand->name == $product->brand->name) selected="selected" @endif>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="sport">Sport :</label>
                            <div class="col-sm-10">
                                <select name="sport" class="form-control">
                                    @foreach($sports as $sport)
                                        <option value="{{ $sport->id }}" @if($sport->name == $product->sport->name) selected="selected" @endif>{{$sport->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="category">Categorie :</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->name == $product->category->name) selected="selected" @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="existicon" class="col-sm-2 control-label">Image :</label>
                            <div class="col-sm-10">
                                <img src="{{ asset($product->picture) }}" alt="{{ $product->name }}" class="img-responsive" width="45px" height="45px">
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
                                    <input type="text" class="form-control-static" name="price" value="{{ $product->price }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-static" name="description" value="{{ $product->description }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="url" class="col-sm-2 control-label">Url :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control-static" name="url" value="{{ $product->url }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="caracteristique" class="col-sm-2 control-label">Caractéristiques:</label>
                                <div class="col-sm-10">
                                    @foreach($product->category->details as $categorydetails)
                                        <p class="form-control-static"><b>{{$categorydetails->name}}</b></p>
                                        <input type="text" class="form-control-static" name="caracteristiques[{{$categorydetails->id}}]" value="@foreach($product->caracteristiques as $caracteristique)@if($categorydetails->name == $caracteristique->detail->name){{ $caracteristique->value }}@endif @endforeach"/>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Modifier</button>
                        <a href="{{ route('admin.product.show', ['product' => $product]) }}" class="btn btn-default">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
@endsection