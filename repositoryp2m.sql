-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2021 pada 18.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repositoryp2m`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `author`
--

CREATE TABLE `author` (
  `id_author` int(2) NOT NULL,
  `author` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `author`
--

INSERT INTO `author` (`id_author`, `author`) VALUES
(1, 'administrator'),
(2, 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cakupan_forum_ilmiah`
--

CREATE TABLE `cakupan_forum_ilmiah` (
  `id_cakupan` int(1) NOT NULL,
  `cakupan_forum_ilmiah` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cakupan_forum_ilmiah`
--

INSERT INTO `cakupan_forum_ilmiah` (`id_cakupan`, `cakupan_forum_ilmiah`) VALUES
(3, 'Regional'),
(1, 'Tingkat Internasional'),
(2, 'Tingkat Nasionall');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cakupan_publikasi_jurnal`
--

CREATE TABLE `cakupan_publikasi_jurnal` (
  `id_cakupan` int(1) NOT NULL,
  `cakupan_publikasi` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cakupan_publikasi_jurnal`
--

INSERT INTO `cakupan_publikasi_jurnal` (`id_cakupan`, `cakupan_publikasi`) VALUES
(1, 'Jurnal Internasional'),
(2, 'Jurnal Nasional Terakreditasii'),
(3, 'Jurnal Nasional Tidak Terakreditasi (Mempunyai ISSN)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_hki`
--

CREATE TABLE `jenis_hki` (
  `id_jenis` int(1) NOT NULL,
  `jenis_hki` varchar(38) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_hki`
--

INSERT INTO `jenis_hki` (`id_jenis`, `jenis_hki`) VALUES
(6, 'Desain Produk Industri'),
(3, 'Hak Cipta'),
(4, 'Merek Dagang'),
(1, 'Paten'),
(2, 'Paten Sederhana'),
(8, 'Perlindungan Topografi Sirkuit Terpadu'),
(7, 'Perlindungan Varietas Tanaman'),
(5, 'Rahasia Dagang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_luaran_lain`
--

CREATE TABLE `jenis_luaran_lain` (
  `id_jenis` int(1) NOT NULL,
  `jenis_luaran` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_luaran_lain`
--

INSERT INTO `jenis_luaran_lain` (`id_jenis`, `jenis_luaran`) VALUES
(3, 'Desain'),
(4, 'Karya Seni'),
(7, 'Kebijakan'),
(9, 'Media Massa Internasional'),
(8, 'Media Massa Nasional'),
(1, 'Model'),
(2, 'Prototype'),
(5, 'Rekayasa Sosial'),
(6, 'Teknologi Tepat Guna (TTG)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_penelitian`
--

CREATE TABLE `jenis_penelitian` (
  `id_jenis_ini` int(1) NOT NULL,
  `jenis_penelitian` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_penelitian`
--

INSERT INTO `jenis_penelitian` (`id_jenis_ini`, `jenis_penelitian`) VALUES
(2, 'Penelitian Dosen Pemula'),
(1, 'Penelitian Fundamental'),
(3, 'Penelitian Produk Terapan'),
(6, 'Penelitian Search and Share Grant'),
(4, 'Penelitian Sosial, Humaniora, dan Pendidikan'),
(5, 'Penelitian Unggulan Perguruan Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengabdian`
--

CREATE TABLE `jenis_pengabdian` (
  `id_jenis` int(1) NOT NULL,
  `jenis_pengabdian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pengabdian`
--

INSERT INTO `jenis_pengabdian` (`id_jenis`, `jenis_pengabdian`) VALUES
(2, 'IPTEK bagi Kewirausahaan'),
(1, 'IPTEK bagi Masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `id_program` int(2) NOT NULL,
  `kode_prodi` varchar(4) DEFAULT NULL,
  `program_studi` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id_program`, `kode_prodi`, `program_studi`) VALUES
(1, 'AKT', 'Akuntansi'),
(2, 'MNJ', 'Manajemen'),
(3, 'PSI', 'Psikologi'),
(4, 'KOM', 'Ilmu Komunikasi'),
(5, 'DPI', 'Desain Produk'),
(6, 'DKV', 'Desain Komunikasi Visual'),
(7, 'INF', 'Informatika'),
(8, 'SIF', 'Sistem Informasi'),
(9, 'TSP', 'Teknik Sipil'),
(10, 'ARS', 'Arsitektur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skema_penelitian`
--

CREATE TABLE `skema_penelitian` (
  `id_skema` int(1) NOT NULL,
  `skema` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skema_penelitian`
--

INSERT INTO `skema_penelitian` (`id_skema`, `skema`) VALUES
(1, 'Penelitian Dasar'),
(2, 'Penelitian Terapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_hki`
--

CREATE TABLE `status_hki` (
  `id_status` int(1) NOT NULL,
  `status_hki` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_hki`
--

INSERT INTO `status_hki` (`id_status`, `status_hki`) VALUES
(2, 'Granted'),
(1, 'Terdaftar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pemakalah`
--

CREATE TABLE `status_pemakalah` (
  `id_status` int(1) NOT NULL,
  `status_pemakalah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_pemakalah`
--

INSERT INTO `status_pemakalah` (`id_status`, `status_pemakalah`) VALUES
(1, 'Invited / Keynote Speaker'),
(2, 'Pemakalah Biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun`) VALUES
(5, 2015),
(6, 2016),
(7, 2017),
(8, 2018),
(9, 2019),
(10, 2020),
(11, 2021),
(12, 2022),
(13, 2023),
(14, 2024),
(15, 2025),
(16, 2026),
(17, 2027),
(18, 2028),
(19, 2029),
(20, 2030),
(21, 2031);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_buku_ajar`
--

CREATE TABLE `t_buku_ajar` (
  `id_buku_ajar` int(7) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nama_dosen1` varchar(50) DEFAULT NULL,
  `nama_dosen2` varchar(50) DEFAULT NULL,
  `judul` varchar(500) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `jumlah_halaman` int(4) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `file` varchar(600) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL,
  `tahun_penerbitan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dana2_upj`
--

CREATE TABLE `t_dana2_upj` (
  `kode_penelitan` int(3) NOT NULL,
  `ketua_peneliti` varchar(50) NOT NULL,
  `anggota_peneliti_1` varchar(50) DEFAULT NULL,
  `anggota_peneliti_2` varchar(50) DEFAULT NULL,
  `tahun_hibah` int(4) NOT NULL,
  `judul_penelitian` varchar(500) NOT NULL,
  `jenis_penelitian` varchar(25) NOT NULL,
  `dana_usulan` int(9) NOT NULL,
  `dana_disetujui` int(9) NOT NULL,
  `file` varchar(600) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dana2_upj`
--

INSERT INTO `t_dana2_upj` (`kode_penelitan`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_hibah`, `judul_penelitian`, `jenis_penelitian`, `dana_usulan`, `dana_disetujui`, `file`, `valid`) VALUES
(1, 'Clara Moningka', NULL, NULL, 2020, 'pengabdian 1', 'IPTEK bagi Kewirausahaan', 9090909, 9000000, '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce.pdf', NULL),
(2, 'Clara Moningka', NULL, NULL, 2018, 'pengabdian 2', 'IPTEK bagi Masyarakat', 6, 7, '6800821132Jul2020.pdf', NULL),
(3, 'Clara Moningka', NULL, NULL, 2020, 'pengabdian 3', 'IPTEK bagi Masyarakat', 34, 45, '6800821132Jul20201.pdf', NULL),
(4, 'Clara Moningka', NULL, NULL, 2020, 'pengabdian 4', 'IPTEK bagi Masyarakat', 34, 4, '6800821132Aug2020.pdf', NULL),
(5, 'Clara Moningka', NULL, NULL, 2020, 'pengabdian 5', 'IPTEK bagi Masyarakat', 2, 3, '6800821132Aug20201.pdf', NULL),
(6, 'Clara Moningka', NULL, NULL, 2020, 'pengabdian 6', 'IPTEK bagi Masyarakat', 2, 5, '6800821132Aug20202.pdf', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dana_kemenristek`
--

CREATE TABLE `t_dana_kemenristek` (
  `kode_penelitan` int(3) NOT NULL,
  `ketua_peneliti` varchar(50) NOT NULL,
  `anggota_peneliti_1` varchar(50) DEFAULT NULL,
  `anggota_peneliti_2` varchar(50) DEFAULT NULL,
  `tahun_hibah` int(4) NOT NULL,
  `judul_penelitian` varchar(500) NOT NULL,
  `jenis_penelitian` varchar(45) NOT NULL,
  `dana_usulan` int(9) NOT NULL,
  `dana_disetujui` int(9) NOT NULL,
  `file` varchar(600) DEFAULT NULL,
  `skema_penelitian` varchar(55) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dana_kemenristek`
--

INSERT INTO `t_dana_kemenristek` (`kode_penelitan`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_hibah`, `judul_penelitian`, `jenis_penelitian`, `dana_usulan`, `dana_disetujui`, `file`, `skema_penelitian`, `status`, `valid`) VALUES
(1, 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', 2020, 'penelitian sumber dana hiah dikti', 'Penelitian Sosial, Humaniora, dan Pendidikan', 3000000, 4000000, '2013-1-00929-IF_Bab1001.pdf', NULL, NULL, NULL),
(2, 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', 2020, 'Penelitian Sumber Dana Hibah Dikti', 'Penelitian Sosial, Humaniora, dan Pendidikan', 3400000, 2000000, '2013-1-00929-IF_Bab10011.pdf', NULL, NULL, NULL),
(3, 'Endang Pitaloka', NULL, NULL, 2020, 'hibah 3', 'Penelitian Sosial, Humaniora, dan Pendidikan', 98000, 100000, '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce.pdf', NULL, NULL, NULL),
(4, 'Issa Samichat Ismail Tafridj', NULL, NULL, 2020, 'hibah 4', 'Penelitian Unggulan Perguruan Tinggi', 1, 7, '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce1.pdf', NULL, NULL, NULL),
(5, 'Issa Samichat Ismail Tafridj', NULL, NULL, 2020, 'hibah 5', 'Penelitian Dosen Pemula', 1, 3, '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce2.pdf', NULL, NULL, NULL),
(6, 'Issa Samichat Ismail Tafridj', NULL, NULL, 2020, 'hibah 6', 'Penelitian Search and Share Grant', 2, 5, '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce3.pdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dana_kemenristek2`
--

CREATE TABLE `t_dana_kemenristek2` (
  `kode_penelitan` int(3) NOT NULL,
  `ketua_peneliti` varchar(50) NOT NULL,
  `anggota_peneliti_1` varchar(50) DEFAULT NULL,
  `anggota_peneliti_2` varchar(50) DEFAULT NULL,
  `tahun_hibah` int(4) NOT NULL,
  `judul_penelitian` varchar(500) NOT NULL,
  `jenis_penelitian` varchar(45) NOT NULL,
  `dana_usulan` int(9) NOT NULL,
  `dana_disetujui` int(9) NOT NULL,
  `file` varchar(600) DEFAULT NULL,
  `skema_penelitian` varchar(55) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dana_kemenristek2`
--

INSERT INTO `t_dana_kemenristek2` (`kode_penelitan`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_hibah`, `judul_penelitian`, `jenis_penelitian`, `dana_usulan`, `dana_disetujui`, `file`, `skema_penelitian`, `status`, `valid`) VALUES
(1, 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', 2020, 'pengabdian dana di desa abcdefghij', 'IPTEK bagi Masyarakat', 4000000, 5000000, 'Jadwal_Sidang_dan_Seminar_Tugas_Akhir_Tengah_Semester_2020_2021.pdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dana_non2_upj`
--

CREATE TABLE `t_dana_non2_upj` (
  `kode_penelitian` int(3) NOT NULL,
  `ketua_peneliti` varchar(50) NOT NULL,
  `anggota_peneliti_1` varchar(50) DEFAULT NULL,
  `anggota_peneliti_2` varchar(50) DEFAULT NULL,
  `tahun_penelitian` int(4) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `besaran_dana` varchar(9) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dana_non2_upj`
--

INSERT INTO `t_dana_non2_upj` (`kode_penelitian`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_penelitian`, `judul`, `sumber_dana`, `besaran_dana`, `file`, `valid`) VALUES
(1, 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', 2020, 'pengabdian pertama kalai', 'merdeka daniah', '3500000', 'BAB_1.pdf', NULL),
(2, 'Zita Nadia', NULL, NULL, 2020, 'pengabdian non upj ke 2', 'denamitha', '2300000', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce.pdf', NULL),
(3, 'Leenawaty Limantara', NULL, NULL, 2020, 'dana non 1', 'merdeka daniah', '98', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce1.pdf', NULL),
(4, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 2', 'merdeka daniah', '3', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce2.pdf', NULL),
(5, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 3', 'merdeka daniah', '3', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce3.pdf', NULL),
(6, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 4', 'merdeka daniah', '99', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce4.pdf', NULL),
(7, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 5', 'merdeka daniah', '4', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce5.pdf', NULL),
(8, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 6', 'merdeka daniah', '4', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce6.pdf', NULL),
(9, 'Leenawaty Limantara', NULL, NULL, 2018, 'data non 7', 'merdeka daniah', '3', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce7.pdf', NULL),
(10, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 8', 'merdeka daniah', '3', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce8.pdf', NULL),
(11, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 9', 'merdeka daniah', '3', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce9.pdf', NULL),
(12, 'Leenawaty Limantara', NULL, NULL, 2020, 'data non 10', 'merdeka daniah', '19', '2014Inti2339-210XVol3No1ImplementasiAlgoritmaBruteForce10.pdf', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dana_non_upj`
--

CREATE TABLE `t_dana_non_upj` (
  `kode_penelitian` int(3) NOT NULL,
  `ketua_peneliti` varchar(50) NOT NULL,
  `anggota_peneliti_1` varchar(50) DEFAULT NULL,
  `anggota_peneliti_2` varchar(50) DEFAULT NULL,
  `tahun_penelitian` int(4) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `besaran_dana` varchar(11) NOT NULL,
  `file` varchar(500) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dana_non_upj`
--

INSERT INTO `t_dana_non_upj` (`kode_penelitian`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_penelitian`, `judul`, `sumber_dana`, `besaran_dana`, `file`, `valid`) VALUES
(1, 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', 2020, 'penelitian pertama kali', 'aaaaa', '2000000', '2013-1-00929-IF_Bab1001.pdf', NULL),
(2, 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', 2018, 'penelitian sumdan non upj ke 2', 'denamitha', '7000000', 'Jadwal_Sidang_dan_Seminar_Tugas_Akhir_Tengah_Semester_2020_2021.pdf', NULL),
(3, 'Naurissa Biasini', NULL, NULL, 2020, 'penelitian ilmu komunikasi', 'rumah riska asih', '5000000', '2013-1-00929-IF_Bab1001.pdf', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dana_upj`
--

CREATE TABLE `t_dana_upj` (
  `kode_penelitan` int(3) NOT NULL,
  `ketua_peneliti` varchar(50) NOT NULL,
  `anggota_peneliti_1` varchar(50) DEFAULT NULL,
  `anggota_peneliti_2` varchar(50) DEFAULT NULL,
  `tahun_hibah` int(4) NOT NULL,
  `judul_penelitian` varchar(500) NOT NULL,
  `jenis_penelitian` varchar(45) NOT NULL,
  `dana_usulan` int(9) NOT NULL,
  `dana_disetujui` int(9) NOT NULL,
  `file` varchar(600) DEFAULT NULL,
  `skema_penelitian` varchar(55) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_dana_upj`
--

INSERT INTO `t_dana_upj` (`kode_penelitan`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_hibah`, `judul_penelitian`, `jenis_penelitian`, `dana_usulan`, `dana_disetujui`, `file`, `skema_penelitian`, `status`, `valid`) VALUES
(1, 'Aries Yulianto', NULL, NULL, 2020, 'penelitian psikologi 1', 'Penelitian Fundamental', 430000, 500000, 'Pengunaan_Hermeneutika_dalam_al_Quran.pdf', NULL, NULL, NULL),
(2, 'Aries Yulianto', NULL, NULL, 2020, 'penelitian psikologi 2', 'Penelitian Fundamental', 4, 3, '6800821132Aug2020.pdf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_forum_ilmiah`
--

CREATE TABLE `t_forum_ilmiah` (
  `id_perumi` int(7) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nama_dosen1` varchar(50) DEFAULT NULL,
  `nama_dosen2` varchar(50) DEFAULT NULL,
  `judul_makalah` varchar(500) NOT NULL,
  `nama_forum` varchar(200) NOT NULL,
  `institusi_penyelenggara` varchar(100) NOT NULL,
  `waktu_pelakasana_awal` date NOT NULL,
  `waktu_pelakasana_akhir` date NOT NULL,
  `tempat_pelaksana` varchar(50) NOT NULL,
  `status_pemakalah` varchar(25) NOT NULL,
  `cakupan_forum_ilmiah` varchar(21) NOT NULL,
  `file` varchar(600) NOT NULL,
  `tahun_pelaksanaan` int(4) NOT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hki`
--

CREATE TABLE `t_hki` (
  `id_hki` int(7) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nama_dosen1` varchar(50) DEFAULT NULL,
  `nama_dosen2` varchar(50) DEFAULT NULL,
  `judul_hki` varchar(200) NOT NULL,
  `jenis_hki` varchar(40) NOT NULL,
  `no_pendaftaran` varchar(15) NOT NULL,
  `status_hki` varchar(9) NOT NULL,
  `no_hki` varchar(15) DEFAULT NULL,
  `file` varchar(600) NOT NULL,
  `tahun_pelaksanaan` int(4) NOT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hki`
--

INSERT INTO `t_hki` (`id_hki`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul_hki`, `jenis_hki`, `no_pendaftaran`, `status_hki`, `no_hki`, `file`, `tahun_pelaksanaan`, `valid`) VALUES
(1, 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', 'haki pertama', 'Hak Cipta', '12345987', 'Terdaftar', '', '', 2020, NULL),
(2, 'Zita Nadia', NULL, NULL, 'haki ke 2', 'Paten Sederhana', '123454321', 'Granted', '989898', '', 2020, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_login`
--

CREATE TABLE `t_login` (
  `id` int(15) NOT NULL,
  `NIDN` varchar(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `prodi` varchar(28) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_login`
--

INSERT INTO `t_login` (`id`, `NIDN`, `username`, `prodi`, `email`, `password`, `author`) VALUES
(1, '9999999998', 'admin', 'Teknik Sipil', 'admin@upj.ac.id', '$2y$12$qzCd/DZweNWvYwzu26uVl.t06q0UrSTQ/MhQgaJrszJ24vDzpEmnO', 'administrator'),
(2, '9999999997', 'admin1', 'Teknik Sipil', 'admin1@upj.ac.id', '$2y$12$hnVN4pXpsR58wdWsbRx94.2pv/R8aseFIdBTgHGeCFNeMGPRmtn0G', 'administrator'),
(3, '218005', 'Agustine Dwianika', 'Akuntansi', 'agustine.dwianika@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(4, '112034', 'Agustinus Agus Setiawan', 'Teknik Sipil', 'agustinus@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(5, '718015', 'Aries Yulianto', 'Psikologi', 'aries.yulianto@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(6, '211001', 'Augury El Rayeb', 'Sistem Informasi', 'augury.elrayeb@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(7, '711035', 'Chaerul Anwar', 'Sistem Informasi', 'chaerul.anwar@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(8, '417004', 'Clara Moningka', 'Psikologi', 'clara.moningka@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(9, '110007', 'Dalizanolo Hulu', 'Manajemen', 'dalizanolo.hulu@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(10, '617016', 'David Pangaribuan', 'Akuntansi', 'david.pangaribuan@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(11, '113006', 'Denny Ganjar Purnama', 'Sistem Informasi', 'denny.ganjar@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(12, '216035', 'Desi Dwi Kristanto', 'Desain Komunikasi Visual', 'desi.dwikristanto@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(13, '916030', 'Dion Dewa Barata', 'Manajemen', 'dion.dewa@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(14, '118006', 'Donna Angelina Sugianto', 'Desain Produk', 'donna.angelina@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(15, '719021', 'Dwi Siswi Hariyani', 'Arsitektur', 'dwi.siswi@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(16, '716026', 'Eddy Yusuf', 'Teknik Sipil', 'eddy.yusuf@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(17, '211004', 'Eka Permanasari', 'Arsitektur', 'eka.permanasari@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(18, '710003', 'Emirhadi Suganda', 'Arsitektur', 'emirhadi.suganda@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(19, '517015', 'Emma Rachmawati Aliudin', 'Ilmu Komunikasi', 'emma.aliudin@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(20, '912017', 'Endang Pitaloka', 'Manajemen', 'oka@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(21, '814081', 'Feby Hendola', 'Arsitektur', 'feby.kaluara@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(22, '120003', 'Fendi Saputra', 'Manajemen', 'fendi.saputra@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(23, '218010', 'Fitorio Bowo Leksono', 'Desain Produk', 'fitorio.leksono@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(24, '613024', 'Fitriyah Nurhidayah', 'Akuntansi', 'fitriyah.nurhidayah@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(25, '219009', 'Frederik Josep Putuhena', 'Teknik Sipil', 'fj.putuhena@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(26, '812016', 'Fredy Jhon Philip', 'Teknik Sipil', 'fredy.jhon@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(27, '919031', 'Galih Wulandari', 'Teknik Sipil', 'galih.wulandari@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(28, '711049', 'Gita Widya Laksmini Soerjoatmodjo', 'Psikologi', 'gita.soerjoatmodjo@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(29, '311023', 'Hari Nugraha', 'Desain Produk', 'hari.nugraha@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(30, '118001', 'Hastuti Naibaho', 'Manajemen', 'hastuti.naibaho@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(31, '714008', 'Hendi Hermawan', 'Informatika', 'hendi.hermawan@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(32, '719018', 'Hendy Tannady', 'Manajemen', 'hendy.tannady@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(33, '612010', 'Irma Paramita Sofia', 'Akuntansi', 'irma.paramita@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(34, '711005', 'Ismail Alif Siregar', 'Desain Produk', 'ismail.alif@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(35, '120006', 'Issa Samichat Ismail Tafridj', 'Arsitektur', 'issa.samichat@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(36, '120007', 'Isti Purwi Tyas Utami', 'Ilmu Komunikasi', 'isti.purwityas@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(37, '519012', 'Jane L pietra', 'Psikologi', 'jane.pietra@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(38, '116036', 'Johannes Hamonangan Siregar', 'Sistem Informasi', 'johannes.siregar@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(39, '815010', 'Leenawaty Limantara', 'Teknik Sipil', 'leenawaty.limantara@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(40, '211019', 'Marcello Singadji', 'Sistem Informasi', 'marcello.singadji@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(41, '19040', 'Marelinda AL Dianty', 'Teknik Sipil', 'marelianda.aldianty@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(42, '120005', 'Maya Rachmawaty', 'Ilmu Komunikasi', 'maya.rachmawaty@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(43, '219004', 'Michel Sutedja', 'Desain Komunikasi Visual', 'michel.sutedja@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(44, '819025', 'Mohamad Johan Budiman', 'Sistem Informasi', 'johan.budiman@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(45, '911024', 'Mohammad Nasucha', 'Informatika', 'mohammad.nasucha@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(46, '817025', 'Muhammad Mashudi', 'Arsitektur', 'muhammad.mashudi@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(47, '719020', 'Nathaniel Antonio Parulian', 'Ilmu Komunikasi', 'nathaniel.antonio@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(48, '118003', 'Naurissa Biasini', 'Ilmu Komunikasi', 'naurissa.biasini@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(49, '120002', 'Nicky Stephani ', 'Ilmu Komunikasi', 'nicky.stephani@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(50, '118002', 'Nur Uddin', 'Informatika', 'nur.uddin@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(51, '120004', 'Pratika Riris Putrianti ', 'Teknik Sipil', 'pratika.riris@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(52, '211013', 'Prio Handoko', 'Informatika', 'prio.handoko@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(53, '613025', 'Rahma Purisari', 'Arsitektur', 'rahma.purisari@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(54, '116037', 'Ranan Samanya', 'Teknik Sipil', 'ranan.samanya@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(55, '110018', 'Ratna Safitri', 'Arsitektur', 'ratna.safitri@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(56, '714010', 'Ratno Suprapto', 'Desain Komunikasi Visual', 'ratno.suprapto@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(57, '112001', 'Reni Dyanasari', 'Ilmu Komunikasi', 'reni.dyanasari@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(58, '717019', 'Resdiansyah', 'Teknik Sipil', 'resdiansyah.mansyur@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(59, '714011', 'Retno Purwanti Murdaningsih', 'Desain Komunikasi Visual', 'retno.purwanti@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(60, '818018', 'Rizka Arbaningrum', 'Teknik Sipil', 'rizka.arbaningrum@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(61, '715008', 'Safitri Jaya', 'Informatika', 'safitri.jaya@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(62, '111046', 'Sahid', 'Arsitektur', 'sahid@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(63, '817020', 'Sila Ninin Wisnantiasri', 'Akuntansi', 'sila.wisnantiasri@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(64, '719019', 'Sri Wijayanti', 'Ilmu Komunikasi', 'sri.wijayanti@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(65, '818022', 'Suci Marini Novianty', 'Ilmu Komunikasi', 'suci.marini@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(66, '714003', 'Supriyanto', 'Psikologi', 'supriyanto@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(67, '16032', 'Teddy Mohamad Darajat', 'Desain Produk', 'teddy.darajat@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(68, '814016', 'Teguh Prasetio', 'Manajemen', 'teguh.prasetio@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(69, '713026', 'Toufiq Panji Wisesa', 'Desain Produk', 'panji.wisesa@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(70, '711020', 'Tri Nugraha Adikesuma', 'Teknik Sipil', 'tri.nugraha@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(71, '211037', 'Veronica Melany Anastasia Kaihatu', 'Psikologi', 'veronica.kaihatu@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(72, '818016', 'Yohannes Totok Suyoto', 'Manajemen', 'totok.suyoto@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(73, '218009', 'Yosaphat Danis Murtiharso', 'Ilmu Komunikasi', 'yosaphat.danis@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(74, '719017', 'Yunisa Fitri Andriani', 'Desain Komunikasi Visual', 'yunisa.fitri@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(75, '120001', 'Zita Nadia', 'Desain Komunikasi Visual', 'zita.nadia@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen'),
(76, '111111', 'ini uji coba', 'Akuntansi', 'ini.ujicoba@upj.ac.id', '$2y$05$RE2UIoOGAYvZ7.dPQX6AG.Qs91McOv2cy34hnrrC58KrCGjD/jmM6', 'dosen'),
(77, '1123', 'aaa', 'Akuntansi', 'aaa@upj.ac.id', '$2y$05$vqJWUontqnr8nC2ugH.eOuJfT8IiGWZNSSo2pVdI3LNS7AQOQEhj2', 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_luaran_lain`
--

CREATE TABLE `t_luaran_lain` (
  `id_luaran` int(7) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nama_dosen1` varchar(50) DEFAULT NULL,
  `nama_dosen2` varchar(50) DEFAULT NULL,
  `judul_luaran` varchar(500) NOT NULL,
  `jenis_luaran` varchar(26) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `file` varchar(600) NOT NULL,
  `tahun_pelaksanaan` int(4) NOT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_publikasi_jurnal`
--

CREATE TABLE `t_publikasi_jurnal` (
  `id_publikasi` int(7) NOT NULL,
  `tahun_penerbitan` int(4) NOT NULL,
  `judul` varchar(600) NOT NULL,
  `nama_jurnal` varchar(200) NOT NULL,
  `penulis_publikasi` varchar(50) NOT NULL,
  `penulis_anggota1` varchar(50) DEFAULT NULL,
  `penulis_anggota2` varchar(50) DEFAULT NULL,
  `penulis_non_dosen` varchar(50) DEFAULT NULL,
  `issn` varchar(10) NOT NULL,
  `volume` int(4) NOT NULL,
  `nomor` int(3) NOT NULL,
  `halaman_awal` int(4) NOT NULL,
  `halaman_akhir` int(4) NOT NULL,
  `url` varchar(200) NOT NULL,
  `file` varchar(600) DEFAULT NULL,
  `cakupan_publikasi` varchar(55) NOT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_publikasi_jurnal`
--

INSERT INTO `t_publikasi_jurnal` (`id_publikasi`, `tahun_penerbitan`, `judul`, `nama_jurnal`, `penulis_publikasi`, `penulis_anggota1`, `penulis_anggota2`, `penulis_non_dosen`, `issn`, `volume`, `nomor`, `halaman_awal`, `halaman_akhir`, `url`, `file`, `cakupan_publikasi`, `valid`) VALUES
(1, 2020, 'jurnal internasional science mengenai perhitungan abcd', 'jurnal akuntansi TYX', 'Agustine Dwianika', 'David Pangaribuan', 'Fitriyah Nurhidayah', NULL, '9203084049', 2, 2, 3, 12, 'https://www.instagram.com/aaaaaa', NULL, 'Jurnal Internasional', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_total_semua`
--

CREATE TABLE `t_total_semua` (
  `no` int(2) NOT NULL,
  `prodi` varchar(28) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_total_semua`
--

INSERT INTO `t_total_semua` (`no`, `prodi`, `jumlah`) VALUES
(1, 'Akuntansi', 3),
(2, 'Arsitektur', 0),
(3, 'Desain Komunikasi Visual', 0),
(4, 'Desain Produk', 0),
(5, 'Ilmu Komunikasi', 0),
(6, 'Informatika', 0),
(7, 'Manajemen', 0),
(8, 'Psikologi', 0),
(9, 'Sistem Informasi', 0),
(10, 'Teknik Sipil', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`),
  ADD UNIQUE KEY `author` (`author`);

--
-- Indeks untuk tabel `cakupan_forum_ilmiah`
--
ALTER TABLE `cakupan_forum_ilmiah`
  ADD PRIMARY KEY (`id_cakupan`),
  ADD UNIQUE KEY `cakupan_forum_ilmiah` (`cakupan_forum_ilmiah`);

--
-- Indeks untuk tabel `cakupan_publikasi_jurnal`
--
ALTER TABLE `cakupan_publikasi_jurnal`
  ADD PRIMARY KEY (`id_cakupan`),
  ADD UNIQUE KEY `cakupan_publikasi` (`cakupan_publikasi`);

--
-- Indeks untuk tabel `jenis_hki`
--
ALTER TABLE `jenis_hki`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `jenis_hki` (`jenis_hki`);

--
-- Indeks untuk tabel `jenis_luaran_lain`
--
ALTER TABLE `jenis_luaran_lain`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `jenis_luaran` (`jenis_luaran`);

--
-- Indeks untuk tabel `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  ADD PRIMARY KEY (`id_jenis_ini`),
  ADD UNIQUE KEY `jenis_penelitian` (`jenis_penelitian`);

--
-- Indeks untuk tabel `jenis_pengabdian`
--
ALTER TABLE `jenis_pengabdian`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `jenis_pengabdian` (`jenis_pengabdian`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_program`),
  ADD UNIQUE KEY `program_studi` (`program_studi`);

--
-- Indeks untuk tabel `skema_penelitian`
--
ALTER TABLE `skema_penelitian`
  ADD PRIMARY KEY (`id_skema`),
  ADD UNIQUE KEY `skema` (`skema`);

--
-- Indeks untuk tabel `status_hki`
--
ALTER TABLE `status_hki`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `status_hki` (`status_hki`);

--
-- Indeks untuk tabel `status_pemakalah`
--
ALTER TABLE `status_pemakalah`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `status_pemakalah` (`status_pemakalah`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD UNIQUE KEY `tahun` (`tahun`);

--
-- Indeks untuk tabel `t_buku_ajar`
--
ALTER TABLE `t_buku_ajar`
  ADD PRIMARY KEY (`id_buku_ajar`);

--
-- Indeks untuk tabel `t_dana2_upj`
--
ALTER TABLE `t_dana2_upj`
  ADD PRIMARY KEY (`kode_penelitan`);

--
-- Indeks untuk tabel `t_dana_kemenristek`
--
ALTER TABLE `t_dana_kemenristek`
  ADD PRIMARY KEY (`kode_penelitan`);

--
-- Indeks untuk tabel `t_dana_kemenristek2`
--
ALTER TABLE `t_dana_kemenristek2`
  ADD PRIMARY KEY (`kode_penelitan`);

--
-- Indeks untuk tabel `t_dana_non2_upj`
--
ALTER TABLE `t_dana_non2_upj`
  ADD PRIMARY KEY (`kode_penelitian`);

--
-- Indeks untuk tabel `t_dana_non_upj`
--
ALTER TABLE `t_dana_non_upj`
  ADD PRIMARY KEY (`kode_penelitian`);

--
-- Indeks untuk tabel `t_dana_upj`
--
ALTER TABLE `t_dana_upj`
  ADD PRIMARY KEY (`kode_penelitan`);

--
-- Indeks untuk tabel `t_forum_ilmiah`
--
ALTER TABLE `t_forum_ilmiah`
  ADD PRIMARY KEY (`id_perumi`);

--
-- Indeks untuk tabel `t_hki`
--
ALTER TABLE `t_hki`
  ADD PRIMARY KEY (`id_hki`);

--
-- Indeks untuk tabel `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_luaran_lain`
--
ALTER TABLE `t_luaran_lain`
  ADD PRIMARY KEY (`id_luaran`);

--
-- Indeks untuk tabel `t_publikasi_jurnal`
--
ALTER TABLE `t_publikasi_jurnal`
  ADD PRIMARY KEY (`id_publikasi`);

--
-- Indeks untuk tabel `t_total_semua`
--
ALTER TABLE `t_total_semua`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cakupan_forum_ilmiah`
--
ALTER TABLE `cakupan_forum_ilmiah`
  MODIFY `id_cakupan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cakupan_publikasi_jurnal`
--
ALTER TABLE `cakupan_publikasi_jurnal`
  MODIFY `id_cakupan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_hki`
--
ALTER TABLE `jenis_hki`
  MODIFY `id_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis_luaran_lain`
--
ALTER TABLE `jenis_luaran_lain`
  MODIFY `id_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  MODIFY `id_jenis_ini` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengabdian`
--
ALTER TABLE `jenis_pengabdian`
  MODIFY `id_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `skema_penelitian`
--
ALTER TABLE `skema_penelitian`
  MODIFY `id_skema` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_hki`
--
ALTER TABLE `status_hki`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_pemakalah`
--
ALTER TABLE `status_pemakalah`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `t_buku_ajar`
--
ALTER TABLE `t_buku_ajar`
  MODIFY `id_buku_ajar` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_dana2_upj`
--
ALTER TABLE `t_dana2_upj`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_dana_kemenristek`
--
ALTER TABLE `t_dana_kemenristek`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_dana_kemenristek2`
--
ALTER TABLE `t_dana_kemenristek2`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_dana_non2_upj`
--
ALTER TABLE `t_dana_non2_upj`
  MODIFY `kode_penelitian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_dana_non_upj`
--
ALTER TABLE `t_dana_non_upj`
  MODIFY `kode_penelitian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_dana_upj`
--
ALTER TABLE `t_dana_upj`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_forum_ilmiah`
--
ALTER TABLE `t_forum_ilmiah`
  MODIFY `id_perumi` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_hki`
--
ALTER TABLE `t_hki`
  MODIFY `id_hki` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_login`
--
ALTER TABLE `t_login`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `t_luaran_lain`
--
ALTER TABLE `t_luaran_lain`
  MODIFY `id_luaran` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_publikasi_jurnal`
--
ALTER TABLE `t_publikasi_jurnal`
  MODIFY `id_publikasi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_total_semua`
--
ALTER TABLE `t_total_semua`
  MODIFY `no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
