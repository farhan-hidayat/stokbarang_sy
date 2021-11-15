-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `sypos` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sypos`;

DROP TABLE IF EXISTS `baju`;
CREATE TABLE `baju` (
  `id_baju` int(11) NOT NULL AUTO_INCREMENT,
  `kode_baju` varchar(100) NOT NULL,
  `nama_baju` varchar(100) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `s` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `xxxl` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_baju`),
  UNIQUE KEY `kode_baju` (`kode_baju`),
  KEY `id_suplier` (`id_suplier`),
  CONSTRAINT `baju_ibfk_3` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO `baju` (`id_baju`, `kode_baju`, `nama_baju`, `id_suplier`, `harga`, `jenis`, `s`, `m`, `l`, `xl`, `xxl`, `xxxl`, `foto`) VALUES
(4,	'LP0115TP',	'BIRU TURKIS POLOS (LAKOS PE)',	6,	65000,	'',	88,	88,	88,	88,	88,	88,	'item-200224-481e236235.jpg'),
(6,	'LP0115',	'BIRU TURKIS POLOS (LAKOS PE)',	6,	50000,	'Lengan Pendek',	0,	0,	0,	0,	0,	0,	''),
(7,	'LK2404K',	'OBLONG KUNINGG POLOS ANAK-ANAK',	6,	45000,	'Lengan Pendek',	0,	0,	0,	0,	0,	0,	''),
(8,	'LK0504AK',	'KERAH ANAK KUNIG LIS ABU',	6,	65000,	'Lengan Pendek',	0,	0,	0,	0,	0,	0,	'')
ON DUPLICATE KEY UPDATE `id_baju` = VALUES(`id_baju`), `kode_baju` = VALUES(`kode_baju`), `nama_baju` = VALUES(`nama_baju`), `id_suplier` = VALUES(`id_suplier`), `harga` = VALUES(`harga`), `jenis` = VALUES(`jenis`), `s` = VALUES(`s`), `m` = VALUES(`m`), `l` = VALUES(`l`), `xl` = VALUES(`xl`), `xxl` = VALUES(`xxl`), `xxxl` = VALUES(`xxxl`), `foto` = VALUES(`foto`);

DROP TABLE IF EXISTS `baju_keluar`;
CREATE TABLE `baju_keluar` (
  `id_baju_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_baju` int(11) NOT NULL,
  `s_k` int(11) NOT NULL,
  `m_k` int(11) NOT NULL,
  `l_k` int(11) NOT NULL,
  `xl_k` int(11) NOT NULL,
  `xxl_k` int(11) NOT NULL,
  `xxxl_k` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  PRIMARY KEY (`id_baju_keluar`),
  KEY `id_baju` (`id_baju`),
  CONSTRAINT `baju_keluar_ibfk_2` FOREIGN KEY (`id_baju`) REFERENCES `baju` (`id_baju`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `baju_keluar` (`id_baju_keluar`, `id_baju`, `s_k`, `m_k`, `l_k`, `xl_k`, `xxl_k`, `xxxl_k`, `tanggal_keluar`) VALUES
(5,	4,	12,	12,	12,	12,	12,	12,	'0000-00-00')
ON DUPLICATE KEY UPDATE `id_baju_keluar` = VALUES(`id_baju_keluar`), `id_baju` = VALUES(`id_baju`), `s_k` = VALUES(`s_k`), `m_k` = VALUES(`m_k`), `l_k` = VALUES(`l_k`), `xl_k` = VALUES(`xl_k`), `xxl_k` = VALUES(`xxl_k`), `xxxl_k` = VALUES(`xxxl_k`), `tanggal_keluar` = VALUES(`tanggal_keluar`);

DELIMITER ;;

CREATE TRIGGER `tg_after_i_baju_k` AFTER INSERT ON `baju_keluar` FOR EACH ROW
BEGIN
UPDATE baju SET s=s-NEW.s_k, m=m-NEW.m_k, l=l-NEW.l_k, xl=xl-NEW.xl_k,
xxl=xxl-NEW.xxl_k, xxxl=xxxl-NEW.xxxl_k
WHERE id_baju=NEW.id_baju;
END;;

CREATE TRIGGER `tg_after_d_baju_k` AFTER DELETE ON `baju_keluar` FOR EACH ROW
BEGIN
UPDATE baju SET s=s+OLD.s_k, m=m+OLD.m_k, l=l+OLD.l_k, xl=xl+OLD.xl_k,
xxl=xxl+OLD.xxl_k, xxxl=xxxl+OLD.xxxl_k
WHERE id_baju=OLD.id_baju;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `baju_masuk`;
CREATE TABLE `baju_masuk` (
  `id_baju_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_baju` int(11) NOT NULL,
  `s_m` int(11) NOT NULL,
  `m_m` int(11) NOT NULL,
  `l_m` int(11) NOT NULL,
  `xl_m` int(11) NOT NULL,
  `xxl_m` int(11) NOT NULL,
  `xxxl_m` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  PRIMARY KEY (`id_baju_masuk`),
  KEY `id_baju` (`id_baju`),
  CONSTRAINT `baju_masuk_ibfk_2` FOREIGN KEY (`id_baju`) REFERENCES `baju` (`id_baju`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `baju_masuk` (`id_baju_masuk`, `id_baju`, `s_m`, `m_m`, `l_m`, `xl_m`, `xxl_m`, `xxxl_m`, `tanggal_masuk`) VALUES
(11,	4,	100,	100,	100,	100,	100,	100,	'2020-02-01')
ON DUPLICATE KEY UPDATE `id_baju_masuk` = VALUES(`id_baju_masuk`), `id_baju` = VALUES(`id_baju`), `s_m` = VALUES(`s_m`), `m_m` = VALUES(`m_m`), `l_m` = VALUES(`l_m`), `xl_m` = VALUES(`xl_m`), `xxl_m` = VALUES(`xxl_m`), `xxxl_m` = VALUES(`xxxl_m`), `tanggal_masuk` = VALUES(`tanggal_masuk`);

DELIMITER ;;

CREATE TRIGGER `tg_after_i_baju_m` AFTER INSERT ON `baju_masuk` FOR EACH ROW
BEGIN
UPDATE baju SET s=s+NEW.s_m, m=m+NEW.m_m, l=l+NEW.l_m, xl=xl+NEW.xl_m,
xxl=xxl+NEW.xxl_m, xxxl=xxxl+NEW.xxxl_m
WHERE id_baju=NEW.id_baju;
END;;

CREATE TRIGGER `tg_after_d_baju_m` AFTER DELETE ON `baju_masuk` FOR EACH ROW
BEGIN
UPDATE baju SET s=s-OLD.s_m, m=m-OLD.m_m, l=l-OLD.l_m, xl=xl-OLD.xl_m,
xxl=xxl-OLD.xxl_m, xxxl=xxxl-OLD.xxxl_m
WHERE id_baju=OLD.id_baju;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `no_kontak` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `customer` (`id_customer`, `nama_customer`, `gender`, `no_kontak`, `alamat`) VALUES
(2,	'Syailendra Suprapto',	'Cabang',	'',	'')
ON DUPLICATE KEY UPDATE `id_customer` = VALUES(`id_customer`), `nama_customer` = VALUES(`nama_customer`), `gender` = VALUES(`gender`), `no_kontak` = VALUES(`no_kontak`), `alamat` = VALUES(`alamat`);

DROP TABLE IF EXISTS `suplier`;
CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id_suplier`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`) VALUES
(1,	'Syailendra'),
(6,	'607')
ON DUPLICATE KEY UPDATE `id_suplier` = VALUES(`id_suplier`), `nama_suplier` = VALUES(`nama_suplier`);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `trakhir_login` datetime NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `trakhir_login`, `level`) VALUES
(1,	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	'admin',	'0000-00-00 00:00:00',	1),
(7,	'kasir',	'8691e4fc53b99da544ce86e22acba62d13352eff',	'kasir',	'0000-00-00 00:00:00',	2)
ON DUPLICATE KEY UPDATE `user_id` = VALUES(`user_id`), `username` = VALUES(`username`), `password` = VALUES(`password`), `nama` = VALUES(`nama`), `trakhir_login` = VALUES(`trakhir_login`), `level` = VALUES(`level`);

DROP VIEW IF EXISTS `v_baju`;
CREATE TABLE `v_baju` (`kode_baju` varchar(100), `nama_baju` varchar(100), `s` int(11), `m` int(11), `l` int(11), `xl` int(11), `xxl` int(11), `xxxl` int(11));


DROP TABLE IF EXISTS `v_baju`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_baju` AS select `baju`.`kode_baju` AS `kode_baju`,`baju`.`nama_baju` AS `nama_baju`,`baju`.`s` AS `s`,`baju`.`m` AS `m`,`baju`.`l` AS `l`,`baju`.`xl` AS `xl`,`baju`.`xxl` AS `xxl`,`baju`.`xxxl` AS `xxxl` from `baju`;

-- 2020-02-24 01:11:10