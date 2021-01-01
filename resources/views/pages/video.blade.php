<head>
<link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('public/js/jquery.min.js') }}" ></script>  
</head>
	<div class="video-window">
        <img src="" id="frame" width="320" height="240">
    </div>
    <h6 id="errorMsgElement"></h6>

	<!-- Stream video via webcam -->
    <div class="video-wrap" style="display: none;">
        <video id="video" playsinline autoplay></video>
    </div>

    <!-- Webcam video snapshot -->
    <canvas style="display: none;" id="canvas" width="320" height="240"></canvas>

    <button  class="btn btn-danger end-call" onclick="endCall()">End Call</button>


    <script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
		const video = document.getElementById('video');
		const canvas = document.getElementById('canvas');

		var client;
		var captureInterval;
		var img = document.getElementById("frame");
		var errorMsgElement = document.getElementById("errorMsgElement");

		var serverUrl = 'ws://localhost:8020/';

		const constraints = {
		    audio: false,
		    video: {
		    	width: 320, height: 240
		    }
		};

        init();
		connectSocket();

        function endCall() {
            client.send('stop');
        }

		async function init() {
			try {
		        var stream = await navigator.mediaDevices.getUserMedia(constraints);
		        handleSuccess(stream);
		    } 
		    catch (e) {
		        console.log(`navigator.getUserMedia error:${e.toString()}`);
		    }
		}

		function connectSocket() {
			client = new WebSocket(serverUrl, 'echo-protocol');

		    client.onerror = function() {
		        console.log('Connection Error');
		    };

		    client.onopen = function() {
		        console.log('WebSocket Client Connected');
		        captureInterval = setInterval(capture, 200);
		    };

		    client.onclose = function() {
		        console.log('echo-protocol Client Closed');
                window.location.href = '/virtualtour/chat';
		    };

		    client.onmessage = function(ev) {
		        if (typeof ev.data === 'string') {
		            
		        }
		        else {
		            var reader = new FileReader();
		            var arrayBufferView = ev.data;
		            var blob = new Blob( [ arrayBufferView ], { type: "image/jpeg" } );
		            var urlCreator = window.URL || window.webkitURL;
		            var imageUrl = urlCreator.createObjectURL( blob );
		            img.src = imageUrl;
		        }
		    };
		}

		// Success
		function handleSuccess(stream) {
		    window.stream = stream;
		    video.srcObject = stream;
		}

		function stopStreamedVideo(videoElem) {
		    let stream = videoElem.srcObject;
		    let tracks = stream.getTracks();
		  
		    tracks.forEach(function(track) {
		      track.stop();
		    });
		  
		    videoElem.srcObject = null;
		}

		// Draw image
		var context = canvas.getContext('2d');

		const mimeType = 'image/jpeg';
		function capture() {
		    context.drawImage(video, 0, 0, 320, 240);

		    if(client != undefined) {
		        canvas.toBlob((blob) => {
		            const reader = new FileReader();
		            reader.addEventListener('loadend', () => {
		                const arrayBuffer = reader.result;
		                client.binaryType = "arraybuffer";
		                client.send(arrayBuffer);
		            });
		        	reader.readAsArrayBuffer(blob);
		        }, mimeType);
		    }
		}

        $( document ).ready(function() {
            $('#frame').css('width','100%');
            $('#frame').css('height','100%');
        });
	</script>