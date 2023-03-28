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
    <h1 class="h3 mb-2 text-gray-800">Tambah Pasien</h1>
    <p class="mb-4">Isi formulir pendaftaran berikut untuk menambahkan pasien baru</p>
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pasien Baru
          <span>
            <a href="{{ route('dokter.index') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pasien.store') }}" enctype="multipart/form-data">
          @csrf
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
            <label for="dokter_id">Nama Dokter</label>
            <select class="form-control" id="dokter_id" name="dokter_id">
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="alamat_pasien">Alamat Pasien</label>
            <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" placeholder="Alamat Pasien"
              value="{{ old('alamat_pasien') }}">
          </div>
          <div class="form-group">
            <label for="no_telp">Nomor Telepon</label>
            <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp"
              placeholder="Nomor Telpon Pasien" value="{{ old('no_telp') }}">
            @error('no_telp')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="keluhan_pasien">Keluhan</label>
            <textarea class="form-control @error('keluhan_pasien') is-invalid @enderror"
              id="exampleFormControlTextarea1" rows="3" name="keluhan_pasien">{{ old('keluhan_pasien') }}</textarea>
            @error('keluhan_pasien')
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