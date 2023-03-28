@extends('layouts.main')

@section('content')

<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Stock Obat</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Tambah Stock Obat
          <span>
            <a href="{{ route('obat.index') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('obat.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat"
              name="nama_obat" placeholder="Nama Obat" value="{{ old('nama_obat') }}">
            @error('nama_obat')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="jenis_obat">Jenis Obat</label>
            <input type="text" class="form-control @error('jenis_obat') is-invalid @enderror" id="jenis_obat"
              name="jenis_obat" placeholder="Nama Obat" value="{{ old('jenis_obat') }}">
            @error('jenis_obat')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="jumlah_obat">Jumlah Obat</label>
            <input type="number" id="jumlah_obat" class="form-control @error('jumlah_obat') is-invalid @enderror"
              id="jumlah_obat" name="jumlah_obat" placeholder="Jumlah Obat" value="{{ old('jumlah_obat') }}">
            @error('jumlah_obat')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="harga_obat">Harga Obat</label>
            <input type="text" id="harga_obat" class="form-control @error('harga_obat') is-invalid @enderror"
              id="harga_obat" name="harga_obat" placeholder="Harga Obat" value="{{ old('harga_obat') }}">
            @error('harga_obat')
            <span class="invalid-feedback" role="alert">
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