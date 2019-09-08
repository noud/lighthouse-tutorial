-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Sep 07, 2019 at 06:49 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schema-builder`
--

--
-- Dumping data for table `cover_image`
--

INSERT INTO `cover_image` (`id`, `handle`) VALUES
(1, 'image1.jpg');

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `slug`, `cover_image_id`, `created_at`, `updated_at`) VALUES
(6, 11, 'title 1', 'content 1', 'slug-1', 1, NULL, NULL),
(7, 11, 'title 2', 'content 2', 'slug-2', 1, NULL, NULL);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Larissa Wyman', 'ransom52@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'SozZLUoSQz', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(12, 'Ms. Glenda Zulauf', 'terence.dubuque@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'XEexFPjYoU', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(13, 'Ernesto Welch', 'dameon54@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'SOEYMtqyCD', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(14, 'Hannah Spencer V', 'velva86@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'yQcz4tVxxI', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(15, 'Cora Schoen', 'welch.kylie@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'qawK6BPHlP', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(16, 'Annetta Rowe', 'kuphal.matteo@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'pcsiiZWNjD', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(17, 'Jerad Emmerich', 'lgoyette@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '3JnMkGbnzF', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(18, 'Abdullah Smith', 'steve.wiegand@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Bn2tGlurcB', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(19, 'Damien Stanton', 'mathew.flatley@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '8T5J8XRtVD', '2019-09-07 18:03:01', '2019-09-07 18:03:01'),
(20, 'Maxine Mayert', 'adelle03@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'I4IKWEPnVI', '2019-09-07 18:03:01', '2019-09-07 18:03:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
