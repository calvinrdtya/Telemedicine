@extends('layouts.main')
@section('content')

<style>
.modal-confirm {		
	color: #636363;
	/* width: 400px; */
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;		
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}		
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	min-height: 40px;
	border-radius: 3px;
	margin: 0 5px;
}
.modal-confirm .btn-secondary {
	background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
	background: #a8a8a8;
}
.modal-confirm .btn-danger {
	background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
	background: #ee3535;
}
.trigger-btn {
	/* display: inline-block; */
	margin: 10px auto;
}
</style>

<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="">
            <i class="fas fa-users mr-2"></i>
            Profil
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">
            <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
            Setting
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" data-toggle="modal" data-target="#logoutModal">
            @csrf
          </form>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>            
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" data-toggle="modal" data-target="#logoutModal">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>


  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h3 mb-0 text-gray-800 font-weight-bold">{{ Auth::user()->admin }}</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Rincian</a> --}}
    </div>

    @if (Auth::user()->role == 'admin')
    <div class="row">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Dokter</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dokters }}</div>
                <small><a href="{{ route('admin-dokter.index') }}" class="text-primary">See details..</a></small>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pasien</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pasien }}</div>
                  </div>
                  <div class="col"></div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x fa-prescription-bottle-alt"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Obat</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $obats }}</div>
                    <small><a href="{{ route('obat.index') }}" class="text-primary">See details..</a></small>
                  </div>
                  {{-- <div class="col"></div> --}}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-2x fa-tablets"></i>
                {{-- <i class="fas fa-2x fa-prescription-bottle-alt"></i> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif


    @if (Auth::user()->role == 'dokter')
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Semua Pasien 
            <span>
              <a href="{{ route('pasien.create') }}" class="btn btn-info ml-4 font-weight-bold">
                + Tambah Pasien
              </a>
            </span>
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama Pasien</th>
                  <th>Alamat Pasien</th>
                  <th>Tanggal Datang</th>
                  <th>Keluhan</th>
                  <th>No Telepon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pasiens as $p)
                {{-- @foreach ($pemeriksaans as $pm) --}}
                <tr>
                  <td>{{ $p->nama_pasien }}</td>
                  <td>{{ $p->alamat_pasien }}</td>
                  <td>{{ $p->created_at }}</td>
                  <td>{{ $p->keluhan_pasien }}</td>
                  <td>{{ $p->no_telp }}</td>
                  <td>
                    <div class="row">
                    <span class="btn-col" align="center" style="vertical-align: middle;">
                      <a class="badge badge-info btn-info" href="{{ route('pemeriksaan.show', $p->id ) }}" role="button">Info &nbsp;<i class="fas fa-info-circle"></i></a>
                    </span>
                    {{-- <span class="btn-col" align="center" style="vertical-align: middle;">
                      <a class="badge badge-primary btn-info" href="{{ route('pemeriksaan.create', $p->id ) }}" role="button">Add &nbsp;<i class="fas fa-info-circle"></i></a>
                      <a class="badge badge-primary btn-info" href="pemeriksaan.create/{{ $d->id }}/{{ $p->id}}" role="button">Add &nbsp;<i class="fas fa-info-circle"></i></a>
                    </span> --}}
                    
                    <span class="btn-col ml-2" align="center" style="vertical-align: middle;">
                      <form action="{{ route('pasien.destroy', $p->id) }}" method="post">
                        @method('delete')
                        @csrf
                      <button onclick="return confirm('Hapus Data Pasien?')" class="badge badge-danger trigger-btn" type="submit">Hapus</button>
                      </form>
                    </span>
                  </div>
                    {{-- <span class="btn-col" align="center" style="vertical-align: middle;">
                      <button type="submit" href="" data-toggle="modal" class="badge badge-danger trigger-btn" style="border-color: red">Hapus &nbsp;<i class="fas fa-trash-alt"></i></button>
                    </span> --}}
                    {{-- </form> --}}
                    {{-- <span>
                      <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
                    </span> --}}
                    {{-- <span>
                      <a href="{{ route('pemeriksaan.index', $p->id) }}" class="btn btn-success">
                        Info
                      </a>
                    </span> --}}
                      {{-- <form action="{{ route('pasien.destroy', $p->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <span><button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block" type="submit">Hapus</button></span>
                      </form> --}}
                    </td>
                  </tr>
                  @endforeach
                  {{-- @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @endif
    @if (Auth::user()->role == 'admin')
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Semua Pasien 
            <span>
              <a href="{{ route('pasien.create') }}" class="btn btn-info ml-4 font-weight-bold">
                + Tambah Pasien
              </a>
            </span>
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  {{-- <th>Id</th> --}}
                  <th>Nama Pasien</th>
                  <th>Alamat Pasien</th>
                  <th>Tanggal Datang</th>
                  <th>Keluhan</th>
                  <th>No Telepon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pasiens as $p)
                {{-- @foreach ($pemeriksaans as $pm) --}}
                <tr>
                  {{-- <td>{{ $p->pasien_id }}</td> --}}
                  <td>{{ $p->nama_pasien }}</td>
                  <td>{{ $p->alamat_pasien }}</td>
                  <td>{{ $p->created_at }}</td>
                  <td>{{ $p->keluhan_pasien }}</td>
                  <td>{{ $p->no_telp }}</td>
                  <td>
                    <div class="row">
                    <span class="btn-col mt-2" align="center" style="vertical-align: middle;">
                      <a class="badge badge-primary btn-info" href="{{ route('pemeriksaan.show', $p->id) }}" role="button">Info &nbsp;<i class="fas fa-info-circle"></i></a>
                    </span>
                   
                    <span class="btn-col ml-2" align="center" style="vertical-align: middle;">
                      <form action="{{ route('pasien.destroy', $p->id) }}" method="post">
                        @method('delete')
                        @csrf
                      <button onclick="return confirm('Hapus Data Pasien?')" class="badge badge-danger trigger-btn" type="submit">Hapus</button>
                      </form>
                    </span>
                  </div>
                    {{-- <span class="btn-col" align="center" style="vertical-align: middle;">
                      <button type="submit" href="#myModal" data-toggle="modal" class="badge badge-danger trigger-btn" style="border-color: red">Hapus &nbsp;<i class="fas fa-trash-alt"></i></button>
                    </span> --}}
                    {{-- </form> --}}
                    {{-- <span>
                      <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
                    </span> --}}
                    {{-- <span>
                      <a href="{{ route('pemeriksaan.index', $p->id) }}" class="btn btn-success">
                        Info
                      </a>
                    </span> --}}
                      {{-- <form action="{{ route('pasien.destroy', $p->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <span><button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block" type="submit">Hapus</button></span>
                      </form> --}}
                    </td>
                  </tr>
                  @endforeach
                  {{-- @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @endif
  @endsection

<!-- Modal HTML -->
{{-- <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				  <h4 class="modal-title w-100">Are you sure?</h4>	
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  </div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        @foreach($pasiens as $p)
        <form action="{{ route('pasien.destroy', $p->id) }}" method="post">
          @method('delete')
          @csrf
				<button type="submit" class="btn btn-danger">Delete</button>
        </form>
        @endforeach
			</div>
		</div>
	</div>
</div>      --}}