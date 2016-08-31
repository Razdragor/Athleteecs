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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Liste des catégories</h3>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.category.show', ['category' => $category]) }}">Consulter</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="#" id="addcategory">
                    <span class="fa fa-plus"></span> Ajouter une catégorie</a>
            </div>
        </div>

        <div class="modal fade modal-category" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-category">
                <div class="modal-dialog modal-sm ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4>Ajouter une catégorie</h4>
                        </div>
                        <div class="modal-body">
                            <form id="submit-modal-category" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-12 padding-bottom-correct">
                                    <label for="name" class="col-md-2">Nom de la catégorie</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" placeholder="...">
                                    </div>
                                </div>

                                <div class="form-actions panel-foo">
                                    <button type="submit" class="btn btn-primary pull-right" >Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        <div class="row" style="padding:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Liste des détails disponible</h3>
                </div>
                <div class="panel-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{ $detail->id }}</td>
                                <td>{{ $detail->name }}</td>
                                <td>
                                    <a href="{{ route('admin.detail.delete', ['detail' => $detail]) }}">supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="#" id="adddetail">
                    <span class="fa fa-plus"></span> Ajouter un détail</a>
            </div>
        </div>

        <div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal-detail">
            <div class="modal-dialog modal-sm ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>Ajouter un détail</h4>
                    </div>
                    <div class="modal-body">
                        <form id="submit-modal-detail" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12 padding-bottom-correct">
                                <label for="name" class="col-md-2">Nom du détail</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" placeholder="...">
                                </div>
                            </div>
                            <div class="form-actions panel-foo">
                                <button type="submit" class="btn btn-primary pull-right" >Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script>
        $(function(){
            $('#example').DataTable();
            $('#example2').DataTable();
        });

        $("body").on('click','#adddetail' ,function(e){
            console.log("salut");
            $('#modal-detail').modal('show');
        });
        $("body").on('click','#addcategory' ,function(e){
            $('#modal-category').modal('show');
        });

        $("body").on('submit','#submit-modal-category' ,function(e){
            e.preventDefault();
            var $form = $(this);
            $.ajax({
                url: "/admin/category/addAjax",
                type: 'post',
                contentType: false, // obligatoire pour de l'upload
                processData: false, // obligatoire pour de l'upload
                data: new FormData($("#submit-modal-category")[0]),
                success: function(data) {
                    if(data['success'] == true)
                    {
                        $('#modal-category').modal('hide');

                        $name = data['name'];
                        $id = data['id'];

                        var parent = $('#example tbody:last');

                        parent.append("<tr>"+
                                    "<td>"+$id+"</td>"+
                                    "<td>"+$name+"</td>"+
                                    "<td>"+
                                        "<a href='http://athleteecs/admin/category/"+$id+"'>Consulter</a>"+
                                    "</td>"+
                                    "</tr>");
                    }
                    else
                    {
                        console.log("failed");
                    }
                }
            });
        });
        $("body").on('submit','#submit-modal-detail' ,function(e){
            e.preventDefault();
            var $form = $(this);
            $.ajax({
                url: "/admin/detail/addAjax",
                type: 'post',
                contentType: false, // obligatoire pour de l'upload
                processData: false, // obligatoire pour de l'upload
                data: new FormData($("#submit-modal-detail")[0]),
                success: function(data) {
                    if(data['success'] == true)
                    {
                        $('#modal-detail').modal('hide');

                        $name = data['name'];
                        $id = data['id'];

                        var parent = $('#example2 tbody:last');

                        parent.append("<tr>"+
                                "<td>"+$id+"</td>"+
                                "<td>"+$name+"</td>"+
                                "<td>"+
                                "<a href='http://athleteecs/admin/detail/"+$id+"/delete'>supprimer</a>"+
                                "</td>"+
                                "</tr>");
                    }
                    else
                    {
                        console.log("failed");
                    }
                }
            });
        });




    </script>
@endsection