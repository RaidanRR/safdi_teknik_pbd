-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 07:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_customer`
--

CREATE TABLE `barang_customer` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barang_customer`
--

INSERT INTO `barang_customer` (`kode_barang`, `nama_barang`, `created_at`, `updated_at`) VALUES
('14', 'Laptop i5-gen12', '2024-06-13 16:12:16', '2024-06-13 16:12:29'),
('ka23', 'kipas angin', '2022-12-11 14:53:21', '2022-12-11 14:53:21'),
('kl42', 'kulkas', '2024-06-13 16:55:13', '2024-06-13 16:55:13'),
('mc223', 'mesin cuci', '2022-12-11 14:53:00', '2022-12-11 14:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(35, 'Quinn', '23853', 'Depok', '2022-12-11 14:52:25', '2024-06-13 16:58:28'),
(46, 'Bernie', '77687', 'Tangerang', '2024-06-13 16:54:30', '2024-06-13 16:54:30'),
(62, 'Laura', '513413', 'Jogjakarta', '2024-06-13 16:11:58', '2024-06-13 16:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengecekan_barang`
--

CREATE TABLE `detail_pengecekan_barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_pengecekan` int(10) UNSIGNED NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `keluhan_barang` text NOT NULL,
  `jumlah` int(3) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `detail_pengecekan_barang`
--

INSERT INTO `detail_pengecekan_barang` (`id`, `kode_pengecekan`, `kode_barang`, `keluhan_barang`, `jumlah`, `created_at`, `updated_at`) VALUES
(4, 61, '14', 'layar rusak', 2, '2024-06-13 16:13:16', '2024-06-13 16:13:16'),
(5, 325, '14', 'layar rusak', 1, '2024-06-13 16:47:42', '2024-06-13 16:47:42'),
(7, 421, 'kl42', 'tidak mendingin', 1, '2024-06-13 16:55:50', '2024-06-13 16:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(179, '2022-12-01-052148', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1670744523, 1),
(180, '2022-12-01-052215', 'App\\Database\\Migrations\\Pengecekan', 'default', 'App', 1670744523, 1),
(181, '2022-12-02-020209', 'App\\Database\\Migrations\\BarangCustomer', 'default', 'App', 1670744523, 1),
(182, '2022-12-02-021225', 'App\\Database\\Migrations\\Teknisi', 'default', 'App', 1670744523, 1),
(183, '2022-12-02-021543', 'App\\Database\\Migrations\\DetailPengecekanBarang', 'default', 'App', 1670744523, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan`
--

CREATE TABLE `pengecekan` (
  `kode_pengecekan` int(10) UNSIGNED NOT NULL,
  `id_teknisi` int(10) UNSIGNED NOT NULL,
  `harga_perbaikan` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `deskripsi_pengecekan` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pengecekan`
--

INSERT INTO `pengecekan` (`kode_pengecekan`, `id_teknisi`, `harga_perbaikan`, `id_customer`, `deskripsi_pengecekan`, `tanggal`, `created_at`, `updated_at`) VALUES
(61, 121, 2250001, 62, 'ganti layar LCD', '2024-06-13 16:34:41', '2024-06-13 16:34:41', '2024-06-13 16:34:41'),
(325, 121, 0, 35, '', '2024-06-13 16:47:29', '2024-06-13 16:47:29', '2024-06-13 16:47:29'),
(421, 121, 0, 46, '', '2024-06-13 16:55:28', '2024-06-13 16:55:28', '2024-06-13 16:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(113, 'Layton', 'Bekasi', '1513349', '2024-06-13 16:57:38', '2024-06-13 16:57:38'),
(121, 'Andrew', 'Jakarta', '324761', '2024-06-13 16:11:20', '2024-06-13 16:59:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_customer`
--
ALTER TABLE `barang_customer`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_pengecekan_barang`
--
ALTER TABLE `detail_pengecekan_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_pengecekan` (`kode_pengecekan`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD PRIMARY KEY (`kode_pengecekan`),
  ADD KEY `id_teknisi` (`id_teknisi`) USING BTREE,
  ADD KEY `id_customer` (`id_customer`) USING BTREE;

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengecekan_barang`
--
ALTER TABLE `detail_pengecekan_barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengecekan_barang`
--
ALTER TABLE `detail_pengecekan_barang`
  ADD CONSTRAINT `detail_pengecekan_barang_ibfk_1` FOREIGN KEY (`kode_pengecekan`) REFERENCES `pengecekan` (`kode_pengecekan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengecekan_barang_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang_customer` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD CONSTRAINT `pengecekan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengecekan_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `teknisi` (`id_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
