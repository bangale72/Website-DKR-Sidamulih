<?php include('includes/header.php'); ?>

<div class="container mt-1">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/images/slide-1.jpg" class="d-block w-100 rounded" alt="Pengurus DKR Sidamulih">
            <div class="carousel-caption d-none d-md-block">
                <h2>Pengurus Organisasi <br><span>Dewan Kerja Ranting Sidamulih</span></h2>
                <h4>Periode 2022 - 2025</h4>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <?php
        include('config/db.php');
        
        // Query data kepemimpinan utama
        $leaders = $pdo->query("SELECT * FROM structure WHERE section IS NULL ORDER BY id ASC")->fetchAll();
        // Query data untuk masing-masing sekbid
        $sections = [
            'Kajian Kepramukaan' => $pdo->query("SELECT * FROM structure WHERE section = 'Kajian Kepramukaan'")->fetchAll(),
            'Kegiatan Kepramukaan' => $pdo->query("SELECT * FROM structure WHERE section = 'Kegiatan Kepramukaan'")->fetchAll(),
            'Pengabdian Masyarakat' => $pdo->query("SELECT * FROM structure WHERE section = 'Pengabdian Masyarakat'")->fetchAll(),
            'Evaluasi dan Pengembangan' => $pdo->query("SELECT * FROM structure WHERE section = 'Evaluasi dan Pengembangan'")->fetchAll(),
        ];
        ?>

        <!-- Tampilkan Ketua, Wakil Ketua, Sekretaris, Bendahara -->
        <div class="col-md-12">
            <h3>Pengurus Inti</h3>
            <ul class="list-group">
                <?php foreach ($leaders as $leader): ?>
                    <li class="list-group-item">• 
                        <strong><?= $leader['position'] ?>:</strong> <?= $leader['name'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Tampilkan Sekbid -->
        <div class="col-md-12 mt-3 mb-2">
            <h3>Seksi Bidang</h3>
            <?php foreach ($sections as $section_name => $members): ?>
                <h4>Bidang <?= $section_name ?></h4>
                <ul class="list-group mb-3">
                    <?php foreach ($members as $member): ?>
                        <li class="list-group-item">• 
                            <?= $member['name'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
