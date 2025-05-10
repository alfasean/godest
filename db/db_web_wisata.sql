-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2025 pada 15.06
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_admin`
--

CREATE TABLE `m_admin` (
  `admin_id` int(11) NOT NULL,
  `nama_lengkap` varchar(75) NOT NULL,
  `email_address` varchar(75) NOT NULL,
  `password` text NOT NULL,
  `p_add` char(1) DEFAULT 'y',
  `p_edit` char(1) DEFAULT 'y',
  `p_del` char(1) DEFAULT 'y',
  `is_status` char(1) NOT NULL DEFAULT 'y',
  `is_del` char(1) NOT NULL DEFAULT 'n',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_admin`
--

INSERT INTO `m_admin` (`admin_id`, `nama_lengkap`, `email_address`, `password`, `p_add`, `p_edit`, `p_del`, `is_status`, `is_del`, `created_at`) VALUES
(1, 'Administrators', 'admin@gmail.com', '$2y$10$O/zYxShJQhy.b69KEsMsqOy0tx5xLgHaXGW5pr/Gad4EMBYbprTjS', 'y', 'y', 'y', 'y', 'n', '2020-05-19 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_faq`
--

CREATE TABLE `m_faq` (
  `faq_id` int(11) NOT NULL,
  `nama_faq` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `m_faq`
--

INSERT INTO `m_faq` (`faq_id`, `nama_faq`, `deskripsi`, `created_at`) VALUES
(1, 'Apa itu website ini?', 'Website ini adalah platform digital yang menyediakan informasi lengkap seputar tempat wisata di seluruh Indonesia. Mulai dari deskripsi, lokasi, harga tiket, jam buka, hingga ulasan dari pengunjung.', '2024-09-17 00:44:35'),
(2, 'Apakah saya bisa memberikan ulasan tentang tempat wisata yang pernah saya kunjungi?', 'Tentu bisa! Kamu cukup mengisi form ulasan yang tersedia di halaman detail destinasi. Kami sangat menghargai pendapatmu sebagai referensi bagi pengunjung lainnya.', '2024-09-17 00:44:58'),
(3, 'Bagaimana cara mencari tempat wisata di kota tertentu?', 'Gunakan fitur pencarian di halaman utama dan ketik nama kota atau destinasi yang kamu cari. Kamu juga bisa memfilter berdasarkan kategori wisata, seperti alam, budaya, kuliner, dan lainnya.', '2024-09-17 00:45:17'),
(4, 'Apakah informasi yang ditampilkan selalu diperbarui?', 'Kami berusaha semaksimal mungkin untuk menyajikan informasi terbaru dan akurat. Namun, jika kamu menemukan data yang kurang tepat, kamu bisa menghubungi kami melalui halaman kontak untuk memberikan masukan.', '2024-09-17 00:46:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_rating`
--

CREATE TABLE `m_rating` (
  `rating_id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `rating` int(1) NOT NULL,
  `date_at` date NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_ulasan`
--

CREATE TABLE `m_ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `parent_ip` varchar(150) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `ulasan_text` text NOT NULL,
  `rating` int(1) NOT NULL,
  `date_at` date NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_ulasan`
--

INSERT INTO `m_ulasan` (`ulasan_id`, `wisata_id`, `ip`, `parent_ip`, `nama_lengkap`, `ulasan_text`, `rating`, `date_at`, `created_at`) VALUES
(24, 21, '::1', '', 'sean', 'bagus', 5, '2025-05-10', '2025-05-10 19:54:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_wisata`
--

CREATE TABLE `m_wisata` (
  `wisata_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `kabkota_id` int(11) NOT NULL,
  `nama_wisata` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `situs_resmi` varchar(250) NOT NULL,
  `deskripsi_wisata` text NOT NULL,
  `alamat_wisata` text NOT NULL,
  `embed_map` text NOT NULL,
  `nomor_resmi` varchar(25) NOT NULL,
  `harga_wisata_weekday` varchar(75) NOT NULL,
  `harga_wisata_weekend` varchar(75) NOT NULL,
  `senin` varchar(50) NOT NULL,
  `selasa` varchar(50) NOT NULL,
  `rabu` varchar(50) NOT NULL,
  `kamis` varchar(50) NOT NULL,
  `jumat` varchar(50) NOT NULL,
  `sabtu` varchar(50) NOT NULL,
  `minggu` varchar(50) NOT NULL,
  `info_jadwal` text NOT NULL,
  `is_jadwal` char(1) NOT NULL DEFAULT 'n',
  `is_status` char(1) NOT NULL DEFAULT 'y',
  `views` double NOT NULL,
  `ulasan` double NOT NULL,
  `rating` double NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_wisata`
--

INSERT INTO `m_wisata` (`wisata_id`, `province_id`, `kabkota_id`, `nama_wisata`, `slug`, `situs_resmi`, `deskripsi_wisata`, `alamat_wisata`, `embed_map`, `nomor_resmi`, `harga_wisata_weekday`, `harga_wisata_weekend`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`, `info_jadwal`, `is_jadwal`, `is_status`, `views`, `ulasan`, `rating`, `created_at`) VALUES
(21, 97, 9509, 'Kebun Teh Ciwidey', 'kebun-teh-ciwidey', '', '<p>Kebun Teh di Ciwidey adalah destinasi wisata alam yang memukau dengan hamparan kebun teh hijau yang membentang luas di kaki pegunungan. Udara sejuk dan pemandangan yang asri menjadikannya tempat ideal untuk melepas penat, berjalan santai di antara barisan tanaman teh, atau sekadar menikmati teh hangat sambil dikelilingi kabut tipis khas dataran tinggi. Lokasinya yang tidak jauh dari Bandung membuat Kebun Teh Ciwidey populer sebagai tempat pelarian akhir pekan bagi wisatawan yang mencari ketenangan dan keindahan alam.</p>', 'Ciwidey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63348.77156923886!2d107.44307905!3d-7.0913882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e688b432de520d3%3A0x401e8f1fc28c530!2sCiwidey%2C%20Kec.%20Ciwidey%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1746881607665!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '20000', '20000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '', 'y', 'y', 2, 1, 5, '2025-05-10 19:54:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_wisata_foto`
--

CREATE TABLE `m_wisata_foto` (
  `foto_id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `utama` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_wisata_foto`
--

INSERT INTO `m_wisata_foto` (`foto_id`, `wisata_id`, `foto`, `utama`) VALUES
(16, 4, 'assets/uploaded/components/img_1744098197.jpg', 'y'),
(17, 4, 'assets/uploaded/components/img_17440981971.jpg', 'n'),
(18, 4, 'assets/uploaded/components/img_1744098199.jpg', 'n'),
(19, 4, 'assets/uploaded/components/img_17440981991.jpg', 'n'),
(20, 4, 'assets/uploaded/components/img_17440981992.jpg', 'n'),
(26, 1, 'assets/uploaded/components/img_1744098197a.jpg', 'n'),
(27, 1, 'assets/uploaded/components/img_17440981971a.jpg', 'y'),
(28, 1, 'assets/uploaded/components/img_1744098199a.jpg', 'n'),
(29, 1, 'assets/uploaded/components/img_17440981991a.jpg', 'n'),
(30, 1, 'assets/uploaded/components/img_17440981992a.jpg', 'n'),
(31, 2, 'assets/uploaded/components/img_1744098197aa.jpg', 'n'),
(32, 2, 'assets/uploaded/components/img_17440981971aa.jpg', 'n'),
(33, 2, 'assets/uploaded/components/img_1744098199aa.jpg', 'y'),
(34, 2, 'assets/uploaded/components/img_17440981991aa.jpg', 'n'),
(35, 2, 'assets/uploaded/components/img_17440981992aa.jpg', 'n'),
(36, 3, 'assets/uploaded/components/img_1744098197aaa.jpg', 'n'),
(37, 3, 'assets/uploaded/components/img_17440981971aaa.jpg', 'n'),
(38, 3, 'assets/uploaded/components/img_1744098199aaa.jpg', 'n'),
(39, 3, 'assets/uploaded/components/img_17440981991aaa.jpg', 'y'),
(40, 3, 'assets/uploaded/components/img_17440981992aaa.jpg', 'n'),
(41, 5, 'assets/uploaded/components/img_5aaaaa.jpg', 'y'),
(42, 5, 'assets/uploaded/components/img_5aaaa.jpg', 'n'),
(43, 5, 'assets/uploaded/components/img_5aaa.jpg', 'n'),
(44, 5, 'assets/uploaded/components/img_5aa.jpg', 'n'),
(45, 5, 'assets/uploaded/components/img_5a.jpg', 'n'),
(46, 6, 'assets/uploaded/components/img_6aaaaa.jpg', 'n'),
(47, 6, 'assets/uploaded/components/img_6aaaa.jpg', 'y'),
(48, 6, 'assets/uploaded/components/img_6aaa.jpg', 'n'),
(49, 6, 'assets/uploaded/components/img_6aa.jpg', 'n'),
(50, 6, 'assets/uploaded/components/img_6a.jpg', 'n'),
(51, 7, 'assets/uploaded/components/img_7aaaaa.jpg', 'n'),
(52, 7, 'assets/uploaded/components/img_7aaaa.jpg', 'n'),
(53, 7, 'assets/uploaded/components/img_7aaa.jpg', 'y'),
(54, 7, 'assets/uploaded/components/img_7aa.jpg', 'n'),
(55, 7, 'assets/uploaded/components/img_7a.jpg', 'n'),
(56, 8, 'assets/uploaded/components/img_8aaaaa.jpg', 'n'),
(57, 8, 'assets/uploaded/components/img_8aaaa.jpg', 'n'),
(58, 8, 'assets/uploaded/components/img_8aaa.jpg', 'n'),
(59, 8, 'assets/uploaded/components/img_8aa.jpg', 'y'),
(60, 8, 'assets/uploaded/components/img_8a.jpg', 'n'),
(61, 17, 'assets/uploaded/components/img_1744610558.png', 'n'),
(65, 17, 'assets/uploaded/components/img_1744616448.png', 'n'),
(66, 17, 'assets/uploaded/components/img_17446164481.png', 'n'),
(67, 17, 'assets/uploaded/components/img_1744616449.png', 'y'),
(71, 21, 'assets/uploaded/components/img_1746881645.jpeg', 'y'),
(72, 21, 'assets/uploaded/components/img_1746881645.jpg', 'n'),
(73, 21, 'assets/uploaded/components/img_1746881646.jpg', 'n'),
(74, 21, 'assets/uploaded/components/img_1746881646.jpeg', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_provinces`
--

CREATE TABLE `reg_provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_del` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `reg_provinces`
--

INSERT INTO `reg_provinces` (`id`, `name`, `is_del`) VALUES
(97, 'Jawa Barat', 'n'),
(98, 'Jawa Timur', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_regencies`
--

CREATE TABLE `reg_regencies` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_del` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `reg_regencies`
--

INSERT INTO `reg_regencies` (`id`, `province_id`, `name`, `is_del`) VALUES
(9509, 97, 'Bandung', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `_setting`
--

CREATE TABLE `_setting` (
  `setting_id` int(11) NOT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `header_lg` varchar(35) NOT NULL,
  `header_sm` varchar(100) NOT NULL,
  `m_1` varchar(50) NOT NULL,
  `m_2` varchar(250) NOT NULL,
  `m_3` varchar(70) NOT NULL,
  `alamat` text NOT NULL,
  `cs_phone` varchar(175) DEFAULT NULL,
  `cs_fb` varchar(175) DEFAULT NULL,
  `cs_twitter` varchar(175) NOT NULL,
  `cs_instagram` varchar(175) NOT NULL,
  `cs_email` varchar(175) NOT NULL,
  `cs_youtube` varchar(175) NOT NULL,
  `about` text NOT NULL,
  `footer_text` text DEFAULT NULL,
  `footer_copyright` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `_setting`
--

INSERT INTO `_setting` (`setting_id`, `meta_title`, `meta_description`, `meta_keywords`, `header_lg`, `header_sm`, `m_1`, `m_2`, `m_3`, `alamat`, `cs_phone`, `cs_fb`, `cs_twitter`, `cs_instagram`, `cs_email`, `cs_youtube`, `about`, `footer_text`, `footer_copyright`) VALUES
(1, 'JalanYuk', 'Temukan berbagai destinasi wisata terbaik di seluruh Indonesia. Dapatkan informasi lengkap mulai dari lokasi, harga tiket, hingga ulasan pengunjung. Rencanakan liburan impianmu sekarang!', 'wisata Indonesia, tempat wisata, destinasi wisata, liburan, tiket wisata, rekomendasi wisata, wisata alam, wisata keluarga, wisata murah, peta wisata, ulasan wisata', 'Mau liburan?', 'Cari tahu dulu tempat wisata yang pas buat kamu disini!', 'Semua informasi ada di sini!', 'Sebelum memutuskan liburan ke mana, yuk cari tahu dulu informasi lengkap tentang tempat wisata yang ingin kalian kunjungi di sini!', 'Mulai mencari destinasi...', 'Jika ada informasi yang belum jelas atau Anda membutuhkan bantuan, silakan hubungi tim kami melalui kontak yang tersedia.', '62 123 4567 888', '#', '#', '#', 'rangga@gmail.com', '#', '<p class=\"\" data-start=\"122\" data-end=\"476\">Selamat datang di website kami, sebuah platform digital yang dirancang khusus untuk menjadi panduan lengkap dalam menjelajahi destinasi wisata di seluruh Indonesia. Kami hadir untuk memberikan kemudahan bagi siapa pun yang ingin merencanakan perjalanan, mencari referensi liburan, atau sekadar menambah wawasan tentang tempat-tempat menarik di Nusantara.</p>\r\n<p class=\"\" data-start=\"478\" data-end=\"829\">Melalui situs ini, kamu bisa menemukan berbagai informasi penting mengenai tempat wisata &ndash; mulai dari deskripsi destinasi, alamat lengkap, harga tiket masuk, jam operasional, galeri foto, hingga ulasan langsung dari para pengunjung. Semua data kami sajikan seakurat mungkin agar dapat menjadi sumber terpercaya sebelum kamu memutuskan untuk berwisata.</p>\r\n<p class=\"\" data-start=\"831\" data-end=\"1109\">Tidak hanya itu, kami juga menyediakan fitur pencarian cerdas yang memudahkan pengguna dalam menemukan tempat wisata berdasarkan kategori, lokasi, atau kata kunci tertentu. Dengan begitu, kamu bisa menemukan tempat wisata yang paling sesuai dengan minat, waktu, dan budget kamu.</p>\r\n<p class=\"\" data-start=\"1111\" data-end=\"1402\">Kami percaya bahwa Indonesia memiliki kekayaan alam dan budaya yang luar biasa, dan melalui website ini kami ingin ikut serta dalam mempromosikan keindahan tersebut ke masyarakat luas. Harapan kami, setiap orang bisa mendapatkan pengalaman wisata yang menyenangkan, informatif, dan berkesan.</p>\r\n<p class=\"\" data-start=\"1404\" data-end=\"1530\">Terima kasih telah menggunakan layanan kami. Yuk, mulai petualanganmu bersama kami dan temukan tempat wisata impianmu di sini!</p>', 'Website ini merupakan platform pencarian wisata yang menyediakan informasi lengkap tentang destinasi wisata di seluruh Indonesia, mulai dari deskripsi, lokasi, harga tiket, fasilitas, foto, hingga ulasan pengunjung.  Jelajahi berbagai pilihan wisata menarik dengan mudah dan rencanakan liburan impian Anda hanya di sini.', 'Copyright © 2025. All Rights Reserved.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`admin_id`) USING BTREE;

--
-- Indeks untuk tabel `m_faq`
--
ALTER TABLE `m_faq`
  ADD PRIMARY KEY (`faq_id`) USING BTREE;

--
-- Indeks untuk tabel `m_rating`
--
ALTER TABLE `m_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `wisata_id` (`wisata_id`);

--
-- Indeks untuk tabel `m_ulasan`
--
ALTER TABLE `m_ulasan`
  ADD PRIMARY KEY (`ulasan_id`),
  ADD KEY `wisata_id` (`wisata_id`);

--
-- Indeks untuk tabel `m_wisata`
--
ALTER TABLE `m_wisata`
  ADD PRIMARY KEY (`wisata_id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `kabkota_id` (`kabkota_id`);

--
-- Indeks untuk tabel `m_wisata_foto`
--
ALTER TABLE `m_wisata_foto`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `wisata_id` (`wisata_id`);

--
-- Indeks untuk tabel `reg_provinces`
--
ALTER TABLE `reg_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reg_regencies`
--
ALTER TABLE `reg_regencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_province` (`province_id`);

--
-- Indeks untuk tabel `_setting`
--
ALTER TABLE `_setting`
  ADD PRIMARY KEY (`setting_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_faq`
--
ALTER TABLE `m_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `m_rating`
--
ALTER TABLE `m_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_ulasan`
--
ALTER TABLE `m_ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `m_wisata`
--
ALTER TABLE `m_wisata`
  MODIFY `wisata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `m_wisata_foto`
--
ALTER TABLE `m_wisata_foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `reg_provinces`
--
ALTER TABLE `reg_provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `reg_regencies`
--
ALTER TABLE `reg_regencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9510;

--
-- AUTO_INCREMENT untuk tabel `_setting`
--
ALTER TABLE `_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `m_rating`
--
ALTER TABLE `m_rating`
  ADD CONSTRAINT `m_rating_ibfk_1` FOREIGN KEY (`wisata_id`) REFERENCES `m_wisata` (`wisata_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `m_ulasan`
--
ALTER TABLE `m_ulasan`
  ADD CONSTRAINT `m_ulasan_ibfk_1` FOREIGN KEY (`wisata_id`) REFERENCES `m_wisata` (`wisata_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `m_wisata`
--
ALTER TABLE `m_wisata`
  ADD CONSTRAINT `m_wisata_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `reg_provinces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `m_wisata_ibfk_2` FOREIGN KEY (`kabkota_id`) REFERENCES `reg_regencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `m_wisata_foto`
--
ALTER TABLE `m_wisata_foto`
  ADD CONSTRAINT `m_wisata_foto_ibfk_1` FOREIGN KEY (`wisata_id`) REFERENCES `m_wisata` (`wisata_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `reg_regencies`
--
ALTER TABLE `reg_regencies`
  ADD CONSTRAINT `reg_regencies_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `reg_provinces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
