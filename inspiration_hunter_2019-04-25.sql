# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.38)
# Database: inspiration_hunter
# Generation Time: 2019-05-22 17:16:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `official` tinyint(1) DEFAULT NULL,
  `date_made` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;

INSERT INTO `friends` (`id`, `user_one`, `user_two`, `official`, `date_made`)
VALUES
	(1,2,16,1,'2019-05-05'),
	(2,4,16,1,'2019-05-05'),
	(6,17,18,1,'2019-05-09'),
	(7,17,19,0,'2019-05-09'),
	(8,18,19,0,'2019-05-09'),
	(9,16,19,0,'2019-05-09'),
	(11,19,20,1,'2019-05-15'),
	(12,21,19,1,'2019-05-15'),
	(13,16,22,0,'2019-05-20'),
	(14,17,22,0,'2019-05-20'),
	(15,18,22,0,'2019-05-22');

/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_path` varchar(255) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `user_id`, `img_description`, `date_created`, `file_path`, `longitude`, `latitude`)
VALUES
	(35,20,'Vietnam - Ninh Binh','2019-05-09 11:51:57','59740504_314219309251336_5163639116109185024_n.jpg',0.00000000,0.00000000),
	(36,20,'Ninh binh - rower','2019-05-09 11:52:59','59438771_374318446503692_8438972148017528832_n.jpg',0.00000000,0.00000000),
	(38,20,'test','2019-05-09 12:35:41','59436123_389627524960329_5983074350260027392_n (1).jpg',0.00000000,0.00000000),
	(39,20,'test','2019-05-09 12:35:41','59436123_389627524960329_5983074350260027392_n (1).jpg',0.00000000,0.00000000),
	(40,19,'vietnam - abandoned waterpark','2019-05-14 17:05:22','59419220_1106452802878012_8560270824844558336_n.jpg',0.00000000,0.00000000),
	(41,19,'test','2019-05-15 11:04:55','59740504_314219309251336_5163639116109185024_n.jpg',4.48483890,51.02471810),
	(42,21,'geel buske','2019-05-15 19:36:45','59418928_2244928338932388_6499858176958005248_n.jpg',4.76078700,51.41757050),
	(43,19,'testing','2019-05-16 09:09:04','59740504_314219309251336_5163639116109185024_n.jpg',4.48787700,51.02256940),
	(44,19,'test_','2019-05-16 09:26:31','59436123_389627524960329_5983074350260027392_n.jpg',4.48779410,51.02258560),
	(45,22,'test_','2019-05-16 09:26:31','59436123_389627524960329_5983074350260027392_n.jpg',4.48779410,51.02258560),
	(53,22,'open road','2019-05-20 21:22:31','_04A4475+copia.jpg',0.00000000,0.00000000),
	(55,22,'open road','2019-05-20 21:22:31','_04A4475+copia.jpg',0.00000000,0.00000000),
	(56,22,'test_','2019-05-16 09:26:31','59436123_389627524960329_5983074350260027392_n.jpg',4.48779410,51.02258560),
	(89,22,'totebag','2019-05-22 09:22:09','Totebag_example.jpeg',0.00000000,0.00000000);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table inappropriate
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inappropriate`;

CREATE TABLE `inappropriate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `inappropriate` WRITE;
/*!40000 ALTER TABLE `inappropriate` DISABLE KEYS */;

INSERT INTO `inappropriate` (`id`, `post_id`, `user_id`)
VALUES
	(1,35,19),
	(2,36,19),
	(3,45,22);

/*!40000 ALTER TABLE `inappropriate` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `date_created`)
VALUES
	(20,36,19,'2019-05-16 09:33:16'),
	(24,35,19,'2019-05-16 11:01:35');

/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`)
VALUES
	(16,'test','test','test','test@test.com','$2y$10$8gSNoiBii3xCUnD6u8Z2IOTAlCDscjXcjwEyTq0yvptZGXlLMqDwa'),
	(17,'Noortje','Veenhuizen','Noorse','noortjeveenhuizen@hotmail.com','$2y$10$VEzHdhroQjTQ7HnC4OKiJuNPDDstvzkZVxEQCXl1sybhG2E57fgB2'),
	(18,'Sarah','Van den Heuvel','Sarahvh','sarahvandenheuvel@hotmail.com','$2y$10$bcEt632FKpDDdElcSI4jKO/V/BRozHIsLMfPi2ZRehcE9Il7mmwpa'),
	(19,'Mathias','Geerts','Mathias','geertsmathias@gmail.com','$2y$10$mUr76mHgvwj5fs.19r2CheFBXfQhXU5hRftICziGy7DAWDcxCjqiK'),
	(20,'Raf','Snijders','Rafke','raf@gmail.com','$2y$10$oD0F/EXqAJSGnuNlAq5Z6.kM6e9sq1i85IeRBSS/9cQPGVzBs3P92'),
	(21,'Caroline','Sterkens','Caroline','sterkens@gmail.com','$2y$10$WSc5ZoP3Fp5ooETZEAgwvuNUK7oxyAZbwcjUr9tKzYzYnYPaHuE1.'),
	(22,'lisse','thys','lisse','lisse.thys@hotmail.com','$2y$10$kzOoxFXYHOaGQ5/gt0ecTuIR/vfaOf.tAGwWreJXDtg2q1qBHuaGm'),
	(23,'test','test','test','t@test.com','$2y$10$C9n9o.Nw3J29swv44c/Rgek3CqBAUqVZHIEw8eUPAwT/ZhX3GvF7e');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
