-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2017 年 04 月 07 日 16:58
-- 服务器版本: 5.6.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_xiaoba`
--

-- --------------------------------------------------------

--
-- 表的结构 `bus_keywords`
--

CREATE TABLE IF NOT EXISTS `bus_keywords` (
  `key_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key_name` text NOT NULL,
  `line_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`key_id`),
  KEY `line_id` (`line_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `bus_line` (
  `line_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `line_name` varchar(50) NOT NULL,
  `first_bus` char(5) NOT NULL,
  `last_bus` char(5) NOT NULL,
  `line_start` varchar(30) NOT NULL,
  `line_end` varchar(30) NOT NULL,
  PRIMARY KEY (`line_id`),
  KEY `line_start` (`line_start`),
  KEY `line_end` (`line_end`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

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
-- 表的结构 `bus_relationship`
--

CREATE TABLE IF NOT EXISTS `bus_relationship` (
  `line_id` int(10) unsigned NOT NULL,
  `stop_id` int(10) unsigned NOT NULL,
  `stop_sort` int(10) unsigned NOT NULL,
  KEY `line_id` (`line_id`),
  KEY `stop_id` (`stop_id`),
  KEY `stop_sort` (`stop_sort`)
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
(4, 5, 4),
(4, 15, 5),
(5, 15, 1),
(5, 6, 2),
(5, 17, 3),
(5, 14, 4),
(5, 13, 5),
(5, 18, 6),
(5, 19, 7),
(5, 20, 8),
(6, 20, 1),
(6, 19, 2),
(6, 18, 3),
(6, 13, 4),
(6, 14, 5),
(6, 17, 6),
(6, 6, 7),
(6, 15, 8);

-- --------------------------------------------------------

--
-- 表的结构 `bus_stop`
--

CREATE TABLE IF NOT EXISTS `bus_stop` (
  `stop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stop_name` varchar(50) NOT NULL,
  `stop_lng` varchar(50) DEFAULT NULL,
  `stop_lat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`stop_id`),
  FULLTEXT KEY `stop_name` (`stop_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `bus_stop`
--

INSERT INTO `bus_stop` (`stop_id`, `stop_name`, `stop_lng`, `stop_lat`) VALUES
(2, '工程学院', '113.346420', '23.158993'),
(3, '新学活', '113.348923', '23.158928'),
(4, '教三', '113.351593', '23.158581'),
(5, '艺术学院', '113.352859', '23.159170'),
(6, '三角市', '113.354431', '23.157921'),
(7, '湿地公园', '113.355492', '23.154619'),
(8, '经管学院', '113.357315', '23.153025'),
(9, '教四', '113.366455', '23.152660'),
(10, '五山公寓', '113.368843', '23.151619'),
(11, '公寓东', '113.370682', '23.153440'),
(12, '荷园', '113.368187', '23.160444'),
(13, '农学院', '113.358925', '23.159908'),
(14, '嵩山42栋', '113.356049', '23.159607'),
(15, '正门(地铁站)', '113.351753', '23.153131'),
(16, '生命科学院', '113.359810', '23.159502'),
(17, '旧保卫处', NULL, NULL),
(18, '嵩山旧197', '113.358376', '23.157621'),
(19, '校医院东门', '113.357071', '23.156136'),
(20, '茶山广场', '113.357201', '23.152004');
