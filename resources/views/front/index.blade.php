@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div style="padding:50px;">
                    <div style="background-color: #0088cc;padding:5px;">
                        <div style="height: 25px;">Poster un message</div>
                        <div>
                            <form method="post" action="">
                                {{ csrf_field() }}
                                <input type="text" name="status" style="width: 100%;">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">ok</div>
        </div>
    </div>
@endsection
