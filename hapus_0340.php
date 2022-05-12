<?php
//memanggil file koneksi_0340
include 'koneksi_0340.php';

$kd_karyawan = $_GET['kode'];

if (isset($kd_karyawan)) {
    //menjalankan kueri mysql
    mysqli_query($con, "DELETE FROM karyawan_0340 WHERE kd_karyawan='$kd_karyawan'");
}

//pindah halaman ke halaman index.php
header('location: karyawan_0340.php');
