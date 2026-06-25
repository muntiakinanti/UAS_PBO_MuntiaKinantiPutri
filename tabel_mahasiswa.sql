-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 08:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1d_muntiakinantiputri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(10,2) NOT NULL,
  `jenis_pembiayaan` enum('mandiri','bidikmisi','prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(30) DEFAULT NULL,
  `dana_saku_subsidi` decimal(10,2) DEFAULT NULL,
  `nama_instalasi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembiayaan`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instalasi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Muntia Kinanti Putri', '250102001', 2, '4500000.00', 'mandiri', 'Golongan 4', 'Supriyanto', NULL, NULL, NULL, NULL),
(2, 'Rafi Ahmad Fauzi', '250102002', 2, '5000000.00', 'mandiri', 'Golongan 5', 'Hendra Wijaya', NULL, NULL, NULL, NULL),
(3, 'Anisa Rahmawati', '250102003', 4, '4000000.00', 'mandiri', 'Golongan 3', 'Agus Susanto', NULL, NULL, NULL, NULL),
(4, 'Bagas Dwi Saputra', '250102004', 2, '4500000.00', 'mandiri', 'Golongan 4', 'Rudi Hermawan', NULL, NULL, NULL, NULL),
(5, 'Citra Lestari', '250102005', 6, '5500000.00', 'mandiri', 'Golongan 5', 'Bambang Utomo', NULL, NULL, NULL, NULL),
(6, 'Dimas Arya Putra', '250102006', 4, '4000000.00', 'mandiri', 'Golongan 3', 'Joko Widodo', NULL, NULL, NULL, NULL),
(7, 'Eka Nurhayati', '250102007', 2, '4500000.00', 'mandiri', 'Golongan 4', 'Slamet Riyadi', NULL, NULL, NULL, NULL),
(8, 'Fajar Ramadhan', '250102008', 2, '0.00', 'bidikmisi', NULL, NULL, 'KIPK-2025-0012', '700000.00', NULL, NULL),
(9, 'Gita Permatasari', '250102009', 2, '0.00', 'bidikmisi', NULL, NULL, 'KIPK-2025-0045', '700000.00', NULL, NULL),
(10, 'Hendra Wijaya', '250102010', 4, '0.00', 'bidikmisi', NULL, NULL, 'KIPK-2024-0089', '750000.00', NULL, NULL),
(11, 'Indah cahaya', '250102011', 2, '0.00', 'bidikmisi', NULL, NULL, 'KIPK-2025-0101', '700000.00', NULL, NULL),
(12, 'Kevin Sanjaya', '250102012', 6, '0.00', 'bidikmisi', NULL, NULL, 'KIPK-2023-0312', '800000.00', NULL, NULL),
(13, 'Larasati Putri', '250102013', 4, '0.00', 'bidikmisi', NULL, NULL, 'KIPK-2024-0521', '750000.00', NULL, NULL),
(14, 'Muhammad risky', '250102014', 2, '0.00', 'bidikmisi', NULL, NULL, 'KIPK-2025-0741', '700000.00', NULL, NULL),
(15, 'Nabila Islami', '250102015', 2, '1500000.00', 'prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', '3.50'),
(16, 'Oki pratama', '250102016', 4, '2000000.00', 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', '3.25'),
(17, 'Putri Ayu Lestari', '250102017', 2, '1000000.00', 'prestasi', NULL, NULL, NULL, NULL, 'Yayasan Toyota Astra', '3.30'),
(18, 'Rian Hidayat', '250102018', 6, '0.00', 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Unggulan Kemendikbud', '3.75'),
(19, 'Siti Aminah', '250102019', 2, '1500000.00', 'prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', '3.50'),
(20, 'Taufik Hidayat', '250102020', 4, '2000000.00', 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', '3.25'),
(21, 'Yekti Apriana', '250102021', 2, '1200000.00', 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Pemprov Jateng', '3.40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `uk_nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
