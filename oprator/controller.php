<?php

    if(isset($_POST['tambah_pembelian'])){
        $nama_barang   = $_POST['nama_barang'];
        $tgl_pembelian = $_POST['tgl_pembelian'];
        $jenis_barang  = $_POST['jenis_barang'];
        $harga_barang  = $_POST['harga_barang'];
        $jumlah        = $_POST['jumlah'];

        $query = mysqli_query($con,"INSERT INTO pembelian_barang (nama_barang, tgl_pembelian, jenis_barang, harga_barang, jumlah) VALUES 
        ('$nama_barang','$tgl_pembelian','$jenis_barang','$harga_barang','$jumlah')");

        if($query){
            echo'
            <script>alert("Berhasil Menambahkan");
            window.location.href="../pembelian_barang.php"</script>
            ';
        } else {
            echo'
            <script>alert("Gagal Menambahkan");
            window.location.href="../pembelian_barang.php"</script>
            ';
        }
    }

    if(isset($_POST['masukan'])){
        $nama_barang  = $_POST['nama_barang'];
        $tgl_masuk    = $_POST['tgl_masuk'];
        $jenis_barang = $_POST['jenis_barang'];
        $kd_barang    = $_POST['kd_barang'];
        $jumlah       = $_POST['jumlah'];

        $query1 = mysqli_query($con,"INSERT INTO barang_masuk (nama_barang, tgl_masuk, jenis_barang, kd_barang, jumlah) VALUES 
        ('$nama_barang','$tgl_masuk','$jenis_barang','$kd_barang','$jumlah')");

        $query2 = mysqli_query($con,"INSERT INTO daftar_barang (nama_barang, jenis_barang, kd_barang, jumlah) VALUES 
        ('$nama_barang','$jenis_barang','$kd_barang','$jumlah')");

        if($query1&&$query2){
            echo'
            <script>alert("Berhasil Menambahkan");
            window.location.href="pembelian_barang.php"</script>
            ';
        } else {
            echo'
            <script>alert("Gagal Menambahkan");
            window.location.href="pembelian_barang.php"</script>
            ';
        }
    }

    if(isset($_POST['edit_pembelian'])){
        $nama_barang   = $_POST['nama_barang'];
        $jenis_barang  = $_POST['jenis_barang'];
        $harga_barang  = $_POST['harga_barang'];
        $jumlah        = $_POST['jumlah'];
        $id_pembelian  = $_POST['id_pembelian'];

        $query = mysqli_query($con,"UPDATE pembelian_barang SET nama_barang='$nama_barang',jenis_barang='$jenis_barang',harga_barang='$harga_barang',jumlah='$jumlah' WHERE 
        pembelian_barang.id_pembelian='$id_pembelian'");
        if($query){
            echo'
            <script>alert("Berhasil mengedit");
            window.location.href="../pembelian_barang.php"</script>
            ';
        } else {
            echo'
            <script>alert("Gagal mengedit");
            window.location.href="../pembelian_barang.php"</script>
            ';
        }
    }

    if(isset($_POST['delete'])){
        $id_pembelian = $_POST['id_pembelian'];

        $query = mysqli_query($con,"DELETE FROM pembelian_barang WHERE pembelian_barang.id_pembelian='$id_pembelian'");

        if($query){
            echo'<script>alert("Barang telah dihapus");
            window.location.href="pembelian_barang.php"</script>';
        } else {
            echo'<script>alert("Barang gagal dihapus");
            window.location.href="pembelian_barang.php"</script>';
        }
    }

    if(isset($_POST['tambah_peminjaman'])){
        $nama_peminjam  = $_POST['nama_peminjam'];
        $nohp           = $_POST['nohp'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];
        $alamat         = $_POST['alamat'];

        $query = mysqli_query($con,"INSERT INTO peminjaman (nama_peminjam,nohp,tgl_peminjaman,alamat) VALUES 
        ('$nama_peminjam','$nohp','$tgl_peminjaman','$alamat')");

        if($query){
            echo'<script>alert("Peminjam telah ditambahkan");
            window.location.href="../peminjaman.php"</script>';
        } else {
            echo'<script>alert("Peminjam gagal ditambahkan");
            window.location.href="../peminjaman.php"</script>';
        }
    }

    if(isset($_POST['tambah_detail'])){
        $nama_barang       = $_POST['nama_barang'];
        $kd_barang         = $_POST['kd_barang'];
        $id_barang         = $_POST['id_barang'];
        $jumlah_peminjaman = $_POST['jumlah_peminjaman'];
        $id_peminjaman     = $_POST['id_peminjaman'];

        
        $query1 = mysqli_query($con,"INSERT INTO detail_peminjaman (id_peminjaman, nama_barang, kd_barang,id_barang, 
        jumlah_peminjaman) VALUES ('$id_peminjaman','$nama_barang','$kd_barang','$id_barang','$jumlah_peminjaman')");

        if($query1){
            header('location:../detail/detail_peminjaman.php?id='.$_GET['id']);
        } else {
            echo"<script>alert('Proses gagal');
                window.location.href='../detail/detail_peminjaman.php?id=$id_peminjaman'</script>";
        }
    }

    if(isset($_POST['done'])){
        $nama_barang   = $_POST['nama_barang'];
        $kd_barang     = $_POST['kd_barang'];
        $jumlah_keluar = $_POST['jumlah_keluar'];
        $tgl_keluar    = $_POST['tgl_keluar'];
        $status_keluar = $_POST['status_keluar'];
        $id_barang     = $_POST['id_barang'];
        $id_detail     = $_POST['id_detail'];
        $id_peminjaman = $_POST['id_peminjaman'];

        $updatestatusdetail = mysqli_query($con,"UPDATE detail_peminjaman SET status='Sedang dipinjam' WHERE detail_peminjaman.id_detail ='$id_detail'");

        $updatestatuspeminjaman = mysqli_query($con,"UPDATE peminjaman SET status='Sedang meminjam' WHERE peminjaman.id_peminjaman='$id_peminjaman'");

        $cek = mysqli_query($con, "SELECT * FROM daftar_barang WHERE daftar_barang.id_barang='$id_barang'");
        $data = mysqli_fetch_array($cek);
        $jumlahawal = $data['jumlah'];

        if($jumlahawal >= $jumlah_keluar){

            // jika cukup
            $jumlahakhir = $jumlahawal - $jumlah_keluar;
            $jumlah_keluar = $jumlah_keluar;
            $query1 = mysqli_query($con,"INSERT INTO barang_keluar (nama_barang, kd_barang,tgl_keluar, 
            jumlah_keluar, status_keluar) VALUES ('$nama_barang','$kd_barang','$tgl_keluar','$jumlah_keluar','$status_keluar')");

            $query2 = mysqli_query($con,"UPDATE daftar_barang SET jumlah='$jumlahakhir' 
            WHERE daftar_barang.id_barang='$id_barang'");

            if($query1&&$query2){
                echo"<script>alert('Peminjaman Berhasil');
                    window.location.href='../peminjaman.php'</script>";
            } else {
                echo"<script>alert('Peminjaman Gagal');
                window.location.href='../peminjaman.php'</script>";
            }

        } else {
            echo"<script>alert('Stock tidak mencukupi');
                    window.location.href='../peminjaman.php'</script>";
        }
    }

    if(isset($_POST['batal'])){
        $id_barang     = $_POST['id_barang'];
        $id_peminjaman = $_POST['id_peminjaman'];
        $id_detail     = $_POST['id_detail'];

        $query = mysqli_query($con,"DELETE FROM detail_peminjaman WHERE detail_peminjaman.id_detail='$id_detail'");

        $query1 = mysqli_query($con,"UPDATE peminjaman SET status='Membatalkan Peminjaman' WHERE peminjaman.id_peminjaman='$id_peminjaman'");
        if ($query) {
            echo"<script>alert('Berhasil membatalkan peminjaman');
            window.location.href='../detail/detail_peminjaman.php?id=$id_peminjaman'</script>";
        } else{
            echo"<script>alert('Gagal membatalkan peminjaman');
            window.location.href='../detail/detail_peminjaman.php?id=$id_peminjaman'</script>";
        }
    }

    if(isset($_POST['edit_detail'])){
        $nama_barang       = $_POST['nama_barang'];
        $kd_barang         = $_POST['kd_barang'];
        $id_barang         = $_POST['id_barang'];
        $id_detail         = $_POST['id_detail'];
        $jumlah_peminjaman = $_POST['jumlah_peminjaman'];
        $id_peminjaman     = $_POST['id_peminjaman'];

        $query = mysqli_query($con,"UPDATE detail_peminjaman SET nama_barang='$nama_barang',kd_barang='$kd_barang',id_barang='$id_barang',jumlah_peminjaman='$jumlah_peminjaman' WHERE 
        detail_peminjaman.id_detail='$id_detail'");
        if($query){
            echo"<script>alert('Berhasil mengubah');
            window.location.href='../detail/detail_peminjaman.php?id=$id_peminjaman'</script>";
        } else {
            echo"<script>alert('Gagal mengubah');
            window.location.href='../detail/detail_peminjaman.php?id=$id_peminjaman'</script>";
        }
    }

    if(isset($_POST['kembalikan'])){
        $id_barang     = $_POST['id_barang'];
        $id_detail     = $_POST['id_detail'];
        $id_peminjaman = $_POST['id_peminjaman'];

        $updatestatusdetail = mysqli_query($con,"UPDATE detail_peminjaman SET status='Telah dikembalikan' WHERE detail_peminjaman.id_detail='$id_detail'");

        $cekbarang = mysqli_query($con,"SELECT * FROM daftar_barang WHERE daftar_barang.id_barang='$id_barang'");
        $sql1 = mysqli_fetch_array($cekbarang);
        $jumlahbarang = $sql1['jumlah'];

        $cekpeminjaman = mysqli_query($con,"SELECT * FROM detail_peminjaman WHERE detail_peminjaman.id_detail='$id_detail'");
        $sql2 = mysqli_fetch_array($cekpeminjaman);
        $jumlahp = $sql2['jumlah_peminjaman'];

        $jumlahakhir = $jumlahbarang + $jumlahp;

        $query1 = mysqli_query($con,"DELETE FROM detail_peminjaman WHERE detail_peminjaman.id_detail='$id_detail'");

        $query = mysqli_query($con,"UPDATE daftar_barang SET jumlah='$jumlahakhir' WHERE daftar_barang.id_barang='$id_barang'");

        $query2 = mysqli_query($con,"UPDATE peminjaman SET status='Telah mengembalikan barang' WHERE peminjaman.id_peminjaman='$id_peminjaman'");

        if($query&&$query1&&$query2){
            echo"<script>alert('Berhasil mengembalikan');
            window.location.href='../detail/detail_peminjaman.php?id=$id_peminjaman'</script>";
        } else {
            echo"<script>alert('Gagal mengembalikan');
            window.location.href='../detail/detail_peminjaman.php?id=$id_peminjaman'</script>";
        }
    }

    if(isset($_POST['selesaikan'])){
        $nama_peminjam  = $_POST['nama_peminjam'];
        $nohp           = $_POST['nohp'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];
        $alamat         = $_POST['alamat'];
        $tgl_kembali    = $_POST['tgl_kembali'];
        $id_peminjaman  = $_POST['id_peminjaman'];

        $query = mysqli_query($con,"INSERT INTO pengembalian (nama_peminjam, nohp, tgl_peminjaman, alamat, tgl_kembali) VALUES ('$nama_peminjam','$nohp','$tgl_peminjaman','$alamat','$tgl_kembali')");

        $query1 = mysqli_query($con,"DELETE FROM peminjaman WHERE peminjaman.id_peminjaman='$id_peminjaman'");

        if($query&&$query1){
            echo'
                <script>
                    alert("Penyelesaian Berhasil");
                    window.location.href="pengembalian.php"
                </script>
            ';
        } else {
            echo'
                <script>
                    alert("Penyelesaian Gagal");
                    window.location.href="peminjaman.php"
                </script>
            ';
        }
    }

    if(isset($_POST['edit_peminjaman'])){
        $nama_peminjam  = $_POST['nama_peminjam'];
        $nohp           = $_POST['nohp'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];
        $alamat         = $_POST['alamat'];
        $id_peminjaman  = $_POST['id_peminjaman'];

        $query = mysqli_query($con,"UPDATE peminjaman SET nama_peminjam='$nama_peminjam', nohp='$nohp', tgl_peminjaman='$tgl_peminjaman', alamat='$alamat' WHERE peminjaman.id_peminjaman='$id_peminjaman'");

        if($query){
            echo'
                <script>
                    alert("Berhasil diupdate");
                    window.location.href="../peminjaman.php"
                </script>
            ';
        } else {
            echo'
                <script>
                    alert("gagal diupdate");
                    window.location.href="../peminjaman.php"
                </script>
            ';
        }
    }

    if(isset($_POST['delete_peminjaman'])){
        $id_peminjaman = $_POST['id_peminjaman'];

        $query = mysqli_query($con,"DELETE FROM peminjaman WHERE peminjaman.id_peminjaman='$id_peminjaman'");

        if($query){
            echo'
                <script>
                    alert("Berhasil dihapus");
                    window.location.href="peminjaman.php"
                </script>
            ';
        } else {
            echo'
                <script>
                    alert("Gagal dihapus");
                    window.location.href="peminjaman.php"
                </script>
            ';
        }
    }

    if(isset($_POST['edit_user'])){
        $id_user   = $_POST['id_user'];
        $nama_user = $_POST['nama_user'];
        $no_hp_wa  = $_POST['no_hp_wa'];
        $alamat    = $_POST['alamat'];
        $role      = $_POST['role'];
        $username  = $_POST['username'];
        $password  = $_POST['password'];

        $query = mysqli_query($con,"SELECT * FROM user WHERE nama_user = '$nama_user'");
        $cek = mysqli_num_rows($query);

        if($cek<1){
            $query1 = mysqli_query($con,"UPDATE user SET nama_user='$nama_user',no_hp_wa='$no_hp_wa',alamat='$alamat',role='$role',username='$username',password='$password' WHERE user.id_user='$id_user'");
            if($query1){
                echo'
                <script>alert("User berhasil diupdate");
                    window.location.href="../profile.php"
                </script>';
            } else{
                echo'
                <script>alert("User gagal diupdate");
                    window.location.href="../profile.php"
                </script>';
            }
        } else {
            echo'
            <script>alert("Nama user telah digunakan");
                window.location.href="../profile.php"
            </script>';
        }
    }

    if (isset($_POST['edit_foto_user'])) {
        $id_user   = $_POST['id_user'];
    
        $allowed_extension = array('png','jpg');
        $nama              = $_FILES['foto']['name'];
        $dot               = explode('.',$nama);
        $ekstensi          = strtolower(end($dot));
        $ukuran            = $_FILES['foto']['size'];
        $file_tmp          = $_FILES['foto']['tmp_name'];
    
        $foto              = md5(uniqid($nama,true) . time()).'.'.$ekstensi;
    
        if (in_array($ekstensi, $allowed_extension) === true) {
            if ($ukuran < 15000000) {
                move_uploaded_file($file_tmp, '../foto/'.$foto);

                $query = mysqli_query($con, "UPDATE user SET foto='$foto' WHERE user.id_user='$id_user'");
                if ($query) {
                    echo'
                    <script>alert("Foto User Berhasil Diupdate");
                        window.location.href="../profile.php"
                    </script>';
                }
            } else {
                echo'
                <script>alert("Ukuran Foto Terlalu Besar");
                        window.location.href="../profile.php"
                </script>';
            }
        } else {
            echo'
            <script>alert("File Harus png/jpg");
                window.location.href="../profile.php"
            </script>';
        }  
    }
?>