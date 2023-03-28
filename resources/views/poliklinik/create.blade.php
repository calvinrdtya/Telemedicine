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
    {{-- <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Tambah Profil</h1> --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Tambah Data Poliklinik
          <span>
            <a href="{{ route('poliklinik.index') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('poliklinik.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama_poli">Nama Poliklinik</label>
            <input type="text" class="form-control @error('nama_poli') is-invalid @enderror" id="nama_poli" name="nama_poli" placeholder="Nama Poliklinik" value="{{ old('nama_poli') }}">
            @error('nama_poli')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="pimpinan_poli">Nama Dokter</label>
            <select class="form-control" id="pimpinan_poli" name="pimpinan_poli">
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->nama_dokter }}">{{ $dokter->nama_dokter }}</option>
              @endforeach
            </select>
          </div>
          {{-- <div class="form-group">
            <label for="dokter_id">Pimpinan</label>
            <select class="form-control" id="dokter_id" name="dokter_id">
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
              @endforeach
            </select>
          </div> --}}
          {{-- <div class="form-group">
            <label for="penanggung_jawab">Penanggung Jawab</label>
            <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab" placeholder="Penanggung Jawab Klinik" value="{{ old('penanggung_jawab') }}">
            @error('penanggung_jawab')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> --}}
          <button type="submit" class="btn btn-info">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection