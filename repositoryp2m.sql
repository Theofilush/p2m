-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2020 pada 17.41
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

--
-- Dumping data untuk tabel `t_buku_ajar`
--

INSERT INTO `t_buku_ajar` (`id_buku_ajar`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul`, `isbn`, `jumlah_halaman`, `penerbit`, `file`, `valid`, `tahun_penerbitan`) VALUES
(1, 'Clara Moningka', NULL, NULL, 'contoh 1', '1234', 12, 'loder d', '081266110052_BAB_I.pdf', NULL, 2018),
(2, 'Dion Dewa Barata', NULL, NULL, 'buku arsitektur', '1111111111111', 12, 'detiama', NULL, NULL, 2016),
(3, 'Desi Dwi Kristanto', NULL, NULL, 'okokokoko', '1111111111111', 8, 'detiama', NULL, NULL, 2019),
(4, 'Teddy Mohamad Darajat', NULL, NULL, 'ikiki', '1111111111111', 12, 'detiama', NULL, NULL, 2019);

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
(1, 'Syaiful Halim', NULL, NULL, 2015, 'judul pengabdian 1mm', 'IPTEK bagi Masyarakat', 80000, 78987, 'Doc1.pdf', NULL),
(2, 'Syaiful Halim', NULL, NULL, 2018, 'judl 2', 'IPTEK bagi Masyarakat', 700000, 120000, 'Doc11.pdf', 'YA'),
(3, 'Irma Paramitha Sofia', NULL, NULL, 2018, 'judul 3\r\n', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'LAMPIRAN2.pdf', NULL),
(4, 'Sahid', NULL, NULL, 2018, 'judul 4', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc12.pdf', NULL),
(5, 'Ratno Suprapto', NULL, NULL, 2018, 'judul 5', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc13.pdf', NULL),
(6, 'Hari Nugraha', NULL, NULL, 2018, 'judul 7', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc14.pdf', NULL),
(7, 'Syaiful Halim', NULL, NULL, 2018, 'judul 7\r\n', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'LAMPIRAN3.pdf', NULL),
(8, 'Nur Uddin', NULL, NULL, 2018, 'judul 8\r\n', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'LAMPIRAN4.pdf', NULL),
(9, 'Adriatik Ivanti', NULL, NULL, 2018, 'judul 9\r\n', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc15.pdf', NULL),
(10, 'Hastuti Naibaho', NULL, NULL, 2017, 'judul 10', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc16.pdf', NULL),
(11, 'Marcello Singadji', NULL, NULL, 2018, 'judul 11', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc17.pdf', NULL),
(12, 'Ferdinand Fassa', NULL, NULL, 2018, 'judul 12\r\n', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc18.pdf', NULL),
(13, 'Fredy Jhon Philip. S', NULL, NULL, 2018, 'jdudul 13', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc19.pdf', NULL),
(14, 'Sila Wisnantiasri', NULL, NULL, 2019, 'judul 14', 'IPTEK bagi Masyarakat', 2000000, 2000000, 'Doc110.pdf', NULL);

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
(1, 'dema', NULL, NULL, 2019, 'rerereaabbbbbbbbbb', 'aa', 9000, 9000, '1__MN-CPR-Compay_Profile-Rev6_1.pdf', 'Penelitian Dasar', 'jjjm', 'TIDAK'),
(2, 'Sahid', NULL, NULL, 2018, 'ajudul 2 penelitian', 'Penelitian Fundamental', 700000, 120000, NULL, 'Penelitian Dasar', NULL, 'YA'),
(3, 'Irma Paramitha Sofia', NULL, NULL, 2018, 'ajudul 3 penelitian', 'Penelitian Dosen Pemula', 435, 5236, '1__MN-CPR-Compay_Profile-Rev6_11.pdf', 'Penelitian Terapan', NULL, 'YA'),
(4, 'Ratno Suprapto', NULL, NULL, 2018, 'ajudul 4 penelitiannnnnnnnnnnnnnnn', 'Penelitian Fundamental', 700000, 120000, NULL, 'Penelitian Dasar', NULL, NULL),
(5, 'Ismail Alif Siregar', NULL, NULL, 2018, 'ajudul 5', 'Penelitian Fundamental', 700000, 120000, 'Doc12.pdf', 'Penelitian Dasar', NULL, NULL),
(6, 'Syaiful Halim', NULL, NULL, 2018, 'ajudul 6', 'Penelitian Fundamental', 700000, 120000, 'Doc13.pdf', 'Penelitian Dasar', NULL, NULL),
(7, 'Dion Dewa Barata', NULL, NULL, 2018, 'ajudul 7', 'Penelitian Fundamental', 700000, 120000, 'Doc14.pdf', 'Penelitian Dasar', NULL, NULL),
(8, 'Clara Moningka', NULL, NULL, 2018, 'ajudul 8', 'Penelitian Fundamental', 700000, 120000, 'Doc15.pdf', 'Penelitian Dasar', NULL, NULL),
(10, 'Tri Nugraha', NULL, NULL, 2018, 'aaajduul 10', 'Penelitian Fundamental', 700000, 120000, 'Doc17.pdf', 'Penelitian Dasar', NULL, NULL),
(11, 'Ferdinand Fassa', NULL, NULL, 2019, 'test 1', 'Penelitian Unggulan Perguruan Tinggi', 17000000, 15000000, '1__MN-CPR-Compay_Profile-Rev6_12.pdf', 'Penelitian Dasar', NULL, 'YA'),
(12, 'dosen', NULL, NULL, 2020, 'qwer', 'Penelitian Sosial, Humaniora, dan Pendidikan', 123, 123, 'JSDP_Transkip.pdf', NULL, NULL, NULL),
(13, 'dosen', NULL, NULL, 2020, '11', 'Penelitian Fundamental', 11, 11, 'JSDP_Transkip1.pdf', NULL, NULL, NULL),
(14, 'dosen', NULL, NULL, 2020, 'abc', 'Penelitian Sosial, Humaniora, dan Pendidikan', 1, 21, 'SERTIFIKAT_KMP.pdf', NULL, NULL, NULL);

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
(1, 'dosen', NULL, NULL, 2020, 'judul pengabdian dana dikti 1a\r\n', 'IPTEK bagi Kewirausahaan', 900, 1000, 'FLOWCHART.pdf', NULL, 'abc', 'YA'),
(3, 'dosen', NULL, NULL, 2020, 'iuoouuui', 'IPTEK bagi Masyarakat', 222222, 333333, 'PB1MAT_Nilai-Nilai_Kebangsaan.pdf', NULL, 'nokm', 'YA'),
(4, 'dosen', NULL, NULL, 2020, 'kkmkm', 'IPTEK bagi Masyarakat', 9999, 9999, 'SERTIFIKAT_KMP1.pdf', NULL, NULL, NULL);

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
(1, 'Pandu Purwandaru', NULL, NULL, 2018, 'judul non pengabdian', '9876', '9999', 'Doc11.pdf', 'YA'),
(2, 'Sila Wisnantiasri', NULL, NULL, 2019, 'judul 2', '200000', '200000', 'Doc12.pdf', 'TIDAK');

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
(1, 'Muhammad Mashudi', 'Fitorio Leksono Bowo', NULL, 2018, 'judul non penelitian 1', '123456', '12345678', 'Doc1.pdf', NULL),
(2, 'Feby Hendola Kaulara', NULL, NULL, 2018, 'judul non penelitian 2', '230000000', '600000000', 'joyokanjihyo_20101130.pdf', NULL),
(3, 'Clara Moningka', NULL, NULL, 2018, 'jduul 2', '230000000', '600000000', 'Doc11.pdf', NULL),
(4, 'Syaiful Halim', NULL, NULL, 2018, 'jdul 4', '230000000', '600000000', 'Doc12.pdf', NULL),
(5, 'Desi Dwi Kristanto', NULL, NULL, 2019, 'iiohiugu', 'lololo', '9000', '1__MN-CPR-Compay_Profile-Rev6_1.pdf', NULL);

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
(1, 'Heny Pratiwi, B.Sc, M.Sc', NULL, NULL, 2018, 'ajudul 1 penelitan', 'Penelitian Fundamental', 12345, 12345678, '1__MN-CPR-Compay_Profile-Rev6_1.pdf', 'Penelitian Dasar', 'test', 'YA'),
(2, 'Sahid', NULL, NULL, 2018, 'judul 2 penelitian', 'Penelitian Fundamental', 700000, 120000, 'LAMPIRAN.pdf', 'Penelitian Dasar', NULL, 'YA'),
(3, 'Irma Paramitha Sofia', NULL, NULL, 2018, 'judul 3 penelitian', 'Penelitian Dosen Pemula', 435, 5236, 'joyokanjihyo_20101130.pdf', 'Penelitian Terapan', 'abcd', 'TIDAK'),
(4, 'Ratno Suprapto', NULL, NULL, 2018, 'ajudul 4 penelitianaaaaaaaaaa', 'Penelitian Fundamental', 700000, 120000, 'Doc11.pdf', 'Penelitian Dasar', NULL, NULL),
(5, 'Ismail Alif Siregar', NULL, NULL, 2018, 'judul 5', 'Penelitian Fundamental', 700000, 120000, 'Doc12.pdf', 'Penelitian Dasar', NULL, NULL),
(6, 'Syaiful Halim', NULL, NULL, 2018, 'judul 6', 'Penelitian Fundamental', 700000, 120000, 'Doc13.pdf', 'Penelitian Dasar', NULL, NULL),
(7, 'Dion Dewa Barata', NULL, NULL, 2018, 'judul 7', 'Penelitian Fundamental', 700000, 120000, 'Doc14.pdf', 'Penelitian Dasar', NULL, NULL),
(8, 'Clara Moningka', NULL, NULL, 2018, 'judul 8', 'Penelitian Fundamental', 700000, 120000, 'Doc15.pdf', 'Penelitian Dasar', NULL, NULL),
(9, 'Marcello Singadji', NULL, NULL, 2018, 'jduul 9', 'Penelitian Fundamental', 700000, 120000, 'Doc16.pdf', 'Penelitian Dasar', NULL, NULL),
(10, 'Tri Nugraha', NULL, NULL, 2018, 'jduul 10', 'Penelitian Fundamental', 700000, 120000, 'Doc17.pdf', 'Penelitian Dasar', NULL, NULL),
(11, 'Chaerul Anwar', NULL, NULL, 2019, 'judul oktober 2019', 'Penelitian Fundamental', 1200000, 1000000, '1__MN-CPR-Compay_Profile-Rev6_11.pdf', NULL, NULL, NULL),
(12, 'Safitri Jaya', NULL, NULL, 2019, 'judul okt 2 2019', 'Penelitian Sosial, Humaniora, dan Pendidikan', 15000000, 10000000, '1__MN-CPR-Compay_Profile-Rev6_12.pdf', NULL, NULL, NULL),
(13, 'dosen', NULL, NULL, 2019, 'mmm', 'Penelitian Unggulan Perguruan Tinggi', 2147483647, 2147483647, '1__MN-CPR-Compay_Profile-Rev6_1.pdf', NULL, NULL, NULL);

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

--
-- Dumping data untuk tabel `t_forum_ilmiah`
--

INSERT INTO `t_forum_ilmiah` (`id_perumi`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul_makalah`, `nama_forum`, `institusi_penyelenggara`, `waktu_pelakasana_awal`, `waktu_pelakasana_akhir`, `tempat_pelaksana`, `status_pemakalah`, `cakupan_forum_ilmiah`, `file`, `tahun_pelaksanaan`, `valid`) VALUES
(1, 'Ferdinand Fassa', NULL, NULL, 'judul makalah', 'forum internasional', 'Upj', '2018-08-08', '2018-08-15', 'UPJ', 'Invited / Keynote Speaker', 'Tingkat Internasional', '', 2018, NULL),
(2, 'Ferdinand Fassa', NULL, NULL, 'jdul 2', 'forum internasional', 'Upj', '2018-07-30', '2018-08-07', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(3, 'Chaerul Anwar', NULL, NULL, 'jdul 3', 'forum internasional', 'Upj', '2018-09-04', '2018-09-04', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(4, 'Veronica Kaihatu', NULL, NULL, 'judul 4', 'forum internasional', 'Upj', '2018-09-04', '2018-08-28', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(5, 'Irma M Nawangwulan', NULL, NULL, 'judul 5', 'forum internasional', 'Upj', '2018-08-28', '2018-08-28', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(6, 'Heny Pratiwi, B.Sc, M.Sc', NULL, NULL, 'jduul 6', 'forum internasional', 'Upj', '2018-08-28', '2018-08-21', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(7, 'Melisa Arisanty', NULL, NULL, 'judul 7', 'forum internasional', 'Upj', '2018-09-04', '2018-08-28', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(8, 'Teddy Mohamad Darajat', NULL, NULL, 'judul 8', 'forum internasional', 'Upj', '2018-08-28', '2018-08-28', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(9, 'Ismail Alif Siregar', NULL, NULL, 'judul 9', 'forum internasional', 'Upj', '2018-08-28', '2018-09-04', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(10, 'Retno Purwanti M', NULL, NULL, 'judul 10', 'forum internasional', 'Upj', '0000-00-00', '0000-00-00', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(11, 'Eka Permanasari', NULL, NULL, 'judul 12', 'forum internasional', 'Upj', '0000-00-00', '0000-00-00', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL),
(12, 'Irma Paramitha Sofia', NULL, NULL, 'jdul 14', 'forum internasional', 'Upj', '0000-00-00', '0000-00-00', 'UPJ', 'Invited / Keynote Speaker', 'Regional', '', 2018, NULL);

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
(1, 'Agustinus Agus Setiawan', NULL, NULL, 'judul hki1', 'Paten', '098765', 'Terdaftar', '9876', '', 2018, NULL),
(2, 'Agustinus Agus Setiawan', NULL, NULL, 'abcd', 'Paten Sederhana', '123456', 'Granted', '1111', 'NEWS0003007.pdf', 2019, NULL),
(3, 'Desi Dwi Kristanto', 'Teddy Mohamad Darajat', 'Fitorio Leksono Bowo', 'iiiiiiiiiiiiiiiiiii', 'Merek Dagang', '123456', 'Granted', '1111', '', 2019, NULL);

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
(3, '9999999999', 'dosen', 'Akuntansi', 'dosen@upj.ac.id', '$2y$12$.J2zWQHTzhrAJ1093nTfYOBjR.bZHM3nzOgp8TYKasWJ1a3738mm6', 'dosen'),
(2001, '308117801', 'Clara Moningka', 'Psikologi', 'clara.moningka@upj.ac.id', '$2y$12$.J2zWQHTzhrAJ1093nTfYOBjR.bZHM3nzOgp8TYKasWJ1a3738mm6', 'dosen'),
(2002, '311126701', 'Syaiful Halim', 'Ilmu Komunikasi', 'syaiful.halim@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2003, '317057704', 'Ratno Suprapto', 'Desain Komunikasi Visual', 'ratno.suprapto@upj.ac.id', '$2y$12$.J2zWQHTzhrAJ1093nTfYOBjR.bZHM3nzOgp8TYKasWJ1a3738mm6', 'dosen'),
(2004, '318037803', 'Dion Dewa Barata', 'Manajemen', 'dion.dewa@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2005, '320017801', 'Marcello Singadji', 'Sistem Informasi', 'marcello.singadji@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2006, '323097501', 'Chaerul Anwar', 'Sistem Informasi', 'chaerul.anwar@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2007, '325067804', 'Nur Uddin', 'Informatika', 'nur.uddin@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2008, '328068404', 'Safitri Jaya', 'Informatika', 'safitri.jaya@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2009, '330108101', 'Hendi Hermawan', 'Informatika', 'hendi.hermawan@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2010, '401127905', 'Ferdinand Fassa', 'Teknik Sipil', 'ferdinand.fassa@upj.ac.id', '$2y$12$.J2zWQHTzhrAJ1093nTfYOBjR.bZHM3nzOgp8TYKasWJ1a3738mm6', 'dosen'),
(2011, '403117706', 'Adriatik Ivanti', 'Psikologi', 'adriatik.ivanti@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2012, '404027106', 'M. Nasucha', 'Informatika', 'mohammad.nasucha@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2013, '404027902', 'Eka Permanasari', 'Arsitektur', 'eka.permanasari@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2014, '404038205', 'Nuria Astagini', 'Ilmu Komunikasi', 'nuria.astagini@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2015, '405038801', 'Reni Dyanasari', 'Ilmu Komunikasi', 'reni.dyanasari@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2016, '406028104', 'Dohar Pardomuan', 'Manajemen', 'dohar.marbun@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2017, '406029101', 'Feby Hendola Kaulara', 'Arsitektur', 'feby.kaluara@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2018, '406047004', 'Sahid', 'Arsitektur', 'sahid@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2019, '408017904', 'Hari Nugraha', 'Desain Produk Industri', 'hari.nugraha@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2020, '408036801', 'Dalizanolo Hulu', 'Manajemen', 'dalizanolo.hulu@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2021, '410066102', 'johannes siregar', 'Sistem Informasi', 'johannes.siregar@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2022, '410078805', 'Yulius Fransisco Angkawijaya', 'Psikologi', 'yulius.fransisco@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2023, '411097605', 'Gita Widya Laksmini', 'Psikologi', 'gita.soerjoatmodjo@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2024, '412087903', 'Ismail Alif Siregar', 'Desain Produk Industri', 'ismail.alif@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2025, '413068204', 'Irma Paramitha Sofia', 'Akutansi', 'irma.paramita@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2026, '414016404', 'Edy Purwantoro', 'Desain Komunikasi Visual', 'edi.purwantoro@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2027, '415018304', 'Endang Pitaloka', 'Manajemen', 'oka.pitaloka@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2028, '418127102', 'Resdiansyah', 'Teknik Sipil', 'resdiansyah.mansyur@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2029, '421047607', 'Supriyanto', 'Psikologi', 'supriyanto@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2030, '421078402', 'Tri Nugraha', 'Teknik Sipil', 'tri.nugraha@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2031, '422077605', 'Prio Handoko', 'Informatika', 'prio.handoko@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2032, '423086301', 'Deden Maulana A', 'Desain Komunikasi Visual', 'deden.maulana@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2033, '423087102', 'Augury El Rayeb', 'Sistem Informasi', 'augury.elrayeb@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2034, '425028503', 'Rahma Purisari', 'Arsitektur', 'rahma.purisari@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2035, '426078303', 'Toufiq Panji Wisesa', 'Desain Produk Industri', 'panji.wisesa@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2036, '427017603', 'Retno Purwanti M', 'Desain Komunikasi Visual', 'retno.purwanti@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2037, '427047802', 'Fredy Jhon Philip. S', 'Teknik Sipil', 'fredy.jhon@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2038, '428117308', 'Fitriyah Nurhidayah', 'Akutansi', 'fitriyah.nurhidayah@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2039, '429037301', 'Adhi Gumilang', 'Ilmu Komunikasi', 'adhi.gumilang@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2040, '429057608', 'Aldyfra Lukman', 'Arsitektur', 'aldyfra.lukman@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2041, '430067902', 'Ratna Safitri', 'Arsitektur', 'ratna.safitri@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2042, '431087906', 'Veronica Kaihatu', 'Psikologi', 'veronica.kaihatu@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2043, '610087701', 'Agustinus Agus Setiawan', 'Teknik Sipil', 'agustinus.setiawan@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2044, '704036801', 'Teguh Prasetio', 'Manajemen', 'teguh.prasetio@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2045, '1001', 'Agustine Dwianika', 'Akutansi', 'agustine.dwianika@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2046, '1002', 'C. Yudi Prasetyo', 'Akutansi', 'yudi.prasetyo@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2047, '1003', 'Sila Wisnantiasri', 'Akutansi', 'sila.wisnantiasri@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2048, '1004', 'Hastuti Naibaho', 'Manajemen', 'hastuti.naibaho@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2049, '1005', 'Irma M Nawangwulan', 'Manajemen', 'irma.nawangwulan@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2050, '1006', 'naurissa biasini', 'Ilmu Komunikasi', 'naurissa.biasini@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2051, '1007', 'Yosaphat Danis Murtiharso', 'Ilmu Komunikasi', 'yosaphat.danis@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2052, '1008', 'Melisa Arisanty', 'Ilmu Komunikasi', 'melisa.arisanty@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2053, '1009', 'Dini Cinda Kirana', 'Desain Produk Industri', 'dini.cinda@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2054, '1010', 'Donna Angelina Sugianto', 'Desain Produk Industri', 'donna.angelina@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2055, '1011', 'Pandu Purwandaru', 'Desain Produk Industri', 'pandu.purwandaru@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2056, '1012', 'Fitorio Leksono Bowo', 'Desain Produk Industri', 'fitorio.leksono@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2057, '1013', 'Teddy Mohamad Darajat', 'Desain Produk Industri', 'teddy.darajat@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2058, '1014', 'Desi Dwi Kristanto', 'Desain Komunikasi Visual', 'desi.dwikristanto@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2059, '1015', 'Heny Pratiwi, B.Sc, M.Sc', 'Informatika', 'heny.pratiwi@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2060, '1016', 'RR. Dewi Nilamsari', 'Sistem Informasi', 'dewi.nilamsari@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2061, '1017', 'M. Hikmat S', 'Arsitektur', 'mohammad.hikmat@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen'),
(2062, '1018', 'Muhammad Mashudi', 'Arsitektur', 'muhammad.mashudi@upj.ac.id', '$2y$12$flIjmrw766qYcIusX.bTp.HS00DUOTyI070XzZ643xBdF8fT.TJ8S', 'dosen');

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

--
-- Dumping data untuk tabel `t_luaran_lain`
--

INSERT INTO `t_luaran_lain` (`id_luaran`, `nama_dosen`, `nama_dosen1`, `nama_dosen2`, `judul_luaran`, `jenis_luaran`, `deskripsi`, `url`, `file`, `tahun_pelaksanaan`, `valid`) VALUES
(1, 'johannes siregar', NULL, NULL, 'judul luaran 1', 'Desain', 'disini deskripsi', NULL, '', 2018, NULL),
(2, 'Desi Dwi Kristanto', NULL, NULL, 'wwwwwwwwwww', 'Prototype', 'tttttt', NULL, '', 2019, NULL);

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
(2, 2018, 'judul 2 publikasi', 'Teknologi', 'Donna Angelina Sugianto', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', 'Tata_Tertib_Ujian_A31.pdf', 'Jurnal Internasional', NULL),
(3, 2018, 'judul publikasi 3', 'Teknologi', 'Toufiq Panji Wisesa', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(4, 2018, 'judul 4', 'Teknologi', 'Retno Purwanti M', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(5, 2018, 'judul 6 publikasi', 'Teknologi', 'Hari Nugraha', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(6, 2018, 'judul 7', 'Teknologi', 'Irma Paramitha Sofia', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(7, 2018, 'judul 8', 'Teknologi', 'Eka Permanasari', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(8, 2018, 'juduul 9', 'Teknologi', 'Syaiful Halim', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(9, 2018, 'judul 10 ', 'Teknologi', 'Nur Uddin', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(10, 2018, 'judul 11', 'Teknologi', 'Dion Dewa Barata', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(11, 2018, 'judul 12', 'Teknologi', 'Clara Moningka', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', 'Tata_Tertib_Ujian_A3.pdf', 'Jurnal Internasional', NULL),
(12, 2020, 'judul 12', 'Teknologi', 'Marcello Singadji', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(13, 2019, 'jduul 13', 'Teknologi', 'Ferdinand Fassa', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL),
(14, 2019, 'judul 101', 'teknologi', 'Ratno Suprapto', NULL, NULL, NULL, '12345678', 9, 9, 12, 20, 'google.com', NULL, 'Jurnal Internasional', NULL),
(15, 2018, 'judul 4', 'Teknologi', 'Desi Dwi Kristanto', NULL, NULL, NULL, '123456789', 2, 2, 12, 19, 'google.com', NULL, 'Jurnal Internasional', NULL);

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
(1, 'Akuntansi', 11),
(2, 'Arsitektur', 10),
(3, 'Desain Komunikasi Visual', 8),
(4, 'Desain Produk', 9),
(5, 'Ilmu Komunikasi', 6),
(6, 'Informatika', 4),
(7, 'Manajemen', 5),
(8, 'Psikologi', 4),
(9, 'Sistem Informasi', 4),
(10, 'Teknik Sipil', 7);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `NIDN` (`NIDN`);

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
  MODIFY `id_buku_ajar` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_dana2_upj`
--
ALTER TABLE `t_dana2_upj`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_dana_kemenristek`
--
ALTER TABLE `t_dana_kemenristek`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `t_dana_kemenristek2`
--
ALTER TABLE `t_dana_kemenristek2`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_dana_non2_upj`
--
ALTER TABLE `t_dana_non2_upj`
  MODIFY `kode_penelitian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_dana_non_upj`
--
ALTER TABLE `t_dana_non_upj`
  MODIFY `kode_penelitian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_dana_upj`
--
ALTER TABLE `t_dana_upj`
  MODIFY `kode_penelitan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_forum_ilmiah`
--
ALTER TABLE `t_forum_ilmiah`
  MODIFY `id_perumi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_hki`
--
ALTER TABLE `t_hki`
  MODIFY `id_hki` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_login`
--
ALTER TABLE `t_login`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2063;

--
-- AUTO_INCREMENT untuk tabel `t_luaran_lain`
--
ALTER TABLE `t_luaran_lain`
  MODIFY `id_luaran` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_publikasi_jurnal`
--
ALTER TABLE `t_publikasi_jurnal`
  MODIFY `id_publikasi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `t_total_semua`
--
ALTER TABLE `t_total_semua`
  MODIFY `no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
