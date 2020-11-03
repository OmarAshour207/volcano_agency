-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 01:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'عننا', 'About Us', 'About Us Desc in ar', 'About Us Desc in en', 'bIs6hBCKXWcTcWefW6r8cOGH8ziIkVbfVOBQrvWa.jpeg', '2020-09-08 00:51:33', '2020-11-02 13:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `ar_author`, `en_author`, `ar_title`, `en_title`, `ar_content`, `en_content`, `ar_meta_tag`, `en_meta_tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dolore deleniti mini', 'Corrupti obcaecati', 'Modi eos eos quaerat', 'Sint corporis fugit', '<p>Omnis ut cupidatat d.</p>', '<p>Pariatur. Quis fuga.</p>', 'Aspernatur qui ratio', 'Id cillum proident', '32jvfrnwXARGtqfBgmVeevh6VtZj0JzTtWBEUa8n.jpeg', '2020-09-09 14:19:19', '2020-09-09 14:19:19'),
(2, 'Dolore deleniti mini', 'Corrupti obcaecati', 'Modi eos eos quaerat', 'Sint corporis fugit', '<p>Omnis ut cupidatat d.</p>', '<p>Pariatur. Quis fuga.</p>', 'Aspernatur qui ratio', 'Id cillum proident', '32jvfrnwXARGtqfBgmVeevh6VtZj0JzTtWBEUa8n.jpeg', '2020-09-09 14:19:19', '2020-09-09 14:19:19'),
(3, 'Dolore deleniti mini', 'Corrupti obcaecati', 'Modi eos eos quaerat', 'Sint corporis fugit', '<p>Omnis ut cupidatat d.</p>', '<p>Pariatur. Quis fuga.</p>', 'Aspernatur qui ratio', 'Id cillum proident', '32jvfrnwXARGtqfBgmVeevh6VtZj0JzTtWBEUa8n.jpeg', '2020-09-09 14:19:19', '2020-09-09 14:19:19'),
(4, 'Dolore deleniti mini', 'Corrupti obcaecati', 'Modi eos eos quaerat', 'Sint corporis fugit', '<p>Omnis ut cupidatat d.</p>', '<p>Pariatur. Quis fuga.</p>', 'Aspernatur qui ratio', 'Id cillum proident', '32jvfrnwXARGtqfBgmVeevh6VtZj0JzTtWBEUa8n.jpeg', '2020-09-09 14:19:19', '2020-09-09 14:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `booking_orders`
--

CREATE TABLE `booking_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_orders`
--

INSERT INTO `booking_orders` (`id`, `name`, `email`, `phone`, `address`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vance Gamble', 'jifej@mailinator.net', '01117641613', 'Eius ex ullamco pers', 'Hotel', 0, '2020-09-08 23:09:18', '2020-09-08 23:37:35'),
(2, 'Omar Abdalaziz', 'omar@gmail.com', '01117641613', 'asd', 'Trip', 0, '2020-09-09 02:15:48', '2020-09-09 02:15:48'),
(3, 'Omar Abdalaziz', 'admin@app.com', '01117641613', 'asd', 'Hotel', 0, '2020-09-09 12:52:23', '2020-09-09 12:52:23'),
(4, 'Omar Abdalaziz', 'omar@gmail.com', '01117641613', 'Harum aliquip lorem', 'Trip', 0, '2020-11-02 13:00:30', '2020-11-02 13:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ar_name`, `en_name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'الاسم بالعربيه', 'name in english', 'fa fa-plane', '2020-11-02 10:07:17', '2020-11-02 10:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_notifications`
--

CREATE TABLE `contact_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_notifications`
--

INSERT INTO `contact_notifications` (`id`, `name`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Omar Abdalaziz', 'book_flight http://volcano-hotel.devel/admin/flights/1/edit', 0, '2020-09-08 14:31:09', '2020-09-08 14:31:09'),
(2, 'Omar Abdalaziz', 'Book Trip Order', 0, '2020-09-09 02:15:48', '2020-09-09 02:15:48'),
(3, 'Omar Abdalaziz', 'Book Hotel Order', 0, '2020-09-09 12:52:23', '2020-09-09 12:52:23'),
(4, 'Omar Abdalaziz', 'طلب حجز رحله', 0, '2020-11-02 13:00:30', '2020-11-02 13:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `take_off` date NOT NULL,
  `take_off_time` time NOT NULL,
  `landing` date NOT NULL,
  `landing_time` time NOT NULL,
  `adults` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `ar_start`, `en_start`, `ar_destination`, `en_destination`, `price`, `status`, `image`, `take_off`, `take_off_time`, `landing`, `landing_time`, `adults`, `created_at`, `updated_at`) VALUES
(1, 'القاهره', 'Cairo', 'الاسكندريه', 'Alex', '250', '0', 'laF5cZtlR8fphAYLOt6AePXudzVPAxfgytUag3DV.jpeg', '2020-09-08', '16:00:00', '2020-09-10', '17:22:41', 2, NULL, '2020-11-02 10:45:22'),
(2, 'القاهره', 'Cairo', 'الاسكندريه', 'Alex', '250', '0', '0MafgPf0xp4tXotvbNHC9we62hQlhD8vH1hmFP4X.jpeg', '2020-09-08', '16:00:00', '2020-09-10', '17:22:41', 2, NULL, '2020-11-02 10:44:54'),
(3, 'القاهره', 'Cairo', 'الاسكندريه', 'Alex', '250', '0', '0MafgPf0xp4tXotvbNHC9we62hQlhD8vH1hmFP4X.jpeg', '2020-09-08', '16:00:00', '2020-09-10', '17:22:41', 2, NULL, '2020-11-02 10:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_number` tinyint(4) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `ar_name`, `en_name`, `ar_description`, `en_description`, `address`, `stars_number`, `image`, `created_at`, `updated_at`) VALUES
(1, 'أسم الفندق بالعربيه', 'Gay Marks', 'وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'عنوان الفندق بالعربيه', 3, 'ExAt2VvRljmkb2fvEau7ymcbqIAk2ec3LCfAMoZY.jpeg', '2020-09-09 12:00:09', '2020-11-02 10:12:07'),
(2, 'أسم الفندق بالعربيه', 'Gay Marks', 'وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'عنوان الفندق بالعربيه', 3, 'ExAt2VvRljmkb2fvEau7ymcbqIAk2ec3LCfAMoZY.jpeg', '2020-09-09 12:00:09', '2020-11-02 10:12:07'),
(3, 'أسم الفندق بالعربيه', 'Gay Marks', 'وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'عنوان الفندق بالعربيه', 3, 'ExAt2VvRljmkb2fvEau7ymcbqIAk2ec3LCfAMoZY.jpeg', '2020-09-09 12:00:09', '2020-11-02 10:12:07'),
(4, 'أسم الفندق بالعربيه', 'Gay Marks', 'وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه وصف الفندق بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'عنوان الفندق بالعربيه', 3, 'ExAt2VvRljmkb2fvEau7ymcbqIAk2ec3LCfAMoZY.jpeg', '2020-09-09 12:00:09', '2020-11-02 10:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_offers`
--

CREATE TABLE `hotel_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `rooms` int(11) NOT NULL,
  `adults` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_offers`
--

INSERT INTO `hotel_offers` (`id`, `hotel_id`, `price`, `check_in`, `check_out`, `rooms`, `adults`, `kids`, `created_at`, `updated_at`) VALUES
(1, 1, '500', '2020-09-09', '2020-11-09', 2, 4, 7, '2020-09-09 12:01:11', '2020-09-09 12:01:11'),
(2, 1, '500', '2020-09-09', '2020-11-09', 2, 4, 7, '2020-09-09 12:01:11', '2020-09-09 12:01:11'),
(3, 1, '500', '2020-09-09', '2020-11-09', 2, 4, 7, '2020-09-09 12:01:11', '2020-09-09 12:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2020_07_27_122405_create_sliders_table', 1),
(3, '2020_07_27_150345_create_services_table', 1),
(4, '2020_07_28_111253_create_abouts_table', 1),
(5, '2020_07_28_111604_create_testimonials_table', 1),
(6, '2020_07_28_112621_create_contacts_table', 1),
(7, '2020_07_28_151051_create_blogs_table', 1),
(8, '2020_07_28_175733_create_team_members_table', 1),
(9, '2020_07_29_140143_create_projects_table', 1),
(10, '2020_08_04_091617_create_website_settings_table', 1),
(11, '2020_08_04_114528_create_logos_table', 1),
(12, '2020_08_10_124838_create_visitors_table', 1),
(13, '2020_08_12_113818_create_themes_table', 1),
(14, '2020_08_12_172309_create_contactuses_table', 1),
(15, '2020_09_07_002025_create_contact_notifications_table', 1),
(16, '2020_09_07_163412_create_categories_table', 1),
(17, '2020_09_07_185053_create_hotels_table', 1),
(18, '2020_09_07_193500_create_hotel_offers_table', 1),
(19, '2020_09_07_223022_create_flights_table', 1),
(20, '2020_09_08_005144_create_trips_table', 1),
(23, '2020_09_08_154002_create_booking_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `ar_meta_tag`, `en_meta_tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'اللقب بالعربيه', 'title in english for testimonials', 'الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه', 'english description english description english description english description english description english description english description english description english description english description', 'Lorem quia non Nam q', 'Laboris esse amet', 'enJc49aAgY9OJSV2kT4KoimoPJyE3sr0hQQzGS5D.png', '2020-11-02 11:23:14', '2020-11-02 11:23:14'),
(2, 'اللقب بالعربيه', 'title in english for testimonials', 'الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه', 'english description english description english description english description english description english description english description english description english description english description', 'Lorem quia non Nam q', 'Laboris esse amet', 'enJc49aAgY9OJSV2kT4KoimoPJyE3sr0hQQzGS5D.png', '2020-11-02 11:23:14', '2020-11-02 11:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `image`, `created_at`, `updated_at`) VALUES
(1, '<h2>اللقب بالعربيه&nbsp;</h2>', '<h2>engish description</h2>', '<p>الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;</p>', '<p>english description&nbsp;english description&nbsp;english description&nbsp;english description&nbsp;english description&nbsp;english description&nbsp;</p>', 'zmjSf5eYuoamuFjrUPkKNhNwPXaBOw9qkAsifnmQ.jpeg', '2020-11-02 10:19:24', '2020-11-02 10:19:24'),
(2, '<h2>اللقب بالعربيه&nbsp;</h2>', '<h2>engish description</h2>', '<p>الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;الوصف بالعربيه&nbsp;</p>', '<p>english description&nbsp;english description&nbsp;english description&nbsp;english description&nbsp;english description&nbsp;english description&nbsp;</p>', 'zmjSf5eYuoamuFjrUPkKNhNwPXaBOw9qkAsifnmQ.jpeg', '2020-11-02 10:19:24', '2020-11-02 10:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `ar_name`, `en_name`, `ar_title`, `en_title`, `ar_description`, `en_description`, `ar_meta_tag`, `en_meta_tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Alvin Barr', 'Byron Gonzales', 'Reprehenderit et vol', 'Pariatur Atque porr', 'Ea quia incididunt n', 'Repellendus Dolores', 'Esse lorem facere su', 'Saepe velit veritati', '6cziQ3EaDDG8q6FfzLqpPSKG8iG6F9xH5jV8zVvd.jpeg', '2020-09-09 15:00:14', '2020-09-09 15:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `ar_name`, `en_name`, `ar_title`, `en_title`, `ar_description`, `en_description`, `ar_meta_tag`, `en_meta_tag`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ألاسم بالعربيه', 'name in english', 'اللقب بالعربيه', 'title in english for testimonials', 'الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'Lorem quia non Nam q', 'Laboris esse amet', 'Le4foiNwadtta8cwbx9oB2nIETFYtSH7960uC5l2.jpeg', '2020-11-02 10:49:01', '2020-11-02 10:49:01'),
(2, 'ألاسم بالعربيه', 'name in english', 'اللقب بالعربيه', 'title in english for testimonials', 'الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'Lorem quia non Nam q', 'Laboris esse amet', 'Le4foiNwadtta8cwbx9oB2nIETFYtSH7960uC5l2.jpeg', '2020-11-02 10:49:01', '2020-11-02 10:49:01'),
(3, 'ألاسم بالعربيه', 'name in english', 'اللقب بالعربيه', 'title in english for testimonials', 'الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'Lorem quia non Nam q', 'Laboris esse amet', 'Le4foiNwadtta8cwbx9oB2nIETFYtSH7960uC5l2.jpeg', '2020-11-02 10:49:01', '2020-11-02 10:49:01'),
(4, 'ألاسم بالعربيه', 'name in english', 'اللقب بالعربيه', 'title in english for testimonials', 'الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه الوصف بالعربيه', 'description in english description in english description in english description in english description in english description in english description in english description in english description in english description in english', 'Lorem quia non Nam q', 'Laboris esse amet', 'Le4foiNwadtta8cwbx9oB2nIETFYtSH7960uC5l2.jpeg', '2020-11-02 10:49:01', '2020-11-02 10:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `ar_title`, `en_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الأول', 'first', 1, '2020-09-08 00:51:32', '2020-09-08 00:51:32'),
(2, 'الثاني', 'second', 0, '2020-09-08 00:51:32', '2020-09-08 00:51:32'),
(3, 'الثالث', 'third', 0, '2020-09-08 00:51:32', '2020-09-08 00:51:32'),
(4, 'الرابع', 'fourth', 0, '2020-09-08 00:51:33', '2020-09-08 00:51:33'),
(5, 'الخامس', 'fifth', 0, '2020-09-08 00:51:33', '2020-09-08 00:51:33'),
(6, 'السادس', 'sixth', 0, '2020-09-08 00:51:33', '2020-09-08 00:51:33'),
(7, 'السابع', 'seventh', 0, '2020-09-08 00:51:33', '2020-09-08 00:51:33'),
(8, 'الثامن', 'eighth', 0, '2020-09-08 00:51:33', '2020-09-08 00:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `start_at_time` time NOT NULL,
  `end_at` date NOT NULL,
  `end_at_time` time NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `ar_title`, `en_title`, `ar_description`, `en_description`, `ar_start`, `en_start`, `ar_destination`, `en_destination`, `start_at`, `start_at_time`, `end_at`, `end_at_time`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Quia sit magnam des', 'Aliquip recusandae', '<p>Iure error obcaecati.</p>', '<p>Doloremque eaque qua.</p>', 'Veniam culpa proide', 'In ut quo earum culp', 'Ut sint reiciendis', 'Totam qui nostrum qu', '2020-08-01', '10:07:00', '2020-08-25', '05:17:00', '757', '1GeMsoaC0fIekAWTIK7W6WzT4syVZiKhMg8Pux3P.jpeg', '2020-09-08 00:52:30', '2020-09-08 00:52:47'),
(2, 'Quia sit magnam des', 'Aliquip recusandae', '<p>Iure error obcaecati.</p>', '<p>Doloremque eaque qua.</p>', 'Veniam culpa proide', 'In ut quo earum culp', 'Ut sint reiciendis', 'Totam qui nostrum qu', '2020-08-01', '10:07:00', '2020-08-25', '05:17:00', '757', '1GeMsoaC0fIekAWTIK7W6WzT4syVZiKhMg8Pux3P.jpeg', '2020-09-08 00:52:30', '2020-09-08 00:52:47'),
(3, 'Quia sit magnam des', 'Aliquip recusandae', '<p>Iure error obcaecati.</p>', '<p>Doloremque eaque qua.</p>', 'Veniam culpa proide', 'In ut quo earum culp', 'Ut sint reiciendis', 'Totam qui nostrum qu', '2020-08-01', '10:07:00', '2020-08-25', '05:17:00', '757', '1GeMsoaC0fIekAWTIK7W6WzT4syVZiKhMg8Pux3P.jpeg', '2020-09-08 00:52:30', '2020-09-08 00:52:47'),
(4, 'Quia sit magnam des', 'Aliquip recusandae', '<p>Iure error obcaecati.</p>', '<p>Doloremque eaque qua.</p>', 'Veniam culpa proide', 'In ut quo earum culp', 'Ut sint reiciendis', 'Totam qui nostrum qu', '2020-08-01', '10:07:00', '2020-08-25', '05:17:00', '757', '1GeMsoaC0fIekAWTIK7W6WzT4syVZiKhMg8Pux3P.jpeg', '2020-09-08 00:52:30', '2020-09-08 00:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@app.com', NULL, '$2y$10$YU0MF65qcA1/wnMP4vymIOKfoxoiDx/i4GtSY78qFyzSRH3uE.9J2', NULL, NULL, '2020-09-08 00:51:32', '2020-09-08 00:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `page`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'home', '2020-09-08 01:00:35', '2020-09-08 01:00:35'),
(2, '127.0.0.1', 'home', '2020-09-09 12:58:36', '2020-09-09 12:58:36'),
(3, '127.0.0.1', 'services', '2020-09-09 13:47:08', '2020-09-09 13:47:08'),
(4, '127.0.0.1', 'blogs', '2020-09-09 14:15:04', '2020-09-09 14:15:04'),
(5, '127.0.0.1', 'about', '2020-09-09 14:56:40', '2020-09-09 14:56:40'),
(6, '127.0.0.1', 'contact-us', '2020-09-09 15:26:25', '2020-09-09 15:26:25'),
(7, '127.0.0.1', 'services', '2020-09-10 10:21:08', '2020-09-10 10:21:08'),
(8, '127.0.0.1', 'home', '2020-09-10 13:23:51', '2020-09-10 13:23:51'),
(9, '127.0.0.1', 'home', '2020-09-13 11:34:25', '2020-09-13 11:34:25'),
(10, '127.0.0.1', 'home', '2020-10-27 09:04:53', '2020-10-27 09:04:53'),
(11, '127.0.0.1', 'home', '2020-10-28 18:18:30', '2020-10-28 18:18:30'),
(12, '127.0.0.1', 'home', '2020-11-02 09:11:47', '2020-11-02 09:11:47'),
(13, '127.0.0.1', 'services', '2020-11-02 13:32:09', '2020-11-02 13:32:09'),
(14, '127.0.0.1', 'projects', '2020-11-02 13:32:41', '2020-11-02 13:32:41'),
(15, '127.0.0.1', 'about', '2020-11-02 13:33:09', '2020-11-02 13:33:09'),
(16, '127.0.0.1', 'blogs', '2020-11-02 13:35:14', '2020-11-02 13:35:14'),
(17, '127.0.0.1', 'contact-us', '2020-11-02 13:36:14', '2020-11-02 13:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_filter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `page_filter`, `color`, `created_at`, `updated_at`) VALUES
(1, '\"a:9:{i:0;s:5:\\\"about\\\";i:1;s:12:\\\"our_projects\\\";i:2;s:8:\\\"contacts\\\";i:3;s:12:\\\"our_services\\\";i:4;s:4:\\\"stat\\\";i:5;s:12:\\\"team_members\\\";i:6;s:12:\\\"testimonials\\\";i:7;s:11:\\\"latest_blog\\\";i:8;s:12:\\\"hotel_offers\\\";}\"', 1, '2020-09-08 00:51:32', '2020-09-08 00:51:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_orders`
--
ALTER TABLE `booking_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_notifications`
--
ALTER TABLE `contact_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_offers`
--
ALTER TABLE `hotel_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_offers_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking_orders`
--
ALTER TABLE `booking_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_notifications`
--
ALTER TABLE `contact_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_offers`
--
ALTER TABLE `hotel_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_offers`
--
ALTER TABLE `hotel_offers`
  ADD CONSTRAINT `hotel_offers_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
