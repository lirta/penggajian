-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 09:21 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `status_kehadiran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `tanggal`, `id_pegawai`, `jumlah_jam`, `status_kehadiran`) VALUES
(7, '2020-05-01', 'GURU38456745', 4, 'HADIR'),
(8, '2020-05-02', 'GURU38456745', 6, 'HADIR'),
(9, '2020-05-03', 'GURU38456745', 4, 'HADIR'),
(10, '2020-05-04', 'GURU38456745', 4, 'HADIR'),
(11, '2020-05-05', 'GURU38456745', 2, 'HADIR'),
(12, '2020-05-06', 'GURU38456745', 4, 'HADIR'),
(13, '2020-05-07', 'GURU38456745', 6, 'HADIR'),
(14, '2020-05-08', 'GURU38456745', 3, 'HADIR'),
(15, '2020-06-01', 'GURU38456745', 5, 'HADIR'),
(16, '2020-06-02', 'GURU38456745', 6, 'HADIR'),
(17, '2020-06-04', 'GURU38456745', 4, 'HADIR'),
(21, '2020-07-04', 'GURU4816686', 9, 'HADIR'),
(22, '2020-07-05', 'KARIAWAN39990407', 0, 'HADIR'),
(23, '2020-07-05', 'KARIAWAN47276490', 0, 'HADIR'),
(24, '2020-07-05', 'GURU38456745', 1000, 'HADIR');

-- --------------------------------------------------------

--
-- Table structure for table `detail_gaji`
--

CREATE TABLE `detail_gaji` (
  `id_detail_gaji` int(11) NOT NULL,
  `id_gaji` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_gaji`
--

INSERT INTO `detail_gaji` (`id_detail_gaji`, `id_gaji`, `keterangan`, `jumlah`) VALUES
(1, 'GGURU3845674568208771', 'jumlah jam ngajar15', 180000),
(2, 'GGURU3845674568208771', 'transpor', 15000),
(3, 'GGURU3845674568208771', 'wali kelas', 40000),
(4, 'GGURU3845674568208771', 'piket', 20000),
(5, 'GGURU481668668208771', 'gaji pokok', 400000),
(6, 'GGURU481668668208771', 'transpor', 15000),
(7, 'GGURU481668668208771', 'wali kelas', 40000),
(8, 'GGURU6025775668208771', 'gaji poko', 1000000),
(9, 'GGURU6025775668208771', 'TUNJANGAN ISTRI/SUAMI', 50000),
(10, 'GGURU6025775668208771', 'tunjangan anak', 100000),
(11, 'GGURU6025775668208771', 'transpor', 15000),
(12, 'GGURU6025775668208771', 'konsumsi', 20000),
(13, 'GGURU6025775668208771', 'wali kelas', 40000),
(14, 'GKARIAWAN3999040768208771', 'gaji poko', 900000),
(15, 'GKARIAWAN3999040768208771', 'TUNJANGAN ISTRI/SUAMI', 45000),
(16, 'GKARIAWAN3999040768208771', 'tunjangan anak', 90000),
(17, 'GKARIAWAN3999040768208771', 'transpor', 15000),
(18, 'GKARIAWAN3999040768208771', 'konsumsi', 20000),
(19, 'GKARIAWAN3999040768208771', 'perpustakaan', 50000),
(20, 'GKARIAWAN4727649068208771', 'gaji poko', 900000),
(21, 'GKARIAWAN4727649068208771', 'transpor', 15000),
(22, 'GKARIAWAN4727649068208771', 'perpustakaan', 50000),
(23, 'GKARIAWAN6017162068208771', 'gaji poko', 200000),
(24, 'GKARIAWAN6017162068208771', 'transpor', 15000),
(25, 'GKARIAWAN6017162068208771', 'bendahara', 70000),
(26, 'GGURU3845674584615820', 'jumlah jam ngajar33', 396000),
(27, 'GGURU3845674584615820', 'transpor', 15000),
(28, 'GGURU3845674584615820', 'wali kelas', 40000),
(29, 'GGURU3845674584615820', 'piket', 20000),
(30, 'GGURU481668684615820', 'gaji pokok', 400000),
(31, 'GGURU481668684615820', 'transpor', 15000),
(32, 'GGURU481668684615820', 'wali kelas', 40000),
(33, 'GGURU6025775684615820', 'gaji poko', 1000000),
(34, 'GGURU6025775684615820', 'TUNJANGAN ISTRI/SUAMI', 50000),
(35, 'GGURU6025775684615820', 'tunjangan anak', 100000),
(36, 'GGURU6025775684615820', 'transpor', 15000),
(37, 'GGURU6025775684615820', 'konsumsi', 20000),
(38, 'GGURU6025775684615820', 'wali kelas', 40000),
(39, 'GKARIAWAN3999040784615820', 'gaji poko', 900000),
(40, 'GKARIAWAN3999040784615820', 'TUNJANGAN ISTRI/SUAMI', 45000),
(41, 'GKARIAWAN3999040784615820', 'tunjangan anak', 90000),
(42, 'GKARIAWAN3999040784615820', 'transpor', 15000),
(43, 'GKARIAWAN3999040784615820', 'konsumsi', 20000),
(44, 'GKARIAWAN3999040784615820', 'perpustakaan', 50000),
(45, 'GKARIAWAN4727649084615820', 'gaji poko', 900000),
(46, 'GKARIAWAN4727649084615820', 'transpor', 15000),
(47, 'GKARIAWAN4727649084615820', 'perpustakaan', 50000),
(48, 'GKARIAWAN6017162084615820', 'gaji poko', 200000),
(49, 'GKARIAWAN6017162084615820', 'transpor', 15000),
(50, 'GKARIAWAN6017162084615820', 'bendahara', 70000),
(51, 'GGURU3845674568945244', 'jumlah jam ngajar0', 0),
(52, 'GGURU3845674568945244', 'transpor', 15000),
(53, 'GGURU3845674568945244', 'wali kelas', 40000),
(54, 'GGURU3845674568945244', 'piket', 20000),
(55, 'GGURU481668668945244', 'gaji pokok', 400000),
(56, 'GGURU481668668945244', 'transpor', 15000),
(57, 'GGURU481668668945244', 'wali kelas', 40000),
(58, 'GGURU6025775668945244', 'gaji poko', 1000000),
(59, 'GGURU6025775668945244', 'TUNJANGAN ISTRI/SUAMI', 50000),
(60, 'GGURU6025775668945244', 'tunjangan anak', 100000),
(61, 'GGURU6025775668945244', 'transpor', 15000),
(62, 'GGURU6025775668945244', 'konsumsi', 20000),
(63, 'GGURU6025775668945244', 'wali kelas', 40000),
(64, 'GKARIAWAN3999040768945244', 'gaji poko', 900000),
(65, 'GKARIAWAN3999040768945244', 'TUNJANGAN ISTRI/SUAMI', 45000),
(66, 'GKARIAWAN3999040768945244', 'tunjangan anak', 90000),
(67, 'GKARIAWAN3999040768945244', 'transpor', 15000),
(68, 'GKARIAWAN3999040768945244', 'konsumsi', 20000),
(69, 'GKARIAWAN3999040768945244', 'perpustakaan', 50000),
(70, 'GKARIAWAN4727649068945244', 'gaji poko', 900000),
(71, 'GKARIAWAN4727649068945244', 'transpor', 15000),
(72, 'GKARIAWAN4727649068945244', 'perpustakaan', 50000),
(73, 'GKARIAWAN6017162068945244', 'gaji poko', 200000),
(74, 'GKARIAWAN6017162068945244', 'transpor', 15000),
(75, 'GKARIAWAN6017162068945244', 'bendahara', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `jml_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `tgl`, `id_pegawai`, `jml_gaji`) VALUES
('GGURU3845674568208771', '2020-06-28', 'GURU38456745', 255000),
('GGURU3845674568945244', '2019-12-28', 'GURU38456745', 75000),
('GGURU3845674584615820', '2020-05-28', 'GURU38456745', 471000),
('GGURU481668668208771', '2020-06-28', 'GURU4816686', 235000),
('GGURU481668668945244', '2019-12-28', 'GURU4816686', 55000),
('GGURU481668684615820', '2020-05-28', 'GURU4816686', 451000),
('GGURU6025775668208771', '2020-06-28', 'GURU60257756', 1225000),
('GGURU6025775668945244', '2019-12-28', 'GURU60257756', 1225000),
('GGURU6025775684615820', '2020-05-28', 'GURU60257756', 1225000),
('GKARIAWAN3999040768208771', '2020-06-28', 'KARIAWAN39990407', 1120000),
('GKARIAWAN3999040768945244', '2019-12-28', 'KARIAWAN39990407', 1120000),
('GKARIAWAN3999040784615820', '2020-05-28', 'KARIAWAN39990407', 1120000),
('GKARIAWAN4727649068208771', '2020-06-28', 'KARIAWAN47276490', 965000),
('GKARIAWAN4727649068945244', '2019-12-28', 'KARIAWAN47276490', 965000),
('GKARIAWAN4727649084615820', '2020-05-28', 'KARIAWAN47276490', 965000),
('GKARIAWAN6017162068208771', '2020-06-28', 'KARIAWAN60171620', 285000),
('GKARIAWAN6017162068945244', '2019-12-28', 'KARIAWAN60171620', 285000),
('GKARIAWAN6017162084615820', '2020-05-28', 'KARIAWAN60171620', 285000);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `id_m_golongan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `id_pegawai`, `id_m_golongan`) VALUES
(12, 'GURU38456745', 'GH'),
(13, 'GURU4816686', 'GK'),
(14, 'GURU60257756', 'GY'),
(15, 'KARIAWAN39990407', 'KY'),
(16, 'KARIAWAN47276490', 'KK'),
(17, 'KARIAWAN60171620', 'KH');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_pegawai` varchar(125) NOT NULL,
  `id_m_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `id_pegawai`, `id_m_jabatan`) VALUES
(11, 'GURU38456745', 1),
(12, 'GURU38456745', 3),
(13, 'GURU4816686', 1),
(14, 'KARIAWAN60171620', 4),
(15, 'KARIAWAN39990407', 5),
(16, 'KARIAWAN47276490', 5),
(17, 'GURU60257756', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(125) NOT NULL,
  `akses` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `id_pegawai`, `username`, `password`, `akses`, `status`) VALUES
(1, '001', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'ADMIN', 'AKTIF'),
(4, 'KARIAWAN60171620', 'bendahara', 'c4ca4238a0b923820dcc509a6f75849b', 'BENDAHARA', 'AKTIF'),
(5, 'GURU60257756', 'piket', 'c4ca4238a0b923820dcc509a6f75849b', 'PIKET', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `master_golongan`
--

CREATE TABLE `master_golongan` (
  `id_m_golongan` varchar(11) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `jml_golongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_golongan`
--

INSERT INTO `master_golongan` (`id_m_golongan`, `golongan`, `jml_golongan`) VALUES
('GH', 'GURU HONOR', 12000),
('GK', 'GURU KONTRAK', 400000),
('GY', 'GURU YAYASAN', 1000000),
('KH', 'KARIAWAN HONOR', 200000),
('KK', 'KARIAWAN KONTRAK', 900000),
('KY', 'KARIAWAN YAYASAN', 900000);

-- --------------------------------------------------------

--
-- Table structure for table `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id_m_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tj_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`id_m_jabatan`, `jabatan`, `tj_jabatan`) VALUES
(1, 'wali kelas', 40000),
(3, 'piket', 20000),
(4, 'bendahara', 70000),
(5, 'perpustakaan', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `master_tunjangan`
--

CREATE TABLE `master_tunjangan` (
  `id_master_tunjangan` varchar(11) NOT NULL,
  `tunjangan` varchar(100) NOT NULL,
  `jml_tunjangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_tunjangan`
--

INSERT INTO `master_tunjangan` (`id_master_tunjangan`, `tunjangan`, `jml_tunjangan`) VALUES
('6', 'konsumsi', 20000),
('7', 'transpor', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tmp_lahir` varchar(125) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `jenis_kel` varchar(30) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `jlh_anak` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `foto` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tmp_lahir`, `tgl_lahir`, `jenis_kel`, `agama`, `no_hp`, `alamat`, `status_perkawinan`, `jlh_anak`, `kategori`, `foto`) VALUES
('GURU38456745', 'lirta p', 'padang panjang', '18/12/1992', 'Laki-laki', 'Islam', '081277967050', 'Jl. Parmata', 'KAWIN', 1, 'GURU', 'GURU3d-games-wallpapers-3d-picture-3d-wallpaper_oWEbyQ7.jpg'),
('GURU4816686', 'inda', 'padang', '18/11/1990', 'Laki-laki', 'Islam', '081277967050', 'Jl. Pinus 235', 'KAWIN', 4, 'GURU', 'GURU3D-Action-Games-HD-Wallpaper.jpg'),
('GURU60257756', 'mario pandiangan sitompul', 'medan', '10/05/1995', 'Laki-laki', 'Islam', '081277967050', 'Jl. Pinus 235x', 'KAWIN', 2, 'GURU', 'GURU3d-games-wallpapers-3d-picture-3d-wallpaper_oWEbyQ7.jpg'),
('KARIAWAN39990407', 'yulian', 'pariaman', '05/05/1997', 'Laki-laki', 'Islam', '8438747', 'garuda sakti', 'JANDA/DUDA', 3, 'KARIAWAN', 'KARIAWANdevil-may-cry-background.jpg'),
('KARIAWAN47276490', 'ananto', 'pekanbaru', '08/08/1991', 'Laki-laki', 'Islam', '8484884', 'Jl. Pinus 235x', 'BELUM KAWIN', 0, 'KARIAWAN', 'KARIAWANa932465541113e79d97204f0eb5c803b.jpg'),
('KARIAWAN60171620', 'ghentho', 'jawa', '19/11/1987', 'Laki-laki', 'Islam', '8438747', 'Jl. Parmata', 'KAWIN', 3, 'KARIAWAN', 'KARIAWANa (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `id_master_tunjangan` varchar(11) NOT NULL,
  `id_m_golongan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunjangan`, `id_master_tunjangan`, `id_m_golongan`) VALUES
(18, '7', 'GH'),
(19, '7', 'GK'),
(20, '7', 'GY'),
(21, '7', 'KH'),
(22, '7', 'KK'),
(23, '7', 'KY'),
(25, '6', 'GY'),
(26, '6', 'KY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `detail_gaji`
--
ALTER TABLE `detail_gaji`
  ADD PRIMARY KEY (`id_detail_gaji`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_golongan`
--
ALTER TABLE `master_golongan`
  ADD PRIMARY KEY (`id_m_golongan`);

--
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id_m_jabatan`);

--
-- Indexes for table `master_tunjangan`
--
ALTER TABLE `master_tunjangan`
  ADD PRIMARY KEY (`id_master_tunjangan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `detail_gaji`
--
ALTER TABLE `detail_gaji`
  MODIFY `id_detail_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `id_m_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
