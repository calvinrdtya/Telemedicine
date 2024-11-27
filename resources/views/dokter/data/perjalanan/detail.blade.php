@extends('mitra.layouts.app')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                @include('mitra.layouts.sidebar')
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    @include('mitra.layouts.navbar')
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold">Detail Perjalanan</h4>
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('mitra.perjalanan.update', $perjalanan->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card mb-4">
                                        <h5 class="card-header">Informasi Perjalanan</h5>
                                        <div class="card-body">

                                            <div class="row cols-2">
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="title" class="form-label">Destinasi</label>
                                                    <input class="form-control" type="text" id="title" name="title"
                                                        value="{{ $perjalanan->title }}">
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="kota" class="form-label">Kota</label>
                                                    <input class="form-control" type="text" id="kota" name="kota"
                                                        value="{{ $perjalanan->kota }}">
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="category_id" class="form-label">Kategori</label>
                                                    <select class="form-control" name="category_id" id="category_id">
                                                        <option value="" selected disabled>Pilih Kategori:</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ $perjalanan->category_id == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="highlight" class="form-label">Unggulan</label>
                                                    <input class="form-control" type="text" id="highlight"
                                                        name="highlight" value="{{ $perjalanan->highlight }}">
                                                    <div class="form-text">Pisahkan dengan tanda koma (,)
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="durasi" class="form-label">Durasi</label>
                                                    <input class="form-control" type="text" id="durasi" name="durasi"
                                                        value="{{ $perjalanan->durasi }}">
                                                    <div class="form-text">Contoh: 2 Hari 1 Malam
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="titik" class="form-label">Titik Pertemuan</label>
                                                    <input class="form-control" type="text" id="titik" name="titik"
                                                        value="{{ $perjalanan->titik }}">
                                                    <div class="form-text">Pisahkan dengan tanda koma (,)
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="qty" class="form-label">Batas Per Hari</label>
                                                    <input class="form-control" type="number" id="qty" name="qty"
                                                        value="{{ $perjalanan->qty }}" min="0">
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="fasilitas" class="form-label">Fasilitas</label>
                                                    <input class="form-control" type="text" id="fasilitas"
                                                        name="fasilitas" value="{{ $perjalanan->fasilitas }}">
                                                    <div class="form-text">Pisahkan dengan tanda koma (,)
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="include" class="form-label">Sudah Termasuk</label>
                                                    <input class="form-control" type="text" id="include" name="include"
                                                        value="{{ $perjalanan->include }}">
                                                    <div class="form-text">Pisahkan dengan tanda koma (,)
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="exclude" class="form-label">Belum Termasuk</label>
                                                    <input class="form-control" type="text" id="exclude"
                                                        name="exclude" value="{{ $perjalanan->exclude }}">
                                                    <div class="form-text">Pisahkan dengan tanda koma
                                                        (,)</div>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="jenis" class="form-label">Jenis Perjalanan</label>
                                                    <select class="form-control" name="jenis" id="jenis">
                                                        <option value="" selected disabled>Pilih Jenis:</option>
                                                        <option value="open"
                                                            {{ $perjalanan->jenis == 'open' ? 'selected' : '' }}>Open
                                                        </option>
                                                        <option value="private"
                                                            {{ $perjalanan->jenis == 'private' ? 'selected' : '' }}>Private
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="shipping_return" class="form-label">Pengembalian</label>
                                                    <select class="form-control" name="shipping_return"
                                                        id="shipping_return">
                                                        <option value="" selected disabled>Pilih Pengembalian:
                                                        </option>
                                                        <option value="1"
                                                            {{ $perjalanan->shipping_return == '1' ? 'selected' : '' }}>Ya
                                                        </option>
                                                        <option value="0"
                                                            {{ $perjalanan->shipping_return == '0' ? 'selected' : '' }}>
                                                            Tidak
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="" selected disabled>Pilih Status:</option>
                                                        <option value="1"
                                                            {{ $perjalanan->status == '1' ? 'selected' : '' }}>Aktif
                                                        </option>
                                                        <option value="0"
                                                            {{ $perjalanan->status == '0' ? 'selected' : '' }}>Tidak
                                                            Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="tanggal_perjalanan" class="form-label">Rentang
                                                        Tanggal</label>
                                                    <input class="form-control" type="text" id="tanggal_perjalanan"
                                                        name="tanggal_perjalanan"
                                                        value="{{ $perjalanan->tanggal_perjalanan }}">
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="price" class="form-label">Biaya</label>
                                                    <input class="form-control" type="text" id="price"
                                                        name="price" value="{{ $perjalanan->price }}">
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="price_discount" class="form-label">Diskon
                                                        (0-100)</label>
                                                    <input class="form-control" type="number" id="price_discount"
                                                        name="price_discount" value="{{ $perjalanan->price_discount }}">
                                                </div>
                                                <div class="col-lg-6 form-group mb-2">
                                                    <label for="final_price" class="form-label">Total Biaya</label>
                                                    <input class="form-control" type="text" id="final_price"
                                                        name="final_price" readonly>
                                                </div>
                                                <div class="col form-group mb-2">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" class="form-label">{{ $perjalanan->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header d-flex justify-content-between">
                                            Rencana Perjalanan
                                            <div class="d-flex">
                                                <div class="btn btn-primary btn-sm" onclick="addItineraryRow()">
                                                    Tambah
                                                </div>
                                            </div>
                                        </h5>
                                        <div class="card-body" id="itinerary-container">
                                            @foreach ($perjalanan->itinerary as $itinerary)
                                                <div class="row align-items-end">
                                                    <div class="col-lg-4 form-group mb-2">
                                                        <label for="judul_rencana" class="form-label">Judul
                                                            Rencana</label>
                                                        <input class="form-control" type="text" id="judul_rencana"
                                                            name="judul_rencana[]" value="{{ $itinerary['judul'] }}">
                                                    </div>
                                                    <div class="col-lg-5 form-group mb-2">
                                                        <label for="deskripsi_rencana" class="form-label">Deskripsi
                                                            Rencana</label>
                                                        <input class="form-control" type="text" id="deskripsi_rencana"
                                                            name="deskripsi_rencana[]"
                                                            value="{{ $itinerary['deskripsi'] }}">
                                                    </div>
                                                    <div class="col-lg-2 form-group mb-2">
                                                        <label for="waktu_rencana" class="form-label">Waktu
                                                            Rencana</label>
                                                        <input class="form-control timepicker" type="time"
                                                            id="waktu_rencana" name="waktu_rencana[]"
                                                            value="{{ $itinerary['waktu'] }}">
                                                    </div>
                                                    <div class="col mb-2">
                                                        <div class="btn btn-danger btn-sm"
                                                            onclick="removeItineraryRow(this)">
                                                            Hapus
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="card mb-4">
                                        <h5 class="card-header d-flex justify-content-between">
                                            Galeri
                                            <div class="d-flex">
                                                <div class="btn btn-primary btn-sm" onclick="addDropzone()">
                                                    Tambah
                                                </div>
                                            </div>
                                        </h5>
                                        <div class="card-body">
                                            <div class="row" id="dropzone-container">
                                                <div class="col-lg-4 mb-2">
                                                    <div class="dropzone border rounded p-3 d-flex align-items-center justify-content-center flex-column"
                                                        style="min-height: 150px; cursor: pointer; position: relative;"
                                                        onclick="triggerFileUpload(this)">
                                                        <span>Tambah Gambar Unggulan</span>
                                                        <input class="form-control" type="file" name="thumbnail"
                                                            style="display:none;" onchange="previewImage(event, this)" accept="image/jpeg, image/png, image/jpg" />
                                                        <img src="" alt="Image Preview" class="d-none"
                                                            width="50%">
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm mt-2 float-end d-none"
                                                        onclick="deleteImage(this)">Hapus</button>
                                                </div>
                                                @foreach ($perjalanan->images as $image)
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="dropzone border rounded p-3 d-flex align-items-center justify-content-center flex-column"
                                                            style="min-height: 150px; cursor: pointer; position: relative;"
                                                            onclick="triggerFileUpload(this)">
                                                            <span>Tambah Gambar Pendukung</span>
                                                            <input class="form-control" type="file" name="images[]"
                                                                style="display:none;"
                                                                onchange="previewImage(event, this)" accept="image/jpeg, image/png, image/jpg" />
                                                            <img src="" alt="Image Preview" class="d-none"
                                                                width="50%">
                                                            <input type="hidden" name="existing_images[]"
                                                                value="">
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm mt-2 float-end d-none"
                                                            onclick="deleteDropzone(this)">Hapus</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('mitra.perjalanan.index') }}" class="btn btn-secondary">
                                            Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary ms-2">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- / Content -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('mitra/js/perjalanan/detail.js') }}"></script>

    <script>
        $(function() {
            const today = moment().startOf("day");

            const startDate = "{{ $perjalanan->mulai_perjalanan }}";
            const endDate = "{{ $perjalanan->selesai_perjalanan }}";

            const existingStartDate = moment(startDate, "YYYY-MM-DD");
            const existingEndDate = moment(endDate, "YYYY-MM-DD");

            $('input[name="tanggal_perjalanan"]').daterangepicker({
                opens: "left",
                minDate: today,
                startDate: existingStartDate,
                endDate: existingEndDate,
                autoUpdateInput: true,
                locale: {
                    format: "DD MMMM, YYYY" // Format tampilan tanggal
                }
            });

            $('input[name="tanggal_perjalanan"]').on("apply.daterangepicker", function(ev, picker) {
                $(this).val(
                    `${picker.startDate.format("DD MMMM, YYYY")} - ${picker.endDate.format("DD MMMM, YYYY")}`
                );
            });

            $('input[name="tanggal_perjalanan"]').on("cancel.daterangepicker", function() {
                $(this).val("");
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Misalkan $imageUrls adalah array dari URL gambar yang didapat dari database
            let imageUrls = ["{{ $perjalanan->thumbnail }}"];

            @foreach ($perjalanan->images as $image)
                imageUrls.push("{{ $image }}");
            @endforeach

            // Loop melalui setiap URL dan setel di dropzone
            imageUrls.forEach((url, index) => {
                const dropzones = document.querySelectorAll('.dropzone');
                const dropzone = dropzones[index];
                const imgPreview = dropzone.querySelector("img");
                const deleteButton = dropzone.nextElementSibling;
                const dropzoneText = dropzone.querySelector("span");

                imgPreview.src = url; // Setel URL gambar
                imgPreview.classList.remove("d-none"); // Tampilkan gambar
                deleteButton.classList.remove("d-none"); // Tampilkan tombol hapus
                dropzoneText.classList.add("d-none"); // Sembunyikan teks dropzone

                if (index > 0) {
                    const hiddenInput = dropzone.querySelector('input[type="hidden"]');
                    hiddenInput.value = url; // Setel URL ke hidden input
                }
            });

        });
    </script>
@endsection
