/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : tp5

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-06-25 23:36:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for o2o_area
-- ----------------------------
DROP TABLE IF EXISTS `o2o_area`;
CREATE TABLE `o2o_area` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '//城市名',
  `city_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//城市id',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//父级id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态 ',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`) USING BTREE,
  KEY `parent_id` (`parent_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商圈表';

-- ----------------------------
-- Records of o2o_area
-- ----------------------------

-- ----------------------------
-- Table structure for o2o_category
-- ----------------------------
DROP TABLE IF EXISTS `o2o_category`;
CREATE TABLE `o2o_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '//商品名称',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//父级id',
  `listorder` int(8) NOT NULL DEFAULT '0' COMMENT '//排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='生活服务分类表';

-- ----------------------------
-- Records of o2o_category
-- ----------------------------

-- ----------------------------
-- Table structure for o2o_deal
-- ----------------------------
DROP TABLE IF EXISTS `o2o_deal`;
CREATE TABLE `o2o_deal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '//商品名',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '//分类id',
  `se_category_id` int(11) NOT NULL DEFAULT '0' COMMENT '//二级分类id',
  `sel_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//卖家id',
  `location_ids` varchar(100) NOT NULL DEFAULT '' COMMENT '//所属店面',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '//图片',
  `description` text NOT NULL COMMENT '//描述',
  `start_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//开始时间',
  `end_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//结束时间',
  `origin_price` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '//原价',
  `current_price` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '//现价',
  `city_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//所属城市id',
  `buy_count` int(11) NOT NULL DEFAULT '0' COMMENT '//购买数量',
  `total_count` int(11) NOT NULL DEFAULT '0' COMMENT '//商品总数',
  `coupons_start_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//团购券生效时间',
  `coupons_end_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//团购券失效时间',
  `xpoint` varchar(10) NOT NULL DEFAULT '' COMMENT '//经度',
  `ypoint` varchar(10) NOT NULL DEFAULT '' COMMENT '//维度',
  `bis_account_id` int(10) NOT NULL DEFAULT '0' COMMENT '//卖家id',
  `balance_price` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '//商品结算价',
  `notes` text NOT NULL COMMENT '//商品提示',
  `listorder` int(8) NOT NULL DEFAULT '0' COMMENT '//排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态 ',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`),
  KEY `sel_id` (`sel_id`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `se_category_id` (`se_category_id`) USING BTREE,
  KEY `city_id` (`city_id`) USING BTREE,
  KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='团购商品表';

-- ----------------------------
-- Records of o2o_deal
-- ----------------------------

-- ----------------------------
-- Table structure for o2o_featured
-- ----------------------------
DROP TABLE IF EXISTS `o2o_featured`;
CREATE TABLE `o2o_featured` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//分类',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '//标题',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '//图片',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '//地址',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '//描述',
  `listorder` int(8) NOT NULL DEFAULT '0' COMMENT '//排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态 ',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推荐位表';

-- ----------------------------
-- Records of o2o_featured
-- ----------------------------

-- ----------------------------
-- Table structure for o2o_seller
-- ----------------------------
DROP TABLE IF EXISTS `o2o_seller`;
CREATE TABLE `o2o_seller` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '//城市名',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '//电子邮件',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '//图标',
  `licence_pic` varchar(255) NOT NULL DEFAULT '' COMMENT '//营业执照',
  `description` text NOT NULL COMMENT '//描述',
  `city_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//城市id',
  `city_path` varchar(50) NOT NULL DEFAULT '' COMMENT '//商圈',
  `bank_info` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '//金额',
  `bank_name` varchar(50) NOT NULL DEFAULT '' COMMENT '//提现开户行名称',
  `bank_user` varchar(50) NOT NULL DEFAULT '' COMMENT '//提现开户行姓名',
  `bank_onwer` varchar(50) NOT NULL DEFAULT '' COMMENT '//法人',
  `owner_tel` int(11) NOT NULL DEFAULT '0' COMMENT '//联系方式',
  `money` varchar(50) NOT NULL DEFAULT '' COMMENT '//城市名',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '//父级id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态 ',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`) USING BTREE,
  KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户表';

-- ----------------------------
-- Records of o2o_seller
-- ----------------------------

-- ----------------------------
-- Table structure for o2o_seller_account
-- ----------------------------
DROP TABLE IF EXISTS `o2o_seller_account`;
CREATE TABLE `o2o_seller_account` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '//用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '//密码',
  `code` varchar(50) NOT NULL DEFAULT '' COMMENT '//随机数',
  `sel_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//商户id',
  `last_log_ip` varchar(20) NOT NULL DEFAULT '' COMMENT '//最后登录ip',
  `last_log_time` int(11) NOT NULL DEFAULT '0' COMMENT '//最后登录时间',
  `is_main` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//是否是总店,分店',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态 ',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`),
  KEY `sel_id` (`sel_id`) USING BTREE,
  KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户账号表';

-- ----------------------------
-- Records of o2o_seller_account
-- ----------------------------

-- ----------------------------
-- Table structure for o2o_seller_location
-- ----------------------------
DROP TABLE IF EXISTS `o2o_seller_location`;
CREATE TABLE `o2o_seller_location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '//商户名',
  `logo` varchar(30) NOT NULL DEFAULT '' COMMENT '//logo	',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '//密码',
  `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '//电话',
  `contact` varchar(20) NOT NULL DEFAULT '' COMMENT '//联系人',
  `xpoint` varchar(10) NOT NULL DEFAULT '' COMMENT '//经度',
  `ypoint` varchar(10) NOT NULL DEFAULT '' COMMENT '//维度',
  `sel_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//卖家id',
  `open_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//营业时间',
  `content` text NOT NULL COMMENT '//介绍',
  `is_main` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//是否是总店,分店',
  `city_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//城市id',
  `city_path` varchar(50) NOT NULL DEFAULT '' COMMENT '//商圈',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '//分类id',
  `category_path` varchar(50) NOT NULL DEFAULT '' COMMENT '//分类',
  `listorder` int(8) NOT NULL DEFAULT '0' COMMENT '//排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态 ',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`),
  KEY `sel_id` (`sel_id`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户门店表';

-- ----------------------------
-- Records of o2o_seller_location
-- ----------------------------

-- ----------------------------
-- Table structure for o2o_user
-- ----------------------------
DROP TABLE IF EXISTS `o2o_user`;
CREATE TABLE `o2o_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '//用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '//密码',
  `code` varchar(50) NOT NULL DEFAULT '' COMMENT '//随机数',
  `last_log_ip` varchar(20) NOT NULL DEFAULT '' COMMENT '//最后登录ip',
  `last_log_time` int(11) NOT NULL DEFAULT '0' COMMENT '//最后登录时间',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '//电子邮箱',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '//手机号',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态 ',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '//创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '//更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of o2o_user
-- ----------------------------
