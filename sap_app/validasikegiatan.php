<?php
session_start();

// Check if the user is an admin (you may implement your own logic for admin check)
if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here (use mysqli or PDO)
    include_once "db_connect.php";

    // Get form data
    $kegiatan_id = $_POST["kegiatan_id"];
    $status = $_POST["status"];

    // Update status in the 'kegiatan' table
    $sql = "UPDATE kegiatan SET status = ? WHERE id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $kegiatan_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Validation successful
        echo "Validation successful. Redirecting to admin dashboard...";
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Validation failed
        echo "Error during validation: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Kegiatan</title>
</head>
<body>
    <h2>Validasi Kegiatan Form</h2>
    <form action="validasikegiatan.php" method="post">
        <label for="kegiatan_id">Kegiatan ID:</label>
        <input type="text" name="kegiatan_id" required><br>

        <label for="status">Status (approved/rejected):</label>
        <input type="text" name="status" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
