<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> @yield('title')</title>

  <link rel="icon" type="image/ico" href="{{ asset("assets/logo.png") }}" />
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset("assets/css/style.css")}}">
  <link rel="stylesheet" href="{{ asset("assets/css/components.css")}}">
  @yield('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>      
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset("assets/img/avatar/avatar-1.png")}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <form action="{{ url("logout") }}" method="post" style="display: inline" class="">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger">Logout</button>
              </form>

            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">DLH</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="{{ url("/") }}"><i class="fas fa-home"></i> <span>Home</span></a></li>

              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i><span>Pegawai</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ url("/pegawai") }}">Daftar Pegawai</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clock"></i><span>Jadwal</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ url("/jadwal") }}">Jadwal</a></li>
                </ul>
              </li>

              <li><a class="nav-link" href="{{ url("/kehadiran") }}"><i class="fas fa-columns"></i> <span> Kehadiran</span></a></li>

              <li><a class="nav-link" href="{{ url("/kehadiran/terkini") }}"><i class="fas fa-columns"></i> <span> Kehadiran Terkini</span></a></li>

            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
          @yield('content')
        
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> <a href="https://github.com/zaenalarif">Zainal Arifin</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset("assets/js/stisla.js")}}"></script>

  <!-- Template JS File -->
  <script src="{{ asset("assets/js/scripts.js")}}"></script>
  <script src="{{ asset("assets/js/custom.js")}}"></script>

  @yield('script')
</body>
</html>
