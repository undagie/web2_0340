<?php
//memanggil dan menyertakan file fpdf
include 'fpdf184/fpdf.php';
//memanggil dan menyertakan file koneksi
include 'koneksi_0340.php';

function jenis_kelamin($jk)
{
    if ($jk == 'L') {
        $namajk = 'Laki-laki';
    } else {
        $namajk = 'Perempuan';
    }

    return $namajk;
}

//membuat objek dari class FPDF untuk mengatur orientasi halaman, satuan ukuran, ukuran halaman
$pdf = new FPDF('P', 'mm', 'A4');
//memanggil method AddPage() untuk menambahkan halaman
$pdf->AddPage();
//mengatur jenis, bentuk dan ukuran tulisan
$pdf->SetFont('Arial', 'B', 16);
//membuat baris dan menuliskan isinya
$pdf->Cell(0, 5, 'PT. MAJU SUKSES MANDIRI', 0, 1, 'C', false);

$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, 'Alamat: Jl. Pelabuhan Laut No. 5 Banjarmasin Selatan', 0, 1, 'C', false);

$pdf->SetFont('Arial', 'i', 6);
$pdf->Cell(0, 5, 'Telp: (0511)335213, HP: 085345775699', 0, 1, 'C', false);

//memberi jarak
$pdf->Ln(3);
//untuk membuat baris
$pdf->Cell(190, 0.6, '', 0, 1, 'C', true);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, 'Laporan Data Karyawan', 0, 1, 'L', false);
$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(20, 6, 'Kode Karyawan', 1, 0, 'C');
$pdf->Cell(35, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(35, 6, 'Alamat', 1, 0, 'C');
$pdf->Cell(35, 6, 'Tempat Lahir', 1, 0, 'C');
$pdf->Cell(35, 6, 'Tanggal Lahir', 1, 0, 'C');
$pdf->Cell(20, 6, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Ln(2);

//menjalankan kueri mysql
$select = mysqli_query($con, "SELECT * FROM karyawan_0340");

$no = 1;

//memeriksa jumlah baris dari hasil kueri
if (mysqli_num_rows($select) > 0) {

    //mengambil data hasil dari kueri
    while ($hasil = mysqli_fetch_array($select)) {
        $pdf->Ln(4);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 4, $no++, 1, 0, 'C');
        $pdf->Cell(20, 4, $hasil['kd_karyawan'], 1, 0, 'C');
        $pdf->Cell(35, 4, $hasil['nama'], 1, 0, 'L');
        $pdf->Cell(35, 4, $hasil['alamat'], 1, 0, 'L');
        $pdf->Cell(35, 4, $hasil['tmp_lahir'], 1, 0, 'L');
        $pdf->Cell(35, 4, $hasil['tgl_lahir'], 1, 0, 'C');
        $pdf->Cell(20, 4, jenis_kelamin($hasil['jk']), 1, 0, 'C');
    }
} else {
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(188, 6, 'Tidak Ada Ada', 1, 0, 'C');
}

//menampilkan laporan langsung ke peramban/browser
$pdf->Output('Laporan-Karyawan.pdf', 'I');
