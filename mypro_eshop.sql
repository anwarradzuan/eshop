-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2020 at 05:57 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypro_eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_description` text COLLATE utf8_unicode_ci NOT NULL,
  `a_content` text COLLATE utf8_unicode_ci NOT NULL,
  `a_start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_expired` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `a_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE `apikey` (
  `ak_id` int(11) NOT NULL,
  `ak_username` varchar(255) NOT NULL,
  `ak_password` text NOT NULL,
  `ak_requestUrl` text NOT NULL,
  `ak_note` text NOT NULL,
  `ak_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apikey`
--

INSERT INTO `apikey` (`ak_id`, `ak_username`, `ak_password`, `ak_requestUrl`, `ak_note`, `ak_type`) VALUES
(1, 'intelhostRobot', 'c1eadf4090a2f8131d61d00daede1f0c', 'https://billing.intelhost.com.my/includes/api.php', 'WHMCS API Integration Robot', 'whmcs');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_date` varchar(255) NOT NULL,
  `a_time` int(15) NOT NULL,
  `a_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`a_id`, `a_name`, `a_date`, `a_time`, `a_client`) VALUES
(1, 'Comming Soon', '25-Jul-2019', 1564088157, 93),
(2, 'Hot Item', '25-Jul-2019', 1564088262, 93),
(3, 'New Item', '25-Jul-2019', 1564088267, 93);

-- --------------------------------------------------------

--
-- Table structure for table `a_apirouting`
--

CREATE TABLE `a_apirouting` (
  `a_id` int(11) NOT NULL,
  `a_url` text COLLATE utf8_unicode_ci NOT NULL,
  `a_path` text COLLATE utf8_unicode_ci NOT NULL,
  `a_main` int(11) NOT NULL,
  `a_user` int(11) NOT NULL,
  `a_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `a_time` int(15) NOT NULL,
  `a_status` int(11) NOT NULL,
  `a_description` text COLLATE utf8_unicode_ci NOT NULL,
  `a_role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `a_apirouting`
--

INSERT INTO `a_apirouting` (`a_id`, `a_url`, `a_path`, `a_main`, `a_user`, `a_date`, `a_time`, `a_status`, `a_description`, `a_role`) VALUES
(1, 'system/theme', 'system/theme', 0, 1, '29-Mar-2019', 1553860665, 1, 'Themes setting API', 0),
(3, 'profile', 'user/profile', 0, 1, '30-Mar-2019', 1553955262, 1, 'User Profile API', 0),
(4, 'password', 'user/password', 0, 1, '30-Mar-2019', 1553957283, 1, 'Change password API', 0),
(5, 'user/profile-picture', 'user/profile-picture', 0, 1, '30-Mar-2019', 1553960406, 1, 'User Profile API', 0),
(6, 'client', 'client', 0, 1, '30-Mar-2019', 1553969673, 1, 'Clients API', 0),
(7, 'system/information', 'system/information', 0, 1, '31-Mar-2019', 1554045432, 1, 'Company Information API', 0),
(8, 'items', 'items', 0, 10, '03-Apr-2019', 1554327510, 1, 'API Items', 0),
(9, 'footer_text', 'footer_text', 0, 10, '04-Apr-2019', 1554403689, 1, 'Footer Text', 0),
(10, 'invoice', 'invoice', 0, 10, '05-Apr-2019', 1554466780, 1, 'Invoice', 0),
(12, 'quotation_footer_text', 'quotation_footer_text', 0, 10, '06-Apr-2019', 1554547462, 1, 'Quotation Footer Text', 0),
(13, 'quotation', 'quotation', 0, 10, '06-Apr-2019', 1554549659, 1, 'Quotation API', 0),
(14, 'orders', 'orders', 0, 10, '11-Apr-2019', 1554998730, 1, 'Orders API', 0),
(15, 'sale', 'sale', 0, 10, '12-Apr-2019', 1555089244, 1, 'Sale API', 0),
(16, 'webmail', 'webmail', 0, 10, '14-Apr-2019', 1555238021, 1, 'Webmail API', 0),
(17, 'taxes', 'taxes', 0, 10, '21-Apr-2019', 1555857702, 1, 'Taxes API', 0),
(18, 'hitem', 'hitem', 0, 10, '07-Sep-2019', 1567875926, 1, 'Host item control', 2),
(19, 'aitem', 'aitem', 0, 10, '07-Sep-2019', 1567875912, 1, 'Admin item control', 1),
(20, 'clients', 'clients', 0, 10, '05-Oct-2019', 1570291294, 1, 'Clients', 0);

-- --------------------------------------------------------

--
-- Table structure for table `a_document_template`
--

CREATE TABLE `a_document_template` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `d_description` text COLLATE utf8_unicode_ci NOT NULL,
  `d_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `d_content` text COLLATE utf8_unicode_ci NOT NULL,
  `d_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `d_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `d_time` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a_menus`
--

CREATE TABLE `a_menus` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_main` int(11) NOT NULL,
  `m_status` int(11) NOT NULL,
  `m_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_time` int(15) NOT NULL,
  `m_user` int(11) NOT NULL,
  `m_order` int(11) NOT NULL,
  `m_route` text COLLATE utf8_unicode_ci NOT NULL,
  `m_position` text COLLATE utf8_unicode_ci NOT NULL,
  `m_role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `a_menus`
--

INSERT INTO `a_menus` (`m_id`, `m_name`, `m_url`, `m_icon`, `m_main`, `m_status`, `m_date`, `m_time`, `m_user`, `m_order`, `m_route`, `m_position`, `m_role`) VALUES
(1, 'Dashboard', 'dashboard', 'fa fa-dashboard', 0, 1, '07-Apr-2019', 1554646434, 1, 1, 'pages/dashboard', 'Main', '4,3,5,6'),
(2, 'Content Management', 'cms', 'fa fa-desktop', 0, 1, '07-Apr-2019', 1554646637, 1, 2, 'pages/cms', 'Main', '3,5,6'),
(3, 'Clients', 'clients', 'fa fa-bookmark', 0, 1, '07-Sep-2019', 1567865949, 10, 3, 'pages/clients', 'Main', '4,3,5'),
(4, 'Items', 'items', 'fa fa-cubes', 0, 1, '29-Mar-2019', 1553883552, 1, 4, 'pages/items', 'Main', ''),
(5, 'Billing', 'billing', 'fa fa-dollar', 0, 0, '31-Jul-2019', 1564592381, 10, 5, 'pages/billing', 'Main', '4,3'),
(6, 'Marketing', 'marketing', 'fa fa-area-chart', 0, 0, '02-Aug-2019', 1564745715, 10, 6, 'pages/marketing', 'Main', '3,5'),
(7, 'System', 'system', 'fa fa-wrench', 0, 1, '07-Apr-2019', 1554646723, 1, 7, 'pages/system', 'Main', '3,7'),
(8, 'Users', 'users', 'fa fa-users', 0, 1, '07-Apr-2019', 1554646743, 1, 8, 'pages/users', 'Main', '4,3,5,6,7'),
(9, 'Billing', 'reports', 'fa fa-bar-chart', 0, 1, '04-Oct-2019', 1570185512, 12, 9, 'pages/reports', 'Main', ''),
(10, 'Summarize', 'summarize-dashboard', '', 1, 1, '29-Mar-2019', 1553883598, 1, 1, 'pages/dashboard/summarize', 'Main', ''),
(11, 'Marketing', 'marketing-dashboard', '', 1, 1, '29-Mar-2019', 1553883615, 1, 2, 'pages/dashboard/marketing', 'Main', ''),
(12, 'Setting', 'setting', 'fa fa-cog', 7, 1, '06-Apr-2019', 1554567744, 1, 1, 'pages/system/setting', 'Main', ''),
(13, 'Site Information', 'information', 'fa fa-qrcode', 12, 1, '06-Apr-2019', 1554567897, 1, 0, 'pages/system/setting/information', 'Main', ''),
(14, 'System Menus', 'menus', 'fa fa-sitemap', 12, 1, '06-Apr-2019', 1554571520, 1, 2, 'pages/system/setting/menus', 'Main', ''),
(15, 'Sales', 'sales-dashboard', '', 1, 0, '06-Oct-2019', 1570367035, 10, 3, 'pages/dashboard/sales', 'Main', ''),
(16, 'Pages', 'pages', 'fa fa-id-badge', 2, 1, '06-Apr-2019', 1554572005, 1, 1, 'pages/cms/pages', 'Main', ''),
(17, 'Sections', 'sections', 'fa fa-server', 2, 0, '21-Jul-2019', 1563720766, 10, 2, 'pages/cms/sections', 'Main', ''),
(18, 'Modals', 'modals', 'fa fa-window-maximize', 2, 1, '06-Apr-2019', 1554571972, 1, 3, 'pages/cms/modals', 'Main', ''),
(19, 'Banners', 'banners', 'fa fa-image', 2, 1, '06-Apr-2019', 1554572070, 1, 4, 'pages/cms/banners', 'Main', ''),
(20, 'Widgets', 'widgets', 'fa fa-puzzle-piece', 2, 1, '06-Apr-2019', 1554572246, 1, 5, 'pages/cms/widgets', 'Main', ''),
(21, 'Content Creator', 'content-creator', 'fa fa-magic', 2, 0, '13-Apr-2019', 1555181714, 1, 6, 'pages/cms/content-creator', 'Main', ''),
(22, 'Media Manager', 'media-manager', 'fa fa-film', 2, 1, '06-Apr-2019', 1554572405, 1, 7, 'pages/cms/media-manager', 'Main', ''),
(23, 'Invoices', 'invoices', 'fa fa-file-o', 5, 1, '06-Apr-2019', 1554571264, 1, 1, 'pages/billing/invoices', 'Main', ''),
(24, 'Quotations', 'quotations', 'fa fa-file-o', 5, 1, '06-Apr-2019', 1554571285, 1, 2, 'pages/billing/quotations', 'Main', ''),
(26, 'Email', 'email', 'fa fa-envelope', 6, 0, '19-Jul-2019', 1563562309, 9, 3, 'pages/marketing/email', '', ''),
(27, 'Announcement', 'announcement', 'fa fa-bullhorn', 6, 1, '07-Apr-2019', 1554648921, 1, 2, 'pages/marketing/announcement', 'Main', ''),
(28, 'Taxes', 'taxes', 'fa fa-percent', 7, 1, '06-Apr-2019', 1554563107, 1, 2, 'pages/system/setting/taxes', 'Main', ''),
(29, 'Payment Gateway', 'payment-gateway', 'fa fa-microchip', 7, 1, '06-Apr-2019', 1554565863, 1, 3, 'pages/system/setting/payment_gateway', 'Main', ''),
(30, 'Document Template', 'document-template', 'fa fa-newspaper-o', 7, 0, '14-Feb-2020', 1581703980, 10, 4, 'pages/system/document_template', 'Main', '3'),
(31, 'My Account', 'my-account', 'fa fa-user', 8, 1, '30-Mar-2019', 1553949602, 1, 1, 'pages/user/my-account', 'Main,User Profile', ''),
(32, 'Manage Users', 'manage-users', 'fa fa-users', 8, 1, '07-Apr-2019', 1554646758, 1, 2, 'pages/user/magae-users', 'Main', '3,7'),
(33, 'Roles', 'roles', 'fa fa-user-secret', 8, 1, '07-Apr-2019', 1554646778, 1, 3, 'pages/user/role', 'Main', '3,7'),
(34, 'Sale', 'sale-report', 'fa fa-dollar', 9, 0, '02-Oct-2019', 1570038459, 10, 1, 'pages/report/sale', 'Main', ''),
(35, 'Order', 'order-report', 'fa fa-cube', 9, 1, '04-Oct-2019', 1570185482, 12, 2, 'pages/report/order', 'Main', ''),
(37, 'Manage Themes', 'manage-themes', 'fa fa-wrench', 12, 1, '29-Mar-2019', 1553886277, 1, 3, 'pages/system/setting/themes', 'Main,User Profile', ''),
(38, 'API Routing Setting', 'api-routing-setting', 'fa fa-gear', 12, 1, '06-Apr-2019', 1554567961, 1, 4, 'pages/system/setting/api_routing', 'Main', ''),
(39, 'API Setting', 'api-setting', 'fa fa-gears', 12, 1, '06-Apr-2019', 1554567975, 1, 5, 'pages/system/setting/api_setting', 'Main', ''),
(40, 'All Items', 'all-item', 'fa fa-cubes', 4, 1, '06-Apr-2019', 1554570994, 1, 1, 'pages/items/all', 'Main', ''),
(41, 'Item Categories', 'item-category', 'fa fa-object-group', 4, 1, '06-Apr-2019', 1554571103, 1, 2, 'pages/items/category', 'Main', ''),
(42, 'Logout', 'logout', 'fa fa-power-off', 0, 1, '29-Mar-2019', 1553884941, 1, 4, 'pages/logout', 'User Profile', ''),
(43, 'Languages', 'language', 'fa fa-language', 12, 1, '30-Mar-2019', 1553966446, 10, 1, 'pages/system/setting/language', 'Main', ''),
(44, 'English', '', '', 43, 0, '31-Mar-2019', 1554056650, 10, 0, '', 'Main', ''),
(45, 'All Invoices', 'all-invoices', 'fa fa-file', 23, 1, '25-Jul-2019', 1564060462, 10, 1, 'pages/billing/invoice/all', 'Main', ''),
(46, 'Create Invoice', 'create-invoice', 'fa fa-plus', 23, 1, '06-Apr-2019', 1554568631, 1, 2, 'pages/billing/invoice/create', 'Main', ''),
(47, 'Draft', 'invoice-draft', 'fa fa-edit', 23, 1, '30-Mar-2019', 1553972656, 1, 3, 'pages/billing/invoice/draft', 'Main', ''),
(48, 'Paid', 'paid-ivoice', 'fa fa-dollar', 23, 1, '30-Mar-2019', 1553972690, 1, 3, 'pages/billing/invoice/paid', 'Main', ''),
(49, 'Unpaid', 'invoice-unpaid', 'fa fa-money', 23, 1, '31-Mar-2019', 1554029732, 1, 4, 'pages/billing/invoice/unpaid', 'Main', ''),
(50, 'Setting', 'setting', 'fa fa-wrench', 23, 1, '31-Mar-2019', 1554029579, 1, 5, 'pages/billing/invoice/setting', 'Main', ''),
(51, 'Invoice Template', 'invoice-template', 'fa fa-dashboard', 50, 1, '31-Mar-2019', 1554031511, 1, 1, 'pages/billing/invoice/setting/template', 'Main', ''),
(52, 'Footer Text', 'footer-text', 'fa fa-font', 50, 1, '31-Mar-2019', 1554032611, 1, 2, 'pages/billing/invoice/setting', 'Main', ''),
(53, 'All Quotations', 'all-quotations', 'fa fa-file', 24, 1, '05-Apr-2019', 1554482124, 1, 0, 'pages/billing/quotation/all', 'Main', ''),
(54, 'Create Quotations', 'create-quotation', 'fa fa-plus', 24, 1, '05-Apr-2019', 1554482180, 1, 2, 'pages/billing/quotation/create', 'Main', ''),
(55, 'Draft', 'draft', 'fa fa-edit', 24, 1, '05-Apr-2019', 1554486832, 1, 2, 'pages/billing/quotation/draft', 'Main', ''),
(56, 'Setting', 'setting', 'fa fa-wrench', 24, 1, '05-Apr-2019', 1554482329, 1, 3, 'pages/billing/quotation/setting', 'Main', ''),
(57, 'Quotation Template', 'quotation-template', 'fa fa-dashboard', 56, 1, '05-Apr-2019', 1554482427, 1, 1, 'pages/billing/quotation/template', 'Main', ''),
(58, 'Footer Text', 'footer-text', 'fa fa-font', 56, 1, '05-Apr-2019', 1554482482, 1, 2, 'pages/billing/quotation/footer-text', 'Main', ''),
(59, 'All Email', 'all-email', 'fa fa-list', 61, 1, '13-Apr-2019', 1555176641, 1, 1, 'pages/marketing/mail/all', 'Main', '4,3,5,6,7'),
(60, 'Sent', 'sent', 'fa fa-rocket', 61, 1, '13-Apr-2019', 1555176675, 1, 2, 'pages/marketing/mail/sent', 'Main', '4,3,5,6,7'),
(61, 'Webmail', 'webmail', 'fa fa-envelope', 26, 1, '13-Apr-2019', 1555176598, 1, 1, 'pages/marketing/webmail', 'Main', '4,3,5,6,7'),
(62, 'Compose Email', 'compose', 'fa fa-plus', 61, 1, '13-Apr-2019', 1555176720, 1, 3, 'pages/marketing/mail/compose', 'Main', '4,3,5,6,7'),
(63, 'Templates', 'template', 'fa fa-dashboard', 26, 1, '13-Apr-2019', 1555177009, 1, 2, 'pages/marketing/mail/template', 'Main', '3,5,6'),
(64, 'Security', 'security', 'fa fa-lock ', 0, 0, '15-Dec-2019', 1576402031, 10, 9, 'pages/security', 'Main', '3,7'),
(65, 'Host Menus', 'hmenus', 'fa fa-caret-square-o-down', 12, 1, '20-Jul-2019', 1563648564, 10, 6, 'pages/system/setting/hmenus', 'Main', ''),
(66, 'Customer', 'customer', 'fa fa-user ', 0, 1, '03-Aug-2019', 1564846991, 10, 3, 'pages/customer/list', 'Main', '3,5,7'),
(67, 'Email Templates', 'email-templates', 'fa fa-envelope ', 0, 1, '22-Aug-2019', 1566498016, 10, 5, 'pages/email_templates/all', 'Main', ''),
(68, 'Shipping', 'shipping', 'fa fa-ship ', 0, 1, '24-Aug-2019', 1566649819, 10, 5, 'pages/shipping/all', 'Main', ''),
(69, 'All Clients', 'all-clients', 'fa fa-users', 3, 1, '28-Aug-2019', 1567002640, 12, 1, 'pages/clients/list', 'Main', '3'),
(70, 'Packages', 'packages', 'fa fa-book', 3, 1, '07-Sep-2019', 1567865886, 10, 3, 'pages/clients/packages', 'Main', '4,3'),
(71, 'All Company', 'all-company', 'fa fa-building-o ', 3, 1, '07-Sep-2019', 1567866056, 10, 2, 'pages/clients/company', 'Main', '3'),
(73, 'Carts', 'carts', 'fa fa-cart', 0, 1, '09-Jan-2020', 1578574389, 10, 11, 'pages/carts/all', 'Main', '3,7');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_content` text NOT NULL,
  `b_status` int(11) NOT NULL,
  `b_date` varchar(255) NOT NULL,
  `b_time` int(15) NOT NULL,
  `b_user` varchar(255) NOT NULL,
  `b_file` text NOT NULL,
  `b_position` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`b_id`, `b_name`, `b_content`, `b_status`, `b_date`, `b_time`, `b_user`, `b_file`, `b_position`) VALUES
(1, 'Main Banner', 'Main Banner', 0, '28-Jul-2019', 1564315051, 'anwar', '1563014452-1.png', 0),
(2, 'Promotion Banner', 'We have a promotion for you<br>', 1, '14-Mar-2020', 1584197352, 'anwar', '1563014524-Brickx00wall.jpg', 1),
(74, 'Malaysia Day', '', 0, '05-Sep-2019', 1567687936, 'Admin', '1567612278-Malaysiax00day.png', 0),
(72, 'Deepavali-2', '', 0, '04-Sep-2019', 1567612250, 'anwar', '1567612145-Deepavalix002.png', 0),
(60, 'XMAS2', '', 0, '07-Sep-2019', 1567861065, 'anwar', '1566571924-Try.png', 0),
(67, 'Ramadan', '', 0, '30-Aug-2019', 1567190262, 'anwar', '1567184892-ramadan.png', 0),
(73, 'Thaipusam', '', 0, '04-Sep-2019', 1567623554, 'anwar', '1567612212-Thaipusamx002.png', 0),
(64, 'merdeka', '', 0, '30-Aug-2019', 1567190441, 'anwar', '1566579448-merdekaaa.jpg', 0),
(66, 'Merdeka new', '', 0, '04-Sep-2019', 1567612161, 'anwar', '1566583656-merdekax00banner.jpg', 0),
(69, 'Aidilfitri', '', 0, '07-Sep-2019', 1567857256, 'anwar', '1567190240-mubarak.png', 0),
(39, 'About Us', '<p>sadas<br></p>', 0, '15-Aug-2019', 1565894542, 'anwar', '1564165562-aboutx00usx00bannerx001920x00xx00580x00px.jpg', 2),
(40, 'Contact Us4', '', 1, '26-Jul-2019', 1564166416, 'anwar', '1564166392-contactx00usx001920x580x00pxx00redo.jpg', 3),
(41, 'Main Banner 3', '', 0, '21-Aug-2019', 1566422604, 'anwar', '1564315133-5.png', 0),
(42, 'Main Banner 2', '', 0, '28-Jul-2019', 1564315149, 'anwar', '1564315090-3.png', 0),
(43, 'mainpage1', '', 1, '18-Sep-2019', 1568817072, 'anwar', '1565893698-new1.png', 0),
(44, 'mainbanner2', '', 0, '21-Aug-2019', 1566401127, 'anwar', '1565893720-new2.png', 0),
(45, 'About US2', '', 0, '15-Aug-2019', 1565900310, 'anwar', '1565894502-new1.png', 2),
(57, 'Festival testing', '', 0, '21-Aug-2019', 1566422411, 'anwar', '1566419946-whitex00xmas.jpg', 0),
(48, 'About us', '', 0, '15-Aug-2019', 1565901146, 'anwar', '1565900693-contactx00usx001920x580x00pxx003.jpg', 2),
(47, 'About US3', '', 0, '15-Aug-2019', 1565905336, 'anwar', '1565894647-new2.png', 2),
(52, 'overlay_aboutus', '', 1, '18-Aug-2019', 1566147378, 'anwar', '1566147378-tryx00this.jpg', 2),
(49, 'About Us deepa', '', 0, '18-Aug-2019', 1566147396, 'anwar', '1565900784-deepavalix00bannerx0002.jpg', 2),
(51, 'About us new', '', 0, '18-Aug-2019', 1566147404, 'anwar', '1565905319-aboutx00usx00web.JPG', 2),
(53, 'Overlay_contactus', '', 1, '18-Aug-2019', 1566147475, 'anwar', '1566147456-usex00this.jpg', 3),
(58, 'New Festival xmas', '', 0, '18-Sep-2019', 1568817084, 'anwar', '1566422395-redx00xmasx00background.png', 0),
(59, 'CNY Banner', '', 0, '23-Aug-2019', 1566575797, 'anwar', '1566562352-cny.png', 0),
(77, 'new-year', '', 0, '05-Sep-2019', 1567688505, 'Admin', '1567688390-newx00year.jpg', 0),
(76, 'malaysia-day2', '', 0, '06-Sep-2019', 1567792022, 'anwar', '1567687894-Harix00Malaysia.jpg', 0),
(78, 'malaysia day', '', 0, '05-Sep-2019', 1567699430, 'anwar', '1567688481-Malaysiax00dayx0016x00sept.jpg', 0),
(79, 'new year', '', 0, '05-Sep-2019', 1567700099, 'anwar', '1567699381-cuba.jpg', 0),
(80, 'new year3', '', 0, '05-Sep-2019', 1567713947, 'anwar', '1567700019-Testx00thisx00newx00year.jpg', 0),
(81, 'mid autum festival', '', 0, '07-Sep-2019', 1567847492, 'anwar', '1567793677-Redo.jpg', 0),
(82, 'Labour day', '', 0, '07-Sep-2019', 1567850435, 'anwar', '1567792879-latestx00labourx00dayx00banner.jpg', 0),
(83, 'Labour Day', '', 0, '07-Sep-2019', 1567857084, 'anwar', '1567857010-labourx00dayx001.jpg', 0),
(84, 'Labour day2', '', 0, '07-Sep-2019', 1567857224, 'anwar', '1567857043-labourx00dayx002.jpg', 0),
(85, 'Labour day', '', 0, '08-Sep-2019', 1567945453, 'anwar', '1567861028-labourx00dy.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `c_id` int(11) NOT NULL,
  `c_item` int(11) NOT NULL,
  `c_customer` int(11) NOT NULL,
  `c_date` varchar(15) NOT NULL,
  `c_time` int(15) NOT NULL,
  `c_price` double NOT NULL,
  `c_quantity` int(11) NOT NULL,
  `c_key` text NOT NULL,
  `c_company` int(11) NOT NULL,
  `c_gtotal` double NOT NULL,
  `c_client` int(11) NOT NULL,
  `c_shipping_id` varchar(255) NOT NULL,
  `c_shipping` text NOT NULL,
  `c_shipping_cost` double NOT NULL,
  `c_shipping_name` text NOT NULL,
  `c_shipping_deliver` text NOT NULL,
  `c_commission` int(11) NOT NULL,
  `c_commission_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`c_id`, `c_item`, `c_customer`, `c_date`, `c_time`, `c_price`, `c_quantity`, `c_key`, `c_company`, `c_gtotal`, `c_client`, `c_shipping_id`, `c_shipping`, `c_shipping_cost`, `c_shipping_name`, `c_shipping_deliver`, `c_commission`, `c_commission_value`) VALUES
(3, 53, 13, '14-Mar-2020', 1584180415, 20, 2, '6b73f9be5b7e2c0aa637efc2c374e5817abb75a07e21432c75b3ebe0830b08e3CART_5e6c3c3fae73a', 30, 40, 0, 'EP-RR09146', '', 7.3, 'DHL eCommerce (Dropoff only)', '2 working day(s)', 7, 3.31),
(5, 61, 20, '15-Mar-2020', 1584269148, 5, 1, 'e2855e9d23d2f123f8013d7845500ee859dfba8369d90818cac8916aa4b59013CART_5e6d96dbde1ab', 1, 3005, 0, 'EP-RR0914V', '', 76.9, 'DHL eCommerce (Dropoff only)', '2 working day(s)', 7, 215.73);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cd_id` int(11) NOT NULL,
  `cd_cart` int(11) NOT NULL,
  `cd_item` int(11) NOT NULL,
  `cd_io` int(11) NOT NULL,
  `cd_iov` varchar(255) NOT NULL,
  `cd_price` double NOT NULL,
  `cd_io_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cd_id`, `cd_cart`, `cd_item`, `cd_io`, `cd_iov`, `cd_price`, `cd_io_name`) VALUES
(53, 5, 61, 41, '500 units', 3000, '');

-- --------------------------------------------------------

--
-- Table structure for table `cart_shipping`
--

CREATE TABLE `cart_shipping` (
  `cs_id` int(11) NOT NULL,
  `cs_cart` int(11) NOT NULL,
  `cs_service_name` varchar(255) NOT NULL,
  `cs_rate_id` varchar(255) NOT NULL,
  `cs_total` double NOT NULL,
  `cs_address` text NOT NULL,
  `cs_delivery` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_main` int(11) NOT NULL,
  `c_date` varchar(255) NOT NULL,
  `c_time` int(15) NOT NULL,
  `c_user` varchar(255) NOT NULL,
  `c_key` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_main`, `c_date`, `c_time`, `c_user`, `c_key`) VALUES
(3, 'Stationary', 1, '06-Sep-2019', 1567782640, 'anwar', 'CATEGORY_5d720670c04db'),
(2, 'Books', 1, '06-Sep-2019', 1567782681, 'anwar', 'CATEGORY_5d720699245b9'),
(4, 'Clothes ', 1, '06-Sep-2019', 1567782685, 'anwar', 'CATEGORY_5d72069d47402'),
(5, 'Electronic', 0, '06-Sep-2019', 1567782699, 'anwar', 'CATEGORY_5d7206ab83cca'),
(6, 'Others', 0, '06-Sep-2019', 1567782688, 'anwar', 'CATEGORY_5d7206a0b804a');

-- --------------------------------------------------------

--
-- Table structure for table `ccmail`
--

CREATE TABLE `ccmail` (
  `cc_id` int(11) NOT NULL,
  `cc_email` text COLLATE utf8_unicode_ci NOT NULL,
  `cc_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cc_status` int(11) NOT NULL,
  `cc_code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ccmail`
--

INSERT INTO `ccmail` (`cc_id`, `cc_email`, `cc_user`, `cc_status`, `cc_code`) VALUES
(2, 'intelhost2u@gmail.com', 'anwar', 0, 5),
(3, 'intelhost2u@gmail.com', 'anwar', 0, 6),
(5, 'sales@intelhost.com.my, intelhost2u@gmail.com', 'anwar', 0, 8),
(7, 'intelhost2u@gmail.com', 'anwar', 0, 10),
(8, 'intelhost2u@gmail.com', 'anwar', 0, 11),
(9, 'intelhost2u@gmail.com', 'anwar', 0, 12),
(10, 'intelhost2u@gmail.com', 'anwar', 0, 13),
(11, 'intelhost2u@gmail.com', 'anwar', 0, 14),
(12, 'intelhost2u@gmail.com', 'anwar', 0, 15),
(13, 'intelhost2u@gmail.com, sales@intelhost.com.my', 'anwar', 0, 16),
(15, 'intelhost2u@gmail.com', 'anwar', 0, 18),
(14, 'intelhost2u@gmail.com', 'anwar', 0, 17),
(16, 'intelhost2u@gmail.com', 'anwar', 0, 19),
(17, 'intelhost2u@gmail.com', 'anwar', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `cl_id` int(11) NOT NULL,
  `cl_name` varchar(255) NOT NULL,
  `cl_phone` varchar(255) NOT NULL,
  `cl_email` varchar(255) NOT NULL,
  `cl_address` text NOT NULL,
  `cl_ic` varchar(255) NOT NULL,
  `cl_citizen` varchar(255) NOT NULL,
  `cl_country` varchar(255) NOT NULL,
  `cl_state` varchar(255) NOT NULL,
  `cl_city` varchar(255) NOT NULL,
  `cl_postal` varchar(20) NOT NULL,
  `cl_iscompany` int(11) NOT NULL,
  `cl_company` int(11) NOT NULL,
  `cl_type` int(11) NOT NULL,
  `cl_status` int(11) NOT NULL,
  `cl_login` varchar(255) NOT NULL,
  `cl_password` text NOT NULL,
  `cl_date` varchar(255) NOT NULL,
  `cl_time` varchar(15) NOT NULL,
  `cl_regno` varchar(255) NOT NULL,
  `cl_compPhone` varchar(255) NOT NULL,
  `cl_compFax` varchar(255) NOT NULL,
  `cl_compEmail` varchar(255) NOT NULL,
  `cl_compAbout` text NOT NULL,
  `cl_picture` text NOT NULL,
  `cl_commission` int(11) NOT NULL,
  `cl_bankName` varchar(255) NOT NULL,
  `cl_accno` varchar(255) NOT NULL,
  `cl_bankbranch` varchar(255) NOT NULL,
  `cl_key` text NOT NULL,
  `cl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_name`, `cl_phone`, `cl_email`, `cl_address`, `cl_ic`, `cl_citizen`, `cl_country`, `cl_state`, `cl_city`, `cl_postal`, `cl_iscompany`, `cl_company`, `cl_type`, `cl_status`, `cl_login`, `cl_password`, `cl_date`, `cl_time`, `cl_regno`, `cl_compPhone`, `cl_compFax`, `cl_compEmail`, `cl_compAbout`, `cl_picture`, `cl_commission`, `cl_bankName`, `cl_accno`, `cl_bankbranch`, `cl_key`, `cl_user`) VALUES
(93, 'Mohamed Anwar', '0138212869', 'anwar37007@gmail.com', 'Lot 26 Kampung Haji Wahed', '', '', 'MY', 'Sarawak', 'Miri', '98000', 0, 1, 0, 0, 'anwar', 'fb836d2494ebf13f3d2ad9d20d8a756273a9a6e0d086107b013072de1f725733', '15-Aug-2019', '1565894261', '37007MDA', '0854330312', '038269545584', 'anwartech@gmail.com', 'Technology Computing', '1569157113-my_logo.jpg', 15, '', '', '', '0', 0),
(107, 'Sam Pei Yoke', '+6017-8787991', 'sales@intelpro.com.my', '', '', '', '', '', '', '', 0, 30, 0, 0, 'peiyoke', 'cc37769883c34d3cf2c82f40ca9216d2e97bcabefe0dcab84df6510938571c75', '10-Oct-2019', '1570714900', '', '', '', '', '', '1570718458-19274747_1908301669426961_4866192168178530655_n_1908301669426961.jpg', 0, '', '', '', 'CLIENT_5d9ec4940acae', 0),
(111, 'Frankie Wong Pak Ing', '0149926252', 'frankie8371@gmail.com', '', '', '', '', '', '', '', 0, 34, 0, 0, 'Frankie ', 'b13d06bb5890951415a70371ae909c2888dbf53de2cf9fe93ac043161e325bfa', '14-Mar-2020', '1584195243', '', '', '', '', '', '', 0, '', '', '', 'CLIENT_5e6c762b58066', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_package`
--

CREATE TABLE `client_package` (
  `cp_id` int(11) NOT NULL,
  `cp_client` int(11) NOT NULL,
  `cp_package` int(11) NOT NULL,
  `cp_start` int(15) NOT NULL,
  `cp_expired` int(15) NOT NULL,
  `cp_status` int(11) NOT NULL,
  `cp_user` varchar(255) NOT NULL,
  `cp_date` varchar(255) NOT NULL,
  `cp_time` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cm_menus`
--

CREATE TABLE `cm_menus` (
  `cm_id` int(11) NOT NULL,
  `cm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cm_main` int(11) NOT NULL,
  `cm_status` int(11) NOT NULL,
  `cm_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cm_time` int(15) NOT NULL,
  `cm_user` int(11) NOT NULL,
  `cm_order` int(11) NOT NULL,
  `cm_route` text COLLATE utf8_unicode_ci NOT NULL,
  `cm_position` text COLLATE utf8_unicode_ci NOT NULL,
  `cm_role` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cm_menus`
--

INSERT INTO `cm_menus` (`cm_id`, `cm_name`, `cm_url`, `cm_icon`, `cm_main`, `cm_status`, `cm_date`, `cm_time`, `cm_user`, `cm_order`, `cm_route`, `cm_position`, `cm_role`) VALUES
(1, 'Dashboard', 'dashboard', 'fa fa-dashboard', 0, 1, '07-Apr-2019', 1554646434, 1, 1, 'pages/dashboard', 'Main', '4,3,5,6'),
(4, 'Items', 'items', 'fa fa-cubes', 0, 1, '29-Mar-2019', 1553883552, 1, 4, 'pages/items', 'Main', ''),
(69, 'My Business', 'my-business', 'fa fa-building-o', 0, 1, '18-Aug-2019', 1566150668, 10, 5, 'pages/my-business/all', 'Main', ''),
(8, 'Account', 'users', 'fa fa-cog', 0, 1, '25-Jul-2019', 1564065160, 10, 11, 'pages/users', 'Main', '4,3,5,6,7'),
(9, 'Reports', 'reports', 'fa fa-bar-chart', 0, 0, '31-Jul-2019', 1564609928, 10, 9, 'pages/reports', 'Main', ''),
(10, 'Summarize', 'summarize-dashboard', '', 1, 1, '29-Mar-2019', 1553883598, 1, 1, 'pages/dashboard/summarize', 'Main', ''),
(11, 'Marketing', 'marketing-dashboard', '', 1, 1, '29-Mar-2019', 1553883615, 1, 2, 'pages/dashboard/marketing', 'Main', ''),
(15, 'Sales', 'sales-dashboard', '', 1, 1, '28-Mar-2019', 1553810430, 0, 3, 'pages/dashboard/sales', 'Main', ''),
(31, 'My Account', 'my-account', 'fa fa-user', 8, 1, '25-Jul-2019', 1564065995, 10, 1, 'pages/user/my-account', 'Main,User Profile', ''),
(34, 'Sale', 'sale-report', 'fa fa-dollar', 9, 1, '25-Apr-2019', 1556209170, 1, 1, 'pages/report/sale', 'Main', ''),
(67, 'Orders', 'orders', 'fa fa-shopping-cart', 0, 1, '25-Jul-2019', 1564063827, 10, 10, 'pages/orders', 'Main', ''),
(37, 'Manage Themes', 'manage-themes', 'fa fa-wrench', 12, 0, '21-Jul-2019', 1563704508, 10, 3, 'pages/system/setting/themes', 'Main,User Profile', ''),
(40, 'All Items', 'all-item', 'fa fa-cubes', 4, 1, '06-Apr-2019', 1554570994, 1, 1, 'pages/items/all', 'Main', ''),
(42, 'Logout', 'logout', 'fa fa-power-off', 0, 1, '29-Mar-2019', 1553884941, 1, 4, 'pages/logout', 'User Profile', ''),
(43, 'Languages', 'language', 'fa fa-language', 12, 1, '30-Mar-2019', 1553966446, 10, 1, 'pages/system/setting/language', 'Main', ''),
(70, 'Business-Informations', 'Business-Informations', '', 0, 1, '02-Aug-2019', 1564744820, 10, 10, 'pages/my-business/info', '', ''),
(56, 'Setting', 'setting', 'fa fa-wrench', 24, 1, '05-Apr-2019', 1554482329, 1, 3, 'pages/billing/quotation/setting', 'Main', ''),
(68, 'All Orders', 'all-orders', 'fa fa-list', 67, 1, '25-Jul-2019', 1564066009, 10, 1, 'pages/orders/all-orders', 'Main', ''),
(71, 'Shipping', 'shipping', 'fa fa-ship ', 0, 0, '21-Aug-2019', 1566398552, 10, 4, 'pages/shipping', 'Main', '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_reg` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `c_fax` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_details` text NOT NULL,
  `c_client` int(11) NOT NULL,
  `c_user` int(11) NOT NULL,
  `c_date` varchar(255) NOT NULL,
  `c_time` int(15) NOT NULL,
  `c_address` text NOT NULL,
  `c_postalCode` varchar(255) NOT NULL,
  `c_country` varchar(255) NOT NULL,
  `c_logo` text NOT NULL,
  `c_key` text NOT NULL,
  `c_commission` int(11) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_bankName` varchar(255) NOT NULL,
  `c_accNo` varchar(255) NOT NULL,
  `c_bankBranch` varchar(255) NOT NULL,
  `c_state` varchar(255) NOT NULL,
  `c_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `c_name`, `c_reg`, `c_phone`, `c_fax`, `c_email`, `c_details`, `c_client`, `c_user`, `c_date`, `c_time`, `c_address`, `c_postalCode`, `c_country`, `c_logo`, `c_key`, `c_commission`, `c_city`, `c_bankName`, `c_accNo`, `c_bankBranch`, `c_state`, `c_status`) VALUES
(1, 'anwar-TECH', '37007MDA', '0312782215', '0382695455848', 'anwar37007@gmail.com', 'Technology Computing', 93, 10, '06-Mar-2020', 1583489336, 'Taman Desa Skudai', '81300', 'MY', '1566571201-dj4m.JPG', 'COMPANY_5d7334742a303', 10, 'Skudai', 'Maybank', '1853265121651356', 'Johor', 'Johor', 1),
(30, 'Intelligent Publishing S/B', '1234567', '1111111', '', 'sales@intelpro.com.my', 'Manufacturing ', 107, 10, '16-Jan-2020', 1579192811, 'No. 23A, Jalan Kebudayaan 16,\r\nTaman Universiti, Skudai.', '81300', 'MY', '1570984726-19366542_1908298426093952_6748382200070032040_n_1908298426093952.jpg', 'COMPANY_5d9ee8b5c185c', 10, 'Johor Bahru', '', 'sssssss', '', 'Johor', 1),
(34, 'ABC', '123', '0123', '', 'abc123@gmail.com', '', 0, 0, '14-Mar-2020', 1584195243, '', '', '', '', 'COMPANY_5e6c762b57a60', 10, '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_cms`
--

CREATE TABLE `company_cms` (
  `cc_id` int(11) NOT NULL,
  `cc_file` text NOT NULL,
  `cc_order` int(11) NOT NULL,
  `cc_company` int(11) NOT NULL,
  `cc_date` varchar(100) NOT NULL,
  `cc_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_cms`
--

INSERT INTO `company_cms` (`cc_id`, `cc_file`, `cc_order`, `cc_company`, `cc_date`, `cc_time`) VALUES
(21, '1570985154-19275148_1908300499427078_7655606408582689420_n_1908300499427078.jpg', 1, 30, '13-Oct-2019', 1570985154),
(20, '1570985107-19275148_1908300499427078_7655606408582689420_n_1908300499427078.jpg', 1, 30, '13-Oct-2019', 1570985107),
(31, '1570991979-19366542_1908298426093952_6748382200070032040_n_1908298426093952.jpg', 1, 30, '13-Oct-2019', 1570991979);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `c_id` int(11) NOT NULL,
  `c_title` text COLLATE utf8_unicode_ci NOT NULL,
  `c_content` text COLLATE utf8_unicode_ci NOT NULL,
  `c_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `c_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`c_id`, `c_title`, `c_content`, `c_date`, `c_time`, `c_user`) VALUES
(13, 'Intelhost - Adv2', 'PGRpdiBzdHlsZT0id2lkdGg6MTAwJSI+DQo8dGFibGUgc3R5bGU9IndpZHRoOjEwMCUiPg0KCTx0Ym9keT4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPjxhIGhyZWY9Imh0dHA6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1hYm91dC11cyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMTI1MjEwLWNvdmVyLXBhcnQuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MjJweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O0NhbGlicmkmcXVvdDssc2Fucy1zZXJpZiI+PHN0cm9uZz48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VmVyZGFuYSZxdW90OyxzYW5zLXNlcmlmIj5JbnRyb2R1Y2luZyBJbnRlbGhvc3Q6IEJlc3QgV2ViIEhvc3RpbmcgJmFtcDsgTW9iaWxlIEFwcCBQcm92aWRlcjwvc3Bhbj48L3N0cm9uZz48L3NwYW4+PC9zcGFuPjwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZD48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE0cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXRcIE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5JbnRlbGhvc3QgaGFzIGJlZW4gYSB3ZWxsLWtub3duIGFuZCB0cnVzdGVkIEhvc3RpbmcgJmFtcDsgSVQgRGV2ZWxvcG1lbnQgaW5kdXN0cnkgc2luY2UgMjAxNS4gV2Ugc3BlY2lhbGl6ZSBpbiBwcm92aWRpbmcgYSByZWxpYWJsZSBhbmQgcXVhbGl0eSB3ZWIgaG9zdGluZyBmb3Igb3JnYW5pemF0aW9ucyBhbmQgaW5kaXZpZHVhbHMgdG8gc2VydmUgY29udGVudCB0byB0aGUgSW50ZXJuZXQuIFdlIGVtcGxveWVkIGRlZGljYXRlZCBhbmQgcHJvZmVzc2lvbmFsIHN0YWZmcyB3aG8gYXJlIGxvYWRlZCB3aXRoIHllYXJzIG9mIGV4cGVyaWVuY2UuIDwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJCTx0ZD48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE0cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXRcIE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5Nb3Jlb3ZlciwgZWFjaCBkZWRpY2F0ZWQgZW1wbG95ZWUgcmVjZWl2ZXMgYSBzZXJpZXMgb2YgZXh0ZW5zaXZlIHRlY2huaWNhbCBhbmQgY3VzdG9tZXIgc2VydmljZSB0cmFpbmluZyBpbiBvcmRlciB0byBlbnN1cmUgdGhhdCB0aGUgY3VzdG9tZXJzIHdpbGwgYWx3YXlzIHJlY2VpdmUgdGhlIGZyaWVuZGx5LCBhY2N1cmF0ZSBhbmQgcHJvZmVzc2lvbmFsIHNlcnZpY2VzLiBXZSBoZWxwIG91ciBjdXN0b21lcnMgd29ybGR3aWRlIHRvIGdyb3cgdGhlaXIgb25saW5lIGFuZCBvZmZsaW5lIGJ1c2luZXNzZXMgdGhyb3VnaCBkZWxpdmVyeSBvZiBpbm5vdmF0aXZlIGludGVybmV0IHByb2R1Y3RzIG9uIGEgc3VwZXJpb3Igc2VydmljZSBwbGF0Zm9ybS4gPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aHIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyIgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YnIgLz4NCgkJCSZuYnNwOzwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZD48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHA6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT13ZWItZGVzaWduIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyMDYyNjctV2Vic2l0ZS5wbmciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvYT48L3RkPg0KCQkJPHRkPg0KCQkJPGgyPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MjJweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldFwgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzdHJvbmc+U3RhcnQgWW91ciBXZWJzaXRlICZhbXA7IFJlYWNoIE1vcmUgQ3VzdG9tZXJzPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L2gyPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjIycHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXRcIE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5FYWNoIG9mIG91ciB3ZWJzaXRlcyBpcyBidWlsdCBvbiB0aGUgcG9wdWxhciBCb290c3RyYXAgZnJhbWV3b3JrIGFuZCBXb3JkcHJlc3MsIHNvIHRoZSBkZXNpZ24gaXMgJmxzcXVvO21vYmlsZSBmaXJzdCZyc3F1bzsgYW5kIGZ1bGx5IHJlc3BvbnNpdmUuIEJlc2lkZXMsIGl0IGlzIGJ1aWx0IG9uIEhUTUw1IHdoaWNoIHdvcmtzIGFjcm9zcyBtb2JpbGUgZGV2aWNlcyBhbmQgaXQgaXMgdGhlIG1vc3QgZWZmZWN0aXZlIHdheSB0byBnZXQgeW91ciBwcm9kdWN0IG9mZiB0aGUgZ3JvdW5kLjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxiciAvPg0KCQkJJm5ic3A7PC9wPg0KCQkJPC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkPg0KCQkJPGgyPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MjJweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldFwgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzdHJvbmc+TmF0aXZlICZhbXA7IEh5YnJpZCBNb2JpbGUgQXBwIERldmVsb3BtZW50PC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L2gyPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjIycHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXRcIE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5PdXIgaGlnaGx5IHNraWxsZWQgZGV2ZWxvcG1lbnQgdGVhbSBoYXMgeWVhcnMgb2YgZXhwZXJpZW5jZSBpbiBkZXZlbG9waW5nIGhpZ2gtZW5kIGNyb3NzIHBsYXRmb3JtIGZlYXR1cmVzIGFwcCwgZ3JhcGhpY2FsLCBpbnRlZ3JhdGVkIFdlYi1zZXJ2aWNlIGluZm9ybWF0aW9uIGFuZCBtdWNoIG1vcmUuPC9zcGFuPjwvc3Bhbj48L3A+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyNzE0NTMtc3R1ZGlvLWJhci5wbmciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPg0KCQkJPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj4mbmJzcDs8L3A+DQoJCQk8L3RkPg0KCQkJPHRkPjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cDovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPW1vYmlsZS1hcHAiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MTIwNjMwNS1Nb2JpbGUucG5nIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPg0KCQkJPGhyIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPg0KCQkJPGgyPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MjJweCI+PHN0cm9uZz5Eb21haW4gUHJpdmFjeSBQcm90ZWN0aW9uIDwvc3Ryb25nPjwvc3Bhbj48L3NwYW4+PC9oMj4NCgkJCTxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MTI3MTQ0OS1kb21haW4tYmFyLnBuZyIgc3R5bGU9IndpZHRoOjEwMCUiIC8+DQoJCQk8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmp1c3RpZnkiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MjJweCI+RXZlcnkgZGF5LCBtaWxsaW9ucyBvZiB3ZWJzaXRlIG93bmVycyBhcmUgcHV0dGluZyB0aGVtc2VsdmVzIGF0IHJpc2sganVzdCBieSBub3QgaGF2aW5nICZxdW90O3NoaWVsZCZxdW90OyB0byB0aGVpciBwZXJzb25hbCBkZXRhaWxzLiBUaGUgcGVyc29uYWwgZGV0YWlsIHN1Y2ggYXMgY29udGFjdCBpbmZvcm1hdGlvbiBpcyBoYXJ2ZXN0ZWQgYnkgc3BhbW1lcnMgZnJvbSBwdWJsaWNseSBhY2Nlc3NpYmxlIFdIT0lTIHRvIHNlbmQgc3BhbS4gPC9zcGFuPjwvc3Bhbj48L3A+DQoNCgkJCTxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyMnB4Ij5BdCBJbnRlbGhvc3QsIHdlIHByb3RlY3Qgb3VyIGNsaWVudHMmcnNxdW87IGluZm9ybWF0aW9uIGVzcGVjaWFsbHkgZG9tYWluIFdIT0lTIGluZm9ybWF0aW9uIHRvIG1ha2Ugc3VyZSBvdXIgY2xpZW50cyBhcmUgbm90IGVhc2lseSBhY2Nlc3NlZCBieSB0aGUgcHVibGljIGluY2x1ZGluZyB0aGUgc3BhbW1lcnMuIDxzcGFuIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOndoaXRlIj5Eb21haW4gcHJpdmFjeSBvciBXSE9JUyBwcm90ZWN0aW9uIGhpZGVzIHRoZSBkb21haW4gdXNlciZyc3F1bztzIHBlcnNvbmFsIGluZm9ybWF0aW9uIGZyb20gdGhlIHB1YmxpYyBXSE9JUyBkYXRhYmFzZS48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PGJyIC8+DQoJCQkmbmJzcDs8L3A+DQoJCQk8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aHIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyIgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5mYWNlYm9vay5jb20vaW50ZWxob3N0Lm15LyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgcGFkZGluZzogNXB4OyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTI5LWZiLnBuZyIgc3R5bGU9ImhlaWdodDoxMjJweDsgd2lkdGg6MTIycHgiIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IHBhZGRpbmc6IDVweDsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MzYteXQucG5nIiBzdHlsZT0iaGVpZ2h0OjEyMXB4OyB3aWR0aDoxMjFweCIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IHBhZGRpbmc6IDVweDsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MzMtZyAucG5nIiBzdHlsZT0iaGVpZ2h0OjEyMXB4OyB3aWR0aDoxMjFweCIgLz4gPC9hPiA8YSBocmVmPSJ0ZWw6KzYwMTIyODM2NzMxIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBwYWRkaW5nOiA1cHg7Ij4gPGltZyBhbHQ9IiIgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MDY4OTUyMS1hcHAucG5nIiBzdHlsZT0iaGVpZ2h0OjEyMnB4OyB3aWR0aDoxMjJweCIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3d3dy5pbnN0YWdyYW0uY29tL2ltYWVkdWNhdGlvbmdyb3VwLyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgcGFkZGluZzogNXB4OyI+IDwvYT48L3RkPg0KCQkJPHRkPiZuYnNwOzwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj4NCgkJCTxoMiBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MThweCI+PHN0cm9uZz48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0XCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+SW50ZWxob3N0IC0gV2UgcHJvdmlkZSB0aGUgQmVzdCBJVCBTb2x1dGlvbiBUbyBHcm93IFVwIFlvdXIgQnVzaW5lc3MhPC9zcGFuPjwvc3Ryb25nPjwvc3Bhbj48L2gyPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209d2ViLWhvc3RpbmciIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMjA0NDE3LWRvbWFpbi5qcGciIHN0eWxlPSJoZWlnaHQ6MTM2cHg7IHdpZHRoOjIwMnB4IiAvPiA8L2E+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209d2ViLWRlc2lnbiIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMjA0NDI1LXdlYi1kZXNpZ24uanBnIiBzdHlsZT0iaGVpZ2h0OjEzNnB4OyB3aWR0aDoxOTFweCIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPW1vYmlsZS1hcHAiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MTIwNDQyMS1tb2JpbGUtYXBwLmpwZyIgc3R5bGU9ImhlaWdodDoxMzZweDsgd2lkdGg6MTk1cHgiIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Lm15LyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMjA0NDEzLWJ1c2luZXNzLmpwZyIgc3R5bGU9ImhlaWdodDoxMzZweDsgd2lkdGg6MTk2cHgiIC8+IDwvYT48L3A+DQoJCQk8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aHIgLz48c21hbGw+JmNvcHk7QWxsIHJpZ2h0cyByZXNlcnZlZC4gJnJlZztJbnRlbGxpZ2VudCBIb3N0aW5nIFNkbi4gQmhkLiAxMTU4NTgzLVUuICZ0cmFkZTtZb3VyIFJlbGlhYmxlIEZyaWVuZCEgPC9zbWFsbD48L3RkPg0KCQk8L3RyPg0KCTwvdGJvZHk+DQo8L3RhYmxlPg0KPC9kaXY+DQo=', '01-Apr-2018', '1522597211', 'peiyoke'),
(10, 'Intelhost Promotion - March 2018', 'PHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA3NzMyODktY2xpY2sgaGVyZS5qcGciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvYT48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPC9hPjwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPXdlYi1ob3N0aW5nIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA3NzMyOTQtY29udGFjdCB1cy5qcGciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvYT48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT13ZWItZGVzaWduIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA3NzMyOTctbGVhcm4tbW9yZS5qcGciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvYT48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjIycHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtDYWxpYnJpJnF1b3Q7LHNhbnMtc2VyaWYiPlBsZWFzZSBjYWxsICs2MDEyLTI4MyA2NzMxIG9yIHZpc2l0IG91ciB3ZWJzaXRlIC0gaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teSBmb3IgbW9yZSBpbmZvcm1hdGlvbi48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzdHJvbmc+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxOHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6THVjaWRhXCBTYW5zXCBVbmljb2RlLEx1Y2lkYVwgR3JhbmRlLHNhbnMtc2VyaWYiPkNvbm5lY3Qgd2l0aCB1cyBvbjombmJzcDs8L3NwYW4+PC9zcGFuPjwvc3Ryb25nPjwvcD4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5mYWNlYm9vay5jb20vaW50ZWxob3N0Lm15LyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MjktZmIucG5nIiBzdHlsZT0iaGVpZ2h0OjExMHB4OyB3aWR0aDoxMTBweCIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTM2LXl0LnBuZyIgc3R5bGU9ImhlaWdodDoxMDlweDsgd2lkdGg6MTA5cHgiIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MzMtZyAucG5nIiBzdHlsZT0iaGVpZ2h0OjEwOHB4OyB3aWR0aDoxMDhweCIgLz4gPC9hPiA8YSBocmVmPSJ0ZWw6KzYwMTIyODM2NzMxIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MjEtYXBwLnBuZyIgc3R5bGU9ImhlaWdodDoxMDhweDsgd2lkdGg6MTA5cHgiIC8+Jm5ic3A7IDwvYT48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPGRpdiBzdHlsZT0icGFnZS1icmVhay1hZnRlcjphbHdheXMiPjxzcGFuIHN0eWxlPSJkaXNwbGF5Om5vbmUiPiZuYnNwOzwvc3Bhbj48L2Rpdj4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VGFob21hLEdlbmV2YSxzYW5zLXNlcmlmIj4mY29weTtBbGwgcmlnaHRzIHJlc2VydmVkJm5ic3A7JnJlZztJbnRlbGxpZ2VudCBIb3N0aW5nIFNkbi4gQmhkLiAtIDExNTg1ODMtVS48L3NwYW4+PC9wPg0K', '25-Mar-2018', '1522002173', 'peiyoke'),
(14, 'Intelhost - E-Commerce & Web Hosting', 'PGRpdiBzdHlsZT0id2lkdGg6MTAwJSI+DQo8dGFibGUgc3R5bGU9IndpZHRoOjEwMCUiPg0KCTx0Ym9keT4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MjU4NDM4NS1jb3ZlcjEuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmNlbnRlciI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj48c3Ryb25nPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUcmVidWNoZXQgTVMmcXVvdDssc2Fucy1zZXJpZiI+SW50cm9kdWNpbmcgSW50ZWxob3N0Ojwvc3Bhbj48L3N0cm9uZz48YnIgLz4NCgkJCTxzdHJvbmc+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RyZWJ1Y2hldCBNUyZxdW90OyxzYW5zLXNlcmlmIj48c3Ryb25nPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUcmVidWNoZXQgTVMmcXVvdDssc2Fucy1zZXJpZiI+QmVzdCBXZWIgSG9zdGluZyAmYW1wOyBNb2JpbGUgQXBwIFByb3ZpZGVyPC9zcGFuPjwvc3Ryb25nPjwvc3Bhbj48L3N0cm9uZz48L3NwYW4+PC9zcGFuPjwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj4NCgkJCTxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyMnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VHJlYnVjaGV0IE1TJnF1b3Q7LHNhbnMtc2VyaWYiPkludGVsaG9zdCBoYXMgYmVlbiBhIHdlbGwta25vd24gYW5kIHRydXN0ZWQgSG9zdGluZyAmYW1wOyBJVCBEZXZlbG9wbWVudCBpbmR1c3RyeSBzaW5jZSAyMDE1LiBXZSBzcGVjaWFsaXplIGluIHByb3ZpZGluZyBhIHJlbGlhYmxlIGFuZCBxdWFsaXR5IHdlYiBob3N0aW5nIGZvciBvcmdhbml6YXRpb25zIGFuZCBpbmRpdmlkdWFscyB0byBzZXJ2ZSBjb250ZW50IHRvIHRoZSBJbnRlcm5ldC4gV2UgZW1wbG95ZWQgZGVkaWNhdGVkIGFuZCBwcm9mZXNzaW9uYWwgc3RhZmZzIHdobyBhcmUgbG9hZGVkIHdpdGggeWVhcnMgb2YgZXhwZXJpZW5jZS4gTW9yZW92ZXIsIGVhY2ggZGVkaWNhdGVkIGVtcGxveWVlIHJlY2VpdmVzIGEgc2VyaWVzIG9mIGV4dGVuc2l2ZSB0ZWNobmljYWwgYW5kIGN1c3RvbWVyIHNlcnZpY2UgdHJhaW5pbmcgaW4gb3JkZXIgdG8gZW5zdXJlIHRoYXQgdGhlIGN1c3RvbWVycyB3aWxsIGFsd2F5cyByZWNlaXZlIHRoZSBmcmllbmRseSwgYWNjdXJhdGUgYW5kIHByb2Zlc3Npb25hbCBzZXJ2aWNlcy4gV2UgaGVscCBvdXIgY3VzdG9tZXJzIHdvcmxkd2lkZSB0byBncm93IHRoZWlyIG9ubGluZSBhbmQgb2ZmbGluZSBidXNpbmVzc2VzIHRocm91Z2ggZGVsaXZlcnkgb2YgaW5ub3ZhdGl2ZSBpbnRlcm5ldCBwcm9kdWN0cyBvbiBhIHN1cGVyaW9yIHNlcnZpY2UgcGxhdGZvcm0uIDwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIiBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPiZuYnNwOzwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZD48YnIgLz4NCgkJCTxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MjU4NDM5Ni1lY29tbWVyY2UuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3RkPg0KCQkJPHRkPg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyMHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj48c3Ryb25nPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUcmVidWNoZXQgTVMmcXVvdDssc2Fucy1zZXJpZiI+RS1Db21tZXJjZSBEZXZlbG9wZXI8L3NwYW4+PC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCgkJCTxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxOHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VHJlYnVjaGV0IE1TJnF1b3Q7LHNhbnMtc2VyaWYiPk91ciBlLWNvbW1lcmNlIHBsYXRmb3JtIGlzIGRldmVsb3BlZCBhbmQgc2V0dXAgdGhvcm91Z2hseSB0byBtYWtlIHN1cmUgYWxsIHNlY3VyaXR5IG1hdHRlcnMgYXJlIGNvbXBsZXRlbHkgc2FmZSBhbmQgdG8gbWVldCBvdXIgY2xpZW50cyZyc3F1bzsgbmVlZHMuIDwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxOHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7Q2FsaWJyaSZxdW90OyxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VHJlYnVjaGV0IE1TJnF1b3Q7LHNhbnMtc2VyaWYiPlRoZSBNb3N0IEltcG9ydGFudCBFLUNvbW1lcmNlIEZlYXR1cmVzIEluY2x1ZGU6PC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8dWw+DQoJCQkJPGxpPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MThweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O0NhbGlicmkmcXVvdDssc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RyZWJ1Y2hldCBNUyZxdW90OyxzYW5zLXNlcmlmIj5Db250ZW50IG1hbmFnZW1lbnQgY2FwYWJpbGl0aWVzLjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvbGk+DQoJCQkJPGxpPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MThweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O0NhbGlicmkmcXVvdDssc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RyZWJ1Y2hldCBNUyZxdW90OyxzYW5zLXNlcmlmIj5NdWx0aXBsZSBwYXltZW50IG9wdGlvbnMuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9saT4NCgkJCQk8bGk+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxOHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7Q2FsaWJyaSZxdW90OyxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VHJlYnVjaGV0IE1TJnF1b3Q7LHNhbnMtc2VyaWYiPkVtYWlsIG1hcmtldGluZyBpbnRlZ3JhdGlvbi48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L2xpPg0KCQkJCTxsaT48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE4cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtDYWxpYnJpJnF1b3Q7LHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUcmVidWNoZXQgTVMmcXVvdDssc2Fucy1zZXJpZiI+QW4gZWFzeS10by11c2UgY2hlY2tvdXQuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9saT4NCgkJCQk8bGk+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxOHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7Q2FsaWJyaSZxdW90OyxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VHJlYnVjaGV0IE1TJnF1b3Q7LHNhbnMtc2VyaWYiPlJlc3BvbnNpdmUgd2Vic2l0ZS48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L2xpPg0KCQkJCTxsaT48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE4cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtDYWxpYnJpJnF1b3Q7LHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUcmVidWNoZXQgTVMmcXVvdDssc2Fucy1zZXJpZiI+UmVwb3J0aW5nIHRvb2xzLjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvbGk+DQoJCQkJPGxpPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MThweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O0NhbGlicmkmcXVvdDssc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RyZWJ1Y2hldCBNUyZxdW90OyxzYW5zLXNlcmlmIj5TZWFyY2ggZW5naW5lIG9wdGltaXplZCBjb2RlIGFuZCBsYXlvdXQuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9saT4NCgkJCQk8bGk+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxOHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7Q2FsaWJyaSZxdW90OyxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VHJlYnVjaGV0IE1TJnF1b3Q7LHNhbnMtc2VyaWYiPlByb21vdGlvbiBhbmQgZGlzY291bnQgY29kZSB0b29scy48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L2xpPg0KCQkJPC91bD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZD4NCgkJCTxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MjBweCI+PHN0cm9uZz48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7Q2FsaWJyaSZxdW90OyxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VHJlYnVjaGV0IE1TJnF1b3Q7LHNhbnMtc2VyaWYiPldlYiBIb3N0aW5nPC9zcGFuPjwvc3Bhbj48L3N0cm9uZz48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmp1c3RpZnkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O0NhbGlicmkmcXVvdDssc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RyZWJ1Y2hldCBNUyZxdW90OyxzYW5zLXNlcmlmIj5JbnRlbGhvc3Qgc3VwcGxpZXMgdW5saW1pdGVkIHdlYiBob3N0aW5nIHdpdGggZnVsbHkgZXhwZXJ0aXNlIHN1cHBvcnQgdG8gaGVscCBjbGllbnRzIG1lZXQgdGhlaXIgbmVlZHMgZm9yIGJ1c2luZXNzLiBJbiBvcmRlciB0byBkbyBzbywgd2UgY29udGludWFsbHkgaW52ZXN0IGluIG5ldHdvcmsgZXF1aXBtZW50LCBpbmZyYXN0cnVjdHVyZSBhbmQgYmFja2JvbmUgY29ubmVjdGl2aXR5IGluIGFsbCBvdXIgZGF0YSBjZW50cmVzLjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtDYWxpYnJpJnF1b3Q7LHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUcmVidWNoZXQgTVMmcXVvdDssc2Fucy1zZXJpZiI+T3VyIGRhdGEgY2VudHJlcyBmYWNpbGl0aWVzIGFyZSBhYmxlIHRvIGZ1bGZpbCB5b3VyIGNvbG9jYXRpb24gcmVxdWlyZW1lbnRzLjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YnIgLz4NCgkJCSZuYnNwOzwvcD4NCg0KCQkJPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj4mbmJzcDs8L3A+DQoJCQk8L3RkPg0KCQkJPHRkPjxiciAvPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUyNTg0NDAwLWhvc3RpbmcuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aHIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aDI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyMnB4Ij48c3Ryb25nPkRvbWFpbiBQcml2YWN5IFByb3RlY3Rpb24gPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L2gyPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMjcxNDQ5LWRvbWFpbi1iYXIucG5nIiBzdHlsZT0id2lkdGg6MTAwJSIgLz4NCgkJCTxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyMnB4Ij5FdmVyeSBkYXksIG1pbGxpb25zIG9mIHdlYnNpdGUgb3duZXJzIGFyZSBwdXR0aW5nIHRoZW1zZWx2ZXMgYXQgcmlzayBqdXN0IGJ5IG5vdCBoYXZpbmcgJnF1b3Q7c2hpZWxkJnF1b3Q7IHRvIHRoZWlyIHBlcnNvbmFsIGRldGFpbHMuIFRoZSBwZXJzb25hbCBkZXRhaWwgc3VjaCBhcyBjb250YWN0IGluZm9ybWF0aW9uIGlzIGhhcnZlc3RlZCBieSBzcGFtbWVycyBmcm9tIHB1YmxpY2x5IGFjY2Vzc2libGUgV0hPSVMgdG8gc2VuZCBzcGFtLiA8L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjIycHgiPkF0IEludGVsaG9zdCwgd2UgcHJvdGVjdCBvdXIgY2xpZW50cyZyc3F1bzsgaW5mb3JtYXRpb24gZXNwZWNpYWxseSBkb21haW4gV0hPSVMgaW5mb3JtYXRpb24gdG8gbWFrZSBzdXJlIG91ciBjbGllbnRzIGFyZSBub3QgZWFzaWx5IGFjY2Vzc2VkIGJ5IHRoZSBwdWJsaWMgaW5jbHVkaW5nIHRoZSBzcGFtbWVycy4gPHNwYW4gc3R5bGU9ImJhY2tncm91bmQtY29sb3I6d2hpdGUiPkRvbWFpbiBwcml2YWN5IG9yIFdIT0lTIHByb3RlY3Rpb24gaGlkZXMgdGhlIGRvbWFpbiB1c2VyJnJzcXVvO3MgcGVyc29uYWwgaW5mb3JtYXRpb24gZnJvbSB0aGUgcHVibGljIFdIT0lTIGRhdGFiYXNlLjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YnIgLz4NCgkJCSZuYnNwOzwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj4NCgkJCTxociAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIiBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBwYWRkaW5nOiA1cHg7Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MjktZmIucG5nIiBzdHlsZT0iaGVpZ2h0OjEyMnB4OyB3aWR0aDoxMjJweCIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgcGFkZGluZzogNXB4OyI+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MDY4OTUzNi15dC5wbmciIHN0eWxlPSJoZWlnaHQ6MTIxcHg7IHdpZHRoOjEyMXB4IiAvPiA8L2E+IDxhIGhyZWY9Imh0dHBzOi8vcGx1cy5nb29nbGUuY29tLzEwMDc1MDYzOTc3ODQ3ODI2NzAzOCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgcGFkZGluZzogNXB4OyI+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MDY4OTUzMy1nIC5wbmciIHN0eWxlPSJoZWlnaHQ6MTIxcHg7IHdpZHRoOjEyMXB4IiAvPiA8L2E+IDxhIGhyZWY9InRlbDorNjAxMjI4MzY3MzEiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IHBhZGRpbmc6IDVweDsiPiA8aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTIxLWFwcC5wbmciIHN0eWxlPSJoZWlnaHQ6MTIycHg7IHdpZHRoOjEyMnB4IiAvPiA8L2E+IDxhIGhyZWY9Imh0dHBzOi8vd3d3Lmluc3RhZ3JhbS5jb20vaW1hZWR1Y2F0aW9uZ3JvdXAvIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBwYWRkaW5nOiA1cHg7Ij4gPC9hPjwvdGQ+DQoJCQk8dGQ+Jm5ic3A7PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPg0KCQkJPGgyIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyMnB4Ij48c3Ryb25nPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXRcIE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5JbnRlbGhvc3QgLSBXZSBwcm92aWRlIHRoZSBCZXN0IElUIFNvbHV0aW9uIFRvIEdyb3cgVXAgWW91ciBCdXNpbmVzcyE8L3NwYW4+PC9zdHJvbmc+PC9zcGFuPjwvaDI+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT13ZWItaG9zdGluZyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyMDQ0MTctZG9tYWluLmpwZyIgc3R5bGU9ImhlaWdodDoxMzZweDsgd2lkdGg6MjAycHgiIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT13ZWItZGVzaWduIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyMDQ0MjUtd2ViLWRlc2lnbi5qcGciIHN0eWxlPSJoZWlnaHQ6MTM2cHg7IHdpZHRoOjE5MXB4IiAvPiA8L2E+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209bW9iaWxlLWFwcCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMjA0NDIxLW1vYmlsZS1hcHAuanBnIiBzdHlsZT0iaGVpZ2h0OjEzNnB4OyB3aWR0aDoxOTVweCIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QubXkvIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyMDQ0MTMtYnVzaW5lc3MuanBnIiBzdHlsZT0iaGVpZ2h0OjEzNnB4OyB3aWR0aDoxOTZweCIgLz4gPC9hPjwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj4NCgkJCTxociAvPjxzbWFsbD4mY29weTtBbGwgcmlnaHRzIHJlc2VydmVkLiAmcmVnO0ludGVsbGlnZW50IEhvc3RpbmcgU2RuLiBCaGQuIDExNTg1ODMtVS4gJnRyYWRlO1lvdXIgUmVsaWFibGUgRnJpZW5kISA8L3NtYWxsPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQo8L2Rpdj4NCg==', '15-Apr-2018', '1523817648', 'peiyoke'),
(11, 'Intelhost Introduction', 'PHA+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMDM5Mzc3LTEucG5nIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L2E+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+IDwvYT48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPGRpdj4NCjxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246Y2VudGVyIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzdHJvbmc+SW50cm9kdWNpbmcgSW50ZWxob3N0OjxiciAvPg0KQmVzdCBXZWIgSG9zdGluZyAmYW1wOyBNb2JpbGUgQXBwIFByb3ZpZGVyPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5JbnRlbGhvc3QgaGFzIGJlZW4gYSB3ZWxsLWtub3duIGFuZCB0cnVzdGVkIEhvc3RpbmcgJmFtcDsgSVQgRGV2ZWxvcG1lbnQgaW5kdXN0cnkgc2luY2UgMjAxNS4gV2Ugc3BlY2lhbGl6ZSBpbiBwcm92aWRpbmcgYSByZWxpYWJsZSBhbmQgcXVhbGl0eSB3ZWIgaG9zdGluZyBmb3Igb3JnYW5pemF0aW9ucyBhbmQgaW5kaXZpZHVhbHMgdG8gc2VydmUgY29udGVudCB0byB0aGUgSW50ZXJuZXQuIFdlIGVtcGxveWVkIGRlZGljYXRlZCBhbmQgcHJvZmVzc2lvbmFsIHN0YWZmcyB3aG8gYXJlIGxvYWRlZCB3aXRoIHllYXJzIG9mIGV4cGVyaWVuY2UuIE1vcmVvdmVyLCBlYWNoIGRlZGljYXRlZCBlbXBsb3llZSByZWNlaXZlcyBhIHNlcmllcyBvZiBleHRlbnNpdmUgdGVjaG5pY2FsIGFuZCBjdXN0b21lciBzZXJ2aWNlIHRyYWluaW5nIGluIG9yZGVyIHRvIGVuc3VyZSB0aGF0IHRoZSBjdXN0b21lcnMgd2lsbCBhbHdheXMgcmVjZWl2ZSB0aGUgZnJpZW5kbHksIGFjY3VyYXRlIGFuZCBwcm9mZXNzaW9uYWwgc2VydmljZXMuIFdlIGhlbHAgb3VyIGN1c3RvbWVycyB3b3JsZHdpZGUgdG8gZ3JvdyB0aGVpciBvbmxpbmUgYW5kIG9mZmxpbmUgYnVzaW5lc3NlcyB0aHJvdWdoIGRlbGl2ZXJ5IG9mIGlubm92YXRpdmUgaW50ZXJuZXQgcHJvZHVjdHMgb24gYSBzdXBlcmlvciBzZXJ2aWNlIHBsYXRmb3JtLiA8L3NwYW4+PC9zcGFuPjwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KPC9kaXY+DQoNCjxwPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT13ZWItZGVzaWduIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEwMzkzODgtMi5wbmciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvYT48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPXdlYi1kZXNpZ24iIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+IDwvYT48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPGRpdj4NCjxoMiBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzdHJvbmc+PHN0cm9uZz5TdGFydCBZb3VyIFdlYnNpdGUgJmFtcDsgUmVhY2ggTW9yZSBDdXN0b21lcnM8L3N0cm9uZz48L3N0cm9uZz48L3NwYW4+PC9zcGFuPjwvaDI+DQoNCjxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5FYWNoIG9mIG91ciB3ZWJzaXRlcyBpcyBidWlsdCBvbiB0aGUgcG9wdWxhciBCb290c3RyYXAgZnJhbWV3b3JrIGFuZCBXb3JkcHJlc3MsIHNvIHRoZSBkZXNpZ24gaXMgJmxzcXVvO21vYmlsZSBmaXJzdCZyc3F1bzsgYW5kIGZ1bGx5IHJlc3BvbnNpdmUuIEJlc2lkZXMsIGl0IGlzIGJ1aWx0IG9uIEhUTUw1IHdoaWNoIHdvcmtzIGFjcm9zcyBtb2JpbGUgZGV2aWNlcyBhbmQgaXQgaXMgdGhlIG1vc3QgZWZmZWN0aXZlIHdheSB0byBnZXQgeW91ciBwcm9kdWN0IG9mZiB0aGUgZ3JvdW5kLjwvc3Bhbj48L3NwYW4+PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQo8L2Rpdj4NCg0KPHA+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QubXkvP209bW9iaWxlLWFwcCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMDM5Mzk3LTMucG5nIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L2E+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1tb2JpbGUtYXBwIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8L2E+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjxkaXY+DQo8aDIgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3Ryb25nPjxzdHJvbmc+TmF0aXZlICZhbXA7IEh5YnJpZCBNb2JpbGUgQXBwIERldmVsb3BtZW50PC9zdHJvbmc+PC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L2gyPg0KDQo8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmp1c3RpZnkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+T3VyIGhpZ2hseSBza2lsbGVkIGRldmVsb3BtZW50IHRlYW0gaGFzIHllYXJzIG9mIGV4cGVyaWVuY2UgaW4gZGV2ZWxvcGluZyBoaWdoLWVuZCBjcm9zcyBwbGF0Zm9ybSBmZWF0dXJlcyBhcHAsIGdyYXBoaWNhbCwgaW50ZWdyYXRlZCBXZWItc2VydmljZSBpbmZvcm1hdGlvbiBhbmQgbXVjaCBtb3JlLjwvc3Bhbj48L3NwYW4+PC9wPg0KPC9kaXY+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWVjb21tZXJjZSI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUxMDM5NDA2LTQucG5nIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L2E+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1lY29tbWVyY2UiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+IDwvYT48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPHA+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3Ryb25nPjxzdHJvbmc+RS1Db21tZXJjZSBEZXZlbG9wZXI8L3N0cm9uZz48L3N0cm9uZz48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPGRpdj4NCjxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5PdXIgZS1jb21tZXJjZSBwbGF0Zm9ybSBpcyBkZXZlbG9wZWQgYW5kIHNldHVwIHRob3JvdWdobHkgdG8gbWFrZSBzdXJlIGFsbCBzZWN1cml0eSBtYXR0ZXJzIGFyZSBjb21wbGV0ZWx5IHNhZmUgYW5kIHRvIG1lZXQgb3VyIGNsaWVudHMmcnNxdW87IG5lZWRzLiA8L3NwYW4+PC9zcGFuPjwvcD4NCjwvZGl2Pg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QubXkvP209YnVzaW5lc3NkaXJlY3RvcnkiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MTAzOTQxNC01LnBuZyIgc3R5bGU9IndpZHRoOjEwMCUiIC8+PC9hPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQo8ZGl2Pg0KPGgyIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHN0cm9uZz48c3Ryb25nPkludGVsaG9zdCBCdXNpbmVzcyBEaXJlY3RvcnkgPC9zdHJvbmc+PC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L2gyPg0KDQo8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmp1c3RpZnkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+RG8geW91IGhhdmUgYSBidXNpbmVzcyBidXQgeW91IHN0aWxsIHlldCB0byByZWFjaCB5b3VyIGdvYWw/IElmIHllcywgdGhpcyBpcyB0aGUgcGVyZmVjdCB0aW1lIHRvIGdyb3cgeW91ciBidXNpbmVzcyB3aXRoIHNvbWUgYWR2YW5jZWQgbWFya2V0aW5nIHN0cmF0ZWdpZXMmbWRhc2g7Y3JlYXRlIGEgd2Vic2l0ZS4gTm93YWRheXMsPHNwYW4gc3R5bGU9ImJhY2tncm91bmQtY29sb3I6d2hpdGUiPiB0aGUgaW50ZXJuZXQmbmJzcDtoYXMgY2hhbmdlZCZuYnNwO21hcmtldGluZyZuYnNwO2NoYW5uZWxzLiBFdmVyeXRoaW5nJm5ic3A7aXMmbmJzcDtjb25uZWN0ZWQgYW5kIG91ciBzb2NpYWwgY29tbXVuaXR5Jm5ic3A7aGFzIG5vIGJvdW5kYXJpZXMuJm5ic3A7PC9zcGFuPkFjY29yZGluZyB0byBJbnRlcm5ldCBXb3JsZCBTdGF0cywgdGhlcmUgd2VyZSBhcHByb3hpbWF0ZWx5IDMuODggYmlsbGlvbiBJbnRlcm5ldCB1c2VycyBpbiB0aGUgd29ybGQgYXMgb2YgSnVuZSAyMDE3LiBUaGlzIGlzIGNvbXBhcmVkIHRvIDMuMjYgYmlsbGlvbiBJbnRlcm5ldCB1c2VycyBpbiAyMDE2LiZuYnNwOyA8L3NwYW4+PC9zcGFuPjwvcD4NCg0KPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPkludGVsaG9zdCBwbGF0Zm9ybSBpcyB0byBoZWxwIHBlb3BsZSBjcmVhdGUgdGhlaXIgb3duIGJ1c2luZXNzIHdlYnNpdGUgZm9yIG1hcmtldGluZyBhbmQgcHVibGljaXR5LjxzcGFuIHN0eWxlPSJiYWNrZ3JvdW5kLWNvbG9yOndoaXRlIj4gTm8gbWF0dGVyIHdoYXQgbWV0aG9kIHlvdSBjaG9vc2UgZm9yJm5ic3A7bWFya2V0aW5nJm5ic3A7eW91ciZuYnNwO2J1c2luZXNzJm5ic3A7b24gdGhlJm5ic3A7d2Vic2l0ZSwgYXMgbG9uZyBhcyB5b3UgYXJlIGFkZGluZyB2YWx1ZSBhbG9uZyB0aGUgd2F5Ljwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCjwvZGl2Pg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluIj48aW1nIHNyYz0iaHR0cHM6Ly93b3Jrc3BhY2UuaW50ZWxob3N0LmNvbS5teS93b3Jrc3BhY2UvZW1haWxtYXJrZXRpbmcvRGVjZW1iZXIlMjAyMDE3L3YzL2YyLmpwZyIgc3R5bGU9IndpZHRoOjEwMCUiIC8+PC9hPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8L2E+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjxkaXY+DQo8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzdHJvbmc+RG9tYWluIFByaXZhY3kgUHJvdGVjdGlvbiA8L3N0cm9uZz48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPkV2ZXJ5IGRheSwgbWlsbGlvbnMgb2Ygd2Vic2l0ZSBvd25lcnMgYXJlIHB1dHRpbmcgdGhlbXNlbHZlcyBhdCByaXNrIGp1c3QgYnkgbm90IGhhdmluZyAmcXVvdDtzaGllbGQmcXVvdDsgdG8gdGhlaXIgcGVyc29uYWwgZGV0YWlscy4gVGhlIHBlcnNvbmFsIGRldGFpbCBzdWNoIGFzIGNvbnRhY3QgaW5mb3JtYXRpb24gaXMgaGFydmVzdGVkIGJ5IHNwYW1tZXJzIGZyb20gcHVibGljbHkgYWNjZXNzaWJsZSBXSE9JUyB0byBzZW5kIHNwYW0uIDwvc3Bhbj48L3NwYW4+PC9wPg0KDQo8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmp1c3RpZnkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+QXQgSW50ZWxob3N0LCB3ZSBwcm90ZWN0IG91ciBjbGllbnRzJnJzcXVvOyBpbmZvcm1hdGlvbiBlc3BlY2lhbGx5IGRvbWFpbiBXSE9JUyBpbmZvcm1hdGlvbiB0byBtYWtlIHN1cmUgb3VyIGNsaWVudHMgYXJlIG5vdCBlYXNpbHkgYWNjZXNzZWQgYnkgdGhlIHB1YmxpYyBpbmNsdWRpbmcgdGhlIHNwYW1tZXJzLiA8c3BhbiBzdHlsZT0iYmFja2dyb3VuZC1jb2xvcjp3aGl0ZSI+RG9tYWluIHByaXZhY3kgb3IgV0hPSVMgcHJvdGVjdGlvbiBoaWRlcyB0aGUgZG9tYWluIHVzZXImcnNxdW87cyBwZXJzb25hbCBpbmZvcm1hdGlvbiBmcm9tIHRoZSBwdWJsaWMgV0hPSVMgZGF0YWJhc2UuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9wPg0KPC9kaXY+DQoNCjxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+Jm5ic3A7PC9wPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1kb21haW49cHJvbWl0aW9uLWRvbWFpbiI+PGltZyBzcmM9Imh0dHBzOi8vd29ya3NwYWNlLmludGVsaG9zdC5jb20ubXkvd29ya3NwYWNlL2VtYWlsbWFya2V0aW5nL0RlY2VtYmVyJTIwMjAxNy92My9mOC5QTkciIC8+PC9hPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8L2E+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+Jm5ic3A7PC9wPg0KDQo8cD48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEwMzk0MjItNi5wbmciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvYT48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPC9hPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHN0cm9uZz48ZW0+UGxlYXNlIGNhbGwgKzYwMTItMjgzIDY3MzEgb3IgdmlzaXQgb3VyIHdlYnNpdGUgLSBodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15IGZvciBtb3JlIGluZm9ybWF0aW9uLjwvZW0+PC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+Jm5ic3A7PC9wPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHN0cm9uZz5Db25uZWN0IHdpdGggdXMgb246PC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNnB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48YSBocmVmPSJodHRwczovL3d3dy5mYWNlYm9vay5jb20vaW50ZWxob3N0Lm15LyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MjktZmIucG5nIiBzdHlsZT0iaGVpZ2h0OjcwcHg7IHdpZHRoOjcwcHgiIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+IDwvYT48YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTM2LXl0LnBuZyIgc3R5bGU9ImhlaWdodDo2OXB4OyB3aWR0aDo2OXB4IiAvPjwvYT48YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPC9hPiA8YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+IDwvYT48YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MDY4OTUzMy1nIC5wbmciIHN0eWxlPSJoZWlnaHQ6NjlweDsgd2lkdGg6NjlweCIgLz48L2E+PGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8L2E+IDxhIGhyZWY9InRlbDorNjAxMi0yODMgNjczMSIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPC9hPjxhIGhyZWY9InRlbDorNjAxMjI4MzY3MzEiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MDY4OTUyMS1hcHAucG5nIiBzdHlsZT0iaGVpZ2h0OjcwcHg7IHdpZHRoOjcwcHgiIC8+PC9hPjxhIGhyZWY9InRlbDorNjAxMi0yODMgNjczMSIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4mbmJzcDsgPC9hPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQo8ZGl2IHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+Jm5ic3A7PC9kaXY+DQoNCjxkaXYgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj4mbmJzcDs8L2Rpdj4NCg0KPGRpdiBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPiZuYnNwOzwvZGl2Pg0KDQo8ZGl2IHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+DQo8aHIgLz48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzbWFsbD4mY29weTtBbGwgcmlnaHRzIHJlc2VydmVkLiAmcmVnO0ludGVsbGlnZW50IEhvc3RpbmcgU2RuLiBCaGQuIDExNTg1ODMtVS4gJnRyYWRlOzxlbT5Zb3VyIFJlbGlhYmxlIEZyaWVuZDwvZW0+PC9zbWFsbD48YSBocmVmPSJodHRwczovL3R3aXR0ZXIuY29tL2ltYWVkdWdyb3VwIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8L2E+PC9zcGFuPjwvc3Bhbj48L2Rpdj4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg==', '01-Jun-2018', '1527878406', 'peiyoke');
INSERT INTO `contents` (`c_id`, `c_title`, `c_content`, `c_date`, `c_time`, `c_user`) VALUES
(15, 'haha', 'PGRpdiBjbGFzcz0iY2tlZGl0b3ItaHRtbDUtdmlkZW8iIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+DQo8dmlkZW8gYXV0b3BsYXk9ImF1dG9wbGF5IiBjb250cm9scz0iY29udHJvbHMiIGhlaWdodD0iYXV0byIgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1Mzc2NTUwOS0xMy5tcDQiIHdpZHRoPSIxMDAlIj4mbmJzcDs8L3ZpZGVvPg0KPC9kaXY+DQoNCjxoMT48c3Ryb25nPldlbGNvbWUgV29yZHMgR29lcyBIZXJlITwvc3Ryb25nPjwvaDE+DQoNCjxwPjxzdHJvbmc+SW50ZWxob3N0IDwvc3Ryb25nPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywgcmVtYWluaW5nIGVzc2VudGlhbGx5IHVuY2hhbmdlZC4gSXQgd2FzIHBvcHVsYXJpc2VkIGluIHRoZSAxOTYwcyB3aXRoIHRoZSByZWxlYXNlIG9mIExldHJhc2V0IHNoZWV0cyBjb250YWluaW5nIExvcmVtIElwc3VtIHBhc3NhZ2VzLCBhbmQgbW9yZSByZWNlbnRseSB3aXRoIGRlc2t0b3AgcHVibGlzaGluZyBzb2Z0d2FyZSBsaWtlIEFsZHVzIFBhZ2VNYWtlciBpbmNsdWRpbmcgdmVyc2lvbnMgb2YgTG9yZW0gSXBzdW0uPC9wPg0KDQo8dGFibGUgYm9yZGVyPSIwIiBjZWxscGFkZGluZz0iMTUiIGNlbGxzcGFjaW5nPSIxIiBzdHlsZT0iYm9yZGVyOm1lZGl1bSBub25lOyBoZWlnaHQ6NDM0cHg7IHdpZHRoOjEwMCUiPg0KCTx0Ym9keT4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlcjsgdmVydGljYWwtYWxpZ246Y2VudGVyOyB3aWR0aDo1MCUiPg0KCQkJPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij5CZXN0IFdvcmQgR29lcyBIZXJlITwvaDE+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij48c3Ryb25nPldIWT88L3N0cm9uZz48L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij5Mb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsPC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+Jm5ic3A7PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+PHN0cm9uZz5XSE8/PC9zdHJvbmc+PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+TG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLC48L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij4mbmJzcDs8L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij4mbmJzcDs8L3A+DQoJCQk8L3RkPg0KCQkJPHRkIHN0eWxlPSJ3aWR0aDo1MCUiPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTI1ODQ0MDgtd2Vic2l0ZS5qcGciIHN0eWxlPSJib3JkZXItc3R5bGU6c29saWQ7IGJvcmRlci13aWR0aDowcHg7IHdpZHRoOjEwMCUiIC8+PC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8aDEgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj5Eb21haW4gTmFtZTwvaDE+DQoNCjx0YWJsZSBib3JkZXI9IjAiIGNlbGxwYWRkaW5nPSIxNSIgY2VsbHNwYWNpbmc9IjEiIHN0eWxlPSJib3JkZXI6bWVkaXVtIG5vbmU7IHdpZHRoOjEwMCUiPg0KCTx0Ym9keT4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ3aWR0aDo1MCUiPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTI1ODQzOTMtZG9tYWluLmpwZyIgc3R5bGU9ImJvcmRlci1zdHlsZTpzb2xpZDsgYm9yZGVyLXdpZHRoOjBweDsgdGV4dC1hbGlnbjpjZW50ZXI7IHdpZHRoOjEwMCUiIC8+PC90ZD4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6NTAlIj4NCgkJCTxoMT5CZXN0IFdvcmQgR29lcyBIZXJlITwvaDE+DQoNCgkJCTxwPjxzdHJvbmc+V0hZPzwvc3Ryb25nPjwvcD4NCg0KCQkJPHA+TG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLDwvcD4NCg0KCQkJPHA+Jm5ic3A7PC9wPg0KDQoJCQk8cD48c3Ryb25nPldITz88L3N0cm9uZz48L3A+DQoNCgkJCTxwPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywuPC9wPg0KCQkJPC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNzczMjg5LWNsaWNrJTIwaGVyZS5qcGciIHN0eWxlPSJib3JkZXItc3R5bGU6c29saWQ7IGJvcmRlci13aWR0aDowcHg7IHdpZHRoOjEwMCUiIC8+PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxoMSBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPk1haW4gVGl0bGUgVGV4dCBHb2VzIEhlcmU8L2gxPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZyxMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsTG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLDwvcD4NCg0KPHRhYmxlIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEiIGNlbGxzcGFjaW5nPSIxIiBzdHlsZT0iYm9yZGVyOm1lZGl1bSBub25lOyB3aWR0aDoxMDAlIj4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6MzAlIj4NCgkJCTxoMSBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPk1vYmlsZSBBcHAgT25lIFRpdGxlPC9oMT4NCg0KCQkJPHA+JiMzOTtMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsTG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2Y8L3A+DQoNCgkJCTxwPiZuYnNwOzwvcD4NCg0KCQkJPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+TW9iaWxlIEFwcCBUd28gdGl0bGU8L2gxPg0KDQoJCQk8cD5Mb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsTG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGU8L3A+DQoJCQk8L3RkPg0KCQkJPHRkPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyMDYzMDUtTW9iaWxlLnBuZyIgc3R5bGU9ImJvcmRlci1zdHlsZTpzb2xpZDsgYm9yZGVyLXdpZHRoOjBweDsgd2lkdGg6MTAwJSIgLz48L3RkPg0KCQkJPHRkIHN0eWxlPSJ3aWR0aDozMCUiPg0KCQkJPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+TW9iaWxlIEFwcCBPbmUgVGl0bGU8L2gxPg0KDQoJCQk8cD4mIzM5O0xvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZyxMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZjwvcD4NCg0KCQkJPHA+Jm5ic3A7PC9wPg0KDQoJCQk8aDEgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj5Nb2JpbGUgQXBwIFR3byB0aXRsZTwvaDE+DQoNCgkJCTxwPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZyxMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZTwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQoNCjxwPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1Mzc0NjA5MTctc3R1ZGlvLWxvZ28ucG5nIiBzdHlsZT0iYm9yZGVyLXN0eWxlOnNvbGlkOyBib3JkZXItd2lkdGg6MHB4OyB3aWR0aDoxMDAlIiAvPjwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8aDEgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj5Db250YWN0IFVzIE5vdzwvaDE+DQoNCjxkaXYgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj4NCjxwPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MjktZmIucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTIxLWFwcC5wbmciIHN0eWxlPSJoZWlnaHQ6MTUwcHg7IHdpZHRoOjE1MHB4IiAvPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MzYteXQucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTMzLWclMjAucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48L3A+DQo8L2Rpdj4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgdGFyZ2V0PSJfYmxhbmsiPkludGVsaWxpZ2VudCBIb3N0aW5nIFB0ZS4gTHRkLjwvYT48L3A+DQo=', '29-Apr-2018', '1524996622', 'hery'),
(16, 'Video', 'PGRpdiBjbGFzcz0iY2tlZGl0b3ItaHRtbDUtdmlkZW8iIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+DQo8dmlkZW8gYXV0b3BsYXk9ImF1dG9wbGF5IiBjb250cm9scz0iY29udHJvbHMiIGhlaWdodD0iYXV0byIgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1Mzc2NTUwOS0xMy5tcDQiIHdpZHRoPSIxMDAlIj4mbmJzcDs8L3ZpZGVvPg0KPC9kaXY+DQoNCjxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246Y2VudGVyIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjIwcHgiPjxzdHJvbmc+QmVzdCBIb3N0aW5nICZhbXA7IFdlYiBkZXNpZ24gaW4gTWFsYXlzaWEhPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB0Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE0cHQiPkludGVsaG9zdCBoYXMgYmVlbiBhIHdlbGwta25vd24gYW5kIHRydXN0ZWQgSG9zdGluZyAmYW1wOyBJVCBEZXZlbG9wbWVudCBpbmR1c3RyeSBzaW5jZSAyMDE1LiBXZSBzcGVjaWFsaXplIGluIHByb3ZpZGluZyBhIHJlbGlhYmxlIGFuZCBxdWFsaXR5IHdlYiBob3N0aW5nIGZvciBvcmdhbml6YXRpb25zIGFuZCBpbmRpdmlkdWFscyB0byBzZXJ2ZSBjb250ZW50IHRvIHRoZSBJbnRlcm5ldC4gV2UgZW1wbG95ZWQgZGVkaWNhdGVkIGFuZCBwcm9mZXNzaW9uYWwgc3RhZmZzIHdobyBhcmUgbG9hZGVkIHdpdGggeWVhcnMgb2YgZXhwZXJpZW5jZS4gTW9yZW92ZXIsIGVhY2ggZGVkaWNhdGVkIGVtcGxveWVlIHJlY2VpdmVzIGEgc2VyaWVzIG9mIGV4dGVuc2l2ZSB0ZWNobmljYWwgYW5kIGN1c3RvbWVyIHNlcnZpY2UgdHJhaW5pbmcgaW4gb3JkZXIgdG8gZW5zdXJlIHRoYXQgdGhlIGN1c3RvbWVycyB3aWxsIGFsd2F5cyByZWNlaXZlIHRoZSBmcmllbmRseSwgYWNjdXJhdGUgYW5kIHByb2Zlc3Npb25hbCBzZXJ2aWNlcy4gV2UgaGVscCBvdXIgY3VzdG9tZXJzIHdvcmxkd2lkZSB0byBncm93IHRoZWlyIG9ubGluZSBhbmQgb2ZmbGluZSBidXNpbmVzc2VzIHRocm91Z2ggZGVsaXZlcnkgb2YgaW5ub3ZhdGl2ZSBpbnRlcm5ldCBwcm9kdWN0cyBvbiBhIHN1cGVyaW9yIHNlcnZpY2UgcGxhdGZvcm0uIDwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MjRweCI+PHN0cm9uZz5XZWIgRGVzaWduPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjx0YWJsZSBib3JkZXI9IjAiIGNlbGxwYWRkaW5nPSIxNSIgY2VsbHNwYWNpbmc9IjEiIHN0eWxlPSJib3JkZXI6bWVkaXVtIG5vbmU7IGhlaWdodDo0MzRweDsgd2lkdGg6MTAwJSI+DQoJPHRib2R5Pg0KCQk8dHI+DQoJCQk8dGQgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyOyB2ZXJ0aWNhbC1hbGlnbjpjZW50ZXI7IHdpZHRoOjUwJSI+DQoJCQk8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjExcHQiPjxzdHJvbmc+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNHB0Ij5TdGFydCBZb3VyIFdlYnNpdGUgJmFtcDsgUmVhY2ggTW9yZSBDdXN0b21lcnM8L3NwYW4+PC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCgkJCTxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IHRleHQtYWxpZ246anVzdGlmeSI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMXB0Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE0cHQiPkVhY2ggb2Ygb3VyIHdlYnNpdGVzIGlzIGJ1aWx0IG9uIHRoZSBwb3B1bGFyIEJvb3RzdHJhcCBmcmFtZXdvcmsgYW5kIFdvcmRwcmVzcywgc28gdGhlIGRlc2lnbiBpcyAmbHNxdW87bW9iaWxlIGZpcnN0JnJzcXVvOyBhbmQgZnVsbHkgcmVzcG9uc2l2ZS4gQmVzaWRlcywgaXQgaXMgYnVpbHQgb24gSFRNTDUgd2hpY2ggd29ya3MgYWNyb3NzIG1vYmlsZSBkZXZpY2VzIGFuZCBpdCBpcyB0aGUgbW9zdCBlZmZlY3RpdmUgd2F5IHRvIGdldCB5b3VyIHByb2R1Y3Qgb2ZmIHRoZSBncm91bmQuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+Jm5ic3A7PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+Jm5ic3A7PC9wPg0KCQkJPC90ZD4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6NTAlIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPXdlYi1kZXNpZ24iPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTI1ODQ0MDgtd2Vic2l0ZS5qcGciIHN0eWxlPSJib3JkZXItc3R5bGU6c29saWQ7IGJvcmRlci13aWR0aDowcHg7IHdpZHRoOjEwMCUiIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToyNHB4Ij48c3Ryb25nPkRvbWFpbiBOYW1lPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48L2gxPg0KDQo8dGFibGUgYm9yZGVyPSIwIiBjZWxscGFkZGluZz0iMTUiIGNlbGxzcGFjaW5nPSIxIiBzdHlsZT0iYm9yZGVyOm1lZGl1bSBub25lOyB3aWR0aDoxMDAlIj4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6NTAlIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWRvbWFpbiI+PGltZyBhbHQ9IiIgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MjU4NDM5My1kb21haW4uanBnIiBzdHlsZT0iYm9yZGVyLXN0eWxlOnNvbGlkOyBib3JkZXItd2lkdGg6MHB4OyB0ZXh0LWFsaWduOmNlbnRlcjsgd2lkdGg6MTAwJSIgLz48L2E+PC90ZD4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6NTAlIj4NCgkJCTxwIHN0eWxlPSJtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY20iPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTFwdCI+PHN0cm9uZz48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE0cHQiPkRvbWFpbiBQcml2YWN5IFByb3RlY3Rpb24gPC9zcGFuPjwvc3Ryb25nPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmp1c3RpZnkiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MThweCI+QXQgSW50ZWxob3N0LCB3ZSBwcm90ZWN0IG91ciBjbGllbnRzJnJzcXVvOyBpbmZvcm1hdGlvbiBlc3BlY2lhbGx5IGRvbWFpbiBXSE9JUyBpbmZvcm1hdGlvbiB0byBtYWtlIHN1cmUgb3VyIGNsaWVudHMgYXJlIG5vdCBlYXNpbHkgYWNjZXNzZWQgYnkgdGhlIHB1YmxpYyBpbmNsdWRpbmcgdGhlIHNwYW1tZXJzLiA8c3BhbiBzdHlsZT0iYmFja2dyb3VuZC1jb2xvcjp3aGl0ZSI+RG9tYWluIHByaXZhY3kgb3IgV0hPSVMgcHJvdGVjdGlvbiBoaWRlcyB0aGUgZG9tYWluIHVzZXImcnNxdW87cyBwZXJzb25hbCBpbmZvcm1hdGlvbiBmcm9tIHRoZSBwdWJsaWMgV0hPSVMgZGF0YWJhc2UuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9wPg0KCQkJPC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyI+PGltZyBhbHQ9IiIgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MDc3MzI4OS1jbGljayUyMGhlcmUuanBnIiBzdHlsZT0iYm9yZGVyLXN0eWxlOnNvbGlkOyBib3JkZXItd2lkdGg6MHB4OyB3aWR0aDoxMDAlIiAvPjwvYT48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbSI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMXB0Ij48c3Ryb25nPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTRwdCI+TW9iaWxlIEFwcCBEZXZlbG9wbWVudDwvc3Bhbj48L3N0cm9uZz48L3NwYW4+PC9zcGFuPjwvcD4NCg0KPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgdGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjExcHQiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTRwdCI+T3VyIGhpZ2hseSBza2lsbGVkIGRldmVsb3BtZW50IHRlYW0gaGFzIHllYXJzIG9mIGV4cGVyaWVuY2UgaW4gZGV2ZWxvcGluZyBoaWdoLWVuZCBjcm9zcy9uYXRpdmUgcGxhdGZvcm0gZmVhdHVyZXMgYXBwLCBncmFwaGljYWwsIGludGVncmF0ZWQgV2ViIHNlcnZpY2UgaW5mb3JtYXRpb24gYW5kIG11Y2ggbW9yZS48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCjx0YWJsZSBib3JkZXI9IjAiIGNlbGxwYWRkaW5nPSIxIiBjZWxsc3BhY2luZz0iMSIgc3R5bGU9ImJvcmRlcjptZWRpdW0gbm9uZTsgd2lkdGg6MTAwJSI+DQoJPHRib2R5Pg0KCQk8dHI+DQoJCQk8dGQgc3R5bGU9IndpZHRoOjMwJSI+DQoJCQk8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE4cHgiPjxzdHJvbmc+R3JhcGhpY2FsICZhbXA7IEFuYWx5dGljIEFwcGxpY2F0aW9uIDwvc3Ryb25nPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyB0ZXh0LWFsaWduOmp1c3RpZnkiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTZweCI+T3VyIGV4cGVydGlzZSBpcyBzcGVjaWFsaXplZCBpbiBkZXZlbG9waW5nIGhpZ2gtZW5kIGFwcGxpY2F0aW9uLCBncmFwaGljYWwsIGludGVncmF0ZWQgV2Vic2VydmljZSBpbmZvcm1hdGlvbiBhbmQgbXVjaCBtb3JlLiBUaGVzZSBhcHBsaWNhdGlvbnMgYXJlIHNlY3VyZWx5IGRldmVsb3BlZCBhbmQgd2VsbCBjb21waWxlZCB0byB1c2UgaW4gY29tbWVyY2lhbCBpbmR1c3RyeS48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbSI+Jm5ic3A7PC9wPg0KCQkJPC90ZD4NCgkJCTx0ZD48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPW1vYmlsZS1hcHAiPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyMDYzMDUtTW9iaWxlLnBuZyIgc3R5bGU9ImJvcmRlci1zdHlsZTpzb2xpZDsgYm9yZGVyLXdpZHRoOjBweDsgd2lkdGg6MTAwJSIgLz48L2E+PC90ZD4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6MzAlIj4NCgkJCTxwPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MThweCI+PHN0cm9uZz5JbmZvcm1hdGlvbiBNYW5hZ2VtZW50IEFwcDwvc3Ryb25nPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPldlIGhhdmUgc2F0aXNmaWVkIHZhcmlvdXMgb2Ygb3VyIGNsaWVudHMgZnJvbSBtb3JlIHRoYW4gMTArIHZlcnRpY2FsIGluZHVzdHJpZXMuIE9uZSBzdG9wIGluZm9ybWF0aW9uIGNlbnRlciBhcHBsaWNhdGlvbiBpcyB0aGUgbW9zdCBuZWVkZWQgYXBwbGljYXRpb24gZm9yIGFueSBpbmR1c3RyaWVzIGFzIG91ciBjbGllbnQgY2FuIHByb3ZpZGUgYW5kIHNwcmVhZCBpbmZvcm1hdGlvbiBlYXNpbHksIHNlY3VyZWQgYW5kIHRob3JvdWdoIHRvIHRoZWlyIGNsaWVudC48L3NwYW4+PC9zcGFuPjwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQoNCjxwPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyNzE0NTMtc3R1ZGlvLWJhci5wbmciIHN0eWxlPSJib3JkZXItc3R5bGU6c29saWQ7IGJvcmRlci13aWR0aDowcHg7IHdpZHRoOjEwMCUiIC8+PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxoMSBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpWZXJkYW5hLEdlbmV2YSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjI0cHgiPjxzdHJvbmc+UGxlYXNlIGNvbnRhY3QgdXMgZm9yIG1vcmUgaW5mb3JtYXRpb24uPC9zdHJvbmc+IDwvc3Bhbj48L3NwYW4+PC9oMT4NCg0KPGRpdiBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPg0KPHA+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL2ludGVsaG9zdC5teS8iPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MjktZmIucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48L2E+PGEgaHJlZj0idGVsOis2MDEyMjgzNjczMSI+PGltZyBhbHQ9IiIgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1MDY4OTUyMS1hcHAucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48L2E+PGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MzYteXQucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48L2E+PGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4Ij48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTMzLWclMjAucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48L2E+PC9wPg0KPC9kaXY+DQoNCjxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PHNtYWxsPiZjb3B5O0FsbCByaWdodHMgcmVzZXJ2ZWQuICZyZWc7SW50ZWxsaWdlbnQgSG9zdGluZyBTZG4uIEJoZC4gMTE1ODU4My1VLiAmdHJhZGU7WW91ciBSZWxpYWJsZSBGcmllbmQhIDwvc21hbGw+PC9wPg0K', '29-Apr-2018', '1525027287', 'peiyoke'),
(65, '61st National Day 2018 (Special Offers)', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJnY29sb3I9IiMwMDAwMDAiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjc4MHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtaGVhZGVyTWVyZGVrYTUucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5ODgwODItc3BlY2lhbE9mZmVyTWVyZGVrYS5wbmciIC8+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImNvbG9yOiNkZGRkZGQiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpMdWNpZGEgU2FucyBVbmljb2RlLEx1Y2lkYSBHcmFuZGUsc2Fucy1zZXJpZiI+PHN0cm9uZz5JbnRlbGhvc3QgaGVscHMgeW91IGRpc2NvdmVyIHBvdGVudGlhbCBtYXJrZXRzIGJ5IGV4cGxvcmluZyB0aGUgYmVuZWZpdHMgdGhhdCB5b3UgaGF2ZSBuZXZlciB0aG91Z2h0ISBJdCBpcyBmdWxsIG9mIGV4Y2l0ZW1lbnQgdGhhdCB5b3UgY2FuJiMzOTt0IGltYWdpbmUhPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MDEwMDQtc2VydmljZV9iZy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iMS5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4NDEwMjktYjQucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTAwODcyLW1vYmlsZV9hcHBfbWVyZGVrYS5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPlRha2UgdGhpcyBvcHBvcnR1bml0eSB0byBpbmNyZWFzZSBicmFuZCBhd2FyZW5lc3MgZm9yIHlvdXIgYnVzaW5lc3MuIEFmdGVyIGNvbnN1bWVycyBiZWNvbWUgYXdhcmUgb2YgeW91ciBicmFuZCwgdGhleSYjMzk7bGwgbGVhcm4gbW9yZSBhYm91dCB5b3VyIHByb2R1Y3RzIG9yIHNlcnZpY2VzLjwvc3Bhbj48L3RkPg0KCQkJPHRkIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPkEgZG9tYWluIG5hbWUgcmVwcmVzZW50cyB3aG8geW91IGFyZSBhbmQgd2hhdCB5b3UgZG8uIEl0IGdpdmVzIHlvdXIgcG90ZW50aWFsIGN1c3RvbWVycyBhbiBpZGVhIG9mIHlvdXIgYnVzaW5lc3MgYW5kIGl0IGNhbiBhZmZlY3QgeW91ciBTRU8gcmFua2luZy48L3NwYW4+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5OyB2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPk9uZSBzdG9wIGluZm9ybWF0aW9uIGNlbnRlciBhcHBsaWNhdGlvbiBpcyB0aGUgbW9zdCBuZWVkZWQgZm9yIGFueSBpbmR1c3RyaWVzIGFzIHlvdSBjYW4gcHJvdmlkZSBhbmQgc3ByZWFkIGluZm9ybWF0aW9uIGVhc2lseSBhbmQgc2VjdXJlbHkuPC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5teS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluLW1hbGF5c2lhIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPW1vYmlsZS1hcHAiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzODk5NTk5LXRhYl9tb2JpbGVfbWVyZGVrYS5wbmciIC8+PGJyIC8+DQoJCQk8c3BhbiBzdHlsZT0iY29sb3I6I2ZmZmZmZiI+SW50ZWxob3N0IGNsb3VkIHN0b3JhZ2UgbGV0cyB1c2VycyBzaGFyZSwgc3RvcmUgYW5kIGNvbGxhYm9yYXRlIG9uIGZpbGVzIHNlY3VyZWx5LiBZb3VyIGRhdGEgbWFuYWdlbWVudCBiZWNvbWVzIGVmZmVjdGl2ZSB3aXRoIGFkbWluIGNvbnNvbGUgYXMgdGhlIGNlbnRyYWwgZGF0YSBjb250cm9sbGVyLiBJbnN0YW50IGFjY2VzcyB0byB5b3VyIGZpbGVzIG9uIHNtYXJ0cGhvbmUsIHRhYmxldCBvciBjb21wdXRlciBlYXNpbHkgd2l0aG91dCBib3VuZGFyaWVzLjwvc3Bhbj48YnIgLz4NCgkJCTxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Y2xvdWQuY29tLyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzODQxMDI5LWI2LnBuZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MDA4NzItd2ViX2Rlc2lnbl9tZXJkZWthLnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgc3R5bGU9InRleHQtYWxpZ246anVzdGlmeTsgdmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj5FLWNvbW1lcmNlIHBsYXRmb3JtIGNvdmVycyBhIHJhbmdlIG9mIGRpZmZlcmVudCB0eXBlcyBvZiBidXNpbmVzc2VzLiBXZSBhbHNvIGRldmVsb3AgYW5kIHNldHVwIG9ubGluZSBidXNpbmVzcyBzaXRlIHdpdGggZnVsbCBmbGV4aWJpbGl0eS48L3NwYW4+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5OyB2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPlRoZXJlIGFyZSBwbGVudHkgb2Ygc2VjdXJpdHkgbWVhc3VyZXMgdG8gcHJvdGVjdCB5b3VyIHdlYnNpdGUgZnJvbSBtYWx3YXJlIGFuZCB2aXJ1c2VzLiBPdXIgcGxhbnMgYXJlIGFmZm9yZGFibGUgZm9yIGV2ZXJ5b25lLjwvc3Bhbj48L3RkPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmp1c3RpZnk7IHZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6I2ZmZmZmZiI+SGF2aW5nIGEgd2Vic2l0ZSBjYW4gb3BlbiB1cCB5b3VyIGJ1c2luZXNzIHRvIGEgd2hvbGUgcmFuZ2Ugb2YgbWFya2V0aW5nIHRvb2xzLiBZb3VyIHdlYnNpdGUgY2FuIHN1cHBvcnQgc29jaWFsIG1lZGlhIGFjdGl2aXR5IGFuZCB5b3UgY2FuIHV0aWxpemUgcHJvZHVjdHMgbGlrZSBTRU8gJmFtcDsgU0VNLjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWVjb21tZXJjZSIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1jaGVhcC13ZWItaG9zdGluZyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1jaGVhcC13ZWItZGVzaWduIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkZvciBtb3JlIGluZm9ybWF0aW9uLCB2aXNpdCB1cyBub3cgYXQgOiZuYnNwOyA8L3NwYW4+PC9zcGFuPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNjItZy5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vcGx1cy5nb29nbGUuY29tLzEwMDc1MDYzOTc3ODQ3ODI2NzAzOCIgdGFyZ2V0PSJibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+SW50ZWxob3N0IE1hbGF5c2lhPC9zcGFuPjwvc3Bhbj48L2E+Jm5ic3A7IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI1OS1mYmIucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3d3dy5mYWNlYm9vay5jb20vaW50ZWxob3N0Lm15LyIgdGFyZ2V0PSJibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+SW50ZWxob3N0IE1hbGF5c2lhPC9zcGFuPjwvc3Bhbj48L2E+Jm5ic3A7IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2NS15Mi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2NoYW5uZWwvVUNxbFZORC1hVUV2R3h6cllhS1pvSTdRIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3Q8L3NwYW4+PC9zcGFuPjwvYT48YnIgLz4NCgkJCTxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzkxODIzMC1maW5kVXMyLnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCTwvdGJvZHk+DQo8L3RhYmxlPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSItd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOjBweDsgYmFja2dyb3VuZC1jb2xvcjojZjZmNmY2OyBjb2xvcjojOTk5OTk5OyBkaXNwbGF5OmlubGluZSAhaW1wb3J0YW50OyBmbG9hdDpub25lOyBmb250LWZhbWlseTomcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OyxIZWx2ZXRpY2EsSGVsdmV0aWNhLEFyaWFsLHNhbnMtc2VyaWY7IGZvbnQtc2l6ZToxMnB4OyBmb250LXN0eWxlOm5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6bm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOm5vcm1hbDsgZm9udC13ZWlnaHQ6NDAwOyBsZXR0ZXItc3BhY2luZzpub3JtYWw7IG9ycGhhbnM6MjsgdGV4dC1hbGlnbjpjZW50ZXI7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjppbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6aW5pdGlhbDsgdGV4dC1pbmRlbnQ6MHB4OyB0ZXh0LXRyYW5zZm9ybTpub25lOyB3aGl0ZS1zcGFjZTpub3JtYWw7IHdpZG93czoyOyB3b3JkLXNwYWNpbmc6MHB4Ij5ieTxzcGFuPiZuYnNwOzwvc3Bhbj48L3NwYW4+PGEgZGF0YS1zYWZlcmVkaXJlY3R1cmw9Imh0dHBzOi8vd3d3Lmdvb2dsZS5jb20vdXJsP3E9aHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8mYW1wO3NvdXJjZT1nbWFpbCZhbXA7dXN0PTE1MzMzNDU5MDA2NDAwMDAmYW1wO3VzZz1BRlFqQ05GcXV2cWlrSFVETUp6THJ6STdKZXducGpzUEtnIiBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgc3R5bGU9Im1hcmdpbjogMHB4OyBwYWRkaW5nOiAwcHg7IGZvbnQtZmFtaWx5OiAmcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OywgSGVsdmV0aWNhLCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmOyBib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXNpemU6IDEycHg7IGNvbG9yOiByZ2IoMTUzLCAxNTMsIDE1Myk7IHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lOyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogY2VudGVyOyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjQ2LCAyNDYsIDI0Nik7IiB0YXJnZXQ9Il9ibGFuayI+SW50ZWxsaWdlbnQgSG9zdGluZyBTZG4uIEJoZC48L2E+PC9wPg0K', '16-Aug-2018', '1534433259', 'peiyoke'),
(74, 'html email marketing template5 with Chinese', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjcwMHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTQxOTMzMjMwLWhlYWRlci5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ3aWR0aDoyNTBweCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTQxODc1NzYwLXdlYmhvc3RpbmcucG5nIiBzdHlsZT0iaGVpZ2h0OjE0M3B4OyB3aWR0aDoxNjVweCIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPg0KCQkJPHA+PHNwYW4gc3R5bGU9ImNvbG9yOm51bGwiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTo4cHQ7IG1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgbWFyZ2luLXRvcDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTFwdCI+PHNwYW4gc3R5bGU9ImxpbmUtaGVpZ2h0OjEwNyUiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtDYWxpYnJpJnF1b3Q7LHNhbnMtc2VyaWYiPjxzcGFuIGxhbmc9IlpILUNOIiBzdHlsZT0iZm9udC1zaXplOjEyLjBwdCI+PHNwYW4gc3R5bGU9ImxpbmUtaGVpZ2h0OjEwNyUiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTrmlofpvI7kuK3mpbfnroAiPuaIkeS7rOeahOaXoOmZkOWItue9kee7nOaJmOeuoeacjeWKoeaPkOS+m+WFqOmdouaAp+S4k+S4muaKgOacr+aUr+aPtOWKoeaxgua7oei2s+WuouaIt+eahOS4muWKoemcgOaxguOAgjwvc3Bhbj48L3NwYW4+PC9zcGFuPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMi4wcHQiPjxzcGFuIHN0eWxlPSJsaW5lLWhlaWdodDoxMDclIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj5XZSBzdXBwbGllcyB1bmxpbWl0ZWQgd2ViIGhvc3Rpbmcgd2l0aCBmdWxseSBleHBlcnRpc2Ugc3VwcG9ydCB0byBoZWxwIGNsaWVudHMgbWVldCB0aGVpciBuZWVkcyBmb3IgYnVzaW5lc3MuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cD48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSJjb2xvcjpudWxsIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1ob3N0aW5nIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvc3Bhbj48L3A+DQoJCQk8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+DQoJCQk8cD48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTowY207IG1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgbWFyZ2luLXRvcDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJwdCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RpbWVzIE5ldyBSb21hbiZxdW90OyxzZXJpZiI+PHNwYW4gbGFuZz0iWkgtQ04iIHN0eWxlPSJmb250LWZhbWlseTrmlofpvI7kuK3mpbfnroAiPuaLpeacieS4gOS4queugOWNleW5tuWFt+acieWQuOW8leWKm+eahOe9keermeWwhuacieWKqeS6juS4uuaCqOeahOS8geS4muW7uueri+WVhuiqieOAguaIkeS7rOaJgOaPkOS+m+eahOe9kemhteiuvuiuoeiDvea7oei2s+aCqOeahOmcgOaxguOAgjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1ib3R0b206MGNtOyBtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IG1hcmdpbi10b3A6MGNtIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHQiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUaW1lcyBOZXcgUm9tYW4mcXVvdDssc2VyaWYiPkEgc2ltcGxlIGJ1dCBlbmdhZ2luZyBhbmQgYXV0aGVudGljIHdlYnNpdGUgd2lsbCBoZWxwIGJ1aWxkIGNyZWRpYmlsaXR5IGZvciB5b3VyIGJ1c2luZXNzLiBXZSBtYWtlIHN1cmUgZXZlcnkgcHJvdmlkZWQgd2ViIGRlc2lnbiBtZWV0cyBvdXIgY2xpZW50cyYjMzk7IG5lZWRzLjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cD48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1kZXNpZ24iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC9wPg0KCQkJPC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU0MTg3NTc2NS13ZWJkZXNpZ24ucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU0MTg3NTc2OS1tb2JpbGVhcHAucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+DQoJCQk8cD48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTo4cHQ7IG1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgbWFyZ2luLXRvcDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTFwdCI+PHNwYW4gc3R5bGU9ImxpbmUtaGVpZ2h0OjEwNyUiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtDYWxpYnJpJnF1b3Q7LHNhbnMtc2VyaWYiPjxzcGFuIGxhbmc9IlpILUNOIiBzdHlsZT0iZm9udC1zaXplOjEyLjBwdCI+PHNwYW4gc3R5bGU9ImxpbmUtaGVpZ2h0OjEwNyUiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTrmlofpvI7kuK3mpbfnroAiPuS4gOermeW8j+eahOW6lOeUqOeoi+W6j+WcqOWQhOS4quS4jeWQjOeahOmihuWfn+mHjOaJrua8lOWFtuWFs+mUrueahOinkuiJsu+8jOWug+iuqeaCqOWPr+S7pei9u+advuWcsOWQkeWuouaIt+S7i+e7jeW5tuaPkOS+m+WFqOmdouaAp+eahOi1hOiur+S/g+i/m+S4muWKoeWinumVv+eahOmAn+W6puOAgjwvc3Bhbj48L3NwYW4+PC9zcGFuPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMi4wcHQiPjxzcGFuIHN0eWxlPSJsaW5lLWhlaWdodDoxMDclIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj5PbmUgc3RvcCBpbmZvcm1hdGlvbiBjZW50ZXIgYXBwbGljYXRpb24gaXMgdGhlIG1vc3QgbmVlZGVkIGZvciBhbnkgaW5kdXN0cmllcyBhcyB5b3UgY2FuIHByb3ZpZGUgYW5kIHNwcmVhZCBpbmZvcm1hdGlvbiBlYXNpbHkgYW5kIHNlY3VyZWx5Ljwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHA+PGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPW1vYmlsZS1hcHAiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC9wPg0KCQkJPC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NDE5MzMyMzYtaW50ZWxob3N0MS5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPg0KCQkJPHA+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzE4NTQ1LWludGVsaG9zdExpbmVCYXIucG5nIiAvPjwvcD4NCg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1ib3R0b206OHB0OyBtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IG1hcmdpbi10b3A6MGNtIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjExcHQiPjxzcGFuIHN0eWxlPSJsaW5lLWhlaWdodDoxMDclIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7Q2FsaWJyaSZxdW90OyxzYW5zLXNlcmlmIj48ZW0+PHNwYW4gbGFuZz0iWkgtQ04iIHN0eWxlPSJmb250LXNpemU6MTIuMHB0Ij48c3BhbiBzdHlsZT0ibGluZS1oZWlnaHQ6MTA3JSI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OuaWh+m8juS4realt+eugCI+PHNwYW4gc3R5bGU9ImZvbnQtc3R5bGU6bm9ybWFsIj7miJHku6znlLXlrZDllYbliqHlubPlj7DmtrXnm5bkuobkuIDns7vliJfkuI3lkIznsbvlnovnmoTkuJrliqHjgILmiJHku6zkvJrkvp3mgqjnmoTopoHmsYLvvIzmiZPpgKDlsZ7kuo7mgqjnmoToh6rmiJHpo47moLznmoTnvZHnu5zllYblupc8L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9lbT48ZW0+PHNwYW4gbGFuZz0iWkgtQ04iIHN0eWxlPSJmb250LWZhbWlseTrmlofpvI7kuK3mpbfnroAiPjxzcGFuIHN0eWxlPSJmb250LXN0eWxlOm5vcm1hbCI+44CCPC9zcGFuPjwvc3Bhbj48L2VtPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMi4wcHQiPjxzcGFuIHN0eWxlPSJsaW5lLWhlaWdodDoxMDclIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj5FLWNvbW1lcmNlIHBsYXRmb3JtIGNvdmVycyBhIHJhbmdlIG9mIGRpZmZlcmVudCB0eXBlcyBvZiBidXNpbmVzc2VzLiBXZSB3aWxsIGhlbHAgeW91IHNldCB1cCB5b3VyIG9ubGluZSBzaG9wIGp1c3QgdGhlIHdheSB5b3UgbGlrZS48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3A+DQoNCgkJCTxwPjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1lY29tbWVyY2UiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC9wPg0KCQkJPC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU0MTg3NTc3OC1lY29tbWVyY2UucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU0MTg3NTc5MC1idXNpbmVzc2RpcmVjdG9yeS5wbmciIHN0eWxlPSJoZWlnaHQ6MTQzcHg7IHdpZHRoOjE2NXB4IiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+DQoJCQk8cD48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTowY207IG1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgbWFyZ2luLXRvcDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJwdCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RpbWVzIE5ldyBSb21hbiZxdW90OyxzZXJpZiI+PGVtPjxzcGFuIGxhbmc9IlpILUNOIiBzdHlsZT0iZm9udC1mYW1pbHk65paH6byO5Lit5qW3566AIj48c3BhbiBzdHlsZT0iZm9udC1zdHlsZTpub3JtYWwiPuWVhuS4muebruW9leiDveiuqeaCqOeahOWFrOWPuOW9ouixoemAj+i/h+aIkeS7rOeahOW5s+WPsO+8jOiuqeabtOWkmua9nOWcqOWuouaIt+WcqOatpOWVhuS4muebruW9leiOt+WPluaCqOWFrOWPuOeahOi1hOaWmeS4juebuOWFs+S6p+WTgeaIluacjeWKoeaAp+i0qOOAgjwvc3Bhbj48L3NwYW4+PC9lbT48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHAgc3R5bGU9Im1hcmdpbi1ib3R0b206MGNtOyBtYXJnaW4tbGVmdDowY207IG1hcmdpbi1yaWdodDowY207IG1hcmdpbi10b3A6MGNtIj48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHQiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtUaW1lcyBOZXcgUm9tYW4mcXVvdDssc2VyaWYiPkJ1c2luZXNzIERpcmVjdG9yeSBlbnN1cmVzIHRoYXQgeW91ciBicmFuZCBpbWFnZSBiZWNvbWVzIGV4Y2x1c2l2ZSBhbmQgc3Ryb25nIHRocm91Z2ggb3VyIGxlZ2l0aW1hdGUgcGxhdGZvcm0uIEl0IGFsbG93cyBwb3RlbnRpYWwgY3VzdG9tZXJzIHRvIHNlZSB5b3VyIGJ1c2luZXNzIGFuZCBpbmZvcm1hdGlvbi4gPC9zcGFuPjwvc3Bhbj48L3A+DQoNCgkJCTxwPjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Lm15LyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3A+DQoJCQk8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+DQoJCQk8cD48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTo4cHQ7IG1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgbWFyZ2luLXRvcDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTFwdCI+PHNwYW4gc3R5bGU9ImxpbmUtaGVpZ2h0OjEwNyUiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTomcXVvdDtDYWxpYnJpJnF1b3Q7LHNhbnMtc2VyaWYiPjxzcGFuIGxhbmc9IlpILUNOIiBzdHlsZT0iZm9udC1zaXplOjEyLjBwdCI+PHNwYW4gc3R5bGU9ImxpbmUtaGVpZ2h0OjEwNyUiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTrmlofpvI7kuK3mpbfnroAiPuS6keerr+WCqOWtmOiuqeaCqOeahOS4muWKoeWPr+S7peWuieWFqOWcsOS4juS7luS6uuWQjOaXtuivu+WPluaho+ahiOWPiuS6kuaNouaWh+S7tui1hOaWmeOAguaIkeS7rOS9v+eUqOWuieWFqOaAp+W5tuS4peWvhueahOmYsuaKpOe9keWKn+iDveS/neaKpOaCqOS4muWKoeeahOaVsOaNruS4juaho+ahiOOAgjwvc3Bhbj48L3NwYW4+PC9zcGFuPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMi4wcHQiPjxzcGFuIHN0eWxlPSJsaW5lLWhlaWdodDoxMDclIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj5JbnRlbGhvc3QgY2xvdWQgc3RvcmFnZSBnaXZlcyB5b3VyIGJ1c2luZXNzIHRvIHNoYXJlIGFuZCBjb2xsYWJvcmF0ZSBvbiBmaWxlIHNlY3VyZWx5LiBXZSBwcm90ZWN0IHlvdXIgYnVzaW5lc3MgZGF0YSB3aXRoIGhpZ2ggc2VjdXJpdHkgZmVhdHVyZXMuPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cD48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdGNsb3VkLmNvbS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC9wPg0KCQkJPC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU0MTg3NTc4Ni1jbG91ZC5wbmciIHN0eWxlPSJoZWlnaHQ6MTQzcHg7IHdpZHRoOjE2NXB4IiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU0MTg3NTc4Mi1kb21haW5uYW1lLnBuZyIgc3R5bGU9ImhlaWdodDoxNDNweDsgd2lkdGg6MTY1cHgiIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj4NCgkJCTxwPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48L3A+DQoNCgkJCTxwIHN0eWxlPSJtYXJnaW4tYm90dG9tOjBjbTsgbWFyZ2luLWxlZnQ6MGNtOyBtYXJnaW4tcmlnaHQ6MGNtOyBtYXJnaW4tdG9wOjBjbSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB0Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6JnF1b3Q7VGltZXMgTmV3IFJvbWFuJnF1b3Q7LHNlcmlmIj48c3BhbiBsYW5nPSJaSC1DTiIgc3R5bGU9ImZvbnQtZmFtaWx5OuaWh+m8juS4realt+eugCI+5Li65oKo55qE5Lia5Yqh6YCJ5oup5ZCI6YCC55qE5Z+f5ZCN5bCG5a+55oKo55qE572R56uZ5ZKM5Lia5Yqh55qE5ouT5bGV5Lqn55Sf5YWz6ZSu5oCn55qE5b2x5ZON44CCPC9zcGFuPjwvc3Bhbj48L3NwYW4+PC9wPg0KDQoJCQk8cCBzdHlsZT0ibWFyZ2luLWJvdHRvbTowY207IG1hcmdpbi1sZWZ0OjBjbTsgbWFyZ2luLXJpZ2h0OjBjbTsgbWFyZ2luLXRvcDowY20iPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJwdCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OiZxdW90O1RpbWVzIE5ldyBSb21hbiZxdW90OyxzZXJpZiI+Q2hvb3NpbmcgYSByaWdodCBkb21haW4gbmFtZSBmb3IgeW91ciBidXNpbmVzcyBjb3VsZCBoYXZlIGEgaHVnZSBpbXBhY3Qgb24geW91ciB3ZWJzaXRlIGFuZCBidXNpbmVzcy48L3NwYW4+PC9zcGFuPjwvcD4NCg0KCQkJPHA+PGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWRvbWFpbi1tYWxheXNpYSIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3A+DQoJCQk8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+DQoJCQk8cD48c3Ryb25nPjxlbT48c3BhbiBzdHlsZT0iZm9udC1zaXplOjE2cHgiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUYWhvbWEsR2VuZXZhLHNhbnMtc2VyaWYiPuassuefpeabtOWkmuivpuaDhe+8jOasoui/juaCqOmaj+aXtuS4juaIkeS7rOiBlOezu+OAgjwvc3Bhbj48L3NwYW4+PC9lbT48L3N0cm9uZz48L3A+DQoNCgkJCTxwPjxzdHJvbmc+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+Rm9yIG1vcmUgaW5mb3JtYXRpb24sIHBsZWFzZSBkbyBub3QgaGVzaXRhdGUgdG8gY29udGFjdCB1cy48L3NwYW4+PC9zcGFuPjwvc3Bhbj48L3N0cm9uZz48L3A+DQoNCgkJCTxwPjxzdHJvbmc+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNHB4Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+Rm9sbG93IHVzOiZuYnNwOyA8L3NwYW4+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2Mi1nLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+SW50ZWxob3N0IE1hbGF5c2lhPC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjU5LWZiYi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+SW50ZWxob3N0IE1hbGF5c2lhPC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjY1LXkyLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij5JbnRlbGhvc3Q8L3NwYW4+PC9hPjwvc3Bhbj48L3NwYW4+PC9zdHJvbmc+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5ODQwNTQtZm9vdGVyTmV3LnBuZyIgLz48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSItd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOjBweDsgYmFja2dyb3VuZC1jb2xvcjojZjZmNmY2OyBjb2xvcjojOTk5OTk5OyBkaXNwbGF5OmlubGluZSAhaW1wb3J0YW50OyBmbG9hdDpub25lOyBmb250LWZhbWlseTomcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OyxIZWx2ZXRpY2EsSGVsdmV0aWNhLEFyaWFsLHNhbnMtc2VyaWY7IGZvbnQtc2l6ZToxMnB4OyBmb250LXN0eWxlOm5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6bm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOm5vcm1hbDsgZm9udC13ZWlnaHQ6NDAwOyBsZXR0ZXItc3BhY2luZzpub3JtYWw7IG9ycGhhbnM6MjsgdGV4dC1hbGlnbjpjZW50ZXI7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjppbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6aW5pdGlhbDsgdGV4dC1pbmRlbnQ6MHB4OyB0ZXh0LXRyYW5zZm9ybTpub25lOyB3aGl0ZS1zcGFjZTpub3JtYWw7IHdpZG93czoyOyB3b3JkLXNwYWNpbmc6MHB4Ij5ieTxzcGFuPiZuYnNwOzwvc3Bhbj48L3NwYW4+PGEgZGF0YS1zYWZlcmVkaXJlY3R1cmw9Imh0dHBzOi8vd3d3Lmdvb2dsZS5jb20vdXJsP3E9aHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8mYW1wO3NvdXJjZT1nbWFpbCZhbXA7dXN0PTE1MzMzNDU5MDA2NDAwMDAmYW1wO3VzZz1BRlFqQ05GcXV2cWlrSFVETUp6THJ6STdKZXducGpzUEtnIiBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgc3R5bGU9Im1hcmdpbjogMHB4OyBwYWRkaW5nOiAwcHg7IGZvbnQtZmFtaWx5OiAmcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OywgSGVsdmV0aWNhLCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmOyBib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXNpemU6IDEycHg7IGNvbG9yOiByZ2IoMTUzLCAxNTMsIDE1Myk7IHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lOyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogY2VudGVyOyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjQ2LCAyNDYsIDI0Nik7IiB0YXJnZXQ9Il9ibGFuayI+SW50ZWxsaWdlbnQgSG9zdGluZyBTZG4uIEJoZC48L2E+PC9wPg0KCQkJPC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg==', '25-Feb-2019', '1551105602', 'peiyoke');
INSERT INTO `contents` (`c_id`, `c_title`, `c_content`, `c_date`, `c_time`, `c_user`) VALUES
(73, 'PageUnderConstruction', 'PHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjAiIGNlbGxzcGFjaW5nPSIwIiBzdHlsZT0iaGVpZ2h0OjYxMnB4OyBtYXJnaW46YXV0bzsgd2lkdGg6MTAwOHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZD48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTUwOTAtdW5kZXJDb25zdHJ1Y3Rpb24ucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpMdWNpZGEgU2FucyBVbmljb2RlLEx1Y2lkYSBHcmFuZGUsc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNHB4Ij5Tb3JyeSwgd2Vic2l0ZSBpcyB1bmRlciBjb25zdHJ1Y3Rpb24uIFBsZWFzZSB2aXNpdCB1cyBsYXRlci48L3NwYW4+PC9zcGFuPjxiciAvPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTIxODc0LUJhci5wbmciIC8+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MjEzOTQtY29udGFjdENvbnN0cnVjdGlvbi5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+Rm9yIG1vcmUgaW5mbyA6LTwvc3Bhbj48L3NwYW4+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzkyMzU2MS1pbnRlbGhvc3RMb2dvLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBXZWJzaXRlPC9zcGFuPjwvc3Bhbj48L2E+Jm5ic3A7IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2Mi1nLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjU5LWZiYi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjY1LXkyLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdDwvc3Bhbj48L3NwYW4+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQoNCjxwPiZuYnNwOzwvcD4NCg==', '10-Aug-2018', '1533923891', 'nana'),
(68, 'html email marketing template4', 'PGJvZHkgc3R5bGU9ImJhY2tncm91bmQtY29sb3I6I2Q1ZDhkYzsiPg0KPHRhYmxlIGFsaWduPSJjZW50ZXIiIGJnY29sb3I9IiNmZmZmZmYiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjc4MHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtaGVhZGVyTWVyZGVrYTUucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtcHJpY2VPZmZlcmVkMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImNvbG9yOiMwMDAwMDAiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpMdWNpZGEgU2FucyBVbmljb2RlLEx1Y2lkYSBHcmFuZGUsc2Fucy1zZXJpZiI+PHN0cm9uZz5JbnRlbGhvc3QgaGVscHMgeW91IGRpc2NvdmVyIHBvdGVudGlhbCBtYXJrZXRzIGJ5IGV4cGxvcmluZyB0aGUgYmVuZWZpdHMgdGhhdCB5b3UgaGF2ZSBuZXZlciB0aG91Z2h0ISBJdCBpcyBmdWxsIG9mIGV4Y2l0ZW1lbnQgdGhhdCB5b3UgY2FuJiMzOTt0IGltYWdpbmUhPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MDEwMDQtc2VydmljZV9iZy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iMS5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4NDEwMjktYjQucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzODQxMDI5LWI1LnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6IzAwMDAwMCI+VGFrZSB0aGlzIG9wcG9ydHVuaXR5IHRvIGluY3JlYXNlIGJyYW5kIGF3YXJlbmVzcyBmb3IgeW91ciBidXNpbmVzcy4gQWZ0ZXIgY29uc3VtZXJzIGJlY29tZSBhd2FyZSBvZiB5b3VyIGJyYW5kLCB0aGV5JiMzOTtsbCBsZWFybiBtb3JlIGFib3V0IHlvdXIgcHJvZHVjdHMgb3Igc2VydmljZXMuPC9zcGFuPjwvdGQ+DQoJCQk8dGQgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6IzAwMDAwMCI+QSBkb21haW4gbmFtZSByZXByZXNlbnRzIHdobyB5b3UgYXJlIGFuZCB3aGF0IHlvdSBkby4gSXQgZ2l2ZXMgeW91ciBwb3RlbnRpYWwgY3VzdG9tZXJzIGFuIGlkZWEgb2YgeW91ciBidXNpbmVzcyBhbmQgaXQgY2FuIGFmZmVjdCB5b3VyIFNFTyByYW5raW5nLjwvc3Bhbj48L3RkPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmp1c3RpZnk7IHZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6bnVsbCI+T25lIHN0b3AgaW5mb3JtYXRpb24gY2VudGVyIGFwcGxpY2F0aW9uIGlzIHRoZSBtb3N0IG5lZWRlZCBmb3IgYW55IGluZHVzdHJpZXMgYXMgeW91IGNhbiBwcm92aWRlIGFuZCBzcHJlYWQgaW5mb3JtYXRpb24gZWFzaWx5IGFuZCBzZWN1cmVseS48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Lm15LyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1kb21haW4tbWFsYXlzaWEiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209bW9iaWxlLWFwcCIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4OTk1OTktdGFiX21vYmlsZV9tZXJkZWthLnBuZyIgLz48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSJjb2xvcjpudWxsIj5JbnRlbGhvc3QgY2xvdWQgc3RvcmFnZSBsZXRzIHVzZXJzIHNoYXJlLCBzdG9yZSBhbmQgY29sbGFib3JhdGUgb24gZmlsZXMgc2VjdXJlbHkuIFlvdXIgZGF0YSBtYW5hZ2VtZW50IGJlY29tZXMgZWZmZWN0aXZlIHdpdGggYWRtaW4gY29uc29sZSBhcyB0aGUgY2VudHJhbCBkYXRhIGNvbnRyb2xsZXIuIEluc3RhbnQgYWNjZXNzIHRvIHlvdXIgZmlsZXMgb24gc21hcnRwaG9uZXMsIHRhYmxldCBvciBjb21wdXRlciBlYXNpbHkgd2l0aG91dCBib3VuZGFyaWVzLjwvc3Bhbj48YnIgLz4NCgkJCTxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Y2xvdWQuY29tLyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzODQxMDI5LWI2LnBuZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4NDEwMjktYjcucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5OyB2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOm51bGwiPkUtY29tbWVyY2UgcGxhdGZvcm0gY292ZXJzIGEgcmFuZ2Ugb2YgZGlmZmVyZW50IHR5cGVzIG9mIGJ1c2luZXNzZXMuIFdlIGFsc28gZGV2ZWxvcCBhbmQgc2V0dXAgb25saW5lIGJ1c2luZXNzIHNpdGUgd2l0aCBmdWxsIGZsZXhpYmlsaXR5Ljwvc3Bhbj48L3RkPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmp1c3RpZnk7IHZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6bnVsbCI+VGhlcmUgYXJlIHBsZW50eSBvZiBzZWN1cml0eSBtZWFzdXJlcyB0byBwcm90ZWN0IHlvdXIgd2Vic2l0ZSBmcm9tIG1hbHdhcmUgYW5kIHZpcnVzZXMuIE91ciBwbGFucyBhcmUgYWZmb3JkYWJsZSBmb3IgZXZlcnlvbmUuPC9zcGFuPjwvdGQ+DQoJCQk8dGQgc3R5bGU9InRleHQtYWxpZ246anVzdGlmeTsgdmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJjb2xvcjpudWxsIj5IYXZpbmcgYSB3ZWJzaXRlIGNhbiBvcGVuIHVwIHlvdXIgYnVzaW5lc3MgdG8gYSB3aG9sZSByYW5nZSBvZiBtYXJrZXRpbmcgdG9vbHMuIFlvdXIgd2Vic2l0ZSBjYW4gc3VwcG9ydCBzb2NpYWwgbWVkaWEgYWN0aXZpdHkgYW5kIHlvdSBjYW4gdXRpbGl6ZSBwcm9kdWN0cyBsaWtlIFNFTyAmYW1wOyBTRU0uPC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZWNvbW1lcmNlIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1ob3N0aW5nIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1kZXNpZ24iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+Rm9yIG1vcmUgaW5mb3JtYXRpb24sIHZpc2l0IHVzIG5vdyBhdCA6Jm5ic3A7IDwvc3Bhbj48L3NwYW4+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2Mi1nLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjU5LWZiYi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjY1LXkyLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdDwvc3Bhbj48L3NwYW4+PC9hPjxiciAvPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTE4MjMwLWZpbmRVczIucG5nIiAvPiA8c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9Ii13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6MHB4OyBkaXNwbGF5OmlubGluZSAhaW1wb3J0YW50OyBmbG9hdDpub25lOyBmb250LWZhbWlseTomcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OyxIZWx2ZXRpY2EsSGVsdmV0aWNhLEFyaWFsLHNhbnMtc2VyaWY7IGZvbnQtc2l6ZToxMnB4OyBmb250LXN0eWxlOm5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6bm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOm5vcm1hbDsgZm9udC13ZWlnaHQ6NDAwOyBsZXR0ZXItc3BhY2luZzpub3JtYWw7IHRleHQtYWxpZ246Y2VudGVyOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6aW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOmluaXRpYWw7IHRleHQtaW5kZW50OjBweDsgdGV4dC10cmFuc2Zvcm06bm9uZTsgd2hpdGUtc3BhY2U6bm9ybWFsOyB3b3JkLXNwYWNpbmc6MHB4Ij48c3BhbiBzdHlsZT0iYmFja2dyb3VuZC1jb2xvcjojZmZmZmZmIj5ieSZuYnNwOzwvc3Bhbj48L3NwYW4+PC9zcGFuPjxhIGRhdGEtc2FmZXJlZGlyZWN0dXJsPSJodHRwczovL3d3dy5nb29nbGUuY29tL3VybD9xPWh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvJmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTMzMzQ1OTAwNjQwMDAwJmFtcDt1c2c9QUZRakNORnF1dnFpa0hVRE1Kekxyekk3SmV3bnBqc1BLZyIgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyBmb250LWZhbWlseTogJnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssIEhlbHZldGljYSwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogcmdiKDE1MywgMTUzLCAxNTMpOyB0ZXh0LWRlY29yYXRpb246IHVuZGVybGluZTsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IGNlbnRlcjsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0NiwgMjQ2LCAyNDYpOyIgdGFyZ2V0PSJfYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iYmFja2dyb3VuZC1jb2xvcjojZmZmZmZmIj5JbnRlbGxpZ2VudCBIb3N0aW5nIFNkbi4gQmhkLjwvc3Bhbj48L3NwYW4+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQo8L2JvZHk+', '10-Aug-2018', '1533918564', 'nana'),
(59, 'html email marketing template1', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjcwMHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzNzk0ODAtVGVtcDMucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+SW50ZWxob3N0IGhlbHBzIHlvdSBkaXNjb3ZlciBwb3RlbnRpYWwgbWFya2V0cyBieSBleHBsb3JpbmcgdGhlIGJlbmVmaXRzIHRoYXQgeW91IGhhdmUgbmV2ZXIgdGhvdWdodCEgSXQgaXMgZnVsbCBvZiBleGNpdGVtZW50IHRoYXQgeW91IGNhbiYjMzk7dCBpbWFnaW5lISA8L3NwYW4+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj4NCgkJCTxociBzdHlsZT0iY29sb3I6I2ZmZmZmZjsiIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5Hcm93aW5nIHlvdXIgYnVzaW5lc3MgcmFwaWRseSBhbmQgcHJvbW90aW5nIHlvdXIgY29udGVudC4gSW50ZWxob3N0IG1ha2VzIGl0IGVhc2llciBmb3IgeW91IHRvIGRlcGxveSBhIG5ldyByZWxpYWJsZSBhcHByb2FjaCB0aGF0IGNhbiBkZWxpdmVyIGdyZWF0IHBlcmZvcm1hbmNlLiBTaW1wbGlmeSB5b3VyIGxpZmUgd2l0aCBpbnRlbnNpZnlpbmcgZmxleGliaWxpdHkgb24geW91ciBzbWFydCBjaG9pY2UhPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzc5OTY3LXNlcnZpY2VzLnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMjk5ODE2LUJ1c2luZXNzRGlyZWN0b3J5My5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTk4MzAtV2ViSG9zdGluZzMucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzc5NDg1LVNxdWFyZTQucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0ianVzdGlmeSIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+VGFrZSB0aGlzIG9wcG9ydHVuaXR5IHRvIGluY3JlYXNlIGJyYW5kIGF3YXJlbmVzcyBmb3IgeW91ciBidXNpbmVzcy4gQWZ0ZXIgY29uc3VtZXJzIGJlY29tZSBhd2FyZSBvZiB5b3VyIGJyYW5kLCB0aGV5JiMzOTtsbCBsZWFybiBtb3JlIGFib3V0IHlvdXIgcHJvZHVjdHMgb3Igc2VydmljZXMuPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5IiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj5UaGVyZSBhcmUgcGxlbnR5IG9mIHNlY3VyaXR5IG1lYXN1cmVzIHRvIHByb3RlY3QgeW91ciB3ZWJzaXRlIGZyb20gbWFsd2FyZSBhbmQgdmlydXNlcy4gT3VyIHBsYW5zIGFyZSBhZmZvcmRhYmxlIGZvciBldmVyeW9uZS48L3NwYW4+PC9zcGFuPjwvdGQ+DQoJCQk8dGQgYWxpZ249Imp1c3RpZnkiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImNvbG9yOiM0ZTVmNzAiPkEgZG9tYWluIG5hbWUgcmVwcmVzZW50cyB3aG8geW91IGFyZSBhbmQgd2hhdCB5b3UgZG8uIEl0IGdpdmVzIHlvdXIgcG90ZW50aWFsIGN1c3RvbWVycyBhbiBpZGVhIG9mIHlvdXIgYnVzaW5lc3MgYW5kIGl0IGNhbiBhZmZlY3QgeW91ciBTRU8gcmFua2luZy4gPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Lm15LyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMyODU5NDU4LUE1LnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1ob3N0aW5nIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzI4NTk0NTgtQTUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluLW1hbGF5c2lhIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzI4NTk0NTgtQTUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMjk3MjM2LUJhbm5lckNsb3VkLnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImNvbG9yOiM0ZTVmNzAiPkludGVsaG9zdCBjbG91ZCBzdG9yYWdlIGxldHMgdXNlcnMgc2hhcmUsIHN0b3JlIGFuZCBjb2xsYWJvcmF0ZSBvbiBmaWxlcyBzZWN1cmVseS4gWW91ciBkYXRhIG1hbmFnZW1lbnQgYmVjb21lcyBlZmZlY3RpdmUgd2l0aCBhZG1pbiBjb25zb2xlIGFzIHRoZSBjZW50cmFsIGRhdGEgY29udHJvbGxlci4gPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PHNwYW4gc3R5bGU9ImNvbG9yOiMwMDAwZmYiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdGNsb3VkLmNvbS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5NjIxMy1CdXR0b24ucG5nIiAvPjwvYT48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5OTgyMy1FQ29tbWVyY2UzLnBuZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5OTgyNy1Nb2JpbGVBcHBzMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTk4MzMtV2ViRGVzaWduMy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5IiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj5FLWNvbW1lcmNlIHBsYXRmb3JtIGNvdmVycyBhIHJhbmdlIG9mIGRpZmZlcmVudCB0eXBlcyBvZiBidXNpbmVzc2VzLiBXZSBhbHNvIGRldmVsb3AgYW5kIHNldHVwIG9ubGluZSBidXNpbmVzcyBzaXRlIHdpdGggZnVsbCBmbGV4aWJpbGl0eS4gPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5IiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj5PbmUgc3RvcCBpbmZvcm1hdGlvbiBjZW50ZXIgYXBwbGljYXRpb24gaXMgdGhlIG1vc3QgbmVlZGVkIGZvciBhbnkgaW5kdXN0cmllcyBhcyB5b3UgY2FuIHByb3ZpZGUgYW5kIHNwcmVhZCBpbmZvcm1hdGlvbiBlYXNpbHkgYW5kIHNlY3VyZWx5Ljwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJCTx0ZCBhbGlnbj0ianVzdGlmeSIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+SGF2aW5nIGEgd2Vic2l0ZSBjYW4gb3BlbiB1cCB5b3VyIGJ1c2luZXNzIHRvIGEgd2hvbGUgcmFuZ2Ugb2YgbWFya2V0aW5nIHRvb2xzLiBZb3VyIHdlYnNpdGUgY2FuIHN1cHBvcnQgc29jaWFsIG1lZGlhIGFjdGl2aXR5IGFuZCB5b3UgY2FuIHV0aWxpemUgcHJvZHVjdHMgbGlrZSBTRU8gJmFtcDsgU0VNLjwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZWNvbW1lcmNlIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzI4NTk0NTgtQTUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209bW9iaWxlLWFwcCIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMyODU5NDU4LUE1LnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1kZXNpZ24iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMjg1OTQ1OC1BNS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5Gb3IgbW9yZSBpbmZvcm1hdGlvbiwgdmlzaXQgdXMgbm93IGF0IDombmJzcDsgPC9zcGFuPjwvc3Bhbj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjYyLWcucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNTktZmJiLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL2ludGVsaG9zdC5teS8iIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNjUteTIucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USIgdGFyZ2V0PSJibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+SW50ZWxob3N0PC9zcGFuPjwvc3Bhbj48L2E+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTYyMTctRm9vdGVyLmpwZyIgLz48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSItd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOjBweDsgYmFja2dyb3VuZC1jb2xvcjojZjZmNmY2OyBjb2xvcjojOTk5OTk5OyBkaXNwbGF5OmlubGluZSAhaW1wb3J0YW50OyBmbG9hdDpub25lOyBmb250LWZhbWlseTomcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OyxIZWx2ZXRpY2EsSGVsdmV0aWNhLEFyaWFsLHNhbnMtc2VyaWY7IGZvbnQtc2l6ZToxMnB4OyBmb250LXN0eWxlOm5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6bm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOm5vcm1hbDsgZm9udC13ZWlnaHQ6NDAwOyBsZXR0ZXItc3BhY2luZzpub3JtYWw7IG9ycGhhbnM6MjsgdGV4dC1hbGlnbjpjZW50ZXI7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjppbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6aW5pdGlhbDsgdGV4dC1pbmRlbnQ6MHB4OyB0ZXh0LXRyYW5zZm9ybTpub25lOyB3aGl0ZS1zcGFjZTpub3JtYWw7IHdpZG93czoyOyB3b3JkLXNwYWNpbmc6MHB4Ij5ieTxzcGFuPiZuYnNwOzwvc3Bhbj48L3NwYW4+PGEgZGF0YS1zYWZlcmVkaXJlY3R1cmw9Imh0dHBzOi8vd3d3Lmdvb2dsZS5jb20vdXJsP3E9aHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8mYW1wO3NvdXJjZT1nbWFpbCZhbXA7dXN0PTE1MzMzNDU5MDA2NDAwMDAmYW1wO3VzZz1BRlFqQ05GcXV2cWlrSFVETUp6THJ6STdKZXducGpzUEtnIiBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgc3R5bGU9Im1hcmdpbjogMHB4OyBwYWRkaW5nOiAwcHg7IGZvbnQtZmFtaWx5OiAmcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OywgSGVsdmV0aWNhLCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmOyBib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXNpemU6IDEycHg7IGNvbG9yOiByZ2IoMTUzLCAxNTMsIDE1Myk7IHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lOyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogY2VudGVyOyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjQ2LCAyNDYsIDI0Nik7IiB0YXJnZXQ9Il9ibGFuayI+SW50ZWxsaWdlbnQgSG9zdGluZyBTZG4uIEJoZC48L2E+PC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg==', '08-Aug-2018', '1533736918', 'nana'),
(63, 'html email marketing template2', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjcwMHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5ODQwNTQtaGVhZGVyTmV3LnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNjUtd2ViSG9zdGluZzYuanBnIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PHNwYW4gc3R5bGU9ImNvbG9yOm51bGwiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCVRoZXJlIGFyZSBwbGVudHkgb2Ygc2VjdXJpdHkgbWVhc3VyZXMgdG8gcHJvdGVjdCB5b3VyIHdlYnNpdGUgZnJvbSBtYWx3YXJlIGFuZCB2aXJ1c2VzLiBPdXIgcGxhbnMgYXJlIGFmZm9yZGFibGUgZm9yIGV2ZXJ5b25lLjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1jaGVhcC13ZWItaG9zdGluZyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCUhhdmluZyBhIHdlYnNpdGUgY2FuIG9wZW4gdXAgeW91ciBidXNpbmVzcyB0byBhIHdob2xlIHJhbmdlIG9mIG1hcmtldGluZyB0b29scy4gWW91ciB3ZWJzaXRlIGNhbiBzdXBwb3J0IHNvY2lhbCBtZWRpYSBhY3Rpdml0eSBhbmQgeW91IGNhbiB1dGlsaXplIHByb2R1Y3RzIGxpa2UgU0VPICZhbXA7IFNFTS48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209Y2hlYXAtd2ViLWRlc2lnbiIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ3aWR0aDoyNTBweCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzExMjYyLXdlYmRlc2lnbjYuanBnIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMTI2MC1tb2JpbGVBcHBzNi5qcGciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PGJyIC8+DQoJCQlPbmUgc3RvcCBpbmZvcm1hdGlvbiBjZW50ZXIgYXBwbGljYXRpb24gaXMgdGhlIG1vc3QgbmVlZGVkIGZvciBhbnkgaW5kdXN0cmllcyBhcyB5b3UgY2FuIHByb3ZpZGUgYW5kIHNwcmVhZCBpbmZvcm1hdGlvbiBlYXNpbHkgYW5kIHNlY3VyZWx5LjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1tb2JpbGUtYXBwIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTI1OTgtaW50ZWxob3N0X25ldy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCUUtY29tbWVyY2UgcGxhdGZvcm0gY292ZXJzIGEgcmFuZ2Ugb2YgZGlmZmVyZW50IHR5cGVzIG9mIGJ1c2luZXNzZXMuIFdlIGFsc28gZGV2ZWxvcCBhbmQgc2V0dXAgb25saW5lIGJ1c2luZXNzIHNpdGUgd2l0aCBmdWxsIGZsZXhpYmlsaXR5LjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1lY29tbWVyY2UiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMTI1NS1lY29tbWVyY2U2LmpwZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNDUtYnVzaW5lZURpcjYuanBnIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzE4NTQ1LWludGVsaG9zdExpbmVCYXIucG5nIiAvPjxiciAvPg0KCQkJVGFrZSB0aGlzIG9wcG9ydHVuaXR5IHRvIGluY3JlYXNlIGJyYW5kIGF3YXJlbmVzcyBmb3IgeW91ciBidXNpbmVzcy4gQWZ0ZXIgY29uc3VtZXJzIGJlY29tZSBhd2FyZSBvZiB5b3VyIGJyYW5kLCB0aGV5JiMzOTtsbCBsZWFybiBtb3JlIGFib3V0IHlvdXIgcHJvZHVjdHMgb3Igc2VydmljZXMuPGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PGJyIC8+DQoJCQlJbnRlbGhvc3QgY2xvdWQgc3RvcmFnZSBsZXRzIHVzZXJzIHNoYXJlLCBzdG9yZSBhbmQgY29sbGFib3JhdGUgb24gZmlsZXMgc2VjdXJlbHkuIFlvdXIgZGF0YSBtYW5hZ2VtZW50IGJlY29tZXMgZWZmZWN0aXZlIHdpdGggYWRtaW4gY29uc29sZSBhcyB0aGUgY2VudHJhbCBkYXRhIGNvbnRyb2xsZXIuPGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3RjbG91ZC5jb20vIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNDgtY2xvdWQ2LmpwZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNTEtZG9tYWluTmFtZTYuanBnIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzE4NTQ1LWludGVsaG9zdExpbmVCYXIucG5nIiAvPjxiciAvPg0KCQkJQSBkb21haW4gbmFtZSByZXByZXNlbnRzIHdobyB5b3UgYXJlIGFuZCB3aGF0IHlvdSBkby4gSXQgZ2l2ZXMgeW91ciBwb3RlbnRpYWwgY3VzdG9tZXJzIGFuIGlkZWEgb2YgeW91ciBidXNpbmVzcyBhbmQgaXQgY2FuIGFmZmVjdCB5b3VyIFNFTyByYW5raW5nLjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1kb21haW4tbWFsYXlzaWEiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkZvciBtb3JlIGluZm9ybWF0aW9uLCB2aXNpdCB1cyBhdCA6Jm5ic3A7IDwvc3Bhbj48L3NwYW4+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2Mi1nLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjU5LWZiYi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjY1LXkyLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdDwvc3Bhbj48L3NwYW4+PC9hPjxiciAvPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTg0MDU0LWZvb3Rlck5ldy5wbmciIC8+PGJyIC8+DQoJCQk8c3BhbiBzdHlsZT0iLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDowcHg7IGJhY2tncm91bmQtY29sb3I6I2Y2ZjZmNjsgY29sb3I6Izk5OTk5OTsgZGlzcGxheTppbmxpbmUgIWltcG9ydGFudDsgZmxvYXQ6bm9uZTsgZm9udC1mYW1pbHk6JnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssSGVsdmV0aWNhLEhlbHZldGljYSxBcmlhbCxzYW5zLXNlcmlmOyBmb250LXNpemU6MTJweDsgZm9udC1zdHlsZTpub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOm5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczpub3JtYWw7IGZvbnQtd2VpZ2h0OjQwMDsgbGV0dGVyLXNwYWNpbmc6bm9ybWFsOyBvcnBoYW5zOjI7IHRleHQtYWxpZ246Y2VudGVyOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6aW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOmluaXRpYWw7IHRleHQtaW5kZW50OjBweDsgdGV4dC10cmFuc2Zvcm06bm9uZTsgd2hpdGUtc3BhY2U6bm9ybWFsOyB3aWRvd3M6Mjsgd29yZC1zcGFjaW5nOjBweCI+Ynk8c3Bhbj4mbmJzcDs8L3NwYW4+PC9zcGFuPjxhIGRhdGEtc2FmZXJlZGlyZWN0dXJsPSJodHRwczovL3d3dy5nb29nbGUuY29tL3VybD9xPWh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvJmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTMzMzQ1OTAwNjQwMDAwJmFtcDt1c2c9QUZRakNORnF1dnFpa0hVRE1Kekxyekk3SmV3bnBqc1BLZyIgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyBmb250LWZhbWlseTogJnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssIEhlbHZldGljYSwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogcmdiKDE1MywgMTUzLCAxNTMpOyB0ZXh0LWRlY29yYXRpb246IHVuZGVybGluZTsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IGNlbnRlcjsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0NiwgMjQ2LCAyNDYpOyIgdGFyZ2V0PSJfYmxhbmsiPkludGVsbGlnZW50IEhvc3RpbmcgU2RuLiBCaGQuPC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQo=', '22-Sep-2018', '1537643122', 'peiyoke');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`c_id`, `c_name`, `c_code`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'DS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bolivia', 'BO'),
(27, 'Bosnia and Herzegovina', 'BA'),
(28, 'Botswana', 'BW'),
(29, 'Bouvet Island', 'BV'),
(30, 'Brazil', 'BR'),
(31, 'British Indian Ocean Territory', 'IO'),
(32, 'Brunei Darussalam', 'BN'),
(33, 'Bulgaria', 'BG'),
(34, 'Burkina Faso', 'BF'),
(35, 'Burundi', 'BI'),
(36, 'Cambodia', 'KH'),
(37, 'Cameroon', 'CM'),
(38, 'Canada', 'CA'),
(39, 'Cape Verde', 'CV'),
(40, 'Cayman Islands', 'KY'),
(41, 'Central African Republic', 'CF'),
(42, 'Chad', 'TD'),
(43, 'Chile', 'CL'),
(44, 'China', 'CN'),
(45, 'Christmas Island', 'CX'),
(46, 'Cocos (Keeling) Islands', 'CC'),
(47, 'Colombia', 'CO'),
(48, 'Comoros', 'KM'),
(49, 'Congo', 'CG'),
(50, 'Cook Islands', 'CK'),
(51, 'Costa Rica', 'CR'),
(52, 'Croatia (Hrvatska)', 'HR'),
(53, 'Cuba', 'CU'),
(54, 'Cyprus', 'CY'),
(55, 'Czech Republic', 'CZ'),
(56, 'Denmark', 'DK'),
(57, 'Djibouti', 'DJ'),
(58, 'Dominica', 'DM'),
(59, 'Dominican Republic', 'DO'),
(60, 'East Timor', 'TP'),
(61, 'Ecuador', 'EC'),
(62, 'Egypt', 'EG'),
(63, 'El Salvador', 'SV'),
(64, 'Equatorial Guinea', 'GQ'),
(65, 'Eritrea', 'ER'),
(66, 'Estonia', 'EE'),
(67, 'Ethiopia', 'ET'),
(68, 'Falkland Islands (Malvinas)', 'FK'),
(69, 'Faroe Islands', 'FO'),
(70, 'Fiji', 'FJ'),
(71, 'Finland', 'FI'),
(72, 'France', 'FR'),
(73, 'France, Metropolitan', 'FX'),
(74, 'French Guiana', 'GF'),
(75, 'French Polynesia', 'PF'),
(76, 'French Southern Territories', 'TF'),
(77, 'Gabon', 'GA'),
(78, 'Gambia', 'GM'),
(79, 'Georgia', 'GE'),
(80, 'Germany', 'DE'),
(81, 'Ghana', 'GH'),
(82, 'Gibraltar', 'GI'),
(83, 'Guernsey', 'GK'),
(84, 'Greece', 'GR'),
(85, 'Greenland', 'GL'),
(86, 'Grenada', 'GD'),
(87, 'Guadeloupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guinea', 'GN'),
(91, 'Guinea-Bissau', 'GW'),
(92, 'Guyana', 'GY'),
(93, 'Haiti', 'HT'),
(94, 'Heard and Mc Donald Islands', 'HM'),
(95, 'Honduras', 'HN'),
(96, 'Hong Kong', 'HK'),
(97, 'Hungary', 'HU'),
(98, 'Iceland', 'IS'),
(99, 'India', 'IN'),
(100, 'Isle of Man', 'IM'),
(101, 'Indonesia', 'ID'),
(102, 'Iran (Islamic Republic of)', 'IR'),
(103, 'Iraq', 'IQ'),
(104, 'Ireland', 'IE'),
(105, 'Israel', 'IL'),
(106, 'Italy', 'IT'),
(107, 'Ivory Coast', 'CI'),
(108, 'Jersey', 'JE'),
(109, 'Jamaica', 'JM'),
(110, 'Japan', 'JP'),
(111, 'Jordan', 'JO'),
(112, 'Kazakhstan', 'KZ'),
(113, 'Kenya', 'KE'),
(114, 'Kiribati', 'KI'),
(115, 'Korea, Democratic People\'s Republic of', 'KP'),
(116, 'Korea, Republic of', 'KR'),
(117, 'Kosovo', 'XK'),
(118, 'Kuwait', 'KW'),
(119, 'Kyrgyzstan', 'KG'),
(120, 'Lao People\'s Democratic Republic', 'LA'),
(121, 'Latvia', 'LV'),
(122, 'Lebanon', 'LB'),
(123, 'Lesotho', 'LS'),
(124, 'Liberia', 'LR'),
(125, 'Libyan Arab Jamahiriya', 'LY'),
(126, 'Liechtenstein', 'LI'),
(127, 'Lithuania', 'LT'),
(128, 'Luxembourg', 'LU'),
(129, 'Macau', 'MO'),
(130, 'Macedonia', 'MK'),
(131, 'Madagascar', 'MG'),
(132, 'Malawi', 'MW'),
(133, 'Malaysia', 'MY'),
(134, 'Maldives', 'MV'),
(135, 'Mali', 'ML'),
(136, 'Malta', 'MT'),
(137, 'Marshall Islands', 'MH'),
(138, 'Martinique', 'MQ'),
(139, 'Mauritania', 'MR'),
(140, 'Mauritius', 'MU'),
(141, 'Mayotte', 'TY'),
(142, 'Mexico', 'MX'),
(143, 'Micronesia, Federated States of', 'FM'),
(144, 'Moldova, Republic of', 'MD'),
(145, 'Monaco', 'MC'),
(146, 'Mongolia', 'MN'),
(147, 'Montenegro', 'ME'),
(148, 'Montserrat', 'MS'),
(149, 'Morocco', 'MA'),
(150, 'Mozambique', 'MZ'),
(151, 'Myanmar', 'MM'),
(152, 'Namibia', 'NA'),
(153, 'Nauru', 'NR'),
(154, 'Nepal', 'NP'),
(155, 'Netherlands', 'NL'),
(156, 'Netherlands Antilles', 'AN'),
(157, 'New Caledonia', 'NC'),
(158, 'New Zealand', 'NZ'),
(159, 'Nicaragua', 'NI'),
(160, 'Niger', 'NE'),
(161, 'Nigeria', 'NG'),
(162, 'Niue', 'NU'),
(163, 'Norfolk Island', 'NF'),
(164, 'Northern Mariana Islands', 'MP'),
(165, 'Norway', 'NO'),
(166, 'Oman', 'OM'),
(167, 'Pakistan', 'PK'),
(168, 'Palau', 'PW'),
(169, 'Palestine', 'PS'),
(170, 'Panama', 'PA'),
(171, 'Papua New Guinea', 'PG'),
(172, 'Paraguay', 'PY'),
(173, 'Peru', 'PE'),
(174, 'Philippines', 'PH'),
(175, 'Pitcairn', 'PN'),
(176, 'Poland', 'PL'),
(177, 'Portugal', 'PT'),
(178, 'Puerto Rico', 'PR'),
(179, 'Qatar', 'QA'),
(180, 'Reunion', 'RE'),
(181, 'Romania', 'RO'),
(182, 'Russian Federation', 'RU'),
(183, 'Rwanda', 'RW'),
(184, 'Saint Kitts and Nevis', 'KN'),
(185, 'Saint Lucia', 'LC'),
(186, 'Saint Vincent and the Grenadines', 'VC'),
(187, 'Samoa', 'WS'),
(188, 'San Marino', 'SM'),
(189, 'Sao Tome and Principe', 'ST'),
(190, 'Saudi Arabia', 'SA'),
(191, 'Senegal', 'SN'),
(192, 'Serbia', 'RS'),
(193, 'Seychelles', 'SC'),
(194, 'Sierra Leone', 'SL'),
(195, 'Singapore', 'SG'),
(196, 'Slovakia', 'SK'),
(197, 'Slovenia', 'SI'),
(198, 'Solomon Islands', 'SB'),
(199, 'Somalia', 'SO'),
(200, 'South Africa', 'ZA'),
(201, 'South Georgia South Sandwich Islands', 'GS'),
(202, 'Spain', 'ES'),
(203, 'Sri Lanka', 'LK'),
(204, 'St. Helena', 'SH'),
(205, 'St. Pierre and Miquelon', 'PM'),
(206, 'Sudan', 'SD'),
(207, 'Suriname', 'SR'),
(208, 'Svalbard and Jan Mayen Islands', 'SJ'),
(209, 'Swaziland', 'SZ'),
(210, 'Sweden', 'SE'),
(211, 'Switzerland', 'CH'),
(212, 'Syrian Arab Republic', 'SY'),
(213, 'Taiwan', 'TW'),
(214, 'Tajikistan', 'TJ'),
(215, 'Tanzania, United Republic of', 'TZ'),
(216, 'Thailand', 'TH'),
(217, 'Togo', 'TG'),
(218, 'Tokelau', 'TK'),
(219, 'Tonga', 'TO'),
(220, 'Trinidad and Tobago', 'TT'),
(221, 'Tunisia', 'TN'),
(222, 'Turkey', 'TR'),
(223, 'Turkmenistan', 'TM'),
(224, 'Turks and Caicos Islands', 'TC'),
(225, 'Tuvalu', 'TV'),
(226, 'Uganda', 'UG'),
(227, 'Ukraine', 'UA'),
(228, 'United Arab Emirates', 'AE'),
(229, 'United Kingdom', 'GB'),
(230, 'United States', 'US'),
(231, 'United States minor outlying islands', 'UM'),
(232, 'Uruguay', 'UY'),
(233, 'Uzbekistan', 'UZ'),
(234, 'Vanuatu', 'VU'),
(235, 'Vatican City State', 'VA'),
(236, 'Venezuela', 'VE'),
(237, 'Vietnam', 'VN'),
(238, 'Virgin Islands (British)', 'VG'),
(239, 'Virgin Islands (U.S.)', 'VI'),
(240, 'Wallis and Futuna Islands', 'WF'),
(241, 'Western Sahara', 'EH'),
(242, 'Yemen', 'YE'),
(243, 'Zaire', 'ZR'),
(244, 'Zambia', 'ZM'),
(245, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `c_id` int(11) NOT NULL,
  `c_code` varchar(10) NOT NULL,
  `c_sign` text NOT NULL,
  `c_rate` double NOT NULL,
  `c_date` varchar(255) NOT NULL,
  `c_default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`c_id`, `c_code`, `c_sign`, `c_rate`, `c_date`, `c_default`) VALUES
(1, 'MYR', 'RM', 1, '06-Mar-2019', 1),
(2, 'USD', '$', 1, '12-Mar-2019', 0),
(3, 'SGD', 'S$', 1.36, '12-Mar-2019', 0),
(4, 'EUR', 'EUR', 0.89, '12-Mar-2019', 0),
(7, 'JPY', 'Â¥', 111.21, '12-Mar-2019', 0),
(8, 'KRW', 'â‚©', 1133.55, '12-Mar-2019', 0),
(9, 'CNY', 'Â¥', 6.73, '12-Mar-2019', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_phone` varchar(20) NOT NULL,
  `c_password` text NOT NULL,
  `c_address` text NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_state` varchar(255) NOT NULL,
  `c_postcode` int(11) NOT NULL,
  `c_country` varchar(255) NOT NULL,
  `c_picture` text NOT NULL,
  `c_gender` int(11) NOT NULL,
  `c_time` int(15) NOT NULL,
  `c_date` varchar(100) NOT NULL,
  `c_user` int(11) NOT NULL,
  `c_login` varchar(255) NOT NULL,
  `c_bank` text NOT NULL,
  `c_acc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_email`, `c_phone`, `c_password`, `c_address`, `c_city`, `c_state`, `c_postcode`, `c_country`, `c_picture`, `c_gender`, `c_time`, `c_date`, `c_user`, `c_login`, `c_bank`, `c_acc`) VALUES
(5, 'MR.HERY', 'hery@gmail.com', '0104089869', '43bf1c0b7a496f576b8b198c587fe0a11f87ca40488557651e8da25b187c9d13', 'Lot 20 Jalan Lintang Pukang', 'Skudai', 'Johor', 456321, 'MY', '1563534576-mr.hery.jpg', 1, 1563532044, '19-Jul-2019', 10, 'hery', '0', ''),
(13, 'Sam Pei Yoke', 'sales@intelpro.com.my', '', 'cc37769883c34d3cf2c82f40ca9216d2e97bcabefe0dcab84df6510938571c75', '', '', '', 0, '', '', 0, 1570387042, '06-Oct-2019', 0, 'peiyoke', '0', ''),
(20, 'Mohamed Anwar Bin Radzuan', 'mohamed.anwar885@gmail.com', '0138212869', 'a209b658eb9e89c333c0f0fa894739ed3081be8496cfe48c975406293113c891', '', '', '', 0, '', '1578591234-my_logo.jpg', 1, 1578591187, '09-Jan-2020', 0, 'anwar', 'Maybank', '161016008544'),
(22, 'Frankie', 'frankie8371@gmail.com', '0149926252', 'b13d06bb5890951415a70371ae909c2888dbf53de2cf9fe93ac043161e325bfa', '', '', '', 0, '', '', 1, 1584290163, '15-Mar-2020', 0, 'frankie', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `ca_id` int(11) NOT NULL,
  `ca_customer` int(11) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `ca_address` text NOT NULL,
  `ca_country` varchar(255) NOT NULL,
  `ca_state` varchar(255) NOT NULL,
  `ca_city` varchar(255) NOT NULL,
  `ca_postal` varchar(255) NOT NULL,
  `ca_date` varchar(15) NOT NULL,
  `ca_time` int(11) NOT NULL,
  `ca_phone` varchar(255) NOT NULL,
  `ca_status` int(11) NOT NULL,
  `ca_email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`ca_id`, `ca_customer`, `ca_name`, `ca_address`, `ca_country`, `ca_state`, `ca_city`, `ca_postal`, `ca_date`, `ca_time`, `ca_phone`, `ca_status`, `ca_email`) VALUES
(17, 20, 'Mohamed Anwar Bin Radzuan', 'Lot 26 Kampung Haji Wahed', 'MY', 'Sarawak', 'Miri', '98000', '05-Oct-2019', 1570275574, '0138212869', 0, 'mohamed.anwar885@gmail.com'),
(18, 20, 'Mohamed Anwar', 'No 30, Jalan Sejahtera 24, Taman Desa Skudai', 'MY', 'Johor', 'Skudai', '81300 ', '16-Nov-2019', 1573895631, '5465465465', 1, 'mohamed.anwar885@gmail.com'),
(20, 20, 'Wan', 'Unit 70 81-83 Macarthur Street', 'AU', 'Ultimo', 'NSW', '2003', '05-Oct-2019', 1570275611, '789456123', 0, 'mohamed.anwar885@gmail.com'),
(51, 5, 'John An War', 'Lot 26, Kampung Haji Wahed, 98000 Miri Sarawak', 'MY', 'Sarawak', 'Miri', '98000', '03-Oct-2019', 1570136556, '0138212869', 0, 'anwar37007@gmail.com'),
(50, 5, 'Master Hery Kluang', '135, Jalan SeriImpian 9/13, Taman Seri Impian', 'MY', 'Johor', 'Kluang', '86000', '03-Oct-2019', 1570123100, '0187824900', 1, 'heryintelt@gmail.com'),
(26, 5, 'Master Hery', '128 Jalan Cekal 14, Taman Sri Lambak, 860000 Kluang, Johor', 'MY', 'Johor', 'Kluang', '86000', '18-Sep-2019', 1568828750, '+60187824900', 0, 'heryintelt@gmail.com'),
(52, 13, 'Sam Pei Yoke', 'No. 23A, 25A, Jalan Kebudayaan 16, Taman Universiti, Skudai', 'MY', 'Johor', 'Johor Bahru', '81300', '25-Oct-2019', 1572014899, '+60178787991', 1, 'sales@intelpro.com.my');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `d_id` int(11) NOT NULL,
  `d_title` varchar(255) NOT NULL,
  `d_file` text NOT NULL,
  `d_date` varchar(255) NOT NULL,
  `d_time` varchar(15) NOT NULL,
  `d_client` varchar(255) NOT NULL,
  `d_invoice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`d_id`, `d_title`, `d_file`, `d_date`, `d_time`, `d_client`, `d_invoice`) VALUES
(4, '1506224133-samtai.jpg', 'pekin-1518191860-1506224133-samtai.jpg', '09-Feb-2018', '1518191860', 'pekin', 0),
(5, '1526235417-About-Us-master-tailor.jpg', 'hery-1528401357-1526235417-About-Us-master-tailor.jpg', '07-Jun-2018', '1528401357', 'hery', 0),
(6, '6.jpg', 'chong-1538848612-6.jpg', '06-Oct-2018', '1538848612', 'chong', 0),
(7, '6.jpg', 'chong-1538848620-6.jpg', '06-Oct-2018', '1538848620', 'chong', 0),
(8, '5.jpg', 'chong-1538848632-5.jpg', '06-Oct-2018', '1538848632', 'chong', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_content` text COLLATE utf8_unicode_ci NOT NULL,
  `e_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_status` int(11) NOT NULL,
  `e_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_ccmail` text COLLATE utf8_unicode_ci NOT NULL,
  `e_key` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`e_id`, `e_name`, `e_title`, `e_content`, `e_position`, `e_url`, `e_status`, `e_description`, `e_template`, `e_date`, `e_time`, `e_user`, `e_code`, `e_ccmail`, `e_key`) VALUES
(5, '', 'Customer Forgot Password', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570212055-fogor_password.jpg\" style=\"height:172px; width:610px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {USERNAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">We have received a request to reset your password for {RCPT_EMAIL} account.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Please click <a href=\"{RESET_URL}\">here</a> to redirect you to a reset password page.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Note</strong>: If u didn&#39;t make the request,just ignore this email</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '13-Feb-2020', '1581609223', 'anwar', 'customer-forgot-password', 'intelhost2u@gmail.com', 'EMAIL_5d60f029b9fa4'),
(6, '', 'Vendor Forgot Password', '<table align=\"center\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:451px; width:626px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570212061-vendor_forgot_password.jpg\" style=\"height:204px; width:666px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dear {USERNAME}</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>We&#39;ve have received a request to reset your password for {RCPT_EMAIL} account.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Click <a href=\"{RESET_URL}\">here </a>to redirect you to reset password page.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Note</strong>: If u didn&#39;t make the request,just ignore this email.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>.</p>\r\n', '', '', 0, '', '', '10-Jan-2020', '1578681327', 'anwar', 'vendor-forgot-password', 'intelhost2u@gmail.com', 'EMAIL_5d6114402c0a7'),
(8, '', 'Customer Registered', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img alt=\"\" src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570372907-customer-register.jpg\" style=\"height:241px; width:787px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {USERNAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Welcome to Intelligent E-commerce.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Your&nbsp;{RCPT_EMAIL} account have successfully registered in our Intelligent Ecommerce.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">We are excited to have you onboard.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thanks for signing up.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Click <a href=\"{RESET_URL}\">here</a> to redirect to login page.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Note: If you do not request for it, just ignore this email.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '13-Feb-2020', '1581626738', 'anwar', 'customer-registered', 'sales@intelhost.com.my, intelhost2u@gmail.com', 'EMAIL_5d61fb82b114d'),
(10, '', 'Customer Paid Order', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:818px; width:619px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570211866-paid_order.jpg\" style=\"height:185px; width:612px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {USERNAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thank you for your order !</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Your payment on <strong>{ORDER_NO}</strong> is completed</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : {ORDER_NO}</p>\r\n\r\n			<p style=\"text-align:left\">Date : {DATE}</p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Note</strong>: Please keep this email as the confirmation of your order. <strong>Total </strong>price is inclusive with charges fee and shipping cost.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thank you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '10-Jan-2020', '1578681194', 'anwar', 'customer-paid-order', 'intelhost2u@gmail.com', 'EMAIL_5d6888c79691c'),
(11, '', 'Vendor Recieved Order', '<table align=\"center\" border=\"0\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570212060-order_paid_vendor.jpg\" style=\"height:221px; width:721px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dear {COMPANY_NAME}</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>We just want to inform you that an order of your items has just been paid. Below are the informations about your order:</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : <strong>{ORDER_NUMBER}</strong></p>\r\n\r\n			<p style=\"text-align:left\">Date : <strong>{DATE}</strong></p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>You may <a href=\"{VENDOR_LOGIN}\">login</a> to view the order details.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>If you have any questions, please do not hesitate to contact us by email on support@intelhost.com.my</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>.</p>\r\n', '', '', 0, '', '', '10-Jan-2020', '1578681395', 'anwar', 'vendor-received-order', 'intelhost2u@gmail.com', 'EMAIL_5d688ae479cd0'),
(14, '', 'Customer Cancel Order Not Approved', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570211863-order_cancel.jpg\" style=\"height:234px; width:765px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {USERNAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">We are sorry to tell you that your order <strong>can&#39;t be cance</strong>l.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Please <a href=\"{LOGIN_CUST}\">login</a> to view more information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : {ORDER_NO}</p>\r\n\r\n			<p style=\"text-align:left\">Date : {DATE}</p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Note</strong>: Please keep this email for your reference.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thank you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"myiecommerce.intelpro.com.my\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '10-Jan-2020', '1578681294', 'anwar', 'not-approved-cancel-order', 'intelhost2u@gmail.com', 'EMAIL_5d983d1647701'),
(12, '', 'Customer Cancel Order', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570211863-order_cancel.jpg\" style=\"height:234px; width:765px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {USERNAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">You order have been cancelled.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Please <a href=\"{LOGIN_CUST}\">login</a> to view more information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : <strong>{ORDER_NO}</strong></p>\r\n\r\n			<p style=\"text-align:left\">Date : {DATE}</p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Note</strong>: Please keep this email for your reference.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thank you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '15-Feb-2020', '1581765405', 'anwar', 'customer-cancel-order', 'intelhost2u@gmail.com', 'EMAIL_5d96fb64475a1'),
(13, '', 'Vendor Cancel Order', '<table align=\"center\" border=\"0\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse; height:797px; width:672px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570212058-order_cancel_vendor.jpg\" style=\"height:203px; width:662px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dear {COMPANY}</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>You order have been cancelled.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Please <a href=\"{LOGIN}\">login</a> to view more information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : {ORDER_NUMBER}</p>\r\n\r\n			<p style=\"text-align:left\">Date : {DATE}</p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>If you have any questions, please do not hesitate to contact us by email on support@intelhost.com.my</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>.</p>\r\n', '', '', 0, '', '', '14-Feb-2020', '1581681347', 'anwar', 'vandor-cancel-order', 'intelhost2u@gmail.com', 'EMAIL_5d96fd0898266'),
(15, '', 'Vendor Claim Paid', '<table align=\"center\" border=\"0\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse; height:797px; width:672px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570293290-claim-paid.jpg\" style=\"height:202px; width:662px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dear {COMPANY}</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Your claim on {ORDER_NUMBER} have been paid. Please <a href=\"{LOGIN}\">login</a> to view more information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">\r\n			<ul>\r\n				<li style=\"text-align: left;\">Order No : {ORDER_NUMBER}</li>\r\n				<li style=\"text-align: left;\">Date : {DATE}</li>\r\n				<li style=\"text-align: left;\">Amount : {AMOUNT}</li>\r\n			</ul>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>If you have any questions, please do not hesitate to contact us by email on support@intelhost.com.my</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>.</p>\r\n', '', '', 0, '', '', '14-Feb-2020', '1581703335', 'anwar', 'vendor-claim-paid', 'intelhost2u@gmail.com', 'EMAIL_5d9855072bf6e'),
(16, '', 'Vendor Register', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570364271-WELCOME_VENDOR.jpg\" style=\"height:234px; width:765px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {USERNAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">You have successfully registered as a vendor to our <a href=\"https://www.mypro-intelligent.com/\">Intelligent eCommcerce</a> online shop.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Please <a href=\"{LOGIN}\">login</a> to view more information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Company name : {COMPANY}</p>\r\n\r\n			<p style=\"text-align:left\">Registration No: {REG}</p>\r\n\r\n			<p style=\"text-align:left\">Date : {DATE}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Note</strong>: Please keep this email for your reference.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thank you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '16-Jan-2020', '1579185666', 'anwar', 'vendor-register', 'intelhost2u@gmail.com, sales@intelhost.com.my', 'EMAIL_5d99674bbb4e2'),
(17, '', 'Admin Forgot Password', '<table align=\"center\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:451px; width:626px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570212061-vendor_forgot_password.jpg\" style=\"height:204px; width:666px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dear {USERNAME}</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>We&#39;ve have received a request to reset your password for {RCPT_EMAIL} account.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Click <a href=\"{RESET_URL}\">here </a>to redirect you to reset password page.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Note</strong>: If u didn&#39;t make the request,just ignore this email.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>.</p>\r\n', '', '', 0, '', '', '14-Feb-2020', '1581672624', 'anwar', 'admin-forgot-password', 'intelhost2u@gmail.com', 'EMAIL_5e45f3976dab5'),
(18, '', 'Vendor - Customer Request Cancel', '<table align=\"center\" border=\"0\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse; height:797px; width:672px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570212058-order_cancel_vendor.jpg\" style=\"height:203px; width:662px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dear {COMPANY}</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Your customer is <strong>requesting to cancel</strong> their order from you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Please <a href=\"{LOGIN}\">login</a> to accept or declined the request.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Below is the order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : <strong>{ORDER_NUMBER}</strong></p>\r\n\r\n			<p style=\"text-align:left\">Date : {DATE}</p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>If you have any questions, please do not hesitate to contact us by email on support@intelhost.com.my</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>.</p>\r\n', '', '', 0, '', '', '15-Feb-2020', '1581763846', 'anwar', 'vendor-customer-req-cancel', 'intelhost2u@gmail.com', 'EMAIL_5e47501352e48'),
(19, '', 'Customer Request Cancel Order', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1570211863-order_cancel.jpg\" style=\"height:234px; width:765px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {CUST_NAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">You had <strong>request to cancel</strong> your order from {COMPANY}.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">The company will review your cancellation request and decide to accept or decline your cancellation request.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">We will let you know if the decision has been made.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Please <a href=\"{LOGIN_CUST}\">login</a> to view more information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : <strong>{ORDER_NO}</strong></p>\r\n\r\n			<p style=\"text-align:left\">Date : {DATE}</p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Note</strong>: Please keep this email for your reference.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thank you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '15-Feb-2020', '1581763827', 'anwar', 'customer-req-cancel', 'intelhost2u@gmail.com', 'EMAIL_5e475322ba823'),
(20, '', 'Refund Order', '<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:818px; width:619px\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\"><img src=\"https://www.mypro-intelligent.com/admin/assets/medias/iecommerce/img/medias/1581771006-ref.jpg\" style=\"height:185px; width:612px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Dear {USERNAME},</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Refund has been made throught your order <strong>{ORDER_NO}.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Please <a href=\"{LOGIN}\">login</a> TO view more information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Below is your order information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"text-align:center\">\r\n			<p style=\"text-align:left\">Order No : <strong>{ORDER_NO}</strong></p>\r\n\r\n			<p style=\"text-align:left\">Refundable Amount :&nbsp; <strong>{AMOUNT}</strong> <em>*After (-){PAYPAL_FIX} PayPal fix charge*</em></p>\r\n\r\n			<p style=\"text-align:left\">Date : <strong>{DATE}</strong></p>\r\n\r\n			<p style=\"text-align:left\">&nbsp;</p>\r\n\r\n			<p>{TABLE_ITEM}</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\"><strong>Note</strong>: Please keep this email for your information.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">Thank you.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"background-color:#262d3a; text-align:center; width:100%\">\r\n			<p><a href=\"www.mypro-intelligent.com\" style=\"color: white\" target=\"_blank\">Intelligent Ecommerce</a></p>\r\n\r\n			<p><span style=\"color:white\">+6012-283 6731 | +607-521 1178</span></p>\r\n\r\n			<p><span style=\"color:white\">Copyright@ I<a href=\"www.my-intelligent.com/\" style=\"color: white\" target=\"_blank\">ntelligent Hosting Sdn Bhd</a> - 1158583-U@2019</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 0, '', '', '15-Feb-2020', '1581785690', 'anwar', 'customer-refund-paid', 'intelhost2u@gmail.com', 'EMAIL_5e476fd5338f3');

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE `hits` (
  `h_id` int(11) NOT NULL,
  `h_date` varchar(255) NOT NULL,
  `h_url` text NOT NULL,
  `h_hit` int(15) NOT NULL,
  `h_portal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`h_id`, `h_date`, `h_url`, `h_hit`, `h_portal`) VALUES
(1, '28-Aug-2019', '/', 8, 'public'),
(2, '28-Aug-2019', '/public/', 3, 'public'),
(3, '28-Aug-2019', '/business/', 2, 'vendor'),
(4, '28-Aug-2019', '/public/login', 3, 'public'),
(5, '28-Aug-2019', '/about_us', 2, 'public'),
(6, '28-Aug-2019', '/shop', 1, 'public'),
(7, '28-Aug-2019', '/home', 2, 'public'),
(8, '28-Aug-2019', '/login', 3, 'public'),
(9, '28-Aug-2019', '/customer/account', 1, 'customer'),
(10, '30-Aug-2019', '/business/', 1, 'vendor'),
(11, '30-Aug-2019', '/public/', 2, 'public'),
(12, '30-Aug-2019', '/shop', 1, 'public'),
(13, '30-Aug-2019', '/shop?page=2', 4, 'public'),
(14, '30-Aug-2019', '/shop?page=3', 4, 'public'),
(15, '30-Aug-2019', '/shop?page=1', 1, 'public'),
(16, '31-Aug-2019', '/business/', 1, 'vendor'),
(17, '31-Aug-2019', '/public/', 1, 'public'),
(18, '31-Aug-2019', '/shop', 1, 'public'),
(19, '31-Aug-2019', '/shop?page=2', 1, 'public'),
(20, '03-Sep-2019', '/shop?page=2', 2, 'public'),
(21, '05-Sep-2019', '/', 5, 'public'),
(22, '08-Sep-2019', '/', 1, 'public'),
(23, '13-Sep-2019', '/', 1, 'public'),
(24, '15-Sep-2019', '/', 1, 'public'),
(25, '15-Sep-2019', '/login', 9, 'public'),
(26, '15-Sep-2019', '/categories/Books', 2, 'public'),
(27, '15-Sep-2019', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(28, '15-Sep-2019', '/categories/Clothes', 1, 'public'),
(29, '15-Sep-2019', '/categories/view_item/ITEM_5d44089f44281', 3, 'public'),
(30, '15-Sep-2019', '/categories/Others', 2, 'public'),
(31, '15-Sep-2019', '/customer/account/profile', 1, 'customer'),
(32, '15-Sep-2019', '/customer/cart', 10, 'customer'),
(33, '15-Sep-2019', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(34, '16-Sep-2019', '/categories/view_item/ITEM_5d58fd86d3dd1', 5, 'public'),
(35, '18-Sep-2019', '/', 1, 'public'),
(36, '21-Sep-2019', '/', 1, 'public'),
(37, '22-Sep-2019', '/', 5, 'public'),
(38, '22-Sep-2019', '/login', 7, 'public'),
(39, '22-Sep-2019', '/categories/Books', 1, 'public'),
(40, '22-Sep-2019', '/categories/view_item/ITEM_5d440a18b0b12', 2, 'public'),
(41, '23-Sep-2019', '/', 1, 'public'),
(42, '23-Sep-2019', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(43, '24-Sep-2019', '/', 1, 'public'),
(44, '28-Sep-2019', '/', 1, 'public'),
(45, '02-Oct-2019', '/', 7, 'public'),
(46, '02-Oct-2019', '/login', 5, 'public'),
(47, '02-Oct-2019', '/customer/account/profile', 5, 'customer'),
(48, '02-Oct-2019', '/customer/account/address', 4, 'customer'),
(49, '02-Oct-2019', '/customer/account/address/edit/18', 2, 'customer'),
(50, '02-Oct-2019', '/customer/cart', 31, 'customer'),
(51, '02-Oct-2019', '/categories/Clothes', 11, 'public'),
(52, '02-Oct-2019', '/categories/view_item/ITEM_5d834d3247d0f', 2, 'public'),
(53, '02-Oct-2019', '/categories/Others', 2, 'public'),
(54, '02-Oct-2019', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(55, '02-Oct-2019', '/company/COMPANY_5d7334742a303', 1, 'public'),
(56, '02-Oct-2019', '/categories/view_item/ITEM_5d7df614c9902', 3, 'public'),
(57, '02-Oct-2019', '/categories/Electronic', 6, 'public'),
(58, '02-Oct-2019', '/categories/Books', 4, 'public'),
(59, '02-Oct-2019', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(60, '02-Oct-2019', '/categories/Stationary', 1, 'public'),
(61, '02-Oct-2019', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(62, '02-Oct-2019', '/categories/view_item/ITEM_5d7df9bdb70af', 1, 'public'),
(63, '02-Oct-2019', '/categories/Books/page/2', 2, 'public'),
(64, '02-Oct-2019', '/categories/Books/page/1', 1, 'public'),
(65, '02-Oct-2019', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(66, '02-Oct-2019', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(67, '02-Oct-2019', '/company/COMPANY_5d6254sadasdd', 1, 'public'),
(68, '02-Oct-2019', '/categories/view_item/ITEM_5d440a6ad50e0', 1, 'public'),
(69, '02-Oct-2019', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(70, '02-Oct-2019', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(71, '02-Oct-2019', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(72, '02-Oct-2019', '/company/COMPANY_5d4394719a25f', 1, 'public'),
(73, '02-Oct-2019', '/customer/check_out', 7, 'customer'),
(74, '02-Oct-2019', '/business/', 1, 'vendor'),
(75, '02-Oct-2019', '/business/register', 2, 'vendor'),
(76, '02-Oct-2019', '/business/register/PACKAGE5D7320DEA468B', 1, 'vendor'),
(77, '02-Oct-2019', '/customer/check_out/2', 3, 'customer'),
(78, '02-Oct-2019', '/customer/check_out/3', 9, 'customer'),
(79, '02-Oct-2019', '/customer/account/order', 5, 'customer'),
(80, '02-Oct-2019', '/customer/account/order/view_order/ORDER_ITEM_5d94a668d2649', 3, 'customer'),
(81, '02-Oct-2019', '/customer/account/address/edit/49', 1, 'customer'),
(82, '02-Oct-2019', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(83, '02-Oct-2019', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(84, '02-Oct-2019', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(85, '02-Oct-2019', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(86, '05-Oct-2019', '/', 2, 'public'),
(87, '06-Oct-2019', '/', 7, 'public'),
(88, '06-Oct-2019', '/categories/view_item/ITEM_5d858c4bb7b18', 2, 'public'),
(89, '07-Oct-2019', '/', 2, 'public'),
(90, '08-Oct-2019', '/', 3, 'public'),
(91, '08-Oct-2019', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(92, '09-Oct-2019', '/', 2, 'public'),
(93, '10-Oct-2019', '/', 9, 'public'),
(94, '10-Oct-2019', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(95, '10-Oct-2019', '/categories', 2, 'public'),
(96, '10-Oct-2019', '/categories/Stationary', 2, 'public'),
(97, '10-Oct-2019', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(98, '10-Oct-2019', '/business/', 6, 'vendor'),
(99, '10-Oct-2019', '/business/items/all-item', 1, 'vendor'),
(100, '10-Oct-2019', '/business/items/all-item/edit/ITEM_5d58fd86d3dd1', 2, 'vendor'),
(101, '10-Oct-2019', '/business/items/all-item/edit/ITEM_5d58fd86d3dd1/Attributes', 1, 'vendor'),
(102, '10-Oct-2019', '/business/items/all-item/edit/ITEM_5d58fd86d3dd1/Item-Informations', 1, 'vendor'),
(103, '10-Oct-2019', '/business/items/all-item/edit/ITEM_5d58fd86d3dd1/Medias', 2, 'vendor'),
(104, '10-Oct-2019', '/business//logout', 2, 'vendor'),
(105, '10-Oct-2019', '/categories/view_item/ITEM_5d58fd86d3dd1', 2, 'public'),
(106, '11-Oct-2019', '/', 2, 'public'),
(107, '11-Oct-2019', '/categories/page/2', 1, 'public'),
(108, '14-Oct-2019', '/', 1, 'public'),
(109, '14-Oct-2019', '/login', 2, 'public'),
(110, '14-Oct-2019', '/customer/account/profile', 2, 'customer'),
(111, '14-Oct-2019', '/customer/cart', 3, 'customer'),
(112, '14-Oct-2019', '/categories/Books', 1, 'public'),
(113, '14-Oct-2019', '/customer/check_out', 1, 'customer'),
(114, '14-Oct-2019', '/customer/account/address', 1, 'customer'),
(115, '14-Oct-2019', '/customer/account', 1, 'customer'),
(116, '14-Oct-2019', '/customer/account/order', 1, 'customer'),
(117, '14-Oct-2019', '/customer/account/order/view_order/ORDER_ITEM_5d995b257d3b7', 1, 'customer'),
(118, '15-Oct-2019', '/login', 1, 'public'),
(119, '15-Oct-2019', '/', 1, 'public'),
(120, '17-Oct-2019', '/', 9, 'public'),
(121, '18-Oct-2019', '/', 3, 'public'),
(122, '19-Oct-2019', '/', 2, 'public'),
(123, '21-Oct-2019', '/', 2, 'public'),
(124, '22-Oct-2019', '/', 1, 'public'),
(125, '23-Oct-2019', '/', 4, 'public'),
(126, '25-Oct-2019', '/', 1, 'public'),
(127, '26-Oct-2019', '/', 4, 'public'),
(128, '26-Oct-2019', '/categories/Stationary', 1, 'public'),
(129, '28-Oct-2019', '/', 1, 'public'),
(130, '30-Oct-2019', '/', 1, 'public'),
(131, '02-Nov-2019', '/', 3, 'public'),
(132, '03-Nov-2019', '/', 1, 'public'),
(133, '03-Nov-2019', '/categories/Books', 1, 'public'),
(134, '04-Nov-2019', '/categories/Books', 2, 'public'),
(135, '05-Nov-2019', '/', 1, 'public'),
(136, '05-Nov-2019', '/categories/Books', 1, 'public'),
(137, '12-Nov-2019', '/', 1, 'public'),
(138, '13-Nov-2019', '/', 5, 'public'),
(139, '20-Nov-2019', '/', 2, 'public'),
(140, '21-Nov-2019', '/', 1, 'public'),
(141, '27-Nov-2019', '/', 2, 'public'),
(142, '28-Nov-2019', '/', 1, 'public'),
(143, '28-Nov-2019', '/', 1, 'public'),
(144, '28-Nov-2019', '/business/', 1, 'vendor'),
(145, '30-Nov-2019', '/business/', 3, 'vendor'),
(146, '30-Nov-2019', '/', 2, 'public'),
(147, '03-Dec-2019', '/', 1, 'public'),
(148, '05-Dec-2019', '/', 3, 'public'),
(149, '12-Dec-2019', '/', 1, 'public'),
(150, '13-Dec-2019', '/', 1, 'public'),
(151, '14-Dec-2019', '/', 1, 'public'),
(152, '15-Dec-2019', '/', 2, 'public'),
(153, '16-Dec-2019', '/', 1, 'public'),
(154, '17-Dec-2019', '/', 2, 'public'),
(155, '19-Dec-2019', '/', 3, 'public'),
(156, '20-Dec-2019', '/', 2, 'public'),
(157, '20-Dec-2019', '/contact_us', 2, 'public'),
(158, '21-Dec-2019', '/', 2, 'public'),
(159, '22-Dec-2019', '/', 1, 'public'),
(160, '23-Dec-2019', '/', 2, 'public'),
(161, '25-Dec-2019', '/', 2, 'public'),
(162, '25-Dec-2019', '/?C=S;O=A', 1, 'public'),
(163, '25-Dec-2019', '/?C=D;O=A', 1, 'public'),
(164, '26-Dec-2019', '/', 5, 'public'),
(165, '26-Dec-2019', '/about_us', 1, 'public'),
(166, '26-Dec-2019', '/business/', 1, 'vendor'),
(167, '26-Dec-2019', '/company/COMPANY_5d62545fa8f27', 1, 'public'),
(168, '26-Dec-2019', '/company/COMPANY_5d7334742a303', 1, 'public'),
(169, '27-Dec-2019', '/', 4, 'public'),
(170, '28-Dec-2019', '/', 2, 'public'),
(171, '28-Dec-2019', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(172, '28-Dec-2019', '/company/COMPANY_5d6254sadasdd', 1, 'public'),
(173, '28-Dec-2019', '/contact_us', 1, 'public'),
(174, '28-Dec-2019', '/about_us', 1, 'public'),
(175, '28-Dec-2019', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(176, '28-Dec-2019', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(177, '28-Dec-2019', '/business/', 1, 'vendor'),
(178, '28-Dec-2019', '/categories/view_item/ITEM_5d440a6ad50e0', 1, 'public'),
(179, '28-Dec-2019', '/company/COMPANY_5d62545fa8f27', 1, 'public'),
(180, '28-Dec-2019', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(181, '28-Dec-2019', '/company/COMPANY_5d7334742a303', 1, 'public'),
(182, '28-Dec-2019', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(183, '28-Dec-2019', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(184, '28-Dec-2019', '/categories/Clothes', 1, 'public'),
(185, '28-Dec-2019', '/categories/Clothes%20', 1, 'public'),
(186, '28-Dec-2019', '/categories/Clothes%20/page/1', 1, 'public'),
(187, '28-Dec-2019', '/categories/Clothes/page/1', 1, 'public'),
(188, '28-Dec-2019', '/categories/Electronic', 1, 'public'),
(189, '28-Dec-2019', '/categories/Electronic/page/1', 1, 'public'),
(190, '28-Dec-2019', '/categories/Electronic/page/2', 1, 'public'),
(191, '28-Dec-2019', '/categories/Others', 1, 'public'),
(192, '28-Dec-2019', '/categories/Others/page/1', 1, 'public'),
(193, '28-Dec-2019', '/categories/Stationary', 1, 'public'),
(194, '28-Dec-2019', '/categories/Stationary/page/1', 1, 'public'),
(195, '28-Dec-2019', '/categories/promotion', 1, 'public'),
(196, '28-Dec-2019', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(197, '28-Dec-2019', '/categories/view_item/ITEM_5d58fc5140500', 1, 'public'),
(198, '28-Dec-2019', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(199, '28-Dec-2019', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(200, '28-Dec-2019', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(201, '28-Dec-2019', '/categories/view_item/ITEM_5d721091e5f86', 1, 'public'),
(202, '28-Dec-2019', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(203, '28-Dec-2019', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(204, '28-Dec-2019', '/categories/view_item/ITEM_5d7df614c9902', 1, 'public'),
(205, '28-Dec-2019', '/categories/view_item/ITEM_5d7df9bdb70af', 1, 'public'),
(206, '28-Dec-2019', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(207, '28-Dec-2019', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(208, '28-Dec-2019', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(209, '28-Dec-2019', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(210, '28-Dec-2019', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(211, '28-Dec-2019', '/categories/view_item/ITEM_5dce090e68ac3', 1, 'public'),
(212, '29-Dec-2019', '/', 3, 'public'),
(213, '30-Dec-2019', '/', 4, 'public'),
(214, '31-Dec-2019', '/', 1, 'public'),
(215, '02-Jan-2020', '/', 4, 'public'),
(216, '02-Jan-2020', '/contact_us', 2, 'public'),
(217, '02-Jan-2020', '/tac', 1, 'public'),
(218, '02-Jan-2020', '/login', 1, 'public'),
(219, '02-Jan-2020', '/about_us', 1, 'public'),
(220, '03-Jan-2020', '/', 2, 'public'),
(221, '03-Jan-2020', '/categories', 1, 'public'),
(222, '03-Jan-2020', '/policies', 2, 'public'),
(223, '03-Jan-2020', '/business/', 2, 'vendor'),
(224, '03-Jan-2020', '/login', 1, 'public'),
(225, '03-Jan-2020', '/about_us', 1, 'public'),
(226, '03-Jan-2020', '/tac', 1, 'public'),
(227, '03-Jan-2020', '/contact_us', 1, 'public'),
(228, '04-Jan-2020', '/business/register', 1, 'vendor'),
(229, '04-Jan-2020', '/', 2, 'public'),
(230, '05-Jan-2020', '/policies', 3, 'public'),
(231, '05-Jan-2020', '/', 2, 'public'),
(232, '05-Jan-2020', '/login', 4, 'public'),
(233, '05-Jan-2020', '/index.php/admin/', 1, 'public'),
(234, '05-Jan-2020', '/tac', 1, 'public'),
(235, '06-Jan-2020', '/contact_us', 1, 'public'),
(236, '06-Jan-2020', '/', 3, 'public'),
(237, '06-Jan-2020', '/about_us', 2, 'public'),
(238, '06-Jan-2020', '/policies', 1, 'public'),
(239, '06-Jan-2020', '/categories', 1, 'public'),
(240, '06-Jan-2020', '/tac', 1, 'public'),
(241, '06-Jan-2020', '/categories/', 2, 'public'),
(242, '06-Jan-2020', '/categories/page/1', 2, 'public'),
(243, '07-Jan-2020', '/categories/page/4', 1, 'public'),
(244, '07-Jan-2020', '/', 6, 'public'),
(245, '07-Jan-2020', '/categories/Electronic', 1, 'public'),
(246, '07-Jan-2020', '/categories/page/2', 1, 'public'),
(247, '07-Jan-2020', '/categories/Others', 1, 'public'),
(248, '07-Jan-2020', '/categories/', 1, 'public'),
(249, '07-Jan-2020', '/tac', 1, 'public'),
(250, '08-Jan-2020', '/', 2, 'public'),
(251, '08-Jan-2020', '/tac', 1, 'public'),
(252, '09-Jan-2020', '/tac', 1, 'public'),
(253, '09-Jan-2020', '/', 2, 'public'),
(254, '10-Jan-2020', '/', 5, 'public'),
(255, '11-Jan-2020', '/', 4, 'public'),
(256, '11-Jan-2020', '/contact_us', 2, 'public'),
(257, '11-Jan-2020', '/?gf_page=upload', 1, 'public'),
(258, '11-Jan-2020', '/tac', 1, 'public'),
(259, '12-Jan-2020', '/', 10, 'public'),
(260, '12-Jan-2020', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(261, '12-Jan-2020', '/categories/view_item/ITEM_5d858c4bb7b18', 7, 'public'),
(262, '12-Jan-2020', '/login', 8, 'public'),
(263, '12-Jan-2020', '/contact_us', 1, 'public'),
(264, '12-Jan-2020', '/categories/Clothes', 1, 'public'),
(265, '12-Jan-2020', '/categories/Books', 2, 'public'),
(266, '12-Jan-2020', '/categories/Books/page/2', 1, 'public'),
(267, '12-Jan-2020', '/categories/search/usadasd', 1, 'public'),
(268, '12-Jan-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(269, '12-Jan-2020', '/categories/view_item/ITEM_5d44056f57e16', 2, 'public'),
(270, '13-Jan-2020', '/', 2, 'public'),
(271, '13-Jan-2020', '/login', 1, 'public'),
(272, '13-Jan-2020', '/policies', 1, 'public'),
(273, '13-Jan-2020', '//categories', 2, 'public'),
(274, '14-Jan-2020', '/', 1, 'public'),
(275, '15-Jan-2020', '/', 3, 'public'),
(276, '17-Jan-2020', '/', 2, 'public'),
(277, '18-Jan-2020', '/tac', 1, 'public'),
(278, '18-Jan-2020', '/', 2, 'public'),
(279, '19-Jan-2020', '/', 2, 'public'),
(280, '19-Jan-2020', '/index.php', 1, 'public'),
(281, '19-Jan-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 2, 'public'),
(282, '19-Jan-2020', '/login', 2, 'public'),
(283, '19-Jan-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(284, '21-Jan-2020', '/contact_us', 1, 'public'),
(285, '21-Jan-2020', '/', 2, 'public'),
(286, '22-Jan-2020', '/', 2, 'public'),
(287, '23-Jan-2020', '/', 7, 'public'),
(288, '23-Jan-2020', '/contact_us', 1, 'public'),
(289, '24-Jan-2020', '/', 3, 'public'),
(290, '24-Jan-2020', '/contact_us', 2, 'public'),
(291, '24-Jan-2020', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(292, '25-Jan-2020', '/categories', 1, 'public'),
(293, '25-Jan-2020', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(294, '25-Jan-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(295, '25-Jan-2020', '/categories/page/1', 1, 'public'),
(296, '25-Jan-2020', '/', 1, 'public'),
(297, '26-Jan-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(298, '26-Jan-2020', '/login', 1, 'public'),
(299, '26-Jan-2020', '/', 4, 'public'),
(300, '26-Jan-2020', '/policies', 1, 'public'),
(301, '26-Jan-2020', '/tac', 1, 'public'),
(302, '26-Jan-2020', '/categories', 1, 'public'),
(303, '26-Jan-2020', '/about_us', 1, 'public'),
(304, '26-Jan-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(305, '26-Jan-2020', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(306, '26-Jan-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(307, '27-Jan-2020', '/contact_us', 2, 'public'),
(308, '27-Jan-2020', '/categories/view_item/ITEM_5d7df9bdb70af', 2, 'public'),
(309, '27-Jan-2020', '/categories/', 2, 'public'),
(310, '27-Jan-2020', '/', 1, 'public'),
(311, '27-Jan-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(312, '27-Jan-2020', '/company/COMPANY_5d6254sadasdd', 1, 'public'),
(313, '27-Jan-2020', '/about_us', 1, 'public'),
(314, '27-Jan-2020', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(315, '27-Jan-2020', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(316, '27-Jan-2020', '/business/', 1, 'vendor'),
(317, '27-Jan-2020', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(318, '27-Jan-2020', '/company/COMPANY_5d62545fa8f27', 1, 'public'),
(319, '27-Jan-2020', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(320, '27-Jan-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(321, '27-Jan-2020', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(322, '27-Jan-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(323, '27-Jan-2020', '/categories/Clothes', 1, 'public'),
(324, '27-Jan-2020', '/categories/Clothes%20', 1, 'public'),
(325, '27-Jan-2020', '/categories/Clothes%20/page/1', 1, 'public'),
(326, '27-Jan-2020', '/categories/Clothes/page/1', 1, 'public'),
(327, '27-Jan-2020', '/categories/Electronic', 1, 'public'),
(328, '27-Jan-2020', '/categories/Electronic/page/1', 1, 'public'),
(329, '27-Jan-2020', '/categories/Electronic/page/2', 1, 'public'),
(330, '27-Jan-2020', '/categories/Others', 1, 'public'),
(331, '27-Jan-2020', '/categories/Others/page/1', 1, 'public'),
(332, '27-Jan-2020', '/categories/Stationary', 1, 'public'),
(333, '27-Jan-2020', '/categories/Stationary/page/1', 1, 'public'),
(334, '27-Jan-2020', '/categories/promotion', 1, 'public'),
(335, '27-Jan-2020', '/categories/view_item/ITEM_5d58fc5140500', 1, 'public'),
(336, '27-Jan-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(337, '27-Jan-2020', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(338, '27-Jan-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(339, '27-Jan-2020', '/categories/view_item/ITEM_5d721091e5f86', 1, 'public'),
(340, '27-Jan-2020', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(341, '27-Jan-2020', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(342, '27-Jan-2020', '/categories/view_item/ITEM_5d7df614c9902', 1, 'public'),
(343, '27-Jan-2020', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(344, '27-Jan-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(345, '27-Jan-2020', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(346, '27-Jan-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(347, '27-Jan-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(348, '27-Jan-2020', '/categories/view_item/ITEM_5dce090e68ac3', 1, 'public'),
(349, '27-Jan-2020', '/categories/view_item/ITEM_5e2016f6adb42', 1, 'public'),
(350, '28-Jan-2020', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(351, '28-Jan-2020', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(352, '28-Jan-2020', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(353, '28-Jan-2020', '/', 4, 'public'),
(354, '29-Jan-2020', '/categories/view_item/ITEM_5d72134964a01', 2, 'public'),
(355, '29-Jan-2020', '/', 1, 'public'),
(356, '29-Jan-2020', '/business/register', 1, 'vendor'),
(357, '30-Jan-2020', '/business/register', 3, 'vendor'),
(358, '30-Jan-2020', '/', 3, 'public'),
(359, '30-Jan-2020', '/forgot_password', 1, 'public'),
(360, '30-Jan-2020', '/login', 2, 'public'),
(361, '30-Jan-2020', '/categories/view_item/ITEM_5d81bc8380573', 2, 'public'),
(362, '30-Jan-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(363, '30-Jan-2020', '/contact_us', 2, 'public'),
(364, '30-Jan-2020', '/about_us', 1, 'public'),
(365, '30-Jan-2020', '/categories/Stationary', 2, 'public'),
(366, '31-Jan-2020', '/', 14, 'public'),
(367, '31-Jan-2020', '/business/register', 1, 'vendor'),
(368, '31-Jan-2020', '/categories/view_item/ITEM_5d440a6ad50e0', 1, 'public'),
(369, '31-Jan-2020', '/business/', 1, 'vendor'),
(370, '31-Jan-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(371, '31-Jan-2020', '/home/wp-admin/install.php', 2, 'public'),
(372, '31-Jan-2020', '/home/wp-admin/setup-config.php', 2, 'public'),
(373, '31-Jan-2020', '/categories', 1, 'public'),
(374, '31-Jan-2020', '/contact_us', 1, 'public'),
(375, '01-Feb-2020', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(376, '01-Feb-2020', '/', 5, 'public'),
(377, '02-Feb-2020', '/login', 1, 'public'),
(378, '02-Feb-2020', '/policies', 1, 'public'),
(379, '02-Feb-2020', '/categories/Others', 2, 'public'),
(380, '02-Feb-2020', '/business/', 1, 'vendor'),
(381, '02-Feb-2020', '/', 3, 'public'),
(382, '02-Feb-2020', '/categories/Electronic', 1, 'public'),
(383, '02-Feb-2020', '/categories/view_item/ITEM_5dce090e68ac3', 1, 'public'),
(384, '02-Feb-2020', '/categories/view_item/ITEM_5d7df9bdb70af', 1, 'public'),
(385, '03-Feb-2020', '/categories/page/4', 2, 'public'),
(386, '03-Feb-2020', '/categories/view_item/ITEM_5e2016f6adb42', 1, 'public'),
(387, '03-Feb-2020', '/', 5, 'public'),
(388, '03-Feb-2020', '/contact_us', 1, 'public'),
(389, '03-Feb-2020', '/about_us', 1, 'public'),
(390, '04-Feb-2020', '/categories/Electronic', 2, 'public'),
(391, '04-Feb-2020', '/categories/page/1', 1, 'public'),
(392, '04-Feb-2020', '/contact_us', 1, 'public'),
(393, '04-Feb-2020', '/categories/', 1, 'public'),
(394, '04-Feb-2020', '/business/', 2, 'vendor'),
(395, '04-Feb-2020', '/categories/page/4', 1, 'public'),
(396, '04-Feb-2020', '/categories', 1, 'public'),
(397, '04-Feb-2020', '/about_us', 7, 'public'),
(398, '04-Feb-2020', '/', 1, 'public'),
(399, '04-Feb-2020', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(400, '05-Feb-2020', '/', 3, 'public'),
(401, '05-Feb-2020', '/about_us', 7, 'public'),
(402, '05-Feb-2020', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(403, '05-Feb-2020', '/categories', 8, 'public'),
(404, '05-Feb-2020', '/forgot_password', 4, 'public'),
(405, '06-Feb-2020', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(406, '06-Feb-2020', '/forgot_password', 1, 'public'),
(407, '06-Feb-2020', '/', 2, 'public'),
(408, '06-Feb-2020', '/about_us', 2, 'public'),
(409, '06-Feb-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(410, '06-Feb-2020', '/login', 3, 'public'),
(411, '06-Feb-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 2, 'public'),
(412, '06-Feb-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(413, '07-Feb-2020', '/contact_us', 1, 'public'),
(414, '07-Feb-2020', '/', 4, 'public'),
(415, '07-Feb-2020', '/home/wp-login.php', 1, 'public'),
(416, '07-Feb-2020', '/login', 1, 'public'),
(417, '07-Feb-2020', '/categories', 1, 'public'),
(418, '08-Feb-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(419, '08-Feb-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(420, '08-Feb-2020', '/categories/Stationary', 2, 'public'),
(421, '09-Feb-2020', '/categories/Clothes', 1, 'public'),
(422, '09-Feb-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(423, '09-Feb-2020', '/company/COMPANY_5d62545fa8f27', 1, 'public'),
(424, '09-Feb-2020', '/categories/promotion', 1, 'public'),
(425, '09-Feb-2020', '/company/COMPANY_5d9ee8b5c185c', 3, 'public'),
(426, '09-Feb-2020', '/company/COMPANY_5d9ee8c7794eb', 1, 'public'),
(427, '09-Feb-2020', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(428, '09-Feb-2020', '/categories/Books', 2, 'public'),
(429, '09-Feb-2020', '/categories/Electronic', 1, 'public'),
(430, '09-Feb-2020', '/', 5, 'public'),
(431, '09-Feb-2020', '/login', 3, 'public'),
(432, '09-Feb-2020', '/categories/view_item/ITEM_5d7df614c9902', 1, 'public'),
(433, '09-Feb-2020', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(434, '09-Feb-2020', '/contact_us', 1, 'public'),
(435, '09-Feb-2020', '/tac', 1, 'public'),
(436, '10-Feb-2020', '/', 1, 'public'),
(437, '10-Feb-2020', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(438, '10-Feb-2020', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(439, '11-Feb-2020', '/categories/view_item/ITEM_5d440c4a88bf2', 5, 'public'),
(440, '11-Feb-2020', '/', 2, 'public'),
(441, '11-Feb-2020', '/contact_us', 1, 'public'),
(442, '11-Feb-2020', '/categories/page/1', 1, 'public'),
(443, '12-Feb-2020', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(444, '12-Feb-2020', '/', 3, 'public'),
(445, '12-Feb-2020', '/login', 1, 'public'),
(446, '12-Feb-2020', '/categories/view_item/ITEM_5d58fc5140500', 1, 'public'),
(447, '13-Feb-2020', '/', 9, 'public'),
(448, '13-Feb-2020', '/categories/view_item/ITEM_5d58fc5140500', 3, 'public'),
(449, '13-Feb-2020', '/tac', 3, 'public'),
(450, '13-Feb-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(451, '13-Feb-2020', '/login', 1, 'public'),
(452, '13-Feb-2020', '/forgot_password', 1, 'public'),
(453, '13-Feb-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(454, '14-Feb-2020', '/tac', 2, 'public'),
(455, '14-Feb-2020', '/policies', 1, 'public'),
(456, '14-Feb-2020', '/', 6, 'public'),
(457, '14-Feb-2020', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(458, '14-Feb-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(459, '14-Feb-2020', '/contact_us', 2, 'public'),
(460, '14-Feb-2020', '/company/COMPANY_5d9ee8c7794eb', 1, 'public'),
(461, '15-Feb-2020', '/', 11, 'public'),
(462, '15-Feb-2020', '/login', 2, 'public'),
(463, '15-Feb-2020', '/customer/account/profile', 1, 'customer'),
(464, '15-Feb-2020', '/customer/account/order', 1, 'customer'),
(465, '15-Feb-2020', '/customer/account/order/view_order/ORDER_ITEM_5e184a2072e05', 1, 'customer'),
(466, '15-Feb-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(467, '16-Feb-2020', '/tac', 1, 'public'),
(468, '16-Feb-2020', '/categories/view_item/ITEM_5d440a6ad50e0', 1, 'public'),
(469, '16-Feb-2020', '/policies', 3, 'public'),
(470, '16-Feb-2020', '/', 8, 'public'),
(471, '16-Feb-2020', '/categories/view_item/ITEM_5d7df614c9902', 7, 'public'),
(472, '16-Feb-2020', '/company/COMPANY_5d9ee8b5c185c', 3, 'public'),
(473, '16-Feb-2020', '/contact_us', 2, 'public'),
(474, '16-Feb-2020', '/company/COMPANY_5d6254sadasdd', 1, 'public'),
(475, '17-Feb-2020', '/company/COMPANY_5d62545fa8f27', 1, 'public'),
(476, '17-Feb-2020', '/categories/Others', 1, 'public'),
(477, '17-Feb-2020', '/tac', 1, 'public'),
(478, '17-Feb-2020', '/login', 2, 'public'),
(479, '17-Feb-2020', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(480, '17-Feb-2020', '/', 2, 'public'),
(481, '17-Feb-2020', '/categories/page/account-orders.html', 1, 'public'),
(482, '17-Feb-2020', '/categories/Stationary', 1, 'public'),
(483, '17-Feb-2020', '/categories/view_item/ITEM_5d721091e5f86', 1, 'public'),
(484, '17-Feb-2020', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(485, '18-Feb-2020', '/', 5, 'public'),
(486, '18-Feb-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(487, '18-Feb-2020', '/tac', 1, 'public'),
(488, '18-Feb-2020', '/business/', 1, 'vendor'),
(489, '19-Feb-2020', '/', 9, 'public'),
(490, '19-Feb-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(491, '19-Feb-2020', '/forgot_password', 1, 'public'),
(492, '19-Feb-2020', '/contact_us', 2, 'public'),
(493, '19-Feb-2020', '/categories/view_item/ITEM_5d58fc5140500', 1, 'public'),
(494, '20-Feb-2020', '/', 3, 'public'),
(495, '20-Feb-2020', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(496, '20-Feb-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(497, '21-Feb-2020', '/contact_us', 2, 'public'),
(498, '21-Feb-2020', '/', 8, 'public'),
(499, '21-Feb-2020', '/categories/Books', 1, 'public'),
(500, '21-Feb-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(501, '21-Feb-2020', '/login', 2, 'public'),
(502, '21-Feb-2020', '/customer/account/profile', 2, 'customer'),
(503, '21-Feb-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(504, '21-Feb-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(505, '21-Feb-2020', '/customer/account/address', 1, 'customer'),
(506, '21-Feb-2020', '/customer/cart', 2, 'customer'),
(507, '21-Feb-2020', '/customer/check_out', 1, 'customer'),
(508, '21-Feb-2020', '/customer/check_out/2', 1, 'customer'),
(509, '21-Feb-2020', '/customer/check_out/3', 1, 'customer'),
(510, '21-Feb-2020', '/categories', 1, 'public'),
(511, '21-Feb-2020', '/categories/view_item/ITEM_5d81bc8380573', 2, 'public'),
(512, '22-Feb-2020', '/', 7, 'public'),
(513, '22-Feb-2020', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(514, '22-Feb-2020', '/categories/view_item/ITEM_5e2016f6adb42', 1, 'public'),
(515, '22-Feb-2020', '/contact_us', 1, 'public'),
(516, '23-Feb-2020', '/categories/view_item/ITEM_5d7df614c9902', 1, 'public'),
(517, '23-Feb-2020', '/about_us', 1, 'public'),
(518, '23-Feb-2020', '/', 6, 'public'),
(519, '23-Feb-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(520, '23-Feb-2020', '/company/COMPANY_5d62545fa8f27', 1, 'public'),
(521, '23-Feb-2020', '/login', 1, 'public'),
(522, '23-Feb-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(523, '23-Feb-2020', '/categories/Electronic', 1, 'public'),
(524, '24-Feb-2020', '/categories/', 1, 'public'),
(525, '24-Feb-2020', '/', 6, 'public'),
(526, '24-Feb-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(527, '24-Feb-2020', '/contact_us', 1, 'public'),
(528, '24-Feb-2020', '/about_us', 1, 'public'),
(529, '24-Feb-2020', '/login', 1, 'public'),
(530, '24-Feb-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(531, '24-Feb-2020', '/categories/view_item/ITEM_5d7df9bdb70af', 1, 'public'),
(532, '24-Feb-2020', '/categories/view_item/ITEM_5d7df614c9902', 1, 'public'),
(533, '24-Feb-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(534, '24-Feb-2020', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(535, '24-Feb-2020', '/categories/Stationary', 1, 'public'),
(536, '24-Feb-2020', '/categories/Clothes', 1, 'public'),
(537, '24-Feb-2020', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(538, '24-Feb-2020', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(539, '24-Feb-2020', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(540, '24-Feb-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(541, '24-Feb-2020', '/categories/Books', 1, 'public'),
(542, '24-Feb-2020', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(543, '24-Feb-2020', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(544, '24-Feb-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(545, '25-Feb-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(546, '25-Feb-2020', '/', 5, 'public'),
(547, '25-Feb-2020', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(548, '25-Feb-2020', '/categories/view_item/ITEM_5d7df9bdb70af', 1, 'public'),
(549, '26-Feb-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(550, '26-Feb-2020', '/forgot_password', 1, 'public'),
(551, '26-Feb-2020', '/categories/view_item/ITEM_5d721091e5f86', 1, 'public'),
(552, '26-Feb-2020', '/', 5, 'public'),
(553, '26-Feb-2020', '/tac', 1, 'public'),
(554, '26-Feb-2020', '/categories/page/1', 1, 'public'),
(555, '26-Feb-2020', '/categories/view_item/ITEM_5d58fc5140500', 1, 'public'),
(556, '27-Feb-2020', '/', 5, 'public'),
(557, '27-Feb-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(558, '27-Feb-2020', '/login', 1, 'public'),
(559, '27-Feb-2020', '/contact_us', 4, 'public'),
(560, '28-Feb-2020', '/categories/page/1', 1, 'public'),
(561, '28-Feb-2020', '/', 2, 'public'),
(562, '29-Feb-2020', '/', 5, 'public'),
(563, '29-Feb-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(564, '29-Feb-2020', '/company/COMPANY_5d6254sadasdd', 1, 'public'),
(565, '29-Feb-2020', '/contact_us', 1, 'public'),
(566, '29-Feb-2020', '/about_us', 1, 'public'),
(567, '29-Feb-2020', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(568, '29-Feb-2020', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(569, '29-Feb-2020', '/business/', 1, 'vendor'),
(570, '29-Feb-2020', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(571, '29-Feb-2020', '/company/COMPANY_5d62545fa8f27', 1, 'public'),
(572, '29-Feb-2020', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(573, '29-Feb-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(574, '29-Feb-2020', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(575, '29-Feb-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(576, '29-Feb-2020', '/categories/Clothes', 1, 'public'),
(577, '29-Feb-2020', '/categories/Clothes%20', 1, 'public'),
(578, '29-Feb-2020', '/categories/Clothes%20/page/1', 1, 'public'),
(579, '29-Feb-2020', '/categories/Clothes/page/1', 1, 'public'),
(580, '29-Feb-2020', '/categories/Electronic', 1, 'public'),
(581, '29-Feb-2020', '/categories/Electronic/page/1', 1, 'public'),
(582, '29-Feb-2020', '/categories/Electronic/page/2', 1, 'public'),
(583, '29-Feb-2020', '/categories/Others', 1, 'public'),
(584, '29-Feb-2020', '/categories/Others/page/1', 1, 'public'),
(585, '29-Feb-2020', '/categories/Stationary', 1, 'public'),
(586, '29-Feb-2020', '/categories/Stationary/page/1', 1, 'public'),
(587, '29-Feb-2020', '/categories/promotion', 1, 'public'),
(588, '29-Feb-2020', '/categories/view_item/ITEM_5d58fc5140500', 1, 'public'),
(589, '29-Feb-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(590, '29-Feb-2020', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(591, '29-Feb-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(592, '29-Feb-2020', '/categories/view_item/ITEM_5d721091e5f86', 1, 'public'),
(593, '29-Feb-2020', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(594, '29-Feb-2020', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(595, '29-Feb-2020', '/categories/view_item/ITEM_5d7df614c9902', 1, 'public'),
(596, '29-Feb-2020', '/categories/view_item/ITEM_5d7df9bdb70af', 1, 'public'),
(597, '29-Feb-2020', '/categories/view_item/ITEM_5d81bc8380573', 1, 'public'),
(598, '29-Feb-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(599, '29-Feb-2020', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(600, '29-Feb-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(601, '29-Feb-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(602, '29-Feb-2020', '/categories/view_item/ITEM_5dce090e68ac3', 2, 'public'),
(603, '29-Feb-2020', '/categories/view_item/ITEM_5e2016f6adb42', 1, 'public'),
(604, '29-Feb-2020', '/categories/page/1', 1, 'public'),
(605, '29-Feb-2020', '/company/COMPANY_5d9ee8c7794eb', 1, 'public'),
(606, '01-Mar-2020', '/', 9, 'public'),
(607, '01-Mar-2020', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(608, '02-Mar-2020', '/categories/page/1', 1, 'public'),
(609, '02-Mar-2020', '/', 5, 'public'),
(610, '02-Mar-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(611, '02-Mar-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(612, '03-Mar-2020', '/', 7, 'public'),
(613, '03-Mar-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(614, '04-Mar-2020', '/', 5, 'public'),
(615, '04-Mar-2020', '/categories/view_item/ITEM_5d721091e5f86', 1, 'public'),
(616, '04-Mar-2020', '/categories/Clothes', 1, 'public'),
(617, '05-Mar-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(618, '05-Mar-2020', '/categories/view_item/ITEM_5d5f70451e66a', 1, 'public'),
(619, '05-Mar-2020', '/', 7, 'public'),
(620, '05-Mar-2020', '/company/COMPANY_5e20167d80545', 1, 'public'),
(621, '05-Mar-2020', '/categories/Electronic', 1, 'public'),
(622, '06-Mar-2020', '/', 3, 'public'),
(623, '06-Mar-2020', '/policies', 1, 'public'),
(624, '07-Mar-2020', '/', 8, 'public'),
(625, '07-Mar-2020', '/business/register', 1, 'vendor'),
(626, '07-Mar-2020', '/categories/Stationary', 1, 'public'),
(627, '07-Mar-2020', '/business/', 1, 'vendor'),
(628, '07-Mar-2020', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(629, '07-Mar-2020', '/categories/view_item/ITEM_5e2016f6adb42', 1, 'public'),
(630, '08-Mar-2020', '/', 10, 'public'),
(631, '08-Mar-2020', '/categories/view_item/ITEM_5d7df614c9902', 3, 'public'),
(632, '08-Mar-2020', '/categories/view_item/ITEM_5e61af1c62b68/New%20brand%20T-SHIRT', 1, 'public'),
(633, '08-Mar-2020', '/login', 2, 'public'),
(634, '08-Mar-2020', '/company/COMPANY_5d9ee8b5c185c', 2, 'public'),
(635, '08-Mar-2020', '/tac', 1, 'public'),
(636, '09-Mar-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(637, '09-Mar-2020', '/', 3, 'public'),
(638, '09-Mar-2020', '/business/register', 1, 'vendor'),
(639, '09-Mar-2020', '/business/', 1, 'vendor'),
(640, '09-Mar-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(641, '09-Mar-2020', '/categories/view_item/ITEM_5d81d5a814062', 1, 'public'),
(642, '09-Mar-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(643, '10-Mar-2020', '/', 6, 'public'),
(644, '10-Mar-2020', '/categories/page/4', 1, 'public'),
(645, '10-Mar-2020', '/login', 2, 'public'),
(646, '10-Mar-2020', '/contact_us', 4, 'public'),
(647, '10-Mar-2020', '/categories/Electronic', 2, 'public'),
(648, '11-Mar-2020', '/login', 1, 'public'),
(649, '11-Mar-2020', '/categories/Others', 1, 'public'),
(650, '11-Mar-2020', '/', 9, 'public'),
(651, '11-Mar-2020', '/business/', 1, 'vendor'),
(652, '11-Mar-2020', '/categories/page/4', 2, 'public'),
(653, '11-Mar-2020', '/home/', 1, 'public'),
(654, '11-Mar-2020', '/categories/Electronic', 1, 'public'),
(655, '11-Mar-2020', '/categories/view_item/ITEM_5d7df9bdb70af', 1, 'public'),
(656, '11-Mar-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(657, '12-Mar-2020', '/', 11, 'public'),
(658, '12-Mar-2020', '/contact_us', 1, 'public'),
(659, '12-Mar-2020', '/policies', 1, 'public'),
(660, '12-Mar-2020', '/tac', 1, 'public'),
(661, '12-Mar-2020', '/about_us', 1, 'public'),
(662, '12-Mar-2020', '/login', 2, 'public'),
(663, '12-Mar-2020', '/categories', 2, 'public'),
(664, '12-Mar-2020', '/categories/Clothes', 1, 'public'),
(665, '12-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09/Abacus%20-%2023Rod%20(Brown)', 1, 'public'),
(666, '12-Mar-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(667, '12-Mar-2020', '/categories/Books', 1, 'public'),
(668, '12-Mar-2020', '/categories/Electronic', 1, 'public'),
(669, '12-Mar-2020', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(670, '13-Mar-2020', '/categories/promotion', 1, 'public'),
(671, '13-Mar-2020', '/categories/Electronic', 1, 'public'),
(672, '13-Mar-2020', '/', 7, 'public'),
(673, '14-Mar-2020', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(674, '14-Mar-2020', '/categories/Others', 1, 'public'),
(675, '14-Mar-2020', '/tac', 2, 'public'),
(676, '14-Mar-2020', '/', 6, 'public'),
(677, '14-Mar-2020', '/contact_us', 2, 'public'),
(678, '15-Mar-2020', '/', 7, 'public'),
(679, '15-Mar-2020', '/policies', 1, 'public'),
(680, '15-Mar-2020', '/categories/view_item/ITEM_5d44056f57e16', 1, 'public'),
(681, '15-Mar-2020', '/contact_us', 2, 'public'),
(682, '16-Mar-2020', '/', 5, 'public'),
(683, '16-Mar-2020', '/about_us', 1, 'public'),
(684, '16-Mar-2020', '/categories', 1, 'public'),
(685, '16-Mar-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(686, '17-Mar-2020', '/', 4, 'public'),
(687, '17-Mar-2020', '/categories', 2, 'public'),
(688, '17-Mar-2020', '/about_us', 1, 'public'),
(689, '17-Mar-2020', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(690, '17-Mar-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(691, '18-Mar-2020', '/contact_us', 2, 'public'),
(692, '18-Mar-2020', '/', 6, 'public'),
(693, '19-Mar-2020', '/', 6, 'public'),
(694, '19-Mar-2020', '/contact_us', 3, 'public'),
(695, '19-Mar-2020', '/categories/view_item/ITEM_5e2016f6adb42', 1, 'public'),
(696, '19-Mar-2020', '/about_us', 1, 'public'),
(697, '20-Mar-2020', '/policies', 1, 'public'),
(698, '20-Mar-2020', '/categories/view_item/ITEM_5d44089f44281', 1, 'public'),
(699, '20-Mar-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(700, '20-Mar-2020', '/categories/view_item/ITEM_5d7df614c9902', 1, 'public'),
(701, '20-Mar-2020', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(702, '20-Mar-2020', '/categories/page/1', 1, 'public'),
(703, '20-Mar-2020', '/contact_us', 1, 'public'),
(704, '20-Mar-2020', '/', 5, 'public'),
(705, '21-Mar-2020', '/', 5, 'public'),
(706, '21-Mar-2020', '/categories/view_item/ITEM_5dce090e68ac3', 1, 'public'),
(707, '21-Mar-2020', '/categories/view_item/ITEM_5d440c4a88bf2', 1, 'public'),
(708, '21-Mar-2020', '/tac', 1, 'public'),
(709, '22-Mar-2020', '/policies', 1, 'public'),
(710, '22-Mar-2020', '/', 4, 'public'),
(711, '22-Mar-2020', '/company/COMPANY_5d6254sadasdd', 1, 'public'),
(712, '23-Mar-2020', '/categories', 1, 'public'),
(713, '23-Mar-2020', '/categories/Clothes', 1, 'public'),
(714, '23-Mar-2020', '/', 9, 'public'),
(715, '23-Mar-2020', '/categories/view_item/ITEM_5d858c4bb7b18', 1, 'public'),
(716, '23-Mar-2020', '/about_us', 1, 'public'),
(717, '23-Mar-2020', '/contact_us', 2, 'public'),
(718, '23-Mar-2020', '/categories/Stationary', 1, 'public'),
(719, '23-Mar-2020', '/categories/view_item/ITEM_5d720e6473944', 1, 'public'),
(720, '24-Mar-2020', '/categories/view_item/ITEM_5d7211a911f14', 1, 'public'),
(721, '24-Mar-2020', '/categories/page/1', 1, 'public'),
(722, '24-Mar-2020', '/', 6, 'public'),
(723, '24-Mar-2020', '/categories/view_item/ITEM_5d72134964a01', 1, 'public'),
(724, '25-Mar-2020', '/', 9, 'public'),
(725, '25-Mar-2020', '/contact_us', 2, 'public'),
(726, '25-Mar-2020', '/categories/view_item/ITEM_5e61af1c62b68/New%20brand%20T-SHIRT', 1, 'public'),
(727, '25-Mar-2020', '/tac', 2, 'public'),
(728, '25-Mar-2020', '/categories', 2, 'public'),
(729, '25-Mar-2020', '/login', 2, 'public'),
(730, '25-Mar-2020', '/categories/Stationary', 2, 'public'),
(731, '25-Mar-2020', '/categories/promotion', 2, 'public'),
(732, '25-Mar-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(733, '25-Mar-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(734, '25-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09/Abacus%20-%2023Rod%20(Brown)', 1, 'public'),
(735, '25-Mar-2020', '/about_us', 3, 'public'),
(736, '25-Mar-2020', '/company/COMPANY_5e6c762b57a60', 2, 'public'),
(737, '25-Mar-2020', '/policies', 2, 'public'),
(738, '25-Mar-2020', '/business/', 2, 'vendor'),
(739, '25-Mar-2020', '/categories/Clothes', 2, 'public'),
(740, '25-Mar-2020', '/business/register', 2, 'vendor'),
(741, '25-Mar-2020', '/company/account-orders.html', 2, 'public'),
(742, '25-Mar-2020', '/business/register/PACKAGE5D7320D1A76A7', 2, 'vendor'),
(743, '25-Mar-2020', '/categories/Others', 2, 'public'),
(744, '25-Mar-2020', '/categories/Stationary/page/1', 2, 'public'),
(745, '25-Mar-2020', '/categories/Stationary/page/account-orders.html', 2, 'public'),
(746, '25-Mar-2020', '/categories/account-orders.html', 2, 'public'),
(747, '25-Mar-2020', '/categories/', 2, 'public'),
(748, '25-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(749, '25-Mar-2020', '/categories/view_item/account-orders.html', 2, 'public'),
(750, '25-Mar-2020', '/categories/page/1', 2, 'public'),
(751, '25-Mar-2020', '/categories/page/account-orders.html', 2, 'public'),
(752, '25-Mar-2020', '/categories/Books', 2, 'public'),
(753, '25-Mar-2020', '/categories/Electronic', 2, 'public'),
(754, '25-Mar-2020', '/categories/Books/page/1', 2, 'public'),
(755, '25-Mar-2020', '/categories/Books/page/account-orders.html', 2, 'public'),
(756, '25-Mar-2020', '/categories/Electronic/page/1', 2, 'public'),
(757, '25-Mar-2020', '/categories/Electronic/page/account-orders.html', 2, 'public'),
(758, '25-Mar-2020', '/password_recovery', 2, 'public'),
(759, '25-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09/account-orders.html', 1, 'public'),
(760, '25-Mar-2020', '/categories/view_item/ITEM_5e61af1c62b68/account-orders.html', 1, 'public'),
(761, '25-Mar-2020', '/categories/Others/page/1', 1, 'public'),
(762, '25-Mar-2020', '/categories/Clothes/page/1', 1, 'public'),
(763, '25-Mar-2020', '/categories/Clothes/page/account-orders.html', 1, 'public'),
(764, '25-Mar-2020', '/categories/Others/page/account-orders.html', 1, 'public'),
(765, '25-Mar-2020', '/categories/view_item/ITEM_5e61af1c62b68', 1, 'public'),
(766, '25-Mar-2020', '/forgot_password', 1, 'public'),
(767, '26-Mar-2020', '/', 7, 'public'),
(768, '26-Mar-2020', '/tac', 1, 'public'),
(769, '26-Mar-2020', '/categories/view_item/ITEM_5d81d1599221e', 1, 'public'),
(770, '26-Mar-2020', '/categories/view_item/ITEM_5d440a18b0b12', 1, 'public'),
(771, '27-Mar-2020', '/categories/page/account-orders.html', 1, 'public'),
(772, '27-Mar-2020', '/policies', 2, 'public'),
(773, '27-Mar-2020', '/', 4, 'public'),
(774, '27-Mar-2020', '/categories/view_item/ITEM_5dce090e68ac3', 1, 'public'),
(775, '28-Mar-2020', '/tac', 1, 'public'),
(776, '28-Mar-2020', '/', 2, 'public'),
(777, '28-Mar-2020', '/categories/view_item/ITEM_5d58fd86d3dd1', 1, 'public'),
(778, '28-Mar-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(779, '29-Mar-2020', '/', 7, 'public'),
(780, '29-Mar-2020', '/categories/view_item/ITEM_5d58fc5140500', 1, 'public'),
(781, '29-Mar-2020', '/categories/view_item/ITEM_5d440ca8c0442', 1, 'public'),
(782, '29-Mar-2020', '/home/', 1, 'public'),
(783, '29-Mar-2020', '/categories/page/1', 1, 'public'),
(784, '30-Mar-2020', '/', 7, 'public'),
(785, '30-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09/Abacus%20-%2023Rod%20(Brown)', 1, 'public'),
(786, '30-Mar-2020', '/contact_us', 1, 'public'),
(787, '30-Mar-2020', '/about_us', 1, 'public'),
(788, '30-Mar-2020', '/categories/view_item/ITEM_5e61af1c62b68/New%20brand%20T-SHIRT', 1, 'public'),
(789, '30-Mar-2020', '/business/', 1, 'vendor'),
(790, '30-Mar-2020', '/company/COMPANY_5d7334742a303', 1, 'public'),
(791, '30-Mar-2020', '/company/COMPANY_5d9ee8b5c185c', 1, 'public'),
(792, '30-Mar-2020', '/company/COMPANY_5e6c762b57a60', 1, 'public'),
(793, '30-Mar-2020', '/categories/Clothes', 1, 'public'),
(794, '30-Mar-2020', '/categories/Clothes%20', 1, 'public'),
(795, '30-Mar-2020', '/categories/Clothes%20/page/1', 1, 'public'),
(796, '30-Mar-2020', '/categories/Clothes/page/1', 1, 'public'),
(797, '30-Mar-2020', '/categories/Electronic', 1, 'public'),
(798, '30-Mar-2020', '/categories/Electronic/page/1', 1, 'public'),
(799, '30-Mar-2020', '/categories/Others', 1, 'public'),
(800, '30-Mar-2020', '/categories/Others/page/1', 1, 'public'),
(801, '30-Mar-2020', '/categories/Stationary', 1, 'public'),
(802, '30-Mar-2020', '/categories/Stationary/page/1', 1, 'public'),
(803, '30-Mar-2020', '/categories/promotion', 1, 'public'),
(804, '30-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(805, '30-Mar-2020', '/categories/view_item/ITEM_5e61af1c62b68', 1, 'public'),
(806, '30-Mar-2020', '/company/account-orders.html', 1, 'public'),
(807, '30-Mar-2020', '/tac', 1, 'public'),
(808, '30-Mar-2020', '/categories', 1, 'public'),
(809, '30-Mar-2020', '/categories/page/1', 1, 'public'),
(810, '30-Mar-2020', '/categories/Books', 1, 'public'),
(811, '30-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09/account-orders.html', 1, 'public'),
(812, '30-Mar-2020', '/categories/view_item/ITEM_5e61af1c62b68/account-orders.html', 1, 'public'),
(813, '30-Mar-2020', '/categories/view_item/ITEM_5d834d3247d0f', 1, 'public'),
(814, '31-Mar-2020', '/categories/view_item/ITEM_5d9ec6774ee09', 1, 'public'),
(815, '31-Mar-2020', '/tac', 2, 'public'),
(816, '31-Mar-2020', '/policies', 1, 'public'),
(817, '31-Mar-2020', '/', 1, 'public'),
(818, '31-Mar-2020', '/login', 1, 'public'),
(819, '31-Mar-2020', '/categories/', 1, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `i_id` int(11) NOT NULL,
  `i_portal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_invoiceLogo` text COLLATE utf8_unicode_ci NOT NULL,
  `i_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_regno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_email` text COLLATE utf8_unicode_ci NOT NULL,
  `i_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `i_address` text COLLATE utf8_unicode_ci NOT NULL,
  `i_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `i_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `i_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_logo` text COLLATE utf8_unicode_ci NOT NULL,
  `i_mobileLogo` text COLLATE utf8_unicode_ci NOT NULL,
  `i_title` text COLLATE utf8_unicode_ci NOT NULL,
  `i_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `i_description` text COLLATE utf8_unicode_ci NOT NULL,
  `i_contact_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_bcc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`i_id`, `i_portal`, `i_invoiceLogo`, `i_name`, `i_regno`, `i_email`, `i_phone`, `i_address`, `i_url`, `i_status`, `i_date`, `i_time`, `i_user`, `i_fax`, `i_logo`, `i_mobileLogo`, `i_title`, `i_author`, `i_keyword`, `i_description`, `i_contact_email`, `i_bcc`) VALUES
(4, 'MY', '1567092569-ec_i_logo.JPG', 'Intelligent Ecommerce', '1158583-U', 'admin@intelhost.com.my', '+607-521 1178 / +6012-283 6731', 'No. 23A, 25A Jalan Kebudayaan 16, Taman Universiti, 81300 Skudai, Johor Bahru West Malaysia.', 'https://www.mypro-intelligent.com', 1, '14-Feb-2020', '1581703856', '10', '+607-521 1173', '1564846414-1.png', '1564858334-Ecommercex00logox00255x255x00pixel.png', 'Intelligent Ecommerce - Online Shop', 'Intelligent Ecommerce - Online Shop', 'Intelligent Ecommerce - Online Shop', 'e-Commerce, also known as e-Business, or electronic business, is simply the sale and purchase of services and goods over an electronic medium, like the Internet. It also involves electronically transferring data and funds between two or more parties. Simply put, it is online shopping as we commonly know it.', 'support@intelhost.com.my', 'intelhost2u@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `i_description` text NOT NULL,
  `i_content` text NOT NULL,
  `i_tag` text NOT NULL,
  `i_quantity` int(11) NOT NULL,
  `i_category` int(11) NOT NULL,
  `i_client` int(11) NOT NULL,
  `i_inventory` varchar(255) NOT NULL,
  `i_price` double NOT NULL,
  `i_length_type` double NOT NULL,
  `i_weight` double NOT NULL,
  `i_user` varchar(255) NOT NULL,
  `i_date` varchar(255) NOT NULL,
  `i_time` int(15) NOT NULL,
  `i_order` int(11) NOT NULL,
  `i_key` text NOT NULL,
  `i_status` int(11) NOT NULL,
  `i_code` text NOT NULL,
  `i_company` int(11) NOT NULL,
  `i_vidUrl` text NOT NULL,
  `i_currency` varchar(255) NOT NULL,
  `i_height` double NOT NULL,
  `i_width` double NOT NULL,
  `i_length` double NOT NULL,
  `i_sku` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_name`, `i_description`, `i_content`, `i_tag`, `i_quantity`, `i_category`, `i_client`, `i_inventory`, `i_price`, `i_length_type`, `i_weight`, `i_user`, `i_date`, `i_time`, `i_order`, `i_key`, `i_status`, `i_code`, `i_company`, `i_vidUrl`, `i_currency`, `i_height`, `i_width`, `i_length`, `i_sku`) VALUES
(53, 'Abacus - 23Rod (Brown)', '', '', '', 0, 3, 107, '', 20, 0, 0.139, '', '10-Oct-2019', 1570715383, 1, 'ITEM_5d9ec6774ee09', 1, 'COMPANY_5d9ee8b5c185c', 30, '', '', 1.4, 6.4, 32.7, 'pc'),
(62, 'ABC ', '', '', '', 0, 6, 111, '', 15, 0, 0.8, '', '15-Mar-2020', 1584295331, 0, 'ITEM_5e6dfd23b1208', 0, 'COMPANY_5e6c762b57a60', 34, '', '', 15, 5, 12, ''),
(61, 'New brand T-SHIRT', '', '', '', 0, 4, 93, '', 10, 0, 0.3, '', '06-Mar-2020', 1583488924, 1, 'ITEM_5e61af1c62b68', 1, 'COMPANY_5d7334742a303', 1, '', '', 10, 49, 129, '');

-- --------------------------------------------------------

--
-- Table structure for table `item_attribute`
--

CREATE TABLE `item_attribute` (
  `ia_id` int(11) NOT NULL,
  `ia_item` int(11) NOT NULL,
  `ia_attribute` int(11) NOT NULL,
  `ia_value` text NOT NULL,
  `ia_name` varchar(255) NOT NULL,
  `ia_order` int(11) NOT NULL,
  `ia_user` varchar(255) NOT NULL,
  `ia_date` varchar(100) NOT NULL,
  `ia_time` int(15) NOT NULL,
  `ia_key` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_attribute`
--

INSERT INTO `item_attribute` (`ia_id`, `ia_item`, `ia_attribute`, `ia_value`, `ia_name`, `ia_order`, `ia_user`, `ia_date`, `ia_time`, `ia_key`) VALUES
(19, 53, 0, 'High Quality', 'Plastic', 0, '', '10-Oct-2019', 1570716384, 'ATTRIBUTE_5d9eca60e1644');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `ic_id` int(11) NOT NULL,
  `ic_item` int(11) NOT NULL,
  `ic_category` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`ic_id`, `ic_item`, `ic_category`) VALUES
(48, 53, 3),
(57, 62, 6),
(56, 61, 4);

-- --------------------------------------------------------

--
-- Table structure for table `item_detail`
--

CREATE TABLE `item_detail` (
  `id_id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_detail` text NOT NULL,
  `id_time` int(15) NOT NULL,
  `id_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_detail`
--

INSERT INTO `item_detail` (`id_id`, `id_item`, `id_detail`, `id_time`, `id_date`) VALUES
(26, 53, '<h2 style=\"margin-left:0px; margin-right:0px; text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Georgia,serif\"><span style=\"color:#000000\">Our brand new abacus is <strong>23-rod</strong>. It can be used to calculate more numbers than the normal one at the same time.</span><br />\n<br />\n<span style=\"color:#000000\">We make sure everything we do honors that quality &ndash; from our commitment to the highest quality abacus in the production field, to the way we engage with our customers to do business responsibly.</span></span></span></h2>\n', 1570715552, '10-Oct-2019'),
(30, 61, '', 1583489233, '06-Mar-2020');

-- --------------------------------------------------------

--
-- Table structure for table `item_fees`
--

CREATE TABLE `item_fees` (
  `if_id` int(11) NOT NULL,
  `if_item` int(11) NOT NULL,
  `if_name` varchar(255) NOT NULL,
  `if_type` int(11) NOT NULL,
  `if_value` double NOT NULL,
  `if_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_option`
--

CREATE TABLE `item_option` (
  `io_id` int(11) NOT NULL,
  `io_group` int(11) NOT NULL,
  `io_name` varchar(255) NOT NULL,
  `io_type` int(11) NOT NULL,
  `io_icon_type` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `io_item` int(11) NOT NULL,
  `io_key` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_option`
--

INSERT INTO `item_option` (`io_id`, `io_group`, `io_name`, `io_type`, `io_icon_type`, `icon`, `io_item`, `io_key`) VALUES
(41, 0, 'Quantity', 2, 0, '', 61, 'ITEM_OPTION_5e61afab67df3');

-- --------------------------------------------------------

--
-- Table structure for table `item_option_group`
--

CREATE TABLE `item_option_group` (
  `iog_id` int(11) NOT NULL,
  `iog_name` varchar(255) NOT NULL,
  `iog_description` text NOT NULL,
  `iog_client` varchar(255) NOT NULL,
  `iog_icon_type` int(11) NOT NULL,
  `iog_icon` varchar(255) NOT NULL,
  `iog_user` varchar(255) NOT NULL,
  `iog_date` varchar(255) NOT NULL,
  `iog_time` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_option_group_item`
--

CREATE TABLE `item_option_group_item` (
  `iogi_id` int(11) NOT NULL,
  `iogi_group` int(11) NOT NULL,
  `iogi_item` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_option_value`
--

CREATE TABLE `item_option_value` (
  `iov_id` int(11) NOT NULL,
  `iov_option` int(11) NOT NULL,
  `iov_value` text NOT NULL,
  `iov_name` varchar(255) NOT NULL,
  `iov_description` text NOT NULL,
  `iov_icon_type` int(11) NOT NULL,
  `iov_icon` varchar(255) NOT NULL,
  `iov_shipping` int(11) NOT NULL,
  `iov_price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_option_value`
--

INSERT INTO `item_option_value` (`iov_id`, `iov_option`, `iov_value`, `iov_name`, `iov_description`, `iov_icon_type`, `iov_icon`, `iov_shipping`, `iov_price`) VALUES
(129, 41, '500 units', '', '', 0, '', 0, 3000),
(128, 41, '200 units', '', '', 0, '', 0, 1500),
(127, 41, '100 units', '', '', 0, '', 0, 800);

-- --------------------------------------------------------

--
-- Table structure for table `item_picture`
--

CREATE TABLE `item_picture` (
  `ip_id` int(11) NOT NULL,
  `ip_item` int(11) NOT NULL,
  `ip_file` text NOT NULL,
  `ip_user` varchar(255) NOT NULL,
  `ip_date` varchar(255) NOT NULL,
  `ip_time` int(15) NOT NULL,
  `ip_logo` text NOT NULL,
  `ip_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_picture`
--

INSERT INTO `item_picture` (`ip_id`, `ip_item`, `ip_file`, `ip_user`, `ip_date`, `ip_time`, `ip_logo`, `ip_order`) VALUES
(171, 61, '1583488939-bdefcbc72735f64db17f3250b1e64245.png', '', '06-Mar-2020', 1583488941, '', 1),
(150, 53, '1570716541-15578206_1817873095136486_558433582708917717_o_1817873095136486.jpg', '', '10-Oct-2019', 1570716541, '', 3),
(151, 53, '1570716559-17834035_1872971126293349_1053107198068982271_o_1872971126293349.jpg', '', '10-Oct-2019', 1570716559, '', 4),
(152, 53, '1570716663-23755101_1976251939298600_4574006247803412116_n_1976251939298600.jpg', '', '10-Oct-2019', 1570716663, '', 2),
(154, 53, '1570716919-16797682_1847878715469257_6752305101446258452_o_1847878715469257.png', '', '10-Oct-2019', 1570716919, '', 1),
(155, 53, '1570716927-16819128_1847879982135797_7243196012711117470_o_1847879982135797.png', '', '10-Oct-2019', 1570716927, '', 0),
(156, 53, '1570716933-16938980_1853686251555170_4839592442756299379_n_1853686251555170.jpg', '', '10-Oct-2019', 1570716933, '', 5),
(157, 53, '1570716938-16997710_1853686738221788_8026797815182378848_n_1853686738221788.jpg', '', '10-Oct-2019', 1570716938, '', 6),
(158, 53, '1570716942-16999185_1853400114917117_2392477709514312892_n_1853400114917117.jpg', '', '10-Oct-2019', 1570716942, '', 7),
(159, 53, '1570716949-17021870_1853403624916766_1351382346975295317_n_1853403624916766.jpg', '', '10-Oct-2019', 1570716949, '', 8),
(160, 53, '1570716962-17098357_1856290621294733_6110422358776302084_n_1856290621294733.jpg', '', '10-Oct-2019', 1570716962, '', 0),
(161, 53, '1570716971-17098388_1854044058186056_3728632385587033949_n_1854044058186056.jpg', '', '10-Oct-2019', 1570716971, '', 9),
(162, 53, '1570716979-17098646_1856291507961311_8193440849623721213_n_1856291507961311.jpg', '', '10-Oct-2019', 1570716979, '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `item_price`
--

CREATE TABLE `item_price` (
  `ip_id` int(11) NOT NULL,
  `ip_item` int(11) NOT NULL,
  `ip_period` varchar(255) NOT NULL,
  `ip_amount` double NOT NULL,
  `ip_name` varchar(255) NOT NULL,
  `ip_price` double NOT NULL,
  `ip_total` double NOT NULL,
  `ip_date` varchar(255) NOT NULL,
  `ip_time` varchar(15) NOT NULL,
  `ip_user` varchar(255) NOT NULL,
  `ip_renew` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_promotion`
--

CREATE TABLE `item_promotion` (
  `ip_id` int(11) NOT NULL,
  `ip_item` int(11) NOT NULL,
  `ip_name` varchar(255) NOT NULL,
  `ip_date` varchar(255) NOT NULL,
  `ip_time` int(15) NOT NULL,
  `ip_value` text NOT NULL,
  `ip_type` int(11) NOT NULL,
  `ip_expired` varchar(255) NOT NULL,
  `ip_key` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_promotion`
--

INSERT INTO `item_promotion` (`ip_id`, `ip_item`, `ip_name`, `ip_date`, `ip_time`, `ip_value`, `ip_type`, `ip_expired`, `ip_key`) VALUES
(53, 61, 'Merdeka Sale', '', 0, '50', 1, '02-Apr-2020', 'PROMOTION_5e6ca6f4ba6cf');

-- --------------------------------------------------------

--
-- Table structure for table `item_review`
--

CREATE TABLE `item_review` (
  `ir_id` int(11) NOT NULL,
  `ir_item` int(11) NOT NULL,
  `ir_name` varchar(255) NOT NULL,
  `ir_email` varchar(255) NOT NULL,
  `ir_subject` varchar(255) NOT NULL,
  `ir_review` text NOT NULL,
  `ir_rating` int(11) NOT NULL,
  `ir_date` varchar(100) NOT NULL,
  `ir_time` int(15) NOT NULL,
  `ir_company` int(11) NOT NULL,
  `ir_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `key_email`
--

CREATE TABLE `key_email` (
  `ke_id` int(11) NOT NULL,
  `ke_key` text NOT NULL,
  `ke_client` varchar(255) NOT NULL,
  `ke_date` varchar(255) NOT NULL,
  `ke_time` varchar(15) NOT NULL,
  `ke_expired` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `key_email`
--

INSERT INTO `key_email` (`ke_id`, `ke_key`, `ke_client`, `ke_date`, `ke_time`, `ke_expired`) VALUES
(4, '3bfb5678bf2740e6839900f6c5eabb57d98d5a0b90aa88e5dc75aeff753d74ce', 'hery', '09-Nov-2017', '1510235020', '1512827020');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_file` text COLLATE utf8_unicode_ci NOT NULL,
  `m_time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `m_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`m_id`, `m_name`, `m_file`, `m_time`, `m_date`) VALUES
(18, '', '1567159889-Happyx00birthday.jpg', '1567159889', '30-Aug-2019'),
(6, '', '1566664345-passwordx00customer.jpg', '1566664345', '24-Aug-2019'),
(7, '', '1566664626-forgotx00passwords-customer.jpg', '1566664626', '24-Aug-2019'),
(8, '', '1566668845-test.jpg', '1566668845', '24-Aug-2019'),
(10, '', '1566671376-forgotx00passwordx00vendor.png', '1566671376', '24-Aug-2019'),
(23, '', '1567177643-vendorx00receivedx00order.jpg', '1567177643', '30-Aug-2019'),
(12, '', '1566731354-Thankx00ux002.jpg', '1566731354', '25-Aug-2019'),
(13, '', '1566731362-welcome.jpg', '1566731362', '25-Aug-2019'),
(14, '', '1567011123-2.jpg', '1567011123', '28-Aug-2019'),
(15, '', '1567018330-4.jpg', '1567018330', '28-Aug-2019'),
(16, '', '1567018603-3.png', '1567018603', '28-Aug-2019'),
(20, '', '1567160368-Paidx00order.jpg', '1567160368', '30-Aug-2019'),
(21, '', '1567161253-vendorx00receivedx00order.jpg', '1567161253', '30-Aug-2019'),
(27, '', '1570211863-order_cancel.jpg', '1570211863', '04-Oct-2019'),
(28, '', '1570211866-paid_order.jpg', '1570211866', '04-Oct-2019'),
(29, '', '1570212055-fogor_password.jpg', '1570212055', '04-Oct-2019'),
(30, '', '1570212058-order_cancel_vendor.jpg', '1570212058', '04-Oct-2019'),
(31, '', '1570212060-order_paid_vendor.jpg', '1570212060', '04-Oct-2019'),
(32, '', '1570212061-vendor_forgot_password.jpg', '1570212061', '04-Oct-2019'),
(33, '', '1570293290-claim-paid.jpg', '1570293290', '05-Oct-2019'),
(34, '', '1570293293-announcements.jpg', '1570293293', '05-Oct-2019'),
(35, '', '1570364271-WELCOME_VENDOR.jpg', '1570364271', '06-Oct-2019'),
(36, '', '1570372907-customer-register.jpg', '1570372907', '06-Oct-2019'),
(38, '', '1581771006-ref.jpg', '1581771006', '15-Feb-2020');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_url` text NOT NULL,
  `m_route` text NOT NULL,
  `m_page` int(11) NOT NULL,
  `m_status` int(11) NOT NULL,
  `m_position` varchar(255) NOT NULL,
  `m_user` varchar(255) NOT NULL,
  `m_date` varchar(255) NOT NULL,
  `m_time` int(15) NOT NULL,
  `m_code` varchar(255) NOT NULL,
  `m_type` int(11) NOT NULL,
  `m_order` int(11) NOT NULL,
  `m_content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`m_id`, `m_name`, `m_url`, `m_route`, `m_page`, `m_status`, `m_position`, `m_user`, `m_date`, `m_time`, `m_code`, `m_type`, `m_order`, `m_content`) VALUES
(1, 'Home', 'home', 'pages/home', 1, 1, 'main', '', '', 0, '', 2, 0, ''),
(2, 'Shop', 'categories', 'pages/shop', 1, 1, 'main', '', '', 0, '', 2, 0, ''),
(4, 'About Us', 'about_us', 'pages/about_us', 1, 1, 'main', '', '', 0, '', 2, 0, ''),
(5, 'Contact Us', 'contact_us', 'pages/contact_us', 1, 1, 'main', '', '', 0, '', 2, 0, ''),
(10, 'Account', 'account', 'pages/account', 1, 1, 'main', 'anwar', '26-Sep-2019', 1569512377, '', 1, 0, ''),
(12, 'Login / Register Account', 'login', 'pages/login', 0, 1, '', 'anwar', '26-Sep-2019', 1569512370, '', 2, 0, ''),
(14, 'Password Recovery', 'password_recovery', 'pages/password_recovery', 0, 1, '', 'anwar', '26-Sep-2019', 1569512360, '', 2, 0, ''),
(16, 'Check Out', 'check_out', 'pages/check_out', 0, 1, '', 'anwar', '26-Sep-2019', 1569512347, '', 1, 0, ''),
(18, 'Cart', 'cart', 'pages/cart', 0, 1, '', 'anwar', '26-Sep-2019', 1569512336, '', 1, 0, ''),
(20, 'Forgot Password', 'forgot_password', 'pages/forgot_password', 0, 1, '', 'anwar', '26-Sep-2019', 1569512354, '', 2, 0, ''),
(26, 'Company', 'company', 'pages/company', 0, 1, '', 'anwar', '25-Sep-2019', 1569449016, '', 2, 0, ''),
(30, 'View Receipt Order', 'view-receipt', 'pages/view_receipt', 0, 1, '', 'anwar', '27-Sep-2019', 1569588155, '', 1, 0, ''),
(31, 'Terms and Condition', 'tac', 'pages/tac', 0, 1, '', 'anwar', '16-Jan-2020', 1579189822, '', 2, 0, '<div class=\"row\">\r\n<div class=\"col-sm-12\">\r\n<p style=\"text-align:center\"><span style=\"font-size:24px\">Terms and Conditions</span></p>\r\n\r\n<p style=\"text-align:center\"><strong>Terms and Conditions for Customer</strong></p>\r\n\r\n<p><strong>Please read our Terms and Condition as they contain significant data about your legal rights and agreement. By accessing our Intelligent Ecommerce (Company), you (Guest) consent to agree and be bound by our Terms. These terms and conditions apply to the entire content of our website under the domain name <a href=\"https://www.mypro-intelligent.com\">https://www.mypro-intelligent.com</a></strong></p>\r\n\r\n<p><strong>1. Introduction</strong></p>\r\n\r\n<ul>\r\n	<li>You shall be considered to have accepted this legal notice in complete by accessing any part of the Website. If you do not fully acknowledge this legal notice, you must immediately leave the Website.</li>\r\n	<li>The Company may at any moment revise these Terms by updating this article. From time to time, you should visit the website to review the present legal notice, as it is binding on you. Some provisions of this legal notice may be replaced by expressly specified legal notices or conditions on the particular pages at the Website.</li>\r\n	<li>You can access most regions of the website without registering with us your information.</li>\r\n</ul>\r\n\r\n<p><strong>2. Service access</strong></p>\r\n\r\n<ul>\r\n	<li>While the Company strives to ensure that the Website is normally available 24 hours a day, the Company is not responsible if the Website is unavailable or for any period of time for any reason (Example: Server Down, etc).</li>\r\n	<li>In case of system failure, accessing to the Website may be temporarily and without notice suspended cause of maintenance or reason that beyond the control of the Company.</li>\r\n</ul>\r\n\r\n<p><strong>3. Your use of this website</strong></p>\r\n\r\n<ul>\r\n	<li>The Customer certifies that he or she is at least 18 years of age.</li>\r\n	<li>\r\n	<p>You may not attempt to have an unauthorized access to any part or feature of the Website or to any other systems or networks connected to the Intelligent Ecommerce server, or to any of the services&nbsp;or products offered on our Website, through hacking, password &quot;mining&quot; or any other unlawful activities.</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree not to modify or use modified versions of such software, including for the purpose of obtaining unauthorized access to the Website, in any manner or form, the software underlying the Website.</p>\r\n	</li>\r\n	<li>\r\n	<p>You will provide us with real, precise, current and complete data when we request registration data from you. We have the right to block your account if you are not following the terms that we provided.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>4. After Booking</strong></p>\r\n\r\n<ul>\r\n	<li>Upon receipt by Intelligent Ecommerce of a booking confirmation, a legally binding agreement is concluded between you and your host, subject to any additional terms and conditions applicable by host, including in particular the applicable <a href=\"https://www.mypro-intelligent.com/policies\" target=\"_blank\">cancellation policy</a> and any rules and restrictions specified in the listing.</li>\r\n</ul>\r\n\r\n<p><strong>5. Disclaimer</strong></p>\r\n\r\n<ul>\r\n	<li>While company strive to ensure that the website information is correct, the Company does not warrant the accuracy and completeness of the website material. The Company may, at any time without notice, make changes to the material on the Website or the products and prices described in it. The material on the Website may be outdated and the Company does not undertake to update such material.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"col-md-12\">\r\n<p><strong>Terms and Condition for Host</strong></p>\r\n\r\n<p><strong>Please read our Terms and Conditions as they contain significant data about your legal rights and agreement. By accessing our Intelligent Ecommerce (Company), you (Host) consent to agree and be bound by our terms. These terms and conditions apply to the entire content of our website under the domain name </strong><a href=\"https://www.mypro-intelligent.com\">https://www.mypro-intelligent.com</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Introduction</strong></p>\r\n\r\n<ul>\r\n	<li>You shall be considered to have accepted this legal notice in complete by accessing any part of the Website. If you do not fully acknowledge this legal notice, you must immediately leave the Website.</li>\r\n	<li>The Company may at any moment revise these Terms by updating this article. From time to time, you should visit the website to review the present legal notice, as it is binding on you. Some provisions of this legal notice may be replaced by expressly specified legal notices or conditions on the particular pages at the Website.</li>\r\n	<li>You can access most regions of the website without registering with us your information.</li>\r\n</ul>\r\n\r\n<p><strong>2. Service access</strong></p>\r\n\r\n<ul>\r\n	<li>While the Company strives to ensure that the Website is normally available 24 hours a day, the Company is not responsible if the Website is unavailable or for any period of time for any reason (Example: Server Down, etc).</li>\r\n	<li>In case of system failure, accessing to the Website may be temporarily and without notice suspended cause of maintenance or reason that beyond the control of the Company.</li>\r\n</ul>\r\n\r\n<p><strong>3. Service Charge</strong></p>\r\n\r\n<ul>\r\n	<li>We charge a 10% service fee for experiences to help cover the costs of the&nbsp;services, products and supports that we provide, including the maintenance of most experiences in our Intelligent Ecommerce platform.</li>\r\n</ul>\r\n\r\n<p><strong>4. Specific Terms</strong></p>\r\n\r\n<p>4.1&nbsp; When creating a Listing through the Intelligent Ecommerce Platform you must:</p>\r\n\r\n<ul>\r\n	<li>provide complete and accurate information about your Service (such as listing description, location, and calendar availability)</li>\r\n	<li>disclose any deficiencies, restrictions (such as house rules) and requirements that apply (such as any minimum age, proficiency or fitness requirements for an Experience)</li>\r\n	<li>provide any other important information requested by Intelligent Ecommerce.</li>\r\n</ul>\r\n\r\n<p>You are responsible for keeping your Listing information (including calendar availability) up-to-date at all times. If not, we will have the right to block your acccount due to false information.</p>\r\n\r\n<p>4.2 &nbsp; You are solely responsible for setting a price (including any Taxes if applicable, or charges such as cleaning fees) for your Listing (&ldquo;<strong>Listing Fee</strong>&rdquo;). Once a Guest requests a booking of your Listing, you may not request that the Guest pays a higher price than in the booking request.</p>\r\n\r\n<p>4.3&nbsp; Pictures used in your Listings must accurately reflect the quality and condition of your Items Services. Intelligent Ecommerce reserves the right to require that Listings have a minimum number of Images of a certain format, size and resolution.</p>\r\n\r\n<p>4.4&nbsp; Any terms and conditions included in your Listing, in particular in relation to cancellations, must not conflict with these Terms or the relevant cancellation policy for your Listing.</p>\r\n\r\n<p><strong>5. Disclaimer</strong></p>\r\n\r\n<ul>\r\n	<li>While company strive to ensure that the website information is correct, the Company does not warrant the accuracy and completeness of the website material. The Company may, at any time without notice, make changes to the material on the Website or the products and prices described in it. The material on the Website may be outdated and the Company does not undertake to update such material.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n'),
(32, 'Policies', 'policies', 'pages/policies', 0, 1, '', 'anwar', '16-Jan-2020', 1579188904, '', 2, 0, '<h1 style=\"text-align:center\">Policies</h1>\r\n\r\n<p>If in this Policy you see an undefined term (such as &quot;Intelligent Ecommerce Platform&quot;), it has the same definition as in our Service Terms (&quot;Terms&quot;).</p>\r\n\r\n<p><strong>1. Introduction</strong></p>\r\n\r\n<p>Thank you for using Intelligent Ecommerce! Your trust is important to us and we&rsquo;re committed to protecting the privacy and security of your personal information. The information that&rsquo;s shared with us helps us to provide a great experience with Intelligent Ecommerce.</p>\r\n\r\n<p><br />\r\n<strong>2. Cancellation &amp; Refund Policies</strong></p>\r\n\r\n<p>2.1.1&nbsp; If a (Customer) need to cancel Your Order, the following conditions will apply:</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; No refund of placement/application fee will be made after work has begun on your request;</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Additional Fees may be charged for any subsequent change in requirement after an application is lodged</li>\r\n	<li>&nbsp;&nbsp;&nbsp; If a customer cancel order, a customer will be charge 4.5% of total item price.</li>\r\n</ul>\r\n\r\n<p>2.1.2&nbsp; If a Host need to cancel the order, then the following conditions will apply:</p>\r\n\r\n<ul>\r\n	<li>The Host need to give a reasonable reason as a prove for the cancellation reasons.</li>\r\n</ul>\r\n\r\n<p><br />\r\n2.2&nbsp; Special / Emergengy Circumstances</p>\r\n\r\n<p>We appreciate that there are sometimes special circumstances where a guest has to cancel for events beyond their control, guests and/or their agents are to immediately contact our office to discuss the circumstances with our staff.</p>\r\n\r\n<p>If you need to cancel due to an emergency. We may ask you to provide documentation.</p>\r\n\r\n<p><br />\r\n2.4&nbsp; What if the host cancels my order?</p>\r\n\r\n<p>We will<strong> refund</strong> your order fee paid online within 30 days.</p>\r\n\r\n<p><br />\r\n<strong>3. Privacy Policy</strong></p>\r\n\r\n<p>3.1&nbsp; We have a dedicated privacy team committed to protecting all the private data we collect and helping to guarantee the proper handling of private data globally.</p>\r\n\r\n<p>3.2&nbsp; This Privacy Policy describes how we collect, use, process, and disclose your personal information, in conjunction with your access to and use of the Intelligent Ecommerce Platform and the Payment Services.</p>\r\n\r\n<p>3.3&nbsp; Information we collect:</p>\r\n\r\n<p>3.3.1&nbsp; Information you give us</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; Information needed to use the Intelligent Ecommerce Platform.\r\n	<ul>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We ask for and collect the following personal information about you when you use the Intelligent Ecommerce Platform.</li>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This data is essential for the proper fulfillment of the agreement between us and you to enable us to fulfill our legal responsibilities.</li>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Without it, we may not be able to provide you with all the requested services.</li>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Account Information. When you creating account with Intelligent Ecommerce , we require certain information such as your first name, last name, email address, and date of birth.</li>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Profile Information. To use certain features of the Intelligent Ecommerce Platform, we may ask you to provide additional information, which may include your address, phone number, and a profile picture.</li>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Payment Information. To use certain features of the Intelligent Ecommerce Platform, we may ask you to provide your bank account details.</li>\r\n	</ul>\r\n	</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Information you choose to give us:\r\n	<ul>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You may choose to provide us with additional personal information in order to obtain a better user experience when using Intelligent Ecommerce Platform. This additional information will be processed based on our legitimate interest or when applicable, your consent.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>3.4&nbsp; How we use the information we collect</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; We may use the personal information to provide, personalize, measure, and improve our advertising and marketing such as to:</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send you promotional messages, marketing, advertising, and other information that may be of interest to you based on your preferences</li>\r\n	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; personalize, measure, and improve our advertising</li>\r\n</ul>\r\n\r\n<p><strong>4. Your Rights</strong></p>\r\n\r\n<p>4.1&nbsp; Managing your account information. You may access and update some of your information through your Account settings. You are responsible to keep your account up-to-date.</p>\r\n\r\n<p>4.2&nbsp; Rectification of Inaccurate or Incomplete Information.</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; You have the right to ask us to correct inaccurate or incomplete personal information about you (and which you cannot update yourself within your Intelligent Ecommerce Account).</li>\r\n</ul>\r\n\r\n<p>4.3&nbsp; Lodging Complaints</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; You have the right to lodge complaints about our data processing activities by filing a complaint with our customer support department who can be reached by the &ldquo;Contact Us&rdquo; section below or with a supervisory authority.</li>\r\n</ul>\r\n\r\n<p><strong>5. Contact Us</strong></p>\r\n\r\n<p>If you have any questions or complaints about this Policies or Intelligent Ecommerce&#39;s information handling practices, you may email us at the email addresses provided or contact us via phone at:</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; support@intelhost.com.my</li>\r\n	<li>&nbsp;&nbsp;&nbsp; +607-521 1178 or +6012-283 6731</li>\r\n</ul>\r\n'),
(33, 'Host Terms and Conditions', 'htac', 'pages/htac', 0, 1, '', 'anwar', '16-Jan-2020', 1579189344, '', 2, 0, '<p style=\"text-align:center\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Host Terms and Conditions</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Please read our Terms and Conditions as they contain significant data about your legal rights and agreement. By accessing our Intelligent Ecommerce (Company), you (Host) consent to agree and be bound by our terms. These terms and conditions apply to the entire content of our website under the domain name </span></span></strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><a href=\"https://www.mypro-intelligent.com\"><span style=\"color:blue\">https://www.mypro-intelligent.com</span></a></span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">1. Introduction</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">You shall be considered to have accepted this legal notice in complete by accessing any part of the Website. If you do not fully acknowledge this legal notice, you must immediately leave the Website.</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">The Company may at any moment revise these Terms by updating this article. From time to time, you should visit the website to review the present legal notice, as it is binding on you. Some provisions of this legal notice may be replaced by expressly specified legal notices or conditions on the particular pages at the Website.</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">You can access most regions of the website without registering with us your information.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">2. Service access</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">While the Company strives to ensure that the Website is normally available 24 hours a day, the Company is not responsible if the Website is unavailable or for any period of time for any reason (Example: Server Down, etc).</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">In case of system failure, accessing to the Website may be temporarily and without notice suspended cause of maintenance or reason that beyond the control of the Company.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">3. Service Charge</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">We charge a 10% service fee for experiences to help cover the costs of the&nbsp;services, products and supports that we provide, including the maintenance of most experiences in our Intelligent Ecommerce platform.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">4. Specific Terms</span></span></strong></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">4.1&nbsp;When creating a Listing through the Intelligent Ecommerce Platform you must:</span></span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">provide complete and accurate information about your Service (such as listing description, location, and calendar availability)</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">disclose any deficiencies, restrictions (such as house rules) and requirements that apply (such as any minimum age, proficiency or fitness requirements for an Experience)</span></span></span></span></li>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">provide any other important information requested by Intelligent Ecommerce.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">You are responsible for keeping your Listing information (including calendar availability) up-to-date at all times. If not, we will have the right to block your account due to false information.</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">4.2 You are solely responsible for setting a price (including any Taxes if applicable, or charges such as cleaning fees) for your Listing (&ldquo;<strong>Listing Fee</strong>&rdquo;). Once a Guest requests a booking of your Listing, you may not request that the Guest pays a higher price than in the booking request.</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">4.3&nbsp;Pictures used in your Listings must accurately reflect the quality and condition of your Items Services. Intelligent Ecommerce reserves the right to require that Listings have a minimum number of Images of a certain format, size and resolution.</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">4.4&nbsp;Any terms and conditions included in your Listing, in particular in relation to cancellations, must not conflict with these Terms or the relevant cancellation policy for your Listing.</span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">5. Disclaimer</span></span></strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">While company strive to ensure that the website information is correct, the Company does not warrant the accuracy and completeness of the website material. The Company may, at any time without notice, make changes to the material on the Website or the products and prices described in it. The material on the Website may be outdated and the Company does not undertake to update such material.</span></span></span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `menu_page`
--

CREATE TABLE `menu_page` (
  `mp_id` int(11) NOT NULL,
  `mp_menu` int(11) NOT NULL,
  `mp_page` int(11) NOT NULL,
  `mp_order` int(11) NOT NULL,
  `mp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modals`
--

CREATE TABLE `modals` (
  `m_id` int(11) NOT NULL,
  `m_name` text NOT NULL,
  `m_alias` varchar(255) NOT NULL,
  `m_content` text NOT NULL,
  `m_width` varchar(255) NOT NULL,
  `m_height` varchar(255) NOT NULL,
  `m_user` varchar(255) NOT NULL,
  `m_date` varchar(255) NOT NULL,
  `m_time` varchar(15) NOT NULL,
  `m_status` int(11) NOT NULL,
  `m_portal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `motto`
--

CREATE TABLE `motto` (
  `motto_id` int(11) NOT NULL,
  `motto_description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `motto_description2` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `motto_status` int(11) NOT NULL,
  `motto_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motto_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motto_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motto_phoneNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motto_phone1` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `motto`
--

INSERT INTO `motto` (`motto_id`, `motto_description`, `motto_description2`, `motto_status`, `motto_date`, `motto_time`, `motto_email`, `motto_phoneNo`, `motto_phone1`) VALUES
(3, 'Buy your product just doing it online', 'Buy your needs here', 1, '14-Jul-2019', '1563118408', 'support@intelhost.com.my', '+607-521 1178', '+6012-283 6731');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `n_id` int(11) NOT NULL,
  `n_order` int(11) NOT NULL,
  `n_note` text NOT NULL,
  `n_date` varchar(255) NOT NULL,
  `n_time` varchar(15) NOT NULL,
  `n_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`n_id`, `n_order`, `n_note`, `n_date`, `n_time`, `n_user`) VALUES
(1, 77, 'asdasd', '10-Nov-2017', '1510327390', 'hery'),
(2, 77, 'asfasfasfsadf', '10-Nov-2017', '1510327394', 'hery'),
(3, 359, 'username: adsdsa\r\npassword: 123123', '22-Mar-2019', '1553253671', 'hery'),
(4, 352, 'asdasd', '22-Mar-2019', '1553253706', 'hery'),
(5, 299, 'asa', '22-Mar-2019', '1553253751', 'hery'),
(6, 299, 'test', '22-Mar-2019', '1553253768', 'hery'),
(7, 362, 'dsfgdfg', '14-Apr-2019', '1555264030', 'hery'),
(8, 362, 'dfgdfgdfg', '14-Apr-2019', '1555264031', 'hery');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `n_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_notiType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_notiDue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_email`
--

CREATE TABLE `notification_email` (
  `n_id` int(11) NOT NULL,
  `n_invoice_id` int(11) NOT NULL,
  `n_type` text COLLATE utf8_unicode_ci NOT NULL,
  `n_notification_day` text COLLATE utf8_unicode_ci NOT NULL,
  `n_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_customer` int(11) NOT NULL,
  `o_total` double NOT NULL,
  `o_tax` varchar(255) NOT NULL,
  `o_gtotal` double NOT NULL,
  `o_date` varchar(100) NOT NULL,
  `o_time` int(15) NOT NULL,
  `o_no` varchar(255) NOT NULL,
  `o_status` varchar(255) NOT NULL,
  `o_user` varchar(255) NOT NULL,
  `o_key` text NOT NULL,
  `o_payment_id` text NOT NULL,
  `o_pinvoice_id` text NOT NULL,
  `o_ppayment_state` text NOT NULL,
  `o_paypal_obj` text NOT NULL,
  `o_transaction_id` varchar(255) NOT NULL,
  `o_commission_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_customer`, `o_total`, `o_tax`, `o_gtotal`, `o_date`, `o_time`, `o_no`, `o_status`, `o_user`, `o_key`, `o_payment_id`, `o_pinvoice_id`, `o_ppayment_state`, `o_paypal_obj`, `o_transaction_id`, `o_commission_value`) VALUES
(1, 20, 0, '', 29.21, '15-Mar-2020', 1584264193, 'BILL_5e6d82bb9f13b', 'COMPLETED', '', 'ORDER_5e6d838189fff', '1FL73529EN8197733', 'BILL_5e6d82bb9f13b', 'COMPLETED', '{\"create_time\":\"2020-03-15T01:20:02Z\",\"update_time\":\"2020-03-15T01:23:12Z\",\"id\":\"54X31312L12160942\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"payer\":{\"email_address\":\"anwar37007@gmail.com\",\"payer_id\":\"XZ2C3H64TME3J\",\"address\":{\"country_code\":\"MY\"},\"name\":{\"given_name\":\"Anwar\",\"surname\":\"Radzuan\"}},\"purchase_units\":[{\"reference_id\":\"default\",\"invoice_id\":\"BILL_5e6d82bb9f13b\",\"soft_descriptor\":\"PAYPAL *TESTFACILIT\",\"amount\":{\"value\":\"29.21\",\"currency_code\":\"MYR\"},\"payee\":{\"email_address\":\"account-facilitator@intelhost.com.my\",\"merchant_id\":\"DQWWCM6E9M7Q2\"},\"shipping\":{\"name\":{\"full_name\":\"Anwar Radzuan\"},\"address\":{\"address_line_1\":\"Lot 26 Kampung Haji Wahed\",\"admin_area_2\":\"Miri\",\"admin_area_1\":\"SARAWAK\",\"postal_code\":\"98000\",\"country_code\":\"MY\"}},\"payments\":{\"captures\":[{\"status\":\"COMPLETED\",\"id\":\"1FL73529EN8197733\",\"invoice_id\":\"BILL_5e6d82bb9f13b\",\"final_capture\":true,\"create_time\":\"2020-03-15T01:23:12Z\",\"update_time\":\"2020-03-15T01:23:12Z\",\"amount\":{\"value\":\"29.21\",\"currency_code\":\"MYR\"},\"seller_protection\":{\"status\":\"NOT_ELIGIBLE\"},\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/1FL73529EN8197733\",\"rel\":\"self\",\"method\":\"GET\",\"title\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/payments\\/captures\\/1FL73529EN8197733\\/refund\",\"rel\":\"refund\",\"method\":\"POST\",\"title\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/54X31312L12160942\",\"rel\":\"up\",\"method\":\"GET\",\"title\":\"GET\"}]}]}}],\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v2\\/checkout\\/orders\\/54X31312L12160942\",\"rel\":\"self\",\"method\":\"GET\",\"title\":\"GET\"}]}', '54X31312L12160942', 1.91);

-- --------------------------------------------------------

--
-- Table structure for table `order_cancel`
--

CREATE TABLE `order_cancel` (
  `oc_id` int(11) NOT NULL,
  `oc_date` varchar(100) NOT NULL,
  `oc_time` int(15) NOT NULL,
  `oc_customer` int(11) NOT NULL,
  `oc_company` int(11) NOT NULL,
  `oc_order_item` int(11) NOT NULL,
  `oc_message` text NOT NULL,
  `oc_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_claim`
--

CREATE TABLE `order_claim` (
  `oc_id` int(11) NOT NULL,
  `oc_date` varchar(100) NOT NULL,
  `oc_time` int(15) NOT NULL,
  `oc_order_item` int(11) NOT NULL,
  `oc_status` int(11) NOT NULL,
  `oc_amount` double NOT NULL,
  `oc_detail` text NOT NULL,
  `oc_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` int(11) NOT NULL,
  `od_order_item` int(11) NOT NULL,
  `od_item` int(11) NOT NULL,
  `od_io` int(11) NOT NULL,
  `od_iov` varchar(255) NOT NULL,
  `od_price` double NOT NULL,
  `od_io_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `oi_id` int(11) NOT NULL,
  `oi_order` int(11) NOT NULL,
  `oi_item` int(11) NOT NULL,
  `oi_customer` int(11) NOT NULL,
  `oi_price` double NOT NULL,
  `oi_quantity` int(11) NOT NULL,
  `oi_gtotal` double NOT NULL,
  `oi_company` int(11) NOT NULL,
  `oi_cart_key` text NOT NULL,
  `oi_date` varchar(100) NOT NULL,
  `oi_time` int(15) NOT NULL,
  `oi_key` text NOT NULL,
  `oi_shipping_cost` double NOT NULL,
  `oi_shipping` int(11) NOT NULL,
  `oi_shipping_status` int(11) NOT NULL,
  `oi_tracking` text NOT NULL,
  `oi_reason` text NOT NULL,
  `oi_shipping_name` varchar(255) NOT NULL,
  `oi_client` int(11) NOT NULL,
  `oi_tax` varchar(255) NOT NULL,
  `oi_cancel_by` varchar(255) NOT NULL,
  `oi_user` int(11) NOT NULL,
  `oi_refund_status` int(11) NOT NULL,
  `oi_is_claimed` int(11) NOT NULL,
  `oi_claim_date` varchar(100) NOT NULL,
  `oi_claim_data` text NOT NULL,
  `oi_claim_amount` double NOT NULL,
  `oi_update_date` int(15) NOT NULL,
  `oi_item_name` varchar(255) NOT NULL,
  `oi_shipping_duration` varchar(255) NOT NULL,
  `oi_refund_amount` double NOT NULL,
  `oi_refund_data` text NOT NULL,
  `oi_refund_date` varchar(255) NOT NULL,
  `oi_cancel` int(11) NOT NULL,
  `oi_claim` int(11) NOT NULL,
  `oi_shipping_id` text NOT NULL,
  `oi_commission` int(11) NOT NULL,
  `oi_commission_value` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`oi_id`, `oi_order`, `oi_item`, `oi_customer`, `oi_price`, `oi_quantity`, `oi_gtotal`, `oi_company`, `oi_cart_key`, `oi_date`, `oi_time`, `oi_key`, `oi_shipping_cost`, `oi_shipping`, `oi_shipping_status`, `oi_tracking`, `oi_reason`, `oi_shipping_name`, `oi_client`, `oi_tax`, `oi_cancel_by`, `oi_user`, `oi_refund_status`, `oi_is_claimed`, `oi_claim_date`, `oi_claim_data`, `oi_claim_amount`, `oi_update_date`, `oi_item_name`, `oi_shipping_duration`, `oi_refund_amount`, `oi_refund_data`, `oi_refund_date`, `oi_cancel`, `oi_claim`, `oi_shipping_id`, `oi_commission`, `oi_commission_value`) VALUES
(1, 1, 53, 20, 20, 1, 20, 30, '29f729cef20a4df68e49ff2ceeb4d681b775775f47f4ba128beaac8a5af8ed52CART_5e6ca676e5b07', '15-Mar-2020', 1584264193, 'ORDER_ITEM_5e6d83818aa54', 7.3, 1, 0, '', '', 'DHL eCommerce (Dropoff only)', 0, '', '', 0, 0, 0, '', '', 0, 0, 'Abacus - 23Rod (Brown)', '2 working day(s)', 0, '', '', 0, 0, 'EP-RR09146', 7, 1.91);

-- --------------------------------------------------------

--
-- Table structure for table `order_log`
--

CREATE TABLE `order_log` (
  `ol_id` int(11) NOT NULL,
  `ol_order` int(11) NOT NULL,
  `ol_invoice` int(11) NOT NULL,
  `ol_item` int(11) NOT NULL,
  `ol_client` varchar(255) NOT NULL,
  `ol_date` varchar(255) NOT NULL,
  `ol_time` varchar(15) NOT NULL,
  `ol_start` varchar(15) NOT NULL,
  `ol_end` varchar(15) NOT NULL,
  `ol_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_refund`
--

CREATE TABLE `order_refund` (
  `or_id` int(11) NOT NULL,
  `or_date` varchar(100) NOT NULL,
  `or_time` int(15) NOT NULL,
  `or_order_item` int(11) NOT NULL,
  `or_status` int(11) NOT NULL,
  `or_amount` double NOT NULL,
  `or_details` text NOT NULL,
  `or_user` int(11) NOT NULL,
  `or_bank` text NOT NULL,
  `or_acc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping`
--

CREATE TABLE `order_shipping` (
  `os_id` int(11) NOT NULL,
  `os_customer` int(11) NOT NULL,
  `os_address` text NOT NULL,
  `os_postal` varchar(255) NOT NULL,
  `os_city` varchar(255) NOT NULL,
  `os_state` varchar(255) NOT NULL,
  `os_order` int(11) NOT NULL,
  `os_country` varchar(255) NOT NULL,
  `os_phone` varchar(255) NOT NULL,
  `os_email` varchar(255) NOT NULL,
  `os_key` text NOT NULL,
  `os_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_shipping`
--

INSERT INTO `order_shipping` (`os_id`, `os_customer`, `os_address`, `os_postal`, `os_city`, `os_state`, `os_order`, `os_country`, `os_phone`, `os_email`, `os_key`, `os_name`) VALUES
(1, 20, 'No 30, Jalan Sejahtera 24, Taman Desa Skudai', '81300 ', 'Skudai', 'Johor', 1, 'MY', '5465465465', 'mohamed.anwar885@gmail.com', 'SHIPPING_5e6d83818a6f9', 'Mohamed Anwar');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `os_id` int(11) NOT NULL,
  `os_date` varchar(100) NOT NULL,
  `os_time` int(15) NOT NULL,
  `os_order_item` int(11) NOT NULL,
  `os_status` varchar(255) NOT NULL,
  `os_message` text NOT NULL,
  `os_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_tax`
--

CREATE TABLE `order_tax` (
  `ot_id` int(11) NOT NULL,
  `ot_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ot_rate` double NOT NULL,
  `ot_order` int(11) NOT NULL,
  `ot_invoice` int(11) NOT NULL,
  `ot_value` double NOT NULL,
  `ot_orderItem` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_scheme` int(11) NOT NULL,
  `p_rate` double NOT NULL,
  `p_description` text NOT NULL,
  `p_period` int(11) NOT NULL,
  `p_user` varchar(255) NOT NULL,
  `p_date` varchar(255) NOT NULL,
  `p_time` int(15) NOT NULL,
  `p_value` double NOT NULL,
  `p_content` text NOT NULL,
  `p_status` int(11) NOT NULL,
  `p_limit` int(11) NOT NULL,
  `p_key` text NOT NULL,
  `p_order` int(11) NOT NULL,
  `p_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`p_id`, `p_name`, `p_scheme`, `p_rate`, `p_description`, `p_period`, `p_user`, `p_date`, `p_time`, `p_value`, `p_content`, `p_status`, `p_limit`, `p_key`, `p_order`, `p_users`) VALUES
(1, 'Business Starter', 1, 0, 'Commission Base Charges', 0, 'Hery', '07-Sep-2019', 1567855636, 10, '', 1, 0, 'PACKAGE5D7320D1A76A7', 0, 2),
(3, 'Basic Business', 0, 0, 'Yearly basis for 60 items', 0, 'Hery', '06-Oct-2019', 1570358819, 400, '', 0, 60, 'PACKAGE5D7320DEA468B', 1, 5),
(4, 'Premium Business', 0, 0, 'Yearly Basis for Unlimited products', 0, 'Hery', '06-Oct-2019', 1570358826, 700, '', 0, 0, 'PACKAGE5D7320E7C14DE', 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(1000) NOT NULL,
  `p_content` text NOT NULL,
  `p_url` varchar(255) NOT NULL,
  `p_status` int(11) NOT NULL,
  `p_user` varchar(255) NOT NULL,
  `p_date` varchar(255) NOT NULL,
  `p_time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`p_id`, `p_name`, `p_content`, `p_url`, `p_status`, `p_user`, `p_date`, `p_time`) VALUES
(4, 'About Us', '<h1 style=\"text-align:center\">Intelligent Ecommerce</h1>\r\n\r\n<p style=\"text-align:center\">e-Commerce, also known as e-Business, or electronic business, is simply the sale and purchase of services and goods over an electronic medium, like the Internet. It also involves electronically transferring data and funds between two or more parties. Simply put, it is online shopping as we commonly know it.</p>\r\n\r\n<p style=\"text-align:center\">e-Commerce started way back in the 1960s when organizations began to use Electronic Data Interchange (EDI) to transfer documents of their business back and forth. The 1990s saw the emergence of online shopping businesses, which is quite a phenomenon today.</p>\r\n\r\n<p style=\"text-align:center\">It has become so convenient and easy, that anyone can shop for anything right from a living room, with just a few clicks. This has evolved more with the emergence of smartphones, where now, you can shop from anywhere and anytime, with a wireless device connected to the Internet. Now you can search for almost any product or service online, without having to go anywhere physically.</p>\r\n', 'about_us', 1, 'anwar', '26-Jul-2019', '1564161830');

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `pr_id` int(11) NOT NULL,
  `pr_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pr_time` int(15) NOT NULL,
  `pr_key` text COLLATE utf8_unicode_ci NOT NULL,
  `pr_status` int(11) NOT NULL,
  `pr_user` int(11) NOT NULL,
  `pr_type` int(11) NOT NULL,
  `pr_expired` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_recovery`
--

INSERT INTO `password_recovery` (`pr_id`, `pr_date`, `pr_time`, `pr_key`, `pr_status`, `pr_user`, `pr_type`, `pr_expired`) VALUES
(4, '13-Feb-2020', 1581607976, '0d3078f426e2abe7fa3f6b5c09d35790e42243273aa8f286eafee7710aa80262-8940b789d0fccff7e172e2891bc8e95122e1c2b998e0242a8e69a5f3f9fba330', 1, 20, 1, 1582212776),
(5, '13-Feb-2020', 1581610224, '882a01febfd579bd2898207bfcf170938d01415ad0117f220867a51b855ebaef-aaf2fe800cd00d3732d44ae9655384a042e6b47955aa9f5f3f67175cbbe078c7', 0, 20, 1, 1582215024),
(6, '13-Feb-2020', 1581610283, 'f5348321a8c7c4f8ecdbae3a3feb3daa337a6cc332eea2c79003fb33f0061fb6-aaf2fe800cd00d3732d44ae9655384a042e6b47955aa9f5f3f67175cbbe078c7', 0, 20, 1, 1582215083),
(7, '13-Feb-2020', 1581611920, '0ad3870a6e83dbfc23025ab9bd2c1c27ff7351c734190d3c47674bc79668ce18-aaf2fe800cd00d3732d44ae9655384a042e6b47955aa9f5f3f67175cbbe078c7', 0, 20, 1, 1582216720),
(9, '14-Feb-2020', 1581676533, 'fabf37165c02838e99bfc658dea2e1996ef582c02b700b7895206127deb6eea6-68a4592be42a97a8e03bac557501c2732834171919a709141d4d16b036530365', 1, 10, 3, 1582281333);

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery_detail`
--

CREATE TABLE `password_recovery_detail` (
  `pd_id` int(11) NOT NULL,
  `pd_password_recovery` int(11) NOT NULL,
  `pd_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pd_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pd_time` int(15) NOT NULL,
  `pd_status` int(11) NOT NULL,
  `pd_raw` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_recovery_detail`
--

INSERT INTO `password_recovery_detail` (`pd_id`, `pd_password_recovery`, `pd_ip`, `pd_date`, `pd_time`, `pd_status`, `pd_raw`) VALUES
(1, 4, '124.13.45.1', '13-Feb-2020', 1581608098, 1, '{\"email\":\"mohamed.anwar885@gmail.com\",\"password\":\"anwar\",\"key\":\"0d3078f426e2abe7fa3f6b5c09d35790e42243273aa8f286eafee7710aa80262-8940b789d0fccff7e172e2891bc8e95122e1c2b998e0242a8e69a5f3f9fba330\",\"__SUBMIT__\":\"5e44fc15899bc\",\"__ROUTE__\":\"public\\/password_recovery\",\"action\":\"reset_pass\"}'),
(2, 9, '124.13.45.1', '14-Feb-2020', 1581677211, 1, '{\"email\":\"anwar37007@gmail.com\",\"n_pass\":\"123\",\"c_pass\":\"123\",\"key\":\"fabf37165c02838e99bfc658dea2e1996ef582c02b700b7895206127deb6eea6-68a4592be42a97a8e03bac557501c2732834171919a709141d4d16b036530365\",\"__SUBMIT__\":\"5e460a06cada3\",\"__ROUTE__\":\"password_recovery\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pg`
--

CREATE TABLE `pg` (
  `p_id` int(11) NOT NULL,
  `p_type` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_key1` text NOT NULL,
  `p_key2` text NOT NULL,
  `p_default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg`
--

INSERT INTO `pg` (`p_id`, `p_type`, `p_name`, `p_key1`, `p_key2`, `p_default`) VALUES
(1, 1, 'Paypal Acc 1', 'AakeGdeMtFVNcM6QRpokJZVov443_lmVnKes4w0NwmVtQiC5PGgT0mtNwZxY-wMx0Hq7fSzgI4BjSqDN', 'AdBFQ1DX3L7POG2O04wLMUHncSUMEzoWrWGFIe2rvPNSi7E1_Dx1WguZL3gkD2uQkHTZBXffwtDDC9Q0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pg_type`
--

CREATE TABLE `pg_type` (
  `pt_id` int(11) NOT NULL,
  `pt_name` varchar(255) NOT NULL,
  `pt_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_type`
--

INSERT INTO `pg_type` (`pt_id`, `pt_name`, `pt_description`) VALUES
(1, 'PayPal', 'Email Paypal: admin@intelhost.com.my');

-- --------------------------------------------------------

--
-- Table structure for table `portals`
--

CREATE TABLE `portals` (
  `p_id` int(11) NOT NULL,
  `p_name` text COLLATE utf8_unicode_ci NOT NULL,
  `p_code` text COLLATE utf8_unicode_ci NOT NULL,
  `p_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `p_url` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portals`
--

INSERT INTO `portals` (`p_id`, `p_name`, `p_code`, `p_user`, `p_date`, `p_time`, `p_url`) VALUES
(1, 'Intelhost Malaysia', 'MY', '', '25-Mar-2018', '1521977385', 'https://www.intelhost.com.my'),
(3, 'Intelhost SIngapore', 'SG', '', '25-Mar-2018', '1521977969', 'https://www.intelhost.com.sg');

-- --------------------------------------------------------

--
-- Table structure for table `pwidgets`
--

CREATE TABLE `pwidgets` (
  `pw_id` int(11) NOT NULL,
  `pw_name` varchar(1000) NOT NULL,
  `pw_page` int(11) NOT NULL,
  `pw_enable` int(11) NOT NULL,
  `pw_ismenu` int(11) NOT NULL,
  `pw_order` int(11) NOT NULL,
  `pw_content` text NOT NULL,
  `pw_key` text NOT NULL,
  `pw_value` text NOT NULL,
  `pw_alias` varchar(255) NOT NULL,
  `pw_portal` varchar(255) NOT NULL,
  `pw_target` varchar(255) NOT NULL,
  `pw_type` int(11) NOT NULL,
  `pw_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwidgets`
--

INSERT INTO `pwidgets` (`pw_id`, `pw_name`, `pw_page`, `pw_enable`, `pw_ismenu`, `pw_order`, `pw_content`, `pw_key`, `pw_value`, `pw_alias`, `pw_portal`, `pw_target`, `pw_type`, `pw_url`) VALUES
(1, 'About Us', 1, 1, 1, 1, '<h2 class=\"section-title text-center\">Best Hosting &amp; Web Design in Malaysia</h2>\r\n<p>Intelhost Malaysia is a well-known and trusted brand name in website &amp; hosting industry since 2015. Specializes in providing professional performance web &amp; hosting service for organizations and individuals in serving their content to the cyberspace. Our company is consisting of experienced people in website business for many years. We want to be a helpful friend of yours, each dedicated employee receives a series of extensive technical and customer service training to ensure the best customers service just for you. In Intelhost Malaysia, our main mission is to provide affordable, reliable and top-notch web &amp; hosting service to all our client throughout the world. Our community dedicate to help customers worldwide in their online business such as ecommerce and offline business growth through delivery of innovative internet products on a superior service platform. We pledged to provide you a brand-new experience where we will undertake your internet technical issues and leaving you with more time to remain focus to grow your business and deploy the best technology, best products and services in this internet industry.</p>', 'home_widget', 'about-us', 'about', 'MY', '', 0, '0'),
(2, 'Domain', 1, 1, 1, 2, '<h2 class=\"section-title\">Get Your Domain Name Today</h2>\r\n<p class=\"intro\">Domain services are the coordinators, allowing higher level functionality between many different smaller parts. These would include things like OrderProcessor, ProductFinder, FundsTransferService. All you need from classic domain names like .com, .in and co.in to new domain names like .club, even .rocks, we can help you find the right name for your business. Start search your domain name now!</p>', 'home_widget', 'domain', 'team', 'MY', '', 0, '0'),
(3, 'Web Design', 1, 1, 1, 3, '<h2 class=\"section-title\">Personalize Your Web Design</h2>\r\n<p class=\"intro\">Don&rsquo;t have any idea about web design? We can do for you. Designing website is a part of our passion. All of our website is carefully tailored by our in-house website designer. Through creative service, we also help to ensure your websites rank higher in search engines such as Google and Bing through our SEO-based creative content writing.</p>', 'home_widget', 'web-design', 'features', 'MY', '', 0, '0'),
(4, 'Hosting', 1, 1, 1, 4, '<h2 class=\"section-title\">The Best Web Hosting Deals</h2>\r\n<p class=\"intro\">All of our web hosting plans are based on the latest market pattern, nothing more important than having a good hosting value more than you will pay. We ensure each of our customer will get the best value through our features like free domain names, 24/7 technical support, 99.9% uptime, onsite support, fastest website speed performance, a feature-rich experience with all you need for your business and many more just for you!&nbsp;</p>', 'home_widget', 'hosting', 'pricing', 'MY', '', 0, '0'),
(5, 'Contact Us', 1, 1, 1, 7, '<!--?php \r\n\r\n?-->\r\n<div class=\"container-fluid\" style=\"margin-bottom:0px; margin-left:0px; margin-right:0px; margin-top:0px; padding:0px\">\r\n<div class=\"embed-responsive\" style=\"height:500px; overflow:hidden\"><iframe class=\"embed-responsive-item\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3353.8114899905586!2d103.6299986677075!3d1.5403939040322194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da7409389f0271%3A0xb4c949b10a26119d!2sIntelhost+-+Your+Reliable+Friend!5e0!3m2!1sen!2smy!4v1507877510913\"></iframe></div>\r\n</div>\r\n\r\n<div class=\"container\" style=\"margin-top:0px\">\r\n<h2 class=\"section-title\">Send Us Feedback</h2>\r\n\r\n<form action=\"\" method=\"POST\" name=\"conForm\">\r\n<div class=\"row\">\r\n<div class=\"col-md-8\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">Name: <input class=\"form-control\" id=\"cname\" name=\"name\" type=\"text\" /></div>\r\n\r\n<div class=\"col-md-6\">Email: <input class=\"form-control\" id=\"cemail\" name=\"email\" type=\"email\" /></div>\r\n\r\n<div class=\"col-md-12\">Message:<textarea class=\"form-control\" id=\"cmessage\" name=\"message\" rows=\"4\"></textarea></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">Phone: <input class=\"form-control\" id=\"cphone\" name=\"phone\" type=\"text\" /></div>\r\n\r\n<div class=\"col-md-12\" style=\"margin-top:15px\">Please copy the text below to the other box.</div>\r\n\r\n<div class=\"col-md-6\"><input class=\"form-control\" id=\"s_key\" readonly=\"readonly\" type=\"text\" /> <script type=\"text/javascript\">// <![CDATA[\r\nshowKey();\r\n// ]]></script></div>\r\n\r\n<div class=\"col-md-6\"><input class=\"form-control\" name=\"s\" type=\"text\" /></div>\r\n\r\n<div class=\"col-md-12\"><br />\r\n<input name=\"send_mess\" type=\"hidden\" /><button class=\"btn btn-success btn-block btn-lg mobilesend\" name=\"send_mess\" onclick=\"validateCon()\" type=\"button\">Send</button></div>\r\n</div>\r\n</div>\r\n</div>\r\n</form>\r\n</div>\r\n', 'home_widget', 'contact-us', 'contact', 'MY', '', 0, '0'),
(6, 'Testimonials', 1, 1, 0, 6, '', 'home_widget', 'testimonial', 'testimonials', 'MY', '', 0, '0'),
(7, 'About Us', 1, 1, 1, 1, '<h2 class=\"section-title text-center\">Best Hosting &amp; Web Design in Singapore</h2>\r\n<p>Intelhost Singapore is a well-known and trusted brand name in website &amp; hosting industry since 2015. Specializes in providing professional performance web &amp; hosting service for organizations and individuals in serving their content to the cyberspace. Our company is consisting of experienced people in website business for many years. We want to be a helpful friend of yours, each dedicated employee receives a series of extensive technical and customer service training to ensure the best customers service just for you. In Intelhost Singapore, our main mission is to provide affordable, reliable and top-notch web &amp; hosting service to all our client throughout the world. Our community dedicate to help customers worldwide in their online business such as ecommerce and offline business growth through delivery of innovative internet products on a superior service platform. We pledged to provide you a brand-new experience where we will undertake your internet technical issues and leaving you with more time to remain focus to grow your business and deploy the best technology, best products and services in this internet industry.</p>', 'home_widget', 'about-us', 'about', 'SG', '', 0, '0'),
(8, 'Domain', 1, 1, 1, 2, '<h2 class=\"section-title\">Get Your Domain Name Today</h2>\r\n<p class=\"intro\">Domain services are the coordinators, allowing higher level functionality between many different smaller parts. These would include things like OrderProcessor, ProductFinder, FundsTransferService.<br />All you need from classic domain names like .com, .in and co.in to new domain names like .club, even .rocks, we can help you find the right name for your business. Start search your domain name now!</p>', 'home_widget', 'domain', 'team', 'SG', '', 0, '0'),
(9, 'Web Design', 1, 1, 1, 3, '<h2 class=\"section-title\">Personalize Your Web Design</h2>\r\n<p class=\"intro\">Don&rsquo;t have any idea about web design? We can do for you. Designing website is a part of our passion. All of our website is carefully tailored by our in-house website designer. Through creative service, we also help to ensure your websites rank higher in search engines such as Google and Bing through our SEO-based creative content writing.</p>', 'home_widget', 'web-design', 'features', 'SG', '', 0, '0'),
(10, 'Hosting', 1, 1, 1, 4, '<h2 class=\"section-title\">The Best Web Hosting Deals</h2>\r\n<p class=\"intro\">All of our web hosting plans are based on the latest market pattern, nothing more important than having a good hosting value more than you will pay. We ensure each of our customer will get the best value through our features like free domain names, 24/7 technical support, 99.9% uptime, onsite support, fastest website speed performance, a feature-rich experience with all you need for your business and many more just for you!</p>', 'home_widget', 'hosting', 'pricing', 'SG', '', 0, '0'),
(11, 'Contact Us', 1, 1, 1, 6, '<!--?php \r\n\r\n?-->\r\n<div class=\"container-fluid\" style=\"margin-bottom:0px; margin-left:0px; margin-right:0px; margin-top:0px; padding:0px\">\r\n<div class=\"embed-responsive\" style=\"height:500px; overflow:hidden\"><iframe class=\"embed-responsive-item\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.5740037020446!2d103.77158131475417!3d1.4309939989563742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeb9c643f60007ea9!2sIntelhost+Singapore+Web%2C+Hosting+%26+Mobile+App!5e0!3m2!1sen!2smy!4v1533458271010\"></iframe></div>\r\n</div>\r\n\r\n<div class=\"container\" style=\"margin-top:10px\">\r\n<h2 class=\"section-title\">Send Us Feedback</h2>\r\n\r\n<form action=\"\" method=\"POST\" name=\"conForm\">\r\n<div class=\"row\">\r\n<div class=\"col-md-8\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">Name: <input class=\"form-control\" id=\"cname\" name=\"name\" type=\"text\" /></div>\r\n\r\n<div class=\"col-md-6\">Email: <input class=\"form-control\" id=\"cemail\" name=\"email\" type=\"email\" /></div>\r\n\r\n<div class=\"col-md-12\">Message:<textarea class=\"form-control\" id=\"cmessage\" name=\"message\" rows=\"4\"></textarea></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\">Phone: <input class=\"form-control\" id=\"cphone\" name=\"phone\" type=\"text\" /></div>\r\n\r\n<div class=\"col-md-12\" style=\"margin-top:15px\">Please copy the text below to the other box.</div>\r\n\r\n<div class=\"col-md-6\"><input class=\"form-control\" id=\"s_key\" readonly=\"readonly\" type=\"text\" /> <script type=\"text/javascript\">// <![CDATA[\r\nshowKey();\r\n// ]]></script></div>\r\n\r\n<div class=\"col-md-6\"><input class=\"form-control\" name=\"s\" type=\"text\" /></div>\r\n\r\n<div class=\"col-md-12\"><br />\r\n<input name=\"send_mess\" type=\"hidden\" /><button class=\"btn btn-success btn-block btn-lg mobilesend\" name=\"send_mess\" onclick=\"validateCon()\" type=\"button\">Send</button></div>\r\n</div>\r\n</div>\r\n</div>\r\n</form>\r\n</div>\r\n', 'home_widget', 'contact-us', 'contact', 'SG', '', 0, '0'),
(12, 'Testimonials', 1, 1, 0, 5, '', 'home_widget', 'testimonial', 'testimonials', 'SG', '', 0, '0'),
(13, 'Cloud', 1, 0, 1, 5, '<h2 class=\"section-title\">The #1<sup style=\"font-size:18pt\">st</sup> Cloud Storage Solution in Malaysia</h2>\r\n\r\n<p class=\"intro\">Intelhost proudly to introduce the most reliable cloud storage service. We provide the best cloud service to client for storing and sharing first at the affordable price.</p>\r\n\r\n<div class=\"ckeditor-html5-video\" data-responsive=\"true\" style=\"text-align:center\">\r\n<video autoplay=\"autoplay\" loop=\"\" poster=\"https://www.intelhost.com.my/images/medias/1555966746-poster_cloud.jpg\" src=\"https://www.workspace.intelhost.com.my/workspace/intelhostportal/images/medias/1554044970-Untitled.mp4\" style=\"max-width: 100%; height: auto;\" width=\"100%\">&nbsp;</video>\r\n</div>\r\n\r\n<h2 class=\"section-title\">&nbsp;</h2>\r\n\r\n<h2 class=\"section-title\">Why Need to Use Our Service</h2>\r\n\r\n<p class=\"intro\">Intelhost Cloud storage is a new concept in cloud computing model that allows faster information deployment, easy management and increase productivity. These are the highlight benefits of our&nbsp; cloud solution:</p>\r\n', 'home_widget', 'cloud-storage', 'cloud-storage', 'MY', '_blank', 1, 'https://intelhostcloud.com/'),
(14, 'Cloud', 1, 0, 1, 5, '<h2 class=\"section-title\">The #1<sup style=\"font-size:18pt\">st</sup> Cloud Storage Solution in Malaysia</h2>\r\n\r\n<p class=\"intro\">Intelhost proudly to introduce the most reliable cloud storage service. We provide the best cloud service to client for storing and sharing first at the affordable price.</p>\r\n\r\n<div class=\"ckeditor-html5-video\" data-responsive=\"true\" style=\"text-align:center\">\r\n<video autoplay=\"autoplay\" loop=\"\" poster=\"https://www.intelhost.com.my/images/medias/1555966746-poster_cloud.jpg\" src=\"https://www.workspace.intelhost.com.my/workspace/intelhostportal/images/medias/1554044970-Untitled.mp4\" style=\"max-width: 100%; height: auto;\" width=\"100%\">&nbsp;</video>\r\n</div>\r\n\r\n<h2 class=\"section-title\">&nbsp;</h2>\r\n\r\n<h2 class=\"section-title\">Why Need to Use Our Service</h2>\r\n\r\n<p class=\"intro\">Intelhost Cloud storage is a new concept in cloud computing model that allows faster information deployment, easy management and increase productivity. These are the highlight benefits of our&nbsp; cloud solution:</p>\r\n', 'home-widget', 'cloud-storage', 'cloud-storage', 'SG', '_blank', 1, 'https://intelhostcloud.com/');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `r_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `r_time` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`r_id`, `r_name`, `r_user`, `r_date`, `r_time`) VALUES
(4, 'Finance', 'hery', '07-Apr-2019', 1554645119),
(3, 'Admin', 'hery', '07-Apr-2019', 1554645106),
(5, 'Marketing', 'hery', '07-Apr-2019', 1554645139),
(6, 'Designer', 'hery', '07-Apr-2019', 1554645254),
(7, 'Webmaster', 'hery', '07-Apr-2019', 1554646713);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `s_id` int(11) NOT NULL,
  `s_page` int(11) NOT NULL,
  `s_name` varchar(1000) NOT NULL,
  `s_alias` varchar(255) NOT NULL,
  `s_order` int(11) NOT NULL,
  `s_content` text NOT NULL,
  `s_user` varchar(255) NOT NULL,
  `s_date` varchar(255) NOT NULL,
  `s_time` varchar(12) NOT NULL,
  `s_status` int(11) NOT NULL,
  `s_ismenu` int(11) NOT NULL,
  `s_portal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `company` text NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `fax` text NOT NULL,
  `email` text NOT NULL,
  `website` text NOT NULL,
  `logo` text NOT NULL,
  `description` text NOT NULL,
  `tag` text NOT NULL,
  `metaTag` text NOT NULL,
  `maintenance` varchar(255) NOT NULL,
  `webAddress` text NOT NULL,
  `webApiAddress` text NOT NULL,
  `logoLong` text NOT NULL,
  `portal` varchar(255) NOT NULL,
  `invoiceTitle` varchar(255) NOT NULL,
  `invoiceLogo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `company`, `regNo`, `address`, `phone`, `fax`, `email`, `website`, `logo`, `description`, `tag`, `metaTag`, `maintenance`, `webAddress`, `webApiAddress`, `logoLong`, `portal`, `invoiceTitle`, `invoiceLogo`) VALUES
(1, 'Largest Business Directory - Leading Global Business Market', 'Intelligent Hosting Sdn. Bhd.', '1158583-U', 'No. 23A, 25A Jalan Kebudayaan 16, Taman Universiti, 81300 Skudai, Johor Bahru West Malaysia.', '+607-521 1178 / +607-521 1278 / +607-521 1378', '+6 07-521 1173', 'sales@intelhost.com.my', 'www.intelhost.com.my', 'icon.png', 'The Intelhost management team has many years of experience in providing high quality, affordable website hosting. Your account will utilize only the best of breed server hardware, the most dependable network providers and the most up to date software programs available anywhere on the internet.', 'ima education, hosting, hosting malaysia, web host, server, dedicated server, web design, best web design malaysia', '', '0', 'http://localhost/bizdir/v2', '/models/internal_restapi.php', 'logolongtextinverse.png', 'MY', 'INVOICE', '1535525762-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_description` text NOT NULL,
  `s_status` int(11) NOT NULL,
  `s_date` varchar(100) NOT NULL,
  `s_time` int(15) NOT NULL,
  `s_company` int(11) NOT NULL,
  `s_value` double NOT NULL,
  `s_weight` int(11) NOT NULL,
  `s_from` varchar(255) NOT NULL,
  `s_to` varchar(255) NOT NULL,
  `s_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`s_id`, `s_name`, `s_description`, `s_status`, `s_date`, `s_time`, `s_company`, `s_value`, `s_weight`, `s_from`, `s_to`, `s_user`) VALUES
(8, 'DHL', 'Price is fixed', 1, '24-Aug-2019', 1566661993, 0, 40, 200, 'MY', 'AU', 'anwar'),
(9, 'Pos Laju (Local)', '', 1, '24-Aug-2019', 1566662203, 0, 10.5, 2500, 'MY', 'MY', 'anwar');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `s_id` int(11) NOT NULL,
  `s_title` text NOT NULL,
  `s_url` text NOT NULL,
  `s_icon` varchar(255) NOT NULL,
  `s_style` text NOT NULL,
  `s_class` text NOT NULL,
  `s_description` text NOT NULL,
  `s_type` text NOT NULL,
  `s_target` varchar(255) NOT NULL,
  `s_portal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`s_id`, `s_title`, `s_url`, `s_icon`, `s_style`, `s_class`, `s_description`, `s_type`, `s_target`, `s_portal`) VALUES
(1, 'Facebook', 'https://www.facebook.com/intelhost.my/', 'fa fa-facebook', 'border-radius: 0px; color:white;', 'social-btn', 'Facebook URL', '', '_blank', 'MY'),
(2, 'Google Plus', 'https://plus.google.com/100750639778478267038', 'fa fa-google-plus', 'border-radius: 0px; color:white;', 'social-btn', 'Google Plus URL', '', '_blank', 'MY'),
(3, 'YouTube ', 'https://www.youtube.com/channel/UCqlVND-aUEvGxzrYaKZoI7Q', 'fa fa-youtube', 'border-radius: 0px; color:white;', 'social-btn', 'YouTube URL', '', '_blank', 'MY'),
(4, 'Telephone', 'tel:+607-521 1178', 'fa fa-phone', 'border-radius: 0px; color:white;', 'social-btn', 'Phone Number', '', '_blank', 'MY');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `t_id` int(11) NOT NULL,
  `t_name` text COLLATE utf8_unicode_ci NOT NULL,
  `t_rate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `t_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_regid` text COLLATE utf8_unicode_ci NOT NULL,
  `t_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `t_time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `t_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`t_id`, `t_name`, `t_rate`, `t_code`, `t_regid`, `t_date`, `t_time`, `t_user`, `t_status`) VALUES
(1, 'GST', '0', 'GST', '000201027584', '02-Sep-2018', '1535887661', 'hery', 0),
(4, 'SST', '10', 'SST', 'SST', '20-Jul-2019', '1563639660', '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `t_id` int(11) NOT NULL,
  `t_title` text COLLATE utf8_unicode_ci NOT NULL,
  `t_content` text COLLATE utf8_unicode_ci NOT NULL,
  `t_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `t_time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `t_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`t_id`, `t_title`, `t_content`, `t_date`, `t_time`, `t_user`) VALUES
(7, 'Standard Template One Column', 'PHA+PGltZyBzcmM9Imh0dHBzOi8vd29ya3NwYWNlLmludGVsaG9zdC5jb20ubXkvd29ya3NwYWNlL2VtYWlsbWFya2V0aW5nL0RlY2VtYmVyJTIwMjAxNy92My8xLmpwZyIgc3R5bGU9IndpZHRoOjEwMCUiIC8+PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPGRpdj4NCjxoMj5JbnRyb2R1Y2luZyBJbnRlbGhvc3Q6PGJyIC8+DQpCZXN0IFdlYiwgSG9zdGluZyAmYW1wOyBNb2JpbGUgQXBwbGljYXRpb24gUHJvdmlkZXIhPC9oMj4NCg0KPHA+SW50ZWxob3N0IGhhcyBhIHdlbGwta25vd24gYW5kIHRydXN0ZWQgbmFtZSBpbiBob3N0aW5nIGluZHVzdHJ5IHNpbmNlIDIwMTUuIEl0IHNwZWNpYWxpemVzIGluIHByb3ZpZGluZyBhIHJlbGlhYmxlIGFuZCBxdWFsaXR5IHdlYiBob3N0aW5nIGZvciBvcmdhbml6YXRpb24gYW5kIGluZGl2aWR1YWxzIHRvIHNlcnZlIGNvbnRlbnRzIHRvIHRoZSBpbnRlcm5ldC4gV2UgZW1wbG95ZWQgZGVkaWNhdGVkIHByb2Zlc3Npb25hbCBzdGFmZnMgd2hvIGFyZSBsb2FkZWQgd2l0aCBleHBlcmllbmNlIG9mIHNldmVyYWwgeWVhcnMgb2YgcHVyZSBkZXZlbG9wbWVudC4gTW9yZW92ZXIsIGVhY2ggZGVkaWNhdGVkIGVtcGxveWVlIHJlY2VpdmVzIGEgc2VyaWVzIG9mIGV4dGVuc2l2ZSB0ZWNobmljYWwgYW5kIGN1c3RvbWVycyBhcmUgYWx3YXlzIHJlY2VpdmUgdGhlIGZyaWVuZGx5LCBhY2N1cmF0ZSBhbmQgcHJvZmVzc2lvbmFsIHNlcnZpY2VzLiBCZXNpZGUgSVQgc3VwcGx5aW5nIElUIHNlcnZpY2VzLCBJbnRlbGhvc3QgYWxzbyBoYXMgaXQmIzM5O3Mgb3duIGJ1c2luZXNzIGRpcmVjdG9yaWVzIHRoYXQgaG9sZHMgaHVuZHJlZHMgb2YgY29tcGFueSBpbmZvcm1hdGlvbiBhbmQgb25saW5lIGJ1c2luZXNzIHBhcnRuZXJzIGFyb3VuZCB0aGUgd29ybGQuPC9wPg0KPC9kaXY+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48aW1nIHNyYz0iaHR0cHM6Ly93b3Jrc3BhY2UuaW50ZWxob3N0LmNvbS5teS93b3Jrc3BhY2UvZW1haWxtYXJrZXRpbmcvRGVjZW1iZXIlMjAyMDE3L3YzLzIuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8ZGl2Pg0KPGgyPlN0YXJ0IFlvdXIgV2Vic2l0ZSAmYW1wOyBHZXQgUmVhY2ggTW9yZSBDdXN0b21lciE8L2gyPg0KDQo8cD5XZSBhdCBJbnRlbGhvc3QgYXJlIHZlcnkgY29tbWl0dGVkIGluIG91ciB3b3JrIGVzcGVjaWFsbHkgaW4gZnVsZmlsbCBldmVyeSBkZXNpZ24gbWF0ZXJpYWwgcmVxdWlyZWQuIE91ciBkZXNpZ25lciBhcmUgZXh0cmVtZWx5IGV4cGVydHMsIHdlbGwgZXhwZXJpZW5jZWQsIGRlc2lnbmVkIGZvciBtb3JlIHRoYW4gaHVuZHJlZHMgb2Ygd2ViIGRlc2lnbiBhbmQgbW9zdCBvZiBvdXIgZGVzaWduIGFyZSByZWx5IG9uIEJvb3RzdHJhcCA0LCBNYXRlcmlhbCBEZXNpZ24gYW5kIEZvdW5kYXRpb24hPC9wPg0KPC9kaXY+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48aW1nIHNyYz0iaHR0cHM6Ly93b3Jrc3BhY2UuaW50ZWxob3N0LmNvbS5teS93b3Jrc3BhY2UvZW1haWxtYXJrZXRpbmcvRGVjZW1iZXIlMjAyMDE3L3YzLzMuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8ZGl2Pg0KPGgyPkN1c3RvbSBOYXRpdmUgJmFtcDsgSHlicmlkIE1vYmlsZSBBcHAgRGV2ZWxvcG1lbnQhPC9oMj4NCg0KPHA+T3VyIGRldmVsb3BlcnMgYXJlIGhpZ2hseSBza2lsbGVkIGluIG1vYmlsZSBhcHBsaWNhdGlvbiBkZXZlbG9wbWVudCBhbmQgb3VyIGRldmVsb3BtZW50IHN1cHBvcnQgQ3Jvc3MgUGxhdGZvcm0gZmVhdHVyZXMuIENyb3NzIFBsYXRmb3JtIG1lYW5zIGV2ZXJ5IGRldmVsb3BlZCBhcHAsIHdlIGdlbmVyYXRlIHBvcnRhYmxlL3NoYXJlZCBsaWJyYXJ5IHRoYXQgY2FuIGJlIHVzZSBvbiBvdGhlciBhcHBzIGZyb20gb3RoZXIgcGxhdGZvcm0uIFRoaXMgZnVuY3Rpb25hbGl0eSBhcmUgcmFyZWx5IGZvdW5kIGFuZCB0aGlzIG1ha2VzIG91ciBkZXZlbG9wbWVudCBwcm9jZXNzIGZhc3RlciB0aGFuIG91dGhlcnMuPC9wPg0KDQo8cD5PdXIgZXhwZXJ0aXNlIGhhcyB5ZWFycyBvZiBleHBlcmllbmNlIGluIGRldmVsb3BpbmcgaGlnaC1lbmQsIGdyYXBoaWNhbCwgaW50ZWdyYXRlZCBXZWJzZXJ2aWNlIGluZm9ybWF0aW9uIGFuZCBtdWNoIG1vcmUuIFRoZXNlIGFwcGxpY2F0aW9uIGFyZSBzZWN1cmVseSBkZXZlbG9wZWQgYW5kIHdlbGwgY29tcGlsZWQgdG8gdXNlIGluIGluZHVzdHJ5LjwvcD4NCjwvZGl2Pg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+PGltZyBzcmM9Imh0dHBzOi8vd29ya3NwYWNlLmludGVsaG9zdC5jb20ubXkvd29ya3NwYWNlL2VtYWlsbWFya2V0aW5nL0RlY2VtYmVyJTIwMjAxNy92My80LmpwZyIgc3R5bGU9IndpZHRoOjEwMCUiIC8+PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPGRpdj4NCjxoMj5lQ29tbWVyY2UgRGV2ZWxvcGVyPC9oMj4NCg0KPHA+T3VyIGVDb21tZXJjZSBwbGF0Zm9ybSBhcmUgYmFzZSBvbiBwcmUtYnVpbHQgYW5kIGN1c3RvbSBkZXZlbG9wZWQuIE91ciBhaW1zIGlzIHRvIG1lZXQgb3VyIGNsaWVudCYjMzk7cyBuZWVkLiBFdmVyeSBkZXZlbG9wbWVudCBvciBzZXR1cCBhcmUgZG9uZSB0aG9yb3VnaGx5IHRvIG1ha2Ugc3VyZSBhbGwgc2VjdXJpdHkgbWF0dGVyLCB1c2VyJiMzOTtzIG1hdHRlciBhcmUgY29tcGxldGVseSBmbGV4aWJsZSBhbmQgc2FmZS48L3A+DQoNCjxwPlRvIG1ha2Ugb3VyIGNsaWVudCYjMzk7cyBidXNpbmVzcyBldm9sdmVkLCB3ZSBkZWRpY2F0ZWQgYSB3ZWJzZXJ2aWNlIGVtYmVkZGVkIGluIGV2ZXJ5IHBsYXRmb3JtIHdlIGRldmVsb3BlZCBvciBzZXR1cC4gVGhpcyBmZWF0dXJlIGNhbiBiZSBlYXNpbHkgZW5hYmxlIG9yIGRpc2FibGUgYnkgY2xpZW50IHRoZW1zZWxmLiBUaGlzIGZlYXR1cmVzIGFyZSB2ZXJ5IGltcG9ydGFudCB0byBkZXZlbG9wIGEgTmF0aXZlIG9yIEh5YnJpZCBNb2JpbGUgQXBwbGljYXRpb24uPC9wPg0KPC9kaXY+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48aW1nIHNyYz0iaHR0cHM6Ly93b3Jrc3BhY2UuaW50ZWxob3N0LmNvbS5teS93b3Jrc3BhY2UvZW1haWxtYXJrZXRpbmcvRGVjZW1iZXIlMjAyMDE3L3YzLzUuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8ZGl2Pg0KPGgyPkludGVsaG9zdCBCdXNpbmVzcyBESXJlY3RvcnkgUGxhdGZvcm08L2gyPg0KDQo8cD5EbyB5b3UgaGF2ZSBidXNpbmVzcyBidXQgc3RpbGwgY2FuJnJzcXVvO3QgcmVhY2ggeW91ciBhaW0gb3IgZ29hbD8gSWYgeW91IHNhaWQgc28sIHRoaXMgaXMgYSBwZXJmZWN0IHRpbWUgdG8gYWRkLW9uIHlvdXIgYnVzaW5lc3Mgc3RyYXRlZ3kgd2l0aCBzb21lIGFkdmFuY2UgbWFya2V0aW5nIHdlYXBvbjsgd2Vic2l0ZS4gTGl2aW5nIGluIHRoaXMgbW9kZXJuIGNlbnR1cnksIGludGVybmV0IGhhcyBiZWNvbWUgdGhlIG1haW4gbWV0aG9kIGZvciBwZW9wbGUgdG8gY29udGFjdCB3aWRlbHkgd2l0aG91dCBib3VuZGFyaWVzLiBJbiBmYWN0LCBhY2NvcmRpbmcgdG8gSW50ZXJuZXQgV29ybGQgU3RhdCwgdGhlcmUgYXJlIG5vdyAzLjg4IGJpbGxpb24gSW50ZXJuZXQgdXNlcnMgaW4gdGhlIHdvcmxkIGFzIGF0IEp1bmUgMjAxNywgdGhpcyBpcyBjb21wYXJlZCB0byAzLjI2IGJpbGxpb24gSW50ZXJuZXQgdXNlcnMgaW4gMjAxNi4mcmRxdW87IEJlbG93IGFyZSBmaXZlIHJlYXNvbnMgdG8gaGF2aW5nIGEgd2Vic2l0ZSBmb3IgeW91ciBidXNpbmVzcyBleHBhbnNpb24uIEludGVsaG9zdCBwbGF0Zm9ybSBpcyB0byBoZWxwIHBlb3BsZSBjcmVhdGUgdGhlaXIgb3duIGJ1c2luZXNzIHdlYnNpdGUgd2l0aG91dCB3b3JyeWluZyB0byBzcGVuZCBtb3JlIHRpbWUgaW4gdGhpcyBtYXR0ZXIgZXNwZWNpYWxseSBmb3Igbm9uLXRlY2hub2xvZ3kgaW5kdXN0cnksIHRoZXkganVzdCB3YW50ZWQgYSB3ZWJzaXRlIGZvciBtYXJrZXRpbmcgYW5kIHB1YmxpY2l0eS48L3A+DQo8L2Rpdj4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPjxpbWcgc3JjPSJodHRwczovL3dvcmtzcGFjZS5pbnRlbGhvc3QuY29tLm15L3dvcmtzcGFjZS9lbWFpbG1hcmtldGluZy9EZWNlbWJlciUyMDIwMTcvdjMvZjIuanBnIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8ZGl2Pg0KPHA+QXJlIHlvdSBhd2FyZSB0aGF0IGV2ZXJ5IGRheSwgbWlsbGlvbnMgb2Ygd2Vic2l0ZSBvd25lcnMgYXJlIHB1dHRpbmcgdGhlbXNlbHZlcyBhdCByaXNrIGp1c3QgYnkgbm90IGhhdmluZyAmcXVvdDtzaGVpbGQmcXVvdDsgdG8gdGhlaXIgcGVyc29uYWwgZGV0YWlscz8gWW91ciBwZXJzb25hbCBkZXRhaWwgc3VjaCBhcyBjb250YWN0IGluZm9ybWF0aW9uIGlzIGhhcnZlc3RlZCBieSBzcGFtbWVycyBmcm9tIHB1YmxpY2x5IGFjY2Vzc2libGUgV2hvaXMgdG8gc2VuZCBzcGFtIGFuZCBvdGhlciB1bnRoaW5rYWJsZSBtaXNjb25kdWN0cy48L3A+DQoNCjxwPkF0IEludGVsaG9zdCwgd2UgcHJvdGVjdCBvdXIgY2xpZW50cyBpbmZvcm1hdGlvbiBlc3BlY2lhbGx5IGRvbWFpbiBXaG9pcyBpbmZvcm1hdGlvbiB0byBtYWtlIHN1cmUgb3VyIGNsaWVudCBpcyBub3QgZWFzaWx5IGFjY2Vzc2VkIGJ5IHB1YmxpYyBvciBldmVuIGJhZCwgdGhlIHNwYW1tZXJzLjwvcD4NCjwvZGl2Pg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48aW1nIHNyYz0iaHR0cHM6Ly93b3Jrc3BhY2UuaW50ZWxob3N0LmNvbS5teS93b3Jrc3BhY2UvZW1haWxtYXJrZXRpbmcvRGVjZW1iZXIlMjAyMDE3L3YzL2Y4LlBORyIgLz48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+PGltZyBzcmM9Imh0dHBzOi8vd29ya3NwYWNlLmludGVsaG9zdC5jb20ubXkvd29ya3NwYWNlL2VtYWlsbWFya2V0aW5nL0RlY2VtYmVyJTIwMjAxNy92My9mMS5qcGciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+PGltZyBzcmM9Imh0dHBzOi8vd29ya3NwYWNlLmludGVsaG9zdC5jb20ubXkvd29ya3NwYWNlL2VtYWlsbWFya2V0aW5nL0RlY2VtYmVyJTIwMjAxNy92My9mMTAucG5nIiAvPiA8aW1nIHNyYz0iaHR0cHM6Ly93b3Jrc3BhY2UuaW50ZWxob3N0LmNvbS5teS93b3Jrc3BhY2UvZW1haWxtYXJrZXRpbmcvRGVjZW1iZXIlMjAyMDE3L3YzL2YxMS5wbmciIC8+IDxpbWcgc3JjPSJodHRwczovL3dvcmtzcGFjZS5pbnRlbGhvc3QuY29tLm15L3dvcmtzcGFjZS9lbWFpbG1hcmtldGluZy9EZWNlbWJlciUyMDIwMTcvdjMvZjEyLnBuZyIgLz4gPGltZyBzcmM9Imh0dHBzOi8vd29ya3NwYWNlLmludGVsaG9zdC5jb20ubXkvd29ya3NwYWNlL2VtYWlsbWFya2V0aW5nL0RlY2VtYmVyJTIwMjAxNy92My9mMTMucG5nIiAvPiA8aW1nIHNyYz0iaHR0cHM6Ly93b3Jrc3BhY2UuaW50ZWxob3N0LmNvbS5teS93b3Jrc3BhY2UvZW1haWxtYXJrZXRpbmcvRGVjZW1iZXIlMjAyMDE3L3YzL2YxNC5wbmciIC8+IDxpbWcgc3JjPSJodHRwczovL3dvcmtzcGFjZS5pbnRlbGhvc3QuY29tLm15L3dvcmtzcGFjZS9lbWFpbG1hcmtldGluZy9EZWNlbWJlciUyMDIwMTcvdjMvZjE1LnBuZyIgLz48L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQo=', '24-Mar-2018', '1521906603', 'hery'),
(10, 'Multi Colum Template 1', 'PGRpdiBzdHlsZT0id2lkdGg6MTAwJSI+DQo8dGFibGUgc3R5bGU9IndpZHRoOjEwMCUiPg0KCTx0Ym9keT4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2VtYWlsX2ltYWdlcy9iYW5uZXIyLmpwZyIgc3R5bGU9IndpZHRoOjEwMCUiIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPg0KCQkJPGgyPkludHJvZHVjaW5nIEludGVsaG9zdDogQmVzdCBXZWIsIEhvc3RpbmcgJmFtcDsgTW9iaWxlIEFwcGxpY2F0aW9uIFByb3ZpZGVyITwvaDI+DQoJCQk8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQ+SW50ZWxob3N0IGhhcyBhIHdlbGwta25vd24gYW5kIHRydXN0ZWQgbmFtZSBpbiBob3N0aW5nIGluZHVzdHJ5IHNpbmNlIDIwMTUuIEl0IHNwZWNpYWxpemVzIGluIHByb3ZpZGluZyBhIHJlbGlhYmxlIGFuZCBxdWFsaXR5IHdlYiBob3N0aW5nIGZvciBvcmdhbml6YXRpb25zIGFuZCBpbmRpdmlkdWFscyB0byBzZXJ2ZSBjb250ZW50IHRvIHRoZSBJbnRlcm5ldC4gV2UgZW1wbG95ZWQgZGVkaWNhdGVkIHByb2Zlc3Npb25hbCBzdGFmZnMgd2hvIGFyZSBsb2FkZWQgd2l0aCBleHBlcmllbmNlIG9mIHNldmVyYWwgeWVhcnMgb2YgcHVyZSBkZXZlbG9wbWVudC48L3RkPg0KCQkJPHRkPk1vcmVvdmVyLCBlYWNoIGRlZGljYXRlZCBlbXBsb3llZSByZWNlaXZlcyBhIHNlcmllcyBvZiBleHRlbnNpdmUgdGVjaG5pY2FsIGFuZCBjdXN0b21lciBzZXJ2aWNlIHRyYWluaW5nIGluIG9yZGVyIHRvIGVuc3VyZSB0aGF0IHRoZSBjdXN0b21lcnMgYXJlIGFsd2F5cyByZWNlaXZlIHRoZSBmcmllbmRseSwgYWNjdXJhdGUgYW5kIHByb2Zlc3Npb25hbCBzZXJ2aWNlcy4gQmVzaWRlIElUIHN1cHBseWluZyBJVCBTZXJ2aWNlcywgSW50ZWxob3N0IGFsc28gaGFzIGl0JiMzOTtzIG93biBidXNpbmVzcyBkaXJlY3RvcmllcyB0aGF0IGhvbGQgaHVuZHJlZHMgb2YgY29tcGFueSBpbmZvcm1hdGlvbiBhbmQgb25saW5lIGJ1c2luZXNzIHBhcnRuZXJzIGFyb3VuZCB0aGUgd29ybGQ8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aHIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyIgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5teS8iIHN0eWxlPSJiYWNrZ3JvdW5kOiBncmVlbjsgY29sb3I6IHdoaXRlOyBwYWRkaW5nOiAxMHB4OyBib3JkZXItcmFkaXVzOiA1cHg7IHRleHQtZGVjb3JhdGlvbjogbm9uZTsiPkpvaW4gT3VyIEJ1c2luZXNzIERpcmVjdG9yeSEgPC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZD48YnIgLz4NCgkJCTxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2VtYWlsX2ltYWdlcy9XZWJzaXRlMi5wbmciIHN0eWxlPSJ3aWR0aDoxMDAlIiAvPjwvdGQ+DQoJCQk8dGQ+DQoJCQk8aDI+U3RhcnQgWW91ciBXZWJzaXRlICZhbXA7IEdldCBSZWFjaCBNb3JlIEN1c3RvbWVyITwvaDI+DQoNCgkJCTxwPldlIGF0IEludGVsaG9zdCBhcmUgdmVyeSBjb21taXR0ZWQgaW4gb3VyIHdvcmsgZXNwZWNpYWxseSBpbiBmdWxmaWxsIGV2ZXJ5IGRlc2lnbiBtYXRlcmlhbCByZXVpcmVkLiBPdXIgZGVzaWduZXIgYXJlIGV4dHJlbWVseSBleHBlcnRzLCB3ZWxsIGV4cGVyaWVuY2VkLCBkZXNpZ25lZCBmb3IgbW9yZSB0aGFuIGh1bmRyZWRzIG9mIHdlYiBkZXNpZ24gYW5kIGFsbW9zdCBvZiBvdXIgZGVzaWduIGFyZSByZWx5IG9uIEJvb3RzdHJhcCA0LCBNYXRlcmlhbCBEZXNpZ24gYW5kIEZvdW5kYXRpb24uPC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8jZmVhdHVyZXMiIHN0eWxlPSJiYWNrZ3JvdW5kOiAjZDk1MzRmOyBjb2xvcjogd2hpdGU7IHBhZGRpbmc6IDEwcHg7IGJvcmRlci1yYWRpdXM6IDVweDsgdGV4dC1kZWNvcmF0aW9uOiBub25lOyI+U3RhcnQgWW91ciBXZWJzaXRlIEAgJDE2NCEgPC9hPjwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZD4NCgkJCTxoMj5DdXN0b20gTmF0aXZlICZhbXA7IEh5YnJpZCBNb2JpbGUgQXBwIERldmVsb3BtZW50ITwvaDI+DQoNCgkJCTxwPk91ciBkZXZlbG9wZXIgYXJlIGhpZ2hseSBza2lsbGVkIGluIG1vYmlsZSBhcHBsaWNhdGlvbiBkZXZlbG9wbWVudCBhbmQgb3VyIGRldmVsb3BtZW50IHN1cHBvcnQgQ3Jvc3MgUGxhdGZvcm0gZmVhdHVyZXMuIENyb3NzIHBsYXRmb3JtIG1lYW5zIGV2ZXJ5IGRldmVsb3BlZCBhcHAsIHdlIGdlbmVyYXRlIHNoYXJlZC9wb3J0YWJsZSBsaWJhcmF5IHRoYXQgY2FuIGJlIHVzZSBieSBvdGhlciBhcHBzIGZyb20gb3RoZXIgcGxhdGZvcm0uIFRoaXMgZnVuY3Rpb25hbGl0eSBhcmUgcmFyZWx5IGZvdW5kIGFuZCB0aGlzIG1ha2VzIG91ciBkZXZlbG9wbWVudCBwcm9jZXNzIGZhc3RlciB0aGFuIGFueW9uZS48L3A+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1Mzc0NjA5MTctc3R1ZGlvLWxvZ28ucG5nIiBzdHlsZT0id2lkdGg6MTAwJSIgLz4NCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyNhYm91dCIgc3R5bGU9ImJhY2tncm91bmQ6ICNkOTUzNGY7IGNvbG9yOiB3aGl0ZTsgcGFkZGluZzogMTBweDsgYm9yZGVyLXJhZGl1czogNXB4OyB0ZXh0LWRlY29yYXRpb246IG5vbmU7Ij5HZXQgWW91ciBBcHBzIE5vdyEgPC9hPjwvcD4NCgkJCTwvdGQ+DQoJCQk8dGQ+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9lbWFpbF9pbWFnZXMvbW9iaWxlLWFwcHMucG5nIiBzdHlsZT0id2lkdGg6MTAwJSIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aHIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aDI+UGljayBZb3VyIERvbWFpbiBGcm9tIE1vcmUgVGhhbiA1MDArIEV4dGVuc2lvbiE8L2gyPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvZW1haWxfaW1hZ2VzL2RvbWFpbi1jb21tZXJjaWFsLmpwZyIgc3R5bGU9IndpZHRoOjEwMCUiIC8+DQoJCQk8cD5BcmUgeW91IGF3YXJlIHRoYXQgZXZlcnkgZGF5LCBtaWxsaW9ucyBvZiB3ZWJzaXRlIG93bmVycyBhcmUgcHV0dGluZyB0aGVtc2VsdmVzIGF0IHJpc2sganVzdCBieSBub3QgaGF2aW5nIGEgJmFjaXJjOyZldXJvOyZvZWxpZztzaGllbGQmYWNpcmM7JmV1cm87wp0gdG8gdGhlaXIgcGVyc29uYWwgZGV0YWlscz8gWW91ciBwZXJzb25hbCBkZXRhaWwgc3VjaCBhcyBjb250YWN0IGluZm9ybWF0aW9uIGlzIGhhcnZlc3RlZCBieSBzcGFtbWVycyBmcm9tIHB1YmxpY2x5IGFjY2Vzc2libGUgV2hvaXMgdG8gc2VuZCBzcGFtIGFuZCBvdGhlciB1bnRoaW5rYWJsZSBtaXNjb25kdWN0cy48L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyN0ZWFtIiBzdHlsZT0iYmFja2dyb3VuZDogI2Q5NTM0ZjsgY29sb3I6IHdoaXRlOyBwYWRkaW5nOiAxMHB4OyBib3JkZXItcmFkaXVzOiA1cHg7IHRleHQtZGVjb3JhdGlvbjogbm9uZTsiPlNlYXJjaCBEb21haW4hIDwvYT48L3A+DQoJCQk8L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyI+DQoJCQk8aHIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgY29sc3Bhbj0iMyIgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5mYWNlYm9vay5jb20vaW50ZWxob3N0Lm15LyIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgcGFkZGluZzogNXB4OyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvZW1haWxfaW1hZ2VzL2ZiLnBuZyIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsgcGFkZGluZzogNXB4OyI+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2VtYWlsX2ltYWdlcy95Mi5wbmciIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBwYWRkaW5nOiA1cHg7Ij4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvZW1haWxfaW1hZ2VzL2cucG5nIiAvPiA8L2E+IDxhIGhyZWY9InRlbDorNjAxMjI4MzY3MzEiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IHBhZGRpbmc6IDVweDsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9lbWFpbF9pbWFnZXMvYy5wbmciIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9pbWFlZHVjYXRpb25ncm91cC8iIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IHBhZGRpbmc6IDVweDsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9lbWFpbF9pbWFnZXMvaW5zdGEucG5nIiAvPiA8L2E+IDxhIGhyZWY9Imh0dHBzOi8vdHdpdHRlci5jb20vaW1hZWR1Z3JvdXAiIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IHBhZGRpbmc6IDVweDsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9lbWFpbF9pbWFnZXMvdHdpdHRlci5wbmciIC8+IDwvYT48L3RkPg0KCQkJPHRkPiZuYnNwOzwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj4NCgkJCTxoMiBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPkludGVsaG9zdCAtIFdlIHByb3ZpZGUgdGhlIEJlc3QgSVQgU29sdXRpb24gVG8gR3JvdyBVcCBZb3VyIEJ1c2luZXNzITwvaDI+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teSN0ZWFtIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2VtYWlsX2ltYWdlcy9pY29fZG9tYWluLmpwZyIgLz4gPC9hPiA8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15I2ZlYXR1cmVzIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyIgdGFyZ2V0PSJfYmxhbmsiPiA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9lbWFpbF9pbWFnZXMvaWNvX3dlYi5qcGciIC8+IDwvYT4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teSNhYm91dCIgc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZTsiIHRhcmdldD0iX2JsYW5rIj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvZW1haWxfaW1hZ2VzL2ljb19tb2JpbGUuanBnIiAvPiA8L2E+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5teS8iIHN0eWxlPSJ0ZXh0LWRlY29yYXRpb246IG5vbmU7IiB0YXJnZXQ9Il9ibGFuayI+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2VtYWlsX2ltYWdlcy9pY29fYnVzaW5lc3MuanBnIiAvPiA8L2E+PC9wPg0KCQkJPC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPg0KCQkJPGhyIC8+PHNtYWxsPiZjb3B5O0FsbCByaWdodHMgcmVzZXJ2ZWQuICZyZWc7SW50ZWxsaWdlbnQgSG9zdGluZyBTZG4uIEJoZC4gMTE1ODU4My1VLiAmdHJhZGU7WW91ciBSZWxpYWJsZSBGcmllbmQhIDwvc21hbGw+PC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCjwvZGl2Pg0K', '24-Mar-2018', '1521893104', 'hery'),
(11, 'Test Video', 'PGRpdiBjbGFzcz0iY2tlZGl0b3ItaHRtbDUtdmlkZW8iIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+DQo8dmlkZW8gYXV0b3BsYXk9ImF1dG9wbGF5IiBjb250cm9scz0iY29udHJvbHMiIGhlaWdodD0iYXV0byIgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTU1Mzc2NTUwOS0xMy5tcDQiIHdpZHRoPSIxMDAlIj4mbmJzcDs8L3ZpZGVvPg0KPC9kaXY+DQoNCjxoMT48c3Ryb25nPldlbGNvbWUgV29yZHMgR29lcyBIZXJlITwvc3Ryb25nPjwvaDE+DQoNCjxwPjxzdHJvbmc+SW50ZWxob3N0IDwvc3Ryb25nPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywgcmVtYWluaW5nIGVzc2VudGlhbGx5IHVuY2hhbmdlZC4gSXQgd2FzIHBvcHVsYXJpc2VkIGluIHRoZSAxOTYwcyB3aXRoIHRoZSByZWxlYXNlIG9mIExldHJhc2V0IHNoZWV0cyBjb250YWluaW5nIExvcmVtIElwc3VtIHBhc3NhZ2VzLCBhbmQgbW9yZSByZWNlbnRseSB3aXRoIGRlc2t0b3AgcHVibGlzaGluZyBzb2Z0d2FyZSBsaWtlIEFsZHVzIFBhZ2VNYWtlciBpbmNsdWRpbmcgdmVyc2lvbnMgb2YgTG9yZW0gSXBzdW0uPC9wPg0KDQo8dGFibGUgYm9yZGVyPSIwIiBjZWxscGFkZGluZz0iMTUiIGNlbGxzcGFjaW5nPSIxIiBzdHlsZT0iYm9yZGVyOm1lZGl1bSBub25lOyBoZWlnaHQ6NDM0cHg7IHdpZHRoOjEwMCUiPg0KCTx0Ym9keT4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlcjsgdmVydGljYWwtYWxpZ246Y2VudGVyOyB3aWR0aDo1MCUiPg0KCQkJPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij5CZXN0IFdvcmQgR29lcyBIZXJlITwvaDE+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij48c3Ryb25nPldIWT88L3N0cm9uZz48L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij5Mb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsPC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+Jm5ic3A7PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+PHN0cm9uZz5XSE8/PC9zdHJvbmc+PC9wPg0KDQoJCQk8cCBzdHlsZT0idGV4dC1hbGlnbjpyaWdodCI+TG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLC48L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij4mbmJzcDs8L3A+DQoNCgkJCTxwIHN0eWxlPSJ0ZXh0LWFsaWduOnJpZ2h0Ij4mbmJzcDs8L3A+DQoJCQk8L3RkPg0KCQkJPHRkIHN0eWxlPSJ3aWR0aDo1MCUiPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTI1ODQ0MDgtd2Vic2l0ZS5qcGciIHN0eWxlPSJib3JkZXItc3R5bGU6c29saWQ7IGJvcmRlci13aWR0aDowcHg7IHdpZHRoOjEwMCUiIC8+PC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8aDEgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj5Eb21haW4gTmFtZTwvaDE+DQoNCjx0YWJsZSBib3JkZXI9IjAiIGNlbGxwYWRkaW5nPSIxNSIgY2VsbHNwYWNpbmc9IjEiIHN0eWxlPSJib3JkZXI6bWVkaXVtIG5vbmU7IHdpZHRoOjEwMCUiPg0KCTx0Ym9keT4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ3aWR0aDo1MCUiPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTI1ODQzOTMtZG9tYWluLmpwZyIgc3R5bGU9ImJvcmRlci1zdHlsZTpzb2xpZDsgYm9yZGVyLXdpZHRoOjBweDsgdGV4dC1hbGlnbjpjZW50ZXI7IHdpZHRoOjEwMCUiIC8+PC90ZD4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6NTAlIj4NCgkJCTxoMT5CZXN0IFdvcmQgR29lcyBIZXJlITwvaDE+DQoNCgkJCTxwPjxzdHJvbmc+V0hZPzwvc3Ryb25nPjwvcD4NCg0KCQkJPHA+TG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLDwvcD4NCg0KCQkJPHA+Jm5ic3A7PC9wPg0KDQoJCQk8cD48c3Ryb25nPldITz88L3N0cm9uZz48L3A+DQoNCgkJCTxwPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZywuPC9wPg0KCQkJPC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8cD48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNzczMjg5LWNsaWNrJTIwaGVyZS5qcGciIHN0eWxlPSJib3JkZXItc3R5bGU6c29saWQ7IGJvcmRlci13aWR0aDowcHg7IHdpZHRoOjEwMCUiIC8+PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxoMSBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPk1haW4gVGl0bGUgVGV4dCBHb2VzIEhlcmU8L2gxPg0KDQo8cCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZyxMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsTG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGVkIGl0IHRvIG1ha2UgYSB0eXBlIHNwZWNpbWVuIGJvb2suIEl0IGhhcyBzdXJ2aXZlZCBub3Qgb25seSBmaXZlIGNlbnR1cmllcywgYnV0IGFsc28gdGhlIGxlYXAgaW50byBlbGVjdHJvbmljIHR5cGVzZXR0aW5nLDwvcD4NCg0KPHRhYmxlIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEiIGNlbGxzcGFjaW5nPSIxIiBzdHlsZT0iYm9yZGVyOm1lZGl1bSBub25lOyB3aWR0aDoxMDAlIj4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBzdHlsZT0id2lkdGg6MzAlIj4NCgkJCTxoMSBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPk1vYmlsZSBBcHAgT25lIFRpdGxlPC9oMT4NCg0KCQkJPHA+JiMzOTtMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsTG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2Y8L3A+DQoNCgkJCTxwPiZuYnNwOzwvcD4NCg0KCQkJPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+TW9iaWxlIEFwcCBUd28gdGl0bGU8L2gxPg0KDQoJCQk8cD5Mb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZWQgaXQgdG8gbWFrZSBhIHR5cGUgc3BlY2ltZW4gYm9vay4gSXQgaGFzIHN1cnZpdmVkIG5vdCBvbmx5IGZpdmUgY2VudHVyaWVzLCBidXQgYWxzbyB0aGUgbGVhcCBpbnRvIGVsZWN0cm9uaWMgdHlwZXNldHRpbmcsTG9yZW0gSXBzdW0gaXMgc2ltcGx5IGR1bW15IHRleHQgb2YgdGhlIHByaW50aW5nIGFuZCB0eXBlc2V0dGluZyBpbmR1c3RyeS4gTG9yZW0gSXBzdW0gaGFzIGJlZW4gdGhlIGluZHVzdHJ5JiMzOTtzIHN0YW5kYXJkIGR1bW15IHRleHQgZXZlciBzaW5jZSB0aGUgMTUwMHMsIHdoZW4gYW4gdW5rbm93biBwcmludGVyIHRvb2sgYSBnYWxsZXkgb2YgdHlwZSBhbmQgc2NyYW1ibGU8L3A+DQoJCQk8L3RkPg0KCQkJPHRkPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTEyMDYzMDUtTW9iaWxlLnBuZyIgc3R5bGU9ImJvcmRlci1zdHlsZTpzb2xpZDsgYm9yZGVyLXdpZHRoOjBweDsgd2lkdGg6MTAwJSIgLz48L3RkPg0KCQkJPHRkIHN0eWxlPSJ3aWR0aDozMCUiPg0KCQkJPGgxIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+TW9iaWxlIEFwcCBPbmUgVGl0bGU8L2gxPg0KDQoJCQk8cD4mIzM5O0xvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZyxMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZjwvcD4NCg0KCQkJPHA+Jm5ic3A7PC9wPg0KDQoJCQk8aDEgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj5Nb2JpbGUgQXBwIFR3byB0aXRsZTwvaDE+DQoNCgkJCTxwPkxvcmVtIElwc3VtIGlzIHNpbXBseSBkdW1teSB0ZXh0IG9mIHRoZSBwcmludGluZyBhbmQgdHlwZXNldHRpbmcgaW5kdXN0cnkuIExvcmVtIElwc3VtIGhhcyBiZWVuIHRoZSBpbmR1c3RyeSYjMzk7cyBzdGFuZGFyZCBkdW1teSB0ZXh0IGV2ZXIgc2luY2UgdGhlIDE1MDBzLCB3aGVuIGFuIHVua25vd24gcHJpbnRlciB0b29rIGEgZ2FsbGV5IG9mIHR5cGUgYW5kIHNjcmFtYmxlZCBpdCB0byBtYWtlIGEgdHlwZSBzcGVjaW1lbiBib29rLiBJdCBoYXMgc3Vydml2ZWQgbm90IG9ubHkgZml2ZSBjZW50dXJpZXMsIGJ1dCBhbHNvIHRoZSBsZWFwIGludG8gZWxlY3Ryb25pYyB0eXBlc2V0dGluZyxMb3JlbSBJcHN1bSBpcyBzaW1wbHkgZHVtbXkgdGV4dCBvZiB0aGUgcHJpbnRpbmcgYW5kIHR5cGVzZXR0aW5nIGluZHVzdHJ5LiBMb3JlbSBJcHN1bSBoYXMgYmVlbiB0aGUgaW5kdXN0cnkmIzM5O3Mgc3RhbmRhcmQgZHVtbXkgdGV4dCBldmVyIHNpbmNlIHRoZSAxNTAwcywgd2hlbiBhbiB1bmtub3duIHByaW50ZXIgdG9vayBhIGdhbGxleSBvZiB0eXBlIGFuZCBzY3JhbWJsZTwvcD4NCgkJCTwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQoNCjxwPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1Mzc0NjA5MTctc3R1ZGlvLWxvZ28ucG5nIiBzdHlsZT0iYm9yZGVyLXN0eWxlOnNvbGlkOyBib3JkZXItd2lkdGg6MHB4OyB3aWR0aDoxMDAlIiAvPjwvcD4NCg0KPHA+Jm5ic3A7PC9wPg0KDQo8aDEgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj5Db250YWN0IFVzIE5vdzwvaDE+DQoNCjxkaXYgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj4NCjxwPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MjktZmIucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTIxLWFwcC5wbmciIHN0eWxlPSJoZWlnaHQ6MTUwcHg7IHdpZHRoOjE1MHB4IiAvPjxpbWcgYWx0PSIiIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1NTA2ODk1MzYteXQucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48aW1nIGFsdD0iIiBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTUwNjg5NTMzLWclMjAucG5nIiBzdHlsZT0iaGVpZ2h0OjE1MHB4OyB3aWR0aDoxNTBweCIgLz48L3A+DQo8L2Rpdj4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgdGFyZ2V0PSJfYmxhbmsiPkludGVsaWxpZ2VudCBIb3N0aW5nIFB0ZS4gTHRkLjwvYT48L3A+DQo=', '29-Apr-2018', '1524996609', 'hery'),
(12, 'sgdfgdf', 'PHA+ZGdkZ2RnZGdkZjwvcD4NCg==', '22-Jul-2018', '1532279892', 'hery'),
(24, 'Under Construction Page', 'PHA+Jm5ic3A7PC9wPg0KDQo8cD4mbmJzcDs8L3A+DQoNCjxwPiZuYnNwOzwvcD4NCg0KPHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjAiIGNlbGxzcGFjaW5nPSIwIiBzdHlsZT0iaGVpZ2h0OjYxMnB4OyBtYXJnaW46YXV0bzsgd2lkdGg6MTAwOHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZD48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTUwOTAtdW5kZXJDb25zdHJ1Y3Rpb24ucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpMdWNpZGEgU2FucyBVbmljb2RlLEx1Y2lkYSBHcmFuZGUsc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxNHB4Ij5Tb3JyeSwgd2Vic2l0ZSBpcyB1bmRlciBjb25zdHJ1Y3Rpb24uIFBsZWFzZSB2aXNpdCB1cyBsYXRlci48L3NwYW4+PC9zcGFuPjxiciAvPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTIxODc0LUJhci5wbmciIC8+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MjEzOTQtY29udGFjdENvbnN0cnVjdGlvbi5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmNlbnRlciI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+Rm9yIG1vcmUgaW5mbyA6LTwvc3Bhbj48L3NwYW4+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzkyMzU2MS1pbnRlbGhvc3RMb2dvLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBXZWJzaXRlPC9zcGFuPjwvc3Bhbj48L2E+Jm5ic3A7IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2Mi1nLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjU5LWZiYi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjY1LXkyLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdDwvc3Bhbj48L3NwYW4+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQoNCjxwPiZuYnNwOzwvcD4NCg==', '10-Aug-2018', '1533923857', 'nana'),
(22, 'IntelhostMarketing Template8', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJnY29sb3I9IiMwMDAwMDAiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjc4MHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtaGVhZGVyTWVyZGVrYTUucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtcHJpY2VPZmZlcmVkMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImNvbG9yOiNkZGRkZGQiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpMdWNpZGEgU2FucyBVbmljb2RlLEx1Y2lkYSBHcmFuZGUsc2Fucy1zZXJpZiI+PHN0cm9uZz5JbnRlbGhvc3QgaGVscHMgeW91IGRpc2NvdmVyIHBvdGVudGlhbCBtYXJrZXRzIGJ5IGV4cGxvcmluZyB0aGUgYmVuZWZpdHMgdGhhdCB5b3UgaGF2ZSBuZXZlciB0aG91Z2h0ISBJdCBpcyBmdWxsIG9mIGV4Y2l0ZW1lbnQgdGhhdCB5b3UgY2FuJiMzOTt0IGltYWdpbmUhPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MDEwMDQtc2VydmljZV9iZy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iMS5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4NDEwMjktYjQucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTAwODcyLW1vYmlsZV9hcHBfbWVyZGVrYS5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPlRha2UgdGhpcyBvcHBvcnR1bml0eSB0byBpbmNyZWFzZSBicmFuZCBhd2FyZW5lc3MgZm9yIHlvdXIgYnVzaW5lc3MuIEFmdGVyIGNvbnN1bWVycyBiZWNvbWUgYXdhcmUgb2YgeW91ciBicmFuZCwgdGhleSYjMzk7bGwgbGVhcm4gbW9yZSBhYm91dCB5b3VyIHByb2R1Y3RzIG9yIHNlcnZpY2VzLjwvc3Bhbj48L3RkPg0KCQkJPHRkIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPkEgZG9tYWluIG5hbWUgcmVwcmVzZW50cyB3aG8geW91IGFyZSBhbmQgd2hhdCB5b3UgZG8uIEl0IGdpdmVzIHlvdXIgcG90ZW50aWFsIGN1c3RvbWVycyBhbiBpZGVhIG9mIHlvdXIgYnVzaW5lc3MgYW5kIGl0IGNhbiBhZmZlY3QgeW91ciBTRU8gcmFua2luZy48L3NwYW4+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5OyB2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPk9uZSBzdG9wIGluZm9ybWF0aW9uIGNlbnRlciBhcHBsaWNhdGlvbiBpcyB0aGUgbW9zdCBuZWVkZWQgZm9yIGFueSBpbmR1c3RyaWVzIGFzIHlvdSBjYW4gcHJvdmlkZSBhbmQgc3ByZWFkIGluZm9ybWF0aW9uIGVhc2lseSBhbmQgc2VjdXJlbHkuPC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5teS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluLW1hbGF5c2lhIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPW1vYmlsZS1hcHAiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzODk5NTk5LXRhYl9tb2JpbGVfbWVyZGVrYS5wbmciIC8+PGJyIC8+DQoJCQk8c3BhbiBzdHlsZT0iY29sb3I6I2ZmZmZmZiI+SW50ZWxob3N0IGNsb3VkIHN0b3JhZ2UgbGV0cyB1c2VycyBzaGFyZSwgc3RvcmUgYW5kIGNvbGxhYm9yYXRlIG9uIGZpbGVzIHNlY3VyZWx5LiBZb3VyIGRhdGEgbWFuYWdlbWVudCBiZWNvbWVzIGVmZmVjdGl2ZSB3aXRoIGFkbWluIGNvbnNvbGUgYXMgdGhlIGNlbnRyYWwgZGF0YSBjb250cm9sbGVyLiBJbnN0YW50IGFjY2VzcyB0byB5b3VyIGZpbGVzIG9uIHNtYXJ0cGhvbmVzLCB0YWJsZXQgb3IgY29tcHV0ZXIgZWFzaWx5IHdpdGhvdXQgYm91bmRhcmllcy48L3NwYW4+PGJyIC8+DQoJCQk8YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdGNsb3VkLmNvbS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iNi5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4NDEwMjktYjMucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTAwODcyLXdlYl9kZXNpZ25fbWVyZGVrYS5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmp1c3RpZnk7IHZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6I2ZmZmZmZiI+RS1jb21tZXJjZSBwbGF0Zm9ybSBjb3ZlcnMgYSByYW5nZSBvZiBkaWZmZXJlbnQgdHlwZXMgb2YgYnVzaW5lc3Nlcy4gV2UgYWxzbyBkZXZlbG9wIGFuZCBzZXR1cCBvbmxpbmUgYnVzaW5lc3Mgc2l0ZSB3aXRoIGZ1bGwgZmxleGliaWxpdHkuPC9zcGFuPjwvdGQ+DQoJCQk8dGQgc3R5bGU9InRleHQtYWxpZ246anVzdGlmeTsgdmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj5UaGVyZSBhcmUgcGxlbnR5IG9mIHNlY3VyaXR5IG1lYXN1cmVzIHRvIHByb3RlY3QgeW91ciB3ZWJzaXRlIGZyb20gbWFsd2FyZSBhbmQgdmlydXNlcy4gT3VyIHBsYW5zIGFyZSBhZmZvcmRhYmxlIGZvciBldmVyeW9uZS48L3NwYW4+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5OyB2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiNmZmZmZmYiPkhhdmluZyBhIHdlYnNpdGUgY2FuIG9wZW4gdXAgeW91ciBidXNpbmVzcyB0byBhIHdob2xlIHJhbmdlIG9mIG1hcmtldGluZyB0b29scy4gWW91ciB3ZWJzaXRlIGNhbiBzdXBwb3J0IHNvY2lhbCBtZWRpYSBhY3Rpdml0eSBhbmQgeW91IGNhbiB1dGlsaXplIHByb2R1Y3RzIGxpa2UgU0VPICZhbXA7IFNFTS48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1lY29tbWVyY2UiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209Y2hlYXAtd2ViLWhvc3RpbmciIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209Y2hlYXAtd2ViLWRlc2lnbiIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5Gb3IgbW9yZSBpbmZvcm1hdGlvbiwgdmlzaXQgdXMgbm93IGF0IDombmJzcDsgPC9zcGFuPjwvc3Bhbj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjYyLWcucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNTktZmJiLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL2ludGVsaG9zdC5teS8iIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNjUteTIucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+SW50ZWxob3N0PC9zcGFuPjwvc3Bhbj48L2E+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtZmluZFVzMi5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg0KPHAgc3R5bGU9InRleHQtYWxpZ246Y2VudGVyIj48c3BhbiBzdHlsZT0iLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDowcHg7IGJhY2tncm91bmQtY29sb3I6I2Y2ZjZmNjsgY29sb3I6Izk5OTk5OTsgZGlzcGxheTppbmxpbmUgIWltcG9ydGFudDsgZmxvYXQ6bm9uZTsgZm9udC1mYW1pbHk6JnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssSGVsdmV0aWNhLEhlbHZldGljYSxBcmlhbCxzYW5zLXNlcmlmOyBmb250LXNpemU6MTJweDsgZm9udC1zdHlsZTpub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOm5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczpub3JtYWw7IGZvbnQtd2VpZ2h0OjQwMDsgbGV0dGVyLXNwYWNpbmc6bm9ybWFsOyBvcnBoYW5zOjI7IHRleHQtYWxpZ246Y2VudGVyOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6aW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOmluaXRpYWw7IHRleHQtaW5kZW50OjBweDsgdGV4dC10cmFuc2Zvcm06bm9uZTsgd2hpdGUtc3BhY2U6bm9ybWFsOyB3aWRvd3M6Mjsgd29yZC1zcGFjaW5nOjBweCI+Ynk8c3Bhbj4mbmJzcDs8L3NwYW4+PC9zcGFuPjxhIGRhdGEtc2FmZXJlZGlyZWN0dXJsPSJodHRwczovL3d3dy5nb29nbGUuY29tL3VybD9xPWh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvJmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTMzMzQ1OTAwNjQwMDAwJmFtcDt1c2c9QUZRakNORnF1dnFpa0hVRE1Kekxyekk3SmV3bnBqc1BLZyIgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyBmb250LWZhbWlseTogJnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssIEhlbHZldGljYSwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogcmdiKDE1MywgMTUzLCAxNTMpOyB0ZXh0LWRlY29yYXRpb246IHVuZGVybGluZTsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IGNlbnRlcjsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0NiwgMjQ2LCAyNDYpOyIgdGFyZ2V0PSJfYmxhbmsiPkludGVsbGlnZW50IEhvc3RpbmcgU2RuLiBCaGQuPC9hPjwvcD4NCg==', '10-Aug-2018', '1533918656', 'nana');
INSERT INTO `templates` (`t_id`, `t_title`, `t_content`, `t_date`, `t_time`, `t_user`) VALUES
(23, 'Intelhost Marketing Template9', 'PGJvZHkgc3R5bGU9ImJhY2tncm91bmQtY29sb3I6I2Q1ZDhkYzsiPg0KPHRhYmxlIGFsaWduPSJjZW50ZXIiIGJnY29sb3I9IiNmZmZmZmYiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjc4MHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtaGVhZGVyTWVyZGVrYTUucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MTgyMzAtcHJpY2VPZmZlcmVkMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpjZW50ZXIiPjxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9ImNvbG9yOiMwMDAwMDAiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpMdWNpZGEgU2FucyBVbmljb2RlLEx1Y2lkYSBHcmFuZGUsc2Fucy1zZXJpZiI+PHN0cm9uZz5JbnRlbGhvc3QgaGVscHMgeW91IGRpc2NvdmVyIHBvdGVudGlhbCBtYXJrZXRzIGJ5IGV4cGxvcmluZyB0aGUgYmVuZWZpdHMgdGhhdCB5b3UgaGF2ZSBuZXZlciB0aG91Z2h0ISBJdCBpcyBmdWxsIG9mIGV4Y2l0ZW1lbnQgdGhhdCB5b3UgY2FuJiMzOTt0IGltYWdpbmUhPC9zdHJvbmc+PC9zcGFuPjwvc3Bhbj48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSJjb2xvcjojZmZmZmZmIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5MDEwMDQtc2VydmljZV9iZy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iMS5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4NDEwMjktYjQucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzODQxMDI5LWI1LnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6IzAwMDAwMCI+VGFrZSB0aGlzIG9wcG9ydHVuaXR5IHRvIGluY3JlYXNlIGJyYW5kIGF3YXJlbmVzcyBmb3IgeW91ciBidXNpbmVzcy4gQWZ0ZXIgY29uc3VtZXJzIGJlY29tZSBhd2FyZSBvZiB5b3VyIGJyYW5kLCB0aGV5JiMzOTtsbCBsZWFybiBtb3JlIGFib3V0IHlvdXIgcHJvZHVjdHMgb3Igc2VydmljZXMuPC9zcGFuPjwvdGQ+DQoJCQk8dGQgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6IzAwMDAwMCI+QSBkb21haW4gbmFtZSByZXByZXNlbnRzIHdobyB5b3UgYXJlIGFuZCB3aGF0IHlvdSBkby4gSXQgZ2l2ZXMgeW91ciBwb3RlbnRpYWwgY3VzdG9tZXJzIGFuIGlkZWEgb2YgeW91ciBidXNpbmVzcyBhbmQgaXQgY2FuIGFmZmVjdCB5b3VyIFNFTyByYW5raW5nLjwvc3Bhbj48L3RkPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmp1c3RpZnk7IHZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6bnVsbCI+T25lIHN0b3AgaW5mb3JtYXRpb24gY2VudGVyIGFwcGxpY2F0aW9uIGlzIHRoZSBtb3N0IG5lZWRlZCBmb3IgYW55IGluZHVzdHJpZXMgYXMgeW91IGNhbiBwcm92aWRlIGFuZCBzcHJlYWQgaW5mb3JtYXRpb24gZWFzaWx5IGFuZCBzZWN1cmVseS48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Lm15LyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1kb21haW4tbWFsYXlzaWEiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209bW9iaWxlLWFwcCIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4OTk1OTktdGFiX21vYmlsZV9tZXJkZWthLnBuZyIgLz48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSJjb2xvcjpudWxsIj5JbnRlbGhvc3QgY2xvdWQgc3RvcmFnZSBsZXRzIHVzZXJzIHNoYXJlLCBzdG9yZSBhbmQgY29sbGFib3JhdGUgb24gZmlsZXMgc2VjdXJlbHkuIFlvdXIgZGF0YSBtYW5hZ2VtZW50IGJlY29tZXMgZWZmZWN0aXZlIHdpdGggYWRtaW4gY29uc29sZSBhcyB0aGUgY2VudHJhbCBkYXRhIGNvbnRyb2xsZXIuIEluc3RhbnQgYWNjZXNzIHRvIHlvdXIgZmlsZXMgb24gc21hcnRwaG9uZXMsIHRhYmxldCBvciBjb21wdXRlciBlYXNpbHkgd2l0aG91dCBib3VuZGFyaWVzLjwvc3Bhbj48YnIgLz4NCgkJCTxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Y2xvdWQuY29tLyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzODQxMDI5LWI2LnBuZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzg0MTAyOS1iMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM4NDEwMjktYjcucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBzdHlsZT0idGV4dC1hbGlnbjpqdXN0aWZ5OyB2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOm51bGwiPkUtY29tbWVyY2UgcGxhdGZvcm0gY292ZXJzIGEgcmFuZ2Ugb2YgZGlmZmVyZW50IHR5cGVzIG9mIGJ1c2luZXNzZXMuIFdlIGFsc28gZGV2ZWxvcCBhbmQgc2V0dXAgb25saW5lIGJ1c2luZXNzIHNpdGUgd2l0aCBmdWxsIGZsZXhpYmlsaXR5Ljwvc3Bhbj48L3RkPg0KCQkJPHRkIHN0eWxlPSJ0ZXh0LWFsaWduOmp1c3RpZnk7IHZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iY29sb3I6bnVsbCI+VGhlcmUgYXJlIHBsZW50eSBvZiBzZWN1cml0eSBtZWFzdXJlcyB0byBwcm90ZWN0IHlvdXIgd2Vic2l0ZSBmcm9tIG1hbHdhcmUgYW5kIHZpcnVzZXMuIE91ciBwbGFucyBhcmUgYWZmb3JkYWJsZSBmb3IgZXZlcnlvbmUuPC9zcGFuPjwvdGQ+DQoJCQk8dGQgc3R5bGU9InRleHQtYWxpZ246anVzdGlmeTsgdmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJjb2xvcjpudWxsIj5IYXZpbmcgYSB3ZWJzaXRlIGNhbiBvcGVuIHVwIHlvdXIgYnVzaW5lc3MgdG8gYSB3aG9sZSByYW5nZSBvZiBtYXJrZXRpbmcgdG9vbHMuIFlvdXIgd2Vic2l0ZSBjYW4gc3VwcG9ydCBzb2NpYWwgbWVkaWEgYWN0aXZpdHkgYW5kIHlvdSBjYW4gdXRpbGl6ZSBwcm9kdWN0cyBsaWtlIFNFTyAmYW1wOyBTRU0uPC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZWNvbW1lcmNlIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1ob3N0aW5nIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1kZXNpZ24iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+Rm9yIG1vcmUgaW5mb3JtYXRpb24sIHZpc2l0IHVzIG5vdyBhdCA6Jm5ic3A7IDwvc3Bhbj48L3NwYW4+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2Mi1nLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjU5LWZiYi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjY1LXkyLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdDwvc3Bhbj48L3NwYW4+PC9hPjxiciAvPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTE4MjMwLWZpbmRVczIucG5nIiAvPiA8c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9Ii13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6MHB4OyBkaXNwbGF5OmlubGluZSAhaW1wb3J0YW50OyBmbG9hdDpub25lOyBmb250LWZhbWlseTomcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OyxIZWx2ZXRpY2EsSGVsdmV0aWNhLEFyaWFsLHNhbnMtc2VyaWY7IGZvbnQtc2l6ZToxMnB4OyBmb250LXN0eWxlOm5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6bm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOm5vcm1hbDsgZm9udC13ZWlnaHQ6NDAwOyBsZXR0ZXItc3BhY2luZzpub3JtYWw7IHRleHQtYWxpZ246Y2VudGVyOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6aW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOmluaXRpYWw7IHRleHQtaW5kZW50OjBweDsgdGV4dC10cmFuc2Zvcm06bm9uZTsgd2hpdGUtc3BhY2U6bm9ybWFsOyB3b3JkLXNwYWNpbmc6MHB4Ij48c3BhbiBzdHlsZT0iYmFja2dyb3VuZC1jb2xvcjojZmZmZmZmIj5ieSZuYnNwOzwvc3Bhbj48L3NwYW4+PC9zcGFuPjxhIGRhdGEtc2FmZXJlZGlyZWN0dXJsPSJodHRwczovL3d3dy5nb29nbGUuY29tL3VybD9xPWh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvJmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTMzMzQ1OTAwNjQwMDAwJmFtcDt1c2c9QUZRakNORnF1dnFpa0hVRE1Kekxyekk3SmV3bnBqc1BLZyIgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyBmb250LWZhbWlseTogJnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssIEhlbHZldGljYSwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogcmdiKDE1MywgMTUzLCAxNTMpOyB0ZXh0LWRlY29yYXRpb246IHVuZGVybGluZTsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IGNlbnRlcjsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0NiwgMjQ2LCAyNDYpOyIgdGFyZ2V0PSJfYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iYmFja2dyb3VuZC1jb2xvcjojZmZmZmZmIj5JbnRlbGxpZ2VudCBIb3N0aW5nIFNkbi4gQmhkLjwvc3Bhbj48L3NwYW4+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQo8L2JvZHk+', '10-Aug-2018', '1533918589', 'nana'),
(21, 'Newsletter template1', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjcwMHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzNzk0ODAtVGVtcDMucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+SW50ZWxob3N0IGhlbHBzIHlvdSBkaXNjb3ZlciBwb3RlbnRpYWwgbWFya2V0cyBieSBleHBsb3JpbmcgdGhlIGJlbmVmaXRzIHRoYXQgeW91IGhhdmUgbmV2ZXIgdGhvdWdodCEgSXQgaXMgZnVsbCBvZiBleGNpdGVtZW50IHRoYXQgeW91IGNhbiYjMzk7dCBpbWFnaW5lISA8L3NwYW4+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBjb2xzcGFuPSIzIj4NCgkJCTxociBzdHlsZT0iY29sb3I6I2ZmZmZmZjsiIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj5Hcm93aW5nIHlvdXIgYnVzaW5lc3MgcmFwaWRseSBhbmQgcHJvbW90aW5nIHlvdXIgY29udGVudC4gSW50ZWxob3N0IG1ha2VzIGl0IGVhc2llciBmb3IgeW91IHRvIGRlcGxveSBhIG5ldyByZWxpYWJsZSBhcHByb2FjaCB0aGF0IGNhbiBkZWxpdmVyIGdyZWF0IHBlcmZvcm1hbmNlLiBTaW1wbGlmeSB5b3VyIGxpZmUgd2l0aCBpbnRlbnNpZnlpbmcgZmxleGliaWxpdHkgb24geW91ciBzbWFydCBjaG9pY2UhPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzc5OTY3LXNlcnZpY2VzLnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMjk5ODE2LUJ1c2luZXNzRGlyZWN0b3J5My5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTk4MzAtV2ViSG9zdGluZzMucG5nIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzc5NDg1LVNxdWFyZTQucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0ianVzdGlmeSIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+VGFrZSB0aGlzIG9wcG9ydHVuaXR5IHRvIGluY3JlYXNlIGJyYW5kIGF3YXJlbmVzcyBmb3IgeW91ciBidXNpbmVzcy4gQWZ0ZXIgY29uc3VtZXJzIGJlY29tZSBhd2FyZSBvZiB5b3VyIGJyYW5kLCB0aGV5JiMzOTtsbCBsZWFybiBtb3JlIGFib3V0IHlvdXIgcHJvZHVjdHMgb3Igc2VydmljZXMuPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5IiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj5UaGVyZSBhcmUgcGxlbnR5IG9mIHNlY3VyaXR5IG1lYXN1cmVzIHRvIHByb3RlY3QgeW91ciB3ZWJzaXRlIGZyb20gbWFsd2FyZSBhbmQgdmlydXNlcy4gT3VyIHBsYW5zIGFyZSBhZmZvcmRhYmxlIGZvciBldmVyeW9uZS48L3NwYW4+PC9zcGFuPjwvdGQ+DQoJCQk8dGQgYWxpZ249Imp1c3RpZnkiIHN0eWxlPSJ2ZXJ0aWNhbC1hbGlnbjp0ZXh0LXRvcCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImNvbG9yOiM0ZTVmNzAiPkEgZG9tYWluIG5hbWUgcmVwcmVzZW50cyB3aG8geW91IGFyZSBhbmQgd2hhdCB5b3UgZG8uIEl0IGdpdmVzIHlvdXIgcG90ZW50aWFsIGN1c3RvbWVycyBhbiBpZGVhIG9mIHlvdXIgYnVzaW5lc3MgYW5kIGl0IGNhbiBhZmZlY3QgeW91ciBTRU8gcmFua2luZy4gPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Lm15LyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMyODU5NDU4LUE1LnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1ob3N0aW5nIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzI4NTk0NTgtQTUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluLW1hbGF5c2lhIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzI4NTk0NTgtQTUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMjk3MjM2LUJhbm5lckNsb3VkLnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+PHNwYW4gc3R5bGU9ImNvbG9yOiM0ZTVmNzAiPkludGVsaG9zdCBjbG91ZCBzdG9yYWdlIGxldHMgdXNlcnMgc2hhcmUsIHN0b3JlIGFuZCBjb2xsYWJvcmF0ZSBvbiBmaWxlcyBzZWN1cmVseS4gWW91ciBkYXRhIG1hbmFnZW1lbnQgYmVjb21lcyBlZmZlY3RpdmUgd2l0aCBhZG1pbiBjb25zb2xlIGFzIHRoZSBjZW50cmFsIGRhdGEgY29udHJvbGxlci4gPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PHNwYW4gc3R5bGU9ImNvbG9yOiMwMDAwZmYiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdGNsb3VkLmNvbS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5NjIxMy1CdXR0b24ucG5nIiAvPjwvYT48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5OTgyMy1FQ29tbWVyY2UzLnBuZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5OTgyNy1Nb2JpbGVBcHBzMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTk4MzMtV2ViRGVzaWduMy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5IiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj5FLWNvbW1lcmNlIHBsYXRmb3JtIGNvdmVycyBhIHJhbmdlIG9mIGRpZmZlcmVudCB0eXBlcyBvZiBidXNpbmVzc2VzLiBXZSBhbHNvIGRldmVsb3AgYW5kIHNldHVwIG9ubGluZSBidXNpbmVzcyBzaXRlIHdpdGggZnVsbCBmbGV4aWJpbGl0eS4gPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5IiBzdHlsZT0idmVydGljYWwtYWxpZ246dGV4dC10b3AiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj5PbmUgc3RvcCBpbmZvcm1hdGlvbiBjZW50ZXIgYXBwbGljYXRpb24gaXMgdGhlIG1vc3QgbmVlZGVkIGZvciBhbnkgaW5kdXN0cmllcyBhcyB5b3UgY2FuIHByb3ZpZGUgYW5kIHNwcmVhZCBpbmZvcm1hdGlvbiBlYXNpbHkgYW5kIHNlY3VyZWx5Ljwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJCTx0ZCBhbGlnbj0ianVzdGlmeSIgc3R5bGU9InZlcnRpY2FsLWFsaWduOnRleHQtdG9wIj48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+SGF2aW5nIGEgd2Vic2l0ZSBjYW4gb3BlbiB1cCB5b3VyIGJ1c2luZXNzIHRvIGEgd2hvbGUgcmFuZ2Ugb2YgbWFya2V0aW5nIHRvb2xzLiBZb3VyIHdlYnNpdGUgY2FuIHN1cHBvcnQgc29jaWFsIG1lZGlhIGFjdGl2aXR5IGFuZCB5b3UgY2FuIHV0aWxpemUgcHJvZHVjdHMgbGlrZSBTRU8gJmFtcDsgU0VNLjwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZWNvbW1lcmNlIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzI4NTk0NTgtQTUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209bW9iaWxlLWFwcCIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMyODU5NDU4LUE1LnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1kZXNpZ24iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMjg1OTQ1OC1BNS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5Gb3IgbW9yZSBpbmZvcm1hdGlvbiwgdmlzaXQgdXMgbm93IGF0IDombmJzcDsgPC9zcGFuPjwvc3Bhbj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjYyLWcucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNTktZmJiLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL2ludGVsaG9zdC5teS8iIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNjUteTIucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USIgdGFyZ2V0PSJibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+SW50ZWxob3N0PC9zcGFuPjwvc3Bhbj48L2E+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTYyMTctRm9vdGVyLmpwZyIgLz48YnIgLz4NCgkJCTxzcGFuIHN0eWxlPSItd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOjBweDsgYmFja2dyb3VuZC1jb2xvcjojZjZmNmY2OyBjb2xvcjojOTk5OTk5OyBkaXNwbGF5OmlubGluZSAhaW1wb3J0YW50OyBmbG9hdDpub25lOyBmb250LWZhbWlseTomcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OyxIZWx2ZXRpY2EsSGVsdmV0aWNhLEFyaWFsLHNhbnMtc2VyaWY7IGZvbnQtc2l6ZToxMnB4OyBmb250LXN0eWxlOm5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6bm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOm5vcm1hbDsgZm9udC13ZWlnaHQ6NDAwOyBsZXR0ZXItc3BhY2luZzpub3JtYWw7IG9ycGhhbnM6MjsgdGV4dC1hbGlnbjpjZW50ZXI7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjppbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6aW5pdGlhbDsgdGV4dC1pbmRlbnQ6MHB4OyB0ZXh0LXRyYW5zZm9ybTpub25lOyB3aGl0ZS1zcGFjZTpub3JtYWw7IHdpZG93czoyOyB3b3JkLXNwYWNpbmc6MHB4Ij5ieTxzcGFuPiZuYnNwOzwvc3Bhbj48L3NwYW4+PGEgZGF0YS1zYWZlcmVkaXJlY3R1cmw9Imh0dHBzOi8vd3d3Lmdvb2dsZS5jb20vdXJsP3E9aHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8mYW1wO3NvdXJjZT1nbWFpbCZhbXA7dXN0PTE1MzMzNDU5MDA2NDAwMDAmYW1wO3VzZz1BRlFqQ05GcXV2cWlrSFVETUp6THJ6STdKZXducGpzUEtnIiBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyIgc3R5bGU9Im1hcmdpbjogMHB4OyBwYWRkaW5nOiAwcHg7IGZvbnQtZmFtaWx5OiAmcXVvdDtIZWx2ZXRpY2EgTmV1ZSZxdW90OywgSGVsdmV0aWNhLCBIZWx2ZXRpY2EsIEFyaWFsLCBzYW5zLXNlcmlmOyBib3gtc2l6aW5nOiBib3JkZXItYm94OyBmb250LXNpemU6IDEycHg7IGNvbG9yOiByZ2IoMTUzLCAxNTMsIDE1Myk7IHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lOyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogY2VudGVyOyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiByZ2IoMjQ2LCAyNDYsIDI0Nik7IiB0YXJnZXQ9Il9ibGFuayI+SW50ZWxsaWdlbnQgSG9zdGluZyBTZG4uIEJoZC48L2E+PC90ZD4NCgkJPC90cj4NCgk8L3Rib2R5Pg0KPC90YWJsZT4NCg==', '08-Aug-2018', '1533737083', 'nana'),
(19, 'Intelhost Marketing Template6', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjcwMHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzNzg1NDYtaW50ZWxob3N0X2hlYWRsaW5lX25ldy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ3aWR0aDoyNTBweCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzExMjY1LXdlYkhvc3Rpbmc2LmpwZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPjxzcGFuIHN0eWxlPSJjb2xvcjpudWxsIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PGJyIC8+DQoJCQlUaGVyZSBhcmUgcGxlbnR5IG9mIHNlY3VyaXR5IG1lYXN1cmVzIHRvIHByb3RlY3QgeW91ciB3ZWJzaXRlIGZyb20gbWFsd2FyZSBhbmQgdmlydXNlcy4gT3VyIHBsYW5zIGFyZSBhZmZvcmRhYmxlIGZvciBldmVyeW9uZS48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209Y2hlYXAtd2ViLWhvc3RpbmciIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PGJyIC8+DQoJCQlIYXZpbmcgYSB3ZWJzaXRlIGNhbiBvcGVuIHVwIHlvdXIgYnVzaW5lc3MgdG8gYSB3aG9sZSByYW5nZSBvZiBtYXJrZXRpbmcgdG9vbHMuIFlvdXIgd2Vic2l0ZSBjYW4gc3VwcG9ydCBzb2NpYWwgbWVkaWEgYWN0aXZpdHkgYW5kIHlvdSBjYW4gdXRpbGl6ZSBwcm9kdWN0cyBsaWtlIFNFTyAmYW1wOyBTRU0uPGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1kZXNpZ24iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMTI2Mi13ZWJkZXNpZ242LmpwZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNjAtbW9iaWxlQXBwczYuanBnIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzE4NTQ1LWludGVsaG9zdExpbmVCYXIucG5nIiAvPjxiciAvPg0KCQkJT25lIHN0b3AgaW5mb3JtYXRpb24gY2VudGVyIGFwcGxpY2F0aW9uIGlzIHRoZSBtb3N0IG5lZWRlZCBmb3IgYW55IGluZHVzdHJpZXMgYXMgeW91IGNhbiBwcm92aWRlIGFuZCBzcHJlYWQgaW5mb3JtYXRpb24gZWFzaWx5IGFuZCBzZWN1cmVseS48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209bW9iaWxlLWFwcCIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEyNTk4LWludGVsaG9zdF9uZXcucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PGJyIC8+DQoJCQlFLWNvbW1lcmNlIHBsYXRmb3JtIGNvdmVycyBhIHJhbmdlIG9mIGRpZmZlcmVudCB0eXBlcyBvZiBidXNpbmVzc2VzLiBXZSBhbHNvIGRldmVsb3AgYW5kIHNldHVwIG9ubGluZSBidXNpbmVzcyBzaXRlIHdpdGggZnVsbCBmbGV4aWJpbGl0eS48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZWNvbW1lcmNlIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNTUtZWNvbW1lcmNlNi5qcGciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ3aWR0aDoyNTBweCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzExMjQ1LWJ1c2luZWVEaXI2LmpwZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCVRha2UgdGhpcyBvcHBvcnR1bml0eSB0byBpbmNyZWFzZSBicmFuZCBhd2FyZW5lc3MgZm9yIHlvdXIgYnVzaW5lc3MuIEFmdGVyIGNvbnN1bWVycyBiZWNvbWUgYXdhcmUgb2YgeW91ciBicmFuZCwgdGhleSYjMzk7bGwgbGVhcm4gbW9yZSBhYm91dCB5b3VyIHByb2R1Y3RzIG9yIHNlcnZpY2VzLjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Lm15LyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzE4NTQ1LWludGVsaG9zdExpbmVCYXIucG5nIiAvPjxiciAvPg0KCQkJSW50ZWxob3N0IGNsb3VkIHN0b3JhZ2UgbGV0cyB1c2VycyBzaGFyZSwgc3RvcmUgYW5kIGNvbGxhYm9yYXRlIG9uIGZpbGVzIHNlY3VyZWx5LiBZb3VyIGRhdGEgbWFuYWdlbWVudCBiZWNvbWVzIGVmZmVjdGl2ZSB3aXRoIGFkbWluIGNvbnNvbGUgYXMgdGhlIGNlbnRyYWwgZGF0YSBjb250cm9sbGVyLjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0Y2xvdWQuY29tLyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ3aWR0aDoyNTBweCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzExMjQ4LWNsb3VkNi5qcGciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ3aWR0aDoyNTBweCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzExMjUxLWRvbWFpbk5hbWU2LmpwZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCUEgZG9tYWluIG5hbWUgcmVwcmVzZW50cyB3aG8geW91IGFyZSBhbmQgd2hhdCB5b3UgZG8uIEl0IGdpdmVzIHlvdXIgcG90ZW50aWFsIGN1c3RvbWVycyBhbiBpZGVhIG9mIHlvdXIgYnVzaW5lc3MgYW5kIGl0IGNhbiBhZmZlY3QgeW91ciBTRU8gcmFua2luZy48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZG9tYWluLW1hbGF5c2lhIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5Gb3IgbW9yZSBpbmZvcm1hdGlvbiwgdmlzaXQgdXMgbm93IGF0IDombmJzcDsgPC9zcGFuPjwvc3Bhbj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjYyLWcucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNTktZmJiLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL2ludGVsaG9zdC5teS8iIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNjUteTIucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3d3dy55b3V0dWJlLmNvbS9jaGFubmVsL1VDcWxWTkQtYVVFdkd4enJZYUtab0k3USI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+SW50ZWxob3N0PC9zcGFuPjwvc3Bhbj48L2E+PGJyIC8+DQoJCQk8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMjIwODYtbmV3QWRkcmVzcy5wbmciIC8+PGJyIC8+DQoJCQk8c3BhbiBzdHlsZT0iLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDowcHg7IGJhY2tncm91bmQtY29sb3I6I2Y2ZjZmNjsgY29sb3I6Izk5OTk5OTsgZGlzcGxheTppbmxpbmUgIWltcG9ydGFudDsgZmxvYXQ6bm9uZTsgZm9udC1mYW1pbHk6JnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssSGVsdmV0aWNhLEhlbHZldGljYSxBcmlhbCxzYW5zLXNlcmlmOyBmb250LXNpemU6MTJweDsgZm9udC1zdHlsZTpub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOm5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczpub3JtYWw7IGZvbnQtd2VpZ2h0OjQwMDsgbGV0dGVyLXNwYWNpbmc6bm9ybWFsOyBvcnBoYW5zOjI7IHRleHQtYWxpZ246Y2VudGVyOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6aW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOmluaXRpYWw7IHRleHQtaW5kZW50OjBweDsgdGV4dC10cmFuc2Zvcm06bm9uZTsgd2hpdGUtc3BhY2U6bm9ybWFsOyB3aWRvd3M6Mjsgd29yZC1zcGFjaW5nOjBweCI+Ynk8c3Bhbj4mbmJzcDs8L3NwYW4+PC9zcGFuPjxhIGRhdGEtc2FmZXJlZGlyZWN0dXJsPSJodHRwczovL3d3dy5nb29nbGUuY29tL3VybD9xPWh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvJmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTMzMzQ1OTAwNjQwMDAwJmFtcDt1c2c9QUZRakNORnF1dnFpa0hVRE1Kekxyekk3SmV3bnBqc1BLZyIgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyBmb250LWZhbWlseTogJnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssIEhlbHZldGljYSwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogcmdiKDE1MywgMTUzLCAxNTMpOyB0ZXh0LWRlY29yYXRpb246IHVuZGVybGluZTsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IGNlbnRlcjsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0NiwgMjQ2LCAyNDYpOyIgdGFyZ2V0PSJfYmxhbmsiPkludGVsbGlnZW50IEhvc3RpbmcgU2RuLiBCaGQuPC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQo=', '09-Aug-2018', '1533839403', 'nana'),
(20, 'Intelhost Marketing Template7', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjcwMHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzNzk0ODAtVGVtcDMucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+PHNwYW4gc3R5bGU9ImZvbnQtZmFtaWx5OlRyZWJ1Y2hldCBNUyxIZWx2ZXRpY2Esc2Fucy1zZXJpZiI+RGlzY292ZXIgeW91ciBwb3RlbnRpYWwgbWFya2V0IGRlbWFuZCB3aXRoPHN0cm9uZz4gSW50ZWxob3N0PC9zdHJvbmc+IGJ5IGV4cGxvcmluZyBiZW5lZml0cyB0aGF0IHlvdSBuZXZlciB0aG91Z2h0cyEgRnVsbCB3aXRoIGV4Y2l0ZW1lbnQgdGhhdCB5b3UgY2FuIG5ldmVyIGltYWdpbmUhIDwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGNvbHNwYW49IjMiPg0KCQkJPGhyIHN0eWxlPSJjb2xvcjojZmZmZmZmOyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PHNwYW4gc3R5bGU9ImNvbG9yOiM0ZTVmNzAiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPlJhcGlkbHkgZ3Jvd3RoIHlvdXIgYnVzaW5lc3MgYW5kIHByb21vdGUgeW91ciBjb250ZW50LiBJbnRlbGhvc3QgbWFrZSBpdCBlYXN5IGZvciB5b3UgdG8gZGVwbG95IG5ldyByZWxpYWJsZSBhcHByb2FjaCB0aGF0IGNhbiBkZWxpdmVyIGdyZWF0IHBlcmZvcm1hbmNlLiBTaW1wbGlmeSB5b3VyIGxpZmUgd2l0aCBpbnRlc2lmeWluZyBmbGV4aWJpbGl0eSBvbiB5b3VyIHNtYXJ0IGNob2ljZSE8L3NwYW4+PC9zcGFuPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzNzk5Njctc2VydmljZXMucG5nIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTk4MTYtQnVzaW5lc3NEaXJlY3RvcnkzLnBuZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5OTgzMC1XZWJIb3N0aW5nMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzNzk0ODUtU3F1YXJlNC5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+VGFrZSB0aGlzIG9wcG9ydHVuaXR5IHRvIGF3YXJlIGN1c3RvbWVycyBhbmQgY2xpZW50cyB3aXRoIHlvdXIgYnJhbmQgYW5kIGNvbXBhbnkgd2hpY2ggd291bGQgaW5jcmVhc2UgdGhlIHRyYWZmaWMgdG8geW91ciB3ZWJzaXRlLkxldCYjMzk7cyBzdGFydC4uPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+TW9yZSBzZWN1cmUgd2l0aCBwbGVudHkgc2VjdXJpdHkgbWVhc3VyZXMgdG8gcHJvdGVjdCB5b3VyIHdlYnNpdGUgZnJvbSBtYWx3YXJlIGFuZCB2aXJ1cyBhbmQgaXQgaXMgYWZmb3JkYWJsZSBwbGFucyBmb3IgZXZlcnlvbmUuPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+QSBkb21haW4gbmFtZSByZXByZXNlbnRzIHdobyB5b3UgYXJlIGFuZCB3aGF0IHlvdSBkby5JdCBnaXZlcyB5b3VyIHBvdGVudGlhbCBjdXN0b21lcnMgYW4gaWRlYSBvZiB5b3VyIGJ1c2luZXNzIGFuZCBnaXZlcyBzaWduaWZpY2FudCBpbXBhY3QgdG8geW91Ljwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5teS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMjg1OTQ1OC1BNS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciI+PGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1jaGVhcC13ZWItaG9zdGluZyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMyODU5NDU4LUE1LnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWRvbWFpbi1tYWxheXNpYSIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMyODU5NDU4LUE1LnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5NzIzNi1CYW5uZXJDbG91ZC5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiPjxzcGFuIHN0eWxlPSJmb250LWZhbWlseTpUcmVidWNoZXQgTVMsSGVsdmV0aWNhLHNhbnMtc2VyaWYiPjxzcGFuIHN0eWxlPSJjb2xvcjojNGU1ZjcwIj5JbnRlbGhvc3QgY2xvdWQgc3RvcmFnZSBnaXZlcyB5b3VyIGJ1c2luZXNzIHRvIHNoYXJlIGFuZCBjb2xsYWJvcmF0ZSBvbiBmaWxlcyBzZWN1cmVseS4gWW91ciBkYXRhIG1hbmFnZW1lbnQgYmVjb21lIGVmZmVjdGl2ZSB3aXRoIGFkbWluIGNvbnNvbGUgYXMgdGhlIGNlbnRyYWwgZGF0YSBjb250cm9sbGVyPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMyI+PHNwYW4gc3R5bGU9ImNvbG9yOiMwMDAwZmYiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdGNsb3VkLmNvbS8iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5NjIxMy1CdXR0b24ucG5nIiAvPjwvYT48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5OTgyMy1FQ29tbWVyY2UzLnBuZyIgLz48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5OTgyNy1Nb2JpbGVBcHBzMy5wbmciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMyOTk4MzMtV2ViRGVzaWduMy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+RS1jb21tZXJjZSBwbGF0Zm9ybSBjb3ZlcnMgYSByYW5nZSBvZiBkaWZmZXJlbnQgdHlwZXMgb2YgYnVzaW5lc3Nlcy4gV2UgYWxzbyBkZXZlbG9wIGFuZCBzZXR1cCBvbmxpbmUgYnVzaW5lc3Mgc2l0ZSB3aXRoIGZ1bGwgZmxleGliaWxpdHkuPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+T25lIHN0b3AgaW5mb3JtYXRpb24gY2VudGVyIGFwcGxpY2F0aW9uIGlzIHRoZSBtb3N0IG5lZWRlZCBmb3IgYW55IGluZHVzdHJpZXMgYXMgeW91IG1heSBwcm92aWRlIGFuZCBzcHJlYWQgaW5mb3JtYXRpb24gZWFzaWx5LCBzZWN1cmVkIGFuZCBkaXJlY3QuPC9zcGFuPjwvc3Bhbj48L3RkPg0KCQkJPHRkIGFsaWduPSJqdXN0aWZ5Ij48c3BhbiBzdHlsZT0iZm9udC1mYW1pbHk6VHJlYnVjaGV0IE1TLEhlbHZldGljYSxzYW5zLXNlcmlmIj48c3BhbiBzdHlsZT0iY29sb3I6IzRlNWY3MCI+SGF2aW5nIGEgd2Vic2l0ZSBjYW4gb3BlbiB1cCB5b3VyIGJ1c2luZXNzIHRvIGEgd2hvbGUgcmFuZ2Ugb2YgbWFya2V0aW5nIHRvb2xzLiBZb3VyIHdlYnNpdGUgY2FuIHN1cHBvcnQgc29jaWFsIG1lZGlhIGFjdGl2aXR5IGFuZCB1dGlsaXplIHByb2R1Y3RzIHVzaW5nIFNFTyAmYW1wOyBTRU0uIDwvc3Bhbj48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209ZWNvbW1lcmNlIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzI4NTk0NTgtQTUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209bW9iaWxlLWFwcCIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMyODU5NDU4LUE1LnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIj48YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15Lz9tPWNoZWFwLXdlYi1kZXNpZ24iIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMjg1OTQ1OC1BNS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5Gb3IgbW9yZSBpbmZvcm1hdGlvbiwgdmlzaXQgdXMgbm93IGF0IDombmJzcDsgPC9zcGFuPjwvc3Bhbj4gPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjYyLWcucG5nIiAvPiA8YSBocmVmPSJodHRwczovL3BsdXMuZ29vZ2xlLmNvbS8xMDA3NTA2Mzk3Nzg0NzgyNjcwMzgiIHRhcmdldD0iYmxhbmsiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdCBNYWxheXNpYTwvc3Bhbj48L3NwYW4+PC9hPiZuYnNwOyA8aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTAyNTktZmJiLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL2ludGVsaG9zdC5teS8iIHRhcmdldD0NCiJibGFuayI+PHNwYW4gc3R5bGU9ImNvbG9yOiM5OTk5OTkiPjxzcGFuIHN0eWxlPSJmb250LXNpemU6MTJweCI+SW50ZWxob3N0IE1hbGF5c2lhPC9zcGFuPjwvc3Bhbj48L2E+Jm5ic3A7IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2NS15Mi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2NoYW5uZWwvVUNxbFZORC1hVUV2R3h6cllhS1pvSTdRIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3Q8L3NwYW4+PC9zcGFuPjwvYT48YnIgLz4NCgkJCTxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzI5NjIxNy1Gb290ZXIuanBnIiAvPjxiciAvPg0KCQkJPHNwYW4gc3R5bGU9Ii13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6MHB4OyBiYWNrZ3JvdW5kLWNvbG9yOiNmNmY2ZjY7IGNvbG9yOiM5OTk5OTk7IGRpc3BsYXk6aW5saW5lICFpbXBvcnRhbnQ7IGZsb2F0Om5vbmU7IGZvbnQtZmFtaWx5OiZxdW90O0hlbHZldGljYSBOZXVlJnF1b3Q7LEhlbHZldGljYSxIZWx2ZXRpY2EsQXJpYWwsc2Fucy1zZXJpZjsgZm9udC1zaXplOjEycHg7IGZvbnQtc3R5bGU6bm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczpub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6bm9ybWFsOyBmb250LXdlaWdodDo0MDA7IGxldHRlci1zcGFjaW5nOm5vcm1hbDsgb3JwaGFuczoyOyB0ZXh0LWFsaWduOmNlbnRlcjsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOmluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTppbml0aWFsOyB0ZXh0LWluZGVudDowcHg7IHRleHQtdHJhbnNmb3JtOm5vbmU7IHdoaXRlLXNwYWNlOm5vcm1hbDsgd2lkb3dzOjI7IHdvcmQtc3BhY2luZzowcHgiPmJ5PHNwYW4+Jm5ic3A7PC9zcGFuPjwvc3Bhbj48YSBkYXRhLXNhZmVyZWRpcmVjdHVybD0iaHR0cHM6Ly93d3cuZ29vZ2xlLmNvbS91cmw/cT1odHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15LyZhbXA7c291cmNlPWdtYWlsJmFtcDt1c3Q9MTUzMzM0NTkwMDY0MDAwMCZhbXA7dXNnPUFGUWpDTkZxdXZxaWtIVURNSnpMcnpJN0pld25wanNQS2ciIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvIiBzdHlsZT0ibWFyZ2luOiAwcHg7IHBhZGRpbmc6IDBweDsgZm9udC1mYW1pbHk6ICZxdW90O0hlbHZldGljYSBOZXVlJnF1b3Q7LCBIZWx2ZXRpY2EsIEhlbHZldGljYSwgQXJpYWwsIHNhbnMtc2VyaWY7IGJveC1zaXppbmc6IGJvcmRlci1ib3g7IGZvbnQtc2l6ZTogMTJweDsgY29sb3I6IHJnYigxNTMsIDE1MywgMTUzKTsgdGV4dC1kZWNvcmF0aW9uOiB1bmRlcmxpbmU7IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBjZW50ZXI7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aGl0ZS1zcGFjZTogbm9ybWFsOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDYsIDI0NiwgMjQ2KTsiIHRhcmdldD0iX2JsYW5rIj5JbnRlbGxpZ2VudCBIb3N0aW5nIFNkbi4gQmhkLjwvYT48L3RkPg0KCQk8L3RyPg0KCTwvdGJvZHk+DQo8L3RhYmxlPg0K', '05-Aug-2018', '1533478950', 'nana');
INSERT INTO `templates` (`t_id`, `t_title`, `t_content`, `t_date`, `t_time`, `t_user`) VALUES
(25, 'IntelhostMarketing_Template5', 'PHRhYmxlIGFsaWduPSJjZW50ZXIiIGJvcmRlcj0iMCIgY2VsbHBhZGRpbmc9IjEwIiBjZWxsc3BhY2luZz0iMyIgc3R5bGU9IndpZHRoOjcwMHB4Ij4NCgk8dGJvZHk+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzM5ODQwNTQtaGVhZGVyTmV3LnBuZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNjUtd2ViSG9zdGluZzYuanBnIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PHNwYW4gc3R5bGU9ImNvbG9yOm51bGwiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCVRoZXJlIGFyZSBwbGVudHkgb2Ygc2VjdXJpdHkgbWVhc3VyZXMgdG8gcHJvdGVjdCB5b3VyIHdlYnNpdGUgZnJvbSBtYWx3YXJlIGFuZCB2aXJ1c2VzLiBPdXIgcGxhbnMgYXJlIGFmZm9yZGFibGUgZm9yIGV2ZXJ5b25lLjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1jaGVhcC13ZWItaG9zdGluZyIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3NwYW4+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCUhhdmluZyBhIHdlYnNpdGUgY2FuIG9wZW4gdXAgeW91ciBidXNpbmVzcyB0byBhIHdob2xlIHJhbmdlIG9mIG1hcmtldGluZyB0b29scy4gWW91ciB3ZWJzaXRlIGNhbiBzdXBwb3J0IHNvY2lhbCBtZWRpYSBhY3Rpdml0eSBhbmQgeW91IGNhbiB1dGlsaXplIHByb2R1Y3RzIGxpa2UgU0VPICZhbXA7IFNFTS48YnIgLz4NCgkJCTxhIGhyZWY9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvP209Y2hlYXAtd2ViLWRlc2lnbiIgdGFyZ2V0PSJibGFuayI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzgxNjYxLWJ1dHRvbk1vcmUucG5nIiAvPjwvYT48L3RkPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIHN0eWxlPSJ3aWR0aDoyNTBweCI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzExMjYyLXdlYmRlc2lnbjYuanBnIiAvPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMTI2MC1tb2JpbGVBcHBzNi5qcGciIC8+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PGJyIC8+DQoJCQlPbmUgc3RvcCBpbmZvcm1hdGlvbiBjZW50ZXIgYXBwbGljYXRpb24gaXMgdGhlIG1vc3QgbmVlZGVkIGZvciBhbnkgaW5kdXN0cmllcyBhcyB5b3UgY2FuIHByb3ZpZGUgYW5kIHNwcmVhZCBpbmZvcm1hdGlvbiBlYXNpbHkgYW5kIHNlY3VyZWx5LjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1tb2JpbGUtYXBwIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIzIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTI1OTgtaW50ZWxob3N0X25ldy5wbmciIC8+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjIiIHJvd3NwYW49IjEiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxODU0NS1pbnRlbGhvc3RMaW5lQmFyLnBuZyIgLz48YnIgLz4NCgkJCUUtY29tbWVyY2UgcGxhdGZvcm0gY292ZXJzIGEgcmFuZ2Ugb2YgZGlmZmVyZW50IHR5cGVzIG9mIGJ1c2luZXNzZXMuIFdlIGFsc28gZGV2ZWxvcCBhbmQgc2V0dXAgb25saW5lIGJ1c2luZXNzIHNpdGUgd2l0aCBmdWxsIGZsZXhpYmlsaXR5LjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1lY29tbWVyY2UiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBzdHlsZT0id2lkdGg6MjUwcHgiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMTI1NS1lY29tbWVyY2U2LmpwZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNDUtYnVzaW5lZURpcjYuanBnIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzE4NTQ1LWludGVsaG9zdExpbmVCYXIucG5nIiAvPjxiciAvPg0KCQkJVGFrZSB0aGlzIG9wcG9ydHVuaXR5IHRvIGluY3JlYXNlIGJyYW5kIGF3YXJlbmVzcyBmb3IgeW91ciBidXNpbmVzcy4gQWZ0ZXIgY29uc3VtZXJzIGJlY29tZSBhd2FyZSBvZiB5b3VyIGJyYW5kLCB0aGV5JiMzOTtsbCBsZWFybiBtb3JlIGFib3V0IHlvdXIgcHJvZHVjdHMgb3Igc2VydmljZXMuPGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCTwvdHI+DQoJCTx0cj4NCgkJCTx0ZCBhbGlnbj0iY2VudGVyIiBjb2xzcGFuPSIyIiByb3dzcGFuPSIxIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTg1NDUtaW50ZWxob3N0TGluZUJhci5wbmciIC8+PGJyIC8+DQoJCQlJbnRlbGhvc3QgY2xvdWQgc3RvcmFnZSBsZXRzIHVzZXJzIHNoYXJlLCBzdG9yZSBhbmQgY29sbGFib3JhdGUgb24gZmlsZXMgc2VjdXJlbHkuIFlvdXIgZGF0YSBtYW5hZ2VtZW50IGJlY29tZXMgZWZmZWN0aXZlIHdpdGggYWRtaW4gY29uc29sZSBhcyB0aGUgY2VudHJhbCBkYXRhIGNvbnRyb2xsZXIuPGJyIC8+DQoJCQk8YSBocmVmPSJodHRwczovL3d3dy5pbnRlbGhvc3RjbG91ZC5jb20vIiB0YXJnZXQ9ImJsYW5rIj48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzODE2NjEtYnV0dG9uTW9yZS5wbmciIC8+PC9hPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNDgtY2xvdWQ2LmpwZyIgLz48L3RkPg0KCQk8L3RyPg0KCQk8dHI+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgc3R5bGU9IndpZHRoOjI1MHB4Ij48aW1nIHNyYz0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS9pbWFnZXMvbWVkaWFzLzE1MzMzMTEyNTEtZG9tYWluTmFtZTYuanBnIiAvPjwvdGQ+DQoJCQk8dGQgYWxpZ249ImNlbnRlciIgY29sc3Bhbj0iMiIgcm93c3Bhbj0iMSI+PGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzE4NTQ1LWludGVsaG9zdExpbmVCYXIucG5nIiAvPjxiciAvPg0KCQkJQSBkb21haW4gbmFtZSByZXByZXNlbnRzIHdobyB5b3UgYXJlIGFuZCB3aGF0IHlvdSBkby4gSXQgZ2l2ZXMgeW91ciBwb3RlbnRpYWwgY3VzdG9tZXJzIGFuIGlkZWEgb2YgeW91ciBidXNpbmVzcyBhbmQgaXQgY2FuIGFmZmVjdCB5b3VyIFNFTyByYW5raW5nLjxiciAvPg0KCQkJPGEgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8/bT1kb21haW4tbWFsYXlzaWEiIHRhcmdldD0iYmxhbmsiPjxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzM4MTY2MS1idXR0b25Nb3JlLnBuZyIgLz48L2E+PC90ZD4NCgkJPC90cj4NCgkJPHRyPg0KCQkJPHRkIGFsaWduPSJjZW50ZXIiIGNvbHNwYW49IjMiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkZvciBtb3JlIGluZm9ybWF0aW9uLCB2aXNpdCB1cyBhdCA6Jm5ic3A7IDwvc3Bhbj48L3NwYW4+IDxpbWcgc3JjPSJodHRwczovL3d3dy5pbnRlbGhvc3QuY29tLm15L2ltYWdlcy9tZWRpYXMvMTUzMzMxMDI2Mi1nLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly9wbHVzLmdvb2dsZS5jb20vMTAwNzUwNjM5Nzc4NDc4MjY3MDM4IiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjU5LWZiYi5wbmciIC8+IDxhIGhyZWY9Imh0dHBzOi8vd3d3LmZhY2Vib29rLmNvbS9pbnRlbGhvc3QubXkvIiB0YXJnZXQ9ImJsYW5rIj48c3BhbiBzdHlsZT0iY29sb3I6Izk5OTk5OSI+PHNwYW4gc3R5bGU9ImZvbnQtc2l6ZToxMnB4Ij5JbnRlbGhvc3QgTWFsYXlzaWE8L3NwYW4+PC9zcGFuPjwvYT4mbmJzcDsgPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzMzEwMjY1LXkyLnBuZyIgLz4gPGEgaHJlZj0iaHR0cHM6Ly93d3cueW91dHViZS5jb20vY2hhbm5lbC9VQ3FsVk5ELWFVRXZHeHpyWWFLWm9JN1EiPjxzcGFuIHN0eWxlPSJjb2xvcjojOTk5OTk5Ij48c3BhbiBzdHlsZT0iZm9udC1zaXplOjEycHgiPkludGVsaG9zdDwvc3Bhbj48L3NwYW4+PC9hPjxiciAvPg0KCQkJPGltZyBzcmM9Imh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvaW1hZ2VzL21lZGlhcy8xNTMzOTg0MDU0LWZvb3Rlck5ldy5wbmciIC8+PGJyIC8+DQoJCQk8c3BhbiBzdHlsZT0iLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDowcHg7IGJhY2tncm91bmQtY29sb3I6I2Y2ZjZmNjsgY29sb3I6Izk5OTk5OTsgZGlzcGxheTppbmxpbmUgIWltcG9ydGFudDsgZmxvYXQ6bm9uZTsgZm9udC1mYW1pbHk6JnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssSGVsdmV0aWNhLEhlbHZldGljYSxBcmlhbCxzYW5zLXNlcmlmOyBmb250LXNpemU6MTJweDsgZm9udC1zdHlsZTpub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOm5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczpub3JtYWw7IGZvbnQtd2VpZ2h0OjQwMDsgbGV0dGVyLXNwYWNpbmc6bm9ybWFsOyBvcnBoYW5zOjI7IHRleHQtYWxpZ246Y2VudGVyOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6aW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOmluaXRpYWw7IHRleHQtaW5kZW50OjBweDsgdGV4dC10cmFuc2Zvcm06bm9uZTsgd2hpdGUtc3BhY2U6bm9ybWFsOyB3aWRvd3M6Mjsgd29yZC1zcGFjaW5nOjBweCI+Ynk8c3Bhbj4mbmJzcDs8L3NwYW4+PC9zcGFuPjxhIGRhdGEtc2FmZXJlZGlyZWN0dXJsPSJodHRwczovL3d3dy5nb29nbGUuY29tL3VybD9xPWh0dHBzOi8vd3d3LmludGVsaG9zdC5jb20ubXkvJmFtcDtzb3VyY2U9Z21haWwmYW1wO3VzdD0xNTMzMzQ1OTAwNjQwMDAwJmFtcDt1c2c9QUZRakNORnF1dnFpa0hVRE1Kekxyekk3SmV3bnBqc1BLZyIgaHJlZj0iaHR0cHM6Ly93d3cuaW50ZWxob3N0LmNvbS5teS8iIHN0eWxlPSJtYXJnaW46IDBweDsgcGFkZGluZzogMHB4OyBmb250LWZhbWlseTogJnF1b3Q7SGVsdmV0aWNhIE5ldWUmcXVvdDssIEhlbHZldGljYSwgSGVsdmV0aWNhLCBBcmlhbCwgc2Fucy1zZXJpZjsgYm94LXNpemluZzogYm9yZGVyLWJveDsgZm9udC1zaXplOiAxMnB4OyBjb2xvcjogcmdiKDE1MywgMTUzLCAxNTMpOyB0ZXh0LWRlY29yYXRpb246IHVuZGVybGluZTsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IGNlbnRlcjsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0NiwgMjQ2LCAyNDYpOyIgdGFyZ2V0PSJfYmxhbmsiPkludGVsbGlnZW50IEhvc3RpbmcgU2RuLiBCaGQuPC9hPjwvdGQ+DQoJCTwvdHI+DQoJPC90Ym9keT4NCjwvdGFibGU+DQo=', '30-Sep-2018', '1538330282', 'nana');

-- --------------------------------------------------------

--
-- Table structure for table `temp_key`
--

CREATE TABLE `temp_key` (
  `tk_id` int(11) NOT NULL,
  `tk_client` varchar(255) NOT NULL,
  `tk_key` text NOT NULL,
  `tk_end` varchar(15) NOT NULL,
  `tk_date` varchar(255) NOT NULL,
  `tk_time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_status` int(11) NOT NULL,
  `t_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_login` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_theme` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_login`, `user_password`, `user_role`, `user_theme`, `user_email`, `user_phone`, `user_picture`, `user_status`) VALUES
(10, 'Mohamed Anwar Bin Radzuana', 'anwar', '281b389f9df1e835ea26d8e02589129ae0d9624b5d58a633a52c94fe357decb5', '7', 'dust', 'anwar37007@gmail.com', '0138212869', '1569156120-my_logo.jpg', 1),
(12, 'Hery Putty', 'Hery', '43bf1c0b7a496f576b8b198c587fe0a11f87ca40488557651e8da25b187c9d13', '7', '', 'hery@gmail.com', '09876453231', '', 1),
(14, 'Pei Yoke', 'peiyoke', '43bf1c0b7a496f576b8b198c587fe0a11f87ca40488557651e8da25b187c9d13', '5', '', 'sales@intelpro.com.my', '123456789', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `v_id` int(11) NOT NULL,
  `v_date` varchar(255) NOT NULL,
  `v_ip` varchar(255) NOT NULL,
  `v_hit` int(15) NOT NULL,
  `v_time` int(15) NOT NULL,
  `v_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`v_id`, `v_date`, `v_ip`, `v_hit`, `v_time`, `v_country`) VALUES
(1, '28-Aug-2019', '77.111.247.131', 1, 1567017808, 'Sweden'),
(2, '28-Aug-2019', '77.111.247.69', 1, 1567017841, 'Sweden'),
(3, '28-Aug-2019', '77.111.246.75', 2, 1567017863, 'Sweden'),
(4, '28-Aug-2019', '77.111.245.176', 2, 1567017909, 'Sweden'),
(5, '28-Aug-2019', '113.210.113.168', 14, 1567018019, 'Malaysia'),
(6, '28-Aug-2019', '77.111.246.92', 1, 1567018051, 'Sweden'),
(7, '28-Aug-2019', '77.111.247.93', 2, 1567018070, 'Sweden'),
(8, '30-Aug-2019', '113.210.58.168', 12, 1567184954, 'Malaysia'),
(9, '30-Aug-2019', '113.210.120.55', 1, 1567202435, 'Malaysia'),
(10, '31-Aug-2019', '113.210.119.135', 4, 1567238842, 'Malaysia'),
(11, '03-Sep-2019', '115.132.124.55', 1, 1567540424, 'Malaysia'),
(12, '03-Sep-2019', '113.210.68.224', 1, 1567551864, 'Malaysia'),
(13, '05-Sep-2019', '157.245.5.0', 1, 1567656776, 'United States'),
(14, '05-Sep-2019', '167.71.255.23', 1, 1567667555, 'United States'),
(15, '05-Sep-2019', '18.228.5.107', 1, 1567691990, 'Brazil'),
(16, '05-Sep-2019', '167.71.85.63', 1, 1567697502, 'United States'),
(17, '05-Sep-2019', '167.71.101.12', 1, 1567701454, 'United States'),
(18, '08-Sep-2019', '115.164.63.50', 1, 1567933377, 'Malaysia'),
(19, '13-Sep-2019', '18.139.217.79', 1, 1568350579, 'Singapore'),
(20, '15-Sep-2019', '113.210.72.160', 25, 1568540068, 'Malaysia'),
(21, '15-Sep-2019', '113.210.72.44', 6, 1568560371, 'Malaysia'),
(22, '16-Sep-2019', '183.171.132.64', 2, 1568595396, 'Malaysia'),
(23, '16-Sep-2019', '113.210.106.21', 2, 1568642200, 'Malaysia'),
(24, '16-Sep-2019', '113.210.106.199', 1, 1568659727, 'Malaysia'),
(25, '18-Sep-2019', '209.17.96.146', 1, 1568796846, 'United States'),
(26, '21-Sep-2019', '209.17.97.66', 1, 1569098473, 'United States'),
(27, '22-Sep-2019', '113.210.178.148', 14, 1569172033, 'Malaysia'),
(28, '22-Sep-2019', '42.188.171.51', 1, 1569172792, 'Malaysia'),
(29, '23-Sep-2019', '113.210.113.239', 1, 1569223653, 'Malaysia'),
(30, '23-Sep-2019', '113.210.65.184', 1, 1569254587, 'Malaysia'),
(31, '24-Sep-2019', '209.17.96.74', 1, 1569344372, 'United States'),
(32, '28-Sep-2019', '209.17.96.90', 1, 1569634962, 'United States'),
(33, '02-Oct-2019', '209.17.96.58', 1, 1570038774, 'United States'),
(34, '02-Oct-2019', '113.210.184.252', 134, 1570049006, 'Malaysia'),
(35, '05-Oct-2019', '209.17.96.130', 1, 1570240817, 'United States'),
(36, '05-Oct-2019', '113.210.184.57', 1, 1570265904, 'Malaysia'),
(37, '06-Oct-2019', '88.80.191.29', 4, 1570380541, 'United Kingdom'),
(38, '06-Oct-2019', '113.210.184.57', 4, 1570387317, 'Malaysia'),
(39, '06-Oct-2019', '124.82.0.41', 1, 1570391287, 'Malaysia'),
(40, '07-Oct-2019', '124.82.0.41', 2, 1570456087, 'Malaysia'),
(41, '08-Oct-2019', '167.99.119.67', 1, 1570537873, 'United States'),
(42, '08-Oct-2019', '157.245.212.110', 1, 1570546662, 'United States'),
(43, '08-Oct-2019', '159.65.40.112', 1, 1570550466, 'United States'),
(44, '08-Oct-2019', '124.82.0.41', 1, 1570576610, 'Malaysia'),
(45, '09-Oct-2019', '142.93.72.149', 1, 1570610640, 'United States'),
(46, '09-Oct-2019', '45.55.41.29', 1, 1570613986, 'United States'),
(47, '10-Oct-2019', '113.210.178.91', 23, 1570712057, 'Malaysia'),
(48, '10-Oct-2019', '60.48.100.7', 7, 1570712532, 'Malaysia'),
(49, '10-Oct-2019', '175.136.235.106', 2, 1570712943, 'Malaysia'),
(50, '11-Oct-2019', '209.17.97.98', 1, 1570771686, 'United States'),
(51, '11-Oct-2019', '209.17.97.58', 1, 1570804197, 'United States'),
(52, '11-Oct-2019', '175.136.235.106', 1, 1570810361, 'Malaysia'),
(53, '14-Oct-2019', '113.210.181.36', 14, 1571067792, 'Malaysia'),
(54, '15-Oct-2019', '147.158.184.165', 1, 1571100598, 'Malaysia'),
(55, '15-Oct-2019', '209.17.96.226', 1, 1571129132, 'United States'),
(56, '17-Oct-2019', '209.17.97.50', 1, 1571275673, 'United States'),
(57, '17-Oct-2019', '93.119.227.91', 1, 1571277175, 'Romania'),
(58, '17-Oct-2019', '93.119.227.91', 1, 1571277175, 'Romania'),
(59, '17-Oct-2019', '69.4.87.74', 1, 1571277175, 'United States'),
(60, '17-Oct-2019', '69.4.87.74', 1, 1571277175, 'United States'),
(61, '17-Oct-2019', '69.4.89.106', 1, 1571277191, 'United States'),
(62, '17-Oct-2019', '69.4.89.106', 1, 1571277191, 'United States'),
(63, '17-Oct-2019', '93.119.227.19', 1, 1571277193, 'Romania'),
(64, '17-Oct-2019', '93.119.227.19', 1, 1571277193, 'Romania'),
(65, '18-Oct-2019', '62.4.14.206', 1, 1571379737, 'France'),
(66, '18-Oct-2019', '51.15.191.81', 1, 1571381984, 'France'),
(67, '18-Oct-2019', '209.17.96.18', 1, 1571417568, 'United States'),
(68, '19-Oct-2019', '93.119.227.34', 1, 1571474899, 'Romania'),
(69, '19-Oct-2019', '93.119.227.34', 1, 1571474899, 'Romania'),
(70, '21-Oct-2019', '62.4.14.198', 1, 1571647363, 'France'),
(71, '21-Oct-2019', '212.83.146.233', 1, 1571649545, 'France'),
(72, '22-Oct-2019', '51.255.109.164', 1, 1571769065, 'France'),
(73, '23-Oct-2019', '209.17.97.26', 1, 1571792823, 'United States'),
(74, '23-Oct-2019', '113.210.98.96', 1, 1571851764, 'Malaysia'),
(75, '23-Oct-2019', '113.210.54.181', 2, 1571855824, 'Malaysia'),
(76, '25-Oct-2019', '209.17.97.58', 1, 1571981241, 'United States'),
(77, '26-Oct-2019', '113.210.194.66', 3, 1572083418, 'Malaysia'),
(78, '26-Oct-2019', '110.159.99.104', 2, 1572083703, 'Malaysia'),
(79, '28-Oct-2019', '113.210.187.218', 1, 1572270261, 'Malaysia'),
(80, '30-Oct-2019', '209.17.96.170', 1, 1572399221, 'United States'),
(81, '02-Nov-2019', '195.154.61.206', 2, 1572735997, 'France'),
(82, '02-Nov-2019', '62.4.14.198', 1, 1572736846, 'France'),
(83, '03-Nov-2019', '113.210.98.36', 2, 1572772806, 'Malaysia'),
(84, '04-Nov-2019', '147.158.177.62', 1, 1572874991, 'Malaysia'),
(85, '04-Nov-2019', '113.210.75.179', 1, 1572890083, 'Malaysia'),
(86, '05-Nov-2019', '52.67.97.139', 1, 1572934723, 'Brazil'),
(87, '05-Nov-2019', '147.158.177.62', 1, 1572951332, 'Malaysia'),
(88, '12-Nov-2019', '13.229.234.217', 1, 1573602439, 'Singapore'),
(89, '13-Nov-2019', '54.194.248.40', 1, 1573603219, 'Ireland'),
(90, '13-Nov-2019', '113.210.112.71', 3, 1573653620, 'Malaysia'),
(91, '13-Nov-2019', '37.120.208.79', 1, 1573675040, 'Singapore'),
(92, '20-Nov-2019', '113.210.57.1', 2, 1574279155, 'Malaysia'),
(93, '21-Nov-2019', '113.210.102.185', 1, 1574339079, 'Malaysia'),
(94, '27-Nov-2019', '175.139.118.63', 1, 1574856821, 'Malaysia'),
(95, '27-Nov-2019', '113.210.58.135', 1, 1574881158, 'Malaysia'),
(96, '28-Nov-2019', '218.208.159.144', 2, 1574960181, 'Malaysia'),
(97, '28-Nov-2019', '218.208.159.144', 2, 1574960181, 'Malaysia'),
(98, '30-Nov-2019', '60.51.91.19', 5, 1575138864, 'Malaysia'),
(99, '03-Dec-2019', '138.197.72.46', 1, 1575372409, 'United States'),
(100, '05-Dec-2019', '167.172.253.200', 1, 1575565243, 'United States'),
(101, '05-Dec-2019', '167.172.28.96', 1, 1575566907, 'United States'),
(102, '05-Dec-2019', '142.93.184.139', 1, 1575568827, 'United States'),
(103, '12-Dec-2019', '208.80.194.42', 1, 1576184340, 'United States'),
(104, '13-Dec-2019', '104.198.198.79', 1, 1576218726, 'United States'),
(105, '14-Dec-2019', '188.87.161.30', 1, 1576297638, 'Spain'),
(106, '15-Dec-2019', '137.226.113.27', 1, 1576408829, 'Germany'),
(107, '15-Dec-2019', '137.226.113.26', 1, 1576434047, 'Germany'),
(108, '16-Dec-2019', '89.108.99.6', 1, 1576512900, 'Russia'),
(109, '17-Dec-2019', '137.226.113.26', 1, 1576559881, 'Germany'),
(110, '17-Dec-2019', '37.120.224.6', 1, 1576586617, 'Romania'),
(111, '19-Dec-2019', '159.69.74.243', 1, 1576715077, 'Germany'),
(112, '19-Dec-2019', '35.164.212.38', 1, 1576761760, 'United States'),
(113, '19-Dec-2019', '138.246.253.5', 1, 1576774931, 'Germany'),
(114, '20-Dec-2019', '192.3.4.31', 1, 1576819106, 'Estonia'),
(115, '20-Dec-2019', '154.16.53.31', 2, 1576819115, 'Nigeria'),
(116, '20-Dec-2019', '103.59.156.16', 1, 1576879416, 'South Korea'),
(117, '21-Dec-2019', '104.248.82.152', 1, 1576959462, 'Netherlands'),
(118, '21-Dec-2019', '104.248.82.152', 1, 1576959462, 'Netherlands'),
(119, '22-Dec-2019', '137.226.113.28', 1, 1577054540, 'Germany'),
(120, '23-Dec-2019', '54.229.30.254', 1, 1577067731, 'Ireland'),
(121, '23-Dec-2019', '137.226.113.28', 1, 1577070180, 'Germany'),
(122, '25-Dec-2019', '37.120.224.6', 1, 1577234993, 'Romania'),
(123, '25-Dec-2019', '137.226.113.26', 1, 1577241000, 'Germany'),
(124, '25-Dec-2019', '207.46.13.127', 1, 1577247548, 'United States'),
(125, '25-Dec-2019', '40.77.167.128', 1, 1577297973, 'United States'),
(126, '26-Dec-2019', '78.129.237.153', 5, 1577320921, 'United Kingdom'),
(127, '26-Dec-2019', '35.164.145.201', 1, 1577365981, 'United States'),
(128, '26-Dec-2019', '207.46.13.3', 1, 1577379304, 'United States'),
(129, '26-Dec-2019', '54.145.211.222', 1, 1577388121, 'United States'),
(130, '26-Dec-2019', '213.159.213.236', 1, 1577397055, 'Russia'),
(131, '27-Dec-2019', '208.80.194.41', 1, 1577411523, 'United States'),
(132, '27-Dec-2019', '89.108.99.6', 1, 1577446612, 'Russia'),
(133, '27-Dec-2019', '34.217.192.73', 1, 1577452423, 'United States'),
(134, '27-Dec-2019', '51.15.215.86', 1, 1577462126, 'France'),
(135, '28-Dec-2019', '78.129.237.153', 42, 1577532871, 'United Kingdom'),
(136, '28-Dec-2019', '173.212.199.138', 1, 1577540215, 'Germany'),
(137, '29-Dec-2019', '137.226.113.28', 2, 1577652901, 'Germany'),
(138, '29-Dec-2019', '196.245.219.92', 1, 1577653350, 'Finland'),
(139, '30-Dec-2019', '65.154.226.100', 2, 1577732357, 'United States'),
(140, '30-Dec-2019', '167.172.197.241', 1, 1577738633, 'United States'),
(141, '30-Dec-2019', '137.226.113.27', 1, 1577744368, 'Germany'),
(142, '31-Dec-2019', '40.77.167.79', 1, 1577766165, 'United States'),
(143, '02-Jan-2020', '37.120.224.6', 1, 1577954070, 'Romania'),
(144, '02-Jan-2020', '104.140.15.222', 2, 1577987448, 'United States'),
(145, '02-Jan-2020', '40.77.167.107', 1, 1577992327, 'United States'),
(146, '02-Jan-2020', '40.77.167.200', 1, 1577992656, 'United States'),
(147, '02-Jan-2020', '89.108.99.6', 1, 1577993385, 'Russia'),
(148, '02-Jan-2020', '40.77.167.209', 1, 1578004877, 'United States'),
(149, '02-Jan-2020', '40.77.167.191', 2, 1578008397, 'United States'),
(150, '03-Jan-2020', '208.80.194.41', 1, 1578030900, 'United States'),
(151, '03-Jan-2020', '40.77.167.200', 2, 1578041511, 'United States'),
(152, '03-Jan-2020', '40.77.167.191', 1, 1578041523, 'United States'),
(153, '03-Jan-2020', '157.55.39.93', 1, 1578046424, 'United States'),
(154, '03-Jan-2020', '40.77.167.209', 1, 1578047188, 'United States'),
(155, '03-Jan-2020', '157.55.39.79', 2, 1578047441, 'United States'),
(156, '03-Jan-2020', '40.77.167.56', 2, 1578048149, 'United States'),
(157, '03-Jan-2020', '40.77.167.61', 1, 1578057792, 'United States'),
(158, '04-Jan-2020', '207.46.13.76', 1, 1578100809, 'United States'),
(159, '04-Jan-2020', '157.55.39.93', 1, 1578107184, 'United States'),
(160, '04-Jan-2020', '51.159.18.103', 1, 1578157663, 'France'),
(161, '05-Jan-2020', '207.46.13.151', 4, 1578207734, 'United States'),
(162, '05-Jan-2020', '137.226.113.27', 1, 1578213347, 'Germany'),
(163, '05-Jan-2020', '138.246.253.5', 1, 1578214337, 'Germany'),
(164, '05-Jan-2020', '157.55.39.163', 2, 1578218009, 'United States'),
(165, '05-Jan-2020', '207.46.13.40', 1, 1578239278, 'United States'),
(166, '05-Jan-2020', '207.46.13.169', 1, 1578251694, 'United States'),
(167, '05-Jan-2020', '199.229.249.196', 1, 1578255058, 'Canada'),
(168, '06-Jan-2020', '157.55.39.155', 1, 1578284547, 'United States'),
(169, '06-Jan-2020', '137.226.113.28', 1, 1578284690, 'Germany'),
(170, '06-Jan-2020', '207.46.13.196', 2, 1578290170, 'United States'),
(171, '06-Jan-2020', '207.46.13.169', 1, 1578291192, 'United States'),
(172, '06-Jan-2020', '207.46.13.84', 3, 1578314231, 'United States'),
(173, '06-Jan-2020', '207.46.13.227', 1, 1578337248, 'United States'),
(174, '06-Jan-2020', '13.66.139.0', 2, 1578339779, 'United States'),
(175, '06-Jan-2020', '206.223.226.164', 1, 1578340612, 'United States'),
(176, '06-Jan-2020', '40.77.167.191', 1, 1578352166, 'United States'),
(177, '07-Jan-2020', '40.77.167.208', 1, 1578357927, 'United States'),
(178, '07-Jan-2020', '40.77.167.89', 1, 1578364019, 'United States'),
(179, '07-Jan-2020', '207.46.13.82', 1, 1578365970, 'United States'),
(180, '07-Jan-2020', '40.77.167.184', 1, 1578376298, 'United States'),
(181, '07-Jan-2020', '157.55.39.250', 1, 1578378193, 'United States'),
(182, '07-Jan-2020', '167.71.93.209', 1, 1578379845, 'United States'),
(183, '07-Jan-2020', '142.93.180.12', 1, 1578380128, 'United States'),
(184, '07-Jan-2020', '165.22.41.42', 1, 1578380172, 'United States'),
(185, '07-Jan-2020', '13.66.139.0', 1, 1578389355, 'United States'),
(186, '07-Jan-2020', '137.226.113.27', 1, 1578401908, 'Germany'),
(187, '07-Jan-2020', '207.46.13.56', 1, 1578420795, 'United States'),
(188, '07-Jan-2020', '61.50.133.43', 1, 1578436052, 'China'),
(189, '08-Jan-2020', '195.206.105.212', 1, 1578445768, 'Switzerland'),
(190, '08-Jan-2020', '207.46.13.44', 1, 1578447818, 'United States'),
(191, '08-Jan-2020', '157.55.39.116', 1, 1578509538, 'United States'),
(192, '09-Jan-2020', '157.55.39.116', 1, 1578528548, 'United States'),
(193, '09-Jan-2020', '157.55.39.244', 1, 1578532455, 'United States'),
(194, '09-Jan-2020', '51.91.176.137', 1, 1578589063, 'France'),
(195, '10-Jan-2020', '89.108.99.6', 1, 1578621872, 'Russia'),
(196, '10-Jan-2020', '208.80.194.42', 1, 1578642674, 'United States'),
(197, '10-Jan-2020', '158.174.122.199', 1, 1578654215, 'Sweden'),
(198, '10-Jan-2020', '195.176.3.23', 1, 1578655785, 'Switzerland'),
(199, '10-Jan-2020', '157.55.39.177', 1, 1578668098, 'United States'),
(200, '11-Jan-2020', '84.17.51.144', 3, 1578706469, 'United Kingdom'),
(201, '11-Jan-2020', '118.127.15.84', 1, 1578731823, 'Australia'),
(202, '11-Jan-2020', '118.127.15.84', 1, 1578731823, 'Australia'),
(203, '11-Jan-2020', '51.91.66.96', 2, 1578742663, 'France'),
(204, '11-Jan-2020', '207.46.13.168', 1, 1578747185, 'United States'),
(205, '12-Jan-2020', '163.172.70.242', 1, 1578827446, 'France'),
(206, '12-Jan-2020', '62.210.5.253', 1, 1578830759, 'France'),
(207, '12-Jan-2020', '195.154.63.222', 1, 1578832114, 'France'),
(208, '12-Jan-2020', '104.244.72.99', 1, 1578834069, 'Luxembourg'),
(209, '12-Jan-2020', '196.52.38.32', 15, 1578844500, 'Hong Kong SAR China'),
(210, '12-Jan-2020', '196.52.38.31', 16, 1578846197, 'Hong Kong SAR China'),
(211, '13-Jan-2020', '69.50.238.156', 1, 1578874889, 'United States'),
(212, '13-Jan-2020', '207.46.13.109', 1, 1578874893, 'United States'),
(213, '13-Jan-2020', '37.120.237.36', 1, 1578885268, 'Romania'),
(214, '13-Jan-2020', '207.46.13.195', 1, 1578891507, 'United States'),
(215, '13-Jan-2020', '54.82.62.240', 1, 1578912413, 'United States'),
(216, '13-Jan-2020', '34.224.55.156', 1, 1578955156, 'United States'),
(217, '14-Jan-2020', '209.17.96.130', 1, 1578990537, 'United States'),
(218, '15-Jan-2020', '40.77.167.194', 1, 1579060540, 'United States'),
(219, '15-Jan-2020', '209.17.96.122', 1, 1579082757, 'United States'),
(220, '15-Jan-2020', '159.65.168.252', 1, 1579129267, 'United States'),
(221, '17-Jan-2020', '208.80.194.41', 1, 1579262214, 'United States'),
(222, '17-Jan-2020', '209.17.96.178', 1, 1579267198, 'United States'),
(223, '18-Jan-2020', '157.55.39.179', 1, 1579339591, 'United States'),
(224, '18-Jan-2020', '209.17.96.250', 1, 1579357748, 'United States'),
(225, '18-Jan-2020', '138.246.253.5', 1, 1579366171, 'Germany'),
(226, '19-Jan-2020', '82.202.161.133', 1, 1579410658, 'Russia'),
(227, '19-Jan-2020', '47.106.101.160', 1, 1579415247, 'China'),
(228, '19-Jan-2020', '103.208.220.132', 6, 1579442393, 'Japan'),
(229, '21-Jan-2020', '40.77.167.166', 1, 1579593756, 'United States'),
(230, '21-Jan-2020', '198.50.243.187', 1, 1579598580, 'Canada'),
(231, '21-Jan-2020', '209.17.96.58', 1, 1579639488, 'United States'),
(232, '22-Jan-2020', '89.108.99.6', 1, 1579676976, 'Russia'),
(233, '22-Jan-2020', '207.46.13.14', 1, 1579721841, 'United States'),
(234, '23-Jan-2020', '216.19.195.98', 1, 1579742764, 'United States'),
(235, '23-Jan-2020', '209.17.96.138', 1, 1579749499, 'United States'),
(236, '23-Jan-2020', '157.55.39.208', 1, 1579793818, 'United States'),
(237, '23-Jan-2020', '213.159.213.236', 1, 1579807247, 'Russia'),
(238, '23-Jan-2020', '23.238.115.42', 2, 1579807740, 'United States'),
(239, '23-Jan-2020', '209.99.168.136', 1, 1579815483, 'United States'),
(240, '23-Jan-2020', '104.140.83.184', 1, 1579815491, 'United States'),
(241, '24-Jan-2020', '37.120.133.136', 3, 1579850519, 'United Kingdom'),
(242, '24-Jan-2020', '207.46.13.20', 1, 1579867263, 'United States'),
(243, '24-Jan-2020', '208.80.194.42', 1, 1579877689, 'United States'),
(244, '24-Jan-2020', '209.17.96.194', 1, 1579880561, 'United States'),
(245, '25-Jan-2020', '157.55.39.49', 1, 1579933679, 'United States'),
(246, '25-Jan-2020', '207.46.13.168', 2, 1579943036, 'United States'),
(247, '25-Jan-2020', '157.55.39.167', 1, 1579956687, 'United States'),
(248, '25-Jan-2020', '209.17.97.122', 1, 1579978968, 'United States'),
(249, '26-Jan-2020', '207.46.13.20', 2, 1579998566, 'United States'),
(250, '26-Jan-2020', '207.46.13.168', 4, 1580002267, 'United States'),
(251, '26-Jan-2020', '157.55.39.195', 3, 1580003678, 'United States'),
(252, '26-Jan-2020', '34.222.206.87', 1, 1580016901, 'United States'),
(253, '26-Jan-2020', '137.226.113.28', 1, 1580067788, 'Germany'),
(254, '26-Jan-2020', '157.55.39.73', 1, 1580070825, 'United States'),
(255, '26-Jan-2020', '137.226.113.27', 1, 1580082582, 'Germany'),
(256, '27-Jan-2020', '207.46.13.20', 1, 1580103478, 'United States'),
(257, '27-Jan-2020', '207.46.13.168', 1, 1580154313, 'United States'),
(258, '27-Jan-2020', '40.77.167.173', 2, 1580157822, 'United States'),
(259, '27-Jan-2020', '78.129.237.153', 42, 1580166864, 'United Kingdom'),
(260, '28-Jan-2020', '157.55.39.73', 1, 1580170574, 'United States'),
(261, '28-Jan-2020', '207.46.13.168', 2, 1580185038, 'United States'),
(262, '28-Jan-2020', '209.17.97.82', 1, 1580192884, 'United States'),
(263, '28-Jan-2020', '34.209.7.153', 1, 1580218634, 'United States'),
(264, '28-Jan-2020', '137.226.113.26', 1, 1580249248, 'Germany'),
(265, '28-Jan-2020', '157.55.39.222', 1, 1580254457, 'United States'),
(266, '29-Jan-2020', '207.46.13.148', 2, 1580290400, 'United States'),
(267, '29-Jan-2020', '209.17.96.66', 1, 1580308852, 'United States'),
(268, '29-Jan-2020', '157.55.39.73', 1, 1580340077, 'United States'),
(269, '30-Jan-2020', '157.55.39.73', 2, 1580342846, 'United States'),
(270, '30-Jan-2020', '64.225.20.79', 1, 1580346534, 'United States'),
(271, '30-Jan-2020', '157.55.39.255', 3, 1580361350, 'United States'),
(272, '30-Jan-2020', '157.55.39.166', 2, 1580367140, 'United States'),
(273, '30-Jan-2020', '207.46.13.148', 2, 1580367191, 'United States'),
(274, '30-Jan-2020', '185.245.85.236', 3, 1580391740, 'Austria'),
(275, '30-Jan-2020', '207.46.13.196', 3, 1580416693, 'United States'),
(276, '30-Jan-2020', '40.77.167.55', 1, 1580423189, 'United States'),
(277, '31-Jan-2020', '207.46.13.196', 1, 1580433604, 'United States'),
(278, '31-Jan-2020', '40.77.167.55', 1, 1580433730, 'United States'),
(279, '31-Jan-2020', '211.95.50.8', 2, 1580435709, 'China'),
(280, '31-Jan-2020', '111.7.100.24', 2, 1580447548, 'China'),
(281, '31-Jan-2020', '111.7.100.27', 1, 1580447569, 'China'),
(282, '31-Jan-2020', '209.17.96.162', 1, 1580456643, 'United States'),
(283, '31-Jan-2020', '40.77.167.20', 3, 1580457760, 'United States'),
(284, '31-Jan-2020', '194.67.93.10', 1, 1580461174, 'Russia'),
(285, '31-Jan-2020', '157.55.39.118', 1, 1580470914, 'United States'),
(286, '31-Jan-2020', '51.77.249.193', 4, 1580474940, 'Germany'),
(287, '31-Jan-2020', '175.137.10.62', 1, 1580485045, 'Malaysia'),
(288, '31-Jan-2020', '95.211.209.158', 2, 1580485207, 'Netherlands'),
(289, '31-Jan-2020', '209.17.96.50', 1, 1580499842, 'United States'),
(290, '31-Jan-2020', '104.227.246.106', 1, 1580509446, 'United States'),
(291, '31-Jan-2020', '51.158.126.165', 1, 1580513158, 'France'),
(292, '31-Jan-2020', '40.77.167.19', 1, 1580514282, 'United States'),
(293, '01-Feb-2020', '157.55.39.166', 1, 1580525078, 'United States'),
(294, '01-Feb-2020', '95.211.211.232', 1, 1580549197, 'Netherlands'),
(295, '01-Feb-2020', '62.210.157.10', 4, 1580550922, 'France'),
(296, '02-Feb-2020', '40.77.167.64', 2, 1580605215, 'United States'),
(297, '02-Feb-2020', '157.55.39.166', 1, 1580606459, 'United States'),
(298, '02-Feb-2020', '40.77.167.32', 3, 1580645812, 'United States'),
(299, '02-Feb-2020', '137.226.113.27', 1, 1580654159, 'Germany'),
(300, '02-Feb-2020', '207.46.13.185', 2, 1580664118, 'United States'),
(301, '02-Feb-2020', '137.226.113.26', 2, 1580670048, 'Germany'),
(302, '03-Feb-2020', '40.77.167.151', 3, 1580698778, 'United States'),
(303, '03-Feb-2020', '207.46.13.31', 1, 1580700399, 'United States'),
(304, '03-Feb-2020', '207.46.13.137', 1, 1580700749, 'United States'),
(305, '03-Feb-2020', '154.16.89.12', 1, 1580746887, 'Nigeria'),
(306, '03-Feb-2020', '185.217.170.23', 1, 1580746890, 'United States'),
(307, '03-Feb-2020', '68.183.148.1', 1, 1580753530, 'United States'),
(308, '03-Feb-2020', '165.227.75.241', 1, 1580754040, 'United States'),
(309, '03-Feb-2020', '165.227.126.78', 1, 1580756031, 'United States'),
(310, '04-Feb-2020', '207.46.13.185', 2, 1580786203, 'United States'),
(311, '04-Feb-2020', '40.77.167.23', 1, 1580788940, 'United States'),
(312, '04-Feb-2020', '40.77.167.151', 3, 1580797443, 'United States'),
(313, '04-Feb-2020', '207.46.13.31', 2, 1580811628, 'United States'),
(314, '04-Feb-2020', '207.46.13.20', 9, 1580818419, 'United States'),
(315, '04-Feb-2020', '107.150.77.136', 1, 1580839004, 'United States'),
(316, '05-Feb-2020', '209.17.96.50', 1, 1580861417, 'United States'),
(317, '05-Feb-2020', '207.46.13.20', 1, 1580863920, 'United States'),
(318, '05-Feb-2020', '40.77.167.133', 1, 1580866745, 'United States'),
(319, '05-Feb-2020', '157.55.39.131', 5, 1580870992, 'United States'),
(320, '05-Feb-2020', '207.46.13.31', 8, 1580890992, 'United States'),
(321, '05-Feb-2020', '39.111.208.132', 1, 1580899829, 'Japan'),
(322, '05-Feb-2020', '207.46.13.222', 2, 1580907652, 'United States'),
(323, '05-Feb-2020', '209.17.96.138', 1, 1580907854, 'United States'),
(324, '05-Feb-2020', '40.77.167.90', 1, 1580932518, 'United States'),
(325, '05-Feb-2020', '157.55.39.157', 2, 1580938785, 'United States'),
(326, '06-Feb-2020', '207.46.13.31', 4, 1580976713, 'United States'),
(327, '06-Feb-2020', '40.77.167.137', 3, 1580978893, 'United States'),
(328, '06-Feb-2020', '174.91.60.231', 1, 1580983669, 'Canada'),
(329, '06-Feb-2020', '207.46.13.185', 1, 1580985155, 'United States'),
(330, '06-Feb-2020', '150.249.214.254', 1, 1580987248, 'Japan'),
(331, '06-Feb-2020', '51.15.15.164', 3, 1580995998, 'Netherlands'),
(332, '07-Feb-2020', '104.245.145.22', 1, 1581052360, 'Canada'),
(333, '07-Feb-2020', '138.246.253.5', 1, 1581055616, 'Germany'),
(334, '07-Feb-2020', '89.248.160.152', 1, 1581069370, 'Netherlands'),
(335, '07-Feb-2020', '209.17.97.66', 1, 1581081054, 'United States'),
(336, '07-Feb-2020', '40.77.167.118', 1, 1581081878, 'United States'),
(337, '07-Feb-2020', '86.185.206.44', 1, 1581097002, 'United Kingdom'),
(338, '07-Feb-2020', '207.46.13.31', 1, 1581106574, 'United States'),
(339, '07-Feb-2020', '209.17.96.2', 1, 1581107311, 'United States'),
(340, '08-Feb-2020', '157.55.39.240', 1, 1581144685, 'United States'),
(341, '08-Feb-2020', '157.55.39.97', 3, 1581148646, 'United States'),
(342, '09-Feb-2020', '207.46.13.15', 2, 1581213543, 'United States'),
(343, '09-Feb-2020', '157.55.39.194', 3, 1581221520, 'United States'),
(344, '09-Feb-2020', '207.46.13.38', 3, 1581222494, 'United States'),
(345, '09-Feb-2020', '207.46.13.241', 1, 1581223118, 'United States'),
(346, '09-Feb-2020', '157.55.39.234', 3, 1581247263, 'United States'),
(347, '09-Feb-2020', '185.242.4.203', 7, 1581258342, 'Japan'),
(348, '09-Feb-2020', '103.125.234.198', 5, 1581258870, 'Japan'),
(349, '10-Feb-2020', '51.158.191.84', 1, 1581305855, 'Netherlands'),
(350, '10-Feb-2020', '157.55.39.234', 1, 1581329254, 'United States'),
(351, '10-Feb-2020', '207.46.13.15', 1, 1581370360, 'United States'),
(352, '11-Feb-2020', '207.46.13.15', 6, 1581389398, 'United States'),
(353, '11-Feb-2020', '54.200.89.174', 1, 1581403911, 'United States'),
(354, '11-Feb-2020', '209.17.96.154', 1, 1581414155, 'United States'),
(355, '11-Feb-2020', '157.55.39.141', 1, 1581415029, 'United States'),
(356, '12-Feb-2020', '157.55.39.141', 1, 1581486686, 'United States'),
(357, '12-Feb-2020', '209.17.96.186', 1, 1581498672, 'United States'),
(358, '12-Feb-2020', '207.46.13.15', 1, 1581526776, 'United States'),
(359, '12-Feb-2020', '207.46.13.17', 3, 1581536360, 'United States'),
(360, '13-Feb-2020', '54.208.102.37', 1, 1581553475, 'United States'),
(361, '13-Feb-2020', '107.21.1.8', 1, 1581553479, 'United States'),
(362, '13-Feb-2020', '207.46.13.17', 4, 1581554340, 'United States'),
(363, '13-Feb-2020', '199.244.88.131', 1, 1581581626, 'United States'),
(364, '13-Feb-2020', '207.46.13.92', 4, 1581591747, 'United States'),
(365, '13-Feb-2020', '157.55.39.141', 1, 1581597457, 'United States'),
(366, '13-Feb-2020', '103.125.234.202', 4, 1581606252, 'Japan'),
(367, '13-Feb-2020', '54.201.231.150', 1, 1581614716, 'United States'),
(368, '13-Feb-2020', '52.34.24.33', 1, 1581614719, 'United States'),
(369, '13-Feb-2020', '35.161.12.155', 1, 1581614722, 'United States'),
(370, '14-Feb-2020', '207.46.13.92', 4, 1581640933, 'United States'),
(371, '14-Feb-2020', '209.17.97.26', 1, 1581660707, 'United States'),
(372, '14-Feb-2020', '185.131.52.30', 1, 1581663946, 'Germany'),
(373, '14-Feb-2020', '157.55.39.141', 1, 1581685264, 'United States'),
(374, '14-Feb-2020', '34.221.128.114', 1, 1581717925, 'United States'),
(375, '14-Feb-2020', '34.210.228.77', 1, 1581717926, 'United States'),
(376, '14-Feb-2020', '35.162.70.167', 1, 1581717927, 'United States'),
(377, '14-Feb-2020', '84.17.51.62', 3, 1581719278, 'United Kingdom'),
(378, '14-Feb-2020', '40.77.167.205', 1, 1581719714, 'United States'),
(379, '15-Feb-2020', '34.217.64.75', 1, 1581742110, 'United States'),
(380, '15-Feb-2020', '209.17.96.138', 1, 1581749798, 'United States'),
(381, '15-Feb-2020', '209.17.96.18', 1, 1581774103, 'United States'),
(382, '15-Feb-2020', '35.166.26.161', 1, 1581777832, 'United States'),
(383, '15-Feb-2020', '35.162.70.167', 1, 1581777835, 'United States'),
(384, '15-Feb-2020', '113.210.200.179', 6, 1581782015, 'Malaysia'),
(385, '15-Feb-2020', '173.252.83.9', 2, 1581787818, 'United States'),
(386, '15-Feb-2020', '173.252.83.8', 1, 1581788255, 'United States'),
(387, '15-Feb-2020', '176.65.12.190', 1, 1581790770, 'Palestinian Territories'),
(388, '15-Feb-2020', '31.13.127.19', 1, 1581796247, 'Ireland'),
(389, '15-Feb-2020', '157.55.39.185', 1, 1581810108, 'United States'),
(390, '16-Feb-2020', '40.77.167.141', 1, 1581832317, 'United States'),
(391, '16-Feb-2020', '157.55.39.185', 1, 1581836067, 'United States'),
(392, '16-Feb-2020', '207.46.13.52', 3, 1581839486, 'United States'),
(393, '16-Feb-2020', '178.62.6.233', 9, 1581855598, 'United Kingdom'),
(394, '16-Feb-2020', '178.62.113.166', 5, 1581856282, 'United Kingdom'),
(395, '16-Feb-2020', '37.120.156.5', 3, 1581862202, 'Poland'),
(396, '16-Feb-2020', '89.108.99.6', 1, 1581869982, 'Russia'),
(397, '16-Feb-2020', '40.77.167.126', 1, 1581881161, 'United States'),
(398, '16-Feb-2020', '34.213.142.131', 1, 1581883515, 'United States'),
(399, '16-Feb-2020', '35.162.70.167', 1, 1581883517, 'United States'),
(400, '17-Feb-2020', '40.77.167.126', 1, 1581899198, 'United States'),
(401, '17-Feb-2020', '207.46.13.103', 4, 1581921372, 'United States'),
(402, '17-Feb-2020', '207.46.13.52', 1, 1581928853, 'United States'),
(403, '17-Feb-2020', '113.210.196.14', 1, 1581958981, 'Malaysia'),
(404, '17-Feb-2020', '147.158.241.116', 1, 1581963575, 'Malaysia'),
(405, '17-Feb-2020', '54.213.51.169', 1, 1581968078, 'United States'),
(406, '17-Feb-2020', '52.34.24.33', 1, 1581968081, 'United States'),
(407, '17-Feb-2020', '157.55.39.167', 1, 1581971963, 'United States'),
(408, '17-Feb-2020', '40.77.167.130', 1, 1581976345, 'United States'),
(409, '18-Feb-2020', '69.171.251.32', 1, 1582003265, 'United States'),
(410, '18-Feb-2020', '69.171.251.44', 1, 1582003272, 'United States'),
(411, '18-Feb-2020', '54.184.252.207', 1, 1582054698, 'United States'),
(412, '18-Feb-2020', '35.162.70.167', 1, 1582054700, 'United States'),
(413, '18-Feb-2020', '157.55.39.241', 1, 1582056286, 'United States'),
(414, '18-Feb-2020', '40.77.167.53', 1, 1582058065, 'United States'),
(415, '18-Feb-2020', '207.46.13.103', 1, 1582063851, 'United States'),
(416, '18-Feb-2020', '209.17.97.26', 1, 1582064353, 'United States'),
(417, '19-Feb-2020', '173.252.95.17', 2, 1582077500, 'United States'),
(418, '19-Feb-2020', '40.77.167.105', 1, 1582104321, 'United States'),
(419, '19-Feb-2020', '91.90.195.82', 1, 1582110007, 'Bulgaria'),
(420, '19-Feb-2020', '207.46.13.103', 1, 1582116915, 'United States'),
(421, '19-Feb-2020', '149.56.140.236', 2, 1582118914, 'Canada'),
(422, '19-Feb-2020', '209.17.97.18', 1, 1582118937, 'United States'),
(423, '19-Feb-2020', '34.220.210.170', 1, 1582135375, 'United States'),
(424, '19-Feb-2020', '52.41.211.72', 1, 1582135378, 'United States'),
(425, '19-Feb-2020', '84.17.49.152', 3, 1582143110, 'Germany'),
(426, '19-Feb-2020', '207.46.13.181', 1, 1582148056, 'United States'),
(427, '20-Feb-2020', '213.159.213.137', 1, 1582165879, 'Russia'),
(428, '20-Feb-2020', '207.46.13.181', 1, 1582202708, 'United States'),
(429, '20-Feb-2020', '34.219.175.140', 1, 1582219417, 'United States'),
(430, '20-Feb-2020', '52.34.24.33', 1, 1582219419, 'United States'),
(431, '20-Feb-2020', '157.55.39.91', 1, 1582237118, 'United States'),
(432, '21-Feb-2020', '207.46.13.103', 2, 1582250124, 'United States'),
(433, '21-Feb-2020', '209.17.97.2', 1, 1582297478, 'United States'),
(434, '21-Feb-2020', '54.244.212.190', 1, 1582297965, 'United States'),
(435, '21-Feb-2020', '52.34.24.33', 1, 1582297967, 'United States'),
(436, '21-Feb-2020', '209.17.97.82', 1, 1582300814, 'United States'),
(437, '21-Feb-2020', '66.150.70.200', 1, 1582319698, 'United States'),
(438, '21-Feb-2020', '198.46.175.74', 1, 1582319716, 'Estonia'),
(439, '21-Feb-2020', '113.210.183.206', 19, 1582324604, 'Malaysia'),
(440, '22-Feb-2020', '171.13.14.10', 1, 1582340281, 'China'),
(441, '22-Feb-2020', '138.246.253.5', 1, 1582341250, 'Germany'),
(442, '22-Feb-2020', '209.17.96.234', 1, 1582343182, 'United States'),
(443, '22-Feb-2020', '40.77.167.180', 1, 1582365111, 'United States'),
(444, '22-Feb-2020', '157.55.39.91', 1, 1582365395, 'United States'),
(445, '22-Feb-2020', '51.77.249.202', 1, 1582381645, 'Germany'),
(446, '22-Feb-2020', '18.237.252.128', 1, 1582398098, 'United States'),
(447, '22-Feb-2020', '52.34.24.33', 1, 1582398101, 'United States'),
(448, '22-Feb-2020', '173.44.222.84', 1, 1582399837, 'United States'),
(449, '22-Feb-2020', '23.81.231.85', 1, 1582399852, 'United States'),
(450, '23-Feb-2020', '207.46.13.103', 2, 1582424017, 'United States'),
(451, '23-Feb-2020', '106.75.85.117', 1, 1582438052, 'China'),
(452, '23-Feb-2020', '207.46.13.76', 1, 1582440408, 'United States'),
(453, '23-Feb-2020', '14.120.134.86', 1, 1582442352, 'China'),
(454, '23-Feb-2020', '37.120.208.83', 7, 1582460551, 'Singapore'),
(455, '23-Feb-2020', '40.77.167.169', 1, 1582493917, 'United States'),
(456, '24-Feb-2020', '207.46.13.76', 2, 1582513869, 'United States'),
(457, '24-Feb-2020', '54.190.50.223', 1, 1582521231, 'United States'),
(458, '24-Feb-2020', '35.162.70.167', 2, 1582521233, 'United States'),
(459, '24-Feb-2020', '14.120.135.144', 20, 1582558832, 'China'),
(460, '24-Feb-2020', '54.190.2.61', 1, 1582572709, 'United States'),
(461, '25-Feb-2020', '40.77.167.34', 1, 1582598174, 'United States'),
(462, '25-Feb-2020', '209.17.96.210', 1, 1582609121, 'United States'),
(463, '25-Feb-2020', '207.46.13.76', 1, 1582616124, 'United States'),
(464, '25-Feb-2020', '5.44.169.3', 1, 1582636392, 'Russia'),
(465, '25-Feb-2020', '34.220.208.0', 1, 1582644870, 'United States'),
(466, '25-Feb-2020', '52.34.24.33', 1, 1582644873, 'United States'),
(467, '25-Feb-2020', '79.110.73.74', 1, 1582654109, 'Ukraine'),
(468, '25-Feb-2020', '209.17.97.42', 1, 1582659255, 'United States'),
(469, '26-Feb-2020', '157.55.39.219', 2, 1582678272, 'United States'),
(470, '26-Feb-2020', '207.46.13.76', 2, 1582684383, 'United States'),
(471, '26-Feb-2020', '34.208.223.204', 1, 1582697910, 'United States'),
(472, '26-Feb-2020', '34.215.17.143', 1, 1582703105, 'United States'),
(473, '26-Feb-2020', '37.120.230.168', 1, 1582703905, 'Romania'),
(474, '26-Feb-2020', '199.244.88.131', 1, 1582707113, 'United States'),
(475, '26-Feb-2020', '209.17.97.114', 1, 1582727504, 'United States'),
(476, '26-Feb-2020', '40.77.167.158', 2, 1582758749, 'United States'),
(477, '27-Feb-2020', '35.155.193.111', 1, 1582762510, 'United States'),
(478, '27-Feb-2020', '52.34.24.33', 1, 1582762513, 'United States'),
(479, '27-Feb-2020', '207.46.13.4', 1, 1582771330, 'United States'),
(480, '27-Feb-2020', '51.15.15.164', 5, 1582808088, 'Netherlands'),
(481, '27-Feb-2020', '35.163.46.186', 1, 1582820808, 'United States'),
(482, '27-Feb-2020', '52.41.211.72', 1, 1582820810, 'United States'),
(483, '27-Feb-2020', '199.244.88.131', 1, 1582827259, 'United States'),
(484, '28-Feb-2020', '40.77.167.179', 1, 1582918471, 'United States'),
(485, '28-Feb-2020', '34.216.222.101', 1, 1582920384, 'United States'),
(486, '28-Feb-2020', '52.34.24.33', 1, 1582920386, 'United States'),
(487, '29-Feb-2020', '78.129.237.153', 42, 1582940207, 'United Kingdom'),
(488, '29-Feb-2020', '209.17.96.250', 1, 1582960062, 'United States'),
(489, '29-Feb-2020', '207.46.13.174', 1, 1582971019, 'United States'),
(490, '29-Feb-2020', '40.77.167.67', 2, 1582971073, 'United States'),
(491, '29-Feb-2020', '209.17.96.146', 1, 1582988418, 'United States'),
(492, '29-Feb-2020', '89.108.99.6', 1, 1582990868, 'Russia'),
(493, '29-Feb-2020', '209.17.97.122', 1, 1582994115, 'United States'),
(494, '01-Mar-2020', '52.42.115.52', 1, 1583034806, 'United States'),
(495, '01-Mar-2020', '52.41.211.72', 1, 1583034809, 'United States'),
(496, '01-Mar-2020', '116.203.59.65', 1, 1583074595, 'Germany'),
(497, '01-Mar-2020', '68.183.156.23', 1, 1583079185, 'United States'),
(498, '01-Mar-2020', '54.198.8.37', 1, 1583083055, 'United States'),
(499, '01-Mar-2020', '137.226.113.28', 2, 1583087370, 'Germany'),
(500, '01-Mar-2020', '34.218.231.42', 1, 1583089245, 'United States'),
(501, '01-Mar-2020', '35.162.70.167', 1, 1583089247, 'United States'),
(502, '01-Mar-2020', '40.77.167.38', 1, 1583105482, 'United States'),
(503, '02-Mar-2020', '207.46.13.174', 1, 1583121261, 'United States'),
(504, '02-Mar-2020', '68.183.232.211', 1, 1583132978, 'United States'),
(505, '02-Mar-2020', '40.77.167.67', 1, 1583136405, 'United States'),
(506, '02-Mar-2020', '40.77.167.38', 1, 1583137468, 'United States'),
(507, '02-Mar-2020', '100.26.222.91', 1, 1583143004, 'United States'),
(508, '02-Mar-2020', '137.226.113.27', 1, 1583171235, 'Germany'),
(509, '02-Mar-2020', '54.149.145.158', 1, 1583182405, 'United States'),
(510, '02-Mar-2020', '52.41.211.72', 1, 1583182407, 'United States'),
(511, '03-Mar-2020', '209.17.96.226', 1, 1583209249, 'United States'),
(512, '03-Mar-2020', '40.77.167.64', 1, 1583211473, 'United States'),
(513, '03-Mar-2020', '216.19.195.34', 1, 1583213386, 'United States'),
(514, '03-Mar-2020', '52.36.112.74', 1, 1583241604, 'United States'),
(515, '03-Mar-2020', '52.41.211.72', 1, 1583241607, 'United States'),
(516, '03-Mar-2020', '104.223.69.231', 1, 1583250532, 'United States'),
(517, '03-Mar-2020', '199.244.88.131', 1, 1583256245, 'United States'),
(518, '03-Mar-2020', '209.17.97.26', 1, 1583275001, 'United States'),
(519, '04-Mar-2020', '5.188.62.25', 1, 1583294528, 'Russia'),
(520, '04-Mar-2020', '157.55.39.110', 1, 1583298013, 'United States'),
(521, '04-Mar-2020', '3.8.2.114', 1, 1583303662, 'United Kingdom'),
(522, '04-Mar-2020', '209.17.96.242', 1, 1583316685, 'United States'),
(523, '04-Mar-2020', '40.77.167.31', 1, 1583319949, 'United States'),
(524, '04-Mar-2020', '18.236.135.128', 1, 1583357482, 'United States'),
(525, '04-Mar-2020', '52.34.24.33', 1, 1583357485, 'United States'),
(526, '05-Mar-2020', '157.55.39.49', 1, 1583383093, 'United States'),
(527, '05-Mar-2020', '40.77.167.31', 1, 1583384734, 'United States'),
(528, '05-Mar-2020', '167.172.224.158', 1, 1583394695, 'United States'),
(529, '05-Mar-2020', '167.71.183.36', 1, 1583395498, 'United States'),
(530, '05-Mar-2020', '167.71.168.181', 1, 1583395921, 'United States'),
(531, '05-Mar-2020', '69.171.251.37', 1, 1583411301, 'United States'),
(532, '05-Mar-2020', '69.171.251.33', 1, 1583411307, 'United States'),
(533, '05-Mar-2020', '42.153.146.229', 1, 1583426877, 'Malaysia'),
(534, '05-Mar-2020', '54.244.111.11', 1, 1583438389, 'United States'),
(535, '05-Mar-2020', '52.34.24.33', 1, 1583438391, 'United States'),
(536, '05-Mar-2020', '40.77.167.10', 1, 1583452513, 'United States'),
(537, '06-Mar-2020', '51.15.61.228', 1, 1583455769, 'Netherlands'),
(538, '06-Mar-2020', '109.120.151.30', 1, 1583466904, 'Russia'),
(539, '06-Mar-2020', '18.212.134.57', 1, 1583514367, 'United States'),
(540, '06-Mar-2020', '40.77.167.77', 1, 1583516375, 'United States'),
(541, '07-Mar-2020', '157.55.39.131', 2, 1583560261, 'United States'),
(542, '07-Mar-2020', '207.46.13.239', 1, 1583564274, 'United States'),
(543, '07-Mar-2020', '207.46.13.18', 1, 1583572165, 'United States'),
(544, '07-Mar-2020', '148.251.123.46', 1, 1583574136, 'Germany'),
(545, '07-Mar-2020', '54.184.157.231', 1, 1583578846, 'United States'),
(546, '07-Mar-2020', '35.162.70.167', 1, 1583578848, 'United States'),
(547, '07-Mar-2020', '216.244.66.203', 1, 1583584790, 'United States'),
(548, '07-Mar-2020', '209.17.96.170', 1, 1583596318, 'United States'),
(549, '07-Mar-2020', '54.186.85.95', 1, 1583612242, 'United States'),
(550, '07-Mar-2020', '209.17.96.34', 1, 1583614437, 'United States'),
(551, '07-Mar-2020', '157.55.39.192', 1, 1583619108, 'United States'),
(552, '07-Mar-2020', '209.17.97.114', 1, 1583622417, 'United States'),
(553, '08-Mar-2020', '137.226.113.27', 1, 1583655800, 'Germany'),
(554, '08-Mar-2020', '178.128.117.77', 5, 1583670822, 'Singapore'),
(555, '08-Mar-2020', '196.52.38.23', 4, 1583671473, 'Hong Kong SAR China'),
(556, '08-Mar-2020', '37.120.208.67', 3, 1583672125, 'Singapore'),
(557, '08-Mar-2020', '207.46.13.159', 2, 1583677980, 'United States'),
(558, '08-Mar-2020', '137.226.113.28', 1, 1583678180, 'Germany'),
(559, '08-Mar-2020', '54.185.44.32', 1, 1583695390, 'United States'),
(560, '08-Mar-2020', '52.41.211.72', 1, 1583695392, 'United States'),
(561, '08-Mar-2020', '138.246.253.15', 1, 1583711108, 'Germany'),
(562, '09-Mar-2020', '40.77.167.201', 1, 1583714035, 'United States'),
(563, '09-Mar-2020', '207.46.13.159', 1, 1583727006, 'United States'),
(564, '09-Mar-2020', '40.77.167.132', 1, 1583739939, 'United States'),
(565, '09-Mar-2020', '54.201.70.135', 1, 1583775136, 'United States'),
(566, '09-Mar-2020', '35.162.70.167', 1, 1583775138, 'United States'),
(567, '09-Mar-2020', '207.46.13.227', 3, 1583775967, 'United States'),
(568, '09-Mar-2020', '207.46.13.12', 1, 1583778141, 'United States'),
(569, '10-Mar-2020', '137.226.113.28', 1, 1583801887, 'Germany'),
(570, '10-Mar-2020', '207.46.13.227', 1, 1583803682, 'United States'),
(571, '10-Mar-2020', '207.46.13.111', 1, 1583812661, 'United States'),
(572, '10-Mar-2020', '104.210.56.173', 1, 1583852900, 'United States'),
(573, '10-Mar-2020', '51.15.15.164', 5, 1583853197, 'Netherlands'),
(574, '10-Mar-2020', '209.17.96.122', 1, 1583855927, 'United States'),
(575, '10-Mar-2020', '18.237.7.36', 1, 1583856298, 'United States'),
(576, '10-Mar-2020', '52.34.24.33', 1, 1583856299, 'United States'),
(577, '10-Mar-2020', '157.55.39.231', 1, 1583857945, 'United States'),
(578, '10-Mar-2020', '157.55.39.170', 1, 1583880693, 'United States'),
(579, '10-Mar-2020', '40.77.167.197', 1, 1583881687, 'United States'),
(580, '11-Mar-2020', '40.77.167.197', 2, 1583892587, 'United States'),
(581, '11-Mar-2020', '207.46.13.227', 4, 1583895185, 'United States'),
(582, '11-Mar-2020', '209.17.97.122', 1, 1583895922, 'United States'),
(583, '11-Mar-2020', '89.108.99.6', 1, 1583919209, 'Russia'),
(584, '11-Mar-2020', '194.33.45.172', 2, 1583934596, 'Netherlands'),
(585, '11-Mar-2020', '157.55.39.170', 1, 1583935406, 'United States'),
(586, '11-Mar-2020', '54.190.55.96', 1, 1583946267, 'United States'),
(587, '11-Mar-2020', '35.162.70.167', 1, 1583946269, 'United States'),
(588, '11-Mar-2020', '209.17.97.98', 1, 1583948145, 'United States'),
(589, '11-Mar-2020', '207.46.13.239', 1, 1583963405, 'United States'),
(590, '11-Mar-2020', '54.147.195.36', 1, 1583968429, 'United States'),
(591, '11-Mar-2020', '184.73.101.25', 1, 1583968448, 'United States'),
(592, '11-Mar-2020', '207.46.13.108', 1, 1583970747, 'United States'),
(593, '12-Mar-2020', '144.217.73.217', 12, 1583977149, 'Canada'),
(594, '12-Mar-2020', '182.76.66.18', 3, 1584018672, 'India'),
(595, '12-Mar-2020', '49.204.95.110', 1, 1584019614, 'India'),
(596, '12-Mar-2020', '182.74.211.194', 1, 1584024120, 'India'),
(597, '12-Mar-2020', '106.51.230.230', 1, 1584024538, 'India'),
(598, '12-Mar-2020', '34.211.116.218', 1, 1584037936, 'United States'),
(599, '12-Mar-2020', '52.34.24.33', 1, 1584037939, 'United States'),
(600, '12-Mar-2020', '207.46.13.227', 2, 1584041715, 'United States'),
(601, '12-Mar-2020', '207.46.13.239', 1, 1584041954, 'United States'),
(602, '12-Mar-2020', '207.46.13.153', 1, 1584044410, 'United States'),
(603, '12-Mar-2020', '51.91.218.19', 1, 1584050235, 'France'),
(604, '13-Mar-2020', '207.46.13.239', 1, 1584067873, 'United States'),
(605, '13-Mar-2020', '207.46.13.153', 1, 1584071395, 'United States'),
(606, '13-Mar-2020', '209.17.97.58', 1, 1584075553, 'United States'),
(607, '13-Mar-2020', '138.246.253.15', 1, 1584076937, 'Germany'),
(608, '13-Mar-2020', '209.17.97.10', 1, 1584079728, 'United States'),
(609, '13-Mar-2020', '89.108.88.240', 2, 1584090121, 'Russia'),
(610, '13-Mar-2020', '35.165.178.16', 1, 1584118512, 'United States'),
(611, '13-Mar-2020', '35.162.70.167', 1, 1584118515, 'United States'),
(612, '14-Mar-2020', '157.55.39.179', 1, 1584145968, 'United States'),
(613, '14-Mar-2020', '207.46.13.227', 1, 1584155729, 'United States'),
(614, '14-Mar-2020', '157.55.39.164', 2, 1584160689, 'United States'),
(615, '14-Mar-2020', '113.210.114.20', 3, 1584183418, 'Malaysia'),
(616, '14-Mar-2020', '185.132.177.199', 3, 1584189201, 'Netherlands'),
(617, '14-Mar-2020', '34.222.64.174', 1, 1584205886, 'United States'),
(618, '14-Mar-2020', '52.41.211.72', 1, 1584205888, 'United States'),
(619, '15-Mar-2020', '82.202.161.133', 1, 1584231682, 'Russia'),
(620, '15-Mar-2020', '157.55.39.164', 1, 1584231792, 'United States'),
(621, '15-Mar-2020', '40.77.167.66', 1, 1584238521, 'United States'),
(622, '15-Mar-2020', '185.232.21.120', 3, 1584261232, 'Belgium'),
(623, '15-Mar-2020', '34.212.60.69', 1, 1584293623, 'United States'),
(624, '15-Mar-2020', '52.34.24.33', 1, 1584293625, 'United States'),
(625, '15-Mar-2020', '34.211.100.103', 1, 1584293629, 'United States'),
(626, '15-Mar-2020', '137.226.113.26', 2, 1584305475, 'Germany'),
(627, '16-Mar-2020', '137.226.113.26', 1, 1584319902, 'Germany'),
(628, '16-Mar-2020', '178.128.47.75', 1, 1584321347, 'United Kingdom'),
(629, '16-Mar-2020', '207.46.13.227', 2, 1584348850, 'United States'),
(630, '16-Mar-2020', '188.143.169.22', 1, 1584367468, 'Russia'),
(631, '16-Mar-2020', '34.220.221.32', 1, 1584367605, 'United States'),
(632, '16-Mar-2020', '35.162.70.167', 1, 1584367607, 'United States'),
(633, '16-Mar-2020', '157.55.39.252', 1, 1584368526, 'United States'),
(634, '17-Mar-2020', '138.246.253.5', 1, 1584410156, 'Germany'),
(635, '17-Mar-2020', '157.55.39.252', 1, 1584417869, 'United States'),
(636, '17-Mar-2020', '207.46.13.227', 2, 1584455869, 'United States'),
(637, '17-Mar-2020', '207.46.13.185', 1, 1584466267, 'United States'),
(638, '17-Mar-2020', '34.213.7.42', 1, 1584466351, 'United States'),
(639, '17-Mar-2020', '52.41.211.72', 1, 1584466353, 'United States'),
(640, '17-Mar-2020', '207.46.13.35', 1, 1584472807, 'United States'),
(641, '17-Mar-2020', '216.151.20.198', 1, 1584482802, 'United States'),
(642, '18-Mar-2020', '45.152.182.148', 2, 1584501636, 'United States'),
(643, '18-Mar-2020', '92.204.50.32', 1, 1584511022, 'Germany'),
(644, '18-Mar-2020', '139.162.155.220', 2, 1584515576, 'Germany'),
(645, '18-Mar-2020', '209.17.96.18', 1, 1584553608, 'United States'),
(646, '18-Mar-2020', '52.12.22.115', 1, 1584556549, 'United States'),
(647, '18-Mar-2020', '52.41.211.72', 1, 1584556551, 'United States'),
(648, '19-Mar-2020', '151.106.12.251', 3, 1584598897, 'France'),
(649, '19-Mar-2020', '209.17.96.170', 1, 1584599350, 'United States'),
(650, '19-Mar-2020', '40.77.167.49', 1, 1584600943, 'United States'),
(651, '19-Mar-2020', '207.46.13.185', 1, 1584602982, 'United States'),
(652, '19-Mar-2020', '207.46.13.227', 1, 1584606398, 'United States'),
(653, '19-Mar-2020', '109.165.232.93', 1, 1584623707, 'Bosnia & Herzegovina'),
(654, '19-Mar-2020', '34.221.186.252', 1, 1584641392, 'United States'),
(655, '19-Mar-2020', '52.34.24.33', 1, 1584641394, 'United States'),
(656, '19-Mar-2020', '157.55.39.73', 1, 1584643733, 'United States'),
(657, '20-Mar-2020', '207.46.13.153', 1, 1584666641, 'United States'),
(658, '20-Mar-2020', '157.55.39.240', 3, 1584688163, 'United States'),
(659, '20-Mar-2020', '40.77.167.142', 1, 1584690677, 'United States'),
(660, '20-Mar-2020', '207.46.13.111', 2, 1584699462, 'United States'),
(661, '20-Mar-2020', '34.219.116.223', 1, 1584720669, 'United States'),
(662, '20-Mar-2020', '52.41.211.72', 1, 1584720671, 'United States'),
(663, '20-Mar-2020', '95.142.121.19', 1, 1584728704, 'United States'),
(664, '20-Mar-2020', '45.117.82.166', 2, 1584745754, 'Vietnam'),
(665, '21-Mar-2020', '213.159.213.137', 1, 1584755492, 'Russia'),
(666, '21-Mar-2020', '209.17.96.74', 1, 1584762988, 'United States'),
(667, '21-Mar-2020', '157.55.39.77', 1, 1584786562, 'United States'),
(668, '21-Mar-2020', '207.46.13.241', 2, 1584789436, 'United States'),
(669, '21-Mar-2020', '207.46.13.234', 1, 1584790539, 'United States'),
(670, '21-Mar-2020', '54.244.212.115', 1, 1584813275, 'United States'),
(671, '21-Mar-2020', '52.41.211.72', 1, 1584813277, 'United States'),
(672, '22-Mar-2020', '5.188.210.39', 1, 1584839757, 'Russia'),
(673, '22-Mar-2020', '209.17.96.242', 1, 1584847103, 'United States'),
(674, '22-Mar-2020', '207.46.13.146', 1, 1584864454, 'United States'),
(675, '22-Mar-2020', '54.187.136.122', 1, 1584894917, 'United States'),
(676, '22-Mar-2020', '52.41.211.72', 1, 1584894919, 'United States'),
(677, '22-Mar-2020', '157.55.39.49', 1, 1584905455, 'United States'),
(678, '23-Mar-2020', '157.55.39.115', 1, 1584926213, 'United States'),
(679, '23-Mar-2020', '207.46.13.146', 1, 1584927918, 'United States'),
(680, '23-Mar-2020', '116.203.77.70', 1, 1584930007, 'Germany'),
(681, '23-Mar-2020', '157.55.39.240', 2, 1584936852, 'United States'),
(682, '23-Mar-2020', '62.210.80.93', 2, 1584939346, 'France'),
(683, '23-Mar-2020', '89.108.99.6', 1, 1584966671, 'Russia'),
(684, '23-Mar-2020', '104.168.182.234', 2, 1584970073, 'United States'),
(685, '23-Mar-2020', '139.180.1.38', 1, 1584979821, 'Canada'),
(686, '23-Mar-2020', '168.81.93.174', 3, 1584979824, 'United Kingdom'),
(687, '23-Mar-2020', '34.215.239.70', 1, 1584987589, 'United States'),
(688, '23-Mar-2020', '52.34.24.33', 1, 1584987591, 'United States'),
(689, '23-Mar-2020', '207.46.13.185', 1, 1584998134, 'United States'),
(690, '24-Mar-2020', '40.77.167.141', 1, 1585014309, 'United States'),
(691, '24-Mar-2020', '207.46.13.185', 1, 1585038980, 'United States'),
(692, '24-Mar-2020', '93.189.95.26', 2, 1585051538, 'Spain'),
(693, '24-Mar-2020', '78.47.104.61', 1, 1585051843, 'Germany'),
(694, '24-Mar-2020', '138.246.253.15', 1, 1585053716, 'Germany'),
(695, '24-Mar-2020', '54.201.138.8', 1, 1585071480, 'United States'),
(696, '24-Mar-2020', '52.34.24.33', 1, 1585071482, 'United States'),
(697, '24-Mar-2020', '40.77.167.31', 1, 1585076520, 'United States'),
(698, '25-Mar-2020', '106.75.118.223', 1, 1585103209, 'China'),
(699, '25-Mar-2020', '209.17.96.114', 1, 1585119423, 'United States'),
(700, '25-Mar-2020', '104.245.145.124', 1, 1585119869, 'Canada'),
(701, '25-Mar-2020', '207.46.13.152', 1, 1585130878, 'United States'),
(702, '25-Mar-2020', '209.17.96.218', 1, 1585152520, 'United States'),
(703, '25-Mar-2020', '72.76.221.125', 74, 1585159560, 'United States'),
(704, '25-Mar-2020', '52.32.3.82', 1, 1585163124, 'United States'),
(705, '25-Mar-2020', '35.162.70.167', 1, 1585163126, 'United States'),
(706, '26-Mar-2020', '44.234.26.4', 1, 1585196988, 'United States'),
(707, '26-Mar-2020', '37.120.230.163', 1, 1585197599, 'Romania'),
(708, '26-Mar-2020', '35.157.32.153', 1, 1585210249, 'Germany'),
(709, '26-Mar-2020', '223.252.24.17', 2, 1585210251, 'Australia'),
(710, '26-Mar-2020', '52.37.130.35', 1, 1585243270, 'United States'),
(711, '26-Mar-2020', '52.41.211.72', 1, 1585243272, 'United States'),
(712, '26-Mar-2020', '157.55.39.106', 1, 1585247717, 'United States'),
(713, '26-Mar-2020', '40.77.167.198', 1, 1585248454, 'United States'),
(714, '26-Mar-2020', '157.55.39.240', 1, 1585265121, 'United States'),
(715, '27-Mar-2020', '157.55.39.240', 1, 1585277760, 'United States'),
(716, '27-Mar-2020', '157.55.39.106', 2, 1585290631, 'United States'),
(717, '27-Mar-2020', '54.245.186.250', 1, 1585325113, 'United States'),
(718, '27-Mar-2020', '52.34.24.33', 1, 1585325115, 'United States'),
(719, '27-Mar-2020', '40.77.167.198', 1, 1585341555, 'United States'),
(720, '27-Mar-2020', '209.17.96.154', 1, 1585347268, 'United States'),
(721, '27-Mar-2020', '5.188.62.25', 1, 1585352719, 'Russia'),
(722, '28-Mar-2020', '157.55.39.106', 1, 1585357598, 'United States'),
(723, '28-Mar-2020', '209.17.96.146', 1, 1585389299, 'United States'),
(724, '28-Mar-2020', '34.217.136.186', 1, 1585419796, 'United States'),
(725, '28-Mar-2020', '40.77.167.135', 1, 1585433517, 'United States'),
(726, '28-Mar-2020', '157.55.39.9', 1, 1585438159, 'United States'),
(727, '29-Mar-2020', '51.77.249.202', 3, 1585443812, 'Germany'),
(728, '29-Mar-2020', '54.154.56.65', 1, 1585444338, 'Ireland'),
(729, '29-Mar-2020', '40.77.167.23', 3, 1585460390, 'United States'),
(730, '29-Mar-2020', '185.81.157.58', 2, 1585497678, 'France'),
(731, '29-Mar-2020', '54.190.0.79', 1, 1585501296, 'United States'),
(732, '29-Mar-2020', '15.164.170.173', 1, 1585524937, 'South Korea'),
(733, '30-Mar-2020', '78.129.237.153', 29, 1585537295, 'United Kingdom'),
(734, '30-Mar-2020', '116.62.156.213', 1, 1585560323, 'China'),
(735, '30-Mar-2020', '39.99.55.52', 1, 1585560413, 'China'),
(736, '30-Mar-2020', '40.77.167.23', 1, 1585573160, 'United States'),
(737, '30-Mar-2020', '18.236.224.100', 1, 1585591713, 'United States'),
(738, '30-Mar-2020', '188.143.169.29', 1, 1585601881, 'Russia'),
(739, '30-Mar-2020', '188.143.169.29', 1, 1585601882, 'Russia'),
(740, '30-Mar-2020', '157.55.39.164', 1, 1585604304, 'United States'),
(741, '31-Mar-2020', '40.77.167.23', 1, 1585629441, 'United States'),
(742, '31-Mar-2020', '157.55.39.164', 4, 1585647449, 'United States'),
(743, '31-Mar-2020', '209.17.96.42', 1, 1585663927, 'United States'),
(744, '31-Mar-2020', '40.77.167.94', 1, 1585667880, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `w_id` int(11) NOT NULL,
  `w_name` text NOT NULL,
  `w_key` text NOT NULL,
  `w_value` text NOT NULL,
  `w_content` text NOT NULL,
  `w_possition` text NOT NULL,
  `w_enamble` int(11) NOT NULL,
  `w_status` int(11) NOT NULL,
  `w_type` int(11) NOT NULL,
  `w_order` int(11) NOT NULL,
  `w_portal` varchar(255) NOT NULL,
  `w_user` varchar(255) NOT NULL,
  `w_date` varchar(255) NOT NULL,
  `w_time` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(11) NOT NULL,
  `w_item` text NOT NULL,
  `w_customer` int(11) NOT NULL,
  `w_date` varchar(15) NOT NULL,
  `w_time` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `apikey`
--
ALTER TABLE `apikey`
  ADD PRIMARY KEY (`ak_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `a_apirouting`
--
ALTER TABLE `a_apirouting`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `a_document_template`
--
ALTER TABLE `a_document_template`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `a_menus`
--
ALTER TABLE `a_menus`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `cart_shipping`
--
ALTER TABLE `cart_shipping`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ccmail`
--
ALTER TABLE `ccmail`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `client_package`
--
ALTER TABLE `client_package`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `cm_menus`
--
ALTER TABLE `cm_menus`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `company_cms`
--
ALTER TABLE `company_cms`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `hits`
--
ALTER TABLE `hits`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `item_attribute`
--
ALTER TABLE `item_attribute`
  ADD PRIMARY KEY (`ia_id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`ic_id`);

--
-- Indexes for table `item_detail`
--
ALTER TABLE `item_detail`
  ADD PRIMARY KEY (`id_id`);

--
-- Indexes for table `item_fees`
--
ALTER TABLE `item_fees`
  ADD PRIMARY KEY (`if_id`);

--
-- Indexes for table `item_option`
--
ALTER TABLE `item_option`
  ADD PRIMARY KEY (`io_id`);

--
-- Indexes for table `item_option_group`
--
ALTER TABLE `item_option_group`
  ADD PRIMARY KEY (`iog_id`);

--
-- Indexes for table `item_option_group_item`
--
ALTER TABLE `item_option_group_item`
  ADD PRIMARY KEY (`iogi_id`);

--
-- Indexes for table `item_option_value`
--
ALTER TABLE `item_option_value`
  ADD PRIMARY KEY (`iov_id`);

--
-- Indexes for table `item_picture`
--
ALTER TABLE `item_picture`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `item_price`
--
ALTER TABLE `item_price`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `item_promotion`
--
ALTER TABLE `item_promotion`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `item_review`
--
ALTER TABLE `item_review`
  ADD PRIMARY KEY (`ir_id`);

--
-- Indexes for table `key_email`
--
ALTER TABLE `key_email`
  ADD PRIMARY KEY (`ke_id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `menu_page`
--
ALTER TABLE `menu_page`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `modals`
--
ALTER TABLE `modals`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `motto`
--
ALTER TABLE `motto`
  ADD PRIMARY KEY (`motto_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `notification_email`
--
ALTER TABLE `notification_email`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_cancel`
--
ALTER TABLE `order_cancel`
  ADD PRIMARY KEY (`oc_id`);

--
-- Indexes for table `order_claim`
--
ALTER TABLE `order_claim`
  ADD PRIMARY KEY (`oc_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`oi_id`);

--
-- Indexes for table `order_log`
--
ALTER TABLE `order_log`
  ADD PRIMARY KEY (`ol_id`);

--
-- Indexes for table `order_refund`
--
ALTER TABLE `order_refund`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `order_shipping`
--
ALTER TABLE `order_shipping`
  ADD PRIMARY KEY (`os_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`os_id`);

--
-- Indexes for table `order_tax`
--
ALTER TABLE `order_tax`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `password_recovery_detail`
--
ALTER TABLE `password_recovery_detail`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `pg`
--
ALTER TABLE `pg`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pg_type`
--
ALTER TABLE `pg_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `portals`
--
ALTER TABLE `portals`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pwidgets`
--
ALTER TABLE `pwidgets`
  ADD PRIMARY KEY (`pw_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `temp_key`
--
ALTER TABLE `temp_key`
  ADD PRIMARY KEY (`tk_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `apikey`
--
ALTER TABLE `apikey`
  MODIFY `ak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `a_apirouting`
--
ALTER TABLE `a_apirouting`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `a_document_template`
--
ALTER TABLE `a_document_template`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_menus`
--
ALTER TABLE `a_menus`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cart_shipping`
--
ALTER TABLE `cart_shipping`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ccmail`
--
ALTER TABLE `ccmail`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `client_package`
--
ALTER TABLE `client_package`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_menus`
--
ALTER TABLE `cm_menus`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `company_cms`
--
ALTER TABLE `company_cms`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hits`
--
ALTER TABLE `hits`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=820;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `item_attribute`
--
ALTER TABLE `item_attribute`
  MODIFY `ia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `ic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `id_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `item_fees`
--
ALTER TABLE `item_fees`
  MODIFY `if_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `item_option`
--
ALTER TABLE `item_option`
  MODIFY `io_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `item_option_group`
--
ALTER TABLE `item_option_group`
  MODIFY `iog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_option_group_item`
--
ALTER TABLE `item_option_group_item`
  MODIFY `iogi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_option_value`
--
ALTER TABLE `item_option_value`
  MODIFY `iov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `item_picture`
--
ALTER TABLE `item_picture`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `item_price`
--
ALTER TABLE `item_price`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_promotion`
--
ALTER TABLE `item_promotion`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `item_review`
--
ALTER TABLE `item_review`
  MODIFY `ir_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_email`
--
ALTER TABLE `key_email`
  MODIFY `ke_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menu_page`
--
ALTER TABLE `menu_page`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modals`
--
ALTER TABLE `modals`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motto`
--
ALTER TABLE `motto`
  MODIFY `motto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_email`
--
ALTER TABLE `notification_email`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_cancel`
--
ALTER TABLE `order_cancel`
  MODIFY `oc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_claim`
--
ALTER TABLE `order_claim`
  MODIFY `oc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `oi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_log`
--
ALTER TABLE `order_log`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_refund`
--
ALTER TABLE `order_refund`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_shipping`
--
ALTER TABLE `order_shipping`
  MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_tax`
--
ALTER TABLE `order_tax`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_recovery_detail`
--
ALTER TABLE `password_recovery_detail`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pg`
--
ALTER TABLE `pg`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pg_type`
--
ALTER TABLE `pg_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portals`
--
ALTER TABLE `portals`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pwidgets`
--
ALTER TABLE `pwidgets`
  MODIFY `pw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `temp_key`
--
ALTER TABLE `temp_key`
  MODIFY `tk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=745;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
