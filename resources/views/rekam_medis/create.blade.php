@extends('layouts.main')

@section('content')


<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>
    {{-- Topbar Navbar --}}
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
    <h1 class="h3 mb-2 text-gray-800">Tambah Rekam Medis Pasien</h1>
    {{-- <p class="mb-4">Sdr {{ $nama_pasien }}</p> --}}
    {{-- <p class="mb-4">formulir Rekam Medis {{ $perjanjians->nama_pasien }}</p> --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Rekam Medis
          <span>
            <a href="{{ route('home') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('rekam_medis.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="keluhan">Keluhan</label>
            <input type="text" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" placeholder="Keluhan Pasien" value="{{ old('keluhan') }}">
            @error('keluhan')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="diagnosa">Diagnosa</label>
            <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" name="diagnosa" placeholder="Diagnosa Pasien" value="{{ old('diagnosa') }}">
            @error('diagnosa')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="tindakan">Tindakan</label>
            <input type="text" class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" name="tindakan" placeholder="Tindakan" value="{{ old('tindakan') }}">
            @error('tindakan')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="berat_badan">Berat Badan</label>
            <input type="text" class="form-control @error('berat_badan') is-invalid @enderror" id="berat_badan" name="berat_badan" placeholder="Berat Badan" value="{{ old('berat_badan') }}">
            @error('berat_badan')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="tensi_diastolik">Tensi Diastolik</label>
            <input type="text" class="form-control @error('tensi_diastolik') is-invalid @enderror" id="tensi_diastolik" name="tensi_diastolik" placeholder="Tensi Diastolik" value="{{ old('tensi_diastolik') }}">
            @error('tensi_diastolik')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="tensi_sistolik">Tensi Sistolik</label>
            <input type="text" class="form-control @error('tensi_sistolik') is-invalid @enderror" id="tensi_sistolik" name="tensi_sistolik" placeholder="Tensi Sistolik" value="{{ old('tensi_sistolik') }}">
            @error('tensi_sistolik')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-info">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection