-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 02:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

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
-- Table structure for table `t_login`
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
-- Dumping data for table `t_login`
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
(75, '120001', 'Zita Nadia', 'Desain Komunikasi Visual', 'zita.nadia@upj.ac.id', '$2y$12$0YucAQGloc7TmLwkTIKY9O7aQn2pzviurMMum9KONmr6ymPgxOuay', 'dosen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
