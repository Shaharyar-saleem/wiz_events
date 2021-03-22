-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 06:17 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_blog`
--

CREATE TABLE `admin_blog` (
  `id` int(11) NOT NULL,
  `public_key` varchar(20) NOT NULL,
  `post_type` tinyint(4) NOT NULL DEFAULT '1',
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1->active , 2->draft',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '1',
  `is_approve` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1->approve , 2->approve_penging',
  `created_by` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blog`
--

INSERT INTO `admin_blog` (`id`, `public_key`, `post_type`, `title`, `date`, `description`, `status`, `is_deleted`, `is_approve`, `created_by`, `creation_date`, `updated_by`, `updation_date`) VALUES
(1, '37f068ea172d0f2', 1, 'Winter Wonderland and Tree Lighting!', '2020-01-13', '<p class=\"XzvDs _208Ie _1dH_e blog-post-text-font blog-post-text-color _2QAo- _25MYV _3ZX8L _1dH_e\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; font-family: museo-w01-700, serif; vertical-align: baseline; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); direction: ltr; box-sizing: inherit; color: rgb(47, 46, 46); white-space: pre-wrap;\">This week\'s \"WiZ Event of the Week\" goes to the City of Seaside Recreation\'s </p><p class=\"XzvDs _208Ie _1dH_e blog-post-text-font blog-post-text-color _2QAo- _25MYV _3ZX8L _1dH_e\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; font-family: museo-w01-700, serif; vertical-align: baseline; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); direction: ltr; box-sizing: inherit; color: rgb(47, 46, 46); white-space: pre-wrap;\">\"Winter Wonderland and Tree Lighting\"! </p><p class=\"XzvDs _208Ie _1dH_e blog-post-text-font blog-post-text-color _2QAo- _25MYV _3ZX8L _1dH_e\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; font-family: museo-w01-700, serif; vertical-align: baseline; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); direction: ltr; box-sizing: inherit; color: rgb(47, 46, 46); white-space: pre-wrap;\">Stop by this free family-friendly event on December 13th from 6pm to 9pm and enjoy various activities from ice skating, a petting zoo, arts and crafts, and even an appearance from Santa himself!!</p>', 2, 1, 2, 3759, '2020-01-16 15:26:57', 3759, '2020-01-16 21:04:19'),
(2, '45ae46fb7358fd0', 1, 'Testing pupos', '2020-01-20', '<p>aaaaaaaaaaaaaa</p>', 1, 1, 2, 4, '2020-01-20 19:12:36', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_blog_media`
--

CREATE TABLE `admin_blog_media` (
  `id` int(11) NOT NULL,
  `file_path` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(120) NOT NULL,
  `blog_id` varchar(20) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_blog_media`
--

INSERT INTO `admin_blog_media` (`id`, `file_path`, `type`, `name`, `blog_id`, `creation_date`) VALUES
(1, 'upload/f71ea24dc8b3c30ec71bfa038280ec8c.webp', 'image/webp', 'event-1.webp', '37f068ea172d0f2', '2020-01-16 15:26:57'),
(2, 'upload/23695cbde7f187b0a1a1e7a34df9d48b.webp', 'image/webp', 'event-2.webp', '37f068ea172d0f2', '2020-01-16 15:26:57'),
(3, 'upload/5f690954678819e75a191b0fa35323f1.jpg', 'image/jpeg', 'cover-img-3.jpg', '45ae46fb7358fd0', '2020-01-20 19:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

CREATE TABLE `admin_group` (
  `id` int(11) NOT NULL,
  `public_key` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `group_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1->permission_all_page , 2->check permission',
  `created_by` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_group`
--

INSERT INTO `admin_group` (`id`, `public_key`, `name`, `description`, `status`, `group_type`, `created_by`, `creation_date`, `updated_by`, `updation_date`) VALUES
(1, 'd1655d1ebc', 'Owner', '', 1, 2, 1, '2020-01-15 19:41:10', 0, '0000-00-00 00:00:00'),
(2, 'f891519b59', 'Super Admin', '', 1, 1, 1, '2020-01-15 19:42:41', 1, '2020-01-15 20:18:43'),
(3, 'eb39485d7f', 'Manager', '', 1, 2, 1, '2020-01-16 15:21:12', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_group_permission`
--

CREATE TABLE `admin_group_permission` (
  `id` int(11) NOT NULL,
  `groupId` varchar(20) NOT NULL,
  `permissionKey` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_group_permission`
--

INSERT INTO `admin_group_permission` (`id`, `groupId`, `permissionKey`, `status`, `created_by`, `creation_date`, `updated_by`, `updation_date`) VALUES
(1, 'd1655d1ebc', '[{\"group_name\":\"Owner\"},{\"module_name\":\"All Privallage\",\"permissions\":[{\"name\":\"access\",\"value\":\"1\"}]},{\"module_name\":\"Dashboard\",\"permissions\":[{\"name\":\"read\",\"value\":\"1\"}]},{\"module_name\":\"Blog\",\"permissions\":[{\"name\":\"create\",\"value\":\"1\"},{\"name\":\"update\",\"value\":\"1\"},{\"name\":\"delete\",\"value\":\"1\"}]}]', 0, 1, '2020-01-15 21:09:11', 0, '0000-00-00 00:00:00'),
(2, 'eb39485d7f', '[{\"group_name\":\"Manager\"},{\"module_name\":\"All Privallage\"},{\"module_name\":\"Dashboard\",\"permissions\":[{\"name\":\"read\",\"value\":\"1\"}]},{\"module_name\":\"Blog\",\"permissions\":[{\"name\":\"read\",\"value\":\"1\"},{\"name\":\"create\",\"value\":\"1\"},{\"name\":\"update\",\"value\":\"1\"},{\"name\":\"delete\",\"value\":\"1\"}]}]', 0, 1, '2020-01-16 15:21:30', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `public_key` varchar(15) NOT NULL,
  `groupId` varchar(20) NOT NULL DEFAULT '1',
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pic` varchar(120) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `forget_code` varchar(15) DEFAULT NULL,
  `forget_status` tinyint(4) DEFAULT NULL COMMENT '0 for not change and 1 for change and 2 for time out',
  `forget_date` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '-1',
  `creation_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `updation_date` datetime NOT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `public_key`, `groupId`, `name`, `email`, `profile_pic`, `password`, `phone_no`, `forget_code`, `forget_status`, `forget_date`, `created_by`, `creation_date`, `updated_by`, `updation_date`, `status`) VALUES
(1, '4c24c8455d', 'f891519b59', 'Usman zia', 'usmanzia7864561@gmail.com', 'upload//28458ed2566fc5192c239c2e987ffcd5.jpg', '$2y$10$QLgM6pBjqjDFvsDEHPliQeUmivt9w91lrDqP5ApUOq0KZYIpf9Kma', NULL, '0c6324d602', 1, '2020-01-16 08:44:23', 1, '2020-01-16 08:15:06', 1, '2020-01-16 14:15:32', 1),
(2, '0bf648d9ae', 'd1655d1ebc', 'Abdullah', 'abdullah@gmail.com', NULL, '$2y$10$R4afXgQ7HEX2K5DMWXKOf.ANSfUvSWCfDUJLiLXXwyRw9QgynRIA6', NULL, NULL, NULL, NULL, 1, '2020-01-16 08:16:56', 0, '2020-01-16 12:21:02', 1),
(3, '3759cf63ca', 'eb39485d7f', 'Khuram Khalid', 'kk@gmail.com', 'upload//2df0ad57ddbbf7b4e0d491366484c9aa.jpg', '$2y$10$vnooclh8BI0thASqgMJqSuR.XLnrlziWYyu1/dsPhc/QX2dFswLKa', NULL, NULL, NULL, NULL, 1, '2020-01-16 15:22:10', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_like` tinyint(4) DEFAULT '0' COMMENT '1->like ,0 not',
  `comment` text,
  `blog_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `like_date` datetime NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_like`, `comment`, `blog_id`, `user_id`, `like_date`, `comment_date`) VALUES
(1, 1, NULL, '37f068ea172d0f2', 'b2c0517d4c', '2020-01-20 20:47:16', '0000-00-00 00:00:00'),
(2, 0, NULL, '37f068ea172d0f2', '32f2abe94e', '2020-01-20 21:18:52', '0000-00-00 00:00:00'),
(3, 1, NULL, '45ae46fb7358fd0', '32f2abe94e', '2020-01-20 21:19:06', '0000-00-00 00:00:00'),
(4, 1, NULL, '45ae46fb7358fd0', 'b2c0517d4c', '2020-01-20 21:32:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `message` tinytext NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `phone_no`, `message`, `creation_date`) VALUES
(1, 'Usman', 'Zia', 'usmanzia7864561@gmail.com', '', 'jjjjjjjjjjjjj', '2019-12-31 19:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `event_catagories`
--

CREATE TABLE `event_catagories` (
  `id` int(11) NOT NULL,
  `public_key` varchar(15) NOT NULL,
  `title` varchar(120) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1->approve , 2->delete , 3->not approve, ',
  `created_by` varchar(15) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_catagories`
--

INSERT INTO `event_catagories` (`id`, `public_key`, `title`, `status`, `created_by`, `creation_date`) VALUES
(1, 'd9911d424c', 'Movie', 1, '', '0000-00-00 00:00:00'),
(2, '6ed0af6df5', 'Intertanment', 1, 'b2c0517d4c', '2020-01-03 17:44:25'),
(3, '7d751e5811', 'Intertanment', 1, 'b2c0517d4c', '2020-01-03 17:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `event_file`
--

CREATE TABLE `event_file` (
  `id` int(11) NOT NULL,
  `event_id` varchar(20) NOT NULL,
  `file_path` varchar(150) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_file`
--

INSERT INTO `event_file` (`id`, `event_id`, `file_path`, `file_name`, `file_type`) VALUES
(2, '037c76de98c5519', 'upload/45df73a98f02e1425d7d549b8cbd3b57.mp4', 'main.mp4', 'video/mp4'),
(3, '16dd82d34e77d73', 'upload/396f238938ed72f4d446c34729ff2665.jpg', 'inter first.jpg', 'image/jpeg'),
(4, '2042ee5bfd89057', 'upload/2d086793381f78c3dcff5650af7d6188.jpg', 'inter second.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id` int(11) NOT NULL,
  `public_key` varchar(15) NOT NULL,
  `name` varchar(120) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_industry` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id`, `public_key`, `name`, `status`, `is_industry`, `created_by`, `creation_date`, `updated_by`, `updation_date`) VALUES
(1, 'abcdef12', 'Event Planner', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'abcdef13', 'Entrepreneur', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'abcdef14', 'Business', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'abcdef16', 'Organization', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'abcdef17', 'Non-Profit', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'abcdef18', 'User', 1, 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `public_key` varchar(15) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `public_key`, `name`, `status`, `created_by`, `creation_date`, `updated_by`, `updation_date`) VALUES
(1, '844b842801', 'Advertising', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(2, 'f4dad36056', 'Construction Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(3, '769181afa6', 'Education', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(4, 'c6491761f5', 'Farming', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(5, 'aeb6a9790e', 'Finance', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(6, '6af8a3ecdd', 'Heavy Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(7, '2d4ad32375', 'Information Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(8, '247df4e2ac', 'Infrastructure', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(9, '3222ec70f9', 'Light Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(10, 'f6af649a78', 'Materials', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(11, '9bdee3314f', 'Music Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(12, '0eeddebda0', 'Retail', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(13, '307d0b1983', 'Secondary Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(14, '2dba022871', 'Space', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(15, '4c557fcc41', 'Technology Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(16, 'f9c4153260', 'Tertiary Sector', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(17, '127528bc1d', 'Agriculture Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(18, 'e6b862ed77', 'Creative Industries', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(19, 'd07e357706', 'Entertainment Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(20, 'eecbb331df', 'Fashion', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(21, '476d222ed0', 'Green Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(22, '4b8e0d10d7', 'Hospitality Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(23, '4d3d22b3c9', 'Information Technology', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(24, '6a6b2e6ec7', 'IT Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(25, 'a1c7c4c0e1', 'Manufacturing', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(26, 'bf411b200f', 'Media', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(27, 'ef10a2590e', 'Primary Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(28, '401bca9bd0', 'Robotics', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(29, '0e7624f5ac', 'Service Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(30, '7a1f984e96', 'Space Industry', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00'),
(31, '990a5b7705', 'Telecom', 1, 0, '2019-12-30 14:53:18', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `public_key` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `forget_code` varchar(15) NOT NULL,
  `forget_status` tinyint(4) NOT NULL COMMENT '0 for not change and 1 for change and 2 for time out	',
  `forget_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `public_key`, `name`, `email`, `password`, `phone_no`, `user_type`, `status`, `forget_code`, `forget_status`, `forget_date`, `created_by`, `creation_date`, `updated_by`, `updation_date`) VALUES
(1, 'b2c0517d4c', 'Usman Zia', 'usmanzia7864561@gmail.com', '$2y$10$bHQ1p2IC3H6.w6YcM9M.busCBdtzNpQOWwOz98.WtF81COW/NXU76', '923034079665', 1, 1, '92d2f95909', 1, '2019-12-31 12:08:53', 0, '2020-01-01 15:08:56', 0, '2020-01-02 15:11:41'),
(2, '32f2abe94e', 'Ali Hamza', 'ali@gmail.com', '$2y$10$QVvLHlKLkdk2pdUYtDbgnOSvsREgMXMekf9iN9uIzktaQ1cjuWPGK', '03034079665', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '2020-01-01 16:05:12', 0, '0000-00-00 00:00:00'),
(3, 'd9911d424c', 'Abdullah', 'abubakar@gmail.com', '$2y$10$uIJ1D3.HEtnSD0471EWgX.nLzwJuY62PByE1NNREahHPbVraHIVhS', '03481453148', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '2020-01-01 20:07:52', 0, '0000-00-00 00:00:00'),
(4, '8c1996cfec', 'Chitto', 'chitto@gmail.com', '$2y$10$OVoc/mKEPZpocxBpz4/0DOpVrvJKXQ5fQKcMGQ9790j.Ul7b59GMK', '03314602004', 1, 1, '', 0, '0000-00-00 00:00:00', 0, '2020-01-01 20:09:02', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_additional_info`
--

CREATE TABLE `user_additional_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `identity_id` varchar(15) NOT NULL,
  `profile_image` varchar(120) NOT NULL,
  `cover_image` varchar(120) NOT NULL,
  `caption` varchar(110) NOT NULL,
  `about` longtext NOT NULL,
  `website_link` varchar(200) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `followers` int(11) NOT NULL DEFAULT '0',
  `fellow` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_additional_info`
--

INSERT INTO `user_additional_info` (`id`, `user_id`, `identity_id`, `profile_image`, `cover_image`, `caption`, `about`, `website_link`, `address`, `followers`, `fellow`) VALUES
(1, 'b2c0517d4c', 'abcdef14', 'upload//8766311eaeacc1662d6192b5b4b935dc.jpg', 'upload//696d8f4df2c27a17035939e4bf976ac7.jpg', 'I never start what i cant finish', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta vitae voluptatibus laudantium rem, reiciendis ad suscipit molestiae eos soluta. Sint dolorum illo odio optio explicabo nihil officiis ipsam quia. Unde?', 'https://web.whatsapp.com/', '', 0, 0),
(2, '32f2abe94e', 'abcdef16', 'upload//586bb05e7a8834910e0e5d835367d440.jpg', '', '', '', NULL, '', 0, 0),
(3, 'd9911d424c', 'abcdef18', '', '', '', '', NULL, '', 0, 0),
(4, '8c1996cfec', 'abcdef14', 'upload//61b7fdf1a756fd8459e61a90cd4f3f5a.jpg', 'upload//b2fb9d9103f24924d74c184dda00dfd7.jpg', '', '', NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_catagories`
--

CREATE TABLE `user_catagories` (
  `id` int(11) NOT NULL,
  `event_id` varchar(20) NOT NULL,
  `catagory_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_catagories`
--

INSERT INTO `user_catagories` (`id`, `event_id`, `catagory_id`) VALUES
(1, '', 'd9911d424c'),
(2, '', '6ed0af6df5'),
(3, '', 'd9911d424c'),
(4, '', '6ed0af6df5'),
(5, 'cc6cf48916210ac', 'd9911d424c'),
(6, 'cc6cf48916210ac', '6ed0af6df5'),
(7, '037c76de98c5519', 'd9911d424c'),
(8, '037c76de98c5519', '6ed0af6df5'),
(9, '16dd82d34e77d73', '6ed0af6df5'),
(10, '2042ee5bfd89057', 'd9911d424c');

-- --------------------------------------------------------

--
-- Table structure for table `user_event`
--

CREATE TABLE `user_event` (
  `id` int(11) NOT NULL,
  `public_key` varchar(20) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_location_type` tinyint(4) NOT NULL COMMENT 'Location type ,1->physical , 2-> promo evnet',
  `event_address` varchar(300) NOT NULL,
  `refer_website_link` varchar(150) DEFAULT NULL,
  `description` varchar(260) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `ticket_link` varchar(150) DEFAULT NULL,
  `event_type` tinyint(4) NOT NULL COMMENT '1->open , 2->private',
  `status` tinyint(4) NOT NULL COMMENT '1->active , 2->draft',
  `created_by` varchar(15) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_event`
--

INSERT INTO `user_event` (`id`, `public_key`, `user_id`, `event_title`, `event_location_type`, `event_address`, `refer_website_link`, `description`, `start_date`, `end_date`, `ticket_link`, `event_type`, `status`, `created_by`, `creation_date`, `updated_by`, `updation_date`) VALUES
(1, '037c76de98c5519', 'b2c0517d4c', 'First Event', 1, 'Gujrat, Punjab, Pakistan', 'https://trello.com/c/Rku5ngbY/4-create-an-event-process', 'https://trello.com/c/Rku5ngbY/4-create-an-event-process', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 1, '', '2020-01-03 18:18:59', '', NULL),
(2, '16dd82d34e77d73', 'b2c0517d4c', 'Have a sporting event coming up? Let your friends know!', 2, 'Gujrat, Punjab, Pakistan', 'https://trello.com/c/Rku5ngbY/4-create-an-event-process', 'Softball night is back in full affect.  Come join me for some fun in the sun.\r\n\r\n \r\n\r\n Location:\r\n\r\nJack\'s Park\r\n\r\nTime: 6:30 p.m. to 9:30 p.m.\r\n\r\nDate: July 30th\r\n\r\nAddress: 451 Adams St, Monterey, CA 93940', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, 2, '', '2020-01-04 11:24:46', '', NULL),
(3, '2042ee5bfd89057', 'b2c0517d4c', 'First Event', 2, 'Gjjj', 'https://trello.com/c/Rku5ngbY/4-create-an-event-process', '$start_time', '2020-01-04 15:36:00', '2020-01-17 15:36:00', '', 1, 2, '', '2020-01-04 12:41:41', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE `user_files` (
  `id` int(11) NOT NULL,
  `file_path` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(80) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `file_path`, `type`, `name`, `user_id`, `creation_date`) VALUES
(5, 'upload//bb7e6ce1bd66c9949bfd0e9787e6e435.jpg', 'image/jpeg', '1.4.jpg', 'b2c0517d4c', '2020-01-02 02:36:32'),
(7, 'upload//e08d2dfb9a8982ff7377efc982b76d71.jpg', 'image/jpeg', '1.4.jpg', 'b2c0517d4c', '2020-01-02 02:38:37'),
(8, 'upload//2d770b5d2d9630da2e06f37e99ac9529.mp4', 'video/mp4', 'main.mp4', 'b2c0517d4c', '2020-01-04 05:19:22'),
(9, 'upload//bcf557524e5c62c06a96d39ae330ba72.jpg', 'image/jpeg', 'cover-img-3.jpg', '8c1996cfec', '2020-01-06 08:38:40'),
(10, 'upload//210c51748c6e8836f247c02af78f2de6.jpg', 'image/jpeg', 'cover-img-2.jpg', '8c1996cfec', '2020-01-06 08:38:49'),
(11, 'upload//4fc6834159bc88122fedbcd7fb6cc7ad.jpg', 'image/jpeg', 'cover-img-1.jpg', '8c1996cfec', '2020-01-06 08:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_follow`
--

CREATE TABLE `user_follow` (
  `id` int(11) NOT NULL,
  `follow_id` varchar(15) DEFAULT NULL,
  `following_id` varchar(15) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_follow`
--

INSERT INTO `user_follow` (`id`, `follow_id`, `following_id`, `date`) VALUES
(7, 'b2c0517d4c', '32f2abe94e', '2020-01-01 20:03:30'),
(11, 'b2c0517d4c', '8c1996cfec', '2020-01-02 10:36:24'),
(12, '32f2abe94e', '8c1996cfec', '2020-01-02 10:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_industry`
--

CREATE TABLE `user_industry` (
  `id` int(11) NOT NULL,
  `industry_id` varchar(15) NOT NULL,
  `user_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_industry`
--

INSERT INTO `user_industry` (`id`, `industry_id`, `user_id`) VALUES
(3, 'f4dad36056', ''),
(4, '2d4ad32375', ''),
(5, '6a6b2e6ec7', ''),
(6, 'f4dad36056', ''),
(7, '2d4ad32375', ''),
(8, '6a6b2e6ec7', ''),
(12, '844b842801', '32f2abe94e'),
(13, '844b842801', 'd9911d424c'),
(14, '844b842801', '8c1996cfec'),
(15, '990a5b7705', '8c1996cfec'),
(16, 'f4dad36056', 'b2c0517d4c'),
(17, '2d4ad32375', 'b2c0517d4c'),
(18, '6a6b2e6ec7', 'b2c0517d4c');

-- --------------------------------------------------------

--
-- Table structure for table `user_report`
--

CREATE TABLE `user_report` (
  `id` int(11) NOT NULL,
  `report_user_id` varchar(15) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_report`
--

INSERT INTO `user_report` (`id`, `report_user_id`, `user_id`, `message`, `date`) VALUES
(1, 'd9911d424c', '8c1996cfec', 'Offensive Media', '2020-01-02 10:43:00'),
(2, '8c1996cfec', 'b2c0517d4c', 'Offensive Media', '2020-01-02 18:15:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_blog`
--
ALTER TABLE `admin_blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_key` (`public_key`);

--
-- Indexes for table `admin_blog_media`
--
ALTER TABLE `admin_blog_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groupName` (`name`),
  ADD UNIQUE KEY `public_key` (`public_key`);

--
-- Indexes for table `admin_group_permission`
--
ALTER TABLE `admin_group_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groupId` (`groupId`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminEmail_UNIQUE` (`email`),
  ADD UNIQUE KEY `public_key` (`public_key`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_catagories`
--
ALTER TABLE `event_catagories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_key` (`public_key`);

--
-- Indexes for table `event_file`
--
ALTER TABLE `event_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_key` (`public_key`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_key` (`public_key`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_additional_info`
--
ALTER TABLE `user_additional_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_catagories`
--
ALTER TABLE `user_catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_event`
--
ALTER TABLE `user_event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_key` (`public_key`);

--
-- Indexes for table `user_files`
--
ALTER TABLE `user_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_follow`
--
ALTER TABLE `user_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_industry`
--
ALTER TABLE `user_industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_blog`
--
ALTER TABLE `admin_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_blog_media`
--
ALTER TABLE `admin_blog_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_group_permission`
--
ALTER TABLE `admin_group_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_catagories`
--
ALTER TABLE `event_catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_file`
--
ALTER TABLE `event_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_additional_info`
--
ALTER TABLE `user_additional_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_catagories`
--
ALTER TABLE `user_catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_event`
--
ALTER TABLE `user_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_follow`
--
ALTER TABLE `user_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_industry`
--
ALTER TABLE `user_industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_report`
--
ALTER TABLE `user_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
