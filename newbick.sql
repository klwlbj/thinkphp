# Host: localhost  (Version: 5.5.53)
# Date: 2018-10-09 20:17:56
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "bk_admin"
#

DROP TABLE IF EXISTS `bk_admin`;
CREATE TABLE `bk_admin` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "bk_admin"
#

/*!40000 ALTER TABLE `bk_admin` DISABLE KEYS */;
INSERT INTO `bk_admin` VALUES (8,'123456','e10adc3949ba59abbe56e057f20f883e'),(9,'asd','123456');
/*!40000 ALTER TABLE `bk_admin` ENABLE KEYS */;

#
# Structure for table "bk_article"
#

DROP TABLE IF EXISTS `bk_article`;
CREATE TABLE `bk_article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `click` mediumint(9) NOT NULL DEFAULT '0',
  `like` mediumint(9) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  `cateid` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "bk_article"
#

INSERT INTO `bk_article` VALUES (1,'1','1','1','4243','/newbick/public\\uploads/20181001\\d3a4c8a7c7e0a8328e98246bfeedf079.png','<p>1</p>',0,0,0,14);

#
# Structure for table "bk_cate"
#

DROP TABLE IF EXISTS `bk_cate`;
CREATE TABLE `bk_cate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '栏目名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目类型：1.列表栏 2.单页栏3:pic',
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  `sort` mediumint(9) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "bk_cate"
#

/*!40000 ALTER TABLE `bk_cate` DISABLE KEYS */;
INSERT INTO `bk_cate` VALUES (13,'中国',1,0,50),(14,'广西',1,13,50),(15,'广东',1,13,53),(16,'朝鮮',1,0,50),(17,'平壤',1,16,50),(18,'福建',1,13,2);
/*!40000 ALTER TABLE `bk_cate` ENABLE KEYS */;

#
# Structure for table "bk_conf"
#

DROP TABLE IF EXISTS `bk_conf`;
CREATE TABLE `bk_conf` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cnname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `enname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "bk_conf"
#

INSERT INTO `bk_conf` VALUES (1,'地址','address',1,'www.baidu.com','www.baidu.com',50),(4,'web','web',5,'3','3,2',50),(6,'是否关閉','closeornot',3,'是','是,否',50),(7,'站點描述','site',2,'www.google.com                                                                                   ','',50),(8,'cache','cache',5,'2 hours','1 hours,2 hours',50),(9,'驗證碼','code',4,'是','是',50);

#
# Structure for table "bk_link"
#

DROP TABLE IF EXISTS `bk_link`;
CREATE TABLE `bk_link` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` mediumint(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "bk_link"
#

INSERT INTO `bk_link` VALUES (2,'google','google','http://www.google.com.hk',1),(3,'facebook','脸书','http://www.facebook.com',2);
