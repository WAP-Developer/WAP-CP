-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2019 at 09:42 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `wb_achievement`
--

CREATE TABLE `wb_achievement` (
  `id` int(11) NOT NULL,
  `achievement` varchar(128) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_achievement`
--

INSERT INTO `wb_achievement` (`id`, `achievement`, `description`, `photo`, `update_at`) VALUES
(4, 'Website Awards', 'Diraih Tadi', 'achievement1569606323.png', '2019-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `wb_admin`
--

CREATE TABLE `wb_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_admin`
--

INSERT INTO `wb_admin` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `update_at`) VALUES
(1, 'Administrator', 'aldiwap@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-09-10', '2019-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `wb_album`
--

CREATE TABLE `wb_album` (
  `id` int(11) NOT NULL,
  `album` varchar(128) NOT NULL,
  `slug` text NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_album`
--

INSERT INTO `wb_album` (`id`, `album`, `slug`, `update_at`) VALUES
(7, 'Jalan-Jalan', 'jalan-jalan.html', '2019-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `wb_album_foto`
--

CREATE TABLE `wb_album_foto` (
  `id_photo` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `title_photo` varchar(128) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_album_foto`
--

INSERT INTO `wb_album_foto` (`id_photo`, `album_id`, `title_photo`, `photo`, `update_at`) VALUES
(9, 7, 'Yani', 'foto1569607265.jpg', '2019-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `wb_departement`
--

CREATE TABLE `wb_departement` (
  `id` int(11) NOT NULL,
  `departement` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_departement`
--

INSERT INTO `wb_departement` (`id`, `departement`, `update_at`) VALUES
(1, 'IT', '2019-10-02'),
(2, 'Accounting', '2019-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `wb_employe`
--

CREATE TABLE `wb_employe` (
  `id` int(11) NOT NULL,
  `front_name` varchar(50) DEFAULT '',
  `end_name` varchar(50) DEFAULT '',
  `position` varchar(128) DEFAULT '',
  `photo` varchar(128) DEFAULT '',
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_employe`
--

INSERT INTO `wb_employe` (`id`, `front_name`, `end_name`, `position`, `photo`, `update_at`) VALUES
(6, 'Aldi', 'Wiguna', 'UX Designer', 'employe1569606920.jpg', '2019-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `wb_group`
--

CREATE TABLE `wb_group` (
  `id` int(11) NOT NULL,
  `company` varchar(128) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_group`
--

INSERT INTO `wb_group` (`id`, `company`, `link`, `description`, `photo`, `update_at`) VALUES
(1, 'Twitter, Inc.', 'http://twitter.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et justo vitae enim laoreet vestibulum eget id felis. Proin pellentesque tellus at ornare faucibus. Proin ultricies velit sit amet ipsum efficitur consequat. Donec sem ante, venenatis vel sapien non, bibendum laoreet mi. Ut quis felis quam. Duis sit amet rhoncus mi. ', 'group1569827702.png', '2019-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `wb_history`
--

CREATE TABLE `wb_history` (
  `id` int(11) NOT NULL,
  `year` varchar(5) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `content` varchar(128) NOT NULL DEFAULT '0',
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_history`
--

INSERT INTO `wb_history` (`id`, `year`, `history`, `content`, `update_at`) VALUES
(3, '1996', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, facilis quo maiores magnam modi ab libero praesentium blanditiis. ', 'timeline-content', '2019-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `wb_job`
--

CREATE TABLE `wb_job` (
  `id` int(11) NOT NULL,
  `departement_id` int(11) DEFAULT NULL,
  `job` varchar(128) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `education` enum('SMP','SMA','D3','S1','S2') DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(128) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_job`
--

INSERT INTO `wb_job` (`id`, `departement_id`, `job`, `description`, `education`, `status`, `logo`, `publish_date`, `expired_date`) VALUES
(4, 1, 'IT Staff', 'Hatter: and in THAT direction,\' waving the other players, and shouting \'Off with her head! Off--\' \'Nonsense!\' said Alice, \'it\'s very easy to know your history, she do.\' \'I\'ll tell it her,\' said the.', 'SMA', 0, 'logo.png', '1986-08-14', '1970-04-23'),
(5, 1, 'c', 'Hatter, and, just as well as pigs, and was looking at everything about her, to pass away the time. Alice had no idea what to beautify is, I can\'t understand it myself to begin again, it was.', 'SMP', 0, 'logo.png', '2008-12-13', '2011-06-16'),
(6, 1, 'c', 'INSIDE, you might like to drop the jar for fear of their wits!\' So she tucked it away under her arm, and timidly said \'Consider, my dear: she is only a pack of cards: the Knave of Hearts, carrying.', 'S1', 0, 'logo.png', '1975-09-06', '1987-04-09'),
(7, 1, 'Accounting', 'English,\' thought Alice; \'I must be getting somewhere near the looking-glass. There was a good deal to ME,\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat in.', 'D3', 0, 'logo.png', '1971-08-14', '2009-06-13'),
(8, 1, 'c', 'I am so VERY nearly at the end of the jury had a little anxiously. \'Yes,\' said Alice, quite forgetting her promise. \'Treacle,\' said a timid voice at her for a minute, nurse! But I\'ve got to?\' (Alice.', 'S1', 0, 'logo.png', '1972-05-30', '2016-01-13'),
(9, 1, 'Accounting', 'I\'ve finished.\' So they couldn\'t get them out with trying, the poor little thing sat down a very little way forwards each time and a crash of broken glass. \'What a curious feeling!\' said Alice;.', 'S2', 0, 'logo.png', '2015-08-18', '1995-12-12'),
(24, 1, 'Accounting', 'I\'ve finished.\' So they couldn\'t get them out with trying, the poor little thing sat down a very little way forwards each time and a crash of broken glass. \'What a curious feeling!\' said Alice;.', 'S2', 0, 'logo.png', '2015-08-18', '1995-12-12'),
(25, 1, 'Accounting', 'I\'ve finished.\' So they couldn\'t get them out with trying, the poor little thing sat down a very little way forwards each time and a crash of broken glass. \'What a curious feeling!\' said Alice;.', 'S2', 0, 'logo.png', '2015-08-18', '1995-12-12'),
(26, 1, 'c', 'INSIDE, you might like to drop the jar for fear of their wits!\' So she tucked it away under her arm, and timidly said \'Consider, my dear: she is only a pack of cards: the Knave of Hearts, carrying.', 'S1', 0, 'logo.png', '1975-09-06', '1987-04-09'),
(27, 1, 'c', 'INSIDE, you might like to drop the jar for fear of their wits!\' So she tucked it away under her arm, and timidly said \'Consider, my dear: she is only a pack of cards: the Knave of Hearts, carrying.', 'S1', 0, 'logo.png', '1975-09-06', '1987-04-09'),
(28, 1, 'Accounting', 'I\'ve finished.\' So they couldn\'t get them out with trying, the poor little thing sat down a very little way forwards each time and a crash of broken glass. \'What a curious feeling!\' said Alice;.', 'S2', 1, 'logo.png', '2015-08-18', '2019-10-06'),
(29, 1, 'c', 'INSIDE, you might like to drop the jar for fear of their wits!\' So she tucked it away under her arm, and timidly said \'Consider, my dear: she is only a pack of cards: the Knave of Hearts, carrying.', 'S1', 0, 'logo.png', '1975-09-06', '2019-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `wb_menu`
--

CREATE TABLE `wb_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` text NOT NULL,
  `url` text NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_menu`
--

INSERT INTO `wb_menu` (`id`, `menu`, `icon`, `url`, `update_at`) VALUES
(12, 'Dashboard', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<polygon id=\"Bound\" points=\"0 0 24 0 24 24 0 24\" />\r\n								<path d=\"M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z\" id=\"Shape\" fill=\"#000000\" fill-rule=\"nonzero\" />\r\n								<path d=\"M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z\" id=\"Path\" fill=\"#000000\" opacity=\"0.3\" />\r\n							</g>\r\n						</svg>', 'cp-admin/dashboard', '2019-09-27'),
(13, 'Berita', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>\r\n        <path d=\"M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z\" id=\"Combined-Shape\" fill=\"#000000\"/>\r\n        <path d=\"M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z\" id=\"Path-41-Copy\" fill=\"#000000\" opacity=\"0.3\"/>\r\n    </g>\r\n</svg>', '#', '2019-09-30'),
(14, 'Profile', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n								<rect id=\"Rectangle-Copy-2\" fill=\"#FFFFFF\" x=\"13\" y=\"8\" width=\"3\" height=\"3\" rx=\"1\" />\r\n								<path d=\"M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z\" id=\"Rectangle-2\" fill=\"#000000\" opacity=\"0.3\" />\r\n							</g>\r\n						</svg>', '#', '2019-09-27'),
(15, 'Lowongan Pekerjaan', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" opacity=\"0.300000012\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<polygon id=\"Path-90\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\" points=\"7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684\" />\r\n								<path d=\"M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n							</g>\r\n						</svg>', '#', '2019-09-27'),
(16, 'Galeri', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n								<path d=\"M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z\" id=\"Combined-Shape\" fill=\"#000000\" opacity=\"0.3\" />\r\n							</g>\r\n						</svg>', 'cp-admin/gallery', '2019-09-27'),
(17, 'SEO Manajemen', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M10.8226874,8.36941377 L12.7324324,9.82298668 C13.4112512,8.93113547 14.4592942,8.4 15.6,8.4 C17.5882251,8.4 19.2,10.0117749 19.2,12 C19.2,13.9882251 17.5882251,15.6 15.6,15.6 C14.5814697,15.6 13.6363389,15.1780547 12.9574041,14.4447676 L11.1963369,16.075302 C12.2923051,17.2590082 13.8596186,18 15.6,18 C18.9137085,18 21.6,15.3137085 21.6,12 C21.6,8.6862915 18.9137085,6 15.6,6 C13.6507856,6 11.9186648,6.9294879 10.8226874,8.36941377 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\" />\r\n								<path d=\"M8.4,18 C5.0862915,18 2.4,15.3137085 2.4,12 C2.4,8.6862915 5.0862915,6 8.4,6 C11.7137085,6 14.4,8.6862915 14.4,12 C14.4,15.3137085 11.7137085,18 8.4,18 Z\" id=\"Oval-14-Copy\" fill=\"#000000\" />\r\n							</g>\r\n						</svg>', 'cp-admin/seo-management', '2019-09-27'),
(20, 'Role Manajemen', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<polygon id=\"Shape\" points=\"0 0 24 0 24 24 0 24\" />\r\n								<path d=\"M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z\" id=\"Mask\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\" />\r\n								<path d=\"M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z\" id=\"Mask-Copy\" fill=\"#000000\" fill-rule=\"nonzero\" />\r\n							</g>\r\n						</svg>', 'cp-admin/role-management', '2019-09-27'),
(21, 'Menu Manajemen', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M18,16 L9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L17,14 C17.5522847,14 18,13.5522847 18,13 C18,12.4477153 17.5522847,12 17,12 L9,12 C7.34314575,12 6,13.3431458 6,15 C6,16.6568542 7.34314575,18 9,18 L19.5,18 C21,18 21,18.5 21,19 C21,19.5 21,20 19.5,20 L7,20 C4.790861,20 3,18.209139 3,16 L3,8 C3,5.790861 4.790861,4 7,4 L17,4 C19.209139,4 21,5.790861 21,8 L21,13.0000005 C21,14.6568542 19.6568542,16 18,16 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n							</g>\r\n						</svg>', 'cp-admin/menu-management', '2019-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `wb_menu_akses`
--

CREATE TABLE `wb_menu_akses` (
  `id_akses` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_menu_akses`
--

INSERT INTO `wb_menu_akses` (`id_akses`, `menu_id`, `role_id`) VALUES
(22, 12, 1),
(23, 13, 1),
(24, 14, 1),
(25, 15, 1),
(26, 16, 1),
(27, 17, 1),
(28, 20, 1),
(29, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wb_message`
--

CREATE TABLE `wb_message` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `president` varchar(128) DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_message`
--

INSERT INTO `wb_message` (`id`, `message`, `president`, `photo`, `update_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus eros vitae risus varius, vel luctus magna pulvinar. In ante nulla, tempor eu metus at, mattis commodo justo. Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id, mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis, diam et laoreet sodales, ligula purus porttitor eros, ut interdum nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc posuere interdum dictum. Integer massa urna, condimentum at maximus eu, luctus non mauris.', 'Naoki Sakashita', 'president1569806434.png', '2019-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `wb_news`
--

CREATE TABLE `wb_news` (
  `id` int(9) UNSIGNED NOT NULL,
  `admin_id` int(9) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `news` text NOT NULL,
  `photo` varchar(128) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_news`
--

INSERT INTO `wb_news` (`id`, `admin_id`, `title`, `news`, `photo`, `slug`, `update_at`) VALUES
(1, 1, 'Fugiat eveniet praesentium dolores earum at.', 'Alice: \'besides, that\'s not a moment like a snout than a real Turtle.\' These words were followed by a row of lodging houses, and behind it, it occurred to her usual height. It was opened by another.', 'no-photo.png', 'a.html', '2011-10-27'),
(2, 1, 'Cupiditate aut corrupti porro adipisci corporis illum fuga perspiciatis.', 'And how odd the directions will look! ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense I\'m talking!\' Just then she walked down the chimney?--Nay, I.', 'no-photo.png', 'b.html', '1978-03-15'),
(3, 1, 'Et et reprehenderit maiores sed id voluptatum quidem.', 'Rabbit angrily. \'Here! Come and help me out of the March Hare. \'Sixteenth,\' added the March Hare took the opportunity of saying to herself what such an extraordinary ways of living would be worth.', 'no-photo.png', 'c.html', '2017-01-02'),
(4, 1, 'Asperiores ut corporis quod illum facere enim asperiores.', 'I know. Silence all round, if you were me?\' \'Well, perhaps your feelings may be different,\' said Alice; \'you needn\'t be afraid of them!\' \'And who is to give the prizes?\' quite a chorus of \'There.', 'no-photo.png', 'e.html', '1998-02-28'),
(5, 1, 'Voluptatem sunt voluptas totam repudiandae voluptas iure id.', 'This time there were a Duck and a Dodo, a Lory and an old crab, HE was.\' \'I never saw one, or heard of uglifying!\' it exclaimed. \'You know what a long breath, and said to the jury, who instantly.', 'no-photo.png', 'f.html', '2013-09-15'),
(6, 1, 'Reiciendis iure blanditiis iusto vitae dignissimos.', 'Mock Turtle went on. \'We had the dish as its share of the court was in managing her flamingo: she succeeded in bringing herself down to them, they set to work throwing everything within her reach at.', 'no-photo.png', 'g.html', '1985-05-26'),
(7, 1, 'Quis suscipit quo minima velit.', 'I\'ll just see what I like\"!\' \'You might just as she did not like the Queen?\' said the King. \'I can\'t explain it,\' said Alice indignantly. \'Ah! then yours wasn\'t a bit of mushroom, and raised herself.', 'no-photo.png', 'h.html', '1972-07-05'),
(8, 1, 'Et perspiciatis esse ipsam ipsam ut vel et.', 'These were the cook, and a great hurry, muttering to itself \'Then I\'ll go round a deal too far off to other parts of the song. \'What trial is it?\' \'Why,\' said the King. \'It began with the bones and.', 'no-photo.png', 'i.html', '1983-08-28'),
(9, 1, 'Quod sint vel quia est aut quos sunt.', 'Mary Ann, what ARE you doing out here? Run home this moment, I tell you, you coward!\' and at last she spread out her hand on the floor, and a large fan in the air. Even the Duchess said to herself..', 'no-photo.png', 'j.html', '1979-03-03'),
(10, 1, 'Et qui qui ut.', 'Mock Turtle said: \'no wise fish would go round and swam slowly back to the Dormouse, who seemed to think about stopping herself before she made some tarts, All on a bough of a well--\' \'What did they.', 'no-photo.png', 'k.html', '1998-07-17'),
(11, 1, 'Iure provident dolores illo quod eos quos odit.', 'Alice alone with the Gryphon. \'We can do without lobsters, you know. So you see, as she tucked her arm affectionately into Alice\'s, and they went on growing, and she soon found herself in the last.', 'no-photo.png', 'l.html', '2008-03-17'),
(12, 1, 'Nisi commodi distinctio porro blanditiis.', 'However, she did not like to be a book of rules for shutting people up like a star-fish,\' thought Alice. The poor little thing grunted in reply (it had left off quarrelling with the Lory, who at.', 'no-photo.png', 'o.html', '2002-03-11'),
(13, 1, 'Consequuntur quidem ducimus numquam impedit.', 'There was no time to be no use in talking to herself, \'after such a capital one for catching mice you can\'t think! And oh, I wish you wouldn\'t have come here.\' Alice didn\'t think that very few.', 'no-photo.png', 'p.html', '1971-04-15'),
(14, 1, 'Et sapiente porro exercitationem.', 'Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon said to Alice, and her face in some alarm. This time Alice waited till the puppy\'s bark sounded quite faint in the.', 'no-photo.png', 'q.html', '2001-09-15'),
(15, 1, 'Temporibus iste cupiditate autem enim.', 'Alice\'s elbow was pressed so closely against her foot, that there was hardly room for this, and she heard the Rabbit asked. \'No, I didn\'t,\' said Alice: \'three inches is such a puzzled expression.', 'no-photo.png', 'r.html', '2017-12-12'),
(16, 1, 'Illum quis dolor voluptas mollitia nam.', 'Cat remarked. \'Don\'t be impertinent,\' said the Dormouse: \'not in that ridiculous fashion.\' And he added in a sort of idea that they would go, and making quite a crowd of little cartwheels, and the.', 'no-photo.png', 's.html', '2015-02-04'),
(17, 1, 'Velit dolores consequuntur non ea in totam quia.', 'She said this she looked down at them, and just as she did not get hold of it; then Alice, thinking it was sneezing and howling alternately without a moment\'s pause. The only things in the distance,.', 'no-photo.png', 't.html', '1989-01-23'),
(18, 1, 'Ipsum ut numquam nihil ut amet assumenda modi.', 'He was an old crab, HE was.\' \'I never saw one, or heard of \"Uglification,\"\' Alice ventured to ask. \'Suppose we change the subject of conversation. \'Are you--are you fond--of--of dogs?\' The Mouse.', 'news1569917936.jpg', 'v.html', '1980-12-05'),
(19, 1, 'Sunt ab illo dignissimos aliquid omnis.', 'Run home this moment, and fetch me a pair of white kid gloves, and was going off into a small passage, not much surprised at her rather inquisitively, and seemed to have him with them,\' the Mock.', 'news1569902289.jpg', 'x.html', '1970-09-14'),
(20, 1, 'Quidem fuga ipsa nemo ut perspiciatis autem.', 'I don\'t like it, yer honour, at all, as the White Rabbit, \'but it doesn\'t matter a bit,\' said the Mouse only growled in reply. \'Idiot!\' said the Gryphon, half to herself, \'it would have made a.', 'news1569979654.jpg', 'quidem-fuga-ipsa-nemo-ut-perspiciatis-autem..html', '2014-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `wb_role`
--

CREATE TABLE `wb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_role`
--

INSERT INTO `wb_role` (`id`, `role`, `create_at`) VALUES
(1, 'Administrator', '2019-09-30'),
(2, 'Personalia', '2019-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `wb_seo`
--

CREATE TABLE `wb_seo` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `meta` text NOT NULL,
  `crawl_landing` int(2) NOT NULL,
  `follow_landing` int(2) NOT NULL,
  `crawl_admin` int(2) NOT NULL,
  `follow_admin` int(2) NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_seo`
--

INSERT INTO `wb_seo` (`id`, `title`, `description`, `meta`, `crawl_landing`, `follow_landing`, `crawl_admin`, `follow_admin`, `update_at`) VALUES
(1, 'Official Website PT. Jidosha Buhin Indonesia', 'Jibuhin', '', 1, 1, 2, 2, '2019-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `wb_sub_menu`
--

CREATE TABLE `wb_sub_menu` (
  `id_sub` int(11) NOT NULL,
  `menu_id` int(5) NOT NULL,
  `sub_menu` varchar(128) NOT NULL,
  `sub_url` text NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_sub_menu`
--

INSERT INTO `wb_sub_menu` (`id_sub`, `menu_id`, `sub_menu`, `sub_url`, `update_at`) VALUES
(15, 14, 'Pesan Presiden', 'cp-admin/profile/message-president', '2019-09-27'),
(16, 14, 'Organisasi', 'cp-admin/profile/organization', '2019-09-27'),
(17, 14, 'Penghargaan', 'cp-admin/profile/achievement', '2019-09-27'),
(18, 14, 'Sejarah', 'cp-admin/profile/history', '2019-09-30'),
(19, 14, 'Visi & Misi', 'cp-admin/profile/vm', '2019-09-30'),
(20, 14, 'Group', 'cp-admin/profile/group', '2019-09-30'),
(21, 13, 'Semua Berita', 'cp-admin/news/all-news', '2019-09-30'),
(22, 13, 'Tambah Berita', 'cp-admin/news/add-news', '2019-09-30'),
(23, 15, 'Semua Loker', 'cp-admin/job/all-job', '2019-10-02'),
(24, 15, 'Tambah Loker', 'cp-admin/job/add-job', '2019-10-02'),
(25, 15, 'Semua Pelamar', 'cp-admin/job/all-recruitment', '2019-10-02'),
(26, 15, 'Daftar Departemen', 'cp-admin/job/departement', '2019-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `wb_vm`
--

CREATE TABLE `wb_vm` (
  `id` int(11) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wb_vm`
--

INSERT INTO `wb_vm` (`id`, `visi`, `misi`, `update_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus eros vitae risus varius, vel luctus magna pulvinar. In ante nulla, tempor eu metus at, mattis commodo justo. Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id, mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis, diam et laoreet sodales, ligula purus porttitor eros, ut interdum nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc posuere interdum dictum. Integer massa urna, condimentum at maximus eu, luctus non mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus eros vitae risus varius, vel luctus magna pulvinar. In ante nulla, tempor eu metus at, mattis commodo justo. Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id, mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis, diam et laoreet sodales, ligula purus porttitor eros, ut interdum nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc posuere interdum dictum. Integer massa urna, condimentum at maximus eu, luctus non mauris. ', '2019-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wb_achievement`
--
ALTER TABLE `wb_achievement`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_admin`
--
ALTER TABLE `wb_admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_album`
--
ALTER TABLE `wb_album`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_album_foto`
--
ALTER TABLE `wb_album_foto`
  ADD PRIMARY KEY (`id_photo`) USING BTREE;

--
-- Indexes for table `wb_departement`
--
ALTER TABLE `wb_departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_employe`
--
ALTER TABLE `wb_employe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_group`
--
ALTER TABLE `wb_group`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_history`
--
ALTER TABLE `wb_history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_job`
--
ALTER TABLE `wb_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_menu`
--
ALTER TABLE `wb_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_menu_akses`
--
ALTER TABLE `wb_menu_akses`
  ADD PRIMARY KEY (`id_akses`) USING BTREE;

--
-- Indexes for table `wb_message`
--
ALTER TABLE `wb_message`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_news`
--
ALTER TABLE `wb_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_role`
--
ALTER TABLE `wb_role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_seo`
--
ALTER TABLE `wb_seo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wb_sub_menu`
--
ALTER TABLE `wb_sub_menu`
  ADD PRIMARY KEY (`id_sub`) USING BTREE;

--
-- Indexes for table `wb_vm`
--
ALTER TABLE `wb_vm`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wb_achievement`
--
ALTER TABLE `wb_achievement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wb_admin`
--
ALTER TABLE `wb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_album`
--
ALTER TABLE `wb_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wb_album_foto`
--
ALTER TABLE `wb_album_foto`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wb_departement`
--
ALTER TABLE `wb_departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wb_employe`
--
ALTER TABLE `wb_employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wb_group`
--
ALTER TABLE `wb_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_history`
--
ALTER TABLE `wb_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wb_job`
--
ALTER TABLE `wb_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wb_menu`
--
ALTER TABLE `wb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wb_menu_akses`
--
ALTER TABLE `wb_menu_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wb_message`
--
ALTER TABLE `wb_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_news`
--
ALTER TABLE `wb_news`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wb_role`
--
ALTER TABLE `wb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wb_seo`
--
ALTER TABLE `wb_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_sub_menu`
--
ALTER TABLE `wb_sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wb_vm`
--
ALTER TABLE `wb_vm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
