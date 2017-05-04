-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: website
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `movie_seasion`
--

DROP TABLE IF EXISTS `movie_seasion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_seasion` (
  `movieID` int(11) DEFAULT NULL,
  `movie_name` varchar(45) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_seasion`
--

LOCK TABLES `movie_seasion` WRITE;
/*!40000 ALTER TABLE `movie_seasion` DISABLE KEYS */;
INSERT INTO `movie_seasion` VALUES (1,'Ghostbusters ','2017-05-17 21:00:00',1),(2,'Suicide Squad','2017-05-17 22:00:00',2),(1,'Ghostbusters ','2017-05-17 22:00:00',3),(2,'Suicide Squad','2017-05-17 00:30:00',4),(1,'Ghostbusters ','2017-05-17 21:00:00',5),(1,'Ghostbusters ','2017-05-17 22:00:00',6),(2,'Suicide Squad','2017-05-17 22:00:00',7),(2,'Suicide Squad','2017-05-17 00:30:00',8),(1,'Ghostbusters ','2017-05-17 21:00:00',9),(1,'Ghostbusters ','2017-05-17 22:00:00',10),(2,'Suicide Squad','2017-05-17 22:00:00',11),(2,'Suicide Squad','2017-05-17 00:30:00',12),(3,'The Legend of Tarzan','2017-05-17 14:30:00',13),(3,'The Legend of Tarzan','2017-05-17 17:00:00',14),(4,'The Secret Life of Pets','2017-05-17 22:30:00',15),(5,'Batman v Superman: Dawn of Justice','2017-05-17 22:00:00',16),(6,'Warcraft','2017-05-17 21:00:00',17),(7,'Central Intelligence','2017-05-17 19:00:00',18),(8,'Jason Bourne','2017-05-17 20:00:00',19),(9,'Star Wars: The Force Awakens','2017-05-17 19:20:00',20),(10,'Spectre','2017-05-17 23:30:00',21),(10,'Spectre','2017-05-17 00:00:00',22),(4,'The Secret Life of Pets','2017-05-17 19:00:00',23);
/*!40000 ALTER TABLE `movie_seasion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-04 11:59:31
