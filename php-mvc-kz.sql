-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2020 at 11:56 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-mvc-kz`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES
(1, 'PHP', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', '2020-06-22'),
(2, 'PYHTON', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', '2020-06-04'),
(3, 'C++', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', '2020-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `author`, `date`) VALUES
(1, 'خلف بوابة كورونا\r\n', '“على المستشفى أن يحتفظ بكل المرضى، رجالا ونساء، حتى يشفوا بشكل تام. يتحمل المستشفى جميع النفقات سواء جاء الناس من بعيد أو قريب، سواء كانوا أجانب أو من القاطنة، أقوياء أو ضعفاء، كبارا أو صغارا، أغنياء', 'ياسين لعوان', '2020-05-01'),
(2, 'بيمارستان قالاوون: حين وضع المسلمون\r\n أسس المستشفى الحديث\r\n', '“على المستشفى أن يحتفظ بكل المرضى، رجالا ونساء، حتى يشفوا بشكل تام. يتحمل المستشفى جميع النفقات سواء جاء الناس من بعيد أو قريب، سواء كانوا أجانب أو من القاطنة، أقوياء أو ضعفاء، كبارا أو صغارا، أغنياء...  ', 'أمين المجهد', '2020-06-09'),
(3, 'PHP', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', 'andy', '2020-06-01'),
(4, 'PHP', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', 'andy', '2020-06-01'),
(5, 'PYTHON', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', 'KHADIJA', '2020-06-09'),
(6, 'PYTHON', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', 'KHADIJA', '2020-06-09'),
(7, 'C++', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', 'ZAHIR', '2020-06-22'),
(8, 'C++', 'Before creating the database we should lay out what we need in the blog. The thing which is obvious to hold is blog posts, and in each post it should contain post id, post title, content, author name and post date. In mysql localhost create a database named “test”(any name) then create a table named “blog_posts” and add the fields as like in the image given below.\r\n\r\n', 'ZAHIR', '2020-06-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
