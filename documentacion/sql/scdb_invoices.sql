-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: scdb
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` bigint unsigned NOT NULL,
  `amount_collection` decimal(8,2) DEFAULT NULL,
  `amount_commission` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `value_vat` decimal(8,2) NOT NULL,
  `rate_vat` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_status` int NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_section_id_foreign` (`section_id`),
  CONSTRAINT `invoices_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (13,'FACT1','2021-06-04','2021-06-18','PREST1',1,132112.00,1231.00,0.00,123.10,'10%',1354.10,'pagada',1,NULL,'2021-06-04',NULL,'2021-06-04 21:38:43','2021-06-07 21:56:18'),(14,'FACT2','2021-06-04','2021-06-23','PREST2',2,1231.00,123.00,0.00,6.15,'5%',129.15,'pagada parcialmente',3,NULL,'2021-06-05',NULL,'2021-06-04 21:40:30','2021-06-07 21:54:51'),(15,'FACT3','2021-06-04','2021-06-15','PREST1',1,2523.00,234.00,0.00,11.70,'5%',245.70,'pagada parcialmente',3,NULL,'2021-06-05',NULL,'2021-06-04 21:57:18','2021-06-05 14:35:52'),(17,'FACT5','2021-06-05','2021-06-25','PREST2',2,54353.00,12333.00,0.00,616.65,'5%',1949.65,'pagada',1,NULL,'2021-06-05',NULL,'2021-06-05 10:30:17','2021-06-05 21:52:16'),(18,'FACT6','2021-06-05','2021-06-27','PREST7',10,18000.00,2300.00,0.00,230.00,'10%',2530.00,'pagada',1,NULL,'2021-06-10',NULL,'2021-06-05 10:33:08','2021-06-05 10:49:39'),(19,'FACT7','2021-06-05','2021-06-28','PREST4',4,8500.00,350.00,0.00,35.00,'10%',385.00,'pagada parcialmente',3,NULL,'2021-06-05',NULL,'2021-06-05 14:44:20','2021-06-05 14:45:04'),(20,'FACT8','2021-06-05','2021-06-29','PREST4',4,8799.00,300.00,0.00,30.00,'10%',330.00,'pagada parcialmente',3,NULL,'2021-06-05',NULL,'2021-06-05 14:47:57','2021-06-05 14:51:13'),(21,'FACT9','2021-06-05','2021-06-30','PREST5',5,65467.00,12000.00,0.00,1200.00,'10%',13200.00,'pagada parcialmente',3,NULL,'2021-06-05',NULL,'2021-06-05 14:52:07','2021-06-05 14:52:47'),(22,'FACT10','2021-06-05','2021-07-14','PREST3',3,3535.00,1121.00,0.00,56.05,'5%',1177.05,'pagada parcialmente',3,NULL,'2021-06-05',NULL,'2021-06-05 14:57:48','2021-06-05 20:48:11'),(23,'FACT11','2021-06-05','2021-07-08','PREST5',5,7899.00,1000.00,0.00,100.00,'10%',1100.00,'pagada parcialmente',3,NULL,'2021-06-06',NULL,'2021-06-05 15:00:33','2021-06-06 16:22:59'),(24,'FACT12','2021-06-05','2021-07-02','PREST5',5,1234.00,123.00,0.00,12.30,'10%',135.30,'pagada parcialmente',3,NULL,'2021-06-06',NULL,'2021-06-05 20:32:32','2021-06-06 16:14:49'),(25,'FACT13','2021-06-06','2021-07-01','PREST2',2,5680.00,1000.00,0.00,100.00,'10%',1100.00,'pagada parcialmente',3,NULL,'2021-06-06',NULL,'2021-06-06 16:28:41','2021-06-06 17:03:22'),(26,'FACT14','2021-06-06','2021-06-28','PREST1',1,87465.00,15000.00,0.00,1500.00,'10%',16500.00,'pagada parcialmente',3,NULL,'2021-06-06',NULL,'2021-06-06 17:18:48','2021-06-06 17:20:19'),(27,'FACT20','2021-06-06','2021-06-22','PREST3',3,5464.00,1000.00,0.00,100.00,'10%',1100.00,'pagada',1,NULL,'2021-06-06',NULL,'2021-06-06 17:30:22','2021-06-06 17:33:43'),(28,'FACT15','2021-06-06','2021-06-15','PREST4',4,8977.00,2000.00,0.00,100.00,'5%',2100.00,'pagada',1,NULL,'2021-06-06',NULL,'2021-06-06 17:35:04','2021-06-06 17:35:47'),(29,'FACT17','2021-06-06','2021-06-15','PREST4',4,10000.00,2000.00,0.00,100.00,'5%',2100.00,'pagada',1,NULL,'2021-06-06',NULL,'2021-06-06 17:39:17','2021-06-06 17:42:23'),(30,'FACT19','2021-06-06','2021-06-15','PREST6',6,50000.00,10200.00,0.00,510.00,'5%',10710.00,'pagada',1,NULL,'2021-06-06',NULL,'2021-06-06 17:45:00','2021-06-06 17:53:49'),(31,'FACT21','2021-06-06','2021-06-22','PREST4',4,5000.00,1000.00,0.00,50.00,'5%',1050.00,'pagada parcialmente',3,NULL,'2021-06-06',NULL,'2021-06-06 17:56:30','2021-06-06 17:57:00'),(32,'FACT22','2021-06-06','2021-06-22','PREST4',4,8500.00,1200.00,0.00,60.00,'5%',1260.00,'pagada',1,NULL,'2021-06-06',NULL,'2021-06-06 18:09:19','2021-06-06 19:21:35'),(33,'FACT23','2021-06-07','2021-06-15','PREST1',1,5800.00,1200.00,0.00,60.00,'5%',1260.00,'pagada',1,NULL,'2021-06-07',NULL,'2021-06-07 09:15:13','2021-06-07 09:34:02'),(34,'FACT30','2021-06-30','2021-07-01','PREST2',2,14000.00,2400.00,100.00,120.00,'5%',2520.00,'pagada',1,NULL,NULL,NULL,'2021-06-07 21:10:26','2021-06-07 21:11:50'),(35,'FACT40','2021-06-08','2021-06-24','PREST2',2,8900.00,1200.00,0.00,60.00,'5%',1260.00,'no pagada',2,NULL,NULL,NULL,'2021-06-08 13:01:34','2021-06-08 13:01:34'),(36,'FACT41','2021-06-09','2021-06-09','PREST2',2,5000.00,995.00,0.00,49.75,'5%',1044.75,'no pagada',2,NULL,NULL,NULL,'2021-06-09 21:18:57','2021-06-09 21:18:57');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-13 22:26:28