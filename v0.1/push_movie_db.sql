-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 08 月 13 日 20:50
-- 服务器版本: 5.5.24
-- PHP 版本: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `push_movie_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `favourite_table`
--

CREATE TABLE IF NOT EXISTS `favourite_table` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `type` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `favourite_table`
--

INSERT INTO `favourite_table` (`_id`, `name`, `type`, `location`, `language`) VALUES
(1, 'tobe', 2, 2, 2),
(2, 'tobe2', 1, 3, 2),
(3, 'tobe', 2, 2, 2),
(4, 'tobe', 2, 2, 2),
(5, 'tobe', 2, 2, 2),
(6, 'tobeOkay', 7, 5, 2),
(7, 'ttt', 2, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `language_table`
--

CREATE TABLE IF NOT EXISTS `language_table` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `language_table`
--

INSERT INTO `language_table` (`_id`, `language`) VALUES
(1, '???');

-- --------------------------------------------------------

--
-- 表的结构 `location_table`
--

CREATE TABLE IF NOT EXISTS `location_table` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(10) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `movie_table`
--

CREATE TABLE IF NOT EXISTS `movie_table` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `director` varchar(10) DEFAULT NULL,
  `male_actor` varchar(10) DEFAULT NULL,
  `female_actor` varchar(10) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `rate` float NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `movie_table`
--

INSERT INTO `movie_table` (`_id`, `name`, `director`, `male_actor`, `female_actor`, `type`, `location`, `language`, `year`, `rate`, `image`) VALUES
(1, 'tobeMovie', 'tobeDirect', 'tobe', 'tobeGF', 3, 1, 3, 2012, 4.3, 'http://img3.douban.com/spic/s3939938.jpg'),
(4, 'EvaWho', 'fishy', 'tobe', 'fishy', 2, 1, 3, 2012, 9.9, 'http://img3.douban.com/spic/s4387266.jpg'),
(5, 'family', 'chen', 'chen', 'huang', 2, 1, 3, 1991, 10, 'http://img3.douban.com/spic/s6964368.jpg'),
(6, 'high schoo', 'liao', 'chen', 'nobody', 7, 1, 1, 2010, 8, 'http://img3.douban.com/spic/s6985526.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `rank_table`
--

CREATE TABLE IF NOT EXISTS `rank_table` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `value` tinyint(1) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `type_table`
--

CREATE TABLE IF NOT EXISTS `type_table` (
  `_id` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `comedy` tinyint(1) NOT NULL,
  `love` tinyint(1) NOT NULL,
  `action` tinyint(1) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
