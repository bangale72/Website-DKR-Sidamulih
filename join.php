<?php include('includes/header.php'); ?>

<h2 class="mt-3">Bergabung dengan DKR Sidamulih</h2>
<p>Ingin menjadi bagian dari DKR Sidamulih? Isi formulir berikut untuk bergabung:</p>

<form class="mt-3" id="joinForm">
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" required>
    </div>
    <div class="mb-3">
        <label for="school" class="form-label">Asal Sekolah/Instansi</label>
        <input type="text" class="form-control" id="school" placeholder="Asal Sekolah/Instansi" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="email@example.com" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control" id="phone" placeholder="Nomor Telepon" required>
    </div>

    <!-- Tombol Kirim Email -->
    <button type="button" class="btn btn-primary" onclick="sendEmail(event)">
        <i class="fas fa-envelope"></i> Kirim via Gmail
    </button>

    <!-- Tombol Kirim WhatsApp -->
    <button type="button" class="btn btn-success ms-2" onclick="sendWhatsApp(event)">
        <i class="fab fa-whatsapp"></i> Kirim via WhatsApp
    </button>
</form>

<script>
    function sendEmail(event) {
        event.preventDefault(); // Mencegah form dari pengiriman default
        
        // Ambil data dari form
        const name = document.getElementById('name').value;
        const school = document.getElementById('school').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;

        // Cek apakah semua data terisi dengan benar
        if (!name || !school || !email || !phone) {
            alert("Semua field harus diisi.");
            return;
        }

        // Format template email
        const subject = encodeURIComponent('Pendaftaran Anggota DKR Sidamulih');
        const body = encodeURIComponent(`Halo Kak perkenalkan nama saya ${name},
Saya berminat dan ingin bergabung dengan DKR Sidamulih. Berikut adalah detail saya:

Asal Sekolah/Instansi: ${school}
Email: ${email}
Nomor Telepon: ${phone}

Atas perhatianya saya ucapkan terima kasih.`);

        // Membuat URL ke Gmail
        const gmailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=dkrsidamulih@example.com&su=${subject}&body=${body}`;

        // Redirect ke Gmail di browser
        window.open(gmailLink, '_blank');
    }

    function sendWhatsApp(event) {
        event.preventDefault(); // Mencegah form dari pengiriman default
        
        // Ambil data dari form
        const name = document.getElementById('name').value;
        const school = document.getElementById('school').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;

        // Cek apakah semua data terisi dengan benar
        if (!name || !school || !email || !phone) {
            alert("Semua data harus diisi.");
            return;
        }

        // Format template WhatsApp
        const message = encodeURIComponent(`Halo Kak perkenalkan nama saya *${name}*,
Saya berminat dan ingin bergabung dengan DKR Sidamulih. Berikut adalah detail saya:

*Asal Sekolah/Instansi:* ${school}
*Email:* ${email}
*Nomor Telepon:* ${phone}

Atas perhatianya saya ucapkan terima kasih.`);

        // Membuat URL ke WhatsApp
        const whatsappLink = `https://wa.me/6281573236181?text=${message}`;

        // Redirect ke WhatsApp di browser
        window.open(whatsappLink, '_blank');
    }
</script>

<!-- Link ke Font Awesome untuk Ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<?php include('includes/footer.php'); ?>
