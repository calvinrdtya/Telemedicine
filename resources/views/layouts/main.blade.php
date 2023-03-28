<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>V-Medika</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}

  {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('js/jquery-ui.js') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

  <style>
    .bg {
      background-color: #0bbba6;
    }
  </style>
</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-hospital-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">V-Medika<sup></sup></div>
      </a>
      <hr class="sidebar-divider my-0">
      @if (Auth::user()->role === 'admin')
      <li class="nav-item {{ ($active === "dashboard") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('home') }}">
          <i class="fas fa-sort-amount-up-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item {{ ($active === "pegawai") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('pegawai.index') }}">
          <i class="fas fa-users"></i>
          <span>Pegawai</span></a>
      </li>
      <li class="nav-item {{ ($active === "profil") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('poliklinik.index') }}">
          <i class="fas fa-bars"></i>
          <span>Profil Poliklinik</span></a>
      </li>
      {{-- <li class="nav-item {{ ($active === "setting") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-user-cog"></i>
          <span>Setting</span></a>
      </li> --}}
      <hr class="sidebar-divider">
      <div class="sidebar-heading text-light">Data Pasien</div>
      <li class="nav-item {{ ($active === "perjanjian") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('praktek.index') }}">
          <i class="fas fa-user-injured"></i>
          <span>Konsultasi Pasien</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading text-light">Data Dokter</div>

      <li class="nav-item {{ ($active === "dokter") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin-dokter.index') }}">
          <i class="fas fa-fw fas fa-user-md"></i>
          <span>Dokter</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading text-light">Data Pegawai</div>
   
      <li class="nav-item {{ ($active === "user") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="fas fa-user-tag"></i>
          <span>User</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading text-light">Data Obat</div>

      <li class="nav-item {{ ($active === "obat") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('obat.index') }}">
          <i class="fas fa-tablets"></i>
          <span>Obat</span></a>
      </li>
      @endif


      @if (Auth::user()->role === 'dokter')
      {{-- <li class="nav-item {{ ($active === "pasien") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('janji.index') }}">
          <i class="fas fa-sort-amount-up-alt"></i>
          <span>Pasien</span></a>
      </li> --}}
      <li class="nav-item {{ ($active === "dashboard") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('home') }}">
          <i class="fas fa-sort-amount-up-alt"></i>
          <span>Pasien</span></a>
      </li>
      <li class="nav-item {{ ($active === "perjanjian") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('praktek.index') }}">
          <i class="fas fa-user-injured"></i>
          <span>Konsultasi</span></a>
      </li>
      {{-- <li class="nav-item {{ ($active === "jadwal") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="jadwal_praktek/jadwal">
          <i class="fas fa-calendar-alt"></i>
          <span>Jadwal Praktek</span></a>
      </li> --}}
      <li class="nav-item {{ ($active === "obat") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('obat.index') }}">
          <i class="fas fa-tablets"></i>
          <span>Obat</span></a>
      </li>
      @endif

      @if (Auth::user()->role === 'pasien')
      <li class="nav-item {{ ($active === "perjanjian") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('praktek.index') }}">
          <i class="fas fa-user-injured"></i>
          <span>Konsultasi</span></a>
      </li>
      <li class="nav-item {{ ($active === "dokter") ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('daftar-dokter.index') }}">
          <i class="fas fa-user-injured"></i>
          <span>Daftar Dokter</span></a>
      </li>
      {{-- <li class="nav-item {{ ($active === "jadwal") ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jadwal_praktek.index') }}">
          <i class="fas fa-user-injured"></i>
          <span>Jadwal Konsultasi</span></a>
      </li> --}}
      @endif

      {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle">
        </button>
      </div> --}}
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      @yield('content')
      @if (Auth::user()->role == 'admin')
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; VMedika 2023</span>
          </div>
        </div>
      </footer>
      @endif
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('js/Chart.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/datatables-demo.js') }}"></script>
</body>
</html>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ready to leave?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('logout') }}" method="POST">
          @method('logout')
          @csrf
        <button class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>