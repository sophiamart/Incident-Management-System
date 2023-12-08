-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: incidenttrack
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `incidentid` int(11) NOT NULL,
  `commentdesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`commentid`),
  KEY `comments_fk` (`incidentid`),
  CONSTRAINT `comments_fk` FOREIGN KEY (`incidentid`) REFERENCES `incident` (`incidentid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'Minor sever crash'),(2,2,'Slow system speed, severs crashing'),(3,3,'Suspecious emails, login details extracted'),(4,4,'Sitewide leak of login details, passwords compromised'),(5,1,'resolved with a quick reboot'),(6,2,'Solved with Antivirus');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incident`
--

DROP TABLE IF EXISTS `incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incident` (
  `incidentid` int(11) NOT NULL AUTO_INCREMENT,
  `incidenttype` varchar(25) NOT NULL,
  `incidentdate` date NOT NULL,
  `incidentstate` varchar(10) NOT NULL,
  PRIMARY KEY (`incidentid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incident`
--

LOCK TABLES `incident` WRITE;
/*!40000 ALTER TABLE `incident` DISABLE KEYS */;
INSERT INTO `incident` VALUES (1,'DoS attack','2020-02-12','Closed'),(2,'Malware','2020-03-24','Closed'),(3,'Phishing','2020-11-14','Stalled'),(4,'password','2020-12-09','Open');
/*!40000 ALTER TABLE `incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `peopleid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` char(25) DEFAULT NULL,
  `firstname` char(25) DEFAULT NULL,
  `jobtitle` char(25) NOT NULL,
  `emailaddress` varchar(100) DEFAULT NULL,
  `incidentid` int(11) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  PRIMARY KEY (`peopleid`),
  KEY `people_fk` (`incidentid`),
  CONSTRAINT `people_fk` FOREIGN KEY (`incidentid`) REFERENCES `incident` (`incidentid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'Martuscello','Sophia','Software Developer','SMart@IRTS.com',1,'1234567898'),(2,'Teran','Lylybell','Security Architect','LTeran@IRTS.com',2,'9876545673'),(3,'Quadri','Amna','Security Analyst','AQuadri@IRTS.com',3,'5436789034'),(4,'Sam','Ann','Software Engineer','ASam@IRTS.com',4,'236367892');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-15 21:08:16
