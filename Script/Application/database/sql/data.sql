-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2022 at 06:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plybb`
--

-- --------------------------------------------------------

--
-- Table structure for table `additionals`
--

CREATE TABLE `additionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additionals`
--

INSERT INTO `additionals` (`id`, `key`, `value`) VALUES
(4, 'popup_notice_status', '0'),
(5, 'popup_notice_description', '<h2 style=\"text-align:center\"><span style=\"color:#3366ff\"><strong>What is Lorem Ipsum?</strong></span></h2>\r\n\r\n<p style=\"text-align:center\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Demo', 'Admin', 'admin@vironeer.com', 'images/avatars/default.png', '$2y$10$5HnU64qAeTgHhxlJ7JlGGOHlqRvTFWgTR4BJeLmD7uqzPG0GDuYNS', NULL, '2022-01-04 19:35:59', '2022-02-24 21:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 : Unread 1: Read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `position`, `size`, `symbol`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Head Code', NULL, 'head_code', '<!--Head code -->', 0, '2022-06-24 15:52:11', '2022-06-25 00:05:14'),
(2, 'Home Page (Top)', 'Responsive', 'home_page_top', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 15:53:01', '2022-10-14 15:21:42'),
(3, 'Home Page (Center)', 'Responsive', 'home_page_center', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 15:53:30', '2022-06-24 20:23:58'),
(4, 'Home Page (Bottom)', 'Responsive', 'home_page_bottom', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:29:57', '2022-06-24 20:23:30'),
(5, 'Video Page (Video Top)', 'Responsive', 'video_page_video_top', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:29:57', '2022-06-24 20:14:36'),
(6, 'Video Page (Video Bottom)', 'Responsive', 'video_page_video_bottom', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:29:57', '2022-06-24 20:14:46'),
(7, 'Video Page (Center)', 'Responsive', 'video_page_center', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:29:57', '2022-06-24 20:07:41'),
(8, 'Video Page (Bottom)', 'Responsive', 'video_page_bottom', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:29:57', '2022-06-24 20:24:30'),
(9, 'Blog Page (Top)', 'Responsive', 'blog_page_top', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:37:39', '2022-06-24 20:25:03'),
(10, 'Blog Page (Bottom)', 'Responsive', 'blog_page_bottom', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:37:39', '2022-06-24 20:24:53'),
(11, 'Blog Page (Sidebar Top)', 'Responsive', 'blog_page_sidebar_top', '<img src=\"https://via.placeholder.com/300x280\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:37:39', '2022-06-24 20:15:34'),
(13, 'Blog Page (Article Top)', 'Responsive', 'blog_page_article_top', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:37:39', '2022-06-24 20:24:43'),
(14, 'Blog Page (Article Bottom)', 'Responsive', 'blog_page_article_Bottom', '<img src=\"https://via.placeholder.com/720x90\" width=\"100%\" height=\"100%\">', 0, '2022-06-24 16:37:39', '2022-06-24 20:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credentials` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:Disabled 1:Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `name`, `symbol`, `logo`, `credentials`, `instructions`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Google reCAPTCHA', 'google_recaptcha', 'images/extensions/google-recaptcha.png', '{\"site_key\":null,\"secret_key\":null}', NULL, 0, '2022-02-23 20:40:12', '2022-10-14 14:52:01'),
(2, 'Google Analytics', 'google_analytics', 'images/extensions/google-analytics.png', '{\"tracking_id\":null}', NULL, 0, '2022-02-23 20:40:12', '2022-02-23 22:10:57'),
(3, 'Tawk.to', 'tawk_to', 'images/extensions/tawk-to.png', '{\"api_key\":null}', NULL, 0, '2022-02-23 20:40:12', '2022-02-23 22:17:33'),
(4, 'Facebook OAuth', 'facebook_oauth', 'images/extensions/facebook-oauth.png', '{\"client_id\":null,\"client_secret\":null}', '<ul class=\"mb-0\"> \r\n<li><strong>Redirect URL :</strong> [URL]/login/facebook/callback</li> \r\n</ul>', 0, '2022-02-23 20:40:12', '2022-10-14 14:51:48');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_entries`
--

CREATE TABLE `file_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shared_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `storage_provider_id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(100) NOT NULL DEFAULT 0,
  `extension` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_status` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `downloads` bigint(100) NOT NULL DEFAULT 0,
  `views` bigint(100) NOT NULL DEFAULT 0,
  `admin_has_viewed` tinyint(1) NOT NULL DEFAULT 0,
  `expiry_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_reports`
--

CREATE TABLE `file_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_entry_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_has_viewed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_menu`
--

CREATE TABLE `footer_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:LTR 2:RTL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `flag`, `name`, `code`, `direction`, `created_at`, `updated_at`) VALUES
(1, 'images/flags/en.png', 'English', 'en', 1, '2021-12-11 14:35:51', '2022-10-13 18:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `lang`, `group_name`, `key`, `value`, `created_at`, `updated_at`) VALUES
(2, 'en', 'reset password notification', 'Reset Password Notification', 'Reset Password Notification', '2022-04-04 02:33:49', '2022-04-05 04:58:29'),
(3, 'en', 'reset password notification', 'Hello!', 'Hello!', '2022-04-04 02:33:49', '2022-04-04 04:58:20'),
(4, 'en', 'reset password notification', 'You are receiving this email because we received a password reset request for your account.', 'You are receiving this email because we received a password reset request for your account.', '2022-04-04 02:33:49', '2022-04-04 02:33:49'),
(5, 'en', 'reset password notification', 'Reset Password', 'Reset Password', '2022-04-04 02:33:49', '2022-04-04 02:33:49'),
(6, 'en', 'reset password notification', 'This password reset link will expire in {time} minutes.', 'This password reset link will expire in {time} minutes.', '2022-04-04 02:33:49', '2022-04-04 02:33:49'),
(7, 'en', 'reset password notification', 'If you did not request a password reset, no further action is required.', 'If you did not request a password reset, no further action is required.', '2022-04-04 02:33:49', '2022-04-04 02:33:49'),
(8, 'en', 'reset password notification', 'Regards', 'Regards', '2022-04-04 02:33:49', '2022-04-04 02:33:49'),
(9, 'en', 'reset password notification', 'If you are having trouble clicking the button, just copy and paste the URL below into your web browser', 'If you are having trouble clicking the button, just copy and paste the URL below into your web browser', '2022-04-04 02:33:49', '2022-04-04 02:33:49'),
(11, 'en', 'email verification notification', 'Verify Email Address', 'Verify Email Address', '2022-04-04 02:36:11', '2022-04-04 02:36:47'),
(12, 'en', 'email verification notification', 'Hello!', 'Hello!', '2022-04-04 02:36:11', '2022-04-04 02:36:11'),
(13, 'en', 'email verification notification', 'Please click the button below to verify your email address.', 'Please click the button below to verify your email address.', '2022-04-04 02:36:11', '2022-04-04 02:36:11'),
(14, 'en', 'email verification notification', 'Verify My Email', 'Verify My Email', '2022-04-04 02:36:11', '2022-04-04 02:36:11'),
(15, 'en', 'email verification notification', 'If you did not create an account, no further action is required.', 'If you did not create an account, no further action is required.', '2022-04-04 02:36:11', '2022-04-04 02:36:11'),
(23, 'en', 'email verification notification', 'If you are having trouble clicking the button, just copy and paste the URL below into your web browser', 'If you are having trouble clicking the button, just copy and paste the URL below into your web browser', '2022-04-04 02:36:11', '2022-04-04 02:36:11');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_03_223916_create_admins_table', 1),
(6, '2021_10_03_224118_create_admin_password_resets', 1),
(12, '2021_10_07_221832_create_settings_table', 4),
(15, '2021_10_13_195121_create_messages_table', 7),
(26, '2019_08_19_000000_create_failed_jobs_table', 8),
(27, '2021_10_14_230536_create_languages_table', 8),
(29, '2021_10_17_222714_create_additionals_table', 9),
(52, '2021_10_15_212511_create_translates_table', 12),
(54, '2021_10_04_213420_create_pages_table', 14),
(55, '2021_10_06_201713_create_blog_categories_table', 14),
(56, '2021_10_06_201752_create_blog_articles_table', 14),
(65, '2014_10_12_000000_create_users_table', 22),
(71, '2021_11_01_162229_create_user_logs_table', 23),
(73, '2021_12_01_100425_create_admin_notifications_table', 24),
(74, '2021_12_05_004428_create_user_notifications_table', 25),
(77, '2021_12_05_230539_create_social_providers_table', 26),
(82, '2021_12_28_203912_add_views_to_blog_categories_table', 29),
(83, '2021_12_28_203935_add_views_to_blog_articles_table', 29),
(84, '2021_12_28_204116_add_views_to_pages_table', 30),
(86, '2021_12_15_215308_create_footer_menu_table', 31),
(87, '2022_01_06_180145_create_blog_comments_table', 32),
(92, '2021_10_28_191044_create_storage_providers_table', 36),
(93, '2022_02_23_213634_create_extensions_table', 37),
(94, '2022_01_12_214207_create_addons_table', 38),
(95, '2022_04_03_220038_create_mail_templates_table', 39),
(97, '2022_01_06_225055_create_features_table', 41),
(98, '2021_10_24_215104_create_seo_configurations_table', 42),
(99, '2022_02_26_131252_create_faqs_table', 43),
(100, '2022_07_05_201637_create_upload_settings_table', 44),
(101, '2021_12_14_233352_create_navbar_menu_table', 45),
(102, '2022_07_19_022136_create_file_entries_table', 46),
(103, '2022_06_26_214337_create_file_reports_table', 47),
(104, '2022_10_13_174118_add_allow_downloading_to_upload_settings_table', 48),
(105, '2022_10_13_182227_create_advertisements_table', 49);

-- --------------------------------------------------------

--
-- Table structure for table `navbar_menu`
--

CREATE TABLE `navbar_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` tinyint(4) NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `seo_configurations`
--

CREATE TABLE `seo_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `robots_index` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `robots_follow_links` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'website_name', 'Playbob'),
(2, 'website_url', NULL),
(3, 'website_dark_logo', 'images/dark-logo.jpg'),
(4, 'website_light_logo', 'images/light-logo.jpg'),
(5, 'website_favicon', 'images/favicon.jpg'),
(6, 'website_social_image', 'images/social-image.jpg'),
(7, 'website_primary_color', '#4E54C8'),
(8, 'website_secondary_color', '#8A8FF7'),
(9, 'website_email_verify_status', '0'),
(10, 'website_registration_status', '1'),
(11, 'mail_status', '0'),
(12, 'mail_mailer', 'smtp'),
(13, 'mail_host', NULL),
(14, 'mail_port', NULL),
(15, 'mail_username', NULL),
(16, 'mail_password', NULL),
(17, 'mail_encryption', 'tls'),
(18, 'mail_form_email', NULL),
(19, 'mail_from_name', NULL),
(25, 'contact_email', NULL),
(34, 'terms_of_service_link', NULL),
(36, 'website_cookie', '1'),
(38, 'date_format', '10'),
(39, 'timezone', 'America/New_York'),
(40, 'website_force_ssl_status', '0'),
(1002, 'website_mail_logo', 'images/mail-logo.jpg'),
(1003, 'website_mail_primary_color', '#4E54C8'),
(1004, 'website_mail_background_color', '#EDF2F7'),
(1005, 'website_mail_normal_text_color', '#718096'),
(1006, 'website_mail_bold_text_color', '#3D4852'),
(1007, 'website_blog_status', '1'),
(1009, 'website_third_color', '#222453'),
(1010, 'website_background_color', '#F6F6FF'),
(1011, 'website_language_type', '1'),
(1012, 'website_home_background_pattern', 'images/home-pattern.png'),
(1013, 'website_contact_form_status', '0'),
(1014, 'website_faq_status', '1'),
(1015, 'website_chunk_size', '90');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage_providers`
--

CREATE TABLE `storage_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handler` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credentials` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:Disabled 1:Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_providers`
--

INSERT INTO `storage_providers` (`id`, `name`, `symbol`, `handler`, `logo`, `credentials`, `instructions`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Local Storage', 'local', 'App\\Http\\Controllers\\Frontend\\Storage\\LocalController', 'images/storage/local.png', '{}', NULL, 1, '2022-02-20 22:13:06', '2022-02-20 22:44:06'),
(2, 'Amazon S3', 's3', 'App\\Http\\Controllers\\Frontend\\Storage\\AmazonController', 'images/storage/amazon.png', '{\"access_key_id\":null,\"secret_access_key\":null,\"default_region\":null,\"bucket\":null,\"url\":null}', NULL, 0, '2022-02-20 22:12:55', '2022-04-13 00:19:13'),
(5, 'Wasabi Cloud Storage', 'wasabi', 'App\\Http\\Controllers\\Frontend\\Storage\\WasabiController', 'images/storage/wasabi.png', '{\"access_key_id\":null,\"secret_access_key\":null,\"default_region\":null,\"bucket\":null}', NULL, 0, '2022-02-20 22:13:01', '2022-10-14 17:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `translates`
--

CREATE TABLE `translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translates`
--

INSERT INTO `translates` (`id`, `lang`, `group_name`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1025, 'en', 'general', 'All rights reserved', 'All rights reserved', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1026, 'en', 'validation', 'The :attribute must be accepted.', 'The :attribute must be accepted.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1027, 'en', 'validation', 'The :attribute must be accepted when :other is :value.', 'The :attribute must be accepted when :other is :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1028, 'en', 'validation', 'The :attribute is not a valid URL.', 'The :attribute is not a valid URL.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1029, 'en', 'validation', 'The :attribute must be a date after :date.', 'The :attribute must be a date after :date.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1030, 'en', 'validation', 'The :attribute must be a date after or equal to :date.', 'The :attribute must be a date after or equal to :date.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1031, 'en', 'validation', 'The :attribute must only contain letters.', 'The :attribute must only contain letters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1032, 'en', 'validation', 'The :attribute must only contain letters, numbers, dashes and underscores.', 'The :attribute must only contain letters, numbers, dashes and underscores.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1033, 'en', 'validation', 'The :attribute must only contain letters and numbers.', 'The :attribute must only contain letters and numbers.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1034, 'en', 'validation', 'The :attribute must be an array.', 'The :attribute must be an array.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1035, 'en', 'validation', 'The :attribute must be a date before :date.', 'The :attribute must be a date before :date.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1036, 'en', 'validation', 'The :attribute must be a date before or equal to :date.', 'The :attribute must be a date before or equal to :date.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1037, 'en', 'validation', 'The :attribute must be between :min and :max.', 'The :attribute must be between :min and :max.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1038, 'en', 'validation', 'The :attribute must be between :min and :max kilobytes.', 'The :attribute must be between :min and :max kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1039, 'en', 'validation', 'The :attribute must be between :min and :max characters.', 'The :attribute must be between :min and :max characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1040, 'en', 'validation', 'The :attribute must have between :min and :max items.', 'The :attribute must have between :min and :max items.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1041, 'en', 'validation', 'The :attribute field must be true or false.', 'The :attribute field must be true or false.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1042, 'en', 'validation', 'The :attribute confirmation does not match.', 'The :attribute confirmation does not match.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1043, 'en', 'validation', 'The password is incorrect.', 'The password is incorrect.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1044, 'en', 'validation', 'The :attribute is not a valid date.', 'The :attribute is not a valid date.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1045, 'en', 'validation', 'The :attribute must be a date equal to :date.', 'The :attribute must be a date equal to :date.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1046, 'en', 'validation', 'The :attribute does not match the format :format.', 'The :attribute does not match the format :format.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1047, 'en', 'validation', 'The :attribute and :other must be different.', 'The :attribute and :other must be different.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1048, 'en', 'validation', 'The :attribute must be :digits digits.', 'The :attribute must be :digits digits.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1049, 'en', 'validation', 'The :attribute must be between :min and :max digits.', 'The :attribute must be between :min and :max digits.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1050, 'en', 'validation', 'The :attribute has invalid image dimensions.', 'The :attribute has invalid image dimensions.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1051, 'en', 'validation', 'The :attribute field has a duplicate value.', 'The :attribute field has a duplicate value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1052, 'en', 'validation', 'The :attribute must be a valid email address.', 'The :attribute must be a valid email address.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1053, 'en', 'validation', 'The :attribute must end with one of the following: :values.', 'The :attribute must end with one of the following: :values.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1054, 'en', 'validation', 'The selected :attribute is invalid.', 'The selected :attribute is invalid.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1055, 'en', 'validation', 'The :attribute must be a file.', 'The :attribute must be a file.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1056, 'en', 'validation', 'The :attribute field must have a value.', 'The :attribute field must have a value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1057, 'en', 'validation', 'The :attribute must be greater than :value.', 'The :attribute must be greater than :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1058, 'en', 'validation', 'The :attribute must be greater than :value kilobytes.', 'The :attribute must be greater than :value kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1059, 'en', 'validation', 'The :attribute must be greater than :value characters.', 'The :attribute must be greater than :value characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1060, 'en', 'validation', 'The :attribute must have more than :value items.', 'The :attribute must have more than :value items.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1061, 'en', 'validation', 'The :attribute must be greater than or equal :value.', 'The :attribute must be greater than or equal :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1062, 'en', 'validation', 'The :attribute must be greater than or equal :value kilobytes.', 'The :attribute must be greater than or equal :value kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1063, 'en', 'validation', 'The :attribute must be greater than or equal :value characters.', 'The :attribute must be greater than or equal :value characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1064, 'en', 'validation', 'The :attribute must have :value items or more.', 'The :attribute must have :value items or more.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1065, 'en', 'validation', 'The :attribute must be an image.', 'The :attribute must be an image.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1066, 'en', 'validation', 'The :attribute field does not exist in :other.', 'The :attribute field does not exist in :other.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1067, 'en', 'validation', 'The :attribute must be an integer.', 'The :attribute must be an integer.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1068, 'en', 'validation', 'The :attribute must be a valid IP address.', 'The :attribute must be a valid IP address.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1069, 'en', 'validation', 'The :attribute must be a valid IPv4 address.', 'The :attribute must be a valid IPv4 address.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1070, 'en', 'validation', 'The :attribute must be a valid IPv6 address.', 'The :attribute must be a valid IPv6 address.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1071, 'en', 'validation', 'The :attribute must be a valid JSON string.', 'The :attribute must be a valid JSON string.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1072, 'en', 'validation', 'The :attribute must be less than :value.', 'The :attribute must be less than :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1073, 'en', 'validation', 'The :attribute must be less than :value kilobytes.', 'The :attribute must be less than :value kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1074, 'en', 'validation', 'The :attribute must be less than :value characters.', 'The :attribute must be less than :value characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1075, 'en', 'validation', 'The :attribute must have less than :value items.', 'The :attribute must have less than :value items.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1076, 'en', 'validation', 'The :attribute must be less than or equal :value.', 'The :attribute must be less than or equal :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1077, 'en', 'validation', 'The :attribute must be less than or equal :value kilobytes.', 'The :attribute must be less than or equal :value kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1078, 'en', 'validation', 'The :attribute must be less than or equal :value characters.', 'The :attribute must be less than or equal :value characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1079, 'en', 'validation', 'The :attribute must not have more than :value items.', 'The :attribute must not have more than :value items.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1080, 'en', 'validation', 'The :attribute must not be greater than :max.', 'The :attribute must not be greater than :max.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1081, 'en', 'validation', 'The :attribute must not be greater than :max kilobytes.', 'The :attribute must not be greater than :max kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1082, 'en', 'validation', 'The :attribute must not be greater than :max characters.', 'The :attribute must not be greater than :max characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1083, 'en', 'validation', 'The :attribute must not have more than :max items.', 'The :attribute must not have more than :max items.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1084, 'en', 'validation', 'The :attribute must be a file of type: :values.', 'The :attribute must be a file of type: :values.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1085, 'en', 'validation', 'The :attribute must be at least :min.', 'The :attribute must be at least :min.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1086, 'en', 'validation', 'The :attribute must be at least :min kilobytes.', 'The :attribute must be at least :min kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1087, 'en', 'validation', 'The :attribute must be at least :min characters.', 'The :attribute must be at least :min characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1088, 'en', 'validation', 'The :attribute must have at least :min items.', 'The :attribute must have at least :min items.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1089, 'en', 'validation', 'The :attribute must be a multiple of :value.', 'The :attribute must be a multiple of :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1090, 'en', 'validation', 'The :attribute format is invalid.', 'The :attribute format is invalid.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1091, 'en', 'validation', 'The :attribute must be a number.', 'The :attribute must be a number.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1092, 'en', 'validation', 'The :attribute field must be present.', 'The :attribute field must be present.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1093, 'en', 'validation', 'The :attribute field is required.', 'The :attribute field is required.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1094, 'en', 'validation', 'The :attribute field is required when :other is :value.', 'The :attribute field is required when :other is :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1095, 'en', 'validation', 'The :attribute field is required unless :other is in :values.', 'The :attribute field is required unless :other is in :values.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1096, 'en', 'validation', 'The :attribute field is required when :values is present.', 'The :attribute field is required when :values is present.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1097, 'en', 'validation', 'The :attribute field is required when :values are present.', 'The :attribute field is required when :values are present.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1098, 'en', 'validation', 'The :attribute field is required when :values is not present.', 'The :attribute field is required when :values is not present.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1099, 'en', 'validation', 'The :attribute field is required when none of :values are present.', 'The :attribute field is required when none of :values are present.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1100, 'en', 'validation', 'The :attribute field is prohibited.', 'The :attribute field is prohibited.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1101, 'en', 'validation', 'The :attribute field is prohibited when :other is :value.', 'The :attribute field is prohibited when :other is :value.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1102, 'en', 'validation', 'The :attribute field is prohibited unless :other is in :values.', 'The :attribute field is prohibited unless :other is in :values.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1103, 'en', 'validation', 'The :attribute field prohibits :other from being present.', 'The :attribute field prohibits :other from being present.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1104, 'en', 'validation', 'The :attribute and :other must match.', 'The :attribute and :other must match.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1105, 'en', 'validation', 'The :attribute must be :size.', 'The :attribute must be :size.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1106, 'en', 'validation', 'The :attribute must be :size kilobytes.', 'The :attribute must be :size kilobytes.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1107, 'en', 'validation', 'The :attribute must be :size characters.', 'The :attribute must be :size characters.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1108, 'en', 'validation', 'The :attribute must contain :size items.', 'The :attribute must contain :size items.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1109, 'en', 'validation', 'The :attribute must start with one of the following: :values.', 'The :attribute must start with one of the following: :values.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1110, 'en', 'validation', 'The :attribute must be a string.', 'The :attribute must be a string.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1111, 'en', 'validation', 'The :attribute must be a valid timezone.', 'The :attribute must be a valid timezone.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1112, 'en', 'validation', 'The :attribute has already been taken.', 'The :attribute has already been taken.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1113, 'en', 'validation', 'The :attribute failed to upload.', 'The :attribute failed to upload.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1114, 'en', 'validation', 'The :attribute must be a valid URL.', 'The :attribute must be a valid URL.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1115, 'en', 'validation', 'The :attribute must be a valid UUID.', 'The :attribute must be a valid UUID.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1118, 'en', 'alerts', 'These credentials do not match our records.', 'These credentials do not match our records.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1119, 'en', 'alerts', 'The provided password is incorrect.', 'The provided password is incorrect.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1120, 'en', 'alerts', 'Too many login attempts. Please try again in :seconds seconds.', 'Too many login attempts. Please try again in :seconds seconds.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1121, 'en', 'alerts', 'Your password has been reset!', 'Your password has been reset!', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1122, 'en', 'alerts', 'We have emailed your password reset link!', 'We have emailed your password reset link!', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1123, 'en', 'alerts', 'Please wait before retrying.', 'Please wait before retrying.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1124, 'en', 'alerts', 'This password reset token is invalid.', 'This password reset token is invalid.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1125, 'en', 'alerts', 'We can\'t find a user with that email address.', 'We can\'t find a user with that email address.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1126, 'en', 'forms', 'Captcha', 'Captcha', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1135, 'en', 'user', 'Sign In', 'Sign In', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1136, 'en', 'user', 'Sign Up', 'Sign Up', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1137, 'en', 'user', 'Reset Password', 'Reset Password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1138, 'en', 'user', 'Sign in page title', 'Sign In', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1139, 'en', 'user', 'Sign in to your account to continue', 'Sign in to your account to continue', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1140, 'en', 'forms', 'Email address', 'Email address', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1141, 'en', 'forms', 'Password', 'Password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1142, 'en', 'user', 'Remember Me', 'Remember Me', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1143, 'en', 'user', 'Forgot Your Password?', 'Forgot Your Password?', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1144, 'en', 'user', 'Or', 'Or', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1145, 'en', 'user', 'Sign in With Facebook', 'Sign in With Facebook', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1146, 'en', 'user', 'You will receive an email with a link to reset your password', 'You will receive an email with a link to reset your password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1147, 'en', 'user', 'Reset', 'Reset', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1148, 'en', 'user', 'Enter a new password to continue.', 'Enter a new password to continue.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1149, 'en', 'forms', 'Confirm password', 'Confirm password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1150, 'en', 'user', 'Please confirm your password before continuing.', 'Please confirm your password before continuing.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1151, 'en', 'user', 'Confirm Password', 'Confirm Password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1152, 'en', 'forms', 'First Name', 'First Name', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1153, 'en', 'forms', 'Last Name', 'Last Name', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1154, 'en', 'forms', 'Username', 'Username', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1158, 'en', 'user', 'I agree to the', 'I agree to the', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1159, 'en', 'user', 'terms of service', 'terms of service', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1160, 'en', 'user', 'Continue', 'Continue', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1161, 'en', 'user', 'Create account', 'Create account', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1162, 'en', 'user', 'Enter your details to create an account', 'Enter your details to create an account', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1165, 'en', 'alerts', 'Registration is currently disabled.', 'Registration is currently disabled.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1166, 'en', 'alerts', 'Your account has been blocked', 'Your account has been blocked', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1167, 'en', 'user', 'Verify Your Email Address', 'Verify Your Email Address', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1168, 'en', 'user', 'Thanks for getting started with', 'Thanks for getting started with', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1169, 'en', 'user', 'We need a little more information to complete your registration, including a confirmation of your email address.', 'We need a little more information to complete your registration, including a confirmation of your email address.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1170, 'en', 'user', 'Please follow the instruction that we sent to your email, if you didn\'t receive the email click resent to get a new one.', 'Please follow the instruction that we sent to your email, if you didn\'t receive the email click resent to get a new one.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1171, 'en', 'user', 'Resend', 'Resend', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1172, 'en', 'user', 'Change Email', 'Change Email', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1173, 'en', 'alerts', 'Link has been resend Successfully', 'Link has been resend Successfully', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1174, 'en', 'user', 'Save', 'Save', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1175, 'en', 'alerts', 'You must to change the email to make a change', 'You must to change the email to make a change', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1176, 'en', 'alerts', 'Email has been changed successfully', 'Email has been changed successfully', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1177, 'en', 'user', 'Logout', 'Logout', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1178, 'en', 'user', 'Dashboard', 'Dashboard', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1180, 'en', 'user', 'Settings', 'Settings', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1181, 'en', 'user', 'Account Details', 'Account Details', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1182, 'en', 'user', 'Change Password', 'Change Password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1183, 'en', 'user', '2FA Authentication', '2FA Authentication', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1184, 'en', 'user', 'Empty Section', 'Empty Section', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1185, 'en', 'user', 'This section does not have any content right now, please check it later or start creating a content', 'This section does not have any content right now, please check it later or start creating a content', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1186, 'en', 'user', 'Back', 'Back', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1209, 'en', 'user', 'Notifications', 'Notifications', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1210, 'en', 'user', 'Make All as Read', 'Make All as Read', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1211, 'en', 'user', 'View All', 'View All', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1212, 'en', 'user', 'All notifications has been read successfully', 'All notifications has been read successfully', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1213, 'en', 'user', 'User', 'User', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1214, 'en', 'user', 'No notifications found', 'No notifications found', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1215, 'en', 'alerts', 'Connection error please try again', 'Connection error please try again', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1216, 'en', 'alerts', 'Upload error', 'Upload error', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1217, 'en', 'user', 'Complete registration', 'Complete registration', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1218, 'en', 'user', 'We need a little more information to complete your registration.', 'We need a little more information to complete your registration.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1219, 'en', 'alerts', 'Unauthorized or expired token', 'Unauthorized or expired token', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1220, 'en', 'user', 'Are you sure?', 'Are you sure?', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1221, 'en', 'user', 'Confirm that you want do this action', 'Confirm that you want do this action', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1222, 'en', 'user', 'Confirm', 'Confirm', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1223, 'en', 'user', 'Cancel', 'Cancel', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1236, 'en', 'user', 'Change', 'Change', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1243, 'en', 'user', 'Save Changes', 'Save Changes', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1248, 'en', 'alerts', 'Account details has been updated successfully', 'Account details has been updated successfully', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1249, 'en', 'user', 'Verify Your New Email Address', 'Verify Your New Email Address', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1250, 'en', 'user', 'Since you have changed your email address, we need to verify that it is really your email', 'Since you have changed your email address, we need to verify that it is really your email', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1251, 'en', 'forms', 'New Password', 'New Password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1252, 'en', 'forms', 'Confirm New Password', 'Confirm New Password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1253, 'en', 'alerts', 'Your current password does not matches with the password you provided', 'Your current password does not matches with the password you provided', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1254, 'en', 'alerts', 'New Password cannot be same as your current password. Please choose a different password', 'New Password cannot be same as your current password. Please choose a different password', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1255, 'en', 'alerts', 'Account password has been changed successfully', 'Account password has been changed successfully', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1256, 'en', 'user', 'Two-factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two-factor authentication protects against phishing, social engineering, and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.', 'Two-factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two-factor authentication protects against phishing, social engineering, and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1257, 'en', 'user', 'To use the two factor authentication, you have to install a Google Authenticator compatible app. Here are some that are currently available', 'To use the two factor authentication, you have to install a Google Authenticator compatible app. Here are some that are currently available', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1258, 'en', 'user', 'Google Authenticator for iOS', 'Google Authenticator for iOS', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1259, 'en', 'user', 'Google Authenticator for Android', 'Google Authenticator for Android', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1260, 'en', 'user', 'Microsoft Authenticator for iOS', 'Microsoft Authenticator for iOS', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1261, 'en', 'user', 'Microsoft Authenticator for Android', 'Microsoft Authenticator for Android', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1262, 'en', 'user', 'Enable', 'Enable', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1263, 'en', 'user', 'Enable 2FA Authentication', 'Enable 2FA Authentication', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1264, 'en', 'alerts', 'Invalid OTP code', 'Invalid OTP code', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1265, 'en', 'alerts', '2FA Authentication has been enabled successfully', '2FA Authentication has been enabled successfully', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1266, 'en', 'user', 'Disable 2FA Authentication', 'Disable 2FA Authentication', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1267, 'en', 'user', 'Disable', 'Disable', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1268, 'en', 'alerts', '2FA Authentication has been disabled successfully', '2FA Authentication has been disabled successfully', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1269, 'en', 'forms', 'OTP Code', 'OTP Code', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1270, 'en', 'user', '2Fa Verification', '2Fa Verification', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1271, 'en', 'user', 'Please enter the OTP code to continue', 'Please enter the OTP code to continue', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1272, 'en', 'error pages', 'Page Not Found', 'Page Not Found', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1273, 'en', 'error pages', 'Unauthorized', 'Unauthorized', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1274, 'en', 'error pages', 'Server Error', 'Server Error', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1275, 'en', 'error pages', 'Service Unavailable', 'Service Unavailable', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1276, 'en', 'error pages', 'Too Many Requests', 'Too Many Requests', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1277, 'en', 'error pages', 'Forbidden', 'Forbidden', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1278, 'en', 'error pages', 'Page Expired', 'Page Expired', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1279, 'en', 'error pages', 'You can’t always get what you want. It’s true in life, and it’s true on the web — sometimes, what you’re looking for just isn’t there', 'You can’t always get what you want. It’s true in life, and it’s true on the web — sometimes, what you’re looking for just isn’t there', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1280, 'en', 'error pages', 'Back to home', 'Back to home', '2021-12-11 14:35:51', '2021-12-11 14:35:51'),
(1281, 'en', 'general', 'We use cookies to personalize your experience. By continuing to visit this website you agree to our use of cookies', 'We use cookies to personalize your experience. By continuing to visit this website you agree to our use of cookies', '2021-12-11 17:50:17', '2021-12-11 17:50:17'),
(1282, 'en', 'general', 'Got it', 'Got it', '2021-12-11 17:50:17', '2021-12-11 17:50:17'),
(1283, 'en', 'general', 'More', 'More', '2021-12-11 17:50:17', '2021-12-11 17:50:17'),
(1284, 'en', 'alerts', 'Cookie accepted successfully', 'Cookie accepted successfully', '2021-12-11 18:19:44', '2022-07-20 15:34:35'),
(1285, 'en', 'general', 'Close', 'Close', '2021-12-14 19:26:32', '2021-12-14 19:26:32'),
(1286, 'en', 'contact us', 'Contact Us', 'Contact Us', '2022-07-17 19:23:44', '2022-07-17 19:23:44'),
(3433, 'en', 'general', 'Copied to clipboard', 'Copied to clipboard', '2022-04-16 03:16:10', '2022-04-16 03:16:10'),
(3960, 'en', 'general', 'B', 'B', '2022-07-17 01:36:03', '2022-07-17 01:36:03'),
(3961, 'en', 'general', 'KB', 'KB', '2022-07-17 01:36:03', '2022-07-17 01:36:03'),
(3962, 'en', 'general', 'MB', 'MB', '2022-07-17 01:36:03', '2022-07-17 01:36:03'),
(3963, 'en', 'general', 'GB', 'GB', '2022-07-17 01:36:03', '2022-07-17 01:36:03'),
(3964, 'en', 'general', 'TB', 'TB', '2022-07-17 01:36:03', '2022-07-17 01:36:03'),
(3965, 'en', 'general', 'day', 'day', '2022-07-17 01:37:15', '2022-07-17 01:37:15'),
(3966, 'en', 'general', 'days', 'days', '2022-07-17 01:37:15', '2022-07-17 01:37:15'),
(3967, 'en', 'home page', 'Upload And Share Your Videos', 'Upload And Share Your Videos', '2022-07-17 17:21:55', '2022-07-17 17:21:55'),
(3968, 'en', 'home page', 'Drag and drop anywhere or click to upload your videos and start sharing them everywhere for free.', 'Drag and drop anywhere or click to upload your (MP4, WEBM) videos and start sharing them everywhere for free.', '2022-07-17 17:21:55', '2022-07-20 23:06:07'),
(3969, 'en', 'home page', 'Upload', 'Upload', '2022-07-17 17:21:55', '2022-07-17 17:21:55'),
(3970, 'en', 'home page', 'Features', 'Features', '2022-07-17 17:29:23', '2022-07-17 17:29:23'),
(3971, 'en', 'home page', 'Features description', 'Features descriptionLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-07-17 17:29:23', '2022-07-17 17:29:32'),
(3972, 'en', 'home page', 'Blog', 'Blog', '2022-07-17 17:55:48', '2022-07-17 17:55:48'),
(3973, 'en', 'home page', 'Blog description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-07-17 17:55:48', '2022-07-17 17:56:03'),
(3974, 'en', 'home page', 'View More', 'View More', '2022-07-17 17:58:20', '2022-07-17 17:58:20'),
(3975, 'en', 'home page', 'FAQ', 'FAQ', '2022-07-17 18:08:06', '2022-07-17 18:08:06'),
(3976, 'en', 'home page', 'FAQ description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-07-17 18:08:06', '2022-07-17 18:08:18'),
(3977, 'en', 'home page', 'Find out more answers on our FAQ', 'Find out more answers on our FAQ', '2022-07-17 18:12:45', '2022-07-17 18:12:45'),
(3978, 'en', 'home page', 'Contact Us', 'Contact Us', '2022-07-17 18:22:20', '2022-07-17 18:22:20'),
(3979, 'en', 'home page', 'Contact Us description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2022-07-17 18:22:20', '2022-07-17 18:22:28'),
(3980, 'en', 'contact us', 'Name', 'Name', '2022-07-17 18:28:00', '2022-07-17 18:28:00'),
(3981, 'en', 'contact us', 'Email address', 'Email address', '2022-07-17 18:28:00', '2022-07-17 18:28:00'),
(3982, 'en', 'contact us', 'Subject', 'Subject', '2022-07-17 18:28:00', '2022-07-17 18:28:00'),
(3983, 'en', 'contact us', 'Message', 'Message', '2022-07-17 18:28:00', '2022-07-17 18:28:00'),
(3984, 'en', 'contact us', 'Send', 'Send', '2022-07-17 18:28:00', '2022-07-17 18:28:00'),
(3985, 'en', 'contact us', 'Sending emails is not available right now', 'Sending emails is not available right now', '2022-07-17 18:58:00', '2022-07-17 18:58:00'),
(3986, 'en', 'contact us', 'Error on sending', 'Error on sending', '2022-07-17 18:59:59', '2022-07-17 18:59:59'),
(3987, 'en', 'contact us', 'Your message has been sent successfully', 'Your message has been sent successfully', '2022-07-17 19:14:20', '2022-07-17 19:14:20'),
(3990, 'en', 'general', 'FAQ', 'FAQ', '2022-07-17 20:04:24', '2022-07-17 20:04:24'),
(3991, 'en', 'blog', 'Blog', 'Blog', '2022-07-17 20:42:17', '2022-07-17 20:42:17'),
(3992, 'en', 'blog', 'Search..', 'Search..', '2022-07-17 21:01:52', '2022-07-17 21:01:52'),
(3993, 'en', 'blog', 'Categories', 'Categories', '2022-07-17 21:01:52', '2022-07-17 21:01:52'),
(3994, 'en', 'blog', 'Popular articles', 'Popular articles', '2022-07-17 21:01:52', '2022-07-17 21:01:52'),
(3995, 'en', 'blog', 'Share On', 'Share On', '2022-07-17 21:24:52', '2022-07-17 21:24:52'),
(3996, 'en', 'blog', 'Login or create account to leave comments', 'Login or create account to leave comments', '2022-07-17 21:25:55', '2022-07-17 21:25:55'),
(3997, 'en', 'blog', 'Leave a comment', 'Leave a comment', '2022-07-17 21:26:25', '2022-07-17 21:26:25'),
(3998, 'en', 'blog', 'Your comment', 'Your comment', '2022-07-17 21:26:25', '2022-07-17 21:26:25'),
(3999, 'en', 'blog', 'Publish', 'Publish', '2022-07-17 21:26:25', '2022-07-17 21:26:25'),
(4000, 'en', 'alerts', 'Your comment is under review it will be published soon', 'Your comment is under review it will be published soon', '2022-07-17 21:28:28', '2022-07-17 21:28:28'),
(4001, 'en', 'blog', 'Comments', 'Comments', '2022-07-17 21:29:47', '2022-07-17 21:29:47'),
(4002, 'en', 'blog', 'There is no content in this section', 'There is no content in this section', '2022-07-17 21:52:07', '2022-07-17 21:52:07'),
(4003, 'en', 'blog', 'There is no content available in this section right now, try searching or check it out later', 'There is no content available in this section right now, try searching or check it out later', '2022-07-17 21:52:07', '2022-07-17 21:52:07'),
(4006, 'en', 'blog', 'No results matching your search', 'No results matching your search', '2022-07-17 21:57:42', '2022-07-17 21:57:42'),
(4008, 'en', 'blog', 'There are no results matching your search. Try another word or return to the blog page', 'There are no results matching your search. Try another word or return to the blog page', '2022-07-17 22:09:28', '2022-07-17 22:09:28'),
(4009, 'en', 'blog', 'No comments available', 'No comments available', '2022-07-17 22:09:36', '2022-07-17 22:09:36'),
(4811, 'en', 'general', 'Unlimited', 'Unlimited', '2022-07-19 00:21:47', '2022-07-19 00:21:47'),
(4812, 'en', 'general', 'Unlimited time', 'Unlimited time', '2022-07-19 00:21:47', '2022-07-19 00:21:47'),
(4813, 'en', 'upload zone', 'Upload Your Videos', 'Upload Your Videos', '2022-07-19 17:47:44', '2022-07-19 17:47:44'),
(4816, 'en', 'upload zone', 'Drop Your Video Here', 'Drop Your Video Here', '2022-07-19 17:49:01', '2022-07-19 17:49:01'),
(4817, 'en', 'upload zone', 'Add your videos by drag-and-dropping them on this window 😉', 'Add your videos by drag-and-dropping them on this window 😉', '2022-07-19 17:49:01', '2022-07-19 17:49:01'),
(4818, 'en', 'upload zone', 'Drag and drop your videos here to upload', 'Drag and drop your videos here to upload', '2022-07-19 17:51:43', '2022-07-19 17:51:43'),
(4819, 'en', 'upload zone', 'You can also', 'You can also', '2022-07-19 17:51:43', '2022-07-19 17:51:43'),
(4820, 'en', 'upload zone', 'browse from your computer', 'browse from your computer', '2022-07-19 17:51:43', '2022-07-19 17:51:43'),
(4823, 'en', 'upload zone', 'Max Video Size {max_file_size}', 'Max Video Size {max_file_size}', '2022-07-19 17:54:34', '2022-07-19 17:54:34'),
(4824, 'en', 'upload zone', 'Videos available for {files_duration}', 'Videos available for {files_duration}', '2022-07-19 17:54:34', '2022-07-19 17:54:34'),
(4825, 'en', 'upload zone', 'Upload more', 'Upload more', '2022-07-19 17:55:46', '2022-07-19 17:55:46'),
(4826, 'en', 'upload zone', 'Reset', 'Reset', '2022-07-19 17:55:46', '2022-07-19 17:55:46'),
(4827, 'en', 'upload zone', 'Auto delete file', 'Auto delete file', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4828, 'en', 'upload zone', 'Don\'t autodelete', 'Don\'t autodelete', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4829, 'en', 'upload zone', 'After 5 minutes', 'After 5 minutes', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4830, 'en', 'upload zone', 'After 15 minutes', 'After 15 minutes', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4831, 'en', 'upload zone', 'After 30 minutes', 'After 30 minutes', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4832, 'en', 'upload zone', 'After 1 hour', 'After 1 hour', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4833, 'en', 'upload zone', 'After 3 hours', 'After 3 hours', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4834, 'en', 'upload zone', 'After 6 hours', 'After 6 hours', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4835, 'en', 'upload zone', 'After 12 hours', 'After 12 hours', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4836, 'en', 'upload zone', 'After 1 day', 'After 1 day', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4837, 'en', 'upload zone', 'After 2 days', 'After 2 days', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4838, 'en', 'upload zone', 'After 3 days', 'After 3 days', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4839, 'en', 'upload zone', 'After 4 days', 'After 4 days', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4840, 'en', 'upload zone', 'After 5 days', 'After 5 days', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4841, 'en', 'upload zone', 'After 6 days', 'After 6 days', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4842, 'en', 'upload zone', 'After 1 week', 'After 1 week', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4843, 'en', 'upload zone', 'After 2 weeks', 'After 2 weeks', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4844, 'en', 'upload zone', 'After 3 weeks', 'After 3 weeks', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4845, 'en', 'upload zone', 'After 1 month', 'After 1 month', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4846, 'en', 'upload zone', 'After 2 months', 'After 2 months', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4847, 'en', 'upload zone', 'After 3 months', 'After 3 months', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4848, 'en', 'upload zone', 'After 4 months', 'After 4 months', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4849, 'en', 'upload zone', 'After 5 months', 'After 5 months', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4850, 'en', 'upload zone', 'After 6 months', 'After 6 months', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4851, 'en', 'upload zone', 'After 1 year', 'After 1 year', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4852, 'en', 'upload zone', 'Upload', 'Upload', '2022-07-19 17:59:11', '2022-07-19 17:59:11'),
(4853, 'en', 'upload zone', 'Password protection', 'Password protection', '2022-07-19 18:01:28', '2022-07-19 18:01:28'),
(4854, 'en', 'upload zone', 'The password helps protect your videos from public accessing', 'The password helps protect your videos from public accessing', '2022-07-19 18:01:28', '2022-07-19 18:01:28'),
(4855, 'en', 'upload zone', 'Enter password', 'Enter password', '2022-07-19 18:01:28', '2022-07-19 18:01:28'),
(4856, 'en', 'upload zone', 'Submit', 'Submit', '2022-07-19 18:01:28', '2022-07-19 18:01:28'),
(5148, 'en', 'upload zone', 'file is too big max file size: {{maxFilesize}}MiB.', 'File is too big max file size: {{maxFilesize}}MiB.', '2022-07-20 15:26:11', '2022-07-20 20:03:22'),
(5149, 'en', 'upload zone', 'Server responded with {{statusCode}} code.', 'Server responded with {{statusCode}} code.', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5150, 'en', 'upload zone', 'Drop files here to upload', 'Drop files here to upload', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5151, 'en', 'upload zone', 'Your browser does not support drag and drop file uploads.', 'Your browser does not support drag and drop file uploads.', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5152, 'en', 'upload zone', 'Please use the fallback form below to upload your files like in the olden days.', 'Please use the fallback form below to upload your files like in the olden days.', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5153, 'en', 'upload zone', 'You cannot upload files of this type.', 'You cannot upload files of this type.', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5154, 'en', 'upload zone', 'Cancel upload', 'Cancel upload', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5155, 'en', 'upload zone', 'Are you sure you want to cancel this upload?', 'Are you sure you want to cancel this upload?', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5156, 'en', 'upload zone', 'Remove file', 'Remove file', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5157, 'en', 'upload zone', 'You can not upload any more files.', 'You can not upload any more files.', '2022-07-20 15:26:11', '2022-07-20 15:26:11'),
(5158, 'en', 'upload zone', 'Are you sure you want to close this window?', 'Are you sure you want to close this window?', '2022-07-20 15:27:47', '2022-07-20 15:28:51'),
(5460, 'en', 'upload zone', 'File is too big, Max file size {maxFileSize}', 'File is too big, Max file size {maxFileSize}', '2022-07-20 17:50:44', '2022-07-20 17:50:44'),
(5461, 'en', 'upload zone', 'Invalid file auto delete time', 'Invalid file auto delete time', '2022-07-20 17:50:44', '2022-07-20 17:50:44'),
(5462, 'en', 'upload zone', 'insufficient storage space please ensure sufficient space', 'insufficient storage space please ensure sufficient space', '2022-07-20 17:50:44', '2022-07-20 17:50:44'),
(5463, 'en', 'upload zone', 'No files attached', 'No files attached', '2022-07-20 17:50:44', '2022-07-20 17:50:44'),
(5464, 'en', 'upload zone', 'File with the same name already attached', 'File with the same name already attached', '2022-07-20 17:50:45', '2022-07-20 17:50:45'),
(5465, 'en', 'upload zone', 'Empty files cannot be uploaded', 'Empty files cannot be uploaded', '2022-07-20 17:50:45', '2022-07-20 17:50:45'),
(5466, 'en', 'home page', 'Get Started', 'Get Started', '2022-07-20 19:38:09', '2022-07-20 19:38:09'),
(5467, 'en', 'upload zone', 'Login or create account to start uploading videos', 'Login or create account to start uploading videos', '2022-07-20 19:40:56', '2022-07-20 19:40:56'),
(5468, 'en', 'upload zone', 'Unavailable storage provider', 'Unavailable storage provider', '2022-07-20 20:42:36', '2022-07-20 20:42:36'),
(5469, 'en', 'upload zone', 'Failed to upload ({filename})', 'Failed to upload ({filename})', '2022-07-20 20:43:23', '2022-07-20 20:43:23'),
(5472, 'en', 'upload zone', 'Share Link', 'Share Link', '2022-07-20 21:59:08', '2022-07-20 21:59:08'),
(5473, 'en', 'upload zone', 'Open Link', 'Open Link', '2022-07-20 21:59:20', '2022-07-20 21:59:20'),
(5474, 'en', 'upload zone', 'Storage provider error', 'Storage provider error', '2022-07-20 23:51:30', '2022-07-20 23:51:30'),
(5481, 'en', 'alerts', 'Unauthorized action', 'Unauthorized action', '2022-07-21 00:20:23', '2022-07-21 00:20:23'),
(5859, 'en', 'video password', 'Password', 'Password', '2022-10-12 16:19:21', '2022-10-12 16:19:21'),
(5860, 'en', 'video password', 'Enter the password to unlock the video', 'Enter the password to unlock the video', '2022-10-12 16:19:21', '2022-10-12 16:19:21'),
(5861, 'en', 'video password', 'Enter password', 'Enter password', '2022-10-12 16:19:21', '2022-10-12 16:19:21'),
(5862, 'en', 'video password', 'Unlock', 'Unlock', '2022-10-12 16:19:21', '2022-10-12 16:19:21'),
(5863, 'en', 'video password', 'Incorrect password', 'Incorrect password', '2022-10-12 16:19:33', '2022-10-12 16:19:33'),
(5864, 'en', 'video page', 'Watch', 'Watch', '2022-10-12 16:19:44', '2022-10-12 16:19:44'),
(5865, 'en', 'video page', 'Download', 'Download', '2022-10-12 16:25:12', '2022-10-12 16:25:12'),
(5866, 'en', 'video page', 'Share', 'Share', '2022-10-12 16:25:12', '2022-10-12 16:25:12'),
(5867, 'en', 'video page', 'Report', 'Report', '2022-10-12 16:28:20', '2022-10-12 16:28:20'),
(5868, 'en', 'video page', 'Share Link', 'Share Link', '2022-10-12 16:30:47', '2022-10-12 16:30:47'),
(5869, 'en', 'video page', 'Embed Code', 'Embed Code', '2022-10-12 16:31:48', '2022-10-12 16:31:48'),
(5870, 'en', 'video page', 'Copy', 'Copy', '2022-10-12 16:31:48', '2022-10-12 16:31:48'),
(5871, 'en', 'video page', 'Report this video', 'Report this video', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5872, 'en', 'video page', 'Name', 'Name', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5873, 'en', 'video page', 'Email', 'Email', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5874, 'en', 'video page', 'Reason for reporting', 'Reason for reporting', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5875, 'en', 'video page', 'Privacy, copyright or legal complaints', 'Privacy, copyright or legal complaints', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5876, 'en', 'video page', 'Spam or misleading', 'Spam or misleading', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5877, 'en', 'video page', 'Malware, virus or malicious content', 'Malware, virus or malicious content', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5878, 'en', 'video page', 'Child abuse', 'Child abuse', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5879, 'en', 'video page', 'Other', 'Other', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5880, 'en', 'video page', 'Details', 'Details', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5881, 'en', 'video page', 'Describe the reason why you reported the video to a maximum of 600 characters', 'Describe the reason why you reported the video to a maximum of 600 characters', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5882, 'en', 'video page', 'Send', 'Send', '2022-10-12 16:37:25', '2022-10-12 16:37:25'),
(5884, 'en', 'video page', 'Video not found, missing or expired', 'Video not found, missing or expired', '2022-10-12 16:47:51', '2022-10-12 16:47:51'),
(5885, 'en', 'video page', 'Invalid report reason', 'Invalid report reason', '2022-10-12 16:48:15', '2022-10-12 16:48:15'),
(5886, 'en', 'video page', 'Your report has been sent successfully, we will review and take the necessary action', 'Your report has been sent successfully, we will review and take the necessary action', '2022-10-12 16:48:31', '2022-10-12 16:48:31'),
(5887, 'en', 'video page', 'You have already reported this video', 'You have already reported this video', '2022-10-12 16:48:59', '2022-10-12 16:48:59'),
(5888, 'en', 'video page', 'Anonymous', 'Anonymous', '2022-10-12 16:59:14', '2022-10-12 16:59:14'),
(5889, 'en', 'video page', 'Latest blog posts', 'Latest blog posts', '2022-10-12 17:04:55', '2022-10-12 17:04:55'),
(5890, 'en', 'video page', 'View More', 'View More', '2022-10-12 17:08:24', '2022-10-12 17:08:24'),
(5892, 'en', 'user', 'My Videos', 'My Videos', '2022-10-12 18:12:44', '2022-10-12 18:12:44'),
(5893, 'en', 'dashboard', 'Dashboard', 'Dashboard', '2022-10-12 18:15:08', '2022-10-12 18:15:08'),
(5894, 'en', 'dashboard', 'Storage Space', 'Storage Space', '2022-10-12 18:15:50', '2022-10-12 18:15:50'),
(5895, 'en', 'dashboard', 'Total Videos', 'Total Videos', '2022-10-12 18:15:50', '2022-10-12 18:15:50'),
(5896, 'en', 'dashboard', 'Upload', 'Upload', '2022-10-12 18:15:51', '2022-10-12 18:15:51'),
(5897, 'en', 'videos', 'My Videos', 'My Videos', '2022-10-12 18:42:25', '2022-10-12 18:42:25'),
(5898, 'en', 'videos', 'Search...', 'Search...', '2022-10-12 19:20:59', '2022-10-12 19:20:59'),
(5899, 'en', 'videos', 'Select All', 'Select All', '2022-10-12 20:13:46', '2022-10-12 20:13:46'),
(5900, 'en', 'videos', 'Unselect All', 'Unselect All', '2022-10-12 20:13:47', '2022-10-12 20:13:47'),
(5901, 'en', 'videos', 'Delete all Selected', 'Delete all Selected', '2022-10-12 20:13:47', '2022-10-12 20:13:47');
INSERT INTO `translates` (`id`, `lang`, `group_name`, `key`, `value`, `created_at`, `updated_at`) VALUES
(5902, 'en', 'videos', 'Preview', 'Preview', '2022-10-12 20:17:24', '2022-10-12 20:17:24'),
(5903, 'en', 'videos', 'Edit details', 'Edit details', '2022-10-12 20:18:06', '2022-10-12 20:18:06'),
(5904, 'en', 'videos', 'Delete', 'Delete', '2022-10-12 20:18:06', '2022-10-12 20:18:06'),
(5905, 'en', 'videos', 'Deleted successfully', 'Deleted successfully', '2022-10-12 20:32:01', '2022-10-12 20:32:01'),
(5906, 'en', 'videos', 'Download', 'Download', '2022-10-12 20:34:47', '2022-10-12 20:34:47'),
(5907, 'en', 'alerts', 'There was a problem while trying to download the video', 'There was a problem while trying to download the video', '2022-10-12 20:40:07', '2022-10-12 20:40:07'),
(5908, 'en', 'videos', 'You have not selected any video', 'You have not selected any video', '2022-10-12 20:56:24', '2022-10-12 20:56:24'),
(5909, 'en', 'videos', 'Video not found, missing or expired please refresh the page and try again', 'Video not found, missing or expired please refresh the page and try again', '2022-10-12 20:56:49', '2022-10-12 20:56:49'),
(5910, 'en', 'videos', 'Share', 'Share', '2022-10-12 21:02:06', '2022-10-12 21:02:06'),
(5911, 'en', 'videos', 'Share this video', 'Share this video', '2022-10-12 21:10:38', '2022-10-12 21:10:38'),
(5912, 'en', 'videos', 'Share link', 'Share link', '2022-10-12 21:10:38', '2022-10-12 21:10:38'),
(5913, 'en', 'dashboard', 'Your upload statistics for current month', 'Your upload statistics for current month', '2022-10-12 21:38:32', '2022-10-12 21:38:32'),
(5914, 'en', 'videos', 'Video Name', 'Video Name', '2022-10-12 22:09:50', '2022-10-12 22:09:50'),
(5915, 'en', 'videos', 'Access status', 'Access status', '2022-10-12 22:09:50', '2022-10-12 22:09:50'),
(5916, 'en', 'videos', 'Public', 'Public', '2022-10-12 22:09:50', '2022-10-12 22:09:50'),
(5917, 'en', 'videos', 'Private', 'Private', '2022-10-12 22:09:50', '2022-10-12 22:09:50'),
(5918, 'en', 'videos', 'Video Password (Optional)', 'Video Password (Optional)', '2022-10-12 22:12:06', '2022-10-12 22:12:06'),
(5919, 'en', 'videos', 'Enter Password', 'Enter Password', '2022-10-12 22:12:06', '2022-10-12 22:12:06'),
(5920, 'en', 'videos', 'Leave password empty to remove it', 'Leave password empty to remove it', '2022-10-12 22:12:06', '2022-10-12 22:12:06'),
(5921, 'en', 'videos', 'Save changes', 'Save changes', '2022-10-12 22:12:06', '2022-10-12 22:12:06'),
(5922, 'en', 'videos', 'Updated successfully', 'Updated successfully', '2022-10-12 22:43:26', '2022-10-12 22:43:26'),
(5923, 'en', 'videos', 'Video protected by password', 'Video protected by password', '2022-10-12 22:43:56', '2022-10-12 22:43:56'),
(5924, 'en', 'video page', 'Videos with private access cannot be shared', 'Videos with private access cannot be shared', '2022-10-12 22:47:54', '2022-10-12 22:47:54'),
(5925, 'en', 'video page', 'Change access status', 'Change access status', '2022-10-12 22:51:17', '2022-10-12 22:51:17'),
(5927, 'en', 'general', 'No search results', 'No search results', '2022-10-12 23:35:43', '2022-10-12 23:35:43'),
(5928, 'en', 'general', 'You can’t always get what you want. It’s true in life, and it’s true on the web — sometimes, what you’re looking for just isn’t there.', 'You can’t always get what you want. It’s true in life, and it’s true on the web — sometimes, what you’re looking for just isn’t there.', '2022-10-12 23:35:43', '2022-10-12 23:35:43'),
(6695, 'en', 'videos', 'Embed code', 'Embed code', '2022-10-16 10:52:22', '2022-10-16 10:52:22'),
(6696, 'en', 'videos', 'Copy', 'Copy', '2022-10-16 10:52:22', '2022-10-16 10:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `upload_settings`
--

CREATE TABLE `upload_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_space` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files_duration` bigint(20) DEFAULT NULL,
  `upload_at_once` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_protection` tinyint(1) NOT NULL COMMENT '0:No 1:Yes',
  `allow_downloading` tinyint(1) NOT NULL DEFAULT 0,
  `advertisements` tinyint(1) NOT NULL COMMENT '0:No 1:Yes',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_settings`
--

INSERT INTO `upload_settings` (`id`, `name`, `symbol`, `icon`, `storage_space`, `file_size`, `files_duration`, `upload_at_once`, `password_protection`, `allow_downloading`, `advertisements`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Guests Uploads', 'guests', 'images/settings/guests.png', '1073741824', '1073741824', 1, '2', 1, 0, 1, 0, '2022-07-05 18:32:16', '2022-10-17 11:27:33'),
(2, 'Users Uploads', 'users', 'images/settings/users.png', NULL, NULL, NULL, '10', 1, 1, 0, 1, '2022-07-05 18:32:16', '2022-10-17 11:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `google2fa_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Disabled, 1: Active',
  `google2fa_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: Banned, 1: Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_has_viewed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 : Unread 1: Read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additionals`
--
ALTER TABLE `additionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_articles_slug_unique` (`slug`),
  ADD KEY `blog_articles_category_id_foreign` (`category_id`),
  ADD KEY `blog_articles_admin_id_foreign` (`admin_id`),
  ADD KEY `blog_articles_lang_foreign` (`lang`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  ADD KEY `blog_categories_lang_foreign` (`lang`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`),
  ADD KEY `blog_comments_article_id_foreign` (`article_id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_lang_foreign` (`lang`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_lang_foreign` (`lang`);

--
-- Indexes for table `file_entries`
--
ALTER TABLE `file_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_entries_shared_id_unique` (`shared_id`),
  ADD KEY `file_entries_user_id_foreign` (`user_id`),
  ADD KEY `file_entries_storage_provider_id_foreign` (`storage_provider_id`);

--
-- Indexes for table `file_reports`
--
ALTER TABLE `file_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_reports_file_entry_id_foreign` (`file_entry_id`);

--
-- Indexes for table `footer_menu`
--
ALTER TABLE `footer_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_menu_lang_foreign` (`lang`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_templates_lang_foreign` (`lang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar_menu`
--
ALTER TABLE `navbar_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `navbar_menu_lang_foreign` (`lang`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_page_slug_unique` (`slug`),
  ADD KEY `pages_lang_foreign` (`lang`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seo_configurations`
--
ALTER TABLE `seo_configurations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seo_configurations_lang_unique` (`lang`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_providers_user_id_foreign` (`user_id`);

--
-- Indexes for table `storage_providers`
--
ALTER TABLE `storage_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translates`
--
ALTER TABLE `translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translates_lang_foreign` (`lang`);

--
-- Indexes for table `upload_settings`
--
ALTER TABLE `upload_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notifications_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additionals`
--
ALTER TABLE `additionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_entries`
--
ALTER TABLE `file_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_reports`
--
ALTER TABLE `file_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_menu`
--
ALTER TABLE `footer_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `navbar_menu`
--
ALTER TABLE `navbar_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_configurations`
--
ALTER TABLE `seo_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016;

--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage_providers`
--
ALTER TABLE `storage_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `translates`
--
ALTER TABLE `translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7081;

--
-- AUTO_INCREMENT for table `upload_settings`
--
ALTER TABLE `upload_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD CONSTRAINT `blog_articles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_articles_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `blog_articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `file_entries`
--
ALTER TABLE `file_entries`
  ADD CONSTRAINT `file_entries_storage_provider_id_foreign` FOREIGN KEY (`storage_provider_id`) REFERENCES `storage_providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_entries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_reports`
--
ALTER TABLE `file_reports`
  ADD CONSTRAINT `file_reports_file_entry_id_foreign` FOREIGN KEY (`file_entry_id`) REFERENCES `file_entries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `footer_menu`
--
ALTER TABLE `footer_menu`
  ADD CONSTRAINT `footer_menu_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD CONSTRAINT `mail_templates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `navbar_menu`
--
ALTER TABLE `navbar_menu`
  ADD CONSTRAINT `navbar_menu_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `seo_configurations`
--
ALTER TABLE `seo_configurations`
  ADD CONSTRAINT `seo_configurations_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD CONSTRAINT `social_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `translates`
--
ALTER TABLE `translates`
  ADD CONSTRAINT `translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
