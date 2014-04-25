-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2011 年 12 月 25 日 11:16
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `web_star`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `id` int(4) NOT NULL auto_increment COMMENT '自增id',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(60) NOT NULL COMMENT '用户密码',
  `point` varchar(200) NOT NULL COMMENT '积分',
  `grade` varchar(50) default NULL COMMENT '等级',
  `popularity` varchar(16) NOT NULL default '0' COMMENT '用户人气',
  `email` varchar(16) NOT NULL COMMENT '邮箱地址',
  `time` varchar(16) NOT NULL COMMENT '注册时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` VALUES (14, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '23', '钦天监司晨', '21', 'admin@admin.com', '2011-11-30 18:51');

-- --------------------------------------------------------

-- 
-- 表的结构 `web_star`
-- 

CREATE TABLE `web_star` (
  `id` int(11) NOT NULL auto_increment COMMENT '用户自增id',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `title` varchar(16) NOT NULL COMMENT '提交的标题',
  `content` varchar(480) NOT NULL COMMENT '提交的内容',
  `good` varchar(16) NOT NULL default '0' COMMENT '好评',
  `bad` varchar(16) NOT NULL default '0' COMMENT '差评',
  `time` int(11) NOT NULL COMMENT '提交的时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

-- 
-- 导出表中的数据 `web_star`
-- 

INSERT INTO `web_star` VALUES (1, '游客', '贺铸 青玉案的格律', '　　（○平声●仄声⊙可平可仄△平韵脚▲仄韵脚） 　　凌波不过横塘路， 　　⊙○⊙●○○▲（韵）， 　　但目送，芳尘去。 　　●⊙●、○○▲（韵）。 　　锦瑟年华谁与度？ 　　⊙●⊙○○●▲（韵）。 　　月台花榭， 　　⊙○○▲（句）， 　　琐窗朱户， 　　⊙○⊙▲（韵）， 　　只有春知处。 　　⊙●○○▲（韵）。 　　碧云冉冉蘅皋暮， 　　⊙○⊙●○○▲（韵）， 　　彩笔新题断肠句。 　　⊙●○○●○▲（韵）。 　　试问闲愁都几许？ 　　⊙●⊙○○●▲（韵）。 　　一川烟草， 　　⊙○○●（句）， 　　满城风絮， 　　⊙○⊙▲（韵）， 　　梅子黄时雨。 　　⊙●○○▲（韵）。', '0', '0', 1323049302);
INSERT INTO `web_star` VALUES (2, 'admin', '欢迎使用web_star留言板', '嗨！大家好，偶是尘烟，欢迎大家使用web_star留言版，有什么意见或好的建议可以发送邮件至578672331@qq.com，偶会尽力解决^_^。', '0', '0', 1323048756);
INSERT INTO `web_star` VALUES (3, 'admin', '无题（李商隐）', '相见时难别亦难，东风无力百花残。 \r\n春蚕到死丝方尽，蜡炬成灰泪始干。 \r\n晓镜但愁云鬓改，夜吟应觉月光寒。 \r\n蓬山此去无多路，青鸟殷勤为探看。', '1', '0', 1323048881);
INSERT INTO `web_star` VALUES (4, '游客', '仓央嘉措的十诫诗', '译文一 　　第一最好不相见，如此便可不相恋。 　　第二最好不相知，如此便可不相思。 　　译文二 　　但曾相见便相知，相见何如不见时。 　　安得与君相诀绝，免教生死作相思。', '1', '1', 1323048982);
INSERT INTO `web_star` VALUES (5, 'admin', '青玉案 元夕(辛弃疾)', '东风夜放花千树，\r\n更吹落，星如雨。\r\n宝马雕车香满路。\r\n凤箫声动，玉壶光转，\r\n一夜鱼龙舞。\r\n\r\n蛾儿雪柳黄金缕，\r\n笑语盈盈暗香去。\r\n众里寻他千百度，\r\n蓦然回首，那人却在，\r\n灯火阑珊处。', '0', '0', 1323049112);
INSERT INTO `web_star` VALUES (6, 'admin', '青玉案（贺铸 ）', '凌波不过横塘路，但目送，芳尘去。锦瑟华年谁与度？月台花榭，琐窗朱户，只有春知处。 　　飞云冉冉蘅皋暮，彩笔新题断肠句。试问闲愁都几许？一川烟草，满城风絮，梅子黄时雨。', '0', '0', 1323049215);
