-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2018 at 07:15 AM
-- Server version: 5.5.44-37.3-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appsmons_umbilical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Super Admin, 2 = Sub Admin',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jack Sparrow', 'superadmin', 'admin@umbilical.com', '$2y$10$BQx4cbJWqdo.So4Vez8AquSmpgiPZw/6qZ5ajs0nJIpPlLqtF8Lk.', '1', '1', 'Aau3ueC8Clz8JSsk4pCfNNjP3seYQkyiK6ZoVVPNaj3j1lZX61iXyX39AZKJ', '2018-01-30 06:46:13', '2018-04-19 09:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challan_process_activitylog`
--

CREATE TABLE IF NOT EXISTS `challan_process_activitylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_date` date NOT NULL,
  `challan_request_id` int(11) NOT NULL,
  `activity_done_user` int(11) NOT NULL,
  `activity_desc` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_352` (`challan_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `incorporation_date` date NOT NULL,
  `joining_date` date NOT NULL,
  `cin_llpin` varchar(50) NOT NULL,
  `pancard` varchar(10) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `address` longtext NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `tan` varchar(20) NOT NULL,
  `client_code` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `turnover` double NOT NULL,
  `type` int(11) NOT NULL,
  `category` enum('Small','Medium','Large') NOT NULL DEFAULT 'Small',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_assigned_rm`
--

CREATE TABLE IF NOT EXISTS `client_assigned_rm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `rm_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_211` (`client_id`),
  KEY `FK_218` (`rm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_assigned_unit`
--

CREATE TABLE IF NOT EXISTS `client_assigned_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `charged_value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_132` (`client_id`),
  KEY `FK_136` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_assigned_unitexecutive`
--

CREATE TABLE IF NOT EXISTS `client_assigned_unitexecutive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `executive_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_240` (`client_id`),
  KEY `FK_244` (`executive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_authorized_person`
--

CREATE TABLE IF NOT EXISTS `client_authorized_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` longtext NOT NULL,
  `pan_number` varchar(10) NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_147` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_occupied_servicetype`
--

CREATE TABLE IF NOT EXISTS `client_occupied_servicetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `servicetype_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_254` (`client_id`),
  KEY `FK_258` (`servicetype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_uploaded_challan`
--

CREATE TABLE IF NOT EXISTS `client_uploaded_challan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `challan_name` varchar(255) NOT NULL,
  `document_path` longtext NOT NULL,
  `client_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_277` (`client_id`),
  KEY `FK_284` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `process_uploaded_challan`
--

CREATE TABLE IF NOT EXISTS `process_uploaded_challan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uploaded_challan_id` int(11) NOT NULL,
  `servicetype_id` int(11) NOT NULL,
  `month_year` varchar(10) NOT NULL,
  `filed_document_name` varchar(255) NOT NULL,
  `filed_document_path` longtext NOT NULL,
  `challan_return_value` double NOT NULL,
  `executive_id` int(11) NOT NULL,
  `parent_filed_request` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_293` (`uploaded_challan_id`),
  KEY `FK_297` (`servicetype_id`),
  KEY `FK_334` (`executive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_unithead`
--

CREATE TABLE IF NOT EXISTS `product_unithead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `unit_head_code` varchar(120) NOT NULL,
  `assigned_unit` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` longtext NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relationship_managers`
--

CREATE TABLE IF NOT EXISTS `relationship_managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `rm_code` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` longtext NOT NULL,
  `remember_token` text,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `relationship_managers`
--

INSERT INTO `relationship_managers` (`id`, `name`, `email`, `phone`, `rm_code`, `username`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Peter Huge', 'peter.huge@gmail.com', '8754256548', 'Peter 1256', 'peter.huge', '$2y$10$/usdmPqzEyMAq0Ln93/fV.CXNYQTcedwuu8xLIooGCCljt3E72ckm', NULL, 'Active', '2018-04-19 13:00:35', '2018-04-19 13:00:35'),
(2, 'Captain Jhones', 'captain.jhones@gmail.com', '7485658854', 'Jhones', 'captainjhones', '$2y$10$UF4Xcq4Dnlh5MlbqUhAuL.y0qKI7Hd42oG1.POsYs0UkUKDHa7q0a', NULL, 'Active', '2018-04-19 13:04:02', '2018-04-19 13:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `require_reprocess_request`
--

CREATE TABLE IF NOT EXISTS `require_reprocess_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filed_process_id` int(11) NOT NULL,
  `correction_points` longtext NOT NULL,
  `executive_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_329` (`filed_process_id`),
  KEY `FK_339` (`executive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `require_unithead_approval`
--

CREATE TABLE IF NOT EXISTS `require_unithead_approval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filed_process_id` int(11) NOT NULL,
  `unithead_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_315` (`filed_process_id`),
  KEY `FK_319` (`unithead_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE IF NOT EXISTS `service_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(150) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `due_date_option` varchar(150) NOT NULL,
  `due_date_no` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_229` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TDS', 'Active', '2018-04-20 00:00:00', '2018-04-20 00:00:00'),
(2, 'GST', 'Active', '2018-04-20 00:00:00', '2018-04-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unit_executive`
--

CREATE TABLE IF NOT EXISTS `unit_executive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `executive_code` varchar(120) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` longtext NOT NULL,
  `unit_id` int(11) NOT NULL,
  `unit_head` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'First Client', 'client1@umbilical.com', '$2y$10$yKdcz4viiMpRfLUtTyADQOQzotsD0GgMnZNGiQZXSduanBJXU4mQu', 'UV5UruL8mtXSyVRSFaaZVMpqYW6qivDK8jO1BrZP3htsE4qj2FOY3O1hRUrU', '2018-04-17 10:36:20', '2018-04-17 10:36:20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challan_process_activitylog`
--
ALTER TABLE `challan_process_activitylog`
  ADD CONSTRAINT `FK_352` FOREIGN KEY (`challan_request_id`) REFERENCES `client_uploaded_challan` (`id`);

--
-- Constraints for table `client_assigned_rm`
--
ALTER TABLE `client_assigned_rm`
  ADD CONSTRAINT `FK_211` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `FK_218` FOREIGN KEY (`rm_id`) REFERENCES `relationship_managers` (`id`);

--
-- Constraints for table `client_assigned_unit`
--
ALTER TABLE `client_assigned_unit`
  ADD CONSTRAINT `FK_132` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `FK_136` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `client_assigned_unitexecutive`
--
ALTER TABLE `client_assigned_unitexecutive`
  ADD CONSTRAINT `FK_240` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `FK_244` FOREIGN KEY (`executive_id`) REFERENCES `unit_executive` (`id`);

--
-- Constraints for table `client_authorized_person`
--
ALTER TABLE `client_authorized_person`
  ADD CONSTRAINT `FK_147` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `client_occupied_servicetype`
--
ALTER TABLE `client_occupied_servicetype`
  ADD CONSTRAINT `FK_254` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `FK_258` FOREIGN KEY (`servicetype_id`) REFERENCES `service_type` (`id`);

--
-- Constraints for table `client_uploaded_challan`
--
ALTER TABLE `client_uploaded_challan`
  ADD CONSTRAINT `FK_277` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `FK_284` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `process_uploaded_challan`
--
ALTER TABLE `process_uploaded_challan`
  ADD CONSTRAINT `FK_293` FOREIGN KEY (`uploaded_challan_id`) REFERENCES `client_uploaded_challan` (`id`),
  ADD CONSTRAINT `FK_297` FOREIGN KEY (`servicetype_id`) REFERENCES `service_type` (`id`),
  ADD CONSTRAINT `FK_334` FOREIGN KEY (`executive_id`) REFERENCES `unit_executive` (`id`);

--
-- Constraints for table `require_reprocess_request`
--
ALTER TABLE `require_reprocess_request`
  ADD CONSTRAINT `FK_329` FOREIGN KEY (`filed_process_id`) REFERENCES `process_uploaded_challan` (`id`),
  ADD CONSTRAINT `FK_339` FOREIGN KEY (`executive_id`) REFERENCES `unit_executive` (`id`);

--
-- Constraints for table `require_unithead_approval`
--
ALTER TABLE `require_unithead_approval`
  ADD CONSTRAINT `FK_315` FOREIGN KEY (`filed_process_id`) REFERENCES `process_uploaded_challan` (`id`),
  ADD CONSTRAINT `FK_319` FOREIGN KEY (`unithead_id`) REFERENCES `product_unithead` (`id`);

--
-- Constraints for table `service_type`
--
ALTER TABLE `service_type`
  ADD CONSTRAINT `FK_229` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
