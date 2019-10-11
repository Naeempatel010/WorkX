@extends('layouts.app2')
@section('additional_css')
    <style>
        .panel-body{
            height: 50vh;
            overflow-y: scroll;
        }
        .message{
            padding: 10pt;
            border-radius: 5pt;
            margin: 5pt;
        }
        .owner{
            background-color: #ccd7e0;
            float: right;
        }
        .not_owner{
            background-color: #eaeff2;
            float:left;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            {{($conversation->user1()->first()->id==Auth::user()->id)?$conversation->user2()->first()->fname:$conversation->user1()->first()->fname}}
                        </div>
                    </div>
                </div>
                <div class="panel-body" id="panel-body">
                    @foreach($messages as $message)
                        <div class="row">
                            <div class="message {{ ($message->user_id!=Auth::user()->id)?'not_owner':'owner'}}">
                                {{$message->text}}<br/>
                                <b>{{$message->created_at->diffForHumans()}}</b>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="panel-footer">
                        <textarea id="msg" class="form-control" placeholder="Write your message"></textarea>
                        <input type="hidden" id="csrf_token_input" value="{{csrf_token()}}"/>
                        <br/>
                        <div class="row">
                            <div class="col-md-offset-4 col-md-4">
                                <button class="btn btn-primary btn-block" id="messageSent">Send</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_js')
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    <script type="text/javascript">
        var socket = io.connect('http://127.0.0.1:8890');

        setTimeout(function(){
            window.location.reload(1);
        },3000);
        
        socket.emit('add user', {'client':{{Auth::user()->id}},'conversation':{{$conversation->id}}});

        socket.on('message', function (data) {
            $('#panel-body').append(
                    '<div class="row">'+
                    '<div class="message not_owner">'+
                    data.msg+'<br/>'+
                    '<b>now</b>'+
                    '</div>'+
                    '</div>');

            scrollToEnd();

         });
    </script>
    <script  type="text/javascript">
        $(document).ready(function(){
            console.log('Inside script tag');
            scrollToEnd();

            $(document).keypress(function(e) {
                if(e.which == 13) {
                    var msg = $('#msg').val();
                    $('#msg').val('');//reset
                    send_msg(msg);
                }
            });
        });
        document.getElementById("messageSent").addEventListener('click',button_send_msg);
        /*
        $('#messageSent').on('click',function(){
            var msg = $('#msg').val();
            $('#msg').val('');//reset
            send_msg(msg);
            console.log('button clicked');
        });
        */

        function button_send_msg(){
            var msg = $('#msg').val();
            $('#msg').val('');
            //console.log('message sent')
            //reset
            send_msg(msg);
        }
        

        function send_msg(msg){
            $.ajax({
                headers: { 'X-CSRF-Token' : $('#csrf_token_input').val() },
                type: "POST",
                url: "{{route('message.store')}}",
                data: {
                    'text': msg,
                    'conversation_id':{{$conversation->id}},
                },
                success: function (data) {
                    if(data==true){

                        $('#panel-body').append(
                                '<div class="row">'+
                                '<div class="message owner">'+
                                msg+'<br/>'+
                                '<b>ora</b>'+
                                '</div>'+
                                '</div>');

                        scrollToEnd();
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        function scrollToEnd(){
            var d = $('#panel-body');
            d.scrollTop(d.prop("scrollHeight"));
        }

    </script>
    <!-- <script language="javascript">
        setTimeout(function(){
            window.location.reload(1);
        },30000);
    </script> -->
@endsection
