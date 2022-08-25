<?php

    session_start();

    // Koneksi Ke DB
    $con = mysqli_connect('localhost','root','','inventaris');

    // Login
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password' ");
        $hitung = mysqli_num_rows($query);

        if($hitung > 0){
            $data = mysqli_fetch_array($query);

            // jika admin
            if ($data['role']=="Admin") {
                $_SESSION['nama_user'] = $data['nama_user'];
                $_SESSION['no_hp_wa']  = $data['no_hp_wa'];
                $_SESSION['alamat']    = $data['alamat'];
                $_SESSION['foto']      = $data['foto'];
                $_SESSION['username']  = $data['username'];
                $_SESSION['password']  = $data['password'];
                $_SESSION['role']      = "Admin";

                echo'
                <script>alert("Berhasil Login");
                window.location.href="admin/dashboard.php"</script>
                ';
            } elseif ($data['role']=="Oprator") {
                $_SESSION['nama_user'] = $data['nama_user'];
                $_SESSION['no_hp_wa']  = $data['no_hp_wa'];
                $_SESSION['alamat']    = $data['alamat'];
                $_SESSION['foto']      = $data['foto'];
                $_SESSION['username']  = $data['username'];
                $_SESSION['password']  = $data['password'];
                $_SESSION['role']      = "Oprator";

                echo'
                <script>alert("Berhasil Login");
                window.location.href="oprator/dashboard.php"</script>
                ';
            } else {
                echo'
                <script>alert("Gagal Login");
                window.location.href="login.php"</script>
                ';
            }    
        } else {
            echo'
            <script>alert("gagal");
            window.location.href="login.php"</script>
            ';
        }
    }

    if (isset($_POST['tambah_user'])) {
        $nama_user   = $_POST['nama_user'];
        $username    = $_POST['username'];
        $password    = $_POST['password'];
        $role        = $_POST['role'];
        $alamat      = $_POST['alamat'];
        $no_hp_wa    = $_POST['no_hp_wa'];
    
        $allowed_extension = array('png','jpg');
        $nama              = $_FILES['foto']['name'];
        $dot               = explode('.',$nama);
        $ekstensi          = strtolower(end($dot));
        $ukuran            = $_FILES['foto']['size'];
        $file_tmp          = $_FILES['foto']['tmp_name'];
    
        $foto              = md5(uniqid($nama,true) . time()).'.'.$ekstensi;
    
        $cek    = mysqli_query($con, "SELECT * FROM user WHERE nama_user='$nama_user'");
        $hitung = mysqli_num_rows($cek);
        if ($hitung<1){
            if (in_array($ekstensi, $allowed_extension) === true) {
                if ($ukuran < 15000000) {
                    move_uploaded_file($file_tmp, 'admin/foto/'.$foto);
    
                    $query = mysqli_query($con, "INSERT INTO user (nama_user, username, password, alamat, no_hp_wa, foto, role) VALUES ('$nama_user','$username','$password','$alamat','$no_hp_wa','$foto','$role')");
                    if ($query) {
                        echo'
                        <script>alert("User Berhasil Ditambahkan");
                            window.location.href="login.php"
                        </script>';
                    }
                } else {
                    echo'
                    <script>alert("Ukuran Foto Terlalu Besar");
                         window.location.href="login.php"
                    </script>';
                }
            } else {
                echo'
                <script>alert("File Harus png/jpg");
                    window.location.href="login.php"
                </script>';
            }
        } else {
            echo'
            <script>alert("Data Yang Anda Masukan Sudah Terdaftar");
                window.location.href="login.php"
            </script>';
        }
    
    }
?>