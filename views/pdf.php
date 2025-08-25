<?php
// pastikan path sesuai dengan struktur projectmu
require_once('../assets/fpdf.php');
require_once('../core/database.php'); // file koneksi PDO ke DB

// FIX fontpath error
if (!defined('FPDF_FONTPATH')) {
    define('FPDF_FONTPATH', __DIR__ . '/../assets/font/');
}

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('../assets/logo.png', 15, 10, 25);
        // Nama Yayasan
        $this->SetFont('Times', 'B', 12);
        $this->Cell(190, 7, 'YAYASAN MANUNGGAL CIPTA RASA KARSA & KARYA', 0, 1, 'C');
        // Nama Sekolah
        $this->SetFont('Times', 'B', 16);
        $this->Cell(190, 9, 'SMKS MULTISTUDI HIGH SCHOOL BATAM', 0, 1, 'C');
        // Alamat & kontak
        $this->SetFont('Times', '', 11);
        $this->Cell(190, 6, 'Gedong Gapuro Jl. Kuda Laut Kav.121 Batu Ampar, Batam, Telp. (0778) 422859', 0, 1, 'C');
        $this->Cell(190, 6, 'E-mail: humasmhs@multistudi.sch.id | Web: multistudi.sch.id | NPSN.11002576 | Kode Pos 29453', 0, 1, 'C');
        // Garis pembatas
        $this->Ln(2);
        $this->SetLineWidth(0.8);
        $this->Line(10, 45, 200, 45);
        $this->SetLineWidth(0.2);
        $this->Line(10, 47, 200, 47);
        $this->Ln(15);

        // Judul laporan
        $this->SetFont('Times', 'B', 14);
        $this->Cell(190, 10, 'LAPORAN KETERLAMBATAN SISWA', 0, 1, 'C');
        $this->Ln(5);

        // Header tabel
        $this->SetFont('Times', 'B', 12);
        $this->Cell(10, 10, '#', 1, 0, 'C');
        $this->Cell(50, 10, 'Nama', 1, 0, 'C');
        $this->Cell(40, 10, 'Kelas', 1, 0, 'C');
        $this->Cell(30, 10, 'Tanggal', 1, 0, 'C');
        $this->Cell(60, 10, 'Alasan Terlambat', 1, 1, 'C');
    }

    function Footer()
    {
        // Posisi 1.5 cm dari bawah
        $this->SetY(-30);
        $this->SetFont('Times', '', 12);
        $this->Cell(120);
        $this->Cell(70, 6, 'Batam, ' . date('d-m-Y'), 0, 1, 'C');
        $this->Ln(20);
        $this->Cell(120);
        $this->Cell(70, 6, 'Kepala Sekolah', 0, 1, 'C');
        $this->Ln(25);
        $this->Cell(120);
        $this->Cell(70, 6, '_________________________', 0, 1, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);


$stmt = $pdo->query("SELECT kt.id, s.nama, k.nama_kelas, kt.alasan, kt.tanggal 
                     FROM keterlambatan kt 
                     JOIN siswa s ON kt.id_siswa = s.id 
                     JOIN kelas k ON s.id_kelas = k.id");

$i = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(10, 10, $i++, 1, 0, 'C');
    $pdf->Cell(50, 10, $row['nama'], 1, 0, 'L');
    $pdf->Cell(40, 10, $row['nama_kelas'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['tanggal'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['alasan'], 1, 1, 'L');
}

// Output PDF (langsung download)
$pdf->Output('D', 'laporan_keterlambatan.pdf');
