-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for cms
CREATE DATABASE IF NOT EXISTS `cms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `cms`;

-- Dumping structure for table cms.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cms.categories: ~7 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`category_id`, `category_title`) VALUES
	(1, 'Boostrap 5'),
	(2, 'PHP 8'),
	(3, 'JavaScript'),
	(4, 'Mysql'),
	(8, 'Boostrap 4'),
	(9, 'Laravel'),
	(10, 'Vuejs');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table cms.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(11) NOT NULL DEFAULT '0',
  `post_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_content` text COLLATE utf8_unicode_ci,
  `post_tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cms.posts: ~1 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`) VALUES
	(1, 2, 'PHP', '2', '2016-02-21', '20819378_1536023776458399_3306384511059463176_o.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce imperdiet sem et neque semper, vel tempor dolor dictum. Duis vestibulum tortor vel justo posuere, ac bibendum risus posuere. Pellentesque efficitur odio non egestas cursus. Aenean et congue mauris, in rhoncus purus. Quisque quis neque semper, ultricies justo ut, rutrum erat. Ut nisl turpis, molestie vitae metus ut, venenatis iaculis sem. Sed neque leo, tincidunt ut maximus et, pellentesque in justo. Suspendisse eget nisi mattis, vehicula tortor non, rutrum est. Vestibulum vel purus a neque porta aliquet. Duis ullamcorper velit sit amet neque dapibus iaculis. Sed tincidunt magna at mi eleifend, volutpat accumsan felis venenatis. Sed eu convallis lacus, et placerat lacus.</p><p>Vestibulum egestas rutrum ante eget fringilla. Nulla erat mi, tempus eget semper eget, tempus dapibus libero. Proin vel lobortis velit, id fringilla purus. Nulla pulvinar, diam nec condimentum sodales, orci mi scelerisque magna, sit amet mattis eros erat vel est. Cras at sagittis lectus, sed semper sapien. Curabitur dignissim, augue vel laoreet bibendum, odio orci ullamcorper odio, at dictum mauris massa non mi. Vivamus eu eros vitae diam maximus posuere id quis mi. Nunc aliquam justo dapibus mi imperdiet, ac facilisis ante congue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus ut odio dapibus, egestas ex vel, pulvinar ex. Etiam aliquet eleifend diam id fermentum.</p>', 'PHP ', 'published');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table cms.post_comments
CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cms.post_comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `post_comments` DISABLE KEYS */;
INSERT INTO `post_comments` (`id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
	(1, 1, 'Rafael', 'rafael@gmail.com', 'Muy buen Post', 'approved', '2016-02-21');
/*!40000 ALTER TABLE `post_comments` ENABLE KEYS */;

-- Dumping structure for table cms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_firtsname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_image` text COLLATE utf8_unicode_ci,
  `user_role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `randSalt` varchar(255) COLLATE utf8_unicode_ci DEFAULT '$2y$10$isusomecrazystrings22',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cms.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `user_password`, `user_firtsname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
	(2, 'LaravelGirl', '$2y$10$f7LyINtWlNH6ZkiOLdJBLuahjAKz6lhr.h4m/XFCCJIS1diTDCH9m', 'Sofia', 'Chief', 'laraveldev@gmail.com', NULL, 'admin', '$2y$10$isusomecrazystring22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table cms.users_online
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table cms.users_online: ~6 rows (approximately)
/*!40000 ALTER TABLE `users_online` DISABLE KEYS */;
INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
	(2, '6sj385aut7s1eak3mgqraa516s', 1607199441),
	(3, 'sbaqp53safhurulpv4t2set11i', 1607299276),
	(4, 'ksl5cojb5liv8qaccqhik3ug2t', 1607649539),
	(5, 'm07unf3kbkp7bb9de51hbc4ljq', 1607829991),
	(6, 'rs3jumh2iumgb8npo8asuss8lc', 1607900540),
	(7, '423352dknapa08aljk4qv3jbaj', 1607900483),
	(8, 'amou4blte3i04ifo5tfikdm5ct', 1609975542),
	(9, 'oljodc0me0ofrar06v91lo4nhi', 1610069175),
	(10, 'oq7avh5ihs8vnqn488p0v95i3r', 1610329946);
/*!40000 ALTER TABLE `users_online` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
