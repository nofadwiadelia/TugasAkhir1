<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Boofind
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          {{ Auth::user()->name }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/home">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="/user">
              <i class="now-ui-icons users_single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
            <a href="/buku">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>Buku</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Buku</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/welcome">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="now-ui-icons users_single-02"></i>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>

              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Buku</h5>
                <hr>
                <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis:</label>
                    <input type="text" class="form-control" id="penulis" name="penulis">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit:</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit">
                </div>
                <div class="form-group">
                  <label for="kategori_id">Kategori:</label>
                        <select name="kategori_id" required >
                            <option selected disabled>Pilih Kategori</option>
                            @foreach($kate as $item)
                            <option value="{{ $item->id }}" class="form-control">{{ $item->kategori_name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun:</label>
                    <input type="text" class="form-control" id="tahun" name="tahun">
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn">
                </div>
                <div class="form-group">
                    <label for="kota_id">Location:</label>
                    <select name="kota_id" required >
                            <option selected disabled>Pilih Kota</option>
                            @foreach($kotas as $kot)
                            <option value="{{ $kot->id }}" class="form-control">{{ $kot->kota_name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input tye="text" class="form-control" id="harga" name="harga"></textarea>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <input tye="text" class="form-control" id="deskripsi" name="harga"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <nav>
            <ul>
              <li>
                <a href=""></a>
                  Boofind
                </a>
              </li>
              
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Book
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>