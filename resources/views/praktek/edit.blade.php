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
    <h1 class="h3 mb-2 text-gray-800">Edit Rekam Medis Pasien</h1>
    <p class="mb-4">Update formulir pendaftaran berikut untuk menegubah data pasien</p>
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Pasien</h6>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pasien.update', $pasien->id) }}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien"
              value="{{ $pasien->nama_pasien }}">
          </div>
          <div class="form-group">
            <label for="alamat_pasien">Alamat Pasien</label>
            <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" placeholder="Alamat Pasien"
              value="{{ $pasien->alamat_pasien }}">
          </div>
          <div class="form-group">
            <label for="dokter_id">Nama Dokter</label>
            <select class="form-control" id="dokter_id" name="dokter_id">
              @foreach ($dokters as $dokter)
              <option value="{{ $dokter->id }}" {{ $pasien->dokter_id == $dokter->id ? 'Selected' : '' }}>
                {{ $dokter->nama_dokter }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="keluhan_pasien">Keluhan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
              name="keluhan_pasien">{{ $pasien->keluhan_pasien }}</textarea>
          </div>
          <div class="form-group">
            <label for="obat_id">Obat</label>
            <select class="form-control" id="dokter_id" name="obat_id">
              @foreach ($obats as $obat)
              <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-info">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
  
@endsection