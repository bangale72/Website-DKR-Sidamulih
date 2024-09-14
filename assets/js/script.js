// Fungsi untuk membuka pop-up chat
document.querySelector('.chat-button').addEventListener('click', function() {
    document.getElementById('chatPopup').style.display = 'block';
});

// Fungsi untuk menutup pop-up chat
function closeChat() {
    document.getElementById('chatPopup').style.display = 'none';
    messageInput.value = '';
}

// Fungsi untuk mengirim pesan
function sendMessage() {
    const messageInput = document.getElementById('chatMessage');
    const message = messageInput.value.trim();
    const chatBody = document.getElementById('chatBody');
    const typingAnimation = document.getElementById('typingAnimation');

    if (message) {
        // Tampilkan pesan pengguna di chat
        chatBody.innerHTML += `<p><strong>Anda:</strong> ${message}</p>`;

        // Tampilkan animasi mengetik
        typingAnimation.style.display = 'block';

        // Jeda sebelum menampilkan respons
        setTimeout(() => {
            // Sembunyikan animasi mengetik
            typingAnimation.style.display = 'none';

            // Respon otomatis berdasarkan kata kunci
            const response = getAutoResponse(message);
            if (response) {
                chatBody.innerHTML += `<p><strong>Bot:</strong> ${response}</p>`;
            } else {
                chatBody.innerHTML += `<p><strong>Bot:</strong> Terima kasih atas pesannya. Kami akan segera membalas.</p>`;
            }

            // Scroll ke bawah untuk menampilkan pesan terbaru
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 2000); // Jeda 2 detik sebelum menampilkan respons

        // Kosongkan kotak pesan setelah dikirim
        messageInput.value = '';
    } else {
        alert('Harap ketik pesan sebelum mengirim.');
    }
}

// Fungsi untuk mendapatkan respon otomatis
function getAutoResponse(message) {
    const lowerMessage = message.toLowerCase();

    // Daftar kata kunci dan respon otomatis
    const responses = {
        'halo': 'Halo! Ada yang bisa saya bantu?',
        'hai': 'Hai! Bagaimana kabar Anda?',
        'apa kabar': 'Saya baik, terima kasih. Bagaimana dengan Anda?',
        'terima kasih': 'Sama-sama! Jika ada pertanyaan lain, silakan tanya.',
        'selamat pagi': 'Selamat pagi! Ada yang bisa saya bantu hari ini?',
        'selamat sore': 'Selamat sore! Apa yang bisa saya bantu?',
        'selamat malam': 'Selamat malam! Ada yang bisa saya bantu sebelum tidur?',
        'bisa bantu saya?': 'Tentu! Apa yang bisa saya bantu?',
        'harga': 'Untuk informasi harga, silakan kunjungi situs web kami atau hubungi kami.',
        'produk': 'Kami menawarkan berbagai produk. Silakan lihat katalog kami di situs web kami.',
        'kontak': 'Anda bisa menghubungi kami melalui email di dkrsidamulih22@gmail.com atau telepon di (0821) 2944 8933.',
        'kegiatan': 'Jadwal kegiatan dapat ditemukan di halaman kegiatan.',
        'berita': 'Berita terbaru dapat ditemukan di halaman berita.'
    };

    // Cari respon berdasarkan kata kunci
    for (const key in responses) {
        if (lowerMessage.includes(key)) {
            return responses[key];
        }
    }

    // Jika tidak ada kata kunci yang cocok, kembalikan null
    return null;
}
