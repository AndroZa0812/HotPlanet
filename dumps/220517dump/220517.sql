CREATE DATABASE  IF NOT EXISTS `website` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `website`;
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
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `username` varchar(45) NOT NULL,
  `commentID` varchar(45) NOT NULL,
  `likeType` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`,`commentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES ('AndroZa','29',1),('AndroZa','33',1);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `massage` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idmessages_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'lalala@gmail.com','123123');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_session`
--

DROP TABLE IF EXISTS `movie_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_session` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `movieID` int(11) DEFAULT NULL,
  `movie_name` varchar(45) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_session`
--

LOCK TABLES `movie_session` WRITE;
/*!40000 ALTER TABLE `movie_session` DISABLE KEYS */;
INSERT INTO `movie_session` VALUES (1,1,'Ghostbusters - 3D ','2017-05-16 21:00:00'),(2,2,'Suicide Squad','2017-05-17 22:00:00'),(3,1,'Ghostbusters ','2017-05-14 22:00:00'),(4,2,'Suicide Squad','2017-05-17 00:30:00'),(5,1,'Ghostbusters ','2017-05-19 21:00:00'),(6,1,'Ghostbusters ','2017-05-17 22:00:00'),(7,2,'Suicide Squad','2017-05-17 22:00:00'),(8,2,'Suicide Squad - 3D','2017-05-17 00:30:00'),(9,1,'Ghostbusters ','2017-05-17 21:00:00'),(10,1,'Ghostbusters ','2017-05-17 22:00:00'),(11,2,'Suicide Squad','2017-05-17 22:00:00'),(12,2,'Suicide Squad','2017-05-17 00:30:00'),(13,3,'The Legend of Tarzan','2017-05-17 14:30:00'),(14,3,'The Legend of Tarzan','2017-05-17 17:00:00'),(15,4,'The Secret Life of Pets','2017-05-17 22:30:00'),(16,5,'Batman v Superman: Dawn of Justice','2017-05-17 22:00:00'),(17,6,'Warcraft','2017-05-17 21:00:00'),(18,7,'Central Intelligence','2017-05-17 19:00:00'),(19,8,'Jason Bourne','2017-05-17 20:00:00'),(20,9,'Star Wars: The Force Awakens','2017-05-17 19:20:00'),(21,10,'Spectre','2017-05-17 23:30:00'),(22,10,'Spectre','2017-05-17 00:00:00'),(23,4,'The Secret Life of Pets','2017-05-17 19:00:00');
/*!40000 ALTER TABLE `movie_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Movie` varchar(45) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `dec` text,
  `ageR` varchar(45) DEFAULT NULL,
  `actors` text,
  `img` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Ghostbusters ',2016,'30 years after Ghostbusters took the world by storm, the beloved franchise makes its long-awaited return. Director Paul Feig brings his fresh take to the supernatural comedy, joined by some of the funniest actors working today.','13','Melissa McCarthy, Kristen Wiig, Kate McKinnon','Ghostbusters.jpg'),(2,'Suicide Squad',2016,'It feels good to be bad… Assemble a team of the world’s most dangerous, incarcerated Super Villains, provide them with the most powerful arsenal at the government’s disposal, and send them off on a mission to defeat an enigmatic, insuperable entity. U.S. intelligence officer Amanda Waller has determined only a secretly convened group of disparate, despicable individuals with next to nothing to lose will do. However, once they realize they weren’t picked to succeed but chosen for their patent culpability when they inevitably fail, will the Suicide Squad resolve to die trying, or decide it’s every man for himself?','13','Will Smith,Jared Leto,Margot Robbie','Suicide Squad.jpg'),(3,'The Legend of Tarzan',2016,'It has been years since the man once known as Tarzan (Alexander Skarsgård) left the jungles of Africa behind for a gentrified life as John Clayton III, Lord Greystoke, with his beloved wife, Jane (Margot Robbie) at his side. Now, he has been invited back to the Congo to serve as a trade emissary of Parliament, unaware that he is a pawn in a deadly convergence of greed and revenge, masterminded by the Belgian, Captain Leon Rom (Christoph Waltz). But those behind the murderous plot have no idea what they are about to unleash.','13','Margot Robbie,Christoph Waltz','The Legend of Tarzan.jpg'),(4,'The Secret Life of Pets',2016,'For one bustling Manhattan apartment building, the real day starts after the folks on two legs leave for work and school. That’s when the pets of every stripe, fur, and feather begin their own nine-to-five routine: hanging out with each other, trading humiliating stories about their owners or auditioning adorable looks to get better snacks. The buildings top dog, Max (voiced by Louis C.K.) a quick witted terrier rescue who’s convinced he sits at the center of his owner’s universe, finds his pampered life rocked when she brings home Duke (Eric Stonestreet), a sloppy, massive mess of a mongrel with zero interpersonal skills. When this reluctant canine due find themselves out on the mean streets pf New York, they have to set aside their differences and unite against a fluffy-yet cunning bunny named Snowball (Kevin Hart), who’s building an army of ex-pets abandoned by their owners and out to turn the tables on humanity…all before dinner time.','0','Louis C.K.,	Kevin HartJenny Slate','The Secret Life of Pets.jpg'),(5,'Batman v Superman: Dawn of Justice',2016,'Fearing the actions of a god-like superhero left unchecked, Gotham City’s own formidable, forceful vigilante takes on Metropolis’s most revered, modern-day savior, while the world wrestles with what sort of hero it really needs. And with Batman vs Superman at war with one another, a new threat quickly arises, putting mankind in greater danger than it’s ever known before.','13','Ben Affleck,Henry Cavill','Batman.jpg'),(6,'Warcraft',2016,'From Legendary Pictures and Universal Pictures comes Warcraft, an epic adventure of world-colliding conflict based on Blizzard Entertainment’s global phenomenon. The peaceful realm of Azeroth stands on the brink of war as its civilization faces a fearsome race of invaders: Orc warriors fleeing their dying home to colonize another. As a portal opens to connect the two worlds, one army faces destruction and the other faces extinction. From opposing sides, two heroes are set on a collision course that will decide the fate of their family, their people and their home. So begins a spectacular saga of power and sacrifice in which war has many faces, and everyone fights for something.','0','Travis Fimmel, Paula Patton, Ben Foster','Warcraft.jpg'),(7,'Central Intelligence',2016,'The story follows a one-time bullied geek, Bob, who grew up to be a lethal CIA agent (Dwayne Johnson), coming home for his high school reunion. Claiming to be on a top-secret case, he enlists the help of former “big man on campus,” Calvin (Kevin Hart), now an accountant who misses his glory days. But before the staid numbers-cruncher realizes what he’s getting into, it’s too late to get out, as his increasingly unpredictable new friend drags him through a world of shoot-outs, double-crosses and espionage that could get them both killed in more ways than Calvin can count.','13','Dwayne Johnson, Kevin Hart, Danielle Nicolet','Central Intelligence.jpg'),(8,'Jason Bourne',2016,'Global superstar Matt Damon returns to his most iconic role as Jason Bourne in the fifth installment of Universal Pictures’ Bourne franchise.  Acclaimed director Paul Greengrass (The Bourne Supremacy, The Bourne Ultimatum, Captain Phillips) also returns for this much-anticipated chapter, and Frank Marshall again produces alongside Jeffrey Weiner for Captivate Entertainment.  Greengrass, Damon, Gregory Goodman and Ben Smith also produce.  The action-thriller is written by Greengrass and Christopher Rouse.','13','Matt Damon, Tommy Lee Jones, Alicia Vikander','Jason Bourne.jpg'),(9,'Star Wars: The Force Awakens',2015,'Lucasfilm and visionary director J.J. Abrams join forces to take you back again to a galaxy far, far away as Star Wars returns to the big screen with Star Wars: The Force Awakens.','13','Daisy Ridley, John Boyega, Oscar Isaac','Star Wars.jpg'),(10,'Spectre',2015,' A cryptic message from Bond’s past sends him on a trail to uncover a sinister organisation. While M battles political forces to keep the secret service alive, Bond peels back the layers of deceit to reveal the terrible truth behind SPECTRE.','13','Daniel Craig, Christoph Waltz, Léa Seydoux','Spectre.jpg');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderID` longtext,
  `userID` int(11) DEFAULT NULL,
  `sessionID` int(11) DEFAULT NULL,
  `seats` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='all the users and their orders';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'12324243',1,1,'1_2,4_4'),(2,'3823842',2,1,'6_7,8_5'),(3,'87878780',3,3,'1_1,1_2'),(4,'38709872',3,3,'2_1,2_4,2_5'),(5,'67697574',3,3,'3_5,3_6'),(6,'1494547814750012946',6,3,'4_8,4_9,4_10'),(7,'14945480048912326076',6,3,'5_6,5_7'),(8,'14945481765117957836',6,3,'1_8,1_9'),(9,'149454848715700406676',6,3,'7_8,7_9,7_10'),(10,'14945910713236283846',6,3,'7_2,7_3,7_4'),(11,'149461428118698302516',6,4,'4_4,4_5,4_6'),(13,'149478155771129156310',10,1,'3_6,3_7'),(14,'1494814467180662276',6,3,'6_8,6_9'),(15,'14954550523356446846',6,4,'6_4,6_5,6_6');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `movie` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `info` varchar(256) DEFAULT NULL,
  `upvotes` int(11) DEFAULT '0',
  `downvotes` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (29,1,'AndroZa','not the best movie.',29,28),(33,1,'AndroZa','××—×œ×” ×¡×¨×˜',11,10);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'AndroZa','Nathan','Tregub','nathan0812@gmail.com','$2y$10$MBzJWVH2quoadpsKv1SYU.QzFdUChXzS4RMzJFoUo9Om7BR5igS8e',19,1),(8,'test','matest','test','samlamla@dudu.com','$2y$10$azNiHM5bc6P7A5PJe0M.4OnEExzQ3KkdvsMlnM3ULE7DDKTRs8Y9C',19,0),(9,'editor','test','test','edit@test.com','$2y$10$D/l.JhqJkUkhAdbhvQ7r7uUKqpoYvfMQzamhYeM.XNtwNSNNDBXNC',120,2),(10,'asdad','123123','1432','lalala@gmail.com','$2y$10$ESxaqxlO4YJjJ2m5z.bwweJf/sf97qvHiItfzUYUDhmBHp7QRaacy',99,0),(11,'kkkkkkkkkk','kkk','kkkk','kkkk@gmail.com','$2y$10$ath9QT.Wj/ZMsQkBCS4FWuwwSJ.Cd1U0PxWGnS9ZII4fzjDl3VMZC',99,0);
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

-- Dump completed on 2017-05-22 18:54:57
