<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}

include('header.php');
include('../config/db.php'); // Pastikan koneksi database ada di sini

// Menambah Acara
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];

    // Proses Upload Gambar
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/events/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Simpan data acara beserta nama file gambar
    $stmt = $pdo->prepare("INSERT INTO events (title, description, event_date, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $event_date, $image]);

    echo "<div class='alert alert-success'>Acara berhasil ditambahkan!</div>";
}

// Menambah Berita
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_news'])) {
    $news_title = $_POST['news_title'];
    $news_content = $_POST['news_content'];
    $published_date = $_POST['published_date'];

    // Proses Upload Gambar
    $news_image = $_FILES['news_image']['name'];
    $target_dir = "uploads/news/";
    $target_file = $target_dir . basename($news_image);
    move_uploaded_file($_FILES['news_image']['tmp_name'], $target_file);

    // Simpan berita beserta gambar
    $stmt = $pdo->prepare("INSERT INTO news (title, content, published_date, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$news_title, $news_content, $published_date, $news_image]);

    echo "<div class='alert alert-success'>Berita berhasil ditambahkan!</div>";
}
?>
<!-- Link ke halaman upload media -->
<h2 class="mt-3">Unggah Foto/Video Kegiatan</h2>
<a href="upload_media.php" class="btn btn-secondary mb-3">Upload Media</a>

<h2>Tambah Acara</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Judul Acara</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="event_date" class="form-label">Tanggal Acara</label>
        <input type="date" class="form-control" id="event_date" name="event_date" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Unggah Gambar</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary" name="add_event">Tambah Acara</button>
</form>

<hr>

<h2>Tambah Berita</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="news_title" class="form-label">Judul Berita</label>
        <input type="text" class="form-control" id="news_title" name="news_title" required>
    </div>
    <div class="mb-3">
        <label for="news_content" class="form-label">Konten Berita</label>
        <textarea class="form-control" id="news_content" name="news_content" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label for="published_date" class="form-label">Tanggal Publikasi</label>
        <input type="date" class="form-control" id="published_date" name="published_date" required>
    </div>
    <div class="mb-3">
        <label for="news_image" class="form-label">Unggah Gambar</label>
        <input type="file" class="form-control" id="news_image" name="news_image">
    </div>
    <button type="submit" class="btn btn-primary" name="add_news">Tambah Berita</button>
</form>

<?php include('footer.php'); ?>
