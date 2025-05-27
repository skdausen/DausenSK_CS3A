-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 01:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `synchrolight_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `hashtag` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `post_id`, `user_id`, `hashtag`, `created_at`) VALUES
(1, 2, 1, 'happy', '2025-05-25 12:16:21'),
(2, 2, 1, 'sad', '2025-05-25 12:16:21'),
(3, 4, 1, 'excited', '2025-05-25 12:17:57'),
(4, 4, 1, 'happy', '2025-05-25 12:17:57'),
(5, 4, 1, 'OT5', '2025-05-25 12:17:57'),
(6, 4, 1, 'SeeYouSoonTXT', '2025-05-25 12:17:57'),
(7, 4, 1, 'TXT', '2025-05-25 12:17:57'),
(8, 5, 2, 'happy', '2025-05-25 12:37:07'),
(9, 6, 2, 'vamfire', '2025-05-25 18:53:13'),
(10, 6, 2, 'vella', '2025-05-25 18:53:13'),
(11, 7, 2, 'happy', '2025-05-25 19:15:45'),
(12, 7, 2, 'excited', '2025-05-25 19:15:45'),
(13, 7, 2, 'kpop', '2025-05-25 19:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `content`, `time`, `img_path`) VALUES
(1, 1, 'hi! i am jiro. ', '2025-05-24 22:15:56', ''),
(2, 1, 'I am #happy but #sad at the same time', '2025-05-24 22:16:21', ''),
(3, 1, 'I\'m just so excited to see them again.  Seriously, it\'s been far too long, and I\'ve been thinking about it constantly.  Like, I\'m literally counting down the seconds.  When I picture it, my heart does a little happy dance.  Honestly, just thinking about hanging together with them again makes me grin like an idiot. I wanna see ‘em soonnnn ToT', '2025-05-24 22:16:52', 'assets/uploads/1748146612_BTS.jpg'),
(4, 1, 'YES! It\'s official! TXT\'s comeback is happening in April! Seriously, I\'m losing it right now. I\'m so hyped! Like, I knew it was coming, but seeing it confirmed? ACKKKKK! My brain is just exploding with excitement. I can\'t wait to hear the new songs, see the visuals, everything! I am waiting for you APRIL! hoho #excited #happy #OT5 #SeeYouSoonTXT #TXT', '2025-05-24 22:17:57', 'assets/uploads/1748146677_TXT.jpg'),
(5, 2, 'YEHEYYYYY!!! #happy', '2025-05-24 22:37:07', 'assets/uploads/1748147827_૮꒰◞ ˕ ◟ ྀི꒱ა.jpg'),
(6, 2, 'what hafen vella?! why u crying agen? vamfire right? vamfire will feyt to me #vamfire #vella', '2025-05-25 04:53:13', 'assets/uploads/1748170393_vella.jpg'),
(7, 2, 'Hello! I\'m Soobin Choi! I hope I\'ll have many friends here. Yipeee #happy #excited #kpop', '2025-05-25 05:15:45', 'assets/uploads/1748171745_dd3ab7cf-c9d2-4a74-90d0-f83a49162361.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `unique_id` int(200) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `username`, `email`, `password`, `status`) VALUES
(1, 1408891916, 'Jose', 'Gironella', 'jiro_iii', 'gironellajose09@gmail.com', 'jiro1234', 'Active now'),
(2, 194684979, 'Soobin', 'Choi', 'soobin_choi', 'junior.gironella@gmail.com', 'soobin123', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD CONSTRAINT `hashtags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hashtags_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
