-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-10 17:35:14
-- 服务器版本： 5.7.16-0ubuntu0.16.04.1-log
-- PHP Version: 5.5.38-4+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `leap`
--
CREATE DATABASE IF NOT EXISTS `leap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `leap`;

-- --------------------------------------------------------

--
-- 表的结构 `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qno` int(11) NOT NULL COMMENT '问题编号',
  `title` varchar(256) NOT NULL,
  `difficulty` smallint(6) NOT NULL COMMENT '难度（1-5）',
  `seo_title` varchar(128) NOT NULL COMMENT '对SEO友好的title',
  PRIMARY KEY (`id`),
  UNIQUE KEY `seo_title` (`seo_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='问题';

--
-- 转存表中的数据 `questions`
--

INSERT INTO `questions` (`id`, `qno`, `title`, `difficulty`, `seo_title`) VALUES
(1, 1, '两数之和', 3, 'two-sum'),
(2, 2, '链表的交点', 3, 'linked-list-intersection'),
(3, 3, '子数组的最大乘积', 3, 'max-product-of-sub-array');

-- --------------------------------------------------------

--
-- 表的结构 `simple_user`
--

DROP TABLE IF EXISTS `simple_user`;
CREATE TABLE IF NOT EXISTS `simple_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `md5password` char(32) NOT NULL COMMENT 'MD5密码',
  `createtime` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户';

--
-- 转存表中的数据 `simple_user`
--

INSERT INTO `simple_user` (`uid`, `username`, `md5password`, `createtime`) VALUES
(1, 'setimouse@qq.com', 'a96a2799c347f82332c7b1d6d148146f', 1484728318);

-- --------------------------------------------------------

--
-- 表的结构 `solution`
--

DROP TABLE IF EXISTS `solution`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户提交代码';

--
-- 转存表中的数据 `solution`
--

INSERT INTO `solution` (`id`, `uid`, `qno`, `lang`, `code`, `createtime`, `updatetime`) VALUES
(1, 1, 1, 'php', '<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  array    $nums\\r\\n     * @param  int      $target\\r\\n     * @return array\\r\\n     */\\r\\n    public function twoSum($nums, $target) {\\r\\n        return [0, 1];\\r\\n    }\\r\\n\\r\\n}\\r\\n', '2017-01-19 03:31:42', '2017-01-19 05:06:50'),
(7, 1, 2, 'php', '<?php\\r\\n/**\\r\\n * 已定义的链表节点类\\r\\n * class ListNode {\\r\\n *     public $val;\\r\\n *     public $next;\\r\\n *     function __construct($val, $next = null) {\\r\\n *         $this->val = $val;\\r\\n *         $this->next = $next;\\r\\n *     }\\r\\n * }\\r\\n */\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  ListNode $listA\\r\\n     * @param  ListNode $listB\\r\\n     * @return ListNode\\r\\n     */\\r\\n    public function getIntersectionNode(ListNode $listA, ListNode $listB) {\\r\\n        $tailA = $listA;\\r\\n        while ($tailA->next) {\\r\\n            $tailA = $tailA->next;\\r\\n        }\\r\\n        \\r\\n        $tailB = $listB;\\r\\n        while ($tailB->next) {\\r\\n            $tailB = $tailB->next;\\r\\n        }\\r\\n        \\r\\n        if ($tailB == $tailA) {\\r\\n            return [$tailA, $tailB];\\r\\n        }\\r\\n        return null;\\r\\n    }\\r\\n\\r\\n}\\r\\n', '2017-01-22 03:15:17', '2017-02-06 07:01:10'),
(37, 1, 3, 'php', '<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  Array $array\\r\\n     * @return int\\r\\n     */\\r\\n    public function maxProduct($array) {\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n', '2017-01-22 09:00:31', '2017-01-22 09:13:10');
