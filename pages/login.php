<?php
session_start();
include('../config/db.php'); // Koneksi ke database

// Cek apakah form login disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Jika pengguna ditemukan dan password cocok
    if ($user && password_verify($password, $user['password'])) {
        // Simpan informasi user ke session
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $user['username'];

        // Tampilkan pesan sukses dan tunggu 2 detik sebelum redirect
        $success_message = '';
        
        // Menampilkan pesan dan jeda 2 detik sebelum redirect
        echo "<p>{$success_message}</p>";
        header("refresh:1;url=admin_dashboard.php");
        exit;
    } else {
        $error_message = "Username atau Password Salah.";
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
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css"> <!-- Sesuaikan path style.css -->
</head>
<body>

<div class="login-container">

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

    <h2>Login | Admin</h2>
    <p class="text-center">Kembali ke beranda <a href="../index.php"> <i class="bi bi-house"></i></a></p>

    <form method="POST" action="login.php">
        <div class="mb-3">
            
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
            
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="col-md-12 text-center mt-3">
        <span>Belum punya akun? </span><a href="register.php">Register</a>
    </div>
    <footer>
        <div class="text-center mt-3">
            <span class="text-muted">© 2024 DKR Sidamulih. All Rights Reserved.</span>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
