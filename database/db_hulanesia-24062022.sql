-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb-default
-- Generation Time: Jun 24, 2022 at 07:50 AM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wehealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Look mum, I logged something', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', NULL, '2021-07-04 03:44:41', '2021-07-04 03:44:41'),
(2, 'default', 'Look mum, I logged something', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', 'c02daca4-5cec-45a1-9054-c14b273ebbe2', '2021-07-04 03:48:54', '2021-07-04 03:48:54'),
(3, 'default', 'open page add post', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', 'a350ee54-004d-4791-8166-46b16380de9c', '2021-07-04 03:50:23', '2021-07-04 03:50:23'),
(4, 'default', 'my message', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', '76fe617a-9084-4523-b79c-31e664951143', '2021-07-04 03:56:42', '2021-07-04 03:56:42'),
(5, 'default', 'my message', NULL, NULL, NULL, 'App\\Models\\User', 1, '[]', 'c9b3915e-0aab-42f9-af35-1cc32d093e3e', '2021-07-04 03:59:28', '2021-07-04 03:59:28'),
(6, 'default', 'open add post', 'App\\Models\\Category', NULL, NULL, 'App\\Models\\User', 1, '{\"categories\":[{\"id\":1,\"name\":\"Umum\",\"slug\":\"umum\",\"created_at\":\"2021-06-11T20:36:58.000000Z\",\"updated_at\":\"2021-06-12T05:16:40.000000Z\"},{\"id\":2,\"name\":\"Wisata Alam\",\"slug\":\"wisata-alam\",\"created_at\":\"2021-06-11T20:37:49.000000Z\",\"updated_at\":\"2021-06-11T20:37:49.000000Z\"},{\"id\":3,\"name\":\"Lifestyle\",\"slug\":\"lifestyle\",\"created_at\":\"2021-06-11T20:38:00.000000Z\",\"updated_at\":\"2021-06-11T20:38:00.000000Z\"}],\"tags\":[{\"id\":1,\"name\":\"Ayo Media\",\"slug\":\"ayo-media\",\"created_at\":\"2021-06-12T09:18:33.000000Z\",\"updated_at\":\"2021-06-12T09:18:33.000000Z\"},{\"id\":4,\"name\":\"BMKG\",\"slug\":\"bmkg\",\"created_at\":\"2021-06-19T01:41:36.000000Z\",\"updated_at\":\"2021-06-19T01:41:36.000000Z\"},{\"id\":5,\"name\":\"VIRAL\",\"slug\":\"viral\",\"created_at\":\"2021-06-19T01:41:44.000000Z\",\"updated_at\":\"2021-06-19T01:41:44.000000Z\"}],\"features\":[{\"id\":1,\"name\":\"Headline\",\"created_at\":\"2021-06-12T09:38:01.000000Z\",\"updated_at\":\"2021-06-12T09:38:01.000000Z\"},{\"id\":2,\"name\":\"Breaking News\",\"created_at\":\"2021-06-19T01:42:02.000000Z\",\"updated_at\":\"2021-06-19T01:42:02.000000Z\"}]}', NULL, '2021-07-04 04:08:22', '2021-07-04 04:08:22'),
(7, 'default', 'store post', 'App\\Models\\Post', 'store', 18, 'App\\Models\\User', 1, '{\"post\":{\"title\":\"Jaga Ketahanan Pangan Selama PPKM Darurat, Kota Bogor Dirikan Posko Logistik\",\"slug\":\"\",\"description\":\"Jaga Ketahanan Pangan Selama PPKM Darurat, Kota Bogor Dirikan Posko Logistik\",\"body\":\"<p>Ketua Satgas Covid-19&nbsp;<a class=\\\"related-tag text-orange\\\" href=\\\"https:\\/\\/ayobandung.com\\/tag\\/Kota%20Bogor\\\">Kota Bogor<\\/a>&nbsp;Bima Arya Sugiarto mengatakan,&nbsp;<a class=\\\"related-tag text-orange\\\" href=\\\"https:\\/\\/ayobandung.com\\/tag\\/posko%20logistik\\\">posko logistik<\\/a>&nbsp;tersebut&nbsp;nantinya bakal bertugas mendistribusikan bantuan kepada masyarakat&nbsp;<a class=\\\"related-tag text-orange\\\" href=\\\"https:\\/\\/ayobandung.com\\/tag\\/Kota%20Bogor\\\">Kota Bogor<\\/a>&nbsp;yang kurang mampu, selama menjalani masa pemberlakukan&nbsp;<a class=\\\"related-tag text-orange\\\" href=\\\"https:\\/\\/ayobandung.com\\/tag\\/PPKM%20Darurat\\\">PPKM Darurat<\\/a>. Khususnya mereka yang sedang menjalani isolasi mandiri di kediamannya.<\\/p>\\r\\n<p>&ldquo;Kita lihat banyak warga yang membutuhkan yang kesulitan mencari nafkah karena&nbsp;<a class=\\\"related-tag text-orange\\\" href=\\\"https:\\/\\/ayobandung.com\\/tag\\/PPKM%20Darurat\\\">PPKM Darurat<\\/a>&nbsp;ini. Maka semaksimal mungkin harus kita bantu. Di&nbsp;<a class=\\\"related-tag text-orange\\\" href=\\\"https:\\/\\/ayobandung.com\\/tag\\/posko%20logistik\\\">posko logistik<\\/a>&nbsp;ini kami akan akan alokasikan bantuan logistik dari para donator kepada masyarakat yang benar-benar membutuhkan. Jadi semua satu pintu melalui posko ini agar bantuan tepat sasaran,&rdquo; katanya Minggu 4 Juli 2021.&nbsp;<\\/p>\\r\\n<div id=\\\"article_middle_sas\\\">\\r\\n<div id=\\\"ats-insert_ads-3-wrapper\\\" class=\\\"insert_ads insert_ads-4 show_advertisement\\\">\\r\\n<div>\\r\\n<div id=\\\"ats-insert_ads-3\\\" class=\\\"ats-slot\\\"><\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\\r\\n<p>Bima Arya mengajak Aparatur Sipil Negara (ASN) di lingkungan Pemkot Bogor, perusahaan-perusahaan yang ada di&nbsp;<a class=\\\"related-tag text-orange\\\" href=\\\"https:\\/\\/ayobandung.com\\/tag\\/Kota%20Bogor\\\">Kota Bogor<\\/a>&nbsp;atau perorangan serta komunitas untuk ikut berpartisipasi dalam gerakan #BersamaSalingMenjaga.<\\/p>\",\"source\":null,\"source_link\":null,\"feature_id\":\"2\",\"category_id\":\"1\",\"user_id\":1,\"status\":\"PUBLISH\",\"meta_description\":null,\"meta_keywords\":null,\"seo_title\":null,\"published_at\":\"2021-07-03T17:00:00.000000Z\",\"updated_at\":\"2021-07-04T04:17:42.000000Z\",\"created_at\":\"2021-07-04T04:17:42.000000Z\",\"id\":18,\"tags\":[{\"id\":4,\"name\":\"BMKG\",\"slug\":\"bmkg\",\"created_at\":\"2021-06-19T01:41:36.000000Z\",\"updated_at\":\"2021-06-19T01:41:36.000000Z\",\"pivot\":{\"taggable_id\":18,\"tag_id\":4,\"taggable_type\":\"App\\\\Models\\\\Post\",\"created_at\":\"2021-07-04T04:17:42.000000Z\",\"updated_at\":\"2021-07-04T04:17:42.000000Z\"}}]},\"tags\":[{\"id\":4,\"name\":\"BMKG\",\"slug\":\"bmkg\",\"created_at\":\"2021-06-19T01:41:36.000000Z\",\"updated_at\":\"2021-06-19T01:41:36.000000Z\",\"pivot\":{\"taggable_id\":18,\"tag_id\":4,\"taggable_type\":\"App\\\\Models\\\\Post\",\"created_at\":\"2021-07-04T04:17:42.000000Z\",\"updated_at\":\"2021-07-04T04:17:42.000000Z\"}}]}', NULL, '2021-07-04 04:17:44', '2021-07-04 04:17:44'),
(8, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 3, '{\"data\":{}}', NULL, '2021-07-27 02:35:33', '2021-07-27 02:35:33'),
(9, 'default', 'update post', 'App\\Models\\Post', 'update', 17, 'App\\Models\\User', 3, '{\"data\":{}}', NULL, '2021-07-27 02:36:44', '2021-07-27 02:36:44'),
(10, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 3, '{\"data\":{}}', NULL, '2021-07-27 02:59:11', '2021-07-27 02:59:11'),
(11, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 3, '{\"data\":{}}', NULL, '2021-07-27 03:00:17', '2021-07-27 03:00:17'),
(12, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 3, '{\"data\":{}}', NULL, '2021-07-27 03:08:09', '2021-07-27 03:08:09'),
(13, 'default', 'update role', 'Spatie\\Permission\\Models\\Role', 'update', 1, 'App\\Models\\User', 3, '{\"data\":{\"id\":1,\"name\":\"admin\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T03:29:31.000000Z\",\"updated_at\":\"2021-06-26T03:29:31.000000Z\",\"permissions\":[{\"id\":1,\"name\":\"browse_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":1}},{\"id\":2,\"name\":\"read_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":2}},{\"id\":3,\"name\":\"edit_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":3}},{\"id\":4,\"name\":\"add_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":4}},{\"id\":5,\"name\":\"delete_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":5}},{\"id\":6,\"name\":\"browse_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":6}},{\"id\":7,\"name\":\"read_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":7}},{\"id\":8,\"name\":\"edit_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":8}},{\"id\":9,\"name\":\"add_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":9}},{\"id\":10,\"name\":\"delete_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":10}},{\"id\":11,\"name\":\"browse_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":11}},{\"id\":12,\"name\":\"read_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":12}},{\"id\":13,\"name\":\"edit_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":13}},{\"id\":14,\"name\":\"add_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":14}},{\"id\":15,\"name\":\"delete_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":15}},{\"id\":16,\"name\":\"browse_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":16}},{\"id\":17,\"name\":\"read_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":17}},{\"id\":18,\"name\":\"edit_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":18}},{\"id\":19,\"name\":\"add_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":19}},{\"id\":20,\"name\":\"delete_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":20}},{\"id\":21,\"name\":\"browse_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":21}},{\"id\":22,\"name\":\"read_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":22}},{\"id\":23,\"name\":\"edit_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":23}},{\"id\":24,\"name\":\"add_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":24}},{\"id\":25,\"name\":\"delete_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":25}},{\"id\":26,\"name\":\"browse_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":26}},{\"id\":27,\"name\":\"read_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":27}},{\"id\":28,\"name\":\"edit_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":28}},{\"id\":29,\"name\":\"add_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":29}},{\"id\":30,\"name\":\"delete_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":30}},{\"id\":31,\"name\":\"browse_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":31}},{\"id\":32,\"name\":\"read_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":32}},{\"id\":33,\"name\":\"edit_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":33}},{\"id\":34,\"name\":\"add_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":34}},{\"id\":35,\"name\":\"delete_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":35}}]}}', NULL, '2021-07-28 07:09:54', '2021-07-28 07:09:54'),
(14, 'default', 'store setting', 'App\\Models\\Setting', 'store', 1, 'App\\Models\\User', 3, '{\"data\":{\"name\":\"Contact Us\",\"slug\":\"\",\"content\":\"<p>Contact Us<\\/p>\",\"meta_description\":\"Contact Us\",\"meta_keywords\":\"contact us\",\"seo_title\":\"Contact Us\",\"updated_at\":\"2021-07-28T07:18:29.000000Z\",\"created_at\":\"2021-07-28T07:18:29.000000Z\",\"id\":1}}', NULL, '2021-07-28 07:18:29', '2021-07-28 07:18:29'),
(15, 'default', 'update category', NULL, 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:10:39', '2021-07-28 10:10:39'),
(16, 'default', 'update category', NULL, 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:15:14', '2021-07-28 10:15:14'),
(17, 'default', 'update category', NULL, 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:15:43', '2021-07-28 10:15:43'),
(18, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:22:25', '2021-07-28 10:22:25'),
(19, 'default', 'update feature', 'App\\Models\\Feature', 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:25:54', '2021-07-28 10:25:54'),
(20, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:27:39', '2021-07-28 10:27:39'),
(21, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:27:45', '2021-07-28 10:27:45'),
(22, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:27:50', '2021-07-28 10:27:50'),
(23, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:27:58', '2021-07-28 10:27:58'),
(24, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 3, '{\"data\":1}', NULL, '2021-07-28 10:31:11', '2021-07-28 10:31:11'),
(25, 'default', 'update user', 'App\\Models\\User', 'update', 1, 'App\\Models\\User', 3, '{\"data\":{\"id\":1,\"name\":\"Rizal Muhamad H\",\"email\":\"admin@admin.com\",\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-11T05:49:28.000000Z\",\"updated_at\":\"2021-07-29T03:42:50.000000Z\"}}', NULL, '2021-07-29 03:42:50', '2021-07-29 03:42:50'),
(26, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-08-03 07:41:38', '2021-08-03 07:41:38'),
(27, 'default', 'update role', 'Spatie\\Permission\\Models\\Role', 'update', 1, 'App\\Models\\User', 1, '{\"data\":{\"id\":1,\"name\":\"admin\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T03:29:31.000000Z\",\"updated_at\":\"2021-06-26T03:29:31.000000Z\",\"permissions\":[{\"id\":1,\"name\":\"browse_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":1}},{\"id\":2,\"name\":\"read_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":2}},{\"id\":3,\"name\":\"edit_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":3}},{\"id\":4,\"name\":\"add_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":4}},{\"id\":5,\"name\":\"delete_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":5}},{\"id\":6,\"name\":\"browse_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":6}},{\"id\":7,\"name\":\"read_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":7}},{\"id\":8,\"name\":\"edit_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":8}},{\"id\":9,\"name\":\"add_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":9}},{\"id\":10,\"name\":\"delete_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":10}},{\"id\":11,\"name\":\"browse_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":11}},{\"id\":12,\"name\":\"read_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":12}},{\"id\":13,\"name\":\"edit_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":13}},{\"id\":14,\"name\":\"add_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":14}},{\"id\":15,\"name\":\"delete_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":15}},{\"id\":16,\"name\":\"browse_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":16}},{\"id\":17,\"name\":\"read_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":17}},{\"id\":18,\"name\":\"edit_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":18}},{\"id\":19,\"name\":\"add_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":19}},{\"id\":20,\"name\":\"delete_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":20}},{\"id\":21,\"name\":\"browse_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":21}},{\"id\":22,\"name\":\"read_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":22}},{\"id\":23,\"name\":\"edit_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":23}},{\"id\":24,\"name\":\"add_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":24}},{\"id\":25,\"name\":\"delete_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":25}},{\"id\":26,\"name\":\"browse_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":26}},{\"id\":27,\"name\":\"read_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":27}},{\"id\":28,\"name\":\"edit_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":28}},{\"id\":29,\"name\":\"add_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":29}},{\"id\":30,\"name\":\"delete_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":30}},{\"id\":31,\"name\":\"browse_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":31}},{\"id\":32,\"name\":\"read_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":32}},{\"id\":33,\"name\":\"edit_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":33}},{\"id\":34,\"name\":\"add_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":34}},{\"id\":35,\"name\":\"delete_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":35}},{\"id\":36,\"name\":\"browse_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":36}},{\"id\":37,\"name\":\"read_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":37}},{\"id\":38,\"name\":\"edit_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":38}},{\"id\":39,\"name\":\"add_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":39}},{\"id\":40,\"name\":\"delete_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":40}}]}}', NULL, '2021-08-05 08:02:36', '2021-08-05 08:02:36'),
(28, 'default', 'update photo', 'App\\Models\\Photo', 'update', 1, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-08-12 08:27:50', '2021-08-12 08:27:50'),
(29, 'default', 'update photo', 'App\\Models\\Photo', 'update', 1, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-08-12 09:40:53', '2021-08-12 09:40:53'),
(30, 'default', 'update post', 'App\\Models\\Post', 'update', 17, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-08-17 11:40:34', '2021-08-17 11:40:34'),
(31, 'default', 'update post', 'App\\Models\\Post', 'update', 1, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-08-17 11:42:58', '2021-08-17 11:42:58'),
(32, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-28 08:58:23', '2021-12-28 08:58:23'),
(33, 'default', 'update post', 'App\\Models\\Post', 'update', 21, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-28 09:10:45', '2021-12-28 09:10:45'),
(34, 'default', 'update post', 'App\\Models\\Post', 'update', 21, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-28 09:18:23', '2021-12-28 09:18:23'),
(35, 'default', 'update post', 'App\\Models\\Post', 'update', 21, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-28 09:20:50', '2021-12-28 09:20:50'),
(36, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-28 09:24:39', '2021-12-28 09:24:39'),
(37, 'default', 'update post', 'App\\Models\\Post', 'update', 22, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-28 09:25:58', '2021-12-28 09:25:58'),
(38, 'default', 'store photo', 'App\\Models\\Photo', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-30 08:38:46', '2021-12-30 08:38:46'),
(39, 'default', 'store photo', 'App\\Models\\Photo', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-30 08:40:35', '2021-12-30 08:40:35'),
(40, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-31 03:29:23', '2021-12-31 03:29:23'),
(41, 'default', 'update post', 'App\\Models\\Post', 'update', 22, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-31 03:32:40', '2021-12-31 03:32:40'),
(42, 'default', 'update post', 'App\\Models\\Post', 'update', 21, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-31 03:33:07', '2021-12-31 03:33:07'),
(43, 'default', 'update post', 'App\\Models\\Post', 'update', 20, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-31 03:33:36', '2021-12-31 03:33:36'),
(44, 'default', 'update post', 'App\\Models\\Post', 'update', 20, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2021-12-31 03:38:53', '2021-12-31 03:38:53'),
(45, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":7,\"name\":\"Otomotif\",\"slug\":\"otomotif\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"0\",\"created_at\":\"2021-07-27T08:01:47.000000Z\",\"updated_at\":\"2021-07-28T10:10:39.000000Z\"}}', NULL, '2022-01-04 09:57:00', '2022-01-04 09:57:00'),
(46, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":1,\"name\":\"Techno\",\"slug\":\"techno\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"1\",\"created_at\":\"2021-06-11T20:36:58.000000Z\",\"updated_at\":\"2022-01-04T09:57:29.000000Z\"}}', NULL, '2022-01-04 09:57:29', '2022-01-04 09:57:29'),
(47, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Food\",\"slug\":\"food\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"2\",\"created_at\":\"2021-06-11T20:37:49.000000Z\",\"updated_at\":\"2022-01-04T09:57:39.000000Z\"}}', NULL, '2022-01-04 09:57:39', '2022-01-04 09:57:39'),
(48, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":3,\"name\":\"Travel\",\"slug\":\"travel\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"3\",\"created_at\":\"2021-06-11T20:38:00.000000Z\",\"updated_at\":\"2022-01-04T09:57:51.000000Z\"}}', NULL, '2022-01-04 09:57:51', '2022-01-04 09:57:51'),
(49, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":5,\"name\":\"Sport\",\"slug\":\"sport\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"4\",\"created_at\":\"2021-07-27T08:00:43.000000Z\",\"updated_at\":\"2022-01-04T09:58:02.000000Z\"}}', NULL, '2022-01-04 09:58:02', '2022-01-04 09:58:02'),
(50, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":4,\"name\":\"Culture\",\"slug\":\"culture\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"0\",\"created_at\":\"2021-07-27T08:00:43.000000Z\",\"updated_at\":\"2022-01-04T09:58:16.000000Z\"}}', NULL, '2022-01-04 09:58:16', '2022-01-04 09:58:16'),
(51, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":4,\"name\":\"Culture\",\"slug\":\"culture\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"5\",\"created_at\":\"2021-07-27T08:00:43.000000Z\",\"updated_at\":\"2022-01-04T09:58:25.000000Z\"}}', NULL, '2022-01-04 09:58:25', '2022-01-04 09:58:25'),
(52, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":6,\"name\":\"Health\",\"slug\":\"health\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"6\",\"created_at\":\"2021-07-27T08:01:24.000000Z\",\"updated_at\":\"2022-01-04T09:58:45.000000Z\"}}', NULL, '2022-01-04 09:58:45', '2022-01-04 09:58:45'),
(53, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":7,\"name\":\"Finance\",\"slug\":\"finance\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"7\",\"created_at\":\"2021-07-27T08:01:47.000000Z\",\"updated_at\":\"2022-01-04T09:58:59.000000Z\"}}', NULL, '2022-01-04 09:58:59', '2022-01-04 09:58:59'),
(54, 'default', 'store category', 'App\\Models\\Category', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"Automotive\",\"slug\":\"automotive\",\"parent_id\":\"0\",\"order\":\"8\",\"updated_at\":\"2022-01-04T09:59:17.000000Z\",\"created_at\":\"2022-01-04T09:59:17.000000Z\",\"id\":8}}', NULL, '2022-01-04 09:59:17', '2022-01-04 09:59:17'),
(55, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":1,\"name\":\"Techno\",\"slug\":\"techno\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"1\",\"created_at\":\"2021-06-11T20:36:58.000000Z\",\"updated_at\":\"2022-01-04T09:57:29.000000Z\"}}', NULL, '2022-01-04 09:59:37', '2022-01-04 09:59:37'),
(56, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Food\",\"slug\":\"food\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"2\",\"created_at\":\"2021-06-11T20:37:49.000000Z\",\"updated_at\":\"2022-01-04T09:57:39.000000Z\"}}', NULL, '2022-01-04 09:59:44', '2022-01-04 09:59:44'),
(57, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":3,\"name\":\"Travel\",\"slug\":\"travel\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"3\",\"created_at\":\"2021-06-11T20:38:00.000000Z\",\"updated_at\":\"2022-01-04T09:57:51.000000Z\"}}', NULL, '2022-01-04 09:59:51', '2022-01-04 09:59:51'),
(58, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":5,\"name\":\"Sport\",\"slug\":\"sport\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"4\",\"created_at\":\"2021-07-27T08:00:43.000000Z\",\"updated_at\":\"2022-01-04T09:58:02.000000Z\"}}', NULL, '2022-01-04 09:59:59', '2022-01-04 09:59:59'),
(59, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":4,\"name\":\"Culture\",\"slug\":\"culture\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"5\",\"created_at\":\"2021-07-27T08:00:43.000000Z\",\"updated_at\":\"2022-01-04T09:58:25.000000Z\"}}', NULL, '2022-01-04 10:00:06', '2022-01-04 10:00:06'),
(60, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":6,\"name\":\"Health\",\"slug\":\"health\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"6\",\"created_at\":\"2021-07-27T08:01:24.000000Z\",\"updated_at\":\"2022-01-04T09:58:45.000000Z\"}}', NULL, '2022-01-04 10:00:13', '2022-01-04 10:00:13'),
(61, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":6,\"name\":\"Health\",\"slug\":\"health\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"6\",\"created_at\":\"2021-07-27T08:01:24.000000Z\",\"updated_at\":\"2022-01-04T09:58:45.000000Z\"}}', NULL, '2022-01-04 10:00:21', '2022-01-04 10:00:21'),
(62, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":7,\"name\":\"Finance\",\"slug\":\"finance\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"7\",\"created_at\":\"2021-07-27T08:01:47.000000Z\",\"updated_at\":\"2022-01-04T09:58:59.000000Z\"}}', NULL, '2022-01-04 10:00:27', '2022-01-04 10:00:27'),
(63, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":8,\"name\":\"Automotive\",\"slug\":\"automotive\",\"title\":null,\"description\":null,\"present\":1,\"parent_id\":\"0\",\"order\":\"8\",\"created_at\":\"2022-01-04T09:59:17.000000Z\",\"updated_at\":\"2022-01-04T09:59:17.000000Z\"}}', NULL, '2022-01-04 10:00:40', '2022-01-04 10:00:40'),
(64, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":1,\"name\":\"Techno\",\"slug\":\"techno\",\"title\":\"Techno\",\"description\":\"Techno\",\"present\":1,\"parent_id\":\"0\",\"order\":\"1\",\"created_at\":\"2021-06-11T20:36:58.000000Z\",\"updated_at\":\"2022-01-04T10:02:13.000000Z\"}}', NULL, '2022-01-04 10:02:13', '2022-01-04 10:02:13'),
(65, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Food\",\"slug\":\"food\",\"title\":\"Food\",\"description\":\"Food\",\"present\":1,\"parent_id\":\"0\",\"order\":\"2\",\"created_at\":\"2021-06-11T20:37:49.000000Z\",\"updated_at\":\"2022-01-04T10:02:27.000000Z\"}}', NULL, '2022-01-04 10:02:27', '2022-01-04 10:02:27'),
(66, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":3,\"name\":\"Travel\",\"slug\":\"travel\",\"title\":\"Travel\",\"description\":\"Travel\",\"present\":1,\"parent_id\":\"0\",\"order\":\"3\",\"created_at\":\"2021-06-11T20:38:00.000000Z\",\"updated_at\":\"2022-01-04T10:02:35.000000Z\"}}', NULL, '2022-01-04 10:02:35', '2022-01-04 10:02:35'),
(67, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":5,\"name\":\"Sport\",\"slug\":\"sport\",\"title\":\"Sport\",\"description\":\"Sport\",\"present\":1,\"parent_id\":\"0\",\"order\":\"4\",\"created_at\":\"2021-07-27T08:00:43.000000Z\",\"updated_at\":\"2022-01-04T10:02:44.000000Z\"}}', NULL, '2022-01-04 10:02:44', '2022-01-04 10:02:44'),
(68, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":4,\"name\":\"Culture\",\"slug\":\"culture\",\"title\":\"Culture\",\"description\":\"Culture\",\"present\":1,\"parent_id\":\"0\",\"order\":\"5\",\"created_at\":\"2021-07-27T08:00:43.000000Z\",\"updated_at\":\"2022-01-04T10:02:50.000000Z\"}}', NULL, '2022-01-04 10:02:50', '2022-01-04 10:02:50'),
(69, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":6,\"name\":\"Health\",\"slug\":\"health\",\"title\":\"Health\",\"description\":\"Health\",\"present\":1,\"parent_id\":\"0\",\"order\":\"6\",\"created_at\":\"2021-07-27T08:01:24.000000Z\",\"updated_at\":\"2022-01-04T10:02:57.000000Z\"}}', NULL, '2022-01-04 10:02:57', '2022-01-04 10:02:57'),
(70, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":7,\"name\":\"Finance\",\"slug\":\"finance\",\"title\":\"Finance\",\"description\":\"Finance\",\"present\":1,\"parent_id\":\"0\",\"order\":\"7\",\"created_at\":\"2021-07-27T08:01:47.000000Z\",\"updated_at\":\"2022-01-04T10:03:04.000000Z\"}}', NULL, '2022-01-04 10:03:04', '2022-01-04 10:03:04'),
(71, 'default', 'update category', 'App\\Models\\Category', 'update', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":8,\"name\":\"Automotive\",\"slug\":\"automotive\",\"title\":\"Automotive\",\"description\":\"Automotive\",\"present\":1,\"parent_id\":\"0\",\"order\":\"8\",\"created_at\":\"2022-01-04T09:59:17.000000Z\",\"updated_at\":\"2022-01-04T10:03:11.000000Z\"}}', NULL, '2022-01-04 10:03:11', '2022-01-04 10:03:11'),
(72, 'default', 'store setting', 'App\\Models\\Setting', 'store', 1, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"Tentang Kami\",\"slug\":\"tentang-kami\",\"content\":\"<p>Tentang Kami<\\/p>\",\"meta_description\":\"Tentang Kami\",\"meta_keywords\":\"Tentang Kami\",\"seo_title\":\"Tentang Kami\",\"updated_at\":\"2022-01-06T04:04:34.000000Z\",\"created_at\":\"2022-01-06T04:04:34.000000Z\",\"id\":1}}', NULL, '2022-01-06 04:04:36', '2022-01-06 04:04:36'),
(73, 'default', 'store setting', 'App\\Models\\Setting', 'store', 2, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"Redaksi\",\"slug\":\"redaksi\",\"content\":\"<p>Redaksi<\\/p>\",\"meta_description\":\"Redaksi\",\"meta_keywords\":\"Redaksi\",\"seo_title\":\"Redaksi\",\"updated_at\":\"2022-01-06T04:06:24.000000Z\",\"created_at\":\"2022-01-06T04:06:24.000000Z\",\"id\":2}}', NULL, '2022-01-06 04:06:24', '2022-01-06 04:06:24'),
(74, 'default', 'store setting', 'App\\Models\\Setting', 'store', 3, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"Info Iklan\",\"slug\":\"info-iklan\",\"content\":\"<p>Info Iklan<\\/p>\",\"meta_description\":\"Info Iklan\",\"meta_keywords\":\"Info Iklan\",\"seo_title\":\"Info Iklan\",\"updated_at\":\"2022-01-06T04:06:44.000000Z\",\"created_at\":\"2022-01-06T04:06:44.000000Z\",\"id\":3}}', NULL, '2022-01-06 04:06:44', '2022-01-06 04:06:44'),
(75, 'default', 'store setting', 'App\\Models\\Setting', 'store', 4, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"Karir\",\"slug\":\"karir\",\"content\":\"<p>Karir<\\/p>\",\"meta_description\":\"Karir\",\"meta_keywords\":\"Karir\",\"seo_title\":\"Karir\",\"updated_at\":\"2022-01-06T04:06:59.000000Z\",\"created_at\":\"2022-01-06T04:06:59.000000Z\",\"id\":4}}', NULL, '2022-01-06 04:06:59', '2022-01-06 04:06:59'),
(76, 'default', 'store setting', 'App\\Models\\Setting', 'store', 5, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"Kontak\",\"slug\":\"kontak\",\"content\":\"<p>Kontak<\\/p>\",\"meta_description\":\"Kontak\",\"meta_keywords\":\"Kontak\",\"seo_title\":\"Kontak\",\"updated_at\":\"2022-01-06T04:07:12.000000Z\",\"created_at\":\"2022-01-06T04:07:12.000000Z\",\"id\":5}}', NULL, '2022-01-06 04:07:12', '2022-01-06 04:07:12'),
(77, 'default', 'store setting', 'App\\Models\\Setting', 'store', 6, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"Pedoman\",\"slug\":\"pedoman\",\"content\":\"<p>Pedoman<\\/p>\",\"meta_description\":\"Pedoman\",\"meta_keywords\":\"Pedoman\",\"seo_title\":\"Pedoman\",\"updated_at\":\"2022-01-06T04:07:25.000000Z\",\"created_at\":\"2022-01-06T04:07:25.000000Z\",\"id\":6}}', NULL, '2022-01-06 04:07:25', '2022-01-06 04:07:25'),
(78, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-01-23 14:09:20', '2022-01-23 14:09:20');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(79, 'default', 'update role', 'Spatie\\Permission\\Models\\Role', 'update', 1, 'App\\Models\\User', 1, '{\"data\":{\"id\":1,\"name\":\"admin\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T03:29:31.000000Z\",\"updated_at\":\"2021-06-26T03:29:31.000000Z\",\"permissions\":[{\"id\":1,\"name\":\"browse_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":1}},{\"id\":2,\"name\":\"read_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":2}},{\"id\":3,\"name\":\"edit_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":3}},{\"id\":4,\"name\":\"add_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":4}},{\"id\":5,\"name\":\"delete_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":5}},{\"id\":6,\"name\":\"browse_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":6}},{\"id\":7,\"name\":\"read_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":7}},{\"id\":8,\"name\":\"edit_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":8}},{\"id\":9,\"name\":\"add_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":9}},{\"id\":10,\"name\":\"delete_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":10}},{\"id\":11,\"name\":\"browse_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":11}},{\"id\":12,\"name\":\"read_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":12}},{\"id\":13,\"name\":\"edit_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":13}},{\"id\":14,\"name\":\"add_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":14}},{\"id\":15,\"name\":\"delete_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":15}},{\"id\":16,\"name\":\"browse_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":16}},{\"id\":17,\"name\":\"read_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":17}},{\"id\":18,\"name\":\"edit_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":18}},{\"id\":19,\"name\":\"add_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":19}},{\"id\":20,\"name\":\"delete_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":20}},{\"id\":21,\"name\":\"browse_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":21}},{\"id\":22,\"name\":\"read_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":22}},{\"id\":23,\"name\":\"edit_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":23}},{\"id\":24,\"name\":\"add_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":24}},{\"id\":25,\"name\":\"delete_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":25}},{\"id\":26,\"name\":\"browse_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":26}},{\"id\":27,\"name\":\"read_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":27}},{\"id\":28,\"name\":\"edit_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":28}},{\"id\":29,\"name\":\"add_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":29}},{\"id\":30,\"name\":\"delete_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":30}},{\"id\":31,\"name\":\"browse_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":31}},{\"id\":32,\"name\":\"read_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":32}},{\"id\":33,\"name\":\"edit_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":33}},{\"id\":34,\"name\":\"add_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":34}},{\"id\":35,\"name\":\"delete_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":35}},{\"id\":36,\"name\":\"browse_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":36}},{\"id\":37,\"name\":\"read_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":37}},{\"id\":38,\"name\":\"edit_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":38}},{\"id\":39,\"name\":\"add_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":39}},{\"id\":40,\"name\":\"delete_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":40}},{\"id\":41,\"name\":\"browse_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":41}},{\"id\":42,\"name\":\"read_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":42}},{\"id\":43,\"name\":\"edit_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":43}},{\"id\":44,\"name\":\"add_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":44}},{\"id\":45,\"name\":\"delete_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":45}}]}}', NULL, '2022-01-25 07:21:29', '2022-01-25 07:21:29'),
(80, 'default', 'update role', 'Spatie\\Permission\\Models\\Role', 'update', 2, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"editor\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T04:02:21.000000Z\",\"updated_at\":\"2021-06-26T04:02:21.000000Z\",\"permissions\":[{\"id\":1,\"name\":\"browse_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":1}},{\"id\":2,\"name\":\"read_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":2}},{\"id\":3,\"name\":\"edit_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":3}},{\"id\":4,\"name\":\"add_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":4}},{\"id\":5,\"name\":\"delete_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":5}},{\"id\":16,\"name\":\"browse_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":16}},{\"id\":17,\"name\":\"read_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":17}},{\"id\":18,\"name\":\"edit_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":18}},{\"id\":19,\"name\":\"add_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":19}},{\"id\":20,\"name\":\"delete_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":20}},{\"id\":26,\"name\":\"browse_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":26}},{\"id\":27,\"name\":\"read_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":27}},{\"id\":28,\"name\":\"edit_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":28}},{\"id\":29,\"name\":\"add_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":29}},{\"id\":30,\"name\":\"delete_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":30}},{\"id\":36,\"name\":\"browse_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":36}},{\"id\":37,\"name\":\"read_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":37}},{\"id\":38,\"name\":\"edit_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":38}},{\"id\":39,\"name\":\"add_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":39}},{\"id\":40,\"name\":\"delete_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":40}},{\"id\":41,\"name\":\"browse_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":41}},{\"id\":42,\"name\":\"read_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":42}},{\"id\":43,\"name\":\"edit_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":43}},{\"id\":44,\"name\":\"add_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":44}},{\"id\":45,\"name\":\"delete_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":45}}]}}', NULL, '2022-01-25 07:27:10', '2022-01-25 07:27:10'),
(81, 'default', 'store video', 'App\\Models\\Video', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{\"title\":\"MAKAN DIRUMAH HANTU, CUMA GW SENDIRI YANG MAKAN DISINI...\",\"vid\":\"iPHzSg364_Q\",\"slug\":\"makan-dirumah-hantu-cuma-gw-sendiri-yang-makan-disini\",\"description\":\"Cimory Yogurt Squeeze, yogurt anti repot, gak perlu sendok dan mangkok. Rasanya enak, creamy, dan teksturnya lembut. Ditambah rasanya juga unik-unik banget dan bikin auto ketagihan! Pssssttt Cimory Yogurt Squeeze ada 4 variant baru loh, Black Sticky Rice, Purple Taro, Mango Sticky Rice, dan Cavendish Banana. Kalian udah pada cobain belum? Yuk segera dapatkan di minimarket dan supermarket terdekat.\",\"thumbnail\":\"https:\\/\\/i.ytimg.com\\/vi\\/iPHzSg364_Q\\/maxresdefault.jpg\",\"status\":\"1\",\"updated_at\":\"2022-01-25T07:39:15.000000Z\",\"created_at\":\"2022-01-25T07:39:15.000000Z\",\"id\":2}}', NULL, '2022-01-25 07:39:16', '2022-01-25 07:39:16'),
(82, 'default', 'update post', 'App\\Models\\Post', 'update', 23, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 08:16:38', '2022-02-22 08:16:38'),
(83, 'default', 'update post', 'App\\Models\\Post', 'update', 23, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 08:18:34', '2022-02-22 08:18:34'),
(84, 'default', 'update post', 'App\\Models\\Post', 'update', 23, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 08:19:04', '2022-02-22 08:19:04'),
(85, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 08:30:58', '2022-02-22 08:30:58'),
(86, 'default', 'update post', 'App\\Models\\Post', 'update', 23, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 08:35:40', '2022-02-22 08:35:40'),
(87, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 09:02:39', '2022-02-22 09:02:39'),
(88, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 09:02:47', '2022-02-22 09:02:47'),
(89, 'default', 'update post', 'App\\Models\\Post', 'update', 23, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 09:03:30', '2022-02-22 09:03:30'),
(90, 'default', 'update post', 'App\\Models\\Post', 'update', 23, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-22 09:03:55', '2022-02-22 09:03:55'),
(91, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:04:01', '2022-02-23 08:04:01'),
(92, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:04:47', '2022-02-23 08:04:47'),
(93, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:06:20', '2022-02-23 08:06:20'),
(94, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:11:24', '2022-02-23 08:11:24'),
(95, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:12:18', '2022-02-23 08:12:18'),
(96, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:12:31', '2022-02-23 08:12:31'),
(97, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:13:01', '2022-02-23 08:13:01'),
(98, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:13:10', '2022-02-23 08:13:10'),
(99, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:13:46', '2022-02-23 08:13:46'),
(100, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:13:55', '2022-02-23 08:13:55'),
(101, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:14:17', '2022-02-23 08:14:17'),
(102, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:14:44', '2022-02-23 08:14:44'),
(103, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:14:50', '2022-02-23 08:14:50'),
(104, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:16:23', '2022-02-23 08:16:23'),
(105, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:16:29', '2022-02-23 08:16:29'),
(106, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:16:36', '2022-02-23 08:16:36'),
(107, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:17:08', '2022-02-23 08:17:08'),
(108, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:17:16', '2022-02-23 08:17:16'),
(109, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:36:38', '2022-02-23 08:36:38'),
(110, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:36:48', '2022-02-23 08:36:48'),
(111, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:41:25', '2022-02-23 08:41:25'),
(112, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:41:35', '2022-02-23 08:41:35'),
(113, 'default', 'update post', 'App\\Models\\Post', 'update', 24, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 08:41:56', '2022-02-23 08:41:56'),
(114, 'default', 'delete post', 'App\\Models\\Post', 'delete', 16, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 09:16:26', '2022-02-23 09:16:26'),
(115, 'default', 'delete post', 'App\\Models\\Post', 'delete', 15, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-02-23 09:17:08', '2022-02-23 09:17:08'),
(116, 'default', 'store role', 'Spatie\\Permission\\Models\\Role', 'store', 3, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"writter\",\"guard_name\":\"web\",\"updated_at\":\"2022-04-15T09:36:13.000000Z\",\"created_at\":\"2022-04-15T09:36:13.000000Z\",\"id\":3,\"permissions\":[{\"id\":16,\"name\":\"browse_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":16}},{\"id\":17,\"name\":\"read_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":17}},{\"id\":18,\"name\":\"edit_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":18}},{\"id\":19,\"name\":\"add_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":19}},{\"id\":20,\"name\":\"delete_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":20}},{\"id\":26,\"name\":\"browse_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":26}},{\"id\":27,\"name\":\"read_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":27}},{\"id\":28,\"name\":\"edit_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":28}},{\"id\":29,\"name\":\"add_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":29}},{\"id\":30,\"name\":\"delete_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":30}},{\"id\":36,\"name\":\"browse_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":36}},{\"id\":37,\"name\":\"read_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":37}},{\"id\":38,\"name\":\"edit_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":38}},{\"id\":39,\"name\":\"add_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":39}},{\"id\":40,\"name\":\"delete_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":40}},{\"id\":41,\"name\":\"browse_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":41}},{\"id\":42,\"name\":\"read_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":42}},{\"id\":43,\"name\":\"edit_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":43}},{\"id\":44,\"name\":\"add_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":44}},{\"id\":45,\"name\":\"delete_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":3,\"permission_id\":45}}]}}', NULL, '2022-04-15 09:36:14', '2022-04-15 09:36:14'),
(117, 'default', 'store user', 'App\\Models\\User', 'store', 4, 'App\\Models\\User', 1, '{\"data\":{\"name\":\"writter\",\"email\":\"writter@gmail.com\",\"updated_at\":\"2022-04-15T09:37:21.000000Z\",\"created_at\":\"2022-04-15T09:37:21.000000Z\",\"id\":4,\"roles\":[{\"id\":3,\"name\":\"writter\",\"guard_name\":\"web\",\"created_at\":\"2022-04-15T09:36:13.000000Z\",\"updated_at\":\"2022-04-15T09:36:13.000000Z\",\"pivot\":{\"model_id\":4,\"role_id\":3,\"model_type\":\"App\\\\Models\\\\User\"}}]}}', NULL, '2022-04-15 09:37:21', '2022-04-15 09:37:21'),
(118, 'default', 'udate profile', 'App\\Models\\User', 'udate', NULL, 'App\\Models\\User', 1, '{\"data\":{\"id\":1,\"name\":\"Rizal Muhamad H\",\"email\":\"admin@admin.com\",\"profile\":null,\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-11T05:49:28.000000Z\",\"updated_at\":\"2021-07-29T03:42:50.000000Z\",\"image\":{\"id\":5,\"path\":\"posts\\\\2021\\\\07\\\\27\\\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png\",\"caption\":null,\"photographer\":null,\"source\":null,\"imageable_id\":1,\"imageable_type\":\"App\\\\Models\\\\User\",\"created_at\":\"2021-06-13T05:09:42.000000Z\",\"updated_at\":\"2021-06-13T05:09:42.000000Z\"}}}', NULL, '2022-04-15 09:37:51', '2022-04-15 09:37:51'),
(119, 'default', 'update user', 'App\\Models\\User', 'update', 2, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Rizal\",\"email\":\"rizal.muhamad.dev@gmail.com\",\"profile\":null,\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-12T17:25:48.000000Z\",\"updated_at\":\"2022-04-15T14:06:06.000000Z\"}}', NULL, '2022-04-15 14:06:06', '2022-04-15 14:06:06'),
(120, 'default', 'update user', 'App\\Models\\User', 'update', 2, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Rizal\",\"email\":\"rizal.muhamad.dev@gmail.com\",\"profile\":null,\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-12T17:25:48.000000Z\",\"updated_at\":\"2022-04-15T14:06:06.000000Z\",\"roles\":[{\"id\":2,\"name\":\"editor\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T04:02:21.000000Z\",\"updated_at\":\"2021-06-26T04:02:21.000000Z\",\"pivot\":{\"model_id\":2,\"role_id\":2,\"model_type\":\"App\\\\Models\\\\User\"}}]}}', NULL, '2022-04-15 14:12:32', '2022-04-15 14:12:32'),
(121, 'default', 'update user', 'App\\Models\\User', 'update', 2, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Rizal\",\"email\":\"rizal.muhamad.dev@gmail.com\",\"profile\":null,\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-12T17:25:48.000000Z\",\"updated_at\":\"2022-04-15T14:06:06.000000Z\",\"roles\":[{\"id\":2,\"name\":\"editor\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T04:02:21.000000Z\",\"updated_at\":\"2021-06-26T04:02:21.000000Z\",\"pivot\":{\"model_id\":2,\"role_id\":2,\"model_type\":\"App\\\\Models\\\\User\"}}]}}', NULL, '2022-04-15 14:12:38', '2022-04-15 14:12:38'),
(122, 'default', 'update role', 'Spatie\\Permission\\Models\\Role', 'update', 2, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"editor\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T04:02:21.000000Z\",\"updated_at\":\"2021-06-26T04:02:21.000000Z\",\"permissions\":[{\"id\":1,\"name\":\"browse_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":1}},{\"id\":2,\"name\":\"read_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":2}},{\"id\":3,\"name\":\"edit_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":3}},{\"id\":4,\"name\":\"add_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":4}},{\"id\":5,\"name\":\"delete_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":5}},{\"id\":16,\"name\":\"browse_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":16}},{\"id\":17,\"name\":\"read_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":17}},{\"id\":18,\"name\":\"edit_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":18}},{\"id\":19,\"name\":\"add_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":19}},{\"id\":20,\"name\":\"delete_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":20}},{\"id\":26,\"name\":\"browse_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":26}},{\"id\":27,\"name\":\"read_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":27}},{\"id\":28,\"name\":\"edit_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":28}},{\"id\":29,\"name\":\"add_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":29}},{\"id\":30,\"name\":\"delete_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":30}},{\"id\":36,\"name\":\"browse_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":36}},{\"id\":37,\"name\":\"read_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":37}},{\"id\":38,\"name\":\"edit_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":38}},{\"id\":39,\"name\":\"add_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":39}},{\"id\":40,\"name\":\"delete_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":40}},{\"id\":41,\"name\":\"browse_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":41}},{\"id\":42,\"name\":\"read_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":42}},{\"id\":43,\"name\":\"edit_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":43}},{\"id\":44,\"name\":\"add_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":44}},{\"id\":45,\"name\":\"delete_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":45}},{\"id\":46,\"name\":\"browse_reports\",\"guard_name\":\"web\",\"created_at\":\"2022-04-18T06:24:36.000000Z\",\"updated_at\":\"2022-04-18T06:24:36.000000Z\",\"pivot\":{\"role_id\":2,\"permission_id\":46}}]}}', NULL, '2022-04-18 06:25:02', '2022-04-18 06:25:02'),
(123, 'default', 'update role', 'Spatie\\Permission\\Models\\Role', 'update', 1, 'App\\Models\\User', 1, '{\"data\":{\"id\":1,\"name\":\"admin\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T03:29:31.000000Z\",\"updated_at\":\"2021-06-26T03:29:31.000000Z\",\"permissions\":[{\"id\":1,\"name\":\"browse_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":1}},{\"id\":2,\"name\":\"read_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":2}},{\"id\":3,\"name\":\"edit_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":3}},{\"id\":4,\"name\":\"add_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":4}},{\"id\":5,\"name\":\"delete_categories\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:02.000000Z\",\"updated_at\":\"2021-06-26T02:18:02.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":5}},{\"id\":6,\"name\":\"browse_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":6}},{\"id\":7,\"name\":\"read_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":7}},{\"id\":8,\"name\":\"edit_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":8}},{\"id\":9,\"name\":\"add_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":9}},{\"id\":10,\"name\":\"delete_roles\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":10}},{\"id\":11,\"name\":\"browse_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":11}},{\"id\":12,\"name\":\"read_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":12}},{\"id\":13,\"name\":\"edit_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":13}},{\"id\":14,\"name\":\"add_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":14}},{\"id\":15,\"name\":\"delete_users\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":15}},{\"id\":16,\"name\":\"browse_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":16}},{\"id\":17,\"name\":\"read_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":17}},{\"id\":18,\"name\":\"edit_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":18}},{\"id\":19,\"name\":\"add_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":19}},{\"id\":20,\"name\":\"delete_tags\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":20}},{\"id\":21,\"name\":\"browse_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":21}},{\"id\":22,\"name\":\"read_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":22}},{\"id\":23,\"name\":\"edit_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":23}},{\"id\":24,\"name\":\"add_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":24}},{\"id\":25,\"name\":\"delete_features\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":25}},{\"id\":26,\"name\":\"browse_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":26}},{\"id\":27,\"name\":\"read_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":27}},{\"id\":28,\"name\":\"edit_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":28}},{\"id\":29,\"name\":\"add_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":29}},{\"id\":30,\"name\":\"delete_posts\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T02:18:03.000000Z\",\"updated_at\":\"2021-06-26T02:18:03.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":30}},{\"id\":31,\"name\":\"browse_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":31}},{\"id\":32,\"name\":\"read_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":32}},{\"id\":33,\"name\":\"edit_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":33}},{\"id\":34,\"name\":\"add_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":34}},{\"id\":35,\"name\":\"delete_settings\",\"guard_name\":\"web\",\"created_at\":\"2021-07-28T07:09:23.000000Z\",\"updated_at\":\"2021-07-28T07:09:23.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":35}},{\"id\":36,\"name\":\"browse_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":36}},{\"id\":37,\"name\":\"read_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":37}},{\"id\":38,\"name\":\"edit_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":38}},{\"id\":39,\"name\":\"add_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":39}},{\"id\":40,\"name\":\"delete_photos\",\"guard_name\":\"web\",\"created_at\":\"2021-08-05T07:54:25.000000Z\",\"updated_at\":\"2021-08-05T07:54:25.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":40}},{\"id\":41,\"name\":\"browse_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":41}},{\"id\":42,\"name\":\"read_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":42}},{\"id\":43,\"name\":\"edit_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":43}},{\"id\":44,\"name\":\"add_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":44}},{\"id\":45,\"name\":\"delete_videos\",\"guard_name\":\"web\",\"created_at\":\"2022-01-25T07:20:49.000000Z\",\"updated_at\":\"2022-01-25T07:20:49.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":45}},{\"id\":46,\"name\":\"browse_reports\",\"guard_name\":\"web\",\"created_at\":\"2022-04-18T06:24:36.000000Z\",\"updated_at\":\"2022-04-18T06:24:36.000000Z\",\"pivot\":{\"role_id\":1,\"permission_id\":46}}]}}', NULL, '2022-04-18 06:25:07', '2022-04-18 06:25:07'),
(124, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-06-10 04:25:53', '2022-06-10 04:25:53'),
(125, 'default', 'update post', 'App\\Models\\Post', 'update', 17, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-06-10 06:20:31', '2022-06-10 06:20:31'),
(126, 'default', 'update post', 'App\\Models\\Post', 'update', 18, 'App\\Models\\User', 1, '{\"data\":{}}', NULL, '2022-06-10 07:44:03', '2022-06-10 07:44:03'),
(127, 'default', 'update user', 'App\\Models\\User', 'update', 2, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Rizal Muhamad H\",\"email\":\"rizal.muhamad.dev@gmail.com\",\"profile\":null,\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-12T17:25:48.000000Z\",\"updated_at\":\"2022-06-13T08:22:53.000000Z\",\"roles\":[{\"id\":1,\"name\":\"admin\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T03:29:31.000000Z\",\"updated_at\":\"2021-06-26T03:29:31.000000Z\",\"pivot\":{\"model_id\":2,\"role_id\":1,\"model_type\":\"App\\\\Models\\\\User\"}}]}}', NULL, '2022-06-13 08:22:53', '2022-06-13 08:22:53'),
(128, 'default', 'update user', 'App\\Models\\User', 'update', 2, 'App\\Models\\User', 1, '{\"data\":{\"id\":2,\"name\":\"Rizal Muhamad H\",\"email\":\"rizal.muhamad.dev@gmail.com\",\"profile\":null,\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-12T17:25:48.000000Z\",\"updated_at\":\"2022-06-13T08:23:48.000000Z\",\"roles\":[{\"id\":1,\"name\":\"admin\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T03:29:31.000000Z\",\"updated_at\":\"2021-06-26T03:29:31.000000Z\",\"pivot\":{\"model_id\":2,\"role_id\":1,\"model_type\":\"App\\\\Models\\\\User\"}}]}}', NULL, '2022-06-13 08:23:48', '2022-06-13 08:23:48'),
(129, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-13 08:42:58', '2022-06-13 08:42:58'),
(130, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-13 08:45:42', '2022-06-13 08:45:42'),
(131, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-13 08:48:27', '2022-06-13 08:48:27'),
(132, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-13 08:52:18', '2022-06-13 08:52:18'),
(133, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-14 05:13:19', '2022-06-14 05:13:19'),
(134, 'default', 'update user', 'App\\Models\\User', 'update', 3, 'App\\Models\\User', 2, '{\"data\":{\"id\":3,\"name\":\"Editor\",\"email\":\"rizalm52@gmail.com\",\"profile\":null,\"email_verified_at\":null,\"two_factor_secret\":null,\"two_factor_recovery_codes\":null,\"created_at\":\"2021-06-26T03:46:22.000000Z\",\"updated_at\":\"2022-06-15T07:57:27.000000Z\",\"roles\":[{\"id\":2,\"name\":\"editor\",\"guard_name\":\"web\",\"created_at\":\"2021-06-26T04:02:21.000000Z\",\"updated_at\":\"2021-06-26T04:02:21.000000Z\",\"pivot\":{\"model_id\":3,\"role_id\":2,\"model_type\":\"App\\\\Models\\\\User\"}}]}}', NULL, '2022-06-15 07:57:27', '2022-06-15 07:57:27'),
(135, 'default', 'update post', 'App\\Models\\Post', 'update', 28, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-17 07:28:52', '2022-06-17 07:28:52'),
(136, 'default', 'delete post', 'App\\Models\\Post', 'delete', 28, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-17 07:33:32', '2022-06-17 07:33:32'),
(137, 'default', 'Restored', 'App\\Models\\Post', 'restore', 28, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-17 07:44:44', '2022-06-17 07:44:44'),
(138, 'default', 'update post', 'App\\Models\\Post', 'update', 28, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-17 07:48:38', '2022-06-17 07:48:38'),
(139, 'default', 'update post', 'App\\Models\\Post', 'update', 29, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-20 09:44:40', '2022-06-20 09:44:40'),
(140, 'default', 'update post', 'App\\Models\\Post', 'update', 29, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 03:59:46', '2022-06-22 03:59:46'),
(141, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 04:56:41', '2022-06-22 04:56:41'),
(142, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 05:01:45', '2022-06-22 05:01:45'),
(143, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 05:08:20', '2022-06-22 05:08:20'),
(144, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 05:09:54', '2022-06-22 05:09:54'),
(145, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 05:15:27', '2022-06-22 05:15:27'),
(146, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 05:16:31', '2022-06-22 05:16:31'),
(147, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 05:16:53', '2022-06-22 05:16:53'),
(148, 'default', 'update photo', 'App\\Models\\Photo', 'update', 5, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 05:31:35', '2022-06-22 05:31:35'),
(149, 'default', 'store tag', 'App\\Models\\Tag', 'store', 8, 'App\\Models\\User', 2, '{\"data\":{\"name\":\"Kurban\",\"slug\":\"kurban\",\"updated_at\":\"2022-06-22T07:29:11.000000Z\",\"created_at\":\"2022-06-22T07:29:11.000000Z\",\"id\":8}}', NULL, '2022-06-22 07:29:11', '2022-06-22 07:29:11'),
(150, 'default', 'store post', 'App\\Models\\Post', 'store', NULL, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:31:49', '2022-06-22 07:31:49');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(151, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:32:20', '2022-06-22 07:32:20'),
(152, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:39:05', '2022-06-22 07:39:05'),
(153, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:43:20', '2022-06-22 07:43:20'),
(154, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:43:28', '2022-06-22 07:43:28'),
(155, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:45:24', '2022-06-22 07:45:24'),
(156, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:45:34', '2022-06-22 07:45:34'),
(157, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 07:51:45', '2022-06-22 07:51:45'),
(158, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 08:03:20', '2022-06-22 08:03:20'),
(159, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 08:08:31', '2022-06-22 08:08:31'),
(160, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 08:15:08', '2022-06-22 08:15:08'),
(161, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 08:18:13', '2022-06-22 08:18:13'),
(162, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 08:21:19', '2022-06-22 08:21:19'),
(163, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 08:52:05', '2022-06-22 08:52:05'),
(164, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 09:33:58', '2022-06-22 09:33:58'),
(165, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 09:41:07', '2022-06-22 09:41:07'),
(166, 'default', 'update post', 'App\\Models\\Post', 'update', 30, 'App\\Models\\User', 2, '{\"data\":{}}', NULL, '2022-06-22 09:42:19', '2022-06-22 09:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `profile`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rizal Muhamad H', 'admin@admin.com', NULL, NULL, '$2y$10$QO1V7giLu8BgfbyYfskKZ.dBcVWm0wvL1zILncZER9PfBi0cS1.eW', NULL, NULL, NULL, '2021-06-11 05:49:28', '2021-07-29 03:42:50'),
(2, 'Rizal Muhamad H', 'rizal.muhamad.dev@gmail.com', NULL, NULL, '$2y$10$A.z83WhRkfT1lTSFJoZhb.SrU4pnMdV9Qd8WwxCNymiYMfI61SPSa', NULL, NULL, NULL, '2021-06-12 17:25:48', '2022-06-13 08:23:48'),
(3, 'Editor', 'rizalm52@gmail.com', NULL, NULL, '$2y$10$hzBTDghzRW2he/c1uCZTbuiGffEo1GFuYgD5etXJv9m4JWI02QZqK', NULL, NULL, 'PNVX4h4CzhWZJkXulBpoN5vVcWQOLTQyaKI5iXAqW73tcrSXcwzuWBDMgXmC', '2021-06-26 03:46:22', '2022-06-15 07:57:27'),
(4, 'writter', 'writter@gmail.com', NULL, NULL, '$2y$10$IXQHhe5h//M9h5zm9dvA4ulNJrDCQxFiLSiEHoJXDPCdcln436bUW', NULL, NULL, NULL, '2022-04-15 09:37:21', '2022-04-15 09:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `bodylinks`
--

CREATE TABLE `bodylinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bodylinkable_id` bigint(20) UNSIGNED NOT NULL,
  `bodylinkable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `title`, `description`, `present`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Techno', 'techno', 'Techno', 'Techno', 1, 0, 1, '2021-06-11 20:36:58', '2022-01-04 10:02:13'),
(2, 'Food', 'food', 'Food', 'Food', 1, 0, 2, '2021-06-11 20:37:49', '2022-01-04 10:02:27'),
(3, 'Travel', 'travel', 'Travel', 'Travel', 1, 0, 3, '2021-06-11 20:38:00', '2022-01-04 10:02:35'),
(4, 'Culture', 'culture', 'Culture', 'Culture', 1, 0, 5, '2021-07-27 08:00:43', '2022-01-04 10:02:50'),
(5, 'Sport', 'sport', 'Sport', 'Sport', 1, 0, 4, '2021-07-27 08:00:43', '2022-01-04 10:02:44'),
(6, 'Health', 'health', 'Health', 'Health', 1, 0, 6, '2021-07-27 08:01:24', '2022-01-04 10:02:57'),
(7, 'Finance', 'finance', 'Finance', 'Finance', 1, 0, 7, '2021-07-27 08:01:47', '2022-01-04 10:03:04'),
(8, 'Automotive', 'automotive', 'Automotive', 'Automotive', 1, 0, 8, '2022-01-04 09:59:17', '2022-01-04 10:03:11');

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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Headline', '2021-06-12 09:38:01', '2021-06-12 09:38:01'),
(2, 'Breaking News', '2021-06-19 01:42:02', '2021-07-28 10:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photographer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `caption`, `photographer`, `source`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(6, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 2, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(7, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 3, 'App\\Models\\Post', '2021-06-13 05:09:42', '2021-06-13 05:09:42'),
(8, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 4, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(9, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 5, 'App\\Models\\Post', '2021-06-13 05:09:42', '2021-06-13 05:09:42'),
(10, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 6, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(11, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 7, 'App\\Models\\Post', '2021-06-13 05:09:42', '2021-06-13 05:09:42'),
(12, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 8, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(13, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 9, 'App\\Models\\Post', '2021-06-13 05:09:42', '2021-06-13 05:09:42'),
(14, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 10, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(15, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 11, 'App\\Models\\Post', '2021-06-13 05:09:42', '2021-06-13 05:09:42'),
(16, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 12, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(17, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 13, 'App\\Models\\Post', '2021-06-13 05:09:42', '2021-06-13 05:09:42'),
(18, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 14, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(19, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 15, 'App\\Models\\Post', '2021-06-13 05:09:42', '2021-06-13 05:09:42'),
(20, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 16, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-06-19 01:42:46'),
(25, 'posts\\2021\\07\\27\\1627354750_60ff767e9911e_CYbN3lBvs0y9Sj3vwZYC.png', NULL, NULL, NULL, 1, 'App\\Models\\Post', '2021-06-19 01:42:46', '2021-08-17 11:42:58'),
(29, 'posts/2021/12/23/1640249771_61c439ab7a9ae_hc9H1s3ILzZZYPzkLUhj.png', NULL, NULL, NULL, 19, 'App\\Models\\Post', '2021-12-23 01:56:12', '2021-12-23 01:56:12'),
(30, 'posts/2021/12/28/1640676935_61cabe473b498_ABp9lqXkfQoJBkUn5D9Z.jpeg', NULL, NULL, NULL, 20, 'App\\Models\\Post', '2021-12-28 00:35:35', '2021-12-31 03:38:53'),
(31, 'posts/2021/12/28/1640681902_61cad1ae8071c_HiAGbBuLVrwPw8aPd66F.jpg', 'image', NULL, NULL, 21, 'App\\Models\\Post', '2021-12-28 08:58:22', '2021-12-31 03:33:07'),
(32, 'posts/2021/12/28/1640683478_61cad7d6ccbcc_2fqjt7jYsLsMsjJ07etf.png', 'image', NULL, NULL, 22, 'App\\Models\\Post', '2021-12-28 09:24:39', '2021-12-31 03:32:40'),
(33, '0', 'promo bjb', NULL, NULL, 3, 'App\\Models\\Photo', '2021-12-30 08:23:25', '2021-12-30 08:23:25'),
(34, '1', 'promo bjb', NULL, NULL, 3, 'App\\Models\\Photo', '2021-12-30 08:23:25', '2021-12-30 08:23:25'),
(35, '2', 'promo bjb', NULL, NULL, 3, 'App\\Models\\Photo', '2021-12-30 08:23:25', '2021-12-30 08:23:25'),
(36, 'photos/2021/12/1640853525_61cd70151bdca_dPfM80GYpgOnt7U6MUmN.jpg', 'jadwal imsakiyah', NULL, NULL, 4, 'App\\Models\\Photo', '2021-12-30 08:38:45', '2021-12-30 08:38:45'),
(37, 'photos/2021/12/1640853525_61cd70156127e_t1dIz9GgSrU3pP6bCdOS.jpg', 'jadwal imsakiyah', NULL, NULL, 4, 'App\\Models\\Photo', '2021-12-30 08:38:45', '2021-12-30 08:38:45'),
(40, 'posts/2022/01/23/1642946959_61ed618fe8b08_FuVdV3c3qxX4hqrheHLD.jpeg', 'buah', NULL, NULL, 23, 'App\\Models\\Post', '2022-01-23 14:09:20', '2022-02-22 09:03:55'),
(41, 'posts/2022/02/22/1645518657_62149f41c0229_QNoSr7lZS4kSW7ovBgIR.jpeg', 'buah pinus', NULL, NULL, 24, 'App\\Models\\Post', '2022-02-22 08:30:58', '2022-02-23 08:41:56'),
(42, 'users/1/2022/04/15/1650015470_62593cee4bfa9_Iwaw5XDtuiZdJYm22bQB.png', NULL, NULL, NULL, 1, 'App\\Models\\User', '2022-04-15 09:37:51', '2022-04-15 09:37:51'),
(43, 'posts/2022/06/10/1654835151_62a2c7cfbb3d3_UAX6r8xYOOtiXl5AdOXI.png', 'Jijutsu kaisen', NULL, NULL, 18, 'App\\Models\\Post', '2022-06-10 04:25:52', '2022-06-10 07:44:03'),
(44, 'posts/2022/06/10/1654842031_62a2e2af57bee_n4syDkNDLwL2ualdBuGK.jpg', 'test image', NULL, NULL, 17, 'App\\Models\\Post', '2022-06-10 06:20:31', '2022-06-10 06:20:31'),
(45, 'posts/2022/06/13/1655109777_62a6f891ec879_9S10NP6XxHpn0L4m1PZj.png', 'Screenshoot', NULL, NULL, 25, 'App\\Models\\Post', '2022-06-13 08:42:58', '2022-06-13 08:42:58'),
(46, 'posts/2022/06/13/1655109942_62a6f93625781_7e51sxLY0gmf7q3aDpyj.png', 'Screenshoot', NULL, NULL, 26, 'App\\Models\\Post', '2022-06-13 08:45:42', '2022-06-13 08:45:42'),
(47, 'posts/2022/06/13/1655110106_62a6f9dabed56_DV3EnajBtA8AOVZ1daCI.png', 'Screenshot', NULL, NULL, 27, 'App\\Models\\Post', '2022-06-13 08:48:27', '2022-06-13 08:48:27'),
(48, 'posts/2022/06/13/1655110338_62a6fac20308a_bkKxXDaD9PyiawwQrCN7.png', 'Screenshoot', NULL, NULL, 28, 'App\\Models\\Post', '2022-06-13 08:52:18', '2022-06-17 07:48:38'),
(49, 'posts/2022/06/14/1655183599_62a818ef3a834_SDYyleOrENGdNIyJ7WGv.jpg', 'Ilustrasi media sosial', NULL, NULL, 29, 'App\\Models\\Post', '2022-06-14 05:13:19', '2022-06-22 03:59:46'),
(54, 'photos/2022/06/1655874923_62b2a56b44be9_YtiZkbwPt5Tw1HccW5lw.jpg', 'Rencana Pemerintah Terbitkan SKB 4 Menteri tentang PTM Terbatas', 'Rencana Pemerintah Terbitkan SKB 4 Menteri tentang PTM Terbatas', NULL, 5, 'App\\Models\\Photo', '2022-06-22 05:15:27', '2022-06-22 05:31:35'),
(55, 'photos/2022/06/1655874923_62b2a56b874c1_Apd7lTf63HxjZRv6IBTs.png', 'Rencana Pemerintah Terbitkan SKB 4 Menteri tentang PTM Terbatas', 'Rencana Pemerintah Terbitkan SKB 4 Menteri tentang PTM Terbatas', NULL, 5, 'App\\Models\\Photo', '2022-06-22 05:15:27', '2022-06-22 05:31:35'),
(56, 'posts/2022/06/22/1655883109_62b2c5651b5ec_JtRVPxoAfpUhiOawy5Yx.jpeg', 'Illustrasi hewan kurban untuk Idul Adha melengkapi artikel Hukum Ibadah Kurban bagi ummat Islam, Wajib atau Sunnah. (Unsplash/Sam Carter)', NULL, NULL, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 09:42:19');

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
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2021_06_05_082652_create_categories_table', 2),
(25, '2021_06_05_082737_create_images_table', 3),
(27, '2021_06_05_083012_create_tags_table', 3),
(29, '2021_06_05_084958_create_features_table', 3),
(30, '2021_06_05_082720_create_posts_table', 4),
(31, '2021_06_05_083539_create_bodylinks_table', 5),
(33, '2021_06_06_113848_create_taggables_table', 6),
(35, '2014_10_12_100000_create_password_resets_table', 8),
(36, '2014_10_12_200000_add_two_factor_columns_to_users_table', 8),
(37, '2021_06_26_082223_create_permission_tables', 9),
(38, '2021_07_03_144716_create_views_table', 10),
(39, '2021_07_03_221100_create_activity_log_table', 11),
(40, '2021_07_03_221101_add_event_column_to_activity_log_table', 11),
(41, '2021_07_03_221102_add_batch_uuid_column_to_activity_log_table', 11),
(42, '2021_07_28_132733_create_settings_table', 12),
(43, '2021_08_03_141156_create_photos_table', 13),
(50, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(51, '2020_05_21_100000_create_teams_table', 15),
(52, '2020_05_21_200000_create_team_user_table', 15),
(53, '2020_05_21_300000_create_team_invitations_table', 15),
(54, '2021_12_14_081924_create_sessions_table', 15),
(55, '2014_10_12_000000_create_users_table', 16),
(56, '2021_06_05_082753_create_videos_table', 17),
(58, '2022_02_22_144907_create_related_table', 18),
(59, '2018_08_08_100000_create_telescope_entries_table', 19);

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

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

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
(1, 'browse_categories', 'web', '2021-06-26 02:18:02', '2021-06-26 02:18:02'),
(2, 'read_categories', 'web', '2021-06-26 02:18:02', '2021-06-26 02:18:02'),
(3, 'edit_categories', 'web', '2021-06-26 02:18:02', '2021-06-26 02:18:02'),
(4, 'add_categories', 'web', '2021-06-26 02:18:02', '2021-06-26 02:18:02'),
(5, 'delete_categories', 'web', '2021-06-26 02:18:02', '2021-06-26 02:18:02'),
(6, 'browse_roles', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(7, 'read_roles', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(8, 'edit_roles', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(9, 'add_roles', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(10, 'delete_roles', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(11, 'browse_users', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(12, 'read_users', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(13, 'edit_users', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(14, 'add_users', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(15, 'delete_users', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(16, 'browse_tags', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(17, 'read_tags', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(18, 'edit_tags', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(19, 'add_tags', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(20, 'delete_tags', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(21, 'browse_features', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(22, 'read_features', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(23, 'edit_features', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(24, 'add_features', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(25, 'delete_features', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(26, 'browse_posts', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(27, 'read_posts', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(28, 'edit_posts', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(29, 'add_posts', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(30, 'delete_posts', 'web', '2021-06-26 02:18:03', '2021-06-26 02:18:03'),
(31, 'browse_settings', 'web', '2021-07-28 07:09:23', '2021-07-28 07:09:23'),
(32, 'read_settings', 'web', '2021-07-28 07:09:23', '2021-07-28 07:09:23'),
(33, 'edit_settings', 'web', '2021-07-28 07:09:23', '2021-07-28 07:09:23'),
(34, 'add_settings', 'web', '2021-07-28 07:09:23', '2021-07-28 07:09:23'),
(35, 'delete_settings', 'web', '2021-07-28 07:09:23', '2021-07-28 07:09:23'),
(36, 'browse_photos', 'web', '2021-08-05 07:54:25', '2021-08-05 07:54:25'),
(37, 'read_photos', 'web', '2021-08-05 07:54:25', '2021-08-05 07:54:25'),
(38, 'edit_photos', 'web', '2021-08-05 07:54:25', '2021-08-05 07:54:25'),
(39, 'add_photos', 'web', '2021-08-05 07:54:25', '2021-08-05 07:54:25'),
(40, 'delete_photos', 'web', '2021-08-05 07:54:25', '2021-08-05 07:54:25'),
(41, 'browse_videos', 'web', '2022-01-25 07:20:49', '2022-01-25 07:20:49'),
(42, 'read_videos', 'web', '2022-01-25 07:20:49', '2022-01-25 07:20:49'),
(43, 'edit_videos', 'web', '2022-01-25 07:20:49', '2022-01-25 07:20:49'),
(44, 'add_videos', 'web', '2022-01-25 07:20:49', '2022-01-25 07:20:49'),
(45, 'delete_videos', 'web', '2022-01-25 07:20:49', '2022-01-25 07:20:49'),
(46, 'browse_reports', 'web', '2022-04-18 06:24:36', '2022-04-18 06:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `slug`, `description`, `admin_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'PROMO BJB MUSISI', 'promo-bjb-musisi', '<p>Promo bjb</p>', 1, '2021-12-30 08:36:09', '2021-12-30 08:21:54', '2021-12-30 08:36:09'),
(3, 'PROMO BJB MUSISI', 'promo-bjb-musisi', '<p>Promo bjb</p>', 1, '2021-12-30 08:34:32', '2021-12-30 08:23:24', '2021-12-30 08:34:32'),
(4, 'Jadwal Imsakiyah 6', 'jadwal-imsakiyah-6', '<p>Jadwal Imsakiyah 6</p>', 1, NULL, '2021-12-30 08:38:45', '2021-12-30 08:38:45'),
(5, 'Rencana Pemerintah Terbitkan SKB 4 Menteri tentang PTM Terbatas', 'rencana-pemerintah-terbitkan-skb-4-menteri-tentang-ptm-terbatas', '<h1 class=\"read__title\">Rencana Pemerintah Terbitkan SKB 4 Menteri tentang PTM Terbatas</h1>', 1, NULL, '2021-12-30 08:40:34', '2021-12-30 08:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `body`, `source`, `source_link`, `feature_id`, `category_id`, `admin_id`, `author_id`, `status`, `meta_description`, `meta_keywords`, `seo_title`, `published_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 2', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry-2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 2, 1, 2, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-08-17 11:42:58'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 3', 'jaga-ketahanan-pangan-selama-ppkm-darurat-kota-bogor-dirikan-posko-logistik', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 1, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 3', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 1, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 4', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 1, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 6', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 1, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 7', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 2, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(7, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 8', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 2, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(8, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 9', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 2, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 10', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 2, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 11', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 2, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(11, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 12', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 2, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 13', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 3, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(13, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 14', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 3, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 15', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 3, 1, NULL, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', NULL, '2021-06-19 01:42:45', '2021-06-19 02:20:42'),
(15, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 16', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 2, 3, 1, NULL, 'TRASH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', '2022-02-23 09:17:08', '2021-06-19 01:42:45', '2022-02-23 09:17:08'),
(16, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry 17', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1, 3, 1, NULL, 'TRASH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', NULL, '2021-06-19 00:00:00', '2022-02-23 09:16:26', '2021-06-19 01:42:45', '2022-02-23 09:16:26'),
(17, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry meili', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry-meili', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, NULL, 2, 2, 1, 1, 'PUBLISH', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, '2021-07-04 00:00:00', NULL, '2021-07-04 03:59:28', '2021-08-17 11:40:34'),
(18, 'Jaga Ketahanan Pangan Selama PPKM Darurat, Kota Bogor Dirikan Posko Logistik', 'jaga-ketahanan-pangan-selama-ppkm-darurat-kota-bogor-dirikan-posko-logistik', 'Jaga Ketahanan Pangan Selama PPKM Darurat, Kota Bogor Dirikan Posko Logistik', '<p>Ketua Satgas Covid-19&nbsp;<a class=\"related-tag text-orange\" href=\"https://ayobandung.com/tag/Kota%20Bogor\">Kota Bogor</a>&nbsp;Bima Arya Sugiarto mengatakan,&nbsp;<a class=\"related-tag text-orange\" href=\"https://ayobandung.com/tag/posko%20logistik\">posko logistik</a>&nbsp;tersebut&nbsp;nantinya bakal bertugas mendistribusikan bantuan kepada masyarakat&nbsp;<a class=\"related-tag text-orange\" href=\"https://ayobandung.com/tag/Kota%20Bogor\">Kota Bogor</a>&nbsp;yang kurang mampu, selama menjalani masa pemberlakukan&nbsp;<a class=\"related-tag text-orange\" href=\"https://ayobandung.com/tag/PPKM%20Darurat\">PPKM Darurat</a>. Khususnya mereka yang sedang menjalani isolasi mandiri di kediamannya.</p>\r\n<p>&ldquo;Kita lihat banyak warga yang membutuhkan yang kesulitan mencari nafkah karena&nbsp;<a class=\"related-tag text-orange\" href=\"https://ayobandung.com/tag/PPKM%20Darurat\">PPKM Darurat</a>&nbsp;ini. Maka semaksimal mungkin harus kita bantu. Di&nbsp;<a class=\"related-tag text-orange\" href=\"https://ayobandung.com/tag/posko%20logistik\">posko logistik</a>&nbsp;ini kami akan akan alokasikan bantuan logistik dari para donator kepada masyarakat yang benar-benar membutuhkan. Jadi semua satu pintu melalui posko ini agar bantuan tepat sasaran,&rdquo; katanya Minggu 4 Juli 2021.&nbsp;</p>\r\n<div id=\"article_middle_sas\">\r\n<div id=\"ats-insert_ads-3-wrapper\" class=\"insert_ads insert_ads-4 show_advertisement\">\r\n<div>\r\n<div id=\"ats-insert_ads-3\" class=\"ats-slot\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<p>Bima Arya mengajak Aparatur Sipil Negara (ASN) di lingkungan Pemkot Bogor, perusahaan-perusahaan yang ada di&nbsp;<a class=\"related-tag text-orange\" href=\"https://ayobandung.com/tag/Kota%20Bogor\">Kota Bogor</a>&nbsp;atau perorangan serta komunitas untuk ikut berpartisipasi dalam gerakan #BersamaSalingMenjaga.</p>', NULL, NULL, 2, 6, 1, 1, 'PUBLISH', NULL, 'Lorem, Ipsum, is simply, dummy', NULL, '2021-07-04 00:00:00', NULL, '2021-07-04 04:17:42', '2022-06-10 04:25:51'),
(19, 'Testimonials', 'testimonials', 'testimonial', '<p>testimonial</p>', 'Keseruan Gathering AyoMedia Network Di Kuningan', NULL, 1, 4, NULL, 1, 'DRAFT', NULL, NULL, NULL, NULL, NULL, '2021-12-23 00:16:09', '2021-12-23 00:16:09'),
(20, 'Baru Bebas dari Penjara Dilaporkan lagi ke Polisi, Habib Bahar bin Smith: Seribu Laporan pun Saya Hadapi dari Info KJP', 'baru-bebas-dari-penjara-dilaporkan-lagi-ke-polisi-habib-bahar-bin-smith-seribu-laporan-pun-saya-hadapi-dari-info-kjp', 'Nama Habib Bahar bin Smith kembali ramai diperbincangkan, ia dilaporkan ke polisi atas dugaan ujaran kebencian berbau SARA.', '<p style=\"-webkit-text-stroke-width: 0px; background-color: #fcfcfc; box-sizing: border-box; color: #14142b; font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-caps: normal; font-variant-ligatures: normal; font-weight: 400; letter-spacing: normal; margin: 17px 0px; orphans: 2; text-align: start; text-decoration-color: initial; text-decoration-style: initial; text-decoration-thickness: initial; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;\"><strong style=\"box-sizing: border-box; font-size: 16px; line-height: 1.5;\">AYOINDONESIA.COM</strong> -- Nama <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Habib-Bahar-bin-Smith\">Habib Bahar bin Smith</a> kembali ramai diperbincangkan, ia dilaporkan ke polisi atas dugaan ujaran kebencian berbau SARA. <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Habib-Bahar-bin-Smith\">Habib Bahar bin Smith</a> bersama <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Eggi-Sudjana\">Eggi Sudjana</a> dilaporkan ke Polda Metro Jaya karena diduga telah memelintir ucapan Kepala Staf Angkatan Darat (KSAD), <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Dudung-Abdurachman\">Dudung Abdurachman</a>.</p>\r\n<p style=\"-webkit-text-stroke-width: 0px; background-color: #fcfcfc; box-sizing: border-box; color: #14142b; font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-caps: normal; font-variant-ligatures: normal; font-weight: 400; letter-spacing: normal; margin: 17px 0px; orphans: 2; text-align: start; text-decoration-color: initial; text-decoration-style: initial; text-decoration-thickness: initial; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;\">Diketahui sosok yang melaporkan <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Habib-Bahar-bin-Smith\">Habib Bahar bin Smith</a> dan <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Eggi-Sudjana\">Eggi Sudjana</a> tersebut adalah Sekjen Komite Pemberantasan Mafia Hukum (KPMH) sekaligus Ketua Cyber Indonesia, <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Husein-Shahab\">Husein Shahab</a>.</p>\r\n<p style=\"-webkit-text-stroke-width: 0px; background-color: #fcfcfc; box-sizing: border-box; color: #14142b; font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-caps: normal; font-variant-ligatures: normal; font-weight: 400; letter-spacing: normal; margin: 17px 0px; orphans: 2; text-align: start; text-decoration-color: initial; text-decoration-style: initial; text-decoration-thickness: initial; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;\">Husen Shahab berdalih melaporkan <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Habib-Bahar-bin-Smith\">Habib Bahar bin Smith</a> karena ikut memelintir ucapan KSAD Jenderal <a style=\"box-sizing: border-box; color: #0288ff; outline: 0px; position: relative; text-decoration: none !important; transition: all 0.2s ease 0s; vertical-align: top;\" href=\"https://www.ayoindonesia.com/tag/Dudung-Abdurachman\">Dudung Abdurachman</a> dalam podcast bersama Deddy Corbuzier, yang mengatakan \"Tuhan itu bukan orang Arab\".</p>\r\n<div id=\"div-gpt-ad-multibanner1\" style=\"-webkit-text-stroke-width: 0px; background-color: #fcfcfc; box-sizing: border-box; color: #14142b; font-family: Poppins, sans-serif; font-size: 16px; font-style: normal; font-variant-caps: normal; font-variant-ligatures: normal; font-weight: 400; letter-spacing: normal; margin: 15px 0px; orphans: 2; text-align: start; text-decoration-color: initial; text-decoration-style: initial; text-decoration-thickness: initial; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;\" data-google-query-id=\"CMiJp-6w-fQCFQaArAIdIswDzg\"></div>', NULL, NULL, 1, 6, NULL, 1, 'PUBLISH', NULL, NULL, NULL, NULL, NULL, '2021-12-23 00:22:33', '2021-12-31 03:38:53'),
(21, 'Kemen PPPA: Kasus Kekerasan terhadap Anak Meningkat Selama Pandemi', 'kemen-pppa-kasus-kekerasan-terhadap-anak-meningkat-selama-pandemi', 'Sejak tahun 2019 sampai November 2021 kasus kekerasan terhadap anak terus meningkat.', '<p><strong>AYOINDONESIA.COM</strong>&nbsp;-- Sejak tahun 2019 sampai November 2021 kasus kekerasan terhadap&nbsp;<a href=\"https://www.ayoindonesia.com/tag/anak\">anak</a>&nbsp;terus meningkat, antara lain 11.057 kasus di tahun 2019, 11.278 kasus di tahun 2020, dan 12.556 kasus di tahun 2021 (Januari&ndash;November). Peningkatan kasus terbanyak terjadi selama masa pandemi, yaitu dari tahun 2020-2021. Data bersumber dari Kementerian Pemberdayaan Perempuan dan Perlindungan Anak (<a href=\"https://www.ayoindonesia.com/tag/Kemen-PPPA\">Kemen PPPA</a>).</p>\r\n<p>Menurut data dari&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Kemen-PPPA\">Kemen PPPA</a>, jenis kekerasan yang kerap terjadi terhadap&nbsp;<a href=\"https://www.ayoindonesia.com/tag/anak\">anak</a>&nbsp;selama Januari&ndash;November 2021, meliputi eksploitasi 1,27%, tindak pidana perdagangan orang (TPPO) 2,04%, penelantaran 5,36%, fisik 17,91%, psikis 18,43%, seksual 45,08%, dan lainnya 10%. Kekerasan seksual merupakan jenis kekerasan yang paling banyak terjadi terhadap&nbsp;<a href=\"https://www.ayoindonesia.com/tag/anak\">anak</a>, yaitu sebesar 45,08%.</p>', NULL, NULL, 2, 5, 3, 1, 'PUBLISH', NULL, NULL, NULL, '2021-12-28 00:00:00', NULL, '2021-12-28 08:58:22', '2021-12-28 09:20:50'),
(22, 'Info KJP Hari Ini: KJP Plus Sudah Cair Sampai Maret 2022, Belum Boleh Diambil', 'info-kjp-hari-ini-kjp-plus-sudah-cair-sampai-maret-2022-belum-boleh-diambil', 'Info KJP hari ini datang dari banyaknya orang tua dan wali murid penerima KJP Plus', '<p><strong>AYOINDONESIA.COM --&nbsp;</strong>Info KJP hari ini datang dari banyaknya orang tua dan wali murid penerima&nbsp;<a href=\"https://www.ayoindonesia.com/tag/KJP-Plus\">KJP Plus</a>&nbsp;yang menyampaikan bahwa ada dana masuk ke rekening KJP dalam jumlah yang cukup besar.<br /><br />Info KJP hari ini yang dipantau dari media sosial Instagram resmi UPT P4OP, cairnya dana&nbsp;<a href=\"https://www.ayoindonesia.com/tag/KJP-Plus\">KJP Plus</a>&nbsp;dalam jumlah yang cukup besar itu memang benar adanya.<br /><br />Admin akun UPT P4OP memberikan info KJP hari ini secara lengkap mengenai dana yang cair ke rekening tersebut.<br /><br />Disebutkan, dana yang cair tersebut adalah dana personal untuk dua bulan yaitu bulan Februari dan Maret 2022.</p>\r\n<p><strong>Baca Juga:&nbsp;<a href=\"https://www.ayoindonesia.com/nasional/pr-012268631/jangan-panik-belum-cair-simak-penjelasan-pencairan-kartu-kjp-plus-tahap-2-tahun-2021\">Jangan Panik Belum Cair! Simak Penjelasan Pencairan Kartu KJP Plus Tahap 2 Tahun 2021</a></strong><br /><br />Sedangkan, untuk dana personal bulan Januari 2022, sudah dicairkan bersamaan dengan dana bulan November dan Desember 2021 yang proses cairnya sekitar akhir November hingga awal Desember 2021 yang lalu.</p>', 'Keseruan Gathering AyoMedia Network Di Kuningan', 'https://www.google.com', 1, 5, 1, 1, 'PUBLISH', 'Keseruan Gathering AyoMedia Network Di Kuningan', 'contact us', NULL, '2021-12-28 00:00:00', NULL, '2021-12-28 09:24:38', '2021-12-28 09:25:58'),
(23, 'Jadwal! Imsakiyah\" [7', 'jadwal-imsakiyah-7', 'test', '<p>test</p>', NULL, NULL, 1, 1, 1, 1, 'TRASH', NULL, NULL, NULL, '2022-01-23 21:09:19', '2022-02-23 09:14:13', '2022-01-23 14:09:19', '2022-02-23 09:14:13'),
(24, 'Periksa Status Penerimaan KJP Plus Tahap 1 Tahun 2022 di Sini, Apakah Nama Anda Terdaftar?', 'periksa-status-penerimaan-kjp-plus-tahap-1-tahun-2022-di-sini-apakah-nama-anda-terdaftar', 'Periksa status penerimaan KJP Plus Tahap 1 Tahun 2022 di sini, apakah nama Anda terdaftar?', '<p><strong>AYOINDONESIA</strong>&nbsp;- Periksa status penerimaan KJP Plus Tahap 1&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Tahun-2022\">Tahun 2022</a>&nbsp;di sini, apakah nama Anda terdaftar?</p>\r\n<p>Bagi Anda telah mendaftar tentunya ingin mengetahui status penerimaan KJP Plus Tahap 1&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Tahun-2022\">Tahun 2022</a>.</p>\r\n<p>Anda dapat mengecek status penerimaan KJP Plus Tahap 1&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Tahun-2022\">Tahun 2022</a>&nbsp;dengan mengikuti langkah-langkah berikut:</p>\r\n<p>1. Masuk pada laman www.kjp.jakarta.go.id</p>\r\n<p>2. Pilih fitur &ldquo;Pencarian&rdquo; di sudut kiri bawah</p>\r\n<p>3. Pilih tombol &ldquo;Periksa Status Penerima KJP&rdquo;</p>\r\n<p>4. Masukan nomor induk kependudukan (NIK) siswa</p>\r\n<p>5. Pilih tahun penerimaan KJP Plus (<a href=\"https://www.ayoindonesia.com/tag/Tahun-2022\">Tahun 2022</a>,&nbsp;<a href=\"https://www.ayoindonesia.com/tag/tahap-1\">tahap 1</a>)</p>\r\n<p>6. Muncul hasil status KJP</p>\r\n<p>&nbsp;</p>', NULL, NULL, 1, 6, 2, 1, 'PUBLISH', 'Keseruan Gathering AyoMedia Network Di Kuningan', 'Keseruan Gathering AyoMedia Network Di Kuningan', NULL, '2022-02-22 15:30:57', NULL, '2022-02-22 08:30:57', '2022-02-23 08:41:56'),
(25, 'Laravel Horizon', 'laravel-horizon', 'Laravel Horizon', '<p><a href=\"https://github.com/laravel/horizon\">Laravel Horizon</a>&nbsp;provides a beautiful dashboard and code-driven configuration for your Laravel powered&nbsp;<a href=\"https://laravel.com/docs/9.x/queues\">Redis queues</a>. Horizon allows you to easily monitor key metrics of your queue system such as job throughput, runtime, and job failures.</p>\r\n<p>When using Horizon, all of your queue worker configuration is stored in a single, simple configuration file. By defining your application\'s worker configuration in a version controlled file, you may easily scale or modify your application\'s queue workers when deploying your application.</p>', NULL, NULL, NULL, 1, 2, 4, 'PUBLISH', 'laravel Horizon', 'laravel horizon', NULL, '2022-06-13 16:00:00', NULL, '2022-06-13 08:42:57', '2022-06-13 09:55:01'),
(26, 'How to Install Horizon in Laravel', 'how-to-install-horizon-in-laravel', 'How to Install Horizon in Laravel', '<p>Horizon provides a beautiful dashboard and code-driven configuration for your Laravel powered Redis queues. Horizon allows you to easily monitor key metrics of your queue system such as job throughput, runtime, and job failures.</p>\r\n<p>All of your worker configurations is stored in a single, simple configuration file, allowing your configuration to stay in source control where your entire team can collaborate.</p>', NULL, NULL, NULL, 1, 2, 1, 'SCHEDULE', NULL, NULL, NULL, '2022-06-13 16:05:00', NULL, '2022-06-13 08:45:42', '2022-06-13 08:45:42'),
(27, 'Pedagang Sapi Diimbau Tidak Buka Lapak Ternak Pinggir Jalan', 'pedagang-sapi-diimbau-tidak-buka-lapak-ternak-pinggir-jalan', 'Pedagang Sapi Diimbau Tidak Buka Lapak Ternak Pinggir Jalan', '<p>TASIKMAYA,&nbsp;<a href=\"http://ayoindonesia.com/\" target=\"_blank\" rel=\"noopener noreferrer\" data-saferedirecturl=\"https://www.google.com/url?q=http://AYOINDONESIA.COM&amp;source=gmail&amp;ust=1655191487992000&amp;usg=AOvVaw0MYQVFHfzhnd_LlADZge3G\">AYOINDONESIA.COM</a>&nbsp;- Dinas Pertanian, Pangan, dan Perikanan (Disperpakan) Kabupaten&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Tasikmalaya\">Tasikmalaya</a>&nbsp;terus melakukan upaya pencegahan penyebaran Penyakit Mulut dan Kuku (PMK) pada hewan ternak terutama&nbsp;<a href=\"https://www.ayoindonesia.com/tag/sapi\">sapi</a>. Mengingat, kurang lebih satu bulan kedepan, sudah masuk Iduladha.<br /><br />Selain mengawasi keluar masuk hewan ternak, upaya lainnya yaknk mengimbau kepada para&nbsp;<a href=\"https://www.ayoindonesia.com/tag/pedagang\">pedagang</a>&nbsp;untuk tidak menjual ternaknya di lapak&nbsp;<a href=\"https://www.ayoindonesia.com/tag/pinggir-jalan\">pinggir jalan</a>.<br /><br />\"Ya kami anjurkan tidak buka lapak di&nbsp;<a href=\"https://www.ayoindonesia.com/tag/pinggir-jalan\">pinggir jalan</a>&nbsp;untuk mengurangi interaksi dengan ternak. PKM kan menular melalui manusia. Ini rentan,\" kata Kepala Peternakan dan Kesehatan Hewan Ternak Heri Kusdiana, Senin 13 Juni 2022.<br /><br />Pedagang, lanjut Heri, sebaiknya hanya menjual ternaknya di kandang, tanpa membawa hewan ternak keluar kandang. Artinya, dengan tetap menerapkan sterilisasi kandang.<br /><br />\"Pembelinya diundang, bisa berjualan melalui online tapi&nbsp; Tentunya tetap harus steril,\" kata Heri.<br /><br />Sementara itu, untuk menjamin ketersediaan stok&nbsp;<a href=\"https://www.ayoindonesia.com/tag/sapi\">sapi</a>&nbsp;menjelang Iduladha, Disperpakan Kabupaten&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Tasikmalaya\">Tasikmalaya</a>, mendatangkan hewan terna</p>', NULL, NULL, NULL, 2, 2, 2, 'SCHEDULE', NULL, NULL, NULL, '2022-06-13 16:55:00', NULL, '2022-06-13 08:48:26', '2022-06-13 08:48:26'),
(28, 'Pedagang Sapi Diimbau Tidak Buka Lapak Ternak Pinggir Jalan', 'pedagang-sapi-diimbau-tidak-buka-lapak-ternak-pinggir-jalan', 'Dinas Pertanian, Pangan, dan Perikanan (Disperpakan) Kabupaten Tasikmalaya.', '<p>TASIKMAYA,&nbsp;<a href=\"http://ayoindonesia.com/\" target=\"_blank\" rel=\"noopener noreferrer\" data-saferedirecturl=\"https://www.google.com/url?q=http://AYOINDONESIA.COM&amp;source=gmail&amp;ust=1655191487992000&amp;usg=AOvVaw0MYQVFHfzhnd_LlADZge3G\">AYOINDONESIA.COM</a>&nbsp;- Dinas Pertanian, Pangan, dan Perikanan (Disperpakan) Kabupaten&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Tasikmalaya\">Tasikmalaya</a>&nbsp;terus melakukan upaya pencegahan penyebaran Penyakit Mulut dan Kuku (PMK) pada hewan ternak terutama&nbsp;<a href=\"https://www.ayoindonesia.com/tag/sapi\">sapi</a>. Mengingat, kurang lebih satu bulan kedepan, sudah masuk Iduladha.<br /><br />Selain mengawasi keluar masuk hewan ternak, upaya lainnya yaknk mengimbau kepada para&nbsp;<a href=\"https://www.ayoindonesia.com/tag/pedagang\">pedagang</a>&nbsp;untuk tidak menjual ternaknya di lapak&nbsp;<a href=\"https://www.ayoindonesia.com/tag/pinggir-jalan\">pinggir jalan</a>.<br /><br />\"Ya kami anjurkan tidak buka lapak di&nbsp;<a href=\"https://www.ayoindonesia.com/tag/pinggir-jalan\">pinggir jalan</a>&nbsp;untuk mengurangi interaksi dengan ternak. PKM kan menular melalui manusia. Ini rentan,\" kata Kepala Peternakan dan Kesehatan Hewan Ternak Heri Kusdiana, Senin 13 Juni 2022.<br /><br />Pedagang, lanjut Heri, sebaiknya hanya menjual ternaknya di kandang, tanpa membawa hewan ternak keluar kandang. Artinya, dengan tetap menerapkan sterilisasi kandang.<br /><br />\"Pembelinya diundang, bisa berjualan melalui online tapi&nbsp; Tentunya tetap harus steril,\" kata Heri.<br /><br />Sementara itu, untuk menjamin ketersediaan stok&nbsp;<a href=\"https://www.ayoindonesia.com/tag/sapi\">sapi</a>&nbsp;menjelang Iduladha, Disperpakan Kabupaten&nbsp;<a href=\"https://www.ayoindonesia.com/tag/Tasikmalaya\">Tasikmalaya</a>, mendatangkan hewan terna</p>', NULL, NULL, NULL, 2, 2, 4, 'PUBLISH', NULL, NULL, NULL, '2022-06-13 15:58:00', NULL, '2022-06-13 08:52:17', '2022-06-17 07:48:38'),
(29, 'Pengunjung Situs Media Online Bertambah Saat Facebook dkk Down', 'pengunjung-situs-media-online-bertambah-saat-facebook-dkk-down', 'Penulis Wahyunanda Kusuma Pertiwi | Editor Reza Wahyudi KOMPAS.com - Masih ingat ketika Facebook', '<p>Penulis Wahyunanda Kusuma Pertiwi | Editor Reza Wahyudi KOMPAS.com - Masih ingat ketika Facebook, Instagram, dan WhatsApp down atau mengalami gangguan pada 4 Oktober lalu? Saat itu, layanan Facebook dkk tidak bisa diakses dengan lancar selama lebih dari lima jam.</p>\r\n<p>Banyak yang kelimpungan karena mengandalkan aplikasi-aplikasi tersebut untuk komunikasi hingga pekerjaan sehari-hari.</p>\r\n<p>Namun ada sebagian yang diuntungkan akibat layanan Facebook dkk error. Berdasarkan data yang dihimpun Chartbeat yang dipublikasikan Niemanlab, saat Facebook dkk tumbang, pengunjung situs media online justru meningkat lantaran banyak orang membaca berita.</p>\r\n<p>Chartbeat menghimpun data dari ribuan penerbit berita online dari 60 negara di dunia.</p>\r\n<p>Baca juga: Penjelasan Resmi Penyebab Tumbangnya Facebook, Instagram, dan WhatsApp</p>\r\n<p>Saat laporan gangguan Facebook dkk mencapai puncaknya, atau sekitar pukul 15.00 waktu eastern time (ET) atau sekitar jam 02.00 WIB, trafik internet ke seluruh halaman web naik 38 persen dibanding waktu yang sama di pekan sebelumnya.</p>\r\n<p>Sementara akses ke halaman melalui media sosial menurun. Hal ini juga pernah terjadi tahun 2018 lalu ketika Facebook dkk tumbang 45 menit.</p>\r\n<p>Artikel ini telah tayang di <a href=\"https://www.kompas.com/\">Kompas.com</a>&nbsp;dengan judul \"Pengunjung Situs Media Online Bertambah Saat Facebook dkk Down\", Klik untuk baca:&nbsp;<a href=\"https://tekno.kompas.com/read/2021/10/11/13030037/pengunjung-situs-media-online-bertambah-saat-facebook-dkk-down?_ga=2.143138805.1952873990.1655183225-1457612179.1655183224\">https://tekno.kompas.com/read/2021/10/11/13030037/pengunjung-situs-media-online-bertambah-saat-facebook-dkk-down?_ga=2.143138805.1952873990.1655183225-1457612179.1655183224</a>.<br />Penulis : Wahyunanda Kusuma Pertiwi<br />Editor : Reza Wahyudi</p>\r\n<p>Download aplikasi <a href=\"https://www.kompas.com/\">Kompas.com</a>&nbsp;untuk akses berita lebih mudah dan cepat:<br />Android:&nbsp;<a href=\"https://bit.ly/3g85pkA\">https://bit.ly/3g85pkA</a><br />iOS:&nbsp;<a href=\"https://apple.co/3hXWJ0L\">https://apple.co/3hXWJ0L</a></p>', NULL, NULL, NULL, 1, 2, 4, 'DRAFT', NULL, NULL, NULL, NULL, NULL, '2022-06-14 05:13:19', '2022-06-22 03:59:46'),
(30, 'Hukum Ibadah Kurban bagi Umat Islam, Wajib atau Sunnah, Berikut Penjelasannya', 'hukum-ibadah-kurban-bagi-umat-islam-wajib-atau-sunnah-berikut-penjelasannya', 'Ibadah kurban bermakna menyembelih hewan kurban yang diniatkan kepada Allah Ta&#039;Allah. Apakah wajib bagi umat Islam untuk berkurban', '<p><strong>AYOMALANG.COM&nbsp;</strong>-- Ibadah kurban adalah ibadah yang meneladani&nbsp;<a href=\"https://www.ayomalang.com/tag/Nabi-Ibrahim-AS\">Nabi Ibrahim AS</a>&nbsp;dan Ismail AS.</p>\r\n<p>Ibadah kurban bermakna menyembelih hewan kurban yang diniatkan kepada Allah Ta\'Allah</p>\r\n<p>Apakah wajib bagi umat Islam untuk berkurban?</p>\r\n<p>Berikut penjelasan hukum&nbsp;<a href=\"https://www.ayomalang.com/tag/ibadah-kurban\">ibadah kurban</a>&nbsp;yang sebagaimana AyoMalang.com rangkum untuk kalian:</p>\r\n<p><strong>Baca Juga:&nbsp;<a href=\"https://www.ayomalang.com/khazanah/pr-483714771/perhatikan-jelang-idul-adha-inilah-keutamaan-dari-ibadah-kurban\">Perhatikan! Jelang Idul Adha, Inilah Keutamaan dari Ibadah Kurban</a></strong></p>\r\n<p>Hewan yang disembelih dalam&nbsp;<a href=\"https://www.ayomalang.com/tag/ibadah-kurban\">ibadah kurban</a>&nbsp;adalah&nbsp;bahiimatul an&rsquo;am. Yaitu unta, sapi, kambing, dan domba.</p>\r\n<p>وَلِكُلِّ أُمَّةٍ جَعَلْنَا مَنْسَكًا لِيَذْكُرُوا اسْمَ اللَّهِ عَلَى مَا رَزَقَهُمْ مِنْ بَهِيمَةِ الْأَنْعَامِ فَإِلَهُكُمْ إِلَهٌ وَاحِدٌ فَلَهُ أَسْلِمُوا وَبَشِّرِ الْمُخْبِتِينَ</p>\r\n<p>&ldquo;Dan bagi tiap-tiap umat telah Kami syariatkan penyembelihan (kurban), supaya mereka menyebut nama Allah terhadap bahimatul an&rsquo;am yang telah direzekikan Allah kepada mereka, maka Tuhanmu ialah Tuhan Yang Maha Esa, karena itu berserah dirilah kamu kepada-Nya. Dan berilah kabar gembira kepada orang-orang yang tunduk patuh (kepada Allah)&rdquo; (QS. Al Hajj: 34).</p>\r\n<p>Menyembelih hewan kurban bisa dilakukan dalam rentang waktu 4 hari, dimulai pada saat sholat&nbsp;<a href=\"https://www.ayomalang.com/tag/Idul-Adha\">Idul Adha</a>&nbsp;hingga beakhir setelah ashar tanggal 13 Dzulhijjah.</p>\r\n<p>مَن ذبح قبل الصلاة فليس مِن النسك في شيء، وإنما هو لحم قَدَّمه لأهله</p>\r\n<p>&ldquo;Barangsiapa yang menyembelih sebelum shalat&nbsp;<a href=\"https://www.ayomalang.com/tag/Idul-Adha\">Idul Adha</a>, maka itu tidak dianggap nusuk (qurban). Itu hanya sekedar daging biasa untuk dimakan keluarganya&rdquo; (HR. Bukhari 5560, Muslim 1961)</p>\r\n<p>Para ulama berbeda pendapat mengenai hukum&nbsp;<a href=\"https://www.ayomalang.com/tag/ibadah-kurban\">ibadah kurban</a>, sebagian mengatakan hukumnya wajib bagi yang mampu, dan sebagian mengatakan sunnah muakkad.</p>\r\n<p><strong>Baca Juga:&nbsp;<a href=\"https://www.ayomalang.com/gaya-hidup/pr-483693796/5-cara-mengolah-daging-kambing-kurban-dengan-benar-saat-idul-adha\">5 Cara Mengolah Daging Kambing Kurban dengan Benar Saat Idul Adha</a></strong></p>\r\n<div id=\"div-gpt-ad-multibanner1\" data-google-query-id=\"CNe4obDEwPgCFc4Z1QoddS4DqA\">\r\n<p>عن أبي هريرة رضي اللَّه عنه قال، قال رسول اللَّهِ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ :<br />من كان له سِعَةٌ ولم يُضَحِّ فلا يَشهدْ مصلَّانا</p>\r\n<p>Dari Abu Hurairoh radhiallahu anhu berkata, bersabda rasulullah shallallahu alaihi wasallam :<br />&ldquo;Barangsiapa memiliki kelapangan, namun ia tidak berqurban, maka janganlah datangi mushalla kami&rdquo; (HR. Ahmad 1/312, Ibnu Majah 3123, dihasankan Al Albani dalam&nbsp;Shahih Ibni Majah)</p>\r\n<p>Demikian penjelasan hukum&nbsp;<a href=\"https://www.ayomalang.com/tag/ibadah-kurban\">ibadah kurban</a>&nbsp;yang AyoMalang.com rangkum dari berbagai referensi. Semoga bermanfaat.&nbsp;<strong>(**)</strong></p>\r\n</div>', NULL, NULL, NULL, 2, 2, 3, 'PUBLISH', NULL, NULL, NULL, '2022-06-22 14:51:44', NULL, '2022-06-22 07:31:49', '2022-06-22 09:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `relatables`
--

CREATE TABLE `relatables` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `relatable_id` bigint(20) UNSIGNED NOT NULL,
  `relatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relatables`
--

INSERT INTO `relatables` (`post_id`, `relatable_id`, `relatable_type`, `created_at`, `updated_at`) VALUES
(22, 24, 'App\\Models\\Post', '2022-02-23 08:06:20', '2022-02-23 08:06:20'),
(20, 24, 'App\\Models\\Post', '2022-02-23 08:06:20', '2022-02-23 08:06:20'),
(18, 18, 'App\\Models\\Post', '2022-06-10 04:25:51', '2022-06-10 04:25:51'),
(17, 18, 'App\\Models\\Post', '2022-06-10 04:25:51', '2022-06-10 04:25:51'),
(1, 18, 'App\\Models\\Post', '2022-06-10 04:25:51', '2022-06-10 04:25:51'),
(2, 18, 'App\\Models\\Post', '2022-06-10 04:25:51', '2022-06-10 04:25:51'),
(3, 18, 'App\\Models\\Post', '2022-06-10 04:25:51', '2022-06-10 04:25:51'),
(18, 17, 'App\\Models\\Post', '2022-06-10 06:20:31', '2022-06-10 06:20:31'),
(17, 17, 'App\\Models\\Post', '2022-06-10 06:20:31', '2022-06-10 06:20:31'),
(1, 17, 'App\\Models\\Post', '2022-06-10 06:20:31', '2022-06-10 06:20:31'),
(24, 25, 'App\\Models\\Post', '2022-06-13 08:42:57', '2022-06-13 08:42:57'),
(22, 25, 'App\\Models\\Post', '2022-06-13 08:42:57', '2022-06-13 08:42:57'),
(24, 26, 'App\\Models\\Post', '2022-06-13 08:45:42', '2022-06-13 08:45:42'),
(22, 27, 'App\\Models\\Post', '2022-06-13 08:48:26', '2022-06-13 08:48:26'),
(21, 27, 'App\\Models\\Post', '2022-06-13 08:48:26', '2022-06-13 08:48:26'),
(20, 27, 'App\\Models\\Post', '2022-06-13 08:48:26', '2022-06-13 08:48:26'),
(21, 28, 'App\\Models\\Post', '2022-06-13 08:52:17', '2022-06-13 08:52:17'),
(22, 28, 'App\\Models\\Post', '2022-06-13 08:52:17', '2022-06-13 08:52:17'),
(28, 29, 'App\\Models\\Post', '2022-06-14 05:13:19', '2022-06-14 05:13:19'),
(25, 29, 'App\\Models\\Post', '2022-06-14 05:13:19', '2022-06-14 05:13:19'),
(24, 29, 'App\\Models\\Post', '2022-06-14 05:13:19', '2022-06-14 05:13:19'),
(22, 29, 'App\\Models\\Post', '2022-06-20 09:44:40', '2022-06-20 09:44:40'),
(21, 29, 'App\\Models\\Post', '2022-06-20 09:44:40', '2022-06-20 09:44:40'),
(28, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49'),
(24, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49'),
(22, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49'),
(21, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49'),
(20, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49');

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
(1, 'admin', 'web', '2021-06-26 03:29:31', '2021-06-26 03:29:31'),
(2, 'editor', 'web', '2021-06-26 04:02:21', '2021-06-26 04:02:21'),
(3, 'writter', 'web', '2022-04-15 09:36:13', '2022-04-15 09:36:13');

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
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(39, 2),
(39, 3),
(40, 1),
(40, 2),
(40, 3),
(41, 1),
(41, 2),
(41, 3),
(42, 1),
(42, 2),
(42, 3),
(43, 1),
(43, 2),
(43, 3),
(44, 1),
(44, 2),
(44, 3),
(45, 1),
(45, 2),
(45, 3),
(46, 1),
(46, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kx6W8Pm8tYnTdvfO7Ebw8UXY2XLBcf6w2QKKsIs8', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM3Q4Q1M4Y1pndkV5akRRN0xmbWNxNGZ3R2RZZnNaV2R3RGtwaUp2bSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJC9wZndqYy5DTG90T09oS1ZhR0N1Zi4vWmw1SmY3dlR0V3JWZEl3bElBVG5tQWY5YUJiUzM2IjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1640674672),
('qeRw5I9Vu6PqJgZemwJBYjrcvfOqhHVxpcj5eWkn', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUmowTlRQdVJ5TFFrdWp3MHk5VEsweElPZWIzT25VVkRIanlTeXJ2byI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJC9wZndqYy5DTG90T09oS1ZhR0N1Zi4vWmw1SmY3dlR0V3JWZEl3bElBVG5tQWY5YUJiUzM2IjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Bvc3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkL3Bmd2pjLkNMb3RPT2hLVmFHQ3VmLi9abDVKZjd2VHRXclZkSXdsSUFUbm1BZjlhQmJTMzYiO30=', 1640676950);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slug`, `content`, `meta_description`, `meta_keywords`, `seo_title`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Kami', 'tentang-kami', '<p>Tentang Kami</p>', 'Tentang Kami', 'Tentang Kami', 'Tentang Kami', '2022-01-06 04:04:34', '2022-01-06 04:04:34'),
(2, 'Redaksi', 'redaksi', '<p>Redaksi</p>', 'Redaksi', 'Redaksi', 'Redaksi', '2022-01-06 04:06:24', '2022-01-06 04:06:24'),
(3, 'Info Iklan', 'info-iklan', '<p>Info Iklan</p>', 'Info Iklan', 'Info Iklan', 'Info Iklan', '2022-01-06 04:06:44', '2022-01-06 04:06:44'),
(4, 'Karir', 'karir', '<p>Karir</p>', 'Karir', 'Karir', 'Karir', '2022-01-06 04:06:59', '2022-01-06 04:06:59'),
(5, 'Kontak', 'kontak', '<p>Kontak</p>', 'Kontak', 'Kontak', 'Kontak', '2022-01-06 04:07:12', '2022-01-06 04:07:12'),
(6, 'Pedoman', 'pedoman', '<p>Pedoman</p>', 'Pedoman', 'Pedoman', 'Pedoman', '2022-01-06 04:07:25', '2022-01-06 04:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`tag_id`, `taggable_id`, `taggable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Post', '2021-08-17 11:42:58', '2021-08-17 11:42:58'),
(4, 1, 'App\\Models\\Post', '2021-08-17 11:42:58', '2021-08-17 11:42:58'),
(5, 1, 'App\\Models\\Post', '2021-08-17 11:42:58', '2021-08-17 11:42:58'),
(5, 22, 'App\\Models\\Post', '2021-12-31 03:32:40', '2021-12-31 03:32:40'),
(6, 22, 'App\\Models\\Post', '2021-12-31 03:32:40', '2021-12-31 03:32:40'),
(1, 21, 'App\\Models\\Post', '2021-12-31 03:33:07', '2021-12-31 03:33:07'),
(5, 21, 'App\\Models\\Post', '2021-12-31 03:33:07', '2021-12-31 03:33:07'),
(6, 21, 'App\\Models\\Post', '2021-12-31 03:33:07', '2021-12-31 03:33:07'),
(7, 21, 'App\\Models\\Post', '2021-12-31 03:33:07', '2021-12-31 03:33:07'),
(6, 20, 'App\\Models\\Post', '2021-12-31 03:38:53', '2021-12-31 03:38:53'),
(7, 20, 'App\\Models\\Post', '2021-12-31 03:38:53', '2021-12-31 03:38:53'),
(1, 23, 'App\\Models\\Post', '2022-02-22 09:03:55', '2022-02-22 09:03:55'),
(4, 23, 'App\\Models\\Post', '2022-02-22 09:03:55', '2022-02-22 09:03:55'),
(6, 24, 'App\\Models\\Post', '2022-02-23 08:41:56', '2022-02-23 08:41:56'),
(5, 24, 'App\\Models\\Post', '2022-02-23 08:41:56', '2022-02-23 08:41:56'),
(4, 17, 'App\\Models\\Post', '2022-06-10 06:20:31', '2022-06-10 06:20:31'),
(5, 17, 'App\\Models\\Post', '2022-06-10 06:20:31', '2022-06-10 06:20:31'),
(4, 18, 'App\\Models\\Post', '2022-06-10 07:44:03', '2022-06-10 07:44:03'),
(6, 18, 'App\\Models\\Post', '2022-06-10 07:44:03', '2022-06-10 07:44:03'),
(1, 25, 'App\\Models\\Post', '2022-06-13 08:42:57', '2022-06-13 08:42:57'),
(4, 25, 'App\\Models\\Post', '2022-06-13 08:42:57', '2022-06-13 08:42:57'),
(5, 25, 'App\\Models\\Post', '2022-06-13 08:42:57', '2022-06-13 08:42:57'),
(5, 26, 'App\\Models\\Post', '2022-06-13 08:45:42', '2022-06-13 08:45:42'),
(6, 26, 'App\\Models\\Post', '2022-06-13 08:45:42', '2022-06-13 08:45:42'),
(5, 27, 'App\\Models\\Post', '2022-06-13 08:48:26', '2022-06-13 08:48:26'),
(5, 29, 'App\\Models\\Post', '2022-06-14 05:13:19', '2022-06-14 05:13:19'),
(1, 28, 'App\\Models\\Post', '2022-06-17 07:48:38', '2022-06-17 07:48:38'),
(6, 29, 'App\\Models\\Post', '2022-06-20 09:44:40', '2022-06-20 09:44:40'),
(7, 29, 'App\\Models\\Post', '2022-06-20 09:44:40', '2022-06-20 09:44:40'),
(8, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49'),
(6, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49'),
(4, 30, 'App\\Models\\Post', '2022-06-22 07:31:49', '2022-06-22 07:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ayo Media', 'ayo-media', '2021-06-12 09:18:33', '2021-06-12 09:18:33'),
(4, 'BMKG', 'bmkg', '2021-06-19 01:41:36', '2021-06-19 01:41:36'),
(5, 'VIRAL', 'viral', '2021-06-19 01:41:44', '2021-06-19 01:41:44'),
(6, 'Info KJP', 'info-kjp', '2021-12-31 03:27:53', '2021-12-31 03:27:53'),
(7, 'Habib Bahar bin Smith', 'habib-bahar-bin-smith', '2021-12-31 03:29:58', '2021-12-31 03:29:58'),
(8, 'Kurban', 'kurban', '2022-06-22 07:29:11', '2022-06-22 07:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'RIZAL\'s Team', 1, '2021-12-14 01:23:02', '2021-12-14 01:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'RIZAL MUHAMAD HENDARMIN', 'rizal.muhamad.dev@gmail.com', NULL, '$2y$10$/pfwjc.CLotOOhKVaGCuf./Zl5Jf7vTtWrVdIwlIATnmAf9aBbS36', '6V7qnp3Pbi4Hp174sChyL4crAX1YvDf8Dr58s9oQ3wDfHJvMhqPSY1nlQa0i', 1, NULL, '2021-12-14 01:23:02', '2021-12-14 01:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `vid`, `title`, `slug`, `description`, `thumbnail`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'iPHzSg364_Q', 'MAKAN DIRUMAH HANTU, CUMA GW SENDIRI YANG MAKAN DISINI...', 'makan-dirumah-hantu-cuma-gw-sendiri-yang-makan-disini', 'Cimory Yogurt Squeeze, yogurt anti repot, gak perlu sendok dan mangkok. Rasanya enak, creamy, dan teksturnya lembut. Ditambah rasanya juga unik-unik banget dan bikin auto ketagihan! Pssssttt Cimory Yogurt Squeeze ada 4 variant baru loh, Black Sticky Rice, Purple Taro, Mango Sticky Rice, dan Cavendish Banana. Kalian udah pada cobain belum? Yuk segera dapatkan di minimarket dan supermarket terdekat.', 'https://i.ytimg.com/vi/iPHzSg364_Q/maxresdefault.jpg', NULL, 1, '2022-01-25 07:38:40', '2022-01-25 07:38:40'),
(2, 'iPHzSg364_Q', 'MAKAN DIRUMAH HANTU, CUMA GW SENDIRI YANG MAKAN DISINI...', 'makan-dirumah-hantu-cuma-gw-sendiri-yang-makan-disini', 'Cimory Yogurt Squeeze, yogurt anti repot, gak perlu sendok dan mangkok. Rasanya enak, creamy, dan teksturnya lembut. Ditambah rasanya juga unik-unik banget dan bikin auto ketagihan! Pssssttt Cimory Yogurt Squeeze ada 4 variant baru loh, Black Sticky Rice, Purple Taro, Mango Sticky Rice, dan Cavendish Banana. Kalian udah pada cobain belum? Yuk segera dapatkan di minimarket dan supermarket terdekat.', 'https://i.ytimg.com/vi/iPHzSg364_Q/maxresdefault.jpg', NULL, 1, '2022-01-25 07:39:15', '2022-01-25 07:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `viewable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `visitor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `viewable_type`, `viewable_id`, `visitor`, `collection`, `viewed_at`) VALUES
(1, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:49:57'),
(2, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:50:41'),
(3, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:50:44'),
(4, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:50:45'),
(5, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:51:17'),
(6, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:51:41'),
(7, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:52:31'),
(8, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:55:26'),
(9, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:56:28'),
(10, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:57:08'),
(11, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:58:11'),
(12, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:58:46'),
(13, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:59:20'),
(14, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:59:37'),
(15, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:59:45'),
(16, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 08:59:55'),
(17, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:00:08'),
(18, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:00:27'),
(19, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:00:38'),
(20, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:01:15'),
(21, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:01:54'),
(22, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:02:00'),
(23, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:02:28'),
(24, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:02:36'),
(25, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:04:37'),
(26, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:04:46'),
(27, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:07:35'),
(28, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:07:40'),
(29, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:07:59'),
(30, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:08:20'),
(31, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:09:01'),
(32, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:09:14'),
(33, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:11:18'),
(34, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:12:01'),
(35, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:12:15'),
(36, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:12:34'),
(37, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:12:40'),
(38, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:12:54'),
(39, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:14:51'),
(40, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:15:22'),
(41, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:16:24'),
(42, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:16:37'),
(43, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:17:05'),
(44, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:17:14'),
(45, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:17:32'),
(46, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:17:58'),
(47, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:18:23'),
(48, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:18:32'),
(49, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:18:41'),
(50, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:19:32'),
(51, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:20:43'),
(52, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:21:02'),
(53, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:54:46'),
(54, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:55:20'),
(55, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:55:45'),
(56, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:56:14'),
(57, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:57:11'),
(58, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:57:41'),
(59, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:57:50'),
(60, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 09:58:41'),
(61, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:00:44'),
(62, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:00:54'),
(63, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:00:55'),
(64, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:00:55'),
(65, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:01:07'),
(66, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:01:07'),
(67, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:01:08'),
(68, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:01:08'),
(69, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:01:32'),
(70, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:02:26'),
(71, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:02:28'),
(72, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:02:42'),
(73, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:02:44'),
(74, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:02:45'),
(75, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:02:46'),
(76, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:02:47'),
(77, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:12'),
(78, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:13'),
(79, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:14'),
(80, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:15'),
(81, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:15'),
(82, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:16'),
(83, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:16'),
(84, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:16'),
(85, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:17'),
(86, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:17'),
(87, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:17'),
(88, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:17'),
(89, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:18'),
(90, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:18'),
(91, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:18'),
(92, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:18'),
(93, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:57'),
(94, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:59'),
(95, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:03:59'),
(96, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:00'),
(97, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:00'),
(98, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:00'),
(99, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:01'),
(100, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:01'),
(101, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:01'),
(102, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:01'),
(103, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:01'),
(104, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:02'),
(105, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:02'),
(106, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:02'),
(107, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:03'),
(108, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:03'),
(109, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:03'),
(110, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:04'),
(111, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:04'),
(112, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:04'),
(113, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:04:20'),
(114, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:05:14'),
(115, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:05:48'),
(116, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:06:01'),
(117, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:06:03'),
(118, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:06:21'),
(119, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-27 10:06:30'),
(120, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 07:31:16'),
(121, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:35:54'),
(122, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:36:24'),
(123, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:36:28'),
(124, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:36:51'),
(125, 'App\\Models\\Post', 17, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:50:29'),
(126, 'App\\Models\\Post', 17, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:51:12'),
(127, 'App\\Models\\Post', 17, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:51:14'),
(128, 'App\\Models\\Post', 17, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:51:14'),
(129, 'App\\Models\\Post', 17, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:51:27'),
(130, 'App\\Models\\Post', 17, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:51:37'),
(131, 'App\\Models\\Post', 17, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:52:58'),
(132, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:57:21'),
(133, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-28 11:57:25'),
(134, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-29 08:25:24'),
(135, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-29 08:27:46'),
(136, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-29 08:28:03'),
(137, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-29 08:41:45'),
(138, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-29 09:42:07'),
(139, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-30 07:24:25'),
(140, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-30 07:24:47'),
(141, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-30 07:30:10'),
(142, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-30 07:31:26'),
(143, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-30 09:21:55'),
(144, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-30 09:22:03'),
(145, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-07-30 09:22:13'),
(146, 'App\\Models\\Post', 18, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-08-02 10:19:59'),
(147, 'App\\Models\\Post', 2, 'O16hrqRGd5KZiylM1L9KGZwovH8goJuWOYRVCeAErMcVKIiRI2Pwf7ZxR1nnsIXDBENXxN6L1tuyFUyN', NULL, '2021-08-13 07:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `bodylinks`
--
ALTER TABLE `bodylinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_admin_id_foreign` (`admin_id`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`admin_id`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bodylinks`
--
ALTER TABLE `bodylinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
