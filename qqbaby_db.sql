/*
Navicat MySQL Data Transfer

Source Server         : qqbaby
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : qqbaby_db

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-08 20:54:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_babay`
-- ----------------------------
DROP TABLE IF EXISTS `tb_babay`;
CREATE TABLE `tb_babay` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) NOT NULL COMMENT '客片标题',
  `subTitle` varchar(255) DEFAULT NULL COMMENT '副标题【简介】',
  `srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `uploadTime` datetime NOT NULL COMMENT '上传时间',
  `parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `tb_babaypic`
-- ----------------------------
DROP TABLE IF EXISTS `tb_babaypic`;
CREATE TABLE `tb_babaypic` (
  `pic_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pic_URL` text NOT NULL COMMENT '详情图url数组',
  `pic_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_babaypic
-- ----------------------------


-- ----------------------------
-- Table structure for `tb_banner`
-- ----------------------------
DROP TABLE IF EXISTS `tb_banner`;
CREATE TABLE `tb_banner` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `parentId` int(11) unsigned NOT NULL COMMENT '所属广告位【1顶部 2最新 3婴儿 4宝宝 5儿童 6亲子 7 团队 8场馆】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_banner
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_children`
-- ----------------------------
DROP TABLE IF EXISTS `tb_children`;
CREATE TABLE `tb_children` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) NOT NULL COMMENT '客片标题',
  `subTitle` varchar(255) DEFAULT NULL COMMENT '副标题【简介】',
  `srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `uploadTime` datetime NOT NULL COMMENT '上传时间',
  `parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_children
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_childrenpic`
-- ----------------------------
DROP TABLE IF EXISTS `tb_childrenpic`;
CREATE TABLE `tb_childrenpic` (
  `pic_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pic_url` text NOT NULL COMMENT '详情图url数组',
  `pic_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_childrenpic
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_family`
-- ----------------------------
DROP TABLE IF EXISTS `tb_family`;
CREATE TABLE `tb_family` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) NOT NULL COMMENT '客片标题',
  `subTitle` varchar(255) DEFAULT NULL COMMENT '副标题【简介】',
  `srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `uploadTime` datetime NOT NULL COMMENT '上传时间',
  `parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `tb_familypic`
-- ----------------------------
DROP TABLE IF EXISTS `tb_familypic`;
CREATE TABLE `tb_familypic` (
  `pic_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pic_url` varchar(255) NOT NULL COMMENT '详情图url数组',
  `pic_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  `pic_tiem` datetime DEFAULT NULL COMMENT '上传时间',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=671 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_familypic
-- ----------------------------


-- ----------------------------
-- Table structure for `tb_infant`
-- ----------------------------
DROP TABLE IF EXISTS `tb_infant`;
CREATE TABLE `tb_infant` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) NOT NULL COMMENT '客片标题',
  `subTitle` varchar(255) DEFAULT NULL COMMENT '副标题【简介】',
  `srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `uploadTime` datetime NOT NULL COMMENT '上传时间',
  `parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `tb_infantpic`
-- ----------------------------
DROP TABLE IF EXISTS `tb_infantpic`;
CREATE TABLE `tb_infantpic` (
  `pic_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pic_URL` text NOT NULL COMMENT '详情图url数组',
  `pic_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `tb_new`
-- ----------------------------
DROP TABLE IF EXISTS `tb_new`;
CREATE TABLE `tb_new` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) NOT NULL COMMENT '客片标题',
  `subTitle` varchar(255) DEFAULT NULL COMMENT '副标题【简介】',
  `srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `uploadTime` datetime NOT NULL COMMENT '上传时间',
  `parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_new
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_newpic`
-- ----------------------------
DROP TABLE IF EXISTS `tb_newpic`;
CREATE TABLE `tb_newpic` (
  `pic_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pic_URL` text NOT NULL COMMENT '详情图url数组',
  `pic_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_newpic
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_team`
-- ----------------------------
DROP TABLE IF EXISTS `tb_team`;
CREATE TABLE `tb_team` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) NOT NULL COMMENT '客片标题',
  `subTitle` varchar(255) DEFAULT NULL COMMENT '副标题【简介】',
  `srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `uploadTime` datetime NOT NULL COMMENT '上传时间',
  `parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_team
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_teampic`
-- ----------------------------
DROP TABLE IF EXISTS `tb_teampic`;
CREATE TABLE `tb_teampic` (
  `pic_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pic_URL` text NOT NULL COMMENT '详情图url数组',
  `pic_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_teampic
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_name` varchar(255) NOT NULL COMMENT '账户',
  `user_nickname` varchar(255) NOT NULL COMMENT '昵称',
  `user_passwod` varchar(255) NOT NULL COMMENT '密码',
  `user_group` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '1普通管理员 2超级管理员',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'admin', 'big黑钦', 'mq5555188', '1');

-- ----------------------------
-- Table structure for `tb_venue`
-- ----------------------------
DROP TABLE IF EXISTS `tb_venue`;
CREATE TABLE `tb_venue` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) NOT NULL COMMENT '客片标题',
  `subTitle` varchar(255) DEFAULT NULL COMMENT '副标题【简介】',
  `srcImg` varchar(255) NOT NULL COMMENT '缩略图',
  `status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示 2置顶 3精华 4热门】',
  `sort` int(11) unsigned DEFAULT '0' COMMENT '自定义排序',
  `total` bigint(20) unsigned DEFAULT '0' COMMENT '点击量统计',
  `authorId` int(11) unsigned NOT NULL COMMENT '作者Id',
  `uploadTime` datetime NOT NULL COMMENT '上传时间',
  `parent` int(10) unsigned NOT NULL COMMENT '所属栏目【1婴儿 2宝宝 3儿童 4亲子 5活动】',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_venue
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_venuepic`
-- ----------------------------
DROP TABLE IF EXISTS `tb_venuepic`;
CREATE TABLE `tb_venuepic` (
  `pic_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pic_URL` text NOT NULL COMMENT '详情图url数组',
  `pic_status` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '状态【0隐藏 1显示】',
  `linkURL` varchar(255) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `case_id` int(11) unsigned NOT NULL COMMENT '客片对照id',
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_venuepic
-- ----------------------------
