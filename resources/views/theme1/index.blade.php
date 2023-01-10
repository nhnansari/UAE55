<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> {{ env('APP_NAME')}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/theme1/img/favicon.png" rel="icon">
  <link href="/theme1/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/theme1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/theme1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/theme1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/theme1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/theme1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/theme1/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Butterfly - v4.9.1
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

@include('theme1.header')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Sell or Buy distinctive car Numbers</h1>
          <h2> Here you can sale or buy unique UAE car numbers.</h2>
          <div><a href="{{route('list_ads')}}" class="btn-get-started scrollto">View Listing</a></div>
          <div><a href="{{route('new_ad')}}" class="btn-get-started scrollto">Post an Ad</a></div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="/theme1/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Distinctive Numbers</h2>
          <p>Find a cool license number for you.</p>
        </div>

        <div class="row border-top">
            @foreach ($ads as $ad)
          <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 col-xl-3 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="/rendered/{{$ad->picture}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-heart" title="Add to Favorite"></i></a>
                  <a href=""><i class="bi bi-hammer" title="Place a bid"></i></a>
                </div>
              </div>
              <div class="member-info">
                  <a href="{{route('number',['ad'=>$ad->slug])}}">  <h4>{{ $ad->title }}</h4></a>
                <span>{{ $ad->description }}</span>
              </div>
            </div>
          </div>

            @endforeach
        </div>

          <div class="row">
              {{ $ads->links('pagination::bootstrap-4') }}
          </div>
      </div>
    </section><!-- End Team Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
               {!! SiteSettings::ad() !!}
          </div>
        </div>
      </div>
    </div>

      <div class="footer-top">
          <div class="container">
              <div class="row">

                  <div class="col-lg-3 col-md-6 footer-contact">
                      <h3>{{ env('APP_NAME') }}</h3>
                      <p>
                          Classified Agency
                      </p>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Useful Links</h4>
                      <ul>
                          <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="/about">About us</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="/services">Services</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="/terms">Terms of service</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="/privacy">Privacy policy</a></li>
                      </ul>
                  </div>


                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Our Social Networks</h4>
                      <p>Connect to us Via social media</p>
                      <div class="social-links mt-3">
                          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                      </div>
                  </div>

              </div>
          </div>
      </div>

      <div class="container py-4">
          <div class="copyright">
              &copy; Copyright <strong><span>{{SiteSettings::title()}}</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
              Developed by <a href="https://livinservices.com/">LivinServices</a>
          </div>
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/theme1/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/theme1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/theme1/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/theme1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/theme1/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/theme1/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/theme1/js/main.js"></script>

</body>

</html>
