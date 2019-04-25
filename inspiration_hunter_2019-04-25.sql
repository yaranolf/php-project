# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.23)
# Database: inspiration_hunter
# Generation Time: 2019-04-25 19:29:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
	(2,'Yara','Nolf','yaranolf','yaranolf@telenet.be','$2y$14$MwUThUr5Rk40WRFTTKbHZu3DEHQ9ZfJggDM3kals3p7I8EZp1.A1m'),
	(3,'Yara','Nolf','yaranolf','nolf.yara@telenet.be','$2y$14$sWNeq6w8ddSUTHIIsv3qEuxxCZwzP.ZwZjBIc7wlK37VmkqPYRWhS'),
	(4,'Liese','Vanhecke','liesevanhecke','liesevanhecke@hotmail.com','$2y$14$pewnkOZ6hkTk45qQi.VIduP3QtCJ6XeSTSlWq.41sbvUlsHTZoSlW'),
	(5,'','','','','$2y$14$dU9ftNCPBpetLAhZ7iVUPu2k8sP0hsDxS5TOLscTU6XmZaaxpKmGi'),
	(6,'','','','','$2y$14$Av3naoToJCp0u3sPqUQwS.1SjUITp8asoPj0bNeoQ42GQMNVoo.yG'),
	(7,'Hoi','Hoi','Hoi','Hoi','$2y$14$Ugwf93rvdhvgXrz8M63wBeJ.N3wEtsGtiaxxFyxS5mF9DmOawCBq.'),
	(8,'Annelies','Annelies','jow','hoi','$2y$14$aHgtdWDRLQ2v/Xq7hICJsem1K6VzFOzQZEDpOdAYMwleGLVkD.bUi'),
	(9,'Annelies','Annelies','jow','hoi','$2y$14$8r6vydzlw4710r6NIQKE/OQhlO0UhREmRiqniFlNaNzUNEz2k6fFu');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
