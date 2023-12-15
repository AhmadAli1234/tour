
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <!-- Meta setup -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="">
        <meta name="decription" content="">
        <meta name="author" content="Manik-it">

		<!-- Title -->
		<title>LOWXY - Quiz Geolocalisé</title>

		<!-- Fav Icon -->
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
        <script>
  

  // location checker
const options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0,
};

function success(pos) {
  const crd = pos.coords;
  const latitude = crd.latitude;
  const longitude = crd.longitude;

  // Create a new XMLHttpRequest object
  const xhr = new XMLHttpRequest();

  // Set up a GET request to the server
  xhr.open('GET', '/store_location?latitude=' + latitude + '&longitude=' + longitude, true);

  // Define a callback function to handle the response
  xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
          // Successful request, log the response
          console.log(xhr.responseText);
      } else {
          // Error in the request
          console.error('Error setting session variable:', xhr.statusText);
      }
  };

  // Handle network errors
  xhr.onerror = function () {
      console.error('Network error occurred');
  };

  // Send the request
  xhr.send();
}

function error(err) {
  console.warn(`ERROR(${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);

</script>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


        @include('Layout::parts.header2',['header'=>'lowxy'])

        @yield('content')
        
        @include('Layout::parts.footer2')

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{asset('new/js/ziehharmonika.js')}}"></script>
        <!--Bootstrap-js-->
        <script src="{{asset('new/js/bootstrap.bundle.min.js')}}"></script>
        
        <!--Custom-js-->
        <script src="{{asset('new/js/custom.js')}}"></script>
        <!--Scroll-top	-->
        <a href="#" class="scrolltotop"><i class="fa-solid fa-angle-up"></i></a>
    </body>
</html>
