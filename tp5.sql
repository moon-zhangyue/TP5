/*
Navicat MySQL Data Transfer

Source Server         : localhost-visual
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : tp5

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-06-23 17:52:31
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of o2o_category
-- ----------------------------
