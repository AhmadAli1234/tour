<!-- header-area-start -->
<header class="header-area">
    <div class="customss">
        <div class="container">
            <nav>
                <div class="logo"><img src="{{ asset('new/images/logo.png') }}" class="img-fluid"
                        alt=""></div>
                <div class="menu-item">
                    <ul>
                        <li><a href="{{ url('/') }}" class="logos"><img
                                    src="{{ asset('new/images/logo.png') }}" class="img-fluid"
                                    alt=""></a></li>
                        <li><a href="{{url('/quiz')}}">Quiz Geolocalisé</a></li>
                        <li><a href="{{url('/audioguide')}}">Audioguides Géolocalisé</a></li>
                        <li><a href="{{url('/ticket')}}">Ticket</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">A propos de la startup</a></li>
                    </ul>
                </div>
                <div class="menu-btn">
                    <ul>
                        <li><a href="#login" data-toggle="modal" data-target="#login" class="login">Connexion</a></li>
                        <li><a href="#register" data-toggle="modal" data-target="#register" class="signup">Inscription</a></li>
                    </ul>
                </div>
                <div class="hamburger">
                    <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                            class="fa-sharp fa-solid fa-bars-staggered"></i></a>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- header-area-end -->
