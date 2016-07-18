@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row padding margin-top-admin">
            <div class="text-right" style="margin-bottom: 10px;">
                <a href="{{ route('admin.newsletter.create') }}" class="btn btn-default">Créer une newsletter</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Liste des publications</h3>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Objet</th>
                            <th>Message</th>
                            <th>Création</th>
                            <th>Modification</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newsletters as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td>{{ $news->objet }}</td>
                                <td>
                                    {{ $news->text }}
                                </td>
                                <td>{{ $news->created_at }}</td>
                                <td>{{ $news->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.newsletter.show', ['newsletter' => $news->id]) }}">Consulter</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
        });
    </script>
@endsection