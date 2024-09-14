<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit;
}

include('header.php');
include('../config/db.php');

// Proses upload foto/video
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $media_type = $_POST['media_type'];
    $files = $_FILES['media_files'];

    // Pastikan direktori upload ada
    $target_dir = "../uploads/media/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // Loop untuk upload setiap file
    $total_files = count($files['name']);
    for ($i = 0; $i < $total_files; $i++) {
        $file_name = $files['name'][$i];
        $file_tmp_name = $files['tmp_name'][$i];
        $target_file = $target_dir . basename($file_name);

        // Pindahkan file yang diupload ke direktori
        if (move_uploaded_file($file_tmp_name, $target_file)) {
            $stmt = $pdo->prepare("INSERT INTO media (title, media_type, file_name) VALUES (?, ?, ?)");
            $stmt->execute([$title, $media_type, $file_name]);
        } else {
            echo "<div class='alert alert-danger'>Gagal mengunggah file: $file_name.</div>";
        }
    }

    echo "<div class='alert alert-success'>Media berhasil diunggah!</div>";
}
?>

<h2 class="mt-3">Upload Foto/Video Kegiatan</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="media_type" class="form-label">Tipe Media</label>
        <select class="form-select" id="media_type" name="media_type" required>
            <option value="photo">Foto</option>
            <option value="video">Video</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="media_files" class="form-label">Unggah File (Bisa lebih dari satu)</label>
        <input type="file" class="form-control" id="media_files" name="media_files[]" multiple required>
    </div>
    <button type="submit" class="btn btn-primary">Unggah Media</button>
</form>

<?php include('../includes/footer.php'); ?>
