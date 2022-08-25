<?php
include "../../logincontroller.php";

include "../controller.php";

$id_pembelian = @$_GET['id'];
$query = mysqli_query($con, "SELECT * FROM pembelian_barang WHERE id_pembelian='$id_pembelian'") or die (mysqli_error($con));
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventaris | Form Edit Pembelian</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../layout/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../layout/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="../../5.png" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
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
          <a href="../../profile.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../foto/<?php echo $_SESSION['foto']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                <?php echo $_SESSION['nama_user'];?>
                  <span class="float-right text-sm text-danger"></span>
                </h3>
                <p class="text-sm"><?php echo $_SESSION['role'];?></p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../logout.php" class="dropdown-item dropdown-footer">Log Out</a>
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
      <img src="../../layout/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventaris</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../foto/<?php echo $_SESSION['foto']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama_user'];?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">KELOLA BARANG</li>
          <li class="nav-item menu-open">
            <a href="../dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../daftar_barang.php" class="nav-link">
              <i class="nav-icon ion-cube"></i>
              <p>
                Daftar Barang
              </p>
            </a>
          <li class="nav-item menu-open">
            <a href="../barang_masuk.php" class="nav-link">
              <i class="nav-icon ion-android-archive"></i>
              <p>
                Barang Masuk
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../barang_keluar.php" class="nav-link">
              <i class="nav-icon ion-ios-upload"></i>
              <p>
                Barang Keluar
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../pembelian_barang.php" class="nav-link">
              <i class="nav-icon ion-android-cart"></i>
              <p>
                Pembelian Barang 
              </p>
            </a>
          </li>
          <li class="nav-header">KELOLA PEMINJAMAN</li>
          <li class="nav-item menu-open">
            <a href="../peminjaman.php" class="nav-link">
              <i class="nav-icon ion-share"></i>
              <p>
                Peminjaman 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../pengembalian.php" class="nav-link">
              <i class="nav-icon ion-android-checkbox-outline"></i>
              <p>
                Pengembalian 
              </p>
            </a>
          </li>
          <li class="nav-header">Laporan</li>
          <li class="nav-item menu-open">
            <a href="../laporan/laporan_masuk.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Barang Masuk 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../laporan/laporan_keluar.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Barang Keluar 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../laporan/laporan_daftar_barang.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Daftar Barang 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../laporan/laporan_pembelian.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Pembelian 
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../laporan/laporan_peminjam.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Peminjam
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../laporan/laporan_pengembalian.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Pengembalian
              </p>
            </a>
          </li>
          <li class="nav-header">Daftar Users</li>
          <li class="nav-item menu-open">
            <a href="../petugas.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Daftar Users
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Pembelian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Pembelian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="ion-compose mr-2"></i>Edit Pembelian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_pembelian" value="<?=$data['id_pembelian'];?>" required>
                    <label for="nama_barang">Nama Barang</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nama_barang" value="<?=$data['nama_barang'];?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jenis_barang">Jenis Barang</label>
                    <div class="input-group">
                            <input type="text" class="form-control" name="jenis_barang" p value="<?=$data['jenis_barang'];?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <div class="input-group">
                            <input type="number" class="form-control" name="harga_barang"  value="<?=$data['harga_barang'];?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah Pembelian</label>
                    <div class="input-group">
                            <input type="number" class="form-control" name="jumlah"  value="<?=$data['jumlah'];?>" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edit_pembelian">Submit</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>&copy; 2022 <a href="https://adminlte.io">My Website</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>By</b> Sandi Dwi Januar
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../layout/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../layout/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
