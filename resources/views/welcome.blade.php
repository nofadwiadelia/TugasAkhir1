<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    BooFind
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-kit.css?v=1.2.0" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="dropdown button-dropdown">
        <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
          <span class="button-bar"></span>
          <span class="button-bar"></span>
          <span class="button-bar"></span>
        </a>
        @if (Route::has('login'))
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @auth
              <a href="{{ url('/home') }}">Home</a>
          @else
          <a class="dropdown-item" href="{{ route('login') }}">Login</a>
          <a class="dropdown-item" href="{{ route('register') }}">Register</a>
          @endauth
        </div>
        @endif
      </div>
      <div class="navbar-translate">
        <a class="navbar-brand" href="#" data-placement="bottom" target="_blank">
          Boofind
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('search.index') }}">Search</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
   <div class="page-header-small clear-filter" filter-color="orange">
    <div class="page-header page-header-small">
      <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/background6.jpeg');">
      </div>
      <div class="content-center">
        <div class="container">
          <h1 class="description">CARI APA YANG KAMU MAU</h1>
          <h5 class="description" >Temukan buku yang kamu cari disini, dan kami akan menemukannya di toko buku kesayanganmu</h5>
          <br><br>
          
        </div>
      </div>
    </div>
    </div>
    <div class="section section-about-us">
      <div class="container">
      <div class="row">
          <div class="col-md-12">
              
                @php
                  $i=0;
                  $jumlahData = 6;
                @endphp

              @foreach($bukus as $buku)
                @php
                  if ($i++ % $jumlahData == 0) {
                    echo "<div class='row margin-bottom-10'>";
                  }
                @endphp

                <div class="col-md-2 col-sm-6 col-xs-12">
                  <a href="#" >
                      <img class="img-responsive img-thumbnail" src="{{ URL::to('uploads/file/'.$buku->gambar) }}" style="width: 150px; height: 200px;" alt="Generic placeholder image">
                  </a>
                  <center><h6>
                    <a href="/detailbuku?buku_id={{ $buku->id }}" class="judul" > {{ $buku->judul }}</a>
                  </h6></center>
                  <h6>ISBN : {{ $buku->isbn }}</h6>
                  <h6>{{ $buku->tahun }}</h6>
                  <div class="tempat">
                    <i class="fa fa-map-marker"></i> {{ $buku->harga }}
                  </div>
                  <br>
                </div>

                @php
                  if ($i % $jumlahData == 0 || $i == $bukus->count()) {
                      echo "</div>";
                  }
                @endphp
              @endforeach
                
            
            
          </div>
        </div>
          
          

      </div>
    </div>

    <footer class="footer footer-default">
      <div class="container">
        <nav>
          <ul>
            <li>
              <a href="#">
                Boofind
              </a>
            </li>
            
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Designed by
          <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
</body>

</html>