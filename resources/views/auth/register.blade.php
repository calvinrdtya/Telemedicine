<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

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

  .bg {
    background-image: url('img/bg.avif');
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
    color: #ffffff
  }

  .bck {
    background-color: #14B6A8;

  }
  .bck:hover {
    background-color: #14B8C6;
  }
</style>

<body class="bg">

  <div class="container" >
    <div class="card o-hidden border-0 shadow-lg" style="margin-top: 70px" >
      <div class="card-body p-0" style="height: 500px">
        <div class="row" >
            <div class="col-lg-6" >
              <a href="{{ route('login') }}" class="btn bck mt-3 ml-3 font-weight-bold" style="color: #FFF"><i class="fas fa-arrow-left" ></i> Back</a>
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-3 font-weight-bold" style="margin-top: -10%;">Create an Account!</h1>
                </div>
                <form action="{{ route('register') }}" method="POST" class="user" enctype="multipart/form-data">
                  @csrf
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <span class="text-gray-900 ml-2">Nama Lengkap</span>
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              <div class="form-group">
                <span class="text-gray-900 ml-2">Email</span>
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" placeholder="Alamat Email" value="{{ old('email') }}">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group row">
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
                  {{-- <input type="password" class="form-control form-control-user input-pass" name="password" id="password" placeholder="Password"> --}}
                </div>
                <div class="col-sm-6 form-password">
                  <span class="text-gray-900 ml-2">Repeat Password</span>
                  <i class="fas fa-eye showPass" id="showPass1" onclick="showPass(this.id)"></i>
                  <i class=" fas fa-eye-slash hidePass" id="hidePass1" onclick="hidePass(this.id)"></i>
                  <input type="password" class="form-control input-pass form-control-user" id="exampleRepeatPassword" name="password_confirmation" placeholder="Repeat Password">
                  {{-- <input type="password" class="form-control form-control-user input-pass" name="repeat_pass" id="repeat_pass" placeholder="Repeat Password"> --}}
                </div>
              </div>
              <button type="submit" class="btn-submit btn-user btn-block">Register Account</button>
            </form>
            <hr>
            {{-- <div class="text-center">
              <a class="small" href="">Forgot Password?</a>
            </div> --}}
            <div class="text-center">
              <span class="small">Sudah Punya Akun? &nbsp;
                <a href="{{ route('login') }}">Login!</a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-lg-block">
          <img src="img/pp.avif" width="100%" height="100%">
        </div>
      </div>
    </div>
  </div>
</div>



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

  {{-- <div class="container">
    <div class="card o-hidden border-0 shadow-lg" style="margin-top: 80px">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
            <img src="img/registrasi.webp" alt="" width="100%">
          </div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Create an Account!</h1>
                </div>
              <form class="user" action="#" method="POST" autocomplete="off">
                <div class="form-group">
                  <span class="text-gray-900">Nama Lengkap</span>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="">
                </div>
                <div class="form-group">
                  <span class="text-gray-900">Alamat Email</span>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 form-password">
                    <span class="text-gray-900">Password</span>
                    <i class="fas fa-eye showPass" id="show" value="Show Password" oonclick="showPass(this.id)"></i>
                    <i class="fas fa-eye-slash hidePass" style="display:none" id="hide" value="Hide Password" onclick="HidePassword()"></i>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Password" id="show" onclick="ShowPassword()">
                  </div>
                <div class="col-sm-6 form-password">
                  <span class="text-gray-900">Repeat Password</span>
                  <i class="fas fa-eye showPass"></i>
                  <i class=" fas fa-eye-slash hidePass"></i>
                  <input type="password" class="form-control" name="repeat_pass" id="repeat_pass" placeholder="Repeat Password">
                </div>
              </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
              </form>
              <hr>
                <div class="text-center">
      
                </div>
              <div class="text-center">
                <span class="small">Already have an account?&nbsp;<a href="#">Login!</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>