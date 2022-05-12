<?php
//memanggil file koneksi_0340
include 'koneksi_0340.php';

//menangkap kode melalui GET
$kd_karyawan = $_GET['kode'];

//mengambil data berdasarkan kode
$data_edit = mysqli_query($con, "SELECT * FROM karyawan_0340 WHERE kd_karyawan='$kd_karyawan'");

//menampung hasil dari kueri select
$hasil = mysqli_fetch_array($data_edit);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Data Karyawan</title>
</head>

<body>
    <h2>Edit Data Karyawan</h2>

    <a href="karyawan_0340.php" style="background-color: #009900; color: #fff; padding: 0.4% 0.8%; border-radius: 2px; text-decoration: none;">Data Karyawan</a>

    <br><br>

    <form action="" method="post">
        <table>
            <tr>
                <td>Kode Karyawan</td>
                <td>:</td>
                <td><input type="text" name="kd_karyawan" placeholder="Kode Karyawan" value="<?= $hasil['kd_karyawan']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="Nama Lengkap" value="<?= $hasil['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" placeholder="Alamat" value="<?= $hasil['alamat']; ?>" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tmp_lahir" placeholder="Tempat Lahir" value="<?= $hasil['tmp_lahir']; ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgl_lahir" value="<?= $hasil['tgl_lahir']; ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jk">
                        <option value="L" <?php echo ($hasil['jk'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="P" <?php echo ($hasil['jk'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
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

    $kode = $_GET['kode'];

    //mengambil data yang di POST dan menampung ke dalam variabel
    $kd_karyawan    = $_POST['kd_karyawan'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $tmp_lahir      = $_POST['tmp_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $jk             = $_POST['jk'];

    //melakukan pembaruan/update data
    $update = mysqli_query($con, "UPDATE karyawan_0340 SET kd_karyawan='$kd_karyawan',nama='$nama',alamat='$alamat ',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',jk='$jk' WHERE kd_karyawan='$kode'");

    //memeriksa pembaruan/update data berhasil dan memberikan pesan berhasil/gagal
    if ($update) {
        echo 'Berhasil diperbarui';
    } else {
        echo 'Gagal diperbarui' . mysqli_error($con);
    }
}
