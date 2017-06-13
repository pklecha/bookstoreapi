# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: bookstoreapi
# Generation Time: 2017-06-13 07:19:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` text,
  `isbn` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;

INSERT INTO `book` (`id`, `title`, `author`, `description`, `isbn`)
VALUES
	(1,'Book1','Author1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur culpa delectus deserunt ducimus esse est, excepturi facilis natus non quasi qui quia, quod ratione recusandae rerum temporibus vel voluptatum?','01234567890'),
	(2,'Book2','Author2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur culpa delectus deserunt ducimus esse est, excepturi facilis natus non quasi qui quia, quod ratione recusandae rerum temporibus vel voluptatum?','12345678901'),
	(3,'Book3','Author3','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur culpa delectus deserunt ducimus esse est, excepturi facilis natus non quasi qui quia, quod ratione recusandae rerum temporibus vel voluptatum?','23456789012'),
	(4,'Book4','Author4','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur culpa delectus deserunt ducimus esse est, excepturi facilis natus non quasi qui quia, quod ratione recusandae rerum temporibus vel voluptatum?','34567890123'),
	(5,'Book5','Author5','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur culpa delectus deserunt ducimus esse est, excepturi facilis natus non quasi qui quia, quod ratione recusandae rerum temporibus vel voluptatum?','45678901234'),
	(6,'Book6','Author6','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur culpa delectus deserunt ducimus esse est, excepturi facilis natus non quasi qui quia, quod ratione recusandae rerum temporibus vel voluptatum?','56789012345'),
	(7,'Book7','Author7','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto consequuntur culpa delectus deserunt ducimus esse est, excepturi facilis natus non quasi qui quia, quod ratione recusandae rerum temporibus vel voluptatum?','67890123456');

/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
