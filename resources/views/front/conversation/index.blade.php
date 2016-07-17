@extends('layouts.front')

@section('content')

    <div class="row">
        <div class="panel panel-default col-xs-3 col-xs-offset-1">
                @if(isset($friend->id))
                    <div class="conversation_div">
                        <form class="conversation_chat_show">
                                <div class="row">                                  
                                    <div class="col-xs-4">
                                        <img class="chat-avatar" src="{{ asset('images/'.$friend->picture) }}">
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="hidden" name="conv_id" value="{{$conv->id}}">
                                        <p>
                                            {{$conv->name}}<br>
                                            @if($conv->conversation_messages->last())
                                                Dernier message :{{ $conv->conversation_messages->last()->message }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                        </form>
                    </div>
                @endif
                @foreach($user->conversations_reverse as $conversation)
                    @if(!(isset($conv->id) && $conversation->conversation->id == $conv->id))
                    <div class="conversation_div">
                        <form class="conversation_chat_show">
                                <div class="row">
                                    <div class="col-xs-4">
                                        @foreach($conversation->conversation->conversation_users as $conv_user)
                                            @if($conv_user->user->id != $user->id)
                                                <img class="chat-avatar" src="{{ asset('images/'.$conv_user->user->picture) }}">
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="hidden" name="conv_id" value="{{$conversation->conversation->id}}">
                                        <p>
                                            {{$conversation->conversation->name}}<br>
                                            @if($conversation->conversation->conversation_messages->last())
                                                Dernier message :{{ $conversation->conversation->conversation_messages->last()->message }}
                                            @endif
                                        </p>
                                    </div>

                                </div>
                        </form>
                    </div>
                    @endif
                @endforeach

        </div>




        <div class="panel panel-default col-xs-7 panel-conv no_padding">
            <div class="panel-heading">
                    <div class="panel-title">
                        <i class="fa fa-comments"></i>
                        @if(isset($conv->id))
                        {{ $conv->name }}
                        @else
                        {{ $user->conversations_reverse->first()->conversation->name }}
                        @endif
                    </div>
            </div>
            <div class="panel-body">
                <ul class="conv_users-list">
                    <form class="first_load">
                        @if(isset($conv->id))
                        <input type="hidden" name="conv_id" value="{{$conv->id}}">
                        @else
                        <input type="hidden" name="conv_id" value="{{$user->conversations_reverse->first()->conversation->id}}">
                        @endif
                    </form>
                </ul>
            </div>
            <div class="panel-footer">
                <form action="sendmessage" method="POST" class="chat_send_message">
                    <div class="input-group"><input type="hidden" name="conversation_id" value="{{$user->conversations_reverse->first()->conversation->id}}"><input id="btn-input" name="message" type="text" placeholder="Ecrivez un message..." class="form-control input-sm"><span class="input-group-btn"><input type="submit" value="Envoyer" class="btn btn-success btn-sm"></span></div></form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    create_or_show_chat($('.first_load'),"{{ route('show_conversation') }}",1);
    
    $('body').on('click','.conversation_div',function(){
        var conv_id = $(this).find('input').val();
        $(document).find('.panel-conv .first_load input[name="conv_id"]').attr('value',conv_id);
        $('.panel-conv .tchat-box').remove();
        console.log($('first_load'));
        create_or_show_chat($('.first_load'),"{{ route('show_conversation') }}",1);
        var conv_name = $('.panel-conv .head-tchat-left').html();
        $('.panel-conv .panel-title').html('<i class="fa fa-comments"></i>'+conv_name);
        $('.panel-conv .panel-footer input[name="conversation_id"]').attr('value',conv_id);
    });
</script>
@stop