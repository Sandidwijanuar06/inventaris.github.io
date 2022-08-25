<?php
  include "../logincontroller.php";

  include "controller.php";

  // Daftar Barang
  $query1 = mysqli_query($con,"SELECT * FROM daftar_barang");
  $jumlah1 = mysqli_num_rows($query1);
  // Barang Masuk
  $query2 = mysqli_query($con,"SELECT * FROM barang_masuk");
  $jumlah2 = mysqli_num_rows($query2);
  // Barang Keluar
  $query3 = mysqli_query($con,"SELECT * FROM barang_keluar");
  $jumlah3 = mysqli_num_rows($query3);
  // Pembelian Barang
  $query4 = mysqli_query($con,"SELECT * FROM pembelian_barang");
  $jumlah4 = mysqli_num_rows($query4);
  // Peminjaman
  $query5 = mysqli_query($con,"SELECT * FROM peminjaman");
  $jumlah5 = mysqli_num_rows($query5);
  // pengembalian
  $query6 = mysqli_query($con,"SELECT * FROM pengembalian");
  $jumlah6 = mysqli_num_rows($query6);
  // Daftar User
  $query7 = mysqli_query($con,"SELECT * FROM user");
  $jumlah7 = mysqli_num_rows($query7);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventaris | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../layout/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../layout/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../layout/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../layout/plugins/summernote/summernote-bs4.min.css">
  <link rel="shortcut icon" href="../5.png" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../layout/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="profile.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../admin/foto/<?php echo $_SESSION['foto']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 <?php echo $_SESSION['nama_user'];?>
                  <span class="float-right text-sm text-danger"></span>
                </h3>
                <p class="text-sm"> <?php echo $_SESSION['role'];?></p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="../logout.php" class=" btn btn-danger dropdown-item dropdown-footer">Log Out</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../layout/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventaris</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../admin/foto/<?php echo $_SESSION['foto']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama_user']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">KELOLA BARANG</li>
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="daftar_barang.php" class="nav-link">
              <i class="nav-icon ion-cube"></i>
              <p>
                Daftar Barang
              </p>
            </a>
          <li class="nav-item menu-open">
            <a href="barang_masuk.php" class="nav-link">
              <i class="nav-icon ion-android-archive"></i>
              <p>
                Barang Masuk
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="barang_keluar.php" class="nav-link">
              <i class="nav-icon ion-ios-upload"></i>
              <p>
                Barang Keluar
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="pembelian_barang.php" class="nav-link">
              <i class="nav-icon ion-android-cart"></i>
              <p>
                Pembelian Barang 
              </p>
            </a>
          </li>
          <li class="nav-header">KELOLA PEMINJAMAN</li>
          <li class="nav-item menu-open">
            <a href="peminjaman.php" class="nav-link">
              <i class="nav-icon ion-share"></i>
              <p>
                Peminjaman 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="pengembalian.php" class="nav-link">
              <i class="nav-icon ion-android-checkbox-outline"></i>
              <p>
                Pengembalian 
              </p>
            </a>
          </li>
          <li class="nav-header">Laporan</li>
          <li class="nav-item menu-open">
            <a href="laporan/laporan_masuk.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Barang Masuk 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="laporan/laporan_keluar.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Barang Keluar 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="laporan/laporan_daftar_barang.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Daftar Barang 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="laporan/laporan_pembelian.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Pembelian 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="laporan/laporan_peminjam.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Peminjam
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="laporan/laporan_pengembalian.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Pengembalian
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$jumlah1;?></h3>

                <p>Daftar Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="daftar_barang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$jumlah2;?></h3>

                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-archive"></i>
              </div>
              <a href="barang_masuk.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$jumlah3;?></h3>

                <p>Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-upload"></i>
              </div>
              <a href="barang_keluar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?=$jumlah4;?></h3>

                <p>Pembelian Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-cart"></i>
              </div>
              <a href="pembelian_barang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
              <div class="inner">
                <h3><?=$jumlah5;?></h3>

                <p>Peminjam</p>
              </div>
              <div class="icon">
                <i class="ion ion-share"></i>
              </div>
              <a href="peminjaman.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?=$jumlah6;?></h3>

                <p>Pengembalian</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkbox-outline"></i>
              </div>
              <a href="pengembalian.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$jumlah7;?></h3>

                <p>Daftar Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4><?php echo $_SESSION['nama_user'];?></h4>

                <p><?php echo $_SESSION['role'];?></p>
              </div>
              <a href="../profile.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- tabel daftar barang -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tabel My Profile</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-sm float-right">
                    <thead>
                      <tr>
                        <th style="width: 10px">No.</th>
                        <th>Nama User</th>
                        <th>username</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td><?php echo $_SESSION['nama_user'];?></td>
                        <td><?php echo $_SESSION['username'];?></td>
                        <td><?php echo $_SESSION['role'];?></td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Barang Masuk -->
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tabel Barang Masuk</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-sm float-right">
                      <thead>
                        <tr>
                          <th style="width: 10px">No.</th>
                          <th>Nama Barang</th>
                          <th>Jenis Barang</th>
                          <th style="width: 40px">Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query = mysqli_query($con,"SELECT * FROM barang_masuk");
                          $no = 1;
                          while($data = mysqli_fetch_array($query)){
                            $nama_barang  = $data['nama_barang'];
                            $jenis_barang = $data['jenis_barang'];
                            $jumlah       = $data['jumlah'];
                        ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$nama_barang;?></td>
                          <td><?=$jenis_barang;?></td>
                          <td><?=$jumlah;?></td>
                        </tr>
                      </tbody>
                      <?php
                        }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            <!-- tabel Barang keluar -->
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tabel Daftar Barang</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-sm float-right">
                    <thead>
                      <tr>
                        <th style="width: 10px">No.</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Kode Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query = mysqli_query($con,"SELECT * FROM daftar_barang");
                        $no = 1;
                        while($data = mysqli_fetch_array($query)){
                          $nama_barang  = $data['nama_barang'];
                          $jenis_barang = $data['jenis_barang'];
                          $kd_barang    = $data['kd_barang'];
                      ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$nama_barang;?></td>
                        <td><?=$jenis_barang;?></td>
                        <td><?=$kd_barang;?></td>
                      </tr>
                    </tbody>
                    <?php
                      }
                    ?>
                    </table>
                  </div>
                </div>
              </div>
            <!-- tabel pembelian barang  -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Barang keluar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-sm float-right">
                    <thead>
                      <tr>
                        <th style="width: 10px">No.</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Jumlah Keluar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $query = mysqli_query($con,"SELECT * FROM barang_keluar");
                        $no = 1;
                        while($data = mysqli_fetch_array($query)){
                          $nama_barang   = $data['nama_barang'];
                          $kd_barang     = $data['kd_barang'];
                          $jumlah_keluar = $data['jumlah_keluar'];
                      ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$nama_barang;?></td>
                        <td><?=$kd_barang;?></td>
                        <td><?=$jumlah_keluar;?></td>
                      </tr>
                    </tbody>
                    <?php
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          <!-- tabel peminjaman -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Pemeblian Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm float-right">
                <thead>
                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Nama Barang</th>
                    <th style="width: 40px">Jumlah</th>
                    <th>Harga Barang</th>
                    <th>Harga Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($con,"SELECT * FROM pembelian_barang");
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                      $nama_barang  = $data['nama_barang'];
                      $harga_barang = $data['harga_barang'];
                      $jumlah       = $data['jumlah'];

                      $total = 0;
                      $total_harga = 0;
                      
                      $total = $data['harga_barang'] * $data['jumlah'];
                      $total_harga  += $total;
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$nama_barang;?></td>
                    <td><?=$jumlah;?></td>
                    <td>Rp.<?= number_format($harga_barang,'0',',',',');?></td>
                    <td>Rp.<?=number_format($total,'0',',',',');?></td>
                  </tr>
                </tbody>
                <?php
                  }
                ?>
                </table>
              </div>
            </div>
          </div>
          <!-- tabel pengembalian -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Peminjam</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm float-right">
                  <thead>
                    <tr>
                      <th style="width: 10px">No.</th>
                      <th>Nama Peminjam</th>
                      <th>Tanggal pinjam</th>
                      <th>No.Hp/Wa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = mysqli_query($con,"SELECT * FROM peminjaman");
                      $no = 1;
                      while($data = mysqli_fetch_array($query)){
                        $nama_peminjam  = $data['nama_peminjam'];
                        $tgl_peminjaman = $data['tgl_peminjaman'];
                        $nohp           = $data['nohp'];
                    ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$nama_peminjam;?></td>
                      <td><?=date('d F y',strtotime($tgl_peminjaman));?></td>
                      <td><?=$nohp;?></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
          <!-- Tabel daftar users -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Pengembalian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm float-right">
                <thead>
                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($con,"SELECT * FROM pengembalian");
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                      $nama_peminjam  = $data['nama_peminjam'];
                      $tgl_peminjaman = $data['tgl_peminjaman'];
                      $tgl_kembali    = $data['tgl_kembali'];
                  ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$nama_peminjam;?></td>
                    <td><?=date('d F y',strtotime($tgl_peminjaman));?></td>
                    <td><?=date('d F y',strtotime($tgl_kembali));?></td>
                  </tr>
                </tbody>
                <?php
                  }
                ?>
                </table>
              </div>
            </div>
          </div>
          </div>
        </section>
       </div>
      </div>
    </section>
  </div>
  
  <footer class="main-footer">
    <strong>&copy; 2022 <a href="https://adminlte.io">My Website</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>By</b> Sandi Dwi Januar
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../layout/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../layout/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../layout/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../layout/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../layout/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../layout/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../layout/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../layout/plugins/moment/moment.min.js"></script>
<script src="../layout/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../layout/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../layout/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../layout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../layout/dist/js/adminlte.js"></script>
</body>
</html>
