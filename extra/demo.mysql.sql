-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dm
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` text,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_editor` tinyint(1) NOT NULL DEFAULT '0',
  `is_user` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',1,1,1),(2,'Editor',0,1,1),(3,'User',0,0,1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_site` int(11) NOT NULL,
  `add_time` text NOT NULL,
  `title` text,
  `section_id` text,
  `section_class` text,
  `content` text,
  `variables` text,
  `ordering` int(11) DEFAULT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `section_type` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,1,'','Features','features','features','        &lt;div class=&quot;container&quot;&gt;\n            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-lg-12 text-center&quot;&gt;\n                    &lt;div class=&quot;section-heading&quot;&gt;\n                        &lt;h2&gt;Unlimited Features, Unlimited Fun&lt;/h2&gt;\n                        &lt;p class=&quot;text-muted&quot;&gt;Check out what you can do with this app theme!&lt;/p&gt;\n                        &lt;hr&gt;\n                    &lt;/div&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;\n            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-md-4&quot;&gt;\n                    &lt;div class=&quot;device-container&quot;&gt;\n                        &lt;div class=&quot;device-mockup iphone6_plus portrait white&quot;&gt;\n                            &lt;div class=&quot;device&quot;&gt;\n                                &lt;div class=&quot;screen&quot;&gt;\n                                    &lt;!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! --&gt;\n                                    &lt;img src=&quot;img/demo-screen-1.jpg&quot; class=&quot;img-responsive&quot; alt=&quot;&quot;&gt; &lt;/div&gt;\n                                &lt;div class=&quot;button&quot;&gt;\n                                    &lt;!-- You can hook the &quot;home button&quot; to some JavaScript events or just remove it --&gt;\n                                &lt;/div&gt;\n                            &lt;/div&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n                &lt;/div&gt;\n                &lt;div class=&quot;col-md-8&quot;&gt;\n                    &lt;div class=&quot;container-fluid&quot;&gt;\n                        &lt;div class=&quot;row&quot;&gt;\n                            &lt;div class=&quot;col-md-6&quot;&gt;\n                                &lt;div class=&quot;feature-item&quot;&gt;\n                                    &lt;i class=&quot;icon-screen-smartphone text-primary&quot;&gt;&lt;/i&gt;\n                                    &lt;h3&gt;Device Mockups&lt;/h3&gt;\n                                    &lt;p class=&quot;text-muted&quot;&gt;Ready to use HTML/CSS device mockups, no Photoshop required!&lt;/p&gt;\n                                &lt;/div&gt;\n                            &lt;/div&gt;\n                            &lt;div class=&quot;col-md-6&quot;&gt;\n                                &lt;div class=&quot;feature-item&quot;&gt;\n                                    &lt;i class=&quot;icon-camera text-primary&quot;&gt;&lt;/i&gt;\n                                    &lt;h3&gt;Flexible Use&lt;/h3&gt;\n                                    &lt;p class=&quot;text-muted&quot;&gt;Put an image, video, animation, or anything else in the screen!&lt;/p&gt;\n                                &lt;/div&gt;\n                            &lt;/div&gt;\n                        &lt;/div&gt;\n                        &lt;div class=&quot;row&quot;&gt;\n                            &lt;div class=&quot;col-md-6&quot;&gt;\n                                &lt;div class=&quot;feature-item&quot;&gt;\n                                    &lt;i class=&quot;icon-present text-primary&quot;&gt;&lt;/i&gt;\n                                    &lt;h3&gt;Free to Use&lt;/h3&gt;\n                                    &lt;p class=&quot;text-muted&quot;&gt;As always, this theme is free to download and use for any purpose!&lt;/p&gt;\n                                &lt;/div&gt;\n                            &lt;/div&gt;\n                            &lt;div class=&quot;col-md-6&quot;&gt;\n                                &lt;div class=&quot;feature-item&quot;&gt;\n                                    &lt;i class=&quot;icon-lock-open text-primary&quot;&gt;&lt;/i&gt;\n                                    &lt;h3&gt;Open Source&lt;/h3&gt;\n                                    &lt;p class=&quot;text-muted&quot;&gt;Since this theme is MIT licensed, you can use it commercially!&lt;/p&gt;\n                                &lt;/div&gt;\n                            &lt;/div&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;','[{&quot;name&quot;:&quot;text&quot;,&quot;value&quot;:&quot;asd&quot;}]',4,1,1,0,'section'),(2,2,'2016-12-10 01:17:32','test','','','test',NULL,NULL,1,1,0,NULL),(3,1,'2016-12-10 01:31:45','CTA','','cta','        &lt;div class=&quot;cta-content&quot;&gt;\n            &lt;div class=&quot;container&quot;&gt;\n                &lt;h2&gt;Stop waiting.&lt;br&gt;Start building.&lt;/h2&gt;\n                &lt;a href=&quot;#contact&quot; class=&quot;btn btn-outline btn-xl page-scroll&quot;&gt;Let&#039;s Get Started!&lt;/a&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;\n        &lt;div class=&quot;overlay&quot;&gt;&lt;/div&gt;',NULL,5,1,1,0,'section'),(4,1,'2016-12-14 22:44:56','Header','header','','&lt;div class=&quot;container&quot;&gt;\n            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-sm-7&quot;&gt;\n                    &lt;div class=&quot;header-content&quot;&gt;\n                        &lt;div class=&quot;header-content-inner&quot;&gt;\n                            &lt;h1&gt;&lt;%header_text%&gt;&lt;/h1&gt;\n                            &lt;a href=&quot;#download&quot; class=&quot;btn btn-outline btn-xl page-scroll&quot;&gt;&lt;%button_text%&gt;&lt;/a&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n                &lt;/div&gt;\n                &lt;div class=&quot;col-sm-5&quot;&gt;\n                    &lt;div class=&quot;device-container&quot;&gt;\n                        &lt;div class=&quot;device-mockup iphone6_plus portrait white&quot;&gt;\n                            &lt;div class=&quot;device&quot;&gt;\n                                &lt;div class=&quot;screen&quot;&gt;\n                                    &lt;!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! --&gt;\n                                    &lt;img src=&quot;img/demo-screen-1.jpg&quot; class=&quot;img-responsive&quot; alt=&quot;&quot;&gt;\n                                &lt;/div&gt;\n                                &lt;div class=&quot;button&quot;&gt;\n                                    &lt;!-- You can hook the &quot;home button&quot; to some JavaScript events or just remove it --&gt;\n                                &lt;/div&gt;\n                            &lt;/div&gt;\n                        &lt;/div&gt;\n                    &lt;/div&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;','[{&quot;name&quot;:&quot;header_text&quot;,&quot;value&quot;:&quot;D&amp;M Landing Page Engine&lt;br/&gt;administrative interface &lt;a href=\\&quot;/auth/login\\&quot;&gt;here&lt;/a&gt;\\nuser/pass for access into system:\\n&lt;ul&gt;\\n&lt;li&gt;admin/admin&lt;/li&gt;\\n&lt;li&gt;editor/editor&lt;/li&gt;\\n&lt;li&gt;user/user&lt;/li&gt;\\n&lt;/ul&gt;&quot;},{&quot;name&quot;:&quot;button_text&quot;,&quot;value&quot;:&quot;Download&quot;}]',2,1,1,0,'header'),(5,1,'2016-12-14 22:46:30','Download','download','download bg-primary text-center','        &lt;div class=&quot;container&quot;&gt;\n            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-md-8 col-md-offset-2&quot;&gt;\n                    &lt;h2 class=&quot;section-heading&quot;&gt;&lt;%big-text%&gt;&lt;/h2&gt;\n                    &lt;div class=&quot;btn-group&quot;&gt;\n                        &lt;a target=&quot;_blank&quot; class=&quot;btn btn-lg btn-success&quot; href=&quot;https://github.com/DrTeamRocks/dm-lpe&quot;&gt;&lt;i class=&quot;fa fa-github&quot;&gt;&lt;/i&gt; &lt;%small-text%&gt;&lt;/a&gt;\n                    &lt;/div&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;','[{&quot;name&quot;:&quot;big-text&quot;,&quot;value&quot;:&quot;D&amp;M LPE is OpenSource&quot;},{&quot;name&quot;:&quot;small-text&quot;,&quot;value&quot;:&quot;you can download it on GitHub&quot;}]',3,1,1,0,'section'),(6,1,'2016-12-16 22:38:30','Contact','contact','contact bg-primary','        &lt;div class=&quot;container&quot;&gt;\r\n            &lt;h2&gt;We &lt;i class=&quot;fa fa-heart&quot;&gt;&lt;/i&gt; new friends!&lt;/h2&gt;\r\n            &lt;ul class=&quot;list-inline list-social&quot;&gt;\r\n                &lt;li class=&quot;social-twitter&quot;&gt;\r\n                    &lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fa fa-twitter&quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                &lt;/li&gt;\r\n                &lt;li class=&quot;social-facebook&quot;&gt;\r\n                    &lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fa fa-facebook&quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                &lt;/li&gt;\r\n                &lt;li class=&quot;social-google-plus&quot;&gt;\r\n                    &lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;fa fa-google-plus&quot;&gt;&lt;/i&gt;&lt;/a&gt;\r\n                &lt;/li&gt;\r\n            &lt;/ul&gt;\r\n        &lt;/div&gt;',NULL,6,1,1,0,'section'),(7,1,'2016-12-16 22:39:52','Footer','footer','','        &lt;div class=&quot;container&quot;&gt;\r\n            &lt;p&gt;&amp;copy; 2016 Start Bootstrap. All Rights Reserved.&lt;/p&gt;\r\n            &lt;ul class=&quot;list-inline&quot;&gt;\r\n                &lt;li&gt;\r\n                    &lt;a href=&quot;#&quot;&gt;Privacy&lt;/a&gt;\r\n                &lt;/li&gt;\r\n                &lt;li&gt;\r\n                    &lt;a href=&quot;#&quot;&gt;Terms&lt;/a&gt;\r\n                &lt;/li&gt;\r\n                &lt;li&gt;\r\n                    &lt;a href=&quot;#&quot;&gt;FAQ&lt;/a&gt;\r\n                &lt;/li&gt;\r\n            &lt;/ul&gt;\r\n        &lt;/div&gt;',NULL,7,1,1,0,'footer'),(8,1,'2016-12-16 22:46:25','Navigation','mainNav','navbar navbar-default navbar-fixed-top','        &lt;div class=&quot;container&quot;&gt;\n            &lt;!-- Brand and toggle get grouped for better mobile display --&gt;\n            &lt;div class=&quot;navbar-header&quot;&gt;\n                &lt;button type=&quot;button&quot; class=&quot;navbar-toggle collapsed&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#bs-example-navbar-collapse-1&quot;&gt;\n                    &lt;span class=&quot;sr-only&quot;&gt;Toggle navigation&lt;/span&gt; Menu &lt;i class=&quot;fa fa-bars&quot;&gt;&lt;/i&gt;\n                &lt;/button&gt;\n                &lt;a class=&quot;navbar-brand page-scroll&quot; href=&quot;#page-top&quot;&gt;Start Bootstrap&lt;/a&gt;\n            &lt;/div&gt;\n&lt;!-- Collect the nav links, forms, and other content for toggling --&gt;\n            &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;bs-example-navbar-collapse-1&quot;&gt;\n                &lt;ul class=&quot;nav navbar-nav navbar-right&quot;&gt;\n                    &lt;li&gt;\n                        &lt;a class=&quot;page-scroll&quot; href=&quot;#download&quot;&gt;Download&lt;/a&gt;\n                    &lt;/li&gt;\n                    &lt;li&gt;\n                        &lt;a class=&quot;page-scroll&quot; href=&quot;#features&quot;&gt;Features&lt;/a&gt;\n                    &lt;/li&gt;\n                    &lt;li&gt;\n                        &lt;a class=&quot;page-scroll&quot; href=&quot;#contact&quot;&gt;Contact&lt;/a&gt;\n                    &lt;/li&gt;\n                &lt;/ul&gt;\n            &lt;/div&gt;\n            &lt;!-- /.navbar-collapse --&gt;\n        &lt;/div&gt;\n        &lt;!-- /.container-fluid --&gt;\n',NULL,1,1,1,0,'nav'),(9,1,'2016-12-16 23:35:20','tets','','','test',NULL,1,1,1,1,NULL),(10,1,'2016-12-16 23:36:33','priz','','','priz',NULL,2,1,1,1,NULL),(11,1,'2016-12-16 23:39:32','zzzzz','','','zzzz',NULL,0,1,1,1,NULL);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_site` int(11) NOT NULL,
  `key` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,1,'title','D&amp;M Landing Page Engine'),(2,1,'styles','files/new-age/vendor/bootstrap/css/bootstrap.min.css\nhttps://fonts.googleapis.com/css?family=Lato\nhttps://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900\nhttps://fonts.googleapis.com/css?family=Muli\nfiles/new-age/vendor/font-awesome/css/font-awesome.min.css\nfiles/new-age/vendor/simple-line-icons/css/simple-line-icons.css\nfiles/new-age/vendor/device-mockups/device-mockups.min.css\nfiles/new-age/css/new-age.css\n'),(3,1,'scripts','files/new-age/vendor/jquery/jquery.min.js\nfiles/new-age/vendor/bootstrap/js/bootstrap.min.js\nhttps://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js\nfiles/new-age/js/new-age.min.js'),(4,1,'description',''),(5,1,'keywords',''),(6,1,'author','Dr.Dre');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `alias` text NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'dm.drteam.rocks','dm',1,0),(2,'test','',1,0);
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `lastlogin_time` text NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin@email.com','admin','$2y$10$Fi/TVnQzwsOJe3EoEDpMi.SnP147C4EWM5GLmc8mrhxrGDH2DabuG','2017-01-03 12:53:01',1,0,NULL),(2,2,'editor@email.com','editor','$2y$10$2KRRT7KU9iYISU2qpc47JeEo6xz96CPTcMsEXcTo0p9GxNbLVusQG','2016-12-13 00:44:55',1,0,NULL),(3,3,'user@email.com','user','$2y$10$QHYxT7OScoOr3Az2pqkrueyXK/QDK5XDjVchXlA9.nkgGm8Poe.xe','2016-12-13 00:44:35',1,0,NULL),(4,3,'test@mail.com','test','$2y$10$tW3kswYXPbOBbXpCFUjPNed.B0olfBBmMirqBKTNfw7k5ex5q7JRC','',1,0,'2016-12-17 02:18:33');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-03 12:57:10
