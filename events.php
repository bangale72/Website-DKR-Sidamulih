<?php
include('includes/header.php');
include('config/db.php');

// Query untuk mendapatkan semua kegiatan
$stmt = $pdo->query("SELECT * FROM events ORDER BY event_date DESC");
$events = $stmt->fetchAll();
?>

<h2 class="text-center mt-5">Kegiatan DKR Sidamulih</h2>
<p class="text-center">Berikut adalah kegiatan terbaru yang diselenggarakan oleh DKR Sidamulih:</p>

<div class="list-group mt-5">
    <?php foreach ($events as $event): ?>
        <div class="list-group-item mt-3">
            <!-- Menampilkan gambar kegiatan jika ada -->
            <?php if (!empty($event['image'])): ?>
                <img src="../pages/uploads/events/<?php echo htmlspecialchars($event['image']); ?>" alt="Event Image" style="width:100%; height:auto;">
            <?php endif; ?>
            <h5><?php echo htmlspecialchars($event['title']); ?></h5>
            <p><?php echo htmlspecialchars($event['description']); ?></p>
            <small><?php echo htmlspecialchars(date('d M Y', strtotime($event['event_date']))); ?></small>
        </div>
    <?php endforeach; ?>
</div>

<?php include('includes/footer.php'); ?>
