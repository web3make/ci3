CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `date` datetime DEFAULT NULL,
  `id_category` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_article`,`id_category`),
  KEY `fk_articles_categories1` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
INSERT INTO `articles` (`id_article`, `title`, `text`, `date`, `id_category`) VALUES
(1, 'title#1', 'text#big', '2016-11-30 16:37:08', 1),
(2, 'title#2', 'big text', '2016-11-30 16:37:34', 7),
(3, 'title#3', 'text#3', '2016-11-30 16:49:11', 1),
(4, 'title#4', 't4', '2016-11-30 16:49:38', 7);
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `id_group` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;
--
INSERT INTO `categories` (`id_category`, `title`, `id_group`) VALUES
(1, 'cateory#1', 0),
(7, 'category#2', 0);

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `text` text,
  `id_article` int(10) unsigned NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`,`id_article`),
  KEY `fk_comments_articles` (`id_article`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
--
INSERT INTO `comments` (`id_comment`, `user_name`, `text`, `id_article`, `id_user`) VALUES
(5, NULL, 'Text#1', 1, 1);
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `settings` (
  `title` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`title`, `value`) VALUES
('title', 'MyBlog'),
('email', 'my@mail.com'),
('count', '3');

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL,
  `control` enum('a','b') NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;


INSERT INTO `users` (`id_user`, `user_name`, `role`, `control`, `password`) VALUES
(1, 'admin', 'admin', 'a', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'zxcvxcx', 'user', 'b', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'user', 'user', 'a', 'ee11cbb19052e40b07aac0ca060c23ee'),
(4, 'xcvbxcvbcxv', 'user', 'b', '21232f297a57a5a743894a0e4a801fc3');


--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_categories1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_articles` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE;
