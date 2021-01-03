-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2021 at 01:59 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evistech_rfl`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `title` varchar(160) DEFAULT NULL,
  `address` text,
  `phone` varchar(160) DEFAULT NULL,
  `email` varchar(160) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `title`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Europe', 'Europe', '+880 1844 660251', 'dpl.op79@rflgroupbd.com', NULL, '2020-11-23 10:52:57'),
(2, 'Bangladesh', 'Africa, Australia, North America, South America', '+880 1841 357 698', 'export95@rflgroupbd.com', NULL, '2020-11-24 11:38:04'),
(3, 'Asia', '26', '01782088923', 'sajib@3-devs.com', NULL, '2020-11-24 11:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) NOT NULL,
  `fk_category_id` bigint(20) DEFAULT NULL,
  `category_serial` bigint(20) DEFAULT NULL,
  `category_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `subnews` text COLLATE utf8mb4_unicode_ci,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `fk_category_id`, `category_serial`, `category_name`, `category_image`, `url_slug`, `category_status`, `subnews`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, 0, 1, 'Household', NULL, 'household', 'active', NULL, '06:02:19', '2020-06-16', 1, '15:34:46', '2021-01-02', 6),
(2, 0, 2, 'Furniture', NULL, 'furniture', 'active', NULL, '06:03:40', '2020-06-16', 1, '14:07:54', '2021-01-02', 6),
(3, 0, 3, 'Industrial', NULL, 'industrial', 'active', NULL, '06:03:52', '2020-06-16', 1, NULL, NULL, NULL),
(4, 0, 4, 'Toys', NULL, 'toys', 'active', NULL, '06:05:24', '2020-06-16', 1, '13:27:52', '2021-01-03', 6),
(5, 0, 5, 'Pet Items', NULL, 'pet-items', 'active', NULL, '06:05:51', '2020-06-16', 1, '00:44:54', '2020-06-27', 6),
(6, 1, 1, 'BABY CARE', NULL, 'baby-care', 'active', NULL, '06:14:29', '2020-06-16', 1, '15:50:07', '2021-01-02', 6),
(9, 6, 2, 'Baby Chair', NULL, 'baby-chair', 'inactive', NULL, '06:21:05', '2020-06-16', 1, '14:18:33', '2021-01-02', 6),
(10, 6, 3, 'Bath Tub', NULL, 'bath-tub', 'inactive', NULL, '06:21:26', '2020-06-16', 1, '14:18:33', '2021-01-02', 6),
(12, 1, 2, 'BASKET & BIN', NULL, 'basket-bin', 'inactive', NULL, '07:24:28', '2020-06-16', 1, '14:18:33', '2021-01-02', 6),
(13, 1, 5, 'CONTAINER', NULL, 'container', 'inactive', NULL, '07:25:04', '2020-06-16', 1, '14:18:33', '2021-01-02', 6),
(18, 8, 1, 'Drinking Mug', NULL, 'drinking-mug', 'active', NULL, '07:50:02', '2020-06-16', 1, NULL, NULL, NULL),
(19, 8, 3, 'Washing Mug', NULL, 'washing-mug', 'active', NULL, '07:50:26', '2020-06-16', 1, NULL, NULL, NULL),
(20, 12, 1, 'Laundry', NULL, 'laundry', 'active', NULL, '07:51:43', '2020-06-16', 1, '08:43:03', '2020-11-01', 6),
(21, 12, 2, 'Multipurpose Basket', 'category_thumbnail_1595740113.png', 'multipurpose-basket', 'active', NULL, '07:52:11', '2020-06-16', 1, '08:43:34', '2020-11-01', 6),
(22, 12, 3, 'Paper Basket', NULL, 'paper-basket', 'active', NULL, '07:52:36', '2020-06-16', 1, '08:46:05', '2020-11-01', 6),
(23, 12, 4, 'Storage Box', NULL, 'storage-box', 'active', NULL, '07:52:55', '2020-06-16', 1, '08:45:28', '2020-11-01', 6),
(24, 12, 5, 'Wastage Bin', NULL, 'wastage-bin', 'active', NULL, '07:53:35', '2020-06-16', 1, '08:42:35', '2020-11-01', 6),
(26, 13, 1, 'Food Container', 'category_thumbnail_1603269811.jpg', 'food-container', 'active', NULL, '08:02:03', '2020-06-16', 1, '08:49:18', '2020-11-01', 6),
(28, 13, 2, 'Storage Container', 'category_thumbnail_1603279848.jpg', 'storage-container', 'active', NULL, '08:02:55', '2020-06-16', 1, '08:49:42', '2020-11-01', 6),
(29, 31, 2, 'Closet', 'category_thumbnail_1594119654.jpg', 'closet', 'inactive', NULL, '08:04:00', '2020-06-16', 1, '05:37:44', '2021-01-02', 6),
(30, 2, 1, 'CHAIR', NULL, 'chair', 'active', NULL, '00:47:48', '2020-06-27', 6, NULL, NULL, NULL),
(31, 2, 2, 'STORAGE SOLOUTION', NULL, 'storage-soloution', 'inactive', NULL, '00:48:10', '2020-06-27', 6, '05:37:44', '2021-01-02', 6),
(32, 2, 3, 'TABLE', NULL, 'table', 'active', NULL, '00:48:30', '2020-06-27', 6, NULL, NULL, NULL),
(33, 2, 4, 'KITCHENETTE', NULL, 'kitchenette', 'active', NULL, '00:48:55', '2020-06-27', 6, NULL, NULL, NULL),
(34, 2, 5, 'SOFA', NULL, 'sofa', 'active', NULL, '00:49:38', '2020-06-27', 6, NULL, NULL, NULL),
(35, 30, 1, 'Arm Chair', NULL, 'arm-chair', 'active', NULL, '00:50:41', '2020-06-27', 6, '08:55:22', '2020-12-19', 6),
(36, 30, 2, 'Armless Chair', NULL, 'armless-chair', 'active', NULL, '00:51:15', '2020-06-27', 6, '08:56:04', '2020-12-19', 6),
(39, 1, 14, 'Kitchenware', NULL, 'kitchenware', 'inactive', NULL, '03:35:29', '2020-10-19', 6, '14:18:33', '2021-01-02', 6),
(40, 1, 10, 'Tableware', NULL, 'tableware', 'inactive', NULL, '03:36:29', '2020-10-19', 6, '14:18:33', '2021-01-02', 6),
(41, 40, 3, 'Serving Bowl', NULL, 'serving-bowl', 'active', NULL, '10:04:50', '2020-10-19', 6, '08:55:36', '2020-11-02', 6),
(42, 40, 8, 'Pen Holder', NULL, 'pen-holder', 'active', NULL, '10:54:03', '2020-10-19', 6, '09:03:20', '2020-11-02', 6),
(43, 40, 7, 'Glass Stand', NULL, 'glass-stand', 'active', NULL, '11:11:45', '2020-10-19', 6, '09:02:57', '2020-11-02', 6),
(44, 40, 1, 'Miscellaneous', NULL, 'miscellaneous', 'active', NULL, '11:17:17', '2020-10-19', 6, NULL, NULL, NULL),
(51, 0, 1, 'Toys\'', NULL, 'toys', 'inactive', NULL, '09:56:53', '2020-10-31', 6, '05:25:05', '2021-01-02', 6),
(52, 0, 1, 'Toy', NULL, 'toy', 'inactive', NULL, '09:58:43', '2020-10-31', 6, '05:26:10', '2021-01-02', 6),
(53, 4, 1, 'All Toys for boy', NULL, 'all-toys-for-boy', 'inactive', NULL, '10:09:13', '2020-10-31', 6, '06:45:59', '2021-01-03', 6),
(54, 53, 1, '1 Year +', NULL, '1-year', 'inactive', NULL, '10:10:24', '2020-10-31', 6, '06:45:59', '2021-01-03', 6),
(55, 53, 2, '2 Year +', NULL, '2-year', 'inactive', NULL, '10:11:11', '2020-10-31', 6, '06:45:59', '2021-01-03', 6),
(56, 53, 3, '3 Year +', NULL, '3-year', 'inactive', NULL, '10:11:34', '2020-10-31', 6, '06:45:59', '2021-01-03', 6),
(57, 5, 1, 'Pet Supplies', NULL, 'pet-supplies', 'active', NULL, '10:14:05', '2020-10-31', 6, '14:08:26', '2021-01-02', 6),
(58, 57, 1, 'Feeding', NULL, 'feeding', 'active', NULL, '10:14:25', '2020-10-31', 6, NULL, NULL, NULL),
(59, 57, 2, 'Mat', NULL, 'mat', 'active', NULL, '10:14:40', '2020-10-31', 6, '10:16:26', '2020-10-31', 6),
(60, 57, 3, 'Scoop', NULL, 'scoop', 'active', NULL, '10:14:55', '2020-10-31', 6, '10:16:33', '2020-10-31', 6),
(61, 57, 4, 'Waste Management', NULL, 'waste-management', 'active', NULL, '10:15:19', '2020-10-31', 6, NULL, NULL, NULL),
(62, 3, 1, 'Agri Items', NULL, 'agri-items', 'active', NULL, '10:18:15', '2020-10-31', 6, NULL, NULL, NULL),
(63, 3, 2, 'CRATE', NULL, 'crate', 'active', NULL, '10:18:28', '2020-10-31', 6, NULL, NULL, NULL),
(64, 3, 3, 'PACKAGING SOLUTION', NULL, 'packaging-solution', 'active', NULL, '10:18:43', '2020-10-31', 6, NULL, NULL, NULL),
(65, 3, 4, 'PALLET & FLOOR MAT', NULL, 'pallet-floor-mat', 'active', NULL, '10:18:59', '2020-10-31', 6, '10:19:26', '2020-10-31', 6),
(66, 3, 5, 'PHARMACEUTICAL', NULL, 'pharmaceutical', 'active', NULL, '10:19:47', '2020-10-31', 6, NULL, NULL, NULL),
(67, 62, 1, 'Dala Kula', NULL, 'dala-kula', 'active', NULL, '10:20:55', '2020-10-31', 6, NULL, NULL, NULL),
(68, 62, 2, 'Chicken Cage', NULL, 'chicken-cage', 'active', NULL, '10:21:12', '2020-10-31', 6, NULL, NULL, NULL),
(69, 62, 3, 'Gardening Tools', NULL, 'gardening-tools', 'active', NULL, '10:21:27', '2020-10-31', 6, NULL, NULL, NULL),
(70, 62, 4, 'Poultry', NULL, 'poultry', 'active', NULL, '10:21:40', '2020-10-31', 6, NULL, NULL, NULL),
(71, 63, 1, 'Fish Basket', NULL, 'fish-basket', 'active', NULL, '10:24:06', '2020-10-31', 6, NULL, NULL, NULL),
(72, 63, 2, 'Fish Crate', NULL, 'fish-crate', 'active', NULL, '10:26:57', '2020-10-31', 6, NULL, NULL, NULL),
(73, 63, 3, 'Glass Crate', NULL, 'glass-crate', 'active', NULL, '10:27:17', '2020-10-31', 6, NULL, NULL, NULL),
(74, 63, 4, 'Sweet Tray', NULL, 'sweet-tray', 'active', NULL, '10:27:36', '2020-10-31', 6, NULL, NULL, NULL),
(75, 63, 5, 'Milk Crate', NULL, 'milk-crate', 'active', NULL, '10:27:57', '2020-10-31', 6, NULL, NULL, NULL),
(76, 64, 1, 'Gallon', NULL, 'gallon', 'active', NULL, '10:30:20', '2020-10-31', 6, NULL, NULL, NULL),
(77, 64, 2, 'Ice-Cream Box', NULL, 'ice-cream-box', 'active', NULL, '10:30:39', '2020-10-31', 6, NULL, NULL, NULL),
(78, 64, 3, 'Ice-Cream Cup', NULL, 'ice-cream-cup', 'active', NULL, '10:30:56', '2020-10-31', 6, NULL, NULL, NULL),
(79, 64, 4, 'Paint Container', NULL, 'paint-container', 'active', NULL, '10:31:27', '2020-10-31', 6, NULL, NULL, NULL),
(80, 64, 5, 'Pet Bottle', NULL, 'pet-bottle', 'active', NULL, '10:32:03', '2020-10-31', 6, NULL, NULL, NULL),
(81, 64, 6, 'PE Bottle', NULL, 'pe-bottle', 'active', NULL, '10:32:33', '2020-10-31', 6, NULL, NULL, NULL),
(82, 65, 1, 'Heavy Floor Mat', NULL, 'heavy-floor-mat', 'active', NULL, '10:33:05', '2020-10-31', 6, '10:41:33', '2020-10-31', 6),
(83, 65, 2, 'Pallet', NULL, 'pallet', 'active', NULL, '10:33:23', '2020-10-31', 6, NULL, NULL, NULL),
(84, 66, 1, 'Bed Pan', NULL, 'bed-pan', 'active', NULL, '10:42:35', '2020-10-31', 6, NULL, NULL, NULL),
(85, 66, 2, 'Urinal Container', NULL, 'urinal-container', 'active', NULL, '10:42:51', '2020-10-31', 6, NULL, NULL, NULL),
(86, 30, 3, 'Commode Chair', NULL, 'commode-chair', 'active', NULL, '11:00:26', '2020-10-31', 6, NULL, NULL, NULL),
(87, 30, 4, 'Office Chair', NULL, 'office-chair', 'active', NULL, '03:52:13', '2020-11-01', 6, NULL, NULL, NULL),
(88, 30, 5, 'Café Chair', NULL, 'caf-chair', 'active', NULL, '03:52:33', '2020-11-01', 6, NULL, NULL, NULL),
(89, 31, 1, 'Almirah', NULL, 'almirah', 'inactive', NULL, '03:53:29', '2020-11-01', 6, '05:37:44', '2021-01-02', 6),
(90, 31, 3, 'Cabinet', NULL, 'cabinet', 'inactive', NULL, '04:00:13', '2020-11-01', 6, '05:37:44', '2021-01-02', 6),
(91, 31, 4, 'Wardrobe', NULL, 'wardrobe', 'inactive', NULL, '04:01:00', '2020-11-01', 6, '05:37:44', '2021-01-02', 6),
(92, 31, 5, 'Kitchenshelf', NULL, 'kitchenshelf', 'inactive', NULL, '04:01:25', '2020-11-01', 6, '05:37:44', '2021-01-02', 6),
(93, 32, 1, 'Dining Table', NULL, 'dining-table', 'active', NULL, '04:01:57', '2020-11-01', 6, NULL, NULL, NULL),
(94, 32, 3, 'Catering Table', NULL, 'catering-table', 'active', NULL, '04:02:25', '2020-11-01', 6, '09:09:47', '2020-12-19', 6),
(95, 32, 4, 'Baby Table', NULL, 'baby-table', 'active', NULL, '04:02:46', '2020-11-01', 6, '09:06:55', '2020-12-19', 6),
(96, 32, 4, 'Center Table', NULL, 'center-table', 'active', NULL, '04:03:02', '2020-11-01', 6, NULL, NULL, NULL),
(97, 34, 0, 'All Sofa', NULL, 'all-sofa', 'active', NULL, '04:05:44', '2020-11-01', 6, '09:11:38', '2020-12-19', 6),
(98, 1, 3, 'Hanger & Clip', NULL, 'hanger-clip', 'inactive', NULL, '04:24:59', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(99, 1, 4, 'CLOCK', NULL, 'clock', 'inactive', NULL, '04:26:04', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(100, 1, 6, 'Cleaning Solutions', NULL, 'cleaning-solutions', 'inactive', NULL, '04:31:32', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(101, 1, 7, 'One Time Solutions', NULL, 'one-time-solutions', 'inactive', NULL, '04:32:00', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(102, 1, 8, 'Others', NULL, 'others', 'inactive', NULL, '04:32:21', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(103, 1, 9, 'Rack & Organizer', NULL, 'rack-organizer', 'active', NULL, '04:32:42', '2020-11-01', 6, '15:54:10', '2021-01-02', 6),
(104, 1, 11, 'Meal Box', NULL, 'meal-box', 'inactive', NULL, '08:35:37', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(105, 1, 12, 'Stool', NULL, 'stool', 'inactive', NULL, '08:35:53', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(106, 1, 13, 'Drinking Bottles', NULL, 'drinking-bottles', 'inactive', NULL, '08:36:22', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(107, 6, 1, 'Baby Walker', NULL, 'baby-walker', 'inactive', NULL, '08:38:35', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(108, 6, 4, 'Baby Potty', NULL, 'baby-potty', 'inactive', NULL, '08:40:59', '2020-11-01', 6, '14:18:33', '2021-01-02', 6),
(109, 98, 1, 'Hanger', NULL, 'hanger', 'active', NULL, '08:46:52', '2020-11-01', 6, NULL, NULL, NULL),
(110, 98, 2, 'Clip', NULL, 'clip', 'active', NULL, '08:47:10', '2020-11-01', 6, NULL, NULL, NULL),
(111, 99, 1, 'Table Clock', NULL, 'table-clock', 'active', NULL, '08:47:38', '2020-11-01', 6, NULL, NULL, NULL),
(112, 99, 2, 'Wall Clock', NULL, 'wall-clock', 'active', NULL, '08:47:54', '2020-11-01', 6, NULL, NULL, NULL),
(113, 100, 1, 'Dust Pan', NULL, 'dust-pan', 'active', NULL, '08:53:29', '2020-11-01', 6, NULL, NULL, NULL),
(114, 101, 1, 'Plate', NULL, 'plate', 'active', NULL, '08:32:41', '2020-11-02', 6, NULL, NULL, NULL),
(115, 101, 2, 'Cup', NULL, 'cup', 'active', NULL, '08:33:08', '2020-11-02', 6, NULL, NULL, NULL),
(116, 101, 3, 'Box', NULL, 'box', 'active', NULL, '08:33:25', '2020-11-02', 6, NULL, NULL, NULL),
(117, 101, 4, 'Cutlery', NULL, 'cutlery', 'active', NULL, '08:33:47', '2020-11-02', 6, NULL, NULL, NULL),
(118, 101, 5, 'Glass', NULL, 'glass', 'active', NULL, '08:34:09', '2020-11-02', 6, NULL, NULL, NULL),
(119, 102, 1, 'Beauty Items', NULL, 'beauty-items', 'active', NULL, '08:38:49', '2020-11-02', 6, '14:09:02', '2021-01-02', 6),
(120, 102, 2, 'Brush Holder', NULL, 'brush-holder', 'active', NULL, '08:39:06', '2020-11-02', 6, NULL, NULL, NULL),
(121, 102, 3, 'Hand Fan', NULL, 'hand-fan', 'active', NULL, '08:39:25', '2020-11-02', 6, NULL, NULL, NULL),
(122, 102, 4, 'Mosq Stand', NULL, 'mosq-stand', 'active', NULL, '08:39:44', '2020-11-02', 6, NULL, NULL, NULL),
(123, 102, 5, 'Saving Items', NULL, 'saving-items', 'active', NULL, '08:40:03', '2020-11-02', 6, NULL, NULL, NULL),
(124, 103, 1, 'Kitchen Rack', NULL, 'kitchen-rack', 'active', NULL, '08:40:37', '2020-11-02', 6, '05:35:47', '2021-01-02', 6),
(125, 103, 2, 'Multipurpose Rack', NULL, 'multipurpose-rack', 'inactive', NULL, '08:40:51', '2020-11-02', 6, '05:27:38', '2021-01-02', 6),
(126, 103, 3, 'Shoe Rack', NULL, 'shoe-rack', 'active', NULL, '08:41:08', '2020-11-02', 6, '05:33:38', '2021-01-02', 6),
(127, 103, 4, 'Orgaizer', NULL, 'orgaizer', 'active', NULL, '08:41:47', '2020-11-02', 6, '05:33:22', '2021-01-02', 6),
(128, 103, 5, 'Rehal', NULL, 'rehal', 'active', NULL, '08:47:20', '2020-11-02', 6, '05:33:09', '2021-01-02', 6),
(129, 40, 1, 'Cutlery Items', NULL, 'cutlery-items', 'active', NULL, '08:54:29', '2020-11-02', 6, NULL, NULL, NULL),
(130, 40, 2, 'Dinner Set', NULL, 'dinner-set', 'active', NULL, '08:54:46', '2020-11-02', 6, NULL, NULL, NULL),
(131, 40, 4, 'Fruit Basket', NULL, 'fruit-basket', 'active', NULL, '08:55:58', '2020-11-02', 6, NULL, NULL, NULL),
(132, 104, 1, 'Lunch', NULL, 'lunch', 'active', NULL, '09:16:07', '2020-11-02', 6, NULL, NULL, NULL),
(133, 104, 2, 'Snacks', NULL, 'snacks', 'active', NULL, '09:16:35', '2020-11-02', 6, NULL, NULL, NULL),
(134, 105, 1, 'High Stool', NULL, 'high-stool', 'active', NULL, '09:17:13', '2020-11-02', 6, NULL, NULL, NULL),
(135, 105, 2, 'Medium Stool', NULL, 'medium-stool', 'active', NULL, '09:17:33', '2020-11-02', 6, NULL, NULL, NULL),
(136, 105, 3, 'Short Stool', NULL, 'short-stool', 'active', NULL, '09:17:51', '2020-11-02', 6, NULL, NULL, NULL),
(137, 106, 1, 'Freezer Bottle', NULL, 'freezer-bottle', 'inactive', NULL, '09:19:20', '2020-11-02', 6, '12:20:59', '2020-12-31', 7),
(138, 106, 2, 'Sports Bottle', NULL, 'sports-bottle', 'inactive', NULL, '09:19:38', '2020-11-02', 6, '12:20:59', '2020-12-31', 7),
(140, 39, 1, 'Washing Net', NULL, 'washing-net', 'active', NULL, '09:24:46', '2020-11-02', 6, NULL, NULL, NULL),
(141, 39, 2, 'Chopping Board', NULL, 'chopping-board', 'active', NULL, '09:25:05', '2020-11-02', 6, NULL, NULL, NULL),
(142, 39, 3, 'Jar', NULL, 'jar', 'active', NULL, '09:25:27', '2020-11-02', 6, NULL, NULL, NULL),
(143, 39, 4, 'Dish Rack', NULL, 'dish-rack', 'active', NULL, '09:25:49', '2020-11-02', 6, NULL, NULL, NULL),
(144, 39, 5, 'Dish Drainer', NULL, 'dish-drainer', 'active', NULL, '09:26:08', '2020-11-02', 6, NULL, NULL, NULL),
(145, 39, 6, 'Spice Box', NULL, 'spice-box', 'active', NULL, '09:26:49', '2020-11-02', 6, NULL, NULL, NULL),
(146, 39, 7, 'Ice Cream Maker', NULL, 'ice-cream-maker', 'active', NULL, '09:27:08', '2020-11-02', 6, NULL, NULL, NULL),
(147, 39, 8, 'Tray', NULL, 'tray', 'active', NULL, '09:27:24', '2020-11-02', 6, NULL, NULL, NULL),
(148, 39, 9, 'Strainer', NULL, 'strainer', 'active', NULL, '09:27:59', '2020-11-02', 6, NULL, NULL, NULL),
(149, 39, 10, 'Dish Cover', NULL, 'dish-cover', 'active', NULL, '09:28:29', '2020-11-02', 6, NULL, NULL, NULL),
(150, 39, 11, 'Mixer', NULL, 'mixer', 'active', NULL, '09:28:46', '2020-11-02', 6, NULL, NULL, NULL),
(151, 39, 12, 'Ice Scoop', NULL, 'ice-scoop', 'active', NULL, '09:29:02', '2020-11-02', 6, NULL, NULL, NULL),
(152, 39, 13, 'Funnel', NULL, 'funnel', 'active', NULL, '09:29:17', '2020-11-02', 6, NULL, NULL, NULL),
(153, 39, 14, 'Juicer', NULL, 'juicer', 'active', NULL, '09:29:31', '2020-11-02', 6, NULL, NULL, NULL),
(154, 12, 1, 'Washing', NULL, 'washing', 'inactive', NULL, '11:45:00', '2020-11-02', 6, '11:45:43', '2020-11-02', 6),
(156, 100, 2, 'Scrubber', NULL, 'scrubber', 'active', NULL, '07:29:45', '2020-12-19', 6, NULL, NULL, NULL),
(157, 100, 3, 'MOP', NULL, 'mop', 'active', NULL, '07:30:37', '2020-12-19', 6, NULL, NULL, NULL),
(158, 100, 4, 'Washing Bowl', NULL, 'washing-bowl', 'active', NULL, '07:32:24', '2020-12-19', 6, NULL, NULL, NULL),
(159, 100, 6, 'Foot Tray', NULL, 'foot-tray', 'active', NULL, '07:35:33', '2020-12-19', 6, NULL, NULL, NULL),
(160, 100, 5, 'Water Pot', NULL, 'water-pot', 'active', NULL, '07:35:54', '2020-12-19', 6, NULL, NULL, NULL),
(161, 65, NULL, 'Cleaning Bucket', NULL, 'cleaning-bucket', 'active', NULL, '12:14:52', '2020-12-31', 7, '12:21:28', '2020-12-31', 7),
(162, 103, NULL, 'rack one', NULL, 'rack-one', 'active', NULL, '05:30:59', '2021-01-02', 6, NULL, NULL, NULL),
(163, 103, NULL, 'rack two', NULL, 'rack-two', 'active', NULL, '05:31:17', '2021-01-02', 6, '15:54:45', '2021-01-02', 6),
(164, 0, 6, 'category test', NULL, 'category-test', 'active', NULL, '06:51:01', '2021-01-03', 6, '10:38:01', '2021-01-03', 6),
(165, 164, NULL, 'subcategory test 1', NULL, 'subcategory-test-1', 'active', NULL, '06:51:40', '2021-01-03', 6, '06:55:36', '2021-01-03', 6),
(166, 165, NULL, 'item 1', 'category_thumbnail_1609656778.jpg', 'item-1', 'active', '<p>a large contributor in manufacturing and economic development of Bangladesh, displays admirable performance in the field of battle.</p>', '06:52:14', '2021-01-03', 6, '06:55:15', '2021-01-03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `config_id` bigint(20) UNSIGNED NOT NULL,
  `config_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_setting` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`config_id`, `config_name`, `config_setting`) VALUES
(1, 'product_thumbnail', '300x300'),
(2, 'project_name', 'RFL Houseware'),
(3, 'copyright_info', 'RFL Houseware');

-- --------------------------------------------------------

--
-- Table structure for table `contact_mail`
--

CREATE TABLE `contact_mail` (
  `id` int(11) NOT NULL,
  `name` varchar(160) DEFAULT NULL,
  `email` varchar(160) DEFAULT NULL,
  `phone` varchar(160) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contact_mail`
--

INSERT INTO `contact_mail` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`, `last_name`, `country_id`, `category_id`) VALUES
(1, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, NULL, NULL, NULL, NULL),
(2, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Hello', '2020-09-09 23:35:50', '2020-09-09 23:35:50', NULL, NULL, NULL),
(3, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Hello', '2020-09-09 23:45:47', '2020-09-09 23:45:47', NULL, NULL, NULL),
(4, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Hello', '2020-09-09 23:50:53', '2020-09-09 23:50:53', NULL, NULL, NULL),
(5, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Hello', '2020-09-09 23:51:53', '2020-09-09 23:51:53', NULL, NULL, NULL),
(6, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Hello', '2020-09-09 23:52:23', '2020-09-09 23:52:23', NULL, NULL, NULL),
(7, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Hello', '2020-09-09 23:54:10', '2020-09-09 23:54:10', NULL, NULL, NULL),
(8, 'Tanjil', 'tanjilahmed87@gmail.com', '01931164546', 'Hello World!', '2020-09-10 00:10:46', '2020-09-10 00:10:46', NULL, NULL, NULL),
(16, 'Bablu', 'bablu@gmail.com', '948483', 'test', '2020-11-08 03:13:20', '2020-11-08 03:13:20', 'Biswas', 17, 1),
(17, 'Golam', 'mktg1152@gmail.com', '01992662814', 'test message', '2020-11-09 23:38:16', '2020-11-09 23:38:16', 'Mahiuddin', 17, 1),
(18, 'Md', 'sharifulsajib2@gmail.com', '01782088923', 'dcdcd', '2020-11-24 11:43:54', '2020-11-24 11:43:54', 'Islam', 17, 1),
(19, 'Md', 'sharifulsajib2@gmail.com', '01782088923', 'hi', '2021-01-03 07:48:09', '2021-01-03 07:48:09', 'Islam', 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `fk_content_id` bigint(20) DEFAULT NULL,
  `content_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_serial` bigint(20) DEFAULT '1',
  `content_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_description` text COLLATE utf8mb4_unicode_ci,
  `content_misc` text COLLATE utf8mb4_unicode_ci,
  `additional_info` text COLLATE utf8mb4_unicode_ci,
  `external_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` text COLLATE utf8mb4_unicode_ci,
  `content_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `fk_content_id`, `content_slug`, `content_serial`, `content_title`, `content_subtitle`, `content_description`, `content_misc`, `additional_info`, `external_link`, `featured_image`, `content_status`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(33, NULL, 'video-slider', NULL, NULL, NULL, '<div><font style=\"\" color=\"#f7f7f7\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo</font></div><div><font style=\"\" color=\"#f7f7f7\">ligula eget dolor. Aenean massa.&nbsp;</font></div>', NULL, '<h2>Quality is our trademark&nbsp;<br>Trust is what we build<br>Innovation is what sets us apart</h2>', 'https://www.google.com/', 'slider_video_1597215413.home_video.mp4', 'active', '14:56:02', '2020-06-03', 1, '13:26:34', '2021-01-03', 6),
(41, NULL, 'featured-slider', 1, NULL, 'Household', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aeneamassa. Cum sociis natoque penatibus et', '<font face=\"Tahoma\">Frank Gehry</font>', '30', 'https://www.othoba.com/', 'image_1591272067.jpg', 'active', '12:01:07', '2020-06-04', 1, '12:00:11', '2020-11-18', 6),
(42, NULL, 'featured-slider', 1, NULL, 'Household', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aeneamassa. Cum sociis natoque penatibus et', 'Barrel Baby Chair', 'Free', 'https://www.othoba.com/', 'image_1591272478.jpg', 'active', '12:07:58', '2020-06-04', 1, '10:30:57', '2020-06-21', 6),
(43, NULL, 'featured-slider', 1, NULL, 'Furniture', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aeneamassa. Cum sociis natoque penatibus et', 'Frank Gehry', NULL, 'https://www.othoba.com/', 'image_1591273067.jpg', 'active', '12:17:47', '2020-06-04', 1, '10:31:15', '2020-06-21', 6),
(45, NULL, 'award', 2, 'Konba', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1592149025.png', 'active', '15:37:05', '2020-06-14', 1, NULL, NULL, NULL),
(49, NULL, 'blog', 3, 'Marketing For RFL Plastic', NULL, '<p><img src=\"/photos/1/01.jpg\" alt=\"\" width=\"841\" height=\"311\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Claritas est etiam, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Claritas est etiam, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Claritas est etiam, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n<h2>Buam nunc putamus parum claram, anteposuerit litterarum</h2>\r\n<ul>\r\n<li>Arm</li>\r\n<li>Armless</li>\r\n<li>Baby</li>\r\n<li>Cane Chair</li>\r\n<li>Crystal Chair</li>\r\n<li>Ergonomic/ Metal Chair</li>\r\n<li>Transparent Chair</li>\r\n<li>Value Added Chair (Plastic &amp; Metal)</li>\r\n</ul>\r\n<p><iframe src=\"//www.youtube.com/embed/iNU_oKWmCi4\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, 'blog_thumbnail_1592306260.jpg', 'active', '11:02:01', '2020-06-16', 1, '06:25:55', '2020-07-07', 6),
(50, NULL, 'blog', 2, 'Blog Title', NULL, '<p>Des</p>', NULL, NULL, NULL, 'blog_thumbnail_1592306060.jpg', 'active', '11:14:20', '2020-06-16', 1, '02:08:03', '2020-07-11', 6),
(51, NULL, 'award', 4, 'some text', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1592487204.png', 'active', '13:33:25', '2020-06-18', 6, NULL, NULL, NULL),
(52, NULL, 'award', 3, 'award', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1592487367.png', 'active', '13:36:07', '2020-06-18', 6, NULL, NULL, NULL),
(53, NULL, 'award', 5, 'award', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1592487384.png', 'active', '13:36:24', '2020-06-18', 6, NULL, NULL, NULL),
(54, NULL, 'award', 6, 'award', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1592487430.png', 'active', '13:37:10', '2020-06-18', 6, NULL, NULL, NULL),
(55, NULL, 'award', 8, 'award', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1592487448.png', 'active', '13:37:28', '2020-06-18', 6, NULL, NULL, NULL),
(56, NULL, 'award', 9, 'award', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1592487494.png', 'active', '13:38:14', '2020-06-18', 6, '13:38:26', '2020-06-18', 6),
(57, NULL, 'featured-slider', 1, NULL, 'Industrial', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aeneamassa. Cum sociis natoque penatibus et', '<p>Frank Gehry<br></p>', NULL, 'http://beta.rflhouseware.com/', 'image_1592488623.jpg', 'active', '13:57:03', '2020-06-18', 6, NULL, NULL, NULL),
(59, NULL, 'news', 2, 'The shift away from plastics is also part of a broader plan', NULL, '<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>\r\n<p>SFO vendors already are required to provide only compostable single-use foodware, including to-go containers, condiment packets, straws and utensils.</p>\r\n<p>Shops at the airports have adjusted easily to these requirements because of the increased availability of suppliers producing such products, said Michael Levine, CEO of the company that oversees Napa Farms Market, a store selling grab-and-go fare in Terminal 2 and International Terminal G.</p>\r\n<p>\"But the water bottle impact is a little trickier,\" he said.</p>\r\n<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>\r\n<p>SFO vendors already are required to provide only compostable single-use foodware, including to-go containers, condiment packets, straws and utensils.</p>\r\n<p>Shops at the airports have adjusted easily to these requirements because of the increased availability of suppliers producing such products, said Michael Levine, CEO of the company that oversees Napa Farms Market, a store selling grab-and-go fare in Terminal 2 and International Terminal G.</p>\r\n<p>\"But the water bottle impact is a little trickier,\" he said.</p>\r\n<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>\r\n<p>SFO vendors already are required to provide only compostable single-use foodware, including to-go containers, condiment packets, straws and utensils.</p>\r\n<p>Shops at the airports have adjusted easily to these requirements because of the increased availability of suppliers producing such products, said Michael Levine, CEO of the company that oversees Napa Farms Market, a store selling grab-and-go fare in Terminal 2 and International Terminal G.</p>\r\n<p>\"But the water bottle impact is a little trickier,\" he said.</p>\r\n<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>\r\n<p>SFO vendors already are required to provide only compostable single-use foodware, including to-go containers, condiment packets, straws and utensils.</p>\r\n<p>Shops at the airports have adjusted easily to these requirements because of the increased availability of suppliers producing such products, said Michael Levine, CEO of the company that oversees Napa Farms Market, a store selling grab-and-go fare in Terminal 2 and International Terminal G.</p>\r\n<p>\"But the water bottle impact is a little trickier,\" he said.</p>\r\n<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>\r\n<p>SFO vendors already are required to provide only compostable single-use foodware, including to-go containers, condiment packets, straws and utensils.</p>\r\n<p>Shops at the airports have adjusted easily to these requirements because of the increased availability of suppliers producing such products, said Michael Levine, CEO of the company that oversees Napa Farms Market, a store selling grab-and-go fare in Terminal 2 and International Terminal G.</p>\r\n<p>\"But the water bottle impact is a little trickier,\" he said.</p>', NULL, NULL, NULL, 'news_thumbnail_1594103868.png', 'active', '13:42:08', '2020-07-05', 1, '02:07:09', '2020-07-11', 6),
(60, NULL, 'event', 1, 'RFL Group holds dealers’ conference for its 3 popular brands', NULL, '<p><strong>Event Date: 07/07/2020</strong></p>\r\n<p>RFL Group&rsquo;s popular housewares brand &lsquo;<strong>Tel Plastic&rsquo;</strong>, footwear brand &lsquo;Walkar&rsquo; and paints brand &lsquo;Rainbow&rsquo; organised dealers&rsquo; conference at RFL Industrial Park at Kaliganj in Gazipur.</p>\r\n<p>The programme was held on Friday, January 10, 2020, according to a press release of Pran-RFL Group.</p>\r\n<p><em>About 2,000 distributors of the brands&rsquo; products took part at the conference.</em></p>\r\n<p>Ahsan Khan Chowdhury, chairman and CEO of PRAN-RFL Group, RN Paul, managing director of RFL Group, Kamrul Hasan, COO of Tel Plastic, Walkar Footwear and Rainbow Paints, Fahim Hossain, assistant general manager, Bashir Uddin, deputy general manager (Sales) and Jahirul Islam, assistant general manager (Sales), among others, were also present at the event.</p>', NULL, NULL, NULL, 'event_thumbnail_1594104371.png', 'active', '13:43:01', '2020-07-05', 1, '10:02:41', '2020-12-31', 7),
(61, 0, 'image-album', 1, 'RFL EVENT', NULL, NULL, NULL, NULL, NULL, 'album_thumbnail_1594104860.png', 'active', '13:47:18', '2020-07-05', 1, '02:07:42', '2020-07-11', 6),
(65, NULL, 'blog', 1, 'Plastic: WHO launches health review', NULL, '<p>The World Health Organization is to launch a review into the potential risks of plastic in drinking water.</p>\r\n<p>It will assess the latest research into the spread and impact of so-called microplastics - particles that are small enough to be ingested.</p>\r\n<p>It comes after journalism organisation Orb Media found plastic particles in many major brands of bottled water.</p>\r\n<p>There is no evidence that microplastics can undermine human health but the WHO wants to assess the state of knowledge.</p>\r\n<p>Plastic particles found in bottled water<br />Bruce Gordon, coordinator of the WHO&rsquo;s global work on water and sanitation, told BBC News that the key question was whether a lifetime of eating or drinking particles of plastic could have an effect.</p>\r\n<p>\"When we think about the composition of the plastic, whether there might be toxins in it, to what extent they might carry harmful constituents, what actually the particles might do in the body &ndash; there\'s just not the research there to tell us.</p>\r\n<p>\"We normally have a \'safe\' limit but to have a safe limit, to define that, we need to understand if these things are dangerous, and if they occur in water at concentrations that are dangerous.\"</p>\r\n<p>\'Shame and anger\' at plastic pollution<br />Earth is becoming \'Planet Plastic\'<br />Plastic pollution in seven charts<br />Mr Gordon said that he did not want to alarm anyone, and also emphasised that a far greater waterborne threat comes in countries where supplies can be contaminated with sewage.</p>\r\n<p>But he said he recognised that people hearing about the presence of microplastics in their drinking water would turn to the WHO for advice.</p>\r\n<p>\"The public are obviously going to be concerned about whether this is going to make them sick in the short term and the long term.\"</p>\r\n<p>The WHO initiative is partly in response to a study that screened more than 250 bottles of water from 11 different brands bought in nine countries - the largest investigation of its kind.</p>', NULL, NULL, NULL, 'blog_thumbnail_1594095916.jpg', 'active', '04:25:16', '2020-07-07', 6, '06:25:07', '2020-07-07', 6),
(66, NULL, 'news', 1, 'Plastic bottles sales banned at San Francisco airport', NULL, '<p>San Francisco, Aug 3 (AP/UNB) &mdash; San Francisco International Airport is banning the sale of single-use plastic water bottles.</p>\r\n<p>The unprecedented move at one of the major airports in the country will take effect Aug. 20, the San Francisco Chronicle reported Friday.</p>\r\n<p>The new rule will apply to airport restaurants, cafes and vending machines. Travelers who need plain water will have to buy refillable aluminum or glass bottles if they don\'t bring their own.</p>\r\n<p>As a department of San Francisco\'s municipal government, the airport is following an ordinance approved in 2014 banning the sale of plastic water bottles on city-owned property.</p>\r\n<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>\r\n<p>SFO vendors already are required to provide only compostable single-use foodware, including to-go containers, condiment packets, straws and utensils.</p>\r\n<p>Shops at the airports have adjusted easily to these requirements because of the increased availability of suppliers producing such products, said Michael Levine, CEO of the company that oversees Napa Farms Market, a store selling grab-and-go fare in Terminal 2 and International Terminal G.</p>\r\n<p>\"But the water bottle impact is a little trickier,\" he said.</p>\r\n<p>San Francisco, Aug 3 (AP/UNB) &mdash; San Francisco International Airport is banning the sale of single-use plastic water bottles.</p>\r\n<p>The unprecedented move at one of the major airports in the country will take effect Aug. 20, the San Francisco Chronicle reported Friday.</p>\r\n<p>The new rule will apply to airport restaurants, cafes and vending machines. Travelers who need plain water will have to buy refillable aluminum or glass bottles if they don\'t bring their own.</p>\r\n<p>As a department of San Francisco\'s municipal government, the airport is following an ordinance approved in 2014 banning the sale of plastic water bottles on city-owned property.</p>\r\n<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>\r\n<p>SFO vendors already are required to provide only compostable single-use foodware, including to-go containers, condiment packets, straws and utensils.</p>\r\n<p>Shops at the airports have adjusted easily to these requirements because of the increased availability of suppliers producing such products, said Michael Levine, CEO of the company that oversees Napa Farms Market, a store selling grab-and-go fare in Terminal 2 and International Terminal G.</p>\r\n<p>\"But the water bottle impact is a little trickier,\" he said.</p>\r\n<p>San Francisco, Aug 3 (AP/UNB) &mdash; San Francisco International Airport is banning the sale of single-use plastic water bottles.</p>\r\n<p>The unprecedented move at one of the major airports in the country will take effect Aug. 20, the San Francisco Chronicle reported Friday.</p>\r\n<p>The new rule will apply to airport restaurants, cafes and vending machines. Travelers who need plain water will have to buy refillable aluminum or glass bottles if they don\'t bring their own.</p>\r\n<p>As a department of San Francisco\'s municipal government, the airport is following an ordinance approved in 2014 banning the sale of plastic water bottles on city-owned property.</p>\r\n<p>The shift away from plastics is also part of a broader plan to slash net carbon emissions and energy use to zero and eliminate most landfill waste by 2021, said airport spokesman Doug Yakel.</p>\r\n<p>But, considering the approximately 4 million plastic water bottles sold per year at the airport, it may be more difficult for vendors to adhere to the water bottle ban.</p>\r\n<p>Whether vendors out of compliance will be penalized is unclear, but Yakel said the airport hopes that \"won\'t be necessary.\"</p>', NULL, NULL, NULL, 'news_thumbnail_1594103930.png', 'active', '06:30:50', '2020-07-07', 6, '09:29:17', '2020-12-31', 6),
(67, NULL, 'event', 2, 'RFL Stationery holds dealer conference', NULL, '<p>RFL Stationery organized its dealers&rsquo; conference at RFL Conference Center at Patira of Khilkhet in Dhaka on Sunday.</p>\r\n<p>About 2000 distributors across the country, engaged to serve products under Good Luck, Italiano &amp; Winner brands of RFL Stationary, took part in the conference.</p>\r\n<p>Ahsan Khan Chowdhury, Chairman and CEO of PRAN-RFL Group, RN Paul, Managing Director of RFL, ASM Hasan Nasir, Executive Director of RFL Stationary and Fahim Hossain, Head of Marketing were present at the function.</p>', NULL, NULL, NULL, 'event_thumbnail_1594104465.png', 'active', '06:47:45', '2020-07-07', 6, NULL, NULL, NULL),
(68, NULL, 'event', 1, 'Regal Furniture\'s dealer conference held', NULL, '<p>Regal Furniture, a sister concern of RFL, recently organized a dealer conference in Gazipur. Around 500 distributors from all over the country participated in the daylong conference.<br />The meeting was held at RFL Industrial Park at Kaliganj of the district. The event consisted of discussions on Regal Furniture, and its upcoming products.<br />Regal Furniture provided wood, metal and laminated board colorful furniture for the customers. Different kinds of household and office furniture including Bed, Sofa, Almirah, Wardrobe, Dressing Table, Chair, Shoe Rack, are available at Regal outlets in the country.<br />Addressing the program, R N Paul, director of RFL, emphasized to manufacture modern and quality products at reasonable price. He also discussed market strategies of Regal Furniture with the dealers in this meet up.<br />R N Paul expressed his hope to organize such a conference in every year. The distributors also thanked the management of Regal Furniture and urged the authority concern to remain focused on customer\'s creeds and colors.<br />Among others, Dilip Kumar Sutradhar, chief operating officer and MAM Muneem, head of marketing at Regal Furniture were present.</p>', NULL, NULL, NULL, 'event_thumbnail_1594104627.png', 'active', '06:50:28', '2020-07-07', 6, '02:07:21', '2020-07-11', 6),
(69, 61, 'image', 1, 'Event', NULL, NULL, NULL, NULL, NULL, 'image_1594104958.png', 'active', '06:55:58', '2020-07-07', 6, NULL, NULL, NULL),
(70, 61, 'image', 1, 'Event 2', NULL, NULL, NULL, NULL, NULL, 'image_1594104986.png', 'active', '06:56:26', '2020-07-07', 6, NULL, NULL, NULL),
(71, 0, 'video-album', 1, 'Ad', NULL, NULL, NULL, NULL, NULL, 'album_thumbnail_1594105172.png', 'active', '06:59:32', '2020-07-07', 6, NULL, NULL, NULL),
(72, 71, 'video', 1, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/aC1TgsW9DbM', NULL, 'video_thumbnail_1594105252.png', 'active', '07:00:52', '2020-07-07', 6, '07:03:03', '2020-07-07', 6),
(73, 71, 'video', 1, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/fIdWKZBxYj0', NULL, 'video_thumbnail_1594112307.png', 'active', '08:58:27', '2020-07-07', 6, NULL, NULL, NULL),
(74, NULL, 'catalog', NULL, 'Home Furniture', NULL, NULL, NULL, 'catalog_1594115617.pdf', NULL, 'catalog_thumbnail_1594115617.jpg', 'active', '09:53:37', '2020-07-07', 6, NULL, NULL, NULL),
(79, NULL, 'slider', 1, NULL, NULL, '<p><font color=\"#ffffff\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo<br>ligula eget dolor. Aenean massa.&nbsp;</font></p>', NULL, '<h2><font color=\"#ffffff\">Quality is our trademark&nbsp;<br>Trust is what we build<br>Innovation is what sets us apart</font></h2>', 'http://beta.rflhouseware.com/', 'slider_thumbnail_1609607057.jpg', 'active', '08:52:19', '2020-12-31', 6, '04:38:00', '2021-01-03', 6),
(80, NULL, 'featured-slider', 1, NULL, 'Pet Items', '1', '<p>hi</p>', NULL, 'http://ibrataslocal/site/themes/public/default/css/style.css', 'image_1609405148.jpg', 'active', '08:59:08', '2020-12-31', 6, NULL, NULL, NULL),
(81, NULL, 'news', 3, 'some text', NULL, '<p>Agri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening ToolsAgri Items Gardening Tools</p>', NULL, NULL, NULL, 'news_thumbnail_1609407055.jpg', 'active', '09:30:55', '2020-12-31', 6, NULL, NULL, NULL),
(82, 61, 'image', 1, '2', NULL, NULL, NULL, NULL, NULL, 'image_1609410367.jpg', 'active', '10:05:36', '2020-12-31', 7, '10:26:07', '2020-12-31', 7),
(83, 61, 'image', 1, 'a', NULL, NULL, NULL, NULL, NULL, 'image_1609409139.jpg', 'active', '10:05:39', '2020-12-31', 7, NULL, NULL, NULL),
(86, 61, 'image', 1, 'L', NULL, NULL, NULL, NULL, NULL, 'image_1609410423.jpg', 'active', '10:27:03', '2020-12-31', 7, NULL, NULL, NULL),
(87, 61, 'image', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '10:27:10', '2020-12-31', 7, NULL, NULL, NULL),
(88, 71, 'video', 1, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/vcSAyrGzY5k', NULL, 'video_thumbnail_1609410528.jpg', 'active', '10:28:48', '2020-12-31', 7, NULL, NULL, NULL),
(89, 0, 'video-album', 1, 'Md Sariful Islam', NULL, NULL, NULL, NULL, NULL, 'album_thumbnail_1609410617.jpg', 'active', '10:30:17', '2020-12-31', 7, NULL, NULL, NULL),
(90, 89, 'video', 1, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/vcSAyrGzY5k', NULL, 'video_thumbnail_1609410676.jpg', 'active', '10:31:16', '2020-12-31', 7, NULL, NULL, NULL),
(91, NULL, 'award', NULL, 'abc', NULL, NULL, NULL, NULL, NULL, 'award_thumbnail_1609411095.jpg', 'active', '10:38:15', '2020-12-31', 7, NULL, NULL, NULL),
(92, NULL, 'blog', NULL, 'Md Sariful Islam', NULL, '<p>db vz cv&nbsp;</p>', NULL, NULL, NULL, 'blog_thumbnail_1609413825.jpg', 'active', '11:23:45', '2020-12-31', 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_relations`
--

CREATE TABLE `content_relations` (
  `relation_id` bigint(20) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `page_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `created_at`, `created_by`, `status`) VALUES
(1, 'Afghanistan ', '2020-11-08 14:18:30', NULL, 'Active'),
(2, 'Albania ', '2020-11-08 14:18:30', NULL, 'Active'),
(3, 'Algeria ', '2020-11-08 14:18:30', NULL, 'Active'),
(4, 'American Samoa ', '2020-11-08 14:18:30', NULL, 'Active'),
(5, 'Andorra ', '2020-11-08 14:18:30', NULL, 'Active'),
(6, 'Angola ', '2020-11-08 14:18:30', NULL, 'Active'),
(7, 'Anguilla ', '2020-11-08 14:18:30', NULL, 'Active'),
(8, 'Antigua & Barbuda ', '2020-11-08 14:18:30', NULL, 'Active'),
(9, 'Argentina ', '2020-11-08 14:18:30', NULL, 'Active'),
(10, 'Armenia ', '2020-11-08 14:18:30', NULL, 'Active'),
(11, 'Aruba ', '2020-11-08 14:18:30', NULL, 'Active'),
(12, 'Australia ', '2020-11-08 14:18:30', NULL, 'Active'),
(13, 'Austria ', '2020-11-08 14:18:30', NULL, 'Active'),
(14, 'Azerbaijan ', '2020-11-08 14:18:30', NULL, 'Active'),
(15, 'Bahamas, The ', '2020-11-08 14:18:30', NULL, 'Active'),
(16, 'Bahrain ', '2020-11-08 14:18:30', NULL, 'Active'),
(17, 'Bangladesh ', '2020-11-08 14:18:30', NULL, 'Active'),
(18, 'Barbados ', '2020-11-08 14:18:30', NULL, 'Active'),
(19, 'Belarus ', '2020-11-08 14:18:30', NULL, 'Active'),
(20, 'Belgium ', '2020-11-08 14:18:30', NULL, 'Active'),
(21, 'Belize ', '2020-11-08 14:18:30', NULL, 'Active'),
(22, 'Benin ', '2020-11-08 14:18:30', NULL, 'Active'),
(23, 'Bermuda ', '2020-11-08 14:18:30', NULL, 'Active'),
(24, 'Bhutan ', '2020-11-08 14:18:30', NULL, 'Active'),
(25, 'Bolivia ', '2020-11-08 14:18:30', NULL, 'Active'),
(26, 'Bosnia & Herzegovina ', '2020-11-08 14:18:30', NULL, 'Active'),
(27, 'Botswana ', '2020-11-08 14:18:30', NULL, 'Active'),
(28, 'Brazil ', '2020-11-08 14:18:30', NULL, 'Active'),
(29, 'British Virgin Is. ', '2020-11-08 14:18:30', NULL, 'Active'),
(30, 'Brunei ', '2020-11-08 14:18:31', NULL, 'Active'),
(31, 'Bulgaria ', '2020-11-08 14:18:31', NULL, 'Active'),
(32, 'Burkina Faso ', '2020-11-08 14:18:31', NULL, 'Active'),
(33, 'Burma ', '2020-11-08 14:18:31', NULL, 'Active'),
(34, 'Burundi ', '2020-11-08 14:18:31', NULL, 'Active'),
(35, 'Cambodia ', '2020-11-08 14:18:31', NULL, 'Active'),
(36, 'Cameroon ', '2020-11-08 14:18:31', NULL, 'Active'),
(37, 'Canada ', '2020-11-08 14:18:31', NULL, 'Active'),
(38, 'Cape Verde ', '2020-11-08 14:18:31', NULL, 'Active'),
(39, 'Cayman Islands ', '2020-11-08 14:18:31', NULL, 'Active'),
(40, 'Central African Rep. ', '2020-11-08 14:18:31', NULL, 'Active'),
(41, 'Chad ', '2020-11-08 14:18:31', NULL, 'Active'),
(42, 'Chile ', '2020-11-08 14:18:31', NULL, 'Active'),
(43, 'China ', '2020-11-08 14:18:31', NULL, 'Active'),
(44, 'Colombia ', '2020-11-08 14:18:31', NULL, 'Active'),
(45, 'Comoros ', '2020-11-08 14:18:31', NULL, 'Active'),
(46, 'Congo, Dem. Rep. ', '2020-11-08 14:18:31', NULL, 'Active'),
(47, 'Congo, Repub. of the ', '2020-11-08 14:18:31', NULL, 'Active'),
(48, 'Cook Islands ', '2020-11-08 14:18:31', NULL, 'Active'),
(49, 'Costa Rica ', '2020-11-08 14:18:31', NULL, 'Active'),
(50, 'Cote d\'Ivoire ', '2020-11-08 14:18:31', NULL, 'Active'),
(51, 'Croatia ', '2020-11-08 14:18:31', NULL, 'Active'),
(52, 'Cuba ', '2020-11-08 14:18:31', NULL, 'Active'),
(53, 'Cyprus ', '2020-11-08 14:18:31', NULL, 'Active'),
(54, 'Czech Republic ', '2020-11-08 14:18:31', NULL, 'Active'),
(55, 'Denmark ', '2020-11-08 14:18:31', NULL, 'Active'),
(56, 'Djibouti ', '2020-11-08 14:18:31', NULL, 'Active'),
(57, 'Dominica ', '2020-11-08 14:18:31', NULL, 'Active'),
(58, 'Dominican Republic ', '2020-11-08 14:18:31', NULL, 'Active'),
(59, 'East Timor ', '2020-11-08 14:18:31', NULL, 'Active'),
(60, 'Ecuador ', '2020-11-08 14:18:31', NULL, 'Active'),
(61, 'Egypt ', '2020-11-08 14:18:31', NULL, 'Active'),
(62, 'El Salvador ', '2020-11-08 14:18:31', NULL, 'Active'),
(63, 'Equatorial Guinea ', '2020-11-08 14:18:31', NULL, 'Active'),
(64, 'Eritrea ', '2020-11-08 14:18:31', NULL, 'Active'),
(65, 'Estonia ', '2020-11-08 14:18:32', NULL, 'Active'),
(66, 'Ethiopia ', '2020-11-08 14:18:32', NULL, 'Active'),
(67, 'Faroe Islands ', '2020-11-08 14:18:32', NULL, 'Active'),
(68, 'Fiji ', '2020-11-08 14:18:32', NULL, 'Active'),
(69, 'Finland ', '2020-11-08 14:18:32', NULL, 'Active'),
(70, 'France ', '2020-11-08 14:18:32', NULL, 'Active'),
(71, 'French Guiana ', '2020-11-08 14:18:32', NULL, 'Active'),
(72, 'French Polynesia ', '2020-11-08 14:18:32', NULL, 'Active'),
(73, 'Gabon ', '2020-11-08 14:18:32', NULL, 'Active'),
(74, 'Gambia, The ', '2020-11-08 14:18:32', NULL, 'Active'),
(75, 'Gaza Strip ', '2020-11-08 14:18:32', NULL, 'Active'),
(76, 'Georgia ', '2020-11-08 14:18:32', NULL, 'Active'),
(77, 'Germany ', '2020-11-08 14:18:32', NULL, 'Active'),
(78, 'Ghana ', '2020-11-08 14:18:32', NULL, 'Active'),
(79, 'Gibraltar ', '2020-11-08 14:18:32', NULL, 'Active'),
(80, 'Greece ', '2020-11-08 14:18:32', NULL, 'Active'),
(81, 'Greenland ', '2020-11-08 14:18:32', NULL, 'Active'),
(82, 'Grenada ', '2020-11-08 14:18:32', NULL, 'Active'),
(83, 'Guadeloupe ', '2020-11-08 14:18:32', NULL, 'Active'),
(84, 'Guam ', '2020-11-08 14:18:32', NULL, 'Active'),
(85, 'Guatemala ', '2020-11-08 14:18:32', NULL, 'Active'),
(86, 'Guernsey ', '2020-11-08 14:18:32', NULL, 'Active'),
(87, 'Guinea ', '2020-11-08 14:18:32', NULL, 'Active'),
(88, 'Guinea-Bissau ', '2020-11-08 14:18:32', NULL, 'Active'),
(89, 'Guyana ', '2020-11-08 14:18:32', NULL, 'Active'),
(90, 'Haiti ', '2020-11-08 14:18:32', NULL, 'Active'),
(91, 'Honduras ', '2020-11-08 14:18:32', NULL, 'Active'),
(92, 'Hong Kong ', '2020-11-08 14:18:32', NULL, 'Active'),
(93, 'Hungary ', '2020-11-08 14:18:32', NULL, 'Active'),
(94, 'Iceland ', '2020-11-08 14:18:32', NULL, 'Active'),
(95, 'India ', '2020-11-08 14:18:32', NULL, 'Active'),
(96, 'Indonesia ', '2020-11-08 14:18:32', NULL, 'Active'),
(97, 'Iran ', '2020-11-08 14:18:33', NULL, 'Active'),
(98, 'Iraq ', '2020-11-08 14:18:33', NULL, 'Active'),
(99, 'Ireland ', '2020-11-08 14:18:33', NULL, 'Active'),
(100, 'Isle of Man ', '2020-11-08 14:18:33', NULL, 'Active'),
(101, 'Israel ', '2020-11-08 14:18:33', NULL, 'Active'),
(102, 'Italy ', '2020-11-08 14:18:33', NULL, 'Active'),
(103, 'Jamaica ', '2020-11-08 14:18:33', NULL, 'Active'),
(104, 'Japan ', '2020-11-08 14:18:33', NULL, 'Active'),
(105, 'Jersey ', '2020-11-08 14:18:33', NULL, 'Active'),
(106, 'Jordan ', '2020-11-08 14:18:33', NULL, 'Active'),
(107, 'Kazakhstan ', '2020-11-08 14:18:33', NULL, 'Active'),
(108, 'Kenya ', '2020-11-08 14:18:33', NULL, 'Active'),
(109, 'Kiribati ', '2020-11-08 14:18:33', NULL, 'Active'),
(110, 'Korea, North ', '2020-11-08 14:18:33', NULL, 'Active'),
(111, 'Korea, South ', '2020-11-08 14:18:33', NULL, 'Active'),
(112, 'Kuwait ', '2020-11-08 14:18:33', NULL, 'Active'),
(113, 'Kyrgyzstan ', '2020-11-08 14:18:33', NULL, 'Active'),
(114, 'Laos ', '2020-11-08 14:18:33', NULL, 'Active'),
(115, 'Latvia ', '2020-11-08 14:18:33', NULL, 'Active'),
(116, 'Lebanon ', '2020-11-08 14:18:33', NULL, 'Active'),
(117, 'Lesotho ', '2020-11-08 14:18:33', NULL, 'Active'),
(118, 'Liberia ', '2020-11-08 14:18:33', NULL, 'Active'),
(119, 'Libya ', '2020-11-08 14:18:33', NULL, 'Active'),
(120, 'Liechtenstein ', '2020-11-08 14:18:33', NULL, 'Active'),
(121, 'Lithuania ', '2020-11-08 14:18:33', NULL, 'Active'),
(122, 'Luxembourg ', '2020-11-08 14:18:33', NULL, 'Active'),
(123, 'Macau ', '2020-11-08 14:18:33', NULL, 'Active'),
(124, 'Macedonia ', '2020-11-08 14:18:33', NULL, 'Active'),
(125, 'Madagascar ', '2020-11-08 14:18:33', NULL, 'Active'),
(126, 'Malawi ', '2020-11-08 14:18:33', NULL, 'Active'),
(127, 'Malaysia ', '2020-11-08 14:18:33', NULL, 'Active'),
(128, 'Maldives ', '2020-11-08 14:18:33', NULL, 'Active'),
(129, 'Mali ', '2020-11-08 14:18:34', NULL, 'Active'),
(130, 'Malta ', '2020-11-08 14:18:34', NULL, 'Active'),
(131, 'Marshall Islands ', '2020-11-08 14:18:34', NULL, 'Active'),
(132, 'Martinique ', '2020-11-08 14:18:34', NULL, 'Active'),
(133, 'Mauritania ', '2020-11-08 14:18:34', NULL, 'Active'),
(134, 'Mauritius ', '2020-11-08 14:18:34', NULL, 'Active'),
(135, 'Mayotte ', '2020-11-08 14:18:34', NULL, 'Active'),
(136, 'Mexico ', '2020-11-08 14:18:34', NULL, 'Active'),
(137, 'Micronesia, Fed. St. ', '2020-11-08 14:18:34', NULL, 'Active'),
(138, 'Moldova ', '2020-11-08 14:18:34', NULL, 'Active'),
(139, 'Monaco ', '2020-11-08 14:18:34', NULL, 'Active'),
(140, 'Mongolia ', '2020-11-08 14:18:34', NULL, 'Active'),
(141, 'Montserrat ', '2020-11-08 14:18:34', NULL, 'Active'),
(142, 'Morocco ', '2020-11-08 14:18:35', NULL, 'Active'),
(143, 'Mozambique ', '2020-11-08 14:18:35', NULL, 'Active'),
(144, 'Namibia ', '2020-11-08 14:18:35', NULL, 'Active'),
(145, 'Nauru ', '2020-11-08 14:18:35', NULL, 'Active'),
(146, 'Nepal ', '2020-11-08 14:18:35', NULL, 'Active'),
(147, 'Netherlands ', '2020-11-08 14:18:35', NULL, 'Active'),
(148, 'Netherlands Antilles ', '2020-11-08 14:18:35', NULL, 'Active'),
(149, 'New Caledonia ', '2020-11-08 14:18:35', NULL, 'Active'),
(150, 'New Zealand ', '2020-11-08 14:18:35', NULL, 'Active'),
(151, 'Nicaragua ', '2020-11-08 14:18:35', NULL, 'Active'),
(152, 'Niger ', '2020-11-08 14:18:35', NULL, 'Active'),
(153, 'Nigeria ', '2020-11-08 14:18:35', NULL, 'Active'),
(154, 'N. Mariana Islands ', '2020-11-08 14:18:35', NULL, 'Active'),
(155, 'Norway ', '2020-11-08 14:18:35', NULL, 'Active'),
(156, 'Oman ', '2020-11-08 14:18:35', NULL, 'Active'),
(157, 'Pakistan ', '2020-11-08 14:18:35', NULL, 'Active'),
(158, 'Palau ', '2020-11-08 14:18:35', NULL, 'Active'),
(159, 'Panama ', '2020-11-08 14:18:35', NULL, 'Active'),
(160, 'Papua New Guinea ', '2020-11-08 14:18:35', NULL, 'Active'),
(161, 'Paraguay ', '2020-11-08 14:18:35', NULL, 'Active'),
(162, 'Peru ', '2020-11-08 14:18:35', NULL, 'Active'),
(163, 'Philippines ', '2020-11-08 14:18:35', NULL, 'Active'),
(164, 'Poland ', '2020-11-08 14:18:35', NULL, 'Active'),
(165, 'Portugal ', '2020-11-08 14:18:35', NULL, 'Active'),
(166, 'Puerto Rico ', '2020-11-08 14:18:35', NULL, 'Active'),
(167, 'Qatar ', '2020-11-08 14:18:35', NULL, 'Active'),
(168, 'Reunion ', '2020-11-08 14:18:35', NULL, 'Active'),
(169, 'Romania ', '2020-11-08 14:18:35', NULL, 'Active'),
(170, 'Russia ', '2020-11-08 14:18:35', NULL, 'Active'),
(171, 'Rwanda ', '2020-11-08 14:18:36', NULL, 'Active'),
(172, 'Saint Helena ', '2020-11-08 14:18:36', NULL, 'Active'),
(173, 'Saint Kitts & Nevis ', '2020-11-08 14:18:36', NULL, 'Active'),
(174, 'Saint Lucia ', '2020-11-08 14:18:36', NULL, 'Active'),
(175, 'St Pierre & Miquelon ', '2020-11-08 14:18:36', NULL, 'Active'),
(176, 'Saint Vincent and the Grenadines ', '2020-11-08 14:18:36', NULL, 'Active'),
(177, 'Samoa ', '2020-11-08 14:18:36', NULL, 'Active'),
(178, 'San Marino ', '2020-11-08 14:18:36', NULL, 'Active'),
(179, 'Sao Tome & Principe ', '2020-11-08 14:18:36', NULL, 'Active'),
(180, 'Saudi Arabia ', '2020-11-08 14:18:36', NULL, 'Active'),
(181, 'Senegal ', '2020-11-08 14:18:36', NULL, 'Active'),
(182, 'Serbia ', '2020-11-08 14:18:36', NULL, 'Active'),
(183, 'Seychelles ', '2020-11-08 14:18:36', NULL, 'Active'),
(184, 'Sierra Leone ', '2020-11-08 14:18:36', NULL, 'Active'),
(185, 'Singapore ', '2020-11-08 14:18:36', NULL, 'Active'),
(186, 'Slovakia ', '2020-11-08 14:18:36', NULL, 'Active'),
(187, 'Slovenia ', '2020-11-08 14:18:36', NULL, 'Active'),
(188, 'Solomon Islands ', '2020-11-08 14:18:36', NULL, 'Active'),
(189, 'Somalia ', '2020-11-08 14:18:36', NULL, 'Active'),
(190, 'South Africa ', '2020-11-08 14:18:36', NULL, 'Active'),
(191, 'Spain ', '2020-11-08 14:18:36', NULL, 'Active'),
(192, 'Sri Lanka ', '2020-11-08 14:18:36', NULL, 'Active'),
(193, 'Sudan ', '2020-11-08 14:18:36', NULL, 'Active'),
(194, 'Suriname ', '2020-11-08 14:18:36', NULL, 'Active'),
(195, 'Swaziland ', '2020-11-08 14:18:37', NULL, 'Active'),
(196, 'Sweden ', '2020-11-08 14:18:37', NULL, 'Active'),
(197, 'Switzerland ', '2020-11-08 14:18:37', NULL, 'Active'),
(198, 'Syria ', '2020-11-08 14:18:37', NULL, 'Active'),
(199, 'Taiwan ', '2020-11-08 14:18:37', NULL, 'Active'),
(200, 'Tajikistan ', '2020-11-08 14:18:37', NULL, 'Active'),
(201, 'Tanzania ', '2020-11-08 14:18:37', NULL, 'Active'),
(202, 'Thailand ', '2020-11-08 14:18:37', NULL, 'Active'),
(203, 'Togo ', '2020-11-08 14:18:37', NULL, 'Active'),
(204, 'Tonga ', '2020-11-08 14:18:37', NULL, 'Active'),
(205, 'Trinidad & Tobago ', '2020-11-08 14:18:37', NULL, 'Active'),
(206, 'Tunisia ', '2020-11-08 14:18:37', NULL, 'Active'),
(207, 'Turkey ', '2020-11-08 14:18:37', NULL, 'Active'),
(208, 'Turkmenistan ', '2020-11-08 14:18:37', NULL, 'Active'),
(209, 'Turks & Caicos Is ', '2020-11-08 14:18:37', NULL, 'Active'),
(210, 'Tuvalu ', '2020-11-08 14:18:37', NULL, 'Active'),
(211, 'Uganda ', '2020-11-08 14:18:37', NULL, 'Active'),
(212, 'Ukraine ', '2020-11-08 14:18:37', NULL, 'Active'),
(213, 'United Arab Emirates ', '2020-11-08 14:18:37', NULL, 'Active'),
(214, 'United Kingdom ', '2020-11-08 14:18:37', NULL, 'Active'),
(215, 'United States ', '2020-11-08 14:18:37', NULL, 'Active'),
(216, 'Uruguay ', '2020-11-08 14:18:37', NULL, 'Active'),
(217, 'Uzbekistan ', '2020-11-08 14:18:37', NULL, 'Active'),
(218, 'Vanuatu ', '2020-11-08 14:18:37', NULL, 'Active'),
(219, 'Venezuela ', '2020-11-08 14:18:37', NULL, 'Active'),
(220, 'Vietnam ', '2020-11-08 14:18:37', NULL, 'Active'),
(221, 'Virgin Islands ', '2020-11-08 14:18:38', NULL, 'Active'),
(222, 'Wallis and Futuna ', '2020-11-08 14:18:38', NULL, 'Active'),
(223, 'West Bank ', '2020-11-08 14:18:38', NULL, 'Active'),
(224, 'Western Sahara ', '2020-11-08 14:18:38', NULL, 'Active'),
(225, 'Yemen ', '2020-11-08 14:18:38', NULL, 'Active'),
(226, 'Zambia ', '2020-11-08 14:18:38', NULL, 'Active'),
(227, 'Zimbabwe ', '2020-11-08 14:18:38', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 4, 'Bagerhat', '2018-11-12 18:00:00', '2018-11-13 00:31:05'),
(3, 2, 'Bandarban', '2018-11-12 18:00:00', '2018-11-13 00:31:19'),
(4, 1, 'Barguna', '2018-11-12 18:00:00', '2018-11-13 00:31:53'),
(5, 1, 'Barishal', '2018-11-12 18:00:00', '2018-11-13 00:32:15'),
(6, 1, 'Bhola', '2018-11-12 18:00:00', '2018-11-13 00:32:37'),
(7, 6, 'Bogura', '2018-11-12 18:00:00', '2018-11-13 00:38:34'),
(8, 2, 'Brahmanbaria', '2018-11-12 18:00:00', '2018-11-13 00:35:06'),
(9, 2, 'Chandpur', '2018-11-12 18:00:00', '2018-11-13 00:35:29'),
(10, 6, 'Chapai Nawabganj', '2018-11-12 18:00:00', '2018-11-13 00:39:22'),
(11, 2, 'Chattagram', '2018-11-12 18:00:00', '2018-11-13 00:40:16'),
(12, 4, 'Chuadanga', '2018-11-12 18:00:00', '2018-11-13 00:40:49'),
(13, 2, 'Cox\'s Bazar', '2018-11-12 18:00:00', '2018-11-13 00:41:13'),
(14, 2, 'Cumilla', '2018-11-12 18:00:00', '2018-11-13 00:41:34'),
(15, 3, 'Dhaka', '2018-11-12 18:00:00', '2018-11-13 00:41:54'),
(16, 8, 'Dinajpur', '2018-11-12 18:00:00', '2018-11-13 00:43:36'),
(17, 3, 'Faridpur', '2018-11-12 18:00:00', '2018-11-13 00:44:09'),
(18, 2, 'Feni', '2018-11-12 18:00:00', '2018-11-13 00:44:43'),
(19, 8, 'Gaibandha', '2018-11-12 18:00:00', '2018-11-13 00:45:16'),
(20, 3, 'Gazipur', '2018-11-12 18:00:00', '2018-11-13 00:45:49'),
(21, 3, 'Gopalganj', '2018-11-12 18:00:00', '2018-11-13 00:46:09'),
(22, 7, 'Habiganj', '2018-11-12 18:00:00', '2018-11-13 00:46:44'),
(23, 5, 'Jamalpur', '2018-11-12 18:00:00', '2018-11-13 00:47:27'),
(24, 4, 'Jashore', '2018-11-12 18:00:00', '2018-11-13 00:48:00'),
(25, 1, 'Jhalokati', '2018-11-12 18:00:00', '2018-11-13 00:49:00'),
(26, 4, 'Jhenaidah', '2018-11-12 18:00:00', '2018-11-13 00:49:53'),
(27, 6, 'Joypurhat', '2018-11-12 18:00:00', '2018-11-13 00:50:33'),
(28, 2, 'Khagrachhari', '2018-11-12 18:00:00', '2018-11-13 00:51:37'),
(29, 4, 'Khulna', '2018-11-12 18:00:00', '2018-11-13 00:51:56'),
(30, 3, 'Kishoreganj', '2018-11-12 18:00:00', '2018-11-13 00:52:19'),
(31, 8, 'Kurigram', '2018-11-12 18:00:00', '2018-11-13 00:53:30'),
(32, 4, 'Kushtia', '2018-11-12 18:00:00', '2018-11-13 00:53:54'),
(33, 2, 'Lakshmipur', '2018-11-12 18:00:00', '2018-11-13 00:54:30'),
(34, 8, 'Lalmonirhat', '2018-11-12 18:00:00', '2018-11-13 00:55:09'),
(35, 3, 'Madaripur', '2018-11-12 18:00:00', '2018-11-13 00:55:48'),
(36, 4, 'Magura', '2018-11-12 18:00:00', '2018-11-13 00:56:22'),
(37, 3, 'Manikganj', '2018-11-12 18:00:00', '2018-11-13 00:56:52'),
(38, 4, 'Meherpur', '2018-11-12 18:00:00', '2018-11-13 00:57:33'),
(39, 7, 'Moulvibazar', '2018-11-12 18:00:00', '2018-11-13 00:58:13'),
(40, 3, 'Munshiganj', '2018-11-12 18:00:00', '2018-11-13 00:58:45'),
(41, 5, 'Mymensingh', '2018-11-12 18:00:00', '2018-11-13 00:59:16'),
(42, 6, 'Naogaon', '2018-11-12 18:00:00', '2018-11-13 01:00:20'),
(43, 4, 'Narail', '2018-11-12 18:00:00', '2018-11-13 01:00:56'),
(44, 3, 'Narayanganj', '2018-11-12 18:00:00', '2018-11-13 01:02:18'),
(45, 3, 'Narsingdi', '2018-11-12 18:00:00', '2018-11-13 01:03:12'),
(46, 6, 'Natore', '2018-11-12 18:00:00', '2018-11-13 01:04:02'),
(47, 5, 'Netrokona', '2018-11-12 18:00:00', '2018-11-13 01:05:13'),
(48, 8, 'Nilphamari', '2018-11-12 18:00:00', '2018-11-13 01:05:49'),
(49, 2, 'Noakhali', '2018-11-12 18:00:00', '2018-11-13 01:06:11'),
(50, 6, 'Pabna', '2018-11-12 18:00:00', '2018-11-13 01:06:33'),
(51, 8, 'Panchagarh', '2018-11-12 18:00:00', '2018-11-13 01:07:48'),
(52, 1, 'Patuakhali', '2018-11-12 18:00:00', '2018-11-13 01:08:38'),
(53, 1, 'Pirojpur', '2018-11-12 18:00:00', '2018-11-13 01:08:57'),
(54, 3, 'Rajbari', '2018-11-12 18:00:00', '2018-11-13 01:09:19'),
(55, 6, 'Rajshahi', '2018-11-12 18:00:00', '2018-11-13 01:09:57'),
(56, 2, 'Rangamati', '2018-11-12 18:00:00', '2018-11-13 01:10:30'),
(57, 8, 'Rangpur', '2018-11-12 18:00:00', '2018-11-13 01:11:38'),
(58, 4, 'Satkhira', '2018-11-12 18:00:00', '2018-11-13 01:11:58'),
(59, 3, 'Shariatpur', '2018-11-12 18:00:00', '2018-11-13 01:12:40'),
(60, 5, 'Sherpur', '2018-11-12 18:00:00', '2018-11-13 01:13:02'),
(61, 6, 'Sirajganj', '2018-11-12 18:00:00', '2018-11-13 01:13:25'),
(62, 7, 'Sunamganj', '2018-11-12 18:00:00', '2018-11-13 01:15:17'),
(63, 7, 'Sylhet', '2018-11-12 18:00:00', '2018-11-13 01:15:43'),
(64, 3, 'Tangail', '2018-11-12 18:00:00', '2018-11-13 01:16:08'),
(65, 8, 'Thakurgaon', '2018-11-12 18:00:00', '2018-11-13 01:17:05'),
(66, 2, 'Chittagong', '2020-07-25 21:16:41', '2020-07-25 21:16:41'),
(67, 1, 'Chittagong Sadar', '2020-07-25 21:17:48', '2020-07-25 21:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barishal', '2018-11-13 05:40:01', '2018-11-13 05:40:01'),
(2, 'Chattagram', '2018-11-13 05:40:01', '2018-11-13 05:40:01'),
(3, 'Dhaka', '2018-11-13 05:40:01', '2018-11-13 05:40:01'),
(4, 'Khulna', '2018-11-13 05:40:01', '2018-11-13 05:40:01'),
(5, 'Mymensingh', '2018-11-13 05:40:01', '2018-11-13 05:40:01'),
(6, 'Rajshahi', '2018-11-13 05:40:01', '2018-11-13 05:40:01'),
(7, 'Sylhet', '2018-11-13 05:40:01', '2018-11-13 05:40:01'),
(8, 'Rangpur', '2018-11-13 05:40:01', '2018-11-13 05:40:01');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_slider`
--

CREATE TABLE `featured_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(260) DEFAULT NULL,
  `featured_image` text,
  `pages` varchar(260) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `created_by` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `featured_slider`
--

INSERT INTO `featured_slider` (`id`, `title`, `featured_image`, `pages`, `status`, `create_time`, `create_date`, `created_by`) VALUES
(1, 'Liva', 'featured_thumbnail_1609659691.jpg', 'partners', 'active', '07:41:40', '2021-01-03 00:00:00', 6),
(2, 'Liva', 'featured_thumbnail_1599984139.png', 'partners', 'active', '08:02:19', '2020-09-12 18:00:00', 6),
(3, 'Amara', 'featured_thumbnail_1599985170.png', 'our-brands', 'active', '08:19:30', '2020-09-12 18:00:00', 6),
(4, 'Amara', 'featured_thumbnail_1599985185.png', 'partners', 'active', '08:19:45', '2020-09-12 18:00:00', 6),
(6, 'Aven', 'featured_thumbnail_1599985208.png', 'partners', 'active', '08:20:08', '2020-09-12 18:00:00', 6),
(7, 'hello', 'featured_thumbnail_1606112567.png', 'partners', 'active', '06:22:47', '2020-11-23 00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `image_configurations`
--

CREATE TABLE `image_configurations` (
  `image_id` int(4) NOT NULL,
  `image_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_value` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_configurations`
--

INSERT INTO `image_configurations` (`image_id`, `image_name`, `image_value`) VALUES
(1, 'home-logo', '1609648734home-logo.png'),
(2, 'inner-logo', '1609656998home-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `storelocator_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(10,6) NOT NULL,
  `longitude` double(10,6) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`storelocator_id`, `name`, `phone`, `country`, `state`, `state_id`, `zipcode`, `latitude`, `longitude`, `status`, `address`, `city`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(2, 'RFL', '+8801715400669', NULL, NULL, NULL, NULL, 23.809606, 90.355282, 'active', 'House# 19 (1st Floor) Road# 13', 'Dhaka', '13:02:08', '2020-04-05', 6, '13:09:35', '2020-07-24', 1),
(3, 'Mirpur', '01312698715', NULL, NULL, NULL, NULL, 23.809606, 90.355282, 'active', 'Dhaka', 'Dhaka', '08:11:06', '2020-07-24', 1, '13:09:55', '2020-07-24', 1);

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
(4, '2020_03_12_120617_create_configurations_table', 1),
(5, '2020_03_18_063558_create_markers_table', 1),
(7, '2020_03_18_063757_create_contents_table', 1),
(8, '2020_03_18_063824_create_pages_table', 1),
(9, '2020_03_18_063937_create_products_table', 1),
(10, '2020_03_18_091243_create_content_relations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `newsletter_id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subscription_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`newsletter_id`, `email`, `subscription_status`, `create_time`, `create_date`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, 'sajib@3-devs.com', 'active', '00:23:43', '2020-06-27', NULL, NULL, NULL),
(2, 'admin@rfl.com', 'active', '00:26:03', '2020-06-27', NULL, NULL, NULL),
(3, 'admin@example.com', 'active', '00:26:12', '2020-06-27', NULL, NULL, NULL),
(4, 'admin@3-devs.com', 'active', '00:26:33', '2020-06-27', NULL, NULL, NULL),
(5, 'info@3-devs.com', 'active', '00:41:51', '2020-06-27', NULL, NULL, NULL),
(6, 'sharifulsajib2@gmail.com', 'active', '00:41:56', '2020-06-27', NULL, NULL, NULL),
(7, 'sajibbv@3-devs.com', 'active', '05:59:50', '2020-07-26', NULL, NULL, NULL),
(8, 's@3-devs.com', 'active', '07:46:59', '2021-01-03', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(10) UNSIGNED NOT NULL,
  `upazila_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_category` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `upazila_id`, `name`, `address`, `outlet_category`, `phone`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 1, 'Farmgat', '27/1, Indira Road, Farmgate, Sher-E –Bangla Nagar, Dhaka-1215', 'bestbuy', '01704133783', '23.758135', '90.38683', '2016-11-18 04:45:00', '2020-08-24 00:51:42'),
(3, 2, 'Wari', '21/12 Ranking Street, Wari Dhaka-1203', 'exclusive', '01704133815', '23.721713', '90.41637', '2017-11-18 04:45:00', '2020-08-24 00:51:51'),
(4, 2, 'Middle Badda', '103, Middle Badda, Progoti Saroni, Dhaka-1212', 'carniva', '01704133790', '23.781165', '90.425773', '2018-11-18 04:45:00', '2020-08-24 00:52:02'),
(5, 2, 'Buddha Mondir', '32/2Atish Dipankar Road, Sabujbag Buddha Mondir, Basabo  Dhaka-1212.', 'bestbuy', '01704133803', '23.736352', '90.428773', '2019-11-18 04:45:00', '2020-08-27 02:57:26'),
(6, 2, 'Lalbagh', '4/1/2 Azimpur Road, Lalbagh', 'bestbuy', '01704133817', '23.727056', '90.384187', '2020-11-18 04:45:00', '2020-08-27 02:57:37'),
(7, 2, 'Green Road', '20/22, Ground Floor,shop no #01, Bir Uttam Safiullah Road, Green Road', 'bestbuy', '01704133816', '23.743729', '90.384661', '2021-11-18 04:45:00', '2020-08-27 02:58:05'),
(8, 2, 'Motijheel', '34/4 kamalapur kachabazar road,motijheel, Dhaka 1000', NULL, '01704133818', '23.728599', '90.424007', '2022-11-18 04:45:00', '2019-06-14 21:46:21'),
(9, 2, 'Nikunja-2', 'H#32, Road#01, Nikunja-2, Dhaka', NULL, '01704133791', '23.8285049', '90.4169624', '2023-11-18 04:45:00', '2020-05-15 23:23:51'),
(10, 2, 'South Banasree', 'K -17, South Banasree main road, Dhaka- 1219', NULL, '01704133804', '23.755758', '90.441255', '2024-11-18 04:45:00', '2019-06-14 23:20:40'),
(11, 2, 'Rupnagar, Mirpur', '27/ka,H #01, Rupnagar, Mirpur', NULL, '01704133784', '23.817045', '90.35598', '2025-11-18 04:45:00', '2019-06-14 23:44:57'),
(12, 2, 'Shahjadpur', 'GA-13/1, Shahjadpur, Gulshan, Dhaka -1212', NULL, '01704133793', '23.792087', '90.424764', '2026-11-18 04:45:00', '2019-06-14 23:38:10'),
(13, 2, 'Jatrabari', '114, Sahid Faruk sarak, North Jatrabari,Dhaka.', NULL, '01704133819', '23.709073', '90.430044', '2027-11-18 04:45:00', '2019-06-14 21:42:43'),
(14, 2, 'Uttara-09', 'House#8, Road#1/A, Sector#9, Uttara, Dhaka-1230.', NULL, '01704133794', '23.876599', '90.400296', '2028-11-18 04:45:00', '2028-11-18 04:45:00'),
(15, 2, 'Uttara-11', 'Plot#24, A/1, Sonargoan Jonopath Road, Sector#11, Uttara, Dhaka-1230.', NULL, '01704133795', '23.875594', '90.381518', '2029-11-18 04:45:00', '2029-11-18 04:45:00'),
(17, 2, 'Shankar', 'House #118(New), Road #9/A(New), Dhanmondi, Dhaka-1207', NULL, '01704133820', '23.750154', '90.367785', '2001-12-18 04:45:00', '2019-06-14 23:15:16'),
(18, 2, 'Hazipara', 'C-66-1, D.I.T Road, East Hazipara, Rampura, Dhaka-1219.', NULL, '01704133806', '23.757631', '90.417321', '2002-12-18 04:45:00', '2019-06-14 23:24:00'),
(19, 33, 'Palash, Narsingdi', 'Palash Natun Bazar # Palash Narsingdi', NULL, '01704133797', '23.975427', '90.6327', '2003-12-18 04:45:00', '2019-04-02 00:32:45'),
(20, 2, 'Mirpur-2 (Stadium Gate)', 'House #39, Road #07, Block-H, Mirpur-2, Dhaka-1216', NULL, '01704133785', '23.806916', '90.362132', '2004-12-18 04:45:00', '2019-06-14 23:42:40'),
(21, 2, 'DIT Project', 'House#01, Road#12, DIT Project, Merul Badda, Dhaka-1212.', NULL, '01704133807', '23.773992', '90.427813', '2005-12-18 04:45:00', '2005-12-18 04:45:00'),
(22, 2, 'Shantinagar', '124/1, New Kakrail Road, Shantinagar Plaza, Shantinagar, Dhaka-1000.', NULL, '01704133821', '23.741242', '90.411437', '2006-12-18 04:45:00', '2019-06-14 22:18:39'),
(23, 2, 'Polash BADC Mor', 'Sattar Khondoker Complex. East Palash Mor, Palash, Norshindi.', NULL, '01704133798', '23.976145', '90.633111', '2007-12-18 04:45:00', '2007-12-18 04:45:00'),
(24, 2, 'Shyamoli Ring Road', '37, Shyamoli Cinema Hall Building, Shyamoli, Dhaka-1207.', NULL, '01704133782', '23.775234', '90.367177', '2008-12-18 04:45:00', '2008-12-18 04:45:00'),
(25, 2, 'Khilgaon', '399/B, Shahid Baki Road, khilgaon, Dhaka', NULL, '01704133812', '23.75231', '90.41728', '2009-12-18 04:45:00', '2019-06-15 00:13:38'),
(26, 2, 'Goran', '76, East Goran, Khilgaon Dhaka-1219', NULL, '01704133808', '23.748386', '90.433381', '2010-12-18 04:45:00', '2019-06-15 00:15:05'),
(27, 2, 'Aftabnagar', 'A/7, Aftabnagar Main Road, Merul Badda, Dhaka-1212', NULL, '01704133809', '23.76614', '90.428955', '2011-12-18 04:45:00', '2019-06-14 23:33:46'),
(28, 2, 'Adabor', 'H #10, Probal Housing, Road #02, Shaker Tek, Adabor, Mohammadpur, Dhaka-1207', NULL, '01704133786', '23.77183', '90.359796', '2012-12-18 04:45:00', '2019-06-14 23:34:57'),
(29, 2, 'Mugdha', '4/4/A, North Mugdhapara, Stone Nurul Islam Tower, Mugdha, Dhaka-1214.', NULL, '01704133810', '23.729633', '90.429332', '2013-12-18 04:45:00', '2019-06-14 21:47:17'),
(30, 2, 'Banasree-E', 'Plot No #48, Road #4, Banasree-E Block, Main Road', NULL, '01704133813', '23.760899', '90.43621', '2014-12-18 04:45:00', '2019-06-14 23:27:57'),
(31, 2, 'Mohakhali', '67/3, Bir Uttam, AK Khandakar Sarak, Mokhali C/A, Dhaka-1212.', NULL, '01704133799', '23.781685', '90.406055', '2015-12-18 04:45:00', '2015-12-18 04:45:00'),
(32, 32, 'Narsingdi Sadar', 'Nannu Mollah Super Market, D.C Road, Tarowa, Narsingdi.', NULL, '01704133796', '23.93433', '90.709252', '2016-12-18 04:45:00', '2019-04-02 00:32:17'),
(33, 2, 'Kazipara', '571, East Kazipara, Dhaka.', NULL, '01704133789', '23.798062', '90.372667', '2017-12-18 04:45:00', '2019-06-14 23:38:48'),
(34, 2, 'Mirpur-1', '25-29, Zoo Road, 1/G, Mirpur-1, Dhaka-1216', NULL, '01704133787', '23.801186', '90.354358', '2018-12-18 04:45:00', '2019-06-14 23:40:17'),
(35, 2, 'Moghbazar', '70-71, Outer Circular Road, Moghbazar, Dhaka-1217', NULL, '01704133824', '23.749162', '90.406655', '2019-12-18 04:45:00', '2019-06-14 23:14:32'),
(36, 2, 'BDR Gate-1', '6/D/1, Ganaktuli Lane, BDR Gate-1, Hazaribagh, Dhaka-1205.', NULL, '01704133822', '23.729551', '90.370582', '2020-12-18 04:45:00', '2020-12-18 04:45:00'),
(37, 2, 'Jhigatola', '15/A, Haque Mansion, Jhigatola, Dhanmondi, Dhaka-1209.', NULL, '01704133127', '23.739195', '90.374457', '2021-12-18 04:45:00', '2019-06-14 21:52:35'),
(38, 2, 'Basabo', '446, South Basabo, Tampoo Stand, Sobujbagh, Dhaka-1214.', NULL, '01704133851', '23.740287', '90.432491', '2022-12-18 04:45:00', '2019-06-14 22:16:41'),
(39, 2, 'Maniknagar', '114, Maniknagar Biswaroad, Dhaka-1203', NULL, '01704133852', '23.722098', '90.428873', '2023-12-18 04:45:00', '2019-06-14 21:43:49'),
(40, 2, 'Khilgaon Chowrasta', '401/A, Khilgaon Chowrasta, Khilgaon, Dhaka-1219', NULL, '01704134430', '23.74879', '90.42659', '2024-12-18 04:45:00', '2019-06-15 00:14:34'),
(41, 2, 'Gandaria', '39/4, Old Sarafathgonj Lane, Gandaria, Dhaka-1204', NULL, '01704134426', '23.705758', '90.421831', '2025-12-18 04:45:00', '2019-06-14 21:41:44'),
(42, 2, 'Nayapaltan', '43, Naya Paltan, Dhaka-1000', NULL, '01704134435', '23.735568', '90.416137', '2026-12-18 04:45:00', '2019-06-14 21:50:50'),
(43, 2, 'Pantahpath', '44/9, West West Panthapath, Dhaka-1205.', NULL, '01704140375', '23.752345', '90.384865', '2027-12-18 04:45:00', '2019-06-14 23:16:59'),
(44, 2, 'Savar Thana Road', 'H#D-119/3, Talbagh, Thana Road, Savar', NULL, '01704130763', '23.839238', '90.256647', '2028-12-18 04:45:00', '2019-06-14 23:48:25'),
(45, 2, 'Mirpur 60 Feet', '377/1 West Monipur, Kamal Shoroni, Dhaka-1216.', NULL, '01704130764', '23.797845', '90.364893', '2029-12-18 04:45:00', '2029-12-18 04:45:00'),
(47, 2, 'Nazimuddin Road', '87, Razani Ghandha House, Nazim Uddin Road, Dhaka-1211', NULL, '01704158719', '23.722863', '90.399747', '2031-12-18 04:45:00', '2031-12-18 04:45:00'),
(48, 2, 'Azimpur', '44/A/1/2, Shapra Mosque, Azimpur Road, Dhaka-1205', NULL, '01704158720', '23.727056', '90.384187', '2001-01-19 04:45:00', '2019-06-14 21:45:40'),
(49, 2, 'Banasree-K', 'Block #L, Road #13, South Banasree, Dhaka-1219.', NULL, '01704158737', '23.757213', '90.441382', '2002-01-19 04:45:00', '2019-06-14 23:22:21'),
(50, 2, 'Lalmatia', 'H#B-50, Zakir Hossain Road, Lalmatia, Mohammadpur, Dhaka-1207', NULL, '01704134483', '23.759542', '90.367035', '2003-01-19 04:45:00', '2003-01-19 04:45:00'),
(52, 2, 'Shibgonj Sylhet', 'East Shibgonj, Shibgonj Point, Sylhet', NULL, '01704134489', '24.902862', '91.891657', '2005-01-19 04:45:00', '2005-01-19 04:45:00'),
(53, 48, 'Ambarkhana, Sylhet', 'Darsdan Deuri, Ambarkhana, Sunamgonj Road, Sylhet.', NULL, '01704134487', '24.896156', '91.868921', '2006-01-19 04:45:00', '2019-01-05 05:28:38'),
(54, 2, 'Faridabad', '56, Haricharan Ray Road, Faridabad, Dhaka-1204. (Opposite Gandaria Thana)', NULL, '01704134480', '23.69953', '90.421302', '2007-01-19 04:45:00', '2019-06-11 23:46:15'),
(55, 2, 'Uttara#6', 'H#1, Road#13, Sector#6, Uttara, Dhaka-1230', NULL, '01704134485', '23.870227', '90.402079', '2008-01-19 04:45:00', '2008-01-19 04:45:00'),
(56, 2, 'Sheikhghat Sylhet', '23/A, Jitu Mia Point, VIP Road, Shekghat, Sylhet-3100', NULL, '01704134486', '24.891601', '91.859956', '2009-01-19 04:45:00', '2009-01-19 04:45:00'),
(57, 2, 'Basbari Mohammadpur', '21/F, Block#D, Basbari Road, Mohammadpur, Dhaka-1207', NULL, 'Upcoming', '23.762065', '90.359019', '2010-01-19 04:45:00', '2010-01-19 04:45:00'),
(58, 2, 'Bijoynagar', '169, Shahid Sayed Nazrul Islam Saroni, Bijoynagar, Dhaka-1000', NULL, 'Upcoming', '23.811647', '90.412389', '2011-01-19 04:45:00', '2011-01-19 04:45:00'),
(60, 2, 'Shewrapara', '775, West Shewrapara, Mirpur, Dhaka-1216', NULL, '01704133792', '23.791835', '90.375018', '2013-01-19 04:45:00', '2019-06-14 23:37:09'),
(61, 2, 'ECB Chattar', 'Shop#7,8, ECB Chattar, Army Market, Manikdi, Mirpur', NULL, '01704158439', '23.823055', '90.393721', '2014-01-19 04:45:00', '2019-06-14 23:46:03'),
(62, 2, 'Mirpur-10', 'Kha-06, Boundary Road, Plot #39/A, Mirpur-10, Dhaka-1216', NULL, '01704130765', '23.806058', '90.368875', '2015-01-19 04:45:00', '2019-06-14 23:41:19'),
(63, 2, 'Donia', '421, Anamika Bhaban, Nayapara, Donia, Dhaka-1236', NULL, '01704158428', '23.701676', '90.447702', '2016-01-19 04:45:00', '2019-06-14 21:40:29'),
(64, 32, 'Narisingdi College Road', '49, College Road, Bania Chal Khalpar, Narsingdi Sadar.', NULL, '01704158407', '23.932301', '90.721194', '2017-01-19 04:45:00', '2019-06-14 23:51:14'),
(65, 2, 'Asad Gate', '2/2, Block#A, Mirpur Road, Lalmatia, Dhaka.', NULL, 'Upcoming', '23.759472', '90.373649', '2018-01-19 04:45:00', '2018-01-19 04:45:00'),
(67, 18, 'Basabo - Chicken Outlet', '225, Middle Basabo, Sobujbagh, Dhaka-1214', 'bestbuy', '01704134484', '23.739883', '90.427941', '2019-06-14 22:17:51', '2020-08-24 11:30:28'),
(68, 2, 'BEPZA', 'BEPZA Complex, House#19/D, Road#06, Greenroad, Dhanmondi, Dhaka-1205', NULL, '01704158298', '23.74442', '90.384618', '2019-06-14 23:11:57', '2019-06-14 23:11:57'),
(69, 2, 'Banasree-D', 'House #2, Road #03, Block #D, Banasree, Rampura, Dhaka-1219', NULL, '01704133805', '23.762389', '90.430884', '2019-06-14 23:30:01', '2019-06-14 23:30:01'),
(70, 2, 'Banasree-A', 'Plot #5, 7, 11, Road #5/1, Block #A, Banasree, Rampura, Dhaka', NULL, '01704158412', '23.764758', '90.42482', '2019-06-14 23:32:00', '2019-06-15 00:10:43'),
(71, 2, 'Bashundhara', '12/D/E, Block #A, Main Avenue, Bashundhara R/A, Dhaka-1229', NULL, '01704158167', '23.811969', '90.425922', '2019-06-14 23:44:05', '2019-06-14 23:44:05'),
(72, 2, 'Savar Bus-stand', 'B1, Monsur Market, Savar Bazar Bustand, Savar, Dhaka', NULL, '01704134490', '23.846654', '90.25695', '2019-06-14 23:50:15', '2019-06-14 23:50:15'),
(73, 2, 'Tasty Treat Rampura', '278, West Rampura Bazar, Rampura, Dhaka-1219', NULL, '+8801313071247', '23.7599307', '90.4182619', '2020-05-15 22:52:33', '2020-05-15 22:52:33'),
(74, 2, 'Tasty Treat New Market', 'House No : 360, Elephant Road, New Market', NULL, '+8801704134480', '23.7364276', '90.3862089', '2020-05-15 23:06:09', '2020-05-15 23:06:09'),
(75, 2, 'Tasty Treat Uttara-13', 'Everest Tower, 74, Gawsul Azam Avenue, Ground Floor,  Sector-13, Uttara, Dhaka-1230', NULL, '+8801704138882', '23.8693485', '90.3854544', '2020-05-15 23:19:21', '2020-05-15 23:19:21'),
(76, 2, 'Tasty Treat Bijoy Shoroni', 'Shop#01, Airport Road Super Market,  145, Bijoy Shoroni, Farmgate, Dhaka.', NULL, '01704132242', '23.7627098', '90.3891167', '2020-05-15 23:27:46', '2020-05-15 23:27:46'),
(77, 2, 'Tasty Treat Banani', 'Tower Hamlet,16 Kamal Attaturk Avenue(Ground Floor) Banani, Dhaka-1209', NULL, '+8801313-071264', '23.7936444', '90.4037389', '2020-05-15 23:34:58', '2020-05-15 23:34:58'),
(78, 2, 'Tasty Treat Tejgaon', 'New-79, Shaheed Tajuddin Ahmed Avenue, Tejgaon, Dhaka-1208', NULL, '+8801704133770', '23.7676756', '90.4011095', '2020-05-15 23:38:53', '2020-05-15 23:38:53'),
(79, 48, 'Sylhet', 'Sylhet', NULL, '01931164546', '24.8997595', '91.8259623', '2020-07-25 10:41:37', '2020-07-25 10:41:37'),
(80, 50, 'RFL Best Buy - Chawkbazar, Chittagong', 'Holding Number-103, Kapasgola Rd, Chattogram 4203', NULL, '01844605275', '22.358237', '91.838567', '2020-07-25 21:23:56', '2020-07-25 21:23:56'),
(81, 2, 'some outlet', 'House:29, Road:09, Flat:5B, Sector:4 Uttara,', 'carniva', '01782088923', '23.8698457', '90.4413529', '2020-12-31 11:29:47', '2020-12-31 11:29:47'),
(82, 2, 'a', 'House:29, Road:09, Flat:5B, Sector:4 Uttara,', 'carniva', '01782088923', '23.8698457', '90.4413529', '2021-01-03 06:57:43', '2021-01-03 06:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` bigint(4) UNSIGNED NOT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_short_description` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_slug`, `page_name`, `page_short_description`, `page_description`, `image`, `page_type`, `page_status`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, 'home', 'Home', NULL, NULL, NULL, 'default', 'active', '18:10:12', '2020-03-24', 1, NULL, NULL, NULL),
(2, 'about', 'about', 'RFL Plastics is a sister concern of PRAN-RFL group. The company was founded by Late. Mr. Amjad Khan Chowdhury in1981 with a vision to leveraging the farmer in irrigation as well as ensuring drinking water through Water Pump & Tube-well. After that it commenced', '<p>RFL Plastics is a sister concern of PRAN-RFL group. The company was founded by Late. Mr. Amjad Khan Chowdhury in1981 with a vision to leveraging the farmer in irrigation as well as ensuring drinking water through Water Pump &amp; Tube-well. After that it commenced its operation in different categories and starts plastics line 2003. The factory sites are in company owned industrial parks of 300,000 sq meters including building area of 200,000 which is fully equipped with state of the art injection, Compressed &amp; blow molding machines with a conversion capacity of over 5000 tons per month.</p>\r\n<p>RFL Plastics currently utilizes 4000 molds through 500 machines having a growth rate of 30% over last year backed by own tooling facilities. The growth story behind of this brand is expansion &amp; availability of innovative &amp; affordable solution for household durables &amp; utensils.</p>\r\n<p><iframe src=\"//www.youtube.com/embed/JHpXEHpQspE\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '1606112532.jpg', '', 'active', NULL, NULL, 1, '07:34:47', '2021-01-03', 6),
(3, 'global-presence', 'Global Presence', 'RFL now successfully operating 64 countries around the world.', '<p>RFL now successfully operating 64 countries around the world.</p>\r\n<p><img src=\"/photos/6/glo.jpg\" alt=\"\" /></p>', '1600014640.png', '', 'active', NULL, NULL, 1, '11:48:46', '2020-10-11', 6),
(4, 'quality-compliance', 'Quality Compliance', 'We are also certified by CARREFOUR,TRUDEAU CORPORATION, KIK, WORLD DISNEY, BSCI CERTIFICATION & SEDEX.', '<p>We are also certified by CARREFOUR,TRUDEAU CORPORATION, KIK, WORLD DISNEY, BSCI CERTIFICATION &amp; SEDEX.</p>\r\n<p>ISO Certified: Iso-14001:2004 (Environment Management System) Iso-9001:2008 (Quality Management System)</p>\r\n<p><img src=\"/photos/6/q1.jpg\" alt=\"\" /></p>\r\n<p>&nbsp;</p>', '1600014902.png', '', 'active', NULL, NULL, 1, '11:50:02', '2020-10-11', 6),
(5, 'factories', 'Factories', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', '<p style=\"text-align: center;\"><iframe src=\"//www.youtube.com/embed/dpfAVUZ99uE\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '1600014448.png', '', 'active', NULL, NULL, 1, '09:36:26', '2020-12-31', 6),
(6, 'achievements', 'Achievements', 'We received BEST EXPORTER TROPHY for last 5 consecutive years.', '<p>It is our pleasure that we have got several recognitions from both national and international organization as the best business enterprise through sustainable growth. We received BEST EXPORTER TROPHY for last 5 consecutive years.</p>', '1600014402.png', '', 'active', NULL, NULL, 1, '11:54:43', '2020-10-11', 6),
(7, 'faq', 'Faq', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', '<p><strong>Q:</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel</p>\r\n<p><strong>Ans:</strong> Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel</p>\r\n<p><strong>Q:</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel</p>\r\n<p><strong>Ans:</strong> Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel</p>\r\n<p><strong>Q:</strong> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel</p>\r\n<p><strong>Ans:</strong> Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel</p>', '1600015082.png', '', 'active', NULL, NULL, 1, '05:54:45', '2020-11-21', 6),
(8, 'privacy-policy', 'Privacy-Policy', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '', 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'terms-of-use', 'Terms Of Use', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '', 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'our-brands', 'Our Brands', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1600014102.jpg', '', 'active', NULL, NULL, NULL, '16:21:42', '2020-09-13', 6),
(11, 'partners', 'Partners', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1600014069.jpg', '', 'active', NULL, NULL, NULL, '16:21:09', '2020-09-13', 6),
(12, 'contact', 'Contact', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1600072886.png', '', 'active', NULL, NULL, NULL, '08:41:26', '2020-09-14', 6),
(13, 'privacy-policy', 'Privacy policy', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat ma Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>', '1600015082.png', '', 'active', NULL, NULL, NULL, '08:49:57', '2020-09-14', 6),
(14, 'terms-of-use', 'Terms of use', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat ma Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo</p>', '1600015082.png', '', 'active', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'news', 'News', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609674606.jpg', 'additional', 'active', '11:33:00', '2021-01-03', 6, '12:10:20', '2021-01-03', 6),
(16, 'event', 'Event', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678988.jpg', 'additional', 'active', '11:35:48', '2021-01-03', 6, '13:03:08', '2021-01-03', 6),
(17, 'image-gallery', 'Image Gallery', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678951.jpg', 'additional', 'active', '11:42:05', '2021-01-03', 6, '13:02:31', '2021-01-03', 6),
(18, 'video-gallery', 'Video Gallery', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678917.jpg', 'additional', 'active', '11:43:17', '2021-01-03', 6, '13:01:57', '2021-01-03', 6),
(19, 'best-buy-outlets', 'Best Buy Outlets', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678878.jpg', 'additional', 'active', '11:44:59', '2021-01-03', 6, '13:01:18', '2021-01-03', 6),
(20, 'exclusive-outlets', 'Exclusive Outlets', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678834.jpg', 'additional', 'active', '11:45:28', '2021-01-03', 6, '13:00:34', '2021-01-03', 6),
(21, 'carniva-outlets', 'Carniva Outlets', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678799.jpg', 'additional', 'active', '11:45:59', '2021-01-03', 6, '12:59:59', '2021-01-03', 6),
(22, 'blog', 'Blog', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678727.jpg', 'additional', 'active', '11:46:10', '2021-01-03', 6, '12:58:47', '2021-01-03', 6),
(23, 'catalog', 'Catalog', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', NULL, '1609678681.jpg', 'additional', 'active', '12:36:28', '2021-01-03', 6, '12:58:01', '2021-01-03', 6),
(24, 'sitemap', 'Sitemap', NULL, NULL, NULL, 'additional', 'active', '12:36:49', '2021-01-03', 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_attribute`
--

CREATE TABLE `page_attribute` (
  `attribute_id` int(4) NOT NULL,
  `attribute_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fk_page_id` int(4) DEFAULT NULL,
  `page_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_subtitle` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_subtitle_bold` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_description` text COLLATE utf8_unicode_ci,
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_attribute`
--

INSERT INTO `page_attribute` (`attribute_id`, `attribute_name`, `fk_page_id`, `page_title`, `page_subtitle`, `page_subtitle_bold`, `featured_image`, `page_description`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(1, 'page-description', 1, 'Sojib Bhai test edit', 'Recycling plastic feels test jju', 'fantastic! test abc', '1609405240.png', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', NULL, NULL, NULL, '13:22:52', '2021-01-03', 6),
(2, 'home-tab', 1, 'Products Performance', 'https://play.google.com/store/apps/details?id=com.bitsmedia.android.muslimpro', NULL, '16062175361.png', 'PROMISE to help create ways of reusing household and post indus-trial plastic waste', NULL, NULL, NULL, '17:20:15', '2021-01-02', 6),
(3, 'home-tab', 1, 'Food Grade', 'link', NULL, '16062175362.png', 'PROMISE to help create ways of reusing household and post indus-trial plastic waste', NULL, NULL, NULL, '17:20:15', '2021-01-02', 6),
(4, 'home-tab', 1, 'Bisphenol – A (BPA) Free', 'link', NULL, '16062175363.png', 'PROMISE to help create ways of reusing household and post indus-trial plastic waste', NULL, NULL, NULL, '17:20:15', '2021-01-02', 6),
(5, 'home-tab', 1, 'Premium quality', 'link', NULL, '16062175364.png', 'PROMISE to help create ways of reusing household and post indus-trial plastic waste', NULL, NULL, NULL, '17:20:15', '2021-01-02', 6),
(6, 'Intro-image', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'product-section-one', 1, 'Lorem ipsum dolor sit amet test Lorem ipsum dolor sit amet test', 'Cum sociis natoque test 2', 'penatibus test 3', NULL, 'Short Description', NULL, NULL, NULL, '10:11:12', '2020-11-20', 6),
(8, 'product-section-two', 1, 'Lorem ipsum dolor sit amet test 4 3', 'Cum sociis natoque test 5 4', 'penatibus test 3 r', 'https://www.bdtender.com/tend_call.php?id=10360575', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'catalog-info', 1, 'Lorem ipsum dolor sit amet', 'consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur r', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
('admin@me.com', '$2y$10$kSipCgffKc6lcOjqQD/R6eK4gmyTl5iGyD..7azUkMUybwAAbU7Ha', '2020-04-26 02:03:21'),
('sajib@3-devs.com', '$2y$10$fgZXmT2Arb3cZRspBIm/XOH1A.YagVx8.pw1wkQQT0OmtORi3b3bi', '2020-06-26 18:19:41'),
('admin@rfl.com', '$2y$10$VPdTYx/KSXJ9nXdpJpp.YeGQXauQ7du508KOIQnuZqZqKG3/EuPgK', '2020-12-31 09:52:14'),
('sharifulsajib2@gmail.com', '$2y$10$MyRI8dz5cY5Q0uEETFkpbuvJ29gRlRtai9FLCDxyK57va09GuODP6', '2020-12-31 09:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `popup_image`
--

CREATE TABLE `popup_image` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `link` varchar(260) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `popup_image`
--

INSERT INTO `popup_image` (`id`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'popup_thumbnail_1609680365.jpg', NULL, 'active', '2020-10-31 22:35:36', '2021-01-03 13:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `subcategory_id` bigint(20) DEFAULT NULL,
  `item_id` bigint(20) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sizes` text COLLATE utf8mb4_unicode_ci,
  `product_dimension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_colors` text COLLATE utf8mb4_unicode_ci,
  `product_summary` text COLLATE utf8mb4_unicode_ci,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_images` text COLLATE utf8mb4_unicode_ci,
  `product_material` text COLLATE utf8mb4_unicode_ci,
  `product_care` text COLLATE utf8mb4_unicode_ci,
  `product_video` text COLLATE utf8mb4_unicode_ci,
  `external_link` text COLLATE utf8mb4_unicode_ci,
  `product_price` double DEFAULT NULL,
  `promotional_price` double DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `barcode_info` text COLLATE utf8mb4_unicode_ci,
  `product_attribute` enum('new-arrival','featured','top-sale') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `create_time` time DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `modify_time` time DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `modified_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `subcategory_id`, `item_id`, `product_name`, `url_slug`, `product_sizes`, `product_dimension`, `product_unit`, `product_barcode`, `product_colors`, `product_summary`, `product_image`, `additional_images`, `product_material`, `product_care`, `product_video`, `external_link`, `product_price`, `promotional_price`, `product_description`, `barcode_info`, `product_attribute`, `discount`, `product_status`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(11, 1, 13, 28, 'Storage Spice Jar-Big', 'storage-spice-jar-big', '[\"Big\"]', '12X12X17', NULL, NULL, '[\"yellow\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603095830.jpg', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:23:50', '2020-10-19', 6, '08:24:24', '2020-10-19', 6),
(12, 1, 13, 28, 'Lily Store Container 20L -Trans', 'lily-store-container-20l-trans', '[\"\"]', '35X35X35', '20L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603096232.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:30:32', '2020-10-19', 6, NULL, NULL, NULL),
(13, 1, 13, 28, 'Container-Storage-Trans-7L', 'container-storage-trans-7l', '[\"7L\"]', NULL, '21X21X24', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603096381.jpg', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:33:01', '2020-10-19', 6, NULL, NULL, NULL),
(14, 1, 13, 28, 'Container-Storage-Trans-10L', 'container-storage-trans-10l', '[\"10L\"]', '24X24X27', '10L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603096527.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:35:27', '2020-10-19', 6, NULL, NULL, NULL),
(15, 1, 13, 28, 'Container - Multi Purpose-  5L - Printed', 'container-multi-purpose-5l-printed', '[\"5L\"]', '20.8X20.8X23', '5L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603096670.jpg', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:37:50', '2020-10-19', 6, NULL, NULL, NULL),
(16, 1, 13, 28, 'Container - Multi Purpose - 10L Printed', 'container-multi-purpose-10l-printed', '[\"10L\"]', '26.5X26.5X29', '10L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603096744.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:39:04', '2020-10-19', 6, NULL, NULL, NULL),
(17, 1, 13, 28, 'Container - Multi Purpose - 15L Printed', 'container-multi-purpose-15l-printed', '[\"15L\"]', '29.5X29.5X32', '15L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603096852.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:40:52', '2020-10-19', 6, NULL, NULL, NULL),
(18, 1, 13, 28, 'Cherry Cont. 3 Pcs Set (3300, 2350, 1400 ML)-Trans', 'cherry-cont-3-pcs-set-3300-2350-1400-ml-trans', '[\"3300ML\",\" 2350ML\",\" 1400 ML\"]', '16X16X19.5', 'L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603097307.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:48:27', '2020-10-19', 6, NULL, NULL, NULL),
(19, 1, 13, 28, 'Tulip Container 12L', 'tulip-container-12l', '[\"12L\"]', '26.5X26.5X28', '12L', NULL, '[\"\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603097384.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:49:44', '2020-10-19', 6, NULL, NULL, NULL),
(20, 1, 13, 28, 'Family RO Storage Cont-3 Pcs Set', 'family-ro-storage-cont-3-pcs-set', '[\"3 Pcs Set\"]', '23X23X23.4', NULL, NULL, '[\"\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603097409.jpg', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '08:50:09', '2020-10-19', 6, '09:16:51', '2020-10-19', 6),
(21, 1, 13, 28, 'Diamond Cont 3L-Trans', 'diamond-cont-3l-trans', '[\"3L\"]', '17.5X15X20.5', 'L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603099832.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '09:30:32', '2020-10-19', 6, NULL, NULL, NULL),
(22, 1, 13, 26, 'Aqua Food Lock Cont. Rtg 850 ML', 'aqua-food-lock-cont-rtg-850-ml', '[\"850 ML\"]', '17.5X11.9X8.3', 'L', NULL, '[\"\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603102146.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:09:06', '2020-10-19', 6, NULL, NULL, NULL),
(23, 1, 13, 26, 'Fresco Ro. Cont. (700, 1180 & 2250 ML) - 3 Pcs Set', 'fresco-ro-cont-700-1180-2250-ml-3-pcs-set', '[\"700ML\",\" 1180ML\",\" 2250 ML\"]', '23.5X23.5X9.5', 'L', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603102280.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:11:21', '2020-10-19', 6, NULL, NULL, NULL),
(24, 1, 40, 41, 'Mini Bowl 1500 ML - Red', 'mini-bowl-1500-ml-red', '[\"\"]', '20X20X9', '1500 ML', NULL, '[\"Red\"]', 'Item Code: 86353\r\nCapacity: 1500 ML\r\nDimension: 20X20X9\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice, Vegetable etc.', '1603102332.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 86353<br />Capacity: 1500 ML<br />Dimension: 20X20X9<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice, Vegetable etc.</p>', NULL, 'new-arrival', NULL, 'active', '10:12:12', '2020-10-19', 6, NULL, NULL, NULL),
(25, 1, 40, 41, 'Smart Diamond Two Color Bowl-1300 ML', 'smart-diamond-two-color-bowl-1300-ml', '[\"\"]', '17X17X9.5', '1300 ML', NULL, '[\"Yellow\",\" White\"]', 'Item Code: 839764\r\nCapacity: 1300 ML\r\nDimension: 17X17X9.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice, Vegetable etc.', '1603102672.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 839764<br />Capacity: 1300 ML<br />Dimension: 17X17X9.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice, Vegetable etc.</p>', NULL, 'new-arrival', NULL, 'active', '10:17:52', '2020-10-19', 6, NULL, NULL, NULL),
(26, 1, 13, 26, 'Keep Better Box 3 Pcs Set - Pearl Pink', 'keep-better-box-3-pcs-set-pearl-pink', '[\"3 Pcs Set\"]', '20.5X19.5X10.2', NULL, NULL, '[\"pearl\",\" pink\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603102760.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:19:20', '2020-10-19', 6, NULL, NULL, NULL),
(27, 1, 13, 26, 'Tiny Rtg Cont.-1000Ml - Tr Blue', 'tiny-rtg-cont-1000ml-tr-blue', '[\"1000Ml\"]', NULL, '1000Ml', NULL, '[\"Transparent\",\" blue\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603102926.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:22:06', '2020-10-19', 6, NULL, NULL, NULL),
(28, 1, 40, 41, 'Two Color Sunflower Bowl 1.1L', 'two-color-sunflower-bowl-1-1l', '[\"\"]', '18x18x7.5', '1.1 L', NULL, '[\"Red\",\" White\"]', 'Item Code: 839878\r\nCapacity: 1.1 L\r\nDimension: 18x18x7.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice, Vegetable etc.', '1603102930.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 839878<br />Capacity: 1.1 L<br />Dimension: 18x18x7.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice, Vegetable etc.</p>', NULL, 'new-arrival', NULL, 'active', '10:22:10', '2020-10-19', 6, NULL, NULL, NULL),
(29, 1, 13, 26, 'Tiny RTG Container 750ml- Tr. Blue', 'tiny-rtg-container-750ml-tr-blue', '[\"\"]', '17.5X12X5.5', '750ml', NULL, '[\"Transparent\",\" blue\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603103051.jpg', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:24:11', '2020-10-19', 6, NULL, NULL, NULL),
(30, 1, 13, 26, 'Tiny RTG Container 500 ML', 'tiny-rtg-container-500-ml', '[\"\"]', '17.5X12X4', '500ml', NULL, '[\"Transparent\",\" blue\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603103310.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:28:30', '2020-10-19', 6, NULL, NULL, NULL),
(31, 1, 13, 26, 'Container - Fresco Mini Square-Trans-100ml', 'container-fresco-mini-square-trans-100ml', '[\"\"]', '7.5X7X4.5', '100ml', NULL, '[\"Transparent\",\" red\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603103461.JPG', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:31:01', '2020-10-19', 6, NULL, NULL, NULL),
(32, 1, 13, 26, 'Smile Rtg High Cont. 950 ML With Egg Storage', 'smile-rtg-high-cont-950-ml-with-egg-storage', '[\"950ml\"]', '23X16.6X6', '950ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603103819.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:36:59', '2020-10-19', 6, NULL, NULL, NULL),
(33, 1, 13, 26, 'Pure Rtg Container 8000 ML', 'pure-rtg-container-8000-ml', '[\"8000ml\"]', '36.3X24.5X12.5', '8000ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104094.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:41:34', '2020-10-19', 6, NULL, NULL, NULL),
(34, 1, 13, 26, 'Ruti Box RO. Medium- Trans', 'ruti-box-ro-medium-trans', '[\"Medium\"]', '22.5x22.5x6', 'Medium', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104172.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:42:52', '2020-10-19', 6, NULL, NULL, NULL),
(35, 1, 40, 41, 'Smart Fruit Basket Small- Assorted', 'smart-fruit-basket-small-assorted', '[\"\"]', '20.5x20.5x8.2', NULL, NULL, '[\"\"]', 'Item Code: 891056\r\nCapacity: \r\nDimension: 20.5x20.5x8.2\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104304.jpg', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '<p>Item Code: 891056<br />Capacity: <br />Dimension: 20.5x20.5x8.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '10:45:04', '2020-10-19', 6, NULL, NULL, NULL),
(36, 1, 13, 26, 'Aqua Food Lock Cont. RO- 530 ML-Trans', 'aqua-food-lock-cont-ro-530-ml-trans', '[\"530ml\"]', '11.5X11.5X9.5', '530ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104318.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:45:18', '2020-10-19', 6, NULL, NULL, NULL),
(37, 1, 13, 26, 'Aqua Food Lock Cont RTG-200 ML-Trans', 'aqua-food-lock-cont-rtg-200-ml-trans', '[\"200ml\"]', '11.7X8.8X4.5', '200ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104393.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:46:33', '2020-10-19', 6, NULL, NULL, NULL),
(38, 1, 13, 26, 'Trim Container RTG-600 ML-Tr', 'trim-container-rtg-600-ml-tr', '[\"600ml\"]', '13.5X10X7', '600ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104568.JPG', '[]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, NULL, NULL, 'new-arrival', NULL, 'active', '10:49:28', '2020-10-19', 6, NULL, NULL, NULL),
(39, 1, 13, 26, 'Monia Lock  Cont. Sq 1300 ML-Trans', 'monia-lock-cont-sq-1300-ml-trans', '[\"1300ml\"]', '15.5X15.5X9', '1300ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104668.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:51:08', '2020-10-19', 6, NULL, NULL, NULL),
(40, 1, 13, 26, 'Monia Lock Cont Sq 925 ML - Trans', 'monia-lock-cont-sq-925-ml-trans', '[\"925ml\"]', '13.5X13.5X9', '925ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104738.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:52:18', '2020-10-19', 6, NULL, NULL, NULL),
(41, 1, 40, 41, 'Spiral Bowl Medium-Assorted', 'spiral-bowl-medium-assorted', '[\"\"]', '17X17X8', NULL, NULL, '[\"\"]', 'Item Code: 917027\r\nCapacity: \r\nDimension: 17X17X8\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104775.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 917027<br />Capacity: <br />Dimension: 17X17X8<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '10:52:55', '2020-10-19', 6, NULL, NULL, NULL),
(42, 1, 13, 26, 'Monia Lock Cont Sq 600 ML - Trans', 'monia-lock-cont-sq-600-ml-trans', '[\"600ml\"]', '13.5X13.5X6.2', '600ml', NULL, '[\"\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603104803.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:53:23', '2020-10-19', 6, NULL, NULL, NULL),
(43, 1, 13, 26, 'Monia Lock  Cont. Ro 600 ML-Trans', 'monia-lock-cont-ro-600-ml-trans', '[\"600ml\"]', '14X14X7', '600ml', NULL, '[\"\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105053.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '10:57:33', '2020-10-19', 6, NULL, NULL, NULL),
(44, 1, 13, 26, 'Monia Lock Cont Ro Low 300 ML - Trans', 'monia-lock-cont-ro-low-300-ml-trans', '[\"300ml\"]', '11.5X11.5X5.7', '300ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105352.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:02:32', '2020-10-19', 6, NULL, NULL, NULL),
(45, 1, 40, 42, 'Modern Pen Holder - Light Pink', 'modern-pen-holder-light-pink', '[\"\"]', '14X10X8.5', NULL, NULL, '[\"Light Pink\"]', 'Item Code: 923180\r\nCapacity: \r\nDimension: 14X10X8.5\r\nFeatures:\r\n\r\n1.	Healthy and Safe\r\n2.	Color and Sizes are Available\r\n3.	Easy to Clean\r\n4.	Eco-friendly', '1603105397.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 923180<br />Capacity: <br />Dimension: 14X10X8.5<br />Features:</p>\r\n<p>1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:03:17', '2020-10-19', 6, NULL, NULL, NULL),
(46, 1, 13, 26, 'Monia Lock Cont Rtg 2800 ML With Box - Trans', 'monia-lock-cont-rtg-2800-ml-with-box-trans', '[\"2800ml\"]', '25X18X9.4', '2800ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105481.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:04:41', '2020-10-19', 6, NULL, NULL, NULL),
(47, 1, 13, 26, 'Monia Lock  Cont. Rtg 1450 ML-Trans', 'monia-lock-cont-rtg-1450-ml-trans', '[\"1450ml\"]', '20.5X13.5X8.5', '1450ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105621.jpg', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:07:01', '2020-10-19', 6, NULL, NULL, NULL),
(48, 1, 40, 42, 'Modern Pen Holder - Light Blue', 'modern-pen-holder-light-blue', '[\"\"]', '14X10X8.5', NULL, NULL, '[\"Light Blue\"]', 'Item Code: 923181\r\nCapacity: \r\nDimension: 14X10X8.5\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603105629.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 923181<br />Capacity: <br />Dimension: 14X10X8.5<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:07:09', '2020-10-19', 6, NULL, NULL, NULL),
(49, 1, 13, 26, 'Monia Lock  Cont. Rtg 450 ML-Trans', 'monia-lock-cont-rtg-450-ml-trans', '[\"450ml\"]', '13.5X10.2X6.7', '450ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105708.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:08:28', '2020-10-19', 6, NULL, NULL, NULL),
(50, 1, 13, 26, 'Monia Lock Cont. Rtg 350 ML With Box-Trans', 'monia-lock-cont-rtg-350-ml-with-box-trans', '[\"350ml\"]', '13.5X10.2X5.3', '350ml', NULL, '[\"Transparent\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105783.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:09:43', '2020-10-19', 6, NULL, NULL, NULL),
(51, 1, 40, 42, 'Stand-Pencil-Pink', 'stand-pencil-pink', '[\"\"]', '9X9X11', NULL, NULL, '[\"Pink\"]', 'Item Code: 86896\r\nDimension: 9X9X11\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603105827.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 86896<br />Dimension: 9X9X11<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:10:27', '2020-10-19', 6, NULL, NULL, NULL),
(52, 1, 13, 26, 'Monia Lock  Cont. Rtg 200 ML-Trans', 'monia-lock-cont-rtg-200-ml-trans', '[\"200ml\"]', '11X9X4.8', '200ml', NULL, '[\"\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105838.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:10:38', '2020-10-19', 6, NULL, NULL, NULL),
(53, 1, 13, 26, 'Mina Container Small-White & Red', 'mina-container-small-white-red', '[\"Small\"]', '16.7X16X9', 'Small', NULL, '[\"white\",\" red\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603105934.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:12:14', '2020-10-19', 6, NULL, NULL, NULL),
(54, 1, 40, 43, 'Tulip Glass Stand-Light Pink', 'tulip-glass-stand-light-pink', '[\"\"]', '38.7X20X15', NULL, NULL, '[\"Light Pink\"]', 'Item Code: 76794\r\nDimension: 38.7X20X15\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603106030.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 76794<br />Dimension: 38.7X20X15<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:13:50', '2020-10-19', 6, NULL, NULL, NULL),
(55, 1, 13, 26, 'Mina Container Big-White & Tr Orange', 'mina-container-big-white-tr-orange', '[\"Big\"]', '19.5X18.5X10.5', 'Big', NULL, '[\"white\",\" transparent\",\" orange\"]', '1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603106032.jpg', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<ol>\r\n<li>100% Food Grade</li>\r\n<li>Healthy and Safe</li>\r\n<li>Color and Sizes are Available</li>\r\n<li>Easy to Clean</li>\r\n<li>Eco-friendly</li>\r\n<li>Applicable for Storage of Food, Spice etc.</li>\r\n</ol>', NULL, 'new-arrival', NULL, 'active', '11:13:52', '2020-10-19', 6, '11:14:27', '2020-10-19', 6),
(56, 1, 40, 43, 'Sunflower Glass Stand-Red', 'sunflower-glass-stand-red', '[\"\"]', '30.5X16.5X17', NULL, NULL, '[\"Red\"]', NULL, '1603106147.jpg', '[]', 'Item Code: 923015\r\nDimension: 30.5X16.5X17\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, NULL, NULL, 'new-arrival', NULL, 'active', '11:15:47', '2020-10-19', 6, NULL, NULL, NULL),
(57, 1, 40, 44, 'Kids Coin Sever - Lime Green', 'kids-coin-sever-lime-green', '[\"\"]', '12x11x19', NULL, NULL, '[\"Green\"]', 'Item Code: 87977\r\nDimension: 12x11x19\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603106376.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 87977<br />Dimension: 12x11x19<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:19:36', '2020-10-19', 6, NULL, NULL, NULL),
(58, 1, 40, 44, 'Kids Coin Sever - SM Blue', 'kids-coin-sever-sm-blue', '[\"\"]', '12x11x19', NULL, NULL, '[\"Blue\"]', 'Item Code: 87978\r\nDimension: 12x11x19\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603106498.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 87978<br />Dimension: 12x11x19<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:21:38', '2020-10-19', 6, NULL, NULL, NULL),
(59, 1, 40, 44, 'Rehal -Red', 'rehal-red', '[\"\"]', '30.5X19.3X22', NULL, NULL, '[\"Red\"]', 'Item Code: 91465\r\nDimension: 30.5X19.3X22\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603106778.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 91465<br />Dimension: 30.5X19.3X22<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:26:18', '2020-10-19', 6, NULL, NULL, NULL),
(60, 1, 40, 44, 'Rehal -Green', 'rehal-green', '[\"\"]', '30.5X19.3X22', NULL, NULL, '[\"Green\"]', 'Item Code: 91466\r\nDimension: 30.5X19.3X22\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603106979.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 91466<br />Dimension: 30.5X19.3X22<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:29:39', '2020-10-19', 6, NULL, NULL, NULL),
(61, 1, 40, 44, 'Fruit Serving Tray - Pink', 'fruit-serving-tray-pink', '[\"\"]', '27.5x27.5x3.3', NULL, NULL, '[\"Pink\"]', 'Item Code: 95171\r\nDimension: 27.5x27.5x3.3\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603107076.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 95171<br />Dimension: 27.5x27.5x3.3<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:31:16', '2020-10-19', 6, NULL, NULL, NULL),
(62, 1, 40, 44, 'Fruit Serving Tray - Green', 'fruit-serving-tray-green', '[\"\"]', '27.5x27.5x3.3', NULL, NULL, '[\"Green\"]', 'Item Code: 95172\r\nDimension: 27.5x27.5x3.3\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603107168.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 95172<br />Dimension: 27.5x27.5x3.3<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:32:48', '2020-10-19', 6, NULL, NULL, NULL),
(63, 1, 40, 44, 'Lotus Salt Jar-Trans', 'lotus-salt-jar-trans', '[\"\"]', '8.3X8.3X11.5', NULL, NULL, '[\"Transparent\"]', 'Item Code: 881393\r\nDimension: 8.3X8.3X11.5\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603107303.jpg', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '<p>Item Code: 881393<br />Dimension: 8.3X8.3X11.5<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:35:03', '2020-10-19', 6, NULL, NULL, NULL),
(64, 1, 40, 44, 'Lotus Salt Jar-Tr.Pink', 'lotus-salt-jar-tr-pink', '[\"\"]', '8.3X8.3X11.5', NULL, NULL, '[\"Pink\"]', 'Item Code: 881394\r\nDimension: 8.3X8.3X11.5\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603107427.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 881394<br />Dimension: 8.3X8.3X11.5<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:37:07', '2020-10-19', 6, NULL, NULL, NULL),
(65, 1, 40, 44, 'Heavy Rehal-Red', 'heavy-rehal-red', '[\"\"]', '29X21X16.5', NULL, NULL, '[\"\"]', 'Item Code: 881437\r\nDimension: 29X21X16.5\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603107594.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, NULL, NULL, 'new-arrival', NULL, 'active', '11:39:54', '2020-10-19', 6, NULL, NULL, NULL),
(66, 1, 40, 44, 'Silicon Insulation Pad', 'silicon-insulation-pad', '[\"\"]', '21.8x16x0.5', NULL, NULL, '[\"Red\"]', 'Item Code: 891093\r\nDimension: 21.8x16x0.5\r\nFeatures:\r\n1. Healthy and Safe\r\n2. Color and Sizes are Available\r\n3. Easy to Clean\r\n4. Eco-friendly', '1603108484.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 891093<br />Dimension: 21.8x16x0.5<br />Features:<br />1. Healthy and Safe<br />2. Color and Sizes are Available<br />3. Easy to Clean<br />4. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '11:54:44', '2020-10-19', 6, NULL, NULL, NULL),
(67, 1, 39, 45, 'Super Jar 2L-Assorted', 'super-jar-2l-assorted', '[\"\"]', '13X13X21.4', '2 L', NULL, '[\"Red\",\" Blue\",\" Green\",\" Pink\",\" Purple\"]', 'Item Code: 925557\r\nCapacity: 2 L\r\nDimension: 13X13X21.4\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603165117.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 925557<br />Capacity: 2 L<br />Dimension: 13X13X21.4<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '03:38:37', '2020-10-20', 6, NULL, NULL, NULL),
(68, 1, 39, 45, 'Table Salt Jar 135 gm', 'table-salt-jar-135-gm', '[\"\"]', '7.9x4.5x4.5', '135 g', NULL, '[\"\"]', 'Item Code: 91009\r\nCapacity: 135 g\r\nDimension: 7.9x4.5x4.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603166174.jpg', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 91009<br />Capacity: 135 g<br />Dimension: 7.9x4.5x4.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '03:56:14', '2020-10-20', 6, '03:56:29', '2020-10-20', 6),
(69, 1, 39, 45, 'Ivory Oil Jar 1L', 'ivory-oil-jar-1l', '[\"\"]', '14X9.7X19', '1L', NULL, '[\"\"]', 'Item Code: 837544\r\nCapacity: 1 \r\nDimension: 14X9.7X19\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Oil, Spice etc.', '1603166442.jpg', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '<p>Item Code: 837544<br />Capacity: 1 <br />Dimension: 14X9.7X19<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Oil, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '04:00:42', '2020-10-20', 6, NULL, NULL, NULL),
(70, 1, 39, 45, 'Diamond Jar 2.5L-Assorted', 'diamond-jar-2-5l-assorted', '[\"\"]', '14X14X23.5', '2.5L', NULL, '[\"Red\",\" Blue\",\" Green\",\" Pink\",\" Purple\"]', 'Item Code: 838370\r\nCapacity: 2.5L\r\nDimension: 14X14X23.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603166611.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 838370<br />Capacity: 2.5L<br />Dimension: 14X14X23.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '04:03:31', '2020-10-20', 6, NULL, NULL, NULL),
(71, 1, 39, 45, 'Oval Oil Jar-Tr Blue', 'oval-oil-jar-tr-blue', '[\"\"]', '15.7X8.5X15.8', NULL, NULL, '[\"Blue\"]', 'Item Code: 881125\r\nDimension: 15.7X8.5X15.8\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Oil, Spice etc.', '1603166760.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 881125<br />Dimension: 15.7X8.5X15.8<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Oil, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '04:06:00', '2020-10-20', 6, NULL, NULL, NULL),
(72, 1, 39, 45, 'Lira Jar 160ml -Assorted', 'lira-jar-160ml-assorted', '[\"\"]', '5.7X5.7X10.2', '160ml', NULL, '[\"Red\",\" Blue\",\" Green\",\" Pink\",\" Purple\"]', 'Item Code: 923778\r\nCapacity: 160ml \r\nDimension: 5.7X5.7X10.2\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Oil, Spice etc.', '1603166918.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 923778<br />Capacity: 160ml <br />Dimension: 5.7X5.7X10.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Oil, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '04:08:38', '2020-10-20', 6, NULL, NULL, NULL),
(73, 1, 39, 45, 'Thai Jar 2L-Assorted', 'thai-jar-2l-assorted', '[\"\"]', '13X13X19', '2L', NULL, '[\"Red\",\" Blue\",\" Green\",\" Pink\",\" Purple\"]', 'Item Code: 925534\r\nCapacity: 2L\r\nDimension: 13X13X19\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Oil, Food, Spice etc.', '1603167146.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 925534<br />Capacity: 2L<br />Dimension: 13X13X19<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Oil, Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '04:12:26', '2020-10-20', 6, NULL, NULL, NULL),
(74, 1, 39, 45, 'Merina Jar 2L-Assorted', 'merina-jar-2l-assorted', '[\"\"]', '14X14X18.4', '2 L', NULL, '[\"Red\",\" Blue\",\" Green\",\" Pink\",\" Purple\"]', 'Item Code: 925560\r\nCapacity: 2l\r\nDimension: 14X14X18.4\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Oil, Food, Spice etc.', '1603167313.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 925560<br />Capacity: 2l<br />Dimension: 14X14X18.4<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Oil, Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '04:15:13', '2020-10-20', 6, NULL, NULL, NULL),
(75, 1, 39, 47, 'Kulfi Ice-Cream Maker-White', 'kulfi-ice-cream-maker-white', '[\"\"]', '18.6X10.7X7.2', NULL, NULL, '[\"White\"]', 'Item Code: 76810\r\nDimension: 18.6X10.7X7.2\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603170002.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 76810<br />Dimension: 18.6X10.7X7.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'new-arrival', NULL, 'active', '05:00:02', '2020-10-20', 6, NULL, NULL, NULL),
(76, 1, 39, 47, 'Daisy Ice Tray With Cover - Red', 'daisy-ice-tray-with-cover-red', '[\"\"]', '25.5X11.3X3.2', NULL, NULL, '[\"Red\"]', 'Item Code: 82449\r\nDimension: 25.5X11.3X3.2\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603170292.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 82449<br />Dimension: 25.5X11.3X3.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'new-arrival', NULL, 'active', '05:04:52', '2020-10-20', 6, NULL, NULL, NULL),
(77, 1, 39, 47, 'Lolly Ice Cream Maker-White', 'lolly-ice-cream-maker-white', '[\"\"]', '12.5X13.3X13.5', NULL, NULL, '[\"White\"]', 'Item Code: 839617\r\nDimension: 12.5X13.3X13.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603170601.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 839617<br />Dimension: 12.5X13.3X13.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'new-arrival', NULL, 'active', '05:10:01', '2020-10-20', 6, NULL, NULL, NULL),
(78, 1, 39, 47, 'Easy Ice-Cream Maker-Trans', 'easy-ice-cream-maker-trans', '[\"\"]', '12.2X11.2X12.5', NULL, NULL, '[\"Transparent\"]', 'Item Code: 880260\r\nDimension: 12.2X11.2X12.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603170814.jpg', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 880260<br />Dimension: 12.2X11.2X12.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '05:13:34', '2020-10-20', 6, '05:18:05', '2020-10-20', 6);
INSERT INTO `products` (`product_id`, `category_id`, `subcategory_id`, `item_id`, `product_name`, `url_slug`, `product_sizes`, `product_dimension`, `product_unit`, `product_barcode`, `product_colors`, `product_summary`, `product_image`, `additional_images`, `product_material`, `product_care`, `product_video`, `external_link`, `product_price`, `promotional_price`, `product_description`, `barcode_info`, `product_attribute`, `discount`, `product_status`, `create_time`, `create_date`, `created_by`, `modify_time`, `modify_date`, `modified_by`) VALUES
(79, 1, 39, 47, 'Daisy Ice Tray With Cover-Light Blue', 'daisy-ice-tray-with-cover-light-blue', '[\"\"]', '25.5X11.3X3.2', NULL, NULL, '[\"Blue\"]', 'Item Code: 915054\r\nDimension: 25.5X11.3X3.2\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Food, Spice etc.', '1603170970.jpg', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 915054<br />Dimension: 25.5X11.3X3.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Food, Spice etc.</p>', NULL, 'new-arrival', NULL, 'active', '05:16:10', '2020-10-20', 6, '05:17:28', '2020-10-20', 6),
(80, 1, 39, 48, 'Apple Spice Pot', 'apple-spice-pot', '[\"\"]', '29.2X10X10', 'Green', NULL, '[\"\"]', 'Item Code: 76856\r\nDimension: 29.2X10X10\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603171707.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 76856<br />Dimension: 29.2X10X10<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'new-arrival', NULL, 'active', '05:28:27', '2020-10-20', 6, NULL, NULL, NULL),
(81, 1, 39, 48, 'Pearl Spice Tray -Pink', 'pearl-spice-tray-pink', '[\"\"]', '29X29X112', NULL, NULL, '[\"Pink\"]', 'Item Code: 86844\r\nDimension: 29X29X112\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603171872.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 86844<br />Dimension: 29X29X112<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '05:31:12', '2020-10-20', 6, NULL, NULL, NULL),
(82, 1, 39, 48, 'Shulov Spice Tray- Royal Red', 'shulov-spice-tray-royal-red', '[\"\"]', '26.7X24.5X3.5', NULL, NULL, '[\"Red\"]', 'Item Code: 86861\r\nDimension: 26.7X24.5X3.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603172056.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 86861<br />Dimension: 26.7X24.5X3.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '05:34:17', '2020-10-20', 6, NULL, NULL, NULL),
(83, 1, 39, 48, 'Rtg. Spice Tray - Red', 'rtg-spice-tray-red', '[\"\"]', '29.5X12.3X7.7', NULL, NULL, '[\"Red\"]', 'Item Code: 95390\r\nDimension: 29.5X12.3X7.7\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603172221.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 95390<br />Dimension: 29.5X12.3X7.7<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '05:37:01', '2020-10-20', 6, NULL, NULL, NULL),
(84, 1, 39, 48, 'Pumpkin Spice Tray - Red', 'pumpkin-spice-tray-red', '[\"\"]', '16.7X16X9', NULL, NULL, '[\"Red\"]', 'Item Code: 914521\r\nDimension: 16.7X16X9\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603172327.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 914521<br />Dimension: 16.7X16X9<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'new-arrival', NULL, 'active', '05:38:47', '2020-10-20', 6, NULL, NULL, NULL),
(85, 1, 39, 48, 'Crown Spice Pot 3 Cup -Red', 'crown-spice-pot-3-cup-red', '[\"\"]', '28X11X10', NULL, NULL, '[\"Red\"]', 'Item Code: 917129\r\nDimension: 28X11X10\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603172443.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 917129<br />Dimension: 28X11X10<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>', NULL, 'new-arrival', NULL, 'active', '05:40:43', '2020-10-20', 6, NULL, NULL, NULL),
(86, 1, 39, 48, 'Sunflower Masala Box-Tr Green', 'sunflower-masala-box-tr-green', '[\"\"]', '26.7X24.7X7.6', NULL, NULL, '[\"Green\"]', 'Item Code: 923846\r\nDimension: 26.7X24.7X7.6\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603172575.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, NULL, NULL, 'new-arrival', NULL, 'active', '05:42:55', '2020-10-20', 6, NULL, NULL, NULL),
(87, 1, 39, 48, 'Sunflower Masala Box-Tr Blue', 'sunflower-masala-box-tr-blue', '[\"\"]', '26.7X24.7X7.6', NULL, NULL, '[\"Blue\"]', 'Item Code: 923845\r\nDimension: 26.7X24.7X7.6\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603172721.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 923845<br />Dimension: 26.7X24.7X7.6<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'new-arrival', NULL, 'active', '05:45:21', '2020-10-20', 6, NULL, NULL, NULL),
(88, 1, 39, 49, 'Royal Chopping Board-34CM-Assorted', 'royal-chopping-board-34cm-assorted', '[\"\"]', '34X24.2X0.5', '34CM', NULL, '[\"Red\",\" Blue\",\" Green\",\" Pink\",\" Purple\"]', 'Item Code: 838523\r\nCapacity: 34CM\r\nDimension: 34X24.2X0.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Cutting Vegetable, Meat etc.', '1603173474.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 838523<br />Capacity: 34CM<br />Dimension: 34X24.2X0.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Cutting Vegetable, Meat etc.</p>', NULL, 'new-arrival', NULL, 'active', '05:57:54', '2020-10-20', 6, NULL, NULL, NULL),
(89, 1, 39, 49, 'Prime Chopping Board 39 CM-Assorted', 'prime-chopping-board-39-cm-assorted', '[\"\"]', '39X23.5X2.5', '39 CM', NULL, '[\"Red\",\" Blue\",\" Green\",\" Pink\",\" Purple\"]', 'Item Code: 838591\r\nCapacity: 39 CM\r\nDimension: 39X23.5X2.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for vegetable, meat etc.', '1603173634.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 838591<br />Capacity: 39 CM<br />Dimension: 39X23.5X2.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for vegetable, meat etc.</p>', NULL, 'new-arrival', NULL, 'active', '06:00:34', '2020-10-20', 6, NULL, NULL, NULL),
(90, 1, 39, 49, 'Royal Chopping Board-34CM-White', 'royal-chopping-board-34cm-white', '[\"\"]', '34X24.2X0.5', NULL, NULL, '[\"White\"]', 'Item Code: 839870\r\nDimension: 34X24.2X0.5\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly\r\n6.	Applicable for Storage of Cutting Vegetable, Meat etc.', '1603175966.jpg', '[]', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 839870<br />Dimension: 34X24.2X0.5<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly<br />6. Applicable for Storage of Cutting Vegetable, Meat etc.</p>', NULL, 'new-arrival', NULL, 'active', '06:39:26', '2020-10-20', 6, NULL, NULL, NULL),
(91, 1, 39, 140, 'Dish Drainer-Folding-Red', 'dish-drainer-folding-red', '[\"\"]', '42X36X10.8', NULL, NULL, '[\"Red\"]', 'Item Code: 91531\r\nDimension: 42X36X10.8\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1603176407.jpg', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 91531<br />Dimension: 42X36X10.8<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'new-arrival', NULL, 'active', '06:46:47', '2020-10-20', 6, '11:57:10', '2020-12-31', 6),
(92, 1, 39, 50, 'Sauce Can - Trans', 'sauce-can-trans', '[\"\"]', '18.3X18.3', NULL, NULL, '[\"Transparent\"]', NULL, '1609416409.png', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', 'Item Code: 95073\r\nDimension: 18.3X18.3\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 95073<br />Dimension: 18.3X18.3<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'featured', NULL, 'active', '06:50:13', '2020-10-20', 6, '12:06:49', '2020-12-31', 7),
(93, 1, 39, 50, 'Funnel Big', 'funnel-big', '[\"\"]', '15.7X14X15.2', NULL, NULL, '[\"White\"]', 'Item Code: 881180\r\nDimension: 15.7X14X15.2\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1609416394.png', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', NULL, NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 881180<br />Dimension: 15.7X14X15.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', NULL, 'featured', NULL, 'active', '06:53:39', '2020-10-20', 6, '12:06:35', '2020-12-31', 7),
(94, 1, 103, 163, 'Caino Tray-Eagle Brown', 'caino-tray-eagle-brown', '[\"\"]', '42.5X31X5.2', NULL, NULL, '[\"Brown\"]', 'Item Code: 918260\r\nDimension: 42.5X31X5.2\r\nFeatures:\r\n1.	100% Food Grade\r\n2.	Healthy and Safe\r\n3.	Color and Sizes are Available\r\n4.	Easy to Clean\r\n5.	Eco-friendly', '1609416381.png', '{\"additional_image\":null,\"extra_image\":null,\"supplementary_image\":null,\"auxiliary_image\":null}', 'Item Code: 918260\r\nDimension: 42.5X31X5.2\r\nFeatures:\r\n1. 100% Food Grade\r\n2. Healthy and Safe\r\n3. Color and Sizes are Available\r\n4. Easy to Clean\r\n5. Eco-friendly', NULL, NULL, 'https://www.othoba.com/rfl-houseware', NULL, NULL, '<p>Item Code: 918260<br />Dimension: 42.5X31X5.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', '<p>Item Code: 918260<br />Dimension: 42.5X31X5.2<br />Features:<br />1. 100% Food Grade<br />2. Healthy and Safe<br />3. Color and Sizes are Available<br />4. Easy to Clean<br />5. Eco-friendly</p>\r\n<p>&nbsp;</p>', 'new-arrival', NULL, 'active', '06:55:38', '2020-10-20', 6, '06:50:01', '2021-01-03', 6),
(95, 2, 34, 97, 'Product By Arnov', 'product-by-arnov', '[\"\"]', NULL, NULL, NULL, '[\"\"]', NULL, '1609658586.jpg', '{\"additional_image\":\"additional_image_1609659904.jpg\",\"extra_image\":\"extra_image_1609679169.png\",\"supplementary_image\":\"supplementary_image_1609679169.jpg\",\"auxiliary_image\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'featured', NULL, 'active', '07:23:06', '2021-01-03', 6, '13:07:53', '2021-01-03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(160) DEFAULT NULL,
  `website_url` varchar(160) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `icon_class`, `website_url`, `created_at`, `updated_at`) VALUES
(2, 'fab fa-youtube', '#', '2020-09-02 01:18:25', '2020-09-02 01:18:25'),
(3, 'fab fa-linkedin-in', '#', '2020-09-02 01:18:46', '2020-09-02 01:18:46'),
(8, 'fab fa-facebook-f', 'https://www.facebook.com/', '2020-12-31 09:41:05', '2021-01-03 04:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `sticky_content_footer`
--

CREATE TABLE `sticky_content_footer` (
  `id` int(10) NOT NULL,
  `text` text NOT NULL,
  `status` enum('on') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sticky_content_footer`
--

INSERT INTO `sticky_content_footer` (`id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'consectetuer adipiscing elit. Aenean commodo ligula eget dolor', 'on', '2021-01-03 06:45:31', '2021-01-03 06:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 15, 'Dhamrai', '2018-11-15 04:25:10', '2018-11-15 04:25:10'),
(2, 15, 'Dhaka', '2018-11-15 04:25:45', '2018-11-15 04:25:45'),
(3, 15, 'Dohar', '2018-11-15 04:25:57', '2018-11-15 04:25:57'),
(4, 15, 'Keraniganj', '2018-11-15 04:26:37', '2018-11-15 04:26:37'),
(5, 15, 'Savar', '2018-11-15 04:26:51', '2018-11-15 04:26:51'),
(6, 15, 'Tejgaon Circle', '2018-11-15 04:27:03', '2018-11-15 04:27:03'),
(7, 14, 'Barura', '2018-11-15 04:27:33', '2018-11-15 04:27:33'),
(8, 14, 'Brahmanpara', '2018-11-15 04:27:44', '2018-11-15 04:27:44'),
(9, 14, 'Burichang', '2018-11-15 04:27:55', '2018-11-15 04:27:55'),
(10, 14, 'Chandina', '2018-11-15 04:28:05', '2018-11-15 04:28:05'),
(11, 14, 'Chauddagram', '2018-11-15 04:28:16', '2018-11-15 04:28:16'),
(12, 14, 'Cumilla Adarsha Sadar', '2018-11-15 04:28:26', '2018-11-15 04:28:26'),
(13, 14, 'Cumilla Sadar Dakshin', '2018-11-15 04:28:39', '2018-11-15 04:28:39'),
(14, 14, 'Daudkandi', '2018-11-15 04:28:49', '2018-11-15 04:28:49'),
(15, 14, 'Debidwar', '2018-11-15 04:28:59', '2018-11-15 04:28:59'),
(16, 14, 'Homna', '2018-11-15 04:29:22', '2018-11-15 04:29:22'),
(18, 14, 'Laksam', '2018-11-15 04:30:00', '2020-05-13 00:32:59'),
(19, 14, 'Meghna', '2018-11-15 04:30:44', '2018-11-15 04:30:44'),
(20, 14, 'Monohargonj', '2018-11-15 04:30:57', '2018-11-15 04:30:57'),
(21, 14, 'Muradnagar', '2018-11-15 04:31:07', '2018-11-15 04:31:07'),
(22, 14, 'Nangalkot', '2018-11-15 04:31:24', '2018-11-15 04:31:24'),
(23, 14, 'Titas', '2018-11-15 04:31:35', '2018-11-15 04:31:35'),
(24, 18, 'Chhagalnaiya', '2018-11-15 04:31:49', '2018-11-15 04:31:49'),
(25, 18, 'Daganbhuiyan', '2018-11-15 04:32:00', '2018-11-15 04:32:00'),
(26, 18, 'Feni Sadar', '2018-11-15 04:32:11', '2018-11-15 04:32:11'),
(27, 18, 'Fulgazi', '2018-11-15 04:32:21', '2018-11-15 04:32:21'),
(28, 18, 'Parshuram', '2018-11-15 04:32:31', '2018-11-15 04:32:31'),
(29, 18, 'Sonagazi', '2018-11-15 04:32:40', '2018-11-15 04:32:40'),
(30, 45, 'Belabo', '2019-01-05 04:05:12', '2019-01-05 04:05:12'),
(31, 45, 'Monohardi', '2019-01-05 04:05:33', '2019-01-05 04:05:33'),
(32, 45, 'Narsingdi Sadar', '2019-01-05 04:05:56', '2019-01-05 04:05:56'),
(33, 45, 'Palash', '2019-01-05 04:06:09', '2019-01-05 04:06:09'),
(34, 45, 'Raipura', '2019-01-05 04:06:27', '2019-01-05 04:06:27'),
(35, 45, 'Shibpur', '2019-01-05 04:06:40', '2019-01-05 04:06:40'),
(36, 63, 'Amkuna', '2019-01-05 04:33:03', '2019-01-05 04:33:03'),
(37, 63, 'Balaganj', '2019-01-05 04:33:46', '2019-01-05 04:33:46'),
(38, 63, 'Beanibazar', '2019-01-05 04:34:16', '2019-01-05 04:34:16'),
(39, 63, 'Bishwanath', '2019-01-05 04:34:35', '2019-01-05 04:34:35'),
(40, 63, 'Companiganj', '2019-01-05 04:34:54', '2019-01-05 04:34:54'),
(41, 63, 'Dakshin Surma', '2019-01-05 04:35:14', '2019-01-05 04:35:14'),
(42, 63, 'Fenchuganj', '2019-01-05 04:35:34', '2019-01-05 04:35:34'),
(43, 63, 'Golapganj', '2019-01-05 04:35:49', '2019-01-05 04:35:49'),
(44, 63, 'Gowainghat', '2019-01-05 04:36:06', '2019-01-05 04:36:06'),
(45, 63, 'Jaintiapur', '2019-01-05 04:36:20', '2019-01-05 04:36:20'),
(46, 63, 'Kanaighat', '2019-01-05 04:36:45', '2019-01-05 04:36:45'),
(47, 63, 'Osmani Nagar', '2019-01-05 04:36:57', '2019-01-05 04:36:57'),
(48, 63, 'Sylhet Sadar', '2019-01-05 04:37:11', '2019-01-05 04:37:11'),
(49, 63, 'Zakiganj', '2019-01-05 04:37:40', '2019-01-05 04:37:40'),
(50, 11, 'Chittagong Sadar', '2020-07-25 21:18:32', '2020-07-25 21:18:32');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'admin@rfl.com', NULL, '$2y$10$ENqkZfB0.iHmqFWOXZoKIOhA4PEgOfIYSUZ5vFBnlCz.Bt60OSrtu', 'Gd74Q6iJTQbRjkzuKQuvax1yrL6avWPA7fPoOKItaKQV3JvQmfE8GNxHa9xI', '2020-04-02 04:33:32', NULL),
(7, 'Md Sariful Islam', 'sharifulsajib2@gmail.com', NULL, '$2y$10$.6hfn6EBzMNlZDdeuzteSOKE6j/QXdu1WZtsy.UgO7aPLbR/XTNWi', NULL, '2020-12-31 09:53:13', '2021-01-03 06:57:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `contact_mail`
--
ALTER TABLE `contact_mail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `content_relations`
--
ALTER TABLE `content_relations`
  ADD PRIMARY KEY (`relation_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`) USING BTREE;

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_slider`
--
ALTER TABLE `featured_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_configurations`
--
ALTER TABLE `image_configurations`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`storelocator_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `page_attribute`
--
ALTER TABLE `page_attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `popup_image`
--
ALTER TABLE `popup_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sticky_content_footer`
--
ALTER TABLE `sticky_content_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `config_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_mail`
--
ALTER TABLE `contact_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `content_relations`
--
ALTER TABLE `content_relations`
  MODIFY `relation_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `featured_slider`
--
ALTER TABLE `featured_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `image_configurations`
--
ALTER TABLE `image_configurations`
  MODIFY `image_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `storelocator_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsletter_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` bigint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `page_attribute`
--
ALTER TABLE `page_attribute`
  MODIFY `attribute_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `popup_image`
--
ALTER TABLE `popup_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sticky_content_footer`
--
ALTER TABLE `sticky_content_footer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;