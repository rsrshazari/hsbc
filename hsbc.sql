-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 01:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hsbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `loginAccess` enum('0','1') DEFAULT NULL,
  `cookies` enum('0','1') DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `fcm` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `last_login`, `contact`, `status`, `otp`, `loginAccess`, `cookies`, `image`, `fcm`) VALUES
(7, '', '', 'admin', '4297f44b13955235245b2497399d7a93', '', '11 August, 2021 05:04 PM', '', '1', NULL, '1', '1', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `timing2` varchar(50) NOT NULL,
  `timing3` varchar(30) NOT NULL,
  `content2` text NOT NULL,
  `address` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `content`, `tel`, `email`, `timing`, `timing2`, `timing3`, `content2`, `address`, `status`, `date`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id velit aliquet nibh euismod placerat. Pellentesque leo arcu, consequat commodo urna eu, commodo ullamcorper nunc. Sed luctus dolor sed varius congue. Etiam lacinia at ante non dapibus. Vivamus sit amet lectus commodo magna volutpat mattis. Morbi auctor enim nunc, vel lobortis est faucibus sed. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In a sapien ac lacus elementum luctus eget sed mi. Aliquam facilisis elit euismod scelerisque congue. Ut ut vulputate neque. Curabitur varius, dui id mollis mollis, nisl sapien tincidunt felis, sit amet iaculis massa nulla id nisi. Aenean hendrerit porttitor posuere. Vivamus sollicitudin sit amet elit in interdum.</p>\r\n', '0203 123 4567', 'abcde@fdfsdfg.ghjgfh', '08:00-18:00', '08:00-13:00', '12:00-12:03', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id velit aliquet nibh euismod placerat. Pellentesque leo arcu, consequat commodo urna eu, commodo ullamcorper nunc. Sed luctus dolor sed varius congue. Etiam lacinia at ante non dapibus. Vivamus sit amet lectus commodo magna volutpat mattis. Morbi auctor enim nunc, vel lobortis est faucibus sed. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In a sapien ac lacus elementum luctus eget sed mi. Aliquam facilisis elit euismod scelerisque congue. Ut ut vulputate neque. Curabitur varius, dui id mollis mollis, nisl sapien tincidunt felis, sit amet iaculis massa nulla id nisi. Aenean hendrerit porttitor posuere. Vivamus sollicitudin sit amet elit in interdum.</p>\r\n', '<p>Abc Healthcare Plan</p>\r\n\r\n<p>Claims adminstration</p>\r\n\r\n<p>Department helaix house</p>\r\n\r\n<p>Esher Green</p>\r\n\r\n<p>esher Surrey</p>\r\n\r\n<p>KT108AB</p>\r\n', '1', '05-08-2021 05:20:36pm');

-- --------------------------------------------------------

--
-- Table structure for table `websitefooter`
--

CREATE TABLE `websitefooter` (
  `id` int(11) NOT NULL,
  `site_name` varchar(250) NOT NULL,
  `site_logo` varchar(500) NOT NULL,
  `site_contact` varchar(20) NOT NULL,
  `site_tagline` varchar(250) NOT NULL,
  `site_desp` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websitefooter`
--

INSERT INTO `websitefooter` (`id`, `site_name`, `site_logo`, `site_contact`, `site_tagline`, `site_desp`, `status`) VALUES
(1, 'HSBC', '146-1468001_hsbc-logo-hsbc-logo-white-png.png', '1231456487', 'The Global Bank', '<h1>sdsgdfsg</h1>sdfgdfg<br>sdffgsdfg<br>sdfg<br>sdfg<br>sdfg<br>sdfg<br><br>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `websiteheader`
--

CREATE TABLE `websiteheader` (
  `id` int(11) NOT NULL,
  `site_name` varchar(250) NOT NULL,
  `site_logo` varchar(500) NOT NULL,
  `site_contact` varchar(20) NOT NULL,
  `site_tagline` varchar(250) NOT NULL,
  `color` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websiteheader`
--

INSERT INTO `websiteheader` (`id`, `site_name`, `site_logo`, `site_contact`, `site_tagline`, `color`, `status`) VALUES
(13, 'Narrow Mouth Wash Bottle', 'Picture2.png', '7878787878', 'Health Care Plan', '#fe0000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `websitehomepage`
--

CREATE TABLE `websitehomepage` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `img` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websitehomepage`
--

INSERT INTO `websitehomepage` (`id`, `content`, `img`, `status`, `date`) VALUES
(1, '<p><strong>Welcome to the HSBC Healthcare Plan Guide.</strong></p>\r\n\r\n<p>HSBC have appointed us, Trust In Health Services Ltd, to manage this plan. Our role is to assess and manage any medical needs that you might have as well as any care and treatment you receive.</p>\r\n\r\n<p>Therefore, when you see the words &ldquo;we&rdquo;, &ldquo;us&rdquo; or &ldquo;our&rdquo; in this guide it means Trust In Health.</p>\r\n', 'home-img.jpg', '1', '11-08-2021 05:08:13pm');

-- --------------------------------------------------------

--
-- Table structure for table `websitepage`
--

CREATE TABLE `websitepage` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `position` int(10) NOT NULL,
  `theme` varchar(250) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websitepage`
--

INSERT INTO `websitepage` (`id`, `name`, `url`, `position`, `theme`, `status`, `date`) VALUES
(28, 'Page One', 'Page One.php', 0, '1', '1', '11-08-2021');

-- --------------------------------------------------------

--
-- Table structure for table `websitepagecontent`
--

CREATE TABLE `websitepagecontent` (
  `id` int(11) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `heading` text NOT NULL,
  `subheading` text NOT NULL,
  `content` text NOT NULL,
  `position` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websitepagecontent`
--

INSERT INTO `websitepagecontent` (`id`, `pid`, `heading`, `subheading`, `content`, `position`, `status`, `date`) VALUES
(64, '28', 'Section One', 'VnlIuLkXiy', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, '1', '11-08-2021'),
(65, '28', 'Section Two', 'VzNEazsjle', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 2, '1', '11-08-2021'),
(66, '28', 'Section Three', 'gDeRBZPfyn', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 3, '1', '11-08-2021'),
(67, '28', 'Section Four', 'PafKWdkemQ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 4, '1', '11-08-2021'),
(68, '28', 'Section Five', 'YFXQtisOvz', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 5, '1', '11-08-2021'),
(69, '28', 'Section Six', 'mvKoqOkbGc', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 6, '1', '11-08-2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitefooter`
--
ALTER TABLE `websitefooter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websiteheader`
--
ALTER TABLE `websiteheader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitehomepage`
--
ALTER TABLE `websitehomepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitepage`
--
ALTER TABLE `websitepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitepagecontent`
--
ALTER TABLE `websitepagecontent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websitefooter`
--
ALTER TABLE `websitefooter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websiteheader`
--
ALTER TABLE `websiteheader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `websitehomepage`
--
ALTER TABLE `websitehomepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websitepage`
--
ALTER TABLE `websitepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `websitepagecontent`
--
ALTER TABLE `websitepagecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
