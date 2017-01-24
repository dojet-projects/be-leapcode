-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2017 年 01 月 22 日 03:14
-- 服务器版本: 5.5.28
-- PHP 版本: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `leap`
--
CREATE DATABASE `leap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `leap`;

-- --------------------------------------------------------

--
-- 表的结构 `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qno` int(11) NOT NULL COMMENT '问题编号',
  `title` varchar(256) NOT NULL,
  `difficulty` smallint(6) NOT NULL COMMENT '难度（1-5）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='问题' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `questions`
--

INSERT INTO `questions` (`id`, `qno`, `title`, `difficulty`) VALUES
(1, 1, '两数之和', 3),
(2, 2, '链表的交点', 3),
(3, 3, '子数组的最大乘积', 3);

-- --------------------------------------------------------

--
-- 表的结构 `simple_user`
--

CREATE TABLE IF NOT EXISTS `simple_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `md5password` char(32) NOT NULL COMMENT 'MD5密码',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `simple_user`
--

INSERT INTO `simple_user` (`uid`, `username`, `md5password`, `createtime`) VALUES
(1, 'setimouse@qq.com', 'a96a2799c347f82332c7b1d6d148146f', 1484728318);

-- --------------------------------------------------------

--
-- 表的结构 `solution`
--

CREATE TABLE IF NOT EXISTS `solution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `lang` varchar(32) NOT NULL COMMENT '开发语言',
  `code` text NOT NULL COMMENT '代码',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`,`qno`,`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='用户提交代码' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `solution`
--

INSERT INTO `solution` (`id`, `uid`, `qno`, `lang`, `code`, `createtime`, `updatetime`) VALUES
(1, 1, 1, 'php', '<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  array    $nums\\r\\n     * @param  int      $target\\r\\n     * @return array\\r\\n     */\\r\\n    public function twoSum($nums, $target) {\\r\\n        return [0, 1];\\r\\n    }\\r\\n\\r\\n}\\r\\n', '2017-01-19 03:31:42', '2017-01-19 05:06:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
