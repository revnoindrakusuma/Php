-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 09:08 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Nisn` char(20) NOT NULL,
  `Jurusan` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pekerjaan` varchar(100) NOT NULL,
  `Tahun Angkatan` int(11) NOT NULL,
  `Tanggal Lahir` date NOT NULL,
  `Alamat Rumah` varchar(100) NOT NULL,
  `Gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `Nama`, `Nisn`, `Jurusan`, `Email`, `Pekerjaan`, `Tahun Angkatan`, `Tanggal Lahir`, `Alamat Rumah`, `Gambar`) VALUES
(18, 'refno indra kusuma', '20180801322', 'teknik informatika', 'revnoindrakusuma12@gmail.com', 'mahasiswa', 2018, '1998-11-13', 'kp.gembor', '61cc903300368.jpg'),
(40, 'refno kusuma', '20180801325', 'teknik informatika', 'revnoindrakusuma12@gmail.com', 'mahasiswa', 2018, '1998-11-13', 'kp.doyong', '61c372a633856.jpg'),
(44, 'wahyu', '20210801341', 'teknik informatika', 'wahyu@gmail.com', 'bartender', 2019, '1997-11-12', 'kp.doyong', '61ceacdd9f6a2.jpg'),
(45, 'wahyu', '20210801335', 'teknik Mesin', 'wahyu@gmail.com', 'bartender', 2019, '1997-11-12', 'kp.doyong', '61cead058adcb.jpg'),
(46, 'raul arya', '20210801341', 'teknik Mesin', 'raul@gmail.com', 'bartender', 2019, '1997-11-12', 'kp.doyong', '61ceadc543241.jpg'),
(47, 'rara', '20210801344', 'teknik informatika', 'rara@gmail.com', 'bartender', 2021, '1998-12-11', 'kp.doyong', '61d3e223802bc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `Email`, `password`) VALUES
(1, 'refno', '', '$2y$10$jkPmfu4S2a36ETv5sFtkBO3q0d0Sk2Y6QGyggP47mcXyvszZD9RtO'),
(5, 'rikuilars', '', '$2y$10$eHGzXC4ZNQCX2jNiKDxZKOepQ9sqFr1HB9Xx9GGsbfSVw5n5mUnBC'),
(6, 'admin', '', '$2y$10$iP6zwkid/bfERB2vQldGwOSwvijNtCEdIBXqN2soWq5qODh5ZlmhG'),
(7, 'tony', '', '$2y$10$JMpG7IL22JM8NCav0BPE.e9Yq50yW4eaqu7ggG9THwdxMftAOVC0a'),
(9, 'admin 1', '', '$2y$10$RxrilXzgdUrGN0LpXK2Xiu8/qbio1iRqGqDMzGQ2tYVaKifJGJnmy'),
(10, 'rara', '', '$2y$10$aedQnuLnUn1rLtRh.S0RHOP3mYmsVy.SvvdWW19jYifzmVJghTs82');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
