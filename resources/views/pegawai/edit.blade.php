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
    <h1 class="h3 mb-3 text-gray-800">{{ $pegawais->nama_pegawai }}</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Profil Pegawai
          <span>
            <a href="{{ route('pegawai.index') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h6>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('pegawai.update', $pegawais->id) }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          {{-- <input type="hidden" name="{{ $users->id }}" value="{{ $users->id }}"> --}}
          <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" value="{{ $pegawais->nama_pegawai }}">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $pegawais->alamat }}">
          </div>
          <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon" value="{{ $pegawais->no_telp }}">
          </div>
          <button type="submit" class="btn btn-info">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
