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
        background-color: #25b5f5;

    }
</style>

<body class="background">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9 ">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftarkan Sekolahmu! di Aplikasi SPK Bantuan Sekolah Situasi Darurat</h1>
                  </div>
                  <form action="{{url('/sekolah/daftar/tambah')}}" method="post">
                  @csrf
                    <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input class="form-control" type="text" name="nama" value="{{old('nama')}}">
                                <label @error('nama') class="text-danger" @enderror> @error('nama')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Nomor Induk Sekolah</label>
                                <input class="form-control" type="text" name="npsn" value="{{old('npsn')}}">
                                <label @error('npsn') class="text-danger" @enderror> @error('npsn')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                

                                <div class="form-group">
                                <label>Jenjang Pendidikan</label>
                                <select name="jpendidikan" class="form-control"  >
                                <option value="">--Pilih Jenjang Pendidikan--</option>
                                <option value="Sekolah Dasar">SD</option>
                                <option value="Sekolah Menengah Pertama">SMP</option>
                                <option value="Sekolah Menengah Atas">SMA</option>
                                </select>
                                <label @error('ssekolah') class="text-danger" @enderror> @error('ssekolah')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Status Sekolah</label>
                                <select name="ssekolah" class="form-control"  >
                                <option value="">--Pilih Status Sekolah--</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                                </select>
                                <label @error('ssekolah') class="text-danger" @enderror> @error('ssekolah')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" type="text" name="alamat" value="{{old('alamat')}}">
                                <label @error('alamat') class="text-danger" @enderror> @error('alamat')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" type="text" name="kecamatan" value="{{old('kecamatan')}}">
                                <label @error('kecamatan') class="text-danger" @enderror> @error('kecamatan')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Kabupaten</label>
                                <input class="form-control" type="text" name="kabupaten" value="{{old('kabupaten')}}">
                                <label @error('kabupaten') class="text-danger" @enderror> @error('kabupaten')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                

                                <div id="googleMap" style="width:100%;height:380px;"></div>

                                <br>

                                <div class="form-group">
                                <label>lintang</label>
                                <input class="form-control" type="text" id="lat" name="lintang" value="{{old('lintang')}}">
                                <label @error('lintang') class="text-danger" @enderror> @error('lintang')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Bujur</label>
                                <input class="form-control" type="text" id="lng" name="bujur" value="{{old('bujur')}}">
                                <label @error('bujur') class="text-danger" @enderror> @error('bujur')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Nomor Telpon</label>
                                <input class="form-control" type="text" name="ntelpon" value="{{old('ntelpon')}}">
                                <label @error('ntelpon') class="text-danger" @enderror> @error('ntelpon')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" value="{{old('password')}}" id="myInput">
                                
                                <label @error('password') class="text-danger" @enderror> @error('password')
                                  {{$message}}
                                @enderror</label>
                                <br>
                                <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                    

                    <button type ="submit" class="btn btn-primary btn-user btn-block">Daftar</button>

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

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWlbgIJFFT9C_Hd4dUVPIPToACAei7z6A"></script>
  <script>
      // variabel global marker
          var marker;
            
            function taruhMarker(peta, posisiTitik){
                
                if( marker ){
                  // pindahkan marker
                  marker.setPosition(posisiTitik);
                } else {
                  // buat marker baru
                  marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                  });
                }
              
                // isi nilai koordinat ke form
                document.getElementById("lat").value = posisiTitik.lat();
                document.getElementById("lng").value = posisiTitik.lng();
                
            }
              
            function initialize() {
              var propertiPeta = {
                center:new google.maps.LatLng(-0.7895597,119.7591871),
                zoom:9,
                mapTypeId:google.maps.MapTypeId.ROADMAP
              };
              
              var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
              
              // even listner ketika peta diklik
              google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
              });
            
            }
            
            
            // event jendela di-load  
            google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</body>

</html>
