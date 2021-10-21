-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2021 pada 12.11
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
-- Struktur dari tabel `order_t`
--

CREATE TABLE `order_t` (
  `order_id` int(11) NOT NULL,
  `nama_wstwn` varchar(255) DEFAULT NULL,
  `email_wstwn` varchar(255) DEFAULT NULL,
  `nohp_wstwn` varchar(255) DEFAULT NULL,
  `jmlh_wstwn` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_t`
--

INSERT INTO `order_t` (`order_id`, `nama_wstwn`, `email_wstwn`, `nohp_wstwn`, `jmlh_wstwn`, `schedule_id`) VALUES
(18, 'asd', 'asd@gmail.com', '0822777712345', 3, 48),
(24, 'Prahasditya', 'prahasditya17@gmail.com', '082277903366', 5, 60),
(25, 'Prahasditya', 'prahasditya17@gmail.com', '082277751633', 5, 59);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_t`
--

CREATE TABLE `schedule_t` (
  `schedule_id` int(11) NOT NULL,
  `nama_wisata` varchar(255) DEFAULT NULL,
  `tanggal_wisata` varchar(255) DEFAULT NULL,
  `lokasi_wisata` varchar(255) DEFAULT NULL,
  `kesulitan` varchar(255) DEFAULT NULL,
  `narahubung` varchar(255) DEFAULT NULL,
  `harga_wisata` varchar(255) DEFAULT NULL,
  `gambar_wisata` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedule_t`
--

INSERT INTO `schedule_t` (`schedule_id`, `nama_wisata`, `tanggal_wisata`, `lokasi_wisata`, `kesulitan`, `narahubung`, `harga_wisata`, `gambar_wisata`) VALUES
(48, 'RINJANI', '2021-06-30', 'Gunung Rinjani, Sembalun Lawang, Sembalun, Kabupaten Lombok Timur, NTB 83656', '8', '(0370) 660 8874', '40000', 'RINJAN.png'),
(49, 'SEMERU', '2021-07-08', 'Taman Nasional Bromo Tengger Semeru, Jawa Timur', '9', '(0341) 491 828', '32500', 'SEMER.png'),
(52, 'PRAU', '2021-07-28', 'Dataran Tinggi Dieng, Jawa Tengah, Indonesia.', '8', 'xxx', '40000', 'PRA.png'),
(53, 'MERBABU', '2021-07-17', 'Suroteleng, Selo, Kabupaten Boyolali 57363', '7', 'xxx', '15000', 'MERBAB.png'),
(54, 'PANGRANGO', '2021-08-20', 'Jawa Barat, Indonesia', '8', '0263 5127 76', '17500', 'PANGRANG.png'),
(55, 'PAPANDAYAN', '2021-08-14', 'Karamat Wangi, Cisurupan, Garut, Jawa Barat, Indonesia', '8', 'xxx', '20000', 'PAPANDAYA.png'),
(56, 'BROMO', '2021-07-09', 'Jawa Timur, Indonesia', '7', 'xxx', '15000', 'BROM.png'),
(58, 'IJEN', '2021-07-22', 'Kecamatan Licin, Kabupaten Banyuwangi 68454', '7', 'xxx', '5000', 'IJE.png'),
(59, 'KELIMUTU', '2021-09-10', 'Moni, Flores, Nusa Tenggara Timur', '6', 'xxx', '150000', 'KELIMUT.png'),
(60, 'JAYA WIJAYA', '2021-12-30', 'Puncak Jaya, Tembagapura, Kabupaten Mimika 98972', '10', 'xxx', '60000000', 'JAYAWIJAY.png');

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
(6, 'D3TT', '1tkj3.e@gmail.com', '$2y$10$I5rd99Cv42YOA5mI4m56X.EoUKOUES6mHLGL9e0ZZxZyFbqmLPymm', 177374, 'notverified', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `order_t`
--
ALTER TABLE `order_t`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `schedule_id_foreign` (`schedule_id`);

--
-- Indeks untuk tabel `schedule_t`
--
ALTER TABLE `schedule_t`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indeks untuk tabel `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `order_t`
--
ALTER TABLE `order_t`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `schedule_t`
--
ALTER TABLE `schedule_t`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order_t`
--
ALTER TABLE `order_t`
  ADD CONSTRAINT `schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_t` (`schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
