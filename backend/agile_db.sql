/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.37-MariaDB : Database - agile_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`agile_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `agile_db`;

/*Table structure for table `tbl_agile` */

DROP TABLE IF EXISTS `tbl_agile`;

CREATE TABLE `tbl_agile` (
  `agile_id` tinyint(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1: Values | 2: Principles',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`agile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_agile` */

insert  into `tbl_agile`(`agile_id`,`title`,`description`,`type`,`removed`,`date_created`,`date_updated`) values (1,'Individuals and interactions over processes and tools','This value of the Agile manifesto focuses on giving importance to communication with the clients. There are several things a client may want to ask and it is the responsibility of the team members to ensure that all questions and suggestions of the clients are promptly dealt with.',1,0,'2021-10-05 15:22:46','2021-10-05 15:22:46'),(2,'Customer satisfaction through continuous delivery of the product','In the case of traditional management methodologies, customers get to see the product only after completion and when several tests and quality checks have been performed. This not only keeps the customers in dark but also makes it problematic for the team members to introduce any changes in the product.\n\nIn order to keep the customers happy, it’s important to continuously engage them with a working version of the product. Show small increments every sprint planning and make changes as required.',2,0,'2021-10-05 15:23:23','2021-10-05 15:23:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
