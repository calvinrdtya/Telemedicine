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
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold">Edit Biodata User</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Biodata {{ $user->name }}
          <span>
            <a href="{{ route('admin.index') }}" class="btn ml-4 btn-primary font-weight-bold"><i class="fas fa-arrow-left"></i>
               back
            </a>
          </span>
        </h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.update', $user->id) }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          {{-- <input type="hidden" name="{{ $users->id }}" value="{{ $users->id }}"> --}}
          <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pasien"
              value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="email">Email User</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email User"
              value="{{ $user->email }}">
          </div>
          <div class="form-group">
            <label for="role">Role Dokter</label>
            <select name="role" class="form-control" id="role">
              <option value="admin" {{($user->role === 'admin') ? 'Selected' : ''}}>admin</option>
              <option value="dokter" {{($user->role === 'dokter') ? 'Selected' : ''}}>dokter</option>
              {{-- <option value="pasien" {{($user->role === 'pasien') ? 'Selected' : ''}}>pasien</option> --}}
            </select>
          </div>
          <button type="submit" class="btn btn-info">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection