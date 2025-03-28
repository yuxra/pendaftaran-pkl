<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST["nama_lengkap"];
    $nim_nis = $_POST["nim_nis"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $email = $_POST["email"];
    $sekolah_univ = $_POST["sekolah_univ"];
    $jurusan = $_POST["jurusan"];
    $alasan = $_POST["alasan"];
    $project_link = $_POST["project_link"];

    if (empty($nama_lengkap) || empty($nim_nis) || empty($alamat) || empty($no_hp) || empty($email) || empty($sekolah_univ) || empty($jurusan) || empty($alasan) || empty($project_link)) {
        die("pastikan sudah mengisi semuanya dengan benar");
    }

    $query = "INSERT INTO pendaftaran_pkl (nama_lengkap, nim_nis, alamat, no_hp, email, sekolah_univ, jurusan, alasan, project_link)
            VALUES ('$nama_lengkap', '$nim_nis', '$alamat', '$no_hp', '$email', '$sekolah_univ', '$jurusan', '$alasan', '$project_link')";

    $result = pg_query($conn, $query);


    if ($result) {
        echo "<script>
            alert('Yeay! Pendaftaran berhasil!');
            window.location.href = '../views/pendaftaran_pkl.php'; // Ganti dengan halaman form-mu
        </script>";
    } else {
        echo "<script>
            alert('Yah, gagal mendaftar: " . pg_last_error($conn) . "');
            window.location.href = '../views/pendaftaran_pkl.php'; // Redirect balik ke form
        </script>";
    }
    
}
?>

