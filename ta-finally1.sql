-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jun 2018 pada 18.00
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta-finally1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc_barang`
--

CREATE TABLE `acc_barang` (
  `kode_acc_barang` int(11) NOT NULL,
  `kode_jabatan_unit` int(11) NOT NULL,
  `kode_jenis_pengajuan` enum('1','2') NOT NULL,
  `ranking` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `acc_barang`
--

INSERT INTO `acc_barang` (`kode_acc_barang`, `kode_jabatan_unit`, `kode_jenis_pengajuan`, `ranking`, `created_at`, `updated_at`) VALUES
(1, 5, '2', 1, '2018-05-20 12:16:03', NULL),
(2, 3, '1', 1, '2018-05-20 12:16:16', '2018-05-30 04:46:39'),
(7, 7, '1', 2, '2018-05-20 12:43:42', '2018-05-30 04:46:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc_kegiatan`
--

CREATE TABLE `acc_kegiatan` (
  `kode_acc_kegiatan` int(20) NOT NULL,
  `kode_jabatan_unit` int(20) NOT NULL,
  `kode_jenis_kegiatan` int(20) NOT NULL,
  `ranking` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `acc_kegiatan`
--

INSERT INTO `acc_kegiatan` (`kode_acc_kegiatan`, `kode_jabatan_unit`, `kode_jenis_kegiatan`, `ranking`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 1, '2018-05-06 15:31:53', '2018-06-05 01:54:32'),
(39, 2, 2, 2, '2018-06-05 01:55:15', '2018-06-05 02:32:43'),
(40, 1, 2, 1, '2018-06-05 01:56:38', '2018-06-05 02:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_menu`
--

CREATE TABLE `akses_menu` (
  `kode_akses_menu` int(10) NOT NULL,
  `kode_jabatan_unit` int(10) NOT NULL,
  `kode_menu` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_menu`
--

INSERT INTO `akses_menu` (`kode_akses_menu`, `kode_jabatan_unit`, `kode_menu`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(4, 7, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(5, 9, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(6, 11, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(7, 12, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(8, 14, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(9, 15, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(10, 16, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(11, 17, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(12, 18, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(13, 19, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(14, 20, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(15, 21, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(19, 13, 6, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(20, 3, 8, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(21, 1, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(22, 2, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(23, 3, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(24, 4, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(25, 5, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(26, 6, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(27, 7, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(28, 8, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(29, 9, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(30, 10, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(31, 11, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(32, 12, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(33, 14, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(34, 15, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(35, 16, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(36, 17, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(37, 18, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(38, 19, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(39, 20, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(40, 21, 7, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(42, 1, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(43, 2, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(44, 3, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(45, 4, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(46, 5, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(47, 6, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(48, 7, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(49, 8, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(50, 9, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(51, 10, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(52, 11, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(53, 12, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(54, 14, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(55, 15, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(56, 16, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(57, 17, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(58, 18, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(59, 19, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(60, 20, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(61, 21, 9, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(64, 6, 10, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(66, 6, 11, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(67, 3, 12, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(68, 4, 12, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(69, 3, 13, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(70, 4, 13, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(71, 1, 14, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(72, 2, 14, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(73, 1, 15, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(74, 2, 15, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(75, 1, 16, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(76, 2, 16, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(77, 1, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(78, 3, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(79, 5, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(80, 7, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(81, 9, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(82, 11, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(83, 12, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(84, 14, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(85, 15, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(86, 16, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(87, 17, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(88, 18, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(89, 19, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(90, 20, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(91, 21, 17, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(94, 4, 18, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(95, 3, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(96, 1, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(97, 5, 3, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(103, 5, 4, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(104, 3, 5, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(105, 7, 4, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(109, 7, 5, '2018-05-24 15:12:06', '0000-00-00 00:00:00'),
(126, 1, 19, '2018-06-03 12:48:58', '0000-00-00 00:00:00'),
(127, 1, 20, '2018-06-03 12:48:58', '0000-00-00 00:00:00'),
(128, 1, 21, '2018-06-03 12:49:10', '0000-00-00 00:00:00'),
(129, 2, 1, '2018-06-05 01:55:15', '0000-00-00 00:00:00'),
(130, 1, 1, '2018-06-05 01:56:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(20) NOT NULL,
  `kode_jenis_barang` int(20) DEFAULT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_jenis_barang`, `nama_barang`, `created_at`, `updated_at`) VALUES
(1, 3, 'Laptop', '2018-05-11 06:28:09', NULL),
(2, 3, 'Meja', '2018-05-30 04:43:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(20) NOT NULL,
  `captcha_time` int(10) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1071, 1528212738, '::1', '52969898'),
(1072, 1528212739, '::1', '14862989'),
(1073, 1528212759, '::1', '55929233'),
(1074, 1528212761, '::1', '01631958');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_diri`
--

CREATE TABLE `data_diri` (
  `no_identitas` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jen_kel` enum('Laki - laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_diri`
--

INSERT INTO `data_diri` (`no_identitas`, `nama`, `jen_kel`, `tmp_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(123456, 'Andi Fariel', 'Laki - laki', 'Yogyakarta', '1998-06-05', 'yogyakarta', '08177777', '2018-06-05 05:24:01', NULL),
(12345678, 'Dharia Nugraheni', 'Perempuan', 'Yogyakarta', '1998-06-05', 'yogyakarta', '0819999999', '2018-06-05 04:50:46', NULL),
(1120120075, 'Nur Rohman Rosyid', 'Laki - laki', 'Yogyakarta', '1998-06-05', 'yogyakarta', '0813333', '2018-06-05 04:48:14', NULL),
(197305282002121001, 'Hidayat Nur Isnianto', 'Laki - laki', 'Yogyakarta', '1998-06-05', 'Yogyakarta', '0812222222', '2018-06-05 04:42:44', NULL),
(198706122015042002, 'Anindita Suryarasmi', 'Perempuan', 'Yogyakarta', '1998-06-05', 'Sleman', '0811111111', '2018-06-05 04:33:08', NULL),
(340305180219950002, 'Febriyan Yoga Pratama', 'Laki - laki', 'Gunungkidul', '1995-02-18', 'Gunungkidul', '081217109583', '2018-05-01 16:45:01', '2018-06-02 02:02:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_prosedur`
--

CREATE TABLE `dokumen_prosedur` (
  `kode_doc` int(5) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tipe_doc` enum('pegawai','mahasiswa','barang') NOT NULL,
  `size` varchar(5) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen_prosedur`
--

INSERT INTO `dokumen_prosedur` (`kode_doc`, `nama_file`, `tipe_doc`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, '92d5078af21f868fdbb54a52431a000f.pdf', 'pegawai', '61.17', 'tidak', '2018-05-15 16:52:01', '2018-05-15 16:52:01'),
(9, '57414f2e9b1e4b7cf21743ba5dffdc12.pdf', 'barang', '335.1', 'aktif', '2018-04-25 13:18:18', '2018-04-25 13:18:18'),
(10, '4cf055ffa9cb21472c4c76623a3b74cf.pdf', 'mahasiswa', '61.17', 'tidak', '2018-05-15 16:52:04', '2018-05-15 16:52:04'),
(11, '3c4ec338cc0fd080da32a878130dcc8b.pdf', 'mahasiswa', '61.17', 'tidak', '2018-05-15 16:52:24', '2018-05-15 16:52:24'),
(12, '8d0a4354565c26c624e332fdd45b3448.pdf', 'pegawai', '1197.', 'aktif', '2018-05-15 16:51:58', '2018-05-15 16:51:58'),
(13, '72be27e8f875c61737cb3b7d942608d0.pdf', 'mahasiswa', '1219.', 'aktif', '2018-05-15 16:52:48', '2018-05-15 16:52:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_upload`
--

CREATE TABLE `file_upload` (
  `kode_file` int(10) NOT NULL,
  `kode_kegiatan` int(20) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `ukuran_file` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_upload`
--

INSERT INTO `file_upload` (`kode_file`, `kode_kegiatan`, `nama_file`, `ukuran_file`, `created_at`, `updated_at`) VALUES
(9, 20, '98f13708210194c475687be6106a3b84.pdf', 52.42, '2018-06-05 06:29:52', NULL),
(10, 21, '3c59dc048e8850243be8079a5c74d079.pdf', 238.6, '2018-06-05 09:55:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pengajuan`
--

CREATE TABLE `item_pengajuan` (
  `kode_item_pengajuan` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `kode_pengajuan` int(20) DEFAULT NULL,
  `status_pengajuan` enum('baru','proses','selesai','tolak','tunda','pengajuan','disetujui','pengajuanRAB') NOT NULL DEFAULT 'baru',
  `tgl_item_pengajuan` date NOT NULL,
  `nama_item_pengajuan` varchar(50) NOT NULL,
  `status_persediaan` enum('tersedia','tidak tersedia') NOT NULL DEFAULT 'tidak tersedia',
  `url` varchar(100) NOT NULL,
  `harga_satuan` int(12) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `file_gambar` varchar(200) NOT NULL,
  `pimpinan` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` int(20) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Kepala', '2018-04-02 02:51:51', '2018-04-17 15:53:15'),
(2, 'Sekretaris', '2018-04-02 02:51:51', '2018-04-17 15:53:25'),
(3, 'Manajer', '2018-04-02 02:54:48', '2018-04-17 15:53:35'),
(4, 'Staf', '2018-04-02 02:54:48', '2018-04-17 15:53:45'),
(5, 'Mahasiswa', '2018-04-02 02:54:55', '2018-05-01 03:36:51'),
(6, 'Laboran', '2018-05-30 04:33:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_unit`
--

CREATE TABLE `jabatan_unit` (
  `kode_jabatan_unit` int(20) NOT NULL,
  `kode_jabatan` int(20) NOT NULL,
  `kode_unit` int(20) NOT NULL,
  `atasan` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jabatan_unit`
--

INSERT INTO `jabatan_unit` (`kode_jabatan_unit`, `kode_jabatan`, `kode_unit`, `atasan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(2, 2, 1, 'tidak', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(3, 3, 2, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(4, 4, 2, 'tidak', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(5, 3, 3, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(6, 4, 3, 'tidak', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(7, 1, 4, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(8, 4, 4, 'tidak', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(9, 1, 5, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(10, 4, 5, 'tidak', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(11, 1, 6, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(12, 1, 7, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(13, 5, 8, 'tidak', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(14, 1, 9, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(15, 1, 10, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(16, 1, 11, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(17, 1, 12, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(18, 1, 13, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(19, 1, 14, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(20, 1, 15, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(21, 1, 16, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(23, 1, 17, 'ya', '2018-05-24 12:57:31', '0000-00-00 00:00:00'),
(24, 4, 1, 'tidak', '2018-06-05 02:27:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kode_jenis_barang` int(20) NOT NULL,
  `nama_jenis_barang` enum('habis pakai','aset','belum terdefinisi') NOT NULL DEFAULT 'belum terdefinisi',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_jenis_barang`, `nama_jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 'habis pakai', '2018-04-01 12:32:49', '2018-05-01 03:38:15'),
(2, 'aset', '2018-04-01 12:32:49', '2018-04-01 12:32:49'),
(3, 'belum terdefinisi', '2018-05-05 04:11:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `kode_jenis_kegiatan` int(20) NOT NULL,
  `nama_jenis_kegiatan` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`kode_jenis_kegiatan`, `nama_jenis_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan Pegawai', '2018-04-01 12:12:29', '2018-04-18 07:20:52'),
(2, 'Kegiatan Mahasiswa', '2018-04-01 12:12:29', '2018-04-01 12:12:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kode_kegiatan` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_jenis_kegiatan` int(20) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `tgl_selesai_kegiatan` date NOT NULL,
  `dana_diajukan` int(12) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `pimpinan` bigint(20) NOT NULL,
  `status_kegiatan` enum('Disetujui','Ditolak') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`kode_kegiatan`, `id_pengguna`, `kode_jenis_kegiatan`, `nama_kegiatan`, `tgl_kegiatan`, `tgl_selesai_kegiatan`, `dana_diajukan`, `tgl_pengajuan`, `pimpinan`, `status_kegiatan`, `created_at`, `updated_at`) VALUES
(20, 15, 1, 'Round Up', '2018-06-05', '2018-06-05', 9000000, '2018-06-05', 1, 'Disetujui', '2018-06-05 06:29:51', '2018-06-05 06:30:05'),
(21, 15, 1, 'Komsi WAR', '2018-06-05', '2018-06-05', 80000, '2018-06-05', 1, NULL, '2018-06-05 09:55:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pengguna`
--

CREATE TABLE `log_pengguna` (
  `id_log` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `no_identitas_lama` bigint(20) NOT NULL,
  `no_identitas_baru` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_pengguna`
--

INSERT INTO `log_pengguna` (`id_log`, `id_pengguna`, `no_identitas_lama`, `no_identitas_baru`, `created_at`) VALUES
(35, 15, 340305180219950002, 3403051802199503, '2018-06-03 13:21:30'),
(36, 15, 3403051802199503, 340305180219950002, '2018-06-03 13:21:49'),
(37, 21, 340305180219950008, 340305180219950002, '2018-06-04 05:52:14'),
(38, 21, 340305180219950002, 340305180219950005, '2018-06-04 05:58:41'),
(39, 21, 340305180219950005, 340305180219950006, '2018-06-04 06:21:51'),
(40, 21, 340305180219950006, 340305180219950002, '2018-06-04 06:26:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lupa_kata_sandi`
--

CREATE TABLE `lupa_kata_sandi` (
  `kode_lupa_kata_sandi` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `token` varchar(225) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lupa_kata_sandi`
--

INSERT INTO `lupa_kata_sandi` (`kode_lupa_kata_sandi`, `id_pengguna`, `token`, `created`, `expired`) VALUES
(6, 15, '52c4ffdfd22858e28f8707c93b9d30cd', '2018-05-13 11:40:00', '2018-05-13 13:40:00'),
(7, 28, '5cbca14523800026ba5dd75bdd272652', '2018-05-18 15:46:00', '2018-05-18 17:46:00'),
(8, 29, '244dd22a9fbae1b1e59bcefa87f77174', '2018-05-18 16:18:00', '2018-05-18 18:18:00'),
(9, 15, 'e44f00db12f9907195454fb6d76a81c7', '2018-05-19 00:00:00', '2018-05-19 02:00:00'),
(10, 15, 'b41e26ae43e1b3d01136f546ac5ccb3e', '2018-06-01 14:59:00', '2018-06-01 16:59:00'),
(11, 15, '112b217c82ac47dd5d048c3cd20311e1', '2018-06-02 01:44:00', '2018-06-02 03:44:00'),
(12, 34, '2bce3734b19384446d8e54b6a415595e', '2018-06-02 13:14:00', '2018-06-02 15:14:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `kode_menu` int(10) NOT NULL,
  `nama_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`kode_menu`, `nama_menu`) VALUES
(1, 'persetujuan_keg_mhs'),
(2, 'persetujuan_keg_peg'),
(3, 'persetujuan_keg_staf'),
(4, 'persetujuan_rab'),
(5, 'persetujuan_brg'),
(6, 'pengajuan_keg_mhs'),
(7, 'pengajuan_keg_peg'),
(8, 'pengajuan_rab'),
(9, 'pengajuan_brg'),
(10, 'status_pengajuan_keg_mhs'),
(11, 'status_pengajuan_keg_peg'),
(12, 'kelola_brg'),
(13, 'klasifikasi_brg'),
(14, 'daftar_pengguna'),
(15, 'konfigurasi_sistem'),
(16, 'prosedur'),
(17, 'persetujuan_brg_staf'),
(18, 'status_pengajuan_brg'),
(19, 'daftar_pimpinan_unit'),
(20, 'riwayat_pengajuan_unit'),
(21, 'riwayat_persetujuan_unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_progress`
--

CREATE TABLE `nama_progress` (
  `kode_nama_progress` int(20) NOT NULL,
  `nama_progress` varchar(30) NOT NULL,
  `jenis_nama_progress` enum('barang','kegiatan','semua') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_progress`
--

INSERT INTO `nama_progress` (`kode_nama_progress`, `nama_progress`, `jenis_nama_progress`, `created_at`, `updated_at`) VALUES
(1, 'DITERIMA', 'semua', '2018-04-03 11:08:16', '2018-05-28 07:03:34'),
(2, 'DITOLAK', 'semua', '2018-04-03 11:08:16', '2018-05-24 04:43:13'),
(3, 'PEMAKETAN', 'barang', '2018-04-27 15:21:12', '2018-05-13 08:50:26'),
(4, 'SELESAI', 'semua', '2018-05-08 16:36:39', '2018-05-24 04:43:34'),
(5, 'PENGAJUAN SPPD', 'kegiatan', '2018-05-13 06:52:41', '2018-05-24 04:43:47'),
(6, 'SPPD SIAP', 'kegiatan', '2018-05-13 06:52:50', '2018-05-24 04:43:51'),
(7, 'PELAKSANAAN KEGIATAN', 'kegiatan', '2018-05-13 06:53:27', '2018-05-24 04:43:56'),
(8, 'MENUNGGU DOKUMEN SPJ', 'kegiatan', '2018-05-13 06:54:13', '2018-05-24 04:44:00'),
(9, 'PENGAJUAN PEMBAYARAN', 'kegiatan', '2018-05-13 06:54:30', '2018-05-24 04:44:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `kode_pengajuan` int(20) NOT NULL,
  `nama_pengajuan` varchar(20) NOT NULL,
  `file_rab` varchar(30) NOT NULL,
  `status_pengajuan_rab` enum('baru','diterima','ditolak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `no_identitas` bigint(20) DEFAULT NULL,
  `kode_jabatan_unit` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `status_email` enum('0','1') NOT NULL,
  `exp_date` date NOT NULL,
  `file_profil` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `no_identitas`, `kode_jabatan_unit`, `email`, `password`, `status`, `status_email`, `exp_date`, `file_profil`, `created_at`, `updated_at`) VALUES
(15, 340305180219950002, 1, 'kepala_departemen@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-05-02', '9bf31c7ff062936a96d3c8bd1f8f2ff3.jpg', '2018-05-01 16:45:02', '2018-06-05 05:12:16'),
(39, 198706122015042002, 5, 'manajer_keuangan@tedi.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 04:03:20', '2018-06-05 05:05:10'),
(40, NULL, 3, 'manajer_sarpras@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 04:22:56', '2018-06-05 05:05:15'),
(42, 198706122015042002, 24, 'anin@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 04:33:08', '2018-06-05 04:35:11'),
(43, 197305282002121001, 2, 'isnan@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 04:42:44', '2018-06-05 10:07:49'),
(44, 1120120075, 24, 'rosyid@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 04:48:15', '2018-06-05 06:01:16'),
(45, 12345678, 6, 'dharia@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 04:50:46', '2018-06-05 04:52:58'),
(46, NULL, 7, 'kepala_akademik@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:01:27', '2018-06-05 05:10:47'),
(47, NULL, 9, 'kepala_tu@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:01:51', NULL),
(48, NULL, 11, 'kepala_lab_1@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:02:27', '2018-06-05 05:10:03'),
(49, NULL, 12, 'kepala_kemahasiswaan@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:02:57', NULL),
(50, NULL, 14, 'kepala_lab_2@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:04:57', NULL),
(51, NULL, 15, 'kepala_lab_3@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:11:43', NULL),
(52, NULL, 16, 'kepala_lab_4@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:12:04', NULL),
(53, NULL, 17, 'kepala_lab_5@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:14:42', NULL),
(54, NULL, 18, 'kaprodi_komsi@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:16:04', NULL),
(55, NULL, 19, 'kaprodi_elektro@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:18:00', '2018-06-05 05:19:49'),
(56, NULL, 20, 'kaprodi_tj@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:18:21', '2018-06-05 05:19:56'),
(57, NULL, 21, 'kaprodi_elins@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:18:48', NULL),
(58, NULL, 23, 'kaprodi_metins@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:19:20', NULL),
(59, 123456, 4, 'andi@tedi.com', 'aea1bef2ebd16eb17decf9354ac860cb', 'aktif', '1', '2018-06-06', NULL, '2018-06-05 05:24:01', '2018-06-05 05:24:58');

--
-- Trigger `pengguna`
--
DELIMITER $$
CREATE TRIGGER `log_pengguna` AFTER UPDATE ON `pengguna` FOR EACH ROW BEGIN
IF NEW.no_identitas <> OLD.no_identitas 
THEN
INSERT INTO log_pengguna
    set id_pengguna = OLD.id_pengguna,
    no_identitas_lama=OLD.no_identitas,
    no_identitas_baru=NEW.no_identitas;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `kode_progress` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_fk` int(20) NOT NULL,
  `kode_nama_progress` int(20) NOT NULL,
  `kode_jabatan_unit` int(20) NOT NULL,
  `komentar` varchar(50) NOT NULL,
  `waktu_progress` time NOT NULL,
  `tgl_progress` date NOT NULL,
  `jenis_progress` enum('barang','kegiatan','barang_staf','kegiatan_staf','rab_lama') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`kode_progress`, `id_pengguna`, `kode_fk`, `kode_nama_progress`, `kode_jabatan_unit`, `komentar`, `waktu_progress`, `tgl_progress`, `jenis_progress`, `created_at`, `updated_at`) VALUES
(1, 15, 2, 1, 1, 'saya setuju dengan kegiatan ini', '15:15:28', '2018-06-01', 'kegiatan', '2018-06-01 08:15:28', '2018-06-01 12:21:53'),
(5, 15, 19, 2, 1, ' t', '22:33:07', '2018-06-02', 'kegiatan', '2018-06-02 15:33:07', NULL),
(6, 15, 20, 1, 1, ' q', '13:30:05', '2018-06-05', 'kegiatan', '2018-06-05 06:30:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `kode_unit` int(20) NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`kode_unit`, `nama_unit`, `created_at`, `updated_at`) VALUES
(1, 'Departemen', '2018-04-02 02:37:35', '2018-04-17 16:26:31'),
(2, 'Sarana dan Prasarana', '2018-04-02 02:37:35', '2018-04-02 02:37:35'),
(3, 'Keuangan', '2018-04-02 02:48:17', '2018-04-02 02:48:17'),
(4, 'Akademik', '2018-04-02 02:48:17', '2018-04-02 02:48:17'),
(5, 'Tata Usaha', '2018-04-02 02:48:37', '2018-04-02 02:48:37'),
(6, 'Laboratorium Rekayasa Perangkat Lunak', '2018-04-02 02:48:37', '2018-04-25 14:46:35'),
(7, 'Kemahasiswaan', '2018-04-02 02:48:58', '2018-04-02 02:48:58'),
(8, 'Keluarga Mahasiswa TEDI', '2018-04-02 02:48:58', '2018-05-01 03:37:12'),
(9, 'Laboratorium Tenaga Listrik', '2018-04-25 14:47:03', NULL),
(10, 'Laboratorium Elektronika ', '2018-04-25 14:47:33', NULL),
(11, 'Laboratorium Teknologi dan Aplikasi Jaringan ', '2018-04-25 14:48:00', NULL),
(12, 'Laboratorium Instrumentasi dan Kendali', '2018-04-25 14:48:49', NULL),
(13, 'Komputer dan Sistem Informasi', '2018-04-25 14:49:24', NULL),
(14, 'Teknik Elektro', '2018-04-25 14:49:34', NULL),
(15, 'Teknik Jaringan', '2018-04-25 14:49:45', NULL),
(16, 'Elektronika dan Instrumentasi', '2018-04-25 14:50:01', NULL),
(17, 'Metrologi dan Instrumentasi', '2018-04-25 14:50:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_barang`
--
ALTER TABLE `acc_barang`
  ADD PRIMARY KEY (`kode_acc_barang`),
  ADD KEY `kode_jabatan_unit` (`kode_jabatan_unit`);

--
-- Indexes for table `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  ADD PRIMARY KEY (`kode_acc_kegiatan`),
  ADD KEY `kode_jabatan` (`kode_jabatan_unit`),
  ADD KEY `kode_jenis_kegiatan` (`kode_jenis_kegiatan`);

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`kode_akses_menu`),
  ADD KEY `kode_jabatan` (`kode_jabatan_unit`),
  ADD KEY `kode_menu` (`kode_menu`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kode_jenis_barang` (`kode_jenis_barang`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`no_identitas`);

--
-- Indexes for table `dokumen_prosedur`
--
ALTER TABLE `dokumen_prosedur`
  ADD PRIMARY KEY (`kode_doc`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`kode_file`),
  ADD KEY `kode_kegiatan` (`kode_kegiatan`);

--
-- Indexes for table `item_pengajuan`
--
ALTER TABLE `item_pengajuan`
  ADD PRIMARY KEY (`kode_item_pengajuan`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_pengajuan` (`kode_pengajuan`),
  ADD KEY `item_pengajuan_ibfk_3` (`id_pengguna`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `jabatan_unit`
--
ALTER TABLE `jabatan_unit`
  ADD PRIMARY KEY (`kode_jabatan_unit`),
  ADD KEY `kode_jabatan` (`kode_jabatan`),
  ADD KEY `kode_unit` (`kode_unit`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kode_jenis_barang`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`kode_jenis_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kode_kegiatan`),
  ADD KEY `kode_jenis_kegiatan` (`kode_jenis_kegiatan`),
  ADD KEY `no_identitas` (`id_pengguna`);

--
-- Indexes for table `log_pengguna`
--
ALTER TABLE `log_pengguna`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `lupa_kata_sandi`
--
ALTER TABLE `lupa_kata_sandi`
  ADD PRIMARY KEY (`kode_lupa_kata_sandi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `nama_progress`
--
ALTER TABLE `nama_progress`
  ADD PRIMARY KEY (`kode_nama_progress`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`kode_pengajuan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `kode_unit_jabatan` (`kode_jabatan_unit`),
  ADD KEY `no_identitas` (`no_identitas`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`kode_progress`),
  ADD KEY `kode_kegiatan` (`kode_fk`),
  ADD KEY `kode_nama_progress` (`kode_nama_progress`),
  ADD KEY `no_identitas` (`id_pengguna`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`kode_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_barang`
--
ALTER TABLE `acc_barang`
  MODIFY `kode_acc_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  MODIFY `kode_acc_kegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `kode_akses_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1075;
--
-- AUTO_INCREMENT for table `dokumen_prosedur`
--
ALTER TABLE `dokumen_prosedur`
  MODIFY `kode_doc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `kode_file` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `item_pengajuan`
--
ALTER TABLE `item_pengajuan`
  MODIFY `kode_item_pengajuan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kode_jabatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jabatan_unit`
--
ALTER TABLE `jabatan_unit`
  MODIFY `kode_jabatan_unit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `kode_jenis_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `kode_jenis_kegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kode_kegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `log_pengguna`
--
ALTER TABLE `log_pengguna`
  MODIFY `id_log` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `lupa_kata_sandi`
--
ALTER TABLE `lupa_kata_sandi`
  MODIFY `kode_lupa_kata_sandi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `kode_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `nama_progress`
--
ALTER TABLE `nama_progress`
  MODIFY `kode_nama_progress` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `kode_pengajuan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `kode_progress` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `kode_unit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acc_barang`
--
ALTER TABLE `acc_barang`
  ADD CONSTRAINT `acc_barang_ibfk_1` FOREIGN KEY (`kode_jabatan_unit`) REFERENCES `jabatan_unit` (`kode_jabatan_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  ADD CONSTRAINT `acc_kegiatan_ibfk_2` FOREIGN KEY (`kode_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`kode_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acc_kegiatan_ibfk_3` FOREIGN KEY (`kode_jabatan_unit`) REFERENCES `jabatan_unit` (`kode_jabatan_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD CONSTRAINT `akses_menu_ibfk_3` FOREIGN KEY (`kode_menu`) REFERENCES `menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akses_menu_ibfk_4` FOREIGN KEY (`kode_jabatan_unit`) REFERENCES `jabatan_unit` (`kode_jabatan_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_jenis_barang`) REFERENCES `jenis_barang` (`kode_jenis_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `file_upload`
--
ALTER TABLE `file_upload`
  ADD CONSTRAINT `file_upload_ibfk_1` FOREIGN KEY (`kode_kegiatan`) REFERENCES `kegiatan` (`kode_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `item_pengajuan`
--
ALTER TABLE `item_pengajuan`
  ADD CONSTRAINT `item_pengajuan_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_pengajuan_ibfk_2` FOREIGN KEY (`kode_pengajuan`) REFERENCES `pengajuan` (`kode_pengajuan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `item_pengajuan_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jabatan_unit`
--
ALTER TABLE `jabatan_unit`
  ADD CONSTRAINT `jabatan_unit_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jabatan_unit_ibfk_2` FOREIGN KEY (`kode_unit`) REFERENCES `unit` (`kode_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`kode_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`kode_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_4` FOREIGN KEY (`kode_jabatan_unit`) REFERENCES `jabatan_unit` (`kode_jabatan_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengguna_ibfk_5` FOREIGN KEY (`no_identitas`) REFERENCES `data_diri` (`no_identitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`kode_nama_progress`) REFERENCES `nama_progress` (`kode_nama_progress`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
