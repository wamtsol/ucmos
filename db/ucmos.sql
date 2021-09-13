-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2021 at 07:03 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucmos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_type_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_number` varchar(220) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_type_id`, `username`, `email`, `name`, `phone_number`, `password`, `status`, `ts`) VALUES
(1, 1, 'admin', 'vickyali2@hotmail.com', 'Admin', '', 'admin', 1, '2021-09-13 17:45:20'),
(29, 3, 'waseem', 'waseem@waseem.com', 'Dr. Waseem', '0308-3349151', 'waseem', 1, '2021-09-13 17:51:13'),
(30, 3, 'mashad burt', 'mashadburt@mashadburt.com', 'Dr. Mashad Burt', '0300-3049962', 'mashadburt', 1, '2021-09-13 17:51:22'),
(31, 3, 'fayyaz', 'fayyaz@fayyaz.com', 'Dr. Fayyaz Umar', '0341-2048433', 'fayyaz', 1, '2021-09-13 17:50:56'),
(32, 3, 'nadeem', 'nadeem@nadeem.com', 'Dr. Nadeem', '0345-3559925', 'nadeem', 1, '2021-09-13 17:52:11'),
(33, 3, 'masood', 'masood@masood.com', 'Dr. Masood Qazi', '0333-2709803', 'masood', 1, '2021-09-13 17:52:57'),
(34, 3, 'wahid', 'wahid@wahid.com', 'Dr. Wahid Ali', '0343-3669335', 'wahid', 1, '2021-09-13 17:53:35'),
(35, 3, 'waqar', 'waqar@waqar.com', 'Dr. Waqar Solangi', '0300-4199011', 'waqar', 1, '2021-09-13 17:55:19'),
(36, 3, 'yousif', 'yousif@yousif.com', 'Dr. Yousif Magsi', '0334-2611721', 'yousif', 1, '2021-09-13 17:56:18'),
(37, 3, 'shahid', 'shahid@shahid.com', 'Dr. Shahid', '0313-3991166', 'shahid', 1, '2021-09-13 17:57:17'),
(38, 3, 'faisal', 'faisal@faisal.com', 'Dr. Faisal', '0345-3572112', 'faisal', 1, '2021-09-13 18:00:18'),
(39, 3, 'ameen', 'ameen@ameen.com', 'Dr, Ameen', '0310-3209028', 'ameen', 1, '2021-09-13 18:01:02'),
(40, 3, 'rizwan', 'rizwan@rizwan.com', 'Dr. Rizwan', '0334-2824897', 'rizwan', 1, '2021-09-13 18:01:59'),
(41, 3, 'basit', 'basit@basit.com', 'Dr. A. Basit', '0336-2256912', 'basit', 1, '2021-09-13 18:02:37'),
(42, 3, 'riaz', 'riaz@riaz.com', 'Dr. Riaz', '0313-4938137', 'riaz', 1, '2021-09-13 18:03:17'),
(43, 3, 'waseemnew', 'waseemnew@waseem.com', 'Dr. Waseem New', '0334-3176941', 'waseemnew', 1, '2021-09-13 18:54:34'),
(44, 3, 'faisalnew', 'faisalnew@faisal.com', 'Dr. Faisal Bilal', '0331-2395605', 'faisalnew', 1, '2021-09-13 18:05:57'),
(45, 3, 'sikandar', 'sikandar@sikandar.com', 'Dr. Sikandar', '0333-2779010', 'sikandar', 1, '2021-09-13 18:06:40'),
(46, 3, 'aliraza', 'aliraza@aliraza.com', 'Dr, Ali Raza Shah', '0334-3623032', 'aliraza', 1, '2021-09-13 18:07:23'),
(47, 3, 'ahmed', 'ahmed@ahmed.com', 'Dr. Ahmed Faraz', '0336-2867869', 'ahmed', 1, '2021-09-13 18:08:09'),
(48, 3, 'tahir', 'tahir@tahir.com', 'Dr. Tahir Qureshi', '0345-3574090', 'tahir', 1, '2021-09-13 18:08:43'),
(49, 3, 'zahid', 'zahid@zahid.com', 'Dr. M. Zahid', '0300-3030641', 'zahid', 1, '2021-09-13 18:09:19'),
(50, 3, 'azfar', 'azfar@azfar.com', 'Dr. Azfar Sikandari', '0345-3531361', 'azfar', 1, '2021-09-13 18:10:00'),
(51, 3, 'amjad', 'amjad@amjad.com', 'Dr. Amjad', '0333-2609954', 'amjad', 1, '2021-09-13 18:10:52'),
(52, 3, 'khan', 'khan@khan.com', 'Dr. Khan Muhammad', '0333-2601661', 'khan', 1, '2021-09-13 18:11:34'),
(53, 3, 'danish', 'danish@danish.com', 'Dr. Danish ', '0301-3507755', 'danish', 1, '2021-09-13 18:12:05'),
(54, 3, 'amir', 'amir@amir.com', 'Dr. Amir', '0333-2622433', 'amir', 1, '2021-09-13 18:12:40'),
(55, 3, 'mustafa', 'mustafa@mustafa.com', 'Dr. Ali Mustafa', '0347-1122171', 'mustafa', 1, '2021-09-13 18:13:18'),
(56, 3, 'zaheer', 'zaheer@zaheer.com', 'Dr. Zaheer Mlaik', '0303-2748556', 'zaheer', 1, '2021-09-13 18:13:56'),
(57, 3, 'arif', 'arif@arif.com', 'Dr. Arif Hussain', '0334-2086701', 'arif', 1, '2021-09-13 18:14:26'),
(58, 3, 'nabi', 'nabi@nabi.com', 'Dr. Nabi Bux Lashari', '0345-2257102', 'nabi', 1, '2021-09-13 18:15:09'),
(59, 3, 'iftekhar', 'iftekhar@iftekhar.com', 'Dr. Iftekhar', '0314-2460567', 'iftekhar', 1, '2021-09-13 18:15:43'),
(60, 3, 'gohar', 'gohar@gohar.com', 'Dr. Gohar Ali', '0333-2624617', 'gohar', 1, '2021-09-13 18:16:15'),
(61, 3, 'sajjad', 'sajjad@sajjad.com', 'Dr. Sajjad Ali', '0335-3584418', 'sajjad', 1, '2021-09-13 18:16:54'),
(62, 3, 'karan', 'karan@karan.com', 'Dr. Karan Kumar', '0333-7594926', 'karan', 1, '2021-09-13 18:17:36'),
(63, 3, 'muhammad', 'muhammad@muhammad.com', 'Dr. Muhammad Ali', '0333-2692711', 'muhammad', 1, '2021-09-13 18:18:16'),
(64, 3, 'bilal', 'bilal@bilal.com', 'Dr. Bilal Khan', '0331-3508174', 'bilal', 1, '2021-09-13 18:18:47'),
(65, 3, 'khuram', 'khuram@khuram.com', 'Dr. Khuram', '1312-4811179', 'khuram', 1, '2021-09-13 18:19:25'),
(66, 3, 'jabbar', 'jabbar@jabbar.com', 'Dr. A. Jabbar', '0341-2701865', 'jabbar', 1, '2021-09-13 18:20:05'),
(67, 3, 'asif', 'asif@asif.com', 'Dr, Asif Memon', '0333-2607464', 'asif', 1, '2021-09-13 18:20:58'),
(68, 3, 'majid', 'majid@majid.com', 'Dr. Majid', '0345-0302355', 'majid', 1, '2021-09-13 18:21:31'),
(69, 3, 'zaffar', 'zaffar@zaffar.com', 'Dr. Zaffar', '0300-3243739', 'zaffar', 1, '2021-09-13 18:22:00'),
(70, 3, 'noshad', 'noshad@noshad.com', 'Dr. Noshad ', '0300-3443388', 'noshad', 1, '2021-09-13 18:22:32'),
(71, 3, 'shamim', 'shamim@shamim.com', 'Dr. Shamim ', '0333-2653414', 'shamim', 1, '2021-09-13 18:23:13'),
(72, 3, 'ghazanfar', 'ghazanfar@ghazanfar.com', 'Dr. Ghazanfar', '0331-3700973', 'ghazanfar', 1, '2021-09-13 18:23:50'),
(73, 3, 'qazi', 'qazi@qazi.com', 'Mr. Qazi Faheem', '0333-2700766', 'qazi', 1, '2021-09-13 18:28:26'),
(74, 3, 'jahanzaib', 'jahanzaib@jahanzaib.com', 'Dr. Jahanzaib', '0331-3671303', 'jahanzaib', 1, '2021-09-13 18:28:59'),
(75, 3, 'jahanzaibnew', 'jahanzaibnew@jahanzaibnew.com', 'Dr. Jahanzaib New', '0333-2738656', 'jahanzaibnew', 1, '2021-09-13 18:57:33'),
(76, 3, 'zeeshan', 'zeeshan@zeeshan.com', 'Dr. Zeeshan', '0331-3514838', 'zeeshan', 1, '2021-09-13 18:31:07'),
(77, 3, 'waqarsoomro', 'waqarsoomro@waqarsoomro.com', 'Dr. Waqar Soomro', '0331-2918188', 'waqarsoomro', 1, '2021-09-13 18:31:51'),
(78, 3, 'parvaiz', 'parvaiz@parvaiz.com', 'Dr. Parvaiz', '0300-3039233', 'parvaiz', 1, '2021-09-13 18:32:46'),
(79, 3, 'imad', 'imad@imad.com', 'Dr. Imad Ansari', '0332-2657850', 'imad', 1, '2021-09-13 18:34:14'),
(80, 3, 'zafar', 'zafar@zafar.com', 'Dr. Zafar Memon', '0333-2610648', 'zafar', 1, '2021-09-13 18:35:00'),
(81, 3, 'faique', 'faique@faique.com', 'Mr. Faique', '0302-3102681', 'faique', 1, '2021-09-13 18:37:15'),
(82, 3, 'irfan', 'irfan@irfan.com', 'Dr. Irfan Ahmed', '0300-0356423', 'irfan', 1, '2021-09-13 18:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE `admin_type` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `can_add` int(1) NOT NULL DEFAULT '0',
  `can_edit` int(1) NOT NULL DEFAULT '0',
  `can_delete` int(1) NOT NULL DEFAULT '0',
  `can_read` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `ts` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `title`, `can_add`, `can_edit`, `can_delete`, `can_read`, `status`, `ts`) VALUES
(1, 'Administrator', 1, 1, 1, 1, 1, '2017-02-27 12:10:38'),
(3, 'UCMO', 1, 1, 1, 1, 1, '2021-09-13 17:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `config_type`
--

CREATE TABLE `config_type` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `sortorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_type`
--

INSERT INTO `config_type` (`id`, `title`, `sortorder`) VALUES
(1, 'General Settings', 1),
(9, 'Invoice Setting', 2);

-- --------------------------------------------------------

--
-- Table structure for table `config_variable`
--

CREATE TABLE `config_variable` (
  `id` int(11) NOT NULL,
  `config_type_id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `notes` varchar(512) NOT NULL,
  `type` varchar(200) NOT NULL,
  `default_values` text NOT NULL,
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  `sortorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_variable`
--

INSERT INTO `config_variable` (`id`, `config_type_id`, `title`, `notes`, `type`, `default_values`, `key`, `value`, `sortorder`) VALUES
(1, 1, 'Site URL', '', 'text', '', 'site_url', 'http://localhost/ucmos', 2),
(2, 1, 'Site Title', '', 'text', '', 'site_title', 'UCMOS', 1),
(3, 1, 'Admin Logo', '', 'file', '', 'admin_logo', '', 4),
(10, 1, 'Currency Symbol', '', 'text', '', 'currency_symbol', 'Rs', 5),
(7, 1, 'Admin Email', 'Main Email Address where all the notifications will be sent.', 'text', '', 'admin_email', '', 3),
(18, 1, 'Address/Phone', '', 'editor', '', 'address_phone', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 6),
(19, 1, 'Header', '', 'editor', '', 'fees_chalan_header', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 7),
(21, 9, 'Supplier Detail', '', 'editor', '', 'supplier_detail', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 8),
(22, 1, 'Customer ID', '', 'text', '', 'customer_id', '3', 9);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `depth` int(1) NOT NULL,
  `sortorder` int(11) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `small_icon` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`, `parent_id`, `depth`, `sortorder`, `icon`, `small_icon`) VALUES
(1, 'Dashboard', '#', 0, 0, 1, 'dashboard.png', 'home'),
(8, 'Manage Users', 'admin_manage.php', 1, 1, 4, 'administrator.png', 'user'),
(7, 'General Settings', 'config_manage.php?config_id=1', 1, 1, 2, 'general-settings.png', 'cog'),
(12, 'Upload Center', 'upload_manage.php', 1, 1, 3, 'upload-center.png', 'file-o'),
(26, 'Manage User Types', 'admin_type_manage.php', 1, 1, 5, 'admin-type.png', 'unlock-alt'),
(87, 'Manage Tehseel', 'tehseel_manage.php', 1, 1, 6, 'admin-type.png', 'unlock-alt'),
(88, 'Manage UC', 'uc_manage.php', 1, 1, 7, 'admin-type.png', 'unlock-alt');

-- --------------------------------------------------------

--
-- Table structure for table `menu_2_admin_type`
--

CREATE TABLE `menu_2_admin_type` (
  `menu_id` int(11) NOT NULL,
  `admin_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_2_admin_type`
--

INSERT INTO `menu_2_admin_type` (`menu_id`, `admin_type_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 3),
(4, 4),
(5, 1),
(5, 3),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(12, 1),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(20, 1),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(24, 1),
(24, 3),
(25, 1),
(26, 1),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 3),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(65, 3),
(66, 1),
(66, 3),
(67, 1),
(67, 3),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tehseel`
--

CREATE TABLE `tehseel` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tehseel`
--

INSERT INTO `tehseel` (`id`, `name`, `status`, `ts`) VALUES
(9, 'HYDERABAD CITY', 1, '2021-09-13 18:58:18'),
(10, 'HYDERABAD RURAL', 1, '2021-09-13 18:58:33'),
(11, 'LATIFABAD', 1, '2021-09-13 18:58:48'),
(12, 'QASIMABAD', 1, '2021-09-13 18:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `uc`
--

CREATE TABLE `uc` (
  `id` int(11) NOT NULL,
  `tehseel_id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `target` varchar(220) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc`
--

INSERT INTO `uc` (`id`, `tehseel_id`, `name`, `admin_id`, `target`, `status`, `ts`) VALUES
(6, 9, 'HYDERABAD-1', 29, '5323', 1, '2021-09-13 19:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filelocation` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `filename`, `filelocation`) VALUES
(1, 'my file', 'my-file.xlsx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_type`
--
ALTER TABLE `admin_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_type`
--
ALTER TABLE `config_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_variable`
--
ALTER TABLE `config_variable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_2_admin_type`
--
ALTER TABLE `menu_2_admin_type`
  ADD PRIMARY KEY (`menu_id`,`admin_type_id`);

--
-- Indexes for table `tehseel`
--
ALTER TABLE `tehseel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc`
--
ALTER TABLE `uc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `admin_type`
--
ALTER TABLE `admin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `config_type`
--
ALTER TABLE `config_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `config_variable`
--
ALTER TABLE `config_variable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tehseel`
--
ALTER TABLE `tehseel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uc`
--
ALTER TABLE `uc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
