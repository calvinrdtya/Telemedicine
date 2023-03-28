@extends('layouts.main')

@section('content')

<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Buat perjanjian dengan dokter</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Perjanjian Pasien
          <span>
            <a href="{{ route('home') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('perjanjian.store') }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="pasien_id" value="{{ Auth::user()->id }}">
          <div class="form-group">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" value="{{ old('nama_pasien') }}">
            @error('nama_pasien')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama_dokter">Nama Dokter</label>
            <select class="form-control" id="nama_dokter" name="nama_dokter">
              <option> Pilih salah satu</option>
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->nama_dokter  }}">
                {{ $dokter->nama_dokter }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="spesialiasi_dokter">Spesialisasi Dokter</label>
            <select class="form-control" id="spesialiasi_dokter" name="spesialiasi_dokter">
              <option> Pilih salah satu</option>
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->spesialisasi_dokter }}">{{ $dokter->spesialisasi_dokter }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="tgl_perjanjian">Tanggal Perjanjian</label>
              <input type="date" id="tgl_perjanjian" name="tgl_perjanjian">
            {{-- <select class="form-control" id="tgl_perjanjian" name="tgl_perjanjian">
              <option> Pilih salah satu</option>
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->spesialisasi_dokter }}">{{ $dokter->spesialisasi_dokter }}</option>
              @endforeach
            </select> --}}
          </div>
          <div class="form-group">
            <label for="waktu_perjanjian">Waktu Perjanjian</label>
            <select name="waktu_perjanjian" class="form-control" id="waktu_perjanjian">
              <option value="Pagi (08:00)">Pagi (08:00)</option>
              <option value="Siang (14:00)">Siang (14:00)</option>
              <option value="Sore (17:00)">Sore (17:00)</option>
            </select>
          </div>
          <button type="submit" class="btn btn-info">Buat Perjanjian</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection