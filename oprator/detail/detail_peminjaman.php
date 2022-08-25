<?php
    include "../../logincontroller.php";

    include "../controller.php";

    $id_peminjaman = $_GET['id'];
    $query = "SELECT * FROM peminjaman WHERE id_peminjaman='$id_peminjaman'";
    $sql = mysqli_query($con, $query) or die (mysqli_error($con));
    $data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventaris | Detail Peminjaman</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../layout/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../layout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../layout/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../layout/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../layout/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="../../5.png" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../layout/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
              <img src="../../admin/foto/<?php echo $_SESSION['foto']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
          <img src="../../admin/foto/<?php echo $_SESSION['foto']; ?>" class="img-circle elevation-2" alt="User Image">
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
            <h1 class="m-0">Detail Peminjaman</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Peminjaman</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="row ml-1 mt-5">  
            <div class="col-sm-2">
                Nama Peminjam:
                <input type="text" class="form-control" value="<?=$data['nama_peminjam']?>" disabled>

                Kelas:
                <input type="text" class="form-control" value="<?=$data['nohp']?>" disabled>
            </div>
            <div class="col-sm-2">
                Tanggal Pinjam:
                <input type="text" class="form-control" value="<?=$data['tgl_peminjaman']?>" disabled>

                Alamat: <br>
                <textarea name="" id="" cols="30" rows="3" disabled><?=$data['alamat']?></textarea>

            </div>
        </div>
    <!-- content -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-table"> Tabel Detail Peminjaman</i></h3>
        <a class="btn btn-primary float-sm-right" href="../tambah/tambah_detail_peminjaman.php?id=<?=$data['id_peminjaman'];?>"><i class="ion-plus"> Tambah Pembelian</i></a>
      </div>
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NO.</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Jumlah Peminjaman</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <tbody>
            <?php
              $query = mysqli_query($con, "SELECT detail_peminjaman.id_detail, detail_peminjaman.id_peminjaman, detail_peminjaman.id_barang, detail_peminjaman.nama_barang, 
              detail_peminjaman.kd_barang, detail_peminjaman.jumlah_peminjaman, detail_peminjaman.status FROM detail_peminjaman, peminjaman, daftar_barang 
              WHERE detail_peminjaman.id_barang=daftar_barang.id_barang AND detail_peminjaman.nama_barang=daftar_barang.nama_barang 
              AND detail_peminjaman.kd_barang=daftar_barang.kd_barang AND detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman AND detail_peminjaman.id_peminjaman='$id_peminjaman'");
              $no = 1;
              while ($data = mysqli_fetch_array($query)) {
                  $nama_barang       = $data['nama_barang'];
                  $kd_barang         = $data['kd_barang'];
                  $jumlah_peminjaman = $data['jumlah_peminjaman'];
                  $status            = $data['status'];
                  $id_detail         = $data['id_detail'];
                  $id_peminjaman     = $data['id_peminjaman'];
                  $id_barang         = $data['id_barang'];
            ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$nama_barang;?></td>
              <td><?=$kd_barang;?></td>
              <td><?=$jumlah_peminjaman;?></td>
              <td><?=$status;?></td>
              <td>
               <?php
                  if($status=='Sedang diproses'){
                   echo' 
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batal'.$id_detail.'">
                    <i class="fas fa-trash"></i>
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#done'.$id_detail.'">
                    <i class=" ion-share"></i>
                    </button>
                   <a href="../edit/edit_detail.php?id='.$id_detail.'" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    ';
                  } 
                  
                  if($status=='Sedang dipinjam'){
                    echo'
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#selesai'.$id_detail.'">
                    <i class="ion-checkmark"></i>
                    Kembalikan
                    </button>
                    '; 
                  }
                  

                  if($status=='Telah dikembalikan'){
                    echo'
                    Telah dikembalikan
                    ';
                  }
               ?>
              </td>
            </tr>
            <!-- Modal done -->
            <div class="modal fade" id="done<?=$id_detail;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form method="post">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Proses pengeluaran Barang</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id_barang" class="form-control" value="<?= $id_barang;?>" readonly>
                    <strong>Lengkapi data berikut untuk melanjutkan!</strong><br>
                    <input type="hidden" name="id_detail" class="form-control" value="<?= $id_detail;?>" readonly>
                    <input type="hidden" name="id_peminjaman" class="form-control" value="<?= $id_peminjaman;?>" readonly>

                    Nama Barang:
                    <input type="text" name="nama_barang" class="form-control" value="<?= $nama_barang;?>" readonly>
                    Kode Barang:
                    <input type="text" name="kd_barang" class="form-control" value="<?= $kd_barang;?>" readonly>
                    Tanggal Keluar:
                    <input type="date" name="tgl_keluar" class="form-control" required>
                    Jumlah Keluar:
                    <input type="number" name="jumlah_keluar" class="form-control" placeholder="Jumlah Keluar" required>
                    Status Keluar:
                    <input type="text" name="status_keluar" class="form-control" placeholder="Status Keluar" required>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="done" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- Modal Batal -->
            <div class="modal fade" id="selesai<?=$id_detail;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form method="post" action="?id=<?=$_GET['id'];?>">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Masukan Barang</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id_peminjaman" class="form-control" value="<?= $id_peminjaman;?>" readonly>
                    <input type="hidden" name="id_barang" class="form-control" value="<?= $id_barang;?>" readonly>
                    <input type="hidden" name="id_detail" class="form-control" value="<?= $id_detail;?>" readonly>
                    Apakah barang yang dipinjam sudah dikembalikan? Klik "<strong>YA</strong>" jikan sudah 
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="kembalikan" class="btn btn-primary">YA</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- Modal Batal -->
            <div class="modal fade" id="batal<?=$id_detail;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form method="post" action="?id=<?=$_GET['id'];?>">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Masukan Barang</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id_peminjaman" class="form-control" value="<?= $id_peminjaman;?>" readonly>
                    <input type="hidden" name="id_barang" class="form-control" value="<?= $id_barang;?>" readonly>
                    <input type="hidden" name="id_detail" class="form-control" value="<?= $id_detail;?>" readonly>
                    Apakah anda yakin ingin membatalkan peminjaman ini? Klik "<strong>Batal</strong>" jikan yakin 
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="batal" class="btn btn-danger">Batal</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
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

<script src="../../layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../layout/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../layout/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../layout/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../layout/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../layout/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../layout/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../layout/plugins/jszip/jszip.min.js"></script>
<script src="../../layout/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../layout/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../layout/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../layout/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../layout/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../layout/dist/js/adminlte.min.js"></script>
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
