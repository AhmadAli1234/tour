
<!DOCTYPE html>
<html lang="en-US">
    <head>
      <meta charset="UTF-8">

<!--
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5606616518948240" crossorigin="anonymous"></script>

-->
      <!-- Meta setup -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="keywords" content="">
      <meta name="decription" content="">
      <meta name="author" content="Manik-it">

      <!-- Title -->
      <title>LOWXY - Quiz Geolocalisé</title>

      <!-- Fav Icon -->
      <link rel="icon" href="images/favicon.ico">
        <!--animate-css-->
        <link rel="stylesheet" href="css/animate.css">
        <!--ziehharmonika-css-->
        <link rel="stylesheet" href="css/ziehharmsonika.css">
        <!--BOOTSTRAP-CSS-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!--SOCIAL-ICON-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!--MIN-STYLESHEET-->
        <link rel="stylesheet" href="audioguide.css" >
        <!--RESPONSIVE-CSS-->
        <link rel="stylesheet" href="css/audio-responsive.css" >

    </head>
    <body style="width: 99%">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


        <!-- header-area-start -->
        <header class="header-area2">
            <div class="customss2">
                <div class="container">
                    <nav>
                        <div class="logo"><img src="images/logo.png" class="img-fluid" alt=""></div>
                        <div class="menu-item">
                            <ul>
                                <li><a href="index.php" class="logos"><img src="images/logo.png" class="img-fluid" alt=""></a></li>
                                <li><a href="quizz.php">Quiz Geolocalisé</a></li>
                                <li><a href="audioguide.php">Audioguides Géolocalisé</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">A propos de  la startup</a></li>
                            </ul>
                        </div>
                        <div class="menu-btn">
                            <ul>
                                                                        <li><a href="login.php">Connexion</a></li>
                                        <li><a href="register.php">Inscription</a></li>
                                                                </ul>
                        </div>
                        <div class="hamburger">
                            <a   data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-sharp fa-solid fa-bars-staggered"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- header-area2-end -->

        <!-- offcanvas-start -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <span class="offcanvas-title" id="offcanvasRightLabel"><img src="images/logo.png" class="img-fluid" alt=""></span>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="mobile-menu-item">
                    <ul>
                        <li><a href="quizz.php">Quiz Geolocalisé</a></li>
                        <li><a href="audioguide.php">Audioguides Géolocalisé</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">A propos de  la startup</a></li>
                    </ul>
                </div>
                <div class="mobile-menu-btn">
                    <ul>
                                                        <li><a href="login.php">Connexion</a></li>
                                <li><a href="register.php">Inscription</a></li>
                                                </ul>
                </div>
            </div>
        </div>
                <input id="user" value="Guest" hidden>



		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="pin/jquery.pinlogin.min.js"></script>

		<link href="pin/jquery.pinlogin.css" rel="stylesheet" type="text/css" />


		<section class="evviede-venir-area" id="quest_section" style="visibility: visible; opacity:1">
            <div class="container">
                <div class="evviede-venir-wrapper-area wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="evviede-venir-title" id="quizz">
                                <h2>
                                    Avant de commencer </h2>
                                    <h2><span>Entrer le matricule de Taxi</span>
                                </h2>
                                <p><div id="loginpin"></div></p>
                                <a onclick="interest()">Je n'ai pas de code</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </center>
        <input id="ad_interest" value="0" hidden>
</center>

<input id="qst_1" value="12" hidden><input id="rep_1" value="" placeholder="rep_1" hidden><input id="qst_2" value="3" hidden><input id="rep_2" value="" placeholder="rep_2" hidden><input id="qst_3" value="9" hidden><input id="rep_3" value="" placeholder="rep_3" hidden>		<script type="text/javascript">
			$(function(){

				var loginpin = $('#loginpin').pinlogin({
					fields : 5,

					complete : function(pin){

							 $.ajax({
							    url : 'taxi_serial.php',
							    type : 'POST',
							    data : ({pin:pin}),
							    success: function(html)
							    {
							    	if(html==1)
							    	{
							    		var step = 1;
							    		interest();
							    	} else {
							    		loginpin.reset();
							    	}
							    }
							  });
					},

				});

			});


            function interest()
            {
                document.getElementById("quizz").style="opacity: 0; transition: all 0.5s";
                $.ajax({
                        url : 'interests.php',
                        type : 'POST',
                        success: function(html)
                        {
                            setTimeout(() => {
                            $('#quizz').html(html);
                                 document.getElementById("quizz").style="opacity: 1; transition: all 0.5s";
                             }, 500);
                        }
                      });
            }

            function question(step)
            {

                let qst = $('#qst_'+step+'').val();


                if(step<=3)
                {
                    document.getElementById("quizz").style="opacity: 0; transition: all 1s";
                    $.ajax({
                        url : 'question.php',
                        type : 'POST',
                        data : ({step:step,qst:qst}),
                        success: function(html)
                        {
                            setTimeout(() => {
                            $('#quizz').html(html);
                                 document.getElementById("quizz").style="opacity: 1; transition: all 0.5s";
                             }, 500);
                        }
                      });
                } else {
                    let rep_1 = $('#rep_1').val();
                    let rep_2 = $('#rep_2').val();
                    let rep_3 = $('#rep_3').val();

                    let qst_1 = $('#qst_1').val();
                    let qst_2 = $('#qst_2').val();
                    let qst_3 = $('#qst_3').val();

                    document.getElementById("quizz").style="opacity: 0; transition: all 1s";

                         $.ajax({
                            url : 'question.php',
                            type : 'POST',
                            data : ({step:step,rep_1:rep_1,rep_2:rep_2,rep_3:rep_3,qst_1:qst_1,qst_2:qst_2,qst_3:qst_3}),
                            success: function(html)
                            {
                                setTimeout(() => {
                                $('#quizz').html(html);
                                     document.getElementById("quizz").style="opacity: 1; transition: all 0.5s";
                                 }, 500);
                            }
                          });
                }
            }

			function ad()
			{
                 let step = $('#step').val();
                 let answer = $('#answer').val();
                 let ad_interest = $('#ad_interest').val();
                 document.getElementById("rep_"+step+"").value=answer;
                 document.getElementById("quizz").style="opacity: 0; transition: all 1s";
				  $.ajax({
					    url : 'ads.php',
					    type : 'POST',
					    data : ({step:step, ad_interest:ad_interest}),
					    success: function(html)
					    {
					      setTimeout(() => {
                            $('#quizz').html(html);
                                 document.getElementById("quizz").style="opacity: 1; transition: all 0.5s";
                             }, 500);
					    }
					  });
			}

			function single_ad(id)
			{
			    /*
				let step = $('#step').val();
                document.getElementById("quizz").style="opacity: 0; transition: all 1s";
				$.ajax({
					    url : 'single_ad.php',
					    type : 'POST',
					    data : ({step:step,id:id}),
					    success: function(html)
					    {
					        setTimeout(() => {
                            $('#quizz').html(html);
                                 document.getElementById("quizz").style="opacity: 1; transition: all 0.5s";
                             }, 500);
					    }
					  });
                */
                let step = $('#step').val();
                question(step);
                window.open(id, "_blank");

			}

			 function logout()
            {
				$.ajax({
	                url : 'logout.php',
	                type : 'POST',
	              });
				location.reload();
            }

		</script>
