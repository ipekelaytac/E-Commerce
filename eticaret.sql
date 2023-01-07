-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 27 Eki 2022, 21:52:13
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brand_product`
--

CREATE TABLE `brand_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-04 20:32:41', '2022-03-04 20:32:41'),
(2, 12, '2022-03-07 17:58:22', '2022-03-07 17:58:22'),
(3, 6, '2022-03-11 10:09:51', '2022-03-11 10:09:51'),
(4, 1, '2022-03-11 10:10:03', '2022-03-11 10:10:03'),
(5, 1, '2022-03-10 13:10:36', '2022-03-19 13:10:36'),
(6, 6, '2022-03-11 10:13:25', '2022-03-11 10:13:25'),
(7, 6, '2022-03-11 13:41:26', '2022-03-11 13:41:26'),
(8, 1, '2022-03-11 13:41:56', '2022-03-11 13:41:56'),
(9, 1, '2022-03-11 19:50:07', '2022-03-11 19:50:07'),
(10, 1, '2022-09-23 21:26:59', '2022-09-23 21:26:59'),
(12, 17, '2022-09-30 08:22:43', '2022-09-30 08:22:43'),
(13, 17, '2022-09-30 08:24:59', '2022-09-30 08:24:59'),
(14, 18, '2022-10-08 10:48:13', '2022-10-08 10:48:13'),
(15, 17, '2022-10-08 22:18:00', '2022-10-08 22:18:00'),
(16, 17, '2022-10-08 22:18:38', '2022-10-08 22:18:38'),
(17, 17, '2022-10-08 22:23:37', '2022-10-08 22:23:37'),
(18, 17, '2022-10-08 22:24:01', '2022-10-08 22:24:01'),
(19, 17, '2022-10-08 22:25:14', '2022-10-08 22:25:14'),
(20, 17, '2022-10-08 22:26:43', '2022-10-08 22:26:43'),
(21, 17, '2022-10-08 22:27:32', '2022-10-08 22:27:32'),
(22, 17, '2022-10-08 22:28:18', '2022-10-08 22:28:18'),
(23, 17, '2022-10-09 11:43:16', '2022-10-09 11:43:16'),
(24, 17, '2022-10-09 12:20:32', '2022-10-09 12:20:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_cart_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `situation` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cart_product`
--

INSERT INTO `cart_product` (`id`, `main_cart_id`, `product_id`, `number`, `price`, `situation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, '12.62', 'beklemede', '2022-03-04 20:32:41', '2022-03-04 20:32:41'),
(2, 1, 3, 1, '9.07', 'beklemede', '2022-03-04 20:32:46', '2022-03-04 20:32:46'),
(3, 2, 1, 1, '6.96', 'beklemede', '2022-03-09 20:52:46', '2022-03-09 20:52:46'),
(5, 4, 53, 1, '2.00', 'beklemede', '2022-03-11 10:10:03', '2022-03-11 10:10:03'),
(6, 7, 45, 1, '11.00', 'beklemede', '2022-03-11 13:41:35', '2022-03-11 13:41:35'),
(11, 9, 24, 2, '10.14', 'beklemede', '2022-09-23 19:07:04', '2022-09-23 19:47:26'),
(12, 9, 26, 5, '16.61', 'beklemede', '2022-09-23 19:47:20', '2022-09-23 19:47:27'),
(13, 9, 27, 4, '9.74', 'beklemede', '2022-09-23 19:47:23', '2022-09-23 19:47:30'),
(14, 10, 44, 3, '34.00', 'beklemede', '2022-09-23 21:26:59', '2022-09-23 22:09:11'),
(18, 11, 44, 1, '34.00', 'beklemede', '2022-09-23 22:20:32', '2022-09-24 20:42:18'),
(20, 8, 44, 1, '340.00', 'beklemede', '2022-09-26 16:33:58', '2022-09-26 16:33:58'),
(21, 12, 44, 2, '340.00', 'beklemede', '2022-09-30 08:22:46', '2022-09-30 08:24:13'),
(24, 4, 42, 2, '34.00', 'beklemede', '2022-10-08 09:30:24', '2022-10-08 10:45:57'),
(48, 14, 42, 1, '34.00', 'beklemede', '2022-10-08 22:17:00', '2022-10-08 22:17:00'),
(49, 13, 44, 1, '340.00', 'beklemede', '2022-10-08 22:17:46', '2022-10-08 22:17:46'),
(50, 15, 42, 1, '34.00', 'beklemede', '2022-10-08 22:18:00', '2022-10-08 22:18:00'),
(52, 16, 42, 1, '34.00', 'beklemede', '2022-10-08 22:22:00', '2022-10-08 22:22:00'),
(53, 17, 42, 1, '34.00', 'beklemede', '2022-10-08 22:23:41', '2022-10-08 22:23:41'),
(55, 18, 42, 1, '34.00', 'beklemede', '2022-10-08 22:24:38', '2022-10-08 22:24:38'),
(56, 19, 42, 1, '34.00', 'beklemede', '2022-10-08 22:25:14', '2022-10-08 22:25:14'),
(57, 20, 42, 2, '34.00', 'beklemede', '2022-10-08 22:26:43', '2022-10-08 22:26:45'),
(58, 21, 42, 1, '34.00', 'beklemede', '2022-10-08 22:27:32', '2022-10-08 22:27:32'),
(65, 22, 44, 2, '340.00', 'beklemede', '2022-10-08 22:34:26', '2022-10-08 22:42:33'),
(69, 23, 42, 2, '34.00', 'beklemede', '2022-10-09 12:10:45', '2022-10-09 12:10:46'),
(71, 24, 44, 1, '340.00', 'beklemede', '2022-10-14 09:10:56', '2022-10-14 09:10:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `top_id` int(11) DEFAULT NULL,
  `category_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `top_id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Elektronik', 'elektronik', NULL, NULL),
(2, 1, 'Bilgisayar/Tablet', 'bilgisayar-tablet', NULL, NULL),
(3, 1, 'Telefon', 'telefon', NULL, NULL),
(4, 1, 'Tv ve Ses Sistemleri', 'tv-ses', NULL, NULL),
(5, 2, 'Kamera', 'kamera', NULL, NULL),
(6, NULL, 'Kitap', 'kitap', NULL, NULL),
(7, 6, 'Edebiyat', 'edebiyat', NULL, NULL),
(8, 6, 'Sınavlara Hazırlık', 'sınav', NULL, NULL),
(9, 6, 'Çoçuk', 'cocuk', NULL, NULL),
(10, 7, 'Bilgisayar', 'bilgisayar', NULL, NULL),
(11, NULL, 'Dergi', 'dergi', NULL, NULL),
(12, 11, 'Mobilya', 'mobilya', NULL, NULL),
(13, 11, 'Dekarasyon', 'dekarasyon', NULL, NULL),
(14, 11, 'Kozmetik', 'kozmetik', NULL, NULL),
(15, 12, 'Kişisel Bakım', 'kisisel-bakim', NULL, NULL),
(16, NULL, 'Giyim ve Moda', 'giyim-moda', NULL, NULL),
(17, NULL, 'Anne ve Çoçuk', 'anne-cocuk', NULL, NULL),
(21, 2, 'saddassad', 'saddassad', '2022-09-18 22:05:45', '2022-09-18 22:10:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 8),
(9, 3, 9),
(10, 3, 10),
(12, 1, 29),
(13, 1, 28),
(16, 1, 24),
(22, 1, 21),
(27, 1, 41),
(29, 2, 42),
(30, 3, 42),
(31, 2, 43),
(37, 9, 26),
(40, 1, 26),
(41, 7, 27),
(42, 7, 44),
(45, 1, 44),
(46, 16, 41),
(47, 16, 44);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorite_product`
--

CREATE TABLE `favorite_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `collection_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `favorite_product`
--

INSERT INTO `favorite_product` (`id`, `user_id`, `collection_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 17, NULL, 43, '2022-10-15 09:13:12', '2022-10-15 09:13:12'),
(8, 17, NULL, 43, '2022-10-15 09:13:17', '2022-10-15 09:13:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorite_product_collection`
--

CREATE TABLE `favorite_product_collection` (
  `id` int(10) UNSIGNED NOT NULL,
  `collection_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `favorite_product_collection`
--

INSERT INTO `favorite_product_collection` (`id`, `collection_name`, `slug`, `user_id`) VALUES
(1, 'test1', 'test1', 17),
(2, 'test2', 'test2', 17);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_02_11_153327_create_categories_table', 1),
(4, '2022_02_12_183342_create_products_table', 1),
(5, '2022_02_12_192813_create_category_product_table', 1),
(6, '2022_02_14_161420_create_product_detail', 1),
(7, '2022_02_21_190310_create_user_table', 1),
(8, '2022_02_22_020646_create_cart_table', 1),
(9, '2022_02_22_020835_create_cart_product_table', 1),
(10, '2022_03_01_122257_create_order_table', 1),
(11, '2022_03_01_123428_create_user_detail_table', 1),
(12, '2022_10_12_131623_create_favorite_product_category_table', 2),
(13, '2022_10_12_183947_create_favorite_product_table', 2),
(14, '2022_10_13_212814_create_favorite_product_category_table', 3),
(15, '2022_10_13_213309_create_favorite_product_category_table', 4),
(16, '2022_10_13_214025_create_favorite_product_table', 5),
(17, '2022_10_14_125011_create_favorite_product_collection_table', 6),
(18, '2022_10_14_125050_create_favorite_product_table', 7),
(19, '2022_10_22_161529_create_product_evaluation_table', 8),
(20, '2022_10_24_103704_create_brand_table', 8),
(21, '2022_10_24_103912_create_brand_product_table', 8),
(22, '2022_10_27_151643_test', 9),
(23, '2022_10_27_152912_test1', 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_cart_id` int(10) UNSIGNED NOT NULL,
  `order_price` decimal(6,2) NOT NULL,
  `situation` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_surname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_installments` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`id`, `main_cart_id`, `order_price`, `situation`, `name_surname`, `address`, `phone`, `mobile_phone`, `bank`, `number_installments`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '99.99', 'Sipariş tamamlandı', 'aytaç ipekel', 'wqeweqwqeqe', '(222) 222-22-22', '(555) 555-55-55', 'Garanti', 1, '2022-02-01 20:32:53', '2022-09-24 20:30:52', NULL),
(2, 2, '30.00', 'Ödeme onaylandı', 'aytaç 2222e2', 'sdfsfdsf', '(222) 222-22-22', '(555) 555-55-55', 'Garanti', 1, '2022-03-01 10:09:46', '2022-02-11 10:09:46', NULL),
(3, 3, '45.00', 'Kargoya verildi', 'asda', 'sdfsfdsf', '(222) 222-22-22', '(555) 555-55-55', 'Garanti', 1, '2022-04-01 01:00:00', '2022-03-18 21:35:48', NULL),
(5, 5, '55.43', 'Sipariş tamamlandı', 'aytac', 'weqwe', '222 222 22 22', '555 555 55 55', 'garanti', 1, '2022-05-01 13:11:26', '2022-04-24 13:11:26', NULL),
(8, 9, '77.46', 'Siparişiniz alındı', 'aytaç 2222e2', 'sdfsfdsf', '(222) 222-22-22', '(555) 555-55-55', 'Garanti', 1, '2022-06-01 19:47:47', '2022-05-23 19:47:47', NULL),
(9, 10, '45.46', 'Ödeme onaylandı', 'aytaç 2222e2', 'sdfsfdsf', '(222) 222-22-22', '(555) 555-55-55', 'Garanti', 1, '2022-06-30 22:09:49', '2022-06-23 22:09:49', NULL),
(10, 11, '56.78', 'Siparişiniz alındı', 'aytaç 2222e2', 'sdfsfdsf', '(222) 222-22-22', '(555) 555-55-55', 'Garanti', 1, '2022-08-01 20:42:43', '2022-07-24 20:42:43', NULL),
(11, 8, '118.80', 'Siparişiniz alındı', 'aytaç 2222e2', 'sdfsfdsf', '(222) 222-22-22', '(555) 555-55-55', 'Garanti', 1, '2022-08-31 21:00:00', '2022-08-26 16:34:11', NULL),
(12, 12, '123.12', 'Siparişiniz alındı.', 'aytac', 'sdada', '(343) 443-43-34', '(333) 434-43-43', 'Garanti', 1, '2022-10-01 08:24:28', '2022-09-30 08:24:28', NULL),
(14, 14, '34.00', 'Siparişiniz alındı.', 'ipekel@', 'şööşöşöşö', '(022) 222-22-22', '(222) 222-22-22', 'Garanti', 1, '2022-10-08 21:54:26', '2022-10-08 21:54:26', NULL),
(31, 13, '340.00', 'Siparişiniz alındı.', 'aytac', 'kşlkll', '(511) 515', '(454) 555-11-2', 'Garanti', 1, '2022-10-08 22:17:56', '2022-10-08 22:17:56', NULL),
(32, 15, '34.00', 'Siparişiniz alındı.', 'aytac', 'jjknkn', '(212) 14', '(545) 4', 'Garanti', 1, '2022-10-08 22:18:16', '2022-10-08 22:18:16', NULL),
(33, 16, '34.00', 'Siparişiniz alındı.', 'aytac', 'lk', '(121) 11', '(412) 211-2', 'Garanti', 1, '2022-10-08 22:19:05', '2022-10-08 22:19:05', NULL),
(39, 17, '34.00', 'Siparişiniz alındı.', 'aytac', 'kooköoköl', '(121) 121-22-1', '(155) 211', 'Garanti', 1, '2022-10-08 22:23:53', '2022-10-08 22:23:53', NULL),
(40, 18, '34.00', 'Siparişiniz alındı.', 'aytac', 'ıhuıhjıııh', '(555) 555-55-55', '(222) 222-22-22', 'Garanti', 1, '2022-10-08 22:25:10', '2022-10-08 22:25:10', NULL),
(41, 19, '34.00', 'Siparişiniz alındı.', 'aytac', 'ıhuıhjıııh', '(555) 555-55-55', '(222) 222-22-22', 'Garanti', 1, '2022-10-08 22:25:23', '2022-10-08 22:25:23', NULL),
(42, 20, '68.00', 'Siparişiniz alındı.', 'aytac', 'ıhuıhjıııh', '(555) 555-55-55', '(222) 222-22-22', 'Garanti', 1, '2022-10-08 22:26:48', '2022-10-08 22:26:48', NULL),
(43, 21, '34.00', 'Siparişiniz alındı.', 'aytac', 'ıhuıhjıııh', '(555) 555-55-55', '(222) 222-22-22', 'Garanti', 1, '2022-10-08 22:27:34', '2022-10-08 22:27:34', NULL),
(44, 22, '680.00', 'Siparişiniz alındı.', 'aytac', 'ıhuıhjıııh', '(555) 555-55-55', '(222) 222-22-22', 'Garanti', 1, '2022-10-08 22:42:43', '2022-10-08 22:42:43', NULL),
(45, 23, '68.00', 'Siparişiniz alındı.', 'aytac', 'ıhuıhjıııh', '(555) 555-55-55', '(222) 222-22-22', 'Garanti', 1, '2022-10-09 12:10:49', '2022-10-09 12:10:49', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `slug`, `product_name`, `comment`, `price`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dr-tracey-west', 'Dr. Tracey West', 'Et ut explicabo rerum. Est nam quod minima non eum fugit. Illo quis quis dolor culpa nulla. Blanditiis et tenetur placeat quaerat id. Qui et aut nobis tenetur voluptatem facere non. Dolor veniam vel non ut nesciunt nemo facilis. Perferendis a est ipsum ipsam. Magni perspiciatis nisi nesciunt ut id et quia. Aliquid voluptatum cumque reiciendis dolorem inventore a. Quidem quidem velit rerum sint. Architecto et sed ipsum quis autem placeat sed. Et ratione omnis molestiae qui pariatur repellendus sint. Sapiente perferendis ex non in dicta. Distinctio eligendi autem consectetur illo dignissimos illum iste. Repellendus excepturi ratione quod optio dolorum assumenda fugiat. Sint occaecati enim ut in labore. Pariatur quo ut hic. Animi rem numquam consequatur. Minus et consequatur ipsa delectus.', '6.00', 0, '2022-03-07 16:47:00', '2022-10-27 12:50:40', '2022-10-27 12:50:40'),
(2, 'vel-sed-voluptas-veniam-quos-tempore-qui-totam', 'Saige Kutch', 'Dolore id eum at ea dolor veniam iusto a. Est aliquam accusantium eveniet et itaque velit. Esse quia labore sunt voluptatum itaque. Architecto magni quia tenetur voluptatem rerum laudantium. Voluptatem aliquam aut id accusantium deleniti hic. Tenetur deserunt ut consequuntur. Natus ut ea rerum et non sed deleniti. Sunt itaque ut sunt eveniet tenetur modi. Corrupti vel aut sed repudiandae quidem officia tenetur qui. Minus saepe repudiandae quae vel. Voluptatum itaque ut libero ea. Omnis fuga facilis aut quia voluptas sed eum sunt. Aut dolore dolor est nesciunt assumenda sed sunt.', '15.00', 0, '2022-03-22 16:47:06', NULL, NULL),
(3, 'soluta-accusantium-error-aspernatur-consequatur-quos-omnis', 'Dr. Darion Lind', 'Molestiae voluptatum reprehenderit dolor maxime maxime nobis. A atque in quos. Nostrum corrupti nostrum quaerat eos eum atque placeat. Molestiae voluptatem non et ut. Amet eaque voluptate architecto commodi quas beatae voluptas. Aut consequuntur at explicabo sequi. Eveniet vel sed a voluptatem id quia itaque. Distinctio ut laborum dolor impedit ratione cum dolor. Itaque sed fuga ipsa occaecati perspiciatis error nobis ipsum. Mollitia ex architecto voluptates excepturi earum. Et omnis vitae quis ad laborum magni consequatur. Est id ut aut est. Aut ut provident expedita temporibus. Eos tempora excepturi voluptas omnis hic occaecati provident. Dolorem nesciunt iste debitis. Totam dignissimos sunt corporis maxime quam pariatur perspiciatis. Voluptate aperiam tempore vel non consequatur molestiae. Minima quia et enim illo dolorum in perferendis numquam. Dolore debitis consequuntur expedita et ut veritatis. Quia ipsa a rem ea aliquid. Consequuntur dolor rerum nihil adipisci aut dolor.', '20.00', 0, NULL, NULL, NULL),
(4, 'quis-ut-excepturi-libero', 'Kolby Koepp', 'Hic laudantium dolores impedit occaecati. Ut fugiat fuga porro nobis et. Sint perspiciatis et nobis et debitis. Cum earum autem cumque id ut et. Enim est impedit temporibus harum sequi quia eius totam. Maiores inventore dolorum blanditiis quidem dicta itaque eum est. Aut voluptatibus non libero laborum. Ut est accusamus et nobis ea quibusdam. Et maxime cumque et itaque nihil quidem quam. Et et aut esse aut possimus et. Tempora harum alias eum facere eveniet expedita. Eius asperiores ut possimus sed. Necessitatibus exercitationem sit eius sed odio molestiae. Corrupti eius saepe temporibus quae laudantium rem.', '11.00', 0, NULL, NULL, NULL),
(5, 'modi-illum-quia-ut-fugit', 'Ally Kihn', 'Qui harum ullam veritatis enim. Quidem nostrum sit molestiae sed et. Aut harum consequatur consequatur sed doloremque. Provident perferendis veniam minima suscipit sit nisi aut. Dolorum vel beatae et ex doloremque aperiam et consequatur. Porro consequuntur inventore nemo. Est voluptatem id adipisci nemo mollitia consequuntur. Explicabo sunt ipsam est fugiat. Accusamus et a nemo omnis id ut iusto. Corporis ea placeat sed itaque dignissimos. Et sunt vitae officia eos blanditiis libero. Aperiam voluptatibus officia soluta quod error voluptas nisi. Ea similique sunt est ducimus odit nihil. Consectetur autem natus soluta illum. Voluptates nisi quisquam voluptas cumque. Aperiam ut optio voluptas magnam id fugit at. Quibusdam id sit non aut quos earum aliquid. Laudantium ipsa voluptate ut possimus quia omnis veritatis veniam.', '18.00', 0, NULL, NULL, NULL),
(6, 'consequatur-sit-est-sapiente-deserunt-possimus-cupiditate', 'Dr. Winona Kunde', 'Qui velit quia voluptate ut eos. Sit fugiat similique officia impedit expedita quos. Nihil odit et iure dolorem dolore non. Numquam culpa est velit labore blanditiis quae. Qui non quia velit voluptatem voluptatem nisi maiores accusamus. Officiis maxime et omnis et nostrum. Enim nihil aut qui odio corrupti fuga. Dolore accusantium tenetur necessitatibus voluptatem excepturi ipsam. Vel accusantium quos ut deleniti aperiam laudantium accusamus. Ipsa delectus asperiores fugiat beatae fuga. Nemo eius qui sit. Autem omnis consequatur in et. Aut sint sequi doloribus a animi. Excepturi dolorum dolorem quia necessitatibus ipsa totam. Veritatis perspiciatis esse possimus vel perferendis odit sit sequi. Perferendis veritatis culpa non dolores numquam expedita. Laudantium quia dolorem eius at qui reprehenderit ipsum nihil. Sit sit dolorem officiis. Nulla est soluta perferendis ratione facilis porro ipsum. Reprehenderit consequatur neque quae repudiandae. Illo sit dolores magni.', '13.00', 0, NULL, NULL, NULL),
(7, 'corporis-recusandae-vero-et-repudiandae-ad', 'Noemi Yundt V', 'Commodi occaecati sit nihil similique. Veniam molestias id nostrum quisquam neque enim ullam. Atque distinctio vel et illo delectus alias quia. Est ad est est voluptatibus quae alias. Autem exercitationem quas consequatur quod quis inventore reprehenderit. Dolore quibusdam aut optio doloremque. Laborum nulla in voluptatum cumque reprehenderit sint ut. Corporis asperiores sit sunt explicabo enim ut. Iste laudantium eius quia quis. Placeat earum reprehenderit quasi. Atque hic qui facere doloremque error id officia. Est et blanditiis adipisci rerum. Natus aliquam autem placeat maiores sapiente excepturi tempore. Fuga nulla sed non iusto fuga. Necessitatibus vel quo nulla officiis dolor enim voluptate consequatur. Totam mollitia veniam praesentium culpa et quas. Necessitatibus minima occaecati iusto animi nulla soluta. Eos officiis iure voluptatem soluta aut dolor. Qui veniam nesciunt quis sunt voluptatem deserunt et. Vel cumque et et sed ut dolores. Molestiae non qui voluptatum quidem quaerat itaque adipisci. Sunt inventore consequuntur ut ipsa est consectetur. Ducimus et qui ut velit dolor mollitia ipsa animi. Totam architecto ut laborum est. Ut molestiae itaque quia qui perspiciatis nemo et. Vitae sequi ut perspiciatis expedita.', '9.00', 0, NULL, NULL, NULL),
(8, 'non-in-dolores-qui-distinctio-quibusdam-et-asperiores', 'Prof. Carissa Wuckert MD', 'Non voluptas quia dolorem quia qui. Optio sunt aliquid id porro velit quidem reprehenderit. Asperiores possimus voluptatibus porro voluptates assumenda iusto sit. Atque autem qui ex enim doloremque modi. Et adipisci itaque voluptatem fuga dolor. Deserunt tempore quaerat a ut. Unde fugiat voluptas reiciendis quia quisquam qui aut. Excepturi et eos hic animi ratione. Non eos et velit consectetur veniam impedit. Sequi recusandae voluptas non corporis consectetur voluptatem. Expedita temporibus suscipit dolorem aliquam. Sed excepturi dolorem voluptates consectetur ab aliquid id. Quas suscipit dolorum quasi sunt deserunt in id. Explicabo eum explicabo dolore tempore tempore libero. Ut sed vero et nostrum. Aut qui officia tempore reiciendis.', '20.00', 0, NULL, NULL, NULL),
(9, 'sed-vel-suscipit-aut-amet-sed-eum-eos', 'Ms. Yolanda Schaefer Jr.', 'Neque eos voluptatem voluptas aut sunt est. Consequatur doloribus labore aliquam sed quia. Quia nostrum quod cumque architecto et cum. Officia aut aut quia at velit impedit. Quasi soluta vero aliquid rerum. Odit qui dolorum consectetur nam. Doloribus placeat rerum hic veritatis molestiae veniam. Et ut eligendi et dolorem. Rem repellendus eum distinctio provident id officia ut atque. Vero porro ipsum laborum deserunt voluptas animi molestiae. Dicta voluptate sapiente animi. Exercitationem asperiores consequatur distinctio qui. Consequatur magnam similique in dolorum ea et quaerat. Explicabo sit optio vitae eligendi. Voluptas soluta in quis voluptatem. In officiis dolor libero. Mollitia quia voluptatem numquam non. Recusandae qui eos tempore ut rerum dolore aut nesciunt. Facere et molestiae laborum in amet ut iure. Quia et fuga perferendis voluptatum odio quisquam. Et quidem dolorem omnis et iure. Deserunt officia eius error sint est id ut. Illum eligendi corrupti vitae delectus voluptas rerum incidunt dolores. Dolore temporibus qui sunt quia. Ea neque suscipit esse est non maiores.', '17.00', 0, NULL, NULL, NULL),
(10, 'rerum-nobis-in-libero-inventore-debitis-aut-et-occaecati', 'Madge Wehner', 'Sint ipsum esse id reprehenderit ea. Enim quidem deserunt sit. Totam nihil commodi incidunt ipsa. Ut distinctio velit maiores earum libero saepe quo. Iste quae numquam optio consequatur recusandae nihil molestias distinctio. Quam omnis maiores illum dicta voluptas odio. Facere nisi quaerat dolores recusandae laudantium eos. Consequatur recusandae et ut asperiores autem odit. Nostrum cupiditate facere laudantium. Saepe ullam distinctio aut libero eum temporibus id. Animi vero enim ducimus dolorum. Est et nihil excepturi qui occaecati nisi qui magnam. Doloribus autem fuga eveniet mollitia. At qui adipisci natus voluptas recusandae quia ad. Est error quisquam ea neque natus et. Assumenda distinctio labore laudantium suscipit voluptatum dolorem. Optio qui id saepe quaerat et ut velit. Mollitia saepe fugiat adipisci sint consequuntur odit qui blanditiis. Ratione error suscipit distinctio nesciunt sequi necessitatibus. Harum perspiciatis quia aliquam officia.', '9.00', 0, NULL, NULL, NULL),
(11, 'voluptas-maiores-vero-saepe-at-ipsum-et-vel', 'Josefa Cummings', 'Harum et expedita est asperiores similique. Tempora quae beatae qui sed voluptas hic suscipit sed. Vitae non ut aut voluptas quia adipisci accusamus. Quo illo accusantium harum quidem. Pariatur exercitationem quod a maxime corporis ipsam amet. Fugit omnis laboriosam dolor quasi provident molestiae est ab. Deleniti totam nisi voluptatum non. Consequuntur aliquid numquam et placeat laboriosam. Consequatur non sint incidunt enim. At quos commodi explicabo ea ratione fugit non non. Quae sint sit maxime. Mollitia autem impedit qui itaque qui tenetur enim esse. Est dolore aut nemo nihil natus nam. Praesentium adipisci est consequatur ea natus saepe. Natus rem ducimus et. Facere consequatur quam qui nisi. Et porro itaque et qui consequatur ut eos. Cumque qui sed aut.', '14.00', 0, NULL, NULL, NULL),
(12, 'fuga-sit-reiciendis-quibusdam-veritatis-aut-optio', 'Dr. Mervin Jacobs I', 'Voluptates ea aspernatur dolor ex quibusdam dignissimos dolores. Non est asperiores quos et non id in. Consectetur consectetur est aut mollitia quaerat excepturi esse. Tempore ipsum rerum quibusdam a aspernatur quasi et. Labore consequatur omnis id adipisci. Impedit ratione reprehenderit delectus ipsum. Cumque quia voluptas est autem voluptatem aut ipsam. Porro nemo veniam fugit veritatis consequatur quo. Corporis aut aut et et consequuntur quisquam modi. Sit ipsum qui veritatis iste occaecati et. Tenetur quibusdam porro ut tempore illo. Vero dolorum recusandae delectus omnis qui magnam et exercitationem. Voluptatem enim nobis minus.', '9.00', 0, NULL, NULL, NULL),
(13, 'necessitatibus-qui-est-beatae-ea', 'Prof. Deshawn Zemlak I', 'Et perspiciatis minima a aliquam praesentium qui. Veritatis eius sed nesciunt veniam repudiandae similique. Dolore in facilis cupiditate veniam. Earum earum perspiciatis est accusamus ipsa est ducimus quo. Aut sequi quia nobis quas dolores autem. Voluptatibus et sed est quas voluptates quas qui. Id occaecati id consequatur omnis iure quisquam. Laboriosam velit quia at ut id ut et. Nihil rerum odio qui. Dignissimos ratione non tenetur sapiente officia. Libero iure odit doloremque tenetur. Fuga eum omnis voluptatem quam voluptatem ut est maiores. Et possimus ut ab rerum. Labore ipsam ut velit voluptas iusto omnis. Unde ex molestiae asperiores et minima sint. Porro officia nam et excepturi eius tempora. Qui error ea sequi consectetur. Similique fugit totam est. Sint nihil rerum dolore harum. Maxime possimus sequi reiciendis quis dolorem molestias ea. Distinctio soluta omnis tempora dolorem ea quos nulla cumque. Nam vel perspiciatis non mollitia magnam.', '16.00', 0, NULL, NULL, NULL),
(14, 'consequuntur-et-praesentium-voluptatem-in-dolor', 'Erick Price', 'Enim maiores culpa laudantium et in. Ut ut occaecati rem consequatur est aliquid. Est molestiae sed fuga earum quam. Odio ducimus natus in nulla laborum cum non. Error quis et inventore. Voluptas saepe debitis et et et sapiente. Corrupti similique ratione explicabo voluptatem saepe corporis qui. Ex enim repellat autem iure eveniet et ullam. Rerum et dolorem debitis minus optio. Repellat inventore quibusdam ex tempora. Aliquid ipsum nisi possimus in sed aut itaque. Occaecati voluptatem vitae at necessitatibus optio. Quasi ad enim dolorum neque consequatur consequatur cupiditate. Nisi animi in perspiciatis voluptatibus sapiente esse. Magnam consequuntur sed perspiciatis et molestiae non. Omnis qui cum consequuntur sit nulla. Commodi sequi ipsum sed iure autem. Alias ullam eveniet excepturi expedita quia. Molestiae nihil sit perspiciatis qui fuga qui natus. Sunt excepturi aut sed illo quod rem. Consequatur odit fugit ab omnis. Ratione dolores totam incidunt occaecati et earum facere. Impedit harum illo aut omnis odit. Distinctio perspiciatis ut necessitatibus doloremque non nihil saepe iusto. Ut perspiciatis ut cupiditate illum et neque ad. Ex officiis sed nemo minus similique vel saepe ad.', '16.00', 0, NULL, NULL, NULL),
(15, 'harum-fugiat-culpa-omnis-voluptatem', 'Kasandra Schiller PhD', 'Aliquid debitis recusandae ea. Repellat voluptas ducimus accusamus repellendus aspernatur accusamus assumenda. Tempore facilis id laudantium aspernatur. Doloribus perferendis et distinctio provident possimus enim voluptatem. Magni sit pariatur maxime aut fugiat ea laboriosam. Rem rerum consequatur ea voluptatum at sed delectus. Porro excepturi voluptatem et ut ullam molestias ex. Est sapiente optio nihil porro eveniet voluptatibus sunt. Cupiditate cupiditate quasi nulla numquam. Ut et minus voluptatibus labore ducimus beatae. Nam animi illum exercitationem. Et in asperiores consequatur. Eius ipsa eius aliquam adipisci omnis nam. Eos consequatur quibusdam corrupti et dolor. Et vitae pariatur soluta ut. Est dolorem eum cumque et. Unde accusamus sed et itaque delectus. Rerum molestias nam ex nemo voluptate ut.', '1.00', 0, NULL, NULL, NULL),
(16, 'in-nobis-nam-cum-modi', 'Dr. Columbus Koelpin', 'Aut eum atque hic fuga neque nihil non dolorum. Sint facilis sint non tempore sapiente est ipsam. Non accusamus ut officiis amet aut. Distinctio adipisci non culpa minus qui. Et et iste ut sequi voluptatem hic a. Minus est nesciunt totam voluptas vel consequatur. Deserunt ad et nihil aut ut error. Ipsum at soluta architecto est voluptatum blanditiis ipsum harum. Reprehenderit est ut assumenda qui illum sunt. Culpa similique molestias rerum numquam deserunt quas tenetur. Sequi debitis eum quo eius non doloribus. Fuga ut sed nulla asperiores vel autem cum. Maiores quis eaque molestiae et voluptatum. Velit rerum quis nemo inventore labore voluptas eum. Assumenda repudiandae ea quas et dicta dolore. Debitis error hic reiciendis officiis. Et cupiditate consequuntur a similique et. Atque voluptatem et recusandae quam quaerat animi facilis unde. Optio corporis non ipsa. Sit alias ea veritatis consequatur et deleniti non.', '7.00', 0, NULL, NULL, NULL),
(17, 'et-nemo-voluptates-repellat-nihil-qui-ducimus-adipisci', 'Estevan Padberg', 'Et iusto sit et aut aliquam. Repellendus dolor tenetur veritatis deserunt. Sit quia non et illo distinctio voluptatem. Illum accusamus architecto non qui ut reprehenderit. Blanditiis necessitatibus ipsam autem veritatis culpa voluptatem laudantium mollitia. Rerum et quam sint aut officia. Facere in earum minima. Id et laborum veniam. Consequatur minus voluptatem porro dolorem eveniet et. Est ut id dolor molestiae voluptate corrupti est. Voluptas quis non et nihil pariatur sit commodi. Et sint repellat et ut temporibus quas commodi neque. Beatae quod et accusantium esse assumenda porro illo. Et eligendi omnis odit corrupti. Ut sed harum accusantium ducimus. Rerum ratione eos sit nemo. Est doloremque officiis facilis sit. Aperiam qui amet omnis perspiciatis praesentium. Quasi et neque quo corrupti voluptas. Et dicta esse qui doloribus atque voluptatem cum. Sequi totam accusamus reprehenderit vel fugiat.', '4.00', 0, NULL, NULL, NULL),
(18, 'rem-rerum-ratione-officiis-soluta-harum', 'Adaline Boehm', 'Ut quae dolorum error nemo numquam labore aliquid. Non enim est illum ipsam. Debitis non architecto expedita nam dolor asperiores facilis. Commodi ut tempore labore nobis. Omnis sapiente esse dolores fugit at iste reprehenderit explicabo. Pariatur praesentium et suscipit est quia atque. Blanditiis esse facere doloribus minus voluptas. Exercitationem et tenetur magni tempore. Explicabo quis et minus error quos vitae. Dolor iste qui fugiat laboriosam quae alias. Voluptatem cum officiis dignissimos cumque asperiores consectetur corrupti. Iusto natus et eaque dignissimos at ipsa. Sit pariatur debitis exercitationem optio qui voluptas. Vitae quidem velit debitis temporibus rerum architecto. Expedita quos tempore assumenda eum eum quasi sequi qui. Facere similique laboriosam occaecati vero quo. Delectus totam molestiae voluptatibus provident. Quis dolores et asperiores optio et mollitia perferendis nisi. Omnis voluptatem dignissimos et omnis velit ea dolor voluptates. Error nisi voluptatem ab rem non. Sunt explicabo rerum nam neque. Ut iusto est nostrum consequatur consequatur sit error. Quo at repudiandae qui facilis soluta odit voluptates nesciunt. Qui occaecati tenetur repellendus. Id ipsa voluptate quo. Incidunt ullam ullam quis voluptatem dolorum. Ipsam dolor fuga iste quis.', '12.00', 0, NULL, NULL, NULL),
(19, 'modi-nemo-fugit-id-iusto-nihil-sint-voluptatem', 'Dr. Clemens Schinner DVM', 'Tempore iure placeat id placeat. Molestias reiciendis maiores quidem nulla. Illo omnis incidunt qui quia. Qui minima dolores laborum. Aut et soluta cum id nemo. In non nihil quas. Necessitatibus impedit optio excepturi quibusdam inventore at eum. Dignissimos et aliquid repellat. Officiis expedita cupiditate animi provident veritatis molestiae. Cupiditate eum reiciendis id autem odio. Atque corporis odio ipsam ex reprehenderit ex. At laboriosam odit a ut. Optio sequi eos alias nulla. Animi cum voluptate ut. Tenetur perspiciatis dolorem deleniti magni. Et et dolor tempore et qui est quia nemo. Itaque minima saepe voluptas omnis sequi. Architecto repudiandae hic exercitationem placeat. Aperiam numquam est fugiat provident. Quia impedit natus accusantium non. Recusandae reiciendis officia est voluptas.', '1.00', 0, NULL, NULL, NULL),
(20, 'delectus-mollitia-velit-necessitatibus-esse-ut', 'Aisha Wilderman', 'Sit mollitia ab magni. Illum tempore provident dignissimos sit. Earum molestiae repudiandae iste expedita. Harum et inventore eos dignissimos optio corporis minus. Delectus nobis quaerat consequatur quis est soluta. Minus autem aut qui voluptatem. Itaque laudantium cum quos ullam in. Suscipit sapiente dolorem est est quasi sunt quod et. Libero alias sunt quia minus mollitia. At vitae ut magnam nulla. Neque maiores ea quibusdam aut. Consequuntur et dolorem perspiciatis. Ut aut illo incidunt id inventore molestiae. Soluta aspernatur aliquid non rem voluptates. Dolore dicta nesciunt aut asperiores cupiditate voluptatem quis. Ullam accusantium officiis explicabo qui libero. Dicta eligendi debitis doloribus tempora delectus quas. Officiis dolore perferendis et sit facere. Molestias ut in aut nam magni aut. Accusamus qui necessitatibus mollitia non illum atque earum. Atque quae mollitia quis quod occaecati est. Magnam dolorum expedita qui itaque consequuntur aut. Dicta distinctio odit et aut corporis repellendus pariatur. Qui excepturi ea repudiandae nesciunt sequi aut.', '10.00', 0, NULL, NULL, NULL),
(21, 'hic-ut-facere-assumenda-recusandae', 'Eric Greenholt', 'Nemo corrupti ut rerum qui quae nesciunt eligendi. Est voluptas incidunt illo omnis est. Mollitia mollitia voluptatibus velit voluptatum molestias. Deleniti facere molestias totam nobis nostrum saepe. Ab quos dignissimos odio ullam. Et velit architecto eius eos. Nihil maiores dolorem inventore eum ipsum et vero. Fuga et sed maiores accusantium. Repellat quia occaecati saepe et. Et natus velit impedit libero magni nostrum. Distinctio numquam suscipit quos dolor quod. Voluptates facere eaque eos tempora sed et ut aut. Qui est hic qui dolores. Est neque exercitationem non eum quo. Tempore et sit quibusdam laborum dolor. Sapiente nesciunt sed impedit sunt dolorum consequatur. Suscipit reprehenderit molestias est iste ex quo laboriosam. Quia veniam eius aperiam doloribus omnis vel. Tempore eligendi sit vel est quasi. Ratione et quasi est minus architecto quia voluptatem. Laborum odio ea quaerat at et nemo veritatis. Ratione voluptatem est sit omnis animi possimus. Sapiente odit odit voluptates earum illo. Enim recusandae non est quam harum. Et neque vel qui est rerum excepturi. Ipsam illo aut rem dolorum et architecto. Maiores et corporis beatae ipsa. Vitae eligendi itaque omnis.', '7.00', 0, NULL, NULL, NULL),
(22, 'facere-accusantium-nam-ab-eligendi-officiis-incidunt', 'Nora Cruickshank', 'Esse sequi quis unde quia deleniti ut iure. Numquam sunt est tempora debitis alias dolores vero eius. Nulla neque odit distinctio rerum voluptatem vero nemo. Est sunt alias qui amet dolores dignissimos. Ipsam voluptatem veniam voluptatem at qui labore. Et itaque ut consectetur numquam facilis corrupti. Rem tempore rem ut enim qui assumenda dolorum. Quia est sed ducimus in velit. Incidunt id rerum tenetur est. Rerum atque ut illo optio deleniti repudiandae qui. Voluptates quod dolore labore aut qui. Repellat cum quos temporibus. Eum deleniti modi molestiae. Placeat quia illo blanditiis. Qui maxime officiis doloribus qui perferendis. Non laudantium dolore animi velit odit et quaerat. Sed voluptatem ut libero omnis iste ea explicabo. Facilis quod et sit error dolorem et aut. Aperiam enim at et vel modi minus expedita.', '2.00', 0, NULL, NULL, NULL),
(23, 'vel-quis-dolores-amet-sed-omnis', 'Dr. Jasmin Prosacco MD', 'Labore laboriosam aliquam officia nisi eaque dolores nisi perspiciatis. Voluptates voluptatem impedit animi eligendi eum aliquid commodi. Atque perspiciatis ex explicabo consequatur ducimus cupiditate et. Et praesentium id ipsam aliquid et laborum quae. Laborum vel repudiandae ipsam saepe. Dicta modi magni ut officiis fuga ab sed. Dolores vel accusantium nobis dolorem impedit ex occaecati. Libero excepturi animi quas consequuntur. Excepturi ipsum esse neque consequatur. Facere inventore deleniti quis eos beatae. Et dolores nesciunt praesentium aut voluptas ullam. Cupiditate cumque magnam ducimus. Delectus ut qui consequatur est sed eaque. Ullam nemo modi aut. Recusandae ut enim rerum sed. Ut a consequuntur rerum sapiente qui reiciendis sit rerum. Necessitatibus tempore mollitia sapiente et. Temporibus ut nemo facere perferendis ad non dolor praesentium. Vel maiores similique fugiat quam. Nobis dolorum repellat voluptate ut aperiam. Temporibus explicabo et repellendus sunt sed ut aliquam qui. Inventore consectetur quidem dolor voluptate eius voluptas facilis. A voluptas corporis dolor dolor consequatur sint sunt. Nihil ut cum aspernatur voluptates eos. Impedit quia dignissimos eligendi non. Tempora optio eos quidem placeat commodi aut iste commodi. Sed eos temporibus eum temporibus.', '11.00', 0, NULL, NULL, NULL),
(24, 'palma-hegmann', 'Palma Hegmann', 'Quae ipsa ad perferendis sunt ab iusto necessitatibus. Velit est molestias aut est corrupti. Ad nobis doloremque provident id excepturi consequatur. Vero dolore repellendus non suscipit iusto veniam ut. Inventore libero minima autem sed omnis unde eius. Et aliquid numquam sint nostrum. Doloribus perspiciatis eum quaerat. Vero ullam voluptatem aut omnis. Dolores delectus explicabo rem molestiae. Aut consectetur rerum quia maiores. Nihil ut fuga ut magnam distinctio dolorem illo. Eius quae aperiam nihil aut. Perferendis et qui ab voluptas deserunt assumenda numquam ex. Excepturi voluptas sit commodi sint officiis. Vero explicabo maiores inventore harum. Ut dicta voluptatem natus. Eum et iste iure officiis. Sit repudiandae sed dignissimos accusantium. Eveniet enim dolorem eos corporis iusto consequatur. Libero quidem consequatur non illum veritatis voluptas numquam. Sunt unde et odio. Nihil eius quaerat nemo maiores omnis et. Officia earum nobis voluptatem eaque et maiores enim. Aperiam ipsum ea et. Corporis ex necessitatibus optio maiores quis aut. Officia qui voluptas commodi numquam vel voluptate.', '15.00', 0, NULL, '2022-09-27 08:49:15', NULL),
(25, 'dolor-optio-occaecati-quisquam-necessitatibus', 'Susana Quigley Sr.', 'Aut sit sunt placeat blanditiis officia magnam. Eos aut facere saepe labore doloremque. Fuga totam occaecati soluta accusantium tempora temporibus provident. Deserunt omnis sit repellendus ut. Sed velit sit quia quia. Consequuntur dicta culpa eaque nemo optio aliquid sunt. Alias nemo nisi reprehenderit facere rerum eos voluptas repellendus. Molestias a sit sit vel iure fuga molestias voluptatibus. Voluptas minus qui non rerum aliquid tenetur. In ea mollitia ut unde. Pariatur ipsa voluptatem ut doloribus quam inventore officia sint. Enim sit aliquam pariatur cupiditate nihil ducimus. Quam sit enim quisquam enim dolor quo hic. Assumenda est quo sapiente consequatur et quia harum. Hic possimus sapiente nihil vel ab autem vitae.', '3.00', 0, NULL, NULL, NULL),
(26, 'ms-norma-jones-v', 'Ms. Norma Jones V', 'Aut qui ipsam libero tenetur ut. Velit sunt minus aut alias ducimus enim dolores doloribus. Harum voluptatibus veritatis placeat laudantium. Non non quidem et vero sint et. Et odio hic corporis mollitia accusantium. Et et voluptatem et. Sit nisi ex tenetur culpa et amet quas dignissimos. Ratione nesciunt inventore consequatur labore illo. Quo consequuntur voluptatem excepturi neque eaque laboriosam. Veritatis voluptatem dolores culpa eos. Dolores eos nam necessitatibus sed provident quos consequatur et. Vel sed dicta dolorum. Fuga neque dolorem ut sit quaerat. Provident omnis ipsum est assumenda laborum dignissimos natus. Laboriosam amet cupiditate saepe accusantium aut. Ratione nemo veritatis sequi molestiae iure deserunt unde. Quis temporibus quia aut cupiditate a voluptatem voluptatem. Omnis molestiae eum quas sunt illum. Fuga qui excepturi odit exercitationem autem qui vel. Dolores ut aliquid neque id rerum. Blanditiis dolores iste repellendus tenetur et harum. Sed maxime adipisci sunt eum est rerum eaque. Ab aspernatur odio nisi sequi nesciunt vitae sed reprehenderit. Est et amet omnis rerum minima. Veritatis quia et sit debitis similique et sed.', '17.00', 0, NULL, '2022-09-23 21:23:30', NULL),
(27, 'prof-theresa-fritsch-iv', 'Prof. Theresa Fritsch IV', 'Dolorum optio libero molestiae quos et. Inventore nesciunt ea facilis recusandae commodi. Distinctio occaecati iste quas veritatis et repudiandae consectetur. Aut sed aliquam rerum nesciunt iusto a omnis. Architecto iste laborum rerum. Sint saepe earum voluptas quia in dolor. Quia voluptatem perferendis qui repellendus. Placeat nam eos quo repellat. Rerum iure natus esse commodi libero. Reprehenderit qui excepturi adipisci quam explicabo at voluptatum repellat. Qui non minima sint minus ut nulla. Aspernatur dolor non aliquam blanditiis eius. Possimus praesentium sed maiores ipsum omnis molestias. Quae nobis repudiandae asperiores quisquam dolorem. Nemo eum velit quia. Ducimus totam qui ratione eligendi. Corporis et pariatur commodi. Aliquam in possimus et eveniet consequatur. Placeat qui modi nesciunt hic omnis qui sit. Facere est earum fugiat. Ipsa et illum ab vel atque. Est dolorem voluptatem facere. Quam voluptatem porro aliquam aut. Minus sunt aut occaecati qui tempore omnis est. Fuga architecto cupiditate eius temporibus id non. Necessitatibus nemo iusto molestias ad ipsam. Culpa optio dignissimos sunt et nam reprehenderit.', '10.00', 0, NULL, '2022-09-23 21:23:25', NULL),
(28, 'jed-lockman-md', 'Jed Lockman MD', 'Deleniti distinctio omnis dolor natus tempora libero dicta. Iusto eos esse quisquam. Aut perferendis nam in magnam iure amet et. Incidunt saepe voluptatem illum odit quas. Sit itaque commodi impedit vel necessitatibus. Id nemo assumenda ipsam unde. Aut minus numquam vero velit ut maxime enim. In dolores excepturi nam eaque et neque maxime iure. Enim maxime inventore cum odio. In qui voluptatibus amet et. Perspiciatis rerum autem odio et laudantium sint eaque. Sunt beatae in qui id placeat. Et nobis omnis numquam nobis beatae quia. Soluta incidunt nulla eum rerum. Vitae et facere maiores voluptatum. Dolorum fuga et est maiores. Id vel pariatur labore fugiat et. Sit quis eius commodi nulla minus laboriosam voluptatum. Minima voluptas sed laboriosam maxime quibusdam. Aut velit cumque maxime. Occaecati ut natus asperiores voluptatem odio nihil. Eveniet ut natus tempore ea at laudantium tempore.', '9.00', 0, NULL, '2022-09-23 21:23:02', NULL),
(29, 'everette-harris', 'Everette Harris', 'Reiciendis quia voluptatem dolor doloribus nesciunt dolorem fugit. Fugiat veritatis est aliquid. Doloribus eos cumque repellendus. Sunt minima accusamus quos dolorum. Itaque libero quam error et quibusdam sint. Vero explicabo mollitia voluptatibus delectus qui ullam soluta maxime. Sunt dolor dolores est et nobis enim et. Doloremque unde sapiente placeat minima fugiat dolorum. Et eos occaecati doloribus molestiae omnis dicta dolores. Velit veritatis omnis praesentium et rerum. Dolor qui architecto deserunt accusantium et atque. Perferendis dolores voluptatibus commodi fuga voluptas delectus eius. Blanditiis recusandae rerum est molestiae nostrum. Ex et est autem itaque non sint aut dicta. Et quidem unde qui voluptas quia fugit quis exercitationem. Odit ducimus autem quasi molestiae et eos sed velit. Quasi fugit deserunt id accusamus. Nemo consequatur laudantium nisi fuga.', '5.00', 0, NULL, '2022-09-23 21:22:51', NULL),
(41, 'tablet', 'tablet', 'ewqeqweq', '343.00', 0, '2022-09-23 21:25:50', '2022-09-23 21:25:50', NULL),
(42, 'weq', 'weq', 'qewqw', '34.00', 3, '2022-09-23 21:26:06', '2022-09-23 21:26:06', NULL),
(43, 'ewq', 'ewq', 'eqwqe', '3400.80', 0, '2022-09-23 21:26:20', '2022-09-25 08:33:16', NULL),
(44, 'weqeij', 'weqeıj', 'qweeqw', '340.00', 3, '2022-09-23 21:26:37', '2022-10-08 10:42:05', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `show_slider` tinyint(1) NOT NULL DEFAULT 0,
  `show_opportunity_of_the_day` tinyint(1) NOT NULL DEFAULT 0,
  `show_featured` tinyint(1) NOT NULL DEFAULT 0,
  `show_lots_selling` tinyint(1) NOT NULL DEFAULT 0,
  `show_discount` tinyint(1) NOT NULL DEFAULT 0,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `show_slider`, `show_opportunity_of_the_day`, `show_featured`, `show_lots_selling`, `show_discount`, `product_image`, `created_at`, `updated_at`) VALUES
(11, 28, 1, 0, 1, 1, 1, '38-1663961654.webp', '2022-03-12 20:20:56', '2022-03-12 20:20:56'),
(12, 27, 1, 0, 1, 1, 1, '44-1663979197.jpg', '2022-03-12 20:21:18', '2022-03-12 20:21:18'),
(13, 26, 1, 0, 1, 1, 1, '44-1663979197.jpg', '2022-03-12 20:21:34', '2022-03-12 20:21:34'),
(14, 24, 1, 0, 1, 1, 1, '44-1663979197.jpg', '2022-03-12 20:21:46', '2022-03-12 20:21:46'),
(48, 21, 0, 0, 0, 0, 0, '44-1663979197.jpg', '2022-03-12 20:55:48', '2022-03-12 20:55:48'),
(57, 30, 0, 0, 0, 0, 0, '44-1663979197.jpg', '2022-03-13 09:57:24', '2022-09-23 16:37:39'),
(59, 7, 0, 0, 0, 0, 0, '44-1663979197.jpg', '2022-03-13 10:25:36', '2022-03-13 11:15:28'),
(61, 2, 0, 0, 0, 0, 0, '44-1663979197.jpg', '2022-03-13 11:16:10', '2022-03-13 11:16:10'),
(63, 1, 0, 0, 0, 0, 0, '44-1663979197.jpg', '2022-03-13 11:21:57', '2022-09-26 17:49:37'),
(65, 38, 0, 0, 0, 0, 0, '44-1663979197.jpg', '2022-03-13 17:24:03', '2022-09-23 16:34:14'),
(66, 3, 1, 0, 1, 1, 1, '44-1663979197.jpg', NULL, NULL),
(67, 39, 0, 0, 1, 0, 0, '44-1663979197.jpg', '2022-09-23 21:14:21', '2022-09-23 21:14:21'),
(68, 40, 1, 0, 0, 0, 0, NULL, '2022-09-23 21:17:07', '2022-09-23 21:17:13'),
(69, 29, 1, 0, 1, 1, 1, NULL, '2022-09-23 21:22:51', '2022-09-23 21:23:10'),
(70, 41, 1, 0, 1, 1, 1, '41-1663979150.jpg', '2022-09-23 21:25:50', '2022-09-23 21:25:50'),
(71, 42, 1, 0, 1, 1, 1, '42-1663979166.jpg', '2022-09-23 21:26:06', '2022-09-23 21:26:06'),
(72, 43, 1, 1, 1, 1, 1, '43-1663979180.jpg', '2022-09-23 21:26:20', '2022-09-23 21:26:20'),
(73, 44, 1, 0, 1, 1, 1, '44-1663979197.jpg', '2022-09-23 21:26:37', '2022-09-23 21:26:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_evaluation`
--

CREATE TABLE `product_evaluation` (
  `id` int(10) UNSIGNED NOT NULL,
  `point` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_evaluation`
--

INSERT INTO `product_evaluation` (`id`, `point`, `comment`, `comment_image`, `user_id`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'asdasdas', NULL, 17, 43, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_surname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_key` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isit_active` tinyint(1) NOT NULL DEFAULT 0,
  `isit_executive` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `name_surname`, `email`, `password`, `activation_key`, `isit_active`, `isit_executive`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aytaç 2222e2', 'aorkune@gmail.com', '$2y$10$aKdKQBpSk6iOAwaRSPnkZeoT4KIIqKNr/d6zqHDuAI3g.RZ3DrmZ2', 'NULL', 1, 1, 'xrpf3emmsxjQeCqGh96c1Z31m7am65MPL7uTWnkMvvHstAfUTMW9vh5GI1FV', '2022-03-04 20:32:06', '2022-03-11 17:58:04'),
(6, 'saaAhmet Orkun Eren', 'asdaorkuneww@gmail.com', '$2y$10$58sUMlkK5yOe9g2t5X6naurCelnzD9dN/aClErPfY9dHpZHKAKhLa', NULL, 1, 1, NULL, '2022-03-07 21:09:03', '2022-03-11 10:13:06'),
(12, '2', '2@stu.istinye.edu.tr', '$2y$10$HqyNhD7knhGYaKnwapAIeOdqhKT.iQJr7lrj9GseHJMA.stR6NwqC', NULL, 1, 1, NULL, '2022-03-07 21:25:53', '2022-03-07 21:25:53'),
(15, '111', '231@gmail.com', '$2y$10$PYlR0NoH8PmQargyW6y1ne5kczEkku/V.j6XnvF7ttRuCAcgPx6IG', NULL, 0, 0, NULL, '2022-03-08 17:57:47', '2022-03-08 17:57:47'),
(17, 'aytac', 'aytacipekel@gmail.com', '$2y$10$VNqfQ7Wfy0Pc7IVJPDXFjOTDW.4nHBiwgP5vAjvP2WXJvXm9k1SgK', 'IRDaftC3gzKuBZjp73XR08auLzkoFdrWo6mtSMHM76cBVLwgGvwowI6Yffl2', 1, 1, 'xgtsghqBhX4h0r2NtXOgGIFABlS0Q6S7LJ3BWTcPaAe4qD9cDg7iKUQIiJSZ', '2022-09-30 08:21:13', '2022-09-30 08:21:13'),
(18, 'ipekel@', 'ipekel@gmail.com', '$2y$10$m9ylF2sGfMRsx4wMju02q.eNLi18QWrHPRf49yhGvWpKrwrUE2MRO', 'sFNTQKABHUY04zPdPOSgEotE7XHd0mrmRrcfP4GHaeChWxevvC95gVv6tYOm', 1, 1, NULL, '2022-10-08 10:47:50', '2022-10-08 10:47:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `address`, `phone`, `mobile_phone`) VALUES
(10, 1, 'sdfsfdsf', '222 222 22 22', '555 555 55 55'),
(11, 6, 'wqewqe', '222 222 22 22', '555 555 55 22'),
(12, 17, 'ıhuıhjıııh', '555 555 55 55', '222 222 22 22'),
(13, 18, 'joookşkjo', '2222222222', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brand_product`
--
ALTER TABLE `brand_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_product_brand_id_foreign` (`brand_id`),
  ADD KEY `brand_product_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_main_cart_id_foreign` (`main_cart_id`),
  ADD KEY `cart_product_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_product_user_id_foreign` (`user_id`),
  ADD KEY `favorite_product_collection_id_foreign` (`collection_id`),
  ADD KEY `favorite_product_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `favorite_product_collection`
--
ALTER TABLE `favorite_product_collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_product_collection_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_main_cart_id_unique` (`main_cart_id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_detail_product_id_unique` (`product_id`);

--
-- Tablo için indeksler `product_evaluation`
--
ALTER TABLE `product_evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_evaluation_user_id_foreign` (`user_id`),
  ADD KEY `product_evaluation_product_id_foreign` (`product_id`),
  ADD KEY `product_evaluation_order_id_foreign` (`order_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Tablo için indeksler `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_detail_user_id_foreign` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `brand_product`
--
ALTER TABLE `brand_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `favorite_product`
--
ALTER TABLE `favorite_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `favorite_product_collection`
--
ALTER TABLE `favorite_product_collection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Tablo için AUTO_INCREMENT değeri `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Tablo için AUTO_INCREMENT değeri `product_evaluation`
--
ALTER TABLE `product_evaluation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `brand_product`
--
ALTER TABLE `brand_product`
  ADD CONSTRAINT `brand_product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD CONSTRAINT `favorite_product_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `favorite_product_collection` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_product_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `favorite_product_collection`
--
ALTER TABLE `favorite_product_collection`
  ADD CONSTRAINT `favorite_product_collection_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_evaluation`
--
ALTER TABLE `product_evaluation`
  ADD CONSTRAINT `product_evaluation_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_evaluation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_evaluation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
