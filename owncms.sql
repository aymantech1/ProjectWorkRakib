-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2016 at 07:33 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `owncms`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `html_summary` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `html_details` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `users_id`, `title`, `sub_title`, `summary`, `html_summary`, `details`, `html_details`, `created_at`, `modified_at`, `deleted_at`) VALUES
(117, 75, 'Rakib Hossain', 'Rakib Hoss', 'In China, SMS is very popular and has brought service providers significant profit (18 billion short messages were sent in 2001).&nbsp;It is a very influential and powerful tool in the Philippines, where the average user sends 10&ndash;12 text messages a ', '<p>In China, SMS is very popular and has brought service providers significant profit (18 billion short messages were sent in 2001).&nbsp;It is a very influential and powerful tool in the Philippines, where the average user sends 10&ndash;12 text messages', 'In China, SMS is very popular and has brought service providers significant profit (18 billion short messages were sent in 2001).&nbsp;It is a very influential and powerful tool in the Philippines, where the average user sends 10&ndash;12 text messages a ', '<p>In China, SMS is very popular and has brought service providers significant profit (18 billion short messages were sent in 2001).&nbsp;It is a very influential and powerful tool in the Philippines, where the average user sends 10&ndash;12 text messages', '2016-04-27 11:51:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 75, 'ivy', 'ivy', 'Wi-Fi can provide you with added coverage in places where cell networks don&#39;t always work - like basements and apartments. No roaming fees for Wi-Fi connections also means you stay connected while travelling the world.Wi-Fi can provide you with added ', '<p>Wi-Fi can provide you with added coverage in places where cell networks don&#39;t always work - like basements and apartments. No roaming fees for Wi-Fi connections also means you stay connected while travelling the world.Wi-Fi can provide you with add', 'Wi-Fi can provide you with added coverage in places where cell networks don&#39;t always work - like basements and apartments. No roaming fees for Wi-Fi connections also means you stay connected while travelling the world.Wi-Fi can provide you with added ', '<p>Wi-Fi can provide you with added coverage in places where cell networks don&#39;t always work - like basements and apartments. No roaming fees for Wi-Fi connections also means you stay connected while travelling the world.Wi-Fi can provide you with add', '2016-04-27 11:54:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 75, 'joni', 'joni', 'This text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented, aligned, and the space between characters is specified. The underline is removed from this c', '<p>This text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented, aligned, and the space between characters is specified. The underline is removed from thi', 'This text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented, aligned, and the space between characters is specified. The underline is removed from this c', '<p>This text is styled with some of the text formatting properties. The heading uses the text-align, text-transform, and color properties. The paragraph is indented, aligned, and the space between characters is specified. The underline is removed from thi', '2016-04-27 12:15:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 75, '', '', 'post contents', '<p>post contents</p>', 'post contents', '<p>post contents</p>', '2016-04-27 13:16:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 75, '', '', 'post contents', '<p>post contents</p>', 'post contents', '<p>post contents</p>', '2016-04-27 23:32:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 75, '', '', 'post contents', '<p>post contents</p>', 'post contents', '<p>post contents</p>', '2016-04-27 23:32:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `articles_categories_mapping`
--

CREATE TABLE `articles_categories_mapping` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles_images_mapping`
--

CREATE TABLE `articles_images_mapping` (
  `id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles_images_mapping`
--

INSERT INTO `articles_images_mapping` (`id`, `articles_id`, `images_id`, `created_at`, `modified_at`, `deleted_at`) VALUES
(22, 118, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 119, 37, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `articles_menu_mapping`
--

CREATE TABLE `articles_menu_mapping` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `left` varchar(255) NOT NULL,
  `right` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `left`, `right`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'science', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'sports', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'media', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'health', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'gaming', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'fashion', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'business', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'food', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'music', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'sing', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'sing', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'science', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'science', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `extention` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_name`, `extention`, `size`, `created_at`, `modified_at`, `deleted_at`) VALUES
(36, '1461736451Koala.jpg', '', '', '2016-04-27 11:54:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '1461737730Penguins.jpg', '', '', '2016-04-27 12:15:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `left` varchar(255) NOT NULL,
  `right` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `personal_phone` int(11) DEFAULT NULL,
  `home_phone` int(11) DEFAULT NULL,
  `office_phone` int(11) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `personal_phone`, `home_phone`, `office_phone`, `current_address`, `permanent_address`, `profile_pic`, `created_at`, `modified_at`, `deleted_at`, `modified_by`) VALUES
(37, 75, 'Awolad', 'Hossain', 1723874408, 1751478692, 1855138020, '6/11 Tajmahal road, Mohammadpur, Dhaka', 'Sudin, Adamdighi, Bogra', '', NULL, NULL, NULL, NULL),
(38, 78, 'Salman', 'Farshy', 1786340078, 1751478692, 1723874408, 'Sudin, Adamdighi, Bogra', 'Sudin, Adamdighi, Bogra', '', NULL, NULL, NULL, NULL),
(39, 82, 'Wahab ', 'Labib', 1719025158, 1723874408, 1717857376, '6/11 Tajmahal road Mohammadpur, Dhaka', 'Adamdighi, Bogra', '', NULL, NULL, NULL, NULL),
(40, 85, 'Fuck', 'you', 234234, 3242344, 34234234, 'dfssf', 'sfsf', '', NULL, NULL, NULL, NULL),
(41, 86, 'Rakib', 'Hasan', 123456, 123456, 123456, 'Dhaka', 'Natore', '', NULL, NULL, NULL, NULL),
(42, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(43, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(44, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(45, 93, 'Mofizur', 'Rahman kahn', 212323123, 23123321, 23213123, 'Dhaka', 'BOgra', '', NULL, NULL, NULL, NULL),
(46, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(47, 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL),
(48, 98, 'Ajlal', 'Sarkar', 123456, 123456, 123456, 'Malaysia', 'Dhaka', '', NULL, NULL, NULL, NULL),
(49, 102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `unique_id`, `username`, `password`, `email`, `is_admin`, `modified_at`, `created_at`, `deleted_at`, `is_active`) VALUES
(75, 0, '571c4438bf3f7', 'admin', '123', 'admin@admin.com', 1, '0000-00-00 00:00:00', '2016-04-24 09:57:44', NULL, NULL),
(78, 0, '571c52f235c1e', 'salman', '12345', 'salman@gmail.com', 0, '0000-00-00 00:00:00', '2016-04-24 11:00:34', NULL, NULL),
(82, 0, '571cb7416d4f9', 'labib', 'dslfkjdsf', 'labib@labib.com', 0, '0000-00-00 00:00:00', '2016-04-24 18:08:33', NULL, NULL),
(85, 0, '571cc19f24782', 'jsdlfjslfjaslfjlafjl', '2323123', 'sdlkfjlkfdjslfjslfjldkjf@dsfkjsdlkfjsdfl.com', 0, '0000-00-00 00:00:00', '2016-04-24 18:52:47', NULL, NULL),
(86, 0, '571cc1adcd136', 'rakib', 'lskdjflskjfslfjslkdfjfsdlkf', 'rakib@rakib.com', 0, '0000-00-00 00:00:00', '2016-04-24 18:53:01', NULL, NULL),
(87, 0, '571cc1c071a99', 'anam', '11', 'anam@gmail.com', 0, '0000-00-00 00:00:00', '2016-04-24 18:53:20', NULL, NULL),
(89, 0, '571cc2203e4c5', 'pronoy', '123456', 'pronoy@pronoy.com', 0, '0000-00-00 00:00:00', '2016-04-24 18:54:56', NULL, NULL),
(92, 0, '571cc696f2fe3', 'titihi', 'sdkfjlsdfjlsdfjlksdfjlkdsfj', 'tithi@tithi.com', 0, '0000-00-00 00:00:00', '2016-04-24 19:13:58', NULL, NULL),
(93, 0, '571cc6c5b4ce3', 'mofiz', '12', 'mofiz@gmail.com', 0, '0000-00-00 00:00:00', '2016-04-24 19:14:45', NULL, NULL),
(96, 0, '571cc89152b44', 'zillur', '123456789', 'zillur@gmail.com', 0, '0000-00-00 00:00:00', '2016-04-24 19:22:25', NULL, NULL),
(97, 0, '571cc8a046afb', 'forid', '1', 'forid@forid.com', 0, '0000-00-00 00:00:00', '2016-04-24 19:22:40', NULL, NULL),
(98, 0, '571cc8b0bf02f', 'ajlal', '2', 'ajlal@ajlal.com', 0, '0000-00-00 00:00:00', '2016-04-24 19:22:56', NULL, NULL),
(102, 0, '571cf1146924c', 'afroza', 'afroza12345', 'afroza@afroza.com', 0, '0000-00-00 00:00:00', '2016-04-24 22:15:16', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`users_id`);

--
-- Indexes for table `articles_categories_mapping`
--
ALTER TABLE `articles_categories_mapping`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_PerOrders` (`article_id`),
  ADD KEY `fk_article_categories` (`category_id`);

--
-- Indexes for table `articles_images_mapping`
--
ALTER TABLE `articles_images_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ar_img` (`articles_id`),
  ADD KEY `fk_im_ar` (`images_id`);

--
-- Indexes for table `articles_menu_mapping`
--
ALTER TABLE `articles_menu_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_menu` (`article_id`),
  ADD KEY `fk_menu_map` (`menu_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `articles_categories_mapping`
--
ALTER TABLE `articles_categories_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `articles_images_mapping`
--
ALTER TABLE `articles_images_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `articles_menu_mapping`
--
ALTER TABLE `articles_menu_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `articles_categories_mapping`
--
ALTER TABLE `articles_categories_mapping`
  ADD CONSTRAINT `fk_PerOrders` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `fk_article_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `articles_images_mapping`
--
ALTER TABLE `articles_images_mapping`
  ADD CONSTRAINT `fk_ar_img` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `fk_im_ar` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`);

--
-- Constraints for table `articles_menu_mapping`
--
ALTER TABLE `articles_menu_mapping`
  ADD CONSTRAINT `fk_article_menu` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `fk_menu_map` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
