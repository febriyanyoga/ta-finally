-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mei 2018 pada 13.38
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta-finally`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acc_kegiatan`
--

CREATE TABLE `acc_kegiatan` (
  `kode_acc_kegiatan` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_jenis_kegiatan` int(20) NOT NULL,
  `ranking` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_menu`
--

CREATE TABLE `akses_menu` (
  `kode_akses_menu` int(10) NOT NULL,
  `kode_jabatan_unit` int(10) NOT NULL,
  `kode_menu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_menu`
--

INSERT INTO `akses_menu` (`kode_akses_menu`, `kode_jabatan_unit`, `kode_menu`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 1, 2),
(4, 7, 3),
(5, 9, 3),
(6, 11, 3),
(7, 12, 3),
(8, 14, 3),
(9, 15, 3),
(10, 16, 3),
(11, 17, 3),
(12, 18, 3),
(13, 19, 3),
(14, 20, 3),
(15, 21, 3),
(16, 22, 3),
(17, 5, 4),
(18, 3, 5),
(19, 13, 6),
(20, 3, 8),
(21, 1, 7),
(22, 2, 7),
(23, 3, 7),
(24, 4, 7),
(25, 5, 7),
(26, 6, 7),
(27, 7, 7),
(28, 8, 7),
(29, 9, 7),
(30, 10, 7),
(31, 11, 7),
(32, 12, 7),
(33, 14, 7),
(34, 15, 7),
(35, 16, 7),
(36, 17, 7),
(37, 18, 7),
(38, 19, 7),
(39, 20, 7),
(40, 21, 7),
(41, 22, 7),
(42, 1, 9),
(43, 2, 9),
(44, 3, 9),
(45, 4, 9),
(46, 5, 9),
(47, 6, 9),
(48, 7, 9),
(49, 8, 9),
(50, 9, 9),
(51, 10, 9),
(52, 11, 9),
(53, 12, 9),
(54, 14, 9),
(55, 15, 9),
(56, 16, 9),
(57, 17, 9),
(58, 18, 9),
(59, 19, 9),
(60, 20, 9),
(61, 21, 9),
(62, 22, 9),
(63, 5, 10),
(64, 6, 10),
(65, 5, 11),
(66, 6, 11),
(67, 3, 12),
(68, 4, 12),
(69, 3, 13),
(70, 4, 13),
(71, 1, 14),
(72, 2, 14),
(73, 1, 15),
(74, 2, 15),
(75, 1, 16),
(76, 2, 16),
(77, 1, 17),
(78, 3, 17),
(79, 5, 17),
(80, 7, 17),
(81, 9, 17),
(82, 11, 17),
(83, 12, 17),
(84, 14, 17),
(85, 15, 17),
(86, 16, 17),
(87, 17, 17),
(88, 18, 17),
(89, 19, 17),
(90, 20, 17),
(91, 21, 17),
(92, 22, 17),
(93, 3, 18),
(94, 4, 18),
(95, 3, 3);

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
(405, 1525257071, '::1', 'hRjCUNvN'),
(406, 1525257232, '::1', 'eHTE0zXD'),
(407, 1525257263, '::1', 'g7AW2zyb'),
(408, 1525258093, '::1', 'lT5uS083');

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
(340305180219950002, 'Febriyan Yoga Pratama', 'Laki - laki', 'Gunungkidul', '1998-05-01', 'Gunungkidul\r\n', '081217109583', '2018-05-01 16:45:01', NULL),
(340305180219950003, 'Santoso Aji Saputro', 'Laki - laki', 'Purworejo', '1998-05-02', 'Purworejo', '085215262992', '2018-05-02 05:09:34', NULL),
(340305180219950004, 'Daniel Tri Widyatmoko', 'Laki - laki', 'Purworejo', '1998-05-02', 'Sagan', '085641199006', '2018-05-02 05:16:31', NULL),
(340305180219950005, 'Fadhilah Herawati', 'Perempuan', 'Jakarta', '1998-05-02', 'Jalan C. Simanjuntak', '081284447228', '2018-05-02 05:21:01', NULL),
(340305180219950006, 'Yulia Indah Sulistyorini', 'Laki - laki', 'Purworejo', '1997-07-05', 'Klebengan', '085215262992', '2018-05-02 05:22:55', NULL),
(340305180219950007, 'Deni Sulistyanto', 'Laki - laki', 'Gunungkidul', '1998-05-02', 'Ponjong', '0895330602105', '2018-05-02 05:26:25', NULL),
(340305180219950008, 'Riyan Kurniawan', 'Laki - laki', 'Gunungkidul', '1998-05-02', 'Semin', '082242702499', '2018-05-02 05:28:32', NULL),
(340305180219950009, 'Ika Endaryani', 'Perempuan', 'Gunungkidul', '1998-05-02', 'Pampang', '089658407696', '2018-05-02 05:30:43', NULL),
(340305180219950011, 'Vega Candra Mulia', 'Perempuan', 'Gunungkidul', '1998-05-02', 'Pampang', '081804238817', '2018-05-02 05:32:02', NULL),
(340305180219950012, 'Peni Kurniawati', 'Perempuan', 'Bantul', '1998-05-02', 'Bantul', '0987654321', '2018-05-02 05:33:46', NULL);

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
(1, '92d5078af21f868fdbb54a52431a000f.pdf', 'pegawai', '61.17', 'aktif', '2018-04-25 10:45:10', '2018-04-25 10:45:10'),
(9, '57414f2e9b1e4b7cf21743ba5dffdc12.pdf', 'barang', '335.1', 'aktif', '2018-04-25 13:18:18', '2018-04-25 13:18:18'),
(10, '4cf055ffa9cb21472c4c76623a3b74cf.pdf', 'mahasiswa', '61.17', 'aktif', '2018-04-25 13:18:21', '2018-04-25 13:18:21'),
(11, '3c4ec338cc0fd080da32a878130dcc8b.pdf', 'mahasiswa', '61.17', 'aktif', '2018-05-01 04:06:55', '2018-05-01 04:06:55');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pengajuan`
--

CREATE TABLE `item_pengajuan` (
  `kode_item_pengajuan` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `kode_pengajuan` int(20) DEFAULT NULL,
  `status_pengajuan` enum('baru','proses','selesai','tolak','tunda','pengajuan') NOT NULL DEFAULT 'baru',
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
(5, 'Mahasiswa', '2018-04-02 02:54:55', '2018-05-01 03:36:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_unit`
--

CREATE TABLE `jabatan_unit` (
  `kode_jabatan_unit` int(20) NOT NULL,
  `kode_jabatan` int(20) NOT NULL,
  `kode_unit` int(20) NOT NULL,
  `pimpinan` enum('ya','tidak') NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jabatan_unit`
--

INSERT INTO `jabatan_unit` (`kode_jabatan_unit`, `kode_jabatan`, `kode_unit`, `pimpinan`) VALUES
(1, 1, 1, 'ya'),
(2, 2, 1, 'tidak'),
(3, 3, 2, 'ya'),
(4, 4, 2, 'tidak'),
(5, 3, 3, 'ya'),
(6, 4, 3, 'tidak'),
(7, 1, 4, 'ya'),
(8, 4, 4, 'tidak'),
(9, 1, 5, 'ya'),
(10, 4, 5, 'tidak'),
(11, 1, 6, 'ya'),
(12, 1, 7, 'ya'),
(13, 5, 8, 'tidak'),
(14, 1, 9, 'ya'),
(15, 1, 10, 'ya'),
(16, 1, 11, 'ya'),
(17, 1, 12, 'ya'),
(18, 1, 13, 'ya'),
(19, 1, 14, 'ya'),
(20, 1, 15, 'ya'),
(21, 1, 16, 'ya'),
(22, 1, 17, 'ya'),
(23, 3, 3, 'tidak');

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
(2, 'aset', '2018-04-01 12:32:49', '2018-04-01 12:32:49');

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
  `dana_disetujui` int(12) NOT NULL,
  `pimpinan` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 'status_pengajuan_brg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_progress`
--

CREATE TABLE `nama_progress` (
  `kode_nama_progress` int(20) NOT NULL,
  `nama_progress` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_progress`
--

INSERT INTO `nama_progress` (`kode_nama_progress`, `nama_progress`, `created_at`, `updated_at`) VALUES
(1, 'DITERIMA', '2018-04-03 11:08:16', '2018-04-18 08:25:13'),
(2, 'DITOLAK', '2018-04-03 11:08:16', '2018-04-03 11:08:16'),
(3, 'PEMAKETAN', '2018-04-27 15:21:12', '2018-05-01 03:38:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `kode_pengajuan` int(20) NOT NULL,
  `nama_pengajuan` varchar(20) NOT NULL,
  `file_rab` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `no_identitas` bigint(20) NOT NULL,
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
(15, 340305180219950002, 1, 'febriyanyoga@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'aktif', '1', '2018-05-02', NULL, '2018-05-01 16:45:02', '2018-05-01 16:47:45'),
(16, 340305180219950003, 2, 'sekdep@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:09:34', NULL),
(17, 340305180219950004, 3, 'manajer_sarpras@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'aktif', '1', '2018-05-03', NULL, '2018-05-02 05:16:31', '2018-05-02 10:33:44'),
(18, 340305180219950005, 5, 'manajer_keuangan@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:21:01', NULL),
(19, 340305180219950006, 4, 'yulia.indah.s@mail.ugm.ac.id', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:22:55', '2018-05-02 05:23:04'),
(20, 340305180219950007, 6, 'staf_keuangan@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:26:25', NULL),
(21, 340305180219950008, 4, 'staf_sarpras@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:28:32', NULL),
(22, 340305180219950009, 13, 'mahasiswa@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:30:43', NULL),
(23, 340305180219950011, 7, 'kepala_akademik@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:32:02', NULL),
(24, 340305180219950012, 8, 'staf_akademik@gmail.com', 'ee3ee6f00d2d5e2d7c028529cca6a311', 'tidak aktif', '0', '2018-05-03', NULL, '2018-05-02 05:33:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `kode_progress` int(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kode_fk` int(20) NOT NULL,
  `kode_nama_progress` int(20) NOT NULL,
  `komentar` varchar(50) NOT NULL,
  `waktu_progress` time NOT NULL,
  `tgl_progress` date NOT NULL,
  `jenis_progress` enum('barang','kegiatan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Indexes for table `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  ADD PRIMARY KEY (`kode_acc_kegiatan`),
  ADD KEY `kode_jabatan` (`id_pengguna`),
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
  ADD KEY `no_identitas` (`no_identitas`),
  ADD KEY `kode_unit_jabatan` (`kode_jabatan_unit`);

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
-- AUTO_INCREMENT for table `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  MODIFY `kode_acc_kegiatan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `kode_akses_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;
--
-- AUTO_INCREMENT for table `dokumen_prosedur`
--
ALTER TABLE `dokumen_prosedur`
  MODIFY `kode_doc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `kode_file` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_pengajuan`
--
ALTER TABLE `item_pengajuan`
  MODIFY `kode_item_pengajuan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kode_jabatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jabatan_unit`
--
ALTER TABLE `jabatan_unit`
  MODIFY `kode_jabatan_unit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `kode_jenis_barang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `kode_jenis_kegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kode_kegiatan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `kode_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `nama_progress`
--
ALTER TABLE `nama_progress`
  MODIFY `kode_nama_progress` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `kode_pengajuan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `kode_progress` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `kode_unit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acc_kegiatan`
--
ALTER TABLE `acc_kegiatan`
  ADD CONSTRAINT `acc_kegiatan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acc_kegiatan_ibfk_2` FOREIGN KEY (`kode_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`kode_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pengguna_ibfk_3` FOREIGN KEY (`no_identitas`) REFERENCES `data_diri` (`no_identitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengguna_ibfk_4` FOREIGN KEY (`kode_jabatan_unit`) REFERENCES `jabatan_unit` (`kode_jabatan_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`kode_nama_progress`) REFERENCES `nama_progress` (`kode_nama_progress`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
