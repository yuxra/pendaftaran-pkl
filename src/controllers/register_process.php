<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(["username" => $username, "email" => $email, "password" => $password]);

    echo "Pendaftaran berhasil!";
}
?>
