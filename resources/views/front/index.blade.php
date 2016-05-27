@extends('layouts.app')

@section('content')
    <style>
        .image-upload > input
        {
            display: none;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div style="padding:50px;">
                    <div style="background-color: #fff;border-radius: 3px;">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <div style="padding:7px;">
                                <textarea name="status" style="border:none;width: 100%;resize: none;" rows="3"></textarea>
                            </div>
                            <div style="background-color:green;height: 40px;position: relative;" >
                                <div class="image-upload">
                                    <label for="file-input">
                                        <i class="fa fa-camera fa-3" style="color:#000;" aria-hidden="true"></i>
                                    </label>
                                    <input id="file-input" type="file"/>
                                </div>
                                <input type="submit" value="Poster" class="btn" style="right: 5px;bottom:5px;position: absolute;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4"></div>
        </div>
    </div>
@endsection
