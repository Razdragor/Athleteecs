@extends('layouts.front')

@section('content')
    <div class="panel panel-default panel-chat">
        <div class="panel-heading">
            <div class="panel-title"><i class="fa fa-comments"></i>Votre discution avec
            </div>
            <div class="panel-tools pull-right">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#">
                                <span class="fa fa-refresh"></span>&nbsp;Refresh</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-check-circle"></span>&nbsp;Available</a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-times-circle"></span>&nbsp;Busy</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <span class="fa fa-sign-out"></span>&nbsp;Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <ul class="scroll">
                <li class="left clearfix">
                    <!-- //Notice .chat-avatar class-->
                          <span class="chat-avatar pull-left">
                            <img src="../../assets/img/avatars/user1_55.jpg" alt="User Avatar" width="55px" height="55px">
                          </span>
                    <!-- //Notice .chat-body class-->
                    <div class="chat-body clearfix">
                        <div class="header"><strong class="primary-font">Yadra Abels</strong>
                            <small class="pull-right text-muted">
                                <span class="fa fa-clock-o">&nbsp;9 mins ago</span>
                            </small>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim modi dolor ut maiores recusandae voluptas quod ea error cupiditate libero.
                        </p>
                    </div>
                </li>
                <li class="right clearfix">
                    <!-- //Notice .chat-avatar class-->
                    <!-- //Notice .pull-right class-->
                          <span class="chat-avatar pull-right">
                            <img src="../../assets/img/avatars/user2_55.jpg" alt="User Avatar" width="55px" height="55px">
                          </span>
                    <!-- //Notice .chat-body class-->
                    <div id="chat_sender1" class="chat-body clearfix">
                        <div class="header">
                            <small class="text-muted">
                                <span class="fa fa-clock-o">&nbsp;8 mins ago</span>
                            </small><strong class="pull-right primary-font">Cesar Mendoza</strong>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, velit, corrupti error sequi hic perspiciatis.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="input-group">
                <input id="btn-input" type="text" placeholder="Type your message here..." class="form-control input-sm">
                        <span class="input-group-btn">
                          <button id="btn-chat" class="btn btn-success btn-sm">Send</button>
                        </span>
            </div>
        </div>
    </div>
@endsection