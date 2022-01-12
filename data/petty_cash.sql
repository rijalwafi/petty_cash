-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 04:11 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petty_cash`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `no_reff` int(11) NOT NULL,
  `nama_reff` varchar(40) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`no_reff`, `nama_reff`, `keterangan`) VALUES
(111, 'Kas', 'Kas'),
(113, 'Perlengkapan', 'Perlengkapan Perusahaan'),
(121, 'Peralatan', 'Peralatan Perusahaan'),
(122, 'Akumulasi Peralatan', 'Akumulasi Peralatan'),
(211, 'Utang Usaha', 'Utang Usaha'),
(311, 'Modal', 'Modal'),
(312, 'Prive', 'Prive'),
(411, 'Pendapatan', 'Pendapatan'),
(511, 'Beban Gaji', 'Beban Gaji'),
(512, 'Beban Sewa', 'Beban Sewa'),
(513, 'Beban Penyusutan Peralatan', 'Beban Penyusutan Peralatan'),
(514, 'Beban Lat', 'Beban Lat'),
(515, 'Beban Perlengkapan', 'Beban Perlengkapan'),
(550, 'Biaya snack dan minuman', 'Biaya snack dan minuman');

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `id_detail` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `kode_permintaan` varchar(20) NOT NULL,
  `nama_role` varchar(30) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `divisi` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `status_konfirmasi` int(2) DEFAULT NULL,
  `tgl_konfirmasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`id_detail`, `id_permintaan`, `kode_permintaan`, `nama_role`, `nama`, `divisi`, `jabatan`, `status_konfirmasi`, `tgl_konfirmasi`) VALUES
(8, 4, 'PKK-201120211032', 'kepala_cabang', 'Riho', 'Marketing', 'sales marketing', 1, '2021-11-20'),
(11, 4, 'PKK-201120211032', 'accounting', 'Rohman', 'Accounting', 'Kepala Divisi', 1, '2021-11-20'),
(12, 4, 'PKK-201120211032', 'kepala_divisi', 'yanto sudirman', 'Marketing', 'kepala divisi', 1, '2021-11-20'),
(13, 3, 'PKC-9129291991', 'accounting', 'Rozi Amrin', 'Human Resource', 'HRD', NULL, '2021-11-20'),
(15, 6, 'PKK-21112021ISXZ', 'accounting', 'Rozi Amrin', 'Accounting', 'kepala divisi Produk', 1, '2021-11-21'),
(16, 6, 'PKK-21112021ISXZ', 'kepala_cabang', 'Madun Antonio', 'Marketing', 'Kepala Cabang', 1, '2021-11-21'),
(17, 6, 'PKK-21112021ISXZ', 'kepala_divisi', 'yanto sudirman', 'Produksi', 'kepala divisi Produk', 1, '2021-11-21'),
(18, 7, 'PKK-21112021XNCK', 'kepala_cabang', 'Madun Antonio', 'Marketing', 'Kepala Cabang', 1, '2021-11-21'),
(19, 7, 'PKK-21112021XNCK', 'accounting', 'Rozi Amrin', 'Accounting', 'kepala divisi Produk', 1, '2021-11-21'),
(20, 7, 'PKK-21112021XNCK', 'kepala_divisi', 'yanto sudirman', 'Produksi', 'kepala divisi Produk', 1, '2021-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `keterangan`) VALUES
(1, 'Marketing', ''),
(2, 'Human Resource', ''),
(3, 'Produksi', ''),
(4, 'Warehouse', ''),
(5, 'Accounting', '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `keterangan`) VALUES
(1, 'sales marketing', ''),
(2, 'HRD', ''),
(3, 'Finance', ''),
(5, 'kepala divisi Produksi', ''),
(6, 'Kepala Cabang', ''),
(7, 'Operator Produksi', ''),
(8, 'Helper Produksi', ''),
(9, 'Kasir', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Komputer Jaringan'),
(2, 'Akutansi'),
(3, 'Sistem Informas'),
(4, 'Teknik Komputer'),
(5, 'Komputer Akutansi'),
(6, 'Manajemen Informatika'),
(7, 'Teknik Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `jenis_kas` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kas_masuk` float DEFAULT 0,
  `kas_keluar` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `tgl_dibuat`, `jenis_kas`, `keterangan`, `kas_masuk`, `kas_keluar`) VALUES
(1, '2021-11-12', 'pemasukan', 'KAS BESAR', 3000000, 0),
(4, '2021-11-12', 'pengeluaran', 'DIVISI PENJUALAN : CETAK BANNER DAN PAMFLET PENJUALAN MOBIL', 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `telepon` int(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `username`, `alamat`, `kelamin`, `telepon`, `no_ktp`, `password`, `role_id`, `id_jabatan`, `id_divisi`, `pendidikan`, `id_jurusan`) VALUES
(6, '55A884901', 'Madun Antonio', 'madun123', 'JL.Pepaya', 'L', 2147483647, '23746264183678', '$2y$10$isCDADDMNqoYNaJyE.OU8udOFfWIXxqDb0aNCFWreowiKgpbqUM2W', 1, 6, 1, 'S2', 3),
(7, '55A884902', 'Rozi Amrin', 'rozi123', 'Jl.Purwodadi', 'L', 24234, '454545', '$2y$10$76gmhE5PbljqtrdMexc4..xp/5BPa847aGmPl2a.5vcl.QcmAMoc6', 2, 5, 5, 'S1', 2),
(11, '', 'Toni Saputra', 'toni123', 'Jl.Paus', 'P', 86434, '3413287', '$2y$10$szrrNlt2w/aitQ0fM8sMr.AgW47ZyenpL8WDroZQxuuclJoDl.WwW', 2, 0, 0, '0', 0),
(12, '', 'anton', 'antonio', 'bekasi', 'L', 212121, '121212', '$2y$10$cNIsrhvnu/YP0H3123nqd.ULpHL/fJax7gHdDs5jTSwATimxbVTaK', 2, 8, 3, 'D3', 1),
(13, '', 'joko', 'joko123', 'bekasi', 'L', 2091929, '210210200120', '$2y$10$q3bMfogU173/wZaaUfwUDeUTtYfnnjw2W9UspJD1PRq01j1.ywIAK', 3, 2, 2, 'S2', 3),
(14, 'antonio', 'antonio', 'anton123', 'bekasi', 'L', 87737373, '09939388381', '$2y$10$Yp0QydrCVlwKenvRj8KgeuvLHCIW6vNhtx.6DACaPt0U5LqJjzFvK', 3, 3, 2, 'S1', 4),
(18, 'PEG-9393828', 'yanto sudirman', 'yanto123', 'bekasi', 'L', 821483647, '32120102010201', '$2y$10$LZcCxoarlra8SUpvthb17urhKolXwsY4NnQnFAj1Wb0GKwdPvP8me', 5, 5, 3, 'S1', 6),
(19, 'EMP- 211106461', 'sukmawati', 'sukmawati', 'bekasi', 'P', 851919299, '321998847712', '$2y$10$Nsi6Yx0yEx8mq/vL4KiRP.BKo./wDqVdZWv0OO0BPdffijoBlUoeO', 3, 7, 3, 'S1', 2),
(20, 'EMP- 21110512OV', 'joko susilo', 'naruto', 'jakarta', 'L', 85714122, '32155996969695', '$2y$10$ZDEXw5pl8bF6kyt5Uqm1r.vXZJ4YI8ksfHPX5DRXdiTr0DvzqyYEa', 3, 9, 5, 'D3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_kas_kecil`
--

CREATE TABLE `permintaan_kas_kecil` (
  `id_permintaan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `nominal` int(11) NOT NULL,
  `kode_permintaan` varchar(20) NOT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `tgl_permintaan` date NOT NULL,
  `nama_penerima` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tgl_diterima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_kas_kecil`
--

INSERT INTO `permintaan_kas_kecil` (`id_permintaan`, `nip`, `nama_divisi`, `nama_jabatan`, `nama_pemohon`, `keperluan`, `nominal`, `kode_permintaan`, `keterangan`, `tgl_permintaan`, `nama_penerima`, `status`, `tgl_diterima`) VALUES
(4, '55A884901', 'Marketing', 'sales marketing', 'Ridho Surya', 'Beli Kertas HVS 1 RIM', 200000, 'PKK-201120211032', '', '2021-11-20', 'Santoso', 1, '2021-11-20'),
(5, 'EMP- 211106461', 'produksi', 'Operator Produk', 'sukmawati', 'Beli Tinta Printer', 50000, 'PKK-201120211032', '', '2021-11-20', NULL, NULL, NULL),
(6, 'EMP- 21110512OV', 'Accounting', 'Kasir', 'joko susilo', 'Foto Copy', 100000, 'PKK-21112021ISXZ', '', '2021-11-21', 'Agus', 1, '2021-11-21'),
(7, '55A884901', 'Marketing', 'Kepala Cabang', 'Madun Antonio', 'beli kertas', 100000, 'PKK-21112021XNCK', '', '2021-11-21', 'joko', 1, '2021-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'kepala_cabang'),
(2, 'accounting'),
(3, 'umum'),
(5, 'kepala_divisi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_reff` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_saldo` enum('debit','kredit','','') NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_reff`, `tgl_input`, `tgl_transaksi`, `jenis_saldo`, `saldo`) VALUES
(15, 111, '2018-11-26 17:45:45', '2018-11-03', 'debit', 80000000),
(16, 311, '2018-11-26 17:45:45', '2018-11-03', 'kredit', 80000000),
(17, 121, '2018-11-26 17:46:37', '2018-11-03', 'debit', 35000000),
(18, 311, '2018-11-26 17:46:37', '2018-11-03', 'kredit', 35000000),
(19, 512, '2018-11-26 17:49:00', '2018-11-04', 'debit', 6000000),
(20, 111, '2018-11-26 17:49:00', '2018-11-04', 'kredit', 6000000),
(21, 111, '2018-11-26 17:52:00', '2018-11-05', 'kredit', 1900000),
(22, 113, '2018-11-26 17:52:00', '2018-11-05', 'debit', 1900000),
(23, 121, '2018-11-26 17:55:08', '2018-11-08', 'debit', 2000000),
(24, 211, '2018-11-26 17:55:08', '2018-11-08', 'kredit', 2000000),
(25, 411, '2018-11-26 17:57:04', '2018-11-10', 'kredit', 950000),
(26, 112, '2018-11-26 17:57:04', '2018-11-10', 'debit', 950000),
(27, 111, '2018-11-26 17:57:49', '2018-11-12', 'debit', 2500000),
(28, 411, '2018-11-26 17:57:49', '2018-11-12', 'kredit', 2500000),
(29, 211, '2018-11-26 17:59:24', '2018-11-15', 'debit', 200000),
(30, 111, '2018-11-26 17:59:24', '2018-11-15', 'kredit', 200000),
(31, 312, '2018-11-26 18:05:40', '2018-11-20', 'debit', 750000),
(32, 111, '2018-11-26 18:05:40', '2018-11-20', 'kredit', 750000),
(33, 111, '2018-11-26 18:06:13', '2018-11-28', 'debit', 750000),
(34, 112, '2018-11-26 18:06:13', '2018-11-28', 'kredit', 750000),
(35, 511, '2018-11-26 18:10:23', '2018-11-29', 'debit', 900000),
(36, 111, '2018-11-26 18:10:23', '2018-11-29', 'kredit', 900000),
(37, 514, '2018-11-26 18:10:57', '2018-11-30', 'debit', 1600000),
(38, 111, '2018-11-26 18:10:57', '2018-11-30', 'kredit', 1600000),
(39, 515, '2018-11-26 18:12:55', '2018-11-30', 'debit', 1150000),
(40, 113, '2018-11-26 18:12:55', '2018-11-30', 'kredit', 1150000),
(41, 513, '2018-11-26 18:14:43', '2018-11-30', 'debit', 250000),
(42, 122, '2018-11-26 18:14:43', '2018-11-30', 'kredit', 250000),
(43, 512, '2018-11-26 18:15:20', '2018-11-26', 'debit', 500000),
(44, 111, '2018-11-26 18:15:20', '2018-11-26', 'kredit', 500000),
(45, 111, '2018-11-28 10:40:25', '2019-11-30', 'debit', 2000000),
(46, 112, '2018-11-28 10:40:25', '2019-11-30', 'kredit', 2000000),
(47, 514, '2018-11-29 12:56:41', '2018-10-01', 'debit', 1000),
(48, 111, '2018-11-29 12:56:41', '2018-10-01', 'kredit', 1000),
(49, 112, '2018-11-28 12:15:31', '2018-10-02', 'debit', 2000000),
(50, 113, '2018-11-28 12:15:31', '2018-10-02', 'kredit', 2000000),
(59, 114, '2021-11-21 08:32:47', '2021-11-21', 'debit', 100000),
(60, 111, '2021-11-21 08:32:59', '2021-11-21', 'kredit', 100000),
(61, 114, '2021-11-21 15:22:36', '2021-11-21', 'debit', 100000),
(62, 111, '2021-11-21 15:22:51', '2021-11-21', 'kredit', 100000),
(63, 515, '2021-11-21 15:27:53', '2021-11-21', 'debit', 200000),
(64, 111, '2021-11-21 15:29:30', '2021-11-21', 'kredit', 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_reff`);

--
-- Indexes for table `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `permintaan_kas_kecil`
--
ALTER TABLE `permintaan_kas_kecil`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permintaan_kas_kecil`
--
ALTER TABLE `permintaan_kas_kecil`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
