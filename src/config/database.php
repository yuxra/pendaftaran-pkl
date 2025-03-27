<?php
$host = "localhost";
$dbname = "pendaftaran_pkl";
$user = "postgres";
$password = "rsu333007"; 

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Koneksi ke database gagal: " . pg_last_error());
} 
?>
