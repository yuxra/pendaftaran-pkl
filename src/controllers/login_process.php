<?php
include '../config/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = $1";
    $result = pg_query_params($conn, $query, array($email));
    $user = pg_fetch_assoc($result);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user;
        header("Location: ../views/pendaftaran_pkl.php");
        exit;
    } else {
        echo "<script>
        window.location.href = '../views/login.php';
        alert('Email atau password salah! coba lagi');
    </script>";
    }
} else {
    echo "<script>
    window.location.href = '../views/login.php';
    alert('akses ditolak');
</script>";
}
?>
