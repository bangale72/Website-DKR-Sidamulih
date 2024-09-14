<?php
include('includes/header.php');
include('config/db.php');

// Ambil query dari form pencarian
$search_query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';

if (!empty($search_query)) {
    // Mencari di tabel berita
    $stmt_news = $pdo->prepare("SELECT * FROM news WHERE title LIKE ? OR content LIKE ? ORDER BY published_date DESC");
    $stmt_news->execute(["%$search_query%", "%$search_query%"]);
    $news_results = $stmt_news->fetchAll();

    // Mencari di tabel kegiatan
    $stmt_events = $pdo->prepare("SELECT * FROM events WHERE title LIKE ? OR description LIKE ? ORDER BY event_date DESC");
    $stmt_events->execute(["%$search_query%", "%$search_query%"]);
    $event_results = $stmt_events->fetchAll();
} else {
    $news_results = [];
    $event_results = [];
}
?>

<div class="container mt-5">
    <h2 class="text-center">Hasil Pencarian untuk: "<?php echo $search_query; ?>"</h2>

    <!-- Tampilkan hasil pencarian berita -->
    <section id="news-results" class="py-5">
        <h3>Berita</h3>
        <?php if (!empty($news_results)): ?>
        <div class="row">
            <?php foreach ($news_results as $news): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <?php if (!empty($news['image'])): ?>
                        <img src="../pages/uploads/news/<?php echo htmlspecialchars($news['image']); ?>" class="card-img-top" alt="News Image">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h5>
                        <p class="card-text"><?php echo substr(htmlspecialchars($news['content']), 0, 100); ?>...</p>
                        <a href="news.php?id=<?php echo $news['id']; ?>" class="stretched-link">Baca lebih lanjut</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p>Tidak ada berita ditemukan.</p>
        <?php endif; ?>
    </section>

    <!-- Tampilkan hasil pencarian kegiatan -->
    <section id="event-results" class="py-5">
        <h3>Kegiatan</h3>
        <?php if (!empty($event_results)): ?>
        <div class="row">
            <?php foreach ($event_results as $event): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <?php if (!empty($event['image'])): ?>
                        <img src="../pages/uploads/events/<?php echo htmlspecialchars($event['image']); ?>" class="card-img-top" alt="Event Image">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($event['title']); ?></h5>
                        <p class="card-text"><?php echo substr(htmlspecialchars($event['description']), 0, 100); ?>...</p>
                        <a href="events.php?id=<?php echo $event['id']; ?>" class="stretched-link">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p>Tidak ada kegiatan ditemukan.</p>
        <?php endif; ?>
    </section>
</div>

<?php include('includes/footer.php'); ?>
