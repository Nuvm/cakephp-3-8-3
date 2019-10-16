-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2019 at 03:10 AM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_loans`
--

-- --------------------------------------------------------

--
-- Table structure for table `collectors`
--

CREATE TABLE `collectors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collectors`
--

INSERT INTO `collectors` (`id`, `name`) VALUES
(1, 'jean delaroses'),
(2, 'bob delabrosse');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(2, 'FeelsWowMan.jpg', 'uploaded/', '2019-10-11 16:07:56', '2019-10-11 16:07:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `interest` double NOT NULL,
  `amount` double NOT NULL,
  `amount_due` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `interest`, `amount`, `amount_due`, `user_id`, `created`, `modified`) VALUES
(2, 1.05, 105.67, 107.7, 3, '2019-01-01 00:00:00', '2019-10-04 17:13:13'),
(3, 1.001, 100.54, 108.77, 1, '2019-09-09 04:00:00', '2019-09-09 04:00:00'),
(4, 1.03, 506.78, 567.89, 2, '2019-09-09 11:00:00', '2019-09-09 14:00:00'),
(6, 333, 333, 1126, 1, '2019-10-04 14:57:22', '2019-10-04 15:13:50'),
(7, 333, 333, 112, 1, '2019-10-04 15:01:08', '2019-10-04 17:10:25'),
(8, 3333444444444, 44545555, 13, 5, '2019-10-04 15:28:34', '2019-10-04 15:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `loans_collectors`
--

CREATE TABLE `loans_collectors` (
  `loan_id` int(11) NOT NULL,
  `collector_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loans_collectors`
--

INSERT INTO `loans_collectors` (`loan_id`, `collector_id`) VALUES
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(4, 2),
(6, 1),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT 'NULL',
  `created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `loan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `notes`, `created`, `user_id`, `payment_method_id`, `loan_id`) VALUES
(12, 'test', '2019-04-12 00:00:00', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `file_id`) VALUES
(1, 'MasterCarte Arabia Plus', 'Carte de credit fraudee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `permission_level` int(1) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permission_level`, `created`) VALUES
(1, 'bobmccain@louisbouchard.porn', '$2y$10$5AwK/53ULGOhW9QwamXWM.vL.Eix5ShmfOf3bQWd4/o3bVmhxJbdm', 1, '0000-00-00 00:00:00'),
(2, 'nuvmyt@gmail.com', '$2y$10$3.PnCY01EotdE203vK/wt.fF0w/n4YlAGIKhgt3rfsQ.NVOZ22NjW', 2, '2019-09-09 05:32:20'),
(3, 'a@a.com', '$2y$10$dWk0S87qT57oHQmhJtj1JecF2GSYNx3bpNb3ijQahaaD2FgPDNrea', 0, '2019-09-30 15:18:53'),
(4, 'admin@admin.admin', '$2y$10$rdTyvloTjE6h86LUOeR0HOOvKptxJy9Pj85G3.8e2HnitB8ANsp4O', 2, '2019-09-30 15:23:05'),
(5, 'employee@employee.employee', '$2y$10$CtZnvTA0Y85cNDJHRdRj5ODjXXUbdw0EH8hDDe4l3o0PaBFoX0706', 1, '2019-09-30 15:27:42'),
(6, 'prof@prof.prof', '$2y$10$qwvRBts8AjpOYyoCShqT9u3Kp2n347DAwxdXHs2hnu9P8Ph0fps6i', 0, '2019-10-11 16:57:36'),
(7, 'eleve@eleve.eleve', '$2y$10$xF0d0E0VmcDNpRf2PNWhEeISWVk1j9rX5QIfUjVPxywLykaJSoqli', 0, '2019-10-16 01:20:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collectors`
--
ALTER TABLE `collectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`user_id`);

--
-- Indexes for table `loans_collectors`
--
ALTER TABLE `loans_collectors`
  ADD PRIMARY KEY (`loan_id`,`collector_id`),
  ADD KEY `loans_collectors_fk_2` (`collector_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paiement_ibfk_1` (`payment_method_id`),
  ADD KEY `payments_ibfk_2` (`loan_id`),
  ADD KEY `payments_ibfk_3` (`user_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_id` (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collectors`
--
ALTER TABLE `collectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans_collectors`
--
ALTER TABLE `loans_collectors`
  ADD CONSTRAINT `loans_collectors_fk_1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_collectors_fk_2` FOREIGN KEY (`collector_id`) REFERENCES `collectors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
