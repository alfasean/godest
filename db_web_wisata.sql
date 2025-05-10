-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2025 pada 11.04
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_rating`
--

INSERT INTO `m_rating` (`rating_id`, `wisata_id`, `ip`, `rating`, `date_at`, `created_at`) VALUES
(1, 1, '::1', 5, '2025-04-12', '2025-04-12 21:46:49'),
(2, 1, '::1', 3, '2025-04-12', '2025-04-12 21:47:09'),
(3, 1, '::1', 5, '2025-04-12', '2025-04-12 21:48:09');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_ulasan`
--

INSERT INTO `m_ulasan` (`ulasan_id`, `wisata_id`, `ip`, `parent_ip`, `nama_lengkap`, `ulasan_text`, `rating`, `date_at`, `created_at`) VALUES
(20, 1, '::1', '', 'Chandra', 'Rekomendasi banget ya, bagus banget tempatnya luass air bersih', 5, '2025-04-14', '2025-04-14 15:18:55'),
(21, 1, '::1', '', 'Gustiya', 'Bagus banget tempatnya luass', 4, '2025-04-14', '2025-04-14 15:19:02');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_wisata`
--

INSERT INTO `m_wisata` (`wisata_id`, `province_id`, `kabkota_id`, `nama_wisata`, `slug`, `situs_resmi`, `deskripsi_wisata`, `alamat_wisata`, `embed_map`, `nomor_resmi`, `harga_wisata_weekday`, `harga_wisata_weekend`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`, `info_jadwal`, `is_jadwal`, `is_status`, `views`, `ulasan`, `rating`, `created_at`) VALUES
(1, 32, 3271, 'The Jungle Waterpark Bogor', 'the-jungle-waterpark-bogor', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\n<ul>\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n</ul>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 16, 2, 4.5, '2025-04-08 14:43:19'),
(2, 32, 3271, 'The Jungle Waterpark Bogor 2', 'the-jungle-waterpark-bogor1', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\n<ul>\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n</ul>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 0, 0, 0, '2025-04-08 14:43:19'),
(3, 32, 3271, 'The Jungle Waterpark Bogor 3', 'the-jungle-waterpark-bogor2', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\n<ul>\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n</ul>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 0, 0, 0, '2025-04-08 14:43:19'),
(4, 32, 3271, 'The Jungle Waterpark Bogor 4', 'the-jungle-waterpark-bogor3', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\n<ul>\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n</ul>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 0, 0, 0, '2025-04-08 14:43:19'),
(5, 32, 3271, 'The Jungle Waterpark Bogor 5', 'the-jungle-waterpark-bogor4', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\n<ul>\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n</ul>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 0, 0, 4.6, '2025-04-08 14:43:19'),
(6, 32, 3271, 'The Jungle Waterpark Bogor 6', 'the-jungle-waterpark-bogor5', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\n<ul>\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n</ul>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 0, 0, 0, '2025-04-08 14:43:19'),
(7, 32, 3271, 'The Jungle Waterpark Bogor 7', 'the-jungle-waterpark-bogor6', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\n<ul>\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\n</ul>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 0, 0, 0, '2025-04-08 14:43:19'),
(8, 32, 3271, 'The Jungle Waterpark Bogor 8', 'the-jungle-waterpark-bogor-2', 'https://www.thejungleadventure.com/', '<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\r\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\r\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>\r\n<ul>\r\n<li style=\"font-weight: 400;\">Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\r\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\r\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\r\n<li>Masuk dan nikmati atraksi seru serta keseruan tak terlupakan di Jungle Water Park Bogor!</li>\r\n</ul>\r\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor merupakan wahana air yang berada di kawasan perumahan Bogor Nirwana Residence yang dikelola oleh manajemen PT. Graha Andrasentra Propertindo Tbk, yang merupakan salah satu unit usaha PT. Bakrieland Development Tbk. Berada di lokasi pegunungan dengan latar belakang Gunung Salak, pemandangan indah dan sejuk serta dibangun dengan konsep&nbsp;&nbsp;60% area hijau. The Jungle Waterpark merupakan wahana air yang mengusung konsep tema belajar dan bermain yang berbasis panorama alam Indonesia</p>\r\n<p style=\"font-weight: 400;\">The Jungle Waterpark Bogor beberapa kali meraih Top Brand Award untuk kategori Taman Rekreasi Air. The Jungle sudah berturut-turut mendapatkan Top Brand sebanyak delapan kali yaitu&nbsp;&nbsp;tahun 2010 hingga 2018, serta Top Brand Kids and Teens tahun 2015- 2016.</p>\r\n<p style=\"font-weight: 400;\">The Jungle juga tercatat masuk dalam daftar&nbsp;&nbsp;20 waterpark terbaik se Asia Pasifik pada tahun 2017 versi Themed Entertainment Association (TEA) &amp; AECOM, sebuah perusahaan teknologi asal Los Angeles, Amerika Serikat, melakui&nbsp;&nbsp;laporan riset yang berjudul Global Attraction Attendance Report,&nbsp;&nbsp;yang merupakan data jumlah kunjungan wisatawan ke sebuah objek wisata. The Jungle berada di posisi 10.</p>', 'Jalan Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Bogor Selatan, Kota Bogor, Jawa Barat 16132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.1001786494044!2d106.7949215!3d-6.634479400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cf5deba619f3%3A0x485a13f031e8b904!2sThe%20Jungle%20Waterpark%20Bogor!5e0!3m2!1sid!2sid!4v1744097987574!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '(0251) 8212 666', '50000', '65000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 0, 0, 0, '2025-04-08 14:43:19'),
(17, 31, 3172, 'Taman Impian Jaya Ancol', 'taman-impian-jaya-ancol', 'https://www.ancol.com/', '<div class=\"css-1dbjc4n r-1ifxtd0 r-11wrixw r-88pszg r-1wzrnnt\">\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Rasakan petualangan seru di Dufan, pionir taman hiburan di Jakarta!</div>\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Masuki terowongan yang akan membawamu ke Amerika di abad ke-19 dengan Kereta Misteri</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">Siap-siap memacu adrenalin dengan tikungan dan kelokan di Halilintar, Tornado, Baling-Baling, dan Hysteria</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">Ajak si kecil menikmati wahana Bianglala yang menawarkan pemandangan Pantai Ancol dari ketinggian</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">Dapatkan pengalaman tak terlupakan dengan berlayar melewati pemandangan ikonik dari film Ice Age di Ice Age Arctic Adventure!</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ow6zhx r-88pszg\">\r\n<div class=\"css-901oao r-13awgt0 r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p>Rasakan petualangan seru di Dufan, pionir taman hiburan di Jakarta! Dengan sekitar 26 wahana luar ruangan dan 4 wahana dalam ruangan, Dufan menawarkan kegembiraan yang didesain khusus untuk setiap pengunjung.</p>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ifxtd0 r-1ow6zhx r-88pszg\">\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\"><strong>Wahana ikonik</strong>: Siap-siap berteriak saat naik Turangga-rangga, Carousel, roller coaster legendaris Halilintar, dan serunya wahana air Niagara &ndash; semua pengalaman ikonik ini menunggu untuk dijelajahi!</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\"><strong>Hiburan ramah anak</strong>: Ajak si kecil menikmati wahana Poci-Poci dan Dream Playground yang tak boleh dilewatkan. Saksikan mereka mengasah kemampuan motorik dan sensorik, dari bermain trampolin hingga panjat dinding, futsal, soft toys, dan banyak lagi!</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\"><strong>Jaminan kualitas</strong>: Tenang saja karena Dufan bersertifikat ISO 9001:2015 dan mengikuti standar kualitas internasional. Bermainlah sepuasnya tanpa khawatir!</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\"><strong>Petualangan baru</strong>: Nikmati sensasi dari 9 wahana baru yang ditambahkan pada tahun 2019, termasuk Baling-baling, Paralayang, Zigzag, Turbodrop, New Ontang Anting, Kolibri, dan Karavel.</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ow6zhx r-88pszg\">\r\n<div class=\"css-901oao r-13awgt0 r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p>Ingin memacu adrenalin ataupun bersantai dengan orang kesayangan, semua pilihan tersedia di Dunia Fantasi. Pesan tiket Anda sekarang dan nikmati keseruan di Dufan!</p>\r\n<div class=\"css-1dbjc4n r-1ow6zhx r-88pszg\">\r\n<div class=\"css-901oao r-13awgt0 r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p><strong>Penukaran Dufan Annual Pass/6 Months Pass (E-Card):</strong></p>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ifxtd0 r-1ow6zhx r-88pszg\">\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Pada kunjungan pertama kamu, tunjukkan dan pindai voucher Traveloka kamu di loket Gerbang Ancol.</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Aktivasi E-Card harus dilakukan paling lambat pukul 23:59 pada tanggal kunjungan yang dipilih pada saat pembelian.</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\"><strong>Aktivasi E-Card tidak dapat dilakukan setelah tanggal kunjungan yang dipilih telah lewat.</strong></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ow6zhx r-88pszg\">\r\n<div class=\"css-901oao r-13awgt0 r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p><strong>Mekanisme Aktivasi Dufan E-Card:</strong></p>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ifxtd0 r-1ow6zhx r-88pszg\">\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Klik link: <a href=\"http://bit.ly/ecardpass\" target=\"_blank\" rel=\"noopener\">http://bit.ly/ecardpass</a>.</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Untuk memindai tiket kamu dan mengambil foto melalui kamera, pastikan kamu memilih \"izinkan kamera\" (ambil foto tanpa menggunakan masker).</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">Masukkan nomor voucher ID Xperience kamu atau pindai tiket kamu dan klik tombol &ldquo;kirim&rdquo;.</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">Masukkan data diri dengan benar, E-Card akan dikirim melalui email (pastikan email aktif dan masukkan alamat email dengan benar). Jika data yang kamu masukkan sudah benar, klik tombol \"Lanjutkan\".</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">Ambil foto wajah kamu, pastikan wajah kamu terlihat jelas di foto, klik tombol \"kamera\" untuk foto, posisikan wajah kamu tepat di dalam kotak, lalu klik \"Buat E-Card\". Pastikan untuk mengambil foto tanpa masker.</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">Tiket E-Card kamu sudah siap. Cek email kamu atau download langsung, dengan klik \"Download E-Card\".</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Jika terjadi penyalahgunaan pada E-Card, maka E-Card akan di nonaktifkan.</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ow6zhx r-88pszg\">\r\n<div class=\"css-901oao r-13awgt0 r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p><strong>Cara menggunakan E-Card:</strong></p>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1ifxtd0 r-1ow6zhx r-88pszg\">\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Hanya E-Card kamu yang berlaku. Bukti pembayaran atau kuitansi tidak dapat digunakan untuk masuk.</div>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-1habvwh r-18u37iz r-1w6e6rj\">\r\n<div class=\"css-1dbjc4n r-obd0qt r-1777fci r-1kb76zh\">\r\n<div class=\"css-1dbjc4n r-1y80485\">&nbsp;</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-13awgt0\">\r\n<div class=\"css-901oao r-uh8wd5 r-majxgm r-fdjqy7\" dir=\"auto\">Pastikan penukaran voucher dilakukan selama periode penukaran.</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Taman Impian Jaya Ancol. Jl. Lodan Timur No.7, RW.10, Ancol, Kec. Pademangan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14430, Indonesia', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31736.53003733322!2d106.83759680855107!3d-6.12178515797904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f47477efd771%3A0x85206a9cc2c15358!2sTaman%20Impian%20Jaya%20Ancol!5e0!3m2!1sid!2sid!4v1744610390890!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '6287782222422', '220000', '250000', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', '08:00__18:00', 'Tetap Buka Walau Tanggal Merah (Kecuali Hari Pertama Lebaran)', 'y', 'y', 5, 0, 0, '2025-04-14 13:02:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_wisata_foto`
--

CREATE TABLE `m_wisata_foto` (
  `foto_id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `utama` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(67, 17, 'assets/uploaded/components/img_1744616449.png', 'y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_provinces`
--

CREATE TABLE `reg_provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_del` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `reg_provinces`
--

INSERT INTO `reg_provinces` (`id`, `name`, `is_del`) VALUES
(11, 'Aceh', 'n'),
(12, 'Sumatera Utara', 'n'),
(13, 'Sumatera Barat', 'n'),
(14, 'Riau', 'n'),
(15, 'Jambi', 'n'),
(16, 'Sumatera Selatan', 'n'),
(17, 'Bengkulu', 'n'),
(18, 'Lampung', 'n'),
(19, 'Kepulauan Bangka Belitung', 'n'),
(21, 'Kepulauan Riau', 'n'),
(31, 'DKI Jakarta', 'n'),
(32, 'Jawa Barat', 'n'),
(33, 'Jawa Tengah', 'n'),
(34, 'Daerah Istimewa Yogyakarta', 'n'),
(35, 'Jawa Timur', 'n'),
(36, 'Banten', 'n'),
(51, 'Bali', 'n'),
(52, 'Nusa Tenggara Barat', 'n'),
(53, 'Nusa Tenggara Timur', 'n'),
(61, 'Kalimantan Barat', 'n'),
(62, 'Kalimantan Tengah', 'n'),
(63, 'Kalimantan Selatan', 'n'),
(64, 'Kalimantan Timur', 'n'),
(65, 'Kalimantan Utara', 'n'),
(71, 'Sulawesi Utara', 'n'),
(72, 'Sulawesi Tengah', 'n'),
(73, 'Sulawesi Selatan', 'n'),
(74, 'Sulawesi Tenggara', 'n'),
(75, 'Gorontalo', 'n'),
(76, 'Sulawesi Barat', 'n'),
(81, 'Maluku', 'n'),
(82, 'Maluku Utara', 'n'),
(91, 'Papua', 'n'),
(92, 'Papua Barat', 'n'),
(93, 'Papua Selatan', 'n'),
(94, 'Papua Tengah', 'n'),
(95, 'Papua Pegunungan', 'n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reg_regencies`
--

CREATE TABLE `reg_regencies` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_del` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `reg_regencies`
--

INSERT INTO `reg_regencies` (`id`, `province_id`, `name`, `is_del`) VALUES
(1101, 11, 'KAB. ACEH SELATAN', 'n'),
(1102, 11, 'KAB. ACEH TENGGARA', 'n'),
(1103, 11, 'KAB. ACEH TIMUR', 'n'),
(1104, 11, 'KAB. ACEH TENGAH', 'n'),
(1105, 11, 'KAB. ACEH BARAT', 'n'),
(1106, 11, 'KAB. ACEH BESAR', 'n'),
(1107, 11, 'KAB. PIDIE', 'n'),
(1108, 11, 'KAB. ACEH UTARA', 'n'),
(1109, 11, 'KAB. SIMEULUE', 'n'),
(1110, 11, 'KAB. ACEH SINGKIL', 'n'),
(1111, 11, 'KAB. BIREUEN', 'n'),
(1112, 11, 'KAB. ACEH BARAT DAYA', 'n'),
(1113, 11, 'KAB. GAYO LUES', 'n'),
(1114, 11, 'KAB. ACEH JAYA', 'n'),
(1115, 11, 'KAB. NAGAN RAYA', 'n'),
(1116, 11, 'KAB. ACEH TAMIANG', 'n'),
(1117, 11, 'KAB. BENER MERIAH', 'n'),
(1118, 11, 'KAB. PIDIE JAYA', 'n'),
(1171, 11, 'KOTA BANDA ACEH', 'n'),
(1172, 11, 'KOTA SABANG', 'n'),
(1173, 11, 'KOTA LHOKSEUMAWE', 'n'),
(1174, 11, 'KOTA LANGSA', 'n'),
(1175, 11, 'KOTA SUBULUSSALAM', 'n'),
(1201, 12, 'KAB. TAPANULI TENGAH', 'n'),
(1202, 12, 'KAB. TAPANULI UTARA', 'n'),
(1203, 12, 'KAB. TAPANULI SELATAN', 'n'),
(1204, 12, 'KAB. NIAS', 'n'),
(1205, 12, 'KAB. LANGKAT', 'n'),
(1206, 12, 'KAB. KARO', 'n'),
(1207, 12, 'KAB. DELI SERDANG', 'n'),
(1208, 12, 'KAB. SIMALUNGUN', 'n'),
(1209, 12, 'KAB. ASAHAN', 'n'),
(1210, 12, 'KAB. LABUHANBATU', 'n'),
(1211, 12, 'KAB. DAIRI', 'n'),
(1212, 12, 'KAB. TOBA', 'n'),
(1213, 12, 'KAB. MANDAILING NATAL', 'n'),
(1214, 12, 'KAB. NIAS SELATAN', 'n'),
(1215, 12, 'KAB. PAKPAK BHARAT', 'n'),
(1216, 12, 'KAB. HUMBANG HASUNDUTAN', 'n'),
(1217, 12, 'KAB. SAMOSIR', 'n'),
(1218, 12, 'KAB. SERDANG BEDAGAI', 'n'),
(1219, 12, 'KAB. BATU BARA', 'n'),
(1220, 12, 'KAB. PADANG LAWAS UTARA', 'n'),
(1221, 12, 'KAB. PADANG LAWAS', 'n'),
(1222, 12, 'KAB. LABUHANBATU SELATAN', 'n'),
(1223, 12, 'KAB. LABUHANBATU UTARA', 'n'),
(1224, 12, 'KAB. NIAS UTARA', 'n'),
(1225, 12, 'KAB. NIAS BARAT', 'n'),
(1271, 12, 'KOTA MEDAN', 'n'),
(1272, 12, 'KOTA PEMATANGSIANTAR', 'n'),
(1273, 12, 'KOTA SIBOLGA', 'n'),
(1274, 12, 'KOTA TANJUNG BALAI', 'n'),
(1275, 12, 'KOTA BINJAI', 'n'),
(1276, 12, 'KOTA TEBING TINGGI', 'n'),
(1277, 12, 'KOTA PADANGSIDIMPUAN', 'n'),
(1278, 12, 'KOTA GUNUNGSITOLI', 'n'),
(1301, 13, 'KAB. PESISIR SELATAN', 'n'),
(1302, 13, 'KAB. SOLOK', 'n'),
(1303, 13, 'KAB. SIJUNJUNG', 'n'),
(1304, 13, 'KAB. TANAH DATAR', 'n'),
(1305, 13, 'KAB. PADANG PARIAMAN', 'n'),
(1306, 13, 'KAB. AGAM', 'n'),
(1307, 13, 'KAB. LIMA PULUH KOTA', 'n'),
(1308, 13, 'KAB. PASAMAN', 'n'),
(1309, 13, 'KAB. KEPULAUAN MENTAWAI', 'n'),
(1310, 13, 'KAB. DHARMASRAYA', 'n'),
(1311, 13, 'KAB. SOLOK SELATAN', 'n'),
(1312, 13, 'KAB. PASAMAN BARAT', 'n'),
(1371, 13, 'KOTA PADANG', 'n'),
(1372, 13, 'KOTA SOLOK', 'n'),
(1373, 13, 'KOTA SAWAHLUNTO', 'n'),
(1374, 13, 'KOTA PADANG PANJANG', 'n'),
(1375, 13, 'KOTA BUKITTINGGI', 'n'),
(1376, 13, 'KOTA PAYAKUMBUH', 'n'),
(1377, 13, 'KOTA PARIAMAN', 'n'),
(1401, 14, 'KAB. KAMPAR', 'n'),
(1402, 14, 'KAB. INDRAGIRI HULU', 'n'),
(1403, 14, 'KAB. BENGKALIS', 'n'),
(1404, 14, 'KAB. INDRAGIRI HILIR', 'n'),
(1405, 14, 'KAB. PELALAWAN', 'n'),
(1406, 14, 'KAB. ROKAN HULU', 'n'),
(1407, 14, 'KAB. ROKAN HILIR', 'n'),
(1408, 14, 'KAB. SIAK', 'n'),
(1409, 14, 'KAB. KUANTAN SINGINGI', 'n'),
(1410, 14, 'KAB. KEPULAUAN MERANTI', 'n'),
(1471, 14, 'KOTA PEKANBARU', 'n'),
(1472, 14, 'KOTA DUMAI', 'n'),
(1501, 15, 'KAB. KERINCI', 'n'),
(1502, 15, 'KAB. MERANGIN', 'n'),
(1503, 15, 'KAB. SAROLANGUN', 'n'),
(1504, 15, 'KAB. BATANGHARI', 'n'),
(1505, 15, 'KAB. MUARO JAMBI', 'n'),
(1506, 15, 'KAB. TANJUNG JABUNG BARAT', 'n'),
(1507, 15, 'KAB. TANJUNG JABUNG TIMUR', 'n'),
(1508, 15, 'KAB. BUNGO', 'n'),
(1509, 15, 'KAB. TEBO', 'n'),
(1571, 15, 'KOTA JAMBI', 'n'),
(1572, 15, 'KOTA SUNGAI PENUH', 'n'),
(1601, 16, 'KAB. OGAN KOMERING ULU', 'n'),
(1602, 16, 'KAB. OGAN KOMERING ILIR', 'n'),
(1603, 16, 'KAB. MUARA ENIM', 'n'),
(1604, 16, 'KAB. LAHAT', 'n'),
(1605, 16, 'KAB. MUSI RAWAS', 'n'),
(1606, 16, 'KAB. MUSI BANYUASIN', 'n'),
(1607, 16, 'KAB. BANYUASIN', 'n'),
(1608, 16, 'KAB. OGAN KOMERING ULU TIMUR', 'n'),
(1609, 16, 'KAB. OGAN KOMERING ULU SELATAN', 'n'),
(1610, 16, 'KAB. OGAN ILIR', 'n'),
(1611, 16, 'KAB. EMPAT LAWANG', 'n'),
(1612, 16, 'KAB. PENUKAL ABAB LEMATANG ILIR', 'n'),
(1613, 16, 'KAB. MUSI RAWAS UTARA', 'n'),
(1671, 16, 'KOTA PALEMBANG', 'n'),
(1672, 16, 'KOTA PAGAR ALAM', 'n'),
(1673, 16, 'KOTA LUBUK LINGGAU', 'n'),
(1674, 16, 'KOTA PRABUMULIH', 'n'),
(1701, 17, 'KAB. BENGKULU SELATAN', 'n'),
(1702, 17, 'KAB. REJANG LEBONG', 'n'),
(1703, 17, 'KAB. BENGKULU UTARA', 'n'),
(1704, 17, 'KAB. KAUR', 'n'),
(1705, 17, 'KAB. SELUMA', 'n'),
(1706, 17, 'KAB. MUKO MUKO', 'n'),
(1707, 17, 'KAB. LEBONG', 'n'),
(1708, 17, 'KAB. KEPAHIANG', 'n'),
(1709, 17, 'KAB. BENGKULU TENGAH', 'n'),
(1771, 17, 'KOTA BENGKULU', 'n'),
(1801, 18, 'KAB. LAMPUNG SELATAN', 'n'),
(1802, 18, 'KAB. LAMPUNG TENGAH', 'n'),
(1803, 18, 'KAB. LAMPUNG UTARA', 'n'),
(1804, 18, 'KAB. LAMPUNG BARAT', 'n'),
(1805, 18, 'KAB. TULANG BAWANG', 'n'),
(1806, 18, 'KAB. TANGGAMUS', 'n'),
(1807, 18, 'KAB. LAMPUNG TIMUR', 'n'),
(1808, 18, 'KAB. WAY KANAN', 'n'),
(1809, 18, 'KAB. PESAWARAN', 'n'),
(1810, 18, 'KAB. PRINGSEWU', 'n'),
(1811, 18, 'KAB. MESUJI', 'n'),
(1812, 18, 'KAB. TULANG BAWANG BARAT', 'n'),
(1813, 18, 'KAB. PESISIR BARAT', 'n'),
(1871, 18, 'KOTA BANDAR LAMPUNG', 'n'),
(1872, 18, 'KOTA METRO', 'n'),
(1901, 19, 'KAB. BANGKA', 'n'),
(1902, 19, 'KAB. BELITUNG', 'n'),
(1903, 19, 'KAB. BANGKA SELATAN', 'n'),
(1904, 19, 'KAB. BANGKA TENGAH', 'n'),
(1905, 19, 'KAB. BANGKA BARAT', 'n'),
(1906, 19, 'KAB. BELITUNG TIMUR', 'n'),
(1971, 19, 'KOTA PANGKAL PINANG', 'n'),
(2101, 21, 'KAB. BINTAN', 'n'),
(2102, 21, 'KAB. KARIMUN', 'n'),
(2103, 21, 'KAB. NATUNA', 'n'),
(2104, 21, 'KAB. LINGGA', 'n'),
(2105, 21, 'KAB. KEPULAUAN ANAMBAS', 'n'),
(2171, 21, 'KOTA BATAM', 'n'),
(2172, 21, 'KOTA TANJUNG PINANG', 'n'),
(3101, 31, 'KAB. ADM. KEP. SERIBU', 'n'),
(3171, 31, 'KOTA ADM. JAKARTA PUSAT', 'n'),
(3172, 31, 'KOTA ADM. JAKARTA UTARA', 'n'),
(3173, 31, 'KOTA ADM. JAKARTA BARAT', 'n'),
(3174, 31, 'KOTA ADM. JAKARTA SELATAN', 'n'),
(3175, 31, 'KOTA ADM. JAKARTA TIMUR', 'n'),
(3201, 32, 'KAB. BOGOR', 'n'),
(3202, 32, 'KAB. SUKABUMI', 'n'),
(3203, 32, 'KAB. CIANJUR', 'n'),
(3204, 32, 'KAB. BANDUNG', 'n'),
(3205, 32, 'KAB. GARUT', 'n'),
(3206, 32, 'KAB. TASIKMALAYA', 'n'),
(3207, 32, 'KAB. CIAMIS', 'n'),
(3208, 32, 'KAB. KUNINGAN', 'n'),
(3209, 32, 'KAB. CIREBON', 'n'),
(3210, 32, 'KAB. MAJALENGKA', 'n'),
(3211, 32, 'KAB. SUMEDANG', 'n'),
(3212, 32, 'KAB. INDRAMAYU', 'n'),
(3213, 32, 'KAB. SUBANG', 'n'),
(3214, 32, 'KAB. PURWAKARTA', 'n'),
(3215, 32, 'KAB. KARAWANG', 'n'),
(3216, 32, 'KAB. BEKASI', 'n'),
(3217, 32, 'KAB. BANDUNG BARAT', 'n'),
(3218, 32, 'KAB. PANGANDARAN', 'n'),
(3271, 32, 'KOTA BOGOR', 'n'),
(3272, 32, 'KOTA SUKABUMI', 'n'),
(3273, 32, 'KOTA BANDUNG', 'n'),
(3274, 32, 'KOTA CIREBON', 'n'),
(3275, 32, 'KOTA BEKASI', 'n'),
(3276, 32, 'KOTA DEPOK', 'n'),
(3277, 32, 'KOTA CIMAHI', 'n'),
(3278, 32, 'KOTA TASIKMALAYA', 'n'),
(3279, 32, 'KOTA BANJAR', 'n'),
(3301, 33, 'KAB. CILACAP', 'n'),
(3302, 33, 'KAB. BANYUMAS', 'n'),
(3303, 33, 'KAB. PURBALINGGA', 'n'),
(3304, 33, 'KAB. BANJARNEGARA', 'n'),
(3305, 33, 'KAB. KEBUMEN', 'n'),
(3306, 33, 'KAB. PURWOREJO', 'n'),
(3307, 33, 'KAB. WONOSOBO', 'n'),
(3308, 33, 'KAB. MAGELANG', 'n'),
(3309, 33, 'KAB. BOYOLALI', 'n'),
(3310, 33, 'KAB. KLATEN', 'n'),
(3311, 33, 'KAB. SUKOHARJO', 'n'),
(3312, 33, 'KAB. WONOGIRI', 'n'),
(3313, 33, 'KAB. KARANGANYAR', 'n'),
(3314, 33, 'KAB. SRAGEN', 'n'),
(3315, 33, 'KAB. GROBOGAN', 'n'),
(3316, 33, 'KAB. BLORA', 'n'),
(3317, 33, 'KAB. REMBANG', 'n'),
(3318, 33, 'KAB. PATI', 'n'),
(3319, 33, 'KAB. KUDUS', 'n'),
(3320, 33, 'KAB. JEPARA', 'n'),
(3321, 33, 'KAB. DEMAK', 'n'),
(3322, 33, 'KAB. SEMARANG', 'n'),
(3323, 33, 'KAB. TEMANGGUNG', 'n'),
(3324, 33, 'KAB. KENDAL', 'n'),
(3325, 33, 'KAB. BATANG', 'n'),
(3326, 33, 'KAB. PEKALONGAN', 'n'),
(3327, 33, 'KAB. PEMALANG', 'n'),
(3328, 33, 'KAB. TEGAL', 'n'),
(3329, 33, 'KAB. BREBES', 'n'),
(3371, 33, 'KOTA MAGELANG', 'n'),
(3372, 33, 'KOTA SURAKARTA', 'n'),
(3373, 33, 'KOTA SALATIGA', 'n'),
(3374, 33, 'KOTA SEMARANG', 'n'),
(3375, 33, 'KOTA PEKALONGAN', 'n'),
(3376, 33, 'KOTA TEGAL', 'n'),
(3401, 34, 'KAB. KULON PROGO', 'n'),
(3402, 34, 'KAB. BANTUL', 'n'),
(3403, 34, 'KAB. GUNUNGKIDUL', 'n'),
(3404, 34, 'KAB. SLEMAN', 'n'),
(3471, 34, 'KOTA YOGYAKARTA', 'n'),
(3501, 35, 'KAB. PACITAN', 'n'),
(3502, 35, 'KAB. PONOROGO', 'n'),
(3503, 35, 'KAB. TRENGGALEK', 'n'),
(3504, 35, 'KAB. TULUNGAGUNG', 'n'),
(3505, 35, 'KAB. BLITAR', 'n'),
(3506, 35, 'KAB. KEDIRI', 'n'),
(3507, 35, 'KAB. MALANG', 'n'),
(3508, 35, 'KAB. LUMAJANG', 'n'),
(3509, 35, 'KAB. JEMBER', 'n'),
(3510, 35, 'KAB. BANYUWANGI', 'n'),
(3511, 35, 'KAB. BONDOWOSO', 'n'),
(3512, 35, 'KAB. SITUBONDO', 'n'),
(3513, 35, 'KAB. PROBOLINGGO', 'n'),
(3514, 35, 'KAB. PASURUAN', 'n'),
(3515, 35, 'KAB. SIDOARJO', 'n'),
(3516, 35, 'KAB. MOJOKERTO', 'n'),
(3517, 35, 'KAB. JOMBANG', 'n'),
(3518, 35, 'KAB. NGANJUK', 'n'),
(3519, 35, 'KAB. MADIUN', 'n'),
(3520, 35, 'KAB. MAGETAN', 'n'),
(3521, 35, 'KAB. NGAWI', 'n'),
(3522, 35, 'KAB. BOJONEGORO', 'n'),
(3523, 35, 'KAB. TUBAN', 'n'),
(3524, 35, 'KAB. LAMONGAN', 'n'),
(3525, 35, 'KAB. GRESIK', 'n'),
(3526, 35, 'KAB. BANGKALAN', 'n'),
(3527, 35, 'KAB. SAMPANG', 'n'),
(3528, 35, 'KAB. PAMEKASAN', 'n'),
(3529, 35, 'KAB. SUMENEP', 'n'),
(3571, 35, 'KOTA KEDIRI', 'n'),
(3572, 35, 'KOTA BLITAR', 'n'),
(3573, 35, 'KOTA MALANG', 'n'),
(3574, 35, 'KOTA PROBOLINGGO', 'n'),
(3575, 35, 'KOTA PASURUAN', 'n'),
(3576, 35, 'KOTA MOJOKERTO', 'n'),
(3577, 35, 'KOTA MADIUN', 'n'),
(3578, 35, 'KOTA SURABAYA', 'n'),
(3579, 35, 'KOTA BATU', 'n'),
(3601, 36, 'KAB. PANDEGLANG', 'n'),
(3602, 36, 'KAB. LEBAK', 'n'),
(3603, 36, 'KAB. TANGERANG', 'n'),
(3604, 36, 'KAB. SERANG', 'n'),
(3671, 36, 'KOTA TANGERANG', 'n'),
(3672, 36, 'KOTA CILEGON', 'n'),
(3673, 36, 'KOTA SERANG', 'n'),
(3674, 36, 'KOTA TANGERANG SELATAN', 'n'),
(5101, 51, 'KAB. JEMBRANA', 'n'),
(5102, 51, 'KAB. TABANAN', 'n'),
(5103, 51, 'KAB. BADUNG', 'n'),
(5104, 51, 'KAB. GIANYAR', 'n'),
(5105, 51, 'KAB. KLUNGKUNG', 'n'),
(5106, 51, 'KAB. BANGLI', 'n'),
(5107, 51, 'KAB. KARANGASEM', 'n'),
(5108, 51, 'KAB. BULELENG', 'n'),
(5171, 51, 'KOTA DENPASAR', 'n'),
(5201, 52, 'KAB. LOMBOK BARAT', 'n'),
(5202, 52, 'KAB. LOMBOK TENGAH', 'n'),
(5203, 52, 'KAB. LOMBOK TIMUR', 'n'),
(5204, 52, 'KAB. SUMBAWA', 'n'),
(5205, 52, 'KAB. DOMPU', 'n'),
(5206, 52, 'KAB. BIMA', 'n'),
(5207, 52, 'KAB. SUMBAWA BARAT', 'n'),
(5208, 52, 'KAB. LOMBOK UTARA', 'n'),
(5271, 52, 'KOTA MATARAM', 'n'),
(5272, 52, 'KOTA BIMA', 'n'),
(5301, 53, 'KAB. KUPANG', 'n'),
(5302, 53, 'KAB TIMOR TENGAH SELATAN', 'n'),
(5303, 53, 'KAB. TIMOR TENGAH UTARA', 'n'),
(5304, 53, 'KAB. BELU', 'n'),
(5305, 53, 'KAB. ALOR', 'n'),
(5306, 53, 'KAB. FLORES TIMUR', 'n'),
(5307, 53, 'KAB. SIKKA', 'n'),
(5308, 53, 'KAB. ENDE', 'n'),
(5309, 53, 'KAB. NGADA', 'n'),
(5310, 53, 'KAB. MANGGARAI', 'n'),
(5311, 53, 'KAB. SUMBA TIMUR', 'n'),
(5312, 53, 'KAB. SUMBA BARAT', 'n'),
(5313, 53, 'KAB. LEMBATA', 'n'),
(5314, 53, 'KAB. ROTE NDAO', 'n'),
(5315, 53, 'KAB. MANGGARAI BARAT', 'n'),
(5316, 53, 'KAB. NAGEKEO', 'n'),
(5317, 53, 'KAB. SUMBA TENGAH', 'n'),
(5318, 53, 'KAB. SUMBA BARAT DAYA', 'n'),
(5319, 53, 'KAB. MANGGARAI TIMUR', 'n'),
(5320, 53, 'KAB. SABU RAIJUA', 'n'),
(5321, 53, 'KAB. MALAKA', 'n'),
(5371, 53, 'KOTA KUPANG', 'n'),
(6101, 61, 'KAB. SAMBAS', 'n'),
(6102, 61, 'KAB. MEMPAWAH', 'n'),
(6103, 61, 'KAB. SANGGAU', 'n'),
(6104, 61, 'KAB. KETAPANG', 'n'),
(6105, 61, 'KAB. SINTANG', 'n'),
(6106, 61, 'KAB. KAPUAS HULU', 'n'),
(6107, 61, 'KAB. BENGKAYANG', 'n'),
(6108, 61, 'KAB. LANDAK', 'n'),
(6109, 61, 'KAB. SEKADAU', 'n'),
(6110, 61, 'KAB. MELAWI', 'n'),
(6111, 61, 'KAB. KAYONG UTARA', 'n'),
(6112, 61, 'KAB. KUBU RAYA', 'n'),
(6171, 61, 'KOTA PONTIANAK', 'n'),
(6172, 61, 'KOTA SINGKAWANG', 'n'),
(6201, 62, 'KAB. KOTAWARINGIN BARAT', 'n'),
(6202, 62, 'KAB. KOTAWARINGIN TIMUR', 'n'),
(6203, 62, 'KAB. KAPUAS', 'n'),
(6204, 62, 'KAB. BARITO SELATAN', 'n'),
(6205, 62, 'KAB. BARITO UTARA', 'n'),
(6206, 62, 'KAB. KATINGAN', 'n'),
(6207, 62, 'KAB. SERUYAN', 'n'),
(6208, 62, 'KAB. SUKAMARA', 'n'),
(6209, 62, 'KAB. LAMANDAU', 'n'),
(6210, 62, 'KAB. GUNUNG MAS', 'n'),
(6211, 62, 'KAB. PULANG PISAU', 'n'),
(6212, 62, 'KAB. MURUNG RAYA', 'n'),
(6213, 62, 'KAB. BARITO TIMUR', 'n'),
(6271, 62, 'KOTA PALANGKARAYA', 'n'),
(6301, 63, 'KAB. TANAH LAUT', 'n'),
(6302, 63, 'KAB. KOTABARU', 'n'),
(6303, 63, 'KAB. BANJAR', 'n'),
(6304, 63, 'KAB. BARITO KUALA', 'n'),
(6305, 63, 'KAB. TAPIN', 'n'),
(6306, 63, 'KAB. HULU SUNGAI SELATAN', 'n'),
(6307, 63, 'KAB. HULU SUNGAI TENGAH', 'n'),
(6308, 63, 'KAB. HULU SUNGAI UTARA', 'n'),
(6309, 63, 'KAB. TABALONG', 'n'),
(6310, 63, 'KAB. TANAH BUMBU', 'n'),
(6311, 63, 'KAB. BALANGAN', 'n'),
(6371, 63, 'KOTA BANJARMASIN', 'n'),
(6372, 63, 'KOTA BANJARBARU', 'n'),
(6401, 64, 'KAB. PASER', 'n'),
(6402, 64, 'KAB. KUTAI KARTANEGARA', 'n'),
(6403, 64, 'KAB. BERAU', 'n'),
(6407, 64, 'KAB. KUTAI BARAT', 'n'),
(6408, 64, 'KAB. KUTAI TIMUR', 'n'),
(6409, 64, 'KAB. PENAJAM PASER UTARA', 'n'),
(6411, 64, 'KAB. MAHAKAM ULU', 'n'),
(6471, 64, 'KOTA BALIKPAPAN', 'n'),
(6472, 64, 'KOTA SAMARINDA', 'n'),
(6474, 64, 'KOTA BONTANG', 'n'),
(6501, 65, 'KAB. BULUNGAN', 'n'),
(6502, 65, 'KAB. MALINAU', 'n'),
(6503, 65, 'KAB. NUNUKAN', 'n'),
(6504, 65, 'KAB. TANA TIDUNG', 'n'),
(6571, 65, 'KOTA TARAKAN', 'n'),
(7101, 71, 'KAB. BOLAANG MONGONDOW', 'n'),
(7102, 71, 'KAB. MINAHASA', 'n'),
(7103, 71, 'KAB. KEPULAUAN SANGIHE', 'n'),
(7104, 71, 'KAB. KEPULAUAN TALAUD', 'n'),
(7105, 71, 'KAB. MINAHASA SELATAN', 'n'),
(7106, 71, 'KAB. MINAHASA UTARA', 'n'),
(7107, 71, 'KAB. MINAHASA TENGGARA', 'n'),
(7108, 71, 'KAB. BOLAANG MONGONDOW UTARA', 'n'),
(7109, 71, 'KAB. KEP. SIAU TAGULANDANG BIARO', 'n'),
(7110, 71, 'KAB. BOLAANG MONGONDOW TIMUR', 'n'),
(7111, 71, 'KAB. BOLAANG MONGONDOW SELATAN', 'n'),
(7171, 71, 'KOTA MANADO', 'n'),
(7172, 71, 'KOTA BITUNG', 'n'),
(7173, 71, 'KOTA TOMOHON', 'n'),
(7174, 71, 'KOTA KOTAMOBAGU', 'n'),
(7201, 72, 'KAB. BANGGAI', 'n'),
(7202, 72, 'KAB. POSO', 'n'),
(7203, 72, 'KAB. DONGGALA', 'n'),
(7204, 72, 'KAB. TOLI TOLI', 'n'),
(7205, 72, 'KAB. BUOL', 'n'),
(7206, 72, 'KAB. MOROWALI', 'n'),
(7207, 72, 'KAB. BANGGAI KEPULAUAN', 'n'),
(7208, 72, 'KAB. PARIGI MOUTONG', 'n'),
(7209, 72, 'KAB. TOJO UNA UNA', 'n'),
(7210, 72, 'KAB. SIGI', 'n'),
(7211, 72, 'KAB. BANGGAI LAUT', 'n'),
(7212, 72, 'KAB. MOROWALI UTARA', 'n'),
(7271, 72, 'KOTA PALU', 'n'),
(7301, 73, 'KAB. KEPULAUAN SELAYAR', 'n'),
(7302, 73, 'KAB. BULUKUMBA', 'n'),
(7303, 73, 'KAB. BANTAENG', 'n'),
(7304, 73, 'KAB. JENEPONTO', 'n'),
(7305, 73, 'KAB. TAKALAR', 'n'),
(7306, 73, 'KAB. GOWA', 'n'),
(7307, 73, 'KAB. SINJAI', 'n'),
(7308, 73, 'KAB. BONE', 'n'),
(7309, 73, 'KAB. MAROS', 'n'),
(7310, 73, 'KAB. PANGKAJENE KEPULAUAN', 'n'),
(7311, 73, 'KAB. BARRU', 'n'),
(7312, 73, 'KAB. SOPPENG', 'n'),
(7313, 73, 'KAB. WAJO', 'n'),
(7314, 73, 'KAB. SIDENRENG RAPPANG', 'n'),
(7315, 73, 'KAB. PINRANG', 'n'),
(7316, 73, 'KAB. ENREKANG', 'n'),
(7317, 73, 'KAB. LUWU', 'n'),
(7318, 73, 'KAB. TANA TORAJA', 'n'),
(7322, 73, 'KAB. LUWU UTARA', 'n'),
(7324, 73, 'KAB. LUWU TIMUR', 'n'),
(7326, 73, 'KAB. TORAJA UTARA', 'n'),
(7371, 73, 'KOTA MAKASSAR', 'n'),
(7372, 73, 'KOTA PARE PARE', 'n'),
(7373, 73, 'KOTA PALOPO', 'n'),
(7401, 74, 'KAB. KOLAKA', 'n'),
(7402, 74, 'KAB. KONAWE', 'n'),
(7403, 74, 'KAB. MUNA', 'n'),
(7404, 74, 'KAB. BUTON', 'n'),
(7405, 74, 'KAB. KONAWE SELATAN', 'n'),
(7406, 74, 'KAB. BOMBANA', 'n'),
(7407, 74, 'KAB. WAKATOBI', 'n'),
(7408, 74, 'KAB. KOLAKA UTARA', 'n'),
(7409, 74, 'KAB. KONAWE UTARA', 'n'),
(7410, 74, 'KAB. BUTON UTARA', 'n'),
(7411, 74, 'KAB. KOLAKA TIMUR', 'n'),
(7412, 74, 'KAB. KONAWE KEPULAUAN', 'n'),
(7413, 74, 'KAB. MUNA BARAT', 'n'),
(7414, 74, 'KAB. BUTON TENGAH', 'n'),
(7415, 74, 'KAB. BUTON SELATAN', 'n'),
(7471, 74, 'KOTA KENDARI', 'n'),
(7472, 74, 'KOTA BAU BAU', 'n'),
(7501, 75, 'KAB. GORONTALO', 'n'),
(7502, 75, 'KAB. BOALEMO', 'n'),
(7503, 75, 'KAB. BONE BOLANGO', 'n'),
(7504, 75, 'KAB. POHUWATO', 'n'),
(7505, 75, 'KAB. GORONTALO UTARA', 'n'),
(7571, 75, 'KOTA GORONTALO', 'n'),
(7601, 76, 'KAB. PASANGKAYU', 'n'),
(7602, 76, 'KAB. MAMUJU', 'n'),
(7603, 76, 'KAB. MAMASA', 'n'),
(7604, 76, 'KAB. POLEWALI MANDAR', 'n'),
(7605, 76, 'KAB. MAJENE', 'n'),
(7606, 76, 'KAB. MAMUJU TENGAH', 'n'),
(8101, 81, 'KAB. MALUKU TENGAH', 'n'),
(8102, 81, 'KAB. MALUKU TENGGARA', 'n'),
(8103, 81, 'KAB. KEPULAUAN TANIMBAR', 'n'),
(8104, 81, 'KAB. BURU', 'n'),
(8105, 81, 'KAB. SERAM BAGIAN TIMUR', 'n'),
(8106, 81, 'KAB. SERAM BAGIAN BARAT', 'n'),
(8107, 81, 'KAB. KEPULAUAN ARU', 'n'),
(8108, 81, 'KAB. MALUKU BARAT DAYA', 'n'),
(8109, 81, 'KAB. BURU SELATAN', 'n'),
(8171, 81, 'KOTA AMBON', 'n'),
(8172, 81, 'KOTA TUAL', 'n'),
(8201, 82, 'KAB. HALMAHERA BARAT', 'n'),
(8202, 82, 'KAB. HALMAHERA TENGAH', 'n'),
(8203, 82, 'KAB. HALMAHERA UTARA', 'n'),
(8204, 82, 'KAB. HALMAHERA SELATAN', 'n'),
(8205, 82, 'KAB. KEPULAUAN SULA', 'n'),
(8206, 82, 'KAB. HALMAHERA TIMUR', 'n'),
(8207, 82, 'KAB. PULAU MOROTAI', 'n'),
(8208, 82, 'KAB. PULAU TALIABU', 'n'),
(8271, 82, 'KOTA TERNATE', 'n'),
(8272, 82, 'KOTA TIDORE KEPULAUAN', 'n'),
(9103, 91, 'KAB. JAYAPURA', 'n'),
(9105, 91, 'KAB. KEPULAUAN YAPEN', 'n'),
(9106, 91, 'KAB. BIAK NUMFOR', 'n'),
(9110, 91, 'KAB. SARMI', 'n'),
(9111, 91, 'KAB. KEEROM', 'n'),
(9115, 91, 'KAB. WAROPEN', 'n'),
(9119, 91, 'KAB. SUPIORI', 'n'),
(9120, 91, 'KAB. MAMBERAMO RAYA', 'n'),
(9171, 91, 'KOTA JAYAPURA', 'n'),
(9201, 92, 'KAB. SORONG', 'n'),
(9202, 92, 'KAB. MANOKWARI', 'n'),
(9203, 92, 'KAB. FAK FAK', 'n'),
(9204, 92, 'KAB. SORONG SELATAN', 'n'),
(9205, 92, 'KAB. RAJA AMPAT', 'n'),
(9206, 92, 'KAB. TELUK BINTUNI', 'n'),
(9207, 92, 'KAB. TELUK WONDAMA', 'n'),
(9208, 92, 'KAB. KAIMANA', 'n'),
(9209, 92, 'KAB. TAMBRAUW', 'n'),
(9210, 92, 'KAB. MAYBRAT', 'n'),
(9211, 92, 'KAB. MANOKWARI SELATAN', 'n'),
(9212, 92, 'KAB. PEGUNUNGAN ARFAK', 'n'),
(9271, 92, 'KOTA SORONG', 'n'),
(9301, 93, 'KAB. MERAUKE', 'n'),
(9302, 93, 'KAB. BOVEN DIGOEL', 'n'),
(9303, 93, 'KAB. MAPPI', 'n'),
(9304, 93, 'KAB. ASMAT', 'n'),
(9401, 94, 'KAB. NABIRE', 'n'),
(9402, 94, 'KAB. PUNCAK JAYA', 'n'),
(9403, 94, 'KAB. PANIAI', 'n'),
(9404, 94, 'KAB. MIMIKA', 'n'),
(9405, 94, 'KAB. PUNCAK', 'n'),
(9406, 94, 'KAB. DOGIYAI', 'n'),
(9407, 94, 'KAB. INTAN JAYA', 'n'),
(9408, 94, 'KAB. DEIYAI', 'n'),
(9501, 95, 'KAB. JAYAWIJAYA', 'n'),
(9502, 95, 'KAB. PEGUNUNGAN BINTANG', 'n'),
(9503, 95, 'KAB. YAHUKIMO', 'n'),
(9504, 95, 'KAB. TOLIKARA', 'n'),
(9505, 95, 'KAB. MAMBERAMO TENGAH', 'n'),
(9506, 95, 'KAB. YALIMO', 'n'),
(9507, 95, 'KAB. LANNY JAYA', 'n'),
(9508, 95, 'KAB. NDUGA', 'n');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `_setting`
--

INSERT INTO `_setting` (`setting_id`, `meta_title`, `meta_description`, `meta_keywords`, `header_lg`, `header_sm`, `m_1`, `m_2`, `m_3`, `alamat`, `cs_phone`, `cs_fb`, `cs_twitter`, `cs_instagram`, `cs_email`, `cs_youtube`, `about`, `footer_text`, `footer_copyright`) VALUES
(1, 'Nama Website', 'Temukan berbagai destinasi wisata terbaik di seluruh Indonesia. Dapatkan informasi lengkap mulai dari lokasi, harga tiket, hingga ulasan pengunjung. Rencanakan liburan impianmu sekarang!', 'wisata Indonesia, tempat wisata, destinasi wisata, liburan, tiket wisata, rekomendasi wisata, wisata alam, wisata keluarga, wisata murah, peta wisata, ulasan wisata', 'Mau liburan?', 'Cari tahu dulu tempat wisata yang pas buat kamu disini!', 'Semua informasi ada di sini!', 'Sebelum memutuskan liburan ke mana, yuk cari tahu dulu informasi lengkap tentang tempat wisata yang ingin kalian kunjungi di sini!', 'Mulai mencari destinasi...', 'Jika ada informasi yang belum jelas atau Anda membutuhkan bantuan, silakan hubungi tim kami melalui kontak yang tersedia.', '62 856 7354 414', '#', '#', '#', 'cgustiya@gmail.com', '#', '<p class=\"\" data-start=\"122\" data-end=\"476\">Selamat datang di website kami, sebuah platform digital yang dirancang khusus untuk menjadi panduan lengkap dalam menjelajahi destinasi wisata di seluruh Indonesia. Kami hadir untuk memberikan kemudahan bagi siapa pun yang ingin merencanakan perjalanan, mencari referensi liburan, atau sekadar menambah wawasan tentang tempat-tempat menarik di Nusantara.</p>\r\n<p class=\"\" data-start=\"478\" data-end=\"829\">Melalui situs ini, kamu bisa menemukan berbagai informasi penting mengenai tempat wisata &ndash; mulai dari deskripsi destinasi, alamat lengkap, harga tiket masuk, jam operasional, galeri foto, hingga ulasan langsung dari para pengunjung. Semua data kami sajikan seakurat mungkin agar dapat menjadi sumber terpercaya sebelum kamu memutuskan untuk berwisata.</p>\r\n<p class=\"\" data-start=\"831\" data-end=\"1109\">Tidak hanya itu, kami juga menyediakan fitur pencarian cerdas yang memudahkan pengguna dalam menemukan tempat wisata berdasarkan kategori, lokasi, atau kata kunci tertentu. Dengan begitu, kamu bisa menemukan tempat wisata yang paling sesuai dengan minat, waktu, dan budget kamu.</p>\r\n<p class=\"\" data-start=\"1111\" data-end=\"1402\">Kami percaya bahwa Indonesia memiliki kekayaan alam dan budaya yang luar biasa, dan melalui website ini kami ingin ikut serta dalam mempromosikan keindahan tersebut ke masyarakat luas. Harapan kami, setiap orang bisa mendapatkan pengalaman wisata yang menyenangkan, informatif, dan berkesan.</p>\r\n<p class=\"\" data-start=\"1404\" data-end=\"1530\">Terima kasih telah menggunakan layanan kami. Yuk, mulai petualanganmu bersama kami dan temukan tempat wisata impianmu di sini!</p>', 'Website ini merupakan platform pencarian wisata yang menyediakan informasi lengkap tentang destinasi wisata di seluruh Indonesia, mulai dari deskripsi, lokasi, harga tiket, fasilitas, foto, hingga ulasan pengunjung.  Jelajahi berbagai pilihan wisata menarik dengan mudah dan rencanakan liburan impian Anda hanya di sini.', 'Copyright © 2025. All Rights Reserved.');

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
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `m_wisata`
--
ALTER TABLE `m_wisata`
  MODIFY `wisata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `m_wisata_foto`
--
ALTER TABLE `m_wisata_foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `reg_provinces`
--
ALTER TABLE `reg_provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `reg_regencies`
--
ALTER TABLE `reg_regencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9509;

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
