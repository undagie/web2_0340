<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Karyawan</title>
    <style>
        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <h2>Data Karyawan</h2>

    <a href="tambah_0340.php" class="no-print" style="background-color: #009900; color: #fff; padding: 0.4% 0.8%; border-radius: 2px; text-decoration: none;">Tambah Data</a>

    <br><br>

    <table border="1" cellspacing="0" width="75%">
        <tr style="background-color: #00ffff;">
            <th>No</th>
            <th>Kode Karyawan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th class="no-print">Opsi</th>
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
                    <td class="no-print">
                        <a href="edit_0340.php?kode=<?= $hasil['kd_karyawan']; ?>">Edit</a> |
                        <a href="hapus_0340.php?kode=<?= $hasil['kd_karyawan']; ?>">Hapus</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="8" style="text-align: center;">Data tidak ada</td></tr>';
        };
        ?>
    </table>

    <br>

    <a href="cetak_0340.php" class="no-print" style="background-color: #347aeb; color: #fff; padding: 0.4% 0.8%; border-radius: 2px; text-decoration: none;" target="_blank">Cetak PDF</a>
    <a href="cetakexcel_0340.php" class="no-print" style="background-color: #347aeb; color: #fff; padding: 0.4% 0.8%; border-radius: 2px; text-decoration: none;" target="_blank">Cetak Excel</a>
    <a href="#" onclick="window.print();" class="no-print" style="background-color: #347aeb; color: #fff; padding: 0.4% 0.8%; border-radius: 2px; text-decoration: none;">Cetak</a>

</body>

</html>