-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 01:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minecraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `topup_amount` varchar(11) DEFAULT '0',
  `transaction` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `uid`, `username`, `action`, `date`, `topup_amount`, `transaction`) VALUES
(1, '1', 'BOATAREA54', 'Buy Item #40', '2022-11-15 21:46', '0', '40'),
(2, '1', 'Peak4567', 'Buy Item #1', '2023-08-13 17:53', '0', '1'),
(3, '1', 'Peak4567', 'Buy Item #1', '2023-08-13 17:53', '0', '1'),
(4, '1', 'Peak4567', 'Buy Item #1', '2023-08-13 17:54', '0', '1'),
(5, '1', 'Peak4567', 'Buy Item #1', '2023-08-13 17:55', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(11) NOT NULL,
  `html` text NOT NULL,
  `date_create` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`id`, `html`, `date_create`) VALUES
(1, 'รออัพเดท', '01/01/2023 12:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `authme`
--

CREATE TABLE `authme` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(40) NOT NULL DEFAULT '127.0.0.1',
  `lastlogin` bigint(20) DEFAULT 0,
  `x` double NOT NULL DEFAULT 0,
  `y` double NOT NULL DEFAULT 0,
  `z` double NOT NULL DEFAULT 0,
  `world` varchar(255) DEFAULT 'world',
  `email` varchar(255) DEFAULT 'your@email.com',
  `isLogged` smallint(6) NOT NULL DEFAULT 0,
  `hasSession` smallint(6) NOT NULL DEFAULT 0,
  `points` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `status` enum('member','admin') NOT NULL DEFAULT 'member',
  `rp` varchar(255) NOT NULL DEFAULT '0',
  `topup` double(62,2) NOT NULL DEFAULT 0.00,
  `regdate` bigint(20) NOT NULL DEFAULT 0,
  `regip` varchar(40) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `yaw` float DEFAULT NULL,
  `pitch` float DEFAULT NULL,
  `topup_m` double(64,2) NOT NULL DEFAULT 0.00,
  `loot_key` int(11) NOT NULL DEFAULT 0,
  `totp` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `authme`
--

INSERT INTO `authme` (`id`, `username`, `realname`, `password`, `ip`, `lastlogin`, `x`, `y`, `z`, `world`, `email`, `isLogged`, `hasSession`, `points`, `status`, `rp`, `topup`, `regdate`, `regip`, `yaw`, `pitch`, `topup_m`, `loot_key`, `totp`) VALUES
(1, 'Peak4567', 'Peak4567', '$SHA$Cue0J0PYNPCC9AYp$9d3e3d5479917168c6d3a09e2057fc820eebcfa5a8d658a3cd0c09b055b14775', '182.232.230.204', 0, 0, 0, 0, 'world', 'pmcpeak2022@gmail.com', 0, 0, '60', 'member', '0', 0.00, 0, NULL, NULL, NULL, 0.00, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bungeecord`
--

CREATE TABLE `bungeecord` (
  `id` int(11) NOT NULL,
  `name_server` varchar(255) NOT NULL,
  `ip_server` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bungeecord`
--

INSERT INTO `bungeecord` (`id`, `name_server`, `ip_server`, `port`, `password`) VALUES
(4, 'Lobby', '154.208.140.59', '19822', 'Lobby_Villa@RconbPXz8YWyr6xC7Mwe');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Rank'),
(2, 'item');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `mc_download` varchar(255) NOT NULL,
  `ja64_download` varchar(255) NOT NULL,
  `ja32_download` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `id` int(11) NOT NULL,
  `uid_send` int(11) NOT NULL,
  `uid_receive` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `server_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`id`, `uid_send`, `uid_receive`, `date`, `img`, `command`, `name`, `server_id`) VALUES
(1, 1, 1, '2022-12-01 22:50', 'https://cdn.freebiesupply.com/logos/large/2x/minecraft-1-logo-png-transparent.png', '/give @p 2', 'บล็อกหญ้าโง่ๆ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loot`
--

CREATE TABLE `loot` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `desc_` text NOT NULL,
  `cmd` text NOT NULL,
  `img` text NOT NULL,
  `rate` int(100) NOT NULL,
  `tier` text NOT NULL,
  `sv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loot`
--

INSERT INTO `loot` (`id`, `name`, `desc_`, `cmd`, `img`, `rate`, `tier`, `sv_id`) VALUES
(1, 'ทดสอบ', 'test <br/> Test', 'say <player> From Loot 1', '/img/50.png', 70, 'Common', 1);

-- --------------------------------------------------------

--
-- Table structure for table `playerpoints_migrations`
--

CREATE TABLE `playerpoints_migrations` (
  `migration_version` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `playerpoints_migrations`
--

INSERT INTO `playerpoints_migrations` (`migration_version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `playerpoints_points`
--

CREATE TABLE `playerpoints_points` (
  `id` int(11) NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `playerpoints_points`
--

INSERT INTO `playerpoints_points` (`id`, `uuid`, `points`) VALUES
(1, 'a9277894-f5f2-3cf9-8509-4de2c8192f09', 100);

-- --------------------------------------------------------

--
-- Table structure for table `playerpoints_username_cache`
--

CREATE TABLE `playerpoints_username_cache` (
  `uuid` varchar(36) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `playerpoints_username_cache`
--

INSERT INTO `playerpoints_username_cache` (`uuid`, `username`) VALUES
('a9277894-f5f2-3cf9-8509-4de2c8192f09', 'BOATAREA54');

-- --------------------------------------------------------

--
-- Table structure for table `redeem`
--

CREATE TABLE `redeem` (
  `id` int(11) NOT NULL,
  `code` varchar(256) NOT NULL DEFAULT '@amc',
  `cmd` varchar(256) NOT NULL DEFAULT '9999',
  `status` varchar(256) NOT NULL DEFAULT '0',
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `redeem`
--

INSERT INTO `redeem` (`id`, `code`, `cmd`, `status`, `date`) VALUES
(1, 'VillaWebsite', '5', '1', '2023-08-13 16:30');

-- --------------------------------------------------------

--
-- Table structure for table `rp`
--

CREATE TABLE `rp` (
  `id` int(11) NOT NULL,
  `rp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rp`
--

INSERT INTO `rp` (`id`, `rp`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rp_shop`
--

CREATE TABLE `rp_shop` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `category` int(11) NOT NULL,
  `command` varchar(100) NOT NULL,
  `pic` varchar(1500) NOT NULL,
  `server_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rp_shop`
--

INSERT INTO `rp_shop` (`id`, `name`, `price`, `category`, `command`, `pic`, `server_id`) VALUES
(1, 'TEST', '1000', 0, 'say test', 'http://localhost/SYSTEM-MineScript/BackupV2/images/panda.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `backend_password` varchar(255) NOT NULL,
  `name_server` varchar(255) NOT NULL,
  `www` varchar(255) NOT NULL,
  `youtube_watch` varchar(255) NOT NULL,
  `discord_id` varchar(255) NOT NULL,
  `announce` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `ip_server` varchar(255) NOT NULL,
  `port_server` varchar(255) NOT NULL,
  `version_server` varchar(255) NOT NULL,
  `page_facebook` varchar(255) NOT NULL,
  `detail_server` varchar(255) NOT NULL,
  `max_reg` varchar(255) NOT NULL,
  `query_port` varchar(255) NOT NULL,
  `slash` enum('slash','slash_off') NOT NULL,
  `bg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `backend_password`, `name_server`, `www`, `youtube_watch`, `discord_id`, `announce`, `icon`, `ip_server`, `port_server`, `version_server`, `page_facebook`, `detail_server`, `max_reg`, `query_port`, `slash`, `bg`) VALUES
(1, 'VillaCraft2023', 'VillaCraft Store', 'http://localhost', 'erfZkR14beA', 'dWHQAh2A', 'ยินดีต้อนรับ', './img/villacraftlogo3.png', 'mc-villacraft.net', '25565', '1.18.2 - ล่าสุด', 'https://www.facebook.com/VillaCraftTH', 'เซิฟเวอร์แนวเอาชีวิตรอดผสม mmoนิดหน่อย ของไม่เฟ้อ มีกิจกรรมทุกวันอาทิตย์', '3', '25565', '', './img/villabg.png');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `category` int(11) NOT NULL,
  `info` text NOT NULL,
  `command` varchar(100) NOT NULL,
  `pic` varchar(1500) NOT NULL,
  `server_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`, `category`, `info`, `command`, `pic`, `server_id`) VALUES
(1, 'GrassBlock', '10', 7, 'Test ร้านค้า', 'give <player> minecraft:grass', './img/', 4);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `truemoney`
--

CREATE TABLE `truemoney` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `truemoney`
--

INSERT INTO `truemoney` (`id`, `amount`, `points`) VALUES
(1, 50, 50),
(2, 90, 90),
(3, 150, 150),
(4, 300, 300),
(5, 500, 500),
(6, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `truewallet_token`
--

CREATE TABLE `truewallet_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `truewallet_token`
--

INSERT INTO `truewallet_token` (`id`, `email`, `token`) VALUES
(5, 'bigonecraft@gmail.com', 'f6eb3dd1-51c9-4457-a5cc-fbb02fa900e2');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_account`
--

CREATE TABLE `wallet_account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mutiple` int(11) NOT NULL DEFAULT 1,
  `message` varchar(255) NOT NULL DEFAULT '0',
  `reference_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallet_account`
--

INSERT INTO `wallet_account` (`id`, `email`, `password`, `phone`, `name`, `mutiple`, `message`, `reference_token`) VALUES
(1, 'test', '', '0860346795', 'ศรัณยกร เทพสุนทร', 1, '0', 'f0b9aba985b8bfc9a27c8b7dd8c4da5d');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_password`
--

CREATE TABLE `wallet_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reference_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wallet_password`
--

INSERT INTO `wallet_password` (`id`, `email`, `password`, `reference_token`) VALUES
(2, 'test', 'test', 'f0b9aba985b8bfc9a27c8b7dd8c4da5d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authme`
--
ALTER TABLE `authme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bungeecord`
--
ALTER TABLE `bungeecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loot`
--
ALTER TABLE `loot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playerpoints_points`
--
ALTER TABLE `playerpoints_points`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `playerpoints_username_cache`
--
ALTER TABLE `playerpoints_username_cache`
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `playerpoints_username_cache_uuid_index` (`uuid`),
  ADD KEY `playerpoints_username_cache_username_index` (`username`);

--
-- Indexes for table `redeem`
--
ALTER TABLE `redeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rp`
--
ALTER TABLE `rp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rp_shop`
--
ALTER TABLE `rp_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truemoney`
--
ALTER TABLE `truemoney`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truewallet_token`
--
ALTER TABLE `truewallet_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_account`
--
ALTER TABLE `wallet_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_password`
--
ALTER TABLE `wallet_password`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authme`
--
ALTER TABLE `authme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bungeecord`
--
ALTER TABLE `bungeecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loot`
--
ALTER TABLE `loot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playerpoints_points`
--
ALTER TABLE `playerpoints_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redeem`
--
ALTER TABLE `redeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rp`
--
ALTER TABLE `rp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rp_shop`
--
ALTER TABLE `rp_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truemoney`
--
ALTER TABLE `truemoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `truewallet_token`
--
ALTER TABLE `truewallet_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallet_account`
--
ALTER TABLE `wallet_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet_password`
--
ALTER TABLE `wallet_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
