-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2019 lúc 12:21 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_new_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `charge_id` bigint(20) NOT NULL,
  `test` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `capped_amount` decimal(8,2) DEFAULT NULL,
  `trial_days` int(11) DEFAULT NULL,
  `billing_on` timestamp NULL DEFAULT NULL,
  `activated_on` timestamp NULL DEFAULT NULL,
  `trial_ends_on` timestamp NULL DEFAULT NULL,
  `cancelled_on` timestamp NULL DEFAULT NULL,
  `expires_on` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_charge` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contrasts`
--

CREATE TABLE `contrasts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contrasts`
--

INSERT INTO `contrasts` (`id`, `color`, `background`, `created_at`, `updated_at`) VALUES
(1, 'null', 'null', NULL, NULL),
(2, '#000000', '#fff', NULL, NULL),
(3, '#b33016', '#fff', NULL, NULL),
(4, '#0a5e82', '#fff', NULL, NULL),
(5, '#1e6c13', '#fff', NULL, NULL),
(6, '#fff', '#1e6c13', NULL, NULL),
(7, '#ffffff', '#0a5e82', NULL, NULL),
(8, '#ffffff', '#b33016', NULL, NULL),
(9, '#000000', '#c3bfb8', NULL, NULL),
(10, '#aba7a1', '#000000', NULL, NULL),
(11, '#fff', '#000000', NULL, NULL),
(12, '#000000', '#3fe32a', NULL, NULL),
(13, '#000000', '#18a9eb', NULL, NULL),
(14, '#000000', '#f2421e', NULL, NULL),
(15, '#ffffff', '#4a54f3', NULL, NULL),
(16, '#f2421e', '#000000', NULL, NULL),
(17, '#18a9eb', '#000000', NULL, NULL),
(18, '#3fe32a', '#000000', NULL, NULL),
(19, '#000000', '#f22aa9', NULL, NULL),
(20, '#fff630', '#000000', NULL, NULL),
(21, '#000000', '#fff630', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fonts`
--

CREATE TABLE `fonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_face` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fonts`
--

INSERT INTO `fonts` (`id`, `name`, `url`, `font_face`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'null', 'readable-fonts-default', NULL, NULL),
(2, 'VerDana', 'null', 'readable-fonts-verdana', NULL, NULL),
(3, 'Arial', 'null', 'readable-fonts-arial', NULL, NULL),
(4, 'Tohoma', 'null', 'readable-fonts-tohoma', NULL, NULL),
(5, 'Comic Sans MS', 'null', 'readable-fonts-comic-sans-ms', NULL, NULL),
(6, 'Open Sans', 'null', 'readable-fonts-open-sans', NULL, NULL),
(7, 'Roboto', 'null', 'readable-fonts-roboto', NULL, NULL),
(8, 'Helvetica', 'null', 'readable-fonts-helvetica', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `profile_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Readable Text', NULL, NULL),
(2, 1, 'Change Font', NULL, NULL),
(3, 1, 'Color More', NULL, NULL),
(4, 1, 'Highlight', NULL, NULL),
(5, 1, 'Ship Link', NULL, NULL),
(6, 1, 'Screen Settings', NULL, NULL),
(7, 1, 'Zoom', NULL, NULL),
(8, 1, 'Contrast', NULL, NULL),
(9, 1, 'Tool Tip', NULL, NULL),
(10, 1, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_07_07_171903_create_shops_table', 1),
(2, '2018_01_23_153809_add_billing_to_shops_table', 1),
(3, '2018_06_03_184733_add_soft_delete_to_shops_table', 1),
(4, '2018_06_03_185902_create_charges_table', 1),
(5, '2018_06_03_190233_remove_charge_id_from_shops_table', 1),
(6, '2018_08_16_123209_modify_charge_id_type', 1),
(7, '2018_08_30_114021_add_namespace_to_shops_table', 1),
(8, '2018_08_31_153154_create_plans_table', 1),
(9, '2018_08_31_154001_add_plan_to_shops_table_and_charges_table', 1),
(10, '2018_08_31_154502_add_freemium_flag_to_shops_table', 1),
(11, '2018_09_11_101333_add_usage_charge_support_to_charges_table', 1),
(12, '2018_09_12_101645_add_default_to_test_on_charges_table', 1),
(13, '2019_06_20_091212_add_charges_table_expires_on', 1),
(14, '2019_10_18_072130_add_table_profile', 1),
(15, '2019_10_18_082241_add_table_settings', 1),
(16, '2019_10_18_083443_add_table_menu', 1),
(17, '2019_10_18_090124_add_table_contrast', 1),
(18, '2019_10_18_090856_add_table_font', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `capped_amount` decimal(8,2) DEFAULT NULL,
  `terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_days` int(11) DEFAULT NULL,
  `test` tinyint(1) NOT NULL DEFAULT '0',
  `on_install` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `profile`
--

INSERT INTO `profile` (`id`, `name`, `image`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Elderly', 'ederly.png', 'elderly', NULL, NULL),
(2, 'Situational', 'situational.png', 'elderly', NULL, NULL),
(3, 'Dyslexia', 'dyslexia.png', 'elderly', NULL, NULL),
(4, 'Mobility Impaired', 'mobility_impaired.png', 'elderly', NULL, NULL),
(5, 'Visually Impaired', 'visually_impaired.png', 'elderly', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `shopify_domain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopify_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grandfathered` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `namespace` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int(10) UNSIGNED DEFAULT NULL,
  `freemium` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shops`
--

INSERT INTO `shops` (`id`, `shopify_domain`, `shopify_token`, `created_at`, `updated_at`, `grandfathered`, `deleted_at`, `namespace`, `plan_id`, `freemium`) VALUES
(1, 'kem-test-app.myshopify.com', 'b84bcc06c383fca7886dc9727636619a', '2019-10-21 06:47:09', '2019-10-23 23:43:21', 0, NULL, NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charges_charge_id_unique` (`charge_id`),
  ADD KEY `charges_shop_id_foreign` (`shop_id`),
  ADD KEY `charges_plan_id_foreign` (`plan_id`),
  ADD KEY `charges_reference_charge_foreign` (`reference_charge`);

--
-- Chỉ mục cho bảng `contrasts`
--
ALTER TABLE `contrasts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_plan_id_foreign` (`plan_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contrasts`
--
ALTER TABLE `contrasts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `charges_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `charges_reference_charge_foreign` FOREIGN KEY (`reference_charge`) REFERENCES `charges` (`charge_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `charges_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
