<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: src/views/login.php"); 
} else {
    header("Location: src/views/register.php");
}
exit;
?>
