-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2016 at 03:28 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-ban-hang-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `blogcat_id` int(11) NOT NULL,
  `blogcat_name` text COLLATE utf8_unicode_ci NOT NULL,
  `blogcat_description` text COLLATE utf8_unicode_ci,
  `blogcat_parent_id` int(11) DEFAULT '0',
  `blogcat_seo_title` text COLLATE utf8_unicode_ci,
  `blogcat_seo_keyword` text COLLATE utf8_unicode_ci,
  `blogcat_seo_description` text COLLATE utf8_unicode_ci,
  `blogcat_image` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`blogcat_id`, `blogcat_name`, `blogcat_description`, `blogcat_parent_id`, `blogcat_seo_title`, `blogcat_seo_keyword`, `blogcat_seo_description`, `blogcat_image`) VALUES
(17, 'asd', '', 0, '', '', '', ''),
(18, 'asd', '', 0, 'asdf', '', '', '/uploads/images/categorys/sub-cat12.jpg'),
(19, 'asdasd', '', 0, 'sasdasd', 'ryrtytrytryrty', '', '/uploads/images/categorys/sub-cat32.jpg'),
(20, 'asduuu', '', 18, 'asdf', 'dasdfsafadsf', '', '/uploads/images/categorys/sub-cat33.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_name` text COLLATE utf8_unicode_ci NOT NULL,
  `blog_content` text COLLATE utf8_unicode_ci,
  `blog_time` int(11) NOT NULL DEFAULT '0',
  `blog_cat_ids` text COLLATE utf8_unicode_ci,
  `blog_image` text COLLATE utf8_unicode_ci,
  `blog_seo_title` text COLLATE utf8_unicode_ci,
  `blog_seo_keyword` text COLLATE utf8_unicode_ci,
  `blog_seo_description` text COLLATE utf8_unicode_ci,
  `blog_user_id` int(11) NOT NULL DEFAULT '0',
  `blog_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_name`, `blog_content`, `blog_time`, `blog_cat_ids`, `blog_image`, `blog_seo_title`, `blog_seo_keyword`, `blog_seo_description`, `blog_user_id`, `blog_views`) VALUES
(2, 'sfdsfadf', '<p>sadfsadfsdafsadf</p>\r\n', 1482230301, '["17","20","19"]', '/uploads/images/categorys/sub-cat22.jpg', 'asdfsaf', 'sadfasdf', 'sdafasdf', 14, 13),
(3, 'adsadsad', '', 1482225514, 'null', '', '', '', '', 14, 4),
(4, 'asdsadasdsadsa', '', 1482225518, 'null', '', '', '', '', 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_image` text COLLATE utf8_unicode_ci,
  `cat_seo_title` text COLLATE utf8_unicode_ci,
  `cat_seo_description` text COLLATE utf8_unicode_ci,
  `cat_seo_keyword` text COLLATE utf8_unicode_ci,
  `cat_parent_id` int(11) DEFAULT NULL,
  `cat_description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`cat_id`, `cat_name`, `cat_image`, `cat_seo_title`, `cat_seo_description`, `cat_seo_keyword`, `cat_parent_id`, `cat_description`) VALUES
(17, 'Fashion', '/uploads/images/categorys/banner-product1.jpg', 'fashion title', 'fashion Description', 'fashion Keyword', 0, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(18, 'Fashion 2', '/uploads/images/categorys/blog1.jpg', 'fashion 2 title', 'fashion 2 Description', 'fashion 2 Keyword', 0, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(19, 'category 1', '/uploads/images/categorys/sub-cat1.jpg', 'title category 1', 'descriptin category 1', 'keyword category 1', 17, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(20, 'category 2', '/uploads/images/categorys/sub-cat2.jpg', 'title category 2', 'descriptin category 2', 'keyword category 2', 17, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(21, 'categoryv3', '/uploads/images/categorys/sub-cat3.jpg', 'title category 3', 'descriptin category 3', 'keyword category 3', 17, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(22, 'category 4', '/uploads/images/categorys/sub-cat4.jpg', 'title category 4', 'descriptin category 4', 'keyword category 4', 17, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(23, 'category 5', '/uploads/images/categorys/sub-cat11.jpg', 'title category 5', 'descriptin category 5', 'keyword category 5', 18, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(24, 'category 6', '/uploads/images/categorys/sub-cat21.jpg', 'title category 6', 'descriptin category 6', 'keyword category 6', 18, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(25, 'category 7', '/uploads/images/categorys/sub-cat31.jpg', 'title category 7', 'descriptin category 7', 'keyword category 7', 18, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n'),
(26, 'category8', '/uploads/images/categorys/sub-cat41.jpg', 'title category 8', 'descriptin category 8', 'keyword category 8', 18, '<p>Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, auctor ut, ligula. Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem. Vestibulum sed ante. Donec sagittis euismod purus. Sed ut perspiciatis sit voluptatem accusantim doloremque laudantim.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_tel`, `customer_email`, `customer_address`, `customer_note`) VALUES
(3, 'a', 'b', '', 'c', ''),
(4, 'ad', 'ad', '', 'ad', '');

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `function_id` int(11) NOT NULL,
  `function_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `function_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`function_id`, `function_code`, `function_name`) VALUES
(1, 'profile_user', ''),
(2, 'change_password', ''),
(3, 'add_product_category', ''),
(4, 'categorys', ''),
(5, 'products', ''),
(6, 'new_product', ''),
(7, 'update_product', ''),
(8, 'update_category', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderdt`
--

CREATE TABLE `orderdt` (
  `orderdt_id` int(11) NOT NULL,
  `orderdt_pro_id` int(11) NOT NULL,
  `orderdt_qty` int(11) NOT NULL,
  `orderdt_price` int(11) NOT NULL,
  `orderdt_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdt`
--

INSERT INTO `orderdt` (`orderdt_id`, `orderdt_pro_id`, `orderdt_qty`, `orderdt_price`, `orderdt_order_id`) VALUES
(1, 18, 5, 95000, 2),
(2, 18, 5, 95000, 3),
(3, 18, 5, 95000, 4),
(4, 27, 1, 345000, 4),
(5, 18, 5, 95000, 5),
(6, 27, 1, 345000, 5),
(7, 26, 1, 95000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_customer_id` int(11) NOT NULL,
  `order_time` int(11) NOT NULL,
  `order_value` int(11) NOT NULL,
  `order_success` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_customer_id`, `order_time`, `order_value`, `order_success`) VALUES
(2, 4, 1482325677, 475000, 0),
(4, 4, 1482325760, 820000, 1),
(6, 4, 1482326606, 95000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_sku` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_name` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_description` text COLLATE utf8_unicode_ci,
  `pro_shortdescripttion` text COLLATE utf8_unicode_ci,
  `pro_seo_title` text COLLATE utf8_unicode_ci,
  `pro_seo_description` text COLLATE utf8_unicode_ci,
  `pro_seo_keyword` text COLLATE utf8_unicode_ci,
  `pro_price` int(11) DEFAULT '0',
  `pro_price_sale` int(11) DEFAULT '0',
  `pro_price_sale_date_begin` int(11) DEFAULT '0',
  `pro_price_sale_date_finish` int(11) DEFAULT '0',
  `pro_image` text COLLATE utf8_unicode_ci,
  `pro_cat_ids` text COLLATE utf8_unicode_ci COMMENT 'json string'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_sku`, `pro_name`, `pro_description`, `pro_shortdescripttion`, `pro_seo_title`, `pro_seo_description`, `pro_seo_keyword`, `pro_price`, `pro_price_sale`, `pro_price_sale_date_begin`, `pro_price_sale_date_finish`, `pro_image`, `pro_cat_ids`) VALUES
(17, 'SKU1', 'Maecenas consequat mauris', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Compositions</td>\r\n			<td>Cotton</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Styles</td>\r\n			<td>Girly</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Properties</td>\r\n			<td>Colorful Dress</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>\r\n\r\n<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>\r\n\r\n<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/01_blue-dress1.jpg', '["17","19"]'),
(18, 'SKU2', 'Maecenas consequat mauris', '<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>\r\n\r\n<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>\r\n\r\n<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/02_yellow-dress.jpg', '["17","19"]'),
(19, 'SKU3', 'Maecenas consequat mauris', '<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>\r\n\r\n<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>\r\n\r\n<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/03_cyan-dress.jpg', '["17","20"]'),
(20, 'SKU4', 'Maecenas consequat mauris', '<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>\r\n\r\n<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>\r\n\r\n<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/04_nice-dress.jpg', '["17","20"]'),
(21, 'SKU5', 'Maecenas consequat mauris', '<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna.</p>\r\n\r\n<p>Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>\r\n\r\n<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/05_flowers-dress.jpg', '["17","21"]'),
(22, 'SKU6', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/06_red-dress.jpg', '["17","21"]'),
(23, 'SKU7', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/p37.jpg', '["18","23"]'),
(24, 'SKU8', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/p3.jpg', '["17","22"]'),
(25, 'SKU9', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/p4.jpg', '["17","22"]'),
(26, 'SKU10', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 123000, 95000, 1480525200, 1485881940, '/uploads/images/products/p8.jpg', '["18","24"]'),
(27, 'SKU11', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 345000, 0, 0, 0, '/uploads/images/products/p7.jpg', '["18","23"]'),
(28, 'SKU12', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 345000, 0, 0, 0, '/uploads/images/products/p9.jpg', '["18","24"]'),
(29, 'SKU13', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 345000, 0, 0, 0, '/uploads/images/products/p10.jpg', '["18","24"]'),
(30, 'SKU14', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 345000, 0, 0, 0, '/uploads/images/products/p11.jpg', '["18","25"]'),
(31, 'SKU15', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 345000, 0, 0, 0, '/uploads/images/products/p12.jpg', '["18","26"]'),
(32, 'SKU16', 'Maecenas consequat mauris', '<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n\r\n<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.</p>\r\n', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas consequat mauris', 'Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium.Fusce egestas elit eget lorem.', 'Maecenas, consequat, mauris,Vestibulum, eu, odio', 345000, 0, 0, 0, '/uploads/images/products/p36.jpg', '["18","26"]');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `set_id` int(11) NOT NULL,
  `set_name` text COLLATE utf8_unicode_ci NOT NULL,
  `set_value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`set_id`, `set_name`, `set_value`) VALUES
(1, 'set_pagetitle', 'asdasd'),
(2, 'set_pagedescriptiton', 'sadsadsadasdsadsadasdsadsa'),
(3, 'set_pagekeyword', 'asdasdsadsadsad'),
(4, 'author', 'Tran Khanh Toan'),
(5, 'logo', '/uploads/images/footer-logo2.png'),
(6, 'address', 'Example Street 68, Mahattan, New York, USA.'),
(7, 'phone', '0123456789'),
(8, 'email', 'trankhanhtoan321@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL,
  `slide_image` text COLLATE utf8_unicode_ci NOT NULL,
  `slide_link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `slide_image`, `slide_link`) VALUES
(2, '/uploads/images/slides/brand_prlx_bg-small2.jpg', ''),
(3, '/uploads/images/slides/brand_prlx_bg-small3.jpg', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` text COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` text COLLATE utf8_unicode_ci NOT NULL,
  `user_email` text COLLATE utf8_unicode_ci,
  `user_lastlogin` int(11) DEFAULT NULL,
  `user_fullname` text COLLATE utf8_unicode_ci,
  `user_image` text COLLATE utf8_unicode_ci,
  `user_function` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_lastlogin`, `user_fullname`, `user_image`, `user_function`) VALUES
(14, 'admin', '330ca530e61bfae98ed4d3577b0462d4', 'admin@admin.com', 1482459392, 'Trần Khánh Toàn', '/uploads/images/avatars/user.png', '["1","2","3","4","5","6","7"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`blogcat_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `orderdt`
--
ALTER TABLE `orderdt`
  ADD PRIMARY KEY (`orderdt_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `blogcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orderdt`
--
ALTER TABLE `orderdt`
  MODIFY `orderdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
