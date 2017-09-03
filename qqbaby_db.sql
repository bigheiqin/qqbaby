/*
Navicat MySQL Data Transfer

Source Server         : qqbaby
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : qqbaby_db

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-03 17:08:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_case`
-- ----------------------------
DROP TABLE IF EXISTS `tb_case`;
CREATE TABLE `tb_case` (
  `case_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `case_title` varchar(0) NOT NULL COMMENT '客片标题',
  `case_subTitle` varchar(0) DEFAULT NULL COMMENT '副标题【简介】',
  `case_content` text NOT NULL COMMENT '内容',
  `case_srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `case_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `case_sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `case_total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `case_authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `case_uploadTime` datetime NOT NULL COMMENT '上传时间',
  `case_modifyId` int(11) unsigned NOT NULL COMMENT '修改人id',
  `case_updateTime` datetime NOT NULL COMMENT '修改时间',
  `case_parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`case_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_case
-- ----------------------------
