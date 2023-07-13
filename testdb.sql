-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 13 日 16:04
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `testdb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `benchmarks`
--

CREATE TABLE `benchmarks` (
  `id` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `system` varchar(255) NOT NULL,
  `single` int(12) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `benchmarks`
--

INSERT INTO `benchmarks` (`id`, `platform`, `cpu`, `system`, `single`, `date`) VALUES
(1, 'Windows 23', 'AMD Ryzen Threadripper PRO 5995WX', 'G&#039;s System', 9888, '2023-07-13 22:39:42'),
(28, 'Web', 'Unknown', 'Unknown', 1088, '2023-07-13 21:52:36'),
(29, 'Web', 'Unknown', 'Unknown', 1131, '2023-07-13 21:54:09'),
(30, 'Web', 'Unknown', 'Unknown', 1163, '2023-07-13 22:23:05'),
(31, 'Web', 'Unknown', 'Unknown', 1163, '2023-07-13 22:27:58'),
(32, 'Web', 'Unknown', 'Unknown', 1104, '2023-07-13 22:28:20'),
(33, 'Web', 'Unknown', 'Unknown', 1088, '2023-07-13 22:39:53'),
(34, 'Web', 'Unknown', 'Unknown', 1128, '2023-07-13 22:53:30');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, '管理者', 'test1', 'test1', 1, 0),
(2, '一般1', 'test2', 'test2', 0, 0),
(3, '一般2', 'test3', 'test3', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `benchmarks`
--
ALTER TABLE `benchmarks`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `benchmarks`
--
ALTER TABLE `benchmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
