<?php
include '../config/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query untuk mencari user berdasarkan email
    $query = "SELECT * FROM users WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));

    // Ambil hasil query
    if ($user = pg_fetch_assoc($result)) {
        // Cek apakah password yang dimasukkan sesuai dengan yang ada di database
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            session_write_close();

            // Redirect ke halaman edit profile setelah login berhasil
            header("Location: ../views/edit_profile.php");
            exit();
        } else {
            // Jika password salah
            echo "<script>
                alert('Email atau password salah! coba lagi');
                window.location.href = '../views/login.php';
            </script>";
        }
    } else {
        // Jika user tidak ditemukan
        echo "<script>
            alert('Akun tidak ditemukan! Silakan daftar terlebih dahulu.');
            window.location.href = '../views/register.php';
        </script>";
    }
} else {
    // Jika halaman diakses tanpa metode POST
    echo "<script>
        alert('Akses ditolak');
        window.location.href = '../views/login.php';
    </script>";
}
?>
