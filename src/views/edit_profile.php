<?php
session_start(); // Jangan duplikasi session_start()

// Cek apakah user sudah login
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Jika belum login, kembali ke login
    exit();
}

// Debugging: cek apakah session ada
// var_dump($_SESSION); exit();

// Jika sudah login, tampilkan halaman edit profil
echo "Halo, " . htmlspecialchars($_SESSION["username"]);

// Ambil data user dari database
include '../config/database.php';

if (!$conn) {
    die("Koneksi ke database gagal.");
}

$user_id = $_SESSION['user_id'];
$query = "SELECT username, email, profile_picture FROM users WHERE id = $1";
$result = pg_query_params($conn, $query, [$user_id]);

if ($result && $row = pg_fetch_assoc($result)) {
    $username = $row['username'];
    $email = $row['email'];
    $profile_picture = $row['profile_picture'] ?: 'default.jpg'; // Jika tidak ada, pakai default
} else {
    die("User tidak ditemukan atau query gagal.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
</head>
<body>
    <h2>Edit Profil</h2>

    <img src="../../uploads/<?= htmlspecialchars($profile_picture) ?>" alt="Foto Profil" width="100"><br>

    <form action="../controllers/edit_profile_process.php" method="POST" enctype="multipart/form-data">
        <!-- User ID agar dikirim ke proses update -->
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= htmlspecialchars($username) ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required><br>

        <label for="profile_picture">Upload Foto Profil:</label>
        <input type="file" name="profile_picture" id="profile_picture"><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
