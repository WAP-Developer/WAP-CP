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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_achievement: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_achievement` DISABLE KEYS */;
INSERT INTO `wb_achievement` (`id`, `achievement`, `description`, `photo`, `update_at`) VALUES
	(4, 'Website Awards', 'Diraih Tadi', 'achievement1569606323.png', '2019-09-27');
/*!40000 ALTER TABLE `wb_achievement` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_admin
CREATE TABLE IF NOT EXISTS `wb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_admin` DISABLE KEYS */;
INSERT INTO `wb_admin` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `update_at`) VALUES
	(1, 'Administrator', 'aldiwap@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-09-10', '2019-09-10');
/*!40000 ALTER TABLE `wb_admin` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_album
CREATE TABLE IF NOT EXISTS `wb_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` varchar(128) NOT NULL,
  `slug` text NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_album: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_album` DISABLE KEYS */;
INSERT INTO `wb_album` (`id`, `album`, `slug`, `update_at`) VALUES
	(7, 'Jalan-Jalan', 'jalan-jalan.html', '2019-09-27');
/*!40000 ALTER TABLE `wb_album` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_album_foto
CREATE TABLE IF NOT EXISTS `wb_album_foto` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `title_photo` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id_photo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_album_foto: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_album_foto` DISABLE KEYS */;
INSERT INTO `wb_album_foto` (`id_photo`, `album_id`, `title_photo`, `photo`, `update_at`) VALUES
	(9, 7, 'Yani', 'foto1569607265.jpg', '2019-09-27');
/*!40000 ALTER TABLE `wb_album_foto` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_employe
CREATE TABLE IF NOT EXISTS `wb_employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `front_name` varchar(50) DEFAULT '',
  `end_name` varchar(50) DEFAULT '',
  `position` varchar(128) DEFAULT '',
  `photo` varchar(128) DEFAULT '',
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_employe: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_employe` DISABLE KEYS */;
INSERT INTO `wb_employe` (`id`, `front_name`, `end_name`, `position`, `photo`, `update_at`) VALUES
	(6, 'Aldi', 'Wiguna', 'UX Designer', 'employe1569606920.jpg', '2019-09-27');
/*!40000 ALTER TABLE `wb_employe` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_group
CREATE TABLE IF NOT EXISTS `wb_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(128) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_group: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_group` DISABLE KEYS */;
INSERT INTO `wb_group` (`id`, `company`, `link`, `description`, `photo`, `update_at`) VALUES
	(1, 'Twitter, Inc.', 'http://twitter.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et justo vitae enim laoreet vestibulum eget id felis. Proin pellentesque tellus at ornare faucibus. Proin ultricies velit sit amet ipsum efficitur consequat. Donec sem ante, venenatis vel sapien non, bibendum laoreet mi. Ut quis felis quam. Duis sit amet rhoncus mi. ', 'group1569827702.png', '2019-09-30');
/*!40000 ALTER TABLE `wb_group` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_history
CREATE TABLE IF NOT EXISTS `wb_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(5) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `content` varchar(128) NOT NULL DEFAULT '0',
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_history: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_history` DISABLE KEYS */;
INSERT INTO `wb_history` (`id`, `year`, `history`, `content`, `update_at`) VALUES
	(3, '1996', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, facilis quo maiores magnam modi ab libero praesentium blanditiis. ', 'timeline-content', '2019-09-30');
/*!40000 ALTER TABLE `wb_history` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_menu
CREATE TABLE IF NOT EXISTS `wb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  `icon` text NOT NULL,
  `url` text NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `wb_menu` DISABLE KEYS */;
INSERT INTO `wb_menu` (`id`, `menu`, `icon`, `url`, `update_at`) VALUES
	(12, 'Dashboard', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n								<polygon id="Bound" points="0 0 24 0 24 24 0 24" />\r\n								<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />\r\n								<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />\r\n							</g>\r\n						</svg>', 'cp-admin/dashboard', '2019-09-27'),
	(13, 'Berita', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n        <rect id="bound" x="0" y="0" width="24" height="24"/>\r\n        <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" id="Combined-Shape" fill="#000000"/>\r\n        <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" id="Path-41-Copy" fill="#000000" opacity="0.3"/>\r\n    </g>\r\n</svg>', '#', '2019-09-30'),
	(14, 'Profile', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n								<rect id="bound" x="0" y="0" width="24" height="24" />\r\n								<path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" id="Combined-Shape" fill="#000000" />\r\n								<rect id="Rectangle-Copy-2" fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1" />\r\n								<path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" id="Rectangle-2" fill="#000000" opacity="0.3" />\r\n							</g>\r\n						</svg>', '#', '2019-09-27'),
	(15, 'Lowongan Pekerjaan', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n								<rect id="bound" opacity="0.300000012" x="0" y="0" width="24" height="24" />\r\n								<polygon id="Path-90" fill="#000000" fill-rule="nonzero" opacity="0.3" points="7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684" />\r\n								<path d="M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z" id="Combined-Shape" fill="#000000" />\r\n							</g>\r\n						</svg>', '#', '2019-09-27'),
	(16, 'Galeri', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n								<rect id="bound" x="0" y="0" width="24" height="24" />\r\n								<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" id="Combined-Shape" fill="#000000" />\r\n								<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />\r\n							</g>\r\n						</svg>', 'cp-admin/gallery', '2019-09-27'),
	(17, 'SEO Manajemen', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n								<rect id="bound" x="0" y="0" width="24" height="24" />\r\n								<path d="M10.8226874,8.36941377 L12.7324324,9.82298668 C13.4112512,8.93113547 14.4592942,8.4 15.6,8.4 C17.5882251,8.4 19.2,10.0117749 19.2,12 C19.2,13.9882251 17.5882251,15.6 15.6,15.6 C14.5814697,15.6 13.6363389,15.1780547 12.9574041,14.4447676 L11.1963369,16.075302 C12.2923051,17.2590082 13.8596186,18 15.6,18 C18.9137085,18 21.6,15.3137085 21.6,12 C21.6,8.6862915 18.9137085,6 15.6,6 C13.6507856,6 11.9186648,6.9294879 10.8226874,8.36941377 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />\r\n								<path d="M8.4,18 C5.0862915,18 2.4,15.3137085 2.4,12 C2.4,8.6862915 5.0862915,6 8.4,6 C11.7137085,6 14.4,8.6862915 14.4,12 C14.4,15.3137085 11.7137085,18 8.4,18 Z" id="Oval-14-Copy" fill="#000000" />\r\n							</g>\r\n						</svg>', 'cp-admin/seo-management', '2019-09-27'),
	(20, 'Role Manajemen', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n								<polygon id="Shape" points="0 0 24 0 24 24 0 24" />\r\n								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3" />\r\n								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero" />\r\n							</g>\r\n						</svg>', 'cp-admin/role-management', '2019-09-27'),
	(21, 'Menu Manajemen', '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">\r\n							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\r\n								<rect id="bound" x="0" y="0" width="24" height="24" />\r\n								<path d="M18,16 L9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L17,14 C17.5522847,14 18,13.5522847 18,13 C18,12.4477153 17.5522847,12 17,12 L9,12 C7.34314575,12 6,13.3431458 6,15 C6,16.6568542 7.34314575,18 9,18 L19.5,18 C21,18 21,18.5 21,19 C21,19.5 21,20 19.5,20 L7,20 C4.790861,20 3,18.209139 3,16 L3,8 C3,5.790861 4.790861,4 7,4 L17,4 C19.209139,4 21,5.790861 21,8 L21,13.0000005 C21,14.6568542 19.6568542,16 18,16 Z" id="Combined-Shape" fill="#000000" />\r\n							</g>\r\n						</svg>', 'cp-admin/menu-management', '2019-09-27');
/*!40000 ALTER TABLE `wb_menu` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_menu_akses
CREATE TABLE IF NOT EXISTS `wb_menu_akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id_akses`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_menu_akses: ~8 rows (approximately)
/*!40000 ALTER TABLE `wb_menu_akses` DISABLE KEYS */;
INSERT INTO `wb_menu_akses` (`id_akses`, `menu_id`, `role_id`) VALUES
	(22, 12, 1),
	(23, 13, 1),
	(24, 14, 1),
	(25, 15, 1),
	(26, 16, 1),
	(27, 17, 1),
	(28, 20, 1),
	(29, 21, 1);
/*!40000 ALTER TABLE `wb_menu_akses` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_message
CREATE TABLE IF NOT EXISTS `wb_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `president` varchar(128) DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_message: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_message` DISABLE KEYS */;
INSERT INTO `wb_message` (`id`, `message`, `president`, `photo`, `update_at`) VALUES
	(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus eros vitae risus varius, vel luctus magna pulvinar. In ante nulla, tempor eu metus at, mattis commodo justo. Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id, mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis, diam et laoreet sodales, ligula purus porttitor eros, ut interdum nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc posuere interdum dictum. Integer massa urna, condimentum at maximus eu, luctus non mauris.', 'Naoki Sakashita', 'president1569806434.png', '2019-10-01');
/*!40000 ALTER TABLE `wb_message` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_news
CREATE TABLE IF NOT EXISTS `wb_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `news` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_news: ~2 rows (approximately)
/*!40000 ALTER TABLE `wb_news` DISABLE KEYS */;
INSERT INTO `wb_news` (`id`, `admin_id`, `title`, `news`, `photo`, `slug`, `update_at`) VALUES
	(12, 1, 'Suspendisse feugiat convallis sapien hendrerit efficitur', '\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur\r\n pellentesque condimentum. Aenean vehicula feugiat ultricies. In \r\nscelerisque et sapien sed rhoncus. Aliquam pulvinar massa ac libero \r\negestas, ac cursus tellus molestie. Vivamus scelerisque ante lobortis \r\ntellus gravida posuere. Integer vulputate sollicitudin erat eget \r\npharetra. Maecenas fermentum ex ante. Aenean a turpis neque. Duis \r\ntincidunt elit vel accumsan vulputate. Suspendisse varius, diam sed \r\nvehicula iaculis, diam arcu porta ligula, eget vehicula nisl purus eu \r\nnibh. Nullam et arcu malesuada, egestas ante in, hendrerit enim. Cras \r\nullamcorper augue sed dui efficitur, non eleifend orci porttitor.\r\n</p>\r\n<p>\r\nSed interdum lectus vitae libero imperdiet molestie. Vestibulum iaculis \r\ntincidunt pretium. Vestibulum fringilla vulputate scelerisque. Duis \r\nconsectetur turpis sed sapien eleifend tristique nec vel augue. Proin et\r\n tortor vitae est luctus aliquam iaculis quis nulla. Nullam blandit \r\nscelerisque eros, a mattis est. Suspendisse est orci, feugiat nec tellus\r\n dapibus, sodales pharetra libero. Ut rutrum felis non nisi convallis, \r\nlaoreet suscipit risus suscipit. Suspendisse potenti. Vestibulum \r\nullamcorper tortor ligula. Mauris malesuada felis nibh, a congue mi \r\nmaximus eu. Maecenas vulputate ligula massa, vel consequat mauris \r\nultricies vel.\r\n</p>\r\n<p>\r\nDonec at scelerisque justo. Interdum et malesuada fames ac ante ipsum \r\nprimis in faucibus. Nam a dui tellus. Donec consequat mollis mattis. \r\nEtiam sit amet elit hendrerit, mattis turpis a, semper augue. Duis \r\nmattis vehicula dignissim. Sed scelerisque interdum ipsum, vel euismod \r\nante condimentum id. Ut et tempus nisl. Fusce fermentum magna ac odio \r\ninterdum sagittis. Aliquam non odio augue. Morbi id eros pretium, \r\ntincidunt nibh ac, tempus nisi. Curabitur mattis pharetra est ut \r\nlacinia. In non justo a erat efficitur eleifend semper id justo. In \r\nvenenatis non urna id ultricies. Phasellus orci augue, dignissim et erat\r\n eu, auctor tincidunt nibh.\r\n</p>\r\n<p>\r\nPhasellus non molestie metus. Cras et enim ligula. Fusce blandit sapien \r\nmassa. Donec mattis ligula quis lacus congue, vitae semper tellus \r\nlaoreet. Etiam pretium, libero at mollis maximus, urna nulla posuere \r\nmauris, aliquet auctor mi sem accumsan metus. Nunc vel libero vel est \r\nplacerat volutpat at auctor lorem. Integer pulvinar quis dui eu \r\nmolestie. Vestibulum non orci volutpat, bibendum enim vel, ornare felis.\r\n Vivamus vitae lacinia sem. Vivamus lectus nibh, egestas ut diam sed, \r\nluctus malesuada libero. Fusce tempor ac purus id suscipit. Curabitur \r\nfacilisis ullamcorper elit, sed molestie elit molestie vel. Pellentesque\r\n bibendum lorem in nisi varius accumsan.\r\n</p>\r\n<p>\r\nEtiam pharetra, dolor ut pharetra porttitor, diam lorem molestie neque, a\r\n faucibus libero risus sed neque. Donec lacinia augue faucibus enim \r\nfacilisis suscipit. Nunc aliquam rutrum nisi, ut consectetur nunc mollis\r\n sed. Duis mattis auctor tincidunt. Duis tempor posuere dui, vitae \r\nultrices nibh dignissim vel. Integer posuere efficitur mollis. Aliquam \r\nerat volutpat. Morbi sagittis venenatis augue nec hendrerit. Suspendisse\r\n viverra ullamcorper turpis, id finibus lectus ullamcorper ac. Curabitur\r\n ac aliquet sapien. Nullam quis diam placerat, posuere magna vitae, \r\npharetra metus. Vivamus non lorem fermentum, imperdiet massa eget, \r\nmolestie libero. Praesent quis tempus urna. Duis mattis viverra cursus. \r\nAenean cursus erat non nisi viverra, convallis fringilla velit viverra. \r\nSed sit amet turpis non ante laoreet sagittis ut ut urna.\r\n</p>', 'news1569902289.jpg', 'suspendisse-feugiat-convallis-sapien-hendrerit-efficitur.html', '2019-10-01'),
	(13, 1, 'Suspendisse feugiat convallis sapien hendrerit efficitur', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur\r\n pellentesque condimentum. Aenean vehicula feugiat ultricies. In \r\nscelerisque et sapien sed rhoncus. Aliquam pulvinar massa ac libero \r\negestas, ac cursus tellus molestie. Vivamus scelerisque ante lobortis \r\ntellus gravida posuere. Integer vulputate sollicitudin erat eget \r\npharetra. Maecenas fermentum ex ante. Aenean a turpis neque. Duis \r\ntincidunt elit vel accumsan vulputate. Suspendisse varius, diam sed \r\nvehicula iaculis, diam arcu porta ligula, eget vehicula nisl purus eu \r\nnibh. Nullam et arcu malesuada, egestas ante in, hendrerit enim. Cras \r\nullamcorper augue sed dui efficitur, non eleifend orci porttitor.\r\n</p>\r\n<p>\r\nSed interdum lectus vitae libero imperdiet molestie. Vestibulum iaculis \r\ntincidunt pretium. Vestibulum fringilla vulputate scelerisque. Duis \r\nconsectetur turpis sed sapien eleifend tristique nec vel augue. Proin et\r\n tortor vitae est luctus aliquam iaculis quis nulla. Nullam blandit \r\nscelerisque eros, a mattis est. Suspendisse est orci, feugiat nec tellus\r\n dapibus, sodales pharetra libero. Ut rutrum felis non nisi convallis, \r\nlaoreet suscipit risus suscipit. Suspendisse potenti. Vestibulum \r\nullamcorper tortor ligula. Mauris malesuada felis nibh, a congue mi \r\nmaximus eu. Maecenas vulputate ligula massa, vel consequat mauris \r\nultricies vel.\r\n</p>\r\n<p>\r\nDonec at scelerisque justo. Interdum et malesuada fames ac ante ipsum \r\nprimis in faucibus. Nam a dui tellus. Donec consequat mollis mattis. \r\nEtiam sit amet elit hendrerit, mattis turpis a, semper augue. Duis \r\nmattis vehicula dignissim. Sed scelerisque interdum ipsum, vel euismod \r\nante condimentum id. Ut et tempus nisl. Fusce fermentum magna ac odio \r\ninterdum sagittis. Aliquam non odio augue. Morbi id eros pretium, \r\ntincidunt nibh ac, tempus nisi. Curabitur mattis pharetra est ut \r\nlacinia. In non justo a erat efficitur eleifend semper id justo. In \r\nvenenatis non urna id ultricies. Phasellus orci augue, dignissim et erat\r\n eu, auctor tincidunt nibh.\r\n</p>\r\n<p>\r\nPhasellus non molestie metus. Cras et enim ligula. Fusce blandit sapien \r\nmassa. Donec mattis ligula quis lacus congue, vitae semper tellus \r\nlaoreet. Etiam pretium, libero at mollis maximus, urna nulla posuere \r\nmauris, aliquet auctor mi sem accumsan metus. Nunc vel libero vel est \r\nplacerat volutpat at auctor lorem. Integer pulvinar quis dui eu \r\nmolestie. Vestibulum non orci volutpat, bibendum enim vel, ornare felis.\r\n Vivamus vitae lacinia sem. Vivamus lectus nibh, egestas ut diam sed, \r\nluctus malesuada libero. Fusce tempor ac purus id suscipit. Curabitur \r\nfacilisis ullamcorper elit, sed molestie elit molestie vel. Pellentesque\r\n bibendum lorem in nisi varius accumsan.\r\n</p>\r\n<p>\r\nEtiam pharetra, dolor ut pharetra porttitor, diam lorem molestie neque, a\r\n faucibus libero risus sed neque. Donec lacinia augue faucibus enim \r\nfacilisis suscipit. Nunc aliquam rutrum nisi, ut consectetur nunc mollis\r\n sed. Duis mattis auctor tincidunt. Duis tempor posuere dui, vitae \r\nultrices nibh dignissim vel. Integer posuere efficitur mollis. Aliquam \r\nerat volutpat. Morbi sagittis venenatis augue nec hendrerit. Suspendisse\r\n viverra ullamcorper turpis, id finibus lectus ullamcorper ac. Curabitur\r\n ac aliquet sapien. Nullam quis diam placerat, posuere magna vitae, \r\npharetra metus. Vivamus non lorem fermentum, imperdiet massa eget, \r\nmolestie libero. Praesent quis tempus urna. Duis mattis viverra cursus. \r\nAenean cursus erat non nisi viverra, convallis fringilla velit viverra. \r\nSed sit amet turpis non ante laoreet sagittis ut ut urna.\r\n</p>', 'news1569917936.jpg', 'suspendisse-feugiat-convallis-sapien-hendrerit-efficitur.html', '2019-10-01');
/*!40000 ALTER TABLE `wb_news` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_role
CREATE TABLE IF NOT EXISTS `wb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `create_at` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `wb_role` DISABLE KEYS */;
INSERT INTO `wb_role` (`id`, `role`, `create_at`) VALUES
	(1, 'Administrator', '2019-09-30'),
	(2, 'Personalia', '2019-09-10');
/*!40000 ALTER TABLE `wb_role` ENABLE KEYS */;

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_seo: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_seo` DISABLE KEYS */;
INSERT INTO `wb_seo` (`id`, `title`, `description`, `meta`, `crawl_landing`, `follow_landing`, `crawl_admin`, `follow_admin`, `update_at`) VALUES
	(1, 'Official Website PT. Jidosha Buhin Indonesia', 'Jibuhin', '', 1, 1, 2, 2, '2019-09-20');
/*!40000 ALTER TABLE `wb_seo` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_sub_menu
CREATE TABLE IF NOT EXISTS `wb_sub_menu` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(5) NOT NULL,
  `sub_menu` varchar(128) NOT NULL,
  `sub_url` text NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id_sub`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_sub_menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `wb_sub_menu` DISABLE KEYS */;
INSERT INTO `wb_sub_menu` (`id_sub`, `menu_id`, `sub_menu`, `sub_url`, `update_at`) VALUES
	(15, 14, 'Pesan Presiden', 'cp-admin/profile/message-president', '2019-09-27'),
	(16, 14, 'Organisasi', 'cp-admin/profile/organization', '2019-09-27'),
	(17, 14, 'Penghargaan', 'cp-admin/profile/achievement', '2019-09-27'),
	(18, 14, 'Sejarah', 'cp-admin/profile/history', '2019-09-30'),
	(19, 14, 'Visi & Misi', 'cp-admin/profile/vm', '2019-09-30'),
	(20, 14, 'Group', 'cp-admin/profile/group', '2019-09-30'),
	(21, 13, 'Semua Berita', 'cp-admin/news/all-news', '2019-09-30'),
	(22, 13, 'Tambah Berita', 'cp-admin/news/add-news', '2019-09-30');
/*!40000 ALTER TABLE `wb_sub_menu` ENABLE KEYS */;

-- Dumping structure for table jbi.wb_vm
CREATE TABLE IF NOT EXISTS `wb_vm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table jbi.wb_vm: ~1 rows (approximately)
/*!40000 ALTER TABLE `wb_vm` DISABLE KEYS */;
INSERT INTO `wb_vm` (`id`, `visi`, `misi`, `update_at`) VALUES
	(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus eros vitae risus varius, vel luctus magna pulvinar. In ante nulla, tempor eu metus at, mattis commodo justo. Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id, mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis, diam et laoreet sodales, ligula purus porttitor eros, ut interdum nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc posuere interdum dictum. Integer massa urna, condimentum at maximus eu, luctus non mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus eros vitae risus varius, vel luctus magna pulvinar. In ante nulla, tempor eu metus at, mattis commodo justo. Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id, mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis, diam et laoreet sodales, ligula purus porttitor eros, ut interdum nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc posuere interdum dictum. Integer massa urna, condimentum at maximus eu, luctus non mauris. ', '2019-09-30');
/*!40000 ALTER TABLE `wb_vm` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
