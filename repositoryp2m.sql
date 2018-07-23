-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 04:26 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id_author` int(2) NOT NULL,
  `author` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_author`, `author`) VALUES
(1, 'administrator'),
(2, 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `cakupan_forum_ilmiah`
--

CREATE TABLE `cakupan_forum_ilmiah` (
  `id_cakupan` int(1) NOT NULL,
  `cakupan_forum_ilmiah` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cakupan_forum_ilmiah`
--

INSERT INTO `cakupan_forum_ilmiah` (`id_cakupan`, `cakupan_forum_ilmiah`) VALUES
(3, 'Regional'),
(1, 'Tingkat Internasional'),
(2, 'Tingkat Nasional');

-- --------------------------------------------------------

--
-- Table structure for table `cakupan_publikasi_jurnal`
--

CREATE TABLE `cakupan_publikasi_jurnal` (
  `id_cakupan` int(1) NOT NULL,
  `cakupan_publikasi` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cakupan_publikasi_jurnal`
--

INSERT INTO `cakupan_publikasi_jurnal` (`id_cakupan`, `cakupan_publikasi`) VALUES
(1, 'Jurnal Internasional'),
(2, 'Jurnal Naional Terakreditasi'),
(3, 'Jurnal Naional Tidak Terakreditasi (Mempunyai ISSN)');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_hki`
--

CREATE TABLE `jenis_hki` (
  `id_jenis` int(1) NOT NULL,
  `jenis_hki` varchar(38) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_hki`
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
-- Table structure for table `jenis_luaran_lain`
--

CREATE TABLE `jenis_luaran_lain` (
  `id_jenis` int(1) NOT NULL,
  `jenis_luaran` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_luaran_lain`
--

INSERT INTO `jenis_luaran_lain` (`id_jenis`, `jenis_luaran`) VALUES
(3, 'Desain'),
(4, 'Karya Seni'),
(7, 'Kebijakan'),
(1, 'Model'),
(2, 'Prototype'),
(5, 'Rekayasa Sosial'),
(6, 'Teknologi Tepat Guna (TTG)');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penelitian`
--

CREATE TABLE `jenis_penelitian` (
  `id_jenis_ini` int(1) NOT NULL,
  `jenis_penelitian` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_penelitian`
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
-- Table structure for table `jenis_pengabdian`
--

CREATE TABLE `jenis_pengabdian` (
  `id_jenis` int(1) NOT NULL,
  `jenis_pengabdian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pengabdian`
--

INSERT INTO `jenis_pengabdian` (`id_jenis`, `jenis_pengabdian`) VALUES
(2, 'IPTEK bagi Kewirausahaan'),
(1, 'IPTEK bagi Masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_program` int(2) NOT NULL,
  `program_studi` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_program`, `program_studi`) VALUES
(1, 'Akuntansi'),
(10, 'Arsitektur'),
(6, 'Desain Komunikasi Visual'),
(5, 'Desain Produk'),
(4, 'Ilmu Komunikasi'),
(7, 'Informatika'),
(2, 'Manajemen'),
(3, 'Psikologi'),
(8, 'Sistem Informasi'),
(9, 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Table structure for table `skema_penelitian`
--

CREATE TABLE `skema_penelitian` (
  `id_skema` int(1) NOT NULL,
  `skema` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skema_penelitian`
--

INSERT INTO `skema_penelitian` (`id_skema`, `skema`) VALUES
(1, 'Penelitian Dasar'),
(2, 'Penelitian Terapan');

-- --------------------------------------------------------

--
-- Table structure for table `status_hki`
--

CREATE TABLE `status_hki` (
  `id_status` int(1) NOT NULL,
  `status_hki` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_hki`
--

INSERT INTO `status_hki` (`id_status`, `status_hki`) VALUES
(2, 'Granted'),
(1, 'Terdaftar');

-- --------------------------------------------------------

--
-- Table structure for table `status_pemakalah`
--

CREATE TABLE `status_pemakalah` (
  `id_status` int(1) NOT NULL,
  `status_pemakalah` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pemakalah`
--

INSERT INTO `status_pemakalah` (`id_status`, `status_pemakalah`) VALUES
(1, 'Invited / Keynote Speaker'),
(2, 'Pemakalah Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
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
(20, 2030);

-- --------------------------------------------------------

--
-- Table structure for table `t_buku_ajar`
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
  `valid` varchar(5) NOT NULL,
  `tahun_penerbitan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_buku_ajar`
--

INSERT INTO `t_buku_ajar` (`id_buku_ajar`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul`, `isbn`, `jumlah_halaman`, `penerbit`, `valid`, `tahun_penerbitan`) VALUES
(1, 'uioioioioi', NULL, NULL, 'judul', '9876', 87, 'uil', 'YA', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `t_dana2_upj`
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
  `skema_penelitian` varchar(55) NOT NULL,
  `valid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dana2_upj`
--

INSERT INTO `t_dana2_upj` (`kode_penelitan`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_hibah`, `judul_penelitian`, `jenis_penelitian`, `dana_usulan`, `dana_disetujui`, `file`, `skema_penelitian`, `valid`) VALUES
(3, 'grhdf', 'htsr', 'ret', 2020, 'sgd', 'IPTEK bagi Kewirausahaan', 0, 0, 'Laporan_Akhir_Ibm_-_Supriyanto.pdf', '', 'YA'),
(4, 'gggggggg', 'ggggggg', 'ggggg', 2019, 'gr', 'IPTEK bagi Kewirausahaan', 0, 0, 'Data_Permohonan_J002016057903.pdf', '', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `t_dana_non2_upj`
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
-- Dumping data for table `t_dana_non2_upj`
--

INSERT INTO `t_dana_non2_upj` (`kode_penelitian`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_penelitian`, `judul`, `sumber_dana`, `besaran_dana`, `file`, `valid`) VALUES
(3, 'dhjh', 'gsdhjkh', 'gdhfjgkh', 2019, 'AFD', 'SGHJK', 'EFSRGHJGK', 'SPT-II-01-SOP-02_SOP_Pengajuan_Hak_Kekayaan_Intelektual_(HKI).pdf', 'YA'),
(4, 'uyuyu', 'trere', NULL, 2018, 'qqqqqqqqqqqqq', 'qqqqqqqq', '9000000', 'Laporan_Akhir_Ibm_-_Supriyanto.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_dana_non_upj`
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
-- Dumping data for table `t_dana_non_upj`
--

INSERT INTO `t_dana_non_upj` (`kode_penelitian`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_penelitian`, `judul`, `sumber_dana`, `besaran_dana`, `file`, `valid`) VALUES
(1, 'fsrgdthfyjg', 'rdthfyjgkh', NULL, 2018, 'ae', '900000', '400000', 'Laporan_-_Heriyanto_Atmojo.pdf', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `t_dana_upj`
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
  `skema_penelitian` varchar(55) NOT NULL,
  `valid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dana_upj`
--

INSERT INTO `t_dana_upj` (`kode_penelitan`, `ketua_peneliti`, `anggota_peneliti_1`, `anggota_peneliti_2`, `tahun_hibah`, `judul_penelitian`, `jenis_penelitian`, `dana_usulan`, `dana_disetujui`, `file`, `skema_penelitian`, `valid`) VALUES
(3, 'fshd', NULL, NULL, 2018, 'asgfdg', 'Penelitian Fundamental', 0, 0, 'Laporan_-_Heriyanto_Atmojo1.pdf', 'Penelitian Dasar', 'YA'),
(4, 'dhsgf', 'dhgfh', 'hdg', 2018, 'ghsfdg', 'Penelitian Dosen Pemula', 0, 0, 'Laporan_Akhir_Ibm_-_Firtriyah_Nurhidayah-ilovepdf-compressed.pdf', 'Penelitian Terapan', 'YA'),
(5, 'si a', 'si d', NULL, 2018, 'gsfd', 'Penelitian Produk Terapan', 0, 0, 'UU_28_20141.PDF', 'Penelitian Terapan', 'YA'),
(6, 'si aba', 'si abb', 'si abc', 2018, 'uuuuuu uuuuuu uuuuuu uuuuuu uuuuuu uuuuuu uuuuuu uuuuuuuuuuuu uuuuuu uuuuuu uuuuuu uuuuuu uuuuuu uuuuuu uuuuuu', 'Penelitian Sosial, Humaniora, dan Pendidikan', 350, 245, 'joyokanjihyo_20101130.pdf', 'Penelitian Terapan', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `t_forum_ilmiah`
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
  `valid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_forum_ilmiah`
--

INSERT INTO `t_forum_ilmiah` (`id_perumi`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul_makalah`, `nama_forum`, `institusi_penyelenggara`, `waktu_pelakasana_awal`, `waktu_pelakasana_akhir`, `tempat_pelaksana`, `status_pemakalah`, `cakupan_forum_ilmiah`, `file`, `tahun_pelaksanaan`, `valid`) VALUES
(1, 'bsfbsf', NULL, NULL, 'sgffffff', 'gfssssss', 'fgsss', '2018-06-26', '2018-06-26', 'sfbbbbb', 'Pemakalah Biasa', 'Regional', 'Laporan_Akhir_Ibm_-_Firtriyah_Nurhidayah-ilovepdf-compressed.pdf', 2018, 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `t_hki`
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
-- Dumping data for table `t_hki`
--

INSERT INTO `t_hki` (`id_hki`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul_hki`, `jenis_hki`, `no_pendaftaran`, `status_hki`, `no_hki`, `file`, `tahun_pelaksanaan`, `valid`) VALUES
(1, 'sahdg', 'ahdg', NULL, 'asfhdg', 'Paten', '', 'Granted', 'ahdg', 'Untitled_design.pdf', 2018, 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `t_login`
--

CREATE TABLE `t_login` (
  `id` int(15) NOT NULL,
  `NIDN` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `prodi` varchar(28) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_login`
--

INSERT INTO `t_login` (`id`, `NIDN`, `username`, `prodi`, `email`, `password`, `author`) VALUES
(1, '9999999998', 'admin', 'Teknik Sipil', 'admin@upj.ac.id', '$2y$12$qzCd/DZweNWvYwzu26uVl.t06q0UrSTQ/MhQgaJrszJ24vDzpEmnO', 'administrator'),
(2, '9999999999', 'admin1', 'Akuntansi', 'admin1@upj.ac.id', '$2y$12$hnVN4pXpsR58wdWsbRx94.2pv/R8aseFIdBTgHGeCFNeMGPRmtn0G', 'administrator'),
(3, '0320058903', 'dosen', 'Manajemen', 'dosen@upj.ac.id', '$2y$12$uVKCq5tlH1LNZVnwaMR/9ewzoWCawY29Fkwb9bn9mzy.bNtSG8ke6', 'dosen'),
(4, '0320058902', 'Melisa Arisanty', 'Ilmu Komunikasi', 'melisa.arisanty@upj.ac.id', '$2y$12$9lFNJnwWIbz212oKmTy5ZOKQt0Yl9fcjcDmbYaOWVB6Gx9mlurphm', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `t_luaran_lain`
--

CREATE TABLE `t_luaran_lain` (
  `id_luaran` int(7) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nama_dosen1` varchar(50) DEFAULT NULL,
  `nama_dosen2` varchar(50) DEFAULT NULL,
  `judul_luaran` varchar(500) NOT NULL,
  `jenis_luaran` varchar(26) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `file` varchar(600) NOT NULL,
  `tahun_pelaksanaan` int(4) NOT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_luaran_lain`
--

INSERT INTO `t_luaran_lain` (`id_luaran`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul_luaran`, `jenis_luaran`, `deskripsi`, `file`, `tahun_pelaksanaan`, `valid`) VALUES
(2, 'tras', 'tera', 'tart', 'sekarang aja', 'Kebijakan', 'refresh here', 'Laporan_Akhir_Ibm_-_Firtriyah_Nurhidayah-ilovepdf-compressed.pdf', 2018, 'YA'),
(3, 'uyuyu', NULL, NULL, 'contoh290', 'Prototype', 'deskripsi', '', 2027, 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `t_publikasi_jurnal`
--

CREATE TABLE `t_publikasi_jurnal` (
  `id_publikasi` int(7) NOT NULL,
  `tahun_penerbitan` int(4) NOT NULL,
  `judul` varchar(600) NOT NULL,
  `nama_jurnal` varchar(200) NOT NULL,
  `penulis_publikasi` varchar(50) NOT NULL,
  `penulis_anggota1` varchar(50) DEFAULT NULL,
  `penulis_anggota2` varchar(50) DEFAULT NULL,
  `issn` varchar(10) NOT NULL,
  `volume` int(4) NOT NULL,
  `nomor` int(3) NOT NULL,
  `halaman_awal` int(4) NOT NULL,
  `halaman_akhir` int(4) NOT NULL,
  `url` varchar(200) NOT NULL,
  `file` varchar(600) NOT NULL,
  `cakupan_publikasi` varchar(55) NOT NULL,
  `valid` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_publikasi_jurnal`
--

INSERT INTO `t_publikasi_jurnal` (`id_publikasi`, `tahun_penerbitan`, `judul`, `nama_jurnal`, `penulis_publikasi`, `penulis_anggota1`, `penulis_anggota2`, `issn`, `volume`, `nomor`, `halaman_awal`, `halaman_akhir`, `url`, `file`, `cakupan_publikasi`, `valid`) VALUES
(6, 2018, 'fae', 'jurnal apa aja ', 'si e', 'si p', 'si o', '9876', 12, 12, 12, 19, 'poiuytre', 'Laporan_Akhir_Ibm_-_Firtriyah_Nurhidayah-ilovepdf-compressed.pdf', 'Jurnal Internasional', 'YA'),
(7, 2018, 'test ', 'tekno', 'si k ', 'si t', NULL, '99998', 2, 10, 2, 9, 'opopopopo', '', 'Jurnal Internasional', 'YA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`),
  ADD UNIQUE KEY `author` (`author`);

--
-- Indexes for table `cakupan_forum_ilmiah`
--
ALTER TABLE `cakupan_forum_ilmiah`
  ADD PRIMARY KEY (`id_cakupan`),
  ADD UNIQUE KEY `cakupan_forum_ilmiah` (`cakupan_forum_ilmiah`);

--
-- Indexes for table `cakupan_publikasi_jurnal`
--
ALTER TABLE `cakupan_publikasi_jurnal`
  ADD PRIMARY KEY (`id_cakupan`),
  ADD UNIQUE KEY `cakupan_publikasi` (`cakupan_publikasi`);

--
-- Indexes for table `jenis_hki`
--
ALTER TABLE `jenis_hki`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `jenis_hki` (`jenis_hki`);

--
-- Indexes for table `jenis_luaran_lain`
--
ALTER TABLE `jenis_luaran_lain`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `jenis_luaran` (`jenis_luaran`);

--
-- Indexes for table `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  ADD PRIMARY KEY (`id_jenis_ini`),
  ADD UNIQUE KEY `jenis_penelitian` (`jenis_penelitian`);

--
-- Indexes for table `jenis_pengabdian`
--
ALTER TABLE `jenis_pengabdian`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `jenis_pengabdian` (`jenis_pengabdian`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_program`),
  ADD UNIQUE KEY `program_studi` (`program_studi`);

--
-- Indexes for table `skema_penelitian`
--
ALTER TABLE `skema_penelitian`
  ADD PRIMARY KEY (`id_skema`),
  ADD UNIQUE KEY `skema` (`skema`);

--
-- Indexes for table `status_hki`
--
ALTER TABLE `status_hki`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `status_hki` (`status_hki`);

--
-- Indexes for table `status_pemakalah`
--
ALTER TABLE `status_pemakalah`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `status_pemakalah` (`status_pemakalah`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD UNIQUE KEY `tahun` (`tahun`);

--
-- Indexes for table `t_buku_ajar`
--
ALTER TABLE `t_buku_ajar`
  ADD PRIMARY KEY (`id_buku_ajar`);

--
-- Indexes for table `t_dana2_upj`
--
ALTER TABLE `t_dana2_upj`
  ADD PRIMARY KEY (`kode_penelitan`);

--
-- Indexes for table `t_dana_non2_upj`
--
ALTER TABLE `t_dana_non2_upj`
  ADD PRIMARY KEY (`kode_penelitian`);

--
-- Indexes for table `t_dana_non_upj`
--
ALTER TABLE `t_dana_non_upj`
  ADD PRIMARY KEY (`kode_penelitian`);

--
-- Indexes for table `t_dana_upj`
--
ALTER TABLE `t_dana_upj`
  ADD PRIMARY KEY (`kode_penelitan`);

--
-- Indexes for table `t_forum_ilmiah`
--
ALTER TABLE `t_forum_ilmiah`
  ADD PRIMARY KEY (`id_perumi`);

--
-- Indexes for table `t_hki`
--
ALTER TABLE `t_hki`
  ADD PRIMARY KEY (`id_hki`);

--
-- Indexes for table `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `NIDN` (`NIDN`);

--
-- Indexes for table `t_luaran_lain`
--
ALTER TABLE `t_luaran_lain`
  ADD PRIMARY KEY (`id_luaran`);

--
-- Indexes for table `t_publikasi_jurnal`
--
ALTER TABLE `t_publikasi_jurnal`
  ADD PRIMARY KEY (`id_publikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cakupan_forum_ilmiah`
--
ALTER TABLE `cakupan_forum_ilmiah`
  MODIFY `id_cakupan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cakupan_publikasi_jurnal`
--
ALTER TABLE `cakupan_publikasi_jurnal`
  MODIFY `id_cakupan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_hki`
--
ALTER TABLE `jenis_hki`
  MODIFY `id_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jenis_luaran_lain`
--
ALTER TABLE `jenis_luaran_lain`
  MODIFY `id_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis_penelitian`
--
ALTER TABLE `jenis_penelitian`
  MODIFY `id_jenis_ini` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jenis_pengabdian`
--
ALTER TABLE `jenis_pengabdian`
  MODIFY `id_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_program` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `skema_penelitian`
--
ALTER TABLE `skema_penelitian`
  MODIFY `id_skema` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_hki`
--
ALTER TABLE `status_hki`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_pemakalah`
--
ALTER TABLE `status_pemakalah`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `t_buku_ajar`
--
ALTER TABLE `t_buku_ajar`
  MODIFY `id_buku_ajar` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_dana2_upj`
--
ALTER TABLE `t_dana2_upj`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_dana_non2_upj`
--
ALTER TABLE `t_dana_non2_upj`
  MODIFY `kode_penelitian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_dana_non_upj`
--
ALTER TABLE `t_dana_non_upj`
  MODIFY `kode_penelitian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_dana_upj`
--
ALTER TABLE `t_dana_upj`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_forum_ilmiah`
--
ALTER TABLE `t_forum_ilmiah`
  MODIFY `id_perumi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_hki`
--
ALTER TABLE `t_hki`
  MODIFY `id_hki` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_login`
--
ALTER TABLE `t_login`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_luaran_lain`
--
ALTER TABLE `t_luaran_lain`
  MODIFY `id_luaran` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_publikasi_jurnal`
--
ALTER TABLE `t_publikasi_jurnal`
  MODIFY `id_publikasi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
