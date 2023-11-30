<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Include your database connection code here (use mysqli or PDO)
include_once "koneksi.php";

// Get user ID from the session
$user_id = $_SESSION["user_id"];

// Retrieve data from the 'kegiatan' table based on user ID
$sql = "SELECT * FROM kegiatan WHERE mahasiswa_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Generate PDF with kegiatan data
require('fpdf.php'); // You may need to download and include the FPDF library

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(0, 10, 'Nama Kegiatan: ' . $row['nama_kegiatan'], 0, 1);
    $pdf->Cell(0, 10, 'Tanggal Mulai: ' . $row['tanggal_mulai'], 0, 1);
    $pdf->Cell(0, 10, 'Tanggal Selesai: ' . $row['tanggal_selesai'], 0, 1);
    // Add other kegiatan details here
    $pdf->Ln();
}

$pdf->Output('D', 'Surat Keterangan Validasi.pdf'); // Download the PDF

// Close the statement and connection
$stmt->close();
$conn->close();
?>
