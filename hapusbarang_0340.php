<?php
//memanggil file koneksi_0340
include 'koneksi_0340.php';

$kd_barang = $_GET['kode'];

if (isset($kd_barang)) {
    //menjalankan kueri mysql
    mysqli_query($con, "DELETE FROM barang_0340 WHERE kd_barang='$kd_barang'");
}

//pindah halaman ke halaman index.php
header('location: barang_0340.php');
