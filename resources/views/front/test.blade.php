@extends('front.layouts.app')

@section('content')
    <p id="power">0</p>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    <script>
        var socket = io('http://localhost:3000');
        // var socket = io('http://192.168.10.10:3000');
        socket.on("test-channel:App\\Events\\Message", function(message){
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@endsection
