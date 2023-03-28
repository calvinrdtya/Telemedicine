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
    <h1 class="h3 mb-3 text-gray-800">Dokter</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Data Dokter
          <span>
            <a href="{{ route('admin-dokter.create') }}" class="btn ml-4 btn-primary font-weight-bold">
              + Tambah Dokter
            </a>
          </span>
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dokters as $dokter)
              <tr>
                <td>{{ $dokter->nama_dokter }}</td>
                <td>{{ $dokter->spesialisasi_dokter }}</td>
                <td>{{ $dokter->no_telp }}</td>
                <td>{{ $dokter->alamat_dokter }}</td>
                <td>
                  <div class="row mx-auto">
                  <span><a href="{{ route('admin-dokter.edit', $dokter->id) }}" class="btn btn-warning ml-9">Edit</a>
                  </span>
                  <span>
                    <form action="{{ route('admin-dokter.destroy', $dokter->id) }}" method="post">
                      @method('delete')
                      @csrf
                      <span><button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block ml-3" type="submit">Hapus</button></span>
                    </form>
                  </span>
                </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection