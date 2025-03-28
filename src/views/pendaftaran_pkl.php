<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran PKL</title>
    <link rel="stylesheet" href="../../public/pendaftaran.css">
</head>
<body>

    <div class="container">
        <h2>Form Pendaftaran PKL</h2>
        <form action="../controllers/pendaftaran_process.php" method="POST">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>

            <label for="nim_nis">NIM/NIS</label>
            <input type="text" id="nim_nis" name="nim_nis" required>

            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" required></textarea>

            <label for="no_hp">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="sekolah_univ">Sekolah/Universitas</label>
            <input type="text" id="sekolah_univ" name="sekolah_univ" required>

            <label for="jurusan">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" required>

            <label for="alasan">Alasan Memilih Tempat PKL</label>
            <textarea id="alasan" name="alasan" required></textarea>

            <label for="project_link">Link Projek (Google Drive, dll.)</label>
            <input type="text" id="project_link" name="project_link" required>

            <button type="submit">Daftar</button>
        </form>
    </div>

</body>
</html>
