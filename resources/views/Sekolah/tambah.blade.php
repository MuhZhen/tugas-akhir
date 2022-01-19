
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Dinas Pendidikan Provinsi</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<style>
    .button4 {background-color: #e7e7e7; color: black;}
</style>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Beranda -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin-beranda')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading Pengaturan SPK -->
      <div class="sidebar-heading">
        Pengaturan SPK
      </div>

      <!-- Nav Item - Atur Kriteria, Sub, Alternatif -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Atur</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Atur</h6>
            <a class="collapse-item" href="{{url('/admin/atur/kriteria')}}">Kriteria</a>
            <a class="collapse-item" href="{{url('/admin/atur/sub-kriteria')}}">Sub Kriteria</a>
            <a class="collapse-item" href="{{url('/admin/atur/alternatif')}}">Alternatif</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Proses SPK -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/proses-alternatif')}}">
          <i class="fas fa-fw fa fa-spinner"></i>
          <span>Proses SPK</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading Sekolah -->
      <div class="sidebar-heading">
        Sekolah
      </div>

      <!-- Nav Item - Data Sekolah -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin/sekolah')}}">
          <i class="fas fa-fw fas fa-user-alt"></i>
          <span>Data Sekolah</span></a>
      </li>

        <!-- Nav Item - Permintaan Sekolah -->
        <li class="nav-item">
        <a class="nav-link" href="{{url('admin/periode')}}">
          <i class="fas fa-fw fa fa-list-ul"></i>
          <span>Data Periode Permintaan</span></a>
      </li>

      <!-- Nav Item - Permintaan Sekolah -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/permintaan')}}">
          <i class="fas fa-fw fa fa-folder"></i>
          <span>Data Permintaan Sekolah</span></a>
      </li>

      <!-- Nav Item - Data Sekolah -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dataLokasi')}}">
          <i class="fas fa-fw fas fa-map-marker-alt"></i>
          <span>Data Lokasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/atur/admin')}}">
          <i class="fas fa-fw fas fa-user-tie"></i>
          <span>Data Admin</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading Keluar -->
      <div class="sidebar-heading">
        Keluar
      </div>

      <!-- Nav Item - Data Sekolah -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw far fa-arrow-alt-circle-left"></i>
          <span>Keluar</span></a>
      </li>


      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">

         

          <!-- Tabel -->
            <div class="card shadow mb-4">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                  <div class="card-body">
                            
              


                             <div class="row">
                                <div class="col"></div>
                                        <div class="col d-sm-flex-inverse mb-4" >
                                          <div class="d-flex justify-content-end">
                                          <h1 class="h3 mb-4 text-gray-800"></h1>
                                              <a href="{{url('/admin/sekolah')}}" class="button4 d-sm-inline-block btn btn-sm shadow-sm">
                                                  <i class="fas fa fa-arrow-left fa-sm text-black-50"></i> Kembali
                                              </a>  
                                          </div>
                                        </div>    
                              
                            </div>
                      

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Sekolah</h1>
                        </div>

                        <div class="col-lg-8 container">
                            <form action="{{url('admin/sekolah/tambah')}}" method="post">
                                @csrf
                                <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input class="form-control" type="text" name="nama" value="{{old('nama')}}">
                                <label @error('nama') class="text-danger" @enderror> @error('nama')
                                  {{$message}}
                                @enderror</label>
                                </div>

                                <div class="form-group">
                                <label>NPSN</label>
                                <input class="form-control" type="text" name="npsn" value="{{old('npsn')}}">
                                <label @error('npsn') class="text-danger" @enderror> @error('npsn')
                                  {{$message}}
                                @enderror</label>
                                </div>

      

                                <div class="form-group">
                                <label>Jenjang Pendidikan</label>
                                <select name="jpendidikan" class="form-control"  >
                                <option value="">--Pilih Jenjang Pendidikan--</option>
                                <option value="Sekolah Dasar">Sekolah Dasar</option>
                                <option value="Sekolah Dasar Luar Biasa">Sekolah Dasar Luar Biasa</option>
                                <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                                <option value="Sekolah Menengah Pertama Luar Biasa">Sekolah Menengah Pertama Luar Biasa</option>
                                <option value="Sekolah Menengah Atas">Sekolah Menengah Atas</option>
                                <option value="Sekolah Menengah Atas Luar Biasa">Sekolah Menengah Atas Luar Biasa</option>
                                </select>
                                <label @error('jpendidikan') class="text-danger" @enderror> @error('jpendidikan')
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


                            
                                
                                <div class="float-right">  
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                                
                            </form>
                            <br>
                            </br>
                        </div>
                        
                        
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Muh.Zhen | Sistem Pendukung Keputusan Metode SAW</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Untuk Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan Tombol "Keluar" Jika anda ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="{{url('/login-admin/logout')}}">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
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

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="{{ asset('javascript/sb-admin-2.min.js') }}"></script>
  <!-- <script src="js/sb-admin-2.min.js"></script> -->

  <!-- Page level plugins -->
  <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>

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
