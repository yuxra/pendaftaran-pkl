<?php
session_start();
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"] ?? ''; // Pastikan user_id ada

    if (empty($user_id)) {
        die("User ID tidak ditemukan!");
    }

    // Cek apakah ada file yang diupload
    if (!empty($_FILES["profile_picture"]["name"])) {
        // Buat folder uploads jika belum ada
        if (!is_dir('../../uploads')) {
            mkdir('../../uploads', 0777, true);
        }

        // Atur nama file
        $ext = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
        $newFilename = time() . "_" . uniqid() . "." . $ext;
        $uploadPath = "../../uploads/" . $newFilename;

        // Cek apakah file berhasil dipindahkan
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $uploadPath)) {
            // Update ke database
            $query = "UPDATE users SET profile_picture='$newFilename' WHERE id=$user_id";
            $result = pg_query($conn, $query);

            if ($result) {
                echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='../views/profile.php';</script>";
            } else {
                echo "Gagal update profil: " . pg_last_error($conn);
            }
        } else {
            echo "Gagal mengupload gambar.";
        }
    } else {
        echo "Tidak ada file yang diupload.";
    }
} else {
    echo "Akses ditolak!";
}
?>
