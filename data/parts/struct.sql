--
--	HMT Bus GO -- 华农校巴查询程序
--
--	@note 数据库结构 v1.0
--
--	@author CRH380A-2722 <609657831@qq.com>
--	@license MIT
--	@copyright 2016-2017 CRH380A-2722
--

CREATE TABLE IF NOT EXISTS bus_line (
	line_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	line_name VARCHAR(50) NOT NULL,
	first_bus CHAR(5) NOT NULL,
	last_bus CHAR(5) NOT NULL,
	line_start VARCHAR(30) NOT NULL,
	line_end VARCHAR(30) NOT NULL,
	line_inverse INT UNSIGNED DEFAULT NULL,
	PRIMARY KEY (line_id),
	INDEX (line_start),
	INDEX (line_end),
	INDEX (line_inverse)
) ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS bus_stop (
	stop_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	stop_name VARCHAR(50) NOT NULL,
	stop_lng VARCHAR(50) DEFAULT NULL, -- 经度
	stop_lat VARCHAR(50) DEFAULT NULL, -- 纬度
	stop_alias TEXT NOT NULL,
	PRIMARY KEY (stop_id),
	FULLTEXT (stop_name)
) ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS bus_relationship (
	line_id INT UNSIGNED NOT NULL,
	stop_id INT UNSIGNED NOT NULL,
	stop_sort INT UNSIGNED NOT NULL,
	INDEX (line_id),
	INDEX (stop_id),
	INDEX (stop_sort)
) ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS bus_keywords (
	key_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	key_name TEXT NOT NULL,
	line_id INT UNSIGNED NOT NULL,
	PRIMARY KEY (key_id),
	INDEX (line_id)
) ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS bus_realtime_cache (
	cache_data TEXT NOT NULL,
	cache_expires BIGINT UNSIGNED NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS bus_timetable (
	table_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	line_id INT UNSIGNED NOT NULL,
	table_type TINYINT(1) UNSIGNED NOT NULL, -- 1表示工作日，2表示周末
	table_time VARCHAR(50) NOT NULL,
	PRIMARY KEY (table_id),
	INDEX (line_id),
	INDEX (table_time)
) ENGINE = MyISAM DEFAULT CHARSET = 'utf8';

CREATE TABLE IF NOT EXISTS bus_polyline (
	poly_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	line_id INT UNSIGNED NOT NULL,
	poly_color VARCHAR(7) NOT NULL,
	poly_path TEXT NOT NULL,
	PRIMARY KEY (poly_id),
	INDEX (line_id)
) ENGINE = MyISAM DEFAULT CHARSET = 'utf8';
