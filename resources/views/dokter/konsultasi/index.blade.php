@extends('dokter.layouts.app')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            @include('dokter.layouts.sidebar')
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                @include('dokter.layouts.navbar')
            </nav>

            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold">Konsultasi</h4>

                    <!-- Basic Bootstrap Table -->
                    @include('dokter.message')
                    <div class="card">
                        {{-- <div class="d-flex align-items-center">
                            <h5 class="card-header">Category</h5>
                            <a href="{{ route('mitra.category.create') }}" class="btn btn-sm btn-primary">
                                Add Kategori
                            </a>
                        </div> --}}
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-header mb-0">Konsultasikan Keluhan Anda</h5>
                            <div class="d-flex align-items-center">
                                <button data-bs-toggle="modal" data-bs-target="#addKonsultasi" class="btn btn-sm btn-primary me-3">
                                    Konsultasi
                                </button>                                
                                <div class="nav-item d-flex align-items-center">
                                    <i class="bx bx-search fs-4 lh-0 me-2"></i>
                                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Dibuat Pada</th>
                                        <th>Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($screenings as $index=> $screening)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $screening->nama_dokter }}</td>
                                            <td>{{ $screening->spesialiasi_dokter }}</td>
                                            <td>{{ $screening->tgl_perjanjian }}</td>
                                            <td>{{ \Carbon\Carbon::parse($screening->waktu_perjanjian)->format('H:i') }}</td>
                                            <td>
                                                {{-- <a href="{{ route('konsultasi.edit', $screening->id) }}" type="button" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class='bx bx-edit-alt'></i>&nbsp;Edit
                                                </a> --}}
                                                <form action="{{ route('konsultasi.destroy', $screening->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i>&nbsp;Hapus</button>
                                                </form>                                                
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
    </div>

    <!-- Modal Add Konsultasi -->
    <div class="modal fade" id="addKonsultasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Tambah Konsultasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('konsultasi.store') }}" method="post">
                        @csrf
                        <div class="form-group my-2">
                            <label for="nama_dokter">Nama Dokter</label>
                            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="spesialiasi_dokter">Spesialiasi Dokter</label>
                            <input type="text" name="spesialiasi_dokter" id="spesialiasi_dokter" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="tgl_perjanjian">Tanggal Perjanjian</label>
                            <input type="date" name="tgl_perjanjian" id="tgl_perjanjian" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="waktu_perjanjian">Waktu Perjanjian</label>
                            <input type="time" name="waktu_perjanjian" id="waktu_perjanjian" class="form-control" required>
                        </div>
                        <input type="hidden" name="pasien_id" value="{{ auth()->user()->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Edit Category -->
    {{-- @foreach ($categories as $category)
    <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryLabel{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryLabel{{ $category->id }}">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm{{ $category->id }}" action="{{ route('mitra.category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="col mb-3">
                                <label for="editName" class="form-label">Nama Kategori</label>
                                <input type="text" name="name" id="editName{{ $category->id }}" class="form-control" value="{{ $category->name }}">
                            </div>
                            <div class="col mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select name="status" id="editStatus{{ $category->id }}" class="form-select">
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Hide</option>
                                </select>
                            </div>
                        <div class="modal-footer p-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="history.back()">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach --}}

    <!-- {{-- Modal Add Category --}}
    <div class="modal fade" id="addCategory" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama Category</label>
                                <input type="text" name="name" id="name" class="form-control" value="" />
                            </div>
                            <div class="col mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="showHome" class="form-label">Tampilkan di Web</label>
                                <select name="showHome" id="showHome" class="form-select">
                                    <option value="Yes">Ya</option>
                                    <option value="No">Tidak</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1">Publish</option>
                                    <option value="0">Hide</option>
                                </select>   
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div> -->

{{-- <div class="modal fade" id="modalKategori" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('mitra.category.create.motor') }}">
                            <div class="card d-flex">
                                <h5 class="card-header mb-0">Motor</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('mitra.category.create.mobil') }}">
                            <div class="card">
                                <h5 class="card-header mb-0">Mobil</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
</script>

@endsection