<?php include('includes/header.php'); ?>

<div class="container-flex">
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide mt-1" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/slide-1.jpg" class="d-block w-100 rounded" alt="Kegiatan 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pengurus DKR Sidamulih</h5>
                    <p>Anggota DKR Sidamulih Periode 2022 - 2025.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/slide-2.jpg" class="d-block w-100 rounded" alt="Kegiatan 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sidamulih Scout Competition</h5>
                    <p>Perlombaan Keterampilan Pramuka Tingkat SD/MI dan SMP/MTs Se-Kwarran Sidamulih.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/slide-3.jpg" class="d-block w-100 rounded" alt="Kegiatan 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Panitia Sidamulih Scout Competition</h5>
                    <p>Kegiatan Sidamulih Scout Competition dilaksanakan pada tanggal 10 Agustus 2024 dan berkolaborasi dengan himpunan Mahasiswa Pangandaran.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Konten lain halaman index -->
<div class="container text-center">
    <h2 class="mt-3">Selamat Datang di DKR Sidamulih</h2>
    <p>DKR Sidamulih merupakan organisasi pramuka yang bertujuan untuk mengembangkan keterampilan dan kepemimpinan pemuda melalui kegiatan pramuka. Kami memiliki berbagai program dan kegiatan untuk mendukung pengembangan anggota.</p>
</div>

<?php
include('config/db.php');

// Ambil berita terbaru (limit 3)
$stmt_news = $pdo->query("SELECT * FROM news ORDER BY published_date DESC LIMIT 3");
$news = $stmt_news->fetchAll();

// Ambil acara terbaru (limit 3)
$stmt_events = $pdo->query("SELECT * FROM events ORDER BY event_date DESC LIMIT 3");
$events = $stmt_events->fetchAll();
?>

<!-- Section Berita -->
<section id="news" class="py-5 mt-3">
    <div class="container">
        <h2 class="text-center">Berita Terbaru</h2>
        <div class="row">
            <?php foreach ($news as $article): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <!-- Menampilkan gambar berita jika ada -->
                    <?php if (!empty($article['image'])): ?>
                        <center><img src="../pages/uploads/news/<?php echo htmlspecialchars($article['image']); ?>" class="card-img-top" style="width:70%; height:auto;" alt="News Image"></center>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($article['title']); ?></h5>
                        <p class="card-text">
                            <?php echo substr(htmlspecialchars($article['content']), 0, 100); ?>...
                        </p>
                        <small class="text-muted">
                            Dipublikasikan pada <?php echo date('d M Y', strtotime($article['published_date'])); ?>
                        </small>
                        <a href="news.php" class="stretched-link">More...</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section Kegiatan -->
<section id="events" class="py-10 bg-light">
    <div class="container">
        <h2 class="text-center">Kegiatan Terbaru</h2>
        <div class="row">
            <?php foreach ($events as $event): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <!-- Menampilkan gambar kegiatan jika ada -->
                    <?php if (!empty($event['image'])): ?>
                        <center><img src="../pages/uploads/events/<?php echo htmlspecialchars($event['image']); ?>" class="card-img-top" style="width:70%; height:auto;" alt="Event Image"></center>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($event['title']); ?></h5>
                        <p class="card-text">
                            <?php echo substr(htmlspecialchars($event['description']), 0, 100); ?>...
                        </p>
                        <small class="text-muted">
                            Tanggal Kegiatan: <?php echo date('d M Y', strtotime($event['event_date'])); ?>
                        </small>
                        <a href="events.php" class="stretched-link">More...</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
