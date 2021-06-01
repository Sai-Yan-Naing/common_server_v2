-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2021 at 04:11 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japan_system_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_email`
--

CREATE TABLE `add_email` (
  `id` int NOT NULL,
  `domain` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `add_email`
--

INSERT INTO `add_email` (`id`, `domain`, `email`, `password`) VALUES
(6, 'mgmg_sai.test', 'aung', 'welcome123'),
(7, 'mgmg_sai.test', 'saisai', 'welcome123');

-- --------------------------------------------------------

--
-- Table structure for table `backup_data`
--

CREATE TABLE `backup_data` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL,
  `scheduler` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `backup_data`
--

INSERT INTO `backup_data` (`id`, `domain`, `name`, `scheduler`) VALUES
(1, 'mgmg_sai.test', 'mgmg_sai.test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `current_pass`
--

CREATE TABLE `current_pass` (
  `web_id` int NOT NULL DEFAULT '0',
  `password` varchar(1024) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `password`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'D000123', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'saiyannaing259768648@gmail.com', '123456', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `db_account`
--

CREATE TABLE `db_account` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT '',
  `db_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `db_user` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `db_count` int NOT NULL DEFAULT '0',
  `db_pass` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_account`
--

INSERT INTO `db_account` (`id`, `domain`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES
(1, 'mgmg_sai.test', 'nilarlwin', 'nilarlwin', 1, 'welcome123'),
(2, 'mgmg_sai.test', 'nilarlwin1', 'nilarlwin1', 1, 'welcome123'),
(4, 'mgmg_sai.test', 'saiyannaing', 'saiyannaing', 1, 'welcome123'),
(5, 'mgmg_sai.test', 'ckm_test', 'mssqltest', 1, 'dfdfdfdf'),
(6, 'mgmg_sai.test', 'kokokoko', 'kokokoko', 1, 'welcome123');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_for_mariadb`
--

CREATE TABLE `db_account_for_mariadb` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `db_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `db_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `db_count` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
  `db_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `db_account_for_mariadb`
--

INSERT INTO `db_account_for_mariadb` (`id`, `domain`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES
(1, 'mgmg_sai.test', 'saiyannaing', 'saiyannaing', '1', 'saiyannaing'),
(2, 'mgmg_sai.test', 'yannaing', 'yannaing', '1', 'welcome123'),
(3, 'mgmg_sai.test', 'ckm_test', 'mssqltest', '1', 'dffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_for_mssql`
--

CREATE TABLE `db_account_for_mssql` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT NULL,
  `host_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
  `host_ip` varchar(15) NOT NULL,
  `db_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
  `db_user` varchar(255) NOT NULL,
  `db_count` int NOT NULL DEFAULT '0',
  `db_pass` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_account_for_mssql`
--

INSERT INTO `db_account_for_mssql` (`id`, `domain`, `host_name`, `host_ip`, `db_name`, `db_user`, `db_count`, `db_pass`) VALUES
(1, 'mgmg_sai.test', 'mssql5.winserver.ne.jp', '203.137.92.252', 'saiyannaing', 'saiyannaing', 1, 'welcome12334dfdfdf');

-- --------------------------------------------------------

--
-- Table structure for table `db_ftp`
--

CREATE TABLE `db_ftp` (
  `id` int NOT NULL,
  `ftp_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ftp_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `customer_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_ftp`
--

INSERT INTO `db_ftp` (`id`, `ftp_user`, `ftp_pass`, `customer_id`, `domain`, `permission`) VALUES
(1, 'mgmg_sai.test', 'welcome123', NULL, 'mgmg_sai.test', 'R'),
(2, 'rrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrr', NULL, 'setmawhtay.com', 'F,R,W'),
(3, 'saisaisai', 'welcome123', NULL, 'saisaisai.test', 'F,R,W'),
(4, 'eeeeeeeeeee', 'eeeeeeee', NULL, 'hello1.com', 'F,R,W'),
(5, 'mgmg_sai2', 'welcome', NULL, 'mgmg_sai2.test', 'F,R,W'),
(6, '', '', NULL, '', 'F,R,W'),
(7, '', '', NULL, '', 'F,R,W'),
(9, 'kokoko', 'welcome1234', NULL, 'mgmg_sai.test', 'F,R,W'),
(10, 'moemoe', 'welcome', NULL, 'mgmg_sai2.test', 'F,R,W');

-- --------------------------------------------------------

--
-- Table structure for table `error_pages`
--

CREATE TABLE `error_pages` (
  `id` int NOT NULL,
  `domain` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `statuscode` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='error pages';

-- --------------------------------------------------------

--
-- Table structure for table `web_account`
--

CREATE TABLE `web_account` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `password` varchar(1024) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `user` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `mysql_cnt` int NOT NULL DEFAULT '0',
  `mssql_cnt` int NOT NULL DEFAULT '0',
  `plan` int NOT NULL DEFAULT '0',
  `pass_change_require` int NOT NULL DEFAULT '0',
  `wordpress_require` int NOT NULL DEFAULT '0',
  `eccube_require` int NOT NULL DEFAULT '0',
  `stopped` int NOT NULL DEFAULT '0',
  `appstopped` int DEFAULT NULL,
  `ec_dir` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT '',
  `word_dir` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `word_db` varchar(255) NOT NULL DEFAULT '',
  `web_dir` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `error_pages` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_account`
--

INSERT INTO `web_account` (`id`, `domain`, `password`, `user`, `mysql_cnt`, `mssql_cnt`, `plan`, `pass_change_require`, `wordpress_require`, `eccube_require`, `stopped`, `appstopped`, `ec_dir`, `word_dir`, `word_db`, `web_dir`, `customer_id`, `status`, `token`, `error_pages`) VALUES
(1, 'mgmg_sai.test', '8a3e82ec68bf0ea3cdb04605b293fe33c9fd593104eecf9997cbc2204b39f52d', 'mgmg_sai.test', 0, 0, 4, 0, 0, 0, 1, 1, '', '', '', NULL, 'D000123', NULL, NULL, '[{\"url\": \"errors/405.html\", \"stopped\": 1, \"statuscode\": \"405\"}, {\"url\": \"errors/404.html\", \"stopped\": 1, \"statuscode\": \"406\"}]'),
(2, 'setmawhtay.com', '73e089483a9ea054b81bfec8356a179cfe862e696cfa49a8750f316eb24e940a', 'rrrrrrrrrrrrr', 0, 0, 4, 0, 0, 0, 0, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL),
(3, 'saisaisai.test', '8a3e82ec68bf0ea3cdb04605b293fe33c9fd593104eecf9997cbc2204b39f52d', 'saisaisai', 0, 0, 4, 0, 0, 0, 0, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL),
(4, 'hello1.com', 'bcf5166ae6f7dce27dc83a26bc2d5dac430ab07a625ac6090200c8671f94412f', 'eeeeeeeeeee', 0, 0, 4, 0, 0, 0, 0, NULL, '', '', '', NULL, 'D000123', NULL, NULL, NULL),
(5, 'mgmg_sai2.test', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'mgmg_sai2', 0, 0, 4, 0, 0, 0, 0, 0, '', '', '', NULL, 'D000123', NULL, NULL, '[{\"url\": \"errors/404.html\", \"stopped\": 1, \"statuscode\": \"404\"}, {\"url\": \"errors/404.html\", \"stopped\": 0, \"statuscode\": \"405\"}, {\"url\": \"errors/404.html\", \"stopped\": 1, \"statuscode\": \"406\"}, {\"url\": \"errors/4044.html\", \"stopped\": 1, \"statuscode\": \"4088\"}, {\"url\": \"errors/404.html\", \"stopped\": 1, \"statuscode\": \"444\"}, {\"url\": \"errors/404.html\", \"stopped\": 1, \"statuscode\": \"409\"}, {\"url\": \"errors/404.html\", \"stopped\": 0, \"statuscode\": \"404\"}, {\"url\": \"errors/404.html\", \"stopped\": 1, \"statuscode\": \"404\"}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_email`
--
ALTER TABLE `add_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_data`
--
ALTER TABLE `backup_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_pass`
--
ALTER TABLE `current_pass`
  ADD PRIMARY KEY (`web_id`),
  ADD UNIQUE KEY `web_id` (`web_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account`
--
ALTER TABLE `db_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_for_mariadb`
--
ALTER TABLE `db_account_for_mariadb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_for_mssql`
--
ALTER TABLE `db_account_for_mssql`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_ftp`
--
ALTER TABLE `db_ftp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_pages`
--
ALTER TABLE `error_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_account`
--
ALTER TABLE `web_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_email`
--
ALTER TABLE `add_email`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `backup_data`
--
ALTER TABLE `backup_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_account`
--
ALTER TABLE `db_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_account_for_mariadb`
--
ALTER TABLE `db_account_for_mariadb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_account_for_mssql`
--
ALTER TABLE `db_account_for_mssql`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_ftp`
--
ALTER TABLE `db_ftp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `error_pages`
--
ALTER TABLE `error_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_account`
--
ALTER TABLE `web_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
