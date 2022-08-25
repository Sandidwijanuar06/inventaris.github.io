<?php
    include 'logincontroller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Form Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="layout/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="layout/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="5.png" />
</head>
<body class="hold-transition sidebar-mini">
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content mt-5" style="margin-left: 50px;">
      <div class="container-fluid" style="margin-left: 125px;">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Register</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_user">Nama User</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="nama_user" placeholder="Nama User" required autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp_wa">No.Handphone/Whatsapp</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="no_hp_wa" placeholder="No Handphone atau Whatsapp" required autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="foto">Photo</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <div class="input-group">
                    <textarea type="textarea" class="form-control" name="alamat" placeholder="Alamat" required autofocus></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <div class="input-group">
                    <select name="role" class="form-control" required autofocus> 
                        <option value="">-PILIH-</option>
                        <option value="Oprator">Oprator</option>
                    </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="tambah_user">Submit</button>
                </div>
              </form>
            </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="layout/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="layout/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="layout/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="layout/dist/js/adminlte.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
