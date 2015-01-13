<?php die();?>DROP TABLE IF EXISTS `dy_account`
CREATE TABLE `dy_account` (  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `orderid` char(30) NOT NULL DEFAULT '0',  `money` decimal(10,2) NOT NULL DEFAULT '0.00',  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',  `custom` varchar(200) NOT NULL,  `payment` char(50) NOT NULL,  `paymenttype` tinyint(1) unsigned NOT NULL DEFAULT '1',  `paymentno` char(100) NOT NULL,  `molds` char(30) NOT NULL,  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  `auser` char(30) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_admin_group`
CREATE TABLE `dy_admin_group` (  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `name` char(20) NOT NULL,  `audit` tinyint(1) unsigned NOT NULL DEFAULT '0',  `oneself` tinyint(1) unsigned NOT NULL DEFAULT '0',  `paction` text NOT NULL,  PRIMARY KEY (`gid`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_admin_per`
CREATE TABLE `dy_admin_per` (  `pid` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,  `action` char(50) NOT NULL,  `name` char(20) NOT NULL,  `up` tinyint(5) NOT NULL DEFAULT '0',  `no` tinyint(1) unsigned NOT NULL DEFAULT '0',  `orders` int(10) unsigned NOT NULL DEFAULT '0',  `molds` char(30) NOT NULL,  PRIMARY KEY (`pid`)) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_admin_user`
CREATE TABLE `dy_admin_user` (  `auid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `auser` char(20) NOT NULL,  `apass` char(32) NOT NULL,  `aname` char(30) NOT NULL,  `amail` char(100) NOT NULL,  `atel` char(100) NOT NULL,  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',  `gid` smallint(5) unsigned NOT NULL DEFAULT '0',  `pclasstype` text NOT NULL,  PRIMARY KEY (`auid`)) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_ads`
CREATE TABLE `dy_ads` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `taid` smallint(5) unsigned NOT NULL DEFAULT '0',  `orders` int(10) NOT NULL DEFAULT '0',  `name` char(100) NOT NULL,  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',  `adsw` smallint(5) unsigned NOT NULL DEFAULT '0',  `adsh` smallint(5) unsigned NOT NULL DEFAULT '0',  `adfile` char(200) NOT NULL,  `body` text NOT NULL,  `gourl` char(200) NOT NULL,  `target` char(8) NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_adstype`
CREATE TABLE `dy_adstype` (  `taid` smallint(5) NOT NULL AUTO_INCREMENT,  `name` char(100) NOT NULL,  `adsw` smallint(5) unsigned NOT NULL DEFAULT '0',  `adsh` smallint(5) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`taid`)) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_article`
CREATE TABLE `dy_article` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `tid` smallint(5) unsigned NOT NULL DEFAULT '0',  `sid` smallint(5) unsigned NOT NULL DEFAULT '0',  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0',  `title` char(100) NOT NULL,  `style` char(60) NOT NULL,  `trait` char(50) NOT NULL,  `gourl` char(255) NOT NULL,  `htmlfile` char(100) NOT NULL,  `htmlurl` char(255) NOT NULL,  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  `hits` int(10) unsigned NOT NULL DEFAULT '0',  `litpic` char(255) NOT NULL,  `orders` int(10) NOT NULL DEFAULT '0',  `mrank` smallint(5) NOT NULL DEFAULT '0',  `mgold` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',  `keywords` char(200) NOT NULL,  `description` char(255) NOT NULL,  `user` char(30) NOT NULL,  `usertype` tinyint(2) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`id`),  KEY `orbye` (`orders`,`addtime`),  KEY `article` (`isshow`,`tid`,`trait`,`sid`)) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_article_field`
CREATE TABLE `dy_article_field` (  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `body` mediumtext NOT NULL,  PRIMARY KEY (`aid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_attribute`
CREATE TABLE `dy_attribute` (  `sid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `tid` mediumint(8) unsigned NOT NULL,  `name` char(100) NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  `orders` int(10) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`sid`),  KEY `attribute` (`tid`,`isshow`),  KEY `attribute_orbye` (`orders`)) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_attribute_type`
CREATE TABLE `dy_attribute_type` (  `tid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `name` char(100) NOT NULL,  `classtype` text NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  `orders` int(10) NOT NULL DEFAULT '0',  PRIMARY KEY (`tid`)) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_classtype`
CREATE TABLE `dy_classtype` (  `tid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `molds` char(20) NOT NULL,  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',  `classname` char(50) NOT NULL,  `gourl` char(255) NOT NULL,  `litpic` char(200) NOT NULL,  `title` char(100) NOT NULL,  `keywords` char(255) NOT NULL,  `description` varchar(300) NOT NULL,  `isindex` tinyint(1) unsigned NOT NULL DEFAULT '1',  `t_index` char(50) NOT NULL,  `t_list` char(50) NOT NULL,  `t_listimg` char(50) NOT NULL,  `t_listb` char(50) NOT NULL,  `t_content` char(50) NOT NULL,  `listnum` mediumint(8) unsigned NOT NULL DEFAULT '0',  `htmldir` char(100) NOT NULL,  `htmlfile` char(100) NOT NULL,  `mrank` smallint(5) NOT NULL DEFAULT '0',  `msubmit` smallint(5) NOT NULL DEFAULT '0',  `orders` int(10) NOT NULL DEFAULT '0',  `body` mediumtext NOT NULL,  `mshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  `imgw` smallint(5) unsigned NOT NULL DEFAULT '0',  `imgh` smallint(5) unsigned NOT NULL DEFAULT '0',  `unit` char(20) NOT NULL,  PRIMARY KEY (`tid`)) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_comment`
CREATE TABLE `dy_comment` (  `cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `aid` mediumint(8) unsigned NOT NULL,  `molds` char(20) NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0',  `body` text NOT NULL,  `reply` text NOT NULL,  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  `retime` int(10) unsigned NOT NULL DEFAULT '0',  `user` char(30) NOT NULL,  `ruser` char(30) NOT NULL,  PRIMARY KEY (`cid`)) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_custom`
CREATE TABLE `dy_custom` (  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,  `name` char(200) NOT NULL,  `dir` char(100) NOT NULL,  `template` char(100) NOT NULL,  `file` char(200) NOT NULL,  `html` tinyint(1) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_fields`
CREATE TABLE `dy_fields` (  `fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `molds` char(20) NOT NULL,  `fieldsname` char(20) NOT NULL,  `fields` char(20) NOT NULL,  `fieldstype` char(20) NOT NULL,  `fieldslong` smallint(5) unsigned NOT NULL DEFAULT '0',  `selects` text NOT NULL,  `fieldorder` int(10) NOT NULL DEFAULT '0',  `issubmit` tinyint(1) unsigned NOT NULL DEFAULT '1',  `lists` tinyint(1) unsigned NOT NULL DEFAULT '0',  `fieldshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  `types` text NOT NULL,  `contingency` char(20) NOT NULL,  `imgw` smallint(6) NOT NULL DEFAULT '0',  `imgh` smallint(6) NOT NULL DEFAULT '0',  PRIMARY KEY (`fid`)) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_funs`
CREATE TABLE `dy_funs` (  `fid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `funs` char(20) NOT NULL,  `fundb` char(255) NOT NULL,  `name` char(20) NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  `afiles` text NOT NULL,  `version` char(20) NOT NULL,  PRIMARY KEY (`fid`)) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_goodscart`
CREATE TABLE `dy_goodscart` (  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `num` mediumint(8) unsigned NOT NULL DEFAULT '1',  `attribute` text NOT NULL,  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_labelcus`
CREATE TABLE `dy_labelcus` (  `id` smallint(5) NOT NULL AUTO_INCREMENT,  `name` char(50) NOT NULL,  `body` text NOT NULL,  `type` tinyint(1) NOT NULL DEFAULT '1',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_links`
CREATE TABLE `dy_links` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `taid` smallint(5) unsigned NOT NULL DEFAULT '0',  `orders` int(10) NOT NULL DEFAULT '0',  `name` char(100) NOT NULL,  `image` char(200) NOT NULL,  `gourl` char(200) NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_linkstype`
CREATE TABLE `dy_linkstype` (  `taid` smallint(5) NOT NULL AUTO_INCREMENT,  `name` char(100) NOT NULL,  PRIMARY KEY (`taid`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_member`
CREATE TABLE `dy_member` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `user` char(20) NOT NULL,  `pass` char(32) NOT NULL,  `email` char(100) NOT NULL,  `gid` smallint(5) NOT NULL DEFAULT '1',  `money` decimal(10,2) NOT NULL DEFAULT '0.00',  `regtime` int(10) unsigned NOT NULL DEFAULT '0',  `token` char(35) NOT NULL,  `tokentime` int(11) NOT NULL DEFAULT '0',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_member_field`
CREATE TABLE `dy_member_field` (  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`aid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_member_file`
CREATE TABLE `dy_member_file` (  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `ip` char(30) NOT NULL DEFAULT '0',  `url` char(255) NOT NULL,  `size` int(11) unsigned NOT NULL DEFAULT '0',  `fields` char(20) NOT NULL,  `hand` int(11) unsigned NOT NULL DEFAULT '0',  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `molds` char(20) NOT NULL,  PRIMARY KEY (`id`),  UNIQUE KEY `user` (`uid`,`url`,`size`,`fields`,`hand`)) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_member_group`
CREATE TABLE `dy_member_group` (  `gid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `sys` smallint(5) unsigned NOT NULL DEFAULT '0',  `name` char(20) NOT NULL,  `weight` int(11) NOT NULL DEFAULT '0',  `audit` tinyint(1) unsigned NOT NULL DEFAULT '0',  `submit` tinyint(1) unsigned NOT NULL DEFAULT '0',  `filetype` char(255) NOT NULL,  `filesize` int(10) unsigned NOT NULL DEFAULT '0',  `fileallsize` int(10) unsigned NOT NULL DEFAULT '0',  `discount_type` tinyint(1) unsigned NOT NULL DEFAULT '0',  `discount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',  PRIMARY KEY (`gid`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_message`
CREATE TABLE `dy_message` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `tid` smallint(5) unsigned NOT NULL DEFAULT '0',  `fmolds` char(20) NOT NULL,  `faid` mediumint(8) NOT NULL DEFAULT '0',  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0',  `title` char(100) NOT NULL,  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  `retime` int(10) unsigned NOT NULL DEFAULT '0',  `orders` int(10) NOT NULL DEFAULT '0',  `user` char(30) NOT NULL,  `body` text NOT NULL,  `reply` text NOT NULL,  PRIMARY KEY (`id`),  KEY `orbye` (`orders`,`addtime`),  KEY `article` (`isshow`,`tid`)) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_message_field`
CREATE TABLE `dy_message_field` (  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `u_xueli` varchar(50) DEFAULT NULL,  `u_nianlin` varchar(50) DEFAULT NULL,  PRIMARY KEY (`aid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_molds`
CREATE TABLE `dy_molds` (  `mid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `molds` char(20) NOT NULL,  `molddb` char(255) NOT NULL,  `moldname` char(20) NOT NULL,  `orders` int(10) NOT NULL DEFAULT '0',  `t_index` char(50) NOT NULL,  `t_list` char(50) NOT NULL,  `t_listimg` char(50) NOT NULL,  `t_listb` char(50) NOT NULL,  `t_content` char(50) NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  `version` char(20) NOT NULL,  `sys` tinyint(1) unsigned NOT NULL DEFAULT '0',  `config` text NOT NULL,  PRIMARY KEY (`mid`)) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_order`
CREATE TABLE `dy_order` (  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `orderid` char(25) NOT NULL,  `favorable` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  `payment` char(50) NOT NULL,  `paymentno` char(100) NOT NULL,  `paytime` int(10) unsigned NOT NULL DEFAULT '0',  `actualpay` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',  `info` text NOT NULL,  `unote` text NOT NULL,  `rnote` text NOT NULL,  `anote` text NOT NULL,  `goods` text NOT NULL,  `logistics` char(100) NOT NULL,  `virtual` tinyint(1) unsigned NOT NULL DEFAULT '0',  `sendgoods` text NOT NULL,  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_payment`
CREATE TABLE `dy_payment` (  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `pay` char(30) NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0',  `name` char(100) NOT NULL,  `body` text NOT NULL,  `key` text NOT NULL,  `keyv` text NOT NULL,  `orders` int(11) NOT NULL DEFAULT '0',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_person`
CREATE TABLE `dy_person` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `tid` smallint(5) unsigned NOT NULL DEFAULT '0',  `sid` smallint(5) unsigned NOT NULL DEFAULT '0',  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0',  `title` char(100) NOT NULL,  `style` char(60) NOT NULL,  `trait` char(50) NOT NULL,  `gourl` char(255) NOT NULL,  `htmlfile` char(100) NOT NULL,  `htmlurl` char(255) NOT NULL,  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  `hits` int(10) unsigned NOT NULL DEFAULT '0',  `orders` int(10) NOT NULL DEFAULT '0',  `mrank` smallint(5) NOT NULL DEFAULT '0',  `mgold` int(10) unsigned NOT NULL DEFAULT '0',  `keywords` char(200) NOT NULL,  `description` char(255) NOT NULL,  `user` char(30) NOT NULL,  `usertype` tinyint(2) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`id`),  KEY `orbye` (`orders`,`addtime`),  KEY `person` (`isshow`,`tid`,`trait`,`sid`)) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_person_field`
CREATE TABLE `dy_person_field` (  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `gangwei` varchar(100) DEFAULT NULL,  `xueli` char(30) DEFAULT NULL,  `nianlin` varchar(50) DEFAULT NULL,  `xingbie` char(30) DEFAULT NULL,  `jingyan` char(30) DEFAULT NULL,  `jieshao` text,  PRIMARY KEY (`aid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_product`
CREATE TABLE `dy_product` (  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  `tid` smallint(5) unsigned NOT NULL DEFAULT '0',  `sid` smallint(5) unsigned NOT NULL DEFAULT '0',  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '0',  `title` char(100) NOT NULL,  `style` char(60) NOT NULL,  `trait` char(50) NOT NULL,  `gourl` char(255) NOT NULL,  `htmlfile` char(100) NOT NULL,  `htmlurl` char(255) NOT NULL,  `addtime` int(10) unsigned NOT NULL DEFAULT '0',  `record` int(10) unsigned NOT NULL DEFAULT '0',  `hits` int(10) unsigned NOT NULL DEFAULT '0',  `litpic` char(255) NOT NULL,  `photo` text NOT NULL,  `orders` int(10) NOT NULL DEFAULT '0',  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',  `virtual` tinyint(1) unsigned NOT NULL DEFAULT '0',  `logistics` text NOT NULL,  `mrank` smallint(5) NOT NULL DEFAULT '0',  `mgold` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',  `keywords` char(200) NOT NULL,  `description` char(255) NOT NULL,  `user` char(30) NOT NULL,  `usertype` tinyint(2) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`id`),  KEY `orbye` (`orders`,`addtime`),  KEY `product` (`isshow`,`tid`,`trait`,`sid`)) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_product_attribute`
CREATE TABLE `dy_product_attribute` (  `aid` mediumint(8) unsigned NOT NULL,  `tid` mediumint(8) unsigned NOT NULL,  `sid` mediumint(8) unsigned NOT NULL,  `price` decimal(10,2) NOT NULL DEFAULT '0.00',  KEY `product_attribute` (`aid`,`tid`,`sid`),  KEY `aid` (`aid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_product_discount`
CREATE TABLE `dy_product_discount` (  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `mgid` smallint(5) unsigned NOT NULL DEFAULT '0',  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',  `discount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',  KEY `aid` (`aid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_product_field`
CREATE TABLE `dy_product_field` (  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `body` mediumtext NOT NULL,  PRIMARY KEY (`aid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_product_virtual`
CREATE TABLE `dy_product_virtual` (  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `number` char(100) NOT NULL,  `virtual` varchar(500) NOT NULL,  `state` tinyint(1) unsigned NOT NULL DEFAULT '0',  `oid` int(10) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_sales_record`
CREATE TABLE `dy_sales_record` (  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0',  `oid` int(10) unsigned NOT NULL DEFAULT '0',  `user` char(20) NOT NULL,  `num` mediumint(6) unsigned NOT NULL DEFAULT '0',  `stime` int(10) unsigned NOT NULL DEFAULT '0',  PRIMARY KEY (`id`,`aid`)) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_special`
CREATE TABLE `dy_special` (  `sid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `molds` char(20) NOT NULL,  `name` char(50) NOT NULL,  `litpic` char(200) NOT NULL,  `title` char(100) NOT NULL,  `keywords` char(255) NOT NULL,  `description` varchar(300) NOT NULL,  `gourl` char(255) NOT NULL,  `isindex` tinyint(1) unsigned NOT NULL DEFAULT '1',  `t_index` char(50) NOT NULL,  `t_list` char(50) NOT NULL,  `t_listb` char(50) NOT NULL,  `listnum` mediumint(8) unsigned NOT NULL DEFAULT '0',  `htmldir` char(100) NOT NULL,  `htmlfile` char(100) NOT NULL,  `orders` int(10) NOT NULL DEFAULT '0',  `body` mediumtext NOT NULL,  `isshow` tinyint(1) unsigned NOT NULL DEFAULT '1',  PRIMARY KEY (`sid`)) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_sysconfig`
CREATE TABLE `dy_sysconfig` (  `name` char(35) NOT NULL,  `sets` varchar(500) NOT NULL,  UNIQUE KEY `sysconfig` (`name`)) ENGINE=MyISAM DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_traits`
CREATE TABLE `dy_traits` (  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,  `name` char(50) NOT NULL,  `molds` char(20) NOT NULL,  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8
DROP TABLE IF EXISTS `dy_update`
CREATE TABLE `dy_update` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `version` char(10) NOT NULL,  `newupdate` char(15) NOT NULL,  `uptime` int(10) unsigned NOT NULL,  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8
INSERT INTO `dy_admin_group` VALUES('1','录入员','0','0',',a_html,a_article_add,a_article_edit,a_product,a_product_add,a_product_edit,a_product_del,a_product_audit,a_message,a_message_edit,a_message_del,a_message_audit,a_article_index,a_classtypes_index,a_fields_info,a_adminuser_edituser,uploads,a_label,a_sys_ecache,a_product_index,a_goods_attribute_ajax,a_channel,channel_person_index,')
INSERT INTO `dy_admin_group` VALUES('2','jide','0','0',',a_classtypes,a_classtypes_add,a_classtypes_edit,a_classtypes_del,a_article,a_article_add,a_article_edit,a_article_del,a_article_audit,a_product,a_product_add,a_product_edit,a_product_del,a_product_audit,a_product_virtual,a_article_index,a_classtypes_index,a_fields_info,a_adminuser_edituser,uploads,a_label,a_sys_ecache,a_product_index,a_goods_attribute_ajax,a_channel,channel_person_index,')
INSERT INTO `dy_admin_per` VALUES('1','a_article','管理','0','0','20','article')
INSERT INTO `dy_admin_per` VALUES('2','a_classtypes','栏目管理','0','0','96','')
INSERT INTO `dy_admin_per` VALUES('3','a_fields','自定义字段管理','37','0','29','')
INSERT INTO `dy_admin_per` VALUES('4','a_article_index','列表','1','1','0','')
INSERT INTO `dy_admin_per` VALUES('5','a_article_add','添加','1','0','0','')
INSERT INTO `dy_admin_per` VALUES('6','a_article_edit','编辑','1','0','0','')
INSERT INTO `dy_admin_per` VALUES('7','a_article_del','删除','1','0','0','')
INSERT INTO `dy_admin_per` VALUES('8','a_article_audit','审核','1','0','0','')
INSERT INTO `dy_admin_per` VALUES('9','a_classtypes_index','栏目列表','2','1','0','')
INSERT INTO `dy_admin_per` VALUES('10','a_classtypes_add','栏目添加','2','0','0','')
INSERT INTO `dy_admin_per` VALUES('11','a_classtypes_edit','栏目编辑','2','0','0','')
INSERT INTO `dy_admin_per` VALUES('12','a_classtypes_del','栏目删除','2','0','0','')
INSERT INTO `dy_admin_per` VALUES('13','a_molds','频道设置','37','0','30','')
INSERT INTO `dy_admin_per` VALUES('17','a_adminuser','管理员管理','36','0','29','')
INSERT INTO `dy_admin_per` VALUES('22','a_sys','系统设置','36','0','30','')
INSERT INTO `dy_admin_per` VALUES('24','a_fields_info','字段列表','0','1','0','')
INSERT INTO `dy_admin_per` VALUES('27','a_adminuser_edituser','修改资料','0','1','0','')
INSERT INTO `dy_admin_per` VALUES('28','uploads','上传','0','1','0','')
INSERT INTO `dy_admin_per` VALUES('29','a_traits','推荐属性管理','37','0','28','')
INSERT INTO `dy_admin_per` VALUES('34','a_dbbak','数据备份','36','0','27','')
INSERT INTO `dy_admin_per` VALUES('35','a_label','模板调用生成器','0','1','0','')
INSERT INTO `dy_admin_per` VALUES('36','','系统','0','0','99','')
INSERT INTO `dy_admin_per` VALUES('37','','频道管理','0','0','97','')
INSERT INTO `dy_admin_per` VALUES('38','a_sys_ecache','更新缓存','0','1','0','')
INSERT INTO `dy_admin_per` VALUES('40','a_labelcus','自定义模板标签','36','0','28','')
INSERT INTO `dy_admin_per` VALUES('41','a_funs','插件设置','42','0','30','')
INSERT INTO `dy_admin_per` VALUES('42','','其他管理','0','0','98','')
INSERT INTO `dy_admin_per` VALUES('43','a_files','清理附件','36','0','0','')
INSERT INTO `dy_admin_per` VALUES('66','a_message','管理','0','0','0','message')
INSERT INTO `dy_admin_per` VALUES('67','a_message_edit','编辑','66','0','0','')
INSERT INTO `dy_admin_per` VALUES('68','a_message_del','删除','66','0','0','')
INSERT INTO `dy_admin_per` VALUES('69','a_message_audit','审核','66','0','0','')
INSERT INTO `dy_admin_per` VALUES('71','a_comment','评论管理','42','0','0','')
INSERT INTO `dy_admin_per` VALUES('72','a_links','友情链接管理','42','0','0','')
INSERT INTO `dy_admin_per` VALUES('73','a_member','会员管理','42','0','0','')
INSERT INTO `dy_admin_per` VALUES('74','a_special','专题管理','42','0','0','')
INSERT INTO `dy_admin_per` VALUES('75','a_update','在线升级','36','0','0','')
INSERT INTO `dy_admin_per` VALUES('76','a_html','静态生成','36','0','0','')
INSERT INTO `dy_admin_per` VALUES('77','a_product','管理','0','0','20','product')
INSERT INTO `dy_admin_per` VALUES('78','a_product_index','列表','77','1','0','')
INSERT INTO `dy_admin_per` VALUES('79','a_product_add','添加','77','0','0','')
INSERT INTO `dy_admin_per` VALUES('80','a_product_edit','编辑','77','0','0','')
INSERT INTO `dy_admin_per` VALUES('81','a_product_del','删除','77','0','0','')
INSERT INTO `dy_admin_per` VALUES('82','a_product_audit','审核','77','0','0','')
INSERT INTO `dy_admin_per` VALUES('84','a_ads','广告管理','42','0','0','')
INSERT INTO `dy_admin_per` VALUES('85','a_pay','支付系统','42','0','0','')
INSERT INTO `dy_admin_per` VALUES('86','a_goods','购物系统','42','0','0','')
INSERT INTO `dy_admin_per` VALUES('87','a_goods_attribute_ajax','规格属性','0','1','0','')
INSERT INTO `dy_admin_per` VALUES('104','a_channel','自定义频道','0','1','0','')
INSERT INTO `dy_admin_per` VALUES('123','channel_person_index','列表','118','1','0','')
INSERT INTO `dy_admin_per` VALUES('122','channel_person_audit','审核','118','0','0','')
INSERT INTO `dy_admin_per` VALUES('121','channel_person_del','删除','118','0','0','')
INSERT INTO `dy_admin_per` VALUES('120','channel_person_edit','编辑','118','0','0','')
INSERT INTO `dy_admin_per` VALUES('119','channel_person_add','添加','118','0','0','')
INSERT INTO `dy_admin_per` VALUES('118','channel_person','管理','0','0','0','person')
INSERT INTO `dy_admin_per` VALUES('117','a_template','模板管理','36','0','28','')
INSERT INTO `dy_admin_per` VALUES('136','a_product_virtual','虚拟货物','77','0','0','')
INSERT INTO `dy_admin_user` VALUES('1','admin','86f3059b228c8acf99e69734b6bb32cc','真实姓名','邮箱','电话','1','1','')
INSERT INTO `dy_admin_user` VALUES('3','jid','54741f2a5472dcff89d0e491cd6a8ef1','123','123','123','0','2',',1,9,10,2,18,19,3,4,6,8,11,22,23,')
INSERT INTO `dy_ads` VALUES('6','2','0','自定义广告','5','0','0','','','','blank','1')
INSERT INTO `dy_adstype` VALUES('2','自定义代码示例','0','0')
INSERT INTO `dy_article` VALUES('1','1','0','1','网站制作','','1','','','html/article/1.html','1335405900','24','uploads/2012/04/261006016221.jpg','0','0','0.00','','内容完善中...','admin','0')
INSERT INTO `dy_article` VALUES('2','2','0','1','DOYO通用建站系统','','','','','html/article/2.html','1335406140','12','uploads/2012/04/261014486626.jpg','0','0','0.00','','','admin','0')
INSERT INTO `dy_article` VALUES('3','4','0','1','某某案例','','','','','html/article/3.html','1335406440','13','uploads/2012/04/261017573910.jpg','0','0','0.00','','','admin','0')
INSERT INTO `dy_article` VALUES('5','10','0','1','某某荣誉','','','','','html/article/5.html','1335414060','4','uploads/2012/04/261223037917.jpg','3','0','0.00','','','admin','0')
INSERT INTO `dy_article` VALUES('6','8','0','1','庆祝某某公司网站正式开通','','','','','','1335414300','4','uploads/2012/04/261225443937.jpg','2','0','0.00','','','admin','0')
INSERT INTO `dy_article` VALUES('7','1','0','1','产品演示','','','','','','1337952300','5','uploads/2012/04/261017573910.jpg','1','0','0.00','','','admin','0')
INSERT INTO `dy_article` VALUES('9','3','0','1','网站制作11','','','','','html/article/9.html','1335405900','4','uploads/2012/04/261006016221.jpg','0','0','0.00','','内容完善中...','admin','0')
INSERT INTO `dy_article` VALUES('10','3','0','1','网站制作22','','','','','html/article/10.html','1335405900','7','uploads/2012/04/261006016221.jpg','0','0','0.00','','内容完善中...','admin','0')
INSERT INTO `dy_article` VALUES('11','3','0','1','网站制作11','','','','','html/article/11.html','1335405900','8','uploads/2012/04/261006016221.jpg','0','0','0.00','','内容完善中...','admin','0')
INSERT INTO `dy_article` VALUES('12','4','0','1','网站制作22','','','','','html/article/12.html','1335405900','11','uploads/2012/04/261006016221.jpg','0','0','0.00','','内容完善中...','admin','0')
INSERT INTO `dy_article_field` VALUES('7','')
INSERT INTO `dy_article_field` VALUES('6','')
INSERT INTO `dy_attribute` VALUES('4','2','红色','1','0')
INSERT INTO `dy_attribute` VALUES('5','2','蓝色','1','0')
INSERT INTO `dy_attribute` VALUES('6','3','S','1','0')
INSERT INTO `dy_attribute` VALUES('7','3','M','1','0')
INSERT INTO `dy_attribute` VALUES('8','3','L','1','0')
INSERT INTO `dy_attribute_type` VALUES('2','颜色','|18|','1','0')
INSERT INTO `dy_attribute_type` VALUES('3','尺码','|18|','1','0')
INSERT INTO `dy_classtype` VALUES('1','article','0','关于我们','','uploads/2012/04/261014486626.jpg','关于我们','','关于我们简介','3','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','0','0','关于我们...内容建设中...','1','0','0','')
INSERT INTO `dy_classtype` VALUES('2','product','0','商品中心','','','商品中心','','','2','list_index.html','list.html','list_image.html','list_body.html','product.html','20','','','0','0','0','','1','0','0','')
INSERT INTO `dy_classtype` VALUES('3','article','0','服务项目','','','服务项目','','','2','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','0','0','','1','0','0','')
INSERT INTO `dy_classtype` VALUES('4','article','0','服务案例','','','服务案例','','','2','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','0','0','','1','0','0','')
INSERT INTO `dy_classtype` VALUES('23','message','22','在线应聘','','','在线应聘','','','1','person_message.html','person_message.html','person_message.html','person_message.html','person_message.html','20','','','0','1','0','','0','0','0','')
INSERT INTO `dy_classtype` VALUES('6','article','0','营销网络','','','营销网络','','','3','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','0','0','营销网络...内容建设中...','1','0','0','')
INSERT INTO `dy_classtype` VALUES('7','article','0','联系我们','','','联系我们','','','3','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','0','0','联系我们...内容建设中...','0','0','0','')
INSERT INTO `dy_classtype` VALUES('8','article','0','公司动态','','','公司动态','','','1','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','1','0','','0','200','200','')
INSERT INTO `dy_classtype` VALUES('9','article','1','公司介绍','','','公司介绍','','','3','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','0','0','公司介绍，内容完善中...','1','0','0','')
INSERT INTO `dy_classtype` VALUES('10','article','1','公司荣誉','','','公司荣誉','','','2','list_index.html','list.html','list_image.html','list_body.html','article.html','20','','','0','0','0','','1','0','0','')
INSERT INTO `dy_classtype` VALUES('11','message','0','在线留言','','','在线留言','','','1','message.html','message.html','message.html','message.html','message.html','10','','','0','1','0','','1','0','0','')
INSERT INTO `dy_classtype` VALUES('18','product','2','实物商品演示','','','DOYO通用建站系统','','','2','list_index.html','list.html','list_image.html','list_body.html','product.html','20','','','0','0','0','','1','0','0','')
INSERT INTO `dy_classtype` VALUES('19','product','2','虚拟商品演示','','','DOYO域名主机','','','2','list_index.html','list.html','list_image.html','list_body.html','product.html','20','','','0','0','0','','1','0','0','')
INSERT INTO `dy_classtype` VALUES('22','person','0','人才招聘','','','asdfasdfasdfasdf','','','1','list_index.html','list.html','list_image.html','list_body.html','content.html','20','','','0','0','0','','1','0','0','')
INSERT INTO `dy_comment` VALUES('54','3','product','0','asdf','','1340949850','0','游客','')
INSERT INTO `dy_comment` VALUES('53','1','product','0','asdfasdf','','1340771473','0','游客','')
INSERT INTO `dy_comment` VALUES('55','3','article','0','fhjdfghdfh','','1352975201','0','游客','')
INSERT INTO `dy_comment` VALUES('57','50','article','0','asdfasdfasdf','asdf','1353411949','1353412281','1','admin')
INSERT INTO `dy_custom` VALUES('2','测试','aa','index.html','123','0')
INSERT INTO `dy_fields` VALUES('14','person','招聘岗位','gangwei','varchar','100','','0','1','1','1','|22|23|','','0','0')
INSERT INTO `dy_fields` VALUES('15','person','学历要求','xueli','select','0','不限=1,小学及以上=2,初中及以上=3,高中(中专)及以上=4,大专及以上=5,本科及以上=6,硕士及以上=7,博士及以上=8','0','1','1','1','|22|23|','','0','0')
INSERT INTO `dy_fields` VALUES('16','person','年龄要求','nianlin','varchar','50','','0','1','1','1','|22|23|','','0','0')
INSERT INTO `dy_fields` VALUES('17','person','性别要求','xingbie','select','0','不限=不限,男=男,女=女','0','1','1','1','|22|23|','','0','0')
INSERT INTO `dy_fields` VALUES('18','person','工作经验','jingyan','select','0','不限=1,一年以上=2,二年以上=3,三年以上=4,五年以上=5,十年以上=6','0','1','1','1','|22|23|','','0','0')
INSERT INTO `dy_fields` VALUES('19','person','招聘介绍','jieshao','text','0','','0','1','0','1','|22|23|','','670','350')
INSERT INTO `dy_fields` VALUES('24','message','学历','u_xueli','varchar','50','','0','1','0','1','|23|','','0','0')
INSERT INTO `dy_fields` VALUES('25','message','年龄','u_nianlin','varchar','50','','0','1','0','1','|23|','','0','0')
INSERT INTO `dy_funs` VALUES('31','ads','ads,adstype','广告','1','','1.0')
INSERT INTO `dy_funs` VALUES('32','comment','comment','评论','1','','1.0')
INSERT INTO `dy_funs` VALUES('33','links','links,linkstype','友情链接','1','','1.0')
INSERT INTO `dy_funs` VALUES('34','member','member,member_field,member_group,member_file','会员','1','','1.0')
INSERT INTO `dy_funs` VALUES('35','special','special','专题','1','','1.0')
INSERT INTO `dy_funs` VALUES('37','pay','account,order,payment','支付系统','1','','1.0')
INSERT INTO `dy_funs` VALUES('38','goods','product_attribute,attribute,attribute_type','购物系统','1','','1.0')
INSERT INTO `dy_links` VALUES('1','1','0','DOYO建站','','http://wdoyo.com','1')
INSERT INTO `dy_linkstype` VALUES('1','门户导航')
INSERT INTO `dy_linkstype` VALUES('2','234')
INSERT INTO `dy_member_file` VALUES('73','13','','uploads/2012/12/131508249443.jpg','16247','sdfg','0','16','message')
INSERT INTO `dy_member_file` VALUES('57','0','192.168.1.8','uploads/2012/12/061735275121.jpg','13824','sdfg','1735256009','0','')
INSERT INTO `dy_member_file` VALUES('55','0','192.168.1.8','uploads/2012/12/041558051712.jpg','13824','sdfg','0','13','message')
INSERT INTO `dy_member_file` VALUES('52','0','192.168.1.8','uploads/2012/12/041553486594.jpg','13824','sdfg','0','12','message')
INSERT INTO `dy_member_file` VALUES('51','0','192.168.1.8','uploads/2012/12/031244352468.jpg','13824','asdf','0','11','message')
INSERT INTO `dy_member_group` VALUES('1','1','游客','0','0','0','jpg,gif,jpeg,png','0','0','0','0.00')
INSERT INTO `dy_member_group` VALUES('2','1','普通会员','1','0','1','jpg,gif,jpeg,png','200','5000','0','0.00')
INSERT INTO `dy_message` VALUES('1','11','','0','1','asdfasdf','1339824282','0','0','sydna','asdfasdf','')
INSERT INTO `dy_message` VALUES('2','11','','0','1','fasdfasdfasdf','1339917303','1339917300','0','sydna','saasdfasd','asdfasdf')
INSERT INTO `dy_message` VALUES('3','11','','0','1','asdf','1340177705','0','0','sydna','asdfasdf','')
INSERT INTO `dy_molds` VALUES('1','article','','文章','0','list_index.html','list.html','list_image.html','list_body.html','article.html','1','1.0','1','N;')
INSERT INTO `dy_molds` VALUES('6','message','message,message_field','表单(留言)','0','message.html','message.html','message.html','message.html','message.html','1','1.0','1','N;')
INSERT INTO `dy_molds` VALUES('2','product','product','商品','0','list_index.html','list.html','list_image.html','list_body.html','product.html','1','1.0','1','a:2:{s:7:\"photo_w\";a:3:{i:0;s:15:\"图集缩略宽\";i:1;s:3:\"201\";i:2;s:67:\"频道下内容图集的自动缩略宽，0表示继承系统设置\";}s:7:\"photo_h\";a:3:{i:0;s:15:\"图集缩略高\";i:1;s:3:\"201\";i:2;s:67:\"频道下内容图集的自动缩略高，0表示继承系统设置\";}}')
INSERT INTO `dy_molds` VALUES('18','person','','人才招聘','0','list_index.html','list.html','list_image.html','list_body.html','content.html','1','','0','N;')
INSERT INTO `dy_payment` VALUES('3','alipay','0','支付宝','国内最大的支付平台，支持多家银行在线支付。<a href=\"https://b.alipay.com\" target=\"_blank\">需要签约支付宝商家服务，点此进入</a>，强烈建议使用“即时到帐”接口，若无法申请“即时到帐”接口，可选择申请财付通“即时到帐”接口，相比支付宝容易审核。','a:4:{s:7:\"service\";s:12:\"接口类型\";s:4:\"user\";s:21:\"签约支付宝账号\";s:3:\"pid\";s:18:\"合作者身份PID\";s:3:\"key\";s:18:\"安全校验码Key\";}','a:4:{s:7:\"service\";s:1:\"1\";s:4:\"user\";s:0:\"\";s:3:\"pid\";s:0:\"\";s:3:\"key\";s:0:\"\";}','99')
INSERT INTO `dy_payment` VALUES('4','tenpay','0','财付通','腾讯旗下支付平台，支持多家银行在线支付。<a href=\"https://www.tenpay.com/v2/mch/mch_intro.shtml\" target=\"_blank\">签约财付通商家服务，点此进入</a>，强烈建议使用“即时到帐”接口。','a:3:{s:7:\"service\";s:12:\"接口类型\";s:3:\"pid\";s:9:\"商户号\";s:3:\"key\";s:6:\"密钥\";}','a:3:{s:7:\"service\";s:1:\"1\";s:3:\"pid\";s:0:\"\";s:3:\"key\";s:0:\"\";}','98')
INSERT INTO `dy_payment` VALUES('2','cashbalance','1','余额支付','使用会员账户余额支付。','','N;','1')
INSERT INTO `dy_payment` VALUES('1','offline','1','线下付款','线下收款，收款后需手工在后台修改订单状态。','','N;','0')
INSERT INTO `dy_person` VALUES('1','22','0','1','招聘网站前台美工三名','','','','','','1354510740','36','0','0','0','','','admin','0')
INSERT INTO `dy_person_field` VALUES('1','网站美工','1','18岁以上','不限','2','<p>因发展需要，现急聘网站前台美工三名，要求如下：</p><p>1、精通至少一款图片设计软件<br />2、精通HTML、js、flash制作设计。<br />3、有良好的色彩搭配理念，能够准确把握用户、客户需求。<br />4、熟悉团队合作流程、有较强的解决问题能力。</p>')
INSERT INTO `dy_product` VALUES('17','19','0','1','中国联通充值卡(30元)','','','','','','1355551140','0','8','/uploads/2012/12/151404433221.jpg','/uploads/2012/12/151411263240.jpg|,|','0','29.80','1','0','0','0.00','','','admin','0')
INSERT INTO `dy_product` VALUES('16','18','0','1','女士原创纯羊绒','','','','','','1355550240','0','20','/uploads/2012/12/151345131712.jpg','/uploads/2012/12/151345172620.jpg|,||-|/uploads/2012/12/151345172972.jpg|,|','0','128.00','0','a:2:{s:6:\"快递\";s:2:\"10\";s:3:\"EMS\";s:2:\"20\";}','0','0.00','','冬的厚重材质自然需要大气沉稳的色彩与之相得益彰，高贵神秘的熟果色便于这黑白灰之中跳脱出来。','admin','0')
INSERT INTO `dy_product` VALUES('18','18','0','1','索力专柜正品男鞋','','','','','','1355559240','0','71','/uploads/2012/12/151614292462.jpg','/uploads/2012/12/151614338370.jpg|,|','0','598.00','0','0','0','0.00','','','admin','0')
INSERT INTO `dy_product` VALUES('20','18','0','1','taoci','','','','','','1408427580','0','0','','/uploads/2014/08/191353359437.jpg|,||-|/uploads/2014/08/191353356215.jpg|,||-|/uploads/2014/08/191353354123.jpg|,||-|/uploads/2014/08/191353353371.jpg|,|','0','12.00','0','0','0','0.00','','','admin','0')
INSERT INTO `dy_product_attribute` VALUES('16','3','6','0.00')
INSERT INTO `dy_product_attribute` VALUES('16','3','7','0.00')
INSERT INTO `dy_product_attribute` VALUES('16','3','8','0.00')
INSERT INTO `dy_product_attribute` VALUES('18','3','8','0.00')
INSERT INTO `dy_product_attribute` VALUES('18','3','7','0.00')
INSERT INTO `dy_product_attribute` VALUES('18','3','6','0.00')
INSERT INTO `dy_product_attribute` VALUES('16','2','4','0.00')
INSERT INTO `dy_product_attribute` VALUES('16','2','5','0.00')
INSERT INTO `dy_product_attribute` VALUES('18','2','5','-5.00')
INSERT INTO `dy_product_attribute` VALUES('18','2','4','20.00')
INSERT INTO `dy_product_discount` VALUES('20','2','0','0.00')
INSERT INTO `dy_product_field` VALUES('17','<strong>1.充值方式</strong>:<br />\r\n点击购买，在线支付，支付成功后系统将自动发送充值卡号密码到您的订单信息中<br />\r\n收到卡号密码后请在http://upay.10010.com/web/Recharge/rechargeInit输入手机号及卡密码进行充值<br />\r\n<br />\r\n<strong>2:充值查询</strong>:<br />\r\n充值成功后，会收到联通充值短信通知，如未收到短信，可在联通网上营业厅查询余额<br />')
INSERT INTO `dy_product_field` VALUES('16','不同于夏季的轻薄和飘逸<br />\r\n冬的厚重材质自然需要大气沉稳的色彩与之相得益彰<br />\r\n高贵神秘的熟果色便于这黑白灰之中跳脱出来<br />\r\n让人眼前为之一亮<br />\r\n这款羊绒衫很好运用到了酒红和暖卡其色<br />\r\n基本的轮廓加以口袋和袖口的设计小心思，撞色设计是亮点<br />\r\n即好搭配又不平庸<br />\r\n中长的衣长很好的修饰了身体曲线<br />\r\n无懈可击的款式<br />\r\n大加工厂生产的品质保障，<br />\r\n羊绒的材质真实是未禾的最基本要求，<br />\r\n经过国家认可的成分检测报告（假一赔一）<br />\r\n无需犹豫<br />\r\n肯定是上佳的造型必备单品，羊绒材质非常亲肤，建议亲贴身穿，您穿过羊绒就不会喜欢其他的材质哦！<br />')
INSERT INTO `dy_product_field` VALUES('18','福建省索力鞋业有限公司(福建省盛辉鞋材有限公司)创办于1995年，总建筑面积30000平方米，引进国内外先进的机台设备及生产流水线，系一家专业生产和开发EVA造粒、EVA、TPR、PU等鞋底，EVA组合拖鞋、沙滩凉鞋的外商独资企业。公司拥有一支高素质的员工队伍,员工2000多人。长期以来坚持拖凉鞋设计、生产和服务，推动企业不断发展与壮大。公司严格执行ISO9001：2000质量管理体系，同时根据市场需求与国际流行趋势不断创新，向行业提供规格齐全，品质优良，款式新颖的精品，赢得了多家中国著名企业的信赖与赞语，并先后荣获“福建省著名商标”、 “福建省名牌产品”、 “泉州市政府创名牌先进企业”、“泉州市文明单位”“中国驰名商标”等称号，并通过了“ISO9001质量管理体系认证”。。<br />\r\n公司本着“品质、创新、服务、人才”的企业精神，立足国内，面向世界，积极塑造良好的品牌形象，力争为行业树立典范。公司愿以更优质的服务，优质的产品、更高的要求与国内外鞋业界通力合作，共创双赢。<br />')
INSERT INTO `dy_product_field` VALUES('20','1122222222222222222222')
INSERT INTO `dy_product_virtual` VALUES('12','17','测试fhsdfgsdfgsdfg','c76e53gGuaLZm3IoQbsJ36mrH0OcZ3RBr7PhE1xWCjoX6JHFnyyE8D3V55Iaxcq1','0','0')
INSERT INTO `dy_product_virtual` VALUES('11','17','测试463vertc','12333HwgRw6YZmRRcl8KNcHrI5oIxRovuPx7mr+WkNE2Vf1XrdobPrUil4SUCVQtqNDejMk','0','0')
INSERT INTO `dy_product_virtual` VALUES('10','17','测试4567456346','9a19aBBEDunV3WW1Tfv2p/ZoAna5UjQ5BtVM90DbkrW9aVKt120wg6F8LSqVgz6ime/1WmcBm6Y','0','0')
INSERT INTO `dy_product_virtual` VALUES('9','17','测试6456456456456456','25e0LYgVYcrXL96cj0Zs5pDK4Wpwq+arv1BAvY4ZWoQEJ0OEK+JlHjVKo7S41AMYj+slDhA','0','0')
INSERT INTO `dy_product_virtual` VALUES('8','17','测试123123123123','afcci5kt/SEwT14i4tw7RQqffsuj4rFYYB374HJ+pIY2b2FL4L4wwuvM1V2oxvb/yPs','0','0')
INSERT INTO `dy_special` VALUES('1','article','专题演示','','asdfasdf','','','','1','specia.html','specia_list.html','specia_body.html','20','','','0','','1')
INSERT INTO `dy_sysconfig` VALUES('sendmail','a:4:{s:4:\"smtp\";s:0:\"\";s:4:\"mail\";s:0:\"\";s:4:\"pass\";s:0:\"\";s:4:\"name\";s:16:\"DOYO建站系统\";}')
INSERT INTO `dy_traits` VALUES('1','头条','article')
INSERT INTO `dy_traits` VALUES('2','推荐','article')
INSERT INTO `dy_traits` VALUES('3','头条','product')
INSERT INTO `dy_traits` VALUES('4','推荐','product')
