-- Membuat database dkr_sidamulih
CREATE DATABASE db_dkrsidamulih;

-- Gunakan database tersebut
USE db_dkrsidamulih;

-- Membuat tabel structure
CREATE TABLE structure (
    id INT AUTO_INCREMENT PRIMARY KEY,
    position VARCHAR(100) NOT NULL,  -- Jabatan (Ketua, Wakil Ketua, Sekretaris, dsb.)
    name VARCHAR(255) NOT NULL,      -- Nama anggota
    section VARCHAR(100) DEFAULT NULL  -- Seksi Bidang (jika ada), NULL untuk pengurus inti
);

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    event_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    published_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE media (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    media_type ENUM('photo', 'video') NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Data Pengurus Inti
INSERT INTO structure (position, name, section) VALUES
('Ketua', 'Farhan Maulana Syidiq', NULL),
('Wakil Ketua', 'Hamba Allah', NULL),
('Sekretaris', 'Winda Ayu Suharni', NULL),
('Bendahara', 'Fitria Noviyanti', NULL);

-- Data Sekbid Kajian Kepramukaan
INSERT INTO structure (position, name, section) VALUES
('Anggota 1', 'Eko Pratama', 'Kajian Kepramukaan'),
('Anggota 2', 'Fajar Setiawan', 'Kajian Kepramukaan'),
('Anggota 3', 'Gita Ramadhani', 'Kajian Kepramukaan'),
('Anggota 4', 'Hendra Saputra', 'Kajian Kepramukaan');

-- Data Sekbid Kegiatan Kepramukaan
INSERT INTO structure (position, name, section) VALUES
('Anggota 1', 'Indah Permata', 'Kegiatan Kepramukaan'),
('Anggota 2', 'Joko Suryadi', 'Kegiatan Kepramukaan'),
('Anggota 3', 'Kiki Andini', 'Kegiatan Kepramukaan'),
('Anggota 4', 'Lutfi Kurniawan', 'Kegiatan Kepramukaan');

-- Data Sekbid Pengabdian Masyarakat
INSERT INTO structure (position, name, section) VALUES
('Anggota 1', 'Mega Lestari', 'Pengabdian Masyarakat'),
('Anggota 2', 'Nanda Pratama', 'Pengabdian Masyarakat'),
('Anggota 3', 'Olivia Putri', 'Pengabdian Masyarakat'),
('Anggota 4', 'Putu Wirawan', 'Pengabdian Masyarakat');

-- Data Sekbid Evaluasi dan Pengembangan
INSERT INTO structure (position, name, section) VALUES
('Anggota 1', 'Qori Hasanah', 'Evaluasi dan Pengembangan'),
('Anggota 2', 'Rian Santika', 'Evaluasi dan Pengembangan'),
('Anggota 3', 'Siti Rohmah', 'Evaluasi dan Pengembangan'),
('Anggota 4', 'Taufik Hidayat', 'Evaluasi dan Pengembangan');
