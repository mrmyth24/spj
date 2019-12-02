-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2019 pada 16.19
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_kp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `kelompok_golongan` int(11) NOT NULL,
  `golongan` enum('IA','IB','IC','ID','IIA','IIB','IIC','IID','IIIA','IIIB','IIIC','IIID','IVA','IVB','IVC','IVD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `kelompok_golongan`, `golongan`) VALUES
(1, 1, 'IA'),
(2, 1, 'IB'),
(3, 1, 'IC'),
(4, 1, 'ID'),
(5, 2, 'IIA'),
(6, 2, 'IIB'),
(7, 2, 'IIC'),
(8, 2, 'IID'),
(9, 3, 'IIIA'),
(10, 3, 'IIIB'),
(11, 4, 'IIIC'),
(12, 4, 'IIID'),
(13, 5, 'IVA'),
(14, 5, 'IVB'),
(15, 6, 'IVC'),
(16, 6, 'IVD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nrk` bigint(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_unit` varchar(50) NOT NULL,
  `golongan` enum('IA','IB','IC','ID','IIA','IIB','IIC','IID','IIIA','IIIB','IIIC','IIID','IVA','IVB','IVC','IVD') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `last_update_cbhrm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nrk`, `nama`, `kode_unit`, `golongan`, `jabatan`, `last_update_cbhrm`) VALUES
(3546753, 'kurniadi', 'cmo', 'IIID', 'kabag', 0),
(12345678, 'fauzan', 'IT', 'IVA', 'kabag', 0),
(734893847, 'satria', 'cmo', 'IVD', 'direksi', 0),
(738947389, 'kurniado', 'cmo', 'IVC', 'sekper', 0),
(7654323456, 'reza', 'IT', 'IVB', 'IT', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pdl`
--

CREATE TABLE `pdl` (
  `id` int(11) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `jenis_perjalanan` varchar(50) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `ditujukan_kepada` varchar(50) NOT NULL,
  `jabatan_penandatanganan` varchar(50) NOT NULL,
  `nomor_spj` varchar(50) NOT NULL,
  `tanggal_spj` date NOT NULL,
  `tipe_keperluan` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `no_polis` varchar(50) NOT NULL,
  `pengemudi` varchar(50) NOT NULL,
  `ditanggung_perusahaan` varchar(50) NOT NULL,
  `lain_lain` varchar(50) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `nomor_spp` varchar(50) NOT NULL,
  `disetujui_spp` varchar(50) NOT NULL,
  `jabatan_penyetuju` varchar(50) NOT NULL,
  `diajukan_spp` varchar(50) NOT NULL,
  `jabatan_spp` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pdl`
--

INSERT INTO `pdl` (`id`, `nomor`, `tanggal`, `tujuan`, `jenis_perjalanan`, `keperluan`, `tanggal_berangkat`, `tanggal_kembali`, `ditujukan_kepada`, `jabatan_penandatanganan`, `nomor_spj`, `tanggal_spj`, `tipe_keperluan`, `jenis_kendaraan`, `no_polis`, `pengemudi`, `ditanggung_perusahaan`, `lain_lain`, `bukti`, `nomor_spp`, `disetujui_spp`, `jabatan_penyetuju`, `diajukan_spp`, `jabatan_spp`, `status`) VALUES
(12, '1', '2019-11-25', 'pekanbaru', 'Dalam Daerah Dalam Mes', 'Ke kebun', '2019-11-12', '2019-11-20', 'reza', 'IT', 'satu', '2019-11-25', 'Dinas', 'Mobil', 'vse', 'vwe', 'wbr', 'wrb', '', 'satu', 'aw d', 'ae', 'a', 'ae', 0),
(13, '2', '2019-11-25', 'jakarta', 'Luar Daerah', 'rapat', '2019-11-18', '2019-11-27', 'reza', 'IT', 'dua', '2019-11-25', 'Dinas', 'Mobil', 'sbrf', 'rwbf', 'erb', 'erb', '', 'dua', 'ave', 'ew', 'wbr', 'wrb', 7),
(14, '3', '2019-11-25', 'pekanbaru', 'Dalam Daerah Luar Mes', 'rapat', '2019-11-11', '2019-11-18', 'reza', 'IT', 'tiga', '2019-11-25', 'Dinas', 'Mobil', 'ave', 've', 'wbr', 'rbw', '', 'tiga', 'avw', 'aev', 'abe', 'abr', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombongan_peserta`
--

CREATE TABLE `rombongan_peserta` (
  `id` int(11) NOT NULL,
  `id_pdl` int(5) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `jabatan_rombongan` varchar(50) NOT NULL,
  `golongan_rombongan` varchar(50) NOT NULL,
  `uang_makans` int(10) NOT NULL,
  `makan_pagis` int(10) NOT NULL,
  `makan_siangs` int(10) NOT NULL,
  `makan_malams` int(10) NOT NULL,
  `uang_sakus` int(10) NOT NULL,
  `uang_cucians` int(10) NOT NULL,
  `penginapans` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rombongan_peserta`
--

INSERT INTO `rombongan_peserta` (`id`, `id_pdl`, `nama_peserta`, `jabatan_rombongan`, `golongan_rombongan`, `uang_makans`, `makan_pagis`, `makan_siangs`, `makan_malams`, `uang_sakus`, `uang_cucians`, `penginapans`, `total`) VALUES
(30, 12, 'fauzan', 'kabag', 'IVA', 0, 8400, 10500, 10500, 31500, 6300, 105000, 270900),
(31, 12, 'reza', 'IT', 'IVB', 0, 8400, 10500, 10500, 31500, 6300, 105000, 270900),
(32, 13, 'kurniadi', 'kabag', 'IIID', 65000, 0, 0, 0, 100000, 20000, 350000, 535000),
(33, 13, 'kurniado', 'sekper', 'IVC', 75000, 0, 0, 0, 150000, 25000, 450000, 700000),
(34, 14, 'satria', 'direksi', 'IVD', 0, 16800, 21000, 21000, 63000, 12600, 210000, 705600),
(35, 14, 'reza', 'IT', 'IVB', 0, 17850, 26250, 26250, 68250, 15750, 210000, 786450);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `file_surat_masuk` varchar(128) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `no_surat_masuk` varchar(128) NOT NULL,
  `tgl_surat_masuk` date NOT NULL,
  `ringkasan` varchar(128) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `hapus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `file_surat_masuk`, `pengirim`, `no_surat_masuk`, `tgl_surat_masuk`, `ringkasan`, `status`, `hapus`) VALUES
(12, 'Contoh_User_Manual.docx', 'surat astri', '123', '2019-10-09', 'surat alpha astri', '0', '0'),
(21, 'Contoh_User_Manual1.docx', 'coba', '123', '2019-10-09', 'coba', '0', '0'),
(22, 'Laporan_DWH_nia1.docx', 'pdf', '13', '2019-10-09', 'pdf', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarifspj`
--

CREATE TABLE `tarifspj` (
  `id` int(11) NOT NULL,
  `jenis_perjalanan` enum('Dalam Daerah Dalam Mes','Luar Daerah','Dalam Daerah Luar Mes') NOT NULL,
  `kelompok_golongan` enum('1','2','3','4','5','6') NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `makan_pagi` int(11) NOT NULL,
  `makan_siang` int(11) NOT NULL,
  `makan_malam` int(11) NOT NULL,
  `uang_saku` int(11) NOT NULL,
  `uang_cucian` int(11) NOT NULL,
  `taxi_bandara` int(11) NOT NULL,
  `air_port_tax` int(11) NOT NULL,
  `transport_lokal` int(11) NOT NULL,
  `penginapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarifspj`
--

INSERT INTO `tarifspj` (`id`, `jenis_perjalanan`, `kelompok_golongan`, `uang_makan`, `makan_pagi`, `makan_siang`, `makan_malam`, `uang_saku`, `uang_cucian`, `taxi_bandara`, `air_port_tax`, `transport_lokal`, `penginapan`) VALUES
(1, 'Luar Daerah', '1', 48000, 0, 0, 0, 70000, 12000, 150000, 56100, 120000, 180000),
(2, 'Luar Daerah', '2', 48000, 0, 0, 0, 70000, 12000, 150000, 56100, 120000, 250000),
(3, 'Luar Daerah', '3', 60000, 0, 0, 0, 85000, 20000, 150000, 56100, 180000, 300000),
(4, 'Luar Daerah', '4', 65000, 0, 0, 0, 100000, 20000, 150000, 56100, 180000, 350000),
(5, 'Luar Daerah', '5', 75000, 0, 0, 0, 120000, 25000, 150000, 56100, 250000, 400000),
(6, 'Luar Daerah', '6', 75000, 0, 0, 0, 150000, 25000, 150000, 56100, 250000, 450000),
(7, 'Dalam Daerah Dalam Mes', '1', 0, 9450, 15750, 12600, 21000, 9450, 0, 0, 0, 152250),
(8, 'Dalam Daerah Dalam Mes', '2', 0, 10500, 15750, 15750, 42000, 10500, 0, 0, 0, 162750),
(9, 'Dalam Daerah Dalam Mes', '3', 0, 6825, 9450, 8925, 24150, 6300, 0, 0, 0, 89250),
(10, 'Dalam Daerah Dalam Mes', '4', 0, 8400, 10500, 10500, 29400, 6300, 0, 0, 0, 94500),
(11, 'Dalam Daerah Dalam Mes', '5', 0, 8400, 10500, 10500, 31500, 6300, 0, 0, 0, 105000),
(12, 'Dalam Daerah Dalam Mes', '6', 0, 8925, 13125, 13125, 34125, 7875, 0, 0, 0, 105000),
(13, 'Dalam Daerah Luar Mes', '1', 0, 9450, 15750, 12600, 21000, 9450, 0, 0, 0, 152250),
(14, 'Dalam Daerah Luar Mes', '2', 0, 10500, 15750, 15750, 42000, 10500, 0, 0, 0, 162750),
(15, 'Dalam Daerah Luar Mes', '3', 0, 13650, 18900, 17850, 48300, 12600, 0, 0, 0, 178500),
(16, 'Dalam Daerah Luar Mes', '4', 0, 16800, 21000, 21000, 58800, 12600, 0, 0, 0, 189000),
(17, 'Dalam Daerah Luar Mes', '5', 0, 16800, 21000, 21000, 63000, 12600, 0, 0, 0, 210000),
(18, 'Dalam Daerah Luar Mes', '6', 0, 17850, 26250, 26250, 68250, 15750, 0, 0, 0, 210000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'admin', 'admin', 'WIN_20180418_13_59_33_Pro.jpg', '$2y$10$GQqx57xSYwweXknlxNLiZ.WF5ohSYavlv1elk3g71xmmN6ZmYZeDi', 1, 1, 1568817562),
(11, 'atmi', 'atmi', 'default.jpg', '$2y$10$ZL.8E4aacbj8pm.uoZ.kee403qJUoU8gAMa6THoUg4Lly8rmu3zJS', 6, 1, 1573265003),
(12, 'kepalabagian', 'kepalabagian', 'default.jpg', '$2y$10$bGbUOIkf93lXFhWTQWomdOEZSUikICgbYMVJpFe5D6hZh1qbJb7Vy', 8, 1, 1573265120),
(13, 'direkturutama', 'direkturutama', 'default.jpg', '$2y$10$Z4c.6ErDHkzyro2b6d6Y9.2HKT3SOIuxgO1IudFbTUObbEcvQSfTy', 9, 1, 1573265175),
(14, 'sekretarisperusahaan', 'sekretarisperusahaan', 'default.jpg', '$2y$10$0WZ8APpF5/yp88oaktPqTO4oSttlz2FZJXc/skDX7cUZiwCohr1ZK', 10, 1, 1573265222),
(15, 'kabagsekper', 'kabagsekper', 'default.jpg', '$2y$10$c8k45bH6KCNgjs8INYMIF.0/W3/BX5/iKDH.H2B1EySrcsjUlNcqG', 11, 1, 1573265277),
(16, 'reza', 'reza', 'default.jpg', '$2y$10$8J/1nEvg1WfHLUm.7Xsxruluw4BVy5VPDW7wgNw5ClOg71dAmIn1.', 2, 1, 1573267283),
(17, 'satria', 'satria', 'default.jpg', '$2y$10$DgYe2jGZowPjmCdYg.C84eP/zKnFnhdr/ArsotJbfBTv7Ef/q/OAe', 2, 1, 1573267998);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(16, 2, 2),
(35, 1, 3),
(36, 1, 2),
(38, 1, 14),
(40, 1, 16),
(42, 1, 17),
(45, 1, 20),
(46, 1, 21),
(48, 1, 23),
(49, 1, 22),
(50, 6, 22),
(51, 1, 24),
(52, 1, 25),
(53, 6, 20),
(54, 8, 2),
(56, 2, 21),
(57, 9, 24),
(58, 10, 23),
(59, 10, 21),
(60, 11, 25),
(61, 9, 2),
(62, 10, 2),
(63, 11, 2),
(64, 6, 2),
(65, 1, 26),
(66, 2, 26),
(67, 1, 27),
(68, 10, 27),
(69, 10, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(22, 'PDL'),
(23, 'SPJ'),
(24, 'Dirut'),
(25, 'Direksi'),
(26, 'History'),
(27, 'SPP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(6, 'Atmi'),
(8, 'Kepala Bagian'),
(9, 'Direktur Utama'),
(10, 'Sekretaris Perusahaan'),
(11, 'Kepala Bagian Sekretaris Perusahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(15, 17, 'Surat Masuk', 'surat_masuk', 'fas fa-fw fa-user-tie', 1),
(16, 17, 'Trash', 'surat_masuk/trash', 'fas fa-fw fa-trash', 1),
(17, 1, 'Tarif', 'admin/tarif', 'fas fa-fw fa-dollar-sign', 1),
(18, 19, 'PDL', 'pdl', 'fas fa-fw fa-folder', 1),
(21, 23, 'SPJ', 'SPJ', 'fas fa-fw fa-envelope', 1),
(22, 22, 'PDL', 'PDL', 'fas fa-fw fa-envelope', 1),
(23, 2, 'Penanggung Jawab ', 'user/pjs', 'fas fa-fw fa-clipboard-check', 1),
(24, 24, 'Dirut', 'dirut', 'fas fa-fw fa-folder-open', 1),
(25, 25, 'Direksi', 'direksi', 'fas fa-fw fa-folder', 1),
(26, 26, 'History Surat', 'history', 'fas fa-fw fa-folder', 1),
(27, 27, 'SPP', 'spp', 'fas fa-fw fa-folder-open', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'kurniado729@gmail.com', 'X6bQBvYjXuHhSL2C+L5/kuXh8H3FtUjPt9XlxdrTATw=', 1571073949),
(5, 'kurniado729@gmail.com', '5nYksNNwWPNHLpPeu2at3mxO0U9JFc8ghJd2zvyfYnU=', 1571076919);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nrk`);

--
-- Indeks untuk tabel `pdl`
--
ALTER TABLE `pdl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rombongan_peserta`
--
ALTER TABLE `rombongan_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indeks untuk tabel `tarifspj`
--
ALTER TABLE `tarifspj`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `nrk` bigint(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT untuk tabel `pdl`
--
ALTER TABLE `pdl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rombongan_peserta`
--
ALTER TABLE `rombongan_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tarifspj`
--
ALTER TABLE `tarifspj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
