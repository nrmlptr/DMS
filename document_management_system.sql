-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2023 pada 03.47
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `document_management_system_before`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_sop` int(11) NOT NULL,
  `kd_sop` varchar(255) NOT NULL,
  `no_sop` varchar(255) NOT NULL,
  `judul_sop` varchar(255) NOT NULL,
  `nm_sop` varchar(255) NOT NULL,
  `keterangan_sop` varchar(255) NOT NULL,
  `tipe_sop` varchar(100) NOT NULL,
  `ukuran_sop` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_auditk3l`
--

CREATE TABLE `berkas_auditk3l` (
  `id_auditk3l` int(11) NOT NULL,
  `kd_berkas_auditk3l` varchar(255) NOT NULL,
  `no_berkas_auditk3l` varchar(255) NOT NULL,
  `judul_berkas_auditk3l` varchar(255) NOT NULL,
  `nm_berkas_auditk3l` varchar(255) NOT NULL,
  `keterangan_berkas_auditk3l` varchar(255) NOT NULL,
  `tipe_berkas_auditk3l` varchar(100) NOT NULL,
  `ukuran_berkas_auditk3l` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_iad`
--

CREATE TABLE `berkas_iad` (
  `id_iad` int(11) NOT NULL,
  `kd_berkas_iad` varchar(255) NOT NULL,
  `no_berkas_iad` varchar(255) NOT NULL,
  `judul_berkas_iad` varchar(255) NOT NULL,
  `nm_berkas_iad` varchar(255) NOT NULL,
  `keterangan_berkas_iad` varchar(255) NOT NULL,
  `tipe_berkas_iad` varchar(100) NOT NULL,
  `ukuran_berkas_iad` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_msds`
--

CREATE TABLE `berkas_msds` (
  `id_msds` int(11) NOT NULL,
  `kd_berkas_msds` varchar(255) NOT NULL,
  `no_berkas_msds` varchar(255) NOT NULL,
  `judul_berkas_msds` varchar(255) NOT NULL,
  `nm_berkas_msds` varchar(255) NOT NULL,
  `keterangan_berkas_msds` varchar(255) NOT NULL,
  `tipe_berkas_msds` varchar(100) NOT NULL,
  `ukuran_berkas_msds` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `nama_alat` varchar(90) NOT NULL,
  `pabrik_pembuat` varchar(60) NOT NULL,
  `kapasitas` varchar(30) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `no_seri` varchar(20) NOT NULL,
  `no_perijinan` varchar(20) NOT NULL,
  `expired_date` date NOT NULL,
  `status` enum('active','processing','expired','') NOT NULL,
  `filename` varchar(90) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `document_lisensi`
--

CREATE TABLE `document_lisensi` (
  `id_document_lisensi` int(11) NOT NULL,
  `jenis_lisensi` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `seksi` varchar(255) NOT NULL,
  `npk` varchar(50) NOT NULL,
  `no_sio` varchar(255) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` enum('active','processing','expired','') NOT NULL,
  `filename` varchar(90) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `kd_form` varchar(255) NOT NULL,
  `no_form` varchar(255) NOT NULL,
  `judul_form` varchar(255) NOT NULL,
  `nm_form` varchar(255) NOT NULL,
  `keterangan_form` varchar(255) NOT NULL,
  `tipe_form` varchar(100) NOT NULL,
  `ukuran_form` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ik`
--

CREATE TABLE `ik` (
  `id_ik` int(11) NOT NULL,
  `kd_ik` varchar(255) NOT NULL,
  `no_ik` varchar(255) NOT NULL,
  `judul_ik` varchar(255) NOT NULL,
  `nm_ik` varchar(255) NOT NULL,
  `keterangan_ik` varchar(255) NOT NULL,
  `tipe_ik` varchar(100) NOT NULL,
  `ukuran_ik` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nm_karyawan` varchar(255) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `seksi` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nm_karyawan`, `divisi`, `department`, `seksi`, `bagian`, `created_at`, `updated_at`) VALUES
(1, '412', 'MULAZIM', 'PLANT', 'PRODUCTION 1', 'PASTING & FORMATION', 'KASIE', '2023-05-23 03:06:20', NULL),
(2, '485', 'NYONO', 'ADMINISTRATION', 'PROCUREMENT', 'COMPONENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(3, '517', 'MUJIONO', 'ADMINISTRATION', 'GA, IR & CSR', 'GA & SECURITY', 'KASIE', '2023-05-23 03:06:20', NULL),
(4, '563', 'SUUBI', 'PLANT', 'PPIC ', 'INV CONTROL FINISHED GOODS & DELIVERY', 'KASIE', '2023-05-23 03:06:20', NULL),
(5, '1095', 'CIPTADI NUGROHO', 'PLANT', 'PPIC ', 'PRODUCTION PLANNING CONTROL & INV CONTROL WIP', 'KASIE', '2023-05-23 03:06:20', NULL),
(6, '1257', 'RENDI WIDI NUGROHO', 'FIN, ACC, MARK & MIS', 'MARKETING', 'MARKETING', 'KASIE', '2023-05-23 03:06:20', NULL),
(7, '1361', 'AGNES RETNONING ASTUTI', 'FIN, ACC, MARK & MIS', 'FIN, ACC  & RISK MGT CONT', 'FINANCE, TREASURY & COSTING', 'KASIE', '2023-05-23 03:06:20', NULL),
(8, '1391', 'ETIKA AYU MINDIAPUTRI', 'ADMINISTRATION', 'HRD', 'RECRUITMENT & COMPENSATION BENEFIT', 'KASIE', '2023-05-23 03:06:20', NULL),
(9, '1617', 'AHMAD ZAELANI', 'PLANT SERVICE', 'EHS ', 'HEALTH & SAFETY', 'KASIE', '2023-05-23 03:06:20', NULL),
(10, '1618', 'ARIF APRIANTO', 'ENGINEERING', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE', 'KASIE', '2023-05-23 03:06:20', NULL),
(11, '1697', 'EVEI ADI KURNIAWAN', 'PLANT SERVICE', 'MAINTENANCE', 'TOOLING-1 PLATE PROCESS', 'KASIE', '2023-05-23 03:06:20', NULL),
(12, '1815', 'NOVIAN ANDRIKA', 'PLANT', 'SUPERVISOR SHIFT 2 & SHIFT 3', 'SUPERVISOR SHIFT 2 ', 'KASIE', '2023-05-23 03:06:20', NULL),
(13, '1971', 'AHMAD SYAFIQ', 'ENGINEERING', 'PRODUCT ENGINEERING', 'PRODUCT DEPLOYMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(14, '2331', 'PRADIPTA FAJAR YUNIARTO', 'ENGINEERING', 'PROCESS ENGINEERING', 'PROCESS ENG MCB IB & WET CHARGING', 'KASIE', '2023-05-23 03:06:20', NULL),
(15, '2346', 'LATIF USMAN', 'PLANT SERVICE', 'MAINTENANCE', 'TOOLING-2 ASSEMBLING', 'KASIE', '2023-05-23 03:06:20', NULL),
(16, '2526', 'KAUTZAR RIZKA IGAPUTRA', 'PLANT', 'PPIC', 'WAREHOUSE MATERIAL & COMP', 'KASIE', '2023-05-23 03:06:20', NULL),
(17, '2593', 'CIPTO TIGOR PRIBADI NAINGGOLAN', 'ENGINEERING', 'PROCESS ENGINEERING', 'PROCESS ENG LEAD POWDER PASTING & FORMATION', 'KASIE', '2023-05-23 03:06:20', NULL),
(18, '2644', 'ERSHA NURANJARSARI', 'ADMINISTRATION', 'HRD', 'PEOPLE DEVELOPMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(19, '2649', 'INDRI AFRIYANTI', 'X', 'INDUSTRIAL SYSTEM DEVELOPMENT', 'INDUSTRIAL SYSTEM DEVELOPMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(20, '2862', 'SUCIPTO HENING', 'PLANT SERVICE', 'MAINTENANCE', 'MAINTENANCE-2 ASSEMBLING', 'KASIE', '2023-05-23 03:06:20', NULL),
(21, '2863', 'FAHRIZAL FITRA UTAMA', 'X', 'INDUSTRIAL SYSTEM DEVELOPMENT', 'INDUSTRIAL SYSTEM DEVELOPMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(22, '2939', 'DIYAN LUQMAN NUR FATONI B', 'ENGINEERING', 'QUALITY ASSURANCE', 'INCOMING PART, PDC & CLAIM HANDLING', 'KASIE', '2023-05-23 03:06:20', NULL),
(23, '3012', 'AKHMAD MARDHANI', 'PLANT', 'PRODUCTION 2', 'ASSEMBLING A, MCB & INDUSTRIAL BATT', 'KASIE', '2023-05-23 03:06:20', NULL),
(24, '3014', 'POLIN HASINTONGAN SIMANULLANG', 'PLANT', 'PRODUCTION 1', 'GRID CASTING, PUNCHING & MLR', 'KASIE', '2023-05-23 03:06:20', NULL),
(25, '3305', 'ARI MUSTAKIM', 'ENGINEERING', 'PRODUCT ENGINEERING', 'PRODUCT DEVELOPMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(26, '3446', 'AGATHA ANGGUN VIDYANITA', 'ADMINISTRATION', 'PROCUREMENT', 'NON COMPONENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(27, '3476', 'SAUT JUMADI SITUMORANG', 'PLANT SERVICE', 'MAINTENANCE', 'UTILITY, WORKSHOP & SPARE PART MANAGEMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(28, '3477', 'KRESNA BAYU AJI', 'PLANT SERVICE', 'MAINTENANCE', 'MAINTENANCE-1 PLATE PROCESS', 'KASIE', '2023-05-23 03:06:20', NULL),
(29, '3584', 'RINTA SETYO NUGROHO', 'FIN, ACC, MARK & MIS', 'MIS', 'SYSTEM & DEVELOPMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(30, '3651', 'BAGUS PURNOMO', 'ENGINEERING', 'PROCESS ENGINEERING', 'PROCESS ENG ASSEMBLING', 'KASIE', '2023-05-23 03:06:20', NULL),
(31, '3658', 'RAHMADIAN PRATAMA', 'ENGINEERING', 'QUALITY ASSURANCE', 'PRODUCTION QUALITY CONTROL', 'KASIE', '2023-05-23 03:06:20', NULL),
(32, '3659', 'RYANDANU ALDY YUDHISTIRA', 'ENGINEERING', 'PROCESS ENGINEERING', 'PROCESS ENG PUNCHING & CASTING', 'KASIE', '2023-05-23 03:06:20', NULL),
(33, '3688', 'KHANIFATTURRAHMAH', 'FIN, ACC, MARK & MIS', 'FIN, ACC  & RISK MGT CONT', 'PLANNING & COST CONTROL', 'KASIE', '2023-05-23 03:06:20', NULL),
(34, '3764', 'KIRANA DYAH UTARI KUSUMA PUTRI', 'ADMINISTRATION', 'PROCUREMENT', 'VENDOR DEVELOPMENT', 'KASIE', '2023-05-23 03:06:20', NULL),
(35, '461', 'YUSUF SLAMET PELITA', 'PLANT', 'PRODUCTION 2', 'ASSEMBLING A, MCB & INDUSTRIAL BATT', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(36, '481', 'NARSO', 'PLANT', 'PPIC', 'WAREHOUSE MATERIAL & COMP', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(37, '510', 'PARWADI', 'PLANT', 'PRODUCTION 2', 'ASSEMBLING G ', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(38, '523', 'NUR ALI', 'PLANT SERVICE', 'MAINTENANCE', 'TOOLING-1 PLATE PROCESS', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(39, '524', 'EDI SUWITO', 'PLANT', 'PRODUCTION 2', 'ASSEMBLING G', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(40, '546', 'MUSLIM', 'PLANT', 'PRODUCTION 1', 'GRID CASTING, PUNCHING & MLR', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(41, '551', 'MUSBIKHIN', 'PLANT', 'PRODUCTION 1', 'GRID CASTING, PUNCHING & MLR', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(42, '559', 'PUJIONO (B)', 'ENGINEERING', 'QUALITY ASSURANCE', 'PRODUCTION QUALITY CONTROL', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(43, '569', 'LASONO', 'PLANT', 'PPIC ', 'INV CONTROL FINISHED GOODS & DELIVERY', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(44, '584', 'YANTO', 'PLANT', 'PRODUCTION 1', 'PASTING ', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(45, '639', 'MASRURI', 'PLANT', 'PRODUCTION 2', 'ASSEMBLING G ', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(46, '645', 'ADE SURYANA', 'PLANT', 'PRODUCTION 1', 'PASTING ', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(47, '676', 'AGUS SUROTO', 'PLANT', 'PRODUCTION 1', 'FORMATION', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(48, '692', 'A.RIFAI', 'ADMINISTRATION', 'GA, IR & CSR', 'GA ', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(49, '698', 'IIM ARWISMAN', 'PLANT', 'PRODUCTION 2', 'ASSEMBLING A, MCB & INDUSTRIAL BATT', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(50, '715', 'JOKO SUKO PIRENO', 'FIN, ACC, MARK & MIS', 'MARKETING', 'MARKETING', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(51, '731', 'DEDI RUHIMAT', 'PLANT SERVICE', 'EHS ', 'HEALTH & SAFETY', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(52, '1030', 'DUDY MULYANTO', 'ENGINEERING', 'QUALITY ASSURANCE', 'PRODUCTION QUALITY CONTROL', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(53, '1139', 'FAHMI', 'FIN, ACC, MARK & MIS', 'FIN, ACC  & RISK MGT CONT', 'GEN ACCOUNTING & TAX', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(54, '2185', 'YUDA AJI PRASETYO', 'PLANT', 'PPIC ', 'INV CONTROL FINISHED GOODS & DELIVERY', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(55, '2441', 'WAHYU ADHANTA', 'PLANT', 'PRODUCTION 1', 'PASTING ', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(56, '2523', 'APRILIANTO CANDRA NUGROHO', 'PLANT SERVICE', 'MAINTENANCE', 'UTILITY, WORKSHOP & SPARE PART MANAGEMENT', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(57, '2524', 'BAYU SURYADI', 'PLANT SERVICE', 'MAINTENANCE', 'MAINTENANCE-2 ASSEMBLING', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(58, '2535', 'DIKA PRATAMA', 'PLANT', 'PRODUCTION 2', 'CHARGING', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(59, '2819', 'NONIK SAHAYA CITRA PURNAMASARI', 'PLANT SERVICE', 'EHS ', 'ENVIRONMENT', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(60, '2846', 'RIZKY TOYIBAH', 'PLANT SERVICE', 'MAINTENANCE', 'UTILITY, WORKSHOP & SPARE PART MANAGEMENT', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(61, '3368', 'FREDY SEPTIAN', 'PLANT SERVICE', 'MAINTENANCE', 'MAINTENANCE-1 PLATE PROCESS', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(62, '3384', 'ANDRIANA', 'PLANT SERVICE', 'MAINTENANCE', 'TOOLING-1 PLATE PROCESS', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(63, '3479', 'WAHYU NUR FAUZIA', 'PLANT SERVICE', 'MAINTENANCE', 'TOOLING-2 ASSEMBLING', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(64, '3693', 'IKRAR SATRIA HARTAWAN', 'PLANT SERVICE', 'MAINTENANCE', 'TOOLING-1 PLATE PROCESS', 'KASUBSIE', '2023-05-23 03:06:20', NULL),
(65, '4171', 'MUHAMMAD FARRAZ ABRAR', 'ENGINEERING', 'PROCESS ENGINEERING', 'PROCESS ENG ASSEMBLING', 'STAFF 4UP', '2023-05-23 03:06:20', NULL),
(66, '1625', 'SUGIYANTO ', 'PLANT SERVICE', 'EHS ', 'KADEPT', 'KADEPT', '2023-05-23 03:06:20', '2023-05-24 01:46:42'),
(67, '3913', 'IHAN PRATAMA ', 'PLANT SERVICE', 'EHS ', 'ENVIRONMENT', 'ADMIN EHS', '2023-05-23 03:06:20', NULL),
(68, '3515', 'YOGI ', 'ENGINEERING', 'QUALITY ASSURANCE', 'INCOMING PART, PDC & CLAIM HANDLING', 'KASUBSIE ', '2023-05-23 03:06:20', NULL),
(69, '2364', 'WIWIN AYU ', 'ENGINEERING', 'PRODUCT ENGINEERING', 'QUALITY ASSURANCE', 'EXPERT TESTING', '2023-05-23 03:06:20', NULL),
(70, '3657', 'RIDWAN ABDUL N ', 'PLANT SERVICE', 'MAINTENANCE', 'PPM, IOT & MACHINE LEARNING', 'PPM PLATE PROCESS', '2023-05-23 03:06:20', NULL),
(71, '656', 'HUGENG SUSENO', 'FIN, ACC, MARK & MIS', 'MARKETING', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(72, '802', 'MEIJI UTOMO', 'PLANT', 'X', '', 'KADIV', '2023-05-23 03:06:20', NULL),
(73, '811', 'AMIRKHAN BUGIS', 'PLANT', 'PPIC ', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(74, '960', 'BAGUS MUDJIHARIADI', 'PLANT', 'SUPERVISOR SHIFT 2 & SHIFT 3', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(75, '961', 'A.FARIHIN NIZAR', 'ADMINISTRATION', 'X', '', 'KADIV', '2023-05-23 03:06:20', NULL),
(76, '962', 'KUSNADI', 'FIN, ACC, MARK & MIS', 'FIN, ACC  & RISK MGT CONT', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(77, '1099', 'ABUB MAHBUBIE', 'ENGINEERING', 'QUALITY ASSURANCE', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(78, '1100', 'WISNU RAHAYUDI', 'PLANT', 'PRODUCTION 2', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(79, '1432', 'M.SHUBACHUSURUR', 'ENGINEERING', 'PRODUCT ENGINEERING', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(80, '1440', 'ARIF BUDIANTO', 'X', 'INDUSTRIAL SYSTEM DEVELOPMENT', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(81, '1507', 'SOETARDI', 'PLANT SERVICE', 'X', '', 'KADIV', '2023-05-23 03:06:20', NULL),
(82, '1529', 'WAHYU INDRIANTO PRAMONO', 'FIN, ACC, MARK + MIS', 'X', '', 'KADIV', '2023-05-23 03:06:20', NULL),
(83, '1533', 'RANGGA TITO ANANTA PRATAMA', 'PLANT', 'PRODUCTION 1', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(84, '1623', 'DANI CRISTIAN', 'PLANT SERVICE', 'MAINTENANCE', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(85, '1624', 'NURUL FAJAR', 'ADMINISTRATION', 'PROCUREMENT', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(87, '1942', 'NUR BUDIYANTO', 'ENGINEERING', 'PROCESS ENGINEERING', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(88, '2058', 'ADITYA ARDI NUGRAHA', 'FIN, ACC, MARK & MIS', 'MIS', '', 'KADEPT', '2023-05-23 03:06:20', NULL),
(89, '2365', 'NUKKI KRISTIAN', 'ENGINEERING', 'X', '', 'KADIV', '2023-05-23 03:06:20', NULL),
(90, '4210', 'AULIA FIRMANSYAH', 'ADMINISTRATION', 'GA, IR & CSR', '', 'KADEPT', '2023-05-23 03:06:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `manual`
--

CREATE TABLE `manual` (
  `id_manual` int(11) NOT NULL,
  `kd_manual` varchar(255) NOT NULL,
  `no_manual` varchar(255) NOT NULL,
  `judul_manual` varchar(255) NOT NULL,
  `nm_manual` varchar(255) NOT NULL,
  `keterangan_manual` varchar(255) NOT NULL,
  `tipe_manual` varchar(100) NOT NULL,
  `ukuran_manual` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `material` varchar(255) NOT NULL,
  `detail_material` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jml_stok` varchar(255) NOT NULL,
  `status` enum('full','aman','limitstok') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_material`
--

CREATE TABLE `pemakaian_material` (
  `id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `jml_pemakaian` varchar(255) NOT NULL,
  `tanggal_pemakaian` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prosedur`
--

CREATE TABLE `prosedur` (
  `id_prosedur` int(11) NOT NULL,
  `kd_prosedur` varchar(255) NOT NULL,
  `no_prosedur` varchar(255) NOT NULL,
  `judul_prosedur` varchar(255) NOT NULL,
  `nm_prosedur` varchar(255) NOT NULL,
  `keterangan_prosedur` varchar(255) NOT NULL,
  `tipe_prosedur` varchar(100) NOT NULL,
  `ukuran_prosedur` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift`
--

CREATE TABLE `shift` (
  `id_shift` int(11) NOT NULL,
  `nm_shift` varchar(50) NOT NULL,
  `waktu_shift` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shift`
--

INSERT INTO `shift` (`id_shift`, `nm_shift`, `waktu_shift`, `created_at`, `updated_at`) VALUES
(1, 'Shift 1', '07.00 - 16.30', '2023-02-14 01:39:56', '2023-02-21 09:00:12'),
(2, 'Shift 2', '16.30 - 00.30', '2023-02-14 01:39:56', NULL),
(3, 'Shift 3', '00.30 - 07.30', '2023-02-14 01:40:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_log`
--

CREATE TABLE `tabel_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(255) DEFAULT NULL,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(90) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `akses` int(3) NOT NULL COMMENT '1headdept,2kasie,3kasubsie,4member,5officer_ehs,6quality',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `name`, `password`, `id_pengguna`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'MUL0412', 'MULAZIM', '12345', 1, 2, '2023-05-23 04:47:52', NULL),
(2, 'NYN485', 'NYONO', '12345', 2, 2, '2023-05-23 04:47:52', NULL),
(3, 'MJO517', 'MUJIONO', '12345', 3, 2, '2023-05-23 04:47:52', NULL),
(4, 'SUU563', 'SUUBI', '12345', 4, 2, '2023-05-23 04:47:52', NULL),
(5, 'CNU1095', 'CIPTADI NUGROHO', '12345', 5, 2, '2023-05-23 04:47:52', NULL),
(6, 'RWN1257', 'RENDI WIDI NUGROHO', '12345', 6, 2, '2023-05-23 04:47:52', NULL),
(7, 'ARA1361', 'AGNES RETNONING ASTUTI', '12345', 7, 2, '2023-05-23 04:47:52', NULL),
(8, 'EAM1391', 'ETIKA AYU MINDIAPUTRI', '12345', 8, 2, '2023-05-23 04:47:52', NULL),
(9, 'AZAE1617', 'AHMAD ZAELANI', '2122', 9, 5, '2023-05-23 04:47:52', NULL),
(10, 'AAP1618', 'ARIF APRIANTO', '7777', 10, 6, '2023-05-23 04:47:52', NULL),
(11, 'EAK1697', 'EVEI ADI KURNIAWAN', '12345', 11, 2, '2023-05-23 04:47:52', NULL),
(12, 'NAN1815', 'NOVIAN ANDRIKA', '12345', 12, 2, '2023-05-23 04:47:52', NULL),
(13, 'ASY1971', 'AHMAD SYAFIQ', '12345', 13, 2, '2023-05-23 04:47:52', NULL),
(14, 'PFY2331', 'PRADIPTA FAJAR YUNIARTO', '12345', 14, 2, '2023-05-23 04:47:52', NULL),
(15, 'LUS2346', 'LATIF USMAN', '12345', 15, 2, '2023-05-23 04:47:52', NULL),
(16, 'KRI2526', 'KAUTZAR RIZKA IGAPUTRA', '12345', 16, 2, '2023-05-23 04:47:52', NULL),
(17, 'CTP2593', 'CIPTO TIGOR PRIBADI NAING', '12345', 17, 2, '2023-05-23 04:47:52', NULL),
(18, 'ENU2644', 'ERSHA NURANJARSARI', '12345', 18, 2, '2023-05-23 04:47:52', NULL),
(19, 'IAF2649', 'INDRI AFRIYANTI', '12345', 19, 2, '2023-05-23 04:47:52', NULL),
(20, 'SHE2862', 'SUCIPTO HENING', '12345', 20, 2, '2023-05-23 04:47:52', NULL),
(21, 'FFU2863', 'FAHRIZAL FITRA UTAMA', '12345', 21, 2, '2023-05-23 04:47:52', NULL),
(22, 'DLN2939', 'DIYAN LUQMAN NUR FATONI B', '12345', 22, 2, '2023-05-23 04:47:52', NULL),
(23, 'AMA3012', 'AKHMAD MARDHANI', '12345', 23, 2, '2023-05-23 04:47:52', NULL),
(24, 'PHS3014', 'POLIN HASINTONGAN SIMANUL', '12345', 24, 2, '2023-05-23 04:47:52', NULL),
(25, 'AMU3305', 'ARI MUSTAKIM', '12345', 25, 2, '2023-05-23 04:47:52', NULL),
(26, 'AAV3346', 'AGATHA ANGGUN VIDYANITA', '12345', 26, 2, '2023-05-23 04:47:52', NULL),
(27, 'SJS3476', 'SAUT JUMADI SITUMORANG', '12345', 27, 2, '2023-05-23 04:47:52', NULL),
(28, 'KBA3477', 'KRESNA BAYU AJI', '12345', 28, 2, '2023-05-23 04:47:52', NULL),
(29, 'RSN3584', 'RINTA SETYO NUGROHO', '12345', 29, 2, '2023-05-23 04:47:52', NULL),
(30, 'BPU3651', 'BAGUS PURNOMO', '12345', 30, 2, '2023-05-23 04:47:52', NULL),
(31, 'RPR3658', 'RAHMADIAN PRATAMA', '12345', 31, 2, '2023-05-23 04:47:52', NULL),
(32, 'RAY3659', 'RYANDANU ALDY YUDHISTIRA', '12345', 32, 2, '2023-05-23 04:47:52', NULL),
(33, 'KHA3688', 'KHANIFATTURRAHMAH', '12345', 33, 2, '2023-05-23 04:47:52', NULL),
(34, 'KDU3764', 'KIRANA DYAH UTARI KUSUMA ', '12345', 34, 2, '2023-05-23 04:47:52', NULL),
(35, 'YSP0461', 'YUSUF SLAMET PELITA', '12345', 35, 3, '2023-05-23 04:47:52', NULL),
(36, 'NRS0481', 'NARSO', '12345', 36, 3, '2023-05-23 04:47:52', NULL),
(37, 'PWD0510', 'PARWADI', '12345', 37, 3, '2023-05-23 04:47:52', NULL),
(38, 'NAL0523', 'NUR ALI', '12345', 38, 3, '2023-05-23 04:47:52', NULL),
(39, 'ESU0524', 'EDI SUWITO', '12345', 39, 3, '2023-05-23 04:47:52', NULL),
(40, 'MUS0546', 'MUSLIM', '12345', 40, 3, '2023-05-23 04:47:52', NULL),
(41, 'MUS0551', 'MUSBIKHIN', '12345', 41, 3, '2023-05-23 04:47:52', NULL),
(42, 'PJO0559', 'PUJIONO (B)', '12345', 42, 3, '2023-05-23 04:47:52', NULL),
(43, 'LSN0569', 'LASONO', '12345', 43, 3, '2023-05-23 04:47:52', NULL),
(44, 'YNT0584', 'YANTO', '12345', 44, 3, '2023-05-23 04:47:52', NULL),
(45, 'MSR0639', 'MASRURI', '12345', 45, 3, '2023-05-23 04:47:52', NULL),
(46, 'ASU645', 'ADE SURYANA', '12345', 46, 3, '2023-05-23 04:47:52', NULL),
(47, 'ASU676', 'AGUS SUROTO', '12345', 47, 3, '2023-05-23 04:47:52', NULL),
(48, 'ARI692', 'A.RIFAI', '12345', 48, 3, '2023-05-23 04:47:52', NULL),
(49, 'IIM0698', 'IIM ARWISMAN', '12345', 49, 3, '2023-05-23 04:47:52', NULL),
(50, 'JSP0715', 'JOKO SUKO PIRENO', '12345', 50, 3, '2023-05-23 04:47:52', NULL),
(51, 'DRU0731', 'DEDI RUHIMAT', 'cek22', 51, 5, '2023-05-23 04:47:52', NULL),
(52, 'DMU1030', 'DUDY MULYANTO', '12345', 52, 3, '2023-05-23 04:47:52', NULL),
(53, 'FAH1139', 'FAHMI', '12345', 53, 3, '2023-05-23 04:47:52', NULL),
(54, 'YAP2185', 'YUDA AJI PRASETYO', '12345', 54, 3, '2023-05-23 04:47:52', NULL),
(55, 'WAD2441', 'WAHYU ADHANTA', '12345', 55, 3, '2023-05-23 04:47:52', NULL),
(56, 'ACN2523', 'APRILIANTO CANDRA NUGROHO', '12345', 56, 3, '2023-05-23 04:47:52', NULL),
(57, 'BSU2524', 'BAYU SURYADI', '12345', 57, 3, '2023-05-23 04:47:52', NULL),
(58, 'DPR2535', 'DIKA PRATAMA', '12345', 58, 3, '2023-05-23 04:47:52', NULL),
(59, 'NSC2819', 'NONIK SAHAYA CITRA PURNAM', '123123', 59, 5, '2023-05-23 04:47:52', NULL),
(60, 'RTO2846', 'RIZKY TOYIBAH', '12345', 60, 3, '2023-05-23 04:47:52', NULL),
(61, 'FSE3368', 'FREDY SEPTIAN', '12345', 61, 3, '2023-05-23 04:47:52', NULL),
(62, 'ADR3384', 'ANDRIANA', '12345', 62, 3, '2023-05-23 04:47:52', NULL),
(63, 'WNF3479', 'WAHYU NUR FAUZIA', '12345', 63, 3, '2023-05-23 04:47:52', NULL),
(64, 'ISH3693', 'IKRAR SATRIA HARTAWAN', '12345', 64, 3, '2023-05-23 04:47:52', NULL),
(65, 'MFA4171', 'MUHAMMAD FARRAZ ABRAR', '12345', 65, 2, '2023-05-23 04:47:52', NULL),
(66, 'SGY1625', 'SUGIYANTO ', 'cek33', 66, 5, '2023-05-23 04:47:52', NULL),
(67, 'IPR3913', 'IHAN PRATAMA ', '5555', 67, 4, '2023-05-23 04:47:52', NULL),
(68, 'YG3515', 'YOGI ', '12345', 68, 3, '2023-05-23 04:47:52', NULL),
(69, 'WWA2364', 'WIWIN AYU ', '12345', 69, 2, '2023-05-23 04:47:52', NULL),
(70, 'RAN3657', 'RIDWAN ABDUL N ', '12345', 70, 3, '2023-05-23 04:47:52', NULL),
(71, 'HSU656', 'HUGENG SUSENO', '12345', 71, 1, '2023-05-23 04:47:52', NULL),
(72, 'MJU802', 'MEIJI UTOMO', '12345', 72, 1, '2023-05-23 04:47:52', NULL),
(73, 'ABU811', 'AMIRKHAN BUGIS', '12345', 73, 1, '2023-05-23 04:47:52', NULL),
(74, 'BMU960', 'BAGUS MUDJIHARIADI', '12345', 74, 1, '2023-05-23 04:47:52', NULL),
(75, 'AFN961', 'A.FARIHIN NIZAR', '12345', 75, 1, '2023-05-23 04:47:52', NULL),
(76, 'KUS962', 'KUSNADI', '12345', 76, 1, '2023-05-23 04:47:52', NULL),
(77, 'ABM1099', 'ABUB MAHBUBIE', '12345', 77, 1, '2023-05-23 04:47:52', NULL),
(78, 'WRA1100', 'WISNU RAHAYUDI', '12345', 78, 1, '2023-05-23 04:47:52', NULL),
(79, 'MSH1432', 'M.SHUBACHUSURUR', '12345', 79, 1, '2023-05-23 04:47:52', NULL),
(80, 'ABU1440', 'ARIF BUDIANTO', '12345', 80, 1, '2023-05-23 04:47:52', NULL),
(81, 'SOE1507', 'SOETARDI', '12345', 81, 1, '2023-05-23 04:47:52', NULL),
(82, 'WIP1529', 'WAHYU INDRIANTO PRAMONO', '12345', 82, 1, '2023-05-23 04:47:52', NULL),
(83, 'RTA1533', 'RANGGA TITO ANANTA PRATAM', '12345', 83, 1, '2023-05-23 04:47:52', NULL),
(84, 'DCR1623', 'DANI CRISTIAN', '12345', 84, 1, '2023-05-23 04:47:52', NULL),
(85, 'NFA1624', 'NURUL FAJAR', '12345', 85, 1, '2023-05-23 04:47:52', NULL),
(87, 'NBU1942', 'NUR BUDIYANTO', '12345', 87, 1, '2023-05-23 04:47:52', NULL),
(88, 'AAN2058', 'ADITYA ARDI NUGRAHA', '12345', 88, 1, '2023-05-23 04:47:52', NULL),
(89, 'NKR2365', 'NUKKI KRISTIAN', '12345', 89, 1, '2023-05-23 04:47:52', NULL),
(90, 'AFI4210', 'AULIA FIRMANSYAH', '12345', 90, 1, '2023-05-23 04:47:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `videoedukasi`
--

CREATE TABLE `videoedukasi` (
  `id_video` int(11) NOT NULL,
  `kd_video` varchar(255) NOT NULL,
  `no_video` varchar(255) NOT NULL,
  `judul_video` varchar(255) NOT NULL,
  `nm_video` varchar(255) NOT NULL,
  `keterangan_video` varchar(255) NOT NULL,
  `tipe_video` varchar(100) NOT NULL,
  `ukuran_video` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_sop`);

--
-- Indeks untuk tabel `berkas_auditk3l`
--
ALTER TABLE `berkas_auditk3l`
  ADD PRIMARY KEY (`id_auditk3l`);

--
-- Indeks untuk tabel `berkas_iad`
--
ALTER TABLE `berkas_iad`
  ADD PRIMARY KEY (`id_iad`);

--
-- Indeks untuk tabel `berkas_msds`
--
ALTER TABLE `berkas_msds`
  ADD PRIMARY KEY (`id_msds`);

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

--
-- Indeks untuk tabel `document_lisensi`
--
ALTER TABLE `document_lisensi`
  ADD PRIMARY KEY (`id_document_lisensi`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`);

--
-- Indeks untuk tabel `ik`
--
ALTER TABLE `ik`
  ADD PRIMARY KEY (`id_ik`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`id_manual`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indeks untuk tabel `pemakaian_material`
--
ALTER TABLE `pemakaian_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_pemakaian` (`material_id`);

--
-- Indeks untuk tabel `prosedur`
--
ALTER TABLE `prosedur`
  ADD PRIMARY KEY (`id_prosedur`);

--
-- Indeks untuk tabel `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indeks untuk tabel `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `videoedukasi`
--
ALTER TABLE `videoedukasi`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berkas_auditk3l`
--
ALTER TABLE `berkas_auditk3l`
  MODIFY `id_auditk3l` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berkas_iad`
--
ALTER TABLE `berkas_iad`
  MODIFY `id_iad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berkas_msds`
--
ALTER TABLE `berkas_msds`
  MODIFY `id_msds` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `document_lisensi`
--
ALTER TABLE `document_lisensi`
  MODIFY `id_document_lisensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ik`
--
ALTER TABLE `ik`
  MODIFY `id_ik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `manual`
--
ALTER TABLE `manual`
  MODIFY `id_manual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemakaian_material`
--
ALTER TABLE `pemakaian_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prosedur`
--
ALTER TABLE `prosedur`
  MODIFY `id_prosedur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `shift`
--
ALTER TABLE `shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `videoedukasi`
--
ALTER TABLE `videoedukasi`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
