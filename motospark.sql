-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2018 pada 01.39
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motospark`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_history`
--

CREATE TABLE `tabel_history` (
  `id_history` int(11) NOT NULL,
  `id_plat` varchar(10) NOT NULL,
  `lat_awal` double NOT NULL,
  `long_awal` double NOT NULL,
  `lat_akhir` double NOT NULL,
  `long_akhir` double NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jarak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_motor`
--

CREATE TABLE `tabel_motor` (
  `id_plat` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_motor` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL,
  `tanggal_add` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_posisi_now`
--

CREATE TABLE `tabel_posisi_now` (
  `id_plat` varchar(10) NOT NULL,
  `lat` double NOT NULL,
  `longi` double NOT NULL,
  `nama_posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_pin` int(6) NOT NULL,
  `create_at` varchar(100) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `email`, `password`, `user_pin`, `create_at`, `auth_key`, `access_token`) VALUES
(26, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 123456, '', 'GQaXTx-8r_Hp3wPJBOvs38mIe', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_history`
--
ALTER TABLE `tabel_history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_plat` (`id_plat`),
  ADD KEY `id_plat_2` (`id_plat`);

--
-- Indexes for table `tabel_motor`
--
ALTER TABLE `tabel_motor`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `tabel_posisi_now`
--
ALTER TABLE `tabel_posisi_now`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `id_plat` (`id_plat`),
  ADD KEY `id_plat_2` (`id_plat`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `auth_key` (`auth_key`),
  ADD UNIQUE KEY `access_token` (`access_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_history`
--
ALTER TABLE `tabel_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_history`
--
ALTER TABLE `tabel_history`
  ADD CONSTRAINT `tabel_history_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `tabel_motor` (`id_plat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_motor`
--
ALTER TABLE `tabel_motor`
  ADD CONSTRAINT `tabel_motor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_posisi_now`
--
ALTER TABLE `tabel_posisi_now`
  ADD CONSTRAINT `tabel_posisi_now_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `tabel_motor` (`id_plat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
