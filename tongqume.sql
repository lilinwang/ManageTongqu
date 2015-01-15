-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2015 at 12:35 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tongqume`
--
CREATE DATABASE IF NOT EXISTS `tongqume` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tongqume`;

-- --------------------------------------------------------

--
-- Table structure for table `act`
--

CREATE TABLE IF NOT EXISTS `act` (
  `actid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `location` varchar(50) NOT NULL DEFAULT '暂无地点',
  `photo` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '其他',
  `tag` varchar(256) NOT NULL DEFAULT '',
  `source` varchar(50) NOT NULL DEFAULT '',
  `sourcelink` varchar(200) NOT NULL DEFAULT '',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sign_start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sign_end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sign_require` int(11) NOT NULL DEFAULT '0' COMMENT '报名要求一共有几个',
  `sign_info` varchar(256) NOT NULL DEFAULT '' COMMENT '报名信息',
  `max_member` int(11) NOT NULL DEFAULT '-1',
  `sign_count` int(11) NOT NULL DEFAULT '0' COMMENT '关注、签到统计',
  `member_count` int(11) NOT NULL DEFAULT '0' COMMENT '加入成员统计',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `status` enum('default','delete') NOT NULL DEFAULT 'default',
  `modify_count` int(11) NOT NULL DEFAULT '0',
  `creatorid` int(11) NOT NULL COMMENT '0来自于非用户，否则来自用户',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `needqrcode` int(11) NOT NULL DEFAULT '0' COMMENT '是否需要二维码',
  `ruledesc` text COMMENT '组织者自己的规则说明',
  `attachfiles` text,
  PRIMARY KEY (`actid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=954 ;

-- --------------------------------------------------------

--
-- Table structure for table `actmember`
--

CREATE TABLE IF NOT EXISTS `actmember` (
  `actmemberid` int(11) NOT NULL AUTO_INCREMENT,
  `actid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `resume` varchar(512) NOT NULL DEFAULT '',
  `type` enum('default','delete') NOT NULL DEFAULT 'default',
  `attendtime` datetime NOT NULL DEFAULT '1111-11-11 11:11:11',
  PRIMARY KEY (`actmemberid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15952 ;

-- --------------------------------------------------------

--
-- Table structure for table `actsign`
--

CREATE TABLE IF NOT EXISTS `actsign` (
  `actsignid` int(11) NOT NULL AUTO_INCREMENT,
  `actid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` enum('default','delete') NOT NULL DEFAULT 'default',
  PRIMARY KEY (`actsignid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3442 ;

-- --------------------------------------------------------

--
-- Table structure for table `attachfile`
--

CREATE TABLE IF NOT EXISTS `attachfile` (
  `attachfileid` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text,
  `realname` text,
  `downloadnum` int(11) NOT NULL,
  PRIMARY KEY (`attachfileid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Table structure for table `biyexiangceganyan`
--

CREATE TABLE IF NOT EXISTS `biyexiangceganyan` (
  `idbiyexiangceganyan` int(11) NOT NULL AUTO_INCREMENT,
  `ganyan` text NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`idbiyexiangceganyan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `biyexiangcephoto`
--

CREATE TABLE IF NOT EXISTS `biyexiangcephoto` (
  `idbiyexiangcephoto` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(200) DEFAULT NULL,
  `votenum` int(11) NOT NULL DEFAULT '0',
  `smallphoto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idbiyexiangcephoto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `biyexiangcephotouser`
--

CREATE TABLE IF NOT EXISTS `biyexiangcephotouser` (
  `idbiyexiangcephotouser` int(11) NOT NULL AUTO_INCREMENT,
  `photoid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbiyexiangcephotouser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

-- --------------------------------------------------------

--
-- Table structure for table `biyexiangceuser`
--

CREATE TABLE IF NOT EXISTS `biyexiangceuser` (
  `idbiyexiangceuser` int(11) NOT NULL AUTO_INCREMENT,
  `jname` varchar(45) NOT NULL,
  `rname` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `votenum1` int(11) NOT NULL DEFAULT '0',
  `votenum2` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idbiyexiangceuser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `body` text NOT NULL,
  `actid` int(11) NOT NULL,
  `type` enum('default','delete') NOT NULL DEFAULT 'default',
  `score` int(11) NOT NULL DEFAULT '10' COMMENT '推荐，分数为0,2,4,6,8,10',
  PRIMARY KEY (`commentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE IF NOT EXISTS `manage` (
  `managename` varchar(50) NOT NULL,
  `managepassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `renren`
--

CREATE TABLE IF NOT EXISTS `renren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `renrenid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1650 ;

-- --------------------------------------------------------

--
-- Table structure for table `renrenfriends`
--

CREATE TABLE IF NOT EXISTS `renrenfriends` (
  `idrenrenfriends` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `friendname` varchar(45) DEFAULT NULL,
  `friendphoto` varchar(200) DEFAULT NULL,
  `updatetime` datetime NOT NULL DEFAULT '2010-01-01 10:00:00',
  `state` varchar(45) NOT NULL DEFAULT 'default',
  `friendid` int(11) NOT NULL,
  `namepinyin` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrenrenfriends`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=178192 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `student_number` varchar(30) NOT NULL DEFAULT '',
  `resume` varchar(100) NOT NULL DEFAULT '',
  `type` enum('default','renren','delete','admin') NOT NULL DEFAULT 'default',
  `renren_access_token` varchar(100) NOT NULL DEFAULT '',
  `renren_refresh_token` varchar(100) NOT NULL DEFAULT '',
  `renren_expires_in` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sync_create` int(11) NOT NULL DEFAULT '1',
  `sync_attend` int(11) NOT NULL DEFAULT '1',
  `score` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11087 ;

-- --------------------------------------------------------

--
-- Table structure for table `userrank`
--

CREATE TABLE IF NOT EXISTS `userrank` (
  `userrankid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `jaccountname` varchar(200) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `otherinfo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`userrankid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=555 ;

-- --------------------------------------------------------

--
-- Table structure for table `weibo`
--

CREATE TABLE IF NOT EXISTS `weibo` (
  `weiboID` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `subjectivity_one` int(11) DEFAULT '0',
  `subjectivity_two` int(11) DEFAULT '0',
  `subjectivity` int(11) DEFAULT NULL,
  `emotion_one` int(11) DEFAULT '0',
  `emotion_two` int(11) DEFAULT '0',
  `emotion` int(11) DEFAULT NULL,
  PRIMARY KEY (`weiboID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `yuliao`
--

CREATE TABLE IF NOT EXISTS `yuliao` (
  `yuliaoID` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`yuliaoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `yuliaouser`
--

CREATE TABLE IF NOT EXISTS `yuliaouser` (
  `idyuliao` int(11) NOT NULL AUTO_INCREMENT,
  `jid` varchar(20) NOT NULL,
  PRIMARY KEY (`idyuliao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2147483648 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
