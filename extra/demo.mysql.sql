-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dm
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB-

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
INSERT INTO `sections` VALUES (1,1,'','Content 2','','content-section-b','        &lt;div class=&quot;container&quot;&gt;&lt;br/&gt;\n            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-lg-5 push-lg-7&quot;&gt;\n                    &lt;hr class=&quot;section-heading-spacer&quot;&gt;\n                    &lt;div class=&quot;clearfix&quot;&gt;&lt;/div&gt;\n                    &lt;h2 class=&quot;section-heading&quot;&gt;3D Device Mockups&lt;br&gt;by PSDCovers&lt;/h2&gt;\n                    &lt;p class=&quot;lead&quot;&gt;Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by &lt;a target=&quot;_blank&quot; href=&quot;http://www.psdcovers.com/&quot;&gt;PSDCovers&lt;/a&gt;! Visit their website to download some of their awesome, free photoshop actions!&lt;/p&gt;\n                &lt;/div&gt;\n                &lt;div class=&quot;col-lg-5 pull-lg-5&quot;&gt;\n                    &lt;img class=&quot;img-fluid&quot; src=&quot;/sites/startbootstrap-lp-4/img/dog.png&quot; alt=&quot;&quot;&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;&lt;br/&gt;\n        &lt;/div&gt;','[{&quot;name&quot;:&quot;text&quot;,&quot;value&quot;:&quot;asd&quot;}]',4,1,1,0,'section'),(2,2,'2016-12-10 01:17:32','test','','','test',NULL,NULL,1,1,0,NULL),(3,1,'2016-12-10 01:31:45','Content 3','','content-section-a','        &lt;div class=&quot;container&quot;&gt;&lt;br/&gt;            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-lg-5&quot;&gt;\n                    &lt;hr class=&quot;section-heading-spacer&quot;&gt;\n                    &lt;div class=&quot;clearfix&quot;&gt;&lt;/div&gt;\n                    &lt;h2 class=&quot;section-heading&quot;&gt;Google Web Fonts and&lt;br&gt;Font Awesome Icons&lt;/h2&gt;\n                    &lt;p class=&quot;lead&quot;&gt;This template features the &#039;Lato&#039; font, part of the &lt;a target=&quot;_blank&quot; href=&quot;http://www.google.com/fonts&quot;&gt;Google Web Font library&lt;/a&gt;, as well as &lt;a target=&quot;_blank&quot; href=&quot;http://fontawesome.io&quot;&gt;icons from Font Awesome&lt;/a&gt;.&lt;/p&gt;\n                &lt;/div&gt;\n                &lt;div class=&quot;col-lg-5 offset-lg-2&quot;&gt;\n                    &lt;img class=&quot;img-fluid&quot; src=&quot;/sites/startbootstrap-lp-4/img/phones.png&quot; alt=&quot;&quot;&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;&lt;br/&gt;        &lt;/div&gt;',NULL,5,1,1,0,'section'),(4,1,'2016-12-14 22:44:56','Header','header','intro-header','        &lt;div class=&quot;container&quot;&gt;\n            &lt;div class=&quot;intro-message&quot;&gt;\n                &lt;h1&gt;D&amp;M Landing Page Engine&lt;/h1&gt;\n                &lt;h3&gt;Is OpenSource software&lt;/h3&gt;\n                &lt;hr class=&quot;intro-divider&quot;&gt;\n                &lt;ul class=&quot;list-inline intro-social-buttons&quot;&gt;\n                    &lt;li class=&quot;list-inline-item&quot;&gt;\n                        &lt;a target=&quot;_blank&quot; href=&quot;https://twitter.com/EvilFreelancer&quot; class=&quot;btn btn-secondary btn-lg&quot;&gt;&lt;i class=&quot;fa fa-twitter fa-fw&quot;&gt;&lt;/i&gt; &lt;span class=&quot;network-name&quot;&gt;Twitter&lt;/span&gt;&lt;/a&gt;\n                    &lt;/li&gt;\n                    &lt;li class=&quot;list-inline-item&quot;&gt;\n                        &lt;a target=&quot;_blank&quot; href=&quot;https://github.com/DrTeamRocks/dm-lpe&quot; class=&quot;btn btn-secondary btn-lg&quot;&gt;&lt;i class=&quot;fa fa-github fa-fw&quot;&gt;&lt;/i&gt; &lt;span class=&quot;network-name&quot;&gt;Github&lt;/span&gt;&lt;/a&gt;\n                    &lt;/li&gt;\n                &lt;/ul&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;','[{&quot;name&quot;:&quot;header_text&quot;,&quot;value&quot;:&quot;D&amp;M Landing Page Engine&lt;br/&gt;administrative interface &lt;a href=\\&quot;/auth/login\\&quot;&gt;here&lt;/a&gt;\\nuser/pass for access into system:\\n&lt;ul&gt;\\n&lt;li&gt;admin/admin&lt;/li&gt;\\n&lt;li&gt;editor/editor&lt;/li&gt;\\n&lt;li&gt;user/user&lt;/li&gt;\\n&lt;/ul&gt;&quot;},{&quot;name&quot;:&quot;button_text&quot;,&quot;value&quot;:&quot;Download&quot;}]',2,1,1,0,'header'),(5,1,'2016-12-14 22:46:30','Content','download','content-section-a','        &lt;div class=&quot;container&quot;&gt;\n            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-lg-5&quot;&gt;\n                    &lt;hr class=&quot;section-heading-spacer&quot;&gt;\n                    &lt;div class=&quot;clearfix&quot;&gt;&lt;/div&gt;\n                    &lt;h2 class=&quot;section-heading&quot;&gt;Death to the Stock Photo:&lt;br&gt;Special Thanks&lt;/h2&gt;\n                    &lt;p class=&quot;lead&quot;&gt;A special thanks to &lt;a target=&quot;_blank&quot; href=&quot;http://join.deathtothestockphoto.com/&quot;&gt;Death to the Stock Photo&lt;/a&gt; for providing the photographs that you see in this template. Visit their website to become a member.&lt;/p&gt;\n                &lt;/div&gt;\n                &lt;div class=&quot;col-lg-5 offset-lg-2&quot;&gt;\n                    &lt;img class=&quot;img-fluid&quot; src=&quot;/sites/startbootstrap-lp-4/img/ipad.png&quot; alt=&quot;&quot;&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;&lt;br/&gt;        &lt;/div&gt;','[{&quot;name&quot;:&quot;big-text&quot;,&quot;value&quot;:&quot;D&amp;M LPE is OpenSource&quot;},{&quot;name&quot;:&quot;small-text&quot;,&quot;value&quot;:&quot;you can download it on GitHub&quot;}]',3,1,1,0,'section'),(6,1,'2016-12-16 22:38:30','Banner','contact','banner','&lt;div class=&quot;container&quot;&gt;<br/>            &lt;div class=&quot;row&quot;&gt;\n                &lt;div class=&quot;col-lg-6&quot;&gt;\n                    &lt;h2&gt;Connect to Start Bootstrap:&lt;/h2&gt;\n                &lt;/div&gt;\n                &lt;div class=&quot;col-lg-6&quot;&gt;\n                    &lt;ul class=&quot;list-inline banner-social-buttons&quot;&gt;\n                        &lt;li class=&quot;list-inline-item&quot;&gt;\n                            &lt;a href=&quot;#&quot; class=&quot;btn btn-secondary btn-lg&quot;&gt;&lt;i class=&quot;fa fa-twitter fa-fw&quot;&gt;&lt;/i&gt; &lt;span class=&quot;network-name&quot;&gt;Twitter&lt;/span&gt;&lt;/a&gt;\n                        &lt;/li&gt;\n                        &lt;li class=&quot;list-inline-item&quot;&gt;\n                            &lt;a href=&quot;#&quot; class=&quot;btn btn-secondary btn-lg&quot;&gt;&lt;i class=&quot;fa fa-github fa-fw&quot;&gt;&lt;/i&gt; &lt;span class=&quot;network-name&quot;&gt;Github&lt;/span&gt;&lt;/a&gt;\n                        &lt;/li&gt;\n                        &lt;li class=&quot;list-inline-item&quot;&gt;\n                            &lt;a href=&quot;#&quot; class=&quot;btn btn-secondary btn-lg&quot;&gt;&lt;i class=&quot;fa fa-linkedin fa-fw&quot;&gt;&lt;/i&gt; &lt;span class=&quot;network-name&quot;&gt;Linkedin&lt;/span&gt;&lt;/a&gt;\n                        &lt;/li&gt;\n                    &lt;/ul&gt;\n                &lt;/div&gt;\n            &lt;/div&gt;<br/>        &lt;/div&gt;',NULL,6,1,1,0,'section'),(7,1,'2016-12-16 22:39:52','Footer','','','        &lt;div class=&quot;container&quot;&gt;\n            &lt;ul class=&quot;list-inline&quot;&gt;\n                &lt;li class=&quot;list-inline-item&quot;&gt;\n                    &lt;a href=&quot;#&quot;&gt;Home&lt;/a&gt;\n                &lt;/li&gt;\n                &lt;li class=&quot;footer-menu-divider list-inline-item&quot;&gt;&amp;sdot;&lt;/li&gt;\n                &lt;li class=&quot;list-inline-item&quot;&gt;\n                    &lt;a href=&quot;#about&quot;&gt;About&lt;/a&gt;\n                &lt;/li&gt;\n                &lt;li class=&quot;footer-menu-divider list-inline-item&quot;&gt;&amp;sdot;&lt;/li&gt;\n                &lt;li class=&quot;list-inline-item&quot;&gt;\n                    &lt;a href=&quot;#services&quot;&gt;Services&lt;/a&gt;\n                &lt;/li&gt;\n                &lt;li class=&quot;footer-menu-divider list-inline-item&quot;&gt;&amp;sdot;&lt;/li&gt;\n                &lt;li class=&quot;list-inline-item&quot;&gt;\n                    &lt;a href=&quot;#contact&quot;&gt;Contact&lt;/a&gt;\n                &lt;/li&gt;\n            &lt;/ul&gt;\n            &lt;p class=&quot;copyright text-muted small&quot;&gt;Copyright &amp;copy; Your Company 2017. All Rights Reserved&lt;/p&gt;\n        &lt;/div&gt;',NULL,7,1,1,0,'footer'),(8,1,'2016-12-16 22:46:25','Navigation','mainNav','navbar fixed-top navbar-toggleable-md navbar-light bg-faded','        &lt;button class=&quot;navbar-toggler navbar-toggler-right&quot; type=&quot;button&quot; data-toggle=&quot;collapse&quot; data-target=&quot;#navbarExample&quot; aria-controls=&quot;navbarExample&quot; aria-expanded=&quot;false&quot; aria-label=&quot;Toggle navigation&quot;&gt;\n            &lt;span class=&quot;navbar-toggler-icon&quot;&gt;&lt;/span&gt;\n        &lt;/button&gt;\n        &lt;div class=&quot;container&quot;&gt;\n            &lt;a class=&quot;navbar-brand&quot; href=&quot;#&quot;&gt;D&amp;M Landing Page Engine&lt;/a&gt;\n            &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navbarExample&quot;&gt;\n                &lt;ul class=&quot;navbar-nav ml-auto&quot;&gt;\n                    &lt;li class=&quot;nav-item&quot;&gt;\n                        &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;About&lt;/a&gt;\n                    &lt;/li&gt;\n                    &lt;li class=&quot;nav-item&quot;&gt;\n                        &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Services&lt;/a&gt;\n                    &lt;/li&gt;\n                    &lt;li class=&quot;nav-item&quot;&gt;\n                        &lt;a class=&quot;nav-link&quot; href=&quot;#&quot;&gt;Contact&lt;/a&gt;\n                    &lt;/li&gt;\n                &lt;/ul&gt;\n            &lt;/div&gt;\n        &lt;/div&gt;\n',NULL,1,1,1,0,'nav'),(9,1,'2016-12-16 23:35:20','tets','','','test',NULL,1,1,1,1,NULL),(10,1,'2016-12-16 23:36:33','priz','','','priz',NULL,2,1,1,1,NULL),(11,1,'2016-12-16 23:39:32','zzzzz','','','zzzz',NULL,0,1,1,1,NULL);
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
INSERT INTO `settings` VALUES (1,1,'title','D&amp;M Landing Page Engine'),(2,1,'styles','https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic\n/vendor/bootstrap/dist/css/bootstrap.min.css\n/vendor/font-awesome/css/font-awesome.min.css\n/sites/startbootstrap-lp-4/css/landing-page.css'),(3,1,'scripts','/vendor/jquery/dist/jquery.min.js\n/vendor/tether/dist/js/tether.min.js\n/vendor/bootstrap/dist/js/bootstrap.min.js'),(4,1,'description','Simple site example on D&amp;M LPE'),(5,1,'keywords',''),(6,1,'author','Dr.Dre');
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
  `favorite` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'dm.drteam.rocks','dm',1,0,'1'),(2,'test','',1,0,'0');
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
INSERT INTO `users` VALUES (1,1,'admin@email.com','admin','$2y$10$Fi/TVnQzwsOJe3EoEDpMi.SnP147C4EWM5GLmc8mrhxrGDH2DabuG','2017-05-19 22:43:45',1,0,NULL),(2,2,'editor@email.com','editor','$2y$10$2KRRT7KU9iYISU2qpc47JeEo6xz96CPTcMsEXcTo0p9GxNbLVusQG','2016-12-13 00:44:55',1,0,NULL),(3,3,'user@email.com','user','$2y$10$QHYxT7OScoOr3Az2pqkrueyXK/QDK5XDjVchXlA9.nkgGm8Poe.xe','2016-12-13 00:44:35',1,0,NULL),(4,3,'test@mail.com','test','$2y$10$tW3kswYXPbOBbXpCFUjPNed.B0olfBBmMirqBKTNfw7k5ex5q7JRC','',1,0,'2016-12-17 02:18:33');
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

-- Dump completed on 2017-05-20  0:46:55
