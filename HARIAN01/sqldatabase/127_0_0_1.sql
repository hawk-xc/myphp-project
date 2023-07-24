-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2023 pada 00.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar`
--
CREATE DATABASE IF NOT EXISTS `belajar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `belajar`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `umur`, `gambar`) VALUES
(1, 'testing', 10, 'upload/64a6c9eab0399.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `db1`
--
CREATE DATABASE IF NOT EXISTS `db1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db1`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `kd_dokter` char(10) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
--
-- Database: `db1_testing`
--
CREATE DATABASE IF NOT EXISTS `db1_testing` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db1_testing`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `connection`
--

CREATE TABLE `connection` (
  `connection_id` varchar(15) NOT NULL,
  `connection_name` varchar(15) NOT NULL,
  `description` varchar(30) DEFAULT 'N/A',
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `connection`
--

INSERT INTO `connection` (`connection_id`, `connection_name`, `description`, `date`) VALUES
('con-01', 'interkoneksi', 'N/A', '2023-03-31 20:57:12'),
('con-02', 'metro koneksi', 'N/A', '2023-03-31 20:57:12'),
('con-03', 'inter superlite', 'N/A', '2023-03-31 20:57:12'),
('con-04', 'inter supergiga', 'N/A', '2023-03-31 20:57:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `no` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `connection_id` varchar(15) NOT NULL,
  `ruang_id` varchar(15) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `ruang_id` varchar(15) NOT NULL,
  `ruang_name` varchar(15) NOT NULL,
  `ruang_lt` varchar(10) NOT NULL,
  `description_ruang` varchar(30) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`ruang_id`, `ruang_name`, `ruang_lt`, `description_ruang`) VALUES
('r01', 'lab interkoneks', 'lt-1', 'ruang interkoneksi jakarta'),
('r02', 'lab interkoneks', 'lt-1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL,
  `privilege_level` varchar(10) NOT NULL,
  `user_description` varchar(50) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `privilege_level`, `user_description`) VALUES
('u001', 'write', 'N/A'),
('u002', 'read', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`connection_id`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`),
  ADD KEY `connection_constraint` (`connection_id`),
  ADD KEY `ruang_constraint` (`ruang_id`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`ruang_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `connection_constraint` FOREIGN KEY (`connection_id`) REFERENCES `connection` (`connection_id`),
  ADD CONSTRAINT `ruang_constraint` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`ruang_id`);
--
-- Database: `db_latihan_dml`
--
CREATE DATABASE IF NOT EXISTS `db_latihan_dml` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_latihan_dml`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` char(5) NOT NULL,
  `nama_member` varchar(40) DEFAULT 'N/A',
  `alamat` varchar(75) DEFAULT 'N/A',
  `semester` char(2) NOT NULL,
  `usia` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat`, `semester`, `usia`) VALUES
('1001', 'Tio Ferdiand', 'Jl. Serpong Raya No.11', '4', '21'),
('1002', 'Arnad Sanches', 'Jl. Cilenggang No.20', '3', '20'),
('1003', 'Riki Bahagia', 'Jl. Hutama Karya No.03', '4', '20'),
('1004', 'Rere Kurnia', 'Jl. Smapal Serpong 167', '2', '19'),
('1005', 'Erni Susanti', 'Jl. Nusa Loka 11 - BSD', '1', '18'),
('1006', 'Loki Nurdin', 'Jl. BSD Raya No.20', '1', '18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);
--
-- Database: `inventory_db`
--
CREATE DATABASE IF NOT EXISTS `inventory_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `inventory_db`;
--
-- Database: `meta_farma`
--
CREATE DATABASE IF NOT EXISTS `meta_farma` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `meta_farma`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `apoteker`
--

CREATE TABLE `apoteker` (
  `id_apoteker` char(10) NOT NULL,
  `nama_apoteker` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `apoteker`
--

INSERT INTO `apoteker` (`id_apoteker`, `nama_apoteker`, `jabatan`) VALUES
('A-01', 'Wahyu Tri', 'apoteker'),
('A-02', 'Dewancha', 'Gudang'),
('A-03', 'dicky', 'apoteker'),
('A-04', 'gundala', 'pemimpin'),
('A-05', 'diana', 'apoteker'),
('A-06', 'jordan', 'Quality Control'),
('A-07', 'gunawan', 'kepala jabatan'),
('A-08', 'prili', 'wakil pemimpin'),
('A-09', 'dwiky', 'laboratary'),
('A-10', 'asep', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_trans` char(10) NOT NULL,
  `id_obat` char(10) NOT NULL,
  `id_pel` char(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `nama_apoteker` varchar(30) NOT NULL,
  `harga` float DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` char(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `harga`) VALUES
('MN01', 'Ibuprofen', 45, 12000),
('MN02', 'Asipilin', 60, 2000),
('MN03', 'Biofarma', 34, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` char(10) NOT NULL,
  `nama_pel` varchar(30) NOT NULL,
  `riwayat` varchar(30) DEFAULT NULL,
  `no_telp` char(15) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `nama_pel`, `riwayat`, `no_telp`, `usia`) VALUES
('U-1', 'Denny', 'demam', '088783493234', 19),
('U-10', 'agung', 'pilek', '324953503294', 10),
('U-11', 'demian', 'scabies', '095209403223', 45),
('U-12', 'juki', 'demam', '082308503232', 21),
('U-13', 'fitri', 'migrain', '008058324323', 45),
('U-14', 'permadi', 'demam', '085673283244', 57),
('U-15', 'gifarry', 'pilek', '089989523223', 14),
('U-16', 'grace', 'mencret', '089949342455', 24),
('U-17', 'cici', 'luka', '089895343432', 28),
('U-18', 'kirana', 'nyeri', '089878786343', 20),
('U-19', 'doky', 'maag', '089938472344', 23),
('U-2', 'Dimas', 'masuk angin', '088989763432', 20),
('U-20', 'salman', 'nyeri', '088763742342', 21),
('U-21', 'joni', 'cacar', '089738242343', 38),
('U-3', 'Dafiyan', 'sakit gigi', '089989975324', 21),
('U-4', 'Maulana', 'sembelit', '82266671261', 21),
('U-5', 'lucky', 'cacar', '083449284332', 18),
('U-6', 'erick', 'alergidingin', '9374924029741', 29),
('U-7', 'prasetyo', 'hipertensi', '113122435326', 23),
('U-8', 'agus', 'biangkringet', '937240923040', 17),
('U-9', 'mamat', 'batuk', '093240932432', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans`
--

CREATE TABLE `trans` (
  `id_trans` char(10) NOT NULL,
  `id_obat` char(10) NOT NULL,
  `id_pel` char(10) NOT NULL,
  `id_apoteker` char(10) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Trigger `trans`
--
DELIMITER $$
CREATE TRIGGER `after_insert_trans` AFTER INSERT ON `trans` FOR EACH ROW BEGIN
SET @pelanggan = (SELECT nama_pel FROM pelanggan where id_pel = NEW.id_pel);
SET @apoteker = (SELECT nama_apoteker FROM apoteker where id_apoteker = NEW.id_apoteker);
SET @harga = (SELECT harga FROM obat WHERE id_obat = NEW.id_obat);
SET @total = @harga * NEW.jumlah;
SET @stok = (SELECT stok FROM obat WHERE id_obat = NEW.id_obat);
INSERT INTO nota (id_trans, id_obat, id_pel, nama_pelanggan, nama_apoteker, harga, jumlah, total) VALUES (NEW.id_trans, NEW.id_obat, NEW.id_pel, @pelanggan, @apoteker, @harga, NEW.jumlah, @total);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_trans` BEFORE INSERT ON `trans` FOR EACH ROW BEGIN
SET @stok = (SELECT stok FROM obat WHERE id_obat = NEW.id_obat);
SET @sisa = @stok - NEW.jumlah;
IF @sisa < 0 THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Warning: stok tidak cukup'; END IF;
UPDATE obat SET stok = @sisa WHERE id_obat = NEW.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_after_trans` AFTER DELETE ON `trans` FOR EACH ROW BEGIN
SET @stok = (SELECT stok FROM obat WHERE id_obat = OLD.id_obat);
SET @sisa = @stok + OLD.jumlah;
UPDATE obat SET stok = @sisa WHERE id_obat = OLD.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_before_trans` BEFORE UPDATE ON `trans` FOR EACH ROW BEGIN IF OLD.id_obat = NEW.id_obat THEN SET @stok = (SELECT stok FROM obat WHERE id_obat = OLD.id_obat); SET @sisa = (@stok + OLD.jumlah) - NEW.jumlah; IF @sisa < 0 THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Warning: stok tidak cukup';  END IF; UPDATE obat SET stok = @sisa WHERE id_obat = OLD.id_obat; ELSE SET @stok_lama = (SELECT stok FROM obat WHERE id_obat = OLD.id_obat); SET @sisa_lama = (@stok_lama + OLD.jumlah); UPDATE obat SET stok = @sisa_lama WHERE id_obat = OLD.id_obat; SET @stok_baru = (SELECT stok FROM obat WHERE id_obat = NEW.id_obat); SET @sisa_baru = @stok_baru - NEW.jumlah; IF @sisa_baru < 0 THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Warning: stok tidak cukup'; END IF; UPDATE obat SET stok = @sisa_baru WHERE id_obat = NEW.id_obat; END IF; END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_before_trans_to_nota` BEFORE UPDATE ON `trans` FOR EACH ROW BEGIN 
IF OLD.id_trans = NEW.id_trans THEN
SET @harga = (SELECT harga FROM obat WHERE id_obat = NEW.id_obat);
SET @total_baru = @harga * NEW.jumlah;
UPDATE nota SET total = @total_baru WHERE id_trans = NEW.id_trans; 
END IF; 
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id_apoteker`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `FK_trans` (`id_trans`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pel`),
  ADD UNIQUE KEY `id_pel` (`id_pel`);

--
-- Indeks untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `FK_obat` (`id_obat`),
  ADD KEY `FK_pel` (`id_pel`),
  ADD KEY `FK_apoteker` (`id_apoteker`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `FK_trans` FOREIGN KEY (`id_trans`) REFERENCES `trans` (`id_trans`);

--
-- Ketidakleluasaan untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `FK_apoteker` FOREIGN KEY (`id_apoteker`) REFERENCES `apoteker` (`id_apoteker`),
  ADD CONSTRAINT `FK_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `FK_pel` FOREIGN KEY (`id_pel`) REFERENCES `pelanggan` (`id_pel`);
--
-- Database: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `nama`, `tanggal`) VALUES
(230110001, 'Surono a', '2023-06-11'),
(230110002, 'Siswadji', '2023-06-12'),
(230110003, 'Adi Arijantoko', '2023-06-12'),
(230110004, 'Yogi Dwi Martanto', '2023-06-12'),
(230110005, 'Sri Widadi', '2023-06-12'),
(230110006, 'Mitha Ariani', '2023-06-12'),
(230110007, 'Muhammad rakhadifan', '2023-06-12'),
(230110008, 'Fitria Salsabila Nur Izzah', '2023-06-12'),
(230110009, 'Indri yulianti', '2023-06-12'),
(230110010, 'Toni Muhaziz', '2023-06-12'),
(230110011, 'Iswatiningsih', '2023-06-12'),
(230110012, 'Rastono', '2023-06-12'),
(230110013, 'Endang Sri Purwanti', '2023-06-12'),
(230110014, 'Yunita ika sari ', '2023-06-12'),
(230110015, 'Yohanes Aditya Budihardjo', '2023-06-12'),
(230110016, 'Anik Dwi Setyawati', '2023-06-12'),
(230110017, 'Shafira Mahfudhah Fikriyah', '2023-06-12'),
(230110018, 'Rifa Mahardika', '2023-06-12'),
(230110019, 'Deo Fajar', '2023-06-12'),
(230110020, 'Alin prasanti', '2023-06-12'),
(230110021, 'Suminkem', '2023-06-12'),
(230110022, 'Angger Pambayun Dimas Satrio W', '2023-06-12'),
(230110023, 'Salsabilasetya Kusuma', '2023-06-12'),
(230110024, 'Rima Kumala Sari', '2023-06-12'),
(230110025, 'Tashya Fatkurohmi Muchtar', '2023-06-12'),
(230110026, 'Dwi Yulianto', '2023-06-12'),
(230110027, 'Dony Rahardian', '2023-06-12'),
(230110028, 'Kristiawan Yanuar Sanyata', '2023-06-12'),
(230110029, 'Zulfa Yustisiana', '2023-06-12'),
(230110030, 'Zulekhah', '2023-06-12'),
(230110031, 'Arif prasetia', '2023-06-12'),
(230110032, 'Y.Bayu Ari Murti', '2023-06-12'),
(230110033, 'Rofi Anwar', '2023-06-12'),
(230110034, 'Anis Werdaningsih', '2023-06-12'),
(230110035, 'Bayu Jalu Widodo', '2023-06-12'),
(230110036, 'Fira Wirawati', '2023-06-12'),
(230110037, 'Catur Agus Suryanto', '2023-06-12'),
(230110038, 'Agus Dalyono', '2023-06-12'),
(230110039, 'Bowo Santoso', '2023-06-12'),
(230110040, 'Annasya Sakha Alika Larassati', '2023-06-12'),
(230110041, 'Herlina setyowati ', '2023-06-12'),
(230110042, 'Supriatno', '2023-06-12'),
(230110043, 'Riko Kristiawan', '2023-06-12'),
(230110044, 'Umar Zakaria', '2023-06-12'),
(230110045, 'Titin purwandari', '2023-06-12'),
(230110046, 'Ivo Miranda', '2023-06-12'),
(230110047, 'Ida Yunianti', '2023-06-12'),
(230110048, 'Heri Subiantoro', '2023-06-12'),
(230110049, 'Cinti Kurniya Putri Septia', '2023-06-12'),
(230110050, 'MOHAMMAD CHUMAIDI ', '2023-06-12'),
(230110051, 'RIZQULLAH RICHO PUTRA PRADANA ', '2023-06-12'),
(230110052, 'Alfi Fadel Agustian Helmi', '2023-06-12'),
(230110053, 'Desmi Laila safitri', '2023-06-12'),
(230110054, 'Ida Kholissatul Rosida', '2023-06-12'),
(230110055, 'Muhammad Iqbal Fauzi Utomo', '2023-06-12'),
(230110056, 'Indah Yulie', '2023-06-12'),
(230110057, 'Trimo', '2023-06-12'),
(230110058, 'Ardian Guci', '2023-06-12'),
(230110059, 'Iwan hartono', '2023-06-12'),
(230110060, 'Indriana Prameswari', '2023-06-12'),
(230110061, 'Stevani Amelia Purbaningsih ', '2023-06-12'),
(230110062, 'Annisa puri nursila', '2023-06-12'),
(230110063, 'Evi Nuraini', '2023-06-12'),
(230110064, 'Putri Anatasya', '2023-06-12'),
(230110065, 'Kastoyo', '2023-06-12'),
(230110066, 'Nanang Ramadana', '2023-06-12'),
(230110067, 'Budi kurniawan', '2023-06-12'),
(230110068, 'Mohamat Sholeh Amirudin', '2023-06-12'),
(230110069, 'Usman ', '2023-06-12'),
(230110070, 'Fedra Kuana', '2023-06-12'),
(230110071, 'Agus hariyanto', '2023-06-12'),
(230110072, 'Fandin Risyanda Putra', '2023-06-12'),
(230110073, 'Dina Rizkyta Ryan Prasetya', '2023-06-12'),
(230110074, 'Rahmat Prasetyo', '2023-06-12'),
(230110075, 'Sefi indriyani', '2023-06-12'),
(230110076, 'Cendy Ardian Kurniawan', '2023-06-12'),
(230110077, 'Abdullah Ghofar Arifai', '2023-06-12'),
(230110078, 'Arif Wicaksono Amd', '2023-06-12'),
(230110079, 'Muhammad Rasyid Ridlo', '2023-06-12'),
(230110080, 'Dwi Prasetyaningsih', '2023-06-12'),
(230110081, 'Yatin Sugiarto', '2023-06-12'),
(230110082, 'Rurin Dwi Sulistio Rini', '2023-06-12'),
(230110083, 'Sarono', '2023-06-12'),
(230110084, 'Sigit Triyono', '2023-06-12'),
(230110085, 'Rudiyanto', '2023-06-12'),
(230110086, 'Sapto Aprianto', '2023-06-12'),
(230110087, 'Asri Wijayanti', '2023-06-12'),
(230110088, 'Darsini', '2023-06-12'),
(230110089, 'Aflah Amrullah', '2023-06-12'),
(230110090, 'R Bagus Noer Kamaruzaman', '2023-06-12'),
(230110091, 'Wulandariintanprastiwi', '2023-06-12'),
(230110092, 'Sunyoto', '2023-06-12'),
(230110093, 'Meysa Andriani', '2023-06-12'),
(230110094, 'Agus Riyanto', '2023-06-12'),
(230110095, 'Putri pramita sari', '2023-06-12'),
(230110096, 'Adam Junianto', '2023-06-12'),
(230110097, 'Joko Purwadi', '2023-06-12'),
(230110098, 'Setiyowati', '2023-06-12'),
(230110099, 'Muhamad fitriyanto', '2023-06-12'),
(230110100, 'Abdulrahman kurniadi', '2023-06-12'),
(230110101, 'Herry Setyadi', '2023-06-12'),
(230110102, 'Sobirin Himawan Sutanto', '2023-06-12'),
(230110103, 'Nuri Latifah', '2023-06-12'),
(230110104, 'Adi Lasuwardi', '2023-06-12'),
(230110105, 'Yono', '2023-06-12'),
(230110106, 'Marlina Indriasari', '2023-06-12'),
(230110107, 'Neneng Susiyanti', '2023-06-12'),
(230110108, 'Bowo Santoso', '2023-06-12'),
(230110109, 'Joko Saryanto', '2023-06-12'),
(230110110, 'Lanang Galih Pyantoko', '2023-06-12'),
(230110111, 'Supriadi', '2023-06-12'),
(230110112, 'Supardi', '2023-06-12'),
(230110113, 'Iriandi', '2023-06-12'),
(230110114, 'Sindu Ambang Wijaya', '2023-06-12'),
(230110115, 'Nanky Prihantoro', '2023-06-12'),
(230110116, 'Tri Hari Adi', '2023-06-12'),
(230110117, 'Fandy Guntur Indrajati', '2023-06-12'),
(230110118, 'Muhammad Muzakkir', '2023-06-12'),
(230110119, 'Reyhan Hafiz Setiawan', '2023-06-12'),
(230110120, 'Setiyadi', '2023-06-12'),
(230110121, 'Latif Aryanto', '2023-06-12'),
(230110122, 'Sutino', '2023-06-12'),
(230110123, 'Rianda adhitya w', '2023-06-12'),
(230110124, 'Kristina Widya Yuwanti', '2023-06-12'),
(230110125, 'Slamet Prayitno', '2023-06-12'),
(230110126, 'Agus setiyawan', '2023-06-12'),
(230110127, 'Netty Herawati', '2023-06-12'),
(230110128, 'Willian Syahrul Saputro', '2023-06-12'),
(230110129, 'Destia Kartikasari ', '2023-06-12'),
(230110130, 'Laily Choirunisa', '2023-06-12'),
(230110131, 'Iwan Setiawan', '2023-06-12'),
(230110132, 'Yohanes Bernadextus Kintun', '2023-06-12'),
(230110133, 'Irwan Mulia Suranto', '2023-06-12'),
(230110134, 'Bayu Setiawan', '2023-06-12'),
(230110135, 'Dwi Mulyani', '2023-06-12'),
(230110136, 'Siswoyo Endang', '2023-06-12'),
(230110137, 'Tomi Faozi ', '2023-06-12'),
(230110138, 'Muadz Abdullah', '2023-06-12'),
(230110139, 'Anak Agung Mahendra', '2023-06-12'),
(230110140, 'Kurnianto', '2023-06-12'),
(230110141, 'Arif dian fauzii', '2023-06-12'),
(230110142, 'Johanes Dian Triatmaja', '2023-06-12'),
(230110143, 'Muhammad Rifky Al Jourdan', '2023-06-12'),
(230110144, 'Nurul Chotimah', '2023-06-12'),
(230110145, 'Herry Purwanto', '2023-06-12'),
(230110146, 'Mutiara Rosmayani', '2023-06-12'),
(230110147, 'Sigit Brusliyanto', '2023-06-12'),
(230110148, 'Iwannandre', '2023-06-12'),
(230110149, 'Ade Ayustina Kinari ', '2023-06-12'),
(230110150, 'Sri mulyani', '2023-06-12'),
(230110151, 'Erni setiyaningsih', '2023-06-12'),
(230110152, 'Ramadhani Fauzan Akbar Tejapat', '2023-06-12'),
(230110153, 'Joko Yuniantoro', '2023-06-12'),
(230110154, 'Dinda Aulia Permatasari', '2023-06-12'),
(230110155, 'Desvita Dela Safitri ', '2023-06-12'),
(230110156, 'Fauzan Arief Herlambang', '2023-06-12'),
(230110157, 'Iipchristyanto', '2023-06-12'),
(230110158, 'Rina Dwi Lestari', '2023-06-12'),
(230110159, 'Bayu Sidik Permono', '2023-06-12'),
(230110160, 'Aditya Putra Pangestu', '2023-06-12'),
(230110161, 'Chandra Novan Djoehanda', '2023-06-12'),
(230110162, 'Estu Priyambodo', '2023-06-12'),
(230110163, 'Adi Sucipto', '2023-06-12'),
(230110164, 'Cintya Ambarwati', '2023-06-12'),
(230110165, 'Magdalena Murdiani Sulistyo', '2023-06-12'),
(230110166, 'Atika Dyah Ayuningtyas', '2023-06-12'),
(230110167, 'Ivan Febbi Bimantoro', '2023-06-12'),
(230110168, 'Adelia Putri Hapsari', '2023-06-12'),
(230110169, 'Sumarwanto', '2023-06-12'),
(230110170, 'Muhammad Fahrudin', '2023-06-12'),
(230110171, 'Diky Arya Pramudya', '2023-06-12'),
(230110172, 'Markus Adi Suharno', '2023-06-12'),
(230110173, 'Suprihanto', '2023-06-12'),
(230110174, 'Sapti Lestari', '2023-06-12'),
(230110175, ' Farida Sari Cahyaningrum', '2023-06-12'),
(230110176, 'Sri Widodo', '2023-06-12'),
(230110177, 'Maya rahmiati', '2023-06-12'),
(230110178, 'Arga kurniawan danu utama', '2023-06-12'),
(230110179, 'Monika Nur imanulia', '2023-06-12'),
(230110180, 'Agus setiawan', '2023-06-12'),
(230110181, 'Ricawati', '2023-06-12'),
(230110182, 'Andi Kurniawan', '2023-06-12'),
(230110183, 'Agus Santoso', '2023-06-12'),
(230110184, 'Fattah Surya Adi', '2023-06-12'),
(230110185, 'Ariyanto Nugroho', '2023-06-12'),
(230110186, 'Khotibul Umam', '2023-06-12'),
(230110187, 'Qorina Rochimatus Sadiah', '2023-06-12'),
(230110188, 'Angga Vicky Adi Mumpuni ', '2023-06-12'),
(230110189, 'Firman Adji Setyanto', '2023-06-12'),
(230110190, 'Poggy Indra Aditya', '2023-06-12'),
(230110191, 'Ari Setiyono', '2023-06-12'),
(230110192, 'Tarti', '2023-06-12'),
(230110193, 'Muchamad jeffry apriyanto sapu', '2023-06-12'),
(230110194, 'Tio Magda Ceresta', '2023-06-12'),
(230110195, 'Ardhi Kurniadi', '2023-06-12'),
(230110196, 'Robertus Filian Argin Dewanto', '2023-06-12'),
(230110197, 'Anugrah Febri Prasetyo', '2023-06-12'),
(230110198, 'Erwin Noviani,S.Psi', '2023-06-12'),
(230110199, 'Tika Pratiwi', '2023-06-12'),
(230110200, 'Armido', '2023-06-12'),
(230110201, 'Septaria Tri Purnamasari', '2023-06-12'),
(230110202, 'Guntur Tri Pamungkas', '2023-06-12'),
(230110203, 'Dheon Poundinar Ardinata', '2023-06-12'),
(230110204, 'Agus Yanto', '2023-06-12'),
(230110205, 'Danang Ari Wibowo', '2023-06-12'),
(230110206, 'Anita Wurtriningsih ', '2023-06-12'),
(230110207, 'Lilik Tri Wahyudi SH', '2023-06-12'),
(230110208, 'Laurensius Ery Krisna Prakoso', '2023-06-12'),
(230110209, 'Dolly Warman', '2023-06-12'),
(230110210, 'Jefri Bambang Fristanto', '2023-06-12'),
(230110211, 'Tyara Sekar Arum Marchdhanie', '2023-06-12'),
(230110212, 'Setya Wiyudha ', '2023-06-12'),
(230110213, 'Nita ferdiana', '2023-06-12'),
(230110214, 'Sapta Yulia', '2023-06-12'),
(230110215, 'Srindu Winarni', '2023-06-12'),
(230110216, 'Kokoh Asan Riyanto', '2023-06-12'),
(230110217, 'PoP Dcozy', '2023-06-12'),
(230110218, 'Rima Kumala Saro', '2023-06-12'),
(230110219, 'Gilar Kumaranggi', '2023-06-12'),
(230110220, 'Ninda Kurnia Sari', '2023-06-12'),
(230110221, 'Sarono Didik Riyadi', '2023-06-12'),
(230110222, 'Luluk Widya Saharani', '2023-06-12'),
(230110223, 'Ivana Aprillia', '2023-06-12'),
(230110224, 'Ersa Lintang Divanka', '2023-06-12'),
(230110225, 'Gorby Wahyu Purnomo', '2023-06-12'),
(230110226, 'Imam Muchayat ', '2023-06-12'),
(230110227, 'Arya Anugrah', '2023-06-12'),
(230110228, 'Irwan', '2023-06-12'),
(230110229, 'Bintang Dian Oktariana', '2023-06-12'),
(230110230, 'Sri Slamet', '2023-06-12'),
(230110231, 'Muhammad Fadel', '2023-06-12'),
(230110232, 'Dony Suseno', '2023-06-12'),
(230110233, 'Nugroho Sugiharto', '2023-06-12'),
(230110234, 'Rizka Cholif Arrahman', '2023-06-12'),
(230110235, 'Taufik Wahyu Skripka', '2023-06-12'),
(230110236, 'Dwi Martanto', '2023-06-12'),
(230110237, 'Erfan Martha Nugraha', '2023-06-12'),
(230110238, 'Chandra Adi Kristiawan', '2023-06-12'),
(230110239, 'Dwi Listianto', '2023-06-12'),
(230110240, 'Erik Rinaldi Priyo Hutomo', '2023-06-12'),
(230110241, 'Pos Satpam Oasis', '2023-06-12'),
(230110242, 'Berta Afin', '2023-06-12'),
(230110243, 'Kaniyo', '2023-06-12'),
(230110244, 'Widyastuti', '2023-06-12'),
(230110245, 'Ahmad Saifudin', '2023-06-12'),
(230110246, 'PT Dwiputra Makmur Persada Ind', '2023-06-12'),
(230110247, 'Fajar Santoso', '2023-06-12'),
(230110248, 'Linda hermayanti', '2023-06-12'),
(230110249, 'Agung Setiaji', '2023-06-12'),
(230110250, 'Yuni Istiyani Florentina', '2023-06-12'),
(230110251, 'Ilham Bangkit Indrawan', '2023-06-12'),
(230110252, 'Harini', '2023-06-12'),
(230110253, 'Sulastri', '2023-06-12'),
(230110254, 'Pramono Yekti', '2023-06-12'),
(230110255, 'Atifah Fitriana Damayanti', '2023-06-12'),
(230110256, 'Engkus Kusmayadi', '2023-06-12'),
(230110257, 'Kantor Pemasaran Dcozy', '2023-06-12'),
(230110258, 'Batu Aris Purwanto', '2023-06-12'),
(230110259, 'Mugi Wiyono', '2023-06-12'),
(230110260, 'Sholehah', '2023-06-12'),
(230110261, 'Fengki Maulana Yusuf', '2023-06-12'),
(230110262, 'Joko Marnoto', '2023-06-12'),
(230110263, 'Nur Hadijah', '2023-06-12'),
(230110264, 'Ilham Joko Prihatin', '2023-06-12'),
(230110265, 'Farchan meirio andhika', '2023-06-12'),
(230110266, 'Supardi', '2023-06-12'),
(230110267, 'Sarjono', '2023-06-12'),
(230110268, 'Danang Kurniawan', '2023-06-12'),
(230110269, 'Noverina Yan Anitasari', '2023-06-12'),
(230110270, 'Paidi', '2023-06-12'),
(230110271, 'Anastasia Yunithasari', '2023-06-12'),
(230110272, 'Bintang Adhitya Vergiawan', '2023-06-12'),
(230110273, 'Muhamad Jamaludin Asyari', '2023-06-12'),
(230110274, 'Agus Sugijanto', '2023-06-12'),
(230110275, 'Nika', '2023-06-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `kode_kelas`, `tanggal`) VALUES
(232001, 'wahyu', '12.2A', '2023-05-23'),
(232002, 'wagyu', '12.2A', '2023-05-23'),
(232003, 'calvin khodam', '12.2A', '2023-05-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id_menu` varchar(10) DEFAULT NULL,
  `image` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id_menu`, `image`) VALUES
('KOPI001', 'mp1.png'),
('KOPI002', 'mp2.png'),
('KOPI003', 'mp3.png'),
('KOPI004', 'mp4.png'),
('KOPI005', 'mp5.png'),
('KOPI006', 'mp6.png'),
('KOPI007', 'mp7.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `category`) VALUES
('KOPI001', 'Robusta', 'latte'),
('KOPI002', 'Arabica', 'latte'),
('KOPI003', 'Luwak', 'latte'),
('KOPI004', 'Macchiato', 'Caramel'),
('KOPI005', 'Espreso', 'Cuban'),
('KOPI006', 'Espresso Ace', 'Mocca'),
('KOPI007', 'Thai Tea', 'Ace');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_desc`
--

CREATE TABLE `menu_desc` (
  `id_menu` varchar(10) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `menu_desc`
--

INSERT INTO `menu_desc` (`id_menu`, `description`, `tanggal`) VALUES
('KOPI001', 'Robusta berasal dari kata robust yang artinya kuat, dengan kata lain memiliki tingkat kekentalan yang kuat', '2023-05-19'),
('KOPI002', 'Kopi jenis ini tumbuh pada daerah dengan ketinggian 700-1700 mdpl. Suhu yang dimiliki adalah 16-20 °C', '2023-05-19'),
('KOPI003', 'Kopi luwak merupakan salah satu jenis kopi yang paling digemari masyarakat dengan aroma dan cita rasanya yang khas.', '2023-05-19'),
('KOPI004', 'Dalam konteks kopi macchiato, elemen yang digunakan adalah espresso dan susu.', '2023-05-19'),
('KOPI005', 'kopi espresso merupakan ekstrak langsung dari biji kopi yang dibuat dengan tekanan dan suhu yang tinggi tanpa campuran apapun.', '2023-05-19'),
('KOPI006', 'Es kopi adalah minuman kopi yang disajikan dingin atau ditambah es batu.', '2023-05-19'),
('KOPI007', 'teh ini merupakan minuman teh dengan irisan jeruk nipis atau jeruk peras.', '2023-05-19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD UNIQUE KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_desc`
--
ALTER TABLE `menu_desc`
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230110278;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `menu_desc`
--
ALTER TABLE `menu_desc`
  ADD CONSTRAINT `menu_desc_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data untuk tabel `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"belajar\",\"table\":\"mahasiswa\"},{\"db\":\"BELAJAR\",\"table\":\"mahasiswa\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data untuk tabel `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'belajar', 'mahasiswa', '{\"CREATE_TIME\":\"2023-03-20 10:21:01\",\"col_order\":[0,1,2,3],\"col_visib\":[1,1,1,1]}', '2023-03-20 03:22:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-03-20 03:34:39', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"id\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `puskesmas_db`
--
CREATE DATABASE IF NOT EXISTS `puskesmas_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `puskesmas_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `kode_dok` char(10) NOT NULL,
  `nama_dok` varchar(25) DEFAULT NULL,
  `kelamin` char(15) DEFAULT NULL,
  `spesialis` varchar(30) DEFAULT NULL,
  `alamat_dok` varchar(60) DEFAULT NULL,
  `kota` char(25) DEFAULT NULL,
  `telp_dok` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`kode_dok`, `nama_dok`, `kelamin`, `spesialis`, `alamat_dok`, `kota`, `telp_dok`) VALUES
('D0001', 'Moch.Yusuf', 'Pria', 'Anak', 'Jl. Sudirman No. 100', 'Cimahi Selatan', '022-1234567'),
('D0002', 'Dinda Indah', 'Wanita', 'Kandungan', 'LPH, Lembah Mawar No.122', 'Cimahi Utara', '022-5612345'),
('D0003', 'Gede Watumbara', 'Pria', 'Kandungan', 'LPH, Lembah Anggrek No.200', 'Cimahi Utara', '022-4567123'),
('D0004', 'Dwi Nugroho', 'Pria', 'Penyakit Dalam', 'Jl. Raya Cimahi No. 502', 'Cimahi Selatan', '022-4512367');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode_obat` char(10) NOT NULL,
  `nama_obat` varchar(25) DEFAULT NULL,
  `jenis` varchar(40) DEFAULT NULL,
  `kemasan` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `harga_obat` decimal(12,0) DEFAULT NULL,
  `jumlah_obat` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `jenis`, `kemasan`, `harga_obat`, `jumlah_obat`) VALUES
('A0001', 'Ampisilin kaplet 250 mg', 'Generic', 'ktk 10 x 10 kaplet', '36315', '5'),
('A0002', 'Amoksisilin kaplet 500 mg', 'Generic', 'ktk 10 x 10 kaplet', '49950', '2'),
('B0001', 'Betametason tablet 0,5 mg', 'Generic', 'ktk 10 x 10 tablet', '9446', '15'),
('E0001', 'Eritromisin kapsul 250 mg', 'Generic', 'ktk 10 x 10 kapsul', '68040', '3'),
('P0001', 'Parasetamol sirup 120 mg ', 'Generic', 'btl 60 ml', '3105', '20'),
('P0002', 'Parasetamol tablet 500 mg', 'Generic', 'btl 1000 tablet', '67500', '25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `kode_pas` char(10) NOT NULL,
  `nama_pas` varchar(40) DEFAULT NULL,
  `jenis_kel` char(10) DEFAULT NULL,
  `usia` char(15) DEFAULT NULL,
  `pekerjaan` char(30) DEFAULT NULL,
  `ktp` varchar(15) DEFAULT NULL,
  `alamat_rumah` varchar(50) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`kode_pas`, `nama_pas`, `jenis_kel`, `usia`, `pekerjaan`, `ktp`, `alamat_rumah`, `telepon`) VALUES
('P0001', 'Dewi Lestari', 'Wanita', '30', 'ASN', '11.001', 'LPH, Lembah Anggrek No.100', '022-1234567'),
('P0002', 'Didin', 'Pria', '31', 'ASN', '11.002', 'LPH, Lembah Mawar No.122', '022-5612345'),
('P0003', 'Amirudin', 'Pria', '35', 'ASN', '12.001', 'LPH, Lembah Anggrek No.120', '022-4567123'),
('P0004', 'Dinda Lestari', 'Wanita', '25', 'ASN', '11.003', 'LPH, Lembah Kenanga Y12', '022-1267345'),
('P0005', 'Ketut Darmayuda', 'Pria', '40', 'Pegawai Swasta', '11.004', 'LPH, Lembah Kenanga Y14', '022-1324675'),
('P0006', 'Darmayuda Ketut', 'Pria', '40', 'Pegawai Swasta', '11.001', 'LPH, Lembah Anggrek No.117', '022-1234567'),
('P0007', 'Dwi Yuni Purwandari', 'Wanita', '35', 'Pegawai Swasta', '11.010', 'LPH, Melati No.100', '022-1234567'),
('P0008', 'Winsu R.', 'Pria', '30', 'ASN', '11.011', 'LPH, Lembah Anggrek No.100', '022-1234567'),
('P0009', 'Achmad Dwi Margono', 'Pria', '33', 'Pegawai Swasta', '13.001', 'LPH, Lembah Melati No.100', '022-1234567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `kode_pegawai` char(10) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `kelamin` varchar(15) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `bagian` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `telepon` varchar(55) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `nama`, `kelamin`, `usia`, `bagian`, `alamat`, `kota`, `telepon`, `email`) VALUES
('PNS-001', 'Dwi Yuni', 'Wanita', 35, 'Staf Keuangan', 'LPH, Lembah Kenanga Y100', 'Cimahi Utara', '022-1234567', 'dwiyuni@gmail.com'),
('PNS-002', 'Mamad Supendi', 'Pria', 30, 'MIS', 'LPH, Lembah Mawar Y202', 'Cimahi Selatan', '022-4567123', 'msupendi@gmail.com'),
('PNS-003', 'Yudi S.', 'Pria', 40, 'Personalia', 'Jl. Raya Cimahi 304', 'Cimahi Selatan', '022-4567123', 'yudis@ymail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `kode_pengguna` char(10) NOT NULL,
  `nip` char(10) NOT NULL,
  `pass` char(10) DEFAULT NULL,
  `level_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`kode_pengguna`, `nip`, `pass`, `level_user`) VALUES
('P-ROOT', '1', '321', 'Admin'),
('P-USR-1', '2', '123', 'Master'),
('P-USR-3', '3', '213', 'Transaksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `kode_periksa` char(10) NOT NULL,
  `kode_pengguna` char(10) NOT NULL,
  `kode_pegawai` char(10) NOT NULL,
  `kode_dok` char(10) NOT NULL,
  `kode_pas` char(10) NOT NULL,
  `kode_obat` char(10) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `diagnosa` varchar(99) DEFAULT NULL,
  `biaya` decimal(9,0) DEFAULT NULL,
  `tgl_periksa` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`kode_periksa`, `kode_pengguna`, `kode_pegawai`, `kode_dok`, `kode_pas`, `kode_obat`, `jumlah`, `diagnosa`, `biaya`, `tgl_periksa`) VALUES
('1', 'P-USR-1', 'PNS-001', 'D0002', 'P0005', 'E0001', 2, 'sakit hati', '30000', '2023-06-28'),
('tr1', 'P-USR-1', 'PNS-002', 'D0001', 'P0004', 'E0001', 5, 'asdfghg', '5000', '2023-06-28');

--
-- Trigger `periksa`
--
DELIMITER $$
CREATE TRIGGER `after_insert_periksa` AFTER INSERT ON `periksa` FOR EACH ROW BEGIN
SET @harga_obat = (SELECT harga_obat FROM obat WHERE kode_obat = NEW.kode_obat);
SET @nama_pasien = (SELECT nama_pas FROM pasien WHERE kode_pas = NEW.kode_pas);
SET @biaya_obat = NEW.jumlah * @harga_obat;
SET @total_bayar = @biaya_obat + NEW.biaya;
INSERT INTO periksa_detail (kode_periksa, nama_pasien, kode_obat, jumlah, biaya_obat, biaya_periksa, jumlah_biaya) VALUES (NEW.kode_periksa, @nama_pasien, NEW.kode_obat, NEW.jumlah, @biaya_obat, NEW.biaya, @total_bayar);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_periksa` BEFORE INSERT ON `periksa` FOR EACH ROW BEGIN
SET @jumlah_obat = (SELECT jumlah_obat FROM obat WHERE kode_obat = NEW.kode_obat);
SET @sisa = @jumlah_obat - NEW.jumlah;
IF @sisa < 0 THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Warning: stok tidak cukup'; END IF;
UPDATE obat SET jumlah_obat = @sisa WHERE kode_obat = NEW.kode_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_after_periksa` AFTER DELETE ON `periksa` FOR EACH ROW BEGIN
SET @stok = (SELECT jumlah_obat FROM obat WHERE kode_obat = OLD.kode_obat);
SET @sisa = @stok + OLD.jumlah;
UPDATE obat SET jumlah_obat = @sisa WHERE kode_obat = OLD.kode_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_before_periksa` BEFORE UPDATE ON `periksa` FOR EACH ROW BEGIN IF OLD.kode_obat = NEW.kode_obat THEN SET @stok = (SELECT jumlah_obat FROM obat WHERE kode_obat = OLD.kode_obat); SET @sisa = (@stok + OLD.jumlah) - NEW.jumlah; IF @sisa < 0 THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Warning: stok tidak cukup';  END IF; UPDATE obat SET jumlah_obat = @sisa WHERE kode_obat = OLD.kode_obat; ELSE SET @stok_lama = (SELECT jumlah_obat FROM obat WHERE kode_obat = OLD.kode_obat); SET @sisa_lama = (@stok_lama + OLD.jumlah); UPDATE obat SET jumlah_obat = @sisa_lama WHERE kode_obat = OLD.kode_obat; SET @stok_baru = (SELECT jumlah_obat FROM obat WHERE kode_obat = NEW.kode_obat); SET @sisa_baru = @stok_baru - NEW.jumlah; IF @sisa_baru < 0 THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Warning: stok tidak cukup'; END IF; UPDATE obat SET jumlah_obat = @sisa_baru WHERE kode_obat = NEW.kode_obat; END IF; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa_detail`
--

CREATE TABLE `periksa_detail` (
  `id_rm` int(11) NOT NULL,
  `kode_periksa` char(10) DEFAULT NULL,
  `nama_pasien` varchar(30) DEFAULT NULL,
  `kode_obat` char(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `biaya_obat` decimal(9,0) DEFAULT NULL,
  `biaya_periksa` decimal(9,0) DEFAULT NULL,
  `jumlah_biaya` decimal(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periksa_detail`
--

INSERT INTO `periksa_detail` (`id_rm`, `kode_periksa`, `nama_pasien`, `kode_obat`, `jumlah`, `biaya_obat`, `biaya_periksa`, `jumlah_biaya`) VALUES
(1, NULL, NULL, 'A0001', NULL, '75000', '50000', '150000'),
(2, NULL, NULL, 'A0003', NULL, '75000', '50000', '125000'),
(3, NULL, NULL, 'A0002', NULL, '75000', '50000', '150000'),
(4, 'tr1', 'Dinda Lestari', 'E0001', 5, '340200', '5000', '345200'),
(5, '1', 'Ketut Darmayuda', 'E0001', 2, '136080', '30000', '166080');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kode_dok`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pas`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode_pegawai`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kode_pengguna`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`kode_periksa`),
  ADD KEY `FK_dokter` (`kode_dok`),
  ADD KEY `FK_pasien` (`kode_pas`),
  ADD KEY `FK_OBAT` (`kode_obat`),
  ADD KEY `FK_pengguna` (`kode_pengguna`),
  ADD KEY `FK_pegawai` (`kode_pegawai`);

--
-- Indeks untuk tabel `periksa_detail`
--
ALTER TABLE `periksa_detail`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `FK_detail` (`kode_periksa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `periksa_detail`
--
ALTER TABLE `periksa_detail`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `FK_OBAT` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `FK_dokter` FOREIGN KEY (`kode_dok`) REFERENCES `dokter` (`kode_dok`),
  ADD CONSTRAINT `FK_pasien` FOREIGN KEY (`kode_pas`) REFERENCES `pasien` (`kode_pas`),
  ADD CONSTRAINT `FK_pegawai` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai` (`kode_pegawai`),
  ADD CONSTRAINT `FK_pengguna` FOREIGN KEY (`kode_pengguna`) REFERENCES `pengguna` (`kode_pengguna`);

--
-- Ketidakleluasaan untuk tabel `periksa_detail`
--
ALTER TABLE `periksa_detail`
  ADD CONSTRAINT `FK_detail` FOREIGN KEY (`kode_periksa`) REFERENCES `periksa` (`kode_periksa`);
--
-- Database: `register`
--
CREATE DATABASE IF NOT EXISTS `register` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `register`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `order_session` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `id_menus_image` int(11) NOT NULL,
  `menus_name` varchar(100) NOT NULL,
  `price_list` double DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`order_session`, `id`, `id_menus_image`, `menus_name`, `price_list`, `date`) VALUES
('64bead022e0e1', 11, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-24 23:55:30'),
('64bead2690894', 11, 2, 'Mie Ayam Jamur', 12000, '2023-07-24 23:56:06'),
('64bead387f99e', 11, 4, 'Indomie Jumbo Mie Goreng nikmat', 4000, '2023-07-24 23:56:24'),
('64bead41986fe', 11, 2, 'Mie Ayam Jamur', 12000, '2023-07-24 23:56:33'),
('64beae01479ff', 11, 9, 'Mie Goreng urak arik', 9000, '2023-07-24 23:59:45'),
('64beae7362e0f', 11, 14, 'Es Teh', 3000, '2023-07-25 00:01:39'),
('64beaf3b84417', 11, 8, 'Kwentiau udang rebus', 17000, '2023-07-25 00:04:59'),
('64beaf722f379', 13, 13, 'Es Jeruk', 4000, '2023-07-25 00:05:54'),
('64beaf7a89fda', 13, 10, 'Mie Ayam Arema 88', 7000, '2023-07-25 00:06:02'),
('64beb824cd421', 11, 4, 'Indomie Jumbo Mie Goreng nikmat', 4000, '2023-07-25 00:43:00'),
('64beba005d6c8', 13, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-25 00:50:56'),
('64beba0956cff', 13, 14, 'Es Teh', 3000, '2023-07-25 00:51:05'),
('64bebb4e26ad3', 14, 2, 'Mie Ayam Jamur', 12000, '2023-07-25 00:56:30'),
('64bebb74b3a10', 14, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-25 00:57:08'),
('64bebbf5bc6e3', 14, 14, 'Es Teh', 3000, '2023-07-25 00:59:17'),
('64bebc004947f', 14, 9, 'Mie Goreng urak arik', 9000, '2023-07-25 00:59:28'),
('64bebc542dd89', 14, 2, 'Mie Ayam Jamur', 12000, '2023-07-25 01:00:52'),
('64bebc5ee16bf', 14, 2, 'Mie Ayam Jamur', 12000, '2023-07-25 01:01:02'),
('64bebc98eaa8f', 14, 13, 'Es Jeruk', 4000, '2023-07-25 01:02:00'),
('64bef191b2f5d', 14, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-25 04:48:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus_image`
--

CREATE TABLE `menus_image` (
  `id_menus_image` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `kind` varchar(150) DEFAULT NULL,
  `tag` varchar(30) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `path` varchar(150) NOT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `menus_image`
--

INSERT INTO `menus_image` (`id_menus_image`, `name`, `kind`, `tag`, `price`, `path`, `ext`, `size`, `date`) VALUES
(2, 'Mie Ayam Jamur', 'Mie ayam jamur merupakan olahan mie goreng Indomie dengan tambahan jamur tiram, kuah dan kaldu yang menggoda', 'mie goreng', 12000, 'media/images/64b7d7e598f50.png', 'image/png', 544703, '2023-07-19 19:32:37'),
(3, 'Mie Godok kaldu sosis', 'Mie Godok kali ini sangat spesial dengan taburan bawang, dan irisan sosis SoNice, kuah dengan perpaduan kaldu ayam dan saus macha', 'mie goreng', 15000, 'media/images/64b7d8e414ae6.png', 'image/png', 636290, '2023-07-19 19:36:52'),
(4, 'Indomie Jumbo Mie Goreng nikmat', 'Produk indomie yang ini merupakan unggulan untuk menyaingi produk mie instan rivalnya, Mie yang katanya sedap itulohh', 'mie goreng', 4000, 'media/images/64b7da0bec001.png', 'image/png', 483134, '2023-07-19 19:41:47'),
(5, 'Mie Indomie Goreng Telur Kecap', 'Gaada bosen-bosennya Indomie berkreatifitas membuat jajanan unik satu ini, telur ayam atau bebek menambah cita rasa kaldu mie khas negara plus 62', 'mie goreng', 7000, 'media/images/64b7da810382b.png', 'image/png', 269958, '2023-07-19 19:43:45'),
(6, 'Indomie Kuah kaldu ayam', 'Indomie kali ini berinofasi dengan menghadirkan mie godok kaldu ayam, rasakan nikmat kaldu bumbu bawang pilihan', 'mie goreng', 7000, 'media/images/64b7dc800ce28.png', 'image/png', 707607, '2023-07-19 19:52:16'),
(7, 'Samyang Onigiri', 'Pernah makan samyang toping onigiri, pasti tidak dapat dibayangkan, namun menu ini buktinya', 'mie goreng', 10000, 'media/images/64b7dd8d5bded.png', 'image/png', 220743, '2023-07-19 19:56:45'),
(8, 'Kwentiau udang rebus', 'Kwentiau yang direbus hampir 24 jam dengan toping udang rebus dengan berbagai pilihan saus, saus yang paling diandalkan saus thai', 'mie goreng', 17000, 'media/images/64b7dfdf002b2.png', 'image/png', 346745, '2023-07-19 20:06:39'),
(9, 'Mie Goreng urak arik', 'Mie Goreng urak arik dengan perpaduan toping telur mata keranjang, timun, tomat, dan selada, bumbu yang diracik bukan bumbu sembarangan, peracik bumbu', 'mie goreng', 9000, 'media/images/64b7e19c113fe.png', 'image/png', 618180, '2023-07-19 20:14:04'),
(10, 'Mie Ayam Arema 88', 'Terinspirasi dari Mie Ayam Arema 88 depan kampus STIE, murah, nikmat, dan toping andalan yaitu pangsitðŸ˜…', 'mie goreng', 7000, 'media/images/64b7e25315335.png', 'image/png', 130662, '2023-07-19 20:17:07'),
(11, 'Mie Ayam 8 BIT', 'Anak Moba pasti taulah mie ayam satu ini, apalagi kalo enga mie ayam 8 bit, toping ayam andalan ini berupa 8 bit / 1 byte bumbu kaldu ayam', 'mie goreng', 111000, 'media/images/64b7e2bf90a43.png', 'image/png', 15451, '2023-07-19 20:18:55'),
(12, 'Mie Ayam Baso Sapi', 'Mie Ayam baso sapi, menu emak-emak apabila datang ke resto Mie ayam, kenapa begitu diidam-idamkan?ðŸ¤”', 'mie goreng', 13000, 'media/images/64b7e3161102b.png', 'image/png', 348909, '2023-07-19 20:20:22'),
(13, 'Es Jeruk', 'Es Jeyuk atau kerap dipanggil jerus diperas merupakan menu minuman andalan disaat puncak dahaga panasnya siang hari', 'mie goreng', 4000, 'media/images/64b89ba38f6e1.png', 'image/png', 195800, '2023-07-20 09:27:47'),
(14, 'Es Teh', 'Berbincang minuman satu ini, mustahil orang ga suka sama minuman satu ini, kecuali sedang RabiesðŸ¶', 'mie goreng', 3000, 'media/images/64b89c6d3c932.png', 'image/png', 402937, '2023-07-20 09:31:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$GgeUMFaV64Hpio3jQBXRG.dIPkpGWgU1qk6r51LVz7h'),
(2, 'user', '$2y$10$imaCJ6BBmFvJRBM2XzuvCOV6pNLGsF5Yq9OeM7PXAG0'),
(4, 'satu', '$2y$10$uDetnuPt39AC3xWHOCr2j.Tj9qaF25c/LWno7afY3T2'),
(10, 'wahyu', '$2y$10$NWwmY.LZb//GBXr1nhIKUOmxCwIA1JooB4wkyz04Fcz'),
(11, 'test', '$2y$10$WwCSt.NQrJYdiyzbU3dLU.5qKhasadtuKZnUPee.XogxoGIdqdzG.'),
(12, 'root', '$2y$10$clIp/66HHUugPKh/U/UnVO0Fj42n/JogvonnMDXccXdIkKmlKmPe.'),
(13, 'hawkxc', '$2y$10$i2rI4Jb5FR01xt/JGtPZp.Rsed5uFPA0xj5qq.S2FciyHQOFPsEci'),
(14, 'fitriku', '$2y$10$aDDctf0tUnABiF6ha2Tlr.NWrJhHUUDlawfDWGl7C1Ejjg/HchNgC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_session`);

--
-- Indeks untuk tabel `menus_image`
--
ALTER TABLE `menus_image`
  ADD PRIMARY KEY (`id_menus_image`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus_image`
--
ALTER TABLE `menus_image`
  MODIFY `id_menus_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `kd_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`kd_obat`, `nama_obat`, `stok`) VALUES
('MN001', 'Ibuprofen', 50),
('MN002', 'Paracetamol', 100),
('MN003', 'Kiyomasahh', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pel` varchar(10) NOT NULL,
  `nama_pel` varchar(30) NOT NULL,
  `umur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pel`, `nama_pel`, `umur`) VALUES
('USR-01', 'farhan', 18),
('USR-02', 'rusdi ngawi', 45),
('USR-03', 'rehan wangsaf', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_trans` varchar(10) NOT NULL,
  `kd_obat` varchar(10) NOT NULL,
  `kd_pel` varchar(10) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pel`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_trans`),
  ADD KEY `FK_obat` (`kd_obat`),
  ADD KEY `FK_pel` (`kd_pel`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_obat` FOREIGN KEY (`kd_obat`) REFERENCES `items` (`kd_obat`),
  ADD CONSTRAINT `FK_pel` FOREIGN KEY (`kd_pel`) REFERENCES `pelanggan` (`kd_pel`);
--
-- Database: `testing`
--
CREATE DATABASE IF NOT EXISTS `testing` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testing`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gethuk`
--

CREATE TABLE `gethuk` (
  `NAME_KD` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `SUPER` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gethuk`
--

INSERT INTO `gethuk` (`NAME_KD`, `ID`, `SUPER`) VALUES
(0, 111, 'catlover');

-- --------------------------------------------------------

--
-- Struktur dari tabel `popo`
--

CREATE TABLE `popo` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `popo`
--

INSERT INTO `popo` (`ID`, `Nama`, `Tanggal`) VALUES
(111, 'popo the cat', '2023-06-20'),
(112, 'gethuktelo', '2023-06-20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gethuk`
--
ALTER TABLE `gethuk`
  ADD PRIMARY KEY (`NAME_KD`),
  ADD KEY `FK_GETHUK` (`ID`);

--
-- Indeks untuk tabel `popo`
--
ALTER TABLE `popo`
  ADD PRIMARY KEY (`ID`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gethuk`
--
ALTER TABLE `gethuk`
  ADD CONSTRAINT `FK_GETHUK` FOREIGN KEY (`ID`) REFERENCES `popo` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
