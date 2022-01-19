
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

  <!-- Custom styles for this page -->
  <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

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
        <a class="nav-link" href="{{url('/admin-beranda')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>
      @if(auth()->user()->level_akses=="SuperAdmin")
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
      @endif
      <!-- Nav Item - Proses SPK -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin/proses-alternatif')}}">
          <i class="fas fa-fw fa fa-spinner"></i>
          <span>Proses SPK</span></a>
      </li>
      @if(auth()->user()->level_akses=="SuperAdmin")
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading Sekolah -->
      <div class="sidebar-heading">
        Sekolah
      </div>

      <!-- Nav Item - Data Sekolah -->
      <li class="nav-item">
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
      @endif
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

          <!-- Beranda -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Proses SPK</h1>
          </div>

          <!-- Tabel -->
           

            

              
                            
                               
                                       
                                            <?php $bobot = [] ?>
                                            @foreach($kriteria as $krit)
                                                    <?php $bobot[$krit->id] = $krit->bobot ?>
                                                
                                            @endforeach
                                       
                                    

                                    @if(!empty($alternatif))
                                    <?php $rangking = []; ?>
                                    @foreach($alternatif as $data)
                                    
                                        
                                             @if ($data->distribusi == 'Belum Tersalurkan') <!-- kondisi menghilangkan -->
                                            <?php $total = 0;?>
                                            @foreach($data->subkriteria as $crip)
                                                @if($crip->kriteria->atribut == 'Cost')
                                                    <?php $normalisasi = ($kode_krit[$crip->kriteria->id]/$crip->bobot); ?>
                                                @elseif($crip->kriteria->atribut == 'Benefit')
                                                    <?php $normalisasi = ($crip->bobot/$kode_krit[$crip->kriteria->id]); ?>
                                                @endif
                                                    <?php $total = $total+($bobot[$crip->kriteria->id]*$normalisasi);?>
                                                   
                                            @endforeach
                                            <?php $rangking[] = [
                                                'total' => $total,
                                                'nama'  => $data->bantuan->sekolah->nama_sekolah,
                                                'status' => $data->distribusi
                                                
                                            ]; 

                                            
                                

                                            
                                            ?>
                                          @else
                                          <?php $rangking[] = [
                                                'total' => 0,
                                                'nama'  => $data->bantuan->sekolah->nama_sekolah,
                                                'status' => $data->distribusi
                                                
                                            ]; 
                                            ?>
                                          @endif <!-- end kondisi -->

                                    @endforeach
                                    @else
                                        
                                    @endif

                                 
                                




            
                           
            
            
            <div class="card shadow mb-4">
                    <div class="card-body">
                            

                    
                        
                            <div class="table-responsive">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4"></div>
                                        <div class="col d-sm-flex-inverse mb-4" >
                                          <div class="d-flex justify-content-end">
                                          <h1 class="h3 mb-4 text-gray-800"></h1>
                                              <a href="{{url('admin/proses-alternatif/detail')}}" class="d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                  <i class="fas fa-eye fa-sm text-white-50"></i> Detail Proses
                                              </a>  
                                          </div>
                                        </div>    
                              
                            </div>
                              
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                            
                                <table class="table table-bordered" id="datatable" widht="100" cellspacing="0">
                                    <thead style="text-align:center">
                                       <tr >
                                            <th style="width: 10%">Ranking</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                       </tr>
                                    </thead>

                                    <tbody>

                                    <?php
                                    usort($rangking, function($a, $b)
                                    {
                                        return $a['total']<=>$b['total'];
                                    });
                                    rsort($rangking);
                                    $a = 1;
                                    ?>
                                    
                                        @foreach($rangking as $t)
                                            <tr>
                                                <td style="text-align:center">{{$a++}}</td>
                                                <td style="text-align:center"><a href="{{$t['nama']}}">{{$t['nama']}}</a></td>
                                                <td style="text-align:center" >{{$t['status']}}</td>
                                                <td style="text-align:center" >{{$t['total']}}</td>

                                                
                                                
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                
                            </div>    
                </div>

                <div class="card shadow mb-4">

          

                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
    <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Muh.Zhen | Sistem Pendukung Keputusan Metode SAW</span>
          </div>
        </div>
      </footer> -->
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
  <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
