<?php
include('includes/header.php');
include('config/db.php');

// Ambil data media dari database
$stmt = $pdo->query("SELECT * FROM media ORDER BY uploaded_at DESC");
$media_items = $stmt->fetchAll();
?>

<style>
    .media-container {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding-top: 56.25%; /* Aspect ratio 16:9 for videos */
    }

    .media-container img,
    .media-container video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the aspect ratio is maintained */
    }

    .card {
        max-width: 100%;
        margin-bottom: 1rem;
    }

    .card-img-top {
        width: 100%;
        height: auto;
    }
</style>

<h2 class="text-center mt-3">Dokumentasi Kegiatan</h2>
<div class="container mt-3">
    <div class="row">
        <?php foreach ($media_items as $media): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="media-container">
                        <?php if ($media['media_type'] === 'photo'): ?>
                            <img src="../uploads/media/<?php echo htmlspecialchars($media['file_name']); ?>" alt="<?php echo htmlspecialchars($media['title']); ?>">
                        <?php elseif ($media['media_type'] === 'video'): ?>
                            <video controls>
                                <source src="../uploads/media/<?php echo htmlspecialchars($media['file_name']); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($media['title']); ?></h5>
                        <p class="card-text">Diunggah pada <?php echo date('d M Y', strtotime($media['uploaded_at'])); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>
