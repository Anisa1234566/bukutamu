-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2025 pada 10.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamu_anisa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE `bukutamu` (
  `nama` char(20) DEFAULT NULL,
  `email` char(20) NOT NULL,
  `komentar` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`nama`, `email`, `komentar`) VALUES
('bagai', 'fanny@gmail.com', 'ghh'),
('hp', 'ica@gmail.com', 'hgffdg'),
('Anisa Rahmah Adamia', 'ica@gmail.com', ''),
('Anisa Rahmah Adamia', 'ica@gmail.com', 'bagaimana kabarmu'),
('Anisa Rahmah Adamia', 'ica@gmail.com', 'bagaimana'),
('Anisa Rahmah Adamia', 'anisa@gmail.com', 'good night'),
('delete', 'jya@gmail.com', 'hapus adalah delete');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
