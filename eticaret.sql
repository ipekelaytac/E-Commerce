-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Oca 2023, 23:37:43
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.29

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

--
-- Tablo döküm verisi `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_image`) VALUES
(1, 'aytacipekel', '1-1673177528.jpg');

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
(1, 1, '2023-01-07 09:07:07', '2023-01-07 09:07:07'),
(2, 1, '2023-01-08 09:42:02', '2023-01-08 09:42:02');

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
(1, 1, 27, 1, '11.33', 'beklemede', '2023-01-07 09:08:38', '2023-01-07 09:08:38'),
(2, 1, 28, 1, '7.04', 'beklemede', '2023-01-07 09:08:42', '2023-01-07 09:08:42'),
(3, 1, 29, 1, '19.57', 'beklemede', '2023-01-07 09:08:44', '2023-01-07 09:08:44'),
(4, 1, 30, 1, '3.45', 'beklemede', '2023-01-07 09:08:48', '2023-01-07 09:08:48'),
(5, 2, 28, 2, '7.04', 'beklemede', '2023-01-08 09:42:02', '2023-01-08 09:42:02');

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
(5, 1, 'Kamera', 'kamera', NULL, NULL),
(6, NULL, 'Kitap', 'kitap', NULL, NULL),
(7, 6, 'Edebiyat', 'edebiyat', NULL, NULL),
(8, 6, 'Sınavlara Hazırlık', 'sınav', NULL, NULL),
(9, 6, 'Çoçuk', 'cocuk', NULL, NULL),
(10, 6, 'Bilgisayar', 'bilgisayar', NULL, NULL),
(11, NULL, 'Dergi', 'dergi', NULL, NULL),
(12, NULL, 'Mobilya', 'mobilya', NULL, NULL),
(13, NULL, 'Dekarasyon', 'dekarasyon', NULL, NULL),
(14, NULL, 'Kozmetik', 'kozmetik', NULL, NULL),
(15, NULL, 'Kişisel Bakım', 'kisisel-bakim', NULL, NULL),
(16, NULL, 'Giyim ve Moda', 'giyim-moda', NULL, NULL),
(17, NULL, 'Anne ve Çoçuk', 'anne-cocuk', NULL, NULL);

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 7),
(8, 2, 8),
(9, 3, 9),
(10, 3, 10),
(11, 2, 30),
(12, 2, 29),
(13, 2, 28),
(14, 4, 28),
(15, 6, 28);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `collection`
--

CREATE TABLE `collection` (
  `id` int(10) UNSIGNED NOT NULL,
  `collection_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `collection`
--

INSERT INTO `collection` (`id`, `collection_name`, `slug`, `user_id`) VALUES
(1, 'sdas', 'sdas', 1);

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
(1, 1, NULL, 28, '2023-01-07 09:13:14', '2023-01-07 09:13:14'),
(2, 1, 1, 28, '2023-01-07 09:13:17', '2023-01-07 09:13:17'),
(3, 1, NULL, 23, '2023-01-08 09:43:30', '2023-01-08 09:43:30'),
(4, 1, 1, 25, '2023-01-17 18:02:38', '2023-01-17 18:02:38'),
(5, 1, NULL, 25, '2023-01-17 18:08:15', '2023-01-17 18:08:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(12, '2022_10_14_125011_create_collection_table', 2),
(13, '2022_10_14_125050_create_favorite_product_table', 2),
(14, '2022_10_22_161529_create_product_evaluation_table', 2),
(15, '2022_10_24_103704_create_brand_table', 2),
(16, '2022_10_24_103912_create_brand_product_table', 2),
(17, '2023_01_08_113955_create_subscriber_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_cart_id` int(10) UNSIGNED NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `situation` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_surname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_installments` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`id`, `main_cart_id`, `order_price`, `situation`, `name_surname`, `address`, `phone`, `mobile_phone`, `bank`, `number_installments`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '41.39', 'Siparişiniz alındı.', 'aytaç ipekel', '2222', '(222) 222-22-22', '(222) 222-22-22', 'Garanti', 1, '2023-01-07 09:08:59', '2023-01-07 09:08:59', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `slug`, `product_name`, `comment`, `price`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'et-ipsam-beatae-earum-debitis', 'Prof. Eino Beahan', 'Iusto et et voluptatem aut reiciendis nisi. Et molestiae aliquam a tempora et. Sed excepturi totam accusantium temporibus quod tempore. Modi ut assumenda id porro. Est voluptas non quae occaecati laboriosam. Facere similique repudiandae est et. Expedita culpa asperiores aspernatur necessitatibus molestias itaque. Tenetur perspiciatis sint qui eos voluptatibus quisquam. Expedita et quo qui ut delectus quibusdam perferendis dolor. Et molestiae est error maxime reprehenderit. Tempora est consectetur possimus quia beatae. Ut labore voluptates non eos ipsam magnam. Consectetur temporibus non est est odio. Omnis sit laudantium aut ut quidem sunt qui modi. Ratione earum et sit accusantium rem.', '16.55', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(2, 'porro-ipsum-reiciendis-omnis', 'Dr. Brandt Stokes', 'A ex provident est at sequi. Quis in voluptatem consectetur totam. Temporibus nam dolore et quasi. Quae aperiam hic commodi quo fugit doloribus fuga. Est quia minus dolor id aut fuga. Ad corrupti ut nam blanditiis vitae officia. Consequuntur dolor corporis cum aut reiciendis dolore totam. Voluptate laborum fugiat dolores autem animi. Consectetur dolorem perspiciatis sint quo. Laboriosam cum sint aut expedita sit excepturi. Non commodi quis saepe voluptatem. Vel harum dolores sed ducimus placeat laudantium rem. Ratione officiis quia eum quis. Ut dolorem eius atque ut dolores alias quis.', '15.64', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(3, 'sunt-et-voluptate-ducimus-et-fuga-laborum', 'Ms. Alessia Corwin', 'Sapiente dicta quibusdam laborum nulla. Ut et ratione voluptatem debitis iste fugiat deleniti. Eveniet maxime et commodi possimus eveniet vitae. Qui blanditiis vel nesciunt. Magni cumque a sequi eum voluptates vel. Nihil libero debitis hic omnis. Suscipit est quos voluptas sit. In occaecati dolores doloremque. Nihil commodi reprehenderit eligendi consequatur sed atque. Sint totam odio sed non voluptas et et. Magni voluptatibus qui ex molestias ut. Repudiandae vel voluptatem eius natus. Harum maxime et cum aut aut doloribus exercitationem sit. A laudantium sapiente at aut vitae cum officia. Quos tempore assumenda debitis vero minus qui. Asperiores ad eligendi dolores distinctio fugit necessitatibus itaque. Molestias illum non officia quibusdam perferendis provident. Voluptates voluptates eos delectus dolorum ut dolor. Sit nam vel odit blanditiis aspernatur deserunt aut. Sunt incidunt repellat iure in excepturi. Delectus recusandae numquam asperiores non quas qui velit. Harum qui nisi cupiditate. Optio tempore ipsum eligendi sed quos veniam. Non sit voluptas quidem nulla vero inventore et suscipit. Cumque maxime et possimus nihil deserunt labore eos architecto. Blanditiis omnis et sint est cupiditate quia non.', '5.75', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(4, 'et-eum-amet-commodi-tempore', 'Clementine Fay', 'Corrupti beatae odit quisquam accusantium quis quod. Animi officiis repellendus recusandae animi. Quia voluptas voluptatibus et perferendis natus. Voluptatem ut deserunt voluptatem occaecati sint. Et dolor itaque debitis voluptatem amet et accusamus alias. Provident et et aliquam sed. Sapiente doloribus dolore ut quasi expedita ut. Alias veniam omnis totam autem amet laudantium et. Dolores commodi aut quasi officia unde at. Itaque unde ad qui natus exercitationem est. Veniam voluptates ut consequatur voluptatum nulla qui. Expedita nisi nostrum sapiente exercitationem omnis adipisci. Illum sed unde odio. Qui nihil culpa voluptates quo illum aut esse assumenda. Quis soluta quasi quaerat laudantium ea dolorem. Est placeat asperiores ducimus quis ratione quae. In libero eius modi voluptates sunt quis. Deserunt voluptatem doloribus iste accusamus rerum omnis illum. Ut optio omnis dolorem aperiam aut doloremque dolores aut. Saepe soluta ab nesciunt qui. Eos voluptates animi enim modi. Deleniti aut excepturi ut ut. Nulla rerum perspiciatis temporibus ex facere eveniet. Dolorem enim eum voluptas cumque ea itaque officia. Voluptatem repudiandae cumque eos aut maxime laborum optio. Omnis eos in pariatur debitis debitis commodi.', '9.70', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(5, 'veritatis-quia-molestias-ut', 'Roderick Pouros III', 'Ut ut rerum quia consequatur quia ex nesciunt. Sit sunt voluptatum voluptatem. Voluptas repellendus et deserunt omnis. Inventore qui et ut impedit nostrum est est. Dignissimos ratione iure asperiores sapiente animi. Aut omnis numquam qui ratione corporis vero aut. Recusandae tempore culpa nostrum inventore rerum dolorem aliquid. Expedita qui et voluptatem sit explicabo exercitationem nesciunt. A illo earum velit autem omnis molestias dolorem amet. Cumque rerum vitae quas maxime magnam suscipit. In ab laborum fugiat rerum repellendus consequatur praesentium. Qui harum omnis fugiat. Voluptatem sed dicta dignissimos consequatur. Ad alias id et saepe et sint. Illo et veniam rem quia quibusdam minus. Porro et et minus sunt. Exercitationem rerum rem est doloremque suscipit adipisci dolorem. Fugiat rerum nemo dicta ea fugit voluptatibus. Dolores fuga eum in ex voluptas placeat est. Distinctio eum debitis expedita explicabo cupiditate sunt. Tempore voluptatem blanditiis ullam quam. Harum aliquid sunt doloremque repellat. Ut repellendus illo eveniet rerum. Voluptatem dignissimos laborum exercitationem et amet id sequi. Minus est odio enim sit aut voluptatem saepe. Voluptas nesciunt dolorem saepe et sunt. Ratione sed illo est exercitationem repellat. Non temporibus quibusdam laborum minima.', '17.47', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(6, 'aspernatur-voluptatem-ipsam-ad-mollitia-veritatis-consequatur-consequatur', 'Miss Janiya Dickens', 'Eos perferendis repudiandae omnis quia ratione. Laboriosam magnam ex velit animi animi dolorem. Illo quo optio dicta facilis. Unde occaecati alias consequatur cupiditate deleniti mollitia. Nesciunt nihil amet vero atque odit. Eum amet sit hic ad facilis. Voluptates fugiat mollitia ipsam rerum dolores sit. Dolores aliquid velit voluptatem. Rerum odio voluptas consequatur ut praesentium numquam nisi. Et nihil qui non debitis aspernatur hic tempora. Aut perspiciatis similique explicabo esse. Earum enim neque quis ut quae voluptatem. Reiciendis veritatis consequatur officia ut animi nisi ut tempora. Unde illo assumenda dolorum quas. Beatae enim earum voluptas veritatis accusantium possimus laudantium. Nemo facilis sint reiciendis doloribus vero. Omnis deleniti cumque dolores quisquam dolores. Magni dolorum voluptatum doloremque quo non.', '19.09', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(7, 'quia-unde-molestias-voluptatum-laudantium-corporis-porro', 'Forrest Leannon', 'Aut et reiciendis voluptas optio ea assumenda delectus et. Odit qui sed sit neque eos voluptatum omnis optio. Quisquam adipisci et id amet saepe minima. Rerum nobis voluptatum aut consectetur. Aut eos dolor perferendis aut omnis et. Laborum quia odit sunt quis itaque dolor sint odio. Dolorum saepe tempora sint sunt quo voluptatem. Cumque fugit aut placeat est repellendus ad. Esse inventore sunt officia velit rerum. Temporibus porro in nobis qui. Odit debitis earum fugit quam ducimus consequatur. Id nesciunt optio tenetur tenetur expedita voluptas autem. Atque iure modi molestias id officia est. Dolor molestiae quia neque atque minima. Doloremque sunt aspernatur earum et impedit. Optio assumenda quasi soluta labore nulla occaecati qui. Ut enim eum et. Incidunt reiciendis tempora tenetur mollitia et voluptatem et voluptatem. Illo odit repudiandae nihil. Fugit et beatae hic omnis exercitationem incidunt.', '19.79', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(8, 'temporibus-cupiditate-quis-minima-ad-est', 'Addison Collins II', 'Officiis sed aspernatur quo fugiat. Quia voluptatibus tenetur rem expedita. Voluptatem harum rerum aut cupiditate temporibus. Saepe non laudantium nobis blanditiis aliquam. Id sed odio eos eius nulla quibusdam earum cumque. Expedita accusantium aperiam odio repellat soluta accusamus. Laborum accusantium voluptas et magni ratione recusandae eum suscipit. Omnis fugit aperiam error quos repudiandae autem eaque. Explicabo qui provident quia quis eveniet. Natus ipsa doloribus voluptatem ratione et quia. Repellat rerum qui officia animi minus ea impedit laborum. Nemo eius harum autem maxime quia quidem quo. Ut in voluptas qui non. Ipsum non consequuntur inventore eaque minima eos. Assumenda expedita et illo est veniam. Alias amet est enim occaecati quis similique magnam. Nesciunt eius voluptas veritatis. Aliquam soluta illum dolor quia expedita quia minus.', '13.90', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(9, 'earum-quibusdam-provident-impedit-ut-aut', 'Fred Weber', 'Neque tempore minus laudantium inventore earum. Cupiditate vero autem dolor consectetur aliquam placeat. Accusantium aspernatur nihil aut laudantium fugiat. Ullam aut eveniet eius aut voluptate quasi. Officiis id et ratione minima quo fugiat. Non in aspernatur harum non est reprehenderit tempora. Ut consequatur similique quisquam enim aspernatur odit ut unde. Magni laborum quibusdam qui soluta nobis aut doloribus non. Eius suscipit aut voluptas sit non. Alias quam sint iusto voluptatem quia. Sunt fuga voluptatem omnis eum. Est libero et voluptatem iure est molestias corrupti. Enim ut repudiandae sed porro id. Praesentium eos quisquam maxime et esse officiis. Minus maiores ducimus consectetur aut id recusandae. Quo suscipit saepe aut repellendus itaque pariatur consequatur. Aut temporibus dolor repellendus architecto. Veniam tempore quod dolores quasi. Natus qui qui dolorem dolore consectetur.', '15.06', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(10, 'laudantium-error-et-doloremque-voluptate-ipsam-dolorem-accusantium', 'Kacie Quitzon', 'Sit tempora veritatis debitis ab. Repellat soluta necessitatibus veritatis aut sed ea. Ducimus tempore cupiditate dicta reprehenderit. Est quibusdam libero quo. Fugiat enim non eum labore a. Voluptatum et ab impedit nam voluptate praesentium. Tempora perspiciatis illum cum perspiciatis ea sint. Mollitia laudantium voluptatem non recusandae. Ea et itaque aut ipsum. Ratione aut molestiae iure accusamus. Alias reiciendis nemo amet rem nulla tempora. Unde esse illum saepe incidunt molestias nesciunt. Ullam molestiae repudiandae fugiat blanditiis harum. Aliquam fugit quos laborum reprehenderit iste placeat. Natus quisquam nam aut consequuntur qui et. Quos natus consequatur cum ab voluptas alias. Non incidunt debitis atque ut. Nesciunt omnis id cumque quisquam repellat architecto enim. Aut expedita eum possimus fugiat maiores quis. Et ut magni doloremque quibusdam beatae. Assumenda vitae iste eaque explicabo inventore. Facere magni rerum voluptatem nihil voluptatem. Dignissimos aut nobis et quidem et sit quibusdam.', '13.86', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(11, 'qui-quod-excepturi-aliquid-ut', 'Elvie Ward', 'Earum totam suscipit sit molestias. Corrupti et facilis necessitatibus perferendis aspernatur ipsum delectus sed. Commodi dolor sit animi cumque. Atque magni a molestias. Perspiciatis qui quaerat labore delectus dolorem. Qui tempore dignissimos tenetur eaque corporis nisi assumenda. Soluta accusamus possimus tempore incidunt quibusdam sunt fugiat recusandae. Qui aut est pariatur amet. Nobis laudantium repudiandae porro error animi nisi. Vel cupiditate voluptatem eius ex voluptas. Qui aut rerum similique. Itaque ut eos odit est. Suscipit dolorem iusto dolor sunt commodi. Doloribus laudantium praesentium error non. Soluta eveniet quo harum voluptatem. Consequatur facere velit rerum occaecati cum rem.', '8.66', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(12, 'quia-eius-est-laudantium-est-labore-necessitatibus-voluptas', 'Lacy Harber', 'Quisquam sapiente fuga facilis autem. Voluptatibus ut vero quia nihil labore velit. Nesciunt rerum incidunt ad reprehenderit. Autem nisi et natus labore temporibus eos. Assumenda vel ipsam non et iusto molestiae soluta. Quae eius asperiores ut quo. Qui itaque eos aliquam voluptate optio. Et pariatur fugiat aut nobis. Nemo nisi expedita sit sint earum quis non. Quia necessitatibus eius in minima velit voluptas. Omnis quas omnis et eos. Voluptas at qui quasi blanditiis consequatur numquam officiis. Occaecati velit veritatis rem earum. Fuga beatae voluptatem aut autem eveniet repellat voluptatem possimus. Vel ex et sed ut autem ipsa. Eaque accusamus ad alias magni veritatis. Expedita nostrum velit veritatis est voluptatem totam. Corporis in culpa molestiae consequatur voluptatibus nulla. Nisi rerum consequatur rem corrupti soluta quibusdam vero. Laboriosam et sunt voluptatem voluptatem occaecati labore sit.', '11.60', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(13, 'voluptas-suscipit-velit-culpa-voluptatem', 'Cary Ferry', 'Voluptatem ratione quia illum ut consequatur. Quae possimus culpa quam vero voluptas cumque minima. Sint temporibus qui molestiae vitae maxime dignissimos. Eum qui nobis numquam consequatur alias et. Error hic id rerum qui occaecati. Id autem quia molestiae fugiat sunt similique minus ut. Quod autem perferendis aut nisi id a consectetur velit. Magni ea velit est officiis nostrum. Et ad deleniti quia deleniti vel at et. Qui quasi sint aut in tempore recusandae molestiae. Cumque quia et ratione sed. Provident et illum autem est nostrum. Saepe ut quaerat repellat voluptatum cumque dicta. Dignissimos dolorem qui aspernatur dolorem pariatur. Est qui ullam sit officiis suscipit. Tempora quis nostrum molestiae ut esse eveniet. Et non officia esse. Nobis fuga repellat delectus laboriosam tempora quis. Nostrum soluta facilis omnis quia. Non numquam et rerum qui voluptate ad dolores. Fugit debitis eius quasi a aut. Rerum est quo ab inventore. Doloribus accusamus dolor est fugiat reiciendis.', '8.05', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(14, 'sint-iure-nesciunt-odit-omnis-qui-enim', 'Marietta Hammes', 'Laboriosam ut molestias sint accusamus officia. Enim inventore et expedita debitis omnis. Perspiciatis beatae reiciendis distinctio molestias. Et repudiandae ratione eveniet est quasi placeat repellat. Sapiente qui necessitatibus amet vero quidem. Ad molestiae accusamus minus molestiae optio suscipit et. Labore et velit consequatur ut enim. Vero illum excepturi iure est quaerat maxime cum. Enim dolorem voluptates dolor voluptatem quia eos error laborum. Aliquid eius consequatur accusamus aliquid repellat laboriosam officiis. Velit eos illum ducimus consequuntur dignissimos odit molestiae pariatur. Atque id recusandae repudiandae porro fuga quia. Saepe quo deleniti voluptas in error modi. Quia sit dolorem hic minima. Aut velit perferendis sapiente tempore ex hic. Magni est dolorum et non eos et quis repudiandae. Quia mollitia corporis necessitatibus asperiores est earum aut. Autem ut eos magni voluptatibus perferendis harum. Non aut quod quidem fuga deleniti. Ut quis eius mollitia repellat. Sit quod eaque animi consequuntur. Sunt necessitatibus non ducimus. A velit odio architecto at consequatur vel.', '8.48', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(15, 'sunt-aut-esse-qui-quia-quia-aliquam-laborum', 'Meta Tromp', 'Illum sit aut voluptatem soluta est. Dolorem aut doloribus impedit quod in recusandae. Incidunt omnis facere esse et. Nostrum beatae in autem est quidem magni sunt aut. Et non enim sed dolores ut laboriosam nulla ab. Minus doloremque et sed quis impedit. Beatae quo mollitia a vitae expedita. Et quos dolor tempora sequi. Dolorem velit voluptatem ad rerum saepe necessitatibus beatae. Necessitatibus veritatis aliquam quas et. Labore tempore atque dicta est. Est voluptas atque nostrum distinctio saepe maxime. Perferendis accusamus eveniet rerum molestiae libero est modi officiis. Dolorem a at est dolores et repellat asperiores. Odio perferendis animi possimus adipisci ab. Est totam voluptatem placeat sint ducimus. Voluptatem hic sunt quo doloribus architecto iure consequatur. Illo earum temporibus sit accusamus molestias accusamus laudantium. Veniam quia mollitia ad consequatur dolore illo. Sint architecto aut expedita fuga numquam. Quasi libero consequatur eum repudiandae a. Soluta eveniet aut porro ut assumenda. Et magnam excepturi voluptas minus dolorem doloribus dolorum. Reprehenderit repellat porro sapiente sequi quaerat sint.', '5.31', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(16, 'sit-illo-commodi-sit-et', 'Marcellus Stokes Jr.', 'Id sunt vel consequatur vero est rerum. Voluptas rerum dignissimos qui est sed perferendis. Rem dolorem assumenda qui hic qui. Enim expedita autem aut labore. Et ad porro aut quidem illum harum. Libero consequatur est eos id. Nam impedit vel in sit. Quibusdam facilis suscipit quaerat neque et nulla quam minima. Sequi numquam aut quo rerum recusandae asperiores hic. Explicabo quo corrupti corrupti temporibus voluptatem repudiandae. Reiciendis tempora temporibus eum qui vel libero. Deserunt cumque fugit et aliquid. Est quaerat qui qui sit architecto. Quod sed aut explicabo veritatis ut. Voluptatem officiis quaerat blanditiis earum sit. Aut voluptas rerum enim aut voluptates. Est numquam inventore alias iusto illo quia velit quam. Cum et et dolores nemo ut perferendis. Eos animi exercitationem earum maxime sit non voluptates enim. Eius dolor dolor numquam inventore dolore suscipit. Rerum temporibus sit consequatur quas culpa voluptates tempora. Deleniti voluptate in id in et vero aut. Et tempore et nam totam quidem amet. Odit neque nobis numquam deleniti placeat. Neque labore eius enim quia aut nesciunt id voluptatibus. Omnis quas libero illo voluptatem.', '15.35', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(17, 'animi-qui-repellat-inventore-quas-ipsum-mollitia', 'Maximillia VonRueden', 'Ut perspiciatis sed tenetur in molestiae. Vel pariatur eos ipsum illum non ipsum voluptatem eum. Deserunt sit occaecati placeat ipsa recusandae. Aut qui aut et. Nesciunt doloribus qui dolor dolor veniam. Deserunt amet quisquam nesciunt maxime officiis. Id et et beatae saepe. Id aliquam inventore odit sit amet eveniet sit. Quasi fugiat laborum commodi dolorem. Beatae nesciunt dolorem amet magni blanditiis at omnis. Quis molestias assumenda ut. Molestias error est minus molestiae dolorum velit. Facilis aut nihil repellendus enim ab labore omnis. Earum sequi quo aperiam rerum. Sunt ut reiciendis voluptatem occaecati ipsum libero et.', '13.25', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(18, 'sequi-consequuntur-repellat-quaerat-nobis-sit-voluptatum', 'Ms. Alisha Ritchie', 'Quidem molestiae aut quia et vel. Dolorem voluptatem quos deserunt sapiente. Consequatur hic autem consequatur et voluptates voluptas quia. Occaecati et incidunt et ut voluptatem. Dolorum assumenda et accusamus inventore repudiandae quis recusandae eius. Dolores rerum sed hic est sint ratione sit. Eum ipsam mollitia et incidunt dolore quidem dolorem. Quasi minus non quia cumque amet corrupti. Aut ipsam odio dolores nemo repudiandae officiis ullam. In totam sed laborum esse error. Autem aspernatur porro eligendi commodi iusto quo. Accusamus ut esse aliquid accusamus aperiam et itaque. Corporis ex ullam non perferendis eveniet. Et molestias sint ipsa fuga id et. Ullam magni aut voluptatem. Dolorum commodi quis expedita possimus ea nam et. Voluptas molestiae nihil et ad ut. Fuga omnis debitis aut quo. Quod nihil in maxime omnis. Minus laborum rerum quia veniam consequatur enim culpa. Repellendus voluptate sit maiores dolores non ad enim exercitationem. Aut at rem quibusdam. Facilis pariatur reiciendis voluptas eum ipsa. Aut quia enim vero reprehenderit eos est. Voluptates quo et dolores veniam. Culpa corporis eveniet itaque nesciunt est. Consequuntur atque libero quis quia ut tempora.', '3.88', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(19, 'a-suscipit-ut-voluptas-voluptas', 'Carmelo Kessler', 'Error laudantium exercitationem maiores veniam sint consequatur non. Nisi vero beatae beatae. Eum tempore voluptate ipsa omnis in corrupti non. Omnis est ratione illum sit doloremque. Et voluptates labore nihil aut. Deserunt qui velit eaque iusto quod dolor ex alias. Porro nihil quia aliquam molestiae. Veritatis dolor rerum optio culpa error possimus. Vero omnis sunt itaque dignissimos dolorem. Et et quia in et est qui veniam fugit. Dicta ut sint nisi molestias sed. Mollitia eius voluptatem dolores quibusdam autem. Et dolorem sit amet sapiente. Corrupti numquam qui delectus maiores laudantium. Inventore praesentium doloribus ea inventore sit id. Omnis vel asperiores qui qui accusantium est ea. Accusamus accusamus error quam architecto nostrum. Voluptatem aperiam est aspernatur quos possimus. Accusamus magnam modi quos cupiditate. Impedit nisi sit eveniet odio voluptas similique. Nam sed eos consequatur sunt ratione nisi.', '13.32', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(20, 'et-tempore-et-repellat', 'Woodrow Effertz', 'Qui quod quasi dolorem ipsa beatae consequatur. Repellat in ea dolorem ut nulla aut expedita esse. Rem aut enim autem explicabo dolores doloribus consequatur. Molestiae dicta dignissimos rerum sit quas esse. Dolor quidem deserunt officiis ut beatae voluptas eos. Architecto qui consequatur reiciendis ipsam ut ipsum voluptatibus quaerat. Eos optio velit quos. Qui voluptate aperiam rerum eius modi. Ipsam ratione voluptas consequatur unde voluptas natus. Neque consequatur officiis reprehenderit reiciendis ea. Rerum nihil et in dolor consequatur. Distinctio quasi tenetur ut voluptate in hic qui. Itaque alias laudantium consectetur perspiciatis vitae. Id praesentium et aut vel. Et et quas blanditiis quis et quidem. Omnis aliquam sed exercitationem. Eaque aliquid laboriosam est quo omnis et. Voluptatibus corrupti non excepturi quas numquam. Omnis beatae dolores fugit. Quia et odio placeat aut. Aliquam dolor voluptas voluptas. Et corporis laboriosam est nihil. Laudantium molestias sed ut eveniet doloribus. Deserunt assumenda velit aut dolor quis ducimus tempora.', '16.63', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(21, 'molestiae-aut-eaque-nam-eligendi-optio', 'Dillan Wolf', 'Rerum ex molestiae corporis qui. Sed ex omnis saepe modi commodi quis mollitia. Impedit culpa occaecati ipsa voluptas consequatur. Impedit laudantium voluptatem possimus molestiae accusamus illum sequi. Voluptatum explicabo incidunt accusantium ut. Et eaque quisquam corrupti. Tenetur exercitationem est aliquid sunt ut aperiam voluptas. Ut rerum itaque id et iste ea. Sunt pariatur possimus exercitationem ut odio ea necessitatibus. Eum et ipsam atque pariatur. At eaque accusamus dolore amet vitae asperiores quasi ea. Illo ut unde illum atque omnis. Eaque voluptate sit deserunt. Et vero velit sunt quasi aliquam quam impedit. Corporis quae quas enim et corrupti aspernatur non. Sint rerum illo sit ea id voluptas doloremque.', '6.63', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(22, 'quia-voluptatem-tempora-molestias-quis-mollitia-debitis', 'Lily Jerde', 'Est necessitatibus et dolores veniam et ipsa adipisci. Ad labore non iste facilis sint earum sapiente. Corporis nam quis hic et architecto optio. Omnis nulla molestias numquam sit. Debitis recusandae recusandae omnis ad laboriosam est. Error debitis nobis rerum voluptatem saepe aspernatur fuga. Eligendi dignissimos provident illo dolore quasi. Enim laudantium dolorem exercitationem aut eligendi. Et ab debitis sequi ipsa ipsa. Nam tempora aut laudantium inventore aut voluptatem omnis. Sunt laudantium officiis quisquam hic aliquam corrupti. Est vero officiis officiis voluptatum. Rerum ipsa et temporibus impedit error eos nihil. Quis repellat recusandae omnis molestiae. Voluptatem omnis ipsa autem et consequatur est. Minima in omnis accusantium recusandae excepturi a. Rerum facere molestias veritatis accusantium error eligendi perspiciatis. Et quod tempore corporis ducimus doloribus fuga. Voluptatem ut a neque quis.', '2.99', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(23, 'leanna-osinski', 'Leanna Osinski', 'Et necessitatibus consequatur voluptas eum. Quis voluptate fuga consectetur voluptas et eveniet tenetur. Et reprehenderit sed doloribus temporibus velit repellat. Sint aut est ullam nesciunt explicabo. Dolorem illum omnis qui architecto quis ea. Totam quasi sit autem voluptate assumenda aut est. Aspernatur fugit temporibus blanditiis deserunt sed. Tempora architecto distinctio et ipsum nesciunt vel harum. Aut officia itaque et velit nesciunt. Velit tempore nostrum voluptatum quisquam tenetur est. Debitis et nobis aliquam deleniti quos voluptas enim. Recusandae qui eligendi maiores quaerat voluptatum. Facilis qui animi eos. Excepturi voluptas ducimus laborum et. Rerum ea voluptatum architecto cum amet tenetur. Voluptatem non non earum libero quo eos totam dolorem. Odit non sit ab ut est rerum aut. Qui dolor at praesentium harum molestias.', '7.94', 0, '2023-01-07 12:05:59', '2023-01-07 11:06:17', NULL),
(24, 'amet-provident-velit-accusamus-ducimus', 'Dr. Johnnie Shields Sr.', 'Eum ipsa quis voluptatem inventore dolore. Corrupti natus laborum nesciunt. Sed veniam quia et voluptate quo praesentium placeat. Ipsa fugit exercitationem reprehenderit iure alias magnam. Culpa sunt cupiditate aspernatur ipsum fuga voluptatibus doloribus. Omnis eos quibusdam quia itaque ea necessitatibus. Atque est dicta illo ut aperiam quia. Error repellendus et aperiam est ullam aspernatur ea. Officia accusamus veniam omnis voluptatem exercitationem ab voluptas. Eos culpa et temporibus omnis vel. Dolorem laborum ea exercitationem magni ut quia porro. Totam et quia perspiciatis harum et aliquam. Mollitia harum tempore vero quos. Et sunt iure est praesentium odit omnis. Quaerat dignissimos ullam magni cupiditate aut. Aliquid accusantium similique expedita dolore. Voluptatibus assumenda unde saepe. Et at adipisci odio consequuntur aperiam. Architecto aliquid dolores quia beatae assumenda et. Aut soluta modi impedit cum expedita sed. Ut fuga ut nihil eveniet optio accusantium explicabo. Ducimus consequuntur nostrum dolore officia. Vel dolorum ullam corporis laboriosam dolores. Quibusdam id ratione omnis quia quam ipsa. Architecto molestiae omnis debitis blanditiis.', '2.33', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(25, 'mertie-hettinger', 'Mertie Hettinger', 'Natus sed earum aut ab. Non ea porro dolor ut. Tenetur delectus distinctio qui temporibus temporibus sint perferendis. Expedita laboriosam ea sit earum facere quia in. Ea sed et nam est. Sapiente qui sed aut rerum. Iure animi dolore quae recusandae ut vel quaerat. Illo molestias dolorem repellat quis sed amet sed. Quia maxime suscipit nemo quisquam qui et et. Nemo asperiores voluptatem quis quia autem. Sunt rerum rem magnam voluptatem. Aut quibusdam cupiditate tenetur dolor eum quo. Eum et rerum doloremque qui aut explicabo. Molestiae similique in nemo exercitationem qui esse rerum quo. Sit aut mollitia optio numquam incidunt. Porro quidem voluptate dolorem praesentium quisquam omnis. Veritatis illo sed vel a ut. Nulla et officia soluta. Natus iste numquam minus omnis. Et voluptas consequuntur sequi quisquam id. Assumenda illum quia cum eligendi deleniti veritatis. Deleniti eaque quisquam molestiae harum consequatur tenetur labore. Consequatur quo ut voluptatibus perspiciatis est aliquid enim. Molestiae laborum eveniet vitae nulla aut.', '5.45', 0, '2023-01-07 12:05:59', '2023-01-07 11:06:09', NULL),
(26, 'voluptatibus-autem-quas-necessitatibus-reprehenderit-et-nisi-ullam', 'Israel Beer', 'Et dolor enim ut. Id expedita aut vel molestiae molestias aut. Quasi blanditiis cumque quia aut eaque nisi non. Minima totam porro aperiam laborum et officiis ex. Deleniti reprehenderit nostrum temporibus. Quo omnis error ducimus esse. Assumenda doloremque delectus error laborum expedita aut. Assumenda deleniti vitae voluptatem in. Sequi dolorum facilis accusantium omnis natus. Nihil velit dolor sunt vel mollitia modi. Tempore nisi quo odio nulla. Possimus necessitatibus ut ratione molestias ut perspiciatis assumenda. Itaque in nobis sed. Molestiae officia velit voluptatibus fuga. Nulla voluptates quia necessitatibus ut ratione magnam. Ut quia maiores placeat quia consequuntur.', '4.13', 0, '2023-01-07 12:05:59', '2023-01-07 12:05:59', NULL),
(27, 'dr-mitchel-hartmann-jr', 'Dr. Mitchel Hartmann Jr.', 'Cupiditate est voluptas nisi molestiae cum voluptatibus. Eum unde commodi tempore asperiores in. Soluta minima modi tempore distinctio. Sapiente cum autem qui ipsam libero ut. Optio quas debitis consequatur est nulla et nemo. Aut qui velit aut autem ducimus eos et. Tenetur quia tempora est enim. Quod rerum culpa dolore amet consequatur aut maiores inventore. Maxime qui quis ea nulla esse et. Occaecati omnis deleniti accusamus vitae iure qui vel. Cumque ex dolor sit animi. Delectus quia corrupti magni corporis. Voluptatem dolores voluptatem sit commodi qui voluptatem quo placeat. Accusantium et saepe veniam repellendus. Fugit harum omnis explicabo tempore ut id qui. Reiciendis sit pariatur sed voluptates laudantium non id sunt. Et mollitia autem adipisci aperiam. Ipsum cupiditate quis neque quos id. Numquam quo aperiam esse voluptas qui qui voluptatum. Accusamus nam veniam sapiente quos dignissimos occaecati. Molestias provident fuga tempore ut est fugit sint. Nobis ut sequi in expedita in sed sed. Laudantium velit nemo aliquid blanditiis et. Ad magni tempora laborum veniam. Reprehenderit dolore repudiandae debitis fugiat. Et iure necessitatibus adipisci qui est. Ea nobis sunt est alias tempore. Velit mollitia veniam accusamus voluptate sit doloribus non earum.', '11.33', 4, '2023-01-07 12:05:59', '2023-01-07 12:08:59', NULL),
(28, 'francesca-hilpert-ii', 'Francesca Hilpert II', 'Id reiciendis debitis quo quidem dolorum. Fugit iusto quia ut deleniti. Cupiditate sunt est non ut modi. Impedit soluta tenetur perferendis ut explicabo. Aut non rerum provident et architecto impedit. Facere quod cumque cupiditate id et autem. Ab vel et at quisquam sit necessitatibus optio ea. Provident saepe optio debitis commodi dolor eveniet ratione. Rem ut magni dolor ab unde. Quam ut eum voluptatem nam. Consequatur explicabo culpa eaque rem sed maxime. Numquam quae sapiente autem odit est dolorem. Et eligendi et consequuntur labore ab aut perspiciatis. Nihil qui qui dolore maiores tempore. Ut corrupti autem minima nulla repudiandae iure consectetur. Iure et provident similique explicabo unde et modi omnis. Et beatae ab aut et accusamus magnam. Et explicabo alias ea iusto vero vel. Nihil inventore iste incidunt molestias dolores. Libero nemo doloremque consequatur assumenda quo possimus autem. Cumque rerum aliquam nulla cupiditate quaerat nihil porro nesciunt. Veritatis commodi fuga sunt. Cumque debitis consequatur fuga error. Aut nemo temporibus neque tenetur voluptatem repellendus quaerat. Fuga quia debitis veritatis sit. Odit natus eos unde molestiae aut. Omnis optio corrupti officia quos sit sint ex. Aliquam ut temporibus optio exercitationem accusantium corrupti.', '7.04', 4, '2023-01-07 12:05:59', '2023-01-07 12:08:59', NULL),
(29, 'prof-lionel-strosin', 'Prof. Lionel Strosin', 'Doloremque tempore nam quis. Quibusdam eos et cupiditate. Fuga aut nulla nulla. Suscipit dolorem ut nisi ut qui laudantium assumenda. Eum dolorum vero voluptates quae quas odit. Illum et tempora quae dignissimos asperiores. Quasi beatae fuga tenetur et. Neque aut est et facilis repudiandae. Nulla sed eos nostrum odio nulla sed et. Eaque provident nihil ut quis. Et quis molestiae recusandae enim. Nam totam et a quos sed est ea. Amet tenetur nisi nam quae ex cupiditate quo. Reiciendis veniam totam non sunt. Assumenda dicta dignissimos dolores ea. Nihil praesentium sit omnis. Architecto enim repellat sit minus. Ut ratione tempora officia numquam. Eum quas expedita dignissimos voluptatem cupiditate. Consequatur non ullam qui molestiae vitae molestiae. Ipsum tempora sit reiciendis sunt iure omnis. Fuga rerum possimus incidunt qui. Aut neque quae fugit deserunt perferendis occaecati recusandae sit. Tempore natus sit quam magnam et. Modi facilis deserunt et in sit quia accusantium.', '19.57', 4, '2023-01-07 12:05:59', '2023-01-07 12:08:59', NULL),
(30, 'prof-tremaine-haag', 'Prof. Tremaine Haag', 'Eum officiis et est est perspiciatis id. Iste ut voluptatem sunt enim omnis autem. Soluta et rem cum est nihil voluptate cum laboriosam. Rerum optio illum harum molestiae saepe. Eveniet qui quae commodi nulla. Pariatur perspiciatis sit modi alias. Quo dolorem molestiae dolor quaerat corrupti culpa assumenda distinctio. Cupiditate architecto impedit aut ducimus ut voluptate numquam. Deleniti voluptatem aut officia porro non quia. Architecto voluptate numquam vel repudiandae. Molestiae qui odit non aut aut. Aut enim error dolorem molestiae minus quia dolorem ratione. Tenetur tempore voluptas voluptatem consequatur aut cupiditate. Animi ad optio sunt magni omnis et. Nobis quasi maiores distinctio autem libero laudantium id. Ab eum nesciunt laborum enim maiores quo. Sit odio suscipit illo ipsam non consequatur voluptatum. Ipsum ex reprehenderit rerum quia beatae. Consequatur magnam error ducimus praesentium provident quo. Iure nemo non id voluptatem repellat et.', '3.45', 4, '2023-01-07 12:05:59', '2023-01-07 12:08:59', NULL);

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
  `product_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `show_slider`, `show_opportunity_of_the_day`, `show_featured`, `show_lots_selling`, `show_discount`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 30, 1, 1, 1, 1, 1, NULL, '2023-01-07 09:07:59', '2023-01-07 09:08:03'),
(2, 29, 1, 1, 1, 1, 1, NULL, '2023-01-07 09:08:13', '2023-01-07 09:08:13'),
(3, 28, 1, 1, 1, 1, 1, NULL, '2023-01-07 09:08:24', '2023-01-07 09:08:24'),
(4, 27, 1, 1, 1, 1, 1, NULL, '2023-01-07 09:08:33', '2023-01-07 09:08:33'),
(5, 25, 1, 1, 1, 1, 1, NULL, '2023-01-07 11:06:09', '2023-01-07 11:06:09'),
(6, 23, 1, 1, 1, 1, 1, NULL, '2023-01-07 11:06:17', '2023-01-07 11:06:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_evaluation`
--

CREATE TABLE `product_evaluation` (
  `id` int(10) UNSIGNED NOT NULL,
  `point` int(11) DEFAULT NULL,
  `comment_title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `product_evaluation` (`id`, `point`, `comment_title`, `comment`, `comment_image`, `user_id`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'dsasadds', ' Lorem ipsum dolor sit amet, consectetur\n                                                adipisicing elit. Et, maxime, quia. Consequatur, consequuntur cupiditate\n                                                dolor dolorem illum laborum nemo porro suscipit! Autem beatae, dolores\n                                                exercitationem iure molestiae neque quae repellat.', NULL, 1, 28, 1, NULL, '2023-01-01 21:16:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`) VALUES
(1, 'aytacipekel@gmail.com');

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
(1, 'aytaç ipekel', 'aytacipekel@gmail.com', '$2y$10$jGV5MmO10HM66epYJaqpWuM4/A9z9C7HtkZP43k9YkmcwpFBfz6uu', NULL, 1, 1, 'm7DoAIvjDpAkmVs21HdH72IK1XQuRA2hqq2eyDC1V9moQHW45PcaHkYc8Uzb', NULL, NULL),
(2, 'asdsads', 'sdasdekel@gmail.com', '$2y$10$AAQYpEIUqZwS8vtPT1XGleMb5P88jka/v3wZVCKmrzBVpYm5oSp1C', 'cT59HLkmRsf9VhHewhAvedzdlimuDRKvZrt1ZhnZALSJFxzRQkV5fbmMcDA8', 0, 0, NULL, '2023-01-08 09:56:54', '2023-01-08 09:56:54'),
(3, 'wqeqw', 'weweq@gmail.com', '$2y$10$anMwoPhB4CYnXGJgtP7QY.IKtZONLo8tG3882JRBpmMolEfLsARFC', 'mIah4xEmsR1x3o1j57bH3Whuc8OKLeXSGtUwmpR3v8pU3SvhniuPdnK7nZeT', 0, 0, NULL, '2023-01-08 10:04:12', '2023-01-08 10:04:12');

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
(1, 2, NULL, NULL, NULL),
(2, 3, 'qweeqw', '2323', '232323');

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
-- Tablo için indeksler `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_product_user_id_foreign` (`user_id`),
  ADD KEY `favorite_product_collection_id_foreign` (`collection_id`),
  ADD KEY `favorite_product_product_id_foreign` (`product_id`);

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
-- Tablo için indeksler `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriber_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `brand_product`
--
ALTER TABLE `brand_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `favorite_product`
--
ALTER TABLE `favorite_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `product_evaluation`
--
ALTER TABLE `product_evaluation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Tablo kısıtlamaları `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_main_cart_id_foreign` FOREIGN KEY (`main_cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD CONSTRAINT `favorite_product_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_product_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_main_cart_id_foreign` FOREIGN KEY (`main_cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_evaluation`
--
ALTER TABLE `product_evaluation`
  ADD CONSTRAINT `product_evaluation_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_evaluation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_evaluation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
