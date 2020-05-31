-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                5.6.17 - MySQL Community Server (GPL)
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- muzayede için veritabanı yapısı dökülüyor
DROP DATABASE IF EXISTS `muzayede`;
CREATE DATABASE IF NOT EXISTS `muzayede` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `muzayede`;

-- tablo yapısı dökülüyor muzayede.ayarlar
DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ayaradi` varchar(20) NOT NULL,
  `ayaricerigi` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- muzayede.ayarlar: 6 rows tablosu için veriler indiriliyor
DELETE FROM `ayarlar`;
/*!40000 ALTER TABLE `ayarlar` DISABLE KEYS */;
INSERT INTO `ayarlar` (`id`, `ayaradi`, `ayaricerigi`) VALUES
	(1, 'sitebaslik', 'Osmanbey Müzayede'),
	(2, 'headerbaslik', 'Osmanbey Müzayede Evi'),
	(3, 'headericerik', 'Antikaya Dair Aradığınız Herşey Burada'),
	(4, 'adres', 'Osmanbey Müzayede Evi İstiklal Cad. No:145/10'),
	(5, 'eposta', 'info@osmanbeymuzayede.com'),
	(6, 'telefon', '+902126680962');
/*!40000 ALTER TABLE `ayarlar` ENABLE KEYS */;

-- tablo yapısı dökülüyor muzayede.teklif
DROP TABLE IF EXISTS `teklif`;
CREATE TABLE IF NOT EXISTS `teklif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teklif` float NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- muzayede.teklif: 41 rows tablosu için veriler indiriliyor
DELETE FROM `teklif`;
/*!40000 ALTER TABLE `teklif` DISABLE KEYS */;
INSERT INTO `teklif` (`id`, `urun_id`, `user_id`, `teklif`, `timestamp`) VALUES
	(1, 15, 3, 2850, '2019-01-07 11:20:01'),
	(2, 15, 1, 2900, '2019-01-07 11:20:04'),
	(3, 15, 3, 2950, '2019-01-07 11:20:11'),
	(4, 15, 1, 3100, '2019-01-07 11:20:11'),
	(5, 15, 3, 3125, '2019-01-07 11:20:19'),
	(6, 15, 1, 3200, '2019-01-07 11:20:30'),
	(7, 15, 3, 3225, '2019-01-07 11:20:33'),
	(8, 15, 1, 3300, '2019-01-07 11:21:00'),
	(9, 15, 3, 3350, '2019-01-07 11:21:03'),
	(10, 15, 1, 3400, '2019-01-07 11:21:06'),
	(11, 15, 3, 3410, '2019-01-07 11:21:08'),
	(12, 15, 1, 3450, '2019-01-07 11:21:11'),
	(13, 15, 3, 3560, '2019-01-07 11:21:14'),
	(14, 15, 1, 3600, '2019-01-07 11:21:16'),
	(15, 15, 3, 3675, '2019-01-07 11:21:20'),
	(16, 15, 1, 3676, '2019-01-07 11:21:35'),
	(17, 15, 3, 3750, '2019-01-07 11:21:38'),
	(18, 15, 1, 3751, '2019-01-07 11:21:41'),
	(19, 15, 3, 3815, '2019-01-07 11:21:44'),
	(20, 15, 1, 3816, '2019-01-07 11:22:09'),
	(21, 15, 3, 3950, '2019-01-07 11:22:13'),
	(22, 15, 1, 4000, '2019-01-07 11:22:15'),
	(23, 15, 3, 4250, '2019-01-07 11:22:18'),
	(24, 15, 1, 10000, '2019-01-07 11:22:21'),
	(25, 15, 3, 10250, '2019-01-07 11:22:25'),
	(26, 15, 1, 12000, '2019-01-07 11:22:28'),
	(27, 15, 3, 13500, '2019-01-07 11:22:31'),
	(28, 15, 1, 14500, '2019-01-07 11:22:34'),
	(29, 15, 3, 14520, '2019-01-07 11:22:38'),
	(30, 15, 1, 17000, '2019-01-07 11:22:39'),
	(31, 15, 3, 18000, '2019-01-07 11:22:41'),
	(32, 15, 1, 18005, '2019-01-07 11:22:44'),
	(33, 15, 3, 19502, '2019-01-07 11:22:46'),
	(34, 15, 1, 25000, '2019-01-07 11:22:47'),
	(35, 15, 3, 26000, '2019-01-07 11:22:49'),
	(36, 15, 1, 34000, '2019-01-07 11:22:50'),
	(37, 15, 3, 555412, '2019-01-07 11:22:52'),
	(38, 8, 1, 5000, '2019-01-07 11:39:08'),
	(39, 8, 1, 5001, '2019-01-07 11:39:13'),
	(40, 8, 1, 5002, '2019-01-07 11:39:24'),
	(41, 14, 1, 5002, '2019-01-07 11:39:24');
/*!40000 ALTER TABLE `teklif` ENABLE KEYS */;

-- tablo yapısı dökülüyor muzayede.urunler
DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunbaslik` varchar(25) NOT NULL,
  `urunaciklama` varchar(105) NOT NULL,
  `resimpath` text NOT NULL,
  `eklenme` datetime DEFAULT CURRENT_TIMESTAMP,
  `sure` time NOT NULL,
  `acilis` float NOT NULL,
  `aktif` tinyint(1) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- muzayede.urunler: 16 rows tablosu için veriler indiriliyor
DELETE FROM `urunler`;
/*!40000 ALTER TABLE `urunler` DISABLE KEYS */;
INSERT INTO `urunler` (`id`, `urunbaslik`, `urunaciklama`, `resimpath`, `eklenme`, `sure`, `acilis`, `aktif`) VALUES
	(1, 'Antika Telefon', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'https://eskiesyaciniz.com/wp-content/uploads/2017/01/antik-telefon.jpg', '2019-01-06 11:00:00', '22:00:00', 3500, 2),
	(2, 'Köstekli İşleme Saat', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'https://cdn2.themagger.net/wp-content/uploads/2017/11/antika-saat-540x316.jpeg', '2019-01-07 11:00:00', '22:00:00', 5000, 2),
	(3, 'Golf Sopası', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'https://cdn4.themagger.net/wp-content/uploads/2017/11/bit-pazari--540x360.jpeg', '2019-01-06 11:00:00', '22:00:00', 1595.5, 2),
	(4, 'Bisiklet', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'https://cdn2.themagger.net/wp-content/uploads/2017/11/antika-540x360.jpeg', '2019-01-07 11:00:00', '22:00:00', 2000, 2),
	(5, 'Radyo', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/antika-radyo-alanlar-01.jpg', '2019-01-07 11:00:00', '22:00:00', 4500, 2),
	(6, 'Gramafon', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/Antika-gramofon-alanlar-01.jpg', '2019-01-07 11:00:00', '22:00:00', 8000, 2),
	(7, 'Retro Fotoğraf  Makinesi', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/antika-fotograf-makineleri-01.jpg', '2019-01-06 11:00:00', '22:00:00', 1900, 2),
	(8, 'İran Halısı', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/Antika-Halilar-03.jpg', '2019-01-07 11:00:00', '22:00:00', 3400, 2),
	(9, 'Tarihi Kitap', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/antika-kitap-alanlar-02.jpg', '2019-01-07 11:00:00', '22:00:00', 500, 2),
	(10, 'Koleksiyon Oyuncak', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/antika-oyuncaklar-00.jpg', '2019-01-07 11:00:00', '22:00:00', 250, 2),
	(11, 'Tablo', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/Antika-tablolar-00.jpg', '2019-01-06 11:00:00', '22:00:00', 1486, 2),
	(12, 'Yemek Masası', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/antika-mobilyalar-01.jpg', '2019-01-07 11:00:00', '22:00:00', 9000, 2),
	(13, 'El Yazması Hat', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/antika-el-yazmasi-hat-alanlar-01.jpg', '2019-01-07 11:00:00', '22:00:00', 1200, 2),
	(14, 'Porselen Seti', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://ortaklarantik.com/images/antika_limoges_porselen_alanlar_01.jpg', '2019-01-06 11:00:00', '22:00:00', 4800, 2),
	(15, 'Ofis Masası', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'http://www.antikaalinir.com/fileSource/antika-ofis-masasi-22.jpeg', '2019-01-07 11:00:00', '22:00:00', 2700, 2),
	(16, 'Sedef Dolap', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir m', 'https://antikamobilyalar.com/wp-content/uploads/2016/11/Antika-Sedef-Mobilya-1-300x300.jpg', '2019-01-07 11:00:00', '22:00:00', 3600, 2);
/*!40000 ALTER TABLE `urunler` ENABLE KEYS */;

-- görünüm yapısı dökülüyor muzayede.urunler_son
DROP VIEW IF EXISTS `urunler_son`;
-- VIEW bağımlılık sorunlarını çözmek için geçici tablolar oluşturuluyor
CREATE TABLE `urunler_son` (
	`id` INT(11) NOT NULL,
	`urunbaslik` VARCHAR(25) NOT NULL COLLATE 'utf8_general_ci',
	`urunaciklama` VARCHAR(105) NOT NULL COLLATE 'utf8_general_ci',
	`resimpath` TEXT NOT NULL COLLATE 'utf8_general_ci',
	`acilis` FLOAT NOT NULL,
	`aktif` TINYINT(1) NULL,
	`eklenme` DATETIME NULL,
	`sure` TIME NOT NULL,
	`kalan` TIME NULL
) ENGINE=MyISAM;

-- tablo yapısı dökülüyor muzayede.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciadi` varchar(15) NOT NULL,
  `sifre` varchar(32) NOT NULL,
  `adsoyad` varchar(40) NOT NULL,
  `eposta` varchar(50) NOT NULL,
  `telefon` bigint(10) NOT NULL,
  `adres` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- muzayede.users: 0 rows tablosu için veriler indiriliyor
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `kullaniciadi`, `sifre`, `adsoyad`, `eposta`, `telefon`, `adres`) VALUES
	(1, 'necati', 'e10adc3949ba59abbe56e057f20f883e', 'Neco', 'neco@neco.neco', 5554445544, 'Adresim Budur');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- görünüm yapısı dökülüyor muzayede.urunler_son
DROP VIEW IF EXISTS `urunler_son`;
-- Geçici tablolar temizlenerek final VIEW oluşturuluyor
DROP TABLE IF EXISTS `urunler_son`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `urunler_son` AS SELECT id,urunbaslik,urunaciklama,resimpath,acilis,aktif,eklenme,sure,TIMEDIFF((addtime(eklenme, sure)),NOW()) as kalan FROM urunler ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
