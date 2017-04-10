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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COMMENT='问题';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'两数之和',1,'two-sum',1),(2,3,'链表的交点',2,'linked-list-intersection',1),(3,999,'子数组的最大乘积',5,'max-product-of-sub-array',0),(4,2,'共有多少条路径',3,'how-many-path',1),(5,4,'股票交易的最大收益',2,'max-transaction-profit',1),(6,5,'质数判断',1,'prime-number',1),(7,6,'经典爬楼梯',1,'climb-stairs',1),(8,7,'数组跳跃游戏',2,'array-jump',1),(9,8,'LFU缓存',5,'lfu-cache',1),(10,9,'岛屿数量',4,'number-of-islands',1),(11,10,'螺旋遍历数组',3,'spiral-matrix',1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-10 18:27:43
