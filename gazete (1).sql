-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 24 Mar 2023, 11:43:57
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gazete`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durum` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `durum`, `created_at`, `updated_at`, `count`) VALUES
(1, 'Güncel', 'guncel', NULL, 0, '2023-01-04 13:06:29', '2023-01-24 03:02:53', 12),
(2, 'Ekonomi', 'ekonomi', NULL, 0, '2023-01-04 13:06:34', '2023-01-11 06:06:43', 7),
(3, 'Spor', 'spor', NULL, 0, '2023-01-04 13:06:38', '2023-01-11 06:54:41', 4),
(4, 'Haber', 'haber', NULL, 0, '2023-01-04 13:06:42', '2023-01-11 06:39:50', 20),
(5, 'Sosyal', 'sosyal', NULL, 0, '2023-01-04 17:18:32', '2023-01-07 14:11:17', 2),
(6, 'Magazin', 'magazin', NULL, 0, '2023-01-04 17:18:54', '2023-01-04 17:18:54', 0),
(7, 'Teknoloji', 'teknoloji', NULL, 0, '2023-01-04 17:19:07', '2023-01-11 06:47:01', 6),
(8, 'Kamu', 'kamu', NULL, 0, '2023-01-04 17:47:09', '2023-01-11 06:02:06', 3),
(9, 'Yabancı Gazateler', 'yabanci-gazateler', NULL, 0, '2023-01-06 02:44:55', '2023-01-07 15:00:56', 0),
(10, 'Yerel Gazeteler', 'yerel-gazeteler', NULL, 0, '2023-01-07 10:58:21', '2023-01-07 10:58:21', 0),
(11, 'Sağlık', 'saglik', NULL, 0, '2023-01-11 06:11:45', '2023-01-11 06:11:45', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_id` int(11) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pop` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `favorites_fav_id_foreign` (`fav_id`),
  KEY `favorites_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `tur`, `fav_id`, `durum`, `created_at`, `updated_at`, `pop`) VALUES
(8, 1, '1', 3, 1, '2023-01-06 19:41:45', '2023-01-08 09:29:58', 5),
(9, 1, '0', 2, 1, '2023-01-07 10:44:55', '2023-03-10 04:42:58', 9),
(10, 1, '0', 1, 1, '2023-01-07 10:44:56', '2023-01-26 02:39:54', 6),
(31, 1, '1', 6, 1, '2023-02-28 08:39:00', '2023-02-28 08:39:00', 0),
(14, 1, '1', 2, 1, '2023-01-07 11:00:42', '2023-03-10 04:42:23', 7),
(17, 1, '1', 1, 1, '2023-01-07 11:01:17', '2023-03-10 04:41:36', 2),
(18, 1, '1', 22, 1, '2023-01-07 11:01:31', '2023-01-09 04:21:14', 2),
(32, 1, '1', 29, 1, '2023-02-28 08:39:03', '2023-02-28 08:39:03', 0),
(23, 1, '1', 21, 1, '2023-01-09 01:19:15', '2023-01-09 01:19:15', 0),
(24, 1, '1', 7, 1, '2023-01-09 01:19:18', '2023-01-11 06:10:54', 1),
(25, 1, '0', 6, 1, '2023-01-09 13:25:02', '2023-03-10 04:42:01', 3),
(27, 1, '0', 3, 1, '2023-01-10 12:51:30', '2023-01-10 12:51:30', 0),
(30, 1, '0', 5, 1, '2023-01-10 12:51:53', '2023-01-26 04:33:23', 1),
(33, 1, '0', 15, 1, '2023-02-28 08:39:12', '2023-02-28 08:39:12', 0),
(34, 1, '0', 4, 1, '2023-02-28 08:39:14', '2023-02-28 08:39:14', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durum` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `pop` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_cat_id_foreign` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `logo`, `tur`, `url`, `durum`, `cat_id`, `pop`, `created_at`, `updated_at`) VALUES
(1, 'Haberturk', 'haberturk', 'newslogo/haberturk.jpg', 'Haber', 'https://www.haberturk.com/', 0, 4, 172, '2023-01-04 13:07:13', '2023-03-24 00:57:24'),
(2, 'Sözcü', 'sozcu', 'newslogo/sozcu.jpg', 'Haber', 'https://www.sozcu.com.tr/', 0, 4, 250, '2023-01-04 13:07:47', '2023-03-24 01:02:11'),
(3, 'Hurriyet', 'hurriyet', 'newslogo/hurriyet.jpg', 'Haber', 'https://www.hurriyet.com.tr/', 1, 4, 72, '2023-01-04 15:56:09', '2023-03-19 06:02:39'),
(4, 'Sabah', 'sabah', 'newslogo/sabah.png', 'Haber', 'https://m.sabah.com.tr/', 0, 4, 5, '2023-01-04 17:35:52', '2023-01-11 15:53:03'),
(5, 'Bloomberght', 'bloomberght', 'newslogo/bloomberght.png', 'Ekonomi', 'https://m.bloomberght.com/', 0, 2, 2, '2023-01-04 17:38:06', '2023-01-07 09:51:06'),
(6, 'Cumhuriyet', 'cumhuriyet', 'newslogo/cumhuriyet.jpg', 'Haber', 'https://www.cumhuriyet.com.tr/', 0, 4, 26, '2023-01-04 17:40:01', '2023-01-25 03:37:26'),
(7, 'Odatv', 'odatv', 'newslogo/odatv.png', 'Haber', 'https://www.odatv4.com/', 0, 4, 4, '2023-01-04 17:41:44', '2023-01-11 06:10:54'),
(8, 'Fanatik', 'fanatik', 'newslogo/fanatik.jpg', 'Spor', 'https://www.fanatik.com.tr/', 0, 3, 4, '2023-01-04 17:43:03', '2023-01-11 07:09:54'),
(9, 'Wikipedia', 'wikipedia', 'newslogo/wikipedia.png', 'Sosyal', 'https://tr.m.wikipedia.org/wiki/Anasayfa', 0, 5, 3, '2023-01-04 17:44:30', '2023-01-07 09:58:45'),
(10, 'Tayinrehberi', 'tayinrehberi', 'newslogo/tayinrehberi.png', 'Kamu', 'https://www.tayinrehberi.com/', 0, 8, 20, '2023-01-04 17:48:21', '2023-01-20 19:13:05'),
(11, 'Cnntürk', 'cnnturk', 'newslogo/cnnturk.jpg', 'Haber', 'https://www.cnnturk.com/', 0, 4, 4, '2023-01-06 08:28:17', '2023-01-07 09:55:28'),
(12, 'Ensonhaber', 'ensonhaber', 'newslogo/ensonhaber.jpg', 'Haber', 'https://m.ensonhaber.com/', 0, 4, 6, '2023-01-06 10:57:31', '2023-01-20 19:12:29'),
(13, 'Karar', 'karar', 'newslogo/karar.jpg', 'Haber', 'https://www.karar.com/', 0, 4, 10, '2023-01-06 11:00:01', '2023-03-10 04:42:16'),
(14, 'Diken', 'diken', 'newslogo/diken.jpg', 'Güncel', 'https://www.diken.com.tr/', 0, 1, 10, '2023-01-06 11:00:53', '2023-03-06 04:48:52'),
(16, 'Posta', 'posta', 'newslogo/posta.jpg', 'Haber', 'https://www.posta.com.tr/', 0, 4, 8, '2023-01-06 18:14:28', '2023-01-10 07:28:09'),
(17, 'Milliyet', 'milliyet', 'newslogo/milliyet.jpg', 'Haber', 'https://www.milliyet.com.tr/', 0, 4, 6, '2023-01-06 18:15:38', '2023-01-07 08:55:54'),
(26, 'Fotomaç', 'fotomac', 'newslogo/fotomac.jpg', 'Spor', 'https://www.fotomac.com.tr/', 0, 3, 4, '2023-01-07 11:11:42', '2023-01-11 06:05:09'),
(18, 'Dünya', 'dunya', 'newslogo/dunya.jpg', 'Ekonomi', 'https://www.dunya.com/', 0, 2, 4, '2023-01-06 18:18:00', '2023-01-07 09:54:38'),
(20, 'Halk Tv', 'halk-tv', 'newslogo/halk-tv.jpg', 'Haber', 'https://halktv.com.tr/', 0, 4, 31, '2023-01-07 08:44:35', '2023-03-24 01:04:27'),
(24, 'Memurlarnet', 'memurlarnet', 'newslogo/memurlarnet.jpg', 'Kamu', 'https://www.memurlar.net/', 0, 8, 11, '2023-01-07 10:59:27', '2023-01-20 19:12:55'),
(21, 'Duvar', 'duvar', 'newslogo/duvar.jpg', 'Güncel', 'https://www.gazeteduvar.com.tr/', 0, 1, 6, '2023-01-07 09:04:19', '2023-01-12 01:13:51'),
(22, 'Onedio', 'onedio', 'newslogo/onedio.jpg', 'Sosyal', 'https://onedio.com/', 0, 5, 7, '2023-01-07 09:05:18', '2023-02-12 02:23:31'),
(25, 'Paraanaliz', 'paraanaliz', 'newslogo/paraanaliz.jpg', 'Ekonomi', 'https://www.paraanaliz.com/', 0, 2, 3, '2023-01-07 11:10:42', '2023-01-11 06:06:43'),
(37, 'Birgün', 'birgun', 'newslogo/birgun.jpg', 'Güncel', 'https://www.birgun.net/', 0, 1, 9, '2023-01-11 06:45:06', '2023-02-25 02:10:17'),
(29, 'T24', 't24', 'newslogo/t24.jpg', 'Güncel', 'https://t24.com.tr/', 0, 1, 36, '2023-01-07 12:47:17', '2023-03-24 01:04:02'),
(36, 'Euronews', 'euronews', 'newslogo/euronews.jpg', 'Güncel', 'https://tr.euronews.com/', 0, 1, 2, '2023-01-11 06:42:45', '2023-01-12 11:07:59'),
(31, 'Webtekno', 'webtekno', 'newslogo/webtekno.jpg', 'Teknoloji', 'https://www.webtekno.com/', 0, 7, 10, '2023-01-07 14:28:12', '2023-01-20 19:12:58'),
(35, 'Korkusuz', 'korkusuz', 'newslogo/korkusuz.jpg', 'Haber', 'https://www.korkusuz.com.tr/', 0, 4, 1, '2023-01-11 06:39:50', '2023-01-11 07:04:05'),
(41, 'Yetkin Report', 'yetkin-report', NULL, 'Güncel', 'https://yetkinreport.com/', 0, 1, 2, '2023-01-24 03:02:53', '2023-01-24 04:03:50'),
(39, 'Ntvspor', 'ntvspor', 'newslogo/ntvspor.jpg', 'Spor', 'https://www.ntvspor.net/', 0, 3, 2, '2023-01-11 06:54:41', '2023-01-11 07:04:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_01_073056_create_menus_table', 1),
(6, '2023_01_02_110222_create_writers_table', 1),
(7, '2023_01_04_105034_create_categories_table', 1),
(8, '2023_01_04_105525_create_favorites_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `who` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `writers`
--

DROP TABLE IF EXISTS `writers`;
CREATE TABLE IF NOT EXISTS `writers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durum` int(11) NOT NULL DEFAULT '0',
  `pop` int(11) NOT NULL DEFAULT '0',
  `news_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `writers_news_id_foreign` (`news_id`),
  KEY `writers_cat_id_foreign` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `writers`
--

INSERT INTO `writers` (`id`, `name`, `slug`, `img`, `news`, `tur`, `url`, `durum`, `pop`, `news_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'Yılmaz Özdil', 'yilmaz-ozdil', 'yazar/yilmaz-ozdil.png', 'Sözcü', 'Güncel', 'https://www.sozcu.com.tr/kategori/yazarlar/yilmaz-ozdil/', 0, 100, 2, 1, '2023-01-04 13:08:25', '2023-03-16 08:58:00'),
(2, 'Fatih Altaylı', 'fatih-altayli', 'yazar/fatih-altayli.png', 'Haberturk', 'Güncel', 'https://www.haberturk.com/htyazar/fatih-altayli-1001', 0, 133, 1, 1, '2023-01-04 13:23:06', '2023-03-24 00:57:24'),
(3, 'Abdulkadir Selvi', 'abdulkadir-selvi', 'yazar/abdulkadir-selvi.jpg', 'Hurriyet', 'Güncel', 'https://www.hurriyet.com.tr/amp/yazarlar/abdulkadir-selvi/', 0, 29, 3, 1, '2023-01-04 17:26:11', '2023-01-14 18:06:33'),
(4, 'İsmail Saymaz', 'ismail-saymaz', 'yazar/ismail-saymaz.jpg', 'Halk Tv', 'Güncel', 'https://halktv.com.tr/yazar/ismail-saymaz-33657', 0, 29, 20, 1, '2023-01-07 08:46:23', '2023-03-24 01:04:27'),
(5, 'Murat Muratoğlu', 'murat-muratoglu', 'yazar/murat-muratoglu.png', 'Sözcü', 'Ekonomi', 'https://www.sozcu.com.tr/2023/yazarlar/murat-muratoglu/', 0, 71, 2, 2, '2023-01-07 08:47:49', '2023-03-24 01:02:11'),
(6, 'İbrahim Kahveci', 'ibrahim-kahveci', 'yazar/ibrahim-kahveci.jpg', 'Karar', 'Haber', 'https://www.karar.com/yazarlar/ibrahim-kahveci', 0, 6, 13, 4, '2023-01-07 08:48:39', '2023-03-10 04:42:16'),
(7, 'Barış Terkoğlu', 'baris-terkoglu', 'yazar/baris-terkoglu.jpg', 'Cumhuriyet', 'Haber', 'https://www.cumhuriyet.com.tr/koseyazari/380/Baris_Terkoglu.html', 0, 6, 6, 4, '2023-01-07 08:49:28', '2023-01-12 04:06:32'),
(8, 'Ertuğrul Özkök', 'ertugrul-ozkok', 'yazar/ertugrul-ozkok.jpg', 'Hurriyet', 'Güncel', 'https://www.hurriyet.com.tr/yazarlar/ertugrul-ozkok/', 0, 6, 3, 1, '2023-01-07 08:50:23', '2023-01-24 04:02:39'),
(9, 'Soner Yalçın', 'soner-yalcin', 'yazar/soner-yalcin.png', 'Sözcü', 'Güncel', 'https://www.sozcu.com.tr/kategori/yazarlar/soner-yalcin/', 0, 2, 2, 1, '2023-01-07 09:47:32', '2023-02-28 08:40:42'),
(10, 'Deniz Zeyrek', 'deniz-zeyrek', 'yazar/deniz-zeyrek.png', 'Sözcü', 'Güncel', 'https://www.sozcu.com.tr/kategori/yazarlar/deniz-zeyrek/', 0, 4, 2, 1, '2023-01-07 10:54:11', '2023-01-12 13:43:57'),
(11, 'Murat Bardakçı', 'murat-bardakci', 'yazar/murat-bardakci.png', 'Haberturk', 'Güncel', 'https://m.haberturk.com/htyazar/murat-bardakci', 0, 2, 1, 1, '2023-01-07 10:56:18', '2023-02-28 08:40:43'),
(12, 'Levent Gültekin', 'levent-gultekin', 'yazar/levent-gultekin.jpg', 'Diken', 'Güncel', 'https://www.diken.com.tr/author/levent/', 0, 3, 14, 1, '2023-01-07 11:20:35', '2023-03-06 04:48:52'),
(13, 'Memduh Bayraktaroglu', 'memduh-bayraktaroglu', 'yazar/memduh-bayraktaroglu.png', 'Korkusuz', 'Güncel', 'https://www.korkusuz.com.tr/yazarlar/memduh-bayraktaroglu', 0, 6, 27, 1, '2023-01-07 11:26:25', '2023-03-10 04:37:29'),
(14, 'Barış Pehlivan', 'baris-pehlivan', 'yazar/baris-pehlivan.jpg', 'Cumhuriyet', 'Güncel', 'https://www.cumhuriyet.com.tr/yazarlar/baris-pehlivan', 0, 11, 6, 1, '2023-01-07 12:45:42', '2023-01-25 03:37:26'),
(15, 'Tolga Şardan', 'tolga-sardan', 'yazar/tolga-sardan.jpg', 'T24', 'Güncel', 'https://t24.com.tr/yazarlar/tolga-sardan-buyutec', 0, 32, 29, 1, '2023-01-07 12:48:58', '2023-03-24 01:04:02'),
(16, 'Timur Soykan', 'timur-soykan', 'yazar/timur-soykan.jpg', 'Birgün', 'Güncel', 'https://www.birgun.net/yazarlar/timur-soykan-0', 0, 8, 37, 1, '2023-01-11 15:21:45', '2023-02-25 02:10:17'),
(17, 'Osman Müftüoğlu', 'osman-muftuoglu', 'yazar/osman-muftuoglu.jpg', 'Hurriyet', 'Sağlık', 'https://www.hurriyet.com.tr/yazarlar/osman-muftuoglu/', 0, 6, 3, 11, '2023-01-12 11:09:41', '2023-01-12 15:49:46'),
(19, 'Sevilay Yılman', 'sevilay-yilman', 'yazar/sevilay-yilman.jpg', 'Haberturk', 'Güncel', 'https://m.haberturk.com/htyazar/sevilay-yilman-2383', 0, 2, 1, 1, '2023-01-12 11:14:28', '2023-02-28 08:40:38'),
(20, 'Ahmet Hakan', 'ahmet-hakan', 'yazar/ahmet-hakan.jpg', 'Hurriyet', 'Güncel', 'https://www.hurriyet.com.tr/amp/yazarlar/ahmet-hakan/', 0, 16, 3, 1, '2023-01-18 02:03:13', '2023-03-19 06:02:39'),
(21, 'Murat Yetkin', 'murat-yetkin', 'yazar/murat-yetkin.jpg', 'Medyascope', 'Güncel', 'https://yetkinreport.com/author/muratmyetkin/', 0, 7, 40, 1, '2023-01-24 02:58:41', '2023-03-24 01:04:42'),
(22, 'Abdurrahman Yıldırım', 'abdurrahman-yildirim', 'yazar/abdurrahman-yildirim.png', 'Haberturk', 'Ekonomi', 'https://m.haberturk.com/htyazar/abdurrahman-yildirim-1018', 0, 3, 1, 2, '2023-01-26 02:39:08', '2023-01-31 02:20:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
