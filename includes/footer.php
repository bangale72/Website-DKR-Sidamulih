<!-- Tombol Live Chat Mengambang -->
<div class="chat-button-container">
    <button class="chat-button">
        <i class="fab fa-whatsapp"></i> Chat with us
    </button>
</div>

<!-- Pop-up Chat Box -->
<div class="chat-popup" id="chatPopup">
    <div class="chat-header">
        <span class="chat-title">Live Chat</span>
        <button type="button" class="btn-close" aria-label="Close" onclick="closeChat()"></button>
    </div>
    <div class="chat-body" id="chatBody">
        <p>Selamat datang! Bagaimana saya bisa membantu Anda?</p>
    </div>
    <div id="typingAnimation" style="display: none;">
        <p><strong>Bot:</strong> <span class="typing">......</span></p>
    </div>
    <div class="chat-footer">
        <textarea placeholder="Ketik pesan Anda di sini..." id="chatMessage"></textarea>
        <button class="send-button" onclick="sendMessage()">Kirim</button>
    </div>
</div>

</div> <!-- End of container -->
    <footer>
        <div class="text-center">
            <span class="text-muted">© 2024 DKR Sidamulih. All Rights Reserved.</span>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
