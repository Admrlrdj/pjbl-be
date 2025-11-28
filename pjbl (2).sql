-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2025 at 04:02 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1764037494),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1764037494;', 1764037494);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int NOT NULL DEFAULT '1000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'Camilan', 'camilan', 1000, '2025-11-24 02:53:33', '2025-11-24 02:53:48'),
(2, 'Makanan Beku', 'makanan-beku', 1000, '2025-11-24 02:53:57', '2025-11-24 02:53:57'),
(3, 'Minuman', 'minuman', 1000, '2025-11-24 02:54:03', '2025-11-24 02:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd@gmail.com', 'asd', '123', '2025-11-24 17:45:41', '2025-11-24 17:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Apakah produk camilan Nounoufood.id terjamin kehalalannya?', 'Ya, kami menjamin kehalalan semua produk Nounoufood.id. Kami memahami bahwa kehalalan dan keamanan produk adalah prioritas utama bagi pelanggan kami. Oleh karena itu, semua cemilan, makanan, dan minuman yang kami jual telah memiliki Sertifikasi Halal Resmi.', '2025-11-24 03:56:54', '2025-11-24 03:56:54'),
(2, 'Apakah ada tips penyimpanan agar keripik tidak cepat melempem?', 'Kami menyarankan agar keripik segera disimpan di tempat yang kering dan kedap udara untuk mempertahankan kerenyahan optimal. Untuk detail lengkap mengenai cara penyimpanan dan masa simpan (kedaluwarsa), silakan lihat informasi detail pada kemasan produk atau di halaman katalog website kami. Hal ini penting untuk memastikan Anda menikmati produk dalam kualitas terbaik', '2025-11-24 03:57:10', '2025-11-24 03:57:10'),
(3, 'Bagaimana cara mengetahui informasi nutrisi dan tanggal kedaluwarsa produk?', 'Anda dapat mengetahui informasi lengkap mengenai nutrisi dan tanggal kedaluwarsa produk kami langsung pada kemasan produk. Setiap produk Nounoufood.id mencantumkan Tanggal Kedaluwarsa yang jelas dan mudah dibaca (biasanya di bagian belakang atau bawah kemasan). Informasi Nilai Gizi (Nutritional Facts) dan Komposisi Bahan Baku tersedia lengkap pada label kemasan produk kami. Transparansi ini penting agar Anda dapat memilih cemilan yang aman dan berkualitas untuk Anda dan keluarga.', '2025-11-24 03:57:25', '2025-11-24 03:57:25'),
(4, ' Bagaimana cara membeli produk Nounoufood.id?', 'Via wa dan shopee', '2025-11-24 03:57:41', '2025-11-24 18:05:19'),
(5, 'Apakah Nounoufood.id melayani pemesanan untuk pasar internasional?', 'Belum', '2025-11-24 03:57:57', '2025-11-24 03:57:57'),
(6, 'Bagaimana cara menghubungi Admin atau Customer Service jika ada pertanyaan?', 'Lihat footer', '2025-11-24 03:58:08', '2025-11-24 03:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `site_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `site_email`, `site_phone`, `site_meta_keywords`, `site_meta_description`, `site_logo`, `site_favicon`, `created_at`, `updated_at`) VALUES
(1, 'Danggedang', 'danggedang@gmail.com', NULL, NULL, NULL, 'logo_6924cefb0831a.png', 'favicon_69247c63c85e0.png', '2025-11-24 08:40:17', '2025-11-24 14:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `maps_embed` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `maps_url`, `created_at`, `updated_at`, `maps_embed`) VALUES
(1, 'Botas', 'Jl. Raya Pajajaran No.40, Tugu Kujang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16127', 'https://maps.app.goo.gl/m8tY2zPvWo8Xn3JV9', '2025-11-24 03:37:24', '2025-11-24 03:37:24', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.365418998377!2d106.8069032!3d-6.6014292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5c5287d2ae7%3A0x9edb391e7c74be19!2sBotani%20Square!5e0!3m2!1sid!2sid!4v1763980629757!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_08_155150_create_general_settings_table', 1),
(5, '2025_11_10_083033_create_categories_table', 1),
(6, '2025_11_14_073418_create_products_table', 1),
(7, '2025_11_17_080429_create_contact_us_table', 1),
(8, '2025_11_17_083652_create_locations_table', 1),
(9, '2025_11_17_085134_create_product_images_table', 1),
(10, '2025_11_17_092556_create_f_a_q_s_table', 1),
(11, '2025_11_18_082548_create_testimonials_table', 1),
(12, '2025_11_20_050048_add_show_on_home_to_testimonials_table', 1),
(13, '2025_11_22_181928_add_is_best_seller_to_products_table', 1),
(14, '2025_11_24_020707_add_maps_embed_to_locations_table', 1),
(15, '2025_11_24_033154_alter_testimonials_make_image_nullable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int NOT NULL DEFAULT '1000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_best_seller` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `size`, `price`, `description`, `category_id`, `image`, `slug`, `ordering`, `created_at`, `updated_at`, `is_best_seller`) VALUES
(1, 'Donat Kentang', '230gr', 17000.00, 'Donat kentang enak dengan full topping', 1, 'IMG_69242b9d8e576.png', 'donat-kentang', 1000, '2025-11-24 02:55:41', '2025-11-24 03:12:26', 0),
(2, 'Nugget Bola Keju', '230gr', 17000.00, 'Nugget ayam dengan isian keju', 2, 'IMG_69242c9b5f318.png', 'nugget-bola-keju', 1000, '2025-11-24 02:59:55', '2025-11-24 03:24:05', 0),
(3, 'Cucur Gula Merah', '230gr', 17000.00, 'Kue cucur tradisional', 1, 'IMG_69242cf12ed15.png', 'cucur-gula-merah', 1000, '2025-11-24 03:01:21', '2025-11-24 14:34:05', 0),
(4, 'Kembang goyang', '230gr', 17000.00, 'Kembang goyang susu wijen', 1, 'IMG_69242d66cec9f.png', 'kembang-goyang', 1000, '2025-11-24 03:03:18', '2025-11-24 14:34:05', 0),
(5, 'Kopi in aja', '230gr', 17000.00, 'Tersedia kopi dengan banyak varian', 3, 'IMG_69242dec5ee1c.png', 'kopi-in-aja', 1000, '2025-11-24 03:04:16', '2025-11-24 14:33:42', 0),
(6, 'Black Garlic ', '230gr', 17000.00, 'Bawang putih tunggal lanang', 1, 'IMG_69242dd85494b.png', 'black-garlic', 1000, '2025-11-24 03:05:12', '2025-11-24 14:33:42', 0),
(7, 'Risol Mayo Sultan', '230gr', 1700.00, 'Risol dengan isian mayonaise', 1, 'IMG_69242ef1e1e3d.png', 'risol-mayo-sultan', 1000, '2025-11-24 03:09:53', '2025-11-24 03:09:53', 0),
(8, 'Makaroni Schotel', '230gr', 17000.00, 'Makaroni dengan keju creamy', 1, 'IMG_69242f7ab37ba.png', 'makaroni-schotel', 1000, '2025-11-24 03:12:10', '2025-11-24 03:12:10', 0),
(9, 'Bakwan Udang', '230gr', 17000.00, 'Bakwan dengan isi udang', 1, 'IMG_6924312c2f523.png', 'bakwan-udang', 1000, '2025-11-24 03:19:24', '2025-11-24 03:19:24', 0),
(10, 'Keripik Tempe', '230gr', 17000.00, 'Keripik tempe renyah', 1, 'IMG_69243163a62fd.png', 'keripik-tempe', 1000, '2025-11-24 03:20:19', '2025-11-24 03:20:19', 0),
(11, 'Tahu isi', '230gr', 17000.00, 'Tahu dengan isian lezat', 1, 'IMG_69243198a771d.png', 'tahu-isi', 1000, '2025-11-24 03:21:12', '2025-11-24 03:21:12', 0),
(12, 'Cireng isi', '230gr', 17000.00, 'Cireng dengan berbagai isian', 2, 'IMG_692432126cb7c.png', 'cireng-isi', 1000, '2025-11-24 03:23:14', '2025-11-24 03:23:14', 0),
(13, 'Tongkol Suwir', '230gr', 17000.00, 'Tongkol suwir dengan isian pedas', 2, 'IMG_6924327ca43e3.png', 'tongkol-suwir', 1000, '2025-11-24 03:25:00', '2025-11-24 03:25:00', 0),
(14, 'Dimsum', '230gr', 17000.00, 'Dimsum lezat dengan topping', 2, 'IMG_692432ae12389.png', 'dimsum', 1000, '2025-11-24 03:25:50', '2025-11-24 03:25:50', 0),
(15, 'Matcha Latte', '230gr', 17000.00, 'Minuman matcha segar', 3, 'IMG_692433011696f.png', 'matcha-latte', 1000, '2025-11-24 03:27:13', '2025-11-24 03:27:27', 0),
(16, 'Banana Latte', '230gr', 17000.00, 'Minuman rasa pisang nikmat', 3, 'IMG_6924334286a79.png', 'banana-latte', 1000, '2025-11-24 03:28:18', '2025-11-24 03:28:18', 0),
(17, 'Roasted milk tea', '230gr', 17000.00, 'Teh susu', 3, 'IMG_6924336c23422.png', 'roasted-milk-tea', 1000, '2025-11-24 03:29:00', '2025-11-24 03:29:00', 0),
(18, 'Basreng', '230gr', 17000.00, 'Basreng ini adalah produk best seller kami, dibuat dari bakso ikan pilihan yang digoreng garing dengan bumbu Pedas Daun Jeruk yang gurih dan nampol. Kami menjamin kualitasnya dengan Sertifikasi Halal dan menampilkan informasi kedaluwarsa yang transparan. Agar tetap renyah maksimal, segera simpan Basreng di wadah kedap udara setelah kemasan dibuka dan letakkan di tempat yang kering dan sejuk, jauh dari kelembapan.', 1, 'IMG_692433b175d0a.png', 'basreng', 1000, '2025-11-24 03:30:09', '2025-11-24 19:54:30', 1),
(19, 'Keripik Pisang Varian Coklat', '230gr', 15000.00, 'Keripik pisang gurih dibaluri bubuk coklat nikmat', 1, 'IMG_692433f6ecce9.png', 'keripik-pisang-varian-coklat', 1000, '2025-11-24 03:31:18', '2025-11-24 19:15:29', 1),
(20, 'Keripik Pisang Varian Original', '230gr', 17000.00, 'Keripik pisang dibaluri bumbu gurih', 1, 'IMG_69243446a6d1d.png', 'keripik-pisang-varian-original', 1000, '2025-11-24 03:32:38', '2025-11-24 19:54:29', 0),
(21, 'Keripik Pisang Varian Matcha', '230gr', 17000.00, 'Keripik pisang rasa matcha', 1, 'IMG_69243478e0ef1.png', 'keripik-pisang-varian-matcha', 1000, '2025-11-24 03:33:28', '2025-11-24 19:15:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mTkTROukogyEdAQ3YnxV5N7gfAacOveo8dIzkuvX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicVdXa3RnTGo2ZlRoSWM5M3J3RFNPaFJLMXNJa1k1dTE2TzNHYzZBRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovL3BqYmwudGVzdC9hZG1pbi9sb2NhdGlvbnMiO31zOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozMToiaHR0cDovL3BqYmwudGVzdC9hZG1pbi9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7czoxNDoiYWRtaW4ucHJvZHVjdHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1764083172),
('SQw62pHb8Xtu8hMThONSN1EVTqJOSpRMLwFq92wV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRFIwZlU4QU1Jd0pOZ2NUenljeHNxazlwQ1dKeVFGNEdQUGpJN28zcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9wamJsLnRlc3QvYWRtaW4vbG9jYXRpb25zIjtzOjU6InJvdXRlIjtzOjE1OiJhZG1pbi5sb2NhdGlvbnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1764044093);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_on_home` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `rating`, `comment`, `image`, `created_at`, `updated_at`, `show_on_home`) VALUES
(1, 'Kaila Puteri', 5, '“Makan basreng bikin nagih! Pedas daun jeruknya nampol dan harganya pas buat stock banyak”', 'IMG_692434cd04a3a.png', '2025-11-24 03:34:53', '2025-11-24 03:50:57', 1),
(2, 'Faza', 5, '“Keripik pisang varian yang cokelat the best, renyahnya awet banget. Senang karena sudah Halal, aman buat camilan rumah.”', 'IMG_692434f4934f8.png', '2025-11-24 03:35:32', '2025-11-24 03:51:31', 1),
(3, 'Dila Qonita', 4, '“Donatnya lembut dan fresh. Cari info produk di web gampang, jadi nggak perlu chat admin lagi.”', 'IMG_69243520c88a3.png', '2025-11-24 03:36:16', '2025-11-24 03:51:22', 1),
(4, 'Arief', 5, '“Donatnya lembut dan fresh. Cari info produk di web gampang, jadi nggak perlu chat admin lagi. keripik pisan paling enak sedunia\n”', 'IMG_692435f9e030a.png', '2025-11-24 03:39:53', '2025-11-24 06:33:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `picture`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'owner@email.com', 'owner', NULL, '$2y$12$J5n3bGiww3H4CCO8WCCCneclIqi.V0mgB4.hv7R/bpeDdHCGKAo7G', NULL, 'owner', NULL, '2025-11-24 01:01:46', '2025-11-24 21:05:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
