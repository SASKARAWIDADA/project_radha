<!-- Registrasi -> menambah ke database -->
<?php
    include 'connection.php';
if (isset($_GET['reg'])) {
    //jika act=insert
    if ($_GET['reg'] == 'tambah') {
        //simpan inputan form ke variabel
        $nama   = $_POST['nama_lengkap'];
        $email  = $_POST['email'];
        $jurusan= $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];

        //apabila form belum lengkap
        if ($nama == '' || $email == '' || $jurusan == '' || $alamat='' || $password='') {
            //header('location:data_admin.php?view=tambah$e=bl');
            echo 'Data Tidak Boleh Kosong....!';
        } else {
            //proses penyimpanan data
            $database= "INSERT INTO `registrasi` (`nama_lengkap`, `email`, `jurusan`, `alamat`, `password`) VALUES ('$nama', '$email', '$jurusan', '$alamat', '$password')";
            
            $simpan = mysqli_multi_query(
                $mysql, $database
            );
            if ($simpan) {
                echo '<script language="javascript">
                alert ("Registrasi Berhasil Di Lakukan!");
                window.location="index.php";
                </script>';
                exit();
            } else {
                echo '<script language="javascript">
                alert ("Registrasi Gagal!");
                window.location="index.php";
                </script>';
                exit();
            }
        }
} else {
    //jika tdk ada get act
    header('location:index.php');
}
}
?>