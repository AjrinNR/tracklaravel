<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tracking Covid</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Selecao - v4.0.0
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="{{ url('/') }}">Tracking Covid</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      @include('layouts.frlayouts.nav')

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Data Kasus Indonesia</h2>
          <p class="animate__animated animate__fadeInUp">
            Data yang terpapar virus corona di Indonesia
          </p>
        </div>
      </div>

      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Jumlah Positif</h2>
          <h3 class="animate__animated animate__fadeInUp" style="color:white">
            {{number_format($jml_pos)}} jiwa
          </h3>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Jumlah Sembuh</h2>
          <h3 class="animate__animated animate__fadeInUp" style="color:white">
            {{number_format($jml_sem)}} jiwa
          </h3> 
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Jumlah Meninggal</h2>
          <h3 class="animate__animated animate__fadeInUp" style="color:white">
            {{number_format($jml_men)}} jiwa
          </h3>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->
  <!-- ======= Features Section ======= -->
    {{-- <section id="features" class="features">
      <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2>Data Total Global</h2>
        </div>

        <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-4" data-aos="zoom-in">
            <a class="nav-link disable"  >
              <i class="ri-first-aid-kit-line"></i>
              <div class="col">
                <h3 class="d-none d-lg-block">Total Positif</h3>
                <h4>{{$getpos['value']}}</h4>
              </div>
            </a>
          </li>
          <li class="nav-item col-4" data-aos="zoom-in" data-aos-delay="100">
            <a class="nav-link"  >
              <i class="ri-heart-line"></i>
              <div class="col">
                <h3 class="d-none d-lg-block" >Total Sembuh </h3>
                <h4> {{$getsem['value']}} </h4>
              </div>
            </a>
          </li>
          <li class="nav-item col-4" data-aos="zoom-in" data-aos-delay="200">
            <a class="nav-link">
              <i class="ri-skull-2-line"></i>
              <div class="col">
                <h3 class="d-none d-lg-block">Total Meninggal</h3>
                <h4>{{$getgal['value']}}</h4>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </section><!-- End Features Section --> --}}
  <br>
  <br>
  <div class="col text-center">
      <h6><p>Update terakhir : {{ $tanggal }}</p></h6>
  </div> 

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="provinsi" class="provinsi">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Indonesia</h2>
        </div>

        <div class="row content" data-aos="fade-up">
              
            <div class="table-wrapper-scroll-y my-custom-scrollbar">

              <table class="table table-bordered table-striped mb-0" style="height:auto">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Jumlah Positif</th>
                    <th scope="col">Jumlah Sembuh</th>
                    <th scope="col">Jumlah Meninggal</th>
                  </tr>
                </thead>
              <tbody>
              @php
                $no = 1;
              @endphp
              @foreach($tampil as $tmp)
                  <tr>
                    <th scope="row">{{$no++}}</th>
                      <td>{{$tmp->nama_prov}}</td>
                      <td>{{number_format($tmp->jumlah_positif)}}</td>
                      <td>{{number_format($tmp->jumlah_sembuh)}}</td>
                      <td>{{number_format($tmp->jumlah_meninggal)}}</td>
                  </tr>
                @endforeach         
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <section id="global" class="global">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Global</h2>
        </div>

        <div class="row content" data-aos="fade-up">
              
            <div class="table-wrapper-scroll-y my-custom-scrollbar col-lg-12" style="height:500px;">

              <table class="table table-bordered table-striped mb-0">
                <thead>
                  <tr>
                    <th scope="col"><center>No</center></th>
                    <th scope="col"><center>Negara</center></th>
                    <th scope="col"><center>Jumlah Positif</center></th>
                    <th scope="col"><center>Jumlah Sembuh</center></th>
                    <th scope="col"><center>Jumlah Meninggal</center></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </section>
   
  
    <!-- ======= Cta Section ======= -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Kontak</h2>
          <p>Kontak Kami</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi:</h4>
                <p>Jl. Situ Tarate</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Pesan mu telah dikirim, terima kasih!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Tracking Covid</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Selecao</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>