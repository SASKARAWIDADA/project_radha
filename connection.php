<?php
date_default_timezone_set("Asia/Makassar");
$servername = 'localhost';
$database = 'saskara';
$username = 'root';
$password = '';
//variabel koneksi
($mysql = mysqli_connect($servername, $username, $password, $database)) or
    die(mysqli_error($mysql));

if (!$mysql) {
    echo 'Koneksi Database Gagal...!!!';
}else{
    echo 'Koneksi Berhasil';
}


?>
