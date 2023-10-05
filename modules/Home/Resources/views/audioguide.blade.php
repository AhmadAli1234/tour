@extends('layouts.app2')

@section('content')


<link rel="stylesheet"  href="{{ asset('new/audioguide.css') }}">
<style>
    .flag-area {
        padding-bottom: 20px;
    }
    .map-select{
        background-image: none;
        width:10%;
        padding: 0;
        margin: 0;
    }
</style>

@include('home::partials.home.offcanvas')

@include('home::partials.audioguide.hero')

@include('home::partials.audioguide.voyage')

@include('home::partials.audioguide.villes')

<div class="row">
    <div class="col-md-12 text-center">
            <h3><b>where are you ?</b></h3>
    </div>
</div>

@include('home::partials.home.flag')

<div class="row">
    <div class="col-md-12 text-center" style="margin:20px">
            <h3><b>Select your
                <span>
                    <select class="map-select">
                        <option>chinese</option>
                    </select>
                </span>
            audioguide</b></h3>
    </div>
</div>

@include('home::partials.audioguide.map')

@include('home::partials.audioguide.offers')

@include('home::partials.audioguide.price')

@include('home::partials.audioguide.envie')

<script>
    new WOW().init();

</script>
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            var height = $(window).scrollTop();
            if (height >= 1) {
                $('.customss2 ').addClass('fixed-menu2');
            } else {
                $('.customss2 ').removeClass('fixed-menu2');
            }
        });
    });


    function inscription_2() {
        let acc_type = $('#acc_type:checked').val();
        let email = $('#email').val();
        $.ajax({
            url: 'inscription_2.php',
            type: 'POST',
            data: ({
                acc_type: acc_type,
                email: email
            }),
            success: function (html) {
                $('#inscription_2').html(html);
                document.getElementById("inscription_1").style =
                    "visibility: hidden; opacity: 0; height:0; transition: all 0.5s";
                document.getElementById("inscription_2").style =
                    "visibility: visible; opacity: 100; transition: all 0.5s";
            }
        });
    }

</script>

@endsection
