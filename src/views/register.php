<link rel="stylesheet" href="../../public/style.css">
</head>
<body>
    <div class="container">
        <h1>Registrasi PKL</h1>
        <form action="../controllers/register_process.php" method="POST">
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
    </div>
</body>