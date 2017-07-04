-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 07:28 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sicarius`
--

-- --------------------------------------------------------

--
-- Table structure for table `index_sections`
--

CREATE TABLE `index_sections` (
  `id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `text` varchar(512) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_sections`
--

INSERT INTO `index_sections` (`id`, `name`, `text`, `image`) VALUES
(1, 'intro', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'http://www.aviatorcameragear.com/wp-content/uploads/2012/07/placeholder.jpg'),
(2, 'doing', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'http://www.aviatorcameragear.com/wp-content/uploads/2012/07/placeholder.jpg'),
(3, 'bio', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'http://www.aviatorcameragear.com/wp-content/uploads/2012/07/placeholder.jpg'),
(4, 'work', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'http://www.aviatorcameragear.com/wp-content/uploads/2012/07/placeholder.jpg'),
(5, 'contact', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'http://www.aviatorcameragear.com/wp-content/uploads/2012/07/placeholder.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(28) NOT NULL,
  `email` varchar(28) NOT NULL,
  `text` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1498416947),
('m130524_201442_init', 1498416949);

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery_categories`
--

CREATE TABLE `photo_gallery_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_gallery_categories`
--

INSERT INTO `photo_gallery_categories` (`id`, `name`, `image`) VALUES
(1, 'Lorem Ipsum Dolor', 'http://placeholders.org/320x200'),
(2, 'Color', 'http://placeholders.org/320x200');

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery_category_images`
--

CREATE TABLE `photo_gallery_category_images` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `description` varchar(56) NOT NULL,
  `image` varchar(512) NOT NULL,
  `is_featured` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_gallery_category_images`
--

INSERT INTO `photo_gallery_category_images` (`id`, `category_id`, `name`, `description`, `image`, `is_featured`) VALUES
(1, 1, 'Kurwa', 'Lorem ipsum dolor, consectetur adipiscing regae Cesare.', 'http://placeholders.org/320x200', 1),
(2, 1, 'Kurwa', 'Lorem ipsum dolor, consectetur adipiscing regae Cesare.', 'http://placeholders.org/320x200', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'UJNqFCPYg8_qV6Gaoq6yK86L2VkFNy7x', '$2y$13$M1mk2gsI3Myxpyh94tbiSe.BRH2JjmEv6ciLPEeF4rXibQKujcgUy', NULL, 'admin@admin.com', 10, 1484641131, 1484641131);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `index_sections`
--
ALTER TABLE `index_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `photo_gallery_categories`
--
ALTER TABLE `photo_gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_gallery_category_images`
--
ALTER TABLE `photo_gallery_category_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `index_sections`
--
ALTER TABLE `index_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `photo_gallery_categories`
--
ALTER TABLE `photo_gallery_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `photo_gallery_category_images`
--
ALTER TABLE `photo_gallery_category_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
