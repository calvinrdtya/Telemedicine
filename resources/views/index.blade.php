@extends('layouts.main_tailwind')
@section('container')

<style>
  .bg {
    margin-left: 50%;
    width: 50%;
    /* margin-top: 10px; */
    background-image: url(img/pr.avif);
    background-size: cover;
    background-position: center;
    text-align: center;
    height: 670px;
  }
  .hero {
    margin-top: -35%;
  }
  .btn-1 {
    width: 23%;
    margin-top: 25px;
    /* margin-left: 55%; */
    padding: 10px;
    background-color: #01b597;
    border: 3px solid #01b597;
    color: white;
    margin-right: 20px;
    font-family: 'Poppins', sans-serif;
  }

  .btn-1:hover {
    background-color: white;
    color: #01b597;
    transition: .3s;
  }

  .btn-2 {
    width: 30%;
    padding: 10px;
    border: 3px solid #01b597;
    color: #01b597;
    font-family: 'Poppins', sans-serif;
  }

  .btn-2:hover {
    background-color: #01b597;
    color: white;
    transition: .3s;
  }

</style>

  <!-- hero -->
  {{-- <img src="img/dokter-1.avif" class="bg" alt=""> --}}
  <div class="bg animate__animated animate__fadeInRightBig"></div>
  <section id="hero" class="hero pb-16">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full px-4 mt-20 mb-10 lg:w-1/2">
          {{-- <h2 class="max-w-lg mb-5 text-4xl  font-bold text-blue dark:text-white lg:text-5xl text-dark animate__animated animate__fadeInLeft">Klinik V-Medika </h2> --}}
          <h2 class="max-w-lg mb-5 text-2xl  font-bold text-blue dark:text-white lg:text-5xl text-primary animate__animated animate__fadeInLeft">Solusi Permasalahan Kesehatan Anda</h2>
          <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Terpercaya</p>
          <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Pelayanan Terbaik</p>
          <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Dokter Yang Berpengalaman</p>
          {{-- <p class="font-bold text-2xl animate__animated animate__fadeInLeft">Kenyamanan Pasien Prioritas Kami</p> --}}
          <button class="btn-1 rounded-md font-bold animate__animated animate__fadeInLeft">Selengkapnya</button>
          <a href="{{ route('login') }}" class="btn-2 rounded-md font-bold animate__animated animate__fadeInLeft">Konsultasi</a>
        </div>
      </div>
    </div>
  </section>
  <!-- hero end -->

  <section id="about" class="pt-36">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full px-4 lg:w-1/2">
          <h3 class="mb-4 text-2xl font-semibold text-primary dark:text-white lg:pt-10 lg:text-3xl">V-Medika</h3>
          <p class="mb-6 text-base font-medium text-secondary lg:text-lg">
            V-Medika adalah Sistem Manajemen Informasi Poliklinik Berbasis Website yang mengelola tentang proses menerima, mengolah dan menampilkan data-data terkait pelayanan terhadap pasien.
          </p>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <h3 class="mb-4 text-2xl font-semibold text-dark dark:text-white lg:pt-10 lg:text-3xl">Konsultasikan Dengan Kami</h3>
          <p class="mb-6 text-base font-medium text-secondary lg:text-lg">
            Website V-Medika menyediakan fitur konsultasi pasien yang dimana pasien bisa mengkonsultasikan keluhan pasien dengan dokter yang berpengalaman dan ahli di bidangnya.
          </p>
        </div>
        
      </div>
    </div>
  </section>

  <section id="artikel" class="pb-16 pt-24 dark:bg-dark">
    <div class="container">
      <div class="w-full px-4">
        <div class="max-w-xl mx-auto mb-16 text-center">
          <h2 class="mb-4 text-2xl font-bold text-primary sm:text-4xl lg:text-5xl">Artikel Kesehatan</h2>
      </div>

      <div class="flex flex-wrap">
        <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
          <div class="mb-10 overflow-hidden bg-white shadow-lg rounded-xl dark:bg-slate-800">
            <img src="img/rokok.png" alt="Programming" class="w-full" />
            <div class="px-6 py-8">
              <h3>
                <a href="#" class="block mb-3 text-xl font-semibold  text-dark hover:text-primary dark:text-white">Perokok Pasif Apakah Lebih Berbahaya?</a>
              </h3>
              <p class="mb-6 text-base font-medium text-secondary">Merokok Memyebabkan berbagai macam penyakit</p>
              <a href="#" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:opacity-80">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
          <div class="mb-10 overflow-hidden bg-white shadow-lg rounded-xl dark:bg-slate-800">
            <img src="img/rokok.png" alt="Programming" class="w-full" />
            <div class="px-6 py-8">
              <h3>
                <a href="#" class="block mb-3 text-xl font-semibold  text-dark hover:text-primary dark:text-white">Perokok Pasif Apakah Lebih Berbahaya?</a>
              </h3>
              <p class="mb-6 text-base font-medium text-secondary">Merokok Memyebabkan berbagai macam penyakit</p>
              <a href="#" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:opacity-80">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
          <div class="mb-10 overflow-hidden bg-white shadow-lg rounded-xl dark:bg-slate-800">
            <img src="img/rokok.png" alt="Programming" class="w-full" />
            <div class="px-6 py-8">
              <h3>
                <a href="#" class="block mb-3 text-xl font-semibold  text-dark hover:text-primary dark:text-white">Perokok Pasif Apakah Lebih Berbahaya?</a>
              </h3>
              <p class="mb-6 text-base font-medium text-secondary">Merokok Memyebabkan berbagai macam penyakit</p>
              <a href="#" class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:opacity-80">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- <section id="artikel" class="pb-16" style="margin-top: 10%;">
      <div class="container">
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto mb-16 text-center">
            <h4 class="mb-2 text-lg font-semibold text-primary">Artikel Kesehatan</h4>
            <h2 class="mb-4 text-3xl font-bold text-primary dark:text-white sm:text-4xl lg:text-5xl">Artikel Kesehatan</h2>
            <p class="font-medium text-md text-secondary md:text-lg">
              <!-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus porro consequuntur alias, commodi nemo enim aliquam ipsam obcaecati? Assumenda, ipsam? -->
            </p>
          </div>
        </div>

        <div class="flex flex-wrap justify-center w-full px-4 xl:mx-auto xl:w-10/12">
          <div class="p-4 mb-12 md:w-1/2">
            <div class="overflow-hidden rounded-md shadow-md">
              <img src="dist/img/portfolio/websekolah.JPG" alt="Landing Page" width="w-full" />
            </div>
            <h3 class="mt-5 mb-3 text-xl font-semibold text-dark dark:text-white">Website Sekolah</h3>
            <p class="text-base font-medium text-secondary">Project membuat web sekolah dengan laravel 8 </p>
          </div>
          <div class="p-4 mb-12 md:w-1/2">
            <div class="overflow-hidden rounded-md shadow-md">
              <img src="dist/img/portfolio/inicio.JPG" alt="E-Commerce" width="w-full" />
            </div>
            <h3 class="mt-5 mb-3 text-xl font-semibold text-dark dark:text-white">Website HealthTIFY</h3>
            <p class="text-base font-medium text-secondary">Membuat website untuk lomba yang bertema HealthyCare</p>
          </div>
          <div class="p-4 mb-12 md:w-1/2">
            <div class="overflow-hidden rounded-md shadow-md">
              <img src="dist/img/portfolio/box.JPG" alt="Technical Documentation" width="w-full" />
            </div>
            <h3 class="mt-5 mb-3 text-xl font-semibold text-dark dark:text-white">Project Social Media</h3>
            <p class="text-base font-medium text-secondary">Project membuat sosial media seperti Instagram dari Codeigniter 3</p>
          </div>
          <div class="p-4 mb-12 md:w-1/2">
            <div class="overflow-hidden rounded-md shadow-md">
              <img src="dist/img/portfolio/avalon.JPG" alt="Tribute Page" width="w-full" />
            </div>
            <h3 class="mt-5 mb-3 text-xl font-semibold text-dark dark:text-white">Website Avalon</h3>
            <p class="text-base font-medium text-secondary">Membuat Website untuk lomba</p>
          </div>
        </div>
      </div>
    </section> --}}

 


@endsection
