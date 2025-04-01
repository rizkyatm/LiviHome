-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2025 pada 06.32
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `gambar`, `created_at`) VALUES
(1, 'Kursi Bantalan Kaki Kayu', '675000.00', 'furniture/01.png', '2025-03-30 13:04:38'),
(2, 'Tanaman Hias dalam Pot', '312500.00', 'furniture/02.png', '2025-03-30 13:04:38'),
(3, 'Pewangi Ruangan Aroma', '90000.00', 'furniture/03.png', '2025-03-30 13:04:38'),
(4, 'Tempat Tidur Abu-Abu', '9400000.00', 'furniture/04.png', '2025-03-30 13:04:38'),
(5, 'Kursi Biru Kaki Besi', '700000.00', 'furniture/05.png', '2025-03-30 13:04:38'),
(6, 'Lampu Gaya Loft 120x80 cm', '750000.00', 'furniture/06.png', '2025-03-30 13:04:38'),
(7, 'Kursi dengan Bantalan', '2525000.00', 'furniture/07.png', '2025-03-30 13:04:38'),
(8, 'Kursi dengan Kaki Kayu', '807500.00', 'furniture/08.png', '2025-03-30 13:04:38'),
(9, 'Kursi Kantor Kulit Satu Kaki', '3182500.00', 'furniture/09.png', '2025-03-30 13:04:38'),
(10, 'Sofa Biru untuk Bersantai', '5750000.00', 'furniture/10.png', '2025-03-30 13:04:38'),
(11, 'Kursi dengan Kaki Kayu', '1049850.00', 'furniture/11.png', '2025-03-30 13:04:38'),
(12, 'Rak Kayu Dekorasi', '4170000.00', 'furniture/12.png', '2025-03-30 13:04:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
