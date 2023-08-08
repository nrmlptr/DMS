-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2023 pada 14.54
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
-- Database: `document_management_system`
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
  `foto_karyawan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nm_karyawan`, `foto_karyawan`, `created_at`, `updated_at`) VALUES
(1, '1646', 'Akhmadi Shofiya Alrizqi', '', '2023-02-10 03:39:38', '2023-03-14 09:08:24'),
(2, '3913', 'Ihan Pratama', '', '2023-02-10 03:39:38', '2023-03-14 09:08:27'),
(3, '2269', 'Hasan Rudi', '', '2023-02-10 03:39:38', NULL),
(5, '3204', 'Muhamad Fiqri Kurnia', '', '2023-02-10 03:40:18', NULL),
(6, '1041', 'Subkhan', '', '2023-02-10 03:40:18', NULL),
(7, '2819', 'Nonik Suhaya Cahaya Purnamasari', '', '2023-02-10 03:42:13', '2023-03-14 09:08:30'),
(8, '0731', 'Dedi Ruhimat', '', '2023-02-10 03:42:13', '2023-03-14 09:08:34'),
(12, '3212', 'Nuramalia Putri', '', '2023-02-22 03:17:18', '2023-03-14 09:08:37'),
(13, '5555', 'David', '', '2023-03-31 03:33:47', NULL);

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
(1, 'noniks', 'Nonik Suhaya ', 'tes123', 7, 5, '2023-02-24 04:26:20', '2023-03-31 03:43:10'),
(2, 'dedir', 'Dedi Ruhimat', 'tes456', 8, 1, '2023-02-24 04:26:20', '2023-03-31 03:43:13'),
(3, 'ihanp', 'Ihan Pratama', 'tes789', 2, 4, '2023-02-24 04:26:20', '2023-03-31 03:43:27'),
(4, 'subkhan', 'Subkhan', 'tes1011', 6, 2, '2023-02-24 04:26:20', '2023-03-31 03:43:38'),
(5, 'fiqri', 'Muhamad Fiqri Kurnia', 'tes1213', 5, 3, '2023-02-24 04:34:31', '2023-03-31 03:43:36'),
(6, 'nramalptr', 'Nuramalia Putri', 'tes2412', 12, 5, '2023-03-15 07:59:08', '2023-03-31 03:43:49'),
(7, 'david', 'David ', 'qlt55', 13, 6, '2023-03-31 03:34:32', '2023-03-31 03:56:51');

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
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
