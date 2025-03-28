<?php
include '../config/database.php';
session_start();

$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = pg_query($conn, $query);
$user = pg_fetch_assoc($result);

echo "<h2>Profil Kamu</h2>";
echo "<p>Username: " . $user["username"] . "</p>";
echo "<p>Email: " . $user["email"] . "</p>";

if (!empty($user["profile_picture"])) {
    echo "<img src='/src/uploads/" . htmlspecialchars($user["profile_picture"]) . "' width='150'>";
} else {
    echo "<p>Belum ada foto profil</p>";
}
?>
