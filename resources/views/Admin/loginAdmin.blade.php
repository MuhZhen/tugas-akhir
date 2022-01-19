<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPK Bantuan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<style>
    .background{
        background-color: #872bf0;

    }

    .bg-login {
        background: url("../img/admin.jpg");
        background-position: center;
        background-size: cover;
    }

        .btn-primaryadmin {
          color: #fff;
          background-color: #872bf0;
          border-color: #872bf0;
        }

        .btn-primaryadmin:hover {
          color: #fff;
          background-color: #651cb9;
          border-color: #651cb9;
        }

        .btn-primaryadmin:focus, .btn-primary.focus {
          color: #fff;
          background-color: #2e59d9;
          border-color: #2653d4;
          box-shadow: 0 0 0 0.2rem rgba(105, 136, 228, 0.5);
        }

        
    }
</style>

<body class="background">

  <div class="container">
 
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9 ">
      @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang! di Aplikasi SPK Bantuan Sekolah Situasi Darurat</h1>
                  </div>
                  <form class="user" action="/login-admin" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                      <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" id="myInput" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <br>
                      <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>
                    

                    <button type ="submit" class="btn btn-primaryadmin btn-user btn-block">Login</button>

                    <!-- <a href="{{url('kondisi-sekolah')}}" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                 
                  </form>
                  <div class="text-center">
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script>
        function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
