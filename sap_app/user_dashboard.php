

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Input Kegiatan</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Input Kegiatan</h2>
        <form method="post" action="inputkegiatan.php">
            <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" name="nama_kegiatan" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggal_mulai" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggal_selesai" required>
            </div>
            <div class="mb-3">
                <label for="foto_kegiatan" class="form-label">Foto Kegiatan</label>
                <input type="file" class="form-control" name="foto_kegiatan">
            </div>
            <div class="mb-3">
                <label for="sertifikat_kegiatan" class="form-label">Sertifikat Kegiatan</label>
                <input type="file" class="form-control" name="sertifikat_kegiatan" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form><br>
        <a href="info.php">
  <button type="button">Detail</button>
</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
