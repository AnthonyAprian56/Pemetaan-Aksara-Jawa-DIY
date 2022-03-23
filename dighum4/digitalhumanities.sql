-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 03:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalhumanities`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_lokasi`
--

CREATE TABLE `tabel_lokasi` (
  `id_lokasi` int(5) NOT NULL,
  `nama_institusi` varchar(200) NOT NULL,
  `jenis_manuscript` varchar(200) NOT NULL,
  `judul_manuscript` varchar(100) NOT NULL,
  `bentuk_manuscript` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_lokasi`
--

INSERT INTO `tabel_lokasi` (`id_lokasi`, `nama_institusi`, `jenis_manuscript`, `judul_manuscript`, `bentuk_manuscript`, `alamat`, `lat`, `lng`) VALUES
(2, 'Yayasan Java Institut Museum Sonobudoyo', 'Aksara Murda', 'Ambiya', 'Tulis tangan dan dijilid dengan kulit kerbau, dan Digitalisasi.', 'Jl. Pangurakan No.6, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122\r\n\r\n', '-7.802444', '110.363956'),
(4, 'Keraton Yogyakarta', 'Aksara abugida (aksara keturunan Brahmi aksara yang memiliki arti dan kesamaan antara aksara jawa Dan aksara lainnya: Makasar, Sunda)', 'Kitab punakawan', 'Tulisan Tangan', 'Jl. Rotowijayan Blok No. 1, Panembahan, Kecamatan Kraton, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia', '-7.805277', '110.364202'),
(5, 'Perpustakaan Grahatama Pustaka', ' Aksara Pegon (abjad Arab yang dimodifikasi untuk menuliskan bahasa Jawa),', 'Al-Quran', 'Buku', 'Jl. Janti, Wonocatur, Banguntapan, Kec. Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198, Indonesia', '-7.799270', '110.406998'),
(6, 'Perpustakaan UIN Sunan Kalijaga', 'Aksara abugida (aksara keturunan Brahmi aksara yang memiliki arti dan kesamaan antara aksara jawa Dan aksara lainnya: Makasar, Sunda)', 'kitab hanoman', 'Buku yang dijilid dengan kulit kerbau dan Digitalisasi', 'Jl. Marsda Adisucipto, Demangan, Gondokusuman, Papringan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55221, Indonesia', '-7.783786', '110.395646');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_lokasi`
--
ALTER TABLE `tabel_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_lokasi`
--
ALTER TABLE `tabel_lokasi`
  MODIFY `id_lokasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
