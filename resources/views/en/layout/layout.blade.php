<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>

    <title>@yield('title')</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="generator" content="Naeem Hassan" />
    <meta charset="UTF-8" />
    <meta http-equiv="x-dns-prefetch-control" content="on" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1" />

    <meta name="description" content="" />
    <meta name="Keywords" content="" />

    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="/assets/css/MegaNavbar.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/navbar-default.css" title="inverse">

    <script src="/assets/js/jquery.js"></script>
     <script src="/assets/js/jquery.ui.js"></script>
    <script src="/assets/js/ui.datepicker-en.js"></script>

    <script src="/assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;subset=arabic" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Distinctive Car Numbers">

    <!-- Open Graph data -->
    <meta property="og:title" content="Distinctive Car Numbers" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/en/vip-numbers/distinctive-uae-car-numbers/index2.html" />
    <meta property="og:site_name" content="UAE55.Com" />


     <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body class="large lt-vip-numbers-page bc-exists">
<div class="main-wrapper">

    @include('en.layout.header')
    <!-- page content -->

        @yield('content')
    <!-- page content end -->
  @include('en.layout.footer')


</div>

<div id="login_modal_source" class="hide">
    <div class="tmp-dom">
        <div class="caption_padding">Sign in</div>
        <form action="/en/login.html" method="post">
            <input type="hidden" name="action" value="login" />

            <div class="submit-cell">
                <div class="name">Username</div>
                <div class="field">
                    <input type="text" name="username" maxlength="35" value="" />
                </div>
            </div>
            <div class="submit-cell">
                <div class="name">Password</div>
                <div class="field">
                    <input type="password" name="password" maxlength="35" />
                </div>
            </div>

            <div class="submit-cell buttons">
                <div class="name"></div>
                <div class="field">
                    <input type="submit" value="Sign in" />

                    <div style="padding: 10px 0 0 0;">Forgot your password? <a title="Reset your password" class="brown_12" href="/en/reset-password.html">Remind</a></div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>

</html>
