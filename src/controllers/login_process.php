<?php
include '../../config/database.php';
session_destroy();
session_start();
$_SESSION = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        die("email dan password harus diisi!");
    }

    $query = "SELECT * FROM users WHERE email = :'$email'";
    $result = pg_query($conn, $query);
    $user = pg_fetch_assoc($result);

    if ($user) {
            if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user;
            header("Location: ../../profile.php");
            exit;
        } else {
            echo "password salah";
        }

    } else {
        echo "email tidak ditemukan";
    }
    
} else {
    echo "akses ditolak";
}
?>
