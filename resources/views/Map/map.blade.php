
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
  <link href="{{asset('assets/css/lunar.css')}}" rel="stylesheet">

</head>

<style>
    .button4 {background-color: #e7e7e7; color: black;}
    .hilang {visibility: hidden;}
</style>

<body id="page-top">
<!-- Button trigger modal-->
  <div class="demo-area" style="display:none"> 
    <button  type="button" id="btn-trigger-modal" class="btn btn-dark btn-cta" data-toggle="modal" data-target="#demoModal">
      Open Modal
    </button>
  </div>

  <!-- Modal -->
   <div class="modal fade  " id="demoModal"  tabindex="-1" role="dialog"
         aria-labelledby="demoModal" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered " role="document">
            <div class="modal-content">
                <button type="button" class="close light" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="m-h-30 bg-img rounded-top " style="background-image: url('https://images.unsplash.com/photo-1544513566-b4de3719ee70?ixlib=rb-1.2.1&auto=format&fit=crop&w=334&q=80')">

                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/lokasi/ubahstatus')}}" method="post" class="px-sm-4 py-sm-4">
                       {{ method_field('PUT') }}
                       {{ csrf_field() }}
                        <h3 class="nama_sekolah" style="text-align: center;">Nama Sekolah</h3>
                        
            
                        
                        <div class="form-group">

                              <div>

                                    


                                    <div>
                                        <label>NPSN : </label>
                                        <label class="NPSN">NPSN</label>
                                    </div>

                                    <div>
                                        <label>Jenjang Pendidikan : </label>
                                        <label class="jenjang_pendidikan">jenjang_pendidikan</label>
                                    </div>

                                    <div>
                                        <label>Status Pendidikan : </label>
                                        <label class="status_sekolah">status_pendidikan</label>
                                    </div>

                                    <div>
                                        <label>Alamat : </label>
                                        <label class="alamat">alamat</label>
                                    </div>

                                    <div>
                                        <label>Nomor Telpon : </label>
                                        <label class="no_telpon">nomor telpon</label>
                                    </div>

                                    <div>
                                        <label>Bantuan : </label>
                                        <label class="bantuan">bantuan</label>
                                    </div>

                                    <div>
                                        <label>Keterangan : </label>
                                        <label class="distribusi">Keterangan</label>
                                    </div>

                              </div>

                        </div>
                        
                        @include('Map.editForm')

                        <button type="submit" class="btn btn-cstm-success btn-cta btn-block">Ubah Status</button>
                        <!-- <button type="submit" class="btn btn-cstm-success btn-cta btn-block" data-dismiss="modal" aria-label="Close">Ubah Status</button> -->
                        
                    </form>

                  
                   


                </div>


            </div>
        </div>
    </div>
  <!-- Modal Ends -->


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
      <li class="nav-item active">
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


                  <div class="card-body">
                            
              

                  <div id="googleMap" style="width:100%;height:580px;"></div>
                        
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
 

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="{{ asset('javascript/sb-admin-2.min.js') }}"></script>
  <!-- <script src="js/sb-admin-2.min.js"></script> -->

  <!-- Page level plugins -->

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWlbgIJFFT9C_Hd4dUVPIPToACAei7z6A"></script>

  <script>

  $(document).ready(function (){
    maps();
  })
var peta;
function maps(){


   var pilihan =
   {
    zoom:12,
    center:new google.maps.LatLng(-0.8961696,119.8779889),
          // gestureHandling: 'none'
          // zoomControl: false
  scrollwheel: false,
                      zoomControl: true
   };

  peta=new google.maps.Map(document.getElementById("googleMap"), pilihan);
  peta.controls[google.maps.ControlPosition.TOP_RIGHT].push(document.getElementsByName('buildings')[0]);

  jQuery.ajax(
    {
        url: "home/tampilmarker_detail",
        type: "GET",
        dataType: "json",
        success: function(result)
        {
          var data=result;
          var id_titik=new Array();
         // alert(data);
            $.each(data,function(key1) 
            {
                // alert(data[key1]['Latitude']);
                var lokasi = new google.maps.LatLng(data[key1]['Latitude'],data[key1]['Longitude']);

                
                var nama_selected = "Tersalurkan";
                if (data[key1]['distribusi'] == nama_selected){
                    var icon = "{{asset('assets/marker/hijau.png')}}";
                }
                else {
                    var icon = "{{asset('assets/marker/red.png')}}";
                }

                var marker = new google.maps.Marker({
                    position: lokasi,
                    map: peta,
                    icon: icon,   
                    
                });

                id_titik[key1]=data[key1]['Id'];
                // alert(id_titik[key1]);
                var konten_marker = data[key1]['Id'];
                // alert(konten_marker);
                var infowindow_marker = new google.maps.InfoWindow();

                google.maps.event.addListener(marker,'click', (function(marker,konten_marker,infowindow_marker)
                { 
                    return function() {
                      //disini ba atur data ditampilkan di html
                      // alert(link);
                       // var link_foto = "localhost/alkhairat/public/img/provinsi/sulteng.jpg";
                       // $(".modal-foto").css('background-image', "url('http:localhost/alkhairat/public/img/provinsi/sulteng.jpg')");
                       
                       $(".nama_sekolah").html(data[key1]['nama_sekolah']);
                       $(".NPSN").html("&nbsp"+data[key1]['NPSN']);
                       $(".jenjang_pendidikan").html("&nbsp"+data[key1]['jenjang_pendidikan']);
                       $(".status_sekolah").html("&nbsp"+data[key1]['status_sekolah']);
                       $(".alamat").html("&nbsp"+data[key1]['alamat']);
                       $(".no_telpon").html("&nbsp"+data[key1]['no_telpon']);
                       $(".bantuan").html("&nbsp"+data[key1]['bantuan']);
                       $(".distribusi").html("&nbsp"+data[key1]['distribusi']);
                       $("#distribusi").html(data[key1]['distribusi']);
                       $("#id_ket").html(data[key1]['alternatif_id']);
                      
                     

                      $("#btn-trigger-modal").trigger("click");

                    };
                })(marker,konten_marker,infowindow_marker)); 
            
            });
 
        },
        error:function()
        {
            console.log("Error")
        }
    });
}


  </script>



</body>

</html>
