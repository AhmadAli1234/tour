<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$html_class ?? ''}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php event(new \Modules\Layout\Events\LayoutBeginHead()); @endphp
    @php
        $favicon = setting_item('site_favicon');
    @endphp
    @if($favicon)
        @php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        @endphp
        @if(!empty($file))
            <link rel="icon" type="{{$file['file_type']}}" href="{{asset('uploads/'.$file['file_path'])}}" />
        @else:
            <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}" />
        @endif
    @endif

    @include('Layout::parts.seo-meta')
    <link href="{{ asset('libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('libs/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/custombox/custombox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('dist/frontend/css/notification.css') }}" rel="newest stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver='.config('app.version')) }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}" >
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link href="{{ asset('libs/ion_rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet">

    <!-- lowxy style -->

    <link rel="icon" href="{{asset('new/images/favicon.ico')}}">
    <!--animate-css-->
    <link rel="stylesheet" href="{{asset('new/css/animate.css')}}">
    <!--ziehharmonika-css-->
    <link rel="stylesheet" href="{{asset('new/css/ziehharmsonika.css')}}">
    <!--BOOTSTRAP-CSS-->
    <link rel="stylesheet" href="{{asset('new/css/bootstrap.css')}}">
    <!--SOCIAL-ICON-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!--MIN-STYLESHEET-->
    <link rel="stylesheet" href="{{asset('new/style.css')}}" >
    <!--RESPONSIVE-CSS-->
    <link rel="stylesheet" href="{{asset('new/css/responsive.css')}}" >

    <style>
        input{
            border-radius: 0;
        }
        .modal.show .modal-dialog {
            transform: none;
            margin-top: 5%;
        }
        body{
            font-size:15px;
        }
    </style>


    {!! \App\Helpers\Assets::css() !!}
    {!! \App\Helpers\Assets::js() !!}
    <script>
        var myTravel = {
            url:'{{url( app_get_locale() )}}',
            url_root:'{{ url('') }}',
            booking_decimals:{{(int)get_current_currency('currency_no_decimal',2)}},
            thousand_separator:'{{get_current_currency('currency_thousand')}}',
            decimal_separator:'{{get_current_currency('currency_decimal')}}',
            currency_position:'{{get_current_currency('currency_format')}}',
            currency_symbol:'{{currency_symbol()}}',
			currency_rate:'{{get_current_currency('rate',1)}}',
            date_format:'{{get_moment_date_format()}}',
            map_provider:'{{setting_item('map_provider')}}',
            map_gmap_key:'{{setting_item('map_gmap_key')}}',
            routes:{
                login:'{{route('auth.login')}}',
                register:'{{route('auth.register')}}',
                checkout:'{{is_api() ? route('api.booking.doCheckout') : route('booking.doCheckout')}}'
            },
            module:{
                hotel:'{{route('hotel.search')}}',
                car:'{{route('car.search')}}',
                tour:'{{route('tour.search')}}',
                space:'{{route('space.search')}}',
                flight:"{{route('flight.search')}}"
            },
            currentUser: {{(int)Auth::id()}},
            isAdmin : {{is_admin() ? 1 : 0}},
            rtl: {{ setting_item_with_lang('enable_rtl') ? "1" : "0" }},
            markAsRead:'{{route('core.notification.markAsRead')}}',
            markAllAsRead:'{{route('core.notification.markAllAsRead')}}',
            loadNotify : '{{route('core.notification.loadNotify')}}',
            pusher_api_key : '{{setting_item("pusher_api_key")}}',
            pusher_cluster : '{{setting_item("pusher_cluster")}}',
        };
        var i18n = {
            warning:"{{__("Warning")}}",
            success:"{{__("Success")}}",
        };
        var daterangepickerLocale = {
            "applyLabel": "{{__('Apply')}}",
            "cancelLabel": "{{__('Cancel')}}",
            "fromLabel": "{{__('From')}}",
            "toLabel": "{{__('To')}}",
            "customRangeLabel": "{{__('Custom')}}",
            "weekLabel": "{{__('W')}}",
            "first_day_of_week": {{ setting_item("site_first_day_of_the_weekin_calendar","1") }},
            "daysOfWeek": [
                "{{__('Su')}}",
                "{{__('Mo')}}",
                "{{__('Tu')}}",
                "{{__('We')}}",
                "{{__('Th')}}",
                "{{__('Fr')}}",
                "{{__('Sa')}}"
            ],
            "monthNames": [
                "{{__('January')}}",
                "{{__('February')}}",
                "{{__('March')}}",
                "{{__('April')}}",
                "{{__('May')}}",
                "{{__('June')}}",
                "{{__('July')}}",
                "{{__('August')}}",
                "{{__('September')}}",
                "{{__('October')}}",
                "{{__('November')}}",
                "{{__('December')}}"
            ],
        };
    </script>
    <!-- Styles -->
    @yield('head')
    {{--Custom Style--}}
    <link href="{{ route('core.style.customCss') }}" rel="stylesheet">
    <link href="{{ asset('libs/carousel-2/owl.carousel.css') }}" rel="stylesheet">
    @if(setting_item_with_lang('enable_rtl'))
        <link href="{{ asset('dist/frontend/css/rtl.css') }}" rel="stylesheet">
    @endif
    {!! setting_item('head_scripts') !!}
    {!! setting_item_with_lang_raw('head_scripts') !!}

    @php event(new \Modules\Layout\Events\LayoutEndHead()); @endphp

</head>
<body class="frontend-page {{$body_class ?? ''}} @if(!empty($is_home) or !empty($header_transparent)) header_transparent @endif @if(setting_item_with_lang('enable_rtl')) is-rtl @endif @if(is_api()) is_api @endif">
    @php event(new \Modules\Layout\Events\LayoutBeginBody()); @endphp

    {!! setting_item('body_scripts') !!}
    {!! setting_item_with_lang_raw('body_scripts') !!}
    <div class="bravo_wrap">
        @if(!is_api())
            @include('Layout::parts.header2',['header'=>'tour'])
        @endif

        @yield('content')

        @include('Layout::parts.footer2')
    </div>

    @include('Layout::parts.login-register-modal')
    @include('Layout::parts.chat')
    @if(Auth::id())
        @include('Media::browser')
    @endif
<link rel="stylesheet" href="{{asset('libs/flags/css/flag-icon.min.css')}}">

{!! \App\Helpers\Assets::css(true) !!}

{{--Lazy Load--}}
<script src="{{asset('libs/lazy-load/intersection-observer.js')}}"></script>
<script async src="{{asset('libs/lazy-load/lazyload.min.js')}}"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);
</script>
<script src="{{ asset('libs/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('libs/jquery-migrate/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('libs/header.js') }}"></script>
<script>
    $(document).on('ready', function () {
        $.MyTravelHeader.init($('#header'));
    });
</script>
<script src="{{ asset('libs/lodash.min.js') }}"></script>
<script src="{{ asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>

<script src="{{ asset('libs/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('libs/slick/slick.js') }}"></script>


@if(Auth::id())
	<script src="{{ asset('module/media/js/browser.js?_ver='.config('app.version')) }}"></script>
@endif
<script src="{{ asset('libs/carousel-2/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>
<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/functions.js?_ver='.config('app.version')) }}"></script>
<script src="{{asset('libs/custombox/custombox.min.js')}}"></script>
<script src="{{asset('libs/custombox/custombox.legacy.min.js')}}"></script>
<script src="{{ asset('libs/custombox/window.modal.js') }}"></script>

@if(
    setting_item('tour_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('car_location_search_style')=='autocompletePlace' || setting_item('space_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('event_location_search_style')=='autocompletePlace'
)
	{!! App\Helpers\MapEngine::scripts() !!}
@endif
<script src="{{ asset('libs/pusher.min.js') }}"></script>
<script src="{{ asset('js/home.js?_ver='.config('app.version')) }}"></script>

@if(!empty($is_user_page))
	<script src="{{ asset('module/user/js/user.js?_ver='.config('app.version')) }}"></script>
@endif
@if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api()  and !isset($_COOKIE['booking_cookie_agreement_enable']))
	<div class="booking_cookie_agreement p-3 fixed-bottom">
		<div class="container d-flex ">
            <div class="content-cookie">{!! setting_item_with_lang('cookie_agreement_content') !!}</div>
            <button class="btn save-cookie">{!! setting_item_with_lang('cookie_agreement_button_text') !!}</button>
        </div>
	</div>
	<script>
        var save_cookie_url = '{{route('core.cookie.check')}}';
	</script>
	<script src="{{ asset('js/cookie.js?_ver='.config('app.version')) }}"></script>
@endif

{!! \App\Helpers\Assets::js(true) !!}

@yield('footer')

@php \App\Helpers\ReCaptchaEngine::scripts() @endphp
    {!! setting_item('footer_scripts') !!}
    {!! setting_item_with_lang_raw('footer_scripts') !!}
    @php event(new \Modules\Layout\Events\LayoutEndBody()); @endphp
    @include('demo_script')

    <!-- lowxy script -->
    <!--Main-jquery-->
    <script src="{{asset('new/js/jquery-3.4.1.min.js')}}"></script>
        <!--wow jQuery animated  -->
        <script src="{{asset('new/js/wow.min.js')}}"></script>
        <script>
            new WOW().init();
        </script>
        <script>
            $(document).ready(function() {
                $( window ).scroll(function() {
                    var height = $(window).scrollTop();
                    if(height >= 1) {
                        $('.customss ').addClass('fixed-menu');
                    } else {
                        $('.customss ').removeClass('fixed-menu');
                    }
                });
            });
            function logout()
            {
                $.ajax({
                    url : 'logout.php',
                    type : 'POST',
                  });
                location.reload();
            }
        </script>
        <!-- Accordian Script -->
        <script src="{{asset('new/js/ziehharmonika.js')}}"></script>
        <!--Bootstrap-js-->
        <script src="{{asset('new/js/bootstrap.bundle.min.js')}}"></script>
        <!--Custom-js-->
        <script src="{{asset('new/js/custom.js')}}"></script>
        <!--Scroll-top	-->
        <a href="#" class="scrolltotop"><i class="fa-solid fa-angle-up"></i></a>
</body>
</html>
