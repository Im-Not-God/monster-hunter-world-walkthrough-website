-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-04-14 13:44:51
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
-- 数据库： `test_awad`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `mac_address` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name`, `email`, `password`, `remember_token`, `mac_address`) VALUES
(1, 2, 'Chong Yao Jun', 'yaojun12345678910@gmail.com', '$2y$10$jEd.UBPjLjQN5I2eY6nN9e2lg0542dPdXVtJzZ3zCrGcKEO3sa71K', NULL, '00-50-56-C0-00-08');

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
  `content` text,
  `post_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `view`, `like`, `state`) VALUES
(1, 3, 'How to attack monster', 'hellllllloooo', '2023-02-02 03:27:44', NULL, NULL, 1),
(2, 2, 'testing', NULL, '2023-04-02 05:11:03', NULL, NULL, 1),
(3, 2, 'nihao', 'hihihihihi', '2023-04-14 16:33:23', NULL, NULL, 1),
(4, 3, 'te12345678', NULL, '2023-04-14 17:35:46', NULL, NULL, 0);

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
(1, 'test', 'test@gmail.com', '$2a$10$IXp6TiwumAw0d5hdnaMOE.6Vj3AL8mT2ai0gzwJeAErF9xNCv97j2', 'user', '', NULL, '2023-03-30 00:38:34'),
(2, 'Chong Yao Jun', 'yaojun12345678910@gmail.com', '$2y$10$jEd.UBPjLjQN5I2eY6nN9e2lg0542dPdXVtJzZ3zCrGcKEO3sa71K', 'author', '00-50-56-C0-00-08', NULL, '2023-04-01 02:29:25'),
(3, 'test', 'mhw.laravel.mail@gmail.com', '$2y$10$KQCQFpzGNbs2FZb6rm.gEufG.TpAMQQ4E0EXIqtB9a9K7MaiDNuNK', 'author', '', 'OukuyN3Wq0a8MoigkeolkJwz6xnWdO63AEUcjqtzn8gvtjrr2aPHERis6CWt', '2023-04-01 02:57:53'),
(4, 'user1', 'user1@gmail.com', '$2y$10$qLrtZm8A2Ba9RYyX0mbTM.907KH5AkraZy1MDzC5Lv1rkI62Wfm6q', 'user', '', NULL, '2023-04-02 05:14:48'),
(5, 'testMac', 'testmac@gmail.com', '$2y$10$NT7QSVjwleW8It7/.PvsSehctpgQFlhkPIw1Djeo63SisQd3qu/2.', 'user', '00-50-56-C0-00-08', NULL, '2023-04-03 22:27:29'),
(6, 'test', 'test2@gmail.com', '$2y$10$nf2eNj9trant3RkhZPSrn.PfTiw0jGysom3izafVnJfqzWUxH21Bu', 'user', '00-50-56-C0-00-08', NULL, '2023-04-14 19:03:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
