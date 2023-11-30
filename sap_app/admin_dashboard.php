<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include('koneksi.php');

// Fetch kegiatan data for display
$sql = "SELECT * FROM kegiatan";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission for kegiatan validation
    if (isset($_POST['kegiatan_id']) && isset($_POST['status'])) {
        $kegiatan_id = $_POST['kegiatan_id'];
        $status = $_POST['status'];

        // Update the kegiatan status in the database
        $updateSql = "UPDATE kegiatan SET status = '$status' WHERE id = '$kegiatan_id'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Kegiatan status updated successfully";
        } else {
            echo "Error updating kegiatan status: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Welcome to Admin Dashboard</h2>
        <h3>Kegiatan Data</h3>
        <form method="post" action="admin_dashboard.php">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Foto Kegiatan</th>
                        <th>Sertifikat Kegiatan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['nama_kegiatan']; ?></td>
                            <td><?php echo $row['tanggal_mulai']; ?></td>
                            <td><?php echo $row['tanggal_selesai']; ?></td>
                            <td><?php echo $row['foto_kegiatan']; ?></td>
                            <td><?php echo $row['sertifikat_kegiatan']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <button type="button" class="btn btn-success" onclick="approve(<?php echo $row['id']; ?>)">Setuju</button>
                                <button type="button" class="btn btn-danger" onclick="reject(<?php echo $row['id']; ?>)">Tidak Setuju</button>
                                <input type="hidden" name="kegiatan_id" id="kegiatan_id_<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function approve(kegiatanId) {
            document.getElementById('kegiatan_id_' + kegiatanId).value = kegiatanId;
            document.getElementById('status_' + kegiatanId).value = 'setuju';
            document.forms[0].submit();
        }

        function reject(kegiatanId) {
            document.getElementById('kegiatan_id_' + kegiatanId).value = kegiatanId;
            document.getElementById('status_' + kegiatanId).value = 'tidak_setuju';
            document.forms[0].submit();
        }
    </script>
</body>
</html>
