-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: mysqlserver    Database: leap
-- ------------------------------------------------------
-- Server version	5.5.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `leap`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `leap` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `leap`;

--
-- Table structure for table `accepted`
--

DROP TABLE IF EXISTS `accepted`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accepted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `lang` varchar(16) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`,`qno`,`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COMMENT='正确提交';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accepted`
--

LOCK TABLES `accepted` WRITE;
/*!40000 ALTER TABLE `accepted` DISABLE KEYS */;
INSERT INTO `accepted` VALUES (16,1,1,'php','2017-02-28 03:16:00','2017-03-22 07:52:21'),(18,1,1,'java','2017-03-10 06:48:31','2017-03-22 07:52:14'),(19,1,2,'java','2017-03-14 02:36:56','2017-03-21 06:02:10'),(20,1,3,'java','2017-03-16 03:05:02','2017-03-23 08:40:32'),(21,1,6,'java','2017-03-28 10:31:39','2017-03-30 10:04:51');
/*!40000 ALTER TABLE `accepted` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accepted_code`
--

DROP TABLE IF EXISTS `accepted_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accepted_code` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `accepted_code_ibfk_1` FOREIGN KEY (`id`) REFERENCES `accepted` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='正确提交_代码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accepted_code`
--

LOCK TABLES `accepted_code` WRITE;
/*!40000 ALTER TABLE `accepted_code` DISABLE KEYS */;
INSERT INTO `accepted_code` VALUES (16,'<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  array    $nums\\r\\n     * @param  int      $target\\r\\n     * @return array\\r\\n     */\\r\\n    public function twoSum($nums, $target) {\\r\\n        for ($i = 0; $i < count($nums); $i++) {\\r\\n            for ($j = 0; $j < $i; $j++) {\\r\\n                if ($nums[$i] + $nums[$j] == $target) {\\r\\n                    return [$i, $j];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n'),(18,'public class Solution {\\r\\n\\r\\n    public int[] twoSum(int[] nums, int target) {\\r\\n        for (int i = 0; i < nums.length; i++) {\\r\\n            for (int j = 0; j < i; j++) {\\r\\n                if (nums[i] + nums[j] == target) {\\r\\n                    return new int[]{i, j};\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return new int[]{};\\r\\n    }\\r\\n\\r\\n}'),(19,'public class Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int  m\\r\\n     * @param  int  n\\r\\n     * @return int\\r\\n     */\\r\\n    public int howManyPath(int m, int n) {\\r\\n        int[][] dp = new int[n][m];\\r\\n        for (int y = 0; y < n; y++) {\\r\\n            for (int x = 0; x < m; x++) {\\r\\n                if (0 == x || 0 == y) {\\r\\n                    dp[y][x] = 1;\\r\\n                } else {\\r\\n                    dp[y][x] = dp[y - 1][x] + dp[y][x - 1];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return dp[n - 1][m - 1];\\r\\n    }\\r\\n\\r\\n}'),(20,'/**\\r\\n * Definition for singly-linked list.\\r\\n * public class ListNode {\\r\\n *     int val;\\r\\n *     ListNode next;\\r\\n *     ListNode(int x) {\\r\\n *         val = x;\\r\\n *         next = null;\\r\\n *     }\\r\\n * }\\r\\n */\\r\\npublic class Solution {\\r\\n\\r\\n    public ListNode getIntersectionNode(ListNode headA, ListNode headB) {\\r\\n        ListNode p1 = headA, p2 = headB;\\r\\n        int len1 = 0, len2 = 0;\\r\\n        while (null != (p1 = p1.next())) {\\r\\n            len1++;\\r\\n        }\\r\\n        while (null != (p2 = p2.next())) {\\r\\n            len2++;\\r\\n        }\\r\\n\\r\\n        p1 = len1 > len2 ? headA : headB;\\r\\n        p2 = len1 > len2 ? headB : headA;\\r\\n\\r\\n        for (int i = 0; i < Math.abs(len1 - len2); i++) {\\r\\n            p1 = p1.next();\\r\\n        }\\r\\n\\r\\n        while (p1 != p2 && p1 != null && p2 != null) {\\r\\n            p1 = p1.next();\\r\\n            p2 = p2.next();\\r\\n        }\\r\\n\\r\\n        return p1;\\r\\n    }\\r\\n\\r\\n}\\r\\n'),(21,'/**\\r\\n * @author liyan\\r\\n * @since 2017 3 28\\r\\n */\\r\\npublic class Solution {\\r\\n\\r\\n    public int climb(int n) {\\r\\n        int f0 = 1;\\r\\n        int f1 = 1;\\r\\n        int fn = f0 + f1;\\r\\n        if (0 == n) {\\r\\n            return f0;\\r\\n        } else if (1 == n) {\\r\\n            return f1;\\r\\n        }\\r\\n        for (int i = 2; i <= n; i++) {\\r\\n            fn = f0 + f1;\\r\\n            f0 = f1;\\r\\n            f1 = fn; \\r\\n        }\\r\\n        return fn;\\r\\n    }\\r\\n\\r\\n}');
/*!40000 ALTER TABLE `accepted_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_tag`
--

DROP TABLE IF EXISTS `question_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qno` int(11) NOT NULL COMMENT '问题id',
  `tid` int(11) NOT NULL COMMENT '标签id',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `qno` (`qno`,`tid`),
  KEY `tid` (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='问题与标签关系';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_tag`
--

LOCK TABLES `question_tag` WRITE;
/*!40000 ALTER TABLE `question_tag` DISABLE KEYS */;
INSERT INTO `question_tag` VALUES (1,2,1,'2017-03-27 08:45:52','2017-03-27 08:45:52'),(2,4,1,'2017-03-27 08:45:52','2017-03-27 08:45:52'),(3,6,1,'2017-03-28 10:15:54','2017-03-28 10:15:54'),(4,7,2,'2017-03-29 03:02:31','2017-03-29 03:02:31'),(5,3,3,'2017-03-30 05:39:42','2017-03-30 05:39:42'),(6,9,4,'2017-04-01 09:13:57','2017-04-01 09:13:57'),(7,9,5,'2017-04-01 10:15:50','2017-04-01 10:15:50');
/*!40000 ALTER TABLE `question_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qno` int(11) NOT NULL COMMENT '问题编号',
  `title` varchar(256) NOT NULL,
  `difficulty` smallint(6) NOT NULL COMMENT '难度（1-5）',
  `seo_title` varchar(128) NOT NULL COMMENT '对SEO友好的title',
  `pub` tinyint(1) NOT NULL COMMENT '是否上线',
  PRIMARY KEY (`id`),
  UNIQUE KEY `seo_title` (`seo_title`),
  UNIQUE KEY `qno` (`qno`),
  KEY `pub` (`pub`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='问题';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'两数之和',1,'two-sum',1),(2,3,'链表的交点',2,'linked-list-intersection',1),(3,999,'子数组的最大乘积',5,'max-product-of-sub-array',0),(4,2,'共有多少条路径',3,'how-many-path',1),(5,4,'股票交易的最大收益',2,'max-transaction-profit',1),(6,5,'质数判断',1,'prime-number',1),(7,6,'经典爬楼梯',1,'climb-stairs',1),(8,7,'数组跳跃游戏',2,'array-jump',1),(9,8,'LFU缓存',5,'lfu-cache',1),(10,9,'岛屿数量',4,'number-of-islands',1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `simple_user`
--

DROP TABLE IF EXISTS `simple_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `simple_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `md5password` char(32) NOT NULL COMMENT 'MD5密码',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simple_user`
--

LOCK TABLES `simple_user` WRITE;
/*!40000 ALTER TABLE `simple_user` DISABLE KEYS */;
INSERT INTO `simple_user` VALUES (1,'setimouse@qq.com','0ece28b8a297c556eda7295ee3d836a5',1490259814);
/*!40000 ALTER TABLE `simple_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution`
--

DROP TABLE IF EXISTS `solution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `lang` varchar(32) NOT NULL COMMENT '开发语言',
  `code` text NOT NULL COMMENT '代码',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`,`qno`,`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=542 DEFAULT CHARSET=utf8mb4 COMMENT='用户提交代码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution`
--

LOCK TABLES `solution` WRITE;
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` VALUES (7,1,3,'php','<?php\\r\\n/**\\r\\n * 已定义的链表节点类\\r\\n * class ListNode {\\r\\n *     public $val;\\r\\n *     public $next;\\r\\n *     function __construct($val, $next = null) {\\r\\n *         $this->val = $val;\\r\\n *         $this->next = $next;\\r\\n *     }\\r\\n * }\\r\\n */\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  ListNode $listA\\r\\n     * @param  ListNode $listB\\r\\n     * @return ListNode\\r\\n     */\\r\\n    public function getIntersectionNode(ListNode $listA, ListNode $listB) {\\r\\n        $tailA = $listA;\\r\\n        while ($tailA->next) {\\r\\n            $tailA = $tailA->next;\\r\\n        }\\r\\n        \\r\\n        $tailB = $listB;\\r\\n        while ($tailB->next) {\\r\\n            $tailB = $tailB->next;\\r\\n        }\\r\\n        \\r\\n        if ($tailB == $tailA) {\\r\\n            return $listA->next->next;\\r\\n        }\\r\\n        return null;\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-01-22 03:15:17','2017-03-15 09:17:50'),(142,1,2,'php','<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int  m\\r\\n     * @param  int  n\\r\\n     * @return int\\r\\n     */\\r\\n    public function howManyPath($m, $n) {\\r\\n        $dp = [];\\r\\n        for ($y = 0; $y < $n; $y++) {\\r\\n            for ($x = 0; $x < $m; $x++) {\\r\\n                if (0 === $x || 0 === $y) {\\r\\n                    $dp[$y][$x] = 1;\\r\\n                } else {\\r\\n                    $dp[$y][$x] = $dp[$y - 1][$x] + $dp[$y][$x - 1];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return $dp[$n - 1][$m - 1];\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-02-16 08:37:19','2017-03-08 05:36:26'),(233,1,1,'php','<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  array    $nums\\r\\n     * @param  int      $target\\r\\n     * @return array\\r\\n     */\\r\\n    public function twoSum($nums, $target) {\\r\\n        for ($i = 0; $i < count($nums); $i++) {\\r\\n            for ($j = 0; $j < $i; $j++) {\\r\\n                if ($nums[$i] + $nums[$j] == $target) {\\r\\n                    return [$i, $j];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-03-08 09:05:11','2017-03-22 07:52:20'),(235,1,1,'java','public class Solution {\\r\\n\\r\\n    public int[] twoSum(int[] nums, int target) {\\r\\n        for (int i = 0; i < nums.length; i++) {\\r\\n            for (int j = 0; j < i; j++) {\\r\\n                if (nums[i] + nums[j] == target) {\\r\\n                    return new int[]{i, j};\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return new int[]{};\\r\\n    }\\r\\n\\r\\n}','2017-03-08 09:06:15','2017-03-22 07:52:11'),(401,1,2,'java','public class Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int  m\\r\\n     * @param  int  n\\r\\n     * @return int\\r\\n     */\\r\\n    public int howManyPath(int m, int n) {\\r\\n        int[][] dp = new int[n][m];\\r\\n        for (int y = 0; y < n; y++) {\\r\\n            for (int x = 0; x < m; x++) {\\r\\n                if (0 == x || 0 == y) {\\r\\n                    dp[y][x] = 1;\\r\\n                } else {\\r\\n                    dp[y][x] = dp[y - 1][x] + dp[y][x - 1];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return dp[n - 1][m - 1];\\r\\n    }\\r\\n\\r\\n}','2017-03-14 02:31:06','2017-03-21 06:01:59'),(412,1,3,'java','/**\\r\\n * Definition for singly-linked list.\\r\\n * public class ListNode {\\r\\n *     int val;\\r\\n *     ListNode next;\\r\\n *     ListNode(int x) {\\r\\n *         val = x;\\r\\n *         next = null;\\r\\n *     }\\r\\n * }\\r\\n */\\r\\npublic class Solution {\\r\\n\\r\\n    public ListNode getIntersectionNode(ListNode headA, ListNode headB) {\\r\\n        ListNode p1 = headA, p2 = headB;\\r\\n        int len1 = 0, len2 = 0;\\r\\n        while (null != (p1 = p1.next())) {\\r\\n            len1++;\\r\\n        }\\r\\n        while (null != (p2 = p2.next())) {\\r\\n            len2++;\\r\\n        }\\r\\n\\r\\n        p1 = len1 > len2 ? headA : headB;\\r\\n        p2 = len1 > len2 ? headB : headA;\\r\\n\\r\\n        for (int i = 0; i < Math.abs(len1 - len2); i++) {\\r\\n            p1 = p1.next();\\r\\n        }\\r\\n\\r\\n        while (p1 != p2 && p1 != null && p2 != null) {\\r\\n            p1 = p1.next();\\r\\n            p2 = p2.next();\\r\\n        }\\r\\n\\r\\n        return p1;\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-03-15 06:53:40','2017-03-23 08:40:28'),(485,1,4,'php','<?php\\r\\n/**\\r\\n * 股票交易的最大收益\\r\\n */\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  array[int] $prices\\r\\n     * @return int\\r\\n     */\\r\\n    public function maxProfit($prices) {\\r\\n        return 5;\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-03-23 07:19:56','2017-03-27 07:51:37'),(487,1,4,'java','public class Solution {\\r\\n    public int maxProfit(int[] prices) {\\r\\n        return 1;\\r\\n    }\\r\\n}','2017-03-23 07:51:46','2017-03-23 08:39:33'),(488,1,6,'java','/**\\r\\n * @author liyan\\r\\n * @since 2017 3 28\\r\\n */\\r\\npublic class Solution {\\r\\n\\r\\n    public int climb(int n) {\\r\\n        int f0 = 1;\\r\\n        int f1 = 1;\\r\\n        int fn = f0 + f1;\\r\\n        if (0 == n) {\\r\\n            return f0;\\r\\n        } else if (1 == n) {\\r\\n            return f1;\\r\\n        }\\r\\n        for (int i = 2; i <= n; i++) {\\r\\n            fn = f0 + f1;\\r\\n            f0 = f1;\\r\\n            f1 = fn; \\r\\n        }\\r\\n        return fn;\\r\\n    }\\r\\n\\r\\n}','2017-03-28 10:23:29','2017-03-30 10:04:49'),(493,1,7,'java','/**\\r\\n * @author liyan\\r\\n * @since 2017 3 29\\r\\n */\\r\\npublic class Solution {\\r\\n\\r\\n    public boolean canJump(int[] A) {\\r\\n        // write your code here\\r\\n        return true;\\r\\n    }\\r\\n\\r\\n}','2017-03-29 03:31:07','2017-03-29 03:31:07'),(494,1,8,'java','/**\\r\\n * @author leetcode\\r\\n * @since 2017 3 30\\r\\n */\\r\\npublic class LFUCache {\\r\\n\\r\\n    public LFUCache(int capacity) {\\r\\n\\r\\n    }\\r\\n\\r\\n    public int get(int key) {\\r\\n        return 1;\\r\\n    }\\r\\n\\r\\n    public void put(int key, int value) {\\r\\n\\r\\n    }\\r\\n}\\r\\n\\r\\n/**\\r\\n * Your LFUCache object will be instantiated and called as such:\\r\\n * LFUCache obj = new LFUCache(capacity);\\r\\n * int param_1 = obj.get(key);\\r\\n * obj.put(key,value);\\r\\n */','2017-03-30 10:01:06','2017-03-31 03:08:32'),(497,1,6,'php','<?php\\r\\n/**\\r\\n * @author liyan\\r\\n * @since 2017 3 28\\r\\n */\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int    $n\\r\\n     * @return int\\r\\n     */\\r\\n    public function climb($n) {\\r\\n        // write your code here\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-03-30 10:09:38','2017-03-30 10:09:38'),(513,1,8,'php','<?php\\r\\n/**\\r\\n * @author liyan\\r\\n * @since 2017 4 1\\r\\n */\\r\\nclass LFUCache {\\r\\n\\r\\n    function __construct($capacity) {\\r\\n         # code...\\r\\n\\r\\n    }\\r\\n\\r\\n    public function get($key) {\\r\\n        return 1;\\r\\n    }\\r\\n\\r\\n    public function put($key, $value) {\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-04-01 03:24:12','2017-04-01 03:52:26'),(520,1,9,'java','/**\\r\\n * @author liyan\\r\\n * @since 2017 4 1\\r\\n */\\r\\npublic class Solution {\\r\\n\\r\\n    public int numIslands(int[][] map) {\\r\\n        // write your code here\\r\\n        return 3;\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-04-01 08:09:26','2017-04-01 08:46:34'),(540,1,9,'php','<?php\\r\\n/**\\r\\n * @author liyan\\r\\n * @since 2017 4 1\\r\\n */\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param int[][] $map\\r\\n     * @return int\\r\\n     */\\r\\n    public function numIslands($map) {\\r\\n        // write your code here.\\r\\n        return 3;\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-04-01 09:05:05','2017-04-01 09:05:16');
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(64) NOT NULL COMMENT '标签名',
  `seo_tagname` varchar(128) NOT NULL COMMENT 'SEO标签名',
  `vol` int(11) NOT NULL DEFAULT '0' COMMENT '标签数量',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `seo_tagname` (`seo_tagname`),
  UNIQUE KEY `tagname` (`tagname`),
  KEY `vol` (`vol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='标签';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'动态规划','dynamic-programming',0,'2017-03-27 08:39:53','2017-03-27 08:39:53'),(2,'贪心','greedy',0,'2017-03-29 03:02:11','2017-03-29 03:02:11'),(3,'链表','linked-list',0,'2017-03-30 05:39:10','2017-03-30 05:39:10'),(4,'并查集','union-find',0,'2017-04-01 09:13:36','2017-04-01 09:13:36'),(5,'AC自动机','ac-automaton',0,'2017-04-01 10:15:21','2017-04-01 10:15:21');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `uid` int(11) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `realname` varchar(32) NOT NULL COMMENT '真实姓名',
  `occupation` enum('','student','professional') NOT NULL COMMENT '身份',
  `aboutme` text NOT NULL COMMENT '关于我',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户信息';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,'setimouse','','','');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-01 18:18:11
