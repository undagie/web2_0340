<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Karyawan.xls");
?>

<h2>PT. MAJU SUKSES MANDIRI</h2>
<h3>Alamat: Jl. Pelabuhan Laut No. 5 Banjarmasin Selatan</h3>
<h5>Telp: (0511)335213, HP: 085345775699</h5><br><br>
<h3>Data Karyawan</h3>

<table border="1" cellspacing="0" width="75%">
    <tr style="text-align: center; font-weight:bold; background-color: #00ffff;">
        <th>No</th>
        <th>Kode Karyawan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
    </tr>

    <?php
    //memanggil file koneksi_0340
    include 'koneksi_0340.php';

    //menjalankan kueri mysql
    $select = mysqli_query($con, "SELECT * FROM karyawan_0340");

    $no = 1;

    //memeriksa jumlah baris dari hasil kueri
    if (mysqli_num_rows($select) > 0) {

        //mengambil data hasil dari kueri
        while ($hasil = mysqli_fetch_array($select)) {
    ?>
            <tr>
                <td style="text-align: center;"><?= $no++; ?></td>
                <td style="text-align: center;"><?= $hasil['kd_karyawan']; ?></td>
                <td><?= $hasil['nama']; ?></td>
                <td><?= $hasil['alamat']; ?></td>
                <td><?= $hasil['tmp_lahir']; ?></td>
                <td style="text-align: center;"><?= $hasil['tgl_lahir']; ?></td>
                <td style="text-align: center;"><?= $hasil['jk']; ?></td>
            </tr>
    <?php
        }
    } else {
        echo '<tr><td colspan="8" style="text-align: center;">Data tidak ada</td></tr>';
    };
    ?>
</table>