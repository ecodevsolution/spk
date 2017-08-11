-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.0.21-community-nt - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table spk.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) default NULL,
  PRIMARY KEY  (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.migration: ~2 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1495638941),
	('m130524_201442_init', 1495638946);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_absensi
CREATE TABLE IF NOT EXISTS `tbl_absensi` (
  `idabsensi` int(11) NOT NULL auto_increment,
  `idspk` varchar(8) NOT NULL,
  `verifikasi_1` varchar(50) NOT NULL,
  `verifikasi_2` varchar(50) default NULL,
  PRIMARY KEY  (`idabsensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_absensi: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_absensi` DISABLE KEYS */;
INSERT INTO `tbl_absensi` (`idabsensi`, `idspk`, `verifikasi_1`, `verifikasi_2`) VALUES
	(26, '17081021', 'Adinugraha', 'Billy'),
	(27, '17081021', 'Billy', 'Adit');
/*!40000 ALTER TABLE `tbl_absensi` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_daftarharga
CREATE TABLE IF NOT EXISTS `tbl_daftarharga` (
  `kode_pekerjaan` int(11) NOT NULL auto_increment,
  `item_pekerjaan` varchar(20) default NULL,
  `harga_pekerjaan` float default NULL,
  `satuan` varchar(3) default NULL,
  PRIMARY KEY  (`kode_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_daftarharga: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_daftarharga` DISABLE KEYS */;
INSERT INTO `tbl_daftarharga` (`kode_pekerjaan`, `item_pekerjaan`, `harga_pekerjaan`, `satuan`) VALUES
	(1, 'pengecatan dinding', 30000, 'm2'),
	(2, 'kramik lantai 20x30', 325000, 'm2');
/*!40000 ALTER TABLE `tbl_daftarharga` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_detailabsensi
CREATE TABLE IF NOT EXISTS `tbl_detailabsensi` (
  `idabsensi` int(11) NOT NULL,
  `idpegawai` int(11) NOT NULL,
  `tanggal` date default NULL,
  `jam_masuk` time default NULL,
  `jam_keluar` time default NULL,
  `pengganti` varchar(10) default NULL,
  PRIMARY KEY  (`idabsensi`,`idpegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_detailabsensi: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailabsensi` DISABLE KEYS */;
INSERT INTO `tbl_detailabsensi` (`idabsensi`, `idpegawai`, `tanggal`, `jam_masuk`, `jam_keluar`, `pengganti`) VALUES
	(26, 1, '2017-08-10', '08:00:00', '15:00:00', ''),
	(26, 6, '2017-08-10', '08:00:00', '15:00:00', ''),
	(27, 1, '2017-08-11', '08:00:00', '15:00:00', ''),
	(27, 6, '2017-08-11', '08:00:00', '17:00:00', '');
/*!40000 ALTER TABLE `tbl_detailabsensi` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_detailjadwal
CREATE TABLE IF NOT EXISTS `tbl_detailjadwal` (
  `idjadwal` int(11) NOT NULL auto_increment,
  `idpegawai` varchar(8) NOT NULL,
  PRIMARY KEY  (`idjadwal`,`idpegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_detailjadwal: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailjadwal` DISABLE KEYS */;
INSERT INTO `tbl_detailjadwal` (`idjadwal`, `idpegawai`) VALUES
	(2, '1'),
	(2, '6');
/*!40000 ALTER TABLE `tbl_detailjadwal` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_detailpenawaran
CREATE TABLE IF NOT EXISTS `tbl_detailpenawaran` (
  `idpenawaran` varchar(8) default NULL,
  `kode_pekerjaan` char(4) default NULL,
  `quantity` char(8) default NULL,
  `satuan_harga` float default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_detailpenawaran: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailpenawaran` DISABLE KEYS */;
INSERT INTO `tbl_detailpenawaran` (`idpenawaran`, `kode_pekerjaan`, `quantity`, `satuan_harga`) VALUES
	('17081080', '1', '1', 30000),
	('17081080', '2', '3', 325000);
/*!40000 ALTER TABLE `tbl_detailpenawaran` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_detailspk
CREATE TABLE IF NOT EXISTS `tbl_detailspk` (
  `idspk` varchar(8) NOT NULL,
  `idpegawai` varchar(8) NOT NULL,
  PRIMARY KEY  (`idspk`,`idpegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_detailspk: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_detailspk` DISABLE KEYS */;
INSERT INTO `tbl_detailspk` (`idspk`, `idpegawai`) VALUES
	('17081021', '1'),
	('17081021', '6');
/*!40000 ALTER TABLE `tbl_detailspk` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_detail_penggajian
CREATE TABLE IF NOT EXISTS `tbl_detail_penggajian` (
  `idgaji` varchar(8) default NULL,
  `idpegawai` varchar(8) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_detail_penggajian: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_penggajian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detail_penggajian` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_jabatan
CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `idjabatan` int(3) NOT NULL auto_increment,
  `nama_jabatan` varchar(20) default NULL,
  `gaji` float default NULL,
  PRIMARY KEY  (`idjabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_jabatan: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_jabatan` DISABLE KEYS */;
INSERT INTO `tbl_jabatan` (`idjabatan`, `nama_jabatan`, `gaji`) VALUES
	(1, 'supervis', 4e+006),
	(2, 'wakil supervisi', 3.5e+006),
	(3, 'Owner', 1e+007);
/*!40000 ALTER TABLE `tbl_jabatan` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_jadwal
CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `idjadwal` int(11) NOT NULL auto_increment,
  `idspk` varchar(8) default NULL,
  `status_jadwal` varchar(5) default NULL,
  PRIMARY KEY  (`idjadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_jadwal: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_jadwal` DISABLE KEYS */;
INSERT INTO `tbl_jadwal` (`idjadwal`, `idspk`, `status_jadwal`) VALUES
	(2, '17081021', 'ON GO');
/*!40000 ALTER TABLE `tbl_jadwal` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_pembayaran
CREATE TABLE IF NOT EXISTS `tbl_pembayaran` (
  `idpembayaran` varchar(8) NOT NULL,
  `idspk` varchar(8) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_bayar` float NOT NULL,
  PRIMARY KEY  (`idpembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_pembayaran: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_pembayaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pembayaran` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_penawaran
CREATE TABLE IF NOT EXISTS `tbl_penawaran` (
  `idpenawaran` varchar(8) NOT NULL,
  `idrequest` varchar(8) default NULL,
  `total_penawaran` float default NULL,
  PRIMARY KEY  (`idpenawaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_penawaran: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_penawaran` DISABLE KEYS */;
INSERT INTO `tbl_penawaran` (`idpenawaran`, `idrequest`, `total_penawaran`) VALUES
	('17081080', '17081085', 1.005e+006);
/*!40000 ALTER TABLE `tbl_penawaran` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_penggajian
CREATE TABLE IF NOT EXISTS `tbl_penggajian` (
  `idgaji` int(11) NOT NULL auto_increment,
  `idabsensi` varchar(8) default NULL,
  `total_gaji` float default NULL,
  `tgl_gaji` date default NULL,
  PRIMARY KEY  (`idgaji`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_penggajian: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_penggajian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_penggajian` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_request
CREATE TABLE IF NOT EXISTS `tbl_request` (
  `idrequest` varchar(8) NOT NULL,
  `idclient` varchar(8) NOT NULL,
  `nama_pekerjaan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY  (`idrequest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_request: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_request` DISABLE KEYS */;
INSERT INTO `tbl_request` (`idrequest`, `idclient`, `nama_pekerjaan`, `status`) VALUES
	('17081085', '5', 'Request 1', 'Proses');
/*!40000 ALTER TABLE `tbl_request` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_role
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `idrole` int(11) NOT NULL auto_increment,
  `nama` varchar(50) default NULL,
  PRIMARY KEY  (`idrole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` (`idrole`, `nama`) VALUES
	(1, 'Employee'),
	(2, 'Client');
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;


-- Dumping structure for table spk.tbl_spk
CREATE TABLE IF NOT EXISTS `tbl_spk` (
  `idspk` varchar(8) NOT NULL,
  `idpegawai` varchar(8) default NULL,
  `idpenawaran` varchar(8) default NULL,
  `area_pekerjaan` varchar(15) default NULL,
  `tgl_mulai` date default NULL,
  `tgl_selesai` date default NULL,
  `harga_pekerjaan` float default NULL,
  PRIMARY KEY  (`idspk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk.tbl_spk: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_spk` DISABLE KEYS */;
INSERT INTO `tbl_spk` (`idspk`, `idpegawai`, `idpenawaran`, `area_pekerjaan`, `tgl_mulai`, `tgl_selesai`, `harga_pekerjaan`) VALUES
	('17081021', '5', '17081080', 'Jakarta', '2017-08-10', '2017-08-11', 1.005e+006);
/*!40000 ALTER TABLE `tbl_spk` ENABLE KEYS */;


-- Dumping structure for table spk.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) collate utf8_unicode_ci NOT NULL,
  `idjabatan` varchar(8) collate utf8_unicode_ci NOT NULL,
  `idrole` int(11) default NULL,
  `name` varchar(25) collate utf8_unicode_ci NOT NULL,
  `no_ktp` char(16) collate utf8_unicode_ci NOT NULL,
  `alamat_ktp` varchar(50) collate utf8_unicode_ci NOT NULL,
  `alamat` varchar(50) collate utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(9) collate utf8_unicode_ci NOT NULL,
  `agama` varchar(8) collate utf8_unicode_ci NOT NULL,
  `no_telp` char(14) collate utf8_unicode_ci NOT NULL,
  `perusahaan` varchar(30) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) collate utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) collate utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) collate utf8_unicode_ci default NULL,
  `status` smallint(6) NOT NULL default '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table spk.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `idjabatan`, `idrole`, `name`, `no_ktp`, `alamat_ktp`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `perusahaan`, `email`, `password_hash`, `auth_key`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'billy', '1', 1, 'billy', '123426', 'purigading', 'purigading', '1992-09-08', 'laki', 'islam', '0877865', 'asdsadfs', 'billy@gmail.com', '$2y$13$w.gMcXbsGPGW5XbBPH4Q2eZoiSqRAZtzAJrRPZ9Bz9vTmOV7synDe', 'cL4oryLveeOCr7B45nXRedcVGve0OEUA', NULL, 10, 2017310508, NULL),
	(5, 'adinugraha', '1', 2, 'Muhamad Adinugraha', '12345678', 'Jalan', 'Jalan', '1992-04-09', 'Laki Laki', 'Islam', '081210854342', 'MNC', 'muhamad@ad.com', '$2y$13$weH4R.VS8vQ6jYOp5jiShuGjiiOyTh.nfM4CfwjM48cX2.f/gX/gu', 'Agra92XnxROC46UIOpMuOjMjM73lFklr', NULL, 10, 2017030605, NULL),
	(6, '17527707', '1', 1, 'Adi', '123123123', 'asdasd', 'aasdasd', '0000-00-00', 'P', '1', '342e123123', '', 'aedasd@asdad.com', '$2y$13$k5ERBl1c/OvFMHMK6vsoAeo1OjqCTQV.uGU.4E0YMo5IZg7NQ2vQy', 'QkrYPaaxHobNSkaKm4fDIaXY9UGrYS0J', NULL, 10, 2017240710, NULL),
	(7, '17827144', '1', 1, 'Adi', '123123123', 'asdasd', 'aasdasd', '1992-09-11', 'P', '2', '342e123123', '', 'aesdasd@asdad.com', '$2y$13$gj2J2asczRfLYq92QfKeJO1A8zaRvnWy512ijGZv5Yj6aWRQ/2MNu', 'cBQQiv2iwjUn_-qMNJMpjWFi6CoSgdbs', NULL, 10, 2017240710, NULL),
	(8, 'adinugrahaclient', '', 2, 'Adi Nugraha', '', '', '', '1970-01-01', 'P', '', '08121012313', 'PT Adadsa', 'muhamadadinygar@!asdasd.com', '$2y$13$A3RSzc3FOZfegjXsOGk8buXjwbc9roiyIGY8wwdSfkIe5JCfWjy0K', 'gO2eQwlO0x-FxR-AcZQJ23J_XQV0q2fy', NULL, 10, 2017240711, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
