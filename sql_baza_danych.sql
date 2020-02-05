# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: us-cdbr-iron-east-04.cleardb.net (MySQL 5.5.56-log)
# Database: heroku_08d8a5059303a4c
# Generation Time: 2020-02-05 18:17:54 +0000
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
  `id_book` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `price` decimal(5,2) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `realise_data` date NOT NULL,
  `isbn_number` varchar(13) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `cover_type` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `publisher` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT '',
  `img_link` varchar(300) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;

INSERT INTO `book` (`id_book`, `title`, `price`, `description`, `author`, `realise_data`, `isbn_number`, `cover_type`, `publisher`, `img_link`)
VALUES
	(1,'Cesarzowa wdowa Cixi. Konkubina, która stworzyła współczesne Chiny',69.59,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Jung Chang','2015-07-25','9788324027224','twarda','Znak','https://i.ibb.co/bHsF5gy/cixi.jpg'),
	(2,'Kolej podziemna. Czarna krew Ameryki',40.00,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Colson Whitehead','2017-06-14','9788324027223','twarda','Albatros','https://i.ibb.co/LCJ6hWw/kolej.jpg'),
	(3,'Śledztwo',60.00,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Stanisław Lem','2016-08-08','9788308061817','miękka','Wydawnictwo Literackie','https://i.ibb.co/th6jXZ9/sledztwo.jpg'),
	(4,'Kapitalizm. Historia krótkiego trwania',69.99,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Kacper Pobłocki','2017-07-31','9788362418787','miękka','Fundacja Bęc Zmiana','https://i.ibb.co/TWBc1pc/kapitalizm.jpg'),
	(5,'Nieznane więzi natury',42.71,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Peter Wohlleben','2017-11-08','9788375154757','twarda','Otwarte','https://i.ibb.co/wwNvXcZ/nieznane.jpg'),
	(6,'Obcy',25.99,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Albert Camus','2013-01-01','9373893474','miękka','Zielona Sowa','https://i.ibb.co/vYS6M6H/obcy.jpg'),
	(7,'Nadchodzi osobliwość. Kiedy człowiek przekroczy granice biologii',70.00,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Ray Kurzweil','2013-01-01','9788363993061','miękka','Kurhaus Publishing Kurhaus Media','https://i.ibb.co/3hMhF5d/nadchodzi.jpg'),
	(8,'Mao: The Unknown Story',149.90,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Jung Chang, Jon Halliday','2006-11-14','0679463232','twarda','Anchor Books','https://i.ibb.co/CnNtPm2/mao.jpg'),
	(9,'Lost Enlightenment: Central Asia\'s Golden Age from the Arab Conquest to Tamerlane ',239.90,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','S. Frederick Starr','2013-10-13','9780691157733','twarda','Princeton Univercity Press','https://i.ibb.co/BLjGFhp/enlightment.jpg');

/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_product`;

CREATE TABLE `order_product` (
  `order_product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`order_product_id`),
  KEY `user_order_id` (`user_order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`user_order_id`) REFERENCES `user_order` (`user_order_id`),
  CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `book` (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;

INSERT INTO `order_product` (`order_product_id`, `user_order_id`, `product_id`, `quantity`)
VALUES
	(41,39,4,2),
	(42,39,3,2),
	(43,40,2,1),
	(52,42,2,2),
	(62,52,2,1),
	(72,52,5,1);

/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_number` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id_number`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id_number`, `login`, `usr_password`, `email`)
VALUES
	(2,'gosc','$2y$10$JdpjlowU2E9tdlNHniqq3OZZh3LrXHg1NqAw7niqF3zrznJSlLjei','krzyszto@wp.pl'),
	(3,'gosc2','$2y$10$/YMHUi1itFZf0ZfrjuyQ2.aqZzT7ylUv0YqSTyW/oV9YyxEPG.CGK','krzyszto@wp.pl'),
	(4,'gosc3','$2y$10$YFKpTlXoVbGWJ0M.Okt6xeH0EauRNNjc74AprtuYXeG8NOpsGUOGK','kacper@op.pl'),
	(12,'gosc6','$2y$10$xlLgzEwTAgybxRi13XFRxuiI0MofsE92R1EzuAslDkr0qn04NPbey','email.goscia@gmail.cm'),
	(13,'admin','login_not_allowed','login_not_allowed');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_admin`;

CREATE TABLE `user_admin` (
  `id_number` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_login` varchar(30) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_number`),
  UNIQUE KEY `admin_login` (`admin_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `user_admin` WRITE;
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;

INSERT INTO `user_admin` (`id_number`, `admin_login`, `admin_password`)
VALUES
	(1,'admin','$2y$10$3DE1DnMYpoiH.jOt/NYJpOIQVaQD1iHcbem3/HKfWyU9z0wJrqUeK');

/*!40000 ALTER TABLE `user_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_order`;

CREATE TABLE `user_order` (
  `user_order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `order_time` varchar(30) NOT NULL,
  PRIMARY KEY (`user_order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_number`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

LOCK TABLES `user_order` WRITE;
/*!40000 ALTER TABLE `user_order` DISABLE KEYS */;

INSERT INTO `user_order` (`user_order_id`, `user_id`, `telephone`, `address`, `order_time`)
VALUES
	(39,3,'898777666','Katarzyna Małecka; Mała 12/898; Kalisz 33-445','01/31/2020 07:53:13 pm'),
	(40,3,'909555666','Kacper Pułaski; Zaolzianska 45/12; Wrocław 50-123','01/31/2020 08:04:47 pm'),
	(42,3,'657666454','Mieczsław Malinowski; Wielka 23/2 piętro; Karpacz 43-555','02/02/2020 07:28:29 pm'),
	(52,3,'567555444','Agnieszka Kowalska; Kazimierza Wielkiego 2/-; Suwałki 22-333','02/05/2020 06:11:30 pm');

/*!40000 ALTER TABLE `user_order` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
