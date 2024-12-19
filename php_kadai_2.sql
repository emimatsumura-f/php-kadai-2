-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 12 月 19 日 14:03
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
-- データベース: `php_kadai_2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `question1` varchar(50) NOT NULL,
  `question2` varchar(50) NOT NULL,
  `question3` varchar(50) NOT NULL,
  `question4` varchar(50) NOT NULL,
  `question5` varchar(50) NOT NULL,
  `textarea` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `answer`
--

INSERT INTO `answer` (`id`, `name`, `question1`, `question2`, `question3`, `question4`, `question5`, `textarea`) VALUES
(1, 'test', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', NULL),
(2, '大象一郎', 'answer1', 'answer1', 'answer1', 'answer3', 'answer3', '新しいスポーツをはじめたい'),
(4, '大象次郎', 'answer2', 'answer3', 'answer2', 'answer2', 'answer2', 'デクスチェア購入費用の補助とかどうでしょう。'),
(5, '大象三郎', 'answer3', 'answer3', 'answer3', 'answer1', 'answer1', '特になし'),
(6, '大象春子', 'answer3', 'answer3', 'answer2', 'answer2', 'answer2', 'ジムに行きたいです');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
