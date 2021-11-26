-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: akinawild
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artiste` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `langue` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `is_dead` tinyint(1) DEFAULT NULL,
  `is_band` tinyint(1) DEFAULT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `nb_album` int DEFAULT NULL,
  `style` varchar(100) DEFAULT NULL,
  `debut_activite` int DEFAULT NULL,
  `is_activ` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artiste`
--

/*!40000 ALTER TABLE `artiste` DISABLE KEYS */;
INSERT INTO `artiste` VALUES (1,'Eminem','Francaise','Francais',49,0,0,'Homme',11,'Hiphop',1988,1),(2,'Orelsan','Francaise','Francais',39,0,0,'Homme',8,'Rap',2002,1),(3,'Rihanna','Barbadienne','Anglais',33,0,0,'Femme',8,'R&B',2003,0),(4,'Russ','Americain','Anglais',29,0,0,'Homme',4,'Hiphop',2007,1),(5,'Michael Jakcson','Americain','Anglais',50,1,0,'Homme',10,'Pop',1964,0),(6,'The Beatles','Anglaise','Anglais',NULL,1,1,'Homme',12,'Rock',1960,0),(7,'Queen','Anglaise','Anglais',NULL,NULL,1,'Homme',16,'Rock',1970,0),(8,'Elvis Presley','Americain','Anglais',42,1,0,'Homme',43,'Rock',1954,0),(9,'Johnny Hallyday','Francais','Francais',74,1,0,'Homme',53,'Rock',1957,0),(10,'Jean Jacques Goldman','Francaise','Francais',70,0,0,'Homme',16,'Pop',1975,1),(11,'Michel Polnareff','Francaise','Francais',77,0,0,'Homme',10,'Pop',1966,0),(12,'Amy Winehouse','Anglaise','Anglais',27,1,0,'Femme',2,'Soul',1997,0),(13,'Selah Sue','Belge','Francais',32,0,0,'Femme',10,'Soul Reggae',2008,1),(14,'Mariah Carey','Americaine','Anglais',52,0,0,'Femme',23,'R&B',1988,1),(15,'Angèle','Belge','Francais',25,0,0,'Femme',2,'Pop',2015,1),(16,'Taylor Swift','Americaine','Anglais',31,0,0,'Femme',9,'Pop',2006,1),(17,'Doja Cat','Americaine','Anglaise',26,0,0,'Femme',4,'Hiphop',2012,1),(18,'Dua Lipa','Anglaise','Anglais',26,0,0,'Femme',2,'Pop',2014,1),(19,'Avicii','Suise','Anglais',27,1,0,'Homme',5,'Electro',2006,0),(20,'Billie Eilish','Americaine','Anglais',19,0,0,'Femme',2,'Electro',2015,1);
/*!40000 ALTER TABLE `artiste` ENABLE KEYS */;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Est-ce un groupe ?'),(2,'Est-ce une Femme ?'),(3,'Cet artiste est-il toujours en vie ?'),(4,'Cet artiste est il toujours en activité ?'),(5,'Est-ce de la musique'),(6,'a-t-il plus de 30 ans?'),(7,'Est-il de nationnalité'),(8,'Est-ce qu\'il parle'),(9,'a-t-il sorti plus de ');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-26 11:20:11
