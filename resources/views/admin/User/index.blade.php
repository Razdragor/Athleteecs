@extends('layouts.admin')


@section('css')
    <link href="{{ asset('asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row" style="padding:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des utilisateurs</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allusers as $oneuser)
                        <tr>
                            <td>{{ $oneuser->id }}</td>
                            <td><img src="{{ asset('images/'.$oneuser->picture) }}" alt="{{ $oneuser->firstname.' '.$oneuser->lastname }}" class="avatar" width="25" height="25"></td>
                            <td>{{ $oneuser->firstname }}</td>
                            <td>{{ $oneuser->lastname }}</td>
                            <td>{{ $oneuser->email }}</td>
                            <td>
                                <a href="{{ route('admin.user.show', ['user' => $oneuser->id]) }}">Consulter</a>
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