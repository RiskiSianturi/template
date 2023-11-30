<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle input kegiatan form submission
    // Validate and insert data into the 'kegiatan' table
    // Example validation, you should add more checks

    $nama_kegiatan = $_POST['nama_kegiatan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $foto_kegiatan = $_POST['foto_kegiatan']; // You may need to handle file uploads
    $sertifikat_kegiatan = $_POST['sertifikat_kegiatan'];

    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO kegiatan (mahasiswa_id, nama_kegiatan, tanggal_mulai, tanggal_selesai, foto_kegiatan, sertifikat_kegiatan) 
            VALUES ('$user_id', '$nama_kegiatan', '$tanggal_mulai', '$tanggal_selesai', '$foto_kegiatan', '$sertifikat_kegiatan')";

    if ($conn->query($sql) === TRUE) {
        echo "Kegiatan added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>