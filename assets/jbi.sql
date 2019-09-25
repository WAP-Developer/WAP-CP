-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 11:54 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_album`
--

INSERT INTO `wb_album` (`id`, `album`, `slug`, `update_at`) VALUES
(4, 'Jalan-Jalan', 'jalan-jalan.html', '2019-09-25');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_menu`
--

INSERT INTO `wb_menu` (`id`, `menu`, `icon`, `url`, `update_at`) VALUES
(4, 'Dashboard', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n	<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n		<polygon id=\"Bound\" points=\"0 0 24 0 24 24 0 24\" />\r\n		<path d=\"M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z\" id=\"Shape\" fill=\"#000000\" fill-rule=\"nonzero\" />\r\n		<path d=\"M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z\" id=\"Path\" fill=\"#000000\" opacity=\"0.3\" />\r\n	</g>\r\n</svg>', 'cp-admin/dashboard', '2019-09-24'),
(5, 'Role Manajemen', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n	<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n		<polygon id=\"Shape\" points=\"0 0 24 0 24 24 0 24\" />\r\n		<path d=\"M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z\" id=\"Mask\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\" />\r\n		<path d=\"M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z\" id=\"Mask-Copy\" fill=\"#000000\" fill-rule=\"nonzero\" />\r\n	</g>\r\n</svg>', 'cp-admin/role-management', '2019-09-24'),
(6, 'Menu Manajemen', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M18,16 L9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L17,14 C17.5522847,14 18,13.5522847 18,13 C18,12.4477153 17.5522847,12 17,12 L9,12 C7.34314575,12 6,13.3431458 6,15 C6,16.6568542 7.34314575,18 9,18 L19.5,18 C21,18 21,18.5 21,19 C21,19.5 21,20 19.5,20 L7,20 C4.790861,20 3,18.209139 3,16 L3,8 C3,5.790861 4.790861,4 7,4 L17,4 C19.209139,4 21,5.790861 21,8 L21,13.0000005 C21,14.6568542 19.6568542,16 18,16 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n							</g>\r\n						</svg>', 'cp-admin/menu-management', '2019-09-24'),
(7, 'Berita', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M18,16 L9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L17,14 C17.5522847,14 18,13.5522847 18,13 C18,12.4477153 17.5522847,12 17,12 L9,12 C7.34314575,12 6,13.3431458 6,15 C6,16.6568542 7.34314575,18 9,18 L19.5,18 C21,18 21,18.5 21,19 C21,19.5 21,20 19.5,20 L7,20 C4.790861,20 3,18.209139 3,16 L3,8 C3,5.790861 4.790861,4 7,4 L17,4 C19.209139,4 21,5.790861 21,8 L21,13.0000005 C21,14.6568542 19.6568542,16 18,16 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n							</g>\r\n						</svg>', '#', '2019-09-25'),
(8, 'Profile', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n								<rect id=\"Rectangle-Copy-2\" fill=\"#FFFFFF\" x=\"13\" y=\"8\" width=\"3\" height=\"3\" rx=\"1\" />\r\n								<path d=\"M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z\" id=\"Rectangle-2\" fill=\"#000000\" opacity=\"0.3\" />\r\n							</g>\r\n						</svg>', '#', '2019-09-25'),
(9, 'Lowongan Pekerjaan', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" opacity=\"0.300000012\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<polygon id=\"Path-90\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\" points=\"7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684\" />\r\n								<path d=\"M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n							</g>\r\n						</svg>', '#', '2019-09-25'),
(10, 'Galeri', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z\" id=\"Combined-Shape\" fill=\"#000000\" />\r\n								<path d=\"M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z\" id=\"Combined-Shape\" fill=\"#000000\" opacity=\"0.3\" />\r\n							</g>\r\n						</svg>', 'cp-admin/gallery/', '2019-09-25'),
(11, 'SEO Manajemen', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon\">\r\n							<g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">\r\n								<rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\" />\r\n								<path d=\"M10.8226874,8.36941377 L12.7324324,9.82298668 C13.4112512,8.93113547 14.4592942,8.4 15.6,8.4 C17.5882251,8.4 19.2,10.0117749 19.2,12 C19.2,13.9882251 17.5882251,15.6 15.6,15.6 C14.5814697,15.6 13.6363389,15.1780547 12.9574041,14.4447676 L11.1963369,16.075302 C12.2923051,17.2590082 13.8596186,18 15.6,18 C18.9137085,18 21.6,15.3137085 21.6,12 C21.6,8.6862915 18.9137085,6 15.6,6 C13.6507856,6 11.9186648,6.9294879 10.8226874,8.36941377 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\" />\r\n								<path d=\"M8.4,18 C5.0862915,18 2.4,15.3137085 2.4,12 C2.4,8.6862915 5.0862915,6 8.4,6 C11.7137085,6 14.4,8.6862915 14.4,12 C14.4,15.3137085 11.7137085,18 8.4,18 Z\" id=\"Oval-14-Copy\" fill=\"#000000\" />\r\n							</g>\r\n						</svg>', 'cp-admin/seo-management/', '2019-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `wb_menu_akses`
--

CREATE TABLE `wb_menu_akses` (
  `id_akses` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_menu_akses`
--

INSERT INTO `wb_menu_akses` (`id_akses`, `menu_id`, `role_id`) VALUES
(13, 4, 1),
(15, 7, 1),
(16, 8, 1),
(17, 9, 1),
(18, 10, 1),
(19, 11, 1),
(20, 5, 1),
(21, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wb_role`
--

CREATE TABLE `wb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(11) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_role`
--

INSERT INTO `wb_role` (`id`, `role`, `create_at`) VALUES
(1, 'Admin', '2019-09-24'),
(2, 'Personalia', '2019-09-24');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_seo`
--

INSERT INTO `wb_seo` (`id`, `title`, `description`, `meta`, `crawl_landing`, `follow_landing`, `crawl_admin`, `follow_admin`, `update_at`) VALUES
(1, 'Official Website PT. Jidosha Buhin Indonesia', 'Jibuhin', '', 1, 1, 2, 2, '0000-00-00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wb_sub_menu`
--

INSERT INTO `wb_sub_menu` (`id_sub`, `menu_id`, `sub_menu`, `sub_url`, `update_at`) VALUES
(10, 7, 'Semua Berita', 'cp-admin/all-news', '2019-09-25'),
(11, 7, 'Tambah Berita', 'cp-admin/add-news', '2019-09-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wb_admin`
--
ALTER TABLE `wb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_album`
--
ALTER TABLE `wb_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_album_foto`
--
ALTER TABLE `wb_album_foto`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `wb_menu`
--
ALTER TABLE `wb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_menu_akses`
--
ALTER TABLE `wb_menu_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `wb_role`
--
ALTER TABLE `wb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_seo`
--
ALTER TABLE `wb_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wb_sub_menu`
--
ALTER TABLE `wb_sub_menu`
  ADD PRIMARY KEY (`id_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wb_admin`
--
ALTER TABLE `wb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_album`
--
ALTER TABLE `wb_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wb_album_foto`
--
ALTER TABLE `wb_album_foto`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wb_menu`
--
ALTER TABLE `wb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wb_menu_akses`
--
ALTER TABLE `wb_menu_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wb_role`
--
ALTER TABLE `wb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wb_seo`
--
ALTER TABLE `wb_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wb_sub_menu`
--
ALTER TABLE `wb_sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
