<?php
    include "../logincontroller.php";

    include "controller.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventaris | Pembelian Barang</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../layout/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../layout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../layout/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../layout/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../layout/dist/css/adminlte.min.css">
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
          <a href="../profile.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="foto/<?php echo $_SESSION['foto']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
          <a href="../logout.php" class="dropdown-item dropdown-footer">Log Out</a>
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
          <img src="foto/<?php echo $_SESSION['foto']; ?>" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-header">Daftar Users</li>
          <li class="nav-item menu-open">
            <a href="petugas.php" class="nav-link">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Pembelian Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pembelian Barang</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- content -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-table"> Tabel Daftar Barang</i></h3>
        <a class="btn btn-primary float-sm-right" href="tambah/tambah_pembelian.php"><i class="ion-plus"> Tambah Pembelian</i></a>
      </div>
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO.</th>
            <th>Nama Barang</th>
            <th>Tanggal Pembelian</th>
            <th>Jenis Barang</th>
            <th>Harga Barang</th>
            <th>Total Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <tbody>
            <?php
              $query = mysqli_query($con, "SELECT * FROM pembelian_barang");
              
              $i=1;

              while ($data = mysqli_fetch_array($query)) {
                  $nama_barang      = $data['nama_barang'];
                  $tgl_pembelian    = $data['tgl_pembelian'];
                  $jenis_barang     = $data['jenis_barang'];
                  $harga_barang     = $data['harga_barang'];
                  $jumlah           = $data['jumlah'];
                  $id_pembelian     = $data['id_pembelian'];

                $total = 0;
                $total_harga = 0;
                
                $total = $data['harga_barang'] * $data['jumlah'];
                $total_harga  += $total;
            ?>
            <tr>
              <td><?=$i++;?></td>
              <td><?=$nama_barang;?></td>
              <td><?=$tgl_pembelian;?></td>
              <td><?=$jenis_barang;?></td>
              <td>Rp. <?= number_format($harga_barang,'0',',','.')?></td>
              <td>Rp. <?= number_format($total,'0',',','.')?></td>
              <td><?=$jumlah;?></td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#masuk<?=$id_pembelian;?>">
                <i class="ion-checkmark"></i>
                </button>
                <a class="btn btn-warning" href="edit/edit_pembelian.php?id=<?=$data['id_pembelian'];?>"><i class="ion-compose"></i></a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del<?=$id_pembelian;?>">
                <i class="fas fa-trash"></i>
                </button>
              </td>
              <!-- Modal Edit -->
              <div class="modal fade" id="masuk<?=$id_pembelian;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <form method="post">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukan Barang</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id_pembelian" value="<?= $id_pembelian;?>">
                      Nama Barang:
                      <input type="text" name="nama_barang" class="form-control" value="<?= $nama_barang;?>">
                      Jenis Barang:
                      <input type="text" name="jenis_barang" class="form-control" value="<?= $jenis_barang;?>">
                      Kode Barang:
                      <input type="text" name="kd_barang" class="form-control" placeholder="Buat Kode Barang" required>
                      Jumlah Barang:
                      <input type="text" name="jumlah" class="form-control" value="<?= $jumlah;?>">
                      Tanggal Masuk:
                      <input type="date" name="tgl_masuk" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="masukan" class="btn btn-success">Submit</button>
                    </div>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Modal Delete -->
              <div class="modal fade" id="del<?=$id_pembelian;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <form method="post">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukan Barang</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id_pembelian" value="<?= $id_pembelian;?>">
                      Apakah anda yakin ingin menghapus barang ini(<strong><?=$nama_barang;?></strong>)? KLIK "<strong>HAPUS</strong>" jika yakin!
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delete" class="btn btn-success">Hapus</button>
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </tr>
            <?php
              }            
            ?>
          </tbody>
      </table>
      </div>
        <!-- /.card-body -->
    </div>
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

<script src="../layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../layout/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../layout/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../layout/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../layout/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../layout/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../layout/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../layout/plugins/jszip/jszip.min.js"></script>
<script src="../layout/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../layout/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../layout/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../layout/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../layout/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../layout/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
