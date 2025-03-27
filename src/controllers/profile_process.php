<?php
session_start();
include("../config/database.php");
if (!isset($conn)) {
    die("Koneksi ke database gagal! Periksa file database.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];


    if (empty($id) || empty($username) || empty($email)) {
        die("pastikan kamu sudah mengisi semua kolom dengan benar");
    }

    $query = "UPDATE users SET username = '$username', email = '$email' WHERE id = $id";
    $result = pg_query($conn, $query);

    if ($result) {
        $_SESSION["user"]["username"] = $username;
        $_SESSION["user"]["email"] = $email;
        header("Location: ../views/profile.php");
        exit;
    } else {
        echo "gagal update profile: " . pg_last_error($conn);
    }
} else {
    echo "akses ditolak!";
}

?>
