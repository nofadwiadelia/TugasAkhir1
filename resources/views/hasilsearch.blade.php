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
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar " color-on-scroll="1000">
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
        <a class="navbar-brand" href="/welcome" data-placement="bottom" target="_blank">
          Boofind
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
        
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <br>
  
  <div class="section section-about-us">
    <div class="container">
      <div class="col-md-3 ml-auto mr-auto">
        <div class="card card-login card-plain">
          <div class="card-body">
              <form action="{{ route('search.index') }}" method="POST">
                      <div class="input-group no-border input-lg ">
                      <!-- search -->
                          <input type="text" name="keyword"  class="form-control" placeholder="Search any book">
                          <div class="input-group-append">
                            <span class="input-group-text">
                            </span>
                          </div>
                      </div>
                      <input type="submit" id="search-btn"class="btn btn-primary" value="CARI">
                </form>
              
                <center>
                  <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pilih Kota </a>
                            <ul class="dropdown-menu">
                                @foreach ($kotas as $ko)
                                <li><a href="?kot={{$ko->id}}">{{$ko->kota_name}}</a></li>
                                @endforeach
                            </ul>
                  </li> 
                </center>
              
            </div>
      </div>
    </div>
      </div>
      @foreach($kategoris as $k)
            <table><tr>
            <td><a href="?cat={{$k->id}}">{{ $k->kategori_name }}</a></td></tr>
            </table>
            @endforeach
      <div class="container">
      <div class="row">
          <div class="col-md-12">

            <div class="col-md-12">
            @if (count($hasil))
            <div class="card-panel green white-text">Hasil pencarian : <b>{{$query}}</b></div>
              @php
                  $i=0;
                  $jumlahData = 6;
              @endphp
              @foreach($hasil as $buku)
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
                      if ($i % $jumlahData == 0 || $i == $hasil->count()) {
                          echo "</div>";
                      }
                    @endphp
                  @endforeach

            @else
              <div class="card-panel red darken-3 white-text">Oops.. Buku <b>{{$query}}</b> Tidak Ditemukan</div>
          @endif
            </div>            
            
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