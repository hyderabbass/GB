-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2014 at 01:00 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newgreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `billers`
--

CREATE TABLE IF NOT EXISTS `billers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `country` varchar(55) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile_number` varchar(55) NOT NULL,
  `fax` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `invoice_footer` varchar(1000) NOT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  `cf4` varchar(100) DEFAULT NULL,
  `cf5` varchar(100) DEFAULT NULL,
  `cf6` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `billers`
--

INSERT INTO `billers` (`id`, `name`, `company`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `mobile_number`, `fax`, `email`, `logo`, `invoice_footer`, `cf1`, `cf2`, `cf3`, `cf4`, `cf5`, `cf6`) VALUES
(1, 'Green Brand Ltd', 'GREEN BRANDS LTD', 'Corner Draper & Ave Belle-Rose', 'Quatre-Bornes', 'Mauritius', '58100', 'Mauritius', '+ 230 467-2500 ', '+ 230 5913-5404', '+ 230 467-9900', 'shqmes@yahoo.com', 'logo.png', '&lt;p&gt;\r\n      Thank you for your business!\r\n&lt;/p&gt;', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `date` date NOT NULL,
  `data` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=224 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `menu_id`, `code`, `name`) VALUES
(1, 1, 'PASTEL NAILS', 'PASTEL NAILS'),
(2, 1, 'PASTEL LIPS', 'PASTEL LIPS'),
(3, 1, 'PASTEL EYES', 'PASTEL EYES'),
(4, 1, 'PASTEL FACE', 'PASTEL FACE'),
(5, 2, 'NUTRISENSE HAND', 'NUTRISENSE HAND'),
(6, 2, 'NUTRISENSE BODY', 'NUTRISENSE BODY'),
(7, 3, 'ST IVES FACE', 'ST IVES FACE'),
(8, 3, 'ST IVES BODY LOTION', 'ST IVES BODY LOTION'),
(9, 3, 'ST IVES BODY WASH', 'ST IVES BODY WASH'),
(17, 5, 'ZENITH MAN', 'ZENITH MAN'),
(18, 5, 'ZENITH WOMAN', 'ZENITH WOMAN'),
(19, 6, 'WEIGHLESS BISCUIT', 'WEIGHLESS BISCUIT'),
(20, 6, 'WEIGHLESS CEREAL', 'WEIGHLESS CEREAL'),
(21, 6, 'WEIGHLESS DESERT', 'WEIGHLESS DESERT'),
(22, 6, 'WEIGHLESS JAM', 'WEIGHLESS JAM'),
(23, 6, 'WEIGHLESS JUICE', 'WEIGHLESS JUICE'),
(24, 6, 'WEIGHLESS OIL', 'WEIGHLESS OIL'),
(25, 6, 'WEIGHLESS SAUCE', 'WEIGHLESS SAUCE'),
(26, 6, 'WEIGHLESS SNACK', 'WEIGHLESS SNACK'),
(27, 6, 'WEIGHLESS SPRAY', 'WEIGHLESS SPRAY'),
(28, 6, 'WEIGHLESS SWEET', 'WEIGHLESS SWEET'),
(29, 6, 'WEIGHLESS VINEGAR', 'WEIGHLESS VINEGAR'),
(30, 6, 'WEIGHLESS VITAMIN', 'WEIGHLESS VITAMIN'),
(31, 7, 'ELVIN JUICE 1 LITRE', 'ELVIN JUICE 1 LITRE'),
(32, 7, 'ELVIN JUICE 2 LITRE', 'ELVIN JUICE 2 LITRE'),
(33, 8, 'BEAUCIENE MEN FACE', 'BEAUCIENE MEN FACE'),
(34, 8, 'BEAUCIENE MEN BODY', 'BEAUCIENE MEN BODY'),
(35, 9, 'BEAUCIENE WOMEN FACE', 'BEAUCIENE WOMEN FACE'),
(36, 9, 'BEAUCIENE WOMEN BODY', 'BEAUCIENE WOMEN BODY'),
(37, 10, 'BEAUCIENE BABY', 'BEAUCIENE BABY'),
(38, 11, 'BEAUCIENE PROFESSIONAL', 'BEAUCIENE PROFESSIONAL'),
(39, 12, 'PROTECT BODY', 'PROTECT BODY'),
(40, 13, 'ELVIN SLIMSY 1 LITRE', 'ELVIN SLIMSY 1 LITRE'),
(41, 14, 'TAP DETERGENT', 'TAP DETERGENT'),
(42, 15, 'MOTEX 85 CAR DETERGENT', 'MOTEX 85 CAR DETERGENT'),
(43, 16, 'CAZABELLA RING', 'CAZABELLA RING'),
(44, 16, 'CAZABELLA BRACELET', 'CAZABELLA BRACELET'),
(45, 16, 'CAZABELLA SET', 'CAZABELLA SET'),
(46, 16, 'CAZABELLA CHAIN', 'CAZABELLA CHAIN'),
(47, 16, 'CAZABELLA EARRINGS', 'CAZABELLA EARRINGS'),
(48, 16, 'CAZABELLA MAN WATCH', 'CAZABELLA MAN WATCH'),
(49, 16, 'CAZABELLA WOMAN WATCH', 'CAZABELLA WOMAN WATCH'),
(50, 16, 'CAZABELLA MAN BAGS', 'CAZABELLA MAN BAGS'),
(51, 16, 'CAZABELLA WOMAN HANDBAGS', 'CAZABELLA WOMAN HANDBAGS'),
(100, 17, 'ITEMKIT', 'ITEMKIT');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment`) VALUES
('&lt;h3&gt;\r\n Thank you for Purchasing Stock Manager Advance 2 with POS Module\r\n&lt;/h3&gt;\r\n&lt;p&gt;\r\n               This is latest the latest release of Stock Manager Advance.\r\n&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `credit_allowances`
--

CREATE TABLE IF NOT EXISTS `credit_allowances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(55) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `credit_allowances`
--

INSERT INTO `credit_allowances` (`id`, `name`, `desc`) VALUES
(1, '1500', '1500'),
(2, '3001', '3001'),
(3, '5001', '5001'),
(4, '8001', '8001');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'pending',
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `region` varchar(55) NOT NULL,
  `alternative_address` varchar(55) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `country` varchar(55) NOT NULL,
  `home_number` varchar(20) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `emergency_number` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `training_date` date NOT NULL,
  `id_number` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `work_number` varchar(55) NOT NULL,
  `coordinator_name` varchar(55) NOT NULL,
  `credit_allowance` varchar(100) DEFAULT NULL,
  `place_of_work` varchar(55) NOT NULL,
  `no_of_work` varchar(55) NOT NULL,
  `payment_type` varchar(55) NOT NULL,
  `proof_of_address` varchar(55) NOT NULL,
  `authorization_letter` varchar(55) NOT NULL,
  `cf4` varchar(100) DEFAULT NULL,
  `cf5` varchar(100) DEFAULT NULL,
  `cf6` varchar(100) DEFAULT NULL,
  `type` enum('consultant','teamleader') DEFAULT 'consultant',
  `teamleaderid` int(11) DEFAULT NULL,
  `approval_date` datetime DEFAULT NULL,
  `approval_by` int(5) DEFAULT NULL,
  `blue` enum('no','yes') DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `surname`, `name`, `status`, `company`, `address`, `region`, `alternative_address`, `postal_code`, `country`, `home_number`, `mobile_number`, `emergency_number`, `dob`, `email`, `training_date`, `id_number`, `religion`, `work_number`, `coordinator_name`, `credit_allowance`, `place_of_work`, `no_of_work`, `payment_type`, `proof_of_address`, `authorization_letter`, `cf4`, `cf5`, `cf6`, `type`, `teamleaderid`, `approval_date`, `approval_by`, `blue`) VALUES
(21, 'Boodhun', 'Abdallah', 'approved', 'Playsms', 'kjkjk', 'Curepipe South', 'email@example.com', '1234', '', '57990900', '57896241', '57896241', '2014-07-04', 'abdallah.boodhun@gmail.com', '2014-07-04', '20088810254125', '', '', '', '3001', '', '0', 'Credit Card', '1', '1', '0', '0', '0', 'teamleader', 0, NULL, NULL, 'yes'),
(47, 'Kong', 'Vincent', 'approved', 'Playsms', 'Vacoas', 'Curepipe South', 'email@example.com', '1234', '', '57990900', '59424241', '57896241', '2014-07-04', 'vincent@storm-edge.com', '2014-07-04', '20088810254125', 'Muslim', '127854124', '', '3001', 'Henrietta', '0', 'Switch Maestro', '1', '1', '0', '0', '0', 'consultant', 21, NULL, NULL, 'yes'),
(49, 'Daby', 'Archana', 'approved', 'Playsms', 'Vacoas', 'Port-Louis North', 'email@example.com', '1234', '', '57990900', '57896241', '57896241', '2014-07-08', 'hyder@storm-edge.com', '2014-07-08', '12345678914785', 'Muslim', '127854124', '', '3001', 'Henrietta', '0', 'Cash', '1', '1', '0', '0', '0', 'teamleader', 0, NULL, NULL, 'no'),
(50, 'Nina', 'Andy', 'approved', 'Playsms', 'Vacoas', 'Port-Louis North', 'email@example.com', '1234', '', '57990900', '57896241', '1149998', '2014-07-08', 'hyder@storm-edge.com', '2014-07-08', '12345678914785', 'Muslim', '127854124', '', '3001', 'Henrietta', '0', 'Cash', '1', '1', '0', '0', '0', 'consultant', 49, NULL, NULL, 'no'),
(51, 'Bangash', 'Hyder', 'approved', 'Playsms', 'Vacoas', 'Port-Louis North', 'email@example.com', '12345678', '', '57990900', '57896241', '57896241', '2014-07-08', 'hyder@storm-edge.com', '2014-07-08', '12345678914785', 'Muslim', '127854124', '', '3001', 'Henrietta', '0', 'Cash', '1', '1', '0', '0', '0', 'teamleader', 0, NULL, NULL, 'no'),
(53, 'xBoodhun', 'Abdallah', 'pending', 'Playsms', 'Vacoas', 'Port-Louis North', 'email@example.com', '1234', '', '9999991', '5555552', '5555551', '2014-07-11', 'abdallah.boodhun@gmail.com', '2014-07-11', '12345678914785', 'Muslim', '127854124', '0', '3001', 'Henrietta', '0', 'Cash', '1', '1', '0', '0', '0', 'teamleader', 0, NULL, NULL, 'no'),
(54, 'niteex', 'xnitee', 'pending', 'Vacoas', 'Vacoas', 'Port-Louis North', 'email@example.com', '1234', '', '57990900', '57896241', '57896241', '2014-07-11', 'hyder@storm-edge.com', '2014-07-11', '12345678914785', 'Muslim', '127854124', '', '3001', 'Henrietta', '0', 'Cash', '1', '1', '0', '0', '0', 'consultant', 49, NULL, NULL, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `damage_products`
--

CREATE TABLE IF NOT EXISTS `damage_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `date_format`
--

CREATE TABLE IF NOT EXISTS `date_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `js` varchar(20) NOT NULL,
  `php` varchar(20) NOT NULL,
  `sql` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `date_format`
--

INSERT INTO `date_format` (`id`, `js`, `php`, `sql`) VALUES
(1, 'mm-dd-yyyy', 'm-d-Y', '%m-%d-%Y'),
(2, 'mm/dd/yyyy', 'm/d/Y', '%m/%d/%Y'),
(3, 'dd-mm-yyyy', 'd-m-Y', '%d-%m-%Y'),
(4, 'dd/mm/yyyy', 'd/m/Y', '%d/%m/%Y');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `reference_no` varchar(55) NOT NULL,
  `customer` varchar(55) NOT NULL,
  `coordinator_name` varchar(55) NOT NULL,
  `driver_name` varchar(55) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `date`, `time`, `reference_no`, `customer`, `coordinator_name`, `driver_name`, `address`, `note`, `user`, `updated_by`) VALUES
(1, '2013-11-20', '09:15 AM', 'SL-0013', 'yogesh', '', '', 'campus road   3253 Mauritius. \r\nTel: ', '', 'Owner Owner', 'Owner Owner'),
(2, '2014-06-28', '05:00 PM', 'SL-0202', 'yogesh', 'dorine', 'robin', 'campus road   3253 Mauritius. \r\nTel: ', '', 'Owner Owner', NULL),
(3, '2014-06-26', '11:00 AM', 'SL-0202', 'yogesh', 'dorine', 'robin', 'campus road   3253 Mauritius. \r\nTel: ', '', 'Owner Owner', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliver_types`
--

CREATE TABLE IF NOT EXISTS `deliver_types` (
  `id` mediumint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `desc` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `deliver_types`
--

INSERT INTO `deliver_types` (`id`, `name`, `desc`) VALUES
(1, 'Pick-up', 'Pick-up'),
(2, 'Delivery by Driver', 'Delivery by Driver'),
(3, 'Delivery by Team-Leader', 'Delivery by Team-Leader');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `discount` decimal(4,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `discount`, `type`) VALUES
(1, 'No Discount', '0.00', '2'),
(2, '20 Percent', '20.00', '1'),
(3, '25 Percent', '25.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `due_dates`
--

CREATE TABLE IF NOT EXISTS `due_dates` (
  `id` mediumint(8) NOT NULL,
  `name` varchar(55) NOT NULL,
  `desc` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `due_dates`
--

INSERT INTO `due_dates` (`id`, `name`, `desc`) VALUES
(1, 'None', 'None'),
(2, '14 Days', '14 Days'),
(3, '30 Days', '30 Days'),
(4, '45 Days', '45 Days');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'owner', 'Owner'),
(2, 'admin', 'Administrator'),
(3, 'purchaser', 'Purchasing Staff'),
(4, 'salesman', 'Cashier'),
(5, 'viewer', 'View Only User');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_types`
--

CREATE TABLE IF NOT EXISTS `invoice_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `type` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `invoice_types`
--

INSERT INTO `invoice_types` (`id`, `name`, `type`) VALUES
(5, 'Full Payment', 'Full'),
(6, 'Partial Payment', 'Partial');

-- --------------------------------------------------------

--
-- Table structure for table `itemkits`
--

CREATE TABLE IF NOT EXISTS `itemkits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemkit_no` varchar(55) CHARACTER SET utf8 NOT NULL,
  `itemkit_name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `itemkit_unit` int(11) NOT NULL,
  `new_price` decimal(25,2) NOT NULL,
  `gift_one` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `gift_two` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `gift_three` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `note` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `internal_note` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `inv_total` decimal(25,2) NOT NULL,
  `total_tax` decimal(25,2) DEFAULT NULL,
  `total` decimal(25,2) NOT NULL,
  `invoice_type` int(11) DEFAULT NULL,
  `in_type` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `total_tax2` decimal(25,2) DEFAULT NULL,
  `tax_rate2_id` int(11) DEFAULT NULL,
  `user` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `inv_discount` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `shipping` decimal(25,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `itemkits`
--

INSERT INTO `itemkits` (`id`, `itemkit_no`, `itemkit_name`, `itemkit_unit`, `new_price`, `gift_one`, `gift_two`, `gift_three`, `date`, `start_date`, `end_date`, `note`, `internal_note`, `inv_total`, `total_tax`, `total`, `invoice_type`, `in_type`, `total_tax2`, `tax_rate2_id`, `user`, `updated_by`, `inv_discount`, `discount_id`, `shipping`) VALUES
(72, 'KIT-0001', 'Combo Kit', 10, '500.00', 'EYESHADOW QUAD 204 ', '', '', '2014-05-16', '2014-05-16', '2014-05-30', '', '', '547.00', '0.00', '547.00', NULL, NULL, NULL, 0, 'Owner Owner', NULL, '0.00', 0, NULL),
(73, 'KIT-0073', 'Summer kit', 20, '400.00', 'NAIL POLISH 03', '', '', '2014-05-16', '2014-05-16', '2014-05-31', '', '', '487.00', '0.00', '487.00', NULL, NULL, NULL, 0, 'Owner Owner', NULL, '0.00', 0, NULL),
(74, 'KIT-0074', 'polish nail kit', 5, '300.00', 'NAIL POLISH 01  ', '', '', '2014-06-20', '2014-06-20', '2014-06-20', '', '', '547.00', '0.00', '547.00', NULL, NULL, NULL, 0, 'Owner Owner', NULL, '0.00', 0, NULL),
(75, 'KIT-0075', 'kit combo 3', 100, '400.00', 'NAIL POLISH 02', '', '', '2014-06-28', '2014-06-28', '2014-06-28', '', '', '646.00', '0.00', '646.00', NULL, NULL, NULL, 0, 'Owner Owner', 'Owner Owner', '0.00', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `itemkit_items`
--

CREATE TABLE IF NOT EXISTS `itemkit_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemkit_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) CHARACTER SET utf8 NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_unit` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  `tax` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `val_tax` decimal(25,2) DEFAULT NULL,
  `serial_no` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `discount_val` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `itemkit_items`
--

INSERT INTO `itemkit_items` (`id`, `itemkit_id`, `product_id`, `product_code`, `product_name`, `product_unit`, `tax_rate_id`, `tax`, `quantity`, `unit_price`, `gross_total`, `val_tax`, `serial_no`, `discount_val`, `discount_id`, `discount`) VALUES
(224, 72, 243, '3122', 'METALLIC MONO EYESHADOW 122 ', '100', 0, '', 1, '199.00', '199.00', '0.00', NULL, '0.00', 0, ''),
(225, 72, 3, '1003', 'NAIL POLISH 03', '100', 0, '', 1, '149.00', '149.00', '0.00', NULL, '0.00', 0, ''),
(226, 72, 134, '2011', 'LIPSTICK 11 ', '100', 0, '', 1, '199.00', '199.00', '0.00', NULL, '0.00', 0, ''),
(227, 73, 232, '3033', 'SINGLE EYESHADOW 33', '100', 0, '', 1, '169.00', '169.00', '0.00', NULL, '0.00', 0, ''),
(228, 73, 184, '2303', 'ULTRA SHINE LIPGLOSS 03', '100', 0, '', 1, '199.00', '199.00', '0.00', NULL, '0.00', 0, ''),
(229, 73, 182, '2204', 'LIPLINER SHOW 204', '100', 0, '', 1, '119.00', '119.00', '0.00', NULL, '0.00', 0, ''),
(230, 74, 243, '3122', 'METALLIC MONO EYESHADOW 122 ', '100', 0, '', 2, '199.00', '398.00', '0.00', NULL, '0.00', 0, ''),
(231, 74, 1, '1001', 'NAIL POLISH 01  ', '100', 0, '', 1, '149.00', '149.00', '0.00', NULL, '0.00', 0, ''),
(235, 75, 243, '3122', 'METALLIC MONO EYESHADOW 122 ', '100', 0, '', 1, '199.00', '199.00', '0.00', NULL, '0.00', 0, ''),
(236, 75, 2, '1002', 'NAIL POLISH 02', '100', 0, '', 2, '149.00', '298.00', '0.00', NULL, '0.00', 0, ''),
(237, 75, 2, '1002', 'NAIL POLISH 02', '100', 0, '', 1, '149.00', '149.00', '0.00', NULL, '0.00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `code`, `name`) VALUES
(1, 'PASTEL', 'PASTEL'),
(2, 'NUTRISENSE', 'NUTRISENSE'),
(3, 'ST IVES', 'ST IVES'),
(5, 'ZENITH', 'ZENITH'),
(6, 'WEIGHLESS', 'WEIGHLESS'),
(7, 'ELVIN JUICE', 'ELVIN JUICE'),
(8, 'BEAUCIENE MEN', 'BEAUCIENE MEN'),
(9, 'BEAUCIENE WOMEN', 'BEAUCIENE WOMEN'),
(10, 'BEAUCIENE BABY', 'BEAUCIENE BABY'),
(11, 'BEAUCIENE PROFESSIONAL', 'BEAUCIENE PROFESSIONAL'),
(12, 'PROTECT', 'PROTECT'),
(13, 'ELVIN SLIMSY', 'ELVIN SLIMSY'),
(14, 'TAP', 'TAP'),
(15, 'MOTEX 85', 'MOTEX 85'),
(16, 'CAZABELLA', 'CAZABELLA'),
(17, 'ITEMKIT', 'ITEMKIT');

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE IF NOT EXISTS `order_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) CHARACTER SET utf32 NOT NULL,
  `desc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `name`, `desc`) VALUES
(1, 'Email', 'Email'),
(2, 'Fax', 'Fax'),
(3, 'Direct', 'Direct'),
(4, 'Phone', 'Phone');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `decs` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `decs`) VALUES
(1, 'Cash', 'Cash'),
(2, 'Credit', 'Credit'),
(3, 'Credit Card', 'Credit Card'),
(4, 'Cheque', 'Cheque'),
(5, 'Switch Maestro', 'Switch Maestro'),
(6, 'Commission Deduction', 'Commission Deduction'),
(7, 'Bad Debts', 'Bad Debts'),
(8, 'Salary Deduction', 'Salary Deduction'),
(9, 'Online Banking', 'Online Banking'),
(10, 'Red Cash', 'Red Cash');

-- --------------------------------------------------------

--
-- Table structure for table `pos_settings`
--

CREATE TABLE IF NOT EXISTS `pos_settings` (
  `pos_id` int(1) NOT NULL,
  `cat_limit` int(11) NOT NULL,
  `pro_limit` int(11) NOT NULL,
  `default_category` int(11) NOT NULL,
  `default_customer` int(11) NOT NULL,
  `default_biller` int(11) NOT NULL,
  `display_time` varchar(3) NOT NULL DEFAULT 'yes',
  `cf_title1` varchar(255) DEFAULT NULL,
  `cf_title2` varchar(255) DEFAULT NULL,
  `cf_value1` varchar(255) DEFAULT NULL,
  `cf_value2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pos_settings`
--

INSERT INTO `pos_settings` (`pos_id`, `cat_limit`, `pro_limit`, `default_category`, `default_customer`, `default_biller`, `display_time`, `cf_title1`, `cf_title2`, `cf_value1`, `cf_value2`) VALUES
(1, 22, 30, 1, 21, 1, 'yes', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemkit_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `size` varchar(55) NOT NULL,
  `um` varchar(55) DEFAULT NULL,
  `cost` decimal(25,2) DEFAULT NULL,
  `price` decimal(25,2) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'active',
  `alert_quantity` int(11) NOT NULL DEFAULT '20',
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=624 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `itemkit_id`, `code`, `name`, `unit`, `size`, `um`, `cost`, `price`, `status`, `alert_quantity`, `image`, `category_id`, `menu_id`) VALUES
(1, 0, '1001', 'NAIL POLISH 01  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(2, 0, '1002', 'NAIL POLISH 02', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(3, 0, '1003', 'NAIL POLISH 03', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(4, 0, '1004', 'NAIL POLISH 04  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(5, 0, '1005', 'NAIL POLISH 05  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(6, 0, '1006', 'NAIL POLISH 06', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(7, 0, '1007', 'NAIL POLISH 07', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(8, 0, '1008', 'NAIL POLISH 08', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(9, 0, '1009', 'NAIL POLISH 09  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(10, 0, '1010', 'NAIL POLISH 10', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(11, 0, '1011', 'NAIL POLISH 11', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(12, 0, '1012', 'NAIL POLISH 12 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(13, 0, '1013', 'NAIL POLISH 13', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(14, 0, '1014', 'NAIL POLISH 14', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(15, 0, '1015', 'NAIL POLISH 15', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(16, 0, '1017', 'NAIL POLISH 17 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(17, 0, '1018', 'NAIL POLISH 18', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(18, 0, '1019', 'NAIL POLISH 19', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(19, 0, '1020', 'NAIL POLISH 20  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(20, 0, '1021', 'NAIL POLISH 21', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(21, 0, '1022', 'NAIL POLISH 22', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(22, 0, '1023', 'NAIL POLISH 23', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(23, 0, '1026', 'NAIL POLISH 26 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(24, 0, '1027', 'NAIL POLISH 27  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(25, 0, '1028', 'NAIL POLISH 28', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(26, 0, '1029', 'NAIL POLISH 29', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(27, 0, '1031', 'NAIL POLISH 31 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(28, 0, '1033', 'NAIL POLISH 33  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(29, 0, '1037', 'NAIL POLISH 37', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(30, 0, '1038', 'NAIL POLISH 38 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(31, 0, '1039', 'NAIL POLISH 39', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(32, 0, '1040', 'NAIL POLISH 40  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(33, 0, '1043', 'NAIL POLISH 43  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(34, 0, '1044', 'NAIL POLISH 44 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(35, 0, '1045', 'NAIL POLISH 45  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(36, 0, '1046', 'NAIL POLISH 46  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(37, 0, '1052', 'NAIL POLISH 52  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(38, 0, '1053', 'NAIL POLISH 53  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(39, 0, '1054', 'NAIL POLISH 54 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(40, 0, '1055', 'NAIL POLISH 55  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(41, 0, '1056', 'NAIL POLISH 56 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(42, 0, '1061', 'NAIL POLISH 61  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(43, 0, '1068', 'NAIL POLISH 68  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(44, 0, '1070', 'NAIL POLISH 70  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(45, 0, '1073', 'NAIL POLISH 73 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(46, 0, '1074', 'NAIL POLISH 74  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(47, 0, '1075', 'NAIL POLISH 75  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(48, 0, '1076', 'NAIL POLISH 76 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(49, 0, '1078', 'NAIL POLISH 78  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(50, 0, '1079', 'NAIL POLISH 79 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(51, 0, '1080', 'NAIL POLISH 80 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(52, 0, '1081', 'NAIL POLISH 81  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(53, 0, '1082', 'NAIL POLISH 82  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(54, 0, '1083', 'NAIL POLISH 83  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(55, 0, '1084', 'NAIL POLISH 84  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(56, 0, '1085', 'NAIL POLISH 85  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(57, 0, '1086', 'NAIL POLISH 86  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(58, 0, '1087', 'NAIL POLISH 87  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(59, 0, '1088', 'NAIL POLISH 88  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(60, 0, '1089', 'NAIL POLISH 89  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(61, 0, '1090', 'NAIL POLISH 90  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(62, 0, '1091', 'NAIL POLISH 91  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(63, 0, '1093', 'NAIL POLISH 93  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(64, 0, '1095', 'NAIL POLISH 95  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(65, 0, '1096', 'NAIL POLISH 96  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(66, 0, '1097', 'NAIL POLISH 97  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(67, 0, '1098', 'NAIL POLISH 98 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(68, 0, '1100', 'NAIL POLISH 100  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(69, 0, '1101', 'NAIL POLISH 101 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(70, 0, '1102', 'NAIL POLISH 102 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(71, 0, '1103', 'NAIL POLISH 103  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(72, 0, '1104', 'NAIL POLISH 104  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(73, 0, '1105', 'NAIL POLISH 105 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(74, 0, '1106', 'NAIL POLISH 106 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(75, 0, '1107', 'NAIL POLISH 107  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(76, 0, '1108', 'NAIL POLISH 108  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(77, 0, '1109', 'NAIL POLISH 109 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(78, 0, '1110', 'NAIL POLISH 110 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(79, 0, '1111', 'NAIL POLISH 111 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(80, 0, '1112', 'NAIL POLISH 112  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(81, 0, '1118', 'NAIL POLISH 118  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(82, 0, '1119', 'NAIL POLISH 119  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(83, 0, '1121', 'NAIL POLISH 121 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(84, 0, '1122', 'NAIL POLISH 122 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(85, 0, '1123', 'NAIL POLISH 123  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(86, 0, '1124', 'NAIL POLISH 124', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(87, 0, '1130', 'NAIL POLISH 130  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(88, 0, '1134', 'NAIL POLISH 134  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(89, 0, '1135', 'NAIL POLISH 135 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(90, 0, '1136', 'NAIL POLISH 136  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(91, 0, '1138', 'NAIL POLISH 138', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(92, 0, '1139', 'NAIL POLISH 139', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(93, 0, '1140', 'NAIL POLISH 140  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(94, 0, '1141', 'NAIL POLISH 141  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(95, 0, '1142', 'NAIL POLISH 142  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(96, 0, '1143', 'NAIL POLISH 143 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(97, 0, '1144', 'NAIL POLISH 144  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(98, 0, '1145', 'NAIL POLISH 145  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(99, 0, '1146', 'NAIL POLISH 146', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(100, 0, '1147', 'NAIL POLISH 147', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(101, 0, '1148', 'NAIL POLISH 148', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(102, 0, '1301', 'NAIL POLISH 301 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(103, 0, '1304', 'NAIL POLISH 304  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(104, 0, '1305', 'NAIL POLISH 305  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(105, 0, '1308', 'NAIL POLISH 308  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(106, 0, '1309', 'NAIL POLISH 309  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(107, 0, '1310', 'NAIL POLISH 310 ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(108, 0, '1314', 'NAIL POLISH 314  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(109, 0, '1318', 'NAIL POLISH 318  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(110, 0, '1319', 'NAIL POLISH 319  ', '100', '13ML', NULL, '199.00', '149.00', 'active', 20, 'no_image.jpg', 1, NULL),
(111, 0, '1701', 'NAIL POLISH CRACKLE 701 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(112, 0, '1702', 'NAIL POLISH CRACKLE 702 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(113, 0, '1703', 'NAIL POLISH CRACKLE 703 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(114, 0, '1706', 'NAIL POLISH CRACKLE 704 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(115, 0, '1707', 'NAIL POLISH CRACKLE 707', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(116, 0, '1720', 'NAIL POLISH SAND 720 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(117, 0, '1721', 'NAIL POLISH SAND 721', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(118, 0, '1722', 'NAIL POLISH SAND 722 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(119, 0, '1723', 'NAIL POLISH SAND 723 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(120, 0, '1724', 'NAIL POLISH SAND 724 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(121, 0, '1725', 'NAIL POLISH SAND 725 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(122, 0, '1726', 'NAIL POLISH SAND 726 ', '100', '13ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(123, 0, '1850', 'MATT TOP COAT', '100', '13ML', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(124, 0, '1851', 'INSTANT  CARE ', '100', '13ML', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(125, 0, '1852', 'UNISEX BITTER  ', '100', '13ML', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(126, 0, '1853', 'CALCIUM ', '100', '13ML', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(127, 0, '1854', 'KERATINE', '100', '13ML', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(128, 0, '1855', 'QUICK DRY', '100', '13ML', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(129, 0, '1856', 'GLOSS UP', '100', '13ML', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 1, NULL),
(130, 0, '1405', 'MAGIC GLOSS', '100', '5g', NULL, '99.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(131, 0, '2001', 'LIPSTICK 01', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(132, 0, '2009', 'LIPSTICK 09', '100', '5g', NULL, '250.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(133, 0, '2010', 'LIPSTICK 10', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(134, 0, '2011', 'LIPSTICK 11 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(135, 0, '2012', 'LIPSTICK 12 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(136, 0, '2013', 'LIPSTICK 13 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(137, 0, '2015', 'LIPSTICK 15', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(138, 0, '2020', 'LIPSTICK 20 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(139, 0, '2021', 'LIPSTICK 21 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(140, 0, '2022', 'LIPSTICK 22 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(141, 0, '2023', 'LIPSTICK 23 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(142, 0, '2024', 'LIPSTICK 24 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(143, 0, '2025', 'LIPSTICK 25 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(144, 0, '2026', 'LIPSTICK 26', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(145, 0, '2027', 'LIPSTICK 27 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(146, 0, '2028', 'LIPSTICK 28 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(147, 0, '2029', 'LIPSTICK 29 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(148, 0, '2032', 'LIPSTICK 32 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(149, 0, '2034', 'LIPSTICK 34 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(150, 0, '2037', 'LIPSTICK 37 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(151, 0, '2040', 'LIPSTICK 40 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(152, 0, '2041', 'LIPSTICK 41 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(153, 0, '2044', 'LIPSTICK 44 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(154, 0, '2045', 'LIPSTICK 45 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(155, 0, '2046', 'LIPSTICK 46 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(156, 0, '2048', 'LIPSTICK 48 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(157, 0, '2050', 'LIPSTICK 50 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(158, 0, '2051', 'LIPSTICK 51 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(159, 0, '2052', 'LIPSTICK 52 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(160, 0, '2055', 'LIPSTICK 55 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(161, 0, '2056', 'LIPSTICK 56 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(162, 0, '2057', 'LIPSTICK 57 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(163, 0, '2061', 'LIPSTICK 61', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(164, 0, '2062', 'LIPSTICK 62', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(165, 0, '2069', 'LIPSTICK 69', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(166, 0, '2070', 'LIPSTICK 70', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(167, 0, '2081', 'LIPSTICK 81', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(168, 0, '2082', 'LIPSTICK 82', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(169, 0, '2094', 'LIPSTICK 94', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(170, 0, '2097', 'LIPSTICK 97 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(171, 0, '2098', 'LIPSTICK 98', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(172, 0, '2099', 'LIPSTICK 99', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(173, 0, '2112', 'LIPSTICK 112', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(174, 0, '2121', 'LIPSTICK 121', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(175, 0, '2123', 'LIPSTICK 123', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(176, 0, '2131', 'LIPSTICK 131 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(177, 0, '2132', 'LIPSTICK 132 ', '100', '5g', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(178, 0, '2200', 'LIPLINER SHOW 200 ', '100', '4g', NULL, '199.00', '119.00', 'active', 20, 'no_image.jpg', 2, NULL),
(179, 0, '2201', 'LIPLINER SHOW 201', '100', '4g', NULL, '199.00', '119.00', 'active', 20, 'no_image.jpg', 2, NULL),
(180, 0, '2202', 'LIPLINER SHOW 202', '100', '4g', NULL, '199.00', '119.00', 'active', 20, 'no_image.jpg', 2, NULL),
(181, 0, '2203', 'LIPLINER SHOW 203', '100', '4g', NULL, '199.00', '119.00', 'active', 20, 'no_image.jpg', 2, NULL),
(182, 0, '2204', 'LIPLINER SHOW 204', '100', '4g', NULL, '199.00', '119.00', 'active', 20, 'no_image.jpg', 2, NULL),
(183, 0, '2205', 'LIPLINER SHOW 205', '100', '4g', NULL, '199.00', '119.00', 'active', 20, 'no_image.jpg', 2, NULL),
(184, 0, '2303', 'ULTRA SHINE LIPGLOSS 03', '100', '6g', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(185, 0, '2304', 'ULTRA SHINE LIPGLOSS 04', '100', '6g', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(186, 0, '2306', 'ULTRA SHINE LIPGLOSS 06', '100', '6g', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(187, 0, '2405', 'KISSPROOF 05 ', '100', '7g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(188, 0, '2407', 'KISSPROOF 07 ', '100', '7g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(189, 0, '2409', 'KISSPROOF 09', '100', '7g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(190, 0, '2411', 'KISSPROOF 11', '100', '7g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(191, 0, '2412', 'KISSPROOF 12', '100', '7g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(192, 0, '2415', 'KISSPROOF 15', '100', '7g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(193, 0, '2416', 'KISSPROOF 16', '100', '7g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(194, 0, '2410', 'KISSES LIPBALM 10', '100', '5g', NULL, '99.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(195, 0, '2420', 'KISSES LIPBALM 20 ', '100', '5g', NULL, '99.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(196, 0, '2430', 'KISSES LIPBALM 30 ', '100', '5g', NULL, '99.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(197, 0, '2440', 'KISSES LIPBALM 40', '100', '5g', NULL, '99.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(198, 0, '2501', 'STAR LIPS 501 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(199, 0, '2502', 'STAR LIPS 502 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(200, 0, '2503', 'STAR LIPS 503 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(201, 0, '2504', 'STAR LIPS 504 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(202, 0, '2505', 'STAR LIPS 505 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(203, 0, '2506', 'STAR LIPS 506', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(204, 0, '2507', 'STAR LIPS 507 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(205, 0, '2508', 'STAR LIPS 508', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(206, 0, '2509', 'STAR LIPS 509', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(207, 0, '2510', 'STAR LIPS 510 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(208, 0, '2511', 'STAR LIPS 511', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(209, 0, '2512', 'STAR LIPS 512', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(210, 0, '2513', 'STAR LIPS 513 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(211, 0, '2514', 'STAR LIPS 514 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(212, 0, '2515', 'STAR LIPS 515', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(213, 0, '2516', 'STAR LIPS 516', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(214, 0, '2517', 'STAR LIPS 517 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(215, 0, '2518', 'STAR LIPS 518 ', '100', '5g', NULL, '399.00', '249.00', 'active', 20, 'no_image.jpg', 2, NULL),
(216, 0, '2550', 'SUPER GLOSS 50 ', '100', '6g', NULL, '329.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(217, 0, '2551', 'SUPER GLOSS 51', '100', '6g', NULL, '329.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(218, 0, '2552', 'SUPER GLOSS 52 ', '100', '6g', NULL, '329.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(219, 0, '2553', 'SUPER GLOSS 53', '100', '6g', NULL, '329.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(220, 0, '2554', 'SUPER GLOSS 54', '100', '6g', NULL, '329.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(221, 0, '2555', 'SUPER GLOSS 55 ', '100', '6g', NULL, '329.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(222, 0, '2556', 'SUPER GLOSS 56 ', '100', '6g', NULL, '329.00', '199.00', 'active', 20, 'no_image.jpg', 2, NULL),
(223, 0, '1220', 'WATERPROOF DIPLINER  ', '100', '4.5ML', NULL, '199.00', '299.00', 'active', 20, 'no_image.jpg', 3, NULL),
(224, 0, '1234', 'EXPRESS VOLUME MASCARA ', '100', '12G', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(225, 0, '1276', 'BIG AND BLACK MASCARA', '100', '12ML', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 3, NULL),
(226, 0, '1298', 'DRAMATIC LOOK MASCARA BLACK ', '100', '13.5g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 3, NULL),
(227, 0, '1299', 'DRAMATIC LOOK MASCARA BLUE ', '100', '13.5g', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 3, NULL),
(228, 0, '1176', 'BIG AND BLACK MASCARA', '100', '12ML', NULL, '329.00', '229.00', 'active', 20, 'no_image.jpg', 3, NULL),
(229, 0, '3001', 'SINGLE EYESHADOW 01 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(230, 0, '3011', 'SINGLE EYESHADOW 11 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(231, 0, '3023', 'SINGLE EYESHADOW 23', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(232, 0, '3033', 'SINGLE EYESHADOW 33', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(233, 0, '3035', 'SINGLE EYESHADOW 35 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(234, 0, '3038', 'SINGLE EYESHADOW 38 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(235, 0, '3047', 'SINGLE EYESHADOW 47 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(236, 0, '3051', 'SINGLE EYESHADOW 51 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(237, 0, '3052', 'SINGLE EYESHADOW 52 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(238, 0, '3053', 'SINGLE EYESHADOW 53', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(239, 0, '3056', 'SINGLE EYESHADOW 56', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(240, 0, '3057', 'SINGLE EYESHADOW 57 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(241, 0, '3059', 'SINGLE EYESHADOW 59 ', '100', '4g', NULL, '229.00', '169.00', 'active', 20, 'no_image.jpg', 3, NULL),
(242, 0, '3121', 'METALLIC MONO EYESHADOW 121 ', '100', '3g', NULL, '149.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(243, 0, '3122', 'METALLIC MONO EYESHADOW 122 ', '100', '3g', NULL, '149.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(244, 0, '3123', 'METALLIC MONO EYESHADOW 123 ', '100', '3g', NULL, '149.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(245, 0, '3125', 'METALLIC MONO EYESHADOW 125 ', '100', '3g', NULL, '149.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(246, 0, '3126', 'METALLIC MONO EYESHADOW 126 ', '100', '3g', NULL, '149.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(247, 0, '3127', 'METALLIC MONO EYESHADOW 127 ', '100', '3g', NULL, '149.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(248, 0, '3128', 'METALLIC MONO EYESHADOW 128 ', '100', '3g', NULL, '149.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(249, 0, '3159', 'GLITTER EYELINER 159', '100', '9g', NULL, '199.00', '269.00', 'active', 20, 'no_image.jpg', 3, NULL),
(250, 0, '3160', 'GLITTER EYELINER 160', '100', '9g', NULL, '199.00', '269.00', 'active', 20, 'no_image.jpg', 3, NULL),
(251, 0, '3162', 'GLITTER EYELINER 162', '100', '9g', NULL, '199.00', '269.00', 'active', 20, 'no_image.jpg', 3, NULL),
(252, 0, '3163', 'GLITTER EYELINER 163', '100', '9g', NULL, '199.00', '269.00', 'active', 20, 'no_image.jpg', 3, NULL),
(253, 0, '6001', 'WOODEN EYELINER 01', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(254, 0, '6004', 'WOODEN EYELINER 04', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(255, 0, '6007', 'WOODEN EYELINER 07', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(256, 0, '6011', 'WOODEN EYELINER 11', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(257, 0, '6012', 'WOODEN EYELINER 12', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(258, 0, '6013', 'WOODEN EYELINER 13', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(259, 0, '6014', 'WOODEN EYELINER 14', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(260, 0, '6015', 'WOODEN EYELINER 15', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(261, 0, '6016', 'WOODEN EYELINER 16', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(262, 0, '6019', 'WOODEN EYELINER 19', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(263, 0, '6020', 'WOODEN EYELINER 20', '100', '4g', NULL, '139.00', '99.00', 'active', 20, 'no_image.jpg', 3, NULL),
(264, 0, '6061', 'METALLIC DUO EYESHADOW 61 ', '100', '4g', NULL, '279.00', '379.00', 'active', 20, 'no_image.jpg', 3, NULL),
(265, 0, '6064', 'METALLIC DUO EYESHADOW 64', '100', '4g', NULL, '279.00', '379.00', 'active', 20, 'no_image.jpg', 3, NULL),
(266, 0, '6065', 'METALLIC DUO EYESHADOW 65 ', '100', '4g', NULL, '279.00', '379.00', 'active', 20, 'no_image.jpg', 3, NULL),
(267, 0, '6066', 'METALLIC DUO EYESHADOW 66 ', '100', '4g', NULL, '279.00', '379.00', 'active', 20, 'no_image.jpg', 3, NULL),
(268, 0, '6067', 'METALLIC DUO EYESHADOW 67 ', '100', '4g', NULL, '279.00', '379.00', 'active', 20, 'no_image.jpg', 3, NULL),
(269, 0, '6068', 'METALLIC DUO EYESHADOW 68', '100', '4g', NULL, '279.00', '379.00', 'active', 20, 'no_image.jpg', 3, NULL),
(270, 0, '6101', 'SHOW EYELINER 101', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(271, 0, '6102', 'SHOW EYELINER 102', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(272, 0, '6103', 'SHOW EYELINER 103', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(273, 0, '6104', 'SHOW EYELINER 104', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(274, 0, '6105', 'SHOW EYELINER 105', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(275, 0, '6106', 'SHOW EYELINER 106', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(276, 0, '6107', 'SHOW EYELINER 107', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(277, 0, '6108', 'SHOW EYELINER 108', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(278, 0, '6109', 'SHOW EYELINER 109', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(279, 0, '6110', 'SHOW EYELINER 110', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(280, 0, '6111', 'SHOW EYELINER 111', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(281, 0, '6112', 'SHOW EYELINER 112', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(282, 0, '6113', 'SHOW EYELINER 113', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(283, 0, '6114', 'SHOW EYELINER 114', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(284, 0, '6115', 'SHOW EYELINER 115', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(285, 0, '6116', 'SHOW EYELINER 116', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(286, 0, '6117', 'SHOW EYELINER 117', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(287, 0, '6119', 'SHOW EYELINER 119', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(288, 0, '6120', 'SHOW EYELINER 120', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(289, 0, '6121', 'SHOW EYELINER 121', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(290, 0, '6122', 'SHOW EYELINER 122', '100', '1.14g', NULL, '179.00', '119.00', 'active', 20, 'no_image.jpg', 3, NULL),
(291, 0, '6320', 'METALIC EYELINER 320 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(292, 0, '6321', 'METALIC EYELINER 321 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(293, 0, '6323', 'METALIC EYELINER 323 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(294, 0, '6324', 'METALIC EYELINER 324 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(295, 0, '6325', 'METALIC EYELINER 325 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(296, 0, '6326', 'METALIC EYELINER 326 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(297, 0, '6327', 'METALIC EYELINER 327', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(298, 0, '6328', 'METALIC EYELINER 328 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(299, 0, '6329', 'METALIC EYELINER 329 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(300, 0, '6330', 'METALIC EYELINER 330 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(301, 0, '6331', 'METALIC EYELINER 331', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(302, 0, '6332', 'METALIC EYELINER 332 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(303, 0, '6333', 'METALIC EYELINER 333 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(304, 0, '6334', 'METALIC EYELINER 334', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(305, 0, '6335', 'METALIC EYELINER 335 ', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(306, 0, '6336', 'METALIC EYELINER 336', '100', '1.2g', NULL, '259.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(307, 0, '7009', 'EYESHADOW SET 9   ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(308, 0, '7010', 'EYESHADOW SET 10  ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(309, 0, '7011', 'EYESHADOW SET 11 ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(310, 0, '7012', 'EYESHADOW SET 12  ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(311, 0, '7013', 'EYESHADOW SET 13 ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(312, 0, '7014', 'EYESHADOW SET 14 ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(313, 0, '7015', 'EYESHADOW SET 15 ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(314, 0, '7016', 'EYESHADOW SET 16 ', '100', '11g', NULL, '569.00', '669.00', 'active', 20, 'no_image.jpg', 3, NULL),
(315, 0, '7101', 'MASCARA COLOR 101 ', '100', '5g', NULL, '289.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(316, 0, '7102', 'MASCARA COLOR 102 ', '100', '5g', NULL, '289.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(317, 0, '7103', 'MASCARA COLOR 103 ', '100', '5g', NULL, '289.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(318, 0, '7104', 'MASCARA COLOR 104', '100', '5g', NULL, '289.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(319, 0, '7105', 'MASCARA COLOR 105 ', '100', '5g', NULL, '289.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(320, 0, '7106', 'MASCARA COLOR 106', '100', '5g', NULL, '289.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(321, 0, '7107', 'MASCARA COLOR 107', '100', '5g', NULL, '289.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(322, 0, '8201', 'EYESHADOW QUAD 201 ', '100', '9.2g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 3, NULL),
(323, 0, '8202', 'EYESHADOW QUAD 202 ', '100', '9.2g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 3, NULL),
(324, 0, '8203', 'EYESHADOW QUAD 203 ', '100', '9.2g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 3, NULL),
(325, 0, '8204', 'EYESHADOW QUAD 204 ', '100', '9.2g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 3, NULL),
(326, 0, '8205', 'EYESHADOW QUAD 205', '100', '9.2g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 3, NULL),
(327, 0, '8206', 'EYESHADOW QUAD 206 ', '100', '9.2g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 3, NULL),
(328, 0, '9101', 'EYEBROW PENCIL 01', '100', '', NULL, '99.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(329, 0, '9102', 'EYEBROW PENCIL 02', '100', '', NULL, '99.00', '199.00', 'active', 20, 'no_image.jpg', 3, NULL),
(330, 0, '1847', 'MATTIFYING PRIMER MAKE UP BASE ', '100', '18g', NULL, '450.00', '375.00', 'active', 20, 'no_image.jpg', 4, NULL),
(331, 0, '5401', 'SHOW BY PASTEL POWDER 401', '100', '11g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(332, 0, '5402', 'SHOW BY PASTEL POWDER 402 ', '100', '11g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(333, 0, '5403', 'SHOW BY PASTEL POWDER 403', '100', '11g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(334, 0, '5404', 'SHOW BY PASTEL POWDER 404 ', '100', '11g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(335, 0, '5405', 'SHOW BY PASTEL POWDER 405 ', '100', '11g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(336, 0, '5421', 'SHOW BY PASTEL DUO BLUSH ON 421 ', '100', '11g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(337, 0, '5422', 'SHOW BY PASTEL DUO BLUSH ON 422 ', '100', '11g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(338, 0, '6801', 'BLUSH ON METHEORE BALLS  01', '100', '20g', NULL, '569.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(339, 0, '6803', 'BLUSH ON METHEORE BALLS  03', '100', '20g', NULL, '569.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(340, 0, '7001', 'TERRACOTTA   BLUSH ON 1 ', '100', '12g', NULL, '589.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(341, 0, '7002', 'TERRACOTTA   BLUSH ON 2 ', '100', '12g', NULL, '589.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(342, 0, '7003', 'TERRACOTTA   BLUSH ON 3 ', '100', '12g', NULL, '589.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(343, 0, '7004', 'TERRACOTTA   BLUSH ON 4 ', '100', '12g', NULL, '589.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(344, 0, '7006', 'TERRACOTTA   BLUSH ON 6 ', '100', '12g', NULL, '589.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(345, 0, '7020', 'COMPACT POWDER REF 20', '100', '11g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(346, 0, '7025', 'COMPACT POWDER REF 25 ', '100', '11g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(347, 0, '7035', 'COMPACT POWDER REF 35 ', '100', '11g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(348, 0, '7045', 'COMPACT POWDER REF 45 ', '100', '11g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(349, 0, '7110', 'ULTIMA BLUSH ON 110 ', '100', '6g', NULL, '379.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(350, 0, '7115', 'ULTIMA BLUSH ON 115', '100', '6g', NULL, '379.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(351, 0, '7120', 'ULTIMA BLUSH ON 120 ', '100', '6g', NULL, '379.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(352, 0, '7125', 'ULTIMA BLUSH ON 125 ', '100', '6g', NULL, '379.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(353, 0, '7135', 'ULTIMA BLUSH ON 135 ', '100', '6g', NULL, '379.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(354, 0, '7142', 'ALL OVER POWER 142 ', '100', '8g', NULL, '559.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(355, 0, '7143', 'ALL OVER POWER 143 ', '100', '8g', NULL, '559.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(356, 0, '7144', 'ALL OVER POWER 144 ', '100', '8g', NULL, '559.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(357, 0, '7145', 'ALL OVER POWER 145', '100', '8g', NULL, '559.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(358, 0, '7201', 'COVER STICK 01 ', '100', '5g', NULL, '199.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(359, 0, '7202', 'COVER STICK 02 ', '100', '5g', NULL, '199.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(360, 0, '7203', 'COVER STICK 03 ', '100', '5g', NULL, '199.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(361, 0, '7204', 'COVER STICK 04 ', '100', '5g', NULL, '199.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(362, 0, '7250', 'STICK FONT DE TEINT 250 ', '100', '12g', NULL, '459.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(363, 0, '7251', 'STICK FONT DE TEINT 251 ', '100', '12g', NULL, '459.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(364, 0, '7252', 'STICK FONT DE TEINT 252 ', '100', '12g', NULL, '459.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(365, 0, '7253', 'STICK FONT DE TEINT 253 ', '100', '12g', NULL, '459.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(366, 0, '7300', 'HIGH PERFORMACE  FOND DE TEINT 300', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(367, 0, '7301', 'HIGH PERFORMACE  FOND DE TEINT 301', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(368, 0, '7302', 'HIGH PERFORMACE  FOND DE TEINT 302 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(369, 0, '7304', 'HIGH PERFORMACE  FOND DE TEINT 304 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(370, 0, '7305', 'HIGH PERFORMACE  FOND DE TEINT 305 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(371, 0, '7306', 'HIGH PERFORMACE  FOND DE TEINT 306 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(372, 0, '7350', 'SILKY   FOUNDATION 350 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(373, 0, '7351', 'SILKY   FOUNDATION 351 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(374, 0, '7352', 'SILKY   FOUNDATION 352 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(375, 0, '7353', 'SILKY   FOUNDATION 353', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(376, 0, '7354', 'SILKY   FOUNDATION 354 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(377, 0, '7355', 'SILKY   FOUNDATION 355 ', '100', '30g', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 4, NULL),
(378, 0, '8002', 'BRONZING  POWDER 02 ', '100', '20g', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 4, NULL),
(379, 0, '8003', 'BRONZING  POWDER 03 ', '100', '20g', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 4, NULL),
(380, 0, '8110', 'SPRING BLUSH ON  10 ', '100', '5g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(381, 0, '8115', 'SPRING BLUSH ON 15 ', '100', '5g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(382, 0, '8116', 'PRETTY CHEEK 16 ', '100', '5g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(383, 0, '8117', 'PRETTY CHEEK 17 ', '100', '5g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(384, 0, '8118', 'PRETTY CHEEK 18', '100', '5g', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 4, NULL),
(385, 0, '4001', 'NUTRISENSE SHOWER GEL SMOOTH ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 6, NULL),
(386, 0, '4002', 'NUTRISENSE HANDWASH SMOOTH ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(387, 0, '4003', 'NUTRISENSE HAND LOTION SMOOTH ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(388, 0, '4004', 'NUTRISENSE BODY LOTION SMOOTH ', '100', '400ML', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 6, NULL),
(389, 0, '4005', 'NUTRISENSE SHOWER GEL SILK ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 6, NULL),
(390, 0, '4006', 'NUTRISENSE HANDWASH SILK ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(391, 0, '4007', 'NUTRISENSE HAND LOTION SILK ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(392, 0, '4008', 'NUTRISENSE BODY LOTION SILK', '100', '400ML', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 6, NULL),
(393, 0, '4009', 'NUTRISENSE SHOWER GEL INTENSE ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 6, NULL),
(394, 0, '4010', 'NUTRISENSE HANDWASH INTENSE ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(395, 0, '4011', 'INUTRISENSE HAND LOTION INTENSE ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(396, 0, '4012', 'NUTRISENSE BODY LOTION INTENSE ', '100', '400ML', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 6, NULL),
(397, 0, '4013', 'NUTRISENSE SHOWER GEL CALM ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 6, NULL),
(398, 0, '4014', 'NUTRISENSE HANDWASH CALM ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(399, 0, '4015', 'NUTRISENSE HAND LOTION CALM ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(400, 0, '4016', 'NUTRISENSE BODY LOTION CALM ', '100', '400ML', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 6, NULL),
(401, 0, '4017', 'NUTRISENSE SHOWER GEL ENRICH ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 6, NULL),
(402, 0, '4018', 'NUTRISENSE HANDWASH ENRICH ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(403, 0, '4019', 'NUTRISENSE HAND LOTION ENRICH', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(404, 0, '4020', 'NUTRISENSE BODY LOTION ENRICH', '100', '400ML', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 6, NULL),
(405, 0, '4021', 'NUTRISENSE SHOWER GEL FRESH ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 6, NULL),
(406, 0, '4022', 'NUTRISENSE HANDWASH FRESH', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(407, 0, '4023', 'NUTRISENSE HAND LOTION FRESH ', '100', '250ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 5, NULL),
(408, 0, '4024', 'NUTRISENSE BODY LOTION FRESH ', '100', '400ML', NULL, '249.00', '199.00', 'active', 20, 'no_image.jpg', 6, NULL),
(409, 0, '4201', 'MEN MASQUE 75 ML', '100', '75ML', NULL, '699.00', '399.00', 'active', 20, 'no_image.jpg', 33, NULL),
(410, 0, '4202', 'MEN AFTERSHAVE BALM', '100', '75ML', NULL, '699.00', '399.00', 'active', 20, 'no_image.jpg', 33, NULL),
(411, 0, '4203', 'MEN MOISTURIZER SPF15', '100', '75ML', NULL, '559.00', '399.00', 'active', 20, 'no_image.jpg', 33, NULL),
(412, 0, '4204', 'MEN MOISTURIZER 24HR NORMAL ANTI AGE CREAM ', '100', '75ML', NULL, '699.00', '399.00', 'active', 20, 'no_image.jpg', 34, NULL),
(413, 0, '4205', 'MEN ALL OVER BODY AND FACE LOTION', '100', '220ML', NULL, '699.00', '399.00', 'active', 20, 'no_image.jpg', 34, NULL),
(414, 0, '4206', 'MEN FACIAL WASH', '100', '220ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 33, NULL),
(415, 0, '4207', 'MEN FACIAL SCRUB', '100', '220ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 33, NULL),
(416, 0, '4208', 'MEN SHAVING GEL', '100', '220ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 33, NULL),
(417, 0, '4210', 'LADIES CLEANSER', '100', '220ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 35, NULL),
(418, 0, '4211', 'LADIES HYDRATING TONER 220ML', '100', '220ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 35, NULL),
(419, 0, '4212', 'LADIES EXFOLIATOR', '100', '100ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 35, NULL),
(420, 0, '4213', 'LADIES MASQUE', '100', '75ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 35, NULL),
(421, 0, '4214', 'LADIES MOISTURIZER 24HR NORMAL', '100', '50ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 36, NULL),
(422, 0, '4215', 'LADIES DRY SKIN', '100', '50ML', NULL, '499.00', '399.00', 'active', 20, 'no_image.jpg', 36, NULL),
(423, 0, '4216', 'LADIES EYES RESQUE GEL ', '100', '15mL', NULL, '599.00', '399.00', 'active', 20, 'no_image.jpg', 35, NULL),
(424, 0, '4217', 'LADIES SPF15 DAY CREAM', '100', '50ML', NULL, '599.00', '399.00', 'active', 20, 'no_image.jpg', 36, NULL),
(425, 0, '4218', 'LADIES  BB CREAM WALNUT ', '100', '50ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 35, NULL);
INSERT INTO `products` (`id`, `itemkit_id`, `code`, `name`, `unit`, `size`, `um`, `cost`, `price`, `status`, `alert_quantity`, `image`, `category_id`, `menu_id`) VALUES
(426, 0, '4219', 'LADIES  BB CREAM CASHEW', '100', '50ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 35, NULL),
(427, 0, '4220', 'LADIES SHAMPOO', '100', '220 ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 36, NULL),
(428, 0, '4221', 'LADIES CONDITIONER', '100', '220ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 36, NULL),
(429, 0, '4222', 'LADIES SHOWER GEL', '100', '250ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 36, NULL),
(430, 0, '4223', 'LADIES BODY MILK', '100', '250ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 36, NULL),
(431, 0, '4224', 'HAND WASH', '100', '250ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 36, NULL),
(432, 0, '4225', 'LADIES BODY BUTTER', '100', '300 ML', NULL, '599.00', '499.00', 'active', 20, 'no_image.jpg', 36, NULL),
(433, 0, '4226', 'BABY LOTION ', '100', '220ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 37, NULL),
(434, 0, '4227', 'BABY SHAMPOO', '100', '220ML', NULL, '299.00', '199.00', 'active', 20, 'no_image.jpg', 37, NULL),
(435, 0, '4228', 'BABY BARRIER CREAM ', '100', '75ML', NULL, '349.00', '249.00', 'active', 20, 'no_image.jpg', 37, NULL),
(436, 0, '4428', 'GENTLE EYE MAKE UP REMOVER ', '100', '500 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(437, 0, '4429', 'HYDRADING CLEANSING GEL', '100', '500 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(438, 0, '4430', 'HYDRADING CLEANSING MILK ', '100', '500 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(439, 0, '4431', 'HYDRADING TONNING LOTION ', '100', '500 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(440, 0, '4432', 'GENTLE TONNING  LOTION ', '100', '500 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(441, 0, '4433', 'HYDRADING EXFOLLATING CREAM ', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(442, 0, '4434', 'ENZYMATIC EXFOLLATING GEL', '100', '400 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(443, 0, '4435', 'DEEP CLEANSING ENZYMATIC MASK', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(444, 0, '4436', 'DEEP HYDRADING MASK ', '100', '400 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(445, 0, '4437', 'DAY MOISTURE CREAM SPF 15', '100', '220 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(446, 0, '4438', 'MEN`S ANTI-WRINKLE MOISTURE CREAM SPF 15', '100', '220 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(447, 0, '4439', 'HYDRADING MASSAGE CREAM ', '100', '450 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(448, 0, '4440', 'EYE GEL MASK ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(449, 0, '4441', 'HAND SANITISING ', '100', '400 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(450, 0, '4442', 'SUPERIOR FLASH LIFT CREAM', '100', '100 ML ', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 38, NULL),
(451, 0, '4501', 'ALARMA BLACK EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(452, 0, '4502', 'ALARMA BLUE EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(453, 0, '4503', 'ALARMA OUD EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(454, 0, '4504', 'ARCHIPEL EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(455, 0, '4505', 'BLACK OUDH EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(456, 0, '4506', 'BLACK SIDE EDT  ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(457, 0, '4507', 'BLUE SIDE EDT', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(458, 0, '4508', 'GALAXA EDT', '100', '90ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(459, 0, '4509', 'GAME FOR HIM EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(460, 0, '4510', 'GUSTO EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(461, 0, '4511', 'HAPPY MOMENT EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(462, 0, '4512', 'HORIZON EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(463, 0, '4513', 'JUST BLACK EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(464, 0, '4514', 'JUST BLUE EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(465, 0, '4515', 'JUST OUDH EDP', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(466, 0, '4516', 'MAGIC STAR EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(467, 0, '4517', 'MS Homme', '100', '90ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(468, 0, '4518', 'MS Oud', '100', '90ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(469, 0, '4519', 'MS White', '100', '90ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(470, 0, '4520', 'OPTION EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(471, 0, '4521', 'OUD SIDE EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(472, 0, '4522', 'OXALYS EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(473, 0, '4523', 'PLEASE EDT ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(474, 0, '4524', 'PURE OUDH EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(475, 0, '4525', 'REFLEX OUDH EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(476, 0, '4526', 'ROYAL MUKHALAT EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(477, 0, '4527', 'ROYAL MUSC EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(478, 0, '4528', 'ROYAL OUDH EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(479, 0, '4529', 'ROYAL VANILLA EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(480, 0, '4530', 'SECRET STYLE EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(481, 0, '4531', 'SILVER SIDE EDT  ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(482, 0, '4532', 'STAR MUKHALAT EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(483, 0, '4533', 'STAR OUDH EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(484, 0, '4534', 'SYNCHRO  EDT', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(485, 0, '4535', 'TEMPO EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(486, 0, '4536', 'VAREL NIGHTS GENTLEMAN  EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(487, 0, '4537', 'VAREL NIGHTS MAN EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(488, 0, '4538', 'WHITE SIDE EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(489, 0, '4539', 'XTRA BLACK EDT', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(490, 0, '4540', 'XTRA BLUE EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(491, 0, '4541', 'XTRA MUKHALAT EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(492, 0, '4542', 'XTRA OUDH EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(493, 0, '4543', 'XTRA WHITE EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 17, NULL),
(494, 0, '4544', 'ARCHIPEL EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(495, 0, '4545', 'EVIDENCIA EDP', '100', '90ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(496, 0, '4546', 'EVIDENCIA SWEETY EDP', '100', '90ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(497, 0, '4547', 'FREE STAR BLUE EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(498, 0, '4548', 'FREE STAR GOLD EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(499, 0, '4549', 'FREE STAR PINK EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(500, 0, '4550', 'GALAXA  EDP', '100', '90ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(501, 0, '4551', 'GAME FOR HER EDP', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(502, 0, '4552', 'GUSTO EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(503, 0, '4553', 'HAPPY MOMENT EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(504, 0, '4554', 'HORIZON  EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(505, 0, '4555', 'JOY TIME GREEN  EDP', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(506, 0, '4556', 'JOY TIME HONEY  EDP', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(507, 0, '4557', 'JOY TIME PINKY  EDP', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(508, 0, '4558', 'JUST PINK EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(509, 0, '4559', 'JUST SECRET EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(510, 0, '4560', 'JUST SECRET EMOTION EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(511, 0, '4561', 'MAGIC STAR EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(512, 0, '4562', 'OPTION EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(513, 0, '4563', 'OXALYS EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(514, 0, '4564', 'PLEASE EDP ', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(515, 0, '4565', 'PURE SIDE EDP', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(516, 0, '4566', 'RED SIDE EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(517, 0, '4567', 'ROMANESCA EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(518, 0, '4568', 'ROMANESCA SENSATION EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(519, 0, '4569', 'SECRET STYLE EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(520, 0, '4570', 'SYNCHRO EDP', '100', '100ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(521, 0, '4571', 'TEMPO EDT ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(522, 0, '4572', 'WHITE SIDE EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(523, 0, '4573', 'XTRA RED EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(524, 0, '4574', 'XTRA WHITE EDP ', '100', '100 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 18, NULL),
(525, 0, '4301', 'ST. IVES ', '100', '30 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(526, 0, '4302', 'ST. IVES NATURALLY CLEAR GREEN TEA FACIAL SCRUB ', '100', '133 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(527, 0, '4303', 'ST. IVES ', '100', '30 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(528, 0, '4304', 'ST. IVES FRESH SKIN INVIGORATING APRICOT SCRUB ', '100', '222 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(529, 0, '4305', 'ST. IVES TIMELESS SKIN RENEW AND FIRM APRICOT SCRUB ', '100', '177 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(530, 0, '4306', 'ST. IVES FRESH SKIN INVIGORATING APRICOT SCRUB', '100', '177 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(531, 0, '4307', 'ST. IVES NATURALLY CLEAR BLEMISH AND BLACKHEAD APRICOT SCRUB ', '100', '177 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(532, 0, '4308', 'ST. IVES SENSITIVE SKIN GENTLE APRICOT SCRUB ', '100', '177 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(533, 0, '4309', 'ST IVES NATURALLY CLEAR GREEN TEA CLEANSER ', '100', '200 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(534, 0, '4310', 'ST. IVES NATURALLY CLEAR BLEMISH FIGHTING APRICOT CLEANSER ', '100', '192 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(535, 0, '4311', 'ST. IVES FRESH SKIN MAKEUP REMOVER FACIAL CLEANSER ', '100', '177 ML', NULL, '399.00', '299.00', 'active', 20, 'no_image.jpg', 7, NULL),
(536, 0, '4312', 'ST. IVES NATURALLY SMOOTH NATURAL FRUIT AHA COMPLEX BODY LOTION ', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(537, 0, '4313', 'ST. IVES DEEP REPLENISHING MINERAL THERAPY BODY LOTION ', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(538, 0, '4314', 'ST. IVES NATURALLY INDULGENT COCONUT MILK AND ORCHID EXTRACT BODY LOTION', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(539, 0, '4315', 'ST. IVES SKIN RENEWING COLLAGEN ELASTIN BODY LOTION ', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(540, 0, '4316', 'ST. IVES DEEP RESTORING 24 HOUR MOISTURE BODY LOTION ', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(541, 0, '4317', 'ST. IVES ', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(542, 0, '4318', 'ST. IVES DAILY HYDRATING VITAMIN E BODY LOTION ', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(543, 0, '4319', 'ST. IVES NATURALLY SOOTHING OATMEAL AND SHEA BUTTER BODY LOTION ', '100', '621ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 8, NULL),
(544, 0, '4320', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(545, 0, '4321', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(546, 0, '4322', 'ST. IVES TRIPLE BUTTERS CREAMY VANILLA BODY WASH ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(547, 0, '4323', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(548, 0, '4324', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(549, 0, '4325', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(550, 0, '4326', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(551, 0, '4327', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(552, 0, '4328', 'ST. IVES TRIPLE BUTTERS CREAMY COCONUT BODY WASH', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(553, 0, '4329', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(554, 0, '4330', 'ST IVES COLLAGEN ELASTIN BODY WASH', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(555, 0, '4331', 'ST. IVES ', '100', '400ML', NULL, '499.00', '299.00', 'active', 20, 'no_image.jpg', 9, NULL),
(556, 0, '4601', 'AQUA', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(557, 0, '4602', 'OXYGEN', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(558, 0, '4603', 'FRESH', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(559, 0, '4604', 'SENSITIVE', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(560, 0, '4605', 'ORIGINAL', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(561, 0, '4606', 'SOFT', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(562, 0, '4607', 'ACTIVE', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(563, 0, '4608', 'X FACTOR', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(564, 0, '4609', 'ENERGY', '100', '50 ML', NULL, '199.00', '99.00', 'active', 20, 'no_image.jpg', 39, NULL),
(565, 0, '4610', 'SOFT SHOWER GEL', '100', '220 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 39, NULL),
(566, 0, '4611', 'SENSITIVE SHOWER GEL', '100', '220 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 39, NULL),
(567, 0, '4612', 'SOFT BODY LOTION', '100', '220 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 39, NULL),
(568, 0, '4613', 'SENSITIVE BODY GEL', '100', '221 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 39, NULL),
(569, 0, '4614', 'TISSUE OIL', '100', '50 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 39, NULL),
(570, 0, '4615', 'BODY LOTION   400 ml', '100', '400 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 39, NULL),
(571, 0, '4616', 'BODY CREAM 450 ml', '100', '400 ML', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 39, NULL),
(572, 0, '4701', 'ELVIN DRINK BLEND ORANGE', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(573, 0, '4702', 'ELVIN NECTAR FRUIT MEDLEY', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(574, 0, '4703', 'ELVIN NECTAR FRUIT PUNCH', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(575, 0, '4704', 'ELVIN NECTAR GUAVA ', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(576, 0, '4705', 'ELVIN NECTAR GUAVA BANANA', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(577, 0, '4706', 'ELVIN NECTAR MANGO', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(578, 0, '4707', 'ELVIN NECTAR MANGO & ORANGE', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(579, 0, '4708', 'ELVIN NECTAR BERRY ', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(580, 0, '4709', 'ELVN NECTAR PEACH & APRICOT', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(581, 0, '4710', 'ELVIN NECTAR TROPICAL PUNCH', '100', '1L', NULL, '99.00', '129.00', 'active', 20, 'no_image.jpg', 31, NULL),
(582, 0, '4711', 'ELVIN DRINK BLEND GRAPEFRUIT ', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(583, 0, '4712', 'ELVIN DRINK APPLE BLEND 10% ', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(584, 0, '4713', 'ELVIN DRINK BLEND ORANGE', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(585, 0, '4714', 'ELVIN NECTAR FRUIT MEDLEY ', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(586, 0, '4715', 'ELVIN NECTAR FRUIT PUNCH', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(587, 0, '4716', 'ELVIN NECTAR GUAVA BANANA ', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(588, 0, '4717', 'ELVIN NECTAR MANGO ', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(589, 0, '4718', 'ELVIN NECTAR MANGO & ORANGE', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(590, 0, '4719', 'ELVIN NECTAR BERRY ', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(591, 0, '4720', 'ELVIN NECTAR PEACH & APRICOT ', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(592, 0, '4721', 'ELVIN NECTAR TROPICAL PUNCH', '100', '2L', NULL, '229.00', '199.00', 'active', 20, 'no_image.jpg', 32, NULL),
(593, 0, '4722', 'SLIMSY GRAPEFRUIT ', '100', '1L', NULL, '149.00', '99.00', 'active', 20, 'no_image.jpg', 40, NULL),
(594, 0, '4723', 'SLIMSY ORANGE', '100', '1L', NULL, '149.00', '99.00', 'active', 20, 'no_image.jpg', 40, NULL),
(595, 0, '4724', 'SLIMSY LEMON & LIME', '100', '1L', NULL, '149.00', '99.00', 'active', 20, 'no_image.jpg', 40, NULL),
(596, 0, '4725', 'SLIMSY PASSION ', '100', '1L', NULL, '149.00', '99.00', 'active', 20, 'no_image.jpg', 40, NULL),
(597, 0, '4726', 'SLIMSY RED BERRY ', '100', '1L', NULL, '149.00', '99.00', 'active', 20, 'no_image.jpg', 40, NULL),
(598, 0, '4727', 'SLIMSY MANGO & ORANGE ', '100', '1L', NULL, '149.00', '99.00', 'active', 20, 'no_image.jpg', 40, NULL),
(599, 0, '4728', 'SLIMSY POMERGRATE ', '100', '1L', NULL, '149.00', '99.00', 'active', 20, 'no_image.jpg', 40, NULL),
(600, 0, '4729', 'ELVIN APPLE CIDER VINEGAR ', '100', '1L', NULL, '99.00', '79.00', 'active', 20, 'no_image.jpg', 40, NULL),
(601, 0, '4801', 'TAP REGULAR APC', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(602, 0, '4802', 'TAP LEMON APC', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(603, 0, '4803', 'TAP FLOOR &WALL TILE CLEANER SPRAY', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(604, 0, '4804', 'TAP KITCHEN SURFACE CLEANER SPRAY', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(605, 0, '4805', 'TAP WINDOW CLEANER SPRAY', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(606, 0, '4806', 'TAP BLEACH THICK PINE', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(607, 0, '4807', 'TAP BLEACH THICK LEMON', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(608, 0, '4808', 'TAP FABRIC SOFTENER APPLE', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(609, 0, '4809', 'TAP FABRIC SOFTENER LAVENDER', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(610, 0, '4810', 'TAP HI-FOAM POWDER BAG BLUE', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(611, 0, '4811', 'TAP HI-FOAM POWDER BAG WHITE', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 41, NULL),
(612, 0, '5101', 'WHEEL CLEANER', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 42, NULL),
(613, 0, '5102', 'DASH BOARD SHINE', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 42, NULL),
(614, 0, '5103', 'TIRE BRITE', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 42, NULL),
(615, 0, '5104', 'CAR SHAMPOO', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 42, NULL),
(616, 0, '5105', 'CAR POLISH', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 42, NULL),
(617, 0, '5106', 'CAR WASH AND WAX ', '100', '', NULL, '0.00', '0.00', 'active', 20, 'no_image.jpg', 42, NULL),
(618, 72, 'KIT-0001', 'Combo Kit', '10', '', NULL, NULL, '500.00', 'active', 20, 'no_image.jpg', 100, NULL),
(619, 73, 'KIT-0073', 'Summer kit', '20', '', NULL, NULL, '400.00', 'active', 20, 'no_image.jpg', 100, NULL),
(620, 74, 'KIT-0074', 'polish nail kit', '5', '', NULL, NULL, '300.00', 'active', 20, 'no_image.jpg', 100, NULL),
(621, 75, 'KIT-0075', 'kit combo 3', '100', '', NULL, NULL, '400.00', 'active', 20, 'no_image.jpg', 100, NULL),
(622, 0, 'sams4', 'Hyder', '10', '10', NULL, '200.00', '250.00', 'active', 20, 'no_image.jpg', 2, 1),
(623, 0, 'iphone14', 'Iphone 14', '6', '7', NULL, '8.00', '9.00', 'active', 10, 'no_image.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `normal_price` decimal(25,2) DEFAULT NULL,
  `discount_price` decimal(25,2) DEFAULT NULL,
  `status` varchar(55) CHARACTER SET utf8 NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `product_id`, `start_date`, `end_date`, `normal_price`, `discount_price`, `status`) VALUES
(1, 617, '2014-06-12', '2014-06-13', '0.00', '500.00', 'inactive'),
(2, 1, '2014-06-26', '2014-06-28', '149.00', '100.00', 'inactive'),
(3, 2, '2014-06-26', '2014-06-28', '149.00', '100.00', 'inactive'),
(4, 3, '2014-06-26', '2014-06-26', '149.00', '4100.00', 'inactive'),
(5, 4, '2014-06-26', '2014-06-26', '149.00', '200.00', 'inactive'),
(6, 5, '2014-06-26', '2014-06-27', '149.00', '10.00', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(1000) NOT NULL,
  `total` decimal(25,2) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `warehouse_id`, `supplier_id`, `supplier_name`, `date`, `note`, `total`, `user`, `updated_by`) VALUES
(1, 'PO-0001', 1, 1, 'Test Supplier', '2014-06-30', '&lt;p&gt;\r\n NAIL POLISH 110\r\n&lt;/p&gt;', '199.00', 'Owner Owner', NULL),
(2, 'PO-0002', 1, 1, 'Test Supplier', '2014-06-30', '', '249.00', 'Owner Owner', NULL),
(3, 'PO-0003', 1, 1, 'Test Supplier', '2014-06-30', '', '499.00', 'Owner Owner', NULL),
(4, 'PO-0004', 1, 1, 'Test Supplier', '2014-06-30', '', '299.00', 'Owner Owner', NULL),
(5, 'PO-0005', 1, 1, 'Test Supplier', '2014-06-02', '', '199.00', 'Owner Owner', NULL),
(6, 'PO-0006', 1, 1, 'Test Supplier', '2014-06-10', '', '896.00', 'Owner Owner', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE IF NOT EXISTS `purchase_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `batch_number` varchar(55) DEFAULT NULL,
  `expiry_date` date NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `tax_amount` decimal(25,2) DEFAULT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `product_id`, `product_code`, `product_name`, `quantity`, `batch_number`, `expiry_date`, `unit_price`, `tax_amount`, `gross_total`) VALUES
(1, 1, 78, '1110', 'NAIL POLISH 110 ', 1, '-', '0000-00-00', '199.00', NULL, '199.00'),
(2, 2, 143, '2025', 'LIPSTICK 25 ', 1, '-', '0000-00-00', '249.00', NULL, '249.00'),
(3, 3, 346, '7025', 'COMPACT POWDER REF 25 ', 1, '45321', '2014-06-10', '499.00', NULL, '499.00'),
(4, 4, 121, '1725', 'NAIL POLISH SAND 725 ', 1, '-', '0000-00-00', '299.00', NULL, '299.00'),
(5, 5, 81, '1118', 'NAIL POLISH 118  ', 1, '-', '2014-06-18', '199.00', NULL, '199.00'),
(6, 6, 10, '1010', 'NAIL POLISH 10', 2, '1010', '2014-06-01', '199.00', NULL, '398.00'),
(7, 6, 121, '1725', 'NAIL POLISH SAND 725 ', 1, '500', '2014-06-10', '299.00', NULL, '299.00'),
(8, 6, 89, '1135', 'NAIL POLISH 135 ', 1, '200', '2014-06-05', '199.00', NULL, '199.00');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `biller_id` int(11) NOT NULL,
  `biller_name` varchar(55) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `internal_note` varchar(1000) DEFAULT NULL,
  `inv_total` decimal(25,2) NOT NULL,
  `total_tax` decimal(25,2) DEFAULT NULL,
  `total` decimal(25,2) NOT NULL,
  `invoice_type` int(11) DEFAULT NULL,
  `in_type` varchar(55) DEFAULT NULL,
  `total_tax2` decimal(25,2) DEFAULT NULL,
  `tax_rate2_id` int(11) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `inv_discount` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `shipping` decimal(25,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `reference_no`, `warehouse_id`, `biller_id`, `biller_name`, `customer_id`, `customer_name`, `date`, `note`, `internal_note`, `inv_total`, `total_tax`, `total`, `invoice_type`, `in_type`, `total_tax2`, `tax_rate2_id`, `user`, `updated_by`, `inv_discount`, `discount_id`, `shipping`) VALUES
(1, 'QU-0001', 1, 1, 'Green Brand Ltd', 21, 'yogesh', '2013-11-26', '', '', '199.00', '47.76', '288.35', NULL, NULL, '47.76', 2, 'Owner Owner', 'Owner Owner', '6.17', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `quote_items`
--

CREATE TABLE IF NOT EXISTS `quote_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  `tax` varchar(55) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `val_tax` decimal(25,2) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `discount_val` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quote_items`
--

INSERT INTO `quote_items` (`id`, `quote_id`, `product_id`, `product_code`, `product_name`, `product_unit`, `tax_rate_id`, `tax`, `quantity`, `unit_price`, `gross_total`, `val_tax`, `serial_no`, `discount_val`, `discount_id`, `discount`) VALUES
(1, 1, 300, '7122', 'METALLIC MONO EYESHADOW REF122 3g', '100', 2, '24.00%', 1, '199.00', '199.00', '47.76', NULL, '6.17', 2, '2.50%');

-- --------------------------------------------------------

--
-- Table structure for table `region_days`
--

CREATE TABLE IF NOT EXISTS `region_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(55) CHARACTER SET utf8 NOT NULL,
  `day` varchar(55) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `region_days`
--

INSERT INTO `region_days` (`id`, `region`, `day`) VALUES
(1, 'Port-Louis North', 'Monday'),
(2, 'Curepipe South', 'Tuesday'),
(3, 'Plain Wilhems', 'Wednesday'),
(4, 'Flacq', 'Thursday'),
(5, 'Rodrigues', 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(55) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `biller_id` int(11) NOT NULL,
  `biller_name` varchar(55) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'active',
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(55) NOT NULL,
  `deliver_id` int(11) NOT NULL,
  `deliver_type` varchar(55) NOT NULL,
  `due_id` int(11) NOT NULL,
  `due_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_type` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `coordinator_name` varchar(55) NOT NULL,
  `driver_name` varchar(55) NOT NULL,
  `served_by` varchar(55) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `internal_note` varchar(1000) DEFAULT NULL,
  `inv_total` decimal(25,2) NOT NULL,
  `total_tax` decimal(25,2) DEFAULT NULL,
  `total` decimal(25,2) NOT NULL,
  `invoice_type` int(11) DEFAULT NULL,
  `in_type` varchar(55) DEFAULT NULL,
  `total_tax2` decimal(25,2) DEFAULT NULL,
  `tax_rate2_id` int(11) DEFAULT NULL,
  `inv_discount` decimal(25,2) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `paid_by` varchar(55) DEFAULT 'cash',
  `count` int(11) DEFAULT NULL,
  `shipping` decimal(25,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `reference_no`, `warehouse_id`, `biller_id`, `biller_name`, `customer_id`, `customer_name`, `status`, `payment_id`, `payment_type`, `deliver_id`, `deliver_type`, `due_id`, `due_date`, `order_id`, `order_type`, `date`, `coordinator_name`, `driver_name`, `served_by`, `note`, `internal_note`, `inv_total`, `total_tax`, `total`, `invoice_type`, `in_type`, `total_tax2`, `tax_rate2_id`, `inv_discount`, `discount_id`, `user`, `updated_by`, `paid_by`, `count`, `shipping`) VALUES
(1, 'SL-0001', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 11:50:57', 0, '', '2014-07-14', '', '', '', NULL, NULL, '149.00', '35.76', '220.52', NULL, NULL, '35.76', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 1, '0.00'),
(2, 'SL-0002', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 11:56:14', 0, 'email', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '598.00', '143.52', '885.04', NULL, NULL, '143.52', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 2, '0.00'),
(3, 'SL-0003', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 12:14:24', 0, 'direct', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '298.00', '71.52', '441.04', NULL, NULL, '71.52', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 2, '0.00'),
(4, 'SL-0004', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 12:26:57', 0, 'fax', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '298.00', '71.52', '441.04', NULL, NULL, '71.52', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 2, '0.00'),
(5, 'SL-0005', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 12:32:09', 0, 'email', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '258.00', '61.92', '381.84', NULL, NULL, '61.92', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 2, '0.00'),
(6, 'SL-0006', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:09:30', 0, 'direct', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '298.00', '71.52', '441.04', NULL, NULL, '71.52', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 2, '0.00'),
(7, 'SL-0007', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:14:56', 0, 'email', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '299.00', '71.76', '442.52', NULL, NULL, '71.76', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 2, '0.00'),
(8, 'SL-0008', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:48:20', 0, 'direct', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '149.00', '35.76', '220.52', NULL, NULL, '35.76', 2, '0.00', 1, 'Owner Owner', NULL, 'Credit', 1, '0.00'),
(9, 'SL-0009', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:51:37', 0, 'direct', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '149.00', '35.76', '220.52', NULL, NULL, '35.76', 2, '0.00', 1, 'Owner Owner', NULL, 'Credit', 1, '0.00'),
(10, 'SL-0010', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:52:38', 0, 'email', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '298.00', '71.52', '441.04', NULL, NULL, '71.52', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 2, '0.00'),
(11, 'SL-0011', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:54:59', 0, 'email', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '149.00', '35.76', '220.52', NULL, NULL, '35.76', 2, '0.00', 1, 'Owner Owner', NULL, 'cash', 1, '0.00'),
(12, 'SL-0012', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:57:08', 0, 'email', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '149.00', '35.76', '220.52', NULL, NULL, '35.76', 2, '0.00', 1, 'Owner Owner', NULL, 'Credit', 1, '0.00'),
(13, 'SL-0013', 1, 1, 'Green Brand Ltd', 21, 'Abdallah', 'active', 0, '', 0, 'driver', 0, '2014-07-28 14:57:42', 0, 'email', '2014-07-14', '', '', 'Owner Owner', NULL, NULL, '298.00', '71.52', '441.04', NULL, NULL, '71.52', 2, '0.00', 1, 'Owner Owner', NULL, 'Credit', 2, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE IF NOT EXISTS `sale_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'active',
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  `tax` varchar(55) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `val_tax` decimal(25,2) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `discount_val` decimal(25,2) DEFAULT NULL,
  `discount` varchar(55) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `product_code`, `status`, `product_name`, `product_unit`, `tax_rate_id`, `tax`, `quantity`, `unit_price`, `gross_total`, `val_tax`, `serial_no`, `discount_val`, `discount`, `discount_id`) VALUES
(1, 1, 2, '1002', 'active', 'NAIL POLISH 02', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(2, 2, 529, '4305', 'active', 'ST. IVES TIMELESS SKIN RENEW AND FIRM APRICOT SCRUB ', '100', 2, '24.00%', 1, '299.00', '299.00', '71.76', '', '0.00', '', 0),
(3, 2, 530, '4306', 'active', 'ST. IVES FRESH SKIN INVIGORATING APRICOT SCRUB', '100', 2, '24.00%', 1, '299.00', '299.00', '71.76', '', '0.00', '', 0),
(4, 3, 4, '1004', 'active', 'NAIL POLISH 04  ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(5, 3, 3, '1003', 'active', 'NAIL POLISH 03', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(6, 4, 3, '1003', 'active', 'NAIL POLISH 03', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(7, 4, 4, '1004', 'active', 'NAIL POLISH 04  ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(8, 5, 576, '4705', 'active', 'ELVIN NECTAR GUAVA BANANA', '100', 2, '24.00%', 1, '129.00', '129.00', '30.96', '', '0.00', '', 0),
(9, 5, 573, '4702', 'active', 'ELVIN NECTAR FRUIT MEDLEY', '100', 2, '24.00%', 1, '129.00', '129.00', '30.96', '', '0.00', '', 0),
(10, 6, 12, '1012', 'active', 'NAIL POLISH 12 ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(11, 6, 1, '1001', 'active', 'NAIL POLISH 01  ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(12, 7, 456, '4506', 'active', 'BLACK SIDE EDT  ', '100', 2, '24.00%', 1, '0.00', '0.00', '0.00', '', '0.00', '', 0),
(13, 7, 550, '4326', 'active', 'ST. IVES ', '100', 2, '24.00%', 1, '299.00', '299.00', '71.76', '', '0.00', '', 0),
(14, 8, 3, '1003', 'active', 'NAIL POLISH 03', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(15, 9, 5, '1005', 'active', 'NAIL POLISH 05  ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(16, 10, 2, '1002', 'active', 'NAIL POLISH 02', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(17, 10, 3, '1003', 'active', 'NAIL POLISH 03', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(18, 11, 5, '1005', 'active', 'NAIL POLISH 05  ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(19, 12, 4, '1004', 'active', 'NAIL POLISH 04  ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(20, 13, 6, '1006', 'active', 'NAIL POLISH 06', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0),
(21, 13, 5, '1005', 'active', 'NAIL POLISH 05  ', '100', 2, '24.00%', 1, '149.00', '149.00', '35.76', '', '0.00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `logo2` varchar(255) NOT NULL,
  `site_name` varchar(55) NOT NULL,
  `language` varchar(20) NOT NULL,
  `default_warehouse` int(2) NOT NULL,
  `currency_prefix` varchar(3) NOT NULL,
  `default_invoice_type` int(2) NOT NULL,
  `default_tax_rate` int(2) NOT NULL,
  `rows_per_page` int(2) NOT NULL,
  `no_of_rows` int(2) NOT NULL,
  `total_rows` int(2) NOT NULL,
  `version` varchar(5) NOT NULL DEFAULT '1.2',
  `default_tax_rate2` int(11) NOT NULL DEFAULT '0',
  `dateformat` int(11) NOT NULL,
  `sales_prefix` varchar(20) NOT NULL,
  `quote_prefix` varchar(55) NOT NULL,
  `purchase_prefix` varchar(55) NOT NULL,
  `transfer_prefix` varchar(55) NOT NULL,
  `barcode_symbology` varchar(20) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `product_serial` tinyint(4) NOT NULL,
  `default_discount` int(11) NOT NULL,
  `discount_option` tinyint(4) NOT NULL,
  `discount_method` tinyint(4) NOT NULL,
  `tax1` tinyint(4) NOT NULL,
  `tax2` tinyint(4) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `logo`, `logo2`, `site_name`, `language`, `default_warehouse`, `currency_prefix`, `default_invoice_type`, `default_tax_rate`, `rows_per_page`, `no_of_rows`, `total_rows`, `version`, `default_tax_rate2`, `dateformat`, `sales_prefix`, `quote_prefix`, `purchase_prefix`, `transfer_prefix`, `barcode_symbology`, `theme`, `product_serial`, `default_discount`, `discount_option`, `discount_method`, `tax1`, `tax2`) VALUES
(1, 'header_logo.png', 'login_logo1.png', 'Stock Manager Advance', 'english', 1, 'Rs', 2, 2, 10, 9, 30, '2.0', 2, 2, 'SL', 'QU', 'PO', 'TR', 'code128', 'blue', 0, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `postal_code` varchar(8) NOT NULL,
  `country` varchar(55) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cf1` varchar(100) DEFAULT NULL,
  `cf2` varchar(100) DEFAULT NULL,
  `cf3` varchar(100) DEFAULT NULL,
  `cf4` varchar(100) DEFAULT NULL,
  `cf5` varchar(100) DEFAULT NULL,
  `cf6` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `email`, `cf1`, `cf2`, `cf3`, `cf4`, `cf5`, `cf6`) VALUES
(1, 'Test Supplier', 'Green Brand Ltd', 'Supplier Address', 'Petaling Jaya', 'Selangor', '46050', 'Malaysia', '0123456789', 'supplier@tecdiary.com', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `suspended_bills`
--

CREATE TABLE IF NOT EXISTS `suspended_bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `tax1` float(25,2) DEFAULT NULL,
  `tax2` float(25,2) DEFAULT NULL,
  `discount` decimal(25,2) DEFAULT NULL,
  `inv_total` decimal(25,2) NOT NULL,
  `total` float(25,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suspended_items`
--

CREATE TABLE IF NOT EXISTS `suspended_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suspend_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) DEFAULT NULL,
  `tax_rate_id` int(11) DEFAULT NULL,
  `tax` varchar(55) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(25,2) NOT NULL,
  `gross_total` decimal(25,2) NOT NULL,
  `val_tax` decimal(25,2) DEFAULT NULL,
  `discount` varchar(55) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount_val` decimal(25,2) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE IF NOT EXISTS `tax_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `rate` decimal(4,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tax_rates`
--

INSERT INTO `tax_rates` (`id`, `name`, `rate`, `type`) VALUES
(1, 'No Tax', '0.00', '2'),
(2, 'VAT', '24.00', '1'),
(3, 'GST', '6.00', '1'),
(4, 'PVM', '21.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_no` varchar(55) NOT NULL,
  `date` date NOT NULL,
  `from_warehouse_id` int(11) NOT NULL,
  `from_warehouse_code` varchar(55) NOT NULL,
  `from_warehouse_name` varchar(55) NOT NULL,
  `to_warehouse_id` int(11) NOT NULL,
  `to_warehouse_code` varchar(55) NOT NULL,
  `to_warehouse_name` varchar(55) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `transfer_no`, `date`, `from_warehouse_id`, `from_warehouse_code`, `from_warehouse_name`, `to_warehouse_id`, `to_warehouse_code`, `to_warehouse_name`, `note`, `user`) VALUES
(1, 'TR-0001', '2014-03-27', 1, 'WHI', 'Warehouse 1', 2, 'WH2', 'Warehouse 2', '', 'Owner Owner');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_items`
--

CREATE TABLE IF NOT EXISTS `transfer_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transfer_items`
--

INSERT INTO `transfer_items` (`id`, `transfer_id`, `product_id`, `product_code`, `product_name`, `product_unit`, `quantity`) VALUES
(1, 1, 1, '1001', 'NAIL POLISH  REF 01  13 ML', '100', 1),
(2, 1, 2, '1002', 'NAIL POLISH  REF 02  13 ML', '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `id_number` varchar(14) NOT NULL,
  `mobile` int(16) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `address`, `dob`, `id_number`, `mobile`, `company`, `phone`) VALUES
(1, '\0\0', 'owner', '15ab031e14e6efbd3b97ec65fb858fa0fe27f20e', NULL, 'owner@tecdiary.com', NULL, NULL, NULL, '48837db92da337010ad3c694fcd6aad22cde05b3', 1351661704, 1405326394, 1, 'Owner', 'Owner', 'test', '2014-06-24', '12343456787654', 76545678, 'Stock Manager', '0105292122'),
(2, '\0\0', 'salesman test', '77d2e342564849d5bd04f0820fdf16dd8ded9a7f', NULL, 'salesman@tecdiary.com', NULL, NULL, NULL, NULL, 1398253029, 1400138114, 1, 'salesman', 'test', 'test', '2014-06-22', '33243434343434', 342343243, 'test', '342343432'),
(3, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'hyder abbass', '23929ff6f9b16704bf78374bc3bf6c6df85a8f4d', NULL, 'hyder@storm-edge.com', NULL, NULL, NULL, NULL, 1404114341, 1404114341, 1, 'Hyder', 'Abbass', 'Vacoas', '0000-00-00', '20088810254125', 2147483647, 'Playsms', '5230799090'),
(4, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'nbvnbvnbv nbv', '8e7d77b82f5fcd89d9a5766488f2fa9f5c7d033a', NULL, 'hyder@test.com', NULL, NULL, NULL, NULL, 1404114461, 1404114461, 1, 'nbvnbvnbv', 'nbv', 'nbvnbvnbv', '0000-00-00', '12345678914785', 2147483647, 'bvnbnb', '5230799090'),
(5, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'hyder gfdgfgh', '575b568c5d5dcf0b7355f3376c6128c521130e75', NULL, 'test@playsms.com', NULL, NULL, NULL, NULL, 1404114879, 1404114879, 1, 'Hyder', 'gfdgfgh', 'nbvnbvnbv', '0000-00-00', '12345678914785', 2147483647, 'Playsms', '5230799090'),
(6, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'hyder abbass1', '398980e4abbfd3cf1f03d63d2d0a077c03738885', NULL, 'playsms.com@test.com', NULL, NULL, NULL, NULL, 1404115058, 1404115058, 1, 'Hyder', 'Abbass', 'Vacoas', '2014-06-11', '12345678914785', 2147483647, 'Playsms', '5230799090');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 4),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `code`, `name`, `address`, `city`) VALUES
(1, 'WHI', 'Warehouse 1', 'Address', 'City');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses_products`
--

CREATE TABLE IF NOT EXISTS `warehouses_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `warehouses_products`
--

INSERT INTO `warehouses_products` (`id`, `product_id`, `warehouse_id`, `quantity`) VALUES
(151, 534, 1, -3),
(150, 528, 1, -6),
(149, 403, 1, -2),
(148, 533, 1, -4),
(147, 527, 1, -10),
(146, 9, 1, -6),
(145, 3, 1, -26),
(144, 390, 1, -16),
(143, 391, 1, -10),
(142, 433, 1, -1),
(141, 435, 1, -2),
(140, 434, 1, -1),
(139, 130, 1, -3),
(138, 232, 1, 0),
(137, 123, 1, -1),
(136, 122, 1, -1),
(135, 131, 1, -3),
(134, 225, 1, -1),
(133, 231, 1, -1),
(132, 224, 1, -2),
(131, 400, 1, -1),
(130, 388, 1, -1),
(129, 330, 1, -1),
(128, 402, 1, -4),
(127, 386, 1, -1),
(126, 398, 1, -1),
(125, 404, 1, -1),
(124, 392, 1, -1),
(123, 339, 1, -1),
(122, 338, 1, -1),
(121, 437, 1, -2),
(120, 498, 1, -1),
(119, 460, 1, -1),
(118, 459, 1, -1),
(117, 10, 1, 0),
(116, 7, 1, -1),
(115, 8, 1, -2),
(114, 2, 1, -23),
(113, 340, 1, 1),
(112, 138, 1, 0),
(111, 132, 1, 3),
(110, 5, 1, -4),
(109, 422, 1, -1),
(108, 421, 1, -1),
(152, 4, 1, -15),
(153, 399, 1, -6),
(154, 532, 1, -3),
(155, 387, 1, -1),
(156, 6, 1, -4),
(157, 243, 1, -2),
(158, 1, 1, -13),
(159, 621, 1, -1),
(160, 78, 1, 1),
(161, 143, 1, 1),
(162, 346, 1, 1),
(163, 121, 1, 2),
(164, 81, 1, 1),
(165, 89, 1, 1),
(166, 134, 1, -1),
(167, 135, 1, -1),
(168, 12, 1, -4),
(169, 13, 1, -3),
(170, 15, 1, -5),
(171, 16, 1, -1),
(172, 14, 1, -4),
(173, 529, 1, -8),
(174, 530, 1, -8),
(175, 26, 1, -1),
(176, 23, 1, -1),
(177, 576, 1, -1),
(178, 573, 1, -1),
(179, 456, 1, -1),
(180, 550, 1, -1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
