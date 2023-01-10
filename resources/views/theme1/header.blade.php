<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="/" class="logo"><img src="/images/logo_transparent_white.png" alt="" class="img-fluid"></a>
        <!-- Uncomment below if you prefer to use text as a logo -->
        <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>

                <li class="dropdown"><a href="{{route('list_ads')}}"><span>Distinctive Numbers</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('list_ads')}}?emirates=Abu+Dhabi">Abu Dhabi</a></li>
                        <li><a href="{{route('list_ads')}}?emirates=Dubai">Dubai</a></li>
                        <li><a href="{{route('list_ads')}}?emirates=Sharjah">Sharjah</a></li>
                        <li><a href="{{route('list_ads')}}?emirates=Ajman">Ajman</a></li>
                        <li><a href="{{route('list_ads')}}?emirates=Ras+Al+Khaimah">Ras Al Khaimah</a></li>
                        <li><a href="{{route('list_ads')}}?emirates=Fujairah">Fujairah</a></li>
                        <li><a href="{{route('list_ads')}}?emirates=Umm+Al+Quawain">Umm Al Quawain</a></li>
                        <li><a href="#">Resumes</a></li>
                    </ul>
                </li>

                @auth
                    <li class="dropdown active"><a href="#"><span>Dashboard</span> <i class="bi bi-chevron-down active"></i></a>
                        <ul>
                            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="dropdown"><a href="{{route('my_ads')}}"><span>Ads</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="{{route('my_ads')}}">License Number Ads</a></li>

                                </ul>
                            </li>

                            <li><a href="{{route('favorites')}}">Favorites</a></li>
                            <li><a href="{{route('my_ads')}}">My Ads</a></li>
                            <li><a href="/profile">Profile Settings</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                  <li><a class="nav-link scrollto active" href="/good-bye">Logout</a></li>
                @endauth
                @guest
                <li><a class="nav-link scrollto active" href="/login">Login</a></li>
                <li><a class="nav-link scrollto active" href="/register">Sign Up</a></li>
                @endauth
            </ul>

            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->


