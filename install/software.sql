/*
Navicat MySQL Data Transfer

Source Server         : Local_copy
Source Server Version : 50556
Source Host           : 192.168.126.139:3306
Source Database       : youtu

Target Server Type    : MYSQL
Target Server Version : 50556
File Encoding         : 65001

Date: 2018-09-10 10:07:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zh_access_auth
-- ----------------------------
DROP TABLE IF EXISTS `zh_access_auth`;
CREATE TABLE `zh_access_auth` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `accesskey` varchar(64) DEFAULT NULL,
  `access_code` varchar(64) DEFAULT NULL,
  `device_mac` varchar(64) DEFAULT NULL,
  `request_data` text,
  `auth_type` varchar(32) DEFAULT NULL,
  `auth_time` varchar(32) DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '//update for the time',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_access_auth
-- ----------------------------

-- ----------------------------
-- Table structure for zh_config
-- ----------------------------
DROP TABLE IF EXISTS `zh_config`;
CREATE TABLE `zh_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) DEFAULT NULL,
  `config_content` text,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_config
-- ----------------------------

-- ----------------------------
-- Table structure for zh_goods
-- ----------------------------
DROP TABLE IF EXISTS `zh_goods`;
CREATE TABLE `zh_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `store_id` int(10) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `thumb` text,
  `quantity` int(10) DEFAULT NULL,
  `unizh_price` decimal(10,2) DEFAULT NULL,
  `retail_price` decimal(10,2) DEFAULT NULL,
  `coszh_price` decimal(10,2) DEFAULT NULL,
  `member_price` decimal(10,2) DEFAULT NULL,
  `permission` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zh_goods
-- ----------------------------

-- ----------------------------
-- Table structure for zh_hotspot_ap
-- ----------------------------
DROP TABLE IF EXISTS `zh_hotspot_ap`;
CREATE TABLE `zh_hotspot_ap` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `site_id` int(10) NOT NULL,
  `mac` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branch` (`site_id`,`mac`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_hotspot_ap
-- ----------------------------

-- ----------------------------
-- Table structure for zh_hotspot_banner
-- ----------------------------
DROP TABLE IF EXISTS `zh_hotspot_banner`;
CREATE TABLE `zh_hotspot_banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `accesskey` varchar(64) NOT NULL,
  `thumb` varchar(128) NOT NULL,
  `url` varchar(64) DEFAULT NULL,
  `title` varchar(32) NOT NULL,
  `content` varchar(128) NOT NULL,
  `order` int(2) NOT NULL,
  `addtime` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accesskey` (`accesskey`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_hotspot_banner
-- ----------------------------

-- ----------------------------
-- Table structure for zh_hotspot_branch
-- ----------------------------
DROP TABLE IF EXISTS `zh_hotspot_branch`;
CREATE TABLE `zh_hotspot_branch` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//id',
  `uid` int(10) NOT NULL COMMENT '//商家id',
  `salt` varchar(64) NOT NULL COMMENT '//密钥',
  `normal_tid` int(10) NOT NULL COMMENT '//主题ID',
  `wechat_tid` int(10) NOT NULL COMMENT '//微信主题id',
  `account_tid` int(11) NOT NULL,
  `brand` varchar(32) NOT NULL,
  `type` varchar(324) NOT NULL,
  `branch` varchar(32) NOT NULL COMMENT '//标题',
  `site_name` varchar(32) NOT NULL COMMENT '//标题',
  `address` varchar(64) NOT NULL,
  `access_info` text NOT NULL,
  `point` varchar(32) NOT NULL,
  `qq` tinyint(1) NOT NULL,
  `weibo` tinyint(1) NOT NULL,
  `wechat` tinyint(1) NOT NULL,
  `overdue` varchar(64) NOT NULL,
  `accesscode` varchar(64) NOT NULL,
  `message_total` int(10) NOT NULL DEFAULT '10' COMMENT '//短信余额',
  `notice` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '//状态',
  `addtime` varchar(32) NOT NULL COMMENT '//添加时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `salt` (`salt`),
  KEY `salt_2` (`salt`),
  KEY `salt_3` (`salt`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_hotspot_branch
-- ----------------------------

-- ----------------------------
-- Table structure for zh_hotspot_slider
-- ----------------------------
DROP TABLE IF EXISTS `zh_hotspot_slider`;
CREATE TABLE `zh_hotspot_slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `accesskey` varchar(64) NOT NULL,
  `thumb` varchar(128) NOT NULL,
  `title` varchar(32) NOT NULL,
  `content` varchar(128) NOT NULL,
  `order` int(2) NOT NULL,
  `addtime` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accesskey` (`accesskey`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_hotspot_slider
-- ----------------------------

-- ----------------------------
-- Table structure for zh_hotspot_users
-- ----------------------------
DROP TABLE IF EXISTS `zh_hotspot_users`;
CREATE TABLE `zh_hotspot_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '//id',
  `user_id` int(10) NOT NULL,
  `usercode` varchar(32) DEFAULT NULL,
  `accesskey` int(64) NOT NULL,
  `name` varchar(64) NOT NULL COMMENT '//设备id',
  `username` varchar(32) NOT NULL COMMENT '//用户名',
  `password` varchar(32) NOT NULL COMMENT '//密码',
  `email` varchar(64) NOT NULL,
  `start_time` varchar(64) NOT NULL,
  `end_time` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '//备注',
  `addtime` varchar(32) NOT NULL COMMENT '//增加时间',
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_hotspot_users
-- ----------------------------

-- ----------------------------
-- Table structure for zh_mail
-- ----------------------------
DROP TABLE IF EXISTS `zh_mail`;
CREATE TABLE `zh_mail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `type` varchar(64) NOT NULL,
  `accesskey` varchar(128) NOT NULL,
  `secretkey` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `addtime` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_mail
-- ----------------------------

-- ----------------------------
-- Table structure for zh_message_code
-- ----------------------------
DROP TABLE IF EXISTS `zh_message_code`;
CREATE TABLE `zh_message_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `bid` int(10) NOT NULL DEFAULT '0',
  `salt` varchar(64) DEFAULT NULL,
  `cellphone` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `code` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `mac` varchar(64) DEFAULT NULL,
  `content` text,
  `status` tinyint(1) DEFAULT NULL,
  `expired` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `addtime` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`,`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_message_code
-- ----------------------------

-- ----------------------------
-- Table structure for zh_stores
-- ----------------------------
DROP TABLE IF EXISTS `zh_stores`;
CREATE TABLE `zh_stores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `store_brand` varchar(32) DEFAULT NULL,
  `store_name` varchar(64) DEFAULT NULL,
  `store_type` varchar(32) DEFAULT NULL,
  `permission` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zh_stores
-- ----------------------------

-- ----------------------------
-- Table structure for zh_themes
-- ----------------------------
DROP TABLE IF EXISTS `zh_themes`;
CREATE TABLE `zh_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `style` varchar(64) NOT NULL,
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '//1为普通主题3.为账号认证2.微信主题',
  `picture` varchar(128) NOT NULL,
  `note` varchar(64) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_themes
-- ----------------------------

-- ----------------------------
-- Table structure for zh_themes_copyright
-- ----------------------------
DROP TABLE IF EXISTS `zh_themes_copyright`;
CREATE TABLE `zh_themes_copyright` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `accesskey` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `company` varchar(128) NOT NULL,
  `type` varchar(32) NOT NULL,
  `screen` varchar(64) NOT NULL,
  `number` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `a_num` int(10) NOT NULL,
  `b_num` int(10) NOT NULL,
  `order` int(2) NOT NULL,
  `addtime` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accesskey` (`accesskey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_themes_copyright
-- ----------------------------

-- ----------------------------
-- Table structure for zh_users
-- ----------------------------
DROP TABLE IF EXISTS `zh_users`;
CREATE TABLE `zh_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `salt` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `cellphone` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `avatar` text,
  `level` int(10) DEFAULT '1',
  `permission` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3428 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zh_users
-- ----------------------------

-- ----------------------------
-- Table structure for zh_wifiapi
-- ----------------------------
DROP TABLE IF EXISTS `zh_wifiapi`;
CREATE TABLE `zh_wifiapi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `name` varchar(64) NOT NULL,
  `appid` varchar(64) NOT NULL,
  `shopid` varchar(64) NOT NULL,
  `secretkey` varchar(64) NOT NULL,
  `accesskey` varchar(64) NOT NULL,
  `ssid` varchar(64) NOT NULL,
  `bssid` varchar(64) NOT NULL,
  `addtime` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_wifiapi
-- ----------------------------

-- ----------------------------
-- Table structure for zh_youtu
-- ----------------------------
DROP TABLE IF EXISTS `zh_youtu`;
CREATE TABLE `zh_youtu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `orginazition_id` int(10) NOT NULL,
  `img_id` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `api_url` varchar(125) NOT NULL,
  `download_url` varchar(128) NOT NULL,
  `addtime` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zh_youtu
-- ----------------------------
