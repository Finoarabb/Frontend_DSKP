-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dskp
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `disposisi`
--

DROP TABLE IF EXISTS `disposisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disposisi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `uid` int NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `disposisi_uid_foreign` (`uid`),
  KEY `disposisi_sid_foreign` (`sid`),
  CONSTRAINT `disposisi_sid_foreign` FOREIGN KEY (`sid`) REFERENCES `letters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `disposisi_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disposisi`
--

LOCK TABLES `disposisi` WRITE;
/*!40000 ALTER TABLE `disposisi` DISABLE KEYS */;
INSERT INTO `disposisi` VALUES (1,1,1,'cafaf','2023-10-06 10:54:06','2023-10-06 10:54:06'),(2,1,3,'cafaf','2023-10-06 10:54:06','2023-10-06 10:54:06'),(3,3,3,'segera dijalankan','2023-10-09 14:28:27','2023-10-09 14:28:27'),(11,6,14,'maaf terlalu panjang','2023-10-10 07:58:52','2023-10-10 07:58:52'),(14,8,1,'Besok Pulang Pagi','2023-10-10 10:09:43','2023-10-10 10:09:43'),(19,8,3,'hadiri','2023-10-10 10:16:13','2023-10-10 10:16:13'),(22,8,4,'Coba ya','2023-10-10 10:33:46','2023-10-10 10:33:46'),(23,8,11,'Coba ya','2023-10-10 10:33:46','2023-10-10 10:33:46'),(24,8,16,'coba','2023-10-11 13:35:04','2023-10-11 13:35:04');
/*!40000 ALTER TABLE `disposisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `letters`
--

DROP TABLE IF EXISTS `letters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `letters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_surat` (`no_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letters`
--

LOCK TABLES `letters` WRITE;
/*!40000 ALTER TABLE `letters` DISABLE KEYS */;
INSERT INTO `letters` VALUES (1,',nfguJSGA x,',',nfguJSGA x,.png','ilfghzx,,,','','2023-09-25',5,'2023-09-25 10:47:23','2023-09-27 12:07:53',NULL,NULL),(3,'1024166/35/HK TAHUN 2022','1024166/35/HK TAHUN 2022.pdf','Badan Pusat Statistik Provinsi Jawa Timur','','2023-10-14',5,'2023-09-25 09:28:22','2023-10-14 11:04:32',NULL,NULL),(5,'26 TAHUN 2009','26 TAHUN 2009.pdf','Gubernur Provinsi Jawa Timur','','2009-09-26',3,'2023-09-25 09:35:13','2023-10-10 01:40:40',NULL,NULL),(6,'36 TAHUN 2020','36 TAHUN 2020.pdf','Badan Pusat Statistik','','2020-04-17',5,'2023-09-25 09:30:38','2023-10-10 08:00:12',NULL,NULL),(8,'afdaf','afdaf.pdf','fafq','','2023-09-25',5,'2023-09-25 09:32:34','2023-10-11 13:38:28',NULL,NULL),(9,'B-0532/BPS/2340/03/2020','B-0532/BPS/2340/03/2020.pdf','Badan Pusat Statistik','','2020-03-17',2,'2023-09-25 09:31:48','2023-10-10 10:55:54',NULL,NULL),(10,'B-123-asd','B-123-asd.jpg','','Bappedalitbang','2021-09-21',0,'2023-09-25 09:45:57','2023-09-25 09:45:57',NULL,NULL),(12,'B-351401-qwe','B-351401-qwe.jpg','','Camat Kecamatan Kejayan','2020-02-21',0,'2023-09-25 09:46:56','2023-09-25 09:46:56',NULL,NULL),(13,'B-351402-qwe','B-351402-qwe.jpg','','Camat Kecamatan Winongan','2022-12-21',0,'2023-09-25 09:47:29','2023-09-25 09:47:29',NULL,NULL),(15,'B-351404-qwe','B-351404-qwe.jpg','','Camat Kecamatan Bangil','2021-02-07',0,'2023-09-25 09:49:40','2023-09-25 09:49:40',NULL,NULL),(16,'B-351405-qwe','B-351405-qwe.jpg','','Camat Kecamatan Beji','2021-02-28',0,'2023-09-25 09:50:12','2023-09-25 09:50:12',NULL,NULL),(17,'B-351410-qwe','B-351410-qwe.jpg','','Camat Kecamatan Prigen','2021-08-10',0,'2023-09-25 09:55:02','2023-09-25 09:55:02',NULL,NULL),(18,'B-351411-qwe','B-351411-qwe.jpg','','Camat Kecamatan Pandaan','2021-07-11',0,'2023-09-25 09:54:01','2023-09-25 09:54:01',NULL,NULL),(19,'B-351412-qwe','B-351412-qwe.jpg','','Camat Kecamatan Gempol','2021-05-07',0,'2023-09-25 09:50:56','2023-09-25 09:50:56',NULL,NULL),(20,'B-351416-qwe','B-351416-qwe.jpg','','Camat Kecamatan Kraton','2021-06-16',0,'2023-09-25 09:52:26','2023-09-25 09:52:26',NULL,NULL),(21,'B-351418-qwe','B-351418-qwe.jpg','','Camat Kecamatan Gondang Wetan','2021-05-15',0,'2023-09-25 09:51:34','2023-09-25 09:51:34',NULL,NULL),(22,'B-351420-qwe','B-351420-qwe.jpg','','Camat Kecamatan Grati','2021-05-29',0,'2023-09-25 09:51:57','2023-09-25 09:51:57',NULL,NULL),(23,'B-351421-qwe','B-351421-qwe.jpg','','Camat Kecamatan Nguling','2021-07-21',0,'2023-09-25 09:53:38','2023-09-25 09:53:38',NULL,NULL),(24,'B-351422-qwe','B-351422-qwe.jpg','','Camat Kecamatan Lekok','2021-06-22',0,'2023-09-25 09:52:49','2023-09-25 09:52:49',NULL,NULL),(26,'B-351443-qwe','B-351443-qwe.jpg','','Camat Kecamatan Puspo','2021-09-23',0,'2023-09-25 09:56:13','2023-09-25 09:56:13',NULL,NULL),(27,'B-351444-qwe','B-351444-qwe.jpg','','Camat Kecamatan Lumbang','2021-06-24',0,'2023-09-25 09:53:10','2023-09-25 09:53:10',NULL,NULL),(28,'B-351445-qwe','B-351445-qwe.jpg','','Camat Kecamatan Pasrepan','2021-07-05',0,'2023-09-25 09:54:28','2023-09-25 09:54:28',NULL,NULL),(29,'B-351448-qwe','B-351448-qwe.jpg','','Camat Kecamatan Purwosari','2021-09-18',0,'2023-09-25 09:55:50','2023-09-25 09:55:50',NULL,NULL),(32,'awxcc','awxcc.pdf','','Bupati Pasuruan','2022-10-09',0,'2023-10-09 14:50:47','2023-10-09 14:50:47',NULL,NULL),(33,'12qweww','12qweww.pdf','','Bappeda','2021-10-22',0,'2023-10-10 08:14:41','2023-10-10 08:14:41',NULL,NULL),(34,'jdjksh12','jdjksh12.pdf','','Bupati','2021-10-12',0,'2023-10-10 08:16:05','2023-10-10 08:16:05',NULL,NULL),(43,'dsghdgfgf','dsghdgfgf.jpg','fsgdhg','','2023-10-18',1,'2023-10-14 09:16:09','2023-10-14 12:16:27',NULL,NULL);
/*!40000 ALTER TABLE `letters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2023-08-28-010806','App\\Database\\Migrations\\Users','default','App',1696303731,1),(2,'2023-08-28-010813','App\\Database\\Migrations\\Letter','default','App',1696303731,1),(3,'2023-09-03-131948','App\\Database\\Migrations\\Disposisi','default','App',1696303731,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'staff',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'juddin','juddin','12341234','admin'),(3,'Person1','pimpinan','12341234','kepala'),(4,'Person1','supervisor','12341234','supervisor'),(8,'admin','admin','12341234','admin'),(10,'operator','operator','12341234','operator'),(11,'Kasubag','kasubag','12341234','supervisor'),(14,'Hasanah','Hasanah','12341234','staff'),(16,'Staff3','Staff3','12341234','staff');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-14 17:16:24
