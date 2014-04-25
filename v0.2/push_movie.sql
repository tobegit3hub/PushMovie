-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 08 月 20 日 12:57
-- 服务器版本: 5.5.24
-- PHP 版本: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `push_movie`
--

-- --------------------------------------------------------

--
-- 表的结构 `actor`
--

CREATE TABLE IF NOT EXISTS `actor` (
  `_id` int(11) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `generation` varchar(16) NOT NULL,
  `nation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `choose_movie`
--

CREATE TABLE IF NOT EXISTS `choose_movie` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `type` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `choose_movie`
--

INSERT INTO `choose_movie` (`_id`, `name`, `type`, `location`, `language`) VALUES
(6, '春娇与志明', 6, 3, 3),
(7, '初恋这件小事', 6, 5, 5),
(8, '麦兜当当伴我心', 4, 3, 3),
(9, '麦兜当当伴我心', 4, 3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `director`
--

CREATE TABLE IF NOT EXISTS `director` (
  `_id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `generation` varchar(16) NOT NULL,
  `nation` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `_id` int(11) DEFAULT NULL,
  `value` varchar(16) NOT NULL,
  PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `language`
--

INSERT INTO `language` (`_id`, `value`) VALUES
(1, '普通话'),
(3, '粤语'),
(2, '英语');

-- --------------------------------------------------------

--
-- 表的结构 `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `_id` int(11) NOT NULL,
  `value` varchar(16) NOT NULL,
  PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `location`
--

INSERT INTO `location` (`_id`, `value`) VALUES
(1, '大陆'),
(2, '美国'),
(3, '香港');

-- --------------------------------------------------------

--
-- 表的结构 `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `director` varchar(16) NOT NULL,
  `male_actor` varchar(16) NOT NULL,
  `female_actor` varchar(16) NOT NULL,
  `type` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `rate` float NOT NULL,
  `image` varchar(512) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `movie`
--

INSERT INTO `movie` (`_id`, `name`, `director`, `male_actor`, `female_actor`, `type`, `location`, `language`, `year`, `rate`, `image`) VALUES
(1, '话皮2', '冉平', '陈坤', '周迅', 3, 1, 1, 2012, 5.9, 'http://img5.douban.com/spic/s10300009.jpg'),
(2, '搜索', '陈凯歌', '赵又廷', '高圆圆', 2, 1, 1, 2012, 7.1, 'http://img1.douban.com/spic/s10489201.jpg'),
(3, '泰坦尼克号', '卡梅隆', '迪卡普里奥', '温丝莱特', 2, 2, 2, 1997, 8.9, 'http://img3.douban.com/spic/s3939938.jpg'),
(4, '泰迪熊', '麦克法兰', '麦克法兰', '沃尔伯格', 4, 2, 2, 2012, 7.6, 'http://img1.douban.com/spic/s10392260.jpg'),
(5, '黑暗骑士崛起', '诺兰', '贝尔', '海瑟薇', 1, 2, 2, 2012, 8.5, 'http://img1.douban.com/spic/s9127643.jpg'),
(6, '失恋33天', '滕华涛', '文章', '白百何', 2, 1, 1, 2011, 7.3, 'http://img3.douban.com/spic/s6964368.jpg'),
(7, '怦然心动', '莱纳', '麦克奥利菲', '卡罗尔', 6, 2, 2, 2010, 8.8, 'http://img3.douban.com/spic/s4387266.jpg'),
(8, '春娇与志明', '彭浩翔', '余文乐', '杨千嬅', 6, 3, 3, 2012, 7.4, 'http://img1.douban.com/spic/s8985924.jpg'),
(9, '那些年，我们一起追的女孩', '九把刀', '陈妍希', '柯震东', 6, 4, 1, 2011, 8.2, 'http://img3.douban.com/spic/s6985526.jpg'),
(10, '初恋这件小事', '萨克那卡林', '毛瑞尔', '乐维瑟派布恩', 6, 5, 5, 2010, 8.2, 'http://img1.douban.com/spic/s4406154.jpg'),
(11, '四大名捕', '陈嘉上', '邓超', '刘亦菲', 3, 1, 1, 2012, 4.7, 'http://img1.douban.com/spic/s10425432.jpg'),
(12, '碟中谍4', '艾布拉姆斯', '克鲁斯', '巴顿', 1, 2, 2, 2011, 8.2, 'http://img1.douban.com/spic/s6975693.jpg'),
(13, '史密斯夫妇', '里曼', '皮特', '朱莉', 7, 2, 2, 2005, 7.3, 'http://img1.douban.com/spic/s1399414.jpg'),
(14, '冰川时代4', '特米尔', '安萨里', '贝哈', 4, 2, 2, 2012, 8, 'http://img1.douban.com/spic/s10387444.jpg'),
(15, '三傻大闹宝莱坞', '希拉尼', '汗', '卡普', 6, 6, 6, 2009, 9.1, 'http://img5.douban.com/spic/s4433349.jpg'),
(16, '麦兜当当伴我心', '谢立文', '黄秋生', '吴君如', 4, 3, 3, 2012, 8.3, 'http://img5.douban.com/spic/s10389149.jpg'),
(17, '海扁王', '沃恩', '约翰逊', '莫瑞兹', 5, 2, 2, 2010, 7.6, 'http://img1.douban.com/spic/s4145084.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `useful` tinyint(1) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `rank`
--

INSERT INTO `rank` (`_id`, `useful`, `count`) VALUES
(1, 1, 10),
(2, 0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `comedy` tinyint(1) NOT NULL,
  `love` tinyint(1) NOT NULL,
  `action` tinyint(1) NOT NULL,
  PRIMARY KEY (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
