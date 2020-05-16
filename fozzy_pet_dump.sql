-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: fozzy_pet
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `fozzy_pet`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `fozzy_pet` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `fozzy_pet`;

--
-- Table structure for table `kind_pets`
--

DROP TABLE IF EXISTS `kind_pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kind_pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kind_pet_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A248A78A4B9A670` (`kind_pet_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kind_pets`
--

LOCK TABLES `kind_pets` WRITE;
/*!40000 ALTER TABLE `kind_pets` DISABLE KEYS */;
INSERT INTO `kind_pets` VALUES (2,'cat','meow'),(3,'dog','woof'),(4,'hamster','squeak'),(5,'parrot','chirping');
/*!40000 ALTER TABLE `kind_pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_pets`
--

DROP TABLE IF EXISTS `my_pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `kind_pet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `IDX_461FC36B7B03C16` (`kind_pet_id`),
  CONSTRAINT `FK_461FC36B7B03C16` FOREIGN KEY (`kind_pet_id`) REFERENCES `kind_pets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_pets`
--

LOCK TABLES `my_pets` WRITE;
/*!40000 ALTER TABLE `my_pets` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_pets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-16 19:56:13
