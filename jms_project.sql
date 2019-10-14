-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Des 2016 pada 13.40
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jms_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `add_user`
--

CREATE TABLE IF NOT EXISTS `add_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(1000) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `user_fullname` varchar(1000) NOT NULL,
  `user_level` enum('Superuser','Adminstrator','Seller') NOT NULL,
  `role_id` int(11) NOT NULL,
  `receive_email` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `no_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `invited_by` varchar(50) NOT NULL,
  `judul_agenda` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `attenders` varchar(50) NOT NULL,
  `status` enum('Active','Cancel','Pending','Reschedule') NOT NULL,
  PRIMARY KEY (`no_agenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`no_agenda`, `invited_by`, `judul_agenda`, `deskripsi`, `tempat`, `tanggal`, `jam`, `attenders`, `status`) VALUES
(7, 'Contoh', 'Contoh', 'Contoh', 'Contoh', '2016-01-01', '01:00:00', 'Agung Prabowo, Muhammad Albar, Daniel Aditya, Chai', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_board`
--

CREATE TABLE IF NOT EXISTS `m_board` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `pesan` text NOT NULL,
  `author` varchar(1000) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `m_board`
--

INSERT INTO `m_board` (`no`, `pesan`, `author`) VALUES
(1, 'Lorem Ipsum has been the industry''s standard dummy text', 'Agung Prabowo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spk`
--

CREATE TABLE IF NOT EXISTS `spk` (
  `no_spk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_klien` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `duedate` date NOT NULL,
  `status` enum('Done','On Progress','Cheking') NOT NULL,
  `last_update_by` varchar(500) NOT NULL,
  `last_update_time` datetime NOT NULL,
  PRIMARY KEY (`no_spk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `spk`
--

INSERT INTO `spk` (`no_spk`, `nama_klien`, `details`, `project_name`, `start_date`, `duedate`, `status`, `last_update_by`, `last_update_time`) VALUES
(35, 'Contoh', 'Contoh', 'Contoh', '2016-01-01', '2016-01-01', 'On Progress', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `no_spk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_klien` varchar(50) NOT NULL,
  `report` text NOT NULL,
  `report_in` date NOT NULL,
  `level` int(1) NOT NULL,
  `status` enum('On Progress','Cheking','Done') NOT NULL,
  PRIMARY KEY (`no_spk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `ticket`
--

INSERT INTO `ticket` (`no_spk`, `nama_klien`, `report`, `report_in`, `level`, `status`) VALUES
(21, 'Contoh', 'Contoh', '2016-01-01', 2, 'On Progress');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_level` enum('Superuser','Administrator') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_mail`, `user_fullname`, `user_level`) VALUES
(1, 'agung', 'gangs', 'admin@admin.com', 'Agung Prabowo', 'Superuser'),
(13, 'albar', 'albar', 'albar@gmail.com', 'Muhammad Albar', 'Superuser'),
(14, 'daniel', 'daniel', 'daniel@gmail.com', 'Daniel Aditya', 'Administrator'),
(15, 'umam', 'umam', 'umam@gmail.com', 'Chairul Umam', 'Administrator'),
(16, 'awal', 'rizki', 'awal@gmail.com', 'Awal Rizki', 'Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
