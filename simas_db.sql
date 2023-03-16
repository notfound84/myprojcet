-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2022 pada 17.25
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
-- Database: `simas_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailkelas`
--

CREATE TABLE `detailkelas` (
  `id_detail_kelas` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_tahunakademik` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailkelas`
--

INSERT INTO `detailkelas` (`id_detail_kelas`, `id_siswa`, `id_kelas`, `id_tahunakademik`, `created_at`, `updated_at`) VALUES
(2, 13, 2, 3, NULL, NULL),
(3, 14, 3, 3, '2022-08-06 17:33:46', '2022-08-06 17:33:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpelanggaran`
--

CREATE TABLE `detailpelanggaran` (
  `id_detailpelanggaran` int(11) NOT NULL,
  `id_pelanggaran` int(11) DEFAULT NULL,
  `id_katpel` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpelanggaran`
--

INSERT INTO `detailpelanggaran` (`id_detailpelanggaran`, `id_pelanggaran`, `id_katpel`, `keterangan`) VALUES
(1, 1, 1, 'Siswa ini sudah dua kali melakukan pelanggaran ini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpembayaran`
--

CREATE TABLE `detailpembayaran` (
  `id_detailpembayaran` int(11) NOT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `id_rincianpembayaran` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpembayaran`
--

INSERT INTO `detailpembayaran` (`id_detailpembayaran`, `id_pembayaran`, `id_rincianpembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2022-08-08 13:55:54', '2022-08-08 13:55:54'),
(2, 1, 2, '2022-08-08 13:55:54', '2022-08-08 13:55:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoripelanggaran`
--

CREATE TABLE `kategoripelanggaran` (
  `id_katpel` int(11) NOT NULL,
  `nama_pelanggaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('a','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoripelanggaran`
--

INSERT INTO `kategoripelanggaran` (`id_katpel`, `nama_pelanggaran`, `poin`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Membawa Senjata Tajam', '50', '2022-08-06 17:00:00', '2022-08-06 17:00:00', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) NOT NULL,
  `nama_kelas` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('a','n') CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `status`, `created_at`, `updated_at`) VALUES
(2, 'VII A', 'a', NULL, NULL),
(3, 'VII B', 'a', '2022-08-06 08:50:33', '2022-08-06 17:46:20'),
(4, 'VIII A', 'a', '2022-08-06 08:52:21', '2022-08-06 17:46:34'),
(5, 'VIII B', 'a', '2022-08-06 08:54:09', '2022-08-06 17:46:44'),
(6, 'XI A', 'a', '2022-08-06 08:55:02', '2022-08-06 17:49:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` bigint(20) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_tahunakademik` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `tgl_pelanggaran` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `id_siswa`, `id_tahunakademik`, `id_petugas`, `tgl_pelanggaran`, `created_at`, `updated_at`) VALUES
(1, 13, 3, 3, '2022-08-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total_pembayaran` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_siswa`, `tgl_pembayaran`, `total_pembayaran`, `id_petugas`, `created_at`, `updated_at`) VALUES
(1, 13, '2022-08-08', 550000, 3, '2022-08-08 13:55:54', '2022-08-08 13:55:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','Bendahara','BK') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `alamat`, `telephone`, `email`, `email_verified_at`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'Kraksaan', '082234321121', 'admin@gmail.com', NULL, 'admin', '$2y$10$b7MPnlPWowIDd.Zb.6pb5ubMVThWD37DqFEEIEOusWIcA1erJ0xOm', 'admin', NULL, '2022-08-06 07:33:43', '2022-08-06 17:30:36'),
(4, 'Muhammad Zafran', 'Sambirampak Kidul', '082322790821', 'zafran123@gmail.com', NULL, 'Zafran123', '$2y$10$SiGYMahMac4WE7qJuI/jH.ql6lAwAQi2qvOWPgtoloHo3xdjBsh2u', 'Bendahara', NULL, '2022-08-06 07:49:11', '2022-08-06 17:30:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincianpembayaran`
--

CREATE TABLE `rincianpembayaran` (
  `id_rincianpembayaran` int(11) NOT NULL,
  `uraian_pembayaran` varchar(20) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_tahunakademik` int(11) DEFAULT NULL,
  `status` enum('a','n') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincianpembayaran`
--

INSERT INTO `rincianpembayaran` (`id_rincianpembayaran`, `uraian_pembayaran`, `nominal`, `id_kelas`, `id_tahunakademik`, `status`, `created_at`, `updated_at`) VALUES
(2, 'LKS', 200000, 2, 3, 'a', '2022-08-07 02:21:24', '0000-00-00 00:00:00'),
(3, 'INFAQ', 350000, 3, 3, 'a', '2022-08-07 02:48:17', '2022-08-06 19:48:17'),
(4, 'Semester', 350000, 3, 3, 'a', '2022-08-07 02:48:58', '2022-08-06 19:48:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` char(13) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` enum('petani','wirasuwasta') DEFAULT NULL,
  `pekerjaan_ibu` enum('petani','ibu rumah tangga') DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_tahunakademik` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `id_kelas`, `id_tahunakademik`, `foto`, `created_at`, `updated_at`) VALUES
(13, 2022001, 'maryam', 'Situbondo', '2000-08-12', 'perempuan', 'Sambirampak Lor', '082334213231', 'Napon', 'Khatijah', 'petani', 'petani', 2, 3, '1659585480347.jpeg', NULL, NULL),
(14, 2022002, 'Muhammad Ali', 'Probolinggo', '2022-08-02', 'laki-laki', 'Sambirampak Kidul', '082322790820', 'Zain', 'Fatim', 'wirasuwasta', 'ibu rumah tangga', 3, 3, '1659832426756.jpg', '2022-08-06 17:33:46', '2022-08-06 17:33:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `id_tahunakademik` int(11) NOT NULL,
  `nama_tahunakademik` varchar(11) DEFAULT NULL,
  `status` enum('a','n') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahunakademik`
--

INSERT INTO `tahunakademik` (`id_tahunakademik`, `nama_tahunakademik`, `status`, `created_at`, `updated_at`) VALUES
(3, '2022-2023', 'a', '2022-08-07 01:38:21', '0000-00-00 00:00:00'),
(4, '2021-2022', 'n', '2022-08-07 01:47:20', '2022-08-06 18:47:20'),
(8, '2023-2024', 'a', '2022-08-07 16:08:17', '2022-08-07 09:08:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailkelas`
--
ALTER TABLE `detailkelas`
  ADD PRIMARY KEY (`id_detail_kelas`);

--
-- Indeks untuk tabel `detailpelanggaran`
--
ALTER TABLE `detailpelanggaran`
  ADD PRIMARY KEY (`id_detailpelanggaran`);

--
-- Indeks untuk tabel `detailpembayaran`
--
ALTER TABLE `detailpembayaran`
  ADD PRIMARY KEY (`id_detailpembayaran`),
  ADD KEY `id_pembayaran_idx` (`id_pembayaran`),
  ADD KEY `id_rincianpembayaran_idx` (`id_rincianpembayaran`);

--
-- Indeks untuk tabel `kategoripelanggaran`
--
ALTER TABLE `kategoripelanggaran`
  ADD PRIMARY KEY (`id_katpel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `rincianpembayaran`
--
ALTER TABLE `rincianpembayaran`
  ADD PRIMARY KEY (`id_rincianpembayaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`id_tahunakademik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailkelas`
--
ALTER TABLE `detailkelas`
  MODIFY `id_detail_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detailpelanggaran`
--
ALTER TABLE `detailpelanggaran`
  MODIFY `id_detailpelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detailpembayaran`
--
ALTER TABLE `detailpembayaran`
  MODIFY `id_detailpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategoripelanggaran`
--
ALTER TABLE `kategoripelanggaran`
  MODIFY `id_katpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rincianpembayaran`
--
ALTER TABLE `rincianpembayaran`
  MODIFY `id_rincianpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `id_tahunakademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailpembayaran`
--
ALTER TABLE `detailpembayaran`
  ADD CONSTRAINT `id_pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_rincianpembayaran` FOREIGN KEY (`id_rincianpembayaran`) REFERENCES `rincianpembayaran` (`id_rincianpembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
