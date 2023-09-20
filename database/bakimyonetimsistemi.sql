-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 20 Eyl 2023, 16:46:53
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bakimyonetimsistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bakim`
--

DROP TABLE IF EXISTS `bakim`;
CREATE TABLE IF NOT EXISTS `bakim` (
  `bakimID` int NOT NULL AUTO_INCREMENT,
  `makID` int NOT NULL,
  `sicilNo` int NOT NULL,
  `bakimTarih` date NOT NULL,
  `bakimDurum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`bakimID`),
  KEY `makine_bakim` (`makID`),
  KEY `bakim_personel` (`sicilNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bakimpersonel`
--

DROP TABLE IF EXISTS `bakimpersonel`;
CREATE TABLE IF NOT EXISTS `bakimpersonel` (
  `sicilNo` int NOT NULL AUTO_INCREMENT,
  `perAd` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `perSoyad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `perTel` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `departmanID` int NOT NULL,
  PRIMARY KEY (`sicilNo`),
  KEY `personel_departman` (`departmanID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `departman`
--

DROP TABLE IF EXISTS `departman`;
CREATE TABLE IF NOT EXISTS `departman` (
  `departmanID` int NOT NULL AUTO_INCREMENT,
  `departmanAd` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`departmanID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `emir`
--

DROP TABLE IF EXISTS `emir`;
CREATE TABLE IF NOT EXISTS `emir` (
  `emirID` int NOT NULL AUTO_INCREMENT,
  `yonID` int NOT NULL,
  `sicilNo` int NOT NULL,
  `verilenEmir` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`emirID`),
  KEY `yonetici_emir` (`yonID`),
  KEY `personel_emir` (`sicilNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hataliurun`
--

DROP TABLE IF EXISTS `hataliurun`;
CREATE TABLE IF NOT EXISTS `hataliurun` (
  `hataKodu` int NOT NULL AUTO_INCREMENT,
  `hataAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urunID` int NOT NULL,
  PRIMARY KEY (`hataKodu`),
  KEY `urun_hata` (`urunID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `kullaniciID` int NOT NULL AUTO_INCREMENT,
  `kullaniciAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kullaniciID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makine`
--

DROP TABLE IF EXISTS `makine`;
CREATE TABLE IF NOT EXISTS `makine` (
  `makID` int NOT NULL AUTO_INCREMENT,
  `makAd` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `makModel` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `makKapasite` int NOT NULL,
  `markaID` int NOT NULL,
  `parcaID` int NOT NULL,
  PRIMARY KEY (`makID`),
  KEY `makine_yedekparca` (`parcaID`),
  KEY `makine_marka` (`markaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

DROP TABLE IF EXISTS `marka`;
CREATE TABLE IF NOT EXISTS `marka` (
  `markaID` int NOT NULL AUTO_INCREMENT,
  `markaAd` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`markaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

DROP TABLE IF EXISTS `urun`;
CREATE TABLE IF NOT EXISTS `urun` (
  `urunID` int NOT NULL AUTO_INCREMENT,
  `urunAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `makID` int NOT NULL,
  PRIMARY KEY (`urunID`),
  KEY `urun_makine` (`makID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yedekparca`
--

DROP TABLE IF EXISTS `yedekparca`;
CREATE TABLE IF NOT EXISTS `yedekparca` (
  `parcaID` int NOT NULL AUTO_INCREMENT,
  `parcaAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `parcaSayisi` int NOT NULL,
  PRIMARY KEY (`parcaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

DROP TABLE IF EXISTS `yonetici`;
CREATE TABLE IF NOT EXISTS `yonetici` (
  `yonID` int NOT NULL AUTO_INCREMENT,
  `yonAd` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `yonSoyad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `yonTel` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`yonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `bakim`
--
ALTER TABLE `bakim`
  ADD CONSTRAINT `bakim_personel` FOREIGN KEY (`sicilNo`) REFERENCES `bakimpersonel` (`sicilNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `makine_bakim` FOREIGN KEY (`makID`) REFERENCES `makine` (`makID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `bakimpersonel`
--
ALTER TABLE `bakimpersonel`
  ADD CONSTRAINT `personel_departman` FOREIGN KEY (`departmanID`) REFERENCES `departman` (`departmanID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `emir`
--
ALTER TABLE `emir`
  ADD CONSTRAINT `personel_emir` FOREIGN KEY (`sicilNo`) REFERENCES `bakimpersonel` (`sicilNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yonetici_emir` FOREIGN KEY (`yonID`) REFERENCES `yonetici` (`yonID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `hataliurun`
--
ALTER TABLE `hataliurun`
  ADD CONSTRAINT `urun_hata` FOREIGN KEY (`urunID`) REFERENCES `urun` (`urunID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `makine`
--
ALTER TABLE `makine`
  ADD CONSTRAINT `makine_marka` FOREIGN KEY (`markaID`) REFERENCES `marka` (`markaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `makine_yedekparca` FOREIGN KEY (`parcaID`) REFERENCES `yedekparca` (`parcaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `urun`
--
ALTER TABLE `urun`
  ADD CONSTRAINT `urun_makine` FOREIGN KEY (`makID`) REFERENCES `makine` (`makID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
