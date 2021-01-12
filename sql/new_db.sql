-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: skripsi10
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_attribut`
--

DROP TABLE IF EXISTS `tb_attribut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_attribut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) DEFAULT NULL,
  `keterangan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilai` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_attribut`
--

LOCK TABLES `tb_attribut` WRITE;
/*!40000 ALTER TABLE `tb_attribut` DISABLE KEYS */;
INSERT INTO `tb_attribut` VALUES (1,1,'0-5 Hari','1'),(2,1,'6-10 Hari ','2'),(3,1,'11-15 Hari ','3'),(4,1,'16-20 Hari','4'),(5,1,'21-25 Hari','5'),(6,2,'81-100','5'),(7,2,'71-80','4'),(8,2,'61-70','3'),(9,2,'41-60','2'),(10,2,'0-40','1'),(11,3,'81-100','5'),(12,3,'71-80','4'),(13,3,'61-70','3'),(14,3,'41-60','2'),(15,3,'0-40','1'),(16,4,'81-100','5'),(17,4,'71-80','4'),(18,4,'61-70','3'),(19,4,'41-60','2'),(20,4,'0-40','1'),(21,5,'81-100','5'),(22,5,'71-80','4'),(23,5,'61-70','3'),(24,5,'41-60','2'),(25,5,'0-40','1');
/*!40000 ALTER TABLE `tb_attribut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot`
--

DROP TABLE IF EXISTS `tb_bobot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_bobot` (
  `nilai_bobot` int(11) NOT NULL,
  `keterangan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nilai_bobot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot`
--

LOCK TABLES `tb_bobot` WRITE;
/*!40000 ALTER TABLE `tb_bobot` DISABLE KEYS */;
INSERT INTO `tb_bobot` VALUES (1,'Sangat Kurang'),(2,'Kurang'),(3,'Cukup'),(4,'Baik'),(5,'sangat Baik');
/*!40000 ALTER TABLE `tb_bobot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_guru`
--

DROP TABLE IF EXISTS `tb_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` text,
  `nama_guru` varchar(45) DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `tempat_tanggal_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `date_input` datetime DEFAULT NULL,
  `c1` varchar(45) DEFAULT NULL,
  `c2` varchar(45) DEFAULT NULL,
  `c3` varchar(45) DEFAULT NULL,
  `c4` varchar(45) DEFAULT NULL,
  `c5` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_guru`
--

LOCK TABLES `tb_guru` WRITE;
/*!40000 ALTER TABLE `tb_guru` DISABLE KEYS */;
INSERT INTO `tb_guru` VALUES (2,'197302222000032000','Ade Siti Munawaroh, S.Ag.,M.Pd',NULL,'Rangkasbitung 2','1973-02-22','Jl.maulana Hasanudin Kp.cempa','2021-01-12 16:20:19','5','7','11','16','21');
/*!40000 ALTER TABLE `tb_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_hasil`
--

DROP TABLE IF EXISTS `tb_hasil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_hasil` (
  `no_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_peserta` int(11) DEFAULT NULL,
  `nilai_saw` float DEFAULT NULL,
  `ket_saw` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilai_wp` float DEFAULT NULL,
  `ket_wp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_hasil`
--

LOCK TABLES `tb_hasil` WRITE;
/*!40000 ALTER TABLE `tb_hasil` DISABLE KEYS */;
INSERT INTO `tb_hasil` VALUES (1,6,0.866667,NULL,NULL,NULL),(2,5,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_hasil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_hasil_wp`
--

DROP TABLE IF EXISTS `tb_hasil_wp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_hasil_wp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_peserta` int(11) DEFAULT NULL,
  `nilai_s` float DEFAULT NULL,
  `nilai_v` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_hasil_wp`
--

LOCK TABLES `tb_hasil_wp` WRITE;
/*!40000 ALTER TABLE `tb_hasil_wp` DISABLE KEYS */;
INSERT INTO `tb_hasil_wp` VALUES (1,5,1.06898,0.540456),(2,6,0.908939,0.459542);
/*!40000 ALTER TABLE `tb_hasil_wp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kriteria`
--

DROP TABLE IF EXISTS `tb_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_kriteria` (
  `kd_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `atribut` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilai_bobot` float DEFAULT NULL,
  PRIMARY KEY (`kd_kriteria`),
  UNIQUE KEY `atribut_UNIQUE` (`atribut`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kriteria`
--

LOCK TABLES `tb_kriteria` WRITE;
/*!40000 ALTER TABLE `tb_kriteria` DISABLE KEYS */;
INSERT INTO `tb_kriteria` VALUES (1,'Kehadiran',NULL,3),(2,'Sikap',NULL,4),(3,'Disiplin',NULL,5),(4,'Kemampuan Mengajar',NULL,5),(5,'Tanggung Jawab',NULL,5);
/*!40000 ALTER TABLE `tb_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_penilaian`
--

DROP TABLE IF EXISTS `tb_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_penilaian` (
  `kode_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `no_peserta` int(11) DEFAULT NULL,
  `kd_kriteria` int(11) DEFAULT NULL,
  `angka_penilaian` int(11) DEFAULT NULL,
  `nilai_bobot` float DEFAULT NULL,
  PRIMARY KEY (`kode_penilaian`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_penilaian`
--

LOCK TABLES `tb_penilaian` WRITE;
/*!40000 ALTER TABLE `tb_penilaian` DISABLE KEYS */;
INSERT INTO `tb_penilaian` VALUES (7,2147483647,1,5,3),(8,2147483647,2,4,4),(9,2147483647,3,5,5),(10,2147483647,4,5,5),(11,2147483647,5,5,5),(12,2147483647,NULL,NULL,NULL),(13,2147483647,1,5,3),(14,2147483647,2,4,4),(15,2147483647,3,5,5),(16,2147483647,4,5,5),(17,2147483647,5,5,5),(18,2147483647,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_warga`
--

DROP TABLE IF EXISTS `tb_warga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tb_warga` (
  `no_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempat_lhr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lhr` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` tinytext COLLATE utf8_unicode_ci,
  `no_tlpon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_input` datetime DEFAULT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL,
  `c4` int(11) DEFAULT NULL,
  `c5` int(11) DEFAULT NULL,
  `c6` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_warga`
--

LOCK TABLES `tb_warga` WRITE;
/*!40000 ALTER TABLE `tb_warga` DISABLE KEYS */;
INSERT INTO `tb_warga` VALUES (5,'Handri','Tangerang','1996-03-26','Tangerang','081808784785','2019-07-05 07:54:46',3,8,12,17,22,28),(6,'Bahrul Mubarok','Tangerang','1994-02-05','legok','130521035','2019-07-05 07:55:08',2,7,12,17,22,28);
/*!40000 ALTER TABLE `tb_warga` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-12 22:44:11
