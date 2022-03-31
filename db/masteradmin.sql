-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 04:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masteradmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `image`, `phone`, `address_1`, `address_2`, `country`, `city`, `postcode`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Faruk', 'Haidar', 'customer@gmail.com', 'public/uploads/user/1677167601746140.jpg', '2097370298', NULL, NULL, NULL, NULL, NULL, '0', NULL, '$2y$10$Q/ayazflKh5GxcgvKli3FOa./Mu7ef0JTR4U8wvcBUkV5fksO0nMm', NULL, '2020-09-07 03:41:06', '2020-09-07 04:01:35'),
(2, 'Super', 'admin', 'admin@gmail.com', NULL, '01949796940', NULL, NULL, NULL, NULL, NULL, '1', NULL, '$2y$10$nf4h9rIZprxQRMLZe9o8Z.0SbZigdQpKXXGcPGaW3VT3XE/3OfZiC', NULL, '2020-09-07 03:46:28', '2020-09-07 03:46:28'),
(3, 'Super', 'admin', 'admin@admin.com', 'public/uploads/user/1677197306050960.jpg', '01949796940', NULL, NULL, NULL, NULL, NULL, '0', NULL, '$2y$10$dXOHJnwf9IaNh5N0cITAQ.yjCiEsmv6ihF3/emLaPCwdN4b61uxfG', NULL, '2020-09-07 11:33:20', '2020-09-07 11:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `details`, `discount`, `slug`, `button`, `button_url`, `publish`, `image`, `position`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Electronic Product', NULL, 20, 'BAN_205f6c6149585b1', 'Shop Now', '#', '0', 'public/uploads/banner/1678705492854342.jpg', NULL, '0', '2020-09-24 03:05:19', '2020-09-24 03:05:39'),
(5, 'Electronic Product', NULL, 20, 'BAN_205f6c6149585b1', 'Shop Now', '#', '0', 'public/uploads/banner/1678705492854342.jpg', NULL, '0', '2020-09-24 03:05:19', '2020-09-24 03:05:35'),
(6, 'Electronic Product', NULL, 20, 'BAN_205f6c61495859f', 'Shop Now', '#', '0', 'public/uploads/banner/1678705492854323.jpg', NULL, '0', '2020-09-24 03:05:19', '2020-09-24 03:05:30'),
(7, 'Electronic Product', NULL, 46, 'BAN_205f6c61b98d7b8', 'Click Now', '#', '1', 'public/uploads/banner/1678705610512356.jpg', NULL, '1', '2020-09-24 03:07:05', '2020-10-17 00:47:37'),
(8, 'Electronic Product', NULL, 46, 'BAN_205f6c61b991c43', 'Click Now', '#', '0', 'public/uploads/banner/1678705610529903.jpg', NULL, '0', '2020-09-24 03:07:05', '2020-09-24 03:07:12'),
(9, 'Electronic Product BD', NULL, 65, 'BAN_205f6c630acfb69', 'Shop Now', '#', '0', 'public/uploads/banner/1678705678623058.jpg', NULL, '1', '2020-09-24 03:08:10', '2020-09-24 03:12:42'),
(10, 'The information', 'ddddddddddddddddddddddddd', 34, 'BAN_205fb564fb3b0c5', 'Click Me', 'dddddddddddddddddddddd', '0', 'public/uploads/banner/1683723006488792.png', NULL, '1', '2020-10-06 05:18:42', '2020-11-18 12:16:27'),
(11, 'The informationd dsf', 'ddddddddddddddddddddddddd', 20, 'BAN_205fb564e75538a', 'Shop Now', 'dddddddddddddddddddddd', '0', 'public/uploads/banner/1683722985624477.jpg', NULL, '1', '2020-10-06 05:24:41', '2020-11-18 12:16:07'),
(12, 'Desert Riding Turning So much Flowery', 'ddddddddddddddddddddddddd', 20, 'BAN_205f7c565bc9dc3', 'middel ads 3', 'ddddddd', '0', NULL, NULL, '0', '2020-10-06 05:34:51', '2020-10-20 09:16:53'),
(13, 'The informationdd dfvdfv', 'ddddddddddddddddddddddddd', 20, 'BAN_205fb5649d0e975', 'Click Me', 'dddddddddddddddddddddd', '0', 'public/uploads/banner/1683722907740572.jpg', NULL, '1', '2020-10-06 05:37:19', '2020-11-18 12:14:53'),
(14, 'The information', 'ddddddddddddddddddddddddd', 20, 'BAN_205fb564c1a70ff', 'middel ads 3', 'dddddddddddddddddddddd', '0', 'public/uploads/banner/1683722946113810.jpg', NULL, '1', '2020-10-06 05:39:18', '2020-11-18 12:15:29'),
(15, 'The information sdgfsdf', 'ddddddddddddddddddddddddd', 43, 'BAN_205fb564d25b662', 'Click Me', '#', '0', 'public/uploads/banner/1683722963629685.jpg', NULL, '1', '2020-10-06 05:44:56', '2020-11-18 12:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `image`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Today', 'BCAT205f587c1506e7a', NULL, 1, 0, '2020-09-09 00:54:13', '2020-09-09 01:08:23'),
(2, 'New Post', 'new-post', NULL, 1, 1, '2020-09-09 01:06:42', '2020-09-09 01:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `blog_category_id`, `details`, `image`, `creator`, `slug`, `tag`, `publish`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Desert Riding Turning So much Flowery', 1, 'ksjfsdjfjsdfjsdfksjdfkjshdkf', NULL, 1, 'desert-riding-turning-so-much-flowery', '1', 0, 1, '2020-09-09 03:30:58', '2020-09-09 03:30:58'),
(2, 'The information dvds d dfdvd', NULL, 'masjdkasjc askjcaksncjaskdjcsd', 'public/uploads/blogpost/1677348537354084.png', 1, 'the-information-dvds-d-dfdvd', '1', 0, 1, '2020-09-09 03:37:00', '2020-09-09 03:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT 1,
  `featured` tinyint(1) DEFAULT 0,
  `menu` tinyint(1) DEFAULT 0,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `parent_id`, `featured`, `menu`, `icon`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'root', NULL, NULL, 0, 1, NULL, NULL, 1, NULL, NULL),
(2, 'Electronic', 'electronic', NULL, 1, NULL, 1, NULL, NULL, 1, NULL, '2020-12-15 07:38:10'),
(3, 'Home Electronics', 'home-electronics', 'This is the home category', 2, 1, 1, NULL, 'public/uploads/category/1683725126978809.jpg', 1, '2020-09-12 22:21:27', '2020-11-18 12:50:09'),
(4, 'Mobile', 'mobile', 'This is the home category', 1, 1, 1, NULL, 'public/uploads/category/1683725419647332.jpg', 1, '2020-11-18 12:54:48', '2020-11-18 12:54:48'),
(5, 'Faruk Haidar', 'faruk-haidar', 'This is the home category', 3, 1, 1, NULL, 'public/uploads/category/1686151195626304.jpg', 0, '2020-12-15 07:31:28', '2020-12-15 07:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `gallery_category_id`, `image`, `admin_id`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'The information bf', 3, 'public/uploads/gallery/1677268736607572.png', 1, 1, 'the-information-bf', '2020-09-08 06:28:36', '2020-09-08 23:01:36'),
(2, 'middel ads 3', 2, 'public/uploads/gallery/1677268919860764.png', 1, 1, 'middel-ads-3', '2020-09-08 06:31:30', '2020-09-10 01:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `name`, `remarks`, `slug`, `status`, `created_at`, `updated_at`, `image`) VALUES
(1, 'image', '', '', 1, '2020-09-14 10:41:31', '2020-09-07 10:41:47', NULL),
(2, '2020 Event Photo', 'dddd', '2020-event-photo', 1, '2020-09-08 04:16:08', '2020-09-08 04:16:08', NULL),
(3, 'ddddd', 'dddddddddddddddddddddddddd', 'ddddd', 1, '2020-09-08 04:20:02', '2020-09-08 04:20:02', 'public/uploads/gallery/1677260648757966.png'),
(4, 'Gallery Categories', 'dddddddddddd', 'gallery-categories', 1, '2020-09-08 04:44:04', '2020-09-08 04:44:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_07_051008_create_admins_table', 1),
(5, '2020_09_07_111636_create_banners_table', 2),
(6, '2020_09_07_175905_create_settings_table', 3),
(7, '2020_09_08_083514_create_gallery_categories_table', 4),
(9, '2020_09_08_084808_create_galleries_table', 5),
(10, '2020_09_09_051401_create_blog_categories_table', 6),
(13, '2020_09_09_051717_create_blog_posts_table', 7),
(14, '2020_09_09_082509_create_tags_table', 7),
(15, '2020_09_09_095150_create_newsletters_table', 8),
(16, '2020_09_09_095504_create_teams_table', 9),
(17, '2020_09_09_112442_create_partners_table', 10),
(18, '2020_09_09_120921_create_testimonials_table', 11),
(19, '2020_09_10_064556_create_contacts_table', 12),
(20, '2020_09_10_101315_create_permission_tables', 13),
(21, '2020_09_12_105114_create_categories_table', 14),
(22, '2020_09_13_093242_create_products_table', 15),
(23, '2020_09_14_121413_create_product_images_table', 15),
(24, '2020_09_14_121658_create_product_categories_table', 15),
(25, '2020_09_14_121800_create_product_colors_table', 15),
(26, '2020_09_14_121831_create_product_sizes_table', 15),
(27, '2020_09_14_121923_create_product_licenses_table', 15),
(28, '2020_09_14_122439_create_product_whole_sells_table', 15),
(29, '2020_09_14_122629_create_product_feature_tags_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'sasdasdad', 0, '2020-09-08 05:51:45', '2020-09-09 23:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `url`, `image`, `logo`, `slug`, `publish`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The information BD', 'https://learnhunter.live/', NULL, 'public/uploads/partner/1677357700788235.png', 'the-information-bd', 1, 1, '2020-09-09 06:02:38', '2020-09-09 06:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'index user', 'admin', '2020-09-12 02:34:03', '2020-09-12 02:34:03'),
(2, 'create user', 'admin', '2020-09-12 02:34:03', '2020-09-12 02:34:03'),
(3, 'edit user', 'admin', '2020-09-12 02:34:04', '2020-09-12 02:34:04'),
(4, 'update user', 'admin', '2020-09-12 02:34:05', '2020-09-12 02:34:05'),
(5, 'delete user', 'admin', '2020-09-12 02:34:07', '2020-09-12 02:34:07'),
(6, 'index admin', 'admin', '2020-09-12 02:34:37', '2020-09-12 02:34:37'),
(7, 'create admin', 'admin', '2020-09-12 02:34:37', '2020-09-12 02:34:37'),
(8, 'edit admin', 'admin', '2020-09-12 02:34:38', '2020-09-12 02:34:38'),
(9, 'update admin', 'admin', '2020-09-12 02:34:39', '2020-09-12 02:34:39'),
(10, 'delete admin', 'admin', '2020-09-12 02:34:40', '2020-09-12 02:34:40'),
(11, 'index testimonial', 'admin', '2020-09-12 02:35:49', '2020-09-12 02:35:49'),
(12, 'create testimonial', 'admin', '2020-09-12 02:35:51', '2020-09-12 02:35:51'),
(13, 'edit testimonial', 'admin', '2020-09-12 02:35:52', '2020-09-12 02:35:52'),
(14, 'update testimonial', 'admin', '2020-09-12 02:35:52', '2020-09-12 02:35:52'),
(15, 'delete testimonial', 'admin', '2020-09-12 02:35:54', '2020-09-12 02:35:54'),
(16, 'index brand', 'admin', '2020-09-12 02:36:06', '2020-09-12 02:36:06'),
(17, 'create brand', 'admin', '2020-09-12 02:36:07', '2020-09-12 02:36:07'),
(18, 'edit brand', 'admin', '2020-09-12 02:36:07', '2020-09-12 02:36:07'),
(19, 'update brand', 'admin', '2020-09-12 02:36:09', '2020-09-12 02:36:09'),
(20, 'delete brand', 'admin', '2020-09-12 02:36:09', '2020-09-12 02:36:09'),
(21, 'index product category', 'admin', '2020-09-12 02:36:56', '2020-09-12 02:36:56'),
(22, 'create product category', 'admin', '2020-09-12 02:36:56', '2020-09-12 02:36:56'),
(23, 'edit product category', 'admin', '2020-09-12 02:36:56', '2020-09-12 02:36:56'),
(24, 'update product category', 'admin', '2020-09-12 02:36:56', '2020-09-12 02:36:56'),
(25, 'delete product category', 'admin', '2020-09-12 02:36:57', '2020-09-12 02:36:57'),
(26, 'index product', 'admin', '2020-09-12 02:37:22', '2020-09-12 02:37:22'),
(27, 'create product', 'admin', '2020-09-12 02:37:22', '2020-09-12 02:37:22'),
(28, 'edit product', 'admin', '2020-09-12 02:37:23', '2020-09-12 02:37:23'),
(29, 'update product', 'admin', '2020-09-12 02:37:23', '2020-09-12 02:37:23'),
(30, 'delete product', 'admin', '2020-09-12 02:37:24', '2020-09-12 02:37:24'),
(31, 'index post', 'admin', '2020-09-12 02:38:14', '2020-09-12 02:38:14'),
(32, 'create post', 'admin', '2020-09-12 02:38:14', '2020-09-12 02:38:14'),
(33, 'edit post', 'admin', '2020-09-12 02:38:14', '2020-09-12 02:38:14'),
(34, 'update post', 'admin', '2020-09-12 02:38:15', '2020-09-12 02:38:15'),
(35, 'delete post', 'admin', '2020-09-12 02:38:16', '2020-09-12 02:38:16'),
(36, 'index post category', 'admin', '2020-09-12 02:38:30', '2020-09-12 02:38:30'),
(37, 'create post category', 'admin', '2020-09-12 02:38:30', '2020-09-12 02:38:30'),
(38, 'edit post category', 'admin', '2020-09-12 02:38:31', '2020-09-12 02:38:31'),
(39, 'update post category', 'admin', '2020-09-12 02:38:31', '2020-09-12 02:38:31'),
(40, 'delete post category', 'admin', '2020-09-12 02:38:32', '2020-09-12 02:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best` tinyint(4) DEFAULT NULL,
  `top` tinyint(4) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT NULL,
  `latest` tinyint(4) DEFAULT NULL,
  `big` tinyint(4) DEFAULT NULL,
  `features` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `publish` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `user_id`, `description`, `selling_price`, `discount_price`, `stock`, `policy`, `featured`, `views`, `tags`, `best`, `top`, `hot`, `latest`, `big`, `features`, `product_condition`, `sku`, `ship_time`, `meta_tag`, `meta_description`, `youtube`, `type`, `file_type`, `file`, `license`, `license_qty`, `link`, `platform`, `region`, `licence_type`, `measure`, `status`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Haidar', 'Product5f63177613b45', 'public/uploads/product/1678067200244575.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'best,top.exclusive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IuiQBEjlBoGS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, '2020-09-17 01:59:51', '2020-09-17 01:59:51'),
(2, 'Faruk Haidar dfgdfg', 'Product5f631c7e64b4b', 'public/uploads/product/1678068551142491.jpg', NULL, 'sadsfdsfgs', '240.00', '200.00', 100, 'dgdfgdfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SOX5jDntc0Qq', '8-18', 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 02:21:19', '2020-09-17 02:21:19'),
(3, 'Faruk Hfdsfsdfaidar', 'Product5f631da850e20', 'public/uploads/product/1678068863536952.jpg', NULL, 'ffegtrgtrtgrtg', '240.00', '200.00', 100, 'trgrtcrgrt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Used', 'Z73cW9Qhx8Mu', '8-18', 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 02:26:17', '2020-09-17 02:26:17'),
(4, 'Faruk Haidarsdfds dfbdf', 'Product5f63289259664', 'public/uploads/product/1678071793293253.jpg', NULL, 'dfgfhdfh', '423423.00', '324.00', 100, 'fgdfhdfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New', 'C5jVPI0UsKA8', '8-18', 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:12:51', '2020-09-17 03:12:51'),
(5, 'Faruk Haidarsdfds dfbdffds dfgdgd', 'Product5f6328ff314cb', 'public/uploads/product/1678071907423700.jpg', NULL, 'dfgfhdfh', '423423.00', '324.00', 100, 'fgdfhdfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New', '55j0H4uI0pER', '8-18', 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:14:39', '2020-09-17 03:14:39'),
(6, 'Faruk Haidarsdfds dfbdffds dfgdgddfsdf dfg', 'Product5f6329ef3ff39', 'public/uploads/product/1678072159142027.jpg', NULL, 'fdgdgdfgdf', '423423.00', '324.00', 100, 'gdfgdfgdfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Used', 's3iKYGQ53IYUfd', '8-18', 'fdgdfgdfg', 'gdfgdfg', 'fsdfsdfsdgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:18:40', '2020-09-17 03:18:40'),
(7, 'Faruk Haidarsdfds dfbdffds dfgdgdcxccvv fvfd', 'Product5f632abe4a08c', 'public/uploads/product/1678072376238446.jpg', NULL, 'vdfvdf vvdfdf', '423423.00', '324.00', 100, 'vdvbfg fgbfbf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New', 'BOSCWg7ru71i', '8-18', NULL, NULL, 'fsdfsdfsdgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:22:06', '2020-09-17 03:22:06'),
(8, 'Faruk Haidarc ccvc c', 'Product5f632b96dc51d', 'public/uploads/product/1678072603330050.jpg', NULL, 'sdfsvsd  svsvsd sdvsdv', '423423.00', '324.00', 100, 'csdv dfv df dfdfb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Used', 'B9EKmbQrWuld', '8-18', NULL, NULL, 'fsdfsdfsdgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:25:43', '2020-09-17 03:25:43'),
(9, 'Faruk zxczx dfsv Haidar', 'Product5f632d1a85e4e', 'public/uploads/product/1678073009823781.jpg', NULL, 'csdfd fddfbdfbdf df dd', '240.00', '450.00', 100, 'dfgdhf fgnfgngff fgnf gf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Used', 'NT3qziNt0JI8', '8-18', NULL, NULL, 'fsdfsdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:32:11', '2020-09-17 03:32:11'),
(10, 'Haruk Haidar dsvsdvsd', 'Product5f63305a2bc5b', 'public/uploads/product/1678073881870046.jpg', NULL, 'xzcx vxc cv bcv cv', '240.00', '200.00', 100, 'vxcvxcvxvcxv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Used', 'pGakzypbpO6z', '8-18', 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:46:02', '2020-09-17 03:46:02'),
(11, 'Faruk Haidar jd hds jdsj', 'Product5f63337b27211', 'public/uploads/product/1678074721760207.jpg', NULL, 'dfggdf d gdfbfbf', '240.00', '200.00', 100, 'bf bfgbfgbfgb f fg bfgbfb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Used', '5e68CuFzYUjS', '8-18', 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 03:59:23', '2020-09-17 03:59:23'),
(12, 'hfasjfas hfas vsd sdhjvsdj', 'Product5f633426511f1', 'public/uploads/product/1678074901238491.jpg', NULL, 'fbfb f jksdjklkd djkdkjkdjkdjgnkdnk ljldjgkd', '240.00', '200.00', 100, 'gdfgdf gdjgd djkdjkdf vkd nv d vjd j', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Used', 'JAFEN7P0yyTS', '8-18', 'fafa', '', 'fsdfsdfsd', 'physical', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-17 04:02:14', '2020-09-17 04:02:14'),
(13, 'Faruk Haidar jgh jhg', 'Product5f671606447ac', 'public/uploads/product/1678341692475559.jpg', NULL, 'rfcgttn', '240.00', '200.00', NULL, 'hyhyhtht', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LLlc46zqNpF6', NULL, 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, 'File', 'E:\\Faruk Haidar\\xampp\\tmp\\phpB97A.tmp', NULL, NULL, 'dfgdfhdfhdfhd', NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 02:42:46', '2020-09-20 02:42:46'),
(14, 'zaahira Akter sdfsd', 'Product5f6719efc3404', 'public/uploads/product/1678342742680271.jpg', NULL, 'dsfsdvsdv', '240.00', '200.00', NULL, 'dsvsdvsvs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iSIGI4f86kyl', NULL, 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, 'File', 'public/uploads/file/product/0IYFbE8qlxlRSKs8sv6I27usMQpPpH9mipkrlzKv.doc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 02:59:28', '2020-09-20 02:59:28'),
(15, 'dfsdfsdfsdf', 'Product5f671aa60a7b3', 'public/uploads/product/1678342933899147.jpg', NULL, 'sfsdfdfdfsg', '240.00', '200.00', NULL, 'gdfgdfgdfdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'F8xd526ECgwO', NULL, 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', NULL, 'File', 'public/uploads/file/product/mFENjoC5DwRSjf8PsOyhAOfbz8nW6tdblFcxFZXw.doc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 03:02:31', '2020-09-20 03:02:31'),
(16, 'jsakdhas askfsjfkhsd', 'Product5f671f7b78174', 'public/uploads/product/1678344231495357.jpg', NULL, 'sdfsdfsdfsdfsd', '240.00', '200.00', NULL, 'sdfasdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vamhHriQict9', NULL, NULL, NULL, 'fsdfsdfsd', NULL, 'File', 'public/uploads/file/product/BZxFnz9XyOHqriumwIZm2skdoG7rTgmzADgdp0pT.doc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 03:23:08', '2020-09-20 03:23:08'),
(17, 'customer name', 'Product5f6720a910cd0', 'public/uploads/product/1678344547695974.jpg', NULL, 'hhjgjfhgfhgfh', '240.00', '200.00', NULL, 'u7kjhkjkjhk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'V72AaQwr8wDa', NULL, NULL, NULL, 'fsdfsdfsd', NULL, 'File', 'public/uploads/file/product/uhST08FEEWy83K60xX9bjdmaPZx7APqjOkFTwWgc.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 03:28:09', '2020-09-20 03:28:09'),
(18, 'Faruk Haidar hgjo jhlkh', 'Product5f6727656e51e', 'public/uploads/product/1678346355817766.jpg', NULL, 'laksdlkasd askdajdladklakd', '240.00', '200.00', NULL, 'daklsdkaldka a akdkajsdlaks askdjsflskjdfsdl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7e6BFC9MjKDO', NULL, 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', 'digital', 'File', 'public/uploads/file/product/KuejcU7WbD0jGEE70EcTxdRGVLxqyduaR8TXM21W.doc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 03:56:54', '2020-09-20 03:56:54'),
(19, 'zaahira Akter', 'Product5f6729f8efd96', 'public/uploads/product/1678347047206535.jpg', NULL, 'iijlklkdaskdskjf', '240.00', '200.00', NULL, 'ksfjksfjwljkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eXscXr00NueA', NULL, 'fdgdfgdfg', 'gdfgdfg', 'lksdfjskdfdmsvmkfjj', 'license', NULL, NULL, NULL, NULL, 'dfgdfhdfhdfhd', NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 04:07:53', '2020-09-20 04:07:53'),
(20, 'Best License Product', 'Product5f672abe5ce5d', 'public/uploads/product/1678347254222673.jpg', NULL, 'sasfsdafdsgdfgdf', '240.00', '200.00', NULL, 'asfsdvd dfvfdd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0E9ASESsduvz', NULL, 'fdgdfgdfg', 'dfsdfsdfsdfsdfsdfsdf', 'lksdfjskdfdmsvmkfjj', 'license', NULL, NULL, NULL, NULL, 'dfgdfhdfhdfhd', NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 04:11:11', '2020-09-20 04:11:11'),
(21, 'brskjfd fdfjkshdfsdjhfkdf', 'Product5f67301ae7b46', 'public/uploads/product/1678348693768527.png', NULL, 'fddvdfgf fbfgbfb', '240.00', '200.00', NULL, 'fvfvf fv fv f fv fv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2Lh90EqQM1IT', NULL, 'fdgdfgdfg', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsdgdfg', 'license', NULL, 'public/uploads/file/product/7Xay9dC5N6Zk1Ja28dsWyYLZtmk9j15GYVnIJrIU.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 04:34:03', '2020-09-20 04:34:03'),
(22, 'Faruk Haidarkx cskcsdcncsc', 'Product5f6731529378f', 'public/uploads/product/1678349020304266.jpg', NULL, 'alskc;lcs slkdcsjldslvksl', '240.00', '200.00', NULL, 'sldkfjsldkfjskvslvnks', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'VZMBTMKUkDew', NULL, 'fsdfsdfsdf', 'gdfgdfgsdfsdfsdf', 'fsdfsdfsd', 'license', NULL, 'public/uploads/file/product/kumhbeQhMmF7NenFTFMU1rlVMINQZdWz97QTZ2BY.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 04:39:15', '2020-09-20 04:39:15'),
(23, 'hdas asdjsa asdaksdjak', 'Product5f67328403824', 'public/uploads/product/1678349340583448.jpg', NULL, 'sdfdsgd  zdjshjvdkjvkdd', '240.00', '200.00', NULL, 'gdfgdfbfn f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'cC4H5vA2xJ7L', NULL, 'fafa', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', 'license', NULL, 'public/uploads/file/product/OASKizkv5dMyGu1nuXbaoOvyHtccmVPxudoqCLz0.zip', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 04:44:20', '2020-09-20 04:44:20'),
(24, 'zaahira Akter dsfs df d', 'Product5f6733f00af9e', 'public/uploads/product/1678349722560584.jpg', NULL, 'kkasfjsk sdfkljsfjlsf', '240.00', '200.00', NULL, 'ldskgdsfd  dfkjgdkfgd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vt9GbFXEWweJ', NULL, 'fdgdfgdfg', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsd', 'license', NULL, 'public/uploads/file/product/IyaFrDr1T2i8mC6NUxU2azSflaw3plZeXW7cR4sF.doc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 04:50:24', '2020-09-20 04:50:24'),
(25, 'beas sjsdd djkjsklkd', 'Product5f6734cff1d74', 'public/uploads/product/1678349957126335.jpg', NULL, 'fgdfkjd;askjfsdjklj', '240.00', '200.00', NULL, 'kdgjdf dfkgjgjdkjkdgjk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GwzL545Yq9fx', NULL, 'fdgdfgdfg', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsdgdfg', 'license', NULL, 'public/uploads/file/product/otgNWan3b1GY5BVcgKdNFkwUftB4tlZ2RTljKads.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-20 04:54:08', '2020-09-20 04:54:08'),
(26, 'Faruk Haidar BD', 'faruk-haidar-bd', 'public/uploads/product/1678350155471516.jpg', NULL, 'Best Product', '2403.00', '2003.00', 100, 'Best Product', NULL, NULL, 'asdas,fasfas,dasdad', NULL, NULL, NULL, NULL, NULL, NULL, 'Used', 'g2gDSyP4UUGR', '10:10', 'Best Product', 'Best Product', 'Best Product', 'license', 'Link', 'public/uploads/file/product/8p6HzbG7EAapqBu2kzFvcY933yt4WsIK65UQ2J1V.doc', NULL, NULL, 'dfgdfhdfhdfhd', NULL, NULL, NULL, 'Gram', '1', 1, '2020-09-20 04:57:17', '2020-09-23 04:11:35'),
(27, 'Redmi Note 4', 'redmi-note-4', 'public/uploads/product/1678621780599753.jpg', NULL, 'asdssd sdvsd sdvsd s s', '240.00', '200.00', 100, 'lsjdvnsdodfi difdjlsd d vdkfjvldkjv dfk vdlkj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'New', 'J7MfwGRh1Kfr', '8-18', 'fdgdfgdfg', 'dfsdfsdfsdfsdfsdfsdf', 'fsdfsdfsdgdfg', 'physical', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '2020-09-23 04:54:41', '2020-09-23 04:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 1, '2020-09-17 04:02:15', '2020-09-23 02:37:19'),
(2, NULL, 2, 1, '2020-09-17 04:02:15', '2020-09-23 02:37:20'),
(3, NULL, 3, 1, '2020-09-20 02:42:47', '2020-09-23 02:37:19'),
(4, NULL, 2, 1, '2020-09-20 02:42:47', '2020-09-23 02:37:20'),
(5, NULL, 3, 1, '2020-09-20 02:59:28', '2020-09-23 02:37:19'),
(6, NULL, 2, 1, '2020-09-20 02:59:29', '2020-09-23 02:37:20'),
(7, NULL, 3, 1, '2020-09-20 03:02:31', '2020-09-23 02:37:19'),
(8, NULL, 2, 1, '2020-09-20 03:02:32', '2020-09-23 02:37:20'),
(9, NULL, 3, 1, '2020-09-20 03:23:08', '2020-09-23 02:37:19'),
(10, NULL, 2, 1, '2020-09-20 03:23:08', '2020-09-23 02:37:20'),
(11, NULL, 3, 1, '2020-09-20 03:28:09', '2020-09-23 02:37:19'),
(12, NULL, 2, 1, '2020-09-20 03:28:10', '2020-09-23 02:37:20'),
(13, 26, 3, 1, '2020-09-20 03:56:54', '2020-09-23 02:37:19'),
(14, 26, 2, 1, '2020-09-20 03:56:54', '2020-09-23 02:37:20'),
(15, 12, 3, 1, '2020-09-20 04:07:53', '2020-09-23 02:37:19'),
(16, 12, 2, 1, '2020-09-20 04:07:53', '2020-09-23 02:37:20'),
(17, 1, 3, 1, '2020-09-20 04:11:11', '2020-09-23 02:37:19'),
(18, 1, 2, 1, '2020-09-20 04:11:11', '2020-09-23 02:37:20'),
(19, 2, 3, 1, '2020-09-20 04:34:04', '2020-09-23 02:37:19'),
(20, 2, 2, 1, '2020-09-20 04:34:04', '2020-09-23 02:37:20'),
(21, 4, 3, 1, '2020-09-20 04:39:15', '2020-09-23 02:37:19'),
(22, 4, 2, 1, '2020-09-20 04:39:16', '2020-09-23 02:37:20'),
(23, 5, 3, 1, '2020-09-20 04:44:20', '2020-09-23 02:37:19'),
(24, 6, 2, 1, '2020-09-20 04:44:20', '2020-09-23 02:37:20'),
(25, 7, 3, 1, '2020-09-20 04:50:25', '2020-09-23 02:37:19'),
(26, NULL, 2, 1, '2020-09-20 04:50:25', '2020-09-23 02:37:20'),
(27, NULL, 3, 1, '2020-09-20 04:54:08', '2020-09-23 02:37:19'),
(28, NULL, 2, 1, '2020-09-20 04:54:08', '2020-09-23 02:37:20'),
(29, NULL, 3, 1, '2020-09-20 04:57:18', '2020-09-23 02:37:19'),
(31, 27, 3, 1, '2020-09-23 04:54:41', '2020-09-23 04:54:41'),
(32, 27, 2, 1, '2020-09-23 04:54:41', '2020-09-23 04:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `name`, `qty`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'fgdfg', 54, '54543.00', 1, '2020-09-17 03:32:12', '2020-09-17 03:32:12'),
(2, 12, 'vcbfg', 543, '534534.00', 1, '2020-09-17 04:02:20', '2020-09-17 04:02:20'),
(3, 27, 'Red', 654, '654.00', 1, '2020-09-23 04:54:42', '2020-09-23 04:54:42'),
(4, 27, 'Blue', 345, '754.00', 1, '2020-09-23 04:54:42', '2020-09-23 04:54:42'),
(5, 27, 'Green', 543, '532.00', 1, '2020-09-23 04:54:42', '2020-09-23 04:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature_tags`
--

CREATE TABLE `product_feature_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_feature_tags`
--

INSERT INTO `product_feature_tags` (`id`, `product_id`, `tag`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 'fdfdgdf', 423423, 1, '2020-09-20 03:28:10', '2020-09-20 03:28:10'),
(2, 17, 'frgrgtgtrg', 34234, 1, '2020-09-20 03:28:10', '2020-09-20 03:28:10'),
(3, 18, 'jdasdkjs', 5454, 1, '2020-09-20 03:56:55', '2020-09-20 03:56:55'),
(4, 18, 'fdfgert', 432, 1, '2020-09-20 03:56:55', '2020-09-20 03:56:55'),
(5, 18, 'sdfsfsd', 434, 1, '2020-09-20 03:56:55', '2020-09-20 03:56:55'),
(6, 18, 'dsfdgdf', 34534, 1, '2020-09-20 03:56:55', '2020-09-20 03:56:55'),
(7, 20, 'sdfsdfsd', 324, 1, '2020-09-20 04:11:12', '2020-09-20 04:11:12'),
(8, 20, 'fsdfsdgdf', 34, 1, '2020-09-20 04:11:12', '2020-09-20 04:11:12'),
(9, 21, 'dfdfvf vf', 343, 1, '2020-09-20 04:34:05', '2020-09-20 04:34:05'),
(10, 21, 'sdvdfvdfv', 343, 1, '2020-09-20 04:34:05', '2020-09-20 04:34:05'),
(11, 22, 'sdfsdfsd', 454, 1, '2020-09-20 04:39:16', '2020-09-20 04:39:16'),
(12, 22, 'fsdfsdg', 435, 1, '2020-09-20 04:39:16', '2020-09-20 04:39:16'),
(13, 22, 'gdfhfghfg', 5454, 1, '2020-09-20 04:39:16', '2020-09-20 04:39:16'),
(14, 23, 'fdsgdfgd', 43, 1, '2020-09-20 04:44:20', '2020-09-20 04:44:20'),
(15, 23, 'fhdfghfgd', 43, 1, '2020-09-20 04:44:20', '2020-09-20 04:44:20'),
(16, 23, 'fghghkjhh', 54, 1, '2020-09-20 04:44:21', '2020-09-20 04:44:21'),
(17, 23, 'dfgdgdf', 54, 1, '2020-09-20 04:44:21', '2020-09-20 04:44:21'),
(18, 24, 'dsdfsdf', 345, 1, '2020-09-20 04:50:25', '2020-09-20 04:50:25'),
(19, 24, 'dsgsdfg', 434, 1, '2020-09-20 04:50:25', '2020-09-20 04:50:25'),
(20, 24, 'dfgdfg', 44, 1, '2020-09-20 04:50:25', '2020-09-20 04:50:25'),
(21, 25, 'gdfgdf', 343, 1, '2020-09-20 04:54:09', '2020-09-20 04:54:09'),
(22, 25, 'gdfgdfg', 434, 1, '2020-09-20 04:54:09', '2020-09-20 04:54:09'),
(23, 26, 'fdgdfg', 45, 1, '2020-09-20 04:57:20', '2020-09-20 04:57:20'),
(24, 26, 'dfgdfh fhdfgfg', 45, 1, '2020-09-20 04:57:20', '2020-09-20 04:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `gallery`, `status`, `created_at`, `updated_at`) VALUES
(1, 26, 'public/uploads/product-gallery/1678350161452173.jpg', 1, '2020-09-20 04:57:24', '2020-09-20 04:57:24'),
(2, 26, 'public/uploads/product-gallery/1678350163413071.jpg', 1, '2020-09-20 04:57:25', '2020-09-20 04:57:25'),
(3, 26, 'public/uploads/product-gallery/1678350164499192.png', 1, '2020-09-20 04:57:25', '2020-09-20 04:57:25'),
(4, 26, 'public/uploads/product-gallery/1678350164885992.PNG', 1, '2020-09-20 04:57:26', '2020-09-20 04:57:26'),
(5, NULL, 'public/uploads/product-gallery/1678622639618654.jpg', 1, '2020-09-23 05:08:18', '2020-09-23 05:08:18'),
(6, NULL, 'public/uploads/product-gallery/1678622705771326.jpg', 1, '2020-09-23 05:09:21', '2020-09-23 05:09:21'),
(7, NULL, 'public/uploads/product-gallery/1678623821400726.jpg', 1, '2020-09-23 05:27:05', '2020-09-23 05:27:05'),
(8, NULL, 'public/uploads/product-gallery/1678624047197139.jpg', 1, '2020-09-23 05:30:42', '2020-09-23 05:30:42'),
(9, NULL, 'public/uploads/product-gallery/1678624052611448.jpg', 1, '2020-09-23 05:30:46', '2020-09-23 05:30:46'),
(10, NULL, 'public/uploads/product-gallery/1678624858171982.jpg', 1, '2020-09-23 05:43:43', '2020-09-23 05:43:43'),
(11, 27, 'public/uploads/product-gallery/1678625182386626.jpg', 1, '2020-09-23 05:48:44', '2020-09-23 05:48:44'),
(12, 27, 'public/uploads/product-gallery/1678625183407564.jpg', 1, '2020-09-23 05:48:44', '2020-09-23 05:48:44'),
(13, 27, 'public/uploads/product-gallery/1678625183621030.jpg', 1, '2020-09-23 05:48:44', '2020-09-23 05:48:44'),
(14, 27, 'public/uploads/product-gallery/1678625183764608.jpg', 1, '2020-09-23 05:48:44', '2020-09-23 05:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_licenses`
--

CREATE TABLE `product_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_licenses`
--

INSERT INTO `product_licenses` (`id`, `product_id`, `key`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 21, 'dfgdfgdf', 434, 1, '2020-09-20 04:34:05', '2020-09-20 04:34:05'),
(2, 21, 'dsvdfvfg', 43, 1, '2020-09-20 04:34:05', '2020-09-20 04:34:05'),
(3, 22, 'dsfgdgsdf', 54, 1, '2020-09-20 04:39:16', '2020-09-20 04:39:16'),
(4, 22, 'fdfgdfhdf', 45, 1, '2020-09-20 04:39:16', '2020-09-20 04:39:16'),
(5, 22, 'vxcvxvdbdffb', 54, 1, '2020-09-20 04:39:17', '2020-09-20 04:39:17'),
(6, 23, 'dfgdfgdf', 43, 1, '2020-09-20 04:44:21', '2020-09-20 04:44:21'),
(7, 23, 'dfsdf', 43, 1, '2020-09-20 04:44:21', '2020-09-20 04:44:21'),
(8, 23, 'dsfsdfdg', 54, 1, '2020-09-20 04:44:21', '2020-09-20 04:44:21'),
(9, 24, 'dfgdfgdf', 344, 1, '2020-09-20 04:50:25', '2020-09-20 04:50:25'),
(10, 24, 'dasdasd', 434, 1, '2020-09-20 04:50:25', '2020-09-20 04:50:25'),
(11, 24, 'gdffvdvdf', 54, 1, '2020-09-20 04:50:25', '2020-09-20 04:50:25'),
(12, 25, 'fdsvddf', 43, 1, '2020-09-20 04:54:09', '2020-09-20 04:54:09'),
(13, 25, 'fdsfddb', 43, 1, '2020-09-20 04:54:09', '2020-09-20 04:54:09'),
(14, 25, 'hdbdcvb dfgb', 43, 1, '2020-09-20 04:54:09', '2020-09-20 04:54:09'),
(15, 25, 'fdsdfdfg', 43, 1, '2020-09-20 04:54:09', '2020-09-20 04:54:09'),
(16, 25, 'jhkjljljl', 54, 1, '2020-09-20 04:54:09', '2020-09-20 04:54:09'),
(17, 26, 'dfgdfgdf', 43, 1, '2020-09-20 04:57:22', '2020-09-20 04:57:22'),
(18, 26, 'dffffffffdsfdfgd', 43, 1, '2020-09-20 04:57:22', '2020-09-20 04:57:22'),
(19, 26, 'hdfsdfhg', 43, 1, '2020-09-20 04:57:22', '2020-09-20 04:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `name`, `qty`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'ccsd', 545, '543.00', 1, '2020-09-17 03:32:11', '2020-09-17 03:32:11'),
(2, 9, 'fgdfgd', 54, '345.00', 1, '2020-09-17 03:32:11', '2020-09-17 03:32:11'),
(3, 12, 'asdasd', 434, '3424.00', 1, '2020-09-17 04:02:16', '2020-09-17 04:02:16'),
(4, 12, 'dfgdf', 43, '5345.00', 1, '2020-09-17 04:02:17', '2020-09-17 04:02:17'),
(5, 12, 'vdffvd', 434, '5343.00', 1, '2020-09-17 04:02:17', '2020-09-17 04:02:17'),
(6, 27, 'X', 43, '456.00', 1, '2020-09-23 04:54:41', '2020-09-23 04:54:41'),
(7, 27, 'L', 34, '45.00', 1, '2020-09-23 04:54:41', '2020-09-23 04:54:41'),
(8, 27, 'XL', 453, '234.00', 1, '2020-09-23 04:54:42', '2020-09-23 04:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_whole_sells`
--

CREATE TABLE `product_whole_sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_whole_sells`
--

INSERT INTO `product_whole_sells` (`id`, `product_id`, `discount`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 534, 443, 1, '2020-09-17 04:02:21', '2020-09-17 04:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Writer', 'admin', '2020-09-10 06:37:37', '2020-09-12 00:49:56'),
(2, 'Admin', 'admin', '2020-09-10 06:41:03', '2020-09-10 06:41:03'),
(3, 'Super Admin', 'admin', '2020-09-10 06:41:04', '2020-09-10 06:41:04'),
(4, 'Subscriber', 'web', '2020-09-11 23:14:26', '2020-09-11 23:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 3),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 2),
(11, 3),
(12, 1),
(12, 2),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(16, 3),
(17, 1),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 1),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 1),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 1),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 1),
(37, 3),
(38, 3),
(39, 3),
(40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Master Admin panel', NULL, '2020-09-08 00:40:21'),
(2, 'site_title', 'Ecommerce BD', NULL, NULL),
(3, 'site_logo', 'public/uploads/logo/1677246919607513.png', NULL, '2020-09-08 00:41:50'),
(4, 'site_footer_logo', 'public/uploads/logo/1677248939929743.png', NULL, '2020-09-08 01:13:57'),
(5, 'site_image', 'public/uploads/logo/1677249068006613.jpg', NULL, '2020-09-08 01:15:58'),
(6, 'site_meta', 'ecommerce websie bd', NULL, NULL),
(7, 'site_details', 'This is the best ecommerce site in bangladesh', NULL, NULL),
(8, 'site_subtitle', 'okkkkk', NULL, NULL),
(9, 'site_favicon', 'public/uploads/logo/1677247463429308.jpg', NULL, '2020-09-08 00:50:28'),
(10, 'social_facebook', '#facebook', NULL, '2020-09-08 01:30:24'),
(11, 'social_linkedin', '#', NULL, NULL),
(12, 'social_twitter', '#', NULL, NULL),
(13, 'social_googleplus', '#', NULL, NULL),
(14, 'social_pinterest', '#', NULL, NULL),
(15, 'social_rss', '#', NULL, NULL),
(16, 'social_flickr', '#', NULL, NULL),
(17, 'social_youtube', '#', NULL, NULL),
(18, 'social_vimeo', '#', NULL, NULL),
(19, 'social_skype', '#', NULL, NULL),
(20, 'phone1', '01949796940', NULL, '2020-09-08 01:58:08'),
(21, 'phone2', '4535345345345', NULL, NULL),
(22, 'phone3', '2097370298', NULL, '2020-09-08 01:58:09'),
(23, 'phone4', '2097370298', NULL, '2020-09-08 01:58:09'),
(24, 'email1', 'farukhaffrbd@gmail.com', NULL, '2020-09-08 01:58:09'),
(25, 'email2', 'farukhaffrbd@gmail.com', NULL, '2020-09-08 01:58:09'),
(26, 'email3', 'farukhaffrbd@gmail.com', NULL, '2020-09-08 01:58:10'),
(27, 'email4', 'farukhaffrbd@gmail.com', NULL, '2020-09-08 01:58:10'),
(28, 'address1', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, '2020-09-08 02:27:30'),
(29, 'address2', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, '2020-09-08 02:27:30'),
(30, 'address3', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, '2020-09-08 02:27:31'),
(31, 'address4', '#80,jafrabad, sara bangla road, dhaka 1207', NULL, '2020-09-08 02:27:31'),
(32, 'copywrite_title', '##', NULL, '2020-09-08 02:31:07'),
(33, 'currency_symbol', 'Tk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Best Product', 'best-product', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `details`, `image`, `facebook`, `twitter`, `linkedin`, `pinterest`, `google`, `youtube`, `slug`, `publish`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Haidar BD', 'Web Developer', 'fsdv sfbvdbdgd', 'public/uploads/team/1677354497638048.png', 'gddg', 'dfgdfgdf', 'gdf', 'gdfg', 'dgdgd', 'gdg', 'faruk-haidar-bd', 0, 1, '2020-09-09 04:57:04', '2020-09-09 05:11:44'),
(2, 'Shohel Rana', 'Web Developer', 'asdafadsfsd', 'public/uploads/team/1677353686730078.png', NULL, NULL, NULL, NULL, NULL, NULL, 'shohel-rana', 0, 0, '2020-09-09 04:58:50', '2020-09-09 05:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `company`, `review`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Haidar BD', 'Web Developer', 'jjashdakhsdajskd', 'dsfsdfsdf', 'public/uploads/testimonial/1677422677887330.png', 'Testm_205f59b6f264fdb', 1, '2020-09-09 23:15:25', '2020-09-09 23:17:38'),
(2, 'Shohel Khan', 'Web Developer', 'jjashdakhsdajskd', 'asdac sdvdsvs', 'public/uploads/testimonial/1677422843262290.png', 'Testm_205f59b70b5f537', 0, '2020-09-09 23:18:03', '2020-09-09 23:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_title_unique` (`title`),
  ADD KEY `blog_posts_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_gallery_category_id_foreign` (`gallery_category_id`),
  ADD KEY `galleries_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_categories_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partners_title_unique` (`title`),
  ADD UNIQUE KEY `partners_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_feature_tags`
--
ALTER TABLE `product_feature_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_feature_tags_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_licenses`
--
ALTER TABLE `product_licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_licenses_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_whole_sells`
--
ALTER TABLE `product_whole_sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_whole_sells_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_feature_tags`
--
ALTER TABLE `product_feature_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_licenses`
--
ALTER TABLE `product_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_whole_sells`
--
ALTER TABLE `product_whole_sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `galleries_gallery_category_id_foreign` FOREIGN KEY (`gallery_category_id`) REFERENCES `gallery_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_feature_tags`
--
ALTER TABLE `product_feature_tags`
  ADD CONSTRAINT `product_feature_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_licenses`
--
ALTER TABLE `product_licenses`
  ADD CONSTRAINT `product_licenses_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_whole_sells`
--
ALTER TABLE `product_whole_sells`
  ADD CONSTRAINT `product_whole_sells_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
