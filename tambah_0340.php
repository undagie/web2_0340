<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Input Data Karyawan</title>
</head>

<body>
    <h2>Input Data Karyawan</h2>

    <a href="karyawan_0340.php" style="background-color: #009900; color: #fff; padding: 0.4% 0.8%; border-radius: 2px; text-decoration: none;">Data Karyawan</a>

    <br><br>

    <form action="" method="post">
        <table>
            <tr>
                <td>Kode Karyawan</td>
                <td>:</td>
                <td><input type="text" name="kd_karyawan" placeholder="Kode Karyawan" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="Nama Lengkap" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" placeholder="Alamat" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tmp_lahir" placeholder="Tempat Lahir" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgl_lahir" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jk">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>

</body>

</html>

<?php
if (isset($_POST['simpan'])) {
    include 'koneksi_0340.php';

    //mengambil data yang di POST dan menampung ke dalam variabel
    $kd_karyawan    = $_POST['kd_karyawan'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $tmp_lahir      = $_POST['tmp_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $jk             = $_POST['jk'];

    //melakukan tambah/insert data
    $insert = mysqli_query($con, "INSERT INTO karyawan_0340(kd_karyawan, nama, alamat, tmp_lahir, tgl_lahir, jk) VALUES ('$kd_karyawan','$nama','$alamat','$tmp_lahir','$tgl_lahir','$jk')");

    //memeriksa tambah/insert data berhasil dan memberikan pesan berhasil/gagal
    if ($insert) {
        echo 'Berhasil disimpan';
    } else {
        echo 'Gagal disimpan' . mysqli_error($con);
    }
}
