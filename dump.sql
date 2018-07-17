-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour project
DROP DATABASE IF EXISTS `project`;
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `project`;

-- Export de la structure de la table project. categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table project.categories : ~0 rows (environ)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Export de la structure de la table project. comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table project.comments : ~0 rows (environ)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Export de la structure de la table project. config
DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `value` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Export de données de la table project.config : ~0 rows (environ)
DELETE FROM `config`;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `name`, `value`) VALUES
	(1, 'config', 'a:14:{s:2:"id";s:1:"1";s:5:"title";s:6:"Devlie";s:11:"slideScroll";s:1:"1";s:11:"slideVisibl";s:1:"1";s:6:"secret";s:40:"6LfjWzkUAAAAAE3E-mN2XHc5YoAgKGhoIh0pJPVH";s:4:"site";s:40:"6LfjWzkUAAAAAIDc0Km-TgTE7rEKFVt0orQmTlRk";s:5:"cache";s:6:"60 * 1";s:16:"name_maintenance";s:7:"DevLife";s:7:"created";s:10:"2018-07-18";s:7:"default";s:5:"posts";s:11:"maintenance";s:1:"0";s:3:"tmp";s:7:"default";s:7:"content";s:64:"Nous somme en maintenance pour effectuer une mise a jour du site";s:3:"img";s:15:"maintenance.jpg";}');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Export de la structure de la table project. posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `online` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table project.posts : ~0 rows (environ)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Export de la structure de la table project. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(12) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `rang` int(11) DEFAULT '2',
  `created` varchar(50) DEFAULT NULL,
  `updated` varchar(50) DEFAULT NULL,
  `last_visit` varchar(50) DEFAULT NULL,
  `post` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Export de données de la table project.users : ~1 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `pseudo`, `password`, `email`, `avatar`, `rang`, `created`, `updated`, `last_visit`, `post`) VALUES
	(2, 'admin', '$2y$10$Y.OxQAJIOvJ9wJW2KLTRCOQR8C5EGcalrcPpUBazB1MgYQ7Fr3tzS', 'contact@admin.com', NULL, 5, '2018-07-16 22:44:12', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Export de la structure de la table project. users_online
DROP TABLE IF EXISTS `users_online`;
CREATE TABLE IF NOT EXISTS `users_online` (
  `online_id` int(11) NOT NULL,
  `online_time` int(11) NOT NULL,
  `online_ip` int(15) NOT NULL,
  PRIMARY KEY (`online_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Export de données de la table project.users_online : 0 rows
DELETE FROM `users_online`;
/*!40000 ALTER TABLE `users_online` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_online` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
