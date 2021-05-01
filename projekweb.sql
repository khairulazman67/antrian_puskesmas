-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2020 pada 06.00
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pas`
--

CREATE TABLE `akun_pas` (
  `id_pas` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `noHp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akun_pas`
--

INSERT INTO `akun_pas` (`id_pas`, `password`, `noHp`) VALUES
('PAS00001', 'PAS00001', '082382898960'),
('PAS00002', 'PAS00002', '082381817821');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pet`
--

CREATE TABLE `akun_pet` (
  `id_petugas` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `akun_pet`
--

INSERT INTO `akun_pet` (`id_petugas`, `password`, `jabatan`) VALUES
('PET01', 'Pet012345678', 'Petugas Inti'),
('PET02', 'PET02', 'Petugas Antrian'),
('PET03', 'PET03', 'Petugas Pendaftaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `no_antrian` varchar(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `nm_pasien` varchar(30) NOT NULL,
  `poli` varchar(20) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `id_inp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pas`
--

CREATE TABLE `data_pas` (
  `id_pas` varchar(10) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tmp_lahir` varchar(15) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `j_kel` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jaskes` varchar(15) NOT NULL,
  `no_jaskes` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `id_petugas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_pas`
--

INSERT INTO `data_pas` (`id_pas`, `NIK`, `nama`, `tmp_lahir`, `tgl_lahir`, `j_kel`, `alamat`, `jaskes`, `no_jaskes`, `no_hp`, `tanggal`, `id_petugas`) VALUES
('PAS00001', '1234567812345678', 'Khairul Azman', 'Lhokseumawe', '2000-07-06', 'Laki-Laki', 'asas', 'BPJS', '121212789990987', '082382898960', '18/01/2020 01:27:16 ', 'PET03'),
('PAS00002', '8765432112345678', 'Rahmahtillah', 'Lhokseumawe', '2000-07-06', 'Perempuan', 'Lhokseumawe', 'BPJS', '121212789990911', '082381817821', '18/01/2020 01:30:05 ', 'PET03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pet`
--

CREATE TABLE `data_pet` (
  `id_petugas` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tpt_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `j_kel` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `id_penginput` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_pet`
--

INSERT INTO `data_pet` (`id_petugas`, `nama`, `tpt_lahir`, `tgl_lahir`, `j_kel`, `alamat`, `no_hp`, `jabatan`, `tgl_input`, `id_penginput`) VALUES
('PET01', 'Khairul Azman', 'Lhokseumawe', '2000/07/06', 'Laki-lakI', 'Lhokseumawe', '082382898960', 'Petugas Inti', '2020/01/01', ''),
('PET02', 'Rahmahtillah', 'lhokseumawe', '2000-07-16', 'Laki-Laki', 'Lhokseumawe', '082382898960', 'Petugas Antrian', '17/01/2020 02:02:02 ', 'PET01'),
('PET03', 'azman', 'Bireun', '2000-07-06', 'Laki-Laki', 'Lhokseumawe', '082382898960', 'Petugas Pendaftaran', '17/01/2020 02:09:44 ', 'PET01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` varchar(10) NOT NULL,
  `nm_poli` varchar(20) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `panggil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nm_poli`, `ket`, `panggil`) VALUES
('POL01', 'Poli Gigi', 'buka', 'A009'),
('POL02', 'Poli Anak', 'buka', 'B001'),
('POL03', 'Poli Umum', 'buka', 'C001'),
('POL05', 'Poli VCT', 'buka', 'D003'),
('POL06', 'Poli KB/KIA', 'buka', ''),
('POL07', 'Poli Fisioterapi', 'buka', ''),
('POL08', 'Poli Gizi', 'buka', ''),
('POL09', 'Poli Imunisasi', 'buka', 'H001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_pas`
--
ALTER TABLE `akun_pas`
  ADD PRIMARY KEY (`id_pas`);

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`no_antrian`);

--
-- Indeks untuk tabel `data_pas`
--
ALTER TABLE `data_pas`
  ADD PRIMARY KEY (`id_pas`,`NIK`);

--
-- Indeks untuk tabel `data_pet`
--
ALTER TABLE `data_pet`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
