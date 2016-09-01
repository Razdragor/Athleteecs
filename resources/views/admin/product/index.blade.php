@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
    <style>
        .fixed-panel {
            min-height: 290px;
            max-height: 290px;
            overflow-y: scroll;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div class="row" style="padding:20px;">
            <div class="text-right" style="margin-bottom: 10px;">
                <a href="{{ route('admin.product.create') }}" class="btn btn-default">Ajouter un produit</a>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Liste des produits</h3>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Marque</th>
                            <th>Catégorie</th>
                            <th>Sport</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset($product->picture) }}" alt="{{ $product->name }}" class="avatar" width="25" height="25"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand->name}}</td>
                                <td>{{ $product->category->name}}</td>
                                <td>{{ $product->sport->name }}</td>


                                <td>
                                    <a href="{{ route('admin.product.show', ['product' => $product]) }}">Consulter</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Demandes de produits</h3>
                    </div>
                    <div class="panel-body">
                        <table id="example2" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Marque</th>
                                <th>Catégorie</th>
                                <th>Sport</th>
                                <th>Utilisateur</th>
                                <th>Actions</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><img src="{{ asset($product->picture) }}" alt="{{ $product->name }}" class="avatar" width="25" height="25"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand->name}}</td>
                                    <td>{{ $product->category->name}}</td>
                                    <td>{{ $product->sport->name }}</td>
                                    @if(!empty($product->userdemand))
                                        <td><a href="{{ route('admin.user.show',['user'=> $product->userdemand]) }}">{{ $product->userdemand->email }}</a></td>
                                    @else
                                        <td>Administrateur</td>

                                    @endif
                                    <td>
                                        <a href="{{ route('admin.product.show', ['product' => $product]) }}">Consulter</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
            $('#example2').DataTable();
        });
    </script>
@endsection