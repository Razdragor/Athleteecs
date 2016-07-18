@extends('layouts.admin')

@section('css')
@endsection

@section('content')
<div class="container" style="margin-top:40px;">
    <div class="row">
        <div class="col-md-6" style="padding:20px;">
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
                    <form class="form-horizontal" method="post" action="{{ route("admin.sport.store") }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Nom</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="existicon" class="col-sm-2 control-label">Icon existants :</label>
                            <div class="col-sm-10">
                                <select id="existicon" class="form-control" name="existicon">
                                        <option value="" selected> Sélectionner un icon...</option>
                                    @foreach($data as $d)
                                        <option value="{{ $d }}">
                                            {{ $d }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Importer un icon</label>
                            <div class="col-sm-10">
                                <input type="file" name="picture" id="picture">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-default">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
@endsection