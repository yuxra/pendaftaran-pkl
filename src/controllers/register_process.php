<?php
include '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    if (empty($username) || empty($email) || empty($password)) {
        die("pastikan kamu sudah mengisi semua kolom dengan benar");
    }

    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $result = pg_query($conn, $query)

    if ($result) {
        echo "register berhasil! silahkan <a href='../../login.php'>Login</a>";
    } else {
        echo "gagal registrasi: " . pg_last_error($conn);
    }
} else {
    echo "akses ditolak";
}
?>
