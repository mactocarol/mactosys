-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2018 at 03:16 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musician`
--

-- --------------------------------------------------------

--
-- Table structure for table `ba_admin`
--

CREATE TABLE `ba_admin` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'no_image.jpg',
  `key` varchar(255) NOT NULL,
  `is_login` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` varchar(100) DEFAULT NULL,
  `transaction_fee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_admin`
--

INSERT INTO `ba_admin` (`id`, `f_name`, `l_name`, `email`, `username`, `password`, `image`, `key`, `is_login`, `created_at`, `last_login`, `transaction_fee`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1526988576images.png', 'ab897fd36ffb113a05b0485be5e33366', NULL, '2018-02-21 13:08:09', NULL, '5');

-- --------------------------------------------------------

--
-- Table structure for table `ba_album`
--

CREATE TABLE `ba_album` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_album`
--

INSERT INTO `ba_album` (`id`, `title`, `user_id`, `status`, `created_at`) VALUES
(2, 'my album', 17, 1, '2018-06-08 11:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `ba_album_list`
--

CREATE TABLE `ba_album_list` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_album_list`
--

INSERT INTO `ba_album_list` (`id`, `album_id`, `product_id`, `created_at`) VALUES
(4, 2, 20, '2018-06-08 11:12:51'),
(5, 2, 24, '2018-06-08 11:12:51'),
(6, 2, 22, '2018-06-08 11:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `ba_booking`
--

CREATE TABLE `ba_booking` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_amt` varchar(100) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `payment_type` enum('1','2','3') NOT NULL COMMENT '1 => monthly fee,   2 => order amt,  3 => transactiion fee',
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_booking`
--

INSERT INTO `ba_booking` (`id`, `order_id`, `user_id`, `txn_id`, `payment_amt`, `currency_code`, `payment_type`, `status`, `created_at`) VALUES
(6, 'ORDER_1528194177', 17, '5YW96205K93387350', '1.99', 'USD', '1', 'Completed', '2018-06-05 10:23:21'),
(7, 'ORDER_1528194228', 17, '2WY5124559764250J', '6.99', 'USD', '1', 'Completed', '2018-06-05 10:24:13'),
(8, 'ORDER_1528194548', 17, '3D188828HJ289231R', '1.99', 'USD', '1', 'Completed', '2018-06-05 10:29:55'),
(9, 'ORDER_1528197651', 17, '73837543X2946654C', '1.99', 'USD', '1', 'Completed', '2018-06-05 11:21:39'),
(10, NULL, 17, '92A34455H7836611H', '6.99', 'USD', '1', 'Completed', '2018-06-05 11:37:44'),
(12, 'ORDER_5b1e6614b57a6', 17, '0B416200DJ843794W', '0.7', 'USD', '2', 'Completed', '2018-06-11 12:10:44'),
(13, 'ORDER_5b1e6749743d2', 17, '39L77860H1957413D', '1.05', 'USD', '2', 'Completed', '2018-06-11 12:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `ba_category`
--

CREATE TABLE `ba_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_category`
--

INSERT INTO `ba_category` (`id`, `name`, `status`, `icon`, `created_at`) VALUES
(1, 'Actor', NULL, 'icon-1.png', '2018-05-24 08:19:11'),
(2, 'Choreographer', NULL, 'icon-2.png', '2018-05-24 08:19:25'),
(3, 'Dancer', NULL, 'icon-3.png', '2018-05-24 08:19:37'),
(4, 'Singer', NULL, 'icon-4.png', '2018-05-24 08:19:51'),
(5, 'Musician', NULL, 'icon-5.png', '2018-05-24 08:20:03'),
(6, 'Model', NULL, 'icon-6.png', '2018-05-24 08:20:14'),
(7, 'Director', NULL, 'icon-7.png', '2018-05-24 08:20:24'),
(8, 'Others', NULL, 'icon-8.png', '2018-05-24 08:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `ba_ci_sessions`
--

CREATE TABLE `ba_ci_sessions` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob,
  `session_id` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` varchar(255) NOT NULL,
  `user_data` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_ci_sessions`
--

INSERT INTO `ba_ci_sessions` (`id`, `ip_address`, `timestamp`, `data`, `session_id`, `user_agent`, `last_activity`, `user_data`) VALUES
(220, '::1', 0, NULL, '72038a02b4317b836ca474a05f3db810', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36', '1530511255', 'a:6:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"17";s:5:"email";s:8:"infotech";s:5:"image";N;s:13:"user_group_id";i:2;s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `ba_contract`
--

CREATE TABLE `ba_contract` (
  `id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `sender_sign` varchar(255) DEFAULT NULL,
  `reciever_sign` varchar(255) DEFAULT NULL,
  `status` enum('1','2','3') NOT NULL COMMENT '1=>pending,2=>accepted,3=>declined',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ba_genre`
--

CREATE TABLE `ba_genre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_genre`
--

INSERT INTO `ba_genre` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Hollywood', NULL, '2018-06-02 13:11:23'),
(2, 'Classical', NULL, '2018-06-02 13:11:34'),
(3, 'Romantic', NULL, '2018-06-02 13:11:42'),
(4, 'Sad', NULL, '2018-06-02 13:11:50'),
(5, 'Patriotic', NULL, '2018-06-02 13:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `ba_jobs`
--

CREATE TABLE `ba_jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `job_type` enum('1','2','3','4') NOT NULL COMMENT '1=>full time,2=>part-time, 3=>hourly time, 4=>freelancer',
  `status` enum('1','2') NOT NULL COMMENT '1=>open,2=>close',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_jobs`
--

INSERT INTO `ba_jobs` (`id`, `title`, `description`, `category`, `salary`, `gender`, `location`, `specialization`, `job_type`, `status`, `user_id`, `created_at`) VALUES
(1, 'testing', '<p><strong>This is Testings</strong></p>\n', '4', '50000+', 'All', 'Indore', 'test', '1', '1', 17, '2018-06-06 12:54:26'),
(2, 'Female Model Required', '<p>Female Model Required to work with our product advertisement.</p>\n', '6', '200000 - 300000', 'Female', 'Indore', 'advertisement', '4', '1', 17, '2018-06-06 12:56:34'),
(3, 'Male Actor Required', '<p>Male Actor Required for a comedy role to work with our serial.</p>\n', '1', '800000 - 900000', 'Male', 'Indore', 'Comedian', '1', '1', 17, '2018-04-17 12:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `ba_jobs_applied`
--

CREATE TABLE `ba_jobs_applied` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `apply_by` int(11) NOT NULL,
  `proposal` text NOT NULL,
  `resume` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '1=>pending, 2=>Approve',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_jobs_applied`
--

INSERT INTO `ba_jobs_applied` (`id`, `job_id`, `apply_by`, `proposal`, `resume`, `file`, `status`, `created_at`) VALUES
(3, 3, 17, '<p>i would like to work eith you</p>\n', 'hotel_update_17_01_18.txt', 'small1.mp4', '1', '2018-06-07 08:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `ba_membership`
--

CREATE TABLE `ba_membership` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `valid_from` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_membership`
--

INSERT INTO `ba_membership` (`id`, `user_id`, `plan_id`, `valid_from`, `created_at`) VALUES
(2, 17, 2, NULL, '2018-06-05 10:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `ba_membership_plan`
--

CREATE TABLE `ba_membership_plan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `limit` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_membership_plan`
--

INSERT INTO `ba_membership_plan` (`id`, `title`, `amount`, `validity`, `limit`, `created_at`) VALUES
(1, 'Free', '0', '-1', 0, '2018-06-04 11:08:46'),
(2, 'silver', '1.99', '30', 5, '2018-06-04 11:08:46'),
(3, 'Gold', '6.99', '30', -1, '2018-06-04 11:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `ba_offer`
--

CREATE TABLE `ba_offer` (
  `id` int(11) NOT NULL,
  `offer_from` int(11) NOT NULL,
  `offer_to` int(11) NOT NULL,
  `requirement` text NOT NULL,
  `offer` text NOT NULL,
  `days` int(11) DEFAULT NULL,
  `offer_amount` varchar(255) DEFAULT NULL,
  `task` varchar(255) NOT NULL,
  `milestone_amt` varchar(255) DEFAULT NULL,
  `milestone_days` varchar(255) DEFAULT NULL,
  `negotiated` text,
  `status` enum('1','2','3','4') NOT NULL COMMENT '1=>pending,2=>accepted,3=>negotiated,4=>declined',
  `is_contract_signed` enum('0','1') NOT NULL COMMENT '0=>no, 1=>yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_offer`
--

INSERT INTO `ba_offer` (`id`, `offer_from`, `offer_to`, `requirement`, `offer`, `days`, `offer_amount`, `task`, `milestone_amt`, `milestone_days`, `negotiated`, `status`, `is_contract_signed`, `created_at`) VALUES
(1, 17, 16, '<p>1. Lorem epsum&nbsp;Lorem epsum&nbsp;Lorem epsum</p>\n\n<p>2.&nbsp;Lorem epsum&nbsp;Lorem epsumv&nbsp;Lorem epsumLorem epsumLorem epsumLorem epsumLorem epsum</p>\n\n<p>3.&nbsp;Lorem epsumLorem epsumLorem epsumLorem epsum</p>\n\n<p>4.&nbsp;Lorem epsumLorem epsumLorem epsumLorem epsumLorem epsumLorem epsum</p>\n', '<p>1.Lorem epsumLorem epsumLorem epsum</p>\n\n<p>2.Lorem epsumLorem epsumLorem epsumLorem epsum</p>\n\n<p>3.Lorem epsumLorem epsumLorem epsumLorem epsumLorem epsumLorem epsumLorem epsum</p>\n', 10, '100', 'dance', '["50","50"]', '["4","6"]', NULL, '1', '0', '2018-06-12 10:34:59'),
(4, 16, 17, '<p>ad asb &nbsp;uadfqf vdv g vs grg ds&nbsp;</p>\n', '<p>fwfevcwe wfwegw gwefsv sv&nbsp;</p>\n', 10, '300', 'song', '["100","200"]', '["5","5"]', NULL, '2', '1', '2018-06-14 08:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `ba_order`
--

CREATE TABLE `ba_order` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `payment_status` enum('1','2','3') NOT NULL COMMENT '''1=>pending, 2=>completed, 3=>cancelled''',
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_order`
--

INSERT INTO `ba_order` (`id`, `order_no`, `payment_type`, `user_id`, `amount`, `payment_status`, `transaction_id`, `created_at`) VALUES
(8, 'ORDER_5b1e6614b57a6', '0', 17, '10', '2', '0B416200DJ843794W', '2018-06-11 12:07:48'),
(9, 'ORDER_5b1e6749743d2', '0', 17, '15', '2', '39L77860H1957413D', '2018-06-11 12:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `ba_order_detail`
--

CREATE TABLE `ba_order_detail` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_order_detail`
--

INSERT INTO `ba_order_detail` (`id`, `order_id`, `product_id`, `amount`, `qty`, `created_at`) VALUES
(19, 'ORDER_5b1e6614b57a6', 24, '5', 1, '2018-06-11 12:07:48'),
(20, 'ORDER_5b1e6614b57a6', 15, '5', 1, '2018-06-11 12:07:48'),
(21, 'ORDER_5b1e6749743d2', 15, '5', 1, '2018-06-11 12:12:57'),
(22, 'ORDER_5b1e6749743d2', 24, '5', 1, '2018-06-11 12:12:57'),
(23, 'ORDER_5b1e6749743d2', 20, '5', 1, '2018-06-11 12:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `ba_pages`
--

CREATE TABLE `ba_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_pages`
--

INSERT INTO `ba_pages` (`id`, `title`, `description`, `email`, `phone`, `created_at`) VALUES
(1, 'about-us', '<p><strong>About Us</strong></p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n', '', '', '2018-03-20 05:53:24'),
(2, 'contact-us', '<p><strong>Address</strong></p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n', 'info@suxxis.com', '9876543210', '2018-03-20 05:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `ba_products`
--

CREATE TABLE `ba_products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `file_type` enum('1','2','3') NOT NULL COMMENT '1 => video,   2 => audio,  3 => picture',
  `price` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_products`
--

INSERT INTO `ba_products` (`id`, `title`, `file`, `genre`, `file_type`, `price`, `user_id`, `status`, `created_at`) VALUES
(15, 'testing', 'videosSampleVideo_720x480_1mb.mp4', 1, '1', '5', 17, '0', '2018-05-25 05:31:18'),
(16, 'small', 'small.mp4', 3, '1', '5', 16, '0', '2018-05-25 05:51:05'),
(20, 'Instagram', 'small3.mp4', 2, '1', '5', 17, '0', '2018-06-05 12:37:34'),
(22, 'tests', '67chevtk34.jpg', 3, '3', '5', 16, '0', '2018-06-02 12:45:31'),
(24, 'test', 'audio.mp3', 4, '2', '5', 17, '0', '2018-06-02 12:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `ba_transactions`
--

CREATE TABLE `ba_transactions` (
  `id` int(11) NOT NULL,
  `paid_from` int(11) NOT NULL,
  `paid_to` int(11) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `video_share_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_transactions`
--

INSERT INTO `ba_transactions` (`id`, `paid_from`, `paid_to`, `amount`, `status`, `video_share_id`, `created_at`) VALUES
(1, 17, 1, '5', 0, 1, '2018-05-28 08:15:06'),
(2, 1, 22, '4.75', 0, NULL, '2018-05-28 08:21:34'),
(3, 17, 1, '5', 0, 2, '2018-05-28 09:21:56'),
(4, 1, 22, '4.75', 0, NULL, '2018-05-28 09:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `ba_users`
--

CREATE TABLE `ba_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `image` varchar(100) NOT NULL DEFAULT 'no_image.jpg',
  `category` varchar(255) DEFAULT NULL COMMENT 'free or pro',
  `skills` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `dob` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `user_type` enum('1','2') NOT NULL COMMENT '1 => enterprenuer, 2 => investor',
  `account_type` varchar(100) NOT NULL,
  `account_valid` varchar(255) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `is_verified` enum('0','1') NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `is_login` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_users`
--

INSERT INTO `ba_users` (`id`, `email`, `username`, `companyname`, `contact`, `password`, `image`, `category`, `skills`, `designation`, `experience`, `dob`, `address`, `nationality`, `user_type`, `account_type`, `account_valid`, `payment_type`, `subscription_id`, `is_verified`, `key`, `is_login`, `created_at`, `last_login`) VALUES
(16, 'alex@gmail.com', 'alex', NULL, '9865743232', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', 'Computer & IT services', 'Artificial Intelligence', 'Analyst', '3', '', '', '', '2', '', '', '', 0, '1', NULL, NULL, '2018-05-22 12:36:33', NULL),
(17, 'info@gmail.com', 'infotech', 'i-infotech', '9865756982', 'e10adc3949ba59abbe56e057f20f883e', '1527148955user.png', 'Computer & IT services', '0', '0', '0', '', '', '', '1', 'pro', '2018-07-04 11:21:39', 'recurring', 14, '1', NULL, NULL, '2018-05-22 12:36:33', NULL),
(18, 'info@makaan.com', 'test', 'Makaan.com', '98978653231', '123456', 'no_image.jpg', 'Building & Manufacturing', NULL, NULL, NULL, '', '', '', '1', '', '', '', 0, '1', NULL, NULL, '2018-05-23 05:22:37', NULL),
(19, 'info@agrochemical.com', 'agrochemical', 'Agro Chemical & Fertilizers Pvt Ltd.', '12165456484', '123456', 'no_image.jpg', 'Agriculture & Development', NULL, NULL, NULL, '', '', '', '1', '', '', '', 0, '1', NULL, NULL, '2018-05-23 05:28:43', NULL),
(21, 'david@gmail.com', 'David', NULL, '6985478596', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', 'Agriculture & Development', 'agro analyst, chemical ', 'chemical Analyst', '', '', '', '', '2', '', '', '', 0, '1', NULL, NULL, '2018-05-23 05:45:39', NULL),
(22, 'bob@gmail.com', 'Bob', NULL, '9865743232', 'e10adc3949ba59abbe56e057f20f883e', '1527147487download.jpg', 'Electronic & Appliances', 'smartphones, digital equipment, electronics, gadgets', 'Gadget Analyst', '2', '', '', '', '2', '', '', '', 0, '1', 'acd884b22645b6894094c1bbac289da7', NULL, '2018-05-23 05:51:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ba_user_payment`
--

CREATE TABLE `ba_user_payment` (
  `id` int(11) NOT NULL,
  `paid_from` int(11) NOT NULL,
  `paid_to` int(11) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `video_share_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_user_payment`
--

INSERT INTO `ba_user_payment` (`id`, `paid_from`, `paid_to`, `amount`, `status`, `video_share_id`, `created_at`) VALUES
(1, 17, 22, '5', 2, 1, '2018-05-28 08:15:06'),
(2, 17, 22, '5', 2, 2, '2018-05-28 09:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `ba_user_subscriptions`
--

CREATE TABLE `ba_user_subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `payment_method` enum('paypal') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'paypal',
  `validity` int(5) NOT NULL COMMENT 'in month(s)',
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subscr_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ba_user_subscriptions`
--

INSERT INTO `ba_user_subscriptions` (`id`, `user_id`, `payment_method`, `validity`, `valid_from`, `valid_to`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `subscr_id`, `payer_email`, `payment_status`) VALUES
(14, 4, 'paypal', 1, '2018-05-31 09:28:06', '2018-06-29 09:28:06', 'MS', '2V99418466278381T', 5.00, 'USD', 'I-W1UTPX02AAMV', 'mss.parvezkhan-buyer@gmail.com', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `ba_video_feedback`
--

CREATE TABLE `ba_video_feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_share_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_video_feedback`
--

INSERT INTO `ba_video_feedback` (`id`, `user_id`, `video_share_id`, `feedback`, `status`, `created_at`) VALUES
(2, 22, 1, '<p>&nbsp;</p>\n\n<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\n', 0, '2018-05-28 08:19:45'),
(3, 22, 2, '<p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></p>\n', 0, '2018-05-28 09:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `ba_video_share`
--

CREATE TABLE `ba_video_share` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_video_share`
--

INSERT INTO `ba_video_share` (`id`, `sender_id`, `receiver_id`, `video_id`, `amount`, `status`, `created_at`) VALUES
(1, 17, 22, 15, '5', 2, '2018-05-28 08:15:05'),
(2, 17, 22, 15, '5', 2, '2018-05-28 09:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `ba_wallet`
--

CREATE TABLE `ba_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ba_wallet`
--

INSERT INTO `ba_wallet` (`id`, `user_id`, `amount`, `user_type`, `created_at`) VALUES
(4, 0, '1.75', 0, '2018-04-11 06:17:09'),
(10, 17, '13.95', 1, '2018-04-11 06:17:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ba_admin`
--
ALTER TABLE `ba_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_album`
--
ALTER TABLE `ba_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_album_list`
--
ALTER TABLE `ba_album_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_booking`
--
ALTER TABLE `ba_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_category`
--
ALTER TABLE `ba_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_ci_sessions`
--
ALTER TABLE `ba_ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ba_contract`
--
ALTER TABLE `ba_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_genre`
--
ALTER TABLE `ba_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_jobs`
--
ALTER TABLE `ba_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_jobs_applied`
--
ALTER TABLE `ba_jobs_applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_membership`
--
ALTER TABLE `ba_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_membership_plan`
--
ALTER TABLE `ba_membership_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_offer`
--
ALTER TABLE `ba_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_order`
--
ALTER TABLE `ba_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_order_detail`
--
ALTER TABLE `ba_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_pages`
--
ALTER TABLE `ba_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_products`
--
ALTER TABLE `ba_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_transactions`
--
ALTER TABLE `ba_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_users`
--
ALTER TABLE `ba_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_user_payment`
--
ALTER TABLE `ba_user_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_user_subscriptions`
--
ALTER TABLE `ba_user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_video_feedback`
--
ALTER TABLE `ba_video_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_video_share`
--
ALTER TABLE `ba_video_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ba_wallet`
--
ALTER TABLE `ba_wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ba_admin`
--
ALTER TABLE `ba_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ba_album`
--
ALTER TABLE `ba_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ba_album_list`
--
ALTER TABLE `ba_album_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ba_booking`
--
ALTER TABLE `ba_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ba_category`
--
ALTER TABLE `ba_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ba_ci_sessions`
--
ALTER TABLE `ba_ci_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT for table `ba_contract`
--
ALTER TABLE `ba_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ba_genre`
--
ALTER TABLE `ba_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ba_jobs`
--
ALTER TABLE `ba_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ba_jobs_applied`
--
ALTER TABLE `ba_jobs_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ba_membership`
--
ALTER TABLE `ba_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ba_membership_plan`
--
ALTER TABLE `ba_membership_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ba_offer`
--
ALTER TABLE `ba_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ba_order`
--
ALTER TABLE `ba_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ba_order_detail`
--
ALTER TABLE `ba_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `ba_pages`
--
ALTER TABLE `ba_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ba_products`
--
ALTER TABLE `ba_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ba_transactions`
--
ALTER TABLE `ba_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ba_users`
--
ALTER TABLE `ba_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ba_user_payment`
--
ALTER TABLE `ba_user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ba_user_subscriptions`
--
ALTER TABLE `ba_user_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ba_video_feedback`
--
ALTER TABLE `ba_video_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ba_video_share`
--
ALTER TABLE `ba_video_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ba_wallet`
--
ALTER TABLE `ba_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
