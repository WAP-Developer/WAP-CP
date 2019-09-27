-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for jbi
CREATE DATABASE IF NOT EXISTS `jbi` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `jbi`;

-- Dumping structure for table jbi.wb_achievement
CREATE TABLE IF NOT EXISTS `wb_achievement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `achievement` varchar(128) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_admin
CREATE TABLE IF NOT EXISTS `wb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_album
CREATE TABLE IF NOT EXISTS `wb_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` varchar(128) NOT NULL,
  `slug` text NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_album_foto
CREATE TABLE IF NOT EXISTS `wb_album_foto` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `title_photo` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_employe
CREATE TABLE IF NOT EXISTS `wb_employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `front_name` varchar(50) DEFAULT '',
  `end_name` varchar(50) DEFAULT '',
  `position` varchar(128) DEFAULT '',
  `photo` varchar(128) DEFAULT '',
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_menu
CREATE TABLE IF NOT EXISTS `wb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  `icon` text NOT NULL,
  `url` text NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_menu_akses
CREATE TABLE IF NOT EXISTS `wb_menu_akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_message
CREATE TABLE IF NOT EXISTS `wb_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(128) DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_role
CREATE TABLE IF NOT EXISTS `wb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `create_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_seo
CREATE TABLE IF NOT EXISTS `wb_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `meta` text NOT NULL,
  `crawl_landing` int(2) NOT NULL,
  `follow_landing` int(2) NOT NULL,
  `crawl_admin` int(2) NOT NULL,
  `follow_admin` int(2) NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table jbi.wb_sub_menu
CREATE TABLE IF NOT EXISTS `wb_sub_menu` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(5) NOT NULL,
  `sub_menu` varchar(128) NOT NULL,
  `sub_url` text NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
