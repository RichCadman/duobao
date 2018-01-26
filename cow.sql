/*
Navicat MySQL Data Transfer

Source Server         : dthome
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : cow

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-10-19 09:35:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cow_admin
-- ----------------------------
DROP TABLE IF EXISTS `cow_admin`;
CREATE TABLE `cow_admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) DEFAULT NULL COMMENT '管理员名称',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_award
-- ----------------------------
DROP TABLE IF EXISTS `cow_award`;
CREATE TABLE `cow_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '开奖记录id',
  `date_number` decimal(50,0) DEFAULT NULL COMMENT '时时彩期号',
  `award_number` varchar(255) DEFAULT NULL COMMENT '开奖号',
  `type` varchar(255) DEFAULT NULL COMMENT '中奖类型   单号   双号',
  `award_time` varchar(255) DEFAULT NULL COMMENT '开奖时间',
  `dan` varchar(255) DEFAULT NULL,
  `shuang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date_number` (`date_number`) USING BTREE,
  KEY `award_time` (`award_time`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=60682 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_bill
-- ----------------------------
DROP TABLE IF EXISTS `cow_bill`;
CREATE TABLE `cow_bill` (
  `id` int(11) NOT NULL COMMENT '单数id',
  `bill_name` varchar(255) DEFAULT NULL COMMENT '夺宝类型',
  `number` int(11) DEFAULT NULL COMMENT '夺宝数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_buy
-- ----------------------------
DROP TABLE IF EXISTS `cow_buy`;
CREATE TABLE `cow_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购买id',
  `p_id` int(11) DEFAULT NULL COMMENT '商品分类的父级id 区分购买商品的类型',
  `goods_id` int(11) DEFAULT NULL COMMENT 'g购买的商品类型',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `type` varchar(255) DEFAULT NULL COMMENT '买单买双  1单   2双',
  `buy_time` varchar(255) DEFAULT NULL COMMENT '购买时间',
  `number` decimal(10,0) DEFAULT NULL COMMENT '购买几单',
  `controller` int(255) DEFAULT '0' COMMENT '标记开奖与未开奖状态和这次是买哪个单成功 0未开奖   1为买单成功   2为买双成功',
  `date_number` varchar(255) DEFAULT NULL COMMENT '时时彩期号',
  `success` varchar(255) DEFAULT '0' COMMENT '本单是否成功0失败   1成功',
  `order_number` varchar(255) DEFAULT NULL COMMENT '订单号',
  `wx` varchar(255) DEFAULT '0' COMMENT '订单状态',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type` (`type`) USING BTREE,
  KEY `controller` (`controller`) USING BTREE,
  KEY `success` (`success`) USING BTREE,
  KEY `order_number` (`order_number`) USING BTREE,
  KEY `wx` (`wx`) USING BTREE,
  KEY `buy_time` (`buy_time`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2778 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_chongzhi
-- ----------------------------
DROP TABLE IF EXISTS `cow_chongzhi`;
CREATE TABLE `cow_chongzhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL COMMENT '用户openid',
  `jine` decimal(10,0) DEFAULT NULL COMMENT '充值金额',
  `order_num` varchar(255) DEFAULT NULL COMMENT '订单号',
  `stage` int(2) DEFAULT '0' COMMENT '订单状态',
  `cz_name` varchar(255) DEFAULT NULL COMMENT '充值人名',
  `cz_time` varchar(255) DEFAULT NULL COMMENT '充值时间',
  PRIMARY KEY (`id`),
  KEY `cz_time` (`cz_time`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_exchange
-- ----------------------------
DROP TABLE IF EXISTS `cow_exchange`;
CREATE TABLE `cow_exchange` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '兑换id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `record` varchar(255) DEFAULT NULL COMMENT '兑换记录',
  `record_time` varchar(255) DEFAULT NULL COMMENT '兑换时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_goods
-- ----------------------------
DROP TABLE IF EXISTS `cow_goods`;
CREATE TABLE `cow_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `p_id` int(11) DEFAULT NULL COMMENT '父级id',
  `goods_type` varchar(255) DEFAULT NULL COMMENT '商品类型',
  `goods_image` varchar(255) DEFAULT NULL COMMENT '商品图片',
  `remark` varchar(255) DEFAULT NULL COMMENT '商品介绍',
  `count` int(11) DEFAULT NULL COMMENT '该产品累计完成多少单',
  `goods_price` decimal(10,2) DEFAULT NULL COMMENT '商品价',
  `snatch_price` decimal(10,2) DEFAULT NULL COMMENT '夺宝价',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_pay
-- ----------------------------
DROP TABLE IF EXISTS `cow_pay`;
CREATE TABLE `cow_pay` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '充值id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `pay_money` varchar(255) DEFAULT NULL COMMENT '充值金额',
  `pay_time` varchar(255) DEFAULT NULL COMMENT '充值时间',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_power
-- ----------------------------
DROP TABLE IF EXISTS `cow_power`;
CREATE TABLE `cow_power` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qihao` varchar(255) DEFAULT NULL,
  `kjhao` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_tongji
-- ----------------------------
DROP TABLE IF EXISTS `cow_tongji`;
CREATE TABLE `cow_tongji` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '统计结果',
  `result` varchar(255) DEFAULT NULL,
  `tj_time` varchar(255) DEFAULT NULL COMMENT '统计时间',
  `money_in` varchar(255) DEFAULT NULL COMMENT '平台收入',
  `money_out` varchar(255) DEFAULT NULL COMMENT '平台支出',
  `date` varchar(255) DEFAULT NULL COMMENT '判断一天统计一次的字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `cow_userinfo`;
CREATE TABLE `cow_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `user_photo` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `money` decimal(10,0) DEFAULT '0' COMMENT '夺宝币',
  `success_count` int(10) DEFAULT '0' COMMENT '获胜次数',
  `exchange_count` decimal(10,0) DEFAULT '0' COMMENT '兑换次数',
  `openid` varchar(255) DEFAULT NULL COMMENT '微信身份',
  `hour_count` int(10) DEFAULT '0' COMMENT '24',
  `week_count` int(10) DEFAULT '0' COMMENT '实时',
  `mouth_count` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `openid` (`openid`) USING BTREE,
  KEY `hour_count` (`hour_count`) USING BTREE,
  KEY `week_count` (`week_count`) USING BTREE,
  KEY `mouth_count` (`mouth_count`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=100168 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cow_withdraw
-- ----------------------------
DROP TABLE IF EXISTS `cow_withdraw`;
CREATE TABLE `cow_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '提现id',
  `user_id` int(11) DEFAULT NULL,
  `record` varchar(255) DEFAULT NULL COMMENT '提现记录',
  `withdraw_time` varchar(255) DEFAULT NULL COMMENT '提现时间',
  `tx_name` varchar(255) DEFAULT NULL COMMENT '提现人名',
  `type` varchar(255) DEFAULT NULL COMMENT '区分今日是否是首单 1首单  2不是',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `withdraw_time` (`withdraw_time`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
