-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2021 pada 17.44
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userform`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`, `level`) VALUES
(1, 'Mountaineerz', 'mountaineerz.id@gmail.com', '$2y$10$8hIzfbWjg.PPib0R26SuFu7cRKPj3eSDr1HGqJqJsK.EgcPhb1pbW', 0, 'verified', '10'),
(2, 'Prahasditya', 'prahasditya17@gmail.com', '$2y$10$w8vE9eVItAYDVNzvjX2s8.96SRTP2/BVubBRAC7ihFVdADwJHCr5i', 0, 'verified', '1'),
(3, 'Prahasditya', '1tkj3.e@gmail.com', '$2y$10$YzYUkpxKRQav8UudacOVue8/p91/nL3wpq5cMmtYTxJXDtEf9nvjS', 199847, 'notverified', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `n_wisata` varchar(255) NOT NULL,
  `jmlh_wisatawan` varchar(255) NOT NULL,
  `kesulitan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `telepon` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
