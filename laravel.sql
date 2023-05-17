-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-04-17 13:47:01
-- 服务器版本： 5.7.36
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `laravel`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `mac_address` varchar(17) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name`, `email`, `password`, `remember_token`, `mac_address`, `created_at`, `updated_at`) VALUES
(2, 2, 'Chong Yao Jun', 'yaojun12345678910@gmail.com', '$2y$10$jEd.UBPjLjQN5I2eY6nN9e2lg0542dPdXVtJzZ3zCrGcKEO3sa71K', NULL, '00-50-56-C0-00-08', NULL, NULL),
(5, 5, 'testMac', 'testmac@gmail.com', '$2y$10$NT7QSVjwleW8It7/.PvsSehctpgQFlhkPIw1Djeo63SisQd3qu/2.', NULL, '01-50-56-C0-00-08', '2023-04-14 21:09:09', '2023-04-14 21:09:09');

-- --------------------------------------------------------

--
-- 表的结构 `author_registers`
--

DROP TABLE IF EXISTS `author_registers`;
CREATE TABLE IF NOT EXISTS `author_registers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `post_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Good post', 2, '2023-04-16 15:27:39', NULL),
(2, 1, 'Hahaha', 2, '2023-04-16 15:31:08', NULL),
(3, 1, 'hello', 1, '2023-04-16 10:06:12', '2023-04-16 10:06:12'),
(4, 1, 'hello again', 1, '2023-04-16 10:06:55', '2023-04-16 10:06:55'),
(5, 2, 'i am author', 2, '2023-04-16 10:25:08', '2023-04-16 10:25:08'),
(6, 2, 'test\r\n        ahhhh', 2, '2023-04-16 10:30:26', '2023-04-16 10:30:26');

-- --------------------------------------------------------

--
-- 表的结构 `delete_posts`
--

DROP TABLE IF EXISTS `delete_posts`;
CREATE TABLE IF NOT EXISTS `delete_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('owner@gmail.com', '$2y$10$FuEpVTRbOPrLbM5GUwMpWOFmoRgCN599YjBBTBA8ofV701/KSdIVi', '2023-03-31 10:39:46'),
('mhw.laravel.mail@gmail.com', '$2y$10$9x.zTYKCJFg3v.ZWfflBEuYVePiqaL.oTF6bmkWAVzpWESc4CH5ga', '2023-04-11 06:49:30'),
('yaojun12345678910@gmail.com', '$2y$10$6yl4tdPOB/3K8.9Brk0vzerJd7yV8bagLs85cjgPik.60qcezP6/a', '2023-04-11 06:51:29');

-- --------------------------------------------------------

--
-- 表的结构 `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL DEFAULT '0',
  `like` int(11) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `view`, `like`, `state`) VALUES
(1, 3, 'attack on lol 3', 'hellllllloooo', '2023-02-02 03:27:44', 6, NULL, 1),
(2, 2, 'testing', 'This is a post', '2023-04-02 05:11:03', 0, NULL, 1),
(3, 2, 'nihao', 'hihihihihi', '2023-04-14 16:33:23', 1, NULL, 1),
(4, 3, 'te12345678', NULL, '2023-04-14 17:35:46', 0, NULL, 0),
(5, 1, 'test tintmce', '<p><strong><span style=\"text-decoration: underline;\">testing</span></strong></p>\r\n<p>This is a guid<span style=\"background-color: rgb(45, 194, 107);\">e post</span> for mhw</p>\r\n<p>mhw is <s><strong>beautiful word</strong></s></p>', '2023-04-16 23:27:54', 7, NULL, 1),
(7, 1, 'test tinymce', '<p><img src=\"https://images5.alphacoders.com/899/899897.jpg\" alt=\"\" width=\"269\" height=\"151\"></p>', '2023-04-17 02:16:07', 1, NULL, 1),
(13, 1, 'haha', '<p>🤠</p>', '2023-04-17 05:53:51', 0, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','author','super user') NOT NULL DEFAULT 'user',
  `mac_address` varchar(17) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `mac_address`, `remember_token`, `created_at`) VALUES
(1, 'test', 'test@gmail.com', '$2a$10$IXp6TiwumAw0d5hdnaMOE.6Vj3AL8mT2ai0gzwJeAErF9xNCv97j2', 'author', '00-50-56-C0-00-08', NULL, '2023-03-30 00:38:34'),
(2, 'Chong Yao Jun', 'yaojun12345678910@gmail.com', '$2y$10$jEd.UBPjLjQN5I2eY6nN9e2lg0542dPdXVtJzZ3zCrGcKEO3sa71K', 'user', '00-50-56-C0-00-08', NULL, '2023-04-01 02:29:25'),
(4, 'user1', 'user1@gmail.com', '$2y$10$qLrtZm8A2Ba9RYyX0mbTM.907KH5AkraZy1MDzC5Lv1rkI62Wfm6q', 'user', '', NULL, '2023-04-02 05:14:48'),
(6, 'test', 'test2@gmail.com', '$2y$10$nf2eNj9trant3RkhZPSrn.PfTiw0jGysom3izafVnJfqzWUxH21Bu', 'author', '00-50-56-C0-00-08', NULL, '2023-04-14 19:03:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
