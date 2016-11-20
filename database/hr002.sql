/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.39 : Database - horseracing
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`horseracing` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `horseracing`;

/*Table structure for table `horsedb` */

DROP TABLE IF EXISTS `horsedb`;

CREATE TABLE `horsedb` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `itemsen` text COLLATE utf8_unicode_ci,
  `itemscn` text COLLATE utf8_unicode_ci,
  `itemsmy` text COLLATE utf8_unicode_ci,
  `txday` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event` text COLLATE utf8_unicode_ci,
  `info` text COLLATE utf8_unicode_ci,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `horsedb` */

/*Table structure for table `livetote` */

DROP TABLE IF EXISTS `livetote`;

CREATE TABLE `livetote` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `RaceCard` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceCountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceDay` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceBoard` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceCountryOdds` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceNo` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Win` decimal(10,2) DEFAULT NULL,
  `Place` decimal(10,2) DEFAULT NULL,
  `txday` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event` text COLLATE utf8_unicode_ci,
  `info` text COLLATE utf8_unicode_ci,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `livetote` */

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `txday` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event` text COLLATE utf8_unicode_ci,
  `info` text COLLATE utf8_unicode_ci,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `logs` */

/*Table structure for table `raceinfo` */

DROP TABLE IF EXISTS `raceinfo`;

CREATE TABLE `raceinfo` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `RaceCard` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceCountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceDay` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `items1en` text COLLATE utf8_unicode_ci,
  `items1cn` text COLLATE utf8_unicode_ci,
  `items1my` text COLLATE utf8_unicode_ci,
  `items2en` text COLLATE utf8_unicode_ci,
  `items2cn` text COLLATE utf8_unicode_ci,
  `items2my` text COLLATE utf8_unicode_ci,
  `items3en` text COLLATE utf8_unicode_ci,
  `items3cn` text COLLATE utf8_unicode_ci,
  `items3my` text COLLATE utf8_unicode_ci,
  `items4en` text COLLATE utf8_unicode_ci,
  `items4cn` text COLLATE utf8_unicode_ci,
  `items4my` text COLLATE utf8_unicode_ci,
  `win1A` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `win1P` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `win2A` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `win2P` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `win3A` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `win3P` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `win4A` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `win4P` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `InternetTicketPrice1a` decimal(20,10) DEFAULT NULL,
  `InternetTicketPrice1p` decimal(20,10) DEFAULT NULL,
  `InternetTicketPrice2a` decimal(20,10) DEFAULT NULL,
  `InternetTicketPrice2p` decimal(20,10) DEFAULT NULL,
  `InternetTicketPrice3a` decimal(20,10) DEFAULT NULL,
  `InternetTicketPrice3p` decimal(20,10) DEFAULT NULL,
  `InternetTicketPrice4a` decimal(20,10) DEFAULT NULL,
  `InternetTicketPrice4p` decimal(20,10) DEFAULT NULL,
  `RaceID` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `txday` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event` text COLLATE utf8_unicode_ci,
  `info` text COLLATE utf8_unicode_ci,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `raceinfo` */

/*Table structure for table `racerard` */

DROP TABLE IF EXISTS `racerard`;

CREATE TABLE `racerard` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `RaceCard` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceCountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceDay` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `itemsen` text COLLATE utf8_unicode_ci,
  `itemscn` text COLLATE utf8_unicode_ci,
  `itemsmy` text COLLATE utf8_unicode_ci,
  `RaceID` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `RaceNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `Details` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `txday` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event` text COLLATE utf8_unicode_ci,
  `info` text COLLATE utf8_unicode_ci,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rowid`),
  KEY `racecard_idx` (`RaceCard`),
  KEY `racecard1_idx` (`RaceCard`,`RaceDay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `racerard` */

/*Table structure for table `raceresult` */

DROP TABLE IF EXISTS `raceresult`;

CREATE TABLE `raceresult` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `RaceCard` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceCountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RaceDay` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `itemsen` text COLLATE utf8_unicode_ci,
  `itemscn` text COLLATE utf8_unicode_ci,
  `itemsmy` text COLLATE utf8_unicode_ci,
  `RaceID` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `RaceNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT '',
  `Details` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `txday` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event` text COLLATE utf8_unicode_ci,
  `info` text COLLATE utf8_unicode_ci,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `raceresult` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fees` decimal(20,5) DEFAULT '0.00000',
  `phonenumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oldstatus` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oldremark` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serialNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `tstamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`rowid`,`id`,`password`,`fullname`,`pid`,`level`,`currency`,`fees`,`phonenumber`,`status`,`oldstatus`,`remark`,`oldremark`,`serialNo`,`duedate`,`createdate`,`tstamp`) values (1,'admin','fcea920f7412b5da7be0cf42b8c93759','Thong',NULL,'1','RM',0.00000,'1234567890','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:04','2015-02-16 11:05:08'),(2,'pakuru','fcea920f7412b5da7be0cf42b8c93759','pa ku ru',NULL,'2','RM',0.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:07','2015-02-16 11:05:08'),(3,'pakonku','fcea920f7412b5da7be0cf42b8c93759','pa ku ru',NULL,'3','RM',18.00000,'1234543212','1',NULL,'good',NULL,NULL,NULL,'2015-02-16 18:30:12','2015-02-16 11:05:08'),(4,'konkupa','fcea920f7412b5da7be0cf42b8c93759','pa ku ru',NULL,'4','RM',0.00000,'9876541234','0',NULL,NULL,NULL,NULL,NULL,'2015-02-08 15:35:22','2015-02-16 11:05:08'),(5,'mayhabuoi','fcea920f7412b5da7be0cf42b8c93759','may ha buoi',NULL,'3','RM',81.00000,'9871276347','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 15:08:06','2015-02-16 11:05:08'),(6,'kieplangthang','fcea920f7412b5da7be0cf42b8c93759','lang thang kiep',NULL,'3','RM',52.00000,'8765432123','0',NULL,'not bad',NULL,NULL,NULL,'2015-02-17 15:06:53','2015-02-16 11:05:08'),(7,'cappuccino','fcea920f7412b5da7be0cf42b8c93759','buon 5s',NULL,'3','RM',41.00000,'9877875433','1',NULL,NULL,NULL,'11123234',NULL,'2015-02-16 15:14:51','2015-02-16 11:05:08'),(8,'okbaby','fcea920f7412b5da7be0cf42b8c93759','ko vua dau',NULL,'3','RM',65.00000,'7623345646','1',NULL,NULL,NULL,'12345678',NULL,'2015-02-16 15:07:53','2015-02-16 11:05:08'),(9,'pikachu','fcea920f7412b5da7be0cf42b8c93759','chubi',NULL,'3','RM',99.00000,'8765432234','1',NULL,NULL,NULL,'098765',NULL,'2015-02-16 15:08:26','2015-02-16 11:05:08'),(10,'xuka','fcea920f7412b5da7be0cf42b8c93759','xu ku ra',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 15:07:57','2015-02-16 11:05:08'),(11,'xataora','fcea920f7412b5da7be0cf42b8c93759','xa tao ra',NULL,'3','RM',97.00000,'1234567522','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 15:08:01','2015-02-16 11:05:08'),(12,'xuka1','fcea920f7412b5da7be0cf42b8c93759','xu ku ra','xuka','4','RM',0.00000,'0987654321','0',NULL,NULL,NULL,NULL,'2015-03-05 16:31:04','2015-02-27 15:35:14','2015-02-16 11:05:08'),(13,'xuka2','fcea920f7412b5da7be0cf42b8c93759','xu ku ra','xuka','4','RM',0.00000,'0987654321','1',NULL,NULL,NULL,NULL,'2015-02-20 16:31:10','2015-03-26 15:07:02','2015-02-16 11:05:08'),(14,'xuka3','fcea920f7412b5da7be0cf42b8c93759','xu ku ra','xuka','4','RM',0.00000,'0987654321','1','1','123 star','123 star',NULL,'2015-02-09 23:59:59','2015-03-17 15:07:04','2015-02-26 17:13:23'),(15,'okbaby1','fcea920f7412b5da7be0cf42b8c93759','ko vua dau','okbaby','4','RM',0.00000,'7623345646','1',NULL,NULL,NULL,NULL,NULL,'2015-02-03 15:07:21','2015-02-16 11:05:08'),(16,'okbaby2','fcea920f7412b5da7be0cf42b8c93759','ko vua dau','okbaby','4','RM',65.00000,'7623345646','1',NULL,NULL,NULL,NULL,NULL,'2015-01-02 15:07:46','2015-02-16 11:05:08'),(17,'okbaby3','fcea920f7412b5da7be0cf42b8c93759','ko vua dau','okbaby','4','RM',0.00000,'7623345646','1',NULL,NULL,NULL,NULL,NULL,'2015-01-13 14:46:33','2015-02-16 11:05:08'),(18,'okbaby4','fcea920f7412b5da7be0cf42b8c93759','ko vua dau','okbaby','4','RM',0.00000,'7623345646','1',NULL,NULL,NULL,NULL,NULL,'2015-01-30 14:46:33','2015-02-16 11:05:08'),(19,'cappuccino1','fcea920f7412b5da7be0cf42b8c93759','buon 5s','cappuccino','4','RM',41.00000,'9877875433','1',NULL,NULL,NULL,NULL,NULL,'2015-01-23 15:15:59','2015-02-16 11:05:08'),(20,'cappuccino2','fcea920f7412b5da7be0cf42b8c93759','buon 15s','cappuccino','4','RM',75.00000,'9877875433','1',NULL,NULL,NULL,NULL,NULL,'2015-02-03 15:15:54','2015-02-16 11:05:08'),(21,'cappuccno3','fcea920f7412b5da7be0cf42b8c93759','buon 15s','cappuccino','4','RM',75.00000,'9877875433','1',NULL,NULL,NULL,NULL,NULL,'2015-02-17 15:15:55','2015-02-16 11:05:08'),(22,'cappuccino4','fcea920f7412b5da7be0cf42b8c93759','buon 15s','cappuccino','4','RM',75.00000,'9877875433','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 15:15:56','2015-02-16 11:05:08'),(23,'cappuccino5','fcea920f7412b5da7be0cf42b8c93759','buon 15s','cappuccino','4','RM',75.00000,'9877875433','1',NULL,NULL,NULL,NULL,NULL,'2015-02-04 15:15:56','2015-02-16 11:05:08'),(24,'saha','fcea920f7412b5da7be0cf42b8c93759','xahaxx',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:39','2015-02-16 11:05:08'),(25,'luis','fcea920f7412b5da7be0cf42b8c93759','lui buoc',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:39','2015-02-16 11:05:08'),(26,'auto','fcea920f7412b5da7be0cf42b8c93759','automatic',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 16:54:02','2015-02-16 11:05:08'),(27,'zoro','fcea920f7412b5da7be0cf42b8c93759','zoro',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:39','2015-02-16 11:05:08'),(28,'kaka','fcea920f7412b5da7be0cf42b8c93759','kaka',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:39','2015-02-16 11:05:08'),(29,'fish','fcea920f7412b5da7be0cf42b8c93759','ca bien',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:39','2015-02-16 11:05:08'),(30,'omo','fcea920f7412b5da7be0cf42b8c93759','o mo',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:39','2015-02-16 11:05:08'),(31,'bla','fcea920f7412b5da7be0cf42b8c93759','bla',NULL,'3','RM',23.00000,'0987654321','1',NULL,NULL,NULL,NULL,NULL,'2015-02-16 14:46:39','2015-02-16 11:05:08'),(32,'bolo','fcea920f7412b5da7be0cf42b8c93759','bolo',NULL,'3','RM',23.00000,'0987654321','1','1','acc','',NULL,NULL,'2015-02-16 14:46:39','2015-02-26 14:30:07'),(33,'xakutara','fcea920f7412b5da7be0cf42b8c93759','pa ku ru',NULL,'3','RM',20.00000,'1234543212','1','1','good','good',NULL,NULL,'2015-02-16 18:30:12','2015-02-25 17:23:01'),(34,'huyyyyyy','25f9e794323b453885f5181f1b624d0b','okbede',NULL,'3','$',300.00000,'8232013','1','1','chet het di','chet het di',NULL,NULL,'2015-02-17 14:46:18','2015-02-26 17:31:53'),(35,'nghiatest','fcea920f7412b5da7be0cf42b8c93759','nghia test','xuka','4','RM',180.00000,'0989098909898','1',NULL,'nghia test remark',NULL,NULL,'2015-02-27 23:59:59','2015-02-25 18:09:10',NULL),(36,'subadmin','fcea920f7412b5da7be0cf42b8c93759','cua admin','admin','3','$',123.00000,'1234567890','0','0','note 1','note 1',NULL,NULL,'2015-02-26 14:59:24','2015-02-26 16:32:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
