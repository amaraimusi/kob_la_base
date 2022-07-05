-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-07-05 09:56:40
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `kob_la_base`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_01_233041_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
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
-- テーブルの構造 `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'ユーザー名/アカウント名',
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'メールアドレス',
  `email_verified_at` timestamp NULL DEFAULT NULL COMMENT 'Eメール検証済時刻(Laravel内部処理用)',
  `nickname` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '名前',
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL COMMENT 'パスワード',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '維持用トークン(Laravel内部処理用)',
  `role` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '権限',
  `temp_hash` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '仮登録ハッシュコード(Laravel内部処理用)',
  `temp_datetime` datetime DEFAULT NULL COMMENT '仮登録制限時刻(Laravel内部処理用)',
  `sort_no` int(11) DEFAULT 0 COMMENT '順番',
  `delete_flg` tinyint(1) DEFAULT 0 COMMENT '削除フラグ',
  `update_user` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '更新ユーザー',
  `ip_addr` varchar(40) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '更新IPアドレス',
  `created_at` datetime DEFAULT NULL COMMENT '生成日時B',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時B'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `nickname`, `password`, `remember_token`, `role`, `temp_hash`, `temp_datetime`, `sort_no`, `delete_flg`, `update_user`, `ip_addr`, `created_at`, `updated_at`) VALUES
(1, 'sample_user', 'hoge@example.com', NULL, '見本ユーザー1', '', NULL, 'oparator', NULL, '2022-06-03 16:35:34', 0, 0, 'kenji uehara', NULL, '2022-06-03 16:35:34', '2022-06-03 16:35:34'),
(2, 'master2207', 'none', NULL, 'GM', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'master', NULL, NULL, 0, 0, 'kenji uehara', 'manual input', NULL, NULL),
(100, 'himiko', 'himiko@example.com', NULL, '卑弥呼', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', 'trfAX2b5xTFYpA6oWyaURBySWKpXZkb8ueEzKkp88iTCqJBSnGWjJnfYn90e', 'admin', '', '0000-00-00 00:00:00', 100, 0, 'himiko@example.com', '::1', NULL, NULL),
(101, 'yamatotakeru@example.com', 'yamatotakeru@example.com', NULL, 'ヤマトタケル', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'admin', '', '0000-00-00 00:00:00', 101, 0, 'test', 'test', NULL, NULL),
(102, 'ni_n_toku_tennou@example.com', 'ni_n_toku_tennou@example.com', NULL, '仁徳天皇', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'admin', '', '0000-00-00 00:00:00', 102, 0, 'test', 'test', NULL, NULL),
(103, 'sogano_umako@example.com', 'sogano_umako@example.com', NULL, '蘇我馬子', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'admin', '', '0000-00-00 00:00:00', 103, 0, 'test', 'test', NULL, NULL),
(104, 'syoutokutaisi@example.com', 'syoutokutaisi@example.com', NULL, '聖徳太子', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'admin', '', '0000-00-00 00:00:00', 104, 0, 'test', 'test', NULL, NULL),
(105, 'ono_no_imoko@example.com', 'ono_no_imoko@example.com', NULL, '小野妹子', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'admin', '', '0000-00-00 00:00:00', 105, 0, 'test', 'test', NULL, NULL),
(106, 'sogano_iru_ka@example.com', 'sogano_iru_ka@example.com', NULL, '蘇我入鹿', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'admin', '', '0000-00-00 00:00:00', 106, 0, 'test', 'test', NULL, NULL),
(107, 'naka_no_ooe_no_ouzi@example.com', 'naka_no_ooe_no_ouzi@example.com', NULL, '中大兄皇子', '$2y$10$VNN0IjxbI5MWveDg5G0//uyEzJ/OTH.Y4CG/iazqd82SeBKpu9HF2', NULL, 'admin', '', '0000-00-00 00:00:00', 107, 0, 'test', 'test', NULL, NULL),
(1005, 'Kenji Uehara', 'amaraimusi@gmail.com', NULL, NULL, '$2y$10$iMQc.K.fkthqJfpy65HJjO2WxB8jL3eLV.34jAQu02Ocq1qjcsDZe', NULL, 'admin', NULL, NULL, 0, 0, NULL, NULL, '2022-07-03 23:07:37', '2022-07-03 23:07:37');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
