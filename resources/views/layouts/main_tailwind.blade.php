<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>V-Medika | {{ $title }}</title>
    <link href="{{ asset('css/final.css') }}" rel="stylesheet" />
    <link href="{{ asset('css_tailwind/style.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('css_tailwind/map.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">


    <!-- animasi -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    
    <!-- javascript -->
    <script src="js/acc.js"></script>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@400;600&family=Aladin&family=Poppins&display=swap" rel="stylesheet" />

  </head>
<body>

    @include ('partials.navbar_tailwind')

    @yield('container')

    @include ('partials.footer_tailwind')
      
  <script src="{{ asset('js/script.js') }}"></script> 
  {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
  {{-- <script src="../path/to/flowbite/dist/datepicker.js"></script> --}}
  
    <script>
      AOS.init();
    </script>
  </body>
</html>