<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Barang</title>
</head>

<body>
    <h2>Data Barang</h2>

    <a href="tambahbarang_0340.php" style="background-color: #009900; color: #fff; padding: 0.4% 0.8%; border-radius: 2px; text-decoration: none;">Tambah Data</a>

    <br><br>

    <table border="1" cellspacing="0" width="75%">
        <tr style="background-color: #00ffff;">
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Merk</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>

        <?php
        //memanggil file koneksi_0340
        include 'koneksi_0340.php';

        //menjalankan kueri mysql
        $select = mysqli_query($con, "SELECT * FROM barang_0340");

        $no = 1;

        //memeriksa jumlah baris dari hasil kueri
        if (mysqli_num_rows($select) > 0) {

            //mengambil data hasil dari kueri
            while ($hasil = mysqli_fetch_array($select)) {
        ?>
                <tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td style="text-align: center;"><?= $hasil['kd_barang']; ?></td>
                    <td><?= $hasil['nama']; ?></td>
                    <td><?= $hasil['merk']; ?></td>
                    <td><?= $hasil['stok']; ?></td>
                    <td><?= $hasil['harga']; ?></td>
                    <td>
                        <a href="editbarang_0340.php?kode=<?= $hasil['kd_barang']; ?>">Edit</a> |
                        <a href="hapusbarang_0340.php?kode=<?= $hasil['kd_barang']; ?>">Hapus</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="7" style="text-align: center;">Data tidak ada</td></tr>';
        };
        ?>
    </table>
</body>

</html>