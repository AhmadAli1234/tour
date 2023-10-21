@extends('layouts.app2')

@section('content')

<style>
    .ui.dropdown {
        max-width: 400px;
    }

    .submit {

        font-weight: 500;
        font-size: 16px;
        color: #FFFFFF;
        background: #8683FF;
        box-shadow: 0px 4px 16px rgba(0, 0, 40, 0.4);
        border-radius: 10px;
        display: inline-block;
        padding: 12px 52px 12px 14px;
        background-image: url('new/images/wt-arrorw.png');
        background-repeat: no-repeat;
        background-position: 93% 50%;
        transition: .2s;
        width: 260px;
    }

    body {
        margin: 2rem;
    }

    .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);
    z-index: 1;
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

.container iframe {
    width: 400px;
    height: 300px;
}
.modal-content iframe{
    width:800px;
    height: 400px;
}

</style>
<center>
    <div class="container">
        <br><br>
        <!-- Button trigger modal -->
        <div class="container">

           
            <br><br>
            @isset($ads)
            @foreach($ads as $row)
                @if($row->website_url)
                    <a target="blank" href="{{$row->website_url}}">click here to open website <br>{{$row->website_url}}</a>
                @elseif($row->advertisement)
                <div id="openModal">
                    {!! $row->advertisement !!}
                </div>
                @else

                @php
                $extension = pathinfo($row->video, PATHINFO_EXTENSION);
                @endphp
                <video width="300" height="150" controls>
                    <source src="{{asset($row->video)}}" type="video/{{$extension}}">
                </video>
                @endif
                <br><br>
            @endforeach
            @endisset

            <!-- Modal -->
        
    </div>
    <div id="videoModal" class="modal" style="z-index: 150000000000;">
        <div class="modal-content">
            <span class="close" id="closeButton">&times;</span>
            <iframe id="videoFrame" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    
</center>

<script>

document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("videoModal");
    var openButton = document.getElementById("openModal");
    var closeButton = document.getElementById("closeButton");
    var videoFrame = document.getElementById("videoFrame");
    var isModalClosable = false;

    openButton.addEventListener("click", function() {
        modal.style.display = "block";
        var videoID = "uuCFRaFWjwY"; // Replace with your YouTube video ID
        videoFrame.src = "https://www.youtube.com/embed/" + videoID +'?autoplay=1';

        // Allow modal to be closed after 60 seconds
        setTimeout(function() {
            isModalClosable = true;
            closeButton.style.display = "block"; // Show the close button
        }, 60000);
    });

    closeButton.addEventListener("click", function() {
        if (isModalClosable) {
            modal.style.display = "none";
            videoFrame.src = "";
        }
    });

    modal.addEventListener("click", function(event) {
        if (event.target === modal && !isModalClosable) {
            // Prevent modal from being closed when clicking outside
            return false;
        }
    });
});
    $(document).ready(function () {
        // Gets the video src from the data-src on each button
        var $videoSrc;
        $('.video-btn').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        // when the modal is opened autoplay it  
        $('#myModal').on('shown.bs.modal', function (e) {

            // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");

        })

        // stop playing the youtube video when I close the modal
        $('#myModal').on('hide.bs.modal', function (e) {
            // a poor man's stop video
            $("#video").attr('src', $videoSrc);
        })
    });

</script>
@endsection
