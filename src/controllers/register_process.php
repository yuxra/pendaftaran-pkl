<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username) || empty($email) || empty($password)) {
        die("<script>alert('Pastikan kamu sudah mengisi semua kolom dengan benar'); window.location.href='../views/register.php';</script>");
    }

    $check_query = "SELECT * FROM users WHERE username = $1 OR email = $2";
    $check_result = pg_prepare($conn, "check_user", $check_query);
    $execute_check = pg_execute($conn, "check_user", [$username, $email]);

    if (pg_num_rows($execute_check) > 0) {
        echo "<script>alert('Akun ini sudah terdaftar, silahkan coba lagi'); window.location.href='../views/register.php';</script>";
        exit();
    }


    $hashed_password = password_hash($password, PASSWORD_BCRYPT);


    $query = "INSERT INTO users (username, email, password) VALUES ($1, $2, $3)";
    $result = pg_prepare($conn, "register_user", $query);
    
    if ($result) {
        $execute = pg_execute($conn, "register_user", [$username, $email, $hashed_password]);

        if ($execute) {
            echo "<script>alert('Register berhasil! Silahkan login.'); window.location.href='../views/login.php';</script>";
        } else {
            echo "Gagal registrasi: " . pg_last_error($conn);
        }
    } else {
        echo "Gagal menyiapkan query: " . pg_last_error($conn);
    }
} else {
    echo "Akses ditolak";
}
?>
