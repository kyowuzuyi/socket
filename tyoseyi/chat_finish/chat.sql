-- MySQL dump 10.16  Distrib 10.1.9-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: chat
-- ------------------------------------------------------
-- Server version	10.1.9-MariaDB

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
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameA` varchar(64) DEFAULT NULL,
  `nameB` varchar(64) DEFAULT NULL,
  `message` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,'bb','aa','aaa'),(2,'aa','bb','hello'),(3,'aa','bb','aa'),(4,'aa','bb','aa'),(5,'bb','aa','sa'),(6,'aa','bb','hi'),(7,'aa','bb','hi'),(8,'aa','bb','hi'),(9,'aa','bb','hi'),(10,'bb','aa','you'),(11,'bb','aa','you'),(12,'bb','aa','you'),(13,'cc','aa','aa'),(14,'aa','cc','hi'),(15,'aa','cc',''),(16,'aa','cc',''),(17,'bb','aa',''),(18,'aa','cc',''),(19,'aa','cc',''),(20,'cc','aa','g'),(21,'aa','cc','aa'),(22,'aa','cc','aa'),(23,'cc','aa','cc'),(24,'cc',NULL,'cc'),(25,'aa',NULL,'aa'),(26,'aa',NULL,'aa'),(27,'aa',NULL,'aa'),(28,'aa',NULL,'aa'),(29,'aa',NULL,'aa'),(30,'aa',NULL,'aa'),(31,'aa',NULL,'aa'),(32,'aa','cc','aa'),(33,'cc','aa','cc'),(34,'cc','aa','cc'),(35,'aa','cc','aa'),(36,'aa','cc',NULL),(37,'aa','cc',NULL),(38,'tokyo','techc','hello'),(39,'techc','tokyo','hello'),(40,'techc','tokyo','hello'),(41,'techc','tokyo','hello'),(42,'hoho','techc','world'),(43,'tokyo','techc','sds'),(44,'techc','hoho','basketball'),(45,'hoho','techc','basketball'),(46,'hoho','techc','etball  basketball'),(47,'hoho','techc','basketball'),(48,'hoho','techc','basketball'),(49,'techc','hoho','basketball'),(50,'techc','hoho','basketball'),(51,'hoho','techc','basketball');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `eventname` varchar(30) DEFAULT NULL,
  `eventtime` date DEFAULT NULL,
  `eventplace` varchar(30) DEFAULT NULL,
  `eventmemo` varchar(100) DEFAULT NULL,
  `eventURL` varchar(100) DEFAULT NULL,
  `CreateDate` date DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (143,'111','222','2016-01-01','1111','1111','126598362457763974cf3d0','2016-07-01','2016-09-01'),(147,'111','666','2016-01-01','666','','1795423429577639878e7b1','2016-07-01','2016-09-01'),(148,'222','222','2016-01-01','1111','1111','1633094121577a10a0425f1','2016-07-04','2016-09-04'),(149,'222','444','2016-06-01','444','44','309172657577a13ddf2b58','2016-07-04','2016-09-04'),(153,'222','333','2016-03-01','333','','1602143419577a19ec80d3c','2016-07-04','2016-09-04'),(156,'111','214352','2016-05-01','23452','','1044171687577b6354cd612','2016-07-05','2016-09-05'),(157,'111','123456','2016-01-20','22222','','1605040905577b6aacea019','2016-07-05','2016-09-05'),(158,'godpoo3','é£²ã¿ä¼š','2016-07-31','æ± è¢‹','2500å††','1173942248577b7587ce8fa','2016-07-05','2016-09-05'),(159,'godpoo3','é‹å‹•ä¼š','2016-07-24','é«˜ç”°é¦¬å ´','10æ™‚ã«é§…é›†åˆ','1131032756577b760aa3785','2016-07-05','2016-09-05'),(161,'111','111111','2016-01-01','11111','111','2097713111577f68ec06d4d','2016-07-08','2016-09-08');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membercheck`
--

DROP TABLE IF EXISTS `membercheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membercheck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `isgo` varchar(3) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `eventURL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membercheck`
--

LOCK TABLES `membercheck` WRITE;
/*!40000 ALTER TABLE `membercheck` DISABLE KEYS */;
INSERT INTO `membercheck` VALUES (52,'444','1','444','309172657577a13ddf2b58'),(53,'555','1','555','309172657577a13ddf2b58'),(54,'111','2','222','309172657577a13ddf2b58'),(55,'333','3','333','309172657577a13ddf2b58'),(56,'123','3','123','309172657577a13ddf2b58'),(57,'321','2','321','309172657577a13ddf2b58'),(58,'5678','1','5678','1633094121577a10a0425f1'),(59,'222','1','222','1926317248577a1884e0d44'),(60,'333','1','333','1602143419577a19ec80d3c'),(61,'546','3','456','1602143419577a19ec80d3c'),(62,'111','1','111','126598362457763974cf3d0'),(63,'111','1','111','126598362457763974cf3d0'),(64,'234','3','234','126598362457763974cf3d0'),(65,'wu','1','go','1795423429577639878e7b1'),(66,'wu','1','go','1605040905577b6aacea019'),(67,'yang','3','no','1795423429577639878e7b1'),(68,'gogo','1','gogo','1795423429577639878e7b1'),(69,'é«˜ç”°','1','æ¥½ã—ã¿','1131032756577b760aa3785'),(70,'æ–°åž£','3','åˆ¥ã®äºˆå®šãŒã‚ã£ã¦','1131032756577b760aa3785');
/*!40000 ALTER TABLE `membercheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memberemail`
--

DROP TABLE IF EXISTS `memberemail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memberemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupID` int(32) DEFAULT NULL,
  `memberemail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberemail`
--

LOCK TABLES `memberemail` WRITE;
/*!40000 ALTER TABLE `memberemail` DISABLE KEYS */;
INSERT INTO `memberemail` VALUES (45,29,'111@111.11'),(46,29,'1111@111.11'),(47,29,'222@222.22'),(48,29,'333@44.44'),(49,29,'godpoo3@hotmail.com'),(50,29,'godpoo3@gmail.com'),(51,31,'godpoo3@gmail.com'),(52,31,'godpoo3@hotmail.com');
/*!40000 ALTER TABLE `memberemail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `people` int(8) DEFAULT NULL,
  `socket_id` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'techc','aa','$2y$10$jWU5VS0CFbntsuRpcVJVDeN1WEhxzBPqBEHW44TE7KykyVRGuA30q','123456',560,''),(2,'bb','',NULL,NULL,NULL,NULL),(3,'tokyo','cc','$2y$10$fHnLtmcH1sugrfQjiXrF7.CWlDRyCzN9KqFwWjYIMqj6x2PMkJUSG','21424',45,NULL),(4,'hoho','dd','$2y$10$69.fW/pKmjyIACvLInYCR.eYWGxnKuNZm3jVR0kqHENBYROYOOoKu','212',121,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `socket_id` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'aa','krknN5EKkqBEBA-ZyoXY'),(7,'bb','tMOHE6D7zWZuCPHdyoXZ'),(8,'cc','aKB9NF4rUoIngfPJyoXa'),(9,'dd',NULL),(10,'ee',NULL);
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

-- Dump completed on 2016-07-12 15:40:10
