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
        <br>
        <!-- Button trigger modal -->
        <div class="container">
            <br><br>
            @isset($ads)
            @foreach($ads as $row)
                @if($row->website_url)
                    <a href="javascript:;"  style="position:relative"><div style="background-image: url('{{asset('new/images/video.jpg')}}'); width:400px; height:300px; background-repeat: round;"><h4 style=" color:white;padding-top: 32%;" onclick="openModal('{{$row->website_url}}','website')">Click to open Website</h4></div></a>
                @elseif($row->advertisement)
                @php
                $html = $row->advertisement;

                    if (preg_match('/<iframe[^>]*src=["\']([^"\']+)["\'][^>]*>/', $html, $matches)) {
                        $src = $matches[1];
                    }
                @endphp
                <div style="background-image: url('{{asset('new/images/website.jpg')}}'); width:400px; height:300px; background-repeat: round;" onclick="openModal('{{$src}}','video')"><h4 style=" color:white;padding-top: 32%;">Click to Play</h4></div>
                @else
                <div style="background-image: url('{{asset('new/images/website.jpg')}}'); width:400px; height:300px; background-repeat: round;" onclick="openModal('{{asset($row->video)}}','video')"><h4 style=" color:white;padding-top: 32%;">Click to Play</h4></div>

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
            <a href="" target="__blank" class="d-none" id="action_btn"><button class="btn btn-info" style="float: center;">Call to Action</button></a>
        </div>
        
    </div>

    
</center>


<div class="d-none row" id="next">
    <div class="col-md-12">
       <a href="{{url('/quiz')}}"> <button type="button" class="btn btn-success" style="float: right;">Next</button></a>
    </div>
    <br> <br>
</div>

<script src="{{asset('new/js/jquery-3.4.1.min.js')}}"></script>
<script>

document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("videoModal");
    var openButton = document.getElementById("openModal");
    var closeButton = document.getElementById("closeButton");
    var videoFrame = document.getElementById("videoFrame");
    var isModalClosable = false;

    modal.addEventListener("click", function(event) {
        if (event.target === modal && !isModalClosable) {
            // Prevent modal from being closed when clicking outside
            return false;
        }
    });
});
var modal = document.getElementById("videoModal");
    var openButton = document.getElementById("openModal");
    var closeButton = document.getElementById("closeButton");
    var nextButton = document.getElementById("next");
    var videoFrame = document.getElementById("videoFrame");
    var isModalClosable = false;

function openModal(videoSrc,type) {
    if($('#action_btn').hasClass('d-none')){}
    else{
        $('#action_btn').addClass('d-none')
    }
        modal.style.display = "block";
        videoFrame.src = videoSrc +'?autoplay=1';

        // Allow modal to be closed after 60 seconds
        setTimeout(function() {
            isModalClosable = true;
            $('#next').removeClass('d-none');// Show the close button
            if(type=='website'){
                $('#action_btn').removeClass('d-none');
            }
            $('#action_btn').attr('href',videoSrc);
        }, 5000);
    };

    $(document).on("click",'#closeButton', function() {
        if (isModalClosable) {
            modal.style.display = "none";
            videoFrame.src = "";
        }
    });

</script>
@endsection
