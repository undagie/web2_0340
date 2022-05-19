<?php
include 'fpdf_php7/fpdf.php';
include 'koneksi_0340.php';

//membuat objek dari class FPDF untuk mengatur orientasi halaman, satuan ukuran, ukuran halaman
$pdf = new FPDF('P', 'mm', 'A4');
//memanggil method AddPage() untuk menambahkan halaman
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'PT. MAJU SUKSES MANDIRI', 0, 1, 'C', false);


$pdf->Output('Laporan-Karyawan.pdf', 'I');
