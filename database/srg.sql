-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 06:12 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srg`
--

-- --------------------------------------------------------

--
-- Table structure for table `dkfasilitas`
--

CREATE TABLE `dkfasilitas` (
  `id` int(10) NOT NULL,
  `gunung_id` int(10) NOT NULL,
  `kurang` float NOT NULL,
  `sedang` float NOT NULL,
  `lengkap` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkfasilitas`
--

INSERT INTO `dkfasilitas` (`id`, `gunung_id`, `kurang`, `sedang`, `lengkap`) VALUES
(1, 5, 0, 0.5, 0.5),
(2, 6, 1, 0, 0),
(3, 7, 1, 0, 0),
(4, 8, 0, 1, 0),
(5, 9, 1, 0, 0),
(6, 10, 0, 0, 1),
(7, 11, 0, 1, 0),
(8, 12, 0, 1, 0),
(9, 13, 0, 0, 1),
(10, 14, 0, 1, 0),
(11, 15, 0, 1, 0),
(12, 16, 0, 1, 0),
(13, 17, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dkharga`
--

CREATE TABLE `dkharga` (
  `id` int(10) NOT NULL,
  `gunung_id` int(10) NOT NULL,
  `murah` float NOT NULL,
  `sedang` float NOT NULL,
  `mahal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkharga`
--

INSERT INTO `dkharga` (`id`, `gunung_id`, `murah`, `sedang`, `mahal`) VALUES
(1, 5, 0, 0.875, 0.125),
(2, 6, 1, 0, 0),
(3, 7, 1, 0, 0),
(4, 8, 1, 0, 0),
(5, 9, 1, 0, 0),
(6, 10, 0, 0.5, 0.5),
(7, 11, 1, 0, 0),
(8, 12, 1, 0, 0),
(9, 13, 1, 0, 0),
(10, 14, 1, 0, 0),
(11, 15, 1, 0, 0),
(12, 16, 1, 0, 0),
(13, 17, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dkjamoperasional`
--

CREATE TABLE `dkjamoperasional` (
  `id` int(10) NOT NULL,
  `gunung_id` int(10) NOT NULL,
  `sebentar` float NOT NULL,
  `sedang` float NOT NULL,
  `lama` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkjamoperasional`
--

INSERT INTO `dkjamoperasional` (`id`, `gunung_id`, `sebentar`, `sedang`, `lama`) VALUES
(1, 5, 0, 1, 0),
(2, 6, 0, 1, 0),
(3, 7, 0, 1, 0),
(4, 8, 0, 0, 1),
(5, 9, 1, 0, 0),
(6, 10, 0, 0, 1),
(7, 11, 0, 1, 0),
(8, 12, 0, 1, 0),
(9, 13, 0, 1, 0),
(10, 14, 1, 0, 0),
(11, 15, 0, 0, 1),
(12, 16, 0, 0, 1),
(13, 17, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gunung`
--

CREATE TABLE `gunung` (
  `id` int(10) NOT NULL,
  `nama_gunung` varchar(40) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `harga` int(12) NOT NULL,
  `fasilitas` int(12) NOT NULL,
  `jamoperasional` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gunung`
--

INSERT INTO `gunung` (`id`, `nama_gunung`, `foto`, `harga`, `fasilitas`, `jamoperasional`) VALUES
(5, 'semeru', 'none.jpg', 850000, 75, 13),
(6, 'manglayang', 'none.jpg', 50000, 10, 12),
(7, 'lembu', 'none.jpg', 30000, 5, 8),
(8, 'slamet', 'none.jpg', 60000, 60, 17),
(9, 'guntur', 'none.jpg', 100000, 20, 6),
(10, 'rinjani', 'none.jpg', 1000000, 90, 24),
(11, 'arjuno', 'none.jpg', 70000, 50, 12),
(12, 'prau', 'none.jpg', 50000, 37, 12),
(13, 'tangkuban perahu', 'none.jpg', 60000, 80, 9),
(14, 'krakatau', 'none.jpg', 100000, 39, 2),
(15, 'gede pangrango', 'none.jpg', 150000, 35, 20),
(16, 'lawu', 'none.jpg', 30000, 70, 20),
(17, 'merbabu', 'none.jpg', 10000, 68, 20);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`) VALUES
(1, 'harga'),
(2, 'fasilitas'),
(3, 'jam operasional');

-- --------------------------------------------------------

--
-- Table structure for table `setkriteria`
--

CREATE TABLE `setkriteria` (
  `id` int(10) NOT NULL,
  `kriteria_id` int(10) NOT NULL,
  `nama_setkriteria` varchar(30) NOT NULL,
  `nilai_minimal` int(12) DEFAULT NULL,
  `nilai_maksimal` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setkriteria`
--

INSERT INTO `setkriteria` (`id`, `kriteria_id`, `nama_setkriteria`, `nilai_minimal`, `nilai_maksimal`) VALUES
(1, 1, 'murah', NULL, 400000),
(2, 1, 'sedang', 300000, 1200000),
(3, 1, 'mahal', 800000, NULL),
(4, 2, 'kurang', NULL, 35),
(5, 2, 'sedang', 30, 80),
(6, 2, 'lengkap', 70, NULL),
(7, 3, 'sebentar', NULL, 7),
(8, 3, 'sedang', 6, 16),
(9, 3, 'lama', 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dkfasilitas`
--
ALTER TABLE `dkfasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dkfasilitas_ibfk_1` (`gunung_id`);

--
-- Indexes for table `dkharga`
--
ALTER TABLE `dkharga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dkharga_ibfk_1` (`gunung_id`);

--
-- Indexes for table `dkjamoperasional`
--
ALTER TABLE `dkjamoperasional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gunung_id` (`gunung_id`);

--
-- Indexes for table `gunung`
--
ALTER TABLE `gunung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setkriteria`
--
ALTER TABLE `setkriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dkfasilitas`
--
ALTER TABLE `dkfasilitas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dkharga`
--
ALTER TABLE `dkharga`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dkjamoperasional`
--
ALTER TABLE `dkjamoperasional`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `gunung`
--
ALTER TABLE `gunung`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `setkriteria`
--
ALTER TABLE `setkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dkfasilitas`
--
ALTER TABLE `dkfasilitas`
  ADD CONSTRAINT `dkfasilitas_ibfk_1` FOREIGN KEY (`gunung_id`) REFERENCES `gunung` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dkharga`
--
ALTER TABLE `dkharga`
  ADD CONSTRAINT `dkharga_ibfk_1` FOREIGN KEY (`gunung_id`) REFERENCES `gunung` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dkjamoperasional`
--
ALTER TABLE `dkjamoperasional`
  ADD CONSTRAINT `dkjamoperasional_ibfk_1` FOREIGN KEY (`gunung_id`) REFERENCES `gunung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
