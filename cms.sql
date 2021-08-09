-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 04:41 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(2, 'JavaScript'),
(7, 'Graphic Design'),
(11, 'HTML & CSS'),
(14, 'PHP OOP'),
(21, 'Vue.JS');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(17, 1, 'yaty', 'yaty@gmail.com', 'Wow GrewaTE tUTORIAL', 'approved', '2020-04-07'),
(19, 12, 'yaty', 'yaty@gmail.com', 'dddd', 'approved', '2020-04-07'),
(21, 1, 'fuck you', 'yaty@gmail.com', 'essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'approved', '2020-04-07'),
(22, 1, 'fuck you', 'yaty@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', 'unapproved', '2020-04-08'),
(23, 12, 'mimim', 'yaty@gmail.com', 'áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’â€‹áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’', 'approved', '2020-04-08'),
(24, 12, 'mimim', 'yaty@gmail.com', 'áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’â€‹áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’', 'approved', '2020-04-08'),
(25, 10, 'yaty', 'yaty@gmail.com', 'áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’', 'approved', '2020-04-08'),
(26, 10, 'yaty', 'yaty@gmail.com', 'áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’', 'approved', '2020-04-08'),
(27, 8, 'fuck you', 'yaty@gmail.com', 'áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’', 'unapproved', '2020-04-08'),
(28, 8, 'plus 1 comment', 'fffff@gmail.com', 'áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’áž“áŸ…ážŸáž¶áž€áž›ážœáž·áž‘áŸ’áž™áž¶áž›áŸáž™áž˜áž¶áž“áž‡áŸáž™ áž˜áž¶áž“áž€áž¶ážšáž”áž„áŸ’ážšáŸ€áž“áž‡áž¶áž…áŸ’ážšáž¾áž“ážŽáž¶áž€áŸ‹áž–áŸáž“áŸ’áž’ fedfdfdfdf', 'approved', '2020-04-08'),
(30, 15, 'fuck you', 'yaty@gmail.com', 'Why Dont Get me', 'approved', '2020-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(3) NOT NULL,
  `post_cat_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 21, 'Vue Web Design', 'RaMi', '2020-04-08', 'iconfinder_Student-3_379383.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', 'test', 3, 'published'),
(8, 21, 'áž…áŸ†ážŽáž„áž‡áž¾áž„', 'MCU', '2020-04-08', 'laptop-analytics-2.png', 'Bootstrapâ€™s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.\r\nBe sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.\r\nHereâ€™s a quick example to demonstrate Bootstrapâ€™s form styles. Keep reading for documentation on required classes, form layout, and more.       \r\nBootstrapâ€™s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.\r\nBe sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.\r\nHereâ€™s a quick example to demonstrate Bootstrapâ€™s form styles. Keep reading for documentation on required classes, form layout, and more.            \r\nBootstrapâ€™s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.\r\nBe sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.\r\nHereâ€™s a quick example to demonstrate Bootstrapâ€™s form styles. Keep reading for documentation on required classes, form layout, and more.            \r\nBootstrapâ€™s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.\r\nBe sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.\r\nHereâ€™s a quick example to demonstrate Bootstrapâ€™s form styles. Keep reading for documentation on required classes, form layout, and more.            \r\nBootstrapâ€™s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.\r\nBe sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.\r\nHereâ€™s a quick example to demonstrate Bootstrapâ€™s form styles. Keep reading for documentation on required classes, form layout, and more.            \r\nBootstrapâ€™s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices.\r\nBe sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more.\r\nHereâ€™s a quick example to demonstrate Bootstrapâ€™s form styles. Keep reading for documentation on required classes, form layout, and more.                                     ', 'dd', 2, 'published'),
(10, 21, 'My First PHP Project', 'KHKHKHKH', '2020-04-13', 'facebook.png', 'xsvfsdvdsfvfdvdfdfvdfv                                                                                   ', '1111', 2, 'published'),
(11, 21, 'PHP OOPPPPPPPPP', 'ra mi mcu kh', '2020-04-13', 'n2.jpg', '<p>Bootstrap&rsquo;s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their customized displays for a more consistent rendering across browsers and devices. Be sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical information) to take advantage of newer input controls like email verification, number selection, and more. Here&rsquo;s a quick example to demonstrate Bootstrap&rsquo;s form styles. Keep reading for documentation on required classes, form layout, and more. 1111</p>\r\n<p>&nbsp;</p>', 'nhuii', 0, 'published'),
(15, 11, 'test post link', 'MCU', '2020-04-13', '221463.jpg', '<p>test post alert link.............................</p>', 'haha', 1, 'published'),
(16, 7, 'test post link 222', 'ra mi', '2020-04-13', '51803.jpg', '<p>daaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n<p>&nbsp;</p>', 'nhuii', 0, 'published'),
(17, 14, 'test mysqli insert id function', 'RaMi', '2020-04-13', '660691.jpg', '<p>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>\r\n<p>&nbsp;</p>', '1111', 0, 'published'),
(18, 14, 'ergerge9999', 'RaMi', '2020-04-13', 'milky-way-5k-hd-5120x2880.jpg', '<p>ggggggggggggggggggggggggggggggggggggggg</p>\r\n<p>&nbsp;</p>', 'dd', 0, 'published'),
(19, 14, 'test mysqli insert id function', 'RaMi', '2020-04-18', '660691.jpg', '<p>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>\r\n<p>&nbsp;</p>', '1111', 0, 'published'),
(20, 11, 'test post link', 'MCU', '2020-04-18', '221463.jpg', '<p>test post alert link.............................</p>', 'haha', 0, 'published'),
(21, 21, 'My First PHP Project', 'KHKHKHKH', '2020-04-18', 'facebook.png', 'xsvfsdvdsfvfdvdfdfvdfv                                                                                   ', '1111', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL DEFAULT '$2y$10iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(7, 'haha', 'haha', 'haha', 'haha', 'rami123@gmail.com', '', 'admin', ''),
(8, 'mira', '123', 'mira', 'rami', 'bang@gmail.com', '', 'subscriber', ''),
(9, 'whatever', '123', 'whatever', 'whatever', 'whatever@gmail.com', '', 'subscriber', '$2y$10iusesomecrazystring22'),
(10, 'whatever22', '123', 'game', 'jai', 'whatever22@rami.com', '', 'subscriber', '$2y$10iusesomecrazystring22'),
(11, 'suares', '$1$AoD.NYLv$GLIWrQAdf17i.UR5zoHTC.', '', '', 'suares@gmail.com', '', 'subscriber', '$2y$10iusesomecrazystring22'),
(12, 'demo', '$1$3ZtAMPfG$LYlwlW9oKWGH3F1OM4CFZ1', '', '', 'demo@yahoo.com', '', 'subscriber', '$2y$10iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
