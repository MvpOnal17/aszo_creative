-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2025 pada 08.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aszo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_features`
--

CREATE TABLE `about_features` (
  `id` int(11) NOT NULL,
  `about_section_id` int(11) DEFAULT NULL,
  `feature_text` varchar(255) DEFAULT NULL,
  `column_position` enum('left','right') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_features`
--

INSERT INTO `about_features` (`id`, `about_section_id`, `feature_text`, `column_position`, `created_at`, `updated_at`) VALUES
(1, 2, 'Fitur Desain responsif dan modern', 'left', '2025-04-30 03:15:55', '2025-04-30 03:25:19'),
(2, 2, 'Website custom sesuai kebutuhan', 'left', '2025-04-30 03:25:30', '2025-04-30 03:25:30'),
(3, 2, 'Proses pengerjaan cepat dan transparan', 'left', '2025-04-30 03:25:42', '2025-04-30 03:25:42'),
(4, 2, 'Konsultasi gratis sebelum memulai', 'left', '2025-04-30 03:25:49', '2025-04-30 03:25:49'),
(5, 2, 'Fitur Support maintenance setelah website selesai', 'right', '2025-04-30 03:26:06', '2025-04-30 03:26:06'),
(6, 2, 'SEO dasar untuk membantu tampil di pencarian Google', 'right', '2025-04-30 03:26:15', '2025-04-30 03:26:15'),
(7, 2, 'Website aman dan mudah dikelola', 'right', '2025-04-30 03:26:22', '2025-04-30 03:26:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_section`
--

CREATE TABLE `about_section` (
  `id` int(11) NOT NULL,
  `about_meta` varchar(100) DEFAULT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_description` text DEFAULT NULL,
  `experience_years` varchar(50) DEFAULT NULL,
  `experience_text` varchar(255) DEFAULT NULL,
  `profile_name` varchar(100) DEFAULT NULL,
  `profile_position` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `contact_label` varchar(100) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `image_main_path` varchar(255) DEFAULT NULL,
  `image_secondary_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_section`
--

INSERT INTO `about_section` (`id`, `about_meta`, `about_title`, `about_description`, `experience_years`, `experience_text`, `profile_name`, `profile_position`, `profile_image`, `contact_label`, `contact_number`, `image_main_path`, `image_secondary_path`, `created_at`, `updated_at`) VALUES
(2, 'Tentang Kami', ' ASZO Creative', 'ASZO Creative adalah tim web developer muda asal Manado yang berdedikasi untuk membantu UMKM, instansi, dan personal brand membangun kehadiran digital yang kuat dan profesional. Kami hadir dengan solusi desain modern, responsif, dan efisien untuk mendukung perkembangan bisnismu di era digital.', '4', 'Tahun pengalaman membangun solusi digital untuk klien lokal dan nasional', 'Aszo Creative', 'CEO & Founder', 'uploads/about/1745975980_profile_avatar-1.webp', 'Hubungi Kami', '+62 821-9622-5571', 'uploads/about/1745975980_main_about-5.webp', 'uploads/about/1745975980_second_about-2.webp', '2025-04-30 03:13:27', '2025-04-30 03:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client_logos`
--

CREATE TABLE `client_logos` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `client_logos`
--

INSERT INTO `client_logos` (`id`, `image_path`, `alt_text`, `created_at`, `updated_at`) VALUES
(3, 'uploads/client_logo/1745982890_aszo.png', NULL, '2025-04-30 05:12:21', '2025-04-30 05:14:50'),
(4, 'uploads/client_logo/1745982897_aszo.png', NULL, '2025-04-30 05:14:57', '2025-04-30 05:14:57'),
(5, 'uploads/client_logo/1745982906_aszo.png', NULL, '2025-04-30 05:15:06', '2025-04-30 05:15:06'),
(6, 'uploads/client_logo/1745982911_aszo.png', NULL, '2025-04-30 05:15:11', '2025-04-30 05:15:11'),
(7, 'uploads/client_logo/1745982916_aszo.png', NULL, '2025-04-30 05:15:16', '2025-04-30 05:15:16'),
(8, 'uploads/client_logo/1745982921_aszo.png', NULL, '2025-04-30 05:15:21', '2025-04-30 05:15:21'),
(9, 'uploads/client_logo/1745982927_aszo.png', NULL, '2025-04-30 05:15:27', '2025-04-30 05:15:27'),
(10, 'uploads/client_logo/1745982932_aszo.png', NULL, '2025-04-30 05:15:32', '2025-04-30 05:15:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_description` text DEFAULT NULL,
  `location_title` varchar(100) NOT NULL,
  `location_line1` varchar(255) DEFAULT NULL,
  `location_line2` varchar(255) DEFAULT NULL,
  `phone_title` varchar(100) NOT NULL,
  `phone_number1` varchar(50) DEFAULT NULL,
  `phone_number2` varchar(50) DEFAULT NULL,
  `email_title` varchar(100) NOT NULL,
  `email_address1` varchar(100) DEFAULT NULL,
  `email_address2` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact_info`
--

INSERT INTO `contact_info` (`id`, `section_title`, `section_description`, `location_title`, `location_line1`, `location_line2`, `phone_title`, `phone_number1`, `phone_number2`, `email_title`, `email_address1`, `email_address2`, `created_at`, `updated_at`) VALUES
(2, 'ASZO Creative', 'Jika Anda memiliki pertanyaan atau ingin menghubungi kami, silakan gunakan informasi kontak berikut atau kirim pesan langsung melalui formulir.', 'Our Location', 'Manado', 'Tondano', 'Telepon', '082196225571', '08219622551', 'Email Us', 'aszocreative@gmail.com', 'aszocreative@gmail.com', '2025-04-30 14:03:40', '2025-04-30 14:07:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home_awards`
--

CREATE TABLE `home_awards` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `home_awards`
--

INSERT INTO `home_awards` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '3x Won Awards', 'Prestasi dalam inovasi digital', '2025-04-30 08:39:58', '2025-04-30 08:39:58'),
(2, '6.5k Proyek Selesai', 'Menjangkau berbagai sektor', '2025-04-30 08:39:58', '2025-04-30 08:39:58'),
(3, '80k Trafik Naik', 'Optimasi visibilitas online', '2025-04-30 08:39:58', '2025-04-30 08:39:58'),
(4, '20k+ Client', 'Dipercaya UMKM dan Instansi', '2025-04-30 08:39:58', '2025-04-30 08:48:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home_section`
--

CREATE TABLE `home_section` (
  `id` int(11) NOT NULL,
  `company_badge` varchar(255) DEFAULT NULL,
  `title_line1` varchar(255) DEFAULT NULL,
  `title_line2` varchar(255) DEFAULT NULL,
  `title_highlight` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `btn_start_text` varchar(100) DEFAULT NULL,
  `btn_start_link` varchar(255) DEFAULT NULL,
  `btn_video_text` varchar(100) DEFAULT NULL,
  `btn_video_link` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `home_section`
--

INSERT INTO `home_section` (`id`, `company_badge`, `title_line1`, `title_line2`, `title_highlight`, `description`, `btn_start_text`, `btn_start_link`, `btn_video_text`, `btn_video_link`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'Bekerjalah Sampai Anda Sukses', 'Kami Bangun Digitalisasi', 'Untuk Instansi, UMKM & Bisnismu Bersama', 'ASZO Creative', 'Jasa Pembuatan Website profesional, modern, dan responsif. Tingkatkan visibilitas dan efisiensional melalui solusi digital creative', 'Get Started', '#', 'Play Video', 'https://www.youtube.com/watch?v=G3GfwjtQx5Y&t=71s', 'uploads/home_picture/1745973244_illustration-1.webp', '2025-04-29 18:23:49', '2025-04-29 18:34:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `our_team`
--

CREATE TABLE `our_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `our_team`
--

INSERT INTO `our_team` (`id`, `name`, `role`, `description`, `image_path`, `facebook_link`, `twitter_link`, `instagram_link`, `created_at`, `updated_at`) VALUES
(2, 'I Wayan Suardi', 'Frontend', 'Pengembang frontend yang ahli membangun antarmuka web modern, responsif, dan user-friendly.', 'uploads/team/1745991499_suardi.jpg', 'as', 'as', 'as', '2025-04-30 13:38:19', '2025-04-30 13:38:19'),
(3, 'Andreas Lampah ', 'Fullstack', 'Seorang developer serba bisa yang menguasai pengembangan frontend dan backend. Berpengalaman membangun sistem web modern yang efisien dan terstruktur.', 'uploads/team/1745995243_andreas.jpg', 'as', 'as', 'as', '2025-04-30 14:40:43', '2025-04-30 14:43:00'),
(4, 'Zidan', 'Full Stack, Desain Grafis', 'Memiliki kemampuan dalam pengembangan sistem end-to-end serta desain visual yang kuat. Sering berperan dalam membangun arsitektur sistem sekaligus visual branding.', 'uploads/team/1746077238_zidan.jpg', 'asa', 'sa', 'saas', '2025-05-01 13:27:18', '2025-05-01 13:27:18'),
(5, 'MvpOnal', 'Frontend, UI/UX, Design Graphic', 'Menggabungkan keahlian desain UI/UX dan frontend development untuk menciptakan pengalaman pengguna yang menarik dan intuitif. Terampil juga dalam desain grafis visual.', 'uploads/team/1746077273_WhatsApp Image 2025-04-27 at 21.08.14_873b51dc.jpg', 'sa', 'a', 'sasa', '2025-05-01 13:27:53', '2025-05-01 13:27:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `studi_kasus`
--

CREATE TABLE `studi_kasus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `date_display` varchar(100) NOT NULL,
  `modal_title` varchar(255) NOT NULL,
  `modal_image_path` varchar(255) NOT NULL,
  `modal_description_1` text NOT NULL,
  `modal_description_2` text NOT NULL,
  `modal_description_3` text NOT NULL,
  `modal_icon_1` varchar(100) NOT NULL,
  `modal_icon_2` varchar(100) NOT NULL,
  `modal_icon_3` varchar(100) NOT NULL,
  `modal_cta_text` varchar(255) NOT NULL,
  `modal_cta_link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `studi_kasus`
--

INSERT INTO `studi_kasus` (`id`, `title`, `description`, `thumbnail_path`, `date_display`, `modal_title`, `modal_image_path`, `modal_description_1`, `modal_description_2`, `modal_description_3`, `modal_icon_1`, `modal_icon_2`, `modal_icon_3`, `modal_cta_text`, `modal_cta_link`, `created_at`, `updated_at`) VALUES
(1, 'PINDAI - Pintu Dokumentasi & Informasi BBPOM Manado', 'Sebuah platform digital untuk publikasi kegiatan dan laporan BBPOM Manado secara transparan dan realtime.', 'uploads/studi_kasus/1745988684_thumb_pindaifull.jpg', 'Senin, 29 April 2025', 'PINTU Dokumentasi & Informasi (PINDAI) BBPOM Manado', 'uploads/studi_kasus/1745988684_modal_pindaifull.jpg', 'Masyarakat dapat langsung mengakses laporan dan informasi BBPOM Manado secara instan tanpa menunggu publikasi manual.', 'Dokumen, data, dan pengumuman terpusat dalam satu platform untuk mempermudah pencarian dan kerja internal maupun eksternal.', 'Mengganti sistem konvensional menjadi platform digital, mengurangi beban administrasi dan meningkatkan akurasi dokumentasi.', 'fas fa-bullhorn', 'fas fa-chart-line', 'fas fa-digital-tachograph', 'Kunjungi Pindai', 'https://pindai.bpommanado.id/', '2025-04-30 12:51:24', '2025-04-30 12:56:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `heading`, `description`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(2, 'Visi dan Misi', 'Misi kami adalah menyediakan solusi web development yang kreatif, efisien, dan terjangkau. Mendorong lebih banyak UMKM dan bisnis lokal untuk digitalisasi. Terus berkembang bersama klien kami dalam membangun ekosistem digital yang kuat di Manado dan sekitarnya. Visi kami adalah menjadi agensi digital terpercaya di Sulawesi Utara yang memberdayakan bisnis lokal untuk beradaptasi dan bersinar di dunia digital.', 'Scroll Down', '#testimonials', '2025-04-30 04:40:40', '2025-04-30 04:45:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `what_you_get`
--

CREATE TABLE `what_you_get` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `position` enum('left','right') DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `what_you_get`
--

INSERT INTO `what_you_get` (`id`, `title`, `description`, `position`, `image_path`, `created_at`, `updated_at`) VALUES
(3, 'Use On Any Device', 'Website yang kami buat responsif dan optimal di semua perangkat, baik desktop, tablet, maupun smartphone.', 'left', NULL, '2025-04-30 10:31:32', '2025-04-30 10:31:32'),
(4, 'Feather Icons', 'Desain modern dengan ikon ringan dan elegan untuk memberikan tampilan visual yang profesional.', 'left', NULL, '2025-04-30 10:31:32', '2025-04-30 10:31:32'),
(5, 'Retina Ready', 'Tampilan tajam dan jernih di layar resolusi tinggi seperti Retina Display, cocok untuk semua perangkat terbaru.', 'left', NULL, '2025-04-30 10:31:32', '2025-04-30 10:31:32'),
(6, 'W3c Valid Code', 'Menggunakan standar W3C untuk memastikan website Anda memiliki struktur kode yang bersih dan ramah mesin pencari.', 'right', NULL, '2025-04-30 10:31:32', '2025-04-30 10:31:32'),
(7, 'Fully Responsive', 'Setiap elemen website menyesuaikan dengan ukuran layar pengguna, meningkatkan kenyamanan dan pengalaman pengunjung.', 'right', NULL, '2025-04-30 10:31:32', '2025-04-30 10:31:32'),
(8, 'Browser Compatibility', 'Website kompatibel dengan berbagai browser populer seperti Chrome, Firefox, Safari, dan Edge.', 'right', NULL, '2025-04-30 10:31:32', '2025-04-30 10:31:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `what_you_get_image`
--

CREATE TABLE `what_you_get_image` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `what_you_get_image`
--

INSERT INTO `what_you_get_image` (`id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'uploads/what_you_get/1745980001_phone-app-screen.webp', '2025-04-30 04:26:41', '2025-04-30 04:26:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_features`
--
ALTER TABLE `about_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_section_id` (`about_section_id`);

--
-- Indeks untuk tabel `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home_awards`
--
ALTER TABLE `home_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home_section`
--
ALTER TABLE `home_section`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `studi_kasus`
--
ALTER TABLE `studi_kasus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `what_you_get`
--
ALTER TABLE `what_you_get`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `what_you_get_image`
--
ALTER TABLE `what_you_get_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_features`
--
ALTER TABLE `about_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `home_awards`
--
ALTER TABLE `home_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `home_section`
--
ALTER TABLE `home_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `studi_kasus`
--
ALTER TABLE `studi_kasus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `what_you_get`
--
ALTER TABLE `what_you_get`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `what_you_get_image`
--
ALTER TABLE `what_you_get_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `about_features`
--
ALTER TABLE `about_features`
  ADD CONSTRAINT `about_features_ibfk_1` FOREIGN KEY (`about_section_id`) REFERENCES `about_section` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
