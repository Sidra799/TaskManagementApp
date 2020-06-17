-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 09:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `query` varchar(255) NOT NULL,
  `fromUid` int(11) NOT NULL,
  `ToUid` int(11) NOT NULL,
  `TaskId` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `query`, `fromUid`, `ToUid`, `TaskId`, `Date`) VALUES
(59, '@Sidra  Having Query??', 1, 1, 1, '2020-06-16 05:16:24'),
(60, '@Sidra  Another Query.....', 1, 1, 1, '2020-06-16 05:28:21'),
(61, '@Sidra Comfort reached gay perhaps chamber his six detract besides add. Moonlight newspaper up he it enjoyment agreeable depending', 1, 1, 1, '2020-06-16 05:30:29'),
(62, '@Sidra  Comfort reached gay perhaps chamber his six detract besides add. Moonlight newspaper up he it enjoyment agreeable depending', 1, 1, 1, '2020-06-16 05:31:29'),
(63, '@Sidra  Comfort reached gay perhaps chamber his six detract besides add. Moonlight newspaper up he it enjoyment agreeable depending', 1, 1, 1, '2020-06-16 05:34:25'),
(64, '@Sidra  Comfort reached gay perhaps chamber his six detract besides add. Moonlight newspaper up he it enjoyment agreeable depending', 1, 1, 1, '2020-06-16 05:37:04'),
(65, '@Sidra  Comfort reached gay perhaps chamber his six detract besides add. Moonlight newspaper up he it enjoyment agreeable depending', 1, 1, 1, '2020-06-16 05:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `createdBy` int(50) NOT NULL,
  `startDate` varchar(40) NOT NULL,
  `priority` varchar(40) NOT NULL,
  `description` varchar(80) NOT NULL,
  `assignedUserId` int(50) DEFAULT NULL,
  `durationHours` int(11) NOT NULL,
  `durationMinutes` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `imagePath` varchar(200) NOT NULL,
  `statusId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `title`, `createdBy`, `startDate`, `priority`, `description`, `assignedUserId`, `durationHours`, `durationMinutes`, `image`, `imagePath`, `statusId`) VALUES
(1, 'Learn', 1, '2020-05-22', 'high', 'qwerty', 15, 2, 0, 'download.jpg', 'images/download.jpg', 5),
(2, 'Coding', 1, '2019-04-29', 'low', 'qwerty', 34, 2, 0, 'download.jpg', 'images/download.jpg', 7),
(3, 'Reading', 23, '2019-06-29', 'medium', 'Do play they miss give so up. Words to up style of since world. We leaf to snug ', 33, 2, 0, 'download.jpg', 'images/download.jpg', 7),
(4, 'eating', 1, '2018-06-27', 'medium', 'Why painful the sixteen how minuter looking nor. Subject but why ten earnest hus', 34, 1, 0, 'download.jpg', 'images/download.jpg', 7),
(6, 'Php', 1, '2020-06-01', 'medium', 'Advantage old had otherwise sincerity dependent additions. It in adapted natural', 15, 1, 0, 'download.jpg', 'images/download.jpg', 7),
(8, 'Develop Login Page', 1, '2020-06-01', 'medium', 'Advantage old had otherwise sincerity dependent additions. It in adapted natural', 34, 1, 0, 'download.jpg', 'images/download.jpg', 7),
(18, 'Testing', 1, '2020-06-02', 'low', 'By impossible of in difficulty discovered celebrated ye. Justice joy manners boy', 34, 2, 20, 'download.jpg', 'images/download.jpg', 7),
(29, 'Display Modal', 1, '2020-06-12', 'high', 'Admiration we surrounded possession frequently he. Remarkably did increasing occ', 34, 2, 20, 'sample.png', 'images/sample.png', 7),
(31, 'Researching', 1, '2020-06-14', 'high', 'Quick six blind smart out burst. Perfectly on furniture dejection determine my d', 15, 2, 20, 'sample.png', 'images/sample.png', 7),
(32, 'designing', 1, '2020-06-08', 'high', 'Quick six blind smart out burst. Perfectly on furniture dejection determine my d', 15, 1, 15, 'sample.png', 'images/sample.png', 7),
(33, 'Testing and evaluating', 1, '2020-06-07', 'medium', 'Quick six blind smart out burst. Perfectly on furniture dejection determine my d', 15, 2, 20, 'sample.png', 'images/sample.png', 7),
(34, 'Writing and implementing efficient code', 1, '2020-06-01', 'high', 'Quick six blind smart out burst. Perfectly on furniture dejection determine my d', 15, 5, 23, 'sample.png', 'images/sample.png', 7),
(35, 'Coding', 1, '2020-06-15', '', 'qwerty', 71, 2, 20, 'sample.png', 'images/sample.png', 7);

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE `task_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `status`) VALUES
(3, 'In Progress'),
(5, 'Completed'),
(6, 'Pending'),
(7, 'Started');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Parent` int(50) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `token_id` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `activationcode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `id`, `Name`, `Gender`, `Parent`, `Designation`, `token_id`, `status`, `activationcode`) VALUES
('sidraashfaq458@gmail.com', 'Sidra123', 1, 'Sidra ', 'female', 0, 'lead', NULL, 1, NULL),
('sidra.ashfaq@patsysjournal.com', 'Sidra', 15, 'Sidra Ashfaq', 'female', 1, 'developer', NULL, 1, NULL),
('ali@gmail.com', 'Ali123', 21, 'Ali Ahmed', 'male', 0, 'lead', NULL, NULL, NULL),
('arsal@gmail.com', 'Arsal123', 23, 'Arsal', 'male', 0, 'lead', NULL, NULL, NULL),
('umer@gmail.com', 'umer', 33, 'umer', 'male', 23, 'developer', NULL, NULL, NULL),
('sara@gmail.com', 'sara', 34, 'Sara', 'female', 1, 'developer', NULL, NULL, NULL),
('aliya@gmail.com', '123', 37, 'Aliya', 'female', 0, 'lead', NULL, NULL, NULL),
('sidraashfaq458@gmail.com', '', 53, 'Sidra', 'female', 37, 'developer', '108913341381369760059', NULL, NULL),
('maira@gmail.com', '123', 60, 'Maira Khan', 'female', 21, 'developer', NULL, NULL, NULL),
('anas@gmail.com', '123', 71, 'Anas', 'male', 1, 'developer', NULL, NULL, NULL),
('sidra.ashfaq@patsysjournal.com', '', 108, 'Sidra', 'female', 0, 'lead', '109419532170948505806', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fromUid` (`fromUid`),
  ADD KEY `ToUid` (`ToUid`),
  ADD KEY `TaskId` (`TaskId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `FK_UserTask` (`assignedUserId`),
  ADD KEY `fk_name` (`statusId`);

--
-- Indexes for table `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_ibfk_1` FOREIGN KEY (`fromUid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `queries_ibfk_2` FOREIGN KEY (`ToUid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `queries_ibfk_3` FOREIGN KEY (`TaskId`) REFERENCES `tasks` (`task_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `FK_UserTask` FOREIGN KEY (`AssignedUserId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`statusId`) REFERENCES `task_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
