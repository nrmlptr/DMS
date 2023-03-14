-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2023 pada 04.32
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

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_sop`, `kd_sop`, `no_sop`, `judul_sop`, `nm_sop`, `keterangan_sop`, `tipe_sop`, `ukuran_sop`, `created_at`, `updated_at`) VALUES
(1, 'DOC-SOP-00001', 'SOP-EHS-001', 'SOP DOCUMENT EHS', 'SDA_Term_Of_Reference_FINISH.pdf', 'cek upload sop dok di sistem shaka', '.pdf', 1034.8, '2023-03-02 02:32:40', NULL);

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

--
-- Dumping data untuk tabel `berkas_iad`
--

INSERT INTO `berkas_iad` (`id_iad`, `kd_berkas_iad`, `no_berkas_iad`, `judul_berkas_iad`, `nm_berkas_iad`, `keterangan_berkas_iad`, `tipe_berkas_iad`, `ukuran_berkas_iad`, `created_at`, `updated_at`) VALUES
(1, 'DOC-IAD-00001', 'IAD-EHS-0001', 'Upload Dok IAD 01', 'Tugas_RPL_TOR_-_Nuramalia_Putri_222101286.docx', 'CEK IAD Upload di dms shaka', '.docx', 1513.59, '2023-03-02 02:57:47', NULL);

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

--
-- Dumping data untuk tabel `berkas_msds`
--

INSERT INTO `berkas_msds` (`id_msds`, `kd_berkas_msds`, `no_berkas_msds`, `judul_berkas_msds`, `nm_berkas_msds`, `keterangan_berkas_msds`, `tipe_berkas_msds`, `ukuran_berkas_msds`, `created_at`, `updated_at`) VALUES
(1, 'DOC-MSDS-00001', 'MSDS-EHS-0001', 'TES UPLOAD MSDS', 'document-export-2023-02-28.xlsx', 'cek upload msds di dms shaka', '.xlsx', 15.41, '2023-03-02 02:58:53', NULL);

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

--
-- Dumping data untuk tabel `document`
--

INSERT INTO `document` (`id_document`, `nama_alat`, `pabrik_pembuat`, `kapasitas`, `lokasi`, `no_seri`, `no_perijinan`, `expired_date`, `status`, `filename`) VALUES
(1, 'tes', 'tes', 'tes', 'testes', 'testes', 'testes', '2023-03-14', 'active', ''),
(2, 'cek', 'cek2', 'cek3', 'cek4', 'cek5', '23958290', '2026-03-19', 'active', '');

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

--
-- Dumping data untuk tabel `document_lisensi`
--

INSERT INTO `document_lisensi` (`id_document_lisensi`, `jenis_lisensi`, `nama`, `seksi`, `npk`, `no_sio`, `masa_berlaku`, `status`, `filename`) VALUES
(1, 'tes lisensi 1', 'ihanp', 'EHS', '3319', '09212913102482910', '2023-03-17', 'active', ''),
(2, 'TES LISENSI 2', 'Nonik', 'EHS', '2198', '12898781282334', '2025-11-02', 'active', ''),
(3, 'teslisensi', 'teslisensi', 'ceklisensi', '1241298', '1024728947', '2026-06-16', 'active', '');

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

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id_form`, `kd_form`, `no_form`, `judul_form`, `nm_form`, `keterangan_form`, `tipe_form`, `ukuran_form`, `created_at`, `updated_at`) VALUES
(1, 'DOC-FORM-00001', 'FORM-EHS-0001', 'Dokumen Form upload 01', 'Form_Penilaian_Penjurian_SGA.xlsx', 'tes upload form dok di dms shaka', '.xlsx', 37.93, '2023-03-02 02:58:19', NULL);

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

--
-- Dumping data untuk tabel `ik`
--

INSERT INTO `ik` (`id_ik`, `kd_ik`, `no_ik`, `judul_ik`, `nm_ik`, `keterangan_ik`, `tipe_ik`, `ukuran_ik`, `created_at`, `updated_at`) VALUES
(1, 'DOC-IK-00001', 'IK-EHS-0001', 'Upload Dokumen IK 01', 'POV_Dashboard_by_Office_People.docx', 'tes upload ik di sistem dms shaka', '.docx', 366.71, '2023-03-02 02:36:11', NULL);

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

--
-- Dumping data untuk tabel `manual`
--

INSERT INTO `manual` (`id_manual`, `kd_manual`, `no_manual`, `judul_manual`, `nm_manual`, `keterangan_manual`, `tipe_manual`, `ukuran_manual`, `created_at`, `updated_at`) VALUES
(1, 'DOC-MAN-00001', 'MAN-EHS-001', 'Dokumen manual 01', 'P7_RPL.pdf', 'Cek upload manual dms shaka', '.pdf', 1569.19, '2023-03-02 02:28:20', NULL);

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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(90) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `akses` int(3) NOT NULL COMMENT '1headdept,2kasie,3kasubsie,4member,5officer_ehs',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `name`, `password`, `id_pengguna`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'noniks', 'Nonik Suhaya ', 'tes123', 7, 5, '2023-02-24 04:26:20', '2023-02-24 04:34:45'),
(2, 'dedir', 'Dedi Ruhimat', 'tes000', 8, 1, '2023-02-24 04:26:20', NULL),
(3, 'ihanp', 'Ihan Pratama', 'tes212', 2, 4, '2023-02-24 04:26:20', NULL),
(4, 'subkhan', 'Subkhan', 'tes999', 6, 2, '2023-02-24 04:26:20', NULL),
(5, 'fiqri', 'Muhamad Fiqri Kurnia', 'cek2402', 5, 3, '2023-02-24 04:34:31', NULL);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `constraint_user` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berkas_auditk3l`
--
ALTER TABLE `berkas_auditk3l`
  MODIFY `id_auditk3l` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berkas_iad`
--
ALTER TABLE `berkas_iad`
  MODIFY `id_iad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berkas_msds`
--
ALTER TABLE `berkas_msds`
  MODIFY `id_msds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `document_lisensi`
--
ALTER TABLE `document_lisensi`
  MODIFY `id_document_lisensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ik`
--
ALTER TABLE `ik`
  MODIFY `id_ik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `manual`
--
ALTER TABLE `manual`
  MODIFY `id_manual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
