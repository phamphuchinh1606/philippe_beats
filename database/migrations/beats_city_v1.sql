-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 08:17 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beats_city_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `is_delete`) VALUES
(1, 'Share bai viet1111', 'Share bai viet se duoc diem', '2018-09-05 17:29:39', '2018-09-05 17:30:59', NULL, 0),
(2, 'Aciont 02', 'sdfsdfsdf', '2018-09-05 18:13:20', '2018-09-05 18:13:20', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` tinytext,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `venue_id`, `title`, `sub_title`, `description`, `start_date`, `end_date`, `status`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'send to hoang nguyen', 'Noi dung nay rat hay do nha', '222222', '2018-09-17 17:07:20', '2018-09-29 17:07:20', 'Un Public', '1536167213.png', '2018-09-05 16:51:32', '2018-09-05 17:07:20', NULL),
(2, 4, 'Event 02', 'Event 02', 'sdfsdfsdf', '2018-09-05 18:13:00', '2018-09-13 18:13:00', 'Public', '1536171180.png', '2018-09-05 18:13:00', '2018-09-05 18:13:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_beats`
--

CREATE TABLE `event_beats` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `points` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_beats`
--

INSERT INTO `event_beats` (`id`, `event_id`, `action_id`, `points`, `comments`, `is_delete`, `updated_at`, `created_at`) VALUES
(1, 2, 2, '9', 'dfsfsfsfdsfds111111', 0, '2018-09-05 18:13:34', '2018-09-05 18:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` VARCHAR(100) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image_profile` varchar(200) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `facebook_id` varchar(45) DEFAULT NULL,
  `instagram_id` varchar(45) DEFAULT NULL,
  `token_api` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `remember_token`, `mobile`, `facebook_id`, `instagram_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, 'phamphuchinh1606@gmail.com', '$2y$10$mzFcwbPAwg1eIGOr6sSdpO8nqOlBi2j4b4TR82Mn.LuRx/7fFzyLK', 'IyUZlOxpHJe7vhWZQc31Y2jrFn3DMUvG2rpjlrFJGwIvpCrBfvGxZsxd2DPo', NULL, NULL, NULL, '2018-09-05 13:01:54', '2018-09-05 13:01:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_beats`
--

CREATE TABLE `user_beats` (
  `id` int(11) NOT NULL,
  `points` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(11) NOT NULL,
  `venue_type_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `ward` varchar(45) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `long` varchar(20) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue_type_id`, `name`, `address`, `ward`, `district`, `city`, `long`, `lat`, `image`, `created_at`, `updated_at`, `deleted_at`, `is_delete`) VALUES
(2, NULL, 'Vung Tau', '2323', 'Quận 2', 'Phường 3', 'Hồ Chí Minh', NULL, NULL, '1536162086.png', '2018-09-05 15:41:26', '2018-09-05 15:41:26', NULL, 0),
(3, 1, 'Product new', '11111', 'Quận 1', 'Phường 1', 'Hồ Chí Minh', NULL, NULL, '1536163501.png', '2018-09-05 15:59:53', '2018-09-05 16:06:05', NULL, 0),
(4, 3, 'Product new 2', 'sdfsdfsdfsfd', 'Quận 4', 'Phường 1', 'Đà Nẵng', NULL, NULL, '1536163886.png', '2018-09-05 16:11:26', '2018-09-05 16:11:26', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue_type`
--

CREATE TABLE `venue_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venue_type`
--

INSERT INTO `venue_type` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `is_delete`) VALUES
(1, 'Bar', '2018-09-05 13:39:50', '2018-09-05 13:56:32', NULL, 0),
(2, 'Restaurant', '2018-09-05 13:56:41', '2018-09-05 13:56:41', NULL, 0),
(3, 'Hotel', '2018-09-05 13:56:51', '2018-09-05 13:56:51', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--
CREATE TABLE `social_accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(100) NOT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `tokenSecret` varchar(100) DEFAULT NULL,
  `nickname` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_beats`
--
ALTER TABLE `event_beats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_beats`
--
ALTER TABLE `user_beats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue_type`
--
ALTER TABLE `venue_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_beats`
--
ALTER TABLE `event_beats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue_type`
--
ALTER TABLE `venue_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
