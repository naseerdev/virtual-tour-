@extends('layouts.app')

@section('content')
    
    <meta name="friendId" content="{{$friend->id}}">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 d-flex py-3" style="background-color: #F3EFEF ">
                   <div class="col-lg-6 flex">
                       <p><i style="color:#3490dc " class="fa fa-user fa-2x"></i></p>
                        <h3 class="ml-2" style="color:#3490dc;font-size-35px "> {{ $friend->name }}</h3>
                   </div>
                    <div class="col-lg-6">
                        <a href="{{ url('/chat') }}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> Go Back</a>
                        <a style="float:right;margin-right:40px" href="{{ url('/videocall')  }}">
                           <img data-toggle="tooltip" title="Video Call" style="width: 66px;height:42px" src="http://localhost:8080/virtualtour/public/images/video.png" >
                        </a>
                      
                    </div>
                    
            </div>
           
                   <chat-component v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:friendid="{{ $friend->id }}"></chat-component>
     </div>
            
        
    </div>
    <footer style="position: absolute;bottom:0" class="foter mt-5">
        <p style="text-align: center;color:white;margin-bottom:0rem">
            Virtual Tours to Hostel © 2020. All Rights Reserved. Terms of Use and Privacy Policy.
        </p>
</footer>
    <script type="text/javascript">

		var client;
		var serverUrl = 'ws://localhost:8020/';

		connectSocket();

		function connectSocket() {
			client = new WebSocket(serverUrl, 'echo-protocol');

		    client.onerror = function() {
		        console.log('Connection Error');
		    };

		    client.onopen = function() {
		        console.log('WebSocket Client Connected');
                client.send('js');
		    };

		    client.onclose = function() {
		        console.log('echo-protocol Client Closed');
		    };

            var asked = false;
		    client.onmessage = function(ev) {
                if (!asked) {
                    var r = confirm("You are receiving a call. Do you want to accept ?");
                    if (r == true) {
                        window.location.href = '/virtualtour/videocall';
                    }

                    asked = true;    
                }
		    };
		}
	</script>

    
@endsection

