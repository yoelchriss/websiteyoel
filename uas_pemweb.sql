-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 04:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `photo`, `Name`, `role`) VALUES
(6, '665888de67f36_babyariess (2).JPG', 'babyariess', 'bph'),
(7, '665888eca0c02_bambi (31).JPG', 'bambi', 'bph'),
(8, '665888fa35c0a_jessie (32).JPG', 'jessie', 'bph'),
(9, '665889080bbdd_fromlysna1l (13).JPG', 'fromlysna1l', 'ketua');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `name`, `email`, `amount`) VALUES
(1, 'suhendra', 'da@studeent.ca', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `headline`, `news_content`, `image`) VALUES
(6, '[💥Farewell Gen IV Fortius!!💥]', '\r\nTerima kasih kepada pengurus UKM Fortius Esports Gen IV atas dedikasi dan kerja keras mereka selama setahun terakhir untuk Fortius Esports!! 🤩\r\n\r\nSeluruh member Fortius akan selalu menjadi bagian dari keluarga Fortius! 💪🎮 See You On Top💥\r\n\r\n#FortiusEsports #FightDominateWin', 'image_2024-05-30_211351733.png'),
(7, '[🏆FIRST PLACE CHAMPION : UI BATTLEGROUNDS 2023 🏆]', '\r\n\r\nWe made it! Congratulations for team Valorant Fortius Chonkycats yang berhasil memenangkan valorant UI BATTLEGROUNDS 2023!!🏆🎮\r\n\r\nTheir skill and teamwork proved unbeatable in the ultimate showdown. Thank you to everyone who supported us throughout the tournament and we shall see you on next tournament!!🔥\r\n\r\nFortius.\r\nFight Dominate Win\r\n\r\n#FightDominateWin', 'image_2024-05-30_211419646.png'),
(8, ' Fortius ChonkyCats USW Qualifier Goes to Red Bull Campus Clutch!', 'Selamat kepada Tim @fortiusesports Fortius ChonkyCats yang berhasil memenangkan USW Qualifier Goes to Red Bull Campus Clutch! Nantinya 8 tim akan bertanding untuk memperebutkan 1 slot menuju Red Bull Campus Clutch World Final di Istanbul, Turkiye.\r\n\r\n#RedbullCampusClutch\r\n#blueandsilver\r\n#givesyouwiiings\r\n#UniPin\r\n#UniPinStudentWarchief\r\n#EsportsFutureLeader', 'image_2024-05-30_211532858.png');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo`, `title`, `description`) VALUES
(84, '66517c5309a07_fortius_esports_logo.jpg', 'Wow Logo?', 'Thats Crazy'),
(87, '66588aa37e7c5_image_2024-05-30_211802300.png', 'Welcome GEN V FORTIUS!', 'Halo halo sobat gamers!\r\nSelamat untuk seluruh anggota staff yang akan menjadi pengurus Fortius Esport selama masa jabatan kedepan!! Kita semua berharap Gen V penuh dengan pencapaian dan kemenangan pastinya. 🤩\r\n\r\nSlide sampai abis buat liat semua staff Fortius Esport Gen V! Salam kenal yaa 💥');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `suggestion` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `name`, `email`, `suggestion`, `created_at`) VALUES
(1, 'suhendra', 'da@studeent.ca', 'Keren!', '2024-05-30 13:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
