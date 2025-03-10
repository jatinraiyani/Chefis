-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 06:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chefis`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_feedback`
--

CREATE TABLE `app_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area_name`, `lat`, `lon`, `availability`, `created_at`, `updated_at`) VALUES
(1, 'Onavas', '28.460643', '-99.999999', 'no', '2019-06-27 04:25:16', '2019-06-27 04:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `area_inquiry`
--

CREATE TABLE `area_inquiry` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `chef_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `category_image`, `status`, `created_at`, `updated_at`, `chef_id`) VALUES
(1, 'Starter', 'Starter Description', 'category-5cab0cc48f68b.jpg', 'active', '2019-04-08 03:26:36', '2019-04-08 04:22:09', 2),
(2, 'Desert', 'Desert Description', 'category-5cab0d0a11cb9.jpg', 'active', '2019-04-08 03:27:46', '2019-04-08 03:27:46', 2),
(3, 'Side Orders', 'Side Orders', 'category-5cab0d9696394.jpg', 'active', '2019-04-08 03:30:06', '2019-04-08 03:30:06', 2),
(4, 'Fast food', 'Fast food', 'category-5cac7c6544d3d.jpg', 'active', '2019-04-09 05:35:09', '2019-04-09 05:35:09', 5),
(5, 'Americans', 'Americans', 'category-5cac7e7fcde7a.jpg', 'active', '2019-04-09 05:44:07', '2019-04-09 05:44:07', 6),
(6, 'Quick Bites', 'Quick Bites', 'category-5cac7f7b5e1d7.jpg', 'active', '2019-04-09 05:48:19', '2019-04-09 05:48:19', 7);

-- --------------------------------------------------------

--
-- Table structure for table `chef_cuisines`
--

CREATE TABLE `chef_cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cuisine_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chef_cuisines`
--

INSERT INTO `chef_cuisines` (`id`, `user_id`, `cuisine_id`, `created_at`, `updated_at`) VALUES
(1, 6, 3, '2019-04-08 06:44:06', '2019-04-08 06:44:06'),
(2, 6, 4, '2019-04-08 06:44:06', '2019-04-08 06:44:06'),
(3, 7, 3, '2019-04-09 05:47:53', '2019-04-09 05:47:53'),
(4, 7, 4, '2019-04-09 05:47:53', '2019-04-09 05:47:53'),
(13, 12, 3, '2019-06-20 05:26:43', '2019-06-20 05:26:43'),
(14, 12, 4, '2019-06-20 05:26:43', '2019-06-20 05:26:43'),
(15, 12, 5, '2019-06-20 05:26:43', '2019-06-20 05:26:43'),
(16, 12, 7, '2019-06-20 05:26:43', '2019-06-20 05:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `chef_details`
--

CREATE TABLE `chef_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chef_id` bigint(20) UNSIGNED NOT NULL,
  `year_of_experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resturant_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_chef` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_hyginic_course` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `hyginic_course` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chef_details`
--

INSERT INTO `chef_details` (`id`, `chef_id`, `year_of_experience`, `resturant_name`, `specialities`, `about_chef`, `created_at`, `updated_at`, `is_hyginic_course`, `hyginic_course`) VALUES
(1, 2, '4', 'Tst Restro', 'All types of foods', 'Test Chef Details', '2019-05-01 06:20:36', '2019-06-20 05:26:43', 'yes', 'user-hyginic_course-5cc9880c57416.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chef_ratings`
--

CREATE TABLE `chef_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `chef_id` bigint(20) NOT NULL,
  `rating_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chef_review` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chef_timings`
--

CREATE TABLE `chef_timings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chef_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_close` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_close` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `slug`, `description`, `meta_description`, `created_at`, `updated_at`, `image`, `meta_image`) VALUES
(1, 'About Us', 'about-us', NULL, NULL, NULL, '2019-03-27 01:29:40', NULL, NULL),
(2, 'Contact Us', 'contact-us', NULL, NULL, NULL, '2019-06-20 23:15:26', NULL, NULL),
(3, 'Paypal', 'paypal', NULL, 'sandbox', NULL, '2019-03-27 01:30:04', NULL, NULL),
(4, 'Stripe', 'stripe', NULL, 'sandbox', NULL, '2019-03-27 01:30:20', NULL, NULL),
(5, 'Application Version', 'application-version', NULL, 'false', NULL, '2019-03-27 01:30:40', NULL, 'false'),
(6, 'Terms and Conditions', 'terms-condition', NULL, NULL, NULL, '2019-03-27 01:30:59', NULL, NULL),
(7, 'Privacy Policy', 'privacy-policy', NULL, NULL, NULL, '2019-03-27 01:31:12', NULL, NULL),
(8, 'FAQ', 'faq', NULL, NULL, NULL, '2019-03-27 01:31:21', NULL, NULL),
(9, 'Distance Radius', 'distance-radius', NULL, '10', NULL, '2019-06-29 05:49:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cuisine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuisine_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `cuisine_name`, `cuisine_image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'American', 'cuisine-5c98c94e5c094.jpg', 'active', '2019-03-25 06:57:58', '2019-03-25 06:57:58'),
(4, 'Maxican', 'cuisine-5c98c958b05df.jpg', 'active', '2019-03-25 06:58:08', '2019-03-25 06:58:08'),
(5, 'Breakfast', 'cuisine-5cc41a31d4206.jpg', 'active', '2019-04-27 03:30:33', '2019-04-27 03:30:33'),
(6, 'Lunch', 'cuisine-5cc41a5157ca2.jpg', 'active', '2019-04-27 03:31:05', '2019-04-27 03:31:05'),
(7, 'Brunch', 'cuisine-5cc41a63bf8b6.jpg', 'active', '2019-04-27 03:31:23', '2019-04-27 03:31:23'),
(8, 'Dinner', 'cuisine-5cc41a71433f5.jpg', 'active', '2019-04-27 03:31:37', '2019-04-27 03:31:37'),
(9, 'Mexican', 'cuisine-5cc41a8eee9d2.jpg', 'active', '2019-04-27 03:32:06', '2019-04-27 03:32:06'),
(10, 'Indian', 'cuisine-5cc41a9aa8763.jpg', 'active', '2019-04-27 03:32:18', '2019-04-27 03:32:18'),
(11, 'Healthy', 'cuisine-5cc41aa759b46.jpeg', 'active', '2019-04-27 03:32:31', '2019-04-27 03:32:31'),
(12, 'Italian', 'cuisine-5cc41ab8ad453.jpg', 'active', '2019-04-27 03:32:48', '2019-04-27 03:32:48'),
(13, 'Poke Bowls', 'cuisine-5cc41ac5b5907.jpg', 'active', '2019-04-27 03:33:01', '2019-04-27 03:33:01'),
(14, 'Peruvian', 'cuisine-5cc41ad32f61d.jpg', 'active', '2019-04-27 03:33:15', '2019-04-27 03:33:15'),
(15, 'Russian', 'cuisine-5cc41addf063c.jpg', 'active', '2019-04-27 03:33:25', '2019-04-27 03:33:25'),
(16, 'Brazilian', 'cuisine-5cc41aed19f08.jpg', 'active', '2019-04-27 03:33:41', '2019-04-27 03:33:41'),
(17, 'Cuban', 'cuisine-5cc41c0706e29.jpg', 'active', '2019-04-27 03:38:23', '2019-04-27 03:38:23'),
(18, 'Mediterranean', 'cuisine-5cc41c123a17f.jpg', 'active', '2019-04-27 03:38:34', '2019-04-27 03:38:34'),
(19, 'Hawaiian', 'cuisine-5cc41c1c62978.jpg', 'active', '2019-04-27 03:38:44', '2019-04-27 03:38:44'),
(20, 'Gourmet', 'cuisine-5cc41c365259a.jpg', 'active', '2019-04-27 03:39:10', '2019-04-27 03:39:10'),
(21, 'Burgers', 'cuisine-5cc41c457e1ad.jpeg', 'active', '2019-04-27 03:39:25', '2019-04-27 03:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `driver_requests`
--

CREATE TABLE `driver_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chef_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_preparation_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeat_item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `chef_id`, `category_id`, `item_name`, `item_description`, `item_price`, `item_image`, `item_preparation_time`, `status`, `created_at`, `updated_at`, `item_qty`, `remaining_item`, `repeat_item`) VALUES
(1, 2, 1, 'Starter Item1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '99.99', 'item-5cab0f1b24a5f.jpg', '25', 'active', '2019-04-08 03:36:35', '2019-06-28 00:46:02', '25', NULL, 'on'),
(2, 2, 1, 'Starter Item2', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '102.99', 'item-5cab0fb9cc770.jpg', '30', 'active', '2019-04-08 03:39:13', '2019-06-04 05:55:35', '30', NULL, 'on'),
(3, 2, 1, 'Starter Item3', 'the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages', '159.99', 'item-5cab103e697da.jpg', '25', 'active', '2019-04-08 03:41:26', '2019-05-30 00:18:45', '49', NULL, 'on'),
(4, 2, 1, 'Starter Item4', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '299.99', 'item-5cab1158bcdf2.jpg', '29', 'active', '2019-04-08 03:46:08', '2019-05-16 23:39:41', '30', NULL, 'on'),
(5, 2, 1, 'Starter Item5', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '49.99', 'item-5cab11c62ee16.jpg', '35', 'active', '2019-04-08 03:47:58', '2019-05-13 23:19:45', '40', NULL, 'on'),
(6, 2, 2, 'Desert Item1', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', '299.99', 'item-5cab12452ca4a.jpg', '25', 'active', '2019-04-08 03:50:05', '2019-06-27 00:07:43', '25', NULL, 'on'),
(7, 2, 2, 'Desert Item2', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '175.99', 'item-5cab12b1a08de.jpg', '30', 'active', '2019-04-08 03:51:53', '2019-05-28 22:42:45', '30', NULL, NULL),
(8, 2, 3, 'Masala mojo', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '50.00', 'item-5cab2c99ddb27.jpg', '25', 'active', '2019-04-08 05:42:25', '2019-05-28 22:43:53', '30', NULL, 'on'),
(9, 5, 4, 'Paneer Chilli', 'Paneer Chilli', '196.00', 'item-5cac7cb039265.jpg', '25', 'active', '2019-04-09 05:36:24', '2019-06-04 04:34:33', '10', NULL, 'on'),
(11, 6, 5, 'American Item', 'American Item', '399.99', 'item-5cac7eb2b4f3a.jpg', '36', 'active', '2019-04-09 05:44:58', '2019-05-13 23:43:31', '20', NULL, 'on'),
(12, 7, 6, 'Bombay Masala Pav', 'Bombay Masala Pav', '119', 'item-5cac7fd03bede.jpg', '22', 'active', '2019-04-09 05:49:44', '2019-05-13 23:46:11', '30', NULL, 'on'),
(14, 2, NULL, 'daadas', 'dsfgds dfg df gdf df  hfg hdft yhtr y', '45', 'item-5cc6ebc3cd602.jpg', '20', 'active', '2019-04-29 06:49:15', '2019-05-31 23:06:50', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_adons`
--

CREATE TABLE `item_adons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box_validation` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_adons`
--

INSERT INTO `item_adons` (`id`, `item_id`, `title`, `box_type`, `box_validation`, `status`, `created_at`, `updated_at`) VALUES
(7, 6, 'Here are some popular add-ons', 'radio', 'yes', 'active', '2019-05-15 05:18:34', '2019-05-31 23:14:23'),
(13, 1, 'extra addons', 'checkbox', 'no', 'active', '2019-06-04 04:53:47', '2019-06-04 05:02:10'),
(14, 1, 'extra items', 'radio', 'yes', 'active', '2019-06-04 04:55:05', '2019-06-04 04:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `item_cuisines`
--

CREATE TABLE `item_cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `cuisine_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_cuisines`
--

INSERT INTO `item_cuisines` (`id`, `item_id`, `cuisine_id`, `created_at`, `updated_at`) VALUES
(39, 5, '11', '2019-05-14 04:49:45', '2019-05-14 04:49:45'),
(40, 5, '12', '2019-05-14 04:49:45', '2019-05-14 04:49:45'),
(41, 5, '17', '2019-05-14 04:49:45', '2019-05-14 04:49:45'),
(42, 5, '18', '2019-05-14 04:49:45', '2019-05-14 04:49:45'),
(64, 11, '4', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(65, 11, '7', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(66, 11, '8', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(67, 11, '13', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(68, 11, '16', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(69, 11, '20', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(70, 12, '4', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(71, 12, '10', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(72, 12, '11', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(73, 12, '16', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(74, 12, '17', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(115, 4, '5', '2019-05-17 05:09:41', '2019-05-17 05:09:41'),
(116, 4, '7', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(117, 4, '11', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(118, 4, '13', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(119, 4, '18', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(337, 7, '3', '2019-05-29 04:12:45', '2019-05-29 04:12:45'),
(338, 7, '17', '2019-05-29 04:12:45', '2019-05-29 04:12:45'),
(339, 8, '6', '2019-05-29 04:13:53', '2019-05-29 04:13:53'),
(340, 8, '10', '2019-05-29 04:13:53', '2019-05-29 04:13:53'),
(341, 8, '18', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(342, 8, '19', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(343, 8, '20', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(369, 3, '3', '2019-05-30 05:48:45', '2019-05-30 05:48:45'),
(370, 3, '7', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(371, 3, '9', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(372, 3, '14', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(373, 3, '15', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(374, 3, '16', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(375, 3, '19', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(395, 14, '4', '2019-06-01 04:36:50', '2019-06-01 04:36:50'),
(396, 14, '10', '2019-06-01 04:36:50', '2019-06-01 04:36:50'),
(397, 14, '11', '2019-06-01 04:36:50', '2019-06-01 04:36:50'),
(398, 14, '12', '2019-06-01 04:36:50', '2019-06-01 04:36:50'),
(399, 14, '17', '2019-06-01 04:36:50', '2019-06-01 04:36:50'),
(454, 9, '6', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(455, 9, '14', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(456, 9, '16', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(457, 9, '17', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(458, 2, '4', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(459, 2, '5', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(460, 2, '10', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(461, 2, '12', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(462, 2, '18', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(463, 2, '19', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(556, 6, '4', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(557, 6, '8', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(558, 6, '18', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(559, 6, '19', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(560, 6, '20', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(637, 1, '10', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(638, 1, '11', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(639, 1, '12', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(640, 1, '17', '2019-06-28 06:16:02', '2019-06-28 06:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `item_on_demands`
--

CREATE TABLE `item_on_demands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_close` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_close` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_on_demands`
--

INSERT INTO `item_on_demands` (`id`, `item_id`, `day`, `first_open`, `first_close`, `second_open`, `second_close`, `first_qty`, `second_qty`, `status`, `created_at`, `updated_at`) VALUES
(43, 5, 'Mon', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-14 04:49:45', '2019-05-14 04:49:45'),
(44, 5, 'Tue', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46'),
(45, 5, 'Wed', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46'),
(46, 5, 'Thu', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46'),
(47, 5, 'Fri', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46'),
(48, 5, 'Sat', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46'),
(49, 5, 'Sun', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46'),
(85, 11, 'Mon', '09.00', '11.00', '13.00', '18.00', '9', '9', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(86, 11, 'Tue', '09.00', '11.00', '13.00', '18.00', '9', '9', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(87, 11, 'Wed', '09.00', '11.00', '13.00', '18.00', '9', '9', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(88, 11, 'Thu', '09.00', '11.00', '13.00', '18.00', '9', '9', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(89, 11, 'Fri', '09.00', '11.00', '13.00', '18.00', '9', '9', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(90, 11, 'Sat', '09.00', '11.00', '13.00', '18.00', '9', '9', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(91, 11, 'Sun', '09.00', '11.00', '13.00', '18.00', '9', '9', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31'),
(92, 12, 'Mon', '09.00', '11.00', '13.00', '18.00', '8', '8', 'open', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(93, 12, 'Tue', '09.00', '11.00', '13.00', '18.00', '8', '8', 'open', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(94, 12, 'Wed', '09.00', '11.00', '13.00', '18.00', '8', '8', 'open', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(95, 12, 'Thu', '09.00', '11.00', '13.00', '18.00', '8', '8', 'open', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(96, 12, 'Fri', '09.00', '11.00', '13.00', '18.00', '8', '8', 'open', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(97, 12, 'Sat', '09.00', '11.00', '13.00', '18.00', '8', '8', 'open', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(98, 12, 'Sun', '09.00', '11.00', '13.00', '18.00', '8', '8', 'open', '2019-05-14 05:16:11', '2019-05-14 05:16:11'),
(155, 4, 'Mon', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(156, 4, 'Tue', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(157, 4, 'Wed', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(158, 4, 'Thu', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(159, 4, 'Fri', '01.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(160, 4, 'Sat', '01.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-17 05:09:42', '2019-05-17 05:09:42'),
(161, 4, 'Sun', '07.00', '18.00', NULL, NULL, '10', NULL, 'open', '2019-05-17 05:09:43', '2019-05-17 05:09:43'),
(333, 7, 'Mon', '09.00', '11.00', '13.00', '18.00', '10', '10', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46'),
(334, 7, 'Tue', '09.00', '11.00', '13.00', '24.00', '10', '10', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46'),
(335, 7, 'Wed', '09.00', '11.00', '13.00', '24.00', '10', '10', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46'),
(336, 7, 'Thu', '09.00', '11.00', '13.00', '24.00', '10', '10', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46'),
(337, 7, 'Fri', '09.00', '11.00', '13.00', '24.00', '10', '10', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46'),
(338, 7, 'Sat', '09.00', '11.00', '13.00', '24.00', '10', '10', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46'),
(339, 7, 'Sun', '09.00', '11.00', '13.00', '24.00', '10', '10', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46'),
(340, 8, 'Mon', '08.00', '11.00', '13.00', '18.00', '10', '8', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(341, 8, 'Tue', '08.00', '11.00', '13.00', '24.00', '10', '8', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(342, 8, 'Wed', '08.00', '11.00', '13.00', '18.00', '10', '8', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(343, 8, 'Thu', '08.00', '11.00', '13.00', '18.00', '10', '8', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(344, 8, 'Fri', '08.00', '11.00', '13.00', '18.00', '10', '8', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(345, 8, 'Sat', '08.00', '11.00', '13.00', '18.00', '10', '8', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(346, 8, 'Sun', '08.00', '11.00', '13.00', '18.00', '10', '8', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54'),
(375, 3, 'Mon', '07.00', '12.00', '15.00', '18.00', '10', '10', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(376, 3, 'Tue', '07.00', '12.00', '15.00', '18.00', '10', '10', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(377, 3, 'Wed', '07.00', '12.00', '15.00', '18.00', '10', '10', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(378, 3, 'Thu', '01.00', '12.00', '12.00', '24.00', '10', '10', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(379, 3, 'Fri', '07.00', '12.00', '15.00', '18.00', '10', '10', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(380, 3, 'Sat', '07.00', '12.00', '15.00', '18.00', '10', '10', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(381, 3, 'Sun', '07.00', '12.00', '15.00', '18.00', '10', '10', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46'),
(410, 14, 'Mon', '08.00', '11.00', '13.00', '18.00', '10', '10', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51'),
(411, 14, 'Tue', '08.00', '11.00', '13.00', '18.00', '10', '10', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51'),
(412, 14, 'Wed', '08.00', '11.00', '13.00', '18.00', '10', '10', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51'),
(413, 14, 'Thu', '08.00', '11.00', '13.00', '18.00', '10', '10', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51'),
(414, 14, 'Fri', '08.00', '11.00', '13.00', '18.00', '10', '10', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51'),
(415, 14, 'Sat', NULL, NULL, NULL, NULL, NULL, NULL, 'close', '2019-06-01 04:36:51', '2019-06-01 04:36:51'),
(416, 14, 'Sun', NULL, NULL, NULL, NULL, NULL, NULL, 'close', '2019-06-01 04:36:51', '2019-06-01 04:36:51'),
(497, 9, 'Mon', NULL, '11.00', '13.00', '24.00', '8', '8', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(498, 9, 'Tue', NULL, '11.00', '13.00', '24.00', '8', '8', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(499, 9, 'Wed', NULL, '11.00', '13.00', '18.00', '8', '8', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(500, 9, 'Thu', NULL, '11.00', '13.00', '18.00', '8', '8', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(501, 9, 'Fri', NULL, '11.00', '13.00', '18.00', '8', '8', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(502, 9, 'Sat', NULL, '11.00', '13.00', '18.00', '8', '8', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(503, 9, 'Sun', NULL, '11.00', '13.00', '18.00', '8', '8', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33'),
(504, 2, 'Mon', NULL, '12.00', '14.00', '18.00', '10', '10', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(505, 2, 'Tue', NULL, '12.00', '14.00', '18.00', '10', '10', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(506, 2, 'Wed', NULL, '12.00', '14.00', '18.00', '10', '10', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(507, 2, 'Thu', NULL, '12.00', '14.00', '18.00', '10', '10', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(508, 2, 'Fri', NULL, '12.00', '14.00', '18.00', '10', '10', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(509, 2, 'Sat', NULL, '12.00', '14.00', '18.00', '10', '10', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(510, 2, 'Sun', NULL, '12.00', '14.00', '18.00', '10', '10', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35'),
(658, 6, 'Mon', NULL, '12.00', '13.00', '24.00', '50', '50', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(659, 6, 'Tue', '01.00', '11.00', '13.00', '24.00', '50', '50', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(660, 6, 'Wed', '01.00', '11.00', '13.00', '24.00', '50', '50', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(661, 6, 'Thu', NULL, '12.00', '13.00', '24.00', '50', '50', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(662, 6, 'Fri', '01.00', '11.00', '13.00', '18.00', '50', '50', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(663, 6, 'Sat', '01.00', '11.00', '13.00', '18.00', '50', '50', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(664, 6, 'Sun', '01.00', '11.00', '13.00', '24.00', '50', '50', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43'),
(798, 1, 'Mon', NULL, NULL, NULL, NULL, NULL, NULL, 'close', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(799, 1, 'Tue', '04.00', '11.00', '13.00', '18.00', '10', '10', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(800, 1, 'Wed', '06.00', '12.00', '13.00', '24.00', '10', '10', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(801, 1, 'Thu', '07.00', '12.00', '13.00', '24.00', '10', '10', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(802, 1, 'Fri', '05.00', '12.00', '13.00', '24.00', '10', '10', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(803, 1, 'Sat', '05.00', '12.00', '14.00', '24.00', '10', '10', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02'),
(804, 1, 'Sun', '04.00', '12.00', '14.00', '24.00', '10', '10', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `item_sum_adons`
--

CREATE TABLE `item_sum_adons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `adons_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_sum_adons`
--

INSERT INTO `item_sum_adons` (`id`, `item_id`, `adons_id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(29, 6, 7, 'Poppings', '10', 'active', '2019-05-16 01:39:38', '2019-05-31 23:14:23'),
(30, 6, 7, 'Extra Chilli', '5', 'active', '2019-05-16 01:39:38', '2019-05-31 23:14:23'),
(31, 6, 7, 'Extra Masala', '0', 'active', '2019-05-16 01:39:38', '2019-05-31 23:14:23'),
(52, 1, 13, 'extra cheez', '15', 'active', '2019-06-04 04:53:47', '2019-06-04 05:02:10'),
(53, 1, 13, 'extra chili flex', '10', 'active', '2019-06-04 04:53:47', '2019-06-04 05:02:10'),
(54, 1, 14, 'butter milk', '10', 'active', '2019-06-04 04:55:05', '2019-06-04 04:55:05'),
(55, 1, 14, 'salad', '20', 'active', '2019-06-04 04:55:05', '2019-06-04 04:55:05'),
(56, 1, 14, 'papad', '10', 'active', '2019-06-04 04:55:05', '2019-06-04 04:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `item_timing`
--

CREATE TABLE `item_timing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_timing`
--

INSERT INTO `item_timing` (`id`, `item_id`, `day`, `open`, `close`, `status`, `created_at`, `updated_at`, `qty`, `delivered_day`, `delivered_time`) VALUES
(204, 5, 'Mon', '08.00', '18.00', 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46', '10', 'Mon', '05.00'),
(205, 5, 'Tue', '08.00', '18.00', 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46', '10', 'Tue', '05.00'),
(206, 5, 'Wed', NULL, NULL, 'close', '2019-05-14 04:49:46', '2019-05-14 04:49:46', NULL, 'Wed', NULL),
(207, 5, 'Thu', '08.00', '18.00', 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46', '10', 'Thu', '05.00'),
(208, 5, 'Fri', '08.00', '18.00', 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46', '10', 'Fri', '05.00'),
(209, 5, 'Sat', '08.00', '18.00', 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46', '10', 'Sat', '05.00'),
(210, 5, 'Sun', '08.00', '18.00', 'open', '2019-05-14 04:49:46', '2019-05-14 04:49:46', '10', 'Sun', '05.00'),
(246, 11, 'Mon', '15.00', '18.00', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31', '5', 'Mon', '11.00'),
(247, 11, 'Tue', '15.00', '18.00', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31', '5', 'Tue', '11.00'),
(248, 11, 'Wed', '15.00', '18.00', 'open', '2019-05-14 05:13:31', '2019-05-14 05:13:31', '5', 'Wed', '11.00'),
(249, 11, 'Thu', '15.00', '18.00', 'open', '2019-05-14 05:13:32', '2019-05-14 05:13:32', '5', 'Thu', '11.00'),
(250, 11, 'Fri', '15.00', '18.00', 'open', '2019-05-14 05:13:32', '2019-05-14 05:13:32', '5', 'Fri', '11.00'),
(251, 11, 'Sat', '15.00', '18.00', 'open', '2019-05-14 05:13:32', '2019-05-14 05:13:32', '5', 'Sat', '10.00'),
(252, 11, 'Sun', '15.00', '18.00', 'open', '2019-05-14 05:13:32', '2019-05-14 05:13:32', '5', 'Sun', '10.00'),
(253, 12, 'Mon', '11.00', '18.00', 'open', '2019-05-14 05:16:12', '2019-05-14 05:16:12', '5', 'Mon', '01.00'),
(254, 12, 'Tue', '11.00', '18.00', 'open', '2019-05-14 05:16:12', '2019-05-14 05:16:12', '5', 'Tue', '01.00'),
(255, 12, 'Wed', '11.00', '18.00', 'open', '2019-05-14 05:16:12', '2019-05-14 05:16:12', '5', 'Wed', '01.00'),
(256, 12, 'Thu', '11.00', '18.00', 'open', '2019-05-14 05:16:12', '2019-05-14 05:16:12', '5', 'Thu', '01.00'),
(257, 12, 'Fri', '11.00', '18.00', 'open', '2019-05-14 05:16:12', '2019-05-14 05:16:12', '5', 'Fri', '01.00'),
(258, 12, 'Sat', '11.00', '18.00', 'open', '2019-05-14 05:16:12', '2019-05-14 05:16:12', '5', 'Sat', '01.00'),
(259, 12, 'Sun', '11.00', '18.00', 'open', '2019-05-14 05:16:12', '2019-05-14 05:16:12', '5', 'Sun', '01.00'),
(314, 4, 'Mon', '11.00', '18.00', 'open', '2019-05-17 05:09:43', '2019-05-17 05:09:43', '10', 'Mon', '05.00'),
(315, 4, 'Tue', '11.00', '18.00', 'open', '2019-05-17 05:09:43', '2019-05-17 05:09:43', '10', 'Tue', '06.00'),
(316, 4, 'Wed', NULL, NULL, 'close', '2019-05-17 05:09:43', '2019-05-17 05:09:43', NULL, 'Wed', NULL),
(317, 4, 'Thu', NULL, NULL, 'open', '2019-05-17 05:09:43', '2019-05-17 05:09:43', '10', 'Thu', NULL),
(318, 4, 'Fri', '12.00', '24.00', 'open', '2019-05-17 05:09:43', '2019-05-17 05:09:43', '10', 'Fri', '01.00'),
(319, 4, 'Sat', NULL, NULL, 'close', '2019-05-17 05:09:43', '2019-05-17 05:09:43', NULL, 'Sat', NULL),
(320, 4, 'Sun', NULL, NULL, 'close', '2019-05-17 05:09:43', '2019-05-17 05:09:43', NULL, 'Sun', NULL),
(473, 7, 'Mon', '07.00', '20.00', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46', '5', '0', '02.00'),
(474, 7, 'Tue', '07.00', '20.00', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46', '5', '1', '02.00'),
(475, 7, 'Wed', '07.00', '20.00', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46', '5', '2', '02.00'),
(476, 7, 'Thu', '07.00', '20.00', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46', '5', '3', '02.00'),
(477, 7, 'Fri', '08.00', '20.00', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46', '5', '4', '02.00'),
(478, 7, 'Sat', '07.00', '20.00', 'open', '2019-05-29 04:12:46', '2019-05-29 04:12:46', '5', '5', '02.00'),
(479, 7, 'Sun', NULL, NULL, 'close', '2019-05-29 04:12:46', '2019-05-29 04:12:46', NULL, NULL, NULL),
(480, 8, 'Mon', '08.00', '18.00', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54', '5', '0', '04.00'),
(481, 8, 'Tue', '08.00', '18.00', 'open', '2019-05-29 04:13:54', '2019-05-29 04:13:54', '5', '1', '04.00'),
(482, 8, 'Wed', '08.00', '18.00', 'open', '2019-05-29 04:13:55', '2019-05-29 04:13:55', '5', '2', '04.00'),
(483, 8, 'Thu', '08.00', '18.00', 'open', '2019-05-29 04:13:55', '2019-05-29 04:13:55', '5', '3', '04.00'),
(484, 8, 'Fri', '08.00', '18.00', 'open', '2019-05-29 04:13:55', '2019-05-29 04:13:55', '5', '4', '04.00'),
(485, 8, 'Sat', '08.00', '18.00', 'open', '2019-05-29 04:13:55', '2019-05-29 04:13:55', '5', '5', '04.00'),
(486, 8, 'Sun', NULL, NULL, 'close', '2019-05-29 04:13:55', '2019-05-29 04:13:55', NULL, NULL, NULL),
(515, 3, 'Mon', '01.00', '24.00', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46', '10', '0', '08.00'),
(516, 3, 'Tue', '01.00', '24.00', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46', '10', '1', '24.00'),
(517, 3, 'Wed', '01.00', '24.00', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46', '10', '2', '24.00'),
(518, 3, 'Thu', '01.00', '18.00', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46', '10', '3', '08.00'),
(519, 3, 'Fri', '01.00', '18.00', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46', '10', '4', '08.00'),
(520, 3, 'Sat', '01.00', '18.00', 'open', '2019-05-30 05:48:46', '2019-05-30 05:48:46', '10', '5', '08.00'),
(521, 3, 'Sun', NULL, NULL, 'close', '2019-05-30 05:48:46', '2019-05-30 05:48:46', NULL, NULL, NULL),
(550, 14, 'Mon', '11.00', '18.00', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51', '6', '0', '01.00'),
(551, 14, 'Tue', '11.00', '18.00', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51', '6', '1', '01.00'),
(552, 14, 'Wed', '11.00', '18.00', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51', '6', '2', '01.00'),
(553, 14, 'Thu', '11.00', '18.00', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51', '6', '3', '01.00'),
(554, 14, 'Fri', '11.00', '18.00', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51', '6', '4', '01.00'),
(555, 14, 'Sat', '11.00', '18.00', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51', '6', '5', '01.00'),
(556, 14, 'Sun', '11.00', '18.00', 'open', '2019-06-01 04:36:51', '2019-06-01 04:36:51', '6', '6', '01.00'),
(620, 9, 'Mon', NULL, '18.00', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33', '5', '0', '06.00'),
(621, 9, 'Tue', NULL, '18.00', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33', '5', '1', '06.00'),
(622, 9, 'Wed', NULL, '18.00', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33', '5', '2', '06.00'),
(623, 9, 'Thu', NULL, '18.00', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33', '5', '3', '06.00'),
(624, 9, 'Fri', NULL, '18.00', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33', '5', '4', '06.00'),
(625, 9, 'Sat', '09.00', '18.00', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33', '5', '5', '06.00'),
(626, 9, 'Sun', NULL, '18.00', 'open', '2019-06-04 04:34:33', '2019-06-04 04:34:33', '5', '6', '06.00'),
(627, 2, 'Mon', NULL, '16.00', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35', '10', '0', '12.00'),
(628, 2, 'Tue', NULL, '24.00', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35', '10', '1', '12.00'),
(629, 2, 'Wed', NULL, '24.00', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35', '10', '2', '12.00'),
(630, 2, 'Thu', '10.00', '16.00', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35', '10', '3', '12.00'),
(631, 2, 'Fri', '10.00', '16.00', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35', '10', '4', '12.00'),
(632, 2, 'Sat', '10.00', '16.00', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35', '10', '5', '12.00'),
(633, 2, 'Sun', '10.00', '16.00', 'open', '2019-06-04 05:55:35', '2019-06-04 05:55:35', '10', '6', '12.00'),
(781, 6, 'Mon', '01.00', '04.00', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43', '10', '0', '23.00'),
(782, 6, 'Tue', '01.00', '18.00', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43', '10', '1', '09.00'),
(783, 6, 'Wed', '01.00', '18.00', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43', '10', '2', '13.00'),
(784, 6, 'Thu', '19.00', '24.00', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43', '10', '0', '12.00'),
(785, 6, 'Fri', '01.00', '18.00', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43', '10', '4', '01.00'),
(786, 6, 'Sat', NULL, '18.00', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43', '10', '5', '01.00'),
(787, 6, 'Sun', NULL, '24.00', 'open', '2019-06-27 05:37:43', '2019-06-27 05:37:43', '50', '6', '01.00'),
(921, 1, 'Mon', '02.00', '04.00', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02', '10', '0', '03.00'),
(922, 1, 'Tue', NULL, '17.00', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02', '10', '1', NULL),
(923, 1, 'Wed', '10.00', '17.00', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02', '10', '2', '12.00'),
(924, 1, 'Thu', '10.00', '17.00', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02', '10', '3', '12.00'),
(925, 1, 'Fri', '10.00', '17.00', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02', '1', '4', '24.00'),
(926, 1, 'Sat', '10.00', '17.00', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02', '10', '5', '12.00'),
(927, 1, 'Sun', '09.00', '18.00', 'open', '2019-06-28 06:16:02', '2019-06-28 06:16:02', '10', '6', '01.00');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-05-03', '2019-05-03 01:27:01', '2019-05-03 01:27:01'),
(2, 1, '2019-05-11', '2019-05-10 22:41:49', '2019-05-10 22:41:49'),
(3, 1, '2019-05-11', '2019-05-11 05:56:02', '2019-05-11 05:56:02'),
(4, 1, '2019-05-13', '2019-05-13 00:26:56', '2019-05-13 00:26:56'),
(5, 2, '2019-05-13', '2019-05-13 03:38:31', '2019-05-13 03:38:31'),
(6, 2, '2019-05-13', '2019-05-13 03:43:54', '2019-05-13 03:43:54'),
(7, 1, '2019-05-13', '2019-05-13 06:34:10', '2019-05-13 06:34:10'),
(8, 1, '2019-05-14', '2019-05-13 22:30:25', '2019-05-13 22:30:25'),
(9, 1, '2019-05-14', '2019-05-14 04:20:41', '2019-05-14 04:20:41'),
(10, 1, '2019-05-15', '2019-05-15 04:45:28', '2019-05-15 04:45:28'),
(11, 1, '2019-05-16', '2019-05-15 23:44:23', '2019-05-15 23:44:23'),
(12, 1, '2019-05-16', '2019-05-16 01:24:57', '2019-05-16 01:24:57'),
(13, 1, '2019-05-16', '2019-05-16 04:46:07', '2019-05-16 04:46:07'),
(14, 1, '2019-05-17', '2019-05-16 22:53:40', '2019-05-16 22:53:40'),
(15, 1, '2019-05-17', '2019-05-17 05:51:39', '2019-05-17 05:51:39'),
(16, 1, '2019-05-23', '2019-05-22 22:58:44', '2019-05-22 22:58:44'),
(17, 1, '2019-05-24', '2019-05-24 01:43:53', '2019-05-24 01:43:53'),
(18, 1, '2019-05-24', '2019-05-24 01:51:15', '2019-05-24 01:51:15'),
(19, 1, '2019-05-24', '2019-05-24 04:23:04', '2019-05-24 04:23:04'),
(20, 1, '2019-05-25', '2019-05-24 22:23:51', '2019-05-24 22:23:51'),
(21, 1, '2019-05-25', '2019-05-24 22:27:19', '2019-05-24 22:27:19'),
(22, 11, '2019-05-27', '2019-05-26 22:44:26', '2019-05-26 22:44:26'),
(23, 11, '2019-05-27', '2019-05-26 22:48:19', '2019-05-26 22:48:19'),
(24, 11, '2019-05-27', '2019-05-27 03:58:47', '2019-05-27 03:58:47'),
(25, 1, '2019-05-27', '2019-05-27 04:00:54', '2019-05-27 04:00:54'),
(26, 11, '2019-05-27', '2019-05-27 04:02:30', '2019-05-27 04:02:30'),
(27, 11, '2019-05-27', '2019-05-27 04:38:36', '2019-05-27 04:38:36'),
(28, 11, '2019-05-28', '2019-05-27 22:45:10', '2019-05-27 22:45:10'),
(29, 1, '2019-05-28', '2019-05-27 23:41:16', '2019-05-27 23:41:16'),
(30, 1, '2019-05-28', '2019-05-28 05:01:59', '2019-05-28 05:01:59'),
(31, 1, '2019-05-29', '2019-05-28 22:36:46', '2019-05-28 22:36:46'),
(32, 11, '2019-05-29', '2019-05-28 22:47:20', '2019-05-28 22:47:20'),
(33, 13, '2019-05-29', '2019-05-28 23:37:57', '2019-05-28 23:37:57'),
(34, 1, '2019-05-29', '2019-05-29 05:00:28', '2019-05-29 05:00:28'),
(35, 1, '2019-05-29', '2019-05-29 05:14:15', '2019-05-29 05:14:15'),
(36, 2, '2019-05-29', '2019-05-29 05:23:01', '2019-05-29 05:23:01'),
(37, 2, '2019-05-29', '2019-05-29 05:23:18', '2019-05-29 05:23:18'),
(38, 2, '2019-05-29', '2019-05-29 05:24:16', '2019-05-29 05:24:16'),
(39, 2, '2019-05-29', '2019-05-29 05:25:04', '2019-05-29 05:25:04'),
(40, 1, '2019-05-29', '2019-05-29 05:50:05', '2019-05-29 05:50:05'),
(41, 2, '2019-05-29', '2019-05-29 06:15:35', '2019-05-29 06:15:35'),
(42, 13, '2019-05-30', '2019-05-29 22:38:25', '2019-05-29 22:38:25'),
(43, 2, '2019-05-30', '2019-05-29 22:42:54', '2019-05-29 22:42:54'),
(44, 1, '2019-05-30', '2019-05-30 00:16:12', '2019-05-30 00:16:12'),
(45, 13, '2019-05-30', '2019-05-30 00:22:32', '2019-05-30 00:22:32'),
(46, 1, '2019-05-30', '2019-05-30 00:23:00', '2019-05-30 00:23:00'),
(47, 1, '2019-05-30', '2019-05-30 00:26:02', '2019-05-30 00:26:02'),
(48, 1, '2019-05-30', '2019-05-30 00:27:11', '2019-05-30 00:27:11'),
(49, 1, '2019-05-30', '2019-05-30 00:31:52', '2019-05-30 00:31:52'),
(50, 1, '2019-05-30', '2019-05-30 00:32:36', '2019-05-30 00:32:36'),
(51, 2, '2019-05-31', '2019-05-30 22:38:51', '2019-05-30 22:38:51'),
(52, 1, '2019-05-31', '2019-05-30 23:43:22', '2019-05-30 23:43:22'),
(53, 2, '2019-06-01', '2019-05-31 22:34:16', '2019-05-31 22:34:16'),
(54, 2, '2019-06-01', '2019-05-31 23:41:23', '2019-05-31 23:41:23'),
(55, 2, '2019-06-01', '2019-05-31 23:41:51', '2019-05-31 23:41:51'),
(56, 2, '2019-06-01', '2019-05-31 23:44:12', '2019-05-31 23:44:12'),
(57, 1, '2019-06-01', '2019-05-31 23:48:16', '2019-05-31 23:48:16'),
(58, 2, '2019-06-01', '2019-06-01 00:49:17', '2019-06-01 00:49:17'),
(59, 1, '2019-06-03', '2019-06-03 04:45:14', '2019-06-03 04:45:14'),
(60, 1, '2019-06-03', '2019-06-03 05:05:55', '2019-06-03 05:05:55'),
(61, 1, '2019-06-03', '2019-06-03 09:13:00', '2019-06-03 09:13:00'),
(62, 1, '2019-06-03', '2019-06-03 10:21:40', '2019-06-03 10:21:40'),
(63, 1, '2019-06-03', '2019-06-03 11:00:48', '2019-06-03 11:00:48'),
(64, 1, '2019-06-03', '2019-06-03 11:46:14', '2019-06-03 11:46:14'),
(65, 1, '2019-06-03', '2019-06-03 11:56:01', '2019-06-03 11:56:01'),
(66, 1, '2019-06-04', '2019-06-04 03:33:36', '2019-06-04 03:33:36'),
(67, 1, '2019-06-04', '2019-06-04 04:00:41', '2019-06-04 04:00:41'),
(68, 1, '2019-06-04', '2019-06-04 09:04:21', '2019-06-04 09:04:21'),
(69, 1, '2019-06-04', '2019-06-04 09:49:07', '2019-06-04 09:49:07'),
(70, 13, '2019-06-04', '2019-06-04 10:25:17', '2019-06-04 10:25:17'),
(71, 13, '2019-06-04', '2019-06-04 10:55:06', '2019-06-04 10:55:06'),
(72, 13, '2019-06-04', '2019-06-04 11:23:44', '2019-06-04 11:23:44'),
(73, 1, '2019-06-04', '2019-06-04 11:53:40', '2019-06-04 11:53:40'),
(74, 1, '2019-06-05', '2019-06-05 03:26:54', '2019-06-05 03:26:54'),
(75, 1, '2019-06-06', '2019-06-06 05:01:21', '2019-06-06 05:01:21'),
(76, 13, '2019-06-17', '2019-06-16 23:21:51', '2019-06-16 23:21:51'),
(77, 1, '2019-06-17', '2019-06-16 23:24:49', '2019-06-16 23:24:49'),
(78, 13, '2019-06-17', '2019-06-16 23:33:44', '2019-06-16 23:33:44'),
(79, 13, '2019-06-17', '2019-06-17 00:40:13', '2019-06-17 00:40:13'),
(80, 1, '2019-06-17', '2019-06-17 00:44:17', '2019-06-17 00:44:17'),
(81, 1, '2019-06-17', '2019-06-17 06:18:38', '2019-06-17 06:18:38'),
(82, 1, '2019-06-18', '2019-06-17 22:32:33', '2019-06-17 22:32:33'),
(83, 1, '2019-06-18', '2019-06-17 23:35:16', '2019-06-17 23:35:16'),
(84, 13, '2019-06-18', '2019-06-17 23:50:13', '2019-06-17 23:50:13'),
(85, 13, '2019-06-19', '2019-06-18 23:19:16', '2019-06-18 23:19:16'),
(86, 13, '2019-06-19', '2019-06-19 00:01:55', '2019-06-19 00:01:55'),
(87, 13, '2019-06-19', '2019-06-19 00:22:06', '2019-06-19 00:22:06'),
(88, 13, '2019-06-19', '2019-06-19 00:37:51', '2019-06-19 00:37:51'),
(89, 1, '2019-06-19', '2019-06-19 01:09:28', '2019-06-19 01:09:28'),
(90, 2, '2019-06-19', '2019-06-19 01:10:35', '2019-06-19 01:10:35'),
(91, 1, '2019-06-19', '2019-06-19 04:33:09', '2019-06-19 04:33:09'),
(92, 1, '2019-06-19', '2019-06-19 06:43:02', '2019-06-19 06:43:02'),
(93, 2, '2019-06-19', '2019-06-19 06:48:03', '2019-06-19 06:48:03'),
(94, 1, '2019-06-19', '2019-06-19 06:54:29', '2019-06-19 06:54:29'),
(95, 13, '2019-06-20', '2019-06-19 22:27:52', '2019-06-19 22:27:52'),
(96, 1, '2019-06-20', '2019-06-20 02:30:29', '2019-06-20 02:30:29'),
(97, 1, '2019-06-20', '2019-06-20 03:38:56', '2019-06-20 03:38:56'),
(98, 2, '2019-06-20', '2019-06-20 04:02:23', '2019-06-20 04:02:23'),
(99, 1, '2019-06-20', '2019-06-20 04:07:52', '2019-06-20 04:07:52'),
(100, 1, '2019-06-20', '2019-06-20 04:17:00', '2019-06-20 04:17:00'),
(101, 1, '2019-06-20', '2019-06-20 04:42:03', '2019-06-20 04:42:03'),
(102, 13, '2019-06-20', '2019-06-20 05:27:36', '2019-06-20 05:27:36'),
(103, 1, '2019-06-20', '2019-06-20 07:19:31', '2019-06-20 07:19:31'),
(104, 1, '2019-06-21', '2019-06-20 23:13:54', '2019-06-20 23:13:54'),
(105, 13, '2019-06-21', '2019-06-21 04:41:14', '2019-06-21 04:41:14'),
(106, 13, '2019-06-22', '2019-06-21 22:47:20', '2019-06-21 22:47:20'),
(107, 13, '2019-06-22', '2019-06-22 05:26:16', '2019-06-22 05:26:16'),
(108, 13, '2019-06-24', '2019-06-23 22:43:59', '2019-06-23 22:43:59'),
(109, 1, '2019-06-24', '2019-06-24 06:29:41', '2019-06-24 06:29:41'),
(110, 13, '2019-06-25', '2019-06-24 22:55:12', '2019-06-24 22:55:12'),
(111, 13, '2019-06-26', '2019-06-26 01:18:25', '2019-06-26 01:18:25'),
(112, 13, '2019-06-26', '2019-06-26 05:33:20', '2019-06-26 05:33:20'),
(113, 13, '2019-06-26', '2019-06-26 06:06:19', '2019-06-26 06:06:19'),
(114, 1, '2019-06-27', '2019-06-26 23:36:51', '2019-06-26 23:36:51'),
(115, 13, '2019-06-27', '2019-06-27 00:17:26', '2019-06-27 00:17:26'),
(116, 1, '2019-06-27', '2019-06-27 01:44:07', '2019-06-27 01:44:07'),
(117, 1, '2019-06-27', '2019-06-27 02:18:31', '2019-06-27 02:18:31'),
(118, 1, '2019-06-27', '2019-06-27 05:24:42', '2019-06-27 05:24:42'),
(119, 1, '2019-06-28', '2019-06-27 22:46:18', '2019-06-27 22:46:18'),
(120, 13, '2019-06-28', '2019-06-28 01:24:14', '2019-06-28 01:24:14'),
(121, 13, '2019-06-29', '2019-06-28 23:01:41', '2019-06-28 23:01:41'),
(122, 13, '2019-06-29', '2019-06-28 23:13:01', '2019-06-28 23:13:01'),
(123, 13, '2019-06-29', '2019-06-28 23:44:28', '2019-06-28 23:44:28'),
(124, 13, '2019-06-29', '2019-06-29 00:01:55', '2019-06-29 00:01:55'),
(125, 13, '2019-06-29', '2019-06-29 00:28:35', '2019-06-29 00:28:35'),
(126, 13, '2019-06-29', '2019-06-29 02:24:10', '2019-06-29 02:24:10'),
(127, 13, '2019-06-29', '2019-06-29 02:59:11', '2019-06-29 02:59:11'),
(128, 13, '2019-06-29', '2019-06-29 03:11:59', '2019-06-29 03:11:59'),
(129, 13, '2019-06-29', '2019-06-29 04:13:33', '2019-06-29 04:13:33'),
(130, 1, '2019-06-29', '2019-06-29 05:48:45', '2019-06-29 05:48:45'),
(131, 13, '2019-06-29', '2019-06-29 05:51:18', '2019-06-29 05:51:18'),
(132, 2, '2020-01-20', '2020-01-19 23:07:10', '2020-01-19 23:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_23_103125_entrust_setup_tables', 2),
(4, '2019_03_23_104345_create_chef_details_table', 3),
(6, '2019_03_23_105805_create_chef_timings_table', 4),
(7, '2019_03_23_110014_create_categories_table', 5),
(8, '2019_03_23_110207_create_cuisines_table', 6),
(9, '2019_03_23_105646_create_chef_cuisines_table', 7),
(10, '2019_03_23_110933_create_items_table', 8),
(11, '2019_03_23_111404_create_user_wishlists_table', 8),
(12, '2019_03_23_111641_create_user_carts_table', 8),
(13, '2019_03_23_112510_create_user_cart_items_table', 9),
(14, '2019_03_23_113718_create_orders_table', 10),
(15, '2019_03_23_115559_create_order_items_table', 10),
(16, '2019_03_23_115838_create_order_status_logs_table', 11),
(17, '2019_03_23_120018_create_payments_table', 12),
(18, '2019_03_23_120238_create_c_m_s_s_table', 13),
(19, '2019_03_23_120433_create_chef_ratings_table', 14),
(20, '2019_03_23_120557_create_app_feedback_table', 14),
(21, '2019_03_23_120714_create_user_notifications_table', 15),
(22, '2019_03_23_120852_create_driver_requests_table', 15),
(23, '2019_03_26_053108_add_amount_payment', 16),
(24, '2019_03_27_063350_add_new_field_cms', 17),
(26, '2019_04_06_070615_item_item_for_send', 18),
(28, '2019_04_08_044952_add_new_coloumn_item', 19),
(29, '2019_04_08_074204_add_new_coloum_chef_if_categories', 20),
(30, '2019_04_20_101453_create_user_addresses_table', 21),
(31, '2019_04_29_091430_add_new_coloumn_item_timings', 22),
(32, '2019_04_29_092649_create_item_on_demands_table', 22),
(33, '2019_04_29_103133_create_item_cuisines_table', 22),
(35, '2019_05_01_094719_add_coloumn_chef_details_table', 23),
(36, '2019_05_01_103503_add_coloumn_users_table', 23),
(37, '2019_05_02_092202_create_login_logs_table', 24),
(38, '2019_05_11_102756_create_item_adons_table', 25),
(39, '2019_05_11_105458_create_item_sum_adons_table', 26),
(40, '2019_05_22_071500_add_item_suggestion_into_order_items', 27),
(41, '2019_05_22_071714_add_order_suggestion_into_orders', 27),
(42, '2019_06_15_053342_add_coloumn_to_user_addresses', 28),
(43, '2019_06_20_043103_add_late_long_into_user_addresses', 28),
(45, '2019_06_21_105232_remove_address_data_from_order', 29),
(46, '2019_06_21_113710_add_adons_into_order_items', 32),
(49, '2019_06_21_114027_add_producttype_into_orders_table', 31),
(50, '2019_06_24_062859_user_card', 33),
(51, '2019_06_27_070353_area', 34),
(52, '2019_06_27_115848_area_inquiry', 35);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `chef_id` bigint(20) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_final_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `order_status` enum('pending','confirm','driver_accept','driver_pickup','pack','delivered','canceled_by_user','canceled_by_chef','canceled_by_admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `order_cancel_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` enum('pending','success','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_suggetion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodtype` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `chef_id`, `order_number`, `total_qty`, `order_subtotal`, `order_total`, `order_discount`, `order_final_total`, `tax`, `address_id`, `order_status`, `order_cancel_reason`, `transaction_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`, `order_suggetion`, `prodtype`, `schedule_date`, `schedule_time`) VALUES
(1, 13, 2, '9fwbihows', '1', '118.44', '118.44', '0', '120.24', '0', 27, 'confirm', NULL, 'ch_1EqdUdLB776BHxSznnk7rSPW', 'stripe', 'success', '2019-06-29 04:39:13', '2019-06-29 04:39:13', NULL, '1', NULL, NULL),
(2, 13, 2, 'g637e62o0', '1', '349.99', '349.99', '0', '351.79', '0', 27, 'confirm', NULL, 'ch_1EqdeOLB776BHxSzDxKj1EUT', 'stripe', 'success', '2019-06-29 04:49:18', '2019-06-29 04:49:18', NULL, '1', NULL, NULL),
(3, 13, 2, 'xxmzd0332', '1', '159.99', '159.99', '0', '161.79', '0', 0, 'confirm', NULL, 'ch_1EqewsLB776BHxSzyot89K82', 'stripe', 'success', '2019-06-29 06:12:28', '2019-06-29 06:12:28', NULL, '1', NULL, NULL),
(4, 13, 2, '357c3n5i3', '1', '183.99', '183.99', '0', '185.79', '0', 0, 'confirm', NULL, 'ch_1EqfsqLB776BHxSzxb30HQHl', 'stripe', 'success', '2019-06-29 07:12:22', '2019-06-29 07:12:22', NULL, '1', NULL, NULL),
(5, 13, 2, 'vwgme1pch', '1', '118.44', '118.44', '0', '120.24', '0', 27, 'confirm', NULL, 'ch_1EqfuDLB776BHxSzYHi3psJ1', 'stripe', 'success', '2019-06-29 07:13:47', '2019-06-29 07:13:47', NULL, '1', NULL, NULL),
(6, 13, 2, 'bbynzwib8', '1', '57.49', '57.49', '0', '59.29', '0', 0, 'confirm', NULL, 'ch_1EqfveLB776BHxSzqyJkFCi9', 'stripe', 'success', '2019-06-29 07:15:16', '2019-06-29 07:15:16', NULL, '1', NULL, NULL),
(7, 13, 2, 'kn3ylr4ok', '1', '118.44', '118.44', '0', '120.24', '0', 27, 'confirm', NULL, 'ch_1Eqfx2LB776BHxSzX3TuvJDD', 'stripe', 'success', '2019-06-29 07:16:42', '2019-06-29 07:16:42', NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `chef_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_suggetion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adons` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adons_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adons_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `chef_id`, `item_id`, `item_name`, `item_price`, `item_qty`, `created_at`, `updated_at`, `item_suggetion`, `adons`, `adons_price`, `adons_name`) VALUES
(1, 1, 2, 2, 'Starter Item2', '118.44', '1', '2019-06-29 04:39:13', '2019-06-29 04:39:13', '', '0', '0', NULL),
(2, 2, 2, 6, 'Desert Item1', '349.99', '1', '2019-06-29 04:49:18', '2019-06-29 04:49:18', '', '30', '5', 'Extra Chilli'),
(3, 3, 2, 1, 'Starter Item1', '159.99', '1', '2019-06-29 06:12:28', '2019-06-29 06:12:28', '', '52,53,55', '15,10,20', 'extra cheez,extra chili flex,salad'),
(4, 4, 2, 3, 'Starter Item3', '183.99', '1', '2019-06-29 07:12:22', '2019-06-29 07:12:22', '', '0', '0', NULL),
(5, 5, 2, 2, 'Starter Item2', '118.44', '1', '2019-06-29 07:13:47', '2019-06-29 07:13:47', '', '0', '0', NULL),
(6, 6, 2, 5, 'Starter Item5', '57.49', '1', '2019-06-29 07:15:16', '2019-06-29 07:15:16', '', '0', '0', NULL),
(7, 7, 2, 2, 'Starter Item2', '118.44', '1', '2019-06-29 07:16:42', '2019-06-29 07:16:42', '', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_logs`
--

CREATE TABLE `order_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` enum('pending','confirm','driver_accept','driver_pickup','pack','delivered','canceled_by_user','canceled_by_chef','canceled_by_admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_logs`
--

INSERT INTO `order_status_logs` (`id`, `order_id`, `user_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'pending', '2019-06-29 04:39:13', '2019-06-29 04:39:13'),
(2, 2, 13, 'pending', '2019-06-29 04:49:18', '2019-06-29 04:49:18'),
(3, 3, 13, 'pending', '2019-06-29 06:12:28', '2019-06-29 06:12:28'),
(4, 4, 13, 'pending', '2019-06-29 07:12:22', '2019-06-29 07:12:22'),
(5, 5, 13, 'pending', '2019-06-29 07:13:47', '2019-06-29 07:13:47'),
(6, 6, 13, 'pending', '2019-06-29 07:15:16', '2019-06-29 07:15:16'),
(7, 7, 13, 'pending', '2019-06-29 07:16:42', '2019-06-29 07:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('pending','success','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `order_number`, `payment_type`, `payment_id`, `payment_status`, `created_at`, `updated_at`, `amount`) VALUES
(1, 1, '9fwbihows', 'stripe', 'ch_1EqdUdLB776BHxSznnk7rSPW', 'success', '2019-06-29 04:39:13', '2019-06-29 04:39:13', '12024'),
(2, 2, 'g637e62o0', 'stripe', 'ch_1EqdeOLB776BHxSzDxKj1EUT', 'success', '2019-06-29 04:49:18', '2019-06-29 04:49:18', '35179'),
(3, 3, 'xxmzd0332', 'stripe', 'ch_1EqewsLB776BHxSzyot89K82', 'success', '2019-06-29 06:12:28', '2019-06-29 06:12:28', '16179'),
(4, 4, '357c3n5i3', 'stripe', 'ch_1EqfsqLB776BHxSzxb30HQHl', 'success', '2019-06-29 07:12:22', '2019-06-29 07:12:22', '18579'),
(5, 5, 'vwgme1pch', 'stripe', 'ch_1EqfuDLB776BHxSzYHi3psJ1', 'success', '2019-06-29 07:13:47', '2019-06-29 07:13:47', '12024'),
(6, 6, 'bbynzwib8', 'stripe', 'ch_1EqfveLB776BHxSzqyJkFCi9', 'success', '2019-06-29 07:15:16', '2019-06-29 07:15:16', '5929'),
(7, 7, 'kn3ylr4ok', 'stripe', 'ch_1Eqfx2LB776BHxSzX3TuvJDD', 'success', '2019-06-29 07:16:42', '2019-06-29 07:16:42', '12024');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create New Users', '2019-03-24 23:32:12', '2019-03-24 23:32:12'),
(2, 'edit-users', 'Edit Users', 'Edit Users', '2019-03-24 23:32:12', '2019-03-24 23:32:12'),
(3, 'delete-users', 'Delete Users', 'Delete Users', '2019-03-24 23:32:12', '2019-03-24 23:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'User is Admin of Chefis', '2019-03-24 23:32:12', '2019-03-24 23:32:12'),
(2, 'user', 'User', 'User of Chefis Admin', '2019-03-24 23:32:12', '2019-03-24 23:32:12'),
(3, 'chef', 'Chef', 'User is Chef of Chefis', '2019-03-24 23:32:12', '2019-03-24 23:32:12'),
(4, 'driver', 'Driver', 'User is Driver of Chefis', '2019-03-24 23:32:12', '2019-03-24 23:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 3),
(3, 2),
(4, 4),
(5, 3),
(6, 3),
(7, 3),
(11, 2),
(12, 3),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive','block') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_agree` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `is_notification` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `is_password_change` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` enum('android','ios') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone_number`, `address`, `zipcode`, `lat`, `lang`, `profile_img`, `password`, `status`, `is_agree`, `is_notification`, `is_password_change`, `device_id`, `device_token`, `device_type`, `customer_id`, `remember_token`, `created_at`, `updated_at`, `account_no`, `bank_name`) VALUES
(1, 'Admin User', 'admin@chefis.com', NULL, '9876543210', NULL, NULL, NULL, NULL, NULL, '$2y$10$AJKGpb.0cu71uVvZYparkOSoJyiyi9I3amnFpNRb14mIH3eg.Csim', 'active', 'yes', 'true', 'false', NULL, NULL, NULL, NULL, NULL, '2019-03-24 23:32:12', '2019-03-24 23:32:12', NULL, NULL),
(2, 'Chef User', 'chef@chefis.com', NULL, '7894562230', 'Buenavista, Buenavista, 06350 Ciudad de México, CDMX, Mexico', '06350', '19.287369', '-99.03732860000002', 'user-5c98ad4d10f25.png', '$2y$10$errR7Q.mKBOpxYO3tpMaUOJuBZFfqdKxGm1IpgdtivDCAWowWbSIO', 'active', 'yes', 'true', 'false', NULL, NULL, NULL, NULL, NULL, '2019-03-24 23:32:13', '2019-03-29 06:58:10', NULL, NULL),
(3, 'Preet Jaishi', 'preet@malinator.com', NULL, '7845962144', 'E279 Princes Highway, Little Forest NSW, Australia', '784514', '-35.2910151', '150.41981379999993', 'user-5c98ad4d10f25.png', '$2y$10$VQlKMzAV4c0tVwmFu0nf0eWMGwK64vuVfxdLWKdSUIxiZvZUfvD0O', 'active', 'yes', 'true', 'false', NULL, NULL, NULL, NULL, NULL, '2019-03-25 01:50:49', '2019-03-25 04:58:29', NULL, NULL),
(4, 'Android', 'nikhilroy782@gmail.com', NULL, '1234567894', 'D3650 Princes Highway, Jerrawangala NSW, Australia', '395004', '-35.14202969999999', '150.44710970000006', 'user-5c99c8b0af046.png', '$2y$10$FMo.Q66NYCjV3KKpXyf2s.t9Wl5JQXAlawBi7L08IdxW08Y//Ai3i', 'active', 'yes', 'true', 'true', NULL, NULL, NULL, NULL, NULL, '2019-03-26 01:07:36', '2019-03-26 01:07:36', NULL, NULL),
(5, 'Test Chef', 'chef1@chefis.com', NULL, '4785978454', 'Paseo de la Reforma 2430, Lomas Altas, Mexico City, CDMX, Mexico', '457895', '19.3974329', '-99.235772', 'user-5cab1a35f26cb.png', '$2y$10$qW6an12TjozEiRTUr2Id.uJoiXV01gXIX7d0Bi9BRcUrdB19PErkG', 'active', 'yes', 'true', 'true', NULL, NULL, NULL, NULL, NULL, '2019-04-08 04:23:57', '2019-04-08 04:23:57', NULL, NULL),
(6, 'test chef user', 'chef2@chefis.com', NULL, '9874521456', 'Calzada Ignacio Zaragoza 547, Santa Martha Acatitla, Mexico City, CDMX, Mexico', '487596', '19.3646912', '-99.0056409', 'user-5cab3b0ddcbd1.png', '$2y$10$Nsl9YVx2LSpDhLKuZFUh6OkMOz.QpI9XZVauaKbg0FrWjt9KhzmlS', 'active', 'yes', 'true', 'true', NULL, NULL, NULL, NULL, NULL, '2019-04-08 06:44:05', '2019-04-08 06:44:05', NULL, NULL),
(7, 'Taste of Bhagwati', 'bhagwati@chefis.com', NULL, '987456321', 'Avenida Cuauhtémoc 887b, Colonia Nápoles, Mexico City, CDMX, Mexico', '548796', '19.386617', '-99.15721559999997', 'user-5cac7f60dd6d3.png', '$2y$10$MIR1mvXQKNRYxWJSCc3jzOW/UBRkeLZmDlPoF8Ba7a5bCL97dXVKe', 'active', 'yes', 'true', 'true', NULL, NULL, NULL, NULL, NULL, '2019-04-09 05:47:52', '2019-04-09 05:47:52', NULL, NULL),
(11, 'Test User', 'test@gmail.com', NULL, '7894578960', NULL, NULL, NULL, NULL, NULL, '$2y$10$uIFvXt43SwHUiHOqKe3DTeXt5U7tWGf8uqIp0FSL/hhGpJBz8iit6', 'active', 'yes', 'true', 'false', NULL, NULL, NULL, NULL, NULL, '2019-04-16 00:53:22', '2019-04-16 00:53:22', NULL, NULL),
(12, 'Test Chef', 'testchef123@gmail.com', NULL, '2784857789', 'Calle Parque Lira 29, San Miguel Chapultepec, Mexico City, CDMX, Mexico', '214580', '19.4102288', '-99.19058659999996', 'user-5cc9880bed627.jpeg', '$2y$10$KrBoRBn1Nbka5W/A3dUrj.meyt7KnRUAA0.i8ak6FnIAuETQJlYyy', 'active', 'yes', 'true', 'true', NULL, NULL, NULL, NULL, NULL, '2019-05-01 06:20:35', '2019-06-20 05:26:43', '4587894588798988', 'KFC'),
(13, 'paras', 'paras@gmail.com', NULL, '7359279885', NULL, NULL, NULL, NULL, '1559123519.jpg', '$2y$10$94v/ei5YO/j0CvG9wm/7QuVzYtKIVCJd4Yz7yoby9EgE2lMRUugbq', 'active', 'yes', 'true', 'false', NULL, NULL, NULL, 'cus_FIho7BPxg3XbIh', NULL, '2019-05-28 23:37:56', '2019-06-22 04:55:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('home','work','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `name`, `address`, `city`, `zipcode`, `contact_no`, `address2`, `landmark`, `type`, `created_at`, `updated_at`, `lat`, `lon`) VALUES
(3, 13, 'WOS', '4001, 4th Floor APMC', 'surat', '395002', '7858962555', 'Krushi Bazaar, Sahara Darwaja', 'Begampura', 'work', '2019-06-27 00:21:17', '2019-06-27 00:21:17', '21.196679', '72.842651'),
(27, 13, 'paras', 'Onofre Capeto, Conchita A, Mexico City, CDMX, Mexico', 'ciudad de méxico', NULL, '7359279885', NULL, NULL, 'other', '2019-06-29 04:39:08', '2019-06-29 04:39:08', '19.287369', '-99.03732860000002');

-- --------------------------------------------------------

--
-- Table structure for table `user_card`
--

CREATE TABLE `user_card` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ref_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` int(11) NOT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `save_status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_card`
--

INSERT INTO `user_card` (`id`, `user_id`, `ref_id`, `card_number`, `expiry_date`, `card_type`, `save_status`, `created_at`, `updated_at`) VALUES
(1, 13, 'card_1EqdUXLB776BHxSzZE9T3jcS', 8210, '12-2024', 'MasterCard', 'yes', '2019-06-29 04:39:12', '2019-06-29 04:39:12'),
(2, 13, 'card_1Eqfu8LB776BHxSzQQJr3Bw0', 3222, '12-2024', 'MasterCard', 'yes', '2019-06-29 07:13:46', '2019-06-29 07:13:46'),
(3, 13, 'card_1EqfvaLB776BHxSzRq3HMA94', 8210, '12-2024', 'MasterCard', 'no', '2019-06-29 07:15:15', '2019-06-29 07:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_carts`
--

CREATE TABLE `user_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chef_id` bigint(20) NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_cart_items`
--

CREATE TABLE `user_cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `chef_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlists`
--

CREATE TABLE `user_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wishlists`
--

INSERT INTO `user_wishlists` (`id`, `user_id`, `item_id`, `created_at`, `updated_at`) VALUES
(27, 11, 6, '2019-05-28 22:47:37', '2019-05-28 22:47:37'),
(37, 13, 1, '2019-06-25 03:52:23', '2019-06-25 03:52:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_feedback`
--
ALTER TABLE `app_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_inquiry`
--
ALTER TABLE `area_inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_inquiry_area_id_foreign` (`area_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_chef_id_foreign` (`chef_id`);

--
-- Indexes for table `chef_cuisines`
--
ALTER TABLE `chef_cuisines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chef_cuisines_user_id_foreign` (`user_id`),
  ADD KEY `chef_cuisines_cuisine_id_foreign` (`cuisine_id`);

--
-- Indexes for table `chef_details`
--
ALTER TABLE `chef_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chef_details_chef_id_foreign` (`chef_id`);

--
-- Indexes for table `chef_ratings`
--
ALTER TABLE `chef_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef_timings`
--
ALTER TABLE `chef_timings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chef_timings_chef_id_foreign` (`chef_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_slug_unique` (`slug`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_requests`
--
ALTER TABLE `driver_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_requests_order_id_foreign` (`order_id`),
  ADD KEY `driver_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_chef_id_foreign` (`chef_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `item_adons`
--
ALTER TABLE `item_adons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_adons_item_id_foreign` (`item_id`);

--
-- Indexes for table `item_cuisines`
--
ALTER TABLE `item_cuisines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_cuisines_item_id_foreign` (`item_id`);

--
-- Indexes for table `item_on_demands`
--
ALTER TABLE `item_on_demands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_on_demands_item_id_foreign` (`item_id`);

--
-- Indexes for table `item_sum_adons`
--
ALTER TABLE `item_sum_adons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_sum_adons_item_id_foreign` (`item_id`),
  ADD KEY `item_sum_adons_adons_id_foreign` (`adons_id`);

--
-- Indexes for table `item_timing`
--
ALTER TABLE `item_timing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_timing_item_id_foreign` (`item_id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_status_logs`
--
ALTER TABLE `order_status_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_logs_order_id_foreign` (`order_id`),
  ADD KEY `order_status_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_card`
--
ALTER TABLE `user_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_card_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_carts`
--
ALTER TABLE `user_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_cart_items`
--
ALTER TABLE `user_cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_cart_items_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wishlists`
--
ALTER TABLE `user_wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_wishlists_user_id_foreign` (`user_id`),
  ADD KEY `user_wishlists_item_id_foreign` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_feedback`
--
ALTER TABLE `app_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area_inquiry`
--
ALTER TABLE `area_inquiry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chef_cuisines`
--
ALTER TABLE `chef_cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chef_details`
--
ALTER TABLE `chef_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chef_ratings`
--
ALTER TABLE `chef_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chef_timings`
--
ALTER TABLE `chef_timings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `driver_requests`
--
ALTER TABLE `driver_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item_adons`
--
ALTER TABLE `item_adons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item_cuisines`
--
ALTER TABLE `item_cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=641;

--
-- AUTO_INCREMENT for table `item_on_demands`
--
ALTER TABLE `item_on_demands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=805;

--
-- AUTO_INCREMENT for table `item_sum_adons`
--
ALTER TABLE `item_sum_adons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `item_timing`
--
ALTER TABLE `item_timing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=928;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_status_logs`
--
ALTER TABLE `order_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_card`
--
ALTER TABLE `user_card`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_carts`
--
ALTER TABLE `user_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_cart_items`
--
ALTER TABLE `user_cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wishlists`
--
ALTER TABLE `user_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_inquiry`
--
ALTER TABLE `area_inquiry`
  ADD CONSTRAINT `area_inquiry_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chef_cuisines`
--
ALTER TABLE `chef_cuisines`
  ADD CONSTRAINT `chef_cuisines_cuisine_id_foreign` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chef_cuisines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chef_details`
--
ALTER TABLE `chef_details`
  ADD CONSTRAINT `chef_details_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chef_timings`
--
ALTER TABLE `chef_timings`
  ADD CONSTRAINT `chef_timings_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_requests`
--
ALTER TABLE `driver_requests`
  ADD CONSTRAINT `driver_requests_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driver_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_chef_id_foreign` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_adons`
--
ALTER TABLE `item_adons`
  ADD CONSTRAINT `item_adons_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_cuisines`
--
ALTER TABLE `item_cuisines`
  ADD CONSTRAINT `item_cuisines_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_on_demands`
--
ALTER TABLE `item_on_demands`
  ADD CONSTRAINT `item_on_demands_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_sum_adons`
--
ALTER TABLE `item_sum_adons`
  ADD CONSTRAINT `item_sum_adons_adons_id_foreign` FOREIGN KEY (`adons_id`) REFERENCES `item_adons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_sum_adons_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_timing`
--
ALTER TABLE `item_timing`
  ADD CONSTRAINT `item_timing_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_status_logs`
--
ALTER TABLE `order_status_logs`
  ADD CONSTRAINT `order_status_logs_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_status_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_card`
--
ALTER TABLE `user_card`
  ADD CONSTRAINT `user_card_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_carts`
--
ALTER TABLE `user_carts`
  ADD CONSTRAINT `user_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_cart_items`
--
ALTER TABLE `user_cart_items`
  ADD CONSTRAINT `user_cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `user_carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_wishlists`
--
ALTER TABLE `user_wishlists`
  ADD CONSTRAINT `user_wishlists_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
