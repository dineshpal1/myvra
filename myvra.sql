-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 04:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myvra`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `from_ip` varchar(20) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone`, `reset_token`, `last_login`, `from_ip`, `is_admin`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 'admin', 'admin@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 'admin', 'admin', '123456789', '', '2020-12-14 14:28:39', NULL, 1, '2020-12-14 14:28:39', '2020-12-15 03:06:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 'Test Brand1', '2021-01-06 04:43:51', '2021-01-06 21:54:50', 0, 1),
(2, 'Test Brand2', '2021-01-06 04:43:52', '2021-01-06 21:54:52', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `country_code` char(6) DEFAULT NULL,
  `country_code_iso` char(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`, `country_code_iso`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 'Albania', 'AL', 'ALB', '2020-12-04 11:45:54', '2020-12-23 02:13:53', 0, 1),
(8, 'INDIA', 'IND', 'ind', '2020-12-15 10:23:06', '2020-12-15 22:28:55', 0, 1),
(9, 'Pakistan', 'pk', 'pak', '2020-12-23 02:13:31', '2020-12-23 02:14:25', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_code` varchar(10) DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `reset_token` varchar(250) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `restaurant_name` varchar(100) DEFAULT NULL,
  `restaurant_address` varchar(250) DEFAULT NULL,
  `country_id` int(5) DEFAULT 0,
  `state_id` int(5) DEFAULT 0,
  `city` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `referral_code` varchar(100) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp(),
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `from_ip` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_code`, `email`, `password`, `remember_token`, `reset_token`, `customer_name`, `restaurant_name`, `restaurant_address`, `country_id`, `state_id`, `city`, `phone`, `referral_code`, `last_login`, `email_verified_at`, `from_ip`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(2, '0', 'sandeep.p@rediansoftware.com', '$2y$10$5plzz.BxnsUt.AWP79nY3ePid9LrSjcajxhVYfaIlKhw.3EKTZGxW', NULL, '50ea66733fe5ab8e78590f0292c5921c', 'cs', 'resturant', 'adeee', 1, 1, 'asdf', 'asd', NULL, '2020-12-08 07:28:29', '2020-12-04 11:46:55', NULL, '2020-12-04 06:16:55', '2020-12-09 04:54:09', 0, 1),
(3, NULL, 'test1@test.com', '$2y$10$kCS4G5Fx0pvLGJGiNnvNHOZKMychiWvHcqOqWjzu2GLdrUAXQBrb2', NULL, NULL, 'customer', 'aaa', 'aaaa', 1, 1, 'aaaa', '22323232', NULL, '2020-12-07 18:42:06', '2020-12-07 18:42:06', NULL, '2020-12-07 13:12:06', '2020-12-07 13:12:06', 0, 1),
(4, NULL, 'test1@test.com', '$2y$10$asXb7eFloUBbLBLZXBOifO82vdlAolXwoyDfAFbKMLa56DLrYIyCe', NULL, NULL, 'cs', 'aaa', 'aaaa', 1, 1, 'aaaa', '22323232', NULL, '2020-12-07 18:42:40', '2020-12-07 18:42:40', NULL, '2020-12-07 13:12:40', '2020-12-17 09:44:14', 1, 0),
(13, '170001', 'v2@gmail.com', 'Faiyaj@123', NULL, NULL, 'vendor', 'New India', 'Noida 66555', 1, 1, 'Ashok Nagar', '7894561230', 'BRC10', '2020-12-17 12:43:40', '2020-12-17 12:43:40', NULL, '2020-12-17 07:13:40', '2020-12-21 02:47:30', 0, 0),
(14, '170002', 'v2@gmail.com', 'Final29688', NULL, NULL, 'vendor vnr', 'New India', 'Noida 66555', 1, 1, 'Ashok Nagar', '7894561230', 'BRC10', '2020-12-21 07:48:56', '2020-12-21 07:48:56', NULL, '2020-12-21 02:18:56', '2020-12-21 02:23:04', 0, 1),
(15, '170005', 'dinesh@gmail.com', '$2y$10$jAfOt2jS7pZRsQG3knd/f.rYnCh.8Eog9G.i0wqMpHMFLrmSZ3KdC', NULL, NULL, 'Dinesh', 'Dell41', 'Nangloi', 8, 4, 'Noida', '08383838383', NULL, '2021-01-26 04:37:52', '2021-01-14 07:38:03', NULL, '2021-01-14 02:08:03', '2021-01-26 04:37:52', 0, 1),
(16, '170006', 'ram@gmail.com', '$2y$10$rQipGEM3/0hNdBQvozMKR.LmqubeOzD3/IYcJOcRyeLAtbSTzpAjW', NULL, NULL, 'Ramesh', 'Testy', 'Delhi', 8, 4, 'NSP', '9898989898', 'RS100', '2021-01-14 08:44:04', '2021-01-14 08:44:04', NULL, '2021-01-14 03:14:04', '2021-01-14 03:14:04', 0, 1),
(17, '200000', 'abc@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', NULL, NULL, 'abc', 'abc', 'abc', 8, 4, 'noida', '12345678', NULL, '2021-01-14 09:39:16', '2021-01-14 09:39:16', NULL, '2021-01-14 04:09:16', '2021-01-14 04:09:16', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_vendors`
--

CREATE TABLE `customer_vendors` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_classes`
--

CREATE TABLE `item_classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(250) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_classes`
--

INSERT INTO `item_classes` (`id`, `class_name`, `parent_id`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 'Grocery', NULL, '2021-01-06 04:43:51', '2021-01-06 21:54:52', 0, 1),
(2, 'Frozen', NULL, '2021-01-06 04:43:52', '2021-01-06 21:54:52', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `measure_units`
--

CREATE TABLE `measure_units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measure_units`
--

INSERT INTO `measure_units` (`id`, `unit_name`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, '12mm', '2021-01-06 04:43:51', '2021-01-06 21:54:52', 0, 1),
(2, '49oz(weight)', '2021-01-06 04:43:52', '2021-01-06 21:54:52', 0, 1),
(3, 'mm', '2021-01-10 19:43:20', '2021-01-10 19:43:20', 0, 1),
(4, 'oz(weight)', '2021-01-10 19:43:20', '2021-01-10 19:43:20', 0, 1),
(5, '10kilogram', '2021-01-12 08:34:25', '2021-01-12 08:34:25', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category_id` int(11) UNSIGNED DEFAULT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `menu_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_cost` float(8,2) DEFAULT NULL,
  `menu_cost_percentage` float(8,2) DEFAULT NULL,
  `menu_contribution` float(8,2) DEFAULT NULL,
  `menu_selling_price` float(8,2) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_category_id`, `customer_id`, `menu_name`, `menu_description`, `menu_image`, `menu_cost`, `menu_cost_percentage`, `menu_contribution`, `menu_selling_price`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 'sfsdfs', 'GSGDFGDG', '2021-01-16-Burger.jpg.jpg', 1000000.00, 442.00, 242424.00, 1000000.00, 0, 1, '2021-01-16 03:50:20', '2021-01-19 23:59:37'),
(2, 1, 15, 'abc', 'dgdfgddgdf', '2021-01-21-Burger.jpg.jpg', 534.00, 442.00, 242424.00, 1000000.00, 0, 1, '2021-01-16 03:52:06', '2021-01-20 23:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `menu_category_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `customer_id`, `menu_category_name`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 15, 'Desert', '2021-01-15 04:44:47', '2021-01-15 04:44:47', 0, 1),
(2, 15, 'Highballs', '2021-01-15 04:46:40', '2021-01-15 04:46:40', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED DEFAULT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `vendor_id` int(11) UNSIGNED DEFAULT NULL,
  `menu_item_vendor_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_item_id` int(11) UNSIGNED DEFAULT NULL,
  `menu_item_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_item_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_item_portion` float(8,2) DEFAULT NULL,
  `measure_unit_id` int(11) UNSIGNED DEFAULT NULL,
  `menu_item_yield` float(8,2) DEFAULT NULL,
  `menu_item_cost` float(8,2) DEFAULT NULL,
  `menu_item_type` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `customer_id`, `vendor_id`, `menu_item_vendor_name`, `vendor_item_id`, `menu_item_name`, `menu_item_code`, `menu_item_portion`, `measure_unit_id`, `menu_item_yield`, `menu_item_cost`, `menu_item_type`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 3, 'nothing', 16, 'chefDa role', 'deluxe', 0.00, 1, 12.00, 1222.00, 'v', 0, 1, '2021-01-16 21:51:19', '2021-01-16 21:51:19'),
(5, 1, 15, 4, 'KFC', 17, 'salsa salad', '12046', 19.00, 1, 30.00, 150.00, 'c', 0, 1, NULL, NULL);

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
(4, '2020_12_24_105121_create_students_table', 2),
(5, '2021_01_15_052517_create_recipe_items_table', 3),
(6, '2021_01_15_052722_create_recipes_table', 3),
(7, '2021_01_15_052833_create_menus_table', 3),
(8, '2021_01_15_052923_create_menu_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@test.com', '$2y$10$O3eEaqfTUSU2HvvdLFaQFeL98gDJjj3.jV3qaJxqgmYIBg9d7FvVu', '2020-12-04 00:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `recipe_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipe_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipe_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipe_yield` float(8,2) DEFAULT NULL,
  `recipe_batch_cost` float(8,2) DEFAULT NULL,
  `measure_unit_id` int(11) UNSIGNED DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `customer_id`, `recipe_name`, `recipe_description`, `recipe_image`, `recipe_yield`, `recipe_batch_cost`, `measure_unit_id`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 15, 'butter chicken123', 'fsfsfsfsfsfsdfsfssd', '2021-01-17-Burger.jpg.jpg', 2323.00, 332323.00, 3, 0, 0, '2021-01-16 23:52:56', '2021-01-17 00:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_items`
--

CREATE TABLE `recipe_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `recipe_id` int(11) UNSIGNED DEFAULT NULL,
  `vendor_id` int(11) UNSIGNED DEFAULT NULL,
  `vendor_item_id` int(11) UNSIGNED DEFAULT NULL,
  `measure_unit_id` int(11) UNSIGNED DEFAULT NULL,
  `recipe_item_vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipe_item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipe_item_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipe_item_portion` double(8,2) DEFAULT NULL,
  `recipe_item_yield` double(8,2) DEFAULT NULL,
  `recipe_item_cost` double(8,2) DEFAULT NULL,
  `recipe_item_type` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipe_items`
--

INSERT INTO `recipe_items` (`id`, `customer_id`, `recipe_id`, `vendor_id`, `vendor_item_id`, `measure_unit_id`, `recipe_item_vendor_name`, `recipe_item_name`, `recipe_item_code`, `recipe_item_portion`, `recipe_item_yield`, `recipe_item_cost`, `recipe_item_type`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 3, NULL, 3, 'KKKK singh', 'Butter', 'amul100', 10.00, 12.00, 12.00, 'butter', 0, 1, '2021-01-17 02:26:16', '2021-01-17 03:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_code` char(5) DEFAULT NULL,
  `state_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state_code`, `state_name`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 1, 'BR', 'Beratssss', '2020-12-04 11:46:46', '2020-12-15 23:37:51', 0, 1),
(4, 8, 'UP', 'Uttar Pradesh', '2020-12-15 23:27:53', '2020-12-15 23:27:53', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `username`, `phone`, `dob`, `created_at`, `updated_at`) VALUES
(1, 'Tyrell Orn', 'hrunte@hotmail.com', 'xoconnell', '(547) 714-8685 x486', '2016-01-06', NULL, NULL),
(2, 'Jackson Conroy', 'estell.schmitt@gottlieb.net', 'savion.adams', '(615) 610-2399', '1988-09-24', NULL, NULL),
(3, 'Dr. Nels Hilpert PhD', 'osborne.baumbach@grady.net', 'neoma.adams', '430.709.3893 x166', '1987-03-03', NULL, NULL),
(4, 'Prof. Ramon Goldner', 'dickinson.abagail@hotmail.com', 'pinkie.jacobs', '+1 (781) 212-5250', '1974-09-20', NULL, NULL),
(5, 'Prof. Hillard Pollich II', 'little.viviane@yahoo.com', 'osinski.tracy', '+1.357.269.3997', '1970-01-18', NULL, NULL),
(6, 'Thomas Price', 'pdurgan@hotmail.com', 'tdouglas', '+13234184656', '2014-11-02', NULL, NULL),
(7, 'Dr. Wyman Krajcik PhD', 'rowland72@hotmail.com', 'bernhard.finn', '+1-351-595-5823', '1992-01-26', NULL, NULL),
(8, 'Prof. Paxton Luettgen II', 'ila96@gmail.com', 'glittle', '1-923-574-9264', '1997-06-01', NULL, NULL),
(9, 'Fredy O\'Conner', 'kavon20@hotmail.com', 'graham.nya', '661.780.2545 x982', '2000-07-22', NULL, NULL),
(10, 'Prof. Percy Schmitt I', 'johan93@murphy.com', 'bcummerata', '284-932-6015', '2003-08-29', NULL, NULL),
(11, 'Levi Parker', 'jannie50@schmitt.com', 'waters.nina', '(463) 967-9124 x859', '1980-02-14', NULL, NULL),
(12, 'Elliott Kunze', 'larson.collin@wunsch.com', 'alexandria73', '(956) 423-3817', '1991-11-11', NULL, NULL),
(13, 'German Cummerata', 'elockman@schroeder.info', 'kellie13', '1-683-755-9213', '1972-12-08', NULL, NULL),
(14, 'Prof. Jo Champlin V', 'cnitzsche@koss.com', 'bosco.bailey', '+1-660-376-3531', '1972-11-25', NULL, NULL),
(15, 'Noel Vandervort', 'thowe@roberts.com', 'renee.braun', '+1 (467) 376-1590', '2008-01-31', NULL, NULL),
(16, 'Xzavier Macejkovic', 'colt.wyman@rohan.com', 'brooklyn.thompson', '659.552.9378', '1973-07-15', NULL, NULL),
(17, 'Louvenia Lockman', 'zklocko@hotmail.com', 'nwalsh', '+1-808-929-0293', '1995-06-03', NULL, NULL),
(18, 'Justice Zboncak', 'lon10@hessel.info', 'justine99', '884.496.8013', '1992-12-29', NULL, NULL),
(19, 'Lorenz Bruen', 'lavern27@shields.com', 'estrella84', '+1.385.847.5122', '1982-03-11', NULL, NULL),
(20, 'Tyrell Blick Sr.', 'andreane72@hotmail.com', 'bryana29', '293-604-6935 x6525', '2001-12-17', NULL, NULL),
(21, 'Branson Tillman', 'beverly19@wilkinson.org', 'abigayle.hyatt', '767.830.3746 x74547', '1979-02-14', NULL, NULL),
(22, 'Brenden Lueilwitz', 'ahmed.lubowitz@gmail.com', 'dmorissette', '285-706-5872', '1977-11-07', NULL, NULL),
(23, 'Keven Runolfsdottir', 'enos52@gmail.com', 'muller.wellington', '+1-791-854-6354', '1971-06-21', NULL, NULL),
(24, 'Prof. Isac O\'Conner Sr.', 'reilly.jean@yahoo.com', 'camren.frami', '+1.768.750.4220', '1982-10-05', NULL, NULL),
(25, 'Wilhelm Ledner', 'bvon@trantow.org', 'brandon32', '615.625.3104 x6376', '2018-11-05', NULL, NULL),
(26, 'Alexzander Bailey IV', 'nmcclure@hotmail.com', 'meda75', '942.810.7295', '2008-12-11', NULL, NULL),
(27, 'Mr. Bell Yost I', 'rosina.monahan@bode.com', 'eladio.johns', '804.336.4421 x8923', '1991-04-18', NULL, NULL),
(28, 'Elias Koss', 'bobby78@gmail.com', 'cielo.ryan', '557-384-3468', '2004-11-04', NULL, NULL),
(29, 'Jules Borer Jr.', 'schmitt.bailey@ortiz.com', 'meagan.gulgowski', '(415) 854-2024 x539', '2005-11-07', NULL, NULL),
(30, 'Mariano Volkman', 'weber.juston@schmitt.org', 'npfannerstill', '1-832-341-0203 x3264', '1993-10-01', NULL, NULL),
(31, 'Shayne Cormier II', 'dubuque.gerry@gmail.com', 'rowe.jayde', '(593) 952-9627 x9541', '2009-10-17', NULL, NULL),
(32, 'Emory Predovic', 'sherman64@yahoo.com', 'iullrich', '+1-454-318-6711', '2005-08-10', NULL, NULL),
(33, 'Kamron Bode', 'forest.kling@hotmail.com', 'pkuphal', '1-597-979-4295 x5598', '1988-11-21', NULL, NULL),
(34, 'Dr. Sheridan Frami IV', 'glover.megane@jaskolski.com', 'coralie.greenfelder', '592-938-2312', '2008-12-02', NULL, NULL),
(35, 'Colt Bogan', 'stark.dina@yahoo.com', 'keeling.walter', '465-216-8570 x9927', '2000-12-10', NULL, NULL),
(36, 'Kellen Rolfson', 'zpadberg@hessel.net', 'madonna51', '456.563.3262 x92355', '1991-04-14', NULL, NULL),
(37, 'Dr. Diego Stokes Sr.', 'lynch.emma@yahoo.com', 'jimmie.boyer', '(595) 571-9006', '1986-06-08', NULL, NULL),
(38, 'Mr. Scotty Kreiger', 'uprice@turcotte.com', 'hudson.cory', '462-382-5549', '1970-08-29', NULL, NULL),
(39, 'Gavin McKenzie', 'afton.gutmann@hoeger.org', 'amelia.shanahan', '701.294.7945 x0820', '1996-02-28', NULL, NULL),
(40, 'Mr. Keshaun Pollich', 'rosenbaum.annie@hotmail.com', 'nmante', '583-282-8486 x1309', '2016-12-27', NULL, NULL),
(41, 'Mr. Paris Haley PhD', 'fisher.nova@hotmail.com', 'moen.landen', '(938) 477-0781', '2008-05-20', NULL, NULL),
(42, 'Jamel Fritsch', 'cschamberger@borer.biz', 'jerrell.gerhold', '1-864-760-0606', '1985-12-18', NULL, NULL),
(43, 'Loy Howe', 'randall52@hotmail.com', 'ecruickshank', '849.302.8805', '1979-04-28', NULL, NULL),
(44, 'Dayne Corwin', 'rohan.darien@welch.org', 'krogahn', '(282) 539-1771 x046', '2010-04-18', NULL, NULL),
(45, 'Mr. Trenton Hayes Sr.', 'bernhard.aracely@kiehn.com', 'harmon46', '+1-273-209-2610', '1975-07-06', NULL, NULL),
(46, 'Kris Schmitt', 'kristy91@hotmail.com', 'bernadine49', '770-362-7309 x12211', '2018-12-15', NULL, NULL),
(47, 'Mr. Isidro Aufderhar DVM', 'russell15@gmail.com', 'mking', '593-221-4706', '1979-10-16', NULL, NULL),
(48, 'Lukas Waelchi IV', 'spinka.christop@stiedemann.com', 'fahey.carole', '1-729-349-6694 x304', '2005-09-09', NULL, NULL),
(49, 'Prof. Eddie Fay', 'quentin18@hotmail.com', 'keshaun25', '+1-990-407-0657', '1981-10-19', NULL, NULL),
(50, 'Keeley Turcotte', 'fadel.kiara@frami.net', 'hoeger.amari', '+1-563-445-1867', '1975-02-09', NULL, NULL),
(51, 'Dr. Brody Mohr', 'parker.celine@yahoo.com', 'shill', '537.309.3765 x57550', '1999-04-07', NULL, NULL),
(52, 'Lorenzo Bartoletti', 'rstracke@bradtke.com', 'katlyn91', '851.498.8912 x7210', '1990-01-14', NULL, NULL),
(53, 'Einar Kilback', 'irath@yahoo.com', 'dsipes', '(748) 439-2169', '2020-01-12', NULL, NULL),
(54, 'Bennie Ebert', 'cremin.rhea@nikolaus.net', 'zieme.rowland', '(936) 566-7131 x5207', '1972-10-24', NULL, NULL),
(55, 'Mr. Jakob Vandervort', 'rempel.herbert@kertzmann.com', 'zita.simonis', '885.759.1711', '1971-03-26', NULL, NULL),
(56, 'Prof. Norberto Cummerata', 'rosie73@stracke.com', 'mglover', '(990) 979-8717 x08066', '1983-03-10', NULL, NULL),
(57, 'Dr. Tyson Kuhn', 'fmann@hotmail.com', 'ofriesen', '384.507.8948 x906', '1988-05-25', NULL, NULL),
(58, 'Ahmed Kunze', 'roberts.arthur@hotmail.com', 'jacobson.lavern', '(904) 852-4003', '1975-04-20', NULL, NULL),
(59, 'Emil Crona', 'kade71@ratke.com', 'wilderman.savanah', '1-438-351-2908 x827', '2000-03-25', NULL, NULL),
(60, 'Mr. Rodrigo Wolff', 'qkrajcik@yahoo.com', 'bondricka', '770-468-6185 x2534', '2006-08-03', NULL, NULL),
(61, 'Dr. Wayne Flatley MD', 'lane69@daniel.com', 'hillard79', '837-752-1404 x93165', '1972-05-09', NULL, NULL),
(62, 'Haskell Erdman Sr.', 'bogisich.donnie@gmail.com', 'vbernier', '749.408.6609', '2008-07-14', NULL, NULL),
(63, 'Axel Ullrich', 'owaters@reichert.com', 'chloe.ortiz', '+1-864-351-5581', '1996-02-01', NULL, NULL),
(64, 'Prof. Leonardo Nader', 'claudine52@keeling.net', 'mclaughlin.adriana', '223.930.8937 x353', '1997-05-10', NULL, NULL),
(65, 'Everett Schmeler III', 'shad.nicolas@hotmail.com', 'tgreenfelder', '(814) 358-2737 x64684', '1998-02-06', NULL, NULL),
(66, 'Mr. Tommie Terry', 'leon.bruen@berge.biz', 'bessie52', '+1-661-843-5968', '1971-06-03', NULL, NULL),
(67, 'Norwood Hilpert', 'hintz.jennyfer@gmail.com', 'yconnelly', '934-359-8888', '1975-08-11', NULL, NULL),
(68, 'Faustino Stanton', 'garland33@klein.com', 'frederik01', '(303) 288-2102', '2007-01-16', NULL, NULL),
(69, 'Agustin Bogisich', 'laury80@hotmail.com', 'junior.kuhlman', '651-998-8423', '2018-09-22', NULL, NULL),
(70, 'Carleton Mueller', 'lois95@heathcote.net', 'hills.tracey', '203.713.9879 x70146', '1973-08-28', NULL, NULL),
(71, 'Caesar DuBuque', 'stanton.bernice@lowe.com', 'lesch.alycia', '+1 (860) 755-3483', '1992-10-27', NULL, NULL),
(72, 'Devan DuBuque PhD', 'wuckert.mateo@gmail.com', 'dare.vesta', '+1 (850) 576-6422', '1976-01-12', NULL, NULL),
(73, 'Dexter Langworth', 'schumm.celine@bashirian.com', 'gbernhard', '(654) 887-8131', '1983-02-10', NULL, NULL),
(74, 'Prof. Harold Bailey MD', 'clint.hansen@gmail.com', 'rory80', '(434) 669-0176 x2327', '2016-06-21', NULL, NULL),
(75, 'Orland Dooley', 'ghickle@hotmail.com', 'stefanie96', '+1-246-857-8821', '2020-12-01', NULL, NULL),
(76, 'Mr. Mauricio Hammes III', 'waters.matt@stehr.info', 'ofelia05', '1-758-291-8302', '1990-12-17', NULL, NULL),
(77, 'Merlin Quigley', 'qwiegand@hotmail.com', 'lamar97', '1-526-515-5806 x06769', '2019-05-07', NULL, NULL),
(78, 'Camren Harvey', 'omari45@little.biz', 'kerluke.annie', '1-240-680-0070', '2016-11-08', NULL, NULL),
(79, 'Dr. Pietro Corkery DDS', 'syble04@gmail.com', 'nolan.lulu', '+1 (963) 443-3076', '1999-08-12', NULL, NULL),
(80, 'Steve Tillman', 'jocelyn.kuhlman@jast.com', 'urodriguez', '+16754989334', '2001-08-19', NULL, NULL),
(81, 'Cody Hintz', 'oglover@hotmail.com', 'ole25', '942-567-0133 x055', '2017-11-29', NULL, NULL),
(82, 'Dr. Dylan Spinka', 'damore.cyril@gmail.com', 'cronin.shakira', '1-772-584-2485 x134', '1975-07-14', NULL, NULL),
(83, 'Prof. Imani O\'Reilly DDS', 'yasmin41@ziemann.com', 'filomena58', '520-376-7458', '2009-07-27', NULL, NULL),
(84, 'Dr. Alfred Larkin Jr.', 'janessa.bruen@yahoo.com', 'umaggio', '+1 (339) 466-1435', '2008-01-25', NULL, NULL),
(85, 'Sedrick Schoen', 'qtremblay@yahoo.com', 'colton92', '581.434.4536', '2000-10-22', NULL, NULL),
(86, 'Kaleb Hickle', 'carlee.gulgowski@yahoo.com', 'ktorphy', '+1.396.889.3050', '2014-05-07', NULL, NULL),
(87, 'Prof. Ahmad Ullrich', 'lucious78@gmail.com', 'pkshlerin', '1-796-574-8181 x9902', '2013-05-20', NULL, NULL),
(88, 'Josue Gleason', 'labadie.elody@hotmail.com', 'bernita69', '205-999-9741 x0453', '2018-02-19', NULL, NULL),
(89, 'Mr. Chester Schulist Sr.', 'xkeebler@kirlin.com', 'heaney.tito', '(465) 358-2610 x021', '1974-08-04', NULL, NULL),
(90, 'Steve O\'Keefe', 'juvenal78@metz.com', 'jamir07', '(946) 615-0900', '1978-03-09', NULL, NULL),
(91, 'Dr. Greyson Walter I', 'rwuckert@gmail.com', 'cpouros', '282.371.7023', '1996-05-22', NULL, NULL),
(92, 'Brando Hickle', 'hprohaska@anderson.biz', 'mcdermott.rosamond', '(246) 436-4256 x045', '1987-11-01', NULL, NULL),
(93, 'Mr. Otho Pfeffer', 'vgoyette@yahoo.com', 'hwisozk', '(782) 231-2250', '2010-09-09', NULL, NULL),
(94, 'Sheridan Bashirian', 'jcruickshank@trantow.biz', 'ugraham', '901.245.4611 x32322', '1976-12-29', NULL, NULL),
(95, 'Cecil Kuhic', 'hroberts@brown.org', 'dickinson.colby', '759.277.3002 x669', '1989-10-04', NULL, NULL),
(96, 'Mr. Gennaro Stanton', 'connie.kshlerin@davis.com', 'kirsten91', '(946) 268-1947', '1982-02-11', NULL, NULL),
(97, 'Jordy Miller', 'arthur.raynor@hotmail.com', 'bartoletti.eleazar', '980.380.9640 x4649', '1994-05-14', NULL, NULL),
(98, 'Lionel Beier', 'fermin37@hotmail.com', 'daphne81', '1-850-769-9469 x9933', '2007-09-10', NULL, NULL),
(99, 'Hazel Abernathy', 'lawrence06@tremblay.com', 'mratke', '+12943750009', '1995-04-27', NULL, NULL),
(100, 'Javon Roberts Sr.', 'lmurazik@turcotte.net', 'ransom70', '1-345-507-8265 x173', '1977-02-13', NULL, NULL),
(101, 'Dr. Donnie Mayert DVM', 'shakira.bartoletti@kunde.org', 'werner.lowe', '1-543-464-5090', '1994-01-04', NULL, NULL),
(102, 'Celestino Ledner', 'hmertz@gmail.com', 'eda.goyette', '1-761-945-5043 x22263', '1978-07-20', NULL, NULL),
(103, 'Pierre Hettinger', 'eichmann.ruby@hotmail.com', 'idell.hoeger', '+16314811242', '1975-02-08', NULL, NULL),
(104, 'Sheldon Gusikowski', 'albin.schaden@gmail.com', 'lou27', '1-898-621-2140', '2000-08-20', NULL, NULL),
(105, 'Devan Reinger', 'mona.reichel@hotmail.com', 'dhalvorson', '+1-423-775-0295', '1994-05-23', NULL, NULL),
(106, 'Olin Glover I', 'fmurazik@treutel.info', 'haufderhar', '835-781-9996', '1994-07-03', NULL, NULL),
(107, 'Kevin Mayert', 'jbeahan@nader.biz', 'gkautzer', '680.644.8318 x1761', '1970-04-09', NULL, NULL),
(108, 'Mr. Kay Konopelski DVM', 'dbatz@mayert.biz', 'kenny.farrell', '(569) 435-5633', '2012-09-06', NULL, NULL),
(109, 'Jettie Pacocha', 'omayert@cremin.com', 'boreilly', '+1-610-641-9806', '1971-03-28', NULL, NULL),
(110, 'Prof. Tyrell Jacobi I', 'eleonore.cruickshank@yahoo.com', 'vconsidine', '(852) 653-1053 x837', '2004-08-14', NULL, NULL),
(111, 'Jeffry Steuber', 'bonita74@yahoo.com', 'nkiehn', '235-654-6659 x12364', '2016-10-31', NULL, NULL),
(112, 'Dr. Immanuel Davis Sr.', 'ryan.tanner@herman.com', 'rwaters', '+1-538-227-0558', '2019-07-19', NULL, NULL),
(113, 'Dr. Roosevelt Rempel', 'bblanda@gmail.com', 'ratke.elna', '1-995-662-1989 x8656', '2020-08-18', NULL, NULL),
(114, 'Dillan Braun', 'ena.lueilwitz@lebsack.biz', 'quitzon.adolfo', '1-637-283-1988 x987', '1999-03-29', NULL, NULL),
(115, 'Prof. Sebastian Rempel DDS', 'rhianna74@gmail.com', 'mccullough.piper', '(374) 948-7946', '2004-09-02', NULL, NULL),
(116, 'Dr. Torey Wolf', 'renner.keegan@ferry.com', 'bwuckert', '359.283.1614', '1996-04-08', NULL, NULL),
(117, 'Maynard Cremin', 'hreichert@hotmail.com', 'osenger', '+1 (651) 974-7125', '2019-04-23', NULL, NULL),
(118, 'Mr. Willis Stamm PhD', 'klocko.mathias@hotmail.com', 'schmeler.adriana', '280.590.0398', '1991-09-10', NULL, NULL),
(119, 'Mr. Lambert Yundt I', 'mac.becker@hotmail.com', 'kaleigh94', '(259) 872-4346', '2020-02-15', NULL, NULL),
(120, 'Ian Leuschke IV', 'nbecker@hotmail.com', 'prince.reichel', '+1-926-834-7372', '1971-03-04', NULL, NULL),
(121, 'Cristian Douglas', 'kendra.tromp@yahoo.com', 'ben.runolfsdottir', '278-416-1926', '1995-03-17', NULL, NULL),
(122, 'Prof. Adrian Littel', 'feest.leda@hotmail.com', 'bethany68', '632.585.4051', '2017-07-29', NULL, NULL),
(123, 'Geo Powlowski', 'lakin.nakia@gmail.com', 'wswaniawski', '+1-798-230-6017', '1983-10-09', NULL, NULL),
(124, 'Lafayette West I', 'vcremin@hotmail.com', 'bgislason', '293.854.3209 x065', '1990-11-24', NULL, NULL),
(125, 'Hoyt Rippin', 'nheathcote@gmail.com', 'moen.doris', '(660) 956-4193', '1995-06-19', NULL, NULL),
(126, 'Mr. Liam Mraz', 'duncan00@schumm.com', 'davis.giles', '+1 (814) 690-1800', '1970-02-06', NULL, NULL),
(127, 'Bertram Huel', 'bdurgan@lemke.com', 'bergstrom.ashly', '928-650-4560 x686', '1972-03-15', NULL, NULL),
(128, 'Jamel Hessel', 'luella89@gmail.com', 'hester88', '1-385-385-3839 x413', '1980-01-20', NULL, NULL),
(129, 'Enos Runolfsson', 'ywisoky@ward.com', 'beahan.alyce', '261.288.9434 x718', '1979-11-28', NULL, NULL),
(130, 'Jack Medhurst', 'friesen.velma@hotmail.com', 'ajerde', '450-544-1292', '2014-06-04', NULL, NULL),
(131, 'Celestino Heathcote', 'fisher.margarita@hotmail.com', 'yvette32', '435.953.0738 x7574', '1974-01-07', NULL, NULL),
(132, 'Kareem Christiansen', 'omohr@lesch.com', 'daphnee.runte', '(590) 555-7310 x85458', '2005-11-14', NULL, NULL),
(133, 'Prof. Leopoldo Green I', 'kuvalis.iva@gmail.com', 'charlie56', '+14756852604', '1986-02-15', NULL, NULL),
(134, 'Raoul Johnston DDS', 'virgie41@vonrueden.info', 'conroy.cary', '472-964-2316 x90346', '2007-03-03', NULL, NULL),
(135, 'Keegan Cronin DVM', 'karina.bahringer@hotmail.com', 'jayme35', '391-946-2046', '1972-10-22', NULL, NULL),
(136, 'Prof. Emil McDermott IV', 'alden82@gmail.com', 'robel.george', '+1 (208) 833-4115', '2016-11-20', NULL, NULL),
(137, 'Prof. Nasir Durgan', 'leonel12@hotmail.com', 'mharber', '+18632052645', '1983-08-10', NULL, NULL),
(138, 'Pablo Murray Jr.', 'walter.george@hotmail.com', 'kirlin.zelma', '1-959-943-9733', '1997-11-24', NULL, NULL),
(139, 'Dock Pacocha', 'abshire.frida@kshlerin.com', 'josh.rowe', '464.507.6763 x92884', '1980-10-31', NULL, NULL),
(140, 'Dr. Rick Mills', 'catalina.shields@lubowitz.com', 'arianna.nolan', '831-825-1680 x8808', '2005-11-08', NULL, NULL),
(141, 'Prof. Lamont Johns II', 'nfunk@frami.com', 'hillard.koss', '+1-293-284-5390', '2008-05-31', NULL, NULL),
(142, 'Kelvin Purdy', 'juliana64@yahoo.com', 'schuyler.harris', '463.793.3635', '1986-12-24', NULL, NULL),
(143, 'Dr. Jevon Johnson DVM', 'raynor.jordy@gmail.com', 'ellsworth26', '(553) 789-2338', '2008-05-10', NULL, NULL),
(144, 'Wilson Heaney', 'madeline.koch@gmail.com', 'cecilia.fritsch', '772.451.3339 x001', '2001-03-09', NULL, NULL),
(145, 'Jeffrey Beahan II', 'nicolas.antonetta@conn.com', 'friedrich24', '+14824987364', '2004-12-18', NULL, NULL),
(146, 'Dr. Kolby Beer Sr.', 'nasir62@hotmail.com', 'sanford05', '796.205.3032 x76424', '2003-12-20', NULL, NULL),
(147, 'Preston Ledner', 'phills@vandervort.com', 'tfahey', '252-967-1969', '2014-01-02', NULL, NULL),
(148, 'Mr. Jaleel Pouros I', 'kcremin@nikolaus.com', 'noemy.haag', '950.225.6609 x1141', '2004-10-02', NULL, NULL),
(149, 'Noah Johnston', 'milan35@gmail.com', 'mara57', '253-759-5534', '2005-07-26', NULL, NULL),
(150, 'Brennan Kling', 'lemke.moshe@hotmail.com', 'sawayn.janick', '273-268-8592 x74719', '1987-04-15', NULL, NULL),
(151, 'Prof. Zane Larkin', 'milton.schowalter@hotmail.com', 'oberbrunner.antonietta', '+1 (448) 424-2054', '2016-09-06', NULL, NULL),
(152, 'Dr. Nicolas Okuneva', 'cielo.gibson@williamson.com', 'marques.schneider', '505-624-5549 x37062', '1994-03-17', NULL, NULL),
(153, 'Ibrahim Homenick', 'heller.vicenta@lockman.com', 'nfay', '+1-382-780-4169', '1975-03-11', NULL, NULL),
(154, 'Sofia Leannon', 'bennie.barton@gmail.com', 'anderson.eladio', '615-719-3792', '2000-04-04', NULL, NULL),
(155, 'Prof. Blake Kuvalis', 'wwiegand@daugherty.info', 'gutmann.emmitt', '(830) 619-6121 x6633', '1978-08-29', NULL, NULL),
(156, 'Dr. Bernard Daniel', 'hills.aletha@okuneva.info', 'liam43', '353-652-8018 x59532', '1999-12-29', NULL, NULL),
(157, 'Dr. Brendan Berge', 'daniela19@hotmail.com', 'xvon', '1-870-474-0027 x61433', '2000-02-09', NULL, NULL),
(158, 'Erwin Hegmann', 'cedrick.muller@yahoo.com', 'reilly.amina', '(858) 487-3687 x3350', '1998-02-16', NULL, NULL),
(159, 'Mr. Willis Ryan Jr.', 'jesus63@gmail.com', 'lorenz71', '529-445-3797 x846', '2004-01-02', NULL, NULL),
(160, 'Mr. Favian Hermann', 'josefa38@raynor.com', 'marley81', '838-491-0881', '1988-09-12', NULL, NULL),
(161, 'Prof. Elwyn Powlowski', 'jacobson.bria@gmail.com', 'brionna89', '830-660-4631 x89259', '2002-09-12', NULL, NULL),
(162, 'Bradley Mills IV', 'hamill.vivianne@gmail.com', 'lstokes', '346.774.9895 x3359', '2010-09-11', NULL, NULL),
(163, 'Ariel Nader V', 'lwuckert@gmail.com', 'heaney.wellington', '868.730.6199 x776', '1997-12-04', NULL, NULL),
(164, 'Mr. Russell Bayer Jr.', 'runolfsson.mozelle@hotmail.com', 'reilly.carmella', '(896) 886-5339', '1976-04-10', NULL, NULL),
(165, 'Mr. Mathew Welch DVM', 'kaleb18@gmail.com', 'jamal96', '+1-505-610-3691', '1972-04-24', NULL, NULL),
(166, 'Jonathon Gleason Jr.', 'zlarkin@braun.com', 'qupton', '1-650-805-0464 x07740', '2019-06-12', NULL, NULL),
(167, 'Doug Walsh', 'bennie.parker@gmail.com', 'cristobal38', '(308) 598-1559 x492', '1995-09-21', NULL, NULL),
(168, 'Clay Nolan', 'wolff.ismael@bruen.com', 'hboyer', '+1.709.770.6505', '1991-01-25', NULL, NULL),
(169, 'Mr. Arely Wolff III', 'nickolas61@hotmail.com', 'isidro92', '1-984-956-1085 x743', '1996-02-27', NULL, NULL),
(170, 'Stewart Jacobson', 'kertzmann.megane@hotmail.com', 'verlie65', '(934) 233-7416 x824', '1996-07-07', NULL, NULL),
(171, 'Mr. Hollis Daugherty', 'liza.schumm@mclaughlin.com', 'gfriesen', '+1-468-362-8700', '2004-04-09', NULL, NULL),
(172, 'Rex Bradtke', 'mario21@gmail.com', 'lroob', '+1-442-383-9663', '2003-01-04', NULL, NULL),
(173, 'Laverna Labadie', 'franecki.rachel@hotmail.com', 'emard.elissa', '(489) 240-4483 x80902', '1997-06-05', NULL, NULL),
(174, 'Reece Littel IV', 'ffeest@stokes.org', 'kohler.stanford', '464-482-8249 x444', '1993-03-29', NULL, NULL),
(175, 'Gage Kreiger DVM', 'albert.quitzon@prosacco.com', 'celestine38', '398-938-4843 x5169', '2018-06-12', NULL, NULL),
(176, 'Mr. Uriah Graham V', 'lavada23@gmail.com', 'turcotte.leopold', '1-964-872-8440 x15041', '2001-08-29', NULL, NULL),
(177, 'Jarvis Von', 'mattie.rice@yahoo.com', 'kenya19', '+12433988900', '2003-11-30', NULL, NULL),
(178, 'Prof. Don Kassulke', 'hadams@windler.org', 'ybeier', '556.767.3224 x6379', '2004-10-17', NULL, NULL),
(179, 'Spencer Hettinger', 'tthiel@gmail.com', 'dillan.jast', '+1.570.508.5670', '1999-03-11', NULL, NULL),
(180, 'Prof. Oda Hintz PhD', 'kshlerin.darrell@gmail.com', 'jbergstrom', '201-786-4857', '1999-10-31', NULL, NULL),
(181, 'Kristoffer Botsford', 'hmohr@turner.com', 'dangelo93', '798-864-4034 x099', '1996-03-14', NULL, NULL),
(182, 'Paolo Gusikowski II', 'effertz.marielle@dickens.org', 'okon.stefanie', '1-763-403-4907 x3812', '1974-06-12', NULL, NULL),
(183, 'Titus Klocko', 'effertz.brianne@hammes.org', 'elaina.von', '554-828-2470 x0380', '2010-01-03', NULL, NULL),
(184, 'Prof. Stanton Reynolds PhD', 'santos07@gmail.com', 'pcartwright', '(626) 327-5680', '2016-01-08', NULL, NULL),
(185, 'Kenny Brown', 'hane.demetrius@windler.biz', 'marquardt.loy', '325.381.1463', '1970-07-14', NULL, NULL),
(186, 'Irwin Schuppe', 'jfahey@hotmail.com', 'joy.lehner', '306.477.9441 x2206', '2010-06-06', NULL, NULL),
(187, 'Chaz Moen', 'alycia.streich@hotmail.com', 'hfeest', '(536) 410-1860', '2012-10-04', NULL, NULL),
(188, 'Prof. Chauncey Rice Sr.', 'everette.schroeder@hotmail.com', 'elvis.nicolas', '687.618.5297 x259', '2015-12-31', NULL, NULL),
(189, 'Prof. Izaiah Wolf', 'wilkinson.maribel@hamill.info', 'vonrueden.jeanie', '727-902-8258 x627', '2011-02-12', NULL, NULL),
(190, 'Dr. Jennings Christiansen I', 'carrie.turcotte@lowe.com', 'zwiegand', '694-338-1124', '1988-05-21', NULL, NULL),
(191, 'Dr. Gino Effertz', 'aylin.friesen@gmail.com', 'ulises80', '1-787-299-1381', '1975-06-27', NULL, NULL),
(192, 'Leland Bergstrom', 'iconsidine@effertz.biz', 'dane85', '768-745-8935 x001', '1990-05-16', NULL, NULL),
(193, 'Prof. Harrison Donnelly', 'vkunze@collins.com', 'lindgren.felicita', '706.453.5552 x527', '2003-07-03', NULL, NULL),
(194, 'Braxton Predovic Sr.', 'glenna.feest@hotmail.com', 'valerie.lubowitz', '624.327.7057 x323', '2017-02-22', NULL, NULL),
(195, 'Joshua Wintheiser', 'bartoletti.dagmar@conn.com', 'mueller.caleigh', '+1.812.552.4914', '1994-02-19', NULL, NULL),
(196, 'Melvin Volkman', 'nickolas65@carter.biz', 'considine.kylee', '1-589-480-9390 x77779', '1984-09-30', NULL, NULL),
(197, 'Jarod Haley', 'klabadie@sipes.com', 'mpouros', '359-748-6421 x1044', '2004-01-22', NULL, NULL),
(198, 'Prof. Cleve Buckridge', 'brock18@hotmail.com', 'xbechtelar', '1-945-979-0083', '1974-08-21', NULL, NULL),
(199, 'Makenna Wolff', 'corine.mccullough@kuhic.com', 'yasmin57', '234.783.8423 x43771', '1992-08-17', NULL, NULL),
(200, 'Ladarius Gaylord', 'hickle.trenton@yahoo.com', 'vemmerich', '248.396.7154 x0818', '2017-12-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'test tester', 'test@test.com', NULL, '$2y$10$j9Gq1GxHRcsfzHfZiuNLyuSWJ3P8vvA1xFlOd.rr.U2NUOsFftD2a', NULL, '2020-12-04 00:34:42', '2020-12-04 00:34:42'),
(3, 'asdasdfasd', 'asdf@asdf.com', NULL, '$2y$10$T9dsFevZm.Ye/l0jmxev5uzX6PMJh2Zd5vJrRbn37Yq6AwbjTJX0.', NULL, '2020-12-04 02:54:58', '2020-12-04 02:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_branch` varchar(100) DEFAULT NULL,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `vendor_address` varchar(250) DEFAULT NULL,
  `country_id` int(5) DEFAULT NULL,
  `state_id` int(5) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `vendor_branch`, `contact_name`, `contact_number`, `contact_email`, `vendor_address`, `country_id`, `state_id`, `city`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 'New Vendor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-06 04:52:10', '2021-01-14 04:31:49', 0, 1),
(2, 'final', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-06 04:52:11', '2021-01-14 04:30:09', 0, 1),
(3, 'xyz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-17 01:19:30', '2021-01-17 01:19:30', 0, 1),
(4, 'wbc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-24 03:49:55', '2021-01-24 03:49:55', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_items`
--

CREATE TABLE `vendor_items` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `vendor_branch` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `item_class_id` int(11) DEFAULT NULL,
  `item_title` varchar(250) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  `pack_per_case` varchar(20) DEFAULT NULL,
  `pack_size` varchar(20) DEFAULT NULL,
  `measure_unit` int(11) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_catch_weight` enum('Yes','No') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_items`
--

INSERT INTO `vendor_items` (`id`, `vendor_id`, `vendor_branch`, `brand_id`, `item_class_id`, `item_title`, `item_description`, `item_code`, `pack_per_case`, `pack_size`, `measure_unit`, `item_price`, `item_catch_weight`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(1, 1, NULL, 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR7', 'test', '1', 1, 1000.25, 'Yes', '2021-01-06 04:52:11', '2021-01-06 04:52:11', 0, 1),
(2, 2, NULL, 2, 2, 'Test 2 Product Name11111111', 'Test Description', 'VR8', 'test', '2', 2, 99, NULL, '2021-01-06 04:52:11', '2021-01-06 04:52:11', 0, 1),
(3, 1, NULL, 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR10', 'test', '1', 1, 10, 'Yes', '2021-01-06 21:54:52', '2021-01-06 21:54:52', 0, 1),
(4, 2, NULL, 2, 2, 'Test 2 Product Name1', 'Test Description', 'VR11', 'test', '2', 2, 99, NULL, '2021-01-06 21:54:52', '2021-01-06 21:54:52', 0, 1),
(5, 1, NULL, 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR12', 'test', '1', 1, 10, 'Yes', '2021-01-07 00:54:28', '2021-01-07 00:54:28', 0, 1),
(6, 2, NULL, 2, 2, 'Test 2 Product Name1', 'Test Description', 'VR13', 'test', '2', 2, 99, NULL, '2021-01-07 00:54:29', '2021-01-07 00:54:29', 0, 1),
(7, 1, NULL, 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR6', 'test', '1', 1, 5, 'Yes', '2021-01-07 05:39:31', '2021-01-07 05:39:31', 0, 1),
(8, 2, NULL, 2, 2, 'Test 2 Product Name1', 'Test Description', 'VR4', 'test', '2', 2, 99, NULL, '2021-01-07 05:39:31', '2021-01-07 05:39:31', 0, 1),
(9, 1, NULL, 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR15', 'test', '1', 1, 5, 'Yes', '2021-01-07 05:41:30', '2021-01-07 05:41:30', 0, 1),
(10, 2, NULL, 2, 2, 'Test 2 Product Name1', 'Test Description', 'VR16', 'test', '2', 2, 99, NULL, '2021-01-07 05:41:30', '2021-01-07 05:41:30', 0, 1),
(11, 1, NULL, 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR20', 'test', '1', 1, 10, 'Yes', '2021-01-07 05:43:55', '2021-01-07 05:43:55', 0, 1),
(12, 2, NULL, 2, 2, 'Test 2 Product Name1', 'Test Description', 'VR21', 'test', '2', 2, 99, NULL, '2021-01-07 05:43:55', '2021-01-07 05:43:55', 0, 1),
(13, 1, NULL, 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR25', 'test', '1', 3, 10, 'Yes', '2021-01-10 19:43:20', '2021-01-10 19:43:20', 0, 1),
(14, 2, NULL, 2, 2, 'Test 2 Product Name1', 'Test Description', 'VR26', 'test', '2', 4, 99, NULL, '2021-01-10 19:43:20', '2021-01-10 19:43:20', 0, 1),
(15, 1, 'Delhi', 1, 1, 'Test#$% 1 Product Name1#$%', 'Test Description', 'VR27', 'test', '1', 3, 10, 'Yes', '2021-01-10 19:44:19', '2021-01-10 19:44:19', 0, 1),
(16, 3, 'Bihar', 2, 2, 'Test 2 Product Name1', 'Test Description', 'VR28', 'test', '2', 4, 99, NULL, '2021-01-10 19:44:19', '2021-01-10 19:44:19', 0, 1),
(17, 4, NULL, 2, 2, 'chicken', NULL, NULL, 'Dozen', '12', NULL, NULL, NULL, '2021-01-24 03:57:09', '2021-01-24 03:57:09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_items1`
--

CREATE TABLE `vendor_items1` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `vendor_name` varchar(100) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `item_class_id` int(11) DEFAULT NULL,
  `item_class_name` varchar(100) DEFAULT NULL,
  `item_title` varchar(250) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  `pack_per_case` varchar(20) DEFAULT NULL,
  `pack_size` varchar(20) DEFAULT NULL,
  `measure_unit_id` int(11) DEFAULT NULL,
  `measure_unit_name` varchar(100) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_catch_weight` enum('Yes','No') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_items1`
--

INSERT INTO `vendor_items1` (`id`, `vendor_id`, `vendor_name`, `brand_id`, `brand_name`, `item_class_id`, `item_class_name`, `item_title`, `item_description`, `item_code`, `pack_per_case`, `pack_size`, `measure_unit_id`, `measure_unit_name`, `item_price`, `item_catch_weight`, `created_at`, `updated_at`, `is_deleted`, `is_active`) VALUES
(3, 1, NULL, 5, NULL, 4, NULL, 'fffff', 'sdsdsd', 'IC101', '1', '2', 4, NULL, 12, 'Yes', '2020-12-30 04:08:29', '2020-12-30 04:08:29', 0, 1),
(12, NULL, 'New Vendor', NULL, 'Test Brand1', NULL, 'Grocery', 'Test 1 Prodeuct Name', 'Test Description', 'VR1', 'test', '1', NULL, NULL, 122, 'Yes', '2020-12-30 20:57:59', '2020-12-30 20:57:59', 0, 1),
(13, NULL, 'final', NULL, 'Test Brand2', NULL, 'Frozen', 'Test 2 Product Name1', 'Test Description', 'VR2', 'test', '2', NULL, NULL, 99, NULL, '2020-12-30 20:57:59', '2020-12-30 20:57:59', 0, 1),
(14, NULL, 'New Vendor', NULL, 'Test Brand1', NULL, 'Grocery', 'Test 1 Prodeuct Name', 'Test Description', 'VR1', 'test', '1', NULL, NULL, 122, 'Yes', '2020-12-30 23:56:47', '2020-12-30 23:56:47', 0, 1),
(15, NULL, 'final', NULL, 'Test Brand2', NULL, 'Frozen', 'Test 2 Product Name1', 'Test Description', 'VR2', 'test', '2', NULL, NULL, 99, NULL, '2020-12-30 23:56:48', '2020-12-30 23:56:48', 0, 1),
(16, NULL, 'New Vendor', NULL, 'Test Brand1', NULL, 'Grocery', 'Test 1 Prodeuct Name', 'Test Description', 'VR1', 'test', '1', NULL, NULL, 122, 'Yes', '2020-12-30 23:58:16', '2020-12-30 23:58:16', 0, 1),
(17, NULL, 'final', NULL, 'Test Brand2', NULL, 'Frozen', 'Test 2 Product Name1', 'Test Description', 'VR2', 'test', '2', NULL, NULL, 99, NULL, '2020-12-30 23:58:16', '2020-12-30 23:58:16', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `customer_vendors`
--
ALTER TABLE `customer_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item_classes`
--
ALTER TABLE `item_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `measure_units`
--
ALTER TABLE `measure_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_items`
--
ALTER TABLE `recipe_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `vendor_items`
--
ALTER TABLE `vendor_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_code` (`item_code`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `item_class_id` (`item_class_id`),
  ADD KEY `measure_unit` (`measure_unit`);

--
-- Indexes for table `vendor_items1`
--
ALTER TABLE `vendor_items1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `item_class_id` (`item_class_id`),
  ADD KEY `measure_unit` (`measure_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_vendors`
--
ALTER TABLE `customer_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_classes`
--
ALTER TABLE `item_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `measure_units`
--
ALTER TABLE `measure_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe_items`
--
ALTER TABLE `recipe_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_items`
--
ALTER TABLE `vendor_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendor_items1`
--
ALTER TABLE `vendor_items1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `customer_vendors`
--
ALTER TABLE `customer_vendors`
  ADD CONSTRAINT `customer_vendors_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_vendors_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `item_classes`
--
ALTER TABLE `item_classes`
  ADD CONSTRAINT `item_classes_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `item_classes` (`id`);

--
-- Constraints for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD CONSTRAINT `menu_categories_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `vendors_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `vendor_items1`
--
ALTER TABLE `vendor_items1`
  ADD CONSTRAINT `vendor_items1_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`),
  ADD CONSTRAINT `vendor_items1_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `vendor_items1_ibfk_3` FOREIGN KEY (`item_class_id`) REFERENCES `item_classes` (`id`),
  ADD CONSTRAINT `vendor_items1_ibfk_4` FOREIGN KEY (`measure_unit_id`) REFERENCES `measure_units` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
