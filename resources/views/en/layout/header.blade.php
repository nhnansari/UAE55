<header class="page-header">
    <div class="point1 clearfix">
        <div class="top-navigation">
            <div class="point1">
                <!-- languages selector -->

                <span class="lang-wrapper">
		<span class="circle" id="lang-selector">
			<span class="default" accesskey="En">English</span>
                        <span class="content hide">
				<ul class="lang-selector">

                    <li>
                        <a class="font2" title="اللغة العربية" href="/vip-numbers/distinctive-uae-car-numbers/index2.html">اللغة العربية</a>
                    </li>

				</ul>
			    </span>
                        </span>
                        </span>

                <!-- languages selector end -->
                <div class="fright">
                    <!-- shopping cart tpl | template file -->


                    <!-- shopping cart tpl end -->
                    <!-- user navigation bar -->


                    <span class="circle" id="user-navbar">
	                <span class="default">
                        @if(Auth::check())
                            <span>


                        <a href="/dashboard" style="color:white">Dashboard</a>
                          </span>
                            <span style="margin-left: 15px;">

                            <a class="dropdown-item"  style="color:white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>

                        </span>
                        @else
                            <a href="/login" style="color:white">Sign in</a>
                        @endif
                    </span>
                    </span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!-- user navigation bar end -->
                </div>
            </div>
        </div>
        <section class="main-menu">
            <div class="point1">

                <nav class="menu">
                    <!-- main menu block -->
                    <div>
                        <nav class="navbar navbar-inverse-dark navbar-static-top dropdown-onhover" role="navigation">
                            <div class="navbar-fluid">
                                <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand_size_lg"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>

                                    @auth
                                        <a class="addproperty button mobile-view" style="display:none" rel="nofollow" title="Post a new  " href="/en/add-listing.html">
                                            <i class="fa fa-plus"></i>Post
                                        </a>
                                    @endauth
                                    @guest

                                        <a class="addproperty button mobile-view" style="display:none" rel="nofollow" title="Sign In" href="/login">
                                            <i class="fa fa-plus"></i>Sign In
                                        </a>
                                    @endguest

                                    <div id="logo"><a href="/en/" title="UAE55.Com"><img alt="UAE55.Com" src="/logo.png" /></a></div>
                                </div>
                                <div class="collapse navbar-collapse navbar-menu-right" id="navbar-brand_size_lg">
                                    <div class="navbar-wrap">
                                        <ul class="nav navbar-nav navbar-left dropdown-onhover">
                                            <li class="dropdown-short cat-vip_numbers"><a href="/vip-numbers.html" data-toggle="collapse" data-target="#id-vip_numbers" class="dropdown-toggle collapsed"><span class="reverse"><i class="fa fa-vip_numbers"></i>VIP Numbers</span><span class="fa fa-caret-down"></span></a>
                                                <ul
                                                    class="dropdown-menu collapse" id="id-vip_numbers">
                                                    <li class="touch-cat">
                                                        <div id="isTouch"><a href="/vip-numbers.html" class="cat-touch"><span class="reverse"><i class="fa fa-vip_numbers"></i>VIP Numbers</span></a></div>
                                                    </li>
                                                    <li><a title="" href="/vip-numbers/distinctive-uae-car-numbers.html"><span class="sc-name"><i class="fa fa-caret-right"></i>Distinctive Car Numbers</span> </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                @auth
                                    <a class="add-property button" rel="nofollow" title="Post a new ad" href="/new_ad"><i class="fa fa-plus"></i>Post an Ad</a>
                                @endauth
                                @guest
                                    <a class="  button" title="Login" href="/login">Sign In</a>
                                @endguest
                            </div>
                        </nav>
                    </div>
                    <ul id="main_menu_more"></ul>
                    <script>
                        if ($('#isTouch').css('display') == 'inline-block') {
                            $(document).on('click', '.dropdown-toggle', function(e) {
                                e.preventDefault();
                            });
                        };
                    </script>

                    <!-- main menu block end -->
                </nav>
            </div>
        </section>
    </div>
</header>

