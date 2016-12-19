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
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Ghostbusters ',2016,'30 years after Ghostbusters took the world by storm, the beloved franchise makes its long-awaited return. Director Paul Feig brings his fresh take to the supernatural comedy, joined by some of the funniest actors working today.','13','Melissa McCarthy, Kristen Wiig, Kate McKinnon','Ghostbusters .jpg'),(2,'Suicide Squad',2016,'It feels good to be bad… Assemble a team of the world’s most dangerous, incarcerated Super Villains, provide them with the most powerful arsenal at the government’s disposal, and send them off on a mission to defeat an enigmatic, insuperable entity. U.S. intelligence officer Amanda Waller has determined only a secretly convened group of disparate, despicable individuals with next to nothing to lose will do. However, once they realize they weren’t picked to succeed but chosen for their patent culpability when they inevitably fail, will the Suicide Squad resolve to die trying, or decide it’s every man for himself?','13','Will Smith,Jared Leto,Margot Robbie','Suicide Squad.jpg'),(3,'The Legend of Tarzan',2016,'It has been years since the man once known as Tarzan (Alexander Skarsgård) left the jungles of Africa behind for a gentrified life as John Clayton III, Lord Greystoke, with his beloved wife, Jane (Margot Robbie) at his side. Now, he has been invited back to the Congo to serve as a trade emissary of Parliament, unaware that he is a pawn in a deadly convergence of greed and revenge, masterminded by the Belgian, Captain Leon Rom (Christoph Waltz). But those behind the murderous plot have no idea what they are about to unleash.','13','Margot Robbie,Christoph Waltz','The Legend of Tarzan.jpg'),(4,'The Secret Life of Pets',2016,'For one bustling Manhattan apartment building, the real day starts after the folks on two legs leave for work and school. That’s when the pets of every stripe, fur, and feather begin their own nine-to-five routine: hanging out with each other, trading humiliating stories about their owners or auditioning adorable looks to get better snacks. The buildings top dog, Max (voiced by Louis C.K.) a quick witted terrier rescue who’s convinced he sits at the center of his owner’s universe, finds his pampered life rocked when she brings home Duke (Eric Stonestreet), a sloppy, massive mess of a mongrel with zero interpersonal skills. When this reluctant canine due find themselves out on the mean streets pf New York, they have to set aside their differences and unite against a fluffy-yet cunning bunny named Snowball (Kevin Hart), who’s building an army of ex-pets abandoned by their owners and out to turn the tables on humanity…all before dinner time.','0','Louis C.K.,	Kevin HartJenny Slate','The Secret Life of Pets.jpg'),(5,'Batman v Superman: Dawn of Justice',2016,'Fearing the actions of a god-like superhero left unchecked, Gotham City’s own formidable, forceful vigilante takes on Metropolis’s most revered, modern-day savior, while the world wrestles with what sort of hero it really needs. And with Batman vs Superman at war with one another, a new threat quickly arises, putting mankind in greater danger than it’s ever known before.','13','Ben Affleck,Henry Cavill','Batman v Superman: Dawn of Justice.jpg'),(6,'Warcraft',2016,'From Legendary Pictures and Universal Pictures comes Warcraft, an epic adventure of world-colliding conflict based on Blizzard Entertainment’s global phenomenon. The peaceful realm of Azeroth stands on the brink of war as its civilization faces a fearsome race of invaders: Orc warriors fleeing their dying home to colonize another. As a portal opens to connect the two worlds, one army faces destruction and the other faces extinction. From opposing sides, two heroes are set on a collision course that will decide the fate of their family, their people and their home. So begins a spectacular saga of power and sacrifice in which war has many faces, and everyone fights for something.','0','Travis Fimmel, Paula Patton, Ben Foster','Warcraft.jpg'),(7,'Central Intelligence',2016,'The story follows a one-time bullied geek, Bob, who grew up to be a lethal CIA agent (Dwayne Johnson), coming home for his high school reunion. Claiming to be on a top-secret case, he enlists the help of former “big man on campus,” Calvin (Kevin Hart), now an accountant who misses his glory days. But before the staid numbers-cruncher realizes what he’s getting into, it’s too late to get out, as his increasingly unpredictable new friend drags him through a world of shoot-outs, double-crosses and espionage that could get them both killed in more ways than Calvin can count.','13','Dwayne Johnson, Kevin Hart, Danielle Nicolet','Central Intelligence.jpg'),(8,'Jason Bourne',2016,'Global superstar Matt Damon returns to his most iconic role as Jason Bourne in the fifth installment of Universal Pictures’ Bourne franchise.  Acclaimed director Paul Greengrass (The Bourne Supremacy, The Bourne Ultimatum, Captain Phillips) also returns for this much-anticipated chapter, and Frank Marshall again produces alongside Jeffrey Weiner for Captivate Entertainment.  Greengrass, Damon, Gregory Goodman and Ben Smith also produce.  The action-thriller is written by Greengrass and Christopher Rouse.','13','Matt Damon, Tommy Lee Jones, Alicia Vikander','Jason Bourne.jpg'),(9,'Star Wars: The Force Awakens',2015,'Lucasfilm and visionary director J.J. Abrams join forces to take you back again to a galaxy far, far away as Star Wars returns to the big screen with Star Wars: The Force Awakens.','13','Daisy Ridley, John Boyega, Oscar Isaac','Star Wars: The Force Awakens.jpg'),(10,'Spectre',2015,' A cryptic message from Bond’s past sends him on a trail to uncover a sinister organisation. While M battles political forces to keep the secret service alive, Bond peels back the layers of deceit to reveal the terrible truth behind SPECTRE.','13','Daniel Craig, Christoph Waltz, Léa Seydoux','Spectre.jpg');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-19 15:28:11
