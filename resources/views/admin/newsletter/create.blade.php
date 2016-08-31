@extends('layouts.admin')


@section('css')
    <script src="{{ asset('asset/js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({
            selector: 'textarea',
            height: 500,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: [
                '//www.tinymce.com/css/codepen.min.css'
            ]
                });</script>
@endsection

@section('content')
<div class="container">
    <div class="row padding margin-top-admin">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Newsletter</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="{{ route("admin.newsletter.store") }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group padding">
                        <label class="col-sm-2 control-label" for="sport_id">Sports Concernés</label>
                        <div class="col-sm-10">
                            <select name="sport_id" class="form-control">
                                <option value="0" selected="selected">Tous les sports</option>
                            @foreach($sports as $sport)
                                    <option value="{{$sport->id}}">{{$sport->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group padding">
                        <label class="col-sm-2 control-label" for="name">Objet</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="form-group padding">
                        <label class="col-sm-2 control-label" for="text">Message</label>
                        <div class="col-sm-10">
                            <textarea class="textarea" name="text" placeholder="Enter text ..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;"></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-actions padding">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-default">Créer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('asset/js/jquery/jquery.js') }}"></script>
@endsection