<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="{{ asset('../assets/img/apple-icon.png') }}"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
            Single Expontial Smoothing  
    </title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"
      rel="stylesheet"
    />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <!-- CSS Files -->
    <link href="{{ asset('../assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('../assets/demo/demo.css') }}" rel="stylesheet" />
    
  </head>

  <body class="">
    <div class="wrapper">
      <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
          <a href="https://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="{{ asset('../assets/img/polije.png') }}" />
            </div>
            <!-- <p>CT</p> -->
          </a>
          <a href="" class="simple-text logo-normal">
            Peramalan Es oyen
            <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            @if($active == 'dashboard')
            <li class="active">
            @else
            <li> 
            @endif
              <a href="/home">
                <i class="nc-icon nc-bank"></i>
                <p>Dashboard</p>
              </a>
            </li>
            
            @if($active == 'data penjualan')
            <li  class="active">         
            @else
            <li> 
            @endif
              <a href="/dataPenjualan">
                <i class="nc-icon nc-single-copy-04"></i>
                <p>Data Penjualan</p>
              </a>
            </li>

            @if($active == 'forecasting')
            <li  class="active">         
            @else
            <li> 
            @endif
              <a href="/table">
                <i class="nc-icon nc-chart-pie-36"></i>
                <p>Forecasting</p>
              </a>
            </li>

            <form action="/logout" method="POST">
                @csrf
                 <li>
                    <a>
                        <i class="nc-icon nc-button-power"></i>
                        <input type="submit" value="LOGOUT" style="border: none;">
                    </a>
                </li>
            </form>    
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav
          class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent"
        >
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="javascript:;"
                >Selamat Datang Admin</a
              >
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content -->
        @yield('main')
        <!-- End Content -->

        <footer class="footer footer-black footer-white">
          <div class="container-fluid">
            <div class="row">
              <nav class="footer-nav">
                <!--   isi footer   -->
              </nav>
              <div class="credits ml-auto">
                <span class="copyright">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with <i class="fa fa-heart heart"></i> Bilal, Johan, Arfan
                </span>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('../assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('../assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('../assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script
      src="{{ asset('../assets/js/paper-dashboard.min.js?v=2.0.1') }}"
      type="text/javascript"
    ></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('../assets/demo/demo.js') }}"></script>
    <script>
      $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
      });
    </script>
  </body>
</html>
