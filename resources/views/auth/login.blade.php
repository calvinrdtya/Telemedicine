<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>V-Medika | Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    .form-password {
      position: relative;
    }
  
    .hidePass {
      opacity: 0;
      pointer-events: none;
    }
  
  
    .whenPassError {
      top: 35% !important;
    }
  
    .showPass,
    .hidePass {
      transition: .2s ease-in-out;
      color: #343A40;
      cursor: pointer;
      font-size: 22px;
      position: absolute;
      z-index: 9999;
      right: 28px;
      top: 65%;
      transform: translateY(-50%);
    }

    .bg-clinic {
      background-size: cover;
      background-position: center;
    }
    .btn-submit {
      border: 1px #14B6A8;
      background-color: #14B8A6;
      color: #ffffff
    }
    .btn-submit:hover {
      background-color: #14B8C6;
      color: #FFFF;
    }
    .bck {
      background-color: #14B6A8;
      margin-left: -100%;
    }
    .bck:hover {
      background-color: #14B8C6;
      color: #FFF;
    }
  </style>


</head>

<body class="bg-clinic" style="background-image: url('/img/bg.avif')">

  <div class="container" >
    <!-- Outer Row -->
      {{-- <h1 class="text-center mt-5 font-weight-bold text-monospace text-bold">Login or Registered</span></h1> --}}
        <div class="row justify-content-center" style="margin-top: 9%;">
          <div class="col-xl-10 col-lg-12 col-md-9 mb-2">

            <div class="card o-hidden border-0 shadow-lg mt-3">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                      <img src="img/dok.avif" alt="" width="110%" height="100%">
                    </div>
                      <div class="col-lg-6">
                        <a href="/" class="btn bck mt-3 font-weight-bold" style="color: #FFF"><i class="fas fa-arrow-left" ></i> Back</a>
                        <div class="p-5">
                          <div class="text-center" style="margin-top: -40px;">
                            <h1 class="h4 text-gray-900 font-weight-bold">Login</h1>
                          </div>
                          <form class="user" method="POST" action="{{ route('login') }}" enctype="application/x-www-form-urlencoded">
                            @csrf
                              <div class="form-group">
                                <span class="text-gray-900 ml-2">Email</span>
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            <div class="form-group form-password">
                              <span class="text-gray-900 ml-2">Password</span>
                                <input type="password" class="form-control input-pass form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" name="password" placeholder="Password">
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                <i class="fas fa-eye showPass" id="showPass0" onclick="showPass(this.id)"></i>
                                <i class="fas fa-eye-slash hidePass" id="hidePass0" onclick="hidePass(this.id)"></i>
                            </div>
                            <button type="submit" class="btn-submit btn-user btn-block">Login</button>
                            <hr>
                          </form>
                        <div class="text-center">
                       
                        </div>
                        <div class="text-center">
                          <a class="small text-dark" onclick="history.back()" href="">&nbsp; Back to Home</a>
                          <a class="small" href="{{ route('register') }}">Buat Akun</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 

  {{-- <div class="container mt-3">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="img/dokter-1.avif" alt="" width="100%" height="100%">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan login terlebih dahulu</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}" enctype="application/x-www-form-urlencoded">
                    @csrf
                    <div class="form-group">
                      <span class="text-gray-900 ml-2">Email</span>
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <div class="col-sm-6 mb-3 mb-sm-0 form-password">
                        <span class="text-gray-900 ml-2">Password</span>
                        <input type="password" class="form-control input-pass form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" name="password" placeholder="Password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        <i class="fas fa-eye showPass" id="showPass0" onclick="showPass(this.id)"></i>
                        <i class="fas fa-eye-slash hidePass" id="hidePass0" onclick="hidePass(this.id)"></i>
                        <input type="password" class="form-control form-control-user input-pass" name="password" id="password" placeholder="Password">
                      </div>
                      <input type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="remember" class="custom-control-input" id="customCheck"
                          {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                 <div class="text-center">
                    
                  </div> 
                  <div class="text-center">
                    <a class="small text-dark" onclick="history.back()" href="">&nbsp; Back to Home</a>
                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <script>
    let showPassEye = document.getElementsByClassName('showPass');
    let hidePassEye = document.getElementsByClassName('hidePass');
    let formPass = document.getElementsByClassName('input-pass');
  
    function showPass(id) {
      const idx = id.replace('showPass', '').trim();
      showPassEye[idx].style.opacity = "0";
      showPassEye[idx].style.pointerEvents = "none";
      hidePassEye[idx].style.opacity = "1";
      hidePassEye[idx].style.pointerEvents = "all";
      formPass[idx].type = "text";
    }
  
    function hidePass(id) {
      const idx = id.replace('hidePass', '').trim();
      hidePassEye[idx].style.opacity = "0";
      hidePassEye[idx].style.pointerEvents = "none";
      showPassEye[idx].style.opacity = "1";
      showPassEye[idx].style.pointerEvents = "all";
      formPass[idx].type = "password";
    }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>