-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2015 at 01:38 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pulang`
--

-- --------------------------------------------------------

--
-- Table structure for table `pulang_admin`
--

CREATE TABLE IF NOT EXISTS `pulang_admin` (
`id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `last_accessed` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulang_admin`
--

INSERT INTO `pulang_admin` (`id_admin`, `username`, `password`, `email`, `nama`, `last_accessed`) VALUES
(1, 'faldy', '459485d34935fdce96ccb0972aa7af81b3678f6b', 'faldy@jalanpulang.com', 'Faldy Ikhwan Fadilla', '2015-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `pulang_aman`
--

CREATE TABLE IF NOT EXISTS `pulang_aman` (
`id_tempat` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `keamanan` text NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulang_aman`
--

INSERT INTO `pulang_aman` (`id_tempat`, `nama`, `longitude`, `latitude`, `keamanan`, `date_updated`) VALUES
(1, 'Kantor Polisi Bulaksumur', 110.37844777107239, -7.7667465548551515, 'Ada Kantor Polisi. Jangan lupa pakai helm', '2015-11-20'),
(5, 'Kantor Polisi Pakualaman', 110.37761025130749, -7.797963598573454, 'Kantor Polisi Pakualaman', '2015-11-29'),
(6, 'Kantor Polisi Wirobajan', 110.35071909427643, -7.805026259009283, 'Kantor Polisi Wirobajan', '2015-11-29'),
(7, 'Kantor Polisi Sektor Kraton', 110.3580341488123, -7.808482806835415, 'Kantor Polisi Sektor Kraton', '2015-11-29'),
(8, 'Kantor Polisi Cokrodiningratan', 110.36751508712769, -7.778013314198974, 'Kantor Polisi Cokrodiningratan', '2015-11-29'),
(9, 'Kantor Polisi Sektor Kotagede', 110.39857774972916, -7.822529263820214, 'Kantor Polisi Sektor Kotagede', '2015-11-29'),
(10, 'Pos Polisi Dekat Gramedia', 110.37473559379578, -7.782941678856993, 'Pos Polisi Dekat Gramedia', '2015-11-29'),
(11, 'Kantor Polisi Sektor Gedongtengen', 110.36028183996677, -7.7893561729212335, 'Kantor Polisi Sektor Gedongtengen', '2015-11-29'),
(12, 'Polresta Yogyakarta', 110.36254160106182, -7.799783917535045, 'Polresta Yogyakarta', '2015-11-29'),
(13, 'Kantor Polisi Sektor Depok', 110.40835238993168, -7.76819494632599, 'Kantor Polisi Sektor Depok', '2015-11-29'),
(14, 'Kantor Polisi Sektor Gondomanan', 110.36988951265812, -7.803911494648125, 'Kantor Polisi Sektor Gondomanan', '2015-11-29'),
(15, 'Kantor Polisi Sektor Bulak Sumur', 110.38489043712616, -7.770493759230898, 'Kantor Polisi Sektor Bulak Sumur', '2015-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `pulang_bahaya`
--

CREATE TABLE IF NOT EXISTS `pulang_bahaya` (
`id_tempat` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `kriminalitas` text NOT NULL,
  `kontributor` int(11) NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulang_bahaya`
--

INSERT INTO `pulang_bahaya` (`id_tempat`, `nama`, `longitude`, `latitude`, `kriminalitas`, `kontributor`, `date_updated`) VALUES
(3, 'Alun alun', 110.36448955535889, -7.803690933051576, 'Lorem Ipsum', 5, '2015-11-28'),
(4, 'Ring Road Barat', 110.33088684082031, -7.785747990569253, 'Banyak Begal waktu malam', 5, '2015-11-28'),
(5, 'Alun Alun Kidul', 110.37835121154785, -7.802500429894964, 'Sangat berbahaya kalau tidak dikunjungi', 5, '2015-11-28'),
(6, 'UIN Sunan Kalijaga Yogyakarta', 110.39534568786621, -7.78464247607724, 'Adalah sebuah kampus negeri berbahaya jika tidak berpenghuni', 5, '2015-11-28'),
(7, 'sada', 110.37277221679688, -7.803095681897003, 'dada', 5, '2015-11-28'),
(8, 'RSUD Sardjito', 110.37368416786194, -7.768314538059079, 'Adalah rumah sakit swasta ternama di yogyakarta', 5, '2015-11-28'),
(9, 'Pogung', 110.3752613067627, -7.758619524427462, 'Pencurian Terjadi di Kos', 5, '2015-11-28'),
(10, 'Bundaran Teknik UGM', 110.37603378295898, -7.764955326202841, 'Kabarnya banyak kejadian menyeramkan', 5, '2015-11-28'),
(11, 'Wates', 110.33586502075195, -7.800629632372109, 'Sering terjadi pembegalan', 5, '2015-11-28'),
(12, 'Jalan Colombo', 110.3815484046936, -7.776903793004078, 'Sering terjadi kehabisan bensin disini', 5, '2015-11-28'),
(14, 'Jalan Kusumanegara', 110.39234161376953, -7.8024153938254965, 'Banyak anak anak. Hati-hati.', 1, '2015-11-29'),
(15, 'Dekat Selokan Mataram', 110.39911150932312, -7.7699090912460775, 'Begal sering nampak disini', 5, '2015-11-29'),
(16, 'Tegalrejo', 110.35794496536255, -7.772460363750174, 'Ada penculikan disini', 5, '2015-11-29'),
(17, 'Jalan TImoho', 110.39345741271973, -7.791275519273148, 'Terjadi Pencurian di sini', 1, '2015-11-29'),
(18, 'Jalan MT Haryono', 110.3562068939209, -7.813214836218813, 'Banyak orang tersesat', 1, '2015-11-29'),
(19, 'Monjali', 110.37105560302734, -7.751305594288292, 'Sering terjadi pencopetan massal', 1, '2015-11-29'),
(20, 'Jalan Magelang Yogyakarta', 110.36230087280273, -7.762021309064894, 'Banyak truk-truk dengan kecepatan tinggi', 1, '2015-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `pulang_feedback`
--

CREATE TABLE IF NOT EXISTS `pulang_feedback` (
`id_feedback` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulang_feedback`
--

INSERT INTO `pulang_feedback` (`id_feedback`, `judul`, `keluhan`, `longitude`, `latitude`, `id_user`, `date`) VALUES
(1, 'Lorem Ipsum', 'Saya Lapar Pak!', 0, 0, 5, '2015-11-28'),
(3, 'Lorem ', 'Ipsum', 0, 0, 5, '2015-11-29'),
(4, 'Lorem ', 'Ipsum', 110.37517547607422, -7.809303259404757, 5, '2015-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `pulang_user`
--

CREATE TABLE IF NOT EXISTS `pulang_user` (
`id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `register` datetime NOT NULL,
  `last_accessed` datetime NOT NULL,
  `alamat` text NOT NULL,
  `kontribusi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulang_user`
--

INSERT INTO `pulang_user` (`id_user`, `nama`, `username`, `password`, `email`, `register`, `last_accessed`, `alamat`, `kontribusi`) VALUES
(1, 'Administrator', 'admin', 'f702e36872d89c3e3f5f0e8fd847486c62f3a852', 'hizbulloh@jalanpulang.me', '2015-11-28 13:18:26', '2015-11-28 13:18:26', '', 0),
(2, '', 'qwe213', '459485d34935fdce96ccb0972aa7af81b3678f6b', 'ashari.muhammad.h@mail.ugm.ac.id', '2015-11-28 13:21:42', '2015-11-28 13:21:42', '', 0),
(3, 'as123', 'asdasd', '5e66d544bd3d5ba4c88936660d76b9bb22e7044a', 'hizbulloh@qwe.com', '2015-11-28 13:23:28', '2015-11-28 13:23:28', '', 0),
(5, 'lorem', 'lorem', '459485d34935fdce96ccb0972aa7af81b3678f6b', '123@mi.me', '2015-11-28 14:03:29', '2015-11-29 06:44:15', '', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pulang_admin`
--
ALTER TABLE `pulang_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pulang_aman`
--
ALTER TABLE `pulang_aman`
 ADD PRIMARY KEY (`id_tempat`), ADD KEY `date_updated` (`date_updated`), ADD KEY `date_updated_2` (`date_updated`);

--
-- Indexes for table `pulang_bahaya`
--
ALTER TABLE `pulang_bahaya`
 ADD PRIMARY KEY (`id_tempat`), ADD KEY `kontributor` (`kontributor`), ADD KEY `kontributor_2` (`kontributor`);

--
-- Indexes for table `pulang_feedback`
--
ALTER TABLE `pulang_feedback`
 ADD PRIMARY KEY (`id_feedback`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pulang_user`
--
ALTER TABLE `pulang_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pulang_admin`
--
ALTER TABLE `pulang_admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pulang_aman`
--
ALTER TABLE `pulang_aman`
MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pulang_bahaya`
--
ALTER TABLE `pulang_bahaya`
MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pulang_feedback`
--
ALTER TABLE `pulang_feedback`
MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pulang_user`
--
ALTER TABLE `pulang_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pulang_bahaya`
--
ALTER TABLE `pulang_bahaya`
ADD CONSTRAINT `pulang_bahaya_ibfk_1` FOREIGN KEY (`kontributor`) REFERENCES `pulang_user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `pulang_feedback`
--
ALTER TABLE `pulang_feedback`
ADD CONSTRAINT `pulang_feedback_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pulang_user` (`id_user`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
