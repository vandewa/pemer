<!DOCTYPE html>
<html>

<head>
    <title>Video Player</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            gap: 10px;
            justify-content: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .video-container {
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
            background-color: #000;
        }

        #playButton {
            width: 680px;
            height: 400px;
            padding: 8px;
            background-color: red;
            color: #fff;
            font-size: 124px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            animation: pulseBackground 2s infinite;
            border-radius: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <button id="playButton">Open</button>
    </div>
    <div class="video-container">
        <video id="videoPlayer" width="100%" height="100%" controls>
            <source src="{{ asset('video/vd.mp4') }}" type="video/mp4">
            <!-- Add additional video sources for different formats here if needed -->
            Your browser does not support the video tag.
        </video>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const videoPlayer = document.getElementById("videoPlayer");
            const playButton = document.getElementById("playButton");
            const videoContainer = document.querySelector(".video-container");

            playButton.addEventListener("click", function() {
                playButton.style.visibility = "hidden";
                videoContainer.style.display = "block"; // Show the video container
                playButton.disabled = true;
                videoPlayer.play();
            });

            videoPlayer.addEventListener("ended", function() {
                // Redirect to another page after the video ends
                window.location.href = "https://asiksobo.wonosobokab.go.id";
            });
        });
    </script>
</body>

</html>
