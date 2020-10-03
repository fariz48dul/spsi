-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 03:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `deskripsi`, `image`, `created_at`, `updated_at`, `delete_at`) VALUES
(3, 'sfdsrfd12', 'dsffds', 'sfdsrfd123.png', '2020-09-28 09:04:06', '2020-09-28 02:04:06', NULL),
(4, 'sdfsdf', 'tyeryer', 'sdfsdf.png', '2020-09-28 09:01:48', '2020-09-28 02:01:48', NULL),
(7, 'regefd', '23423tdsefwse', 'regefd.png', '2020-09-28 09:01:56', '2020-09-28 02:01:56', NULL),
(8, 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaa.png', '2020-09-28 03:33:31', '2020-09-28 03:33:31', NULL),
(9, 'vcvvc', 'cccccccccccccc', 'vcvvc.png', '2020-09-28 03:34:46', '2020-09-28 03:34:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `title`, `deskripsi`, `image`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'Kumpul', 'Bahasaq', 'kumpul.png', '2020-09-28 03:30:45', '2020-09-28 03:30:45', NULL),
(2, 'nanan', 'kfkggjkwes', 'nanan.png', '2020-09-28 03:31:56', '2020-09-28 03:31:56', NULL),
(3, 'wdsaa2221', 'xcsdfs', 'wdsaa22213.png', '2020-09-28 10:39:30', '2020-09-28 03:39:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'admin'),
(2, 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `nama`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Slamet', 'Direktur', '2020-10-03 06:19:19', '2020-10-03 06:19:19'),
(2, 'Yanti', 'Wakil Direktur', '2020-10-03 06:19:58', '2020-10-03 06:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `id_level` int(11) NOT NULL,
  `nik` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plant` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bagian` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum diproses','aktif','tidak aktif') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_level`, `nik`, `plant`, `bagian`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `status`) VALUES
(3, 'viky yahyaaaaaa', 'vikyyahya.id@gmail.com', NULL, '$2y$10$wXjyTSxy56T6tvE7KDC2MODny.dfNsPBQ2njlGzvXc9DGvEIiL.Xi', NULL, '2020-08-22 23:50:33', '2020-09-26 23:19:38', 1, '278161281792', 'A', 'Cutting', 'Jakarta', '2019-10-31 17:00:00', 'laki-laki', 'Islam', 'Pasar rabu jakarta timur', 'belum diproses'),
(5, 'Si fulana', 'email@gmail.com', NULL, '$2y$10$/MvX3c0r15s4C.ezqM0EtOiPjXZyN/yuGTLsA4ORf8ELlhuVzJfCC', NULL, '2020-09-27 00:06:38', '2020-09-30 00:07:46', 2, '73472388273', 'B', 'cutting', 'Jakarta', '2020-09-26 17:00:00', 'laki-laki', 'Islam', 'Tangerang', 'belum diproses'),
(6, 'viky yahya', 'viky@lenna.ai', NULL, '$2y$10$V0bgnG4yqC.Y0dKdN0KyreJUi5gPikGT3HMuD1p0bNXf1v/6fpozi', NULL, '2020-09-27 00:07:41', '2020-09-27 00:07:41', 2, '734723882732', 'B', 'cutting', 'Jakarta', '2020-09-26 17:00:00', 'laki-laki', 'Islam', 'Tangerang', 'belum diproses'),
(7, 'ZeroNUll', 'zeronull@gmail.com', NULL, '$2y$10$g.BXgaxnlBaNPNuNwIw83O0BbCL0fFrle.r8hdyTY7uhPMSbURf6i', NULL, '2020-09-27 20:12:44', '2020-09-27 20:12:44', 1, NULL, NULL, NULL, NULL, '2020-10-01 13:16:42', NULL, NULL, NULL, NULL),
(9, 'Fariza Adbul Ihsan', 'fai@gmail.com', NULL, '$2y$10$bmtXMsJtgN1yLJSUhJRjjO333KLxkULeAs92oJk0p9dWAvH.h/x12', NULL, '2020-10-03 06:08:48', '2020-10-03 06:08:48', 1, NULL, NULL, NULL, NULL, '1996-12-27 17:00:00', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
