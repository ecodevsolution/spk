-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for dbkonstruksi
CREATE DATABASE IF NOT EXISTS `dbkonstruksi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbkonstruksi`;


-- Dumping structure for table dbkonstruksi.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.migration: ~2 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1495638941),
	('m130524_201442_init', 1495638946);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_absensi
CREATE TABLE IF NOT EXISTS `tbl_absensi` (
  `idabsensi` int(11) NOT NULL AUTO_INCREMENT,
  `idspk` varchar(8) NOT NULL,
  `verifikasi_1` varchar(5) NOT NULL,
  `verifikasi_2` varchar(5) NOT NULL,
  PRIMARY KEY (`idabsensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_absensi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_absensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_absensi` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_daftarharga
CREATE TABLE IF NOT EXISTS `tbl_daftarharga` (
  `kode_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `item_pekerjaan` varchar(20) DEFAULT NULL,
  `harga_pekerjaan` float DEFAULT NULL,
  `satuan` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`kode_pekerjaan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_daftarharga: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_daftarharga` DISABLE KEYS */;
INSERT INTO `tbl_daftarharga` (`kode_pekerjaan`, `item_pekerjaan`, `harga_pekerjaan`, `satuan`) VALUES
	(1, 'pengecatan dinding', 30000, 'm2'),
	(2, 'kramik lantai 20x30', 325000, 'm2');
/*!40000 ALTER TABLE `tbl_daftarharga` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_detailabsensi
CREATE TABLE IF NOT EXISTS `tbl_detailabsensi` (
  `idabsensi` int(11) NOT NULL AUTO_INCREMENT,
  `idpegawai` varchar(8) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `pengganti` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idabsensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_detailabsensi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailabsensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detailabsensi` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_detailjadwal
CREATE TABLE IF NOT EXISTS `tbl_detailjadwal` (
  `idjadwal` int(11) NOT NULL AUTO_INCREMENT,
  `idpegawai` varchar(8) NOT NULL,
  PRIMARY KEY (`idjadwal`,`idpegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_detailjadwal: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailjadwal` DISABLE KEYS */;
INSERT INTO `tbl_detailjadwal` (`idjadwal`, `idpegawai`) VALUES
	(37, '5'),
	(37, '6'),
	(38, '5'),
	(38, '6');
/*!40000 ALTER TABLE `tbl_detailjadwal` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_detailpenawaran
CREATE TABLE IF NOT EXISTS `tbl_detailpenawaran` (
  `idpenawaran` varchar(8) DEFAULT NULL,
  `kode_pekerjaan` char(4) DEFAULT NULL,
  `quantity` char(8) DEFAULT NULL,
  `satuan_harga` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_detailpenawaran: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailpenawaran` DISABLE KEYS */;
INSERT INTO `tbl_detailpenawaran` (`idpenawaran`, `kode_pekerjaan`, `quantity`, `satuan_harga`) VALUES
	('412312', '2', '3', 325000),
	('312312', '2', '3', 325000),
	('312312', '1', '2', 30000),
	('2345', '2', '3', 325000),
	('1345', '2', '3', 325000),
	('1345', '1', '1', 30000),
	('134', '2', '1', 325000),
	('136', '2', '1', 325000),
	('136', '2', '3', 325000),
	('test1', '2', '1', 325000),
	('test1', '1', '1', 30000),
	('test2', '2', '1', 325000),
	('test2', '1', '2', 30000),
	('17080121', '1', '1', 30000),
	('17080121', '2', '2', 325000);
/*!40000 ALTER TABLE `tbl_detailpenawaran` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_detailspk
CREATE TABLE IF NOT EXISTS `tbl_detailspk` (
  `idspk` varchar(8) NOT NULL,
  `idpegawai` varchar(8) NOT NULL,
  PRIMARY KEY (`idspk`,`idpegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_detailspk: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailspk` DISABLE KEYS */;
INSERT INTO `tbl_detailspk` (`idspk`, `idpegawai`) VALUES
	('17080111', '5'),
	('17080154', '5'),
	('17080154', '6');
/*!40000 ALTER TABLE `tbl_detailspk` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_detail_penggajian
CREATE TABLE IF NOT EXISTS `tbl_detail_penggajian` (
  `idgaji` varchar(8) DEFAULT NULL,
  `idpegawai` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_detail_penggajian: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_penggajian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detail_penggajian` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_jabatan
CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `idjabatan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(20) DEFAULT NULL,
  `gaji` float DEFAULT NULL,
  PRIMARY KEY (`idjabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_jabatan: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_jabatan` DISABLE KEYS */;
INSERT INTO `tbl_jabatan` (`idjabatan`, `nama_jabatan`, `gaji`) VALUES
	(1, 'supervis', 4000000),
	(2, 'wakil supervisi', 3500000);
/*!40000 ALTER TABLE `tbl_jabatan` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_jadwal
CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `idjadwal` int(11) NOT NULL AUTO_INCREMENT,
  `idspk` varchar(8) DEFAULT NULL,
  `status_jadwal` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idjadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_jadwal: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_jadwal` DISABLE KEYS */;
INSERT INTO `tbl_jadwal` (`idjadwal`, `idspk`, `status_jadwal`) VALUES
	(37, '17080154', 'ON GO'),
	(38, '17080154', 'ON GO');
/*!40000 ALTER TABLE `tbl_jadwal` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_pembayaran
CREATE TABLE IF NOT EXISTS `tbl_pembayaran` (
  `idpembayaran` varchar(8) NOT NULL,
  `idspk` varchar(8) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_bayar` float NOT NULL,
  PRIMARY KEY (`idpembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_pembayaran: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_pembayaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pembayaran` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_penawaran
CREATE TABLE IF NOT EXISTS `tbl_penawaran` (
  `idpenawaran` varchar(8) NOT NULL,
  `idrequest` varchar(8) DEFAULT NULL,
  `total_penawaran` float DEFAULT NULL,
  PRIMARY KEY (`idpenawaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_penawaran: ~17 rows (approximately)
/*!40000 ALTER TABLE `tbl_penawaran` DISABLE KEYS */;
INSERT INTO `tbl_penawaran` (`idpenawaran`, `idrequest`, `total_penawaran`) VALUES
	('', '1', NULL),
	('02', '1', 1000000),
	('1', '1', 200000000),
	('12345', '1', NULL),
	('134', '2312323', 325000),
	('1345', '2312323', 1005000),
	('136', '2312323', 1300000),
	('17080121', '17080186', 680000),
	('2345', '1', 975000),
	('3', '1', 200000),
	('312312', '1', 1035000),
	('412312', '2312323', NULL),
	('4343', '1', NULL),
	('43435', '2312323', NULL),
	('434352', '2312323', NULL),
	('test1', '2312323', 355000),
	('test2', '1', 385000);
/*!40000 ALTER TABLE `tbl_penawaran` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_penggajian
CREATE TABLE IF NOT EXISTS `tbl_penggajian` (
  `idgaji` int(11) NOT NULL AUTO_INCREMENT,
  `idabsensi` varchar(8) DEFAULT NULL,
  `total_gaji` float DEFAULT NULL,
  `tgl_gaji` date DEFAULT NULL,
  PRIMARY KEY (`idgaji`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_penggajian: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_penggajian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_penggajian` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_request
CREATE TABLE IF NOT EXISTS `tbl_request` (
  `idrequest` varchar(8) NOT NULL,
  `idclient` varchar(8) NOT NULL,
  `nama_pekerjaan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idrequest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_request: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_request` DISABLE KEYS */;
INSERT INTO `tbl_request` (`idrequest`, `idclient`, `nama_pekerjaan`, `status`) VALUES
	('1', '1', 'cat', 'prose'),
	('17080186', '1', 'Test Request', 'Proses'),
	('2312323', '5', 'asdassdassda\r\nasd', 'Proses');
/*!40000 ALTER TABLE `tbl_request` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_role
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` (`idrole`, `nama`) VALUES
	(1, 'Employee'),
	(2, 'Client');
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.tbl_spk
CREATE TABLE IF NOT EXISTS `tbl_spk` (
  `idspk` varchar(8) NOT NULL,
  `idpegawai` varchar(8) DEFAULT NULL,
  `idpenawaran` varchar(8) DEFAULT NULL,
  `area_pekerjaan` varchar(15) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `harga_pekerjaan` float DEFAULT NULL,
  PRIMARY KEY (`idspk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbkonstruksi.tbl_spk: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_spk` DISABLE KEYS */;
INSERT INTO `tbl_spk` (`idspk`, `idpegawai`, `idpenawaran`, `area_pekerjaan`, `tgl_mulai`, `tgl_selesai`, `harga_pekerjaan`) VALUES
	('1', '1', '1', 'adsd', '2017-05-29', '2017-05-29', 2000000000),
	('17080111', '5', '17080121', 'Jakarta', '2017-08-01', '2017-08-04', 680000),
	('17080127', '5', '17080121', 'Jakarta', '2017-08-01', '2017-08-04', 680000),
	('17080135', '5', '17080121', 'Jakarta', '2017-08-01', '2017-08-04', 680000),
	('17080154', '5', '17080121', 'Jakarta', '2017-08-01', '2017-08-04', 680000);
/*!40000 ALTER TABLE `tbl_spk` ENABLE KEYS */;


-- Dumping structure for table dbkonstruksi.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idjabatan` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `idrole` int(11) DEFAULT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `no_ktp` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_ktp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `perusahaan` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dbkonstruksi.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `idjabatan`, `idrole`, `name`, `no_ktp`, `alamat_ktp`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `perusahaan`, `email`, `password_hash`, `auth_key`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'billy', '1', 2, 'billy', '123426', 'purigading', 'purigading', '1992-09-08', 'laki', 'islam', '0877865', 'asdsadfs', 'billy@gmail.com', '$2y$13$w.gMcXbsGPGW5XbBPH4Q2eZoiSqRAZtzAJrRPZ9Bz9vTmOV7synDe', 'cL4oryLveeOCr7B45nXRedcVGve0OEUA', NULL, 10, 2017310508, NULL),
	(5, 'adinugraha', '1', 1, 'Muhamad Adinugraha', '12345678', 'Jalan', 'Jalan', '1992-04-09', 'Laki Laki', 'Islam', '081210854342', 'MNC', 'muhamad@ad.com', '$2y$13$weH4R.VS8vQ6jYOp5jiShuGjiiOyTh.nfM4CfwjM48cX2.f/gX/gu', 'Agra92XnxROC46UIOpMuOjMjM73lFklr', NULL, 10, 2017030605, NULL),
	(6, '17915597', '1', 1, 'adinugraha', '123123123', 'adasdas', 'asdasd', '1992-09-04', 'Laki-Laki', 'Islam', '453454', NULL, 'aasda@asdasd.com', '$2y$13$dGlNjIAxodszLVIwj7XirOfsOmqnaj6gPv1Yo1RnZF395qmzutm4G', 'LNsZ6-sKitMSDZJhRHPy9ACAlaO6oLIp', NULL, 10, 2017010804, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
