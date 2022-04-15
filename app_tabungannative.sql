-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2021 pada 16.26
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_tabungannative`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `kode` varchar(255) NOT NULL,
  `kodeUser` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`kode`, `kodeUser`, `tanggal`, `status`, `keterangan`, `jumlah`) VALUES
('38734dc7-f43a-48e3-94b5-bb1f50a5d8b9', 'c47d194b-bf74-4410-8f20-17cebfe412c8', '2021-02-12', 'Pemasukan', 'uang kas', 10000),
('707ff611-3f13-4f3e-a3c1-b687a3dd4e07', 'c47d194b-bf74-4410-8f20-17cebfe412c8', '2021-11-12', 'Pemasukan', 'Tabungan Bulan November', 1000000),
('7718ba70-6430-4bc5-bfe7-4313ec799cc1', '9aa1ca69-376f-4063-8671-6d81116727f2', '2019-01-23', 'Pemasukan', 'Masuk', 500000),
('b411263c-359c-4eb4-93c6-d365a18ec954', 'c47d194b-bf74-4410-8f20-17cebfe412c8', '2021-09-14', 'Pengeluaran', 'uang kas', 30000),
('efcff1ba-8bb6-4fd3-ae6d-65d2f9509b80', 'c47d194b-bf74-4410-8f20-17cebfe412c8', '2019-01-12', 'Pemasukan', 'Masuk', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kode` varchar(255) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Admin','Member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kode`, `nama`, `username`, `password`, `telepon`, `alamat`, `level`) VALUES
('9aa1ca69-376f-4063-8671-6d81116727f2', 'Ibra Trishandy Herlambang', 'ibra', '$2y$10$e8dCXLYoR5FqzC3P7pa8buuCpkuJmFyKU25f.f2JL6Drx3OUUzuwK', 82139186316, 'Tangerang RT.03 RW.01', 'Admin'),
('c47d194b-bf74-4410-8f20-17cebfe412c8', 'Vinsensius Dona Bagaskara', 'vinsen', '$2y$10$8vnbABlkPEsZoeFiKsFVz.4DPhaWCM9RivItkeS1jxLruMsn9s71O', 82328689184, 'Tangerang RT.03 RW.01', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kodeUser` (`kodeUser`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`kodeUser`) REFERENCES `user` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
