<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Profil Pengguna</h2>
    <p>Username: <?= $user["username"] ?></p>
    <p>Email: <?= $user["email"] ?></p>

    <h3>Edit Profil</h3>
    <form action="../controllers/profile_process.php" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <label>Username:</label><br>
        <input type="text" name="username" value="<?= $user['username'] ?>"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $user['email'] ?>"><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="../controllers/logout_process.php">Logout</a>
</body>
</html>
