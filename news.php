<?php
// Koneksi database
include('config/db.php');

// Query untuk mendapatkan semua berita
$stmt = $pdo->query("SELECT * FROM news ORDER BY published_date DESC");
$news = $stmt->fetchAll();
?>

<?php include('includes/header.php'); ?>

<h2 class="text-center mt-5">Berita Terbaru</h2>
<div class="list-group mt-5">
    <?php foreach ($news as $article): ?>
        <div class="list-group-item mb-3">
            <!-- Menampilkan gambar berita -->
            <?php if (!empty($article['image'])): ?>
                <center><img src="../pages/uploads/news/<?php echo htmlspecialchars($article['image']); ?>" alt="News Image" style="width:70%; height:auto;"></center>
            <?php endif; ?>
            <h5 class="mt-3"><?php echo htmlspecialchars($article['title']); ?></h5>
            <p class="mt-3"><?php echo htmlspecialchars($article['content']); ?></p>
            <small>Dipubilkasikan pada: <?php echo htmlspecialchars(date('d M Y', strtotime($article['published_date']))); ?></small>
        </div>
    <?php endforeach; ?>
</div>

<?php include('includes/footer.php'); ?>
