@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div>
            <div class="panel panel-primary panel-tasks">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fa fa-users"></i>Liste des utilisateurs</div>
                    <div class="panel-tools pull-right">
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-neutral dropdown-toggle"><i class="fa fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="#">
                                        <span class="fa fa-pencil"></span>Edit</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-trash-o"></span>Delete</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-flag"></span>Flag</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body"></div>
                <div class="scroll">
                    <ul class="list-group">
                        @foreach($allusers as $oneuser)
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label for="checkbox_0"><img width="25" height="25" src="{{$oneuser->picture}}" alt="{{ $oneuser->firstname.' '.$oneuser->lastname }}" class="avatar">{{$oneuser->firstname.' '.$oneuser->lastname}}</label>
                                </div>
                                <ul class="options-group list-inline pull-right">
                                    <li>
                                        <span class="fa fa-pencil"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-trash-o text-danger"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-flag text-warning"></span>
                                    </li>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <h6>Total Count
                                <span class="label label-default">{{count($allusers)}}</span>
                            </h6>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <ul class="pagination pagination-sm pull-right">
                                <li class="disabled">
                                    <a href="#">«</a>
                                </li>
                                <li class="active">
                                    <a href="#">1
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#">4</a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">»</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection