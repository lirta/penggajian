-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 10:08 AM
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
(1, 'GGURU3845674551180869', 'Transpor dan konsumsi', 27001),
(2, 'GGURU3845674551180869', 'jumlah jam ngajar =1000', 12000000),
(3, 'GGURU3845674551180869', 'wali kelas', 40000),
(4, 'GGURU3845674551180869', 'piket', 20000),
(5, 'GGURU481668651180869', 'Transpor dan konsumsi', 27000),
(6, 'GGURU481668651180869', 'gaji pokok', 400000),
(7, 'GGURU481668651180869', 'wali kelas', 40000),
(8, 'GGURU6025775651180869', 'Transpor dan konsumsi', 0),
(9, 'GGURU6025775651180869', 'gaji poko', 1000000),
(10, 'GGURU6025775651180869', 'wali kelas', 40000),
(11, 'GGURU6025775651180869', 'TUNJANGAN ISTRI/SUAMI', 50000),
(12, 'GGURU6025775651180869', 'tunjangan anak', 50000),
(13, 'GKARIAWAN3999040751180869', 'Transpor dan konsumsi', 0),
(14, 'GKARIAWAN3999040751180869', 'gaji poko', 900000),
(15, 'GKARIAWAN3999040751180869', 'perpustakaan', 50000),
(16, 'GKARIAWAN3999040751180869', 'TUNJANGAN ISTRI/SUAMI', 45000),
(17, 'GKARIAWAN3999040751180869', 'tunjangan anak', 45000),
(18, 'GKARIAWAN4727649051180869', 'Transpor dan konsumsi', 0),
(19, 'GKARIAWAN4727649051180869', 'gaji poko', 900000),
(20, 'GKARIAWAN4727649051180869', 'perpustakaan', 50000),
(21, 'GKARIAWAN6017162051180869', 'Transpor dan konsumsi', 0),
(22, 'GKARIAWAN6017162051180869', 'gaji poko', 200000),
(23, 'GKARIAWAN6017162051180869', 'bendahara', 70000),
(24, 'GGURU3845674533941270', 'Transpor dan konsumsi', 81003),
(25, 'GGURU3845674533941270', 'jumlah jam ngajar =15', 180000),
(26, 'GGURU3845674533941270', 'wali kelas', 40000),
(27, 'GGURU3845674533941270', 'piket', 20000),
(28, 'GGURU481668633941270', 'Transpor dan konsumsi', 0),
(29, 'GGURU481668633941270', 'gaji pokok', 400000),
(30, 'GGURU481668633941270', 'wali kelas', 40000),
(31, 'GGURU6025775633941270', 'Transpor dan konsumsi', 0),
(32, 'GGURU6025775633941270', 'gaji poko', 1000000),
(33, 'GGURU6025775633941270', 'wali kelas', 40000),
(34, 'GGURU6025775633941270', 'TUNJANGAN ISTRI/SUAMI', 50000),
(35, 'GGURU6025775633941270', 'tunjangan anak', 50000),
(36, 'GKARIAWAN3999040733941270', 'Transpor dan konsumsi', 0),
(37, 'GKARIAWAN3999040733941270', 'gaji poko', 900000),
(38, 'GKARIAWAN3999040733941270', 'perpustakaan', 50000),
(39, 'GKARIAWAN3999040733941270', 'TUNJANGAN ISTRI/SUAMI', 45000),
(40, 'GKARIAWAN3999040733941270', 'tunjangan anak', 45000),
(41, 'GKARIAWAN4727649033941270', 'Transpor dan konsumsi', 0),
(42, 'GKARIAWAN4727649033941270', 'gaji poko', 900000),
(43, 'GKARIAWAN4727649033941270', 'perpustakaan', 50000),
(44, 'GKARIAWAN6017162033941270', 'Transpor dan konsumsi', 0),
(45, 'GKARIAWAN6017162033941270', 'gaji poko', 200000),
(46, 'GKARIAWAN6017162033941270', 'bendahara', 70000),
(47, 'GGURU3845674570186636', 'Transpor dan konsumsi', 216008),
(48, 'GGURU3845674570186636', 'jumlah jam ngajar =33', 396000),
(49, 'GGURU3845674570186636', 'wali kelas', 40000),
(50, 'GGURU3845674570186636', 'piket', 20000),
(51, 'GGURU481668670186636', 'Transpor dan konsumsi', 0),
(52, 'GGURU481668670186636', 'gaji pokok', 400000),
(53, 'GGURU481668670186636', 'wali kelas', 40000),
(54, 'GGURU6025775670186636', 'Transpor dan konsumsi', 0),
(55, 'GGURU6025775670186636', 'gaji poko', 1000000),
(56, 'GGURU6025775670186636', 'wali kelas', 40000),
(57, 'GGURU6025775670186636', 'TUNJANGAN ISTRI/SUAMI', 50000),
(58, 'GGURU6025775670186636', 'tunjangan anak', 50000),
(59, 'GKARIAWAN3999040770186636', 'Transpor dan konsumsi', 0),
(60, 'GKARIAWAN3999040770186636', 'gaji poko', 900000),
(61, 'GKARIAWAN3999040770186636', 'perpustakaan', 50000),
(62, 'GKARIAWAN3999040770186636', 'TUNJANGAN ISTRI/SUAMI', 45000),
(63, 'GKARIAWAN3999040770186636', 'tunjangan anak', 45000),
(64, 'GKARIAWAN4727649070186636', 'Transpor dan konsumsi', 0),
(65, 'GKARIAWAN4727649070186636', 'gaji poko', 900000),
(66, 'GKARIAWAN4727649070186636', 'perpustakaan', 50000),
(67, 'GKARIAWAN6017162070186636', 'Transpor dan konsumsi', 0),
(68, 'GKARIAWAN6017162070186636', 'gaji poko', 200000),
(69, 'GKARIAWAN6017162070186636', 'bendahara', 70000);

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
('GGURU481668633941270', '2020-06-28', 'GURU4816686', 440000),
('GGURU481668651180869', '2020-07-28', 'GURU4816686', 467000),
('GGURU481668670186636', '2020-05-28', 'GURU4816686', 440000),
('GGURU6025775633941270', '2020-06-28', 'GURU60257756', 1140000),
('GGURU6025775651180869', '2020-07-28', 'GURU60257756', 1140000),
('GGURU6025775670186636', '2020-05-28', 'GURU60257756', 1140000),
('GKARIAWAN3999040733941270', '2020-06-28', 'KARIAWAN39990407', 1040000),
('GKARIAWAN3999040751180869', '2020-07-28', 'KARIAWAN39990407', 1040000),
('GKARIAWAN3999040770186636', '2020-05-28', 'KARIAWAN39990407', 1040000);

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
(5, 'GURU60257756', 'piket', 'c4ca4238a0b923820dcc509a6f75849b', 'PIKET', 'AKTIF'),
(6, 'GURU60257756', 'kp', 'c4ca4238a0b923820dcc509a6f75849b', 'KEPALASEKOLAH', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `master_golongan`
--

CREATE TABLE `master_golongan` (
  `id_m_golongan` varchar(11) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `jml_golongan` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  `konsumsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_golongan`
--

INSERT INTO `master_golongan` (`id_m_golongan`, `golongan`, `jml_golongan`, `tunjangan`, `konsumsi`) VALUES
('GH', 'GURU HONOR', 12000, 17000, 10001),
('GK', 'GURU KONTRAK', 400000, 17000, 10000),
('GY', 'GURU YAYASAN', 1000000, 17000, 10000),
('KH', 'KARYAWAN HONOR', 200000, 17000, 10000),
('KK', 'KARYAWAN KONTRAK', 900000, 17000, 10000),
('KY', 'KARYAWAN YAYASAN', 900000, 17000, 10000);

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
  MODIFY `id_detail_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
