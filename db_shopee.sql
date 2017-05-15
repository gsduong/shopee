-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2017 at 11:17 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `root` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `root`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$zEeSBpMpX1/iiOz4pnDfW.8Dz28SwiUIFi.QBb7n0ytjcWg4CyLsS', 1, '2017-05-14 20:51:26', '2017-05-14 20:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Lamer', 'lamer', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(2, 'Thời trang Ivinci', 'thoi-trang-ivinci', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(3, 'Ceci cela', 'ceci-cela', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(4, 'ZARA', 'zara', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(5, 'H&M', 'h-m', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(6, 'Bersha Fashion', 'bersha-fashion', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(7, 'Forever 21', 'forever-21', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(8, 'Thời trang May10', 'thoi-trang-may10', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(9, 'Sexy Forever', 'sexy-forever', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(10, 'Victoria Secret', 'victoria-secret', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(11, 'Uniqlo', 'uniqlo', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(12, 'Topshop', 'topshop', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(13, 'Momoco', 'momoco', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(14, 'Others', 'others', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(15, 'Mango', 'mango', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(16, 'Thời trang xuất khẩu', 'thoi-trang-xuat-khau', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(17, 'CANARY FASHION', 'canary-fashion', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(18, 'Dolce & Gabbana', 'dolce-gabbana', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(19, 'Versace', 'versace', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(20, 'Louis Vuitton', 'louis-vuitton', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(21, 'Bottega Veneta', 'bottega-veneta', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(22, 'Gucci', 'gucci', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(23, 'Thời trang Canifa', 'thoi-trang-canifa', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(24, 'Thương hiệu thời trang tổng hợp', 'thuong-hieu-thoi-trang-tong-hop', '2017-05-14 20:51:26', '2017-05-14 20:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_description` longtext COLLATE utf8_unicode_ci,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `slug`, `catalog_description`, `parent_id`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang nam', 'thoi-trang-nam', NULL, NULL, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(2, 'Thời trang nữ', 'thoi-trang-nu', NULL, NULL, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(3, 'Thời trang đôi', 'thoi-trang-doi', NULL, NULL, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(4, 'Thời trang cho bé', 'thoi-trang-cho-be', NULL, NULL, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(5, 'Thời trang tổng hợp', 'thoi-trang-tong-hop', NULL, NULL, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(6, 'Đầm nữ', 'dam-nu', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(7, 'Áo khoác nữ', 'ao-khoac-nu', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(8, 'Áo thun nữ', 'ao-thun-nu', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(9, 'Quần nữ', 'quan-nu', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(10, 'Chân váy', 'chan-vay', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(11, 'Quần Short Nữ', 'quan-short-nu', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(12, 'Đồ lót & Đồ ngủ', 'do-lot-do-ngu', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(13, 'Đầm bầu', 'dam-bau', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(14, 'Đồ bơi nữ', 'do-boi-nu', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(15, 'Thắt lưng', 'that-lung', NULL, 2, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(16, 'Áo khoác nam', 'ao-khoac-nam', NULL, 1, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(17, 'Áo thun nam', 'ao-thun-nam', NULL, 1, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(18, 'Áo Cardigan nam', 'ao-cardigan-nam', NULL, 1, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(19, 'Áo sơ mi', 'ao-so-mi', NULL, 1, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(20, 'Áo len', 'ao-len', NULL, 1, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(21, 'Quần nam', 'quan-nam', NULL, 1, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(22, 'Cà vạt & nơ bướm', 'ca-vat-no-buom', NULL, 1, 0, '2017-05-14 20:51:26', '2017-05-14 20:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `color_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hexa_code` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `hexa_code`, `created_at`, `updated_at`) VALUES
(1, 'black', '#000000', '2017-05-14 20:51:25', '2017-05-14 20:51:25'),
(2, 'blue', '#0000FF', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(3, 'brown', '#A52A2A', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(4, 'gray', '#808080', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(5, 'green', '#008000', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(6, 'orange', '#FFA500', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(7, 'pink', '#FFC0CB', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(8, 'purple', '#800080', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(9, 'red', '#FF0000', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(10, 'white', '#FFFFFF', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(11, 'yellow', '#FFFF00', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(12, 'tổng hợp', '#000000', '2017-05-14 20:51:26', '2017-05-14 20:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_09_074150_create_colors_table', 1),
('2017_05_09_080231_create_sizes_table', 1),
('2017_05_09_081028_create_admins_table', 1),
('2017_05_09_082102_create_catalogs_table', 1),
('2017_05_09_100914_create_brands_table', 1),
('2017_05_09_104720_create_products_table', 1),
('2017_05_10_095125_create_stocks_table', 1),
('2017_05_10_121331_create_orders_table', 1),
('2017_05_10_123712_create_order_product_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `order_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `buyer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `payment_response_info` longtext COLLATE utf8_unicode_ci NOT NULL,
  `security` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `order_code`, `user_id`, `buyer_name`, `buyer_email`, `buyer_phone`, `buyer_address`, `buyer_message`, `amount`, `payment_response_info`, `security`, `created_at`, `updated_at`) VALUES
(1, 2, '09759111791494876233', NULL, 'Nguyen Duong', 'nguyenduong.ict.hust@gmail.com', '0975911179', 'Hanoi', 'Ship to my town', 90000, '', '', '2017-05-15 12:23:53', '2017-05-15 13:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `size_id`, `color_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 90000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catalog_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `made_in` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regular_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `image_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_catalog` longtext COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `catalog_id`, `slug`, `brand_id`, `made_in`, `material`, `regular_price`, `sale_price`, `discount`, `counter`, `view`, `image_link`, `product_description`, `image_catalog`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shirt No 1', 'TA33KK', 2, 'shirt-no-1', 6, 'China', 'cotton', 100000, 90000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-15 10:55:10'),
(2, 'Shirt No 2', NULL, 3, 'shirt-no-2', 3, 'China', 'cotton', 200000, 180000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(3, 'Shirt No 3', NULL, 4, 'shirt-no-3', 4, 'China', 'cotton', 300000, 270000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(4, 'Shirt No 4', NULL, 5, 'shirt-no-4', 5, 'China', 'cotton', 400000, 360000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(5, 'Shirt No 5', NULL, 6, 'shirt-no-5', 6, 'China', 'cotton', 500000, 450000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(6, 'Shirt No 6', NULL, 7, 'shirt-no-6', 7, 'China', 'cotton', 600000, 540000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(7, 'Shirt No 7', NULL, 8, 'shirt-no-7', 8, 'China', 'cotton', 700000, 630000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(8, 'Shirt No 8', NULL, 9, 'shirt-no-8', 9, 'China', 'cotton', 800000, 720000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(9, 'Shirt No 9', NULL, 10, 'shirt-no-9', 10, 'China', 'cotton', 900000, 810000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(10, 'Shirt No 10', NULL, 11, 'shirt-no-10', 11, 'China', 'cotton', 1000000, 900000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(11, 'Shirt No 11', NULL, 12, 'shirt-no-11', 12, 'China', 'cotton', 1100000, 990000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(12, 'Shirt No 12', NULL, 13, 'shirt-no-12', 13, 'China', 'cotton', 1200000, 1080000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(13, 'Shirt No 13', NULL, 14, 'shirt-no-13', 14, 'China', 'cotton', 1300000, 1170000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(14, 'Shirt No 14', NULL, 15, 'shirt-no-14', 15, 'China', 'cotton', 1400000, 1260000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(15, 'Shirt No 15', NULL, 16, 'shirt-no-15', 16, 'China', 'cotton', 1500000, 1350000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(16, 'Shirt No 16', NULL, 17, 'shirt-no-16', 17, 'China', 'cotton', 1600000, 1440000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(17, 'Shirt No 17', NULL, 18, 'shirt-no-17', 18, 'China', 'cotton', 1700000, 1530000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(18, 'Shirt No 18', NULL, 1, 'shirt-no-18', 19, 'China', 'cotton', 1800000, 1620000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(19, 'Shirt No 19', NULL, 2, 'shirt-no-19', 20, 'China', 'cotton', 1900000, 1710000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(20, 'Shirt No 20', NULL, 3, 'shirt-no-20', 21, 'China', 'cotton', 2000000, 1800000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(21, 'Shirt No 21', NULL, 4, 'shirt-no-21', 22, 'China', 'cotton', 2100000, 1890000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(22, 'Shirt No 22', NULL, 5, 'shirt-no-22', 1, 'China', 'cotton', 2200000, 1980000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(23, 'Shirt No 23', NULL, 6, 'shirt-no-23', 2, 'China', 'cotton', 2300000, 2070000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(24, 'Shirt No 24', NULL, 7, 'shirt-no-24', 3, 'China', 'cotton', 2400000, 2160000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(25, 'Shirt No 25', NULL, 8, 'shirt-no-25', 4, 'China', 'cotton', 2500000, 2250000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(26, 'Shirt No 26', NULL, 9, 'shirt-no-26', 5, 'China', 'cotton', 2600000, 2340000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(27, 'Shirt No 27', NULL, 10, 'shirt-no-27', 6, 'China', 'cotton', 2700000, 2430000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(28, 'Shirt No 28', NULL, 11, 'shirt-no-28', 7, 'China', 'cotton', 2800000, 2520000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(29, 'Shirt No 29', NULL, 12, 'shirt-no-29', 8, 'China', 'cotton', 2900000, 2610000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(30, 'Shirt No 30', NULL, 13, 'shirt-no-30', 9, 'China', 'cotton', 3000000, 2700000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(31, 'Shirt No 31', NULL, 14, 'shirt-no-31', 10, 'China', 'cotton', 3100000, 2790000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(32, 'Shirt No 32', NULL, 15, 'shirt-no-32', 11, 'China', 'cotton', 3200000, 2880000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(33, 'Shirt No 33', NULL, 16, 'shirt-no-33', 12, 'China', 'cotton', 3300000, 2970000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(34, 'Shirt No 34', NULL, 17, 'shirt-no-34', 13, 'China', 'cotton', 3400000, 3060000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(35, 'Shirt No 35', NULL, 18, 'shirt-no-35', 14, 'China', 'cotton', 3500000, 3150000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(36, 'Shirt No 36', NULL, 1, 'shirt-no-36', 15, 'China', 'cotton', 3600000, 3240000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(37, 'Shirt No 37', NULL, 2, 'shirt-no-37', 16, 'China', 'cotton', 3700000, 3330000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(38, 'Shirt No 38', NULL, 3, 'shirt-no-38', 17, 'China', 'cotton', 3800000, 3420000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(39, 'Shirt No 39', NULL, 4, 'shirt-no-39', 18, 'China', 'cotton', 3900000, 3510000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(40, 'Shirt No 40', NULL, 5, 'shirt-no-40', 19, 'China', 'cotton', 4000000, 3600000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(41, 'Shirt No 41', NULL, 6, 'shirt-no-41', 20, 'China', 'cotton', 4100000, 3690000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(42, 'Shirt No 42', NULL, 7, 'shirt-no-42', 21, 'China', 'cotton', 4200000, 3780000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(43, 'Shirt No 43', NULL, 8, 'shirt-no-43', 22, 'China', 'cotton', 4300000, 3870000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(44, 'Shirt No 44', NULL, 9, 'shirt-no-44', 1, 'China', 'cotton', 4400000, 3960000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(45, 'Shirt No 45', NULL, 10, 'shirt-no-45', 2, 'China', 'cotton', 4500000, 4050000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(46, 'Shirt No 46', NULL, 11, 'shirt-no-46', 3, 'China', 'cotton', 4600000, 4140000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(47, 'Shirt No 47', NULL, 12, 'shirt-no-47', 4, 'China', 'cotton', 4700000, 4230000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(48, 'Shirt No 48', NULL, 13, 'shirt-no-48', 5, 'China', 'cotton', 4800000, 4320000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(49, 'Shirt No 49', NULL, 14, 'shirt-no-49', 6, 'China', 'cotton', 4900000, 4410000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(50, 'Shirt No 50', NULL, 15, 'shirt-no-50', 7, 'China', 'cotton', 5000000, 4500000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(51, 'Shirt No 51', NULL, 16, 'shirt-no-51', 8, 'China', 'cotton', 5100000, 4590000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(52, 'Shirt No 52', NULL, 17, 'shirt-no-52', 9, 'China', 'cotton', 5200000, 4680000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(53, 'Shirt No 53', NULL, 18, 'shirt-no-53', 10, 'China', 'cotton', 5300000, 4770000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(54, 'Shirt No 54', NULL, 1, 'shirt-no-54', 11, 'China', 'cotton', 5400000, 4860000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(55, 'Shirt No 55', NULL, 2, 'shirt-no-55', 12, 'China', 'cotton', 5500000, 4950000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(56, 'Shirt No 56', NULL, 3, 'shirt-no-56', 13, 'China', 'cotton', 5600000, 5040000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(57, 'Shirt No 57', NULL, 4, 'shirt-no-57', 14, 'China', 'cotton', 5700000, 5130000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(58, 'Shirt No 58', NULL, 5, 'shirt-no-58', 15, 'China', 'cotton', 5800000, 5220000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(59, 'Shirt No 59', NULL, 6, 'shirt-no-59', 16, 'China', 'cotton', 5900000, 5310000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(60, 'Shirt No 60', NULL, 7, 'shirt-no-60', 17, 'China', 'cotton', 6000000, 5400000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(61, 'Shirt No 61', NULL, 8, 'shirt-no-61', 18, 'China', 'cotton', 6100000, 5490000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(62, 'Shirt No 62', NULL, 9, 'shirt-no-62', 19, 'China', 'cotton', 6200000, 5580000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(63, 'Shirt No 63', NULL, 10, 'shirt-no-63', 20, 'China', 'cotton', 6300000, 5670000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(64, 'Shirt No 64', NULL, 11, 'shirt-no-64', 21, 'China', 'cotton', 6400000, 5760000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(65, 'Shirt No 65', NULL, 12, 'shirt-no-65', 22, 'China', 'cotton', 6500000, 5850000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(66, 'Shirt No 66', NULL, 13, 'shirt-no-66', 1, 'China', 'cotton', 6600000, 5940000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(67, 'Shirt No 67', NULL, 14, 'shirt-no-67', 2, 'China', 'cotton', 6700000, 6030000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(68, 'Shirt No 68', NULL, 15, 'shirt-no-68', 3, 'China', 'cotton', 6800000, 6120000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(69, 'Shirt No 69', NULL, 16, 'shirt-no-69', 4, 'China', 'cotton', 6900000, 6210000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(70, 'Shirt No 70', NULL, 17, 'shirt-no-70', 5, 'China', 'cotton', 7000000, 6300000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(71, 'Shirt No 71', NULL, 18, 'shirt-no-71', 6, 'China', 'cotton', 7100000, 6390000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(72, 'Shirt No 72', NULL, 1, 'shirt-no-72', 7, 'China', 'cotton', 7200000, 6480000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(73, 'Shirt No 73', NULL, 2, 'shirt-no-73', 8, 'China', 'cotton', 7300000, 6570000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(74, 'Shirt No 74', NULL, 3, 'shirt-no-74', 9, 'China', 'cotton', 7400000, 6660000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(75, 'Shirt No 75', NULL, 4, 'shirt-no-75', 10, 'China', 'cotton', 7500000, 6750000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(76, 'Shirt No 76', NULL, 5, 'shirt-no-76', 11, 'China', 'cotton', 7600000, 6840000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(77, 'Shirt No 77', NULL, 6, 'shirt-no-77', 12, 'China', 'cotton', 7700000, 6930000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(78, 'Shirt No 78', NULL, 7, 'shirt-no-78', 13, 'China', 'cotton', 7800000, 7020000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(79, 'Shirt No 79', NULL, 8, 'shirt-no-79', 14, 'China', 'cotton', 7900000, 7110000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(80, 'Shirt No 80', NULL, 9, 'shirt-no-80', 15, 'China', 'cotton', 8000000, 7200000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(81, 'Shirt No 81', NULL, 10, 'shirt-no-81', 16, 'China', 'cotton', 8100000, 7290000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(82, 'Shirt No 82', NULL, 11, 'shirt-no-82', 17, 'China', 'cotton', 8200000, 7380000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(83, 'Shirt No 83', NULL, 12, 'shirt-no-83', 18, 'China', 'cotton', 8300000, 7470000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(84, 'Shirt No 84', NULL, 13, 'shirt-no-84', 19, 'China', 'cotton', 8400000, 7560000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(85, 'Shirt No 85', NULL, 14, 'shirt-no-85', 20, 'China', 'cotton', 8500000, 7650000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(86, 'Shirt No 86', NULL, 15, 'shirt-no-86', 21, 'China', 'cotton', 8600000, 7740000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(87, 'Shirt No 87', NULL, 16, 'shirt-no-87', 22, 'China', 'cotton', 8700000, 7830000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(88, 'Shirt No 88', NULL, 17, 'shirt-no-88', 1, 'China', 'cotton', 8800000, 7920000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(89, 'Shirt No 89', NULL, 18, 'shirt-no-89', 2, 'China', 'cotton', 8900000, 8010000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(90, 'Shirt No 90', NULL, 1, 'shirt-no-90', 3, 'China', 'cotton', 9000000, 8100000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(91, 'Shirt No 91', NULL, 2, 'shirt-no-91', 4, 'China', 'cotton', 9100000, 8190000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(92, 'Shirt No 92', NULL, 3, 'shirt-no-92', 5, 'China', 'cotton', 9200000, 8280000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(93, 'Shirt No 93', NULL, 4, 'shirt-no-93', 6, 'China', 'cotton', 9300000, 8370000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(94, 'Shirt No 94', NULL, 5, 'shirt-no-94', 7, 'China', 'cotton', 9400000, 8460000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(95, 'Shirt No 95', NULL, 6, 'shirt-no-95', 8, 'China', 'cotton', 9500000, 8550000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(96, 'Shirt No 96', NULL, 7, 'shirt-no-96', 9, 'China', 'cotton', 9600000, 8640000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(97, 'Shirt No 97', NULL, 8, 'shirt-no-97', 10, 'China', 'cotton', 9700000, 8730000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(98, 'Shirt No 98', NULL, 9, 'shirt-no-98', 11, 'China', 'cotton', 9800000, 8820000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(99, 'Shirt No 99', NULL, 10, 'shirt-no-99', 12, 'China', 'cotton', 9900000, 8910000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(100, 'Shirt No 100', NULL, 11, 'shirt-no-100', 13, 'China', 'cotton', 10000000, 9000000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(101, 'Shirt No 101', NULL, 12, 'shirt-no-101', 14, 'China', 'cotton', 10100000, 9090000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(102, 'Shirt No 102', NULL, 13, 'shirt-no-102', 15, 'China', 'cotton', 10200000, 9180000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(103, 'Shirt No 103', NULL, 14, 'shirt-no-103', 16, 'China', 'cotton', 10300000, 9270000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(104, 'Shirt No 104', NULL, 15, 'shirt-no-104', 17, 'China', 'cotton', 10400000, 9360000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(105, 'Shirt No 105', NULL, 16, 'shirt-no-105', 18, 'China', 'cotton', 10500000, 9450000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(106, 'Shirt No 106', NULL, 17, 'shirt-no-106', 19, 'China', 'cotton', 10600000, 9540000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(107, 'Shirt No 107', NULL, 18, 'shirt-no-107', 20, 'China', 'cotton', 10700000, 9630000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(108, 'Shirt No 108', NULL, 1, 'shirt-no-108', 21, 'China', 'cotton', 10800000, 9720000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(109, 'Shirt No 109', NULL, 2, 'shirt-no-109', 22, 'China', 'cotton', 10900000, 9810000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(110, 'Shirt No 110', NULL, 3, 'shirt-no-110', 1, 'China', 'cotton', 11000000, 9900000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(111, 'Shirt No 111', NULL, 4, 'shirt-no-111', 2, 'China', 'cotton', 11100000, 9990000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(112, 'Shirt No 112', NULL, 5, 'shirt-no-112', 3, 'China', 'cotton', 11200000, 10080000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(113, 'Shirt No 113', NULL, 6, 'shirt-no-113', 4, 'China', 'cotton', 11300000, 10170000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(114, 'Shirt No 114', NULL, 7, 'shirt-no-114', 5, 'China', 'cotton', 11400000, 10260000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(115, 'Shirt No 115', NULL, 8, 'shirt-no-115', 6, 'China', 'cotton', 11500000, 10350000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(116, 'Shirt No 116', NULL, 9, 'shirt-no-116', 7, 'China', 'cotton', 11600000, 10440000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(117, 'Shirt No 117', NULL, 10, 'shirt-no-117', 8, 'China', 'cotton', 11700000, 10530000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(118, 'Shirt No 118', NULL, 11, 'shirt-no-118', 9, 'China', 'cotton', 11800000, 10620000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(119, 'Shirt No 119', NULL, 12, 'shirt-no-119', 10, 'China', 'cotton', 11900000, 10710000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(120, 'Shirt No 120', NULL, 13, 'shirt-no-120', 11, 'China', 'cotton', 12000000, 10800000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(121, 'Shirt No 121', NULL, 14, 'shirt-no-121', 12, 'China', 'cotton', 12100000, 10890000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(122, 'Shirt No 122', NULL, 15, 'shirt-no-122', 13, 'China', 'cotton', 12200000, 10980000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(123, 'Shirt No 123', NULL, 16, 'shirt-no-123', 14, 'China', 'cotton', 12300000, 11070000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(124, 'Shirt No 124', NULL, 17, 'shirt-no-124', 15, 'China', 'cotton', 12400000, 11160000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(125, 'Shirt No 125', NULL, 18, 'shirt-no-125', 16, 'China', 'cotton', 12500000, 11250000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(126, 'Shirt No 126', NULL, 1, 'shirt-no-126', 17, 'China', 'cotton', 12600000, 11340000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(127, 'Shirt No 127', NULL, 2, 'shirt-no-127', 18, 'China', 'cotton', 12700000, 11430000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(128, 'Shirt No 128', NULL, 3, 'shirt-no-128', 19, 'China', 'cotton', 12800000, 11520000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(129, 'Shirt No 129', NULL, 4, 'shirt-no-129', 20, 'China', 'cotton', 12900000, 11610000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(130, 'Shirt No 130', NULL, 5, 'shirt-no-130', 21, 'China', 'cotton', 13000000, 11700000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(131, 'Shirt No 131', NULL, 6, 'shirt-no-131', 22, 'China', 'cotton', 13100000, 11790000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(132, 'Shirt No 132', NULL, 7, 'shirt-no-132', 1, 'China', 'cotton', 13200000, 11880000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(133, 'Shirt No 133', NULL, 8, 'shirt-no-133', 2, 'China', 'cotton', 13300000, 11970000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(134, 'Shirt No 134', NULL, 9, 'shirt-no-134', 3, 'China', 'cotton', 13400000, 12060000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(135, 'Shirt No 135', NULL, 10, 'shirt-no-135', 4, 'China', 'cotton', 13500000, 12150000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(136, 'Shirt No 136', NULL, 11, 'shirt-no-136', 5, 'China', 'cotton', 13600000, 12240000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(137, 'Shirt No 137', NULL, 12, 'shirt-no-137', 6, 'China', 'cotton', 13700000, 12330000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(138, 'Shirt No 138', NULL, 13, 'shirt-no-138', 7, 'China', 'cotton', 13800000, 12420000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(139, 'Shirt No 139', NULL, 14, 'shirt-no-139', 8, 'China', 'cotton', 13900000, 12510000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(140, 'Shirt No 140', NULL, 15, 'shirt-no-140', 9, 'China', 'cotton', 14000000, 12600000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(141, 'Shirt No 141', NULL, 16, 'shirt-no-141', 10, 'China', 'cotton', 14100000, 12690000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(142, 'Shirt No 142', NULL, 17, 'shirt-no-142', 11, 'China', 'cotton', 14200000, 12780000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(143, 'Shirt No 143', NULL, 18, 'shirt-no-143', 12, 'China', 'cotton', 14300000, 12870000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(144, 'Shirt No 144', NULL, 1, 'shirt-no-144', 13, 'China', 'cotton', 14400000, 12960000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(145, 'Shirt No 145', NULL, 2, 'shirt-no-145', 14, 'China', 'cotton', 14500000, 13050000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(146, 'Shirt No 146', NULL, 3, 'shirt-no-146', 15, 'China', 'cotton', 14600000, 13140000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(147, 'Shirt No 147', NULL, 4, 'shirt-no-147', 16, 'China', 'cotton', 14700000, 13230000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(148, 'Shirt No 148', NULL, 5, 'shirt-no-148', 17, 'China', 'cotton', 14800000, 13320000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(149, 'Shirt No 149', NULL, 6, 'shirt-no-149', 18, 'China', 'cotton', 14900000, 13410000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(150, 'Shirt No 150', NULL, 7, 'shirt-no-150', 19, 'China', 'cotton', 15000000, 13500000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(151, 'Shirt No 151', NULL, 8, 'shirt-no-151', 20, 'China', 'cotton', 15100000, 13590000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(152, 'Shirt No 152', NULL, 9, 'shirt-no-152', 21, 'China', 'cotton', 15200000, 13680000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(153, 'Shirt No 153', NULL, 10, 'shirt-no-153', 22, 'China', 'cotton', 15300000, 13770000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(154, 'Shirt No 154', NULL, 11, 'shirt-no-154', 1, 'China', 'cotton', 15400000, 13860000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(155, 'Shirt No 155', NULL, 12, 'shirt-no-155', 2, 'China', 'cotton', 15500000, 13950000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(156, 'Shirt No 156', NULL, 13, 'shirt-no-156', 3, 'China', 'cotton', 15600000, 14040000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(157, 'Shirt No 157', NULL, 14, 'shirt-no-157', 4, 'China', 'cotton', 15700000, 14130000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(158, 'Shirt No 158', NULL, 15, 'shirt-no-158', 5, 'China', 'cotton', 15800000, 14220000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(159, 'Shirt No 159', NULL, 16, 'shirt-no-159', 6, 'China', 'cotton', 15900000, 14310000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(160, 'Shirt No 160', NULL, 17, 'shirt-no-160', 7, 'China', 'cotton', 16000000, 14400000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(161, 'Shirt No 161', NULL, 18, 'shirt-no-161', 8, 'China', 'cotton', 16100000, 14490000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(162, 'Shirt No 162', NULL, 1, 'shirt-no-162', 9, 'China', 'cotton', 16200000, 14580000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(163, 'Shirt No 163', NULL, 2, 'shirt-no-163', 10, 'China', 'cotton', 16300000, 14670000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(164, 'Shirt No 164', NULL, 3, 'shirt-no-164', 11, 'China', 'cotton', 16400000, 14760000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(165, 'Shirt No 165', NULL, 4, 'shirt-no-165', 12, 'China', 'cotton', 16500000, 14850000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(166, 'Shirt No 166', NULL, 5, 'shirt-no-166', 13, 'China', 'cotton', 16600000, 14940000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(167, 'Shirt No 167', NULL, 6, 'shirt-no-167', 14, 'China', 'cotton', 16700000, 15030000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(168, 'Shirt No 168', NULL, 7, 'shirt-no-168', 15, 'China', 'cotton', 16800000, 15120000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(169, 'Shirt No 169', NULL, 8, 'shirt-no-169', 16, 'China', 'cotton', 16900000, 15210000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(170, 'Shirt No 170', NULL, 9, 'shirt-no-170', 17, 'China', 'cotton', 17000000, 15300000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(171, 'Shirt No 171', NULL, 10, 'shirt-no-171', 18, 'China', 'cotton', 17100000, 15390000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(172, 'Shirt No 172', NULL, 11, 'shirt-no-172', 19, 'China', 'cotton', 17200000, 15480000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(173, 'Shirt No 173', NULL, 12, 'shirt-no-173', 20, 'China', 'cotton', 17300000, 15570000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(174, 'Shirt No 174', NULL, 13, 'shirt-no-174', 21, 'China', 'cotton', 17400000, 15660000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(175, 'Shirt No 175', NULL, 14, 'shirt-no-175', 22, 'China', 'cotton', 17500000, 15750000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(176, 'Shirt No 176', NULL, 15, 'shirt-no-176', 1, 'China', 'cotton', 17600000, 15840000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(177, 'Shirt No 177', NULL, 16, 'shirt-no-177', 2, 'China', 'cotton', 17700000, 15930000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(178, 'Shirt No 178', NULL, 17, 'shirt-no-178', 3, 'China', 'cotton', 17800000, 16020000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(179, 'Shirt No 179', NULL, 18, 'shirt-no-179', 4, 'China', 'cotton', 17900000, 16110000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(180, 'Shirt No 180', NULL, 1, 'shirt-no-180', 5, 'China', 'cotton', 18000000, 16200000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(181, 'Shirt No 181', NULL, 2, 'shirt-no-181', 6, 'China', 'cotton', 18100000, 16290000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(182, 'Shirt No 182', NULL, 3, 'shirt-no-182', 7, 'China', 'cotton', 18200000, 16380000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(183, 'Shirt No 183', NULL, 4, 'shirt-no-183', 8, 'China', 'cotton', 18300000, 16470000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(184, 'Shirt No 184', NULL, 5, 'shirt-no-184', 9, 'China', 'cotton', 18400000, 16560000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(185, 'Shirt No 185', NULL, 6, 'shirt-no-185', 10, 'China', 'cotton', 18500000, 16650000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(186, 'Shirt No 186', NULL, 7, 'shirt-no-186', 11, 'China', 'cotton', 18600000, 16740000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(187, 'Shirt No 187', NULL, 8, 'shirt-no-187', 12, 'China', 'cotton', 18700000, 16830000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(188, 'Shirt No 188', NULL, 9, 'shirt-no-188', 13, 'China', 'cotton', 18800000, 16920000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(189, 'Shirt No 189', NULL, 10, 'shirt-no-189', 14, 'China', 'cotton', 18900000, 17010000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(190, 'Shirt No 190', NULL, 11, 'shirt-no-190', 15, 'China', 'cotton', 19000000, 17100000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(191, 'Shirt No 191', NULL, 12, 'shirt-no-191', 16, 'China', 'cotton', 19100000, 17190000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(192, 'Shirt No 192', NULL, 13, 'shirt-no-192', 17, 'China', 'cotton', 19200000, 17280000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(193, 'Shirt No 193', NULL, 14, 'shirt-no-193', 18, 'China', 'cotton', 19300000, 17370000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(194, 'Shirt No 194', NULL, 15, 'shirt-no-194', 19, 'China', 'cotton', 19400000, 17460000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(195, 'Shirt No 195', NULL, 16, 'shirt-no-195', 20, 'China', 'cotton', 19500000, 17550000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(196, 'Shirt No 196', NULL, 17, 'shirt-no-196', 21, 'China', 'cotton', 19600000, 17640000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(197, 'Shirt No 197', NULL, 18, 'shirt-no-197', 22, 'China', 'cotton', 19700000, 17730000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(198, 'Shirt No 198', NULL, 1, 'shirt-no-198', 1, 'China', 'cotton', 19800000, 17820000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(199, 'Shirt No 199', NULL, 2, 'shirt-no-199', 2, 'China', 'cotton', 19900000, 17910000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(200, 'Shirt No 200', NULL, 3, 'shirt-no-200', 3, 'China', 'cotton', 20000000, 18000000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(201, 'Shirt No 201', NULL, 4, 'shirt-no-201', 4, 'China', 'cotton', 20100000, 18090000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(202, 'Shirt No 202', NULL, 5, 'shirt-no-202', 5, 'China', 'cotton', 20200000, 18180000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(203, 'Shirt No 203', NULL, 6, 'shirt-no-203', 6, 'China', 'cotton', 20300000, 18270000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(204, 'Shirt No 204', NULL, 7, 'shirt-no-204', 7, 'China', 'cotton', 20400000, 18360000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(205, 'Shirt No 205', NULL, 8, 'shirt-no-205', 8, 'China', 'cotton', 20500000, 18450000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(206, 'Shirt No 206', NULL, 9, 'shirt-no-206', 9, 'China', 'cotton', 20600000, 18540000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(207, 'Shirt No 207', NULL, 10, 'shirt-no-207', 10, 'China', 'cotton', 20700000, 18630000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(208, 'Shirt No 208', NULL, 11, 'shirt-no-208', 11, 'China', 'cotton', 20800000, 18720000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(209, 'Shirt No 209', NULL, 12, 'shirt-no-209', 12, 'China', 'cotton', 20900000, 18810000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(210, 'Shirt No 210', NULL, 13, 'shirt-no-210', 13, 'China', 'cotton', 21000000, 18900000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(211, 'Shirt No 211', NULL, 14, 'shirt-no-211', 14, 'China', 'cotton', 21100000, 18990000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(212, 'Shirt No 212', NULL, 15, 'shirt-no-212', 15, 'China', 'cotton', 21200000, 19080000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(213, 'Shirt No 213', NULL, 16, 'shirt-no-213', 16, 'China', 'cotton', 21300000, 19170000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(214, 'Shirt No 214', NULL, 17, 'shirt-no-214', 17, 'China', 'cotton', 21400000, 19260000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(215, 'Shirt No 215', NULL, 18, 'shirt-no-215', 18, 'China', 'cotton', 21500000, 19350000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(216, 'Shirt No 216', NULL, 1, 'shirt-no-216', 19, 'China', 'cotton', 21600000, 19440000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(217, 'Shirt No 217', NULL, 2, 'shirt-no-217', 20, 'China', 'cotton', 21700000, 19530000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(218, 'Shirt No 218', NULL, 3, 'shirt-no-218', 21, 'China', 'cotton', 21800000, 19620000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(219, 'Shirt No 219', NULL, 4, 'shirt-no-219', 22, 'China', 'cotton', 21900000, 19710000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(220, 'Shirt No 220', NULL, 5, 'shirt-no-220', 1, 'China', 'cotton', 22000000, 19800000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(221, 'Shirt No 221', NULL, 6, 'shirt-no-221', 2, 'China', 'cotton', 22100000, 19890000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(222, 'Shirt No 222', NULL, 7, 'shirt-no-222', 3, 'China', 'cotton', 22200000, 19980000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(223, 'Shirt No 223', NULL, 8, 'shirt-no-223', 4, 'China', 'cotton', 22300000, 20070000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(224, 'Shirt No 224', NULL, 9, 'shirt-no-224', 5, 'China', 'cotton', 22400000, 20160000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(225, 'Shirt No 225', NULL, 10, 'shirt-no-225', 6, 'China', 'cotton', 22500000, 20250000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(226, 'Shirt No 226', NULL, 11, 'shirt-no-226', 7, 'China', 'cotton', 22600000, 20340000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(227, 'Shirt No 227', NULL, 12, 'shirt-no-227', 8, 'China', 'cotton', 22700000, 20430000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(228, 'Shirt No 228', NULL, 13, 'shirt-no-228', 9, 'China', 'cotton', 22800000, 20520000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(229, 'Shirt No 229', NULL, 14, 'shirt-no-229', 10, 'China', 'cotton', 22900000, 20610000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(230, 'Shirt No 230', NULL, 15, 'shirt-no-230', 11, 'China', 'cotton', 23000000, 20700000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(231, 'Shirt No 231', NULL, 16, 'shirt-no-231', 12, 'China', 'cotton', 23100000, 20790000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(232, 'Shirt No 232', NULL, 17, 'shirt-no-232', 13, 'China', 'cotton', 23200000, 20880000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(233, 'Shirt No 233', NULL, 18, 'shirt-no-233', 14, 'China', 'cotton', 23300000, 20970000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(234, 'Shirt No 234', NULL, 1, 'shirt-no-234', 15, 'China', 'cotton', 23400000, 21060000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(235, 'Shirt No 235', NULL, 2, 'shirt-no-235', 16, 'China', 'cotton', 23500000, 21150000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(236, 'Shirt No 236', NULL, 3, 'shirt-no-236', 17, 'China', 'cotton', 23600000, 21240000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(237, 'Shirt No 237', NULL, 4, 'shirt-no-237', 18, 'China', 'cotton', 23700000, 21330000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(238, 'Shirt No 238', NULL, 5, 'shirt-no-238', 19, 'China', 'cotton', 23800000, 21420000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(239, 'Shirt No 239', NULL, 6, 'shirt-no-239', 20, 'China', 'cotton', 23900000, 21510000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(240, 'Shirt No 240', NULL, 7, 'shirt-no-240', 21, 'China', 'cotton', 24000000, 21600000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(241, 'Shirt No 241', NULL, 8, 'shirt-no-241', 22, 'China', 'cotton', 24100000, 21690000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(242, 'Shirt No 242', NULL, 9, 'shirt-no-242', 1, 'China', 'cotton', 24200000, 21780000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(243, 'Shirt No 243', NULL, 10, 'shirt-no-243', 2, 'China', 'cotton', 24300000, 21870000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(244, 'Shirt No 244', NULL, 11, 'shirt-no-244', 3, 'China', 'cotton', 24400000, 21960000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(245, 'Shirt No 245', NULL, 12, 'shirt-no-245', 4, 'China', 'cotton', 24500000, 22050000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(246, 'Shirt No 246', NULL, 13, 'shirt-no-246', 5, 'China', 'cotton', 24600000, 22140000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(247, 'Shirt No 247', NULL, 14, 'shirt-no-247', 6, 'China', 'cotton', 24700000, 22230000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(248, 'Shirt No 248', NULL, 15, 'shirt-no-248', 7, 'China', 'cotton', 24800000, 22320000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(249, 'Shirt No 249', NULL, 16, 'shirt-no-249', 8, 'China', 'cotton', 24900000, 22410000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(250, 'Shirt No 250', NULL, 17, 'shirt-no-250', 9, 'China', 'cotton', 25000000, 22500000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(251, 'Shirt No 251', NULL, 18, 'shirt-no-251', 10, 'China', 'cotton', 25100000, 22590000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27');
INSERT INTO `products` (`id`, `name`, `sku`, `catalog_id`, `slug`, `brand_id`, `made_in`, `material`, `regular_price`, `sale_price`, `discount`, `counter`, `view`, `image_link`, `product_description`, `image_catalog`, `deleted_at`, `created_at`, `updated_at`) VALUES
(252, 'Shirt No 252', NULL, 1, 'shirt-no-252', 11, 'China', 'cotton', 25200000, 22680000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(253, 'Shirt No 253', NULL, 2, 'shirt-no-253', 12, 'China', 'cotton', 25300000, 22770000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(254, 'Shirt No 254', NULL, 3, 'shirt-no-254', 13, 'China', 'cotton', 25400000, 22860000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(255, 'Shirt No 255', NULL, 4, 'shirt-no-255', 14, 'China', 'cotton', 25500000, 22950000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(256, 'Shirt No 256', NULL, 5, 'shirt-no-256', 15, 'China', 'cotton', 25600000, 23040000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(257, 'Shirt No 257', NULL, 6, 'shirt-no-257', 16, 'China', 'cotton', 25700000, 23130000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(258, 'Shirt No 258', NULL, 7, 'shirt-no-258', 17, 'China', 'cotton', 25800000, 23220000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(259, 'Shirt No 259', NULL, 8, 'shirt-no-259', 18, 'China', 'cotton', 25900000, 23310000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(260, 'Shirt No 260', NULL, 9, 'shirt-no-260', 19, 'China', 'cotton', 26000000, 23400000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(261, 'Shirt No 261', NULL, 10, 'shirt-no-261', 20, 'China', 'cotton', 26100000, 23490000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(262, 'Shirt No 262', NULL, 11, 'shirt-no-262', 21, 'China', 'cotton', 26200000, 23580000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(263, 'Shirt No 263', NULL, 12, 'shirt-no-263', 22, 'China', 'cotton', 26300000, 23670000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(264, 'Shirt No 264', NULL, 13, 'shirt-no-264', 1, 'China', 'cotton', 26400000, 23760000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(265, 'Shirt No 265', NULL, 14, 'shirt-no-265', 2, 'China', 'cotton', 26500000, 23850000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(266, 'Shirt No 266', NULL, 15, 'shirt-no-266', 3, 'China', 'cotton', 26600000, 23940000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(267, 'Shirt No 267', NULL, 16, 'shirt-no-267', 4, 'China', 'cotton', 26700000, 24030000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(268, 'Shirt No 268', NULL, 17, 'shirt-no-268', 5, 'China', 'cotton', 26800000, 24120000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(269, 'Shirt No 269', NULL, 18, 'shirt-no-269', 6, 'China', 'cotton', 26900000, 24210000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(270, 'Shirt No 270', NULL, 1, 'shirt-no-270', 7, 'China', 'cotton', 27000000, 24300000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(271, 'Shirt No 271', NULL, 2, 'shirt-no-271', 8, 'China', 'cotton', 27100000, 24390000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(272, 'Shirt No 272', NULL, 3, 'shirt-no-272', 9, 'China', 'cotton', 27200000, 24480000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(273, 'Shirt No 273', NULL, 4, 'shirt-no-273', 10, 'China', 'cotton', 27300000, 24570000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(274, 'Shirt No 274', NULL, 5, 'shirt-no-274', 11, 'China', 'cotton', 27400000, 24660000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(275, 'Shirt No 275', NULL, 6, 'shirt-no-275', 12, 'China', 'cotton', 27500000, 24750000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(276, 'Shirt No 276', NULL, 7, 'shirt-no-276', 13, 'China', 'cotton', 27600000, 24840000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(277, 'Shirt No 277', NULL, 8, 'shirt-no-277', 14, 'China', 'cotton', 27700000, 24930000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(278, 'Shirt No 278', NULL, 9, 'shirt-no-278', 15, 'China', 'cotton', 27800000, 25020000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(279, 'Shirt No 279', NULL, 10, 'shirt-no-279', 16, 'China', 'cotton', 27900000, 25110000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(280, 'Shirt No 280', NULL, 11, 'shirt-no-280', 17, 'China', 'cotton', 28000000, 25200000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(281, 'Shirt No 281', NULL, 12, 'shirt-no-281', 18, 'China', 'cotton', 28100000, 25290000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(282, 'Shirt No 282', NULL, 13, 'shirt-no-282', 19, 'China', 'cotton', 28200000, 25380000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(283, 'Shirt No 283', NULL, 14, 'shirt-no-283', 20, 'China', 'cotton', 28300000, 25470000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(284, 'Shirt No 284', NULL, 15, 'shirt-no-284', 21, 'China', 'cotton', 28400000, 25560000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(285, 'Shirt No 285', NULL, 16, 'shirt-no-285', 22, 'China', 'cotton', 28500000, 25650000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(286, 'Shirt No 286', NULL, 17, 'shirt-no-286', 1, 'China', 'cotton', 28600000, 25740000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(287, 'Shirt No 287', NULL, 18, 'shirt-no-287', 2, 'China', 'cotton', 28700000, 25830000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(288, 'Shirt No 288', NULL, 1, 'shirt-no-288', 3, 'China', 'cotton', 28800000, 25920000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(289, 'Shirt No 289', NULL, 2, 'shirt-no-289', 4, 'China', 'cotton', 28900000, 26010000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(290, 'Shirt No 290', NULL, 3, 'shirt-no-290', 5, 'China', 'cotton', 29000000, 26100000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(291, 'Shirt No 291', NULL, 4, 'shirt-no-291', 6, 'China', 'cotton', 29100000, 26190000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(292, 'Shirt No 292', NULL, 5, 'shirt-no-292', 7, 'China', 'cotton', 29200000, 26280000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(293, 'Shirt No 293', NULL, 6, 'shirt-no-293', 8, 'China', 'cotton', 29300000, 26370000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(294, 'Shirt No 294', NULL, 7, 'shirt-no-294', 9, 'China', 'cotton', 29400000, 26460000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(295, 'Shirt No 295', NULL, 8, 'shirt-no-295', 10, 'China', 'cotton', 29500000, 26550000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(296, 'Shirt No 296', NULL, 9, 'shirt-no-296', 11, 'China', 'cotton', 29600000, 26640000, 10, 0, 0, 'assets/users/images/home/product1.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(297, 'Shirt No 297', NULL, 10, 'shirt-no-297', 12, 'China', 'cotton', 29700000, 26730000, 10, 0, 0, 'assets/users/images/home/product2.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(298, 'Shirt No 298', NULL, 11, 'shirt-no-298', 13, 'China', 'cotton', 29800000, 26820000, 10, 0, 0, 'assets/users/images/home/product3.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(299, 'Shirt No 299', NULL, 12, 'shirt-no-299', 14, 'China', 'cotton', 29900000, 26910000, 10, 0, 0, 'assets/users/images/home/product4.jpg', '', '', NULL, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(300, 'Hello', 'SKUH', 18, 'hello', 6, '', '', 1, 1, 0, 0, 0, 'http://shopee.local/images/300_1494844733.png', '', '["http:\\/\\/shopee.local\\/images\\/300_1494844733.png"]', '2017-05-15 10:54:44', '2017-05-15 03:38:53', '2017-05-15 10:54:44'),
(301, 'TestA', 'SKUA', 16, 'testa', 6, '', '', 1, 1, 0, 0, 0, 'http://shopee.local/images/301_1494845324.png', '', '["http:\\/\\/shopee.local\\/images\\/301_1494845324.png"]', '2017-05-15 10:54:01', '2017-05-15 03:48:44', '2017-05-15 10:54:01'),
(302, 'Bersha Fashion AAAA', 'SKU01', 18, 'bersha-fashion-aaaa', 6, '', '', 1, 1, 0, 0, 0, 'http://shopee.local/images/302_1494845988.jpg', '', '["http:\\/\\/shopee.local\\/images\\/302_1494845988.jpg"]', '2017-05-15 10:54:42', '2017-05-15 03:59:48', '2017-05-15 10:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'S', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(2, 'M', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(3, 'L', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(4, 'XL', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(5, 'XXL', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(6, 'autofit', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(7, 'oversize', '2017-05-14 20:51:26', '2017-05-14 20:51:26'),
(8, 'no-size', '2017-05-14 20:51:26', '2017-05-14 20:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `size_id`, `color_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 10, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(2, 11, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(3, 12, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(4, 13, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(5, 14, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(6, 15, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(7, 16, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(8, 17, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(9, 18, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(10, 19, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(11, 20, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(12, 21, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(13, 22, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(14, 23, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(15, 24, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(16, 25, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(17, 26, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(18, 27, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(19, 28, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(20, 29, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(21, 30, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(22, 31, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(23, 32, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(24, 33, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(25, 34, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(26, 35, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(27, 36, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(28, 37, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(29, 38, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(30, 39, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(31, 40, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(32, 41, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(33, 42, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(34, 43, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(35, 44, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(36, 45, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(37, 46, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(38, 47, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(39, 48, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(40, 49, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(41, 50, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(42, 51, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(43, 52, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(44, 53, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(45, 54, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(46, 55, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(47, 56, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(48, 57, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(49, 58, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(50, 59, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(51, 60, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(52, 61, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(53, 62, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(54, 63, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(55, 64, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(56, 65, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(57, 66, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(58, 67, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(59, 68, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(60, 69, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(61, 70, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(62, 71, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(63, 72, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(64, 73, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(65, 74, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(66, 75, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(67, 76, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(68, 77, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(69, 78, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(70, 79, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(71, 80, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(72, 81, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(73, 82, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(74, 83, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(75, 84, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(76, 85, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(77, 86, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(78, 87, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(79, 88, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(80, 89, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(81, 90, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(82, 91, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(83, 92, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(84, 93, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(85, 94, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(86, 95, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(87, 96, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(88, 97, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(89, 98, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(90, 99, 4, 4, 0, '2017-05-14 20:51:27', '2017-05-14 20:51:27'),
(91, 300, 1, 1, 3, '2017-05-15 03:38:53', '2017-05-15 03:38:53'),
(92, 300, 6, 3, 1, '2017-05-15 03:38:53', '2017-05-15 03:38:53'),
(93, 300, 2, 1, 4, '2017-05-15 03:38:53', '2017-05-15 03:38:53'),
(102, 301, 1, 1, 8, '2017-05-15 03:59:02', '2017-05-15 03:59:02'),
(105, 302, 1, 1, 6, '2017-05-15 04:17:16', '2017-05-15 04:17:16'),
(106, 1, 1, 1, 12, '2017-05-15 10:55:10', '2017-05-15 10:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catalogs_name_unique` (`name`),
  ADD KEY `catalogs_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_product_order_id_product_id_size_id_color_id_unique` (`order_id`,`product_id`,`size_id`,`color_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_size_id_foreign` (`size_id`),
  ADD KEY `order_product_color_id_foreign` (`color_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_catalog_id_foreign` (`catalog_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stocks_product_id_size_id_color_id_unique` (`product_id`,`size_id`,`color_id`),
  ADD KEY `stocks_size_id_foreign` (`size_id`),
  ADD KEY `stocks_color_id_foreign` (`color_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD CONSTRAINT `catalogs_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `catalogs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
