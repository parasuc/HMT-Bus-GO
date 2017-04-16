-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-16 17:43:43
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scaubus`
--

-- --------------------------------------------------------

--
-- 表的结构 `bus_keywords`
--

CREATE TABLE `bus_keywords` (
  `key_id` int(10) UNSIGNED NOT NULL,
  `key_name` text NOT NULL,
  `line_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bus_keywords`
--

INSERT INTO `bus_keywords` (`key_id`, `key_name`, `line_id`) VALUES
(1, '校巴1号线-工程学院开往荷园', 1),
(2, '校巴1号线-开往荷园(请改用工程学院开往荷园线)', 1),
(3, '校巴1号线-开往荷园（已过期）', 1),
(4, '校巴1号线-荷园开往工程学院', 2),
(5, '校巴1号线-开往西园(请改用荷园开往工程学院线)', 2),
(6, '校巴1号线-开往西园（已过期）', 2),
(7, '校巴2号线-开往荷园', 3),
(8, '校巴2号线-开往正门', 4);

-- --------------------------------------------------------

--
-- 表的结构 `bus_line`
--

CREATE TABLE `bus_line` (
  `line_id` int(10) UNSIGNED NOT NULL,
  `line_name` varchar(50) NOT NULL,
  `first_bus` char(5) NOT NULL,
  `last_bus` char(5) NOT NULL,
  `line_start` varchar(30) NOT NULL,
  `line_end` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bus_line`
--

INSERT INTO `bus_line` (`line_id`, `line_name`, `first_bus`, `last_bus`, `line_start`, `line_end`) VALUES
(1, '1号线', '07:10', '22:00', '工程学院', '荷园'),
(2, '1号线', '07:10', '22:00', '荷园', '工程学院'),
(3, '2号线', '07:20', '22:00', '正门(地铁站)', '荷园'),
(4, '2号线', '07:20', '22:00', '荷园', '正门(地铁站)'),
(5, '3号线', '07:40', '18:00', '正门(地铁站)', '茶山广场'),
(6, '3号线', '07:40', '18:00', '茶山广场', '正门(地铁站)');

-- --------------------------------------------------------

--
-- 表的结构 `bus_realtime_cache`
--

CREATE TABLE `bus_realtime_cache` (
  `cache_data` text NOT NULL,
  `cache_expires` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bus_realtime_cache`
--

INSERT INTO `bus_realtime_cache` (`cache_data`, `cache_expires`) VALUES
('{}', 0);

-- --------------------------------------------------------

--
-- 表的结构 `bus_relationship`
--

CREATE TABLE `bus_relationship` (
  `line_id` int(10) UNSIGNED NOT NULL,
  `stop_id` int(10) UNSIGNED NOT NULL,
  `stop_sort` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bus_relationship`
--

INSERT INTO `bus_relationship` (`line_id`, `stop_id`, `stop_sort`) VALUES
(1, 2, 1),
(1, 3, 2),
(1, 4, 3),
(1, 5, 4),
(1, 6, 5),
(1, 7, 6),
(1, 8, 7),
(1, 9, 8),
(1, 10, 9),
(1, 11, 10),
(1, 12, 11),
(2, 12, 1),
(2, 11, 2),
(2, 10, 3),
(2, 9, 4),
(2, 8, 5),
(2, 7, 6),
(2, 6, 7),
(2, 5, 8),
(2, 4, 9),
(2, 3, 10),
(2, 2, 11),
(3, 15, 1),
(3, 7, 2),
(3, 16, 3),
(3, 12, 4),
(4, 12, 1),
(4, 13, 2),
(4, 14, 3),
(4, 21, 4),
(4, 15, 5),
(5, 15, 1),
(5, 6, 2),
(5, 14, 3),
(5, 13, 4),
(5, 18, 5),
(5, 19, 6),
(5, 20, 7),
(6, 20, 1),
(6, 19, 2),
(6, 18, 3),
(6, 13, 4),
(6, 14, 5),
(6, 6, 6),
(6, 15, 7);

-- --------------------------------------------------------

--
-- 表的结构 `bus_stop`
--

CREATE TABLE `bus_stop` (
  `stop_id` int(10) UNSIGNED NOT NULL,
  `stop_name` varchar(50) NOT NULL,
  `stop_lng` varchar(50) DEFAULT NULL,
  `stop_lat` varchar(50) DEFAULT NULL,
  `stop_alias` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bus_stop`
--

INSERT INTO `bus_stop` (`stop_id`, `stop_name`, `stop_lng`, `stop_lat`, `stop_alias`) VALUES
(2, '工程学院', '113.346420', '23.158993', '工程学院'),
(3, '新学活', '113.348923', '23.158928', '新学活'),
(4, '教三', '113.351593', '23.158581', '教三,第三教学楼'),
(5, '艺术学院', '113.352859', '23.159170', '艺术学院'),
(6, '三角市', '113.354431', '23.157921', '三角市'),
(7, '湿地公园', '113.355492', '23.154619', '湿地公园'),
(8, '经管学院', '113.357315', '23.153025', '经管学院'),
(9, '教四', '113.366455', '23.152660', '教四,第四教学楼'),
(10, '五山公寓', '113.368843', '23.151619', '五山公寓,五山学生公寓'),
(11, '公寓东', '113.370682', '23.153440', '公寓东'),
(12, '荷园', '113.368187', '23.160444', '荷园,荷园站'),
(13, '农学院', '113.358925', '23.159908', '农学院'),
(14, '嵩山42栋', '113.356049', '23.159607', '嵩山42栋,钢铁研究所'),
(15, '正门(地铁站)', '113.351753', '23.153131', '正门,正门(地铁站)'),
(16, '生命科学院', '113.359810', '23.159502', '生命科学院'),
(18, '嵩山旧197', '113.358376', '23.157621', '嵩山旧197'),
(19, '校医院东门', '113.357071', '23.156136', '校医院东门'),
(20, '茶山广场', '113.357201', '23.152004', '茶山广场'),
(21, '艺术学院(教三)', NULL, NULL, '艺术学院,教三,第三教学楼');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_keywords`
--
ALTER TABLE `bus_keywords`
  ADD PRIMARY KEY (`key_id`),
  ADD KEY `line_id` (`line_id`);

--
-- Indexes for table `bus_line`
--
ALTER TABLE `bus_line`
  ADD PRIMARY KEY (`line_id`),
  ADD KEY `line_start` (`line_start`),
  ADD KEY `line_end` (`line_end`);

--
-- Indexes for table `bus_relationship`
--
ALTER TABLE `bus_relationship`
  ADD KEY `line_id` (`line_id`),
  ADD KEY `stop_id` (`stop_id`),
  ADD KEY `stop_sort` (`stop_sort`);

--
-- Indexes for table `bus_stop`
--
ALTER TABLE `bus_stop`
  ADD PRIMARY KEY (`stop_id`);
ALTER TABLE `bus_stop` ADD FULLTEXT KEY `stop_name` (`stop_name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bus_keywords`
--
ALTER TABLE `bus_keywords`
  MODIFY `key_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `bus_line`
--
ALTER TABLE `bus_line`
  MODIFY `line_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `bus_stop`
--
ALTER TABLE `bus_stop`
  MODIFY `stop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
