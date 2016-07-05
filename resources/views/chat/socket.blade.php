@extends('layouts.front')
 
@section('content')
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
 
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
              <div id="messages" >azerty</div>
            </div>
        </div>
    </div>
    <script>
        var socket = io.connect('http://localhost:8890');
        socket.on('message', function (data) {
            $( "#messages" ).append( "<p>"+data+"</p>" );
          });
    </script>
 
 
@endsection