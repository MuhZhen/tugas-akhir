
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
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/atur/alternatif/relawan')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Verifikasi</span></a>
      </li>


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

                

                  <div class="card-body">
                            
              


                             <div class="row">
                                <div class="col"></div>
                                        <div class="col d-sm-flex-inverse mb-4" >
                                          <div class="d-flex justify-content-end">
                                          <h1 class="h3 mb-4 text-gray-800"></h1>
                                              <a href="{{url('admin/atur/alternatif/relawan')}}" class="button4 d-sm-inline-block btn btn-sm shadow-sm">
                                                  <i class="fas fa fa-arrow-left fa-sm text-black-50"></i> Kembali
                                              </a>  
                                          </div>
                                        </div>    
                              
                            </div>
                      

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{$master_alternatif->bantuan->sekolah->nama_sekolah}}</h1>
                        </div>

                        <div class="col-lg-8 container">
                            <form action="{{route('nilai.relawan',['id' => Request::segment(4)])}}" method="post">
                                @csrf
                                @foreach($master_kriteria as $kriteria)
                                <div class="form-group">
                                    <label for="{{$kriteria->id}}">{{$kriteria->nama}}</label>
                                    <select name="{{$kriteria->id}}" class="form-control">
                                        <option value="">-- Pilih {{$kriteria->nama}} --</option>
                                        @foreach($kriteria->sub_kriteria as $sub)
                                        <option value="{{$sub->id}}" {{(in_array($sub->id,$selected_sub))?'selected':''}}>{{$sub->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endforeach
                                
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

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="{{ asset('javascript/sb-admin-2.min.js') }}"></script>
  <!-- <script src="js/sb-admin-2.min.js"></script> -->

  <!-- Page level plugins -->
  <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
