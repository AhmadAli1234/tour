@extends('layouts.app2')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('new/pin/jquery.pinlogin.min.js') }}"></script>

<link href="{{ asset('new/pin/jquery.pinlogin.css') }}" rel="stylesheet" type="text/css" />

<style>
    .ui.dropdown {
        max-width: 400px;
    }

</style>
<!-- offcanvas-start -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <span class="offcanvas-title" id="offcanvasRightLabel"><img src="images/logo.png" class="img-fluid"
                alt=""></span>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mobile-menu-item">
            <ul>
                <li><a href="quizz.php">Quiz Geolocalisé</a></li>
                <li><a href="audioguide.php">Audioguides Géolocalisé</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">A propos de la startup</a></li>
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

<center>

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
                                <p></p><div id="loginpin"><div id="pinlogin" class="pinlogin"><input type="text" id="loginpin_pinlogin_0" name="loginpin_pinlogin_0" maxlength="1" autocomplete="off" class="pinlogin-field" placeholder="_"><input type="text" id="loginpin_pinlogin_1" name="loginpin_pinlogin_1" maxlength="1" autocomplete="off" class="pinlogin-field" placeholder="_" readonly=""><input type="text" id="loginpin_pinlogin_2" name="loginpin_pinlogin_2" maxlength="1" autocomplete="off" class="pinlogin-field" placeholder="_" readonly=""><input type="text" id="loginpin_pinlogin_3" name="loginpin_pinlogin_3" maxlength="1" autocomplete="off" class="pinlogin-field" placeholder="_" readonly=""><input type="text" id="loginpin_pinlogin_4" name="loginpin_pinlogin_4" maxlength="1" autocomplete="off" class="pinlogin-field" placeholder="_" readonly=""></div></div><p></p>
                                <a onclick="interest()">Je n'ai pas de code</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="evviede-venir-area" id="quest_section" style="visibility: visible; opacity:1">
        <div class="container">
            <div class="evviede-venir-wrapper-area wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="evviede-venir-title" id="quizz" style="opacity: 1; transition: all 0.5s ease 0s;">
                            <center>
                                <div class="ui form">

                                    <h2>
                                        Pour améliorer nos publicité <br>
                                        <span>Citez</span> votre centre d'interet
                                    </h2>

                                    <div class="inline field">

                                        <div class="label ui selection fluid dropdown multiple" tabindex="0">
                                            <select class="form-select">
                                                <option>Tour</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <br><br>

                                <a href="javascript:void(0)" onclick="interests_sub()">Continuer</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="evviede-venir-area" id="quest_section" style="visibility: visible; opacity:1">
        <div class="container">
            <div class="evviede-venir-wrapper-area wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="evviede-venir-title" id="quizz" style="opacity: 1; transition: all 0.5s ease 0s;">

                            <input value="1" id="step" hidden="">


                            <h1 style="text-align: left;">1/3</h1>
                            <p></p>
                            <h2 style="font-size: 25px; background: #f6ebff; border-radius: 20px;">
                                Quel est le plus grand jardin de Paris? </h2>
                            <br>
                            <input name="answer" id="answer" placeholder="Votre reponse ici...">
                            <div class="evviede-venir-title" style="padding: 20px;">
                                <a href="javascript:void(0)" onclick="ad()">Envoyer votre reponse</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</center>
<input id="ad_interest" value="0" hidden>

<input id="qst_1" value="12" hidden><input id="rep_1" value="" placeholder="rep_1" hidden><input id="qst_2" value="9"
    hidden><input id="rep_2" value="" placeholder="rep_2" hidden><input id="qst_3" value="3" hidden><input id="rep_3"
    value="" placeholder="rep_3" hidden>

<script>
    $('.label.ui.dropdown')
        .dropdown()

    function interests_sub() {
        let interests = $('#interests').val();
        document.getElementById("ad_interest").value = interests;
        question(1);
    }

</script>
<script type="text/javascript">
    $(function () {

        var loginpin = $('#loginpin').pinlogin({
            fields: 5,

            complete: function (pin) {

                $.ajax({
                    url: 'taxi_serial.php',
                    type: 'POST',
                    data: ({
                        pin: pin
                    }),
                    success: function (html) {
                        if (html == 1) {
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


    function interest() {
        document.getElementById("quizz").style = "opacity: 0; transition: all 0.5s";
        $.ajax({
            url: 'interests.php',
            type: 'POST',
            success: function (html) {
                setTimeout(() => {
                    $('#quizz').html(html);
                    document.getElementById("quizz").style = "opacity: 1; transition: all 0.5s";
                }, 500);
            }
        });
    }

    function question(step) {

        let qst = $('#qst_' + step + '').val();


        if (step <= 3) {
            document.getElementById("quizz").style = "opacity: 0; transition: all 1s";
            $.ajax({
                url: 'question.php',
                type: 'POST',
                data: ({
                    step: step,
                    qst: qst
                }),
                success: function (html) {
                    setTimeout(() => {
                        $('#quizz').html(html);
                        document.getElementById("quizz").style = "opacity: 1; transition: all 0.5s";
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

            document.getElementById("quizz").style = "opacity: 0; transition: all 1s";

            $.ajax({
                url: 'question.php',
                type: 'POST',
                data: ({
                    step: step,
                    rep_1: rep_1,
                    rep_2: rep_2,
                    rep_3: rep_3,
                    qst_1: qst_1,
                    qst_2: qst_2,
                    qst_3: qst_3
                }),
                success: function (html) {
                    setTimeout(() => {
                        $('#quizz').html(html);
                        document.getElementById("quizz").style = "opacity: 1; transition: all 0.5s";
                    }, 500);
                }
            });
        }
    }

    function ad() {
        let step = $('#step').val();
        let answer = $('#answer').val();
        let ad_interest = $('#ad_interest').val();
        document.getElementById("rep_" + step + "").value = answer;
        document.getElementById("quizz").style = "opacity: 0; transition: all 1s";
        $.ajax({
            url: 'ads.php',
            type: 'POST',
            data: ({
                step: step,
                ad_interest: ad_interest
            }),
            success: function (html) {
                setTimeout(() => {
                    $('#quizz').html(html);
                    document.getElementById("quizz").style = "opacity: 1; transition: all 0.5s";
                }, 500);
            }
        });
    }

    function single_ad(id) {
        let step = $('#step').val();
        question(step);
        window.open(id, "_blank");

    }

    function logout() {
        $.ajax({
            url: 'logout.php',
            type: 'POST',
        });
        location.reload();
    }

</script>
@endsection
