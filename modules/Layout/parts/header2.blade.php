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
                        <li><a href="{{ url('/quiz') }}">Quiz Geolocalisé</a></li>
                        <li><a href="{{ url('/audioguide') }}">Audioguides Géolocalisé</a></li>
                        <li><a href="{{ url('/ticket') }}">Ticket</a></li>
                        <li><a href="{{url('/news')}}">Blog</a></li>
                        <li><a href="#">A propos de la startup</a></li>
                    </ul>
                </div>
                <div class="menu-btn">
                    <ul>
                    @if(!Auth::id())
                        <li>
                            @if($header=='tour')
                                <a href="#login" data-toggle="modal" data-target="#login" class="login">Connexion</a>
                            @else
                                <a href="{{ url('/login') }}" class="login">Connexion</a>
                            @endif
                        </li>
                        <li>
                            @if($header=='tour')
                                <a href="#register" data-toggle="modal" data-target="#register"
                                    class="signup">Inscription</a>
                            @else
                                <a href="{{ url('/register') }}" class="signup">Inscription</a>
                            @endif
                        </li>
                       @else
                        @if(is_admin())
                            <li><a href="{{url('/admin')}}" class="login">{{__("Admin Dashboard")}}</a></li>
                        @else
                            <li><a href="{{route('vendor.dashboard')}}"  class="login">Dashboard</a></li>
                        @endif
                        <li class="">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"> {{__('Logout')}}</a>
                        </li>

                        <form id="logout-form-topbar" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                       @endif
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
