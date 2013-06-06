-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2013 at 04:41 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diyeld-trails`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `biketype_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`biketype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`biketype_id`, `name`) VALUES
(1, 'XC'),
(2, 'BMX'),
(3, 'MTB'),
(4, 'FR'),
(5, 'DH');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `picture_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `trail_id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `picture_link` varchar(100) NOT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `trail_id`, `user_id`, `name`, `description`, `date`, `picture_link`) VALUES
(1, 1, 1, 'Nimitz Jumps', 'Until the city let''s us build here, our jumps will keep getting destroyed.', '2013-06-06 09:25:37', 'img/trailpic-nimitz1.jpg'),
(2, 2, 1, 'Fury Lane', 'Fury Lane Picture', '2013-06-06 09:25:37', 'img/trailpic-fury1.jpg'),
(3, 3, 1, '94', 'Great Jumps', '2013-06-06 09:27:14', 'img/trailpic-941.jpg'),
(4, 4, 1, 'Bearcat', 'Huge!', '2013-06-06 09:27:14', 'img/trailpic-bearcat1.jpg'),
(5, 5, 1, 'Legacy', 'Huge Canyon jumps', '2013-06-06 09:29:57', 'img/trailpic-legacy1.jpg'),
(6, 6, 1, 'Balboa', 'Great DH spot in the city', '2013-06-06 09:29:57', 'img/trailpic-balboa1.jpg'),
(7, 7, 1, 'Mission', 'Missing Trails', '2013-06-06 09:32:05', 'img/trailpic-mission1.jpg'),
(8, 8, 1, 'Deerfield', 'to dry', '2013-06-06 09:32:05', 'img/trailpic-deerfield1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `trail_id` int(11) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `picture_id` mediumint(9) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `body` text NOT NULL,
  `parent_post_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `trail_id`, `user_id`, `picture_id`, `title`, `date`, `body`, `parent_post_id`) VALUES
(1, 1, 1, 0, 'The Pump Track needs work', '2013-06-04 20:29:00', 'The pump track needs work on the first berm after the gap.  The lip is rounding off, needs dirt added around the perimeter. ', 0),
(2, 2, 2, 0, 'These jumps are sweet!', '2013-06-04 20:29:00', 'I just saw these for the first time today! That''s awesome.', 0),
(3, 1, 1, 0, 'Sweet Trails', '2013-06-04 20:32:37', 'Just saw these trails today, sweet.', 1),
(4, 1, 2, 0, 'Nimitz needs to be rebuilt', '2013-06-04 21:57:32', 'I just drove by today, looks like this spot has been bulldozed again.  Any word from the group rallying for a legit park, Freeride Famosa? ', 0),
(5, 2, 3, 0, 'Fury Lane is Legit', '2013-06-04 21:57:32', 'Fury is riding well right now, it''s really hot tho.  Bring your water.', 0),
(6, 3, 4, 0, 'Looking Good', '2013-06-04 22:02:02', 'Just saw the work on the new line at 94, can''t wait till my wrist heals so I can ride again!!', 0),
(7, 4, 1, 0, 'How big are they?', '2013-06-04 22:02:02', 'I have been out to Bearcat yet, are they bigger than Legacys?', 0),
(8, 5, 2, 0, 'What happened to the Legacy?', '2013-06-04 22:07:34', 'Legacy is looking run down.  Any plans to fix it up?  I want to fix it up, any body want to join me?', 0),
(9, 5, 3, 0, 'Great Spot', '2013-06-04 22:07:34', 'Great spot for a Freeride Friday!  Maybe a Critical Mass on the last Friday of the month.', 0),
(10, 7, 2, 0, 'Mission or Missing Trails', '2013-06-04 22:12:11', 'Can I get a drop or a gap in there somewhere?  Boring ride unless your into long flat and uphill.', 0),
(11, 8, 3, 0, 'Is there any water?', '2013-06-04 22:12:11', 'I went to check out this spot the other day but it''s in ruins.  Anyone know of a water source so we can get some construction maintenance going?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trail_id` int(11) NOT NULL,
  `bike_types` int(11) NOT NULL,
  `skills` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ratings`
--


-- --------------------------------------------------------

--
-- Table structure for table `trails`
--

DROP TABLE IF EXISTS `trails`;
CREATE TABLE IF NOT EXISTS `trails` (
  `trail_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `trail_pic` varchar(100) NOT NULL,
  `trail_sname` varchar(10) NOT NULL,
  `trail_name` varchar(100) NOT NULL,
  `trail_title` varchar(100) NOT NULL,
  `trail_description` text NOT NULL,
  `trail_location` varchar(100) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`trail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trails`
--

INSERT INTO `trails` (`trail_id`, `trail_pic`, `trail_sname`, `trail_name`, `trail_title`, `trail_description`, `trail_location`, `user_id`) VALUES
(1, '', 'Nimitz', 'Freeride Famosa', 'Dirt Jumps by the Beach', 'Freeride Famosa, located on Nimitz Blvd, has been an underground BMX spot for decades.  In the recent years a group of Bicycle advocates have formed a group dedicated to bringing a formal bike park to the location.', '', 1),
(2, '', 'Fury', 'Fury Lane', 'East County''s #1 BMX Spot', 'Fury Lane is East County - San Diego''s premier BMX Dirt Jump location.  Years of riding and maintenance from Socal''s best riders make this the Epic spot it is today.', '', 1),
(3, '', '94', 'Von''s 94', 'Electrifying Jumps', 'Located just pedal strokes away from the Epic trails of Fury Lane, the 94 Dirt Jumps are a well laid out series of tables and doubles designed for all skill levels.', '', 1),
(4, '', 'Bearcat', 'Bearcat Lane', 'Bigger than life!', 'The Bearcat Lane Dirt Jumps are not for the average rider, you better bring skills and balls if you want to ride this ride. ', '', 1),
(5, '', 'Legacy', 'Legacy / Miracles ', 'BMX in the Canyon', 'The Miraculous Dirt Jumps at Lakehurst Legacy are Huge!  ', '', 1),
(6, '', 'Balboa', 'Balboa Bike Park', 'A Quick Downhill in the City', 'Hidden in the canyons of Balboa Park lies a trail designed by Professional Downhill Mountain Bikers.  This spot is an Urban Mountain Bikers dream come true. Don''t for get your Full Face helmet for these jumps!', '', 1),
(7, '', 'Mission', 'Mission Trails Regional Open Space', 'San Diego''s Open Space Park', 'Mission Trails Regional Park encompasses nearly 5,800 acres of both natural and developed recreational acres. Its rugged hills, valleys and open areas represent a San Diego prior to the landing of Cabrillo in San Diego Bay in 1542. Mission Trails Regional Park has been called the third Jewel in the City of San Diego Park System.', '', 1),
(8, '', 'Deerfield', 'Deerfield BMX', 'Mission Trails BMX Spot', 'San Diego listened to our needs for a dedicated BMX riding spot, sort of.  ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `is_admin` tinyint(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `join_date` datetime NOT NULL,
  `avatar_link` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `is_admin`, `username`, `password`, `email`, `join_date`, `avatar_link`) VALUES
(1, 1, 'theHighestCliff', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'thehighestclifff@gmail.com', '2013-06-04 21:45:14', 'img/userpic-clifford.jpg'),
(2, 1, 'Biker John', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bjking@mail.com', '2013-06-04 21:45:14', 'img/userpic-john.jpg'),
(3, 1, 'Biker Jane', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'bjqueen@mail.com', '2013-06-04 21:49:00', 'img/userpic-jane.jpg'),
(4, 1, 'Rider Ryan', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'rryan@mail.com', '2013-06-04 21:49:00', 'img/userpic-ryan.jpg');
