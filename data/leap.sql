-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: mac    Database: leap
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COMMENT='正确提交';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accepted`
--

LOCK TABLES `accepted` WRITE;
/*!40000 ALTER TABLE `accepted` DISABLE KEYS */;
INSERT INTO `accepted` VALUES (16,1,1,'php','2017-02-28 03:16:00','2017-03-10 06:41:01'),(17,1,4,'php','2017-02-28 03:17:19','2017-03-08 05:36:27'),(18,1,1,'java','2017-03-10 06:48:31','2017-03-14 10:21:04'),(19,1,2,'java','2017-03-14 02:36:56','2017-03-14 02:36:56');
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
INSERT INTO `accepted_code` VALUES (16,'<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  array    $nums\\r\\n     * @param  int      $target\\r\\n     * @return array\\r\\n     */\\r\\n    public function twoSum($nums, $target) {\\r\\n        for ($i = 0; $i < count($nums); $i++) {\\r\\n            for ($j = 0; $j < $i; $j++) {\\r\\n                if ($nums[$i] + $nums[$j] == $target) {\\r\\n                    return [$i, $j];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n'),(17,'<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int  m\\r\\n     * @param  int  n\\r\\n     * @return int\\r\\n     */\\r\\n    public function howManyPath($m, $n) {\\r\\n        $dp = [];\\r\\n        for ($y = 0; $y < $n; $y++) {\\r\\n            for ($x = 0; $x < $m; $x++) {\\r\\n                if (0 === $x || 0 === $y) {\\r\\n                    $dp[$y][$x] = 1;\\r\\n                } else {\\r\\n                    $dp[$y][$x] = $dp[$y - 1][$x] + $dp[$y][$x - 1];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return $dp[$n - 1][$m - 1];\\r\\n    }\\r\\n\\r\\n}\\r\\n'),(18,'public class Solution {\\r\\n\\r\\n    public int[] twoSum(int[] nums, int target) {\\r\\n        for (int i = 0; i < nums.length; i++) {\\r\\n            for (int j = 0; j < i; j++) {\\r\\n                if (nums[i] + nums[j] == target) {\\r\\n                    return new int[]{i, j};\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return new int[]{};\\r\\n    }\\r\\n\\r\\n}'),(19,'public class Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int  m\\r\\n     * @param  int  n\\r\\n     * @return int\\r\\n     */\\r\\n    public int howManyPath(int m, int n) {\\r\\n        int[][] dp = new int[n][m];\\r\\n        for (int y = 0; y < n; y++) {\\r\\n            for (int x = 0; x < m; x++) {\\r\\n                if (0 == x || 0 == y) {\\r\\n                    dp[y][x] = 1;\\r\\n                } else {\\r\\n                    dp[y][x] = dp[y - 1][x] + dp[y][x - 1];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return dp[n - 1][m - 1];\\r\\n    }\\r\\n\\r\\n}');
/*!40000 ALTER TABLE `accepted_code` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='问题';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'两数之和',1,'two-sum',1),(2,3,'链表的交点',3,'linked-list-intersection',1),(3,6,'子数组的最大乘积',5,'max-product-of-sub-array',0),(4,2,'共有多少条路径',4,'how-many-path',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simple_user`
--

LOCK TABLES `simple_user` WRITE;
/*!40000 ALTER TABLE `simple_user` DISABLE KEYS */;
INSERT INTO `simple_user` VALUES (1,'setimouse@qq.com','a96a2799c347f82332c7b1d6d148146f',1484728318),(5,'werq','a96a2799c347f82332c7b1d6d148146f',1487576554);
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
) ENGINE=InnoDB AUTO_INCREMENT=436 DEFAULT CHARSET=utf8mb4 COMMENT='用户提交代码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution`
--

LOCK TABLES `solution` WRITE;
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` VALUES (7,1,3,'php','<?php\\r\\n/**\\r\\n * 已定义的链表节点类\\r\\n * class ListNode {\\r\\n *     public $val;\\r\\n *     public $next;\\r\\n *     function __construct($val, $next = null) {\\r\\n *         $this->val = $val;\\r\\n *         $this->next = $next;\\r\\n *     }\\r\\n * }\\r\\n */\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  ListNode $listA\\r\\n     * @param  ListNode $listB\\r\\n     * @return ListNode\\r\\n     */\\r\\n    public function getIntersectionNode(ListNode $listA, ListNode $listB) {\\r\\n        $tailA = $listA;\\r\\n        while ($tailA->next) {\\r\\n            $tailA = $tailA->next;\\r\\n        }\\r\\n        \\r\\n        $tailB = $listB;\\r\\n        while ($tailB->next) {\\r\\n            $tailB = $tailB->next;\\r\\n        }\\r\\n        \\r\\n        if ($tailB == $tailA) {\\r\\n            return $listA->next->next;\\r\\n        }\\r\\n        return null;\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-01-22 03:15:17','2017-03-15 09:17:50'),(37,1,6,'php','<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  Array $array\\r\\n     * @return int\\r\\n     */\\r\\n    public function maxProduct($array) {\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-01-22 09:00:31','2017-01-22 09:13:10'),(142,1,2,'php','<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int  m\\r\\n     * @param  int  n\\r\\n     * @return int\\r\\n     */\\r\\n    public function howManyPath($m, $n) {\\r\\n        $dp = [];\\r\\n        for ($y = 0; $y < $n; $y++) {\\r\\n            for ($x = 0; $x < $m; $x++) {\\r\\n                if (0 === $x || 0 === $y) {\\r\\n                    $dp[$y][$x] = 1;\\r\\n                } else {\\r\\n                    $dp[$y][$x] = $dp[$y - 1][$x] + $dp[$y][$x - 1];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return $dp[$n - 1][$m - 1];\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-02-16 08:37:19','2017-03-08 05:36:26'),(233,1,1,'php','<?php\\r\\nclass Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  array    $nums\\r\\n     * @param  int      $target\\r\\n     * @return array\\r\\n     */\\r\\n    public function twoSum($nums, $target) {\\r\\n        for ($i = 0; $i < count($nums); $i++) {\\r\\n            for ($j = 0; $j < $i; $j++) {\\r\\n                if ($nums[$i] + $nums[$j] == $target) {\\r\\n                    return [$i, $j];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-03-08 09:05:11','2017-03-10 06:41:00'),(235,1,1,'java','public class Solution {\\r\\n\\r\\n    public int[] twoSum(int[] nums, int target) {\\r\\n        for (int i = 0; i < nums.length; i++) {\\r\\n            for (int j = 0; j < i; j++) {\\r\\n                if (nums[i] + nums[j] == target) {\\r\\n                    return new int[]{i, j};\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return new int[]{};\\r\\n    }\\r\\n\\r\\n}','2017-03-08 09:06:15','2017-03-14 10:20:59'),(401,1,2,'java','public class Solution {\\r\\n\\r\\n    /**\\r\\n     * @param  int  m\\r\\n     * @param  int  n\\r\\n     * @return int\\r\\n     */\\r\\n    public int howManyPath(int m, int n) {\\r\\n        int[][] dp = new int[n][m];\\r\\n        for (int y = 0; y < n; y++) {\\r\\n            for (int x = 0; x < m; x++) {\\r\\n                if (0 == x || 0 == y) {\\r\\n                    dp[y][x] = 1;\\r\\n                } else {\\r\\n                    dp[y][x] = dp[y - 1][x] + dp[y][x - 1];\\r\\n                }\\r\\n            }\\r\\n        }\\r\\n        return dp[n - 1][m - 1];\\r\\n    }\\r\\n\\r\\n}','2017-03-14 02:31:06','2017-03-14 02:36:53'),(412,1,3,'java','/**\\r\\n * Definition for singly-linked list.\\r\\n * public class ListNode {\\r\\n *     int val;\\r\\n *     ListNode next;\\r\\n *     ListNode(int x) {\\r\\n *         val = x;\\r\\n *         next = null;\\r\\n *     }\\r\\n * }\\r\\n */\\r\\npublic class Solution {\\r\\n\\r\\n    public ListNode getIntersectionNode(ListNode headA, ListNode headB) {\\r\\n        return new ListNode(\\\"c1\\\");\\r\\n    }\\r\\n\\r\\n}\\r\\n','2017-03-15 06:53:40','2017-03-15 10:10:45');
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;
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
INSERT INTO `user_info` VALUES (1,'setimouse','lee','student','a'),(5,'setimouse@qq.com','','','');
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

-- Dump completed on 2017-03-15 18:20:10
