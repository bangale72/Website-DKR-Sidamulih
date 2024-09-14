<?php
session_start();
include('../config/db.php'); // Koneksi ke database

// Cek apakah form registrasi disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi password
    if ($password !== $confirm_password) {
        $error_message = "Password dan konfirmasi password tidak cocok.";
    } else {
        // Enkripsi password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashed_password]);

        $success_message = "Registrasi berhasil! Silakan login.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/images/favicon/favicon.png">
    <link rel="manifest" href="../assets/images/favicon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Register Admin</title>
    <link rel="stylesheet" href="style.css"> <!-- Sesuaikan path style.css -->
</head>
<body>

<div class="register-container">

    <?php
    // Tampilkan pesan error jika ada
    if (isset($error_message)) {
        echo "<div class='alert alert-danger text-center'>$error_message</div>";
    }
    // Tampilkan pesan sukses jika ada
    if (isset($success_message)) {
        echo "<div class='alert alert-success text-center'>$success_message</div>";
    }
    ?>

    <h2>Register | Admin</h2>
    <p class="text-center">Kembali ke beranda <a href="../index.php"> <i class="bi bi-house"></i></a></p>

    <form method="POST" action="register.php">
        <div class="mt-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="mt-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="mt-3">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Komfirmasi Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <div class="text-center mt-3">
        <span>Sudah punya akun? </span><a href="login.php">Login</a>
    </div>

    <footer>
        <div class="text-center mt-3">
            <span class="text-muted">© 2024 DKR Sidamulih. All Rights Reserved.</span>
        </div>
    </footer>

</div>

</body>
</html>
