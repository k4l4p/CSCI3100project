-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 10.1.30-MariaDB
-- PHP 版本： 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sakura2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `matching`
--

CREATE TABLE `matching` (
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `matchSuccess` varchar(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `matching`
--

INSERT INTO `matching` (`senderID`, `receiverID`, `matchSuccess`, `time`) VALUES
(1, 2, 'N', '2021-04-15 04:07:27'),
(1, 3, 'N', '2021-04-15 06:24:21'),
(1, 5, 'N', '2021-04-15 04:07:27'),
(1, 6, 'N', '2021-04-15 04:07:48'),
(1, 8, 'N', '2021-04-15 06:39:28'),
(3, 5, 'N', '2021-04-15 04:07:27'),
(4, 1, 'N', '2021-04-15 04:38:17'),
(5, 4, 'N', '2021-04-15 04:07:27'),
(10, 1, 'Y', '2021-04-15 05:45:33');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `password` varchar(20) NOT NULL,
  `isfirstLogin` varchar(1) NOT NULL DEFAULT 'Y',
  `icon` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userID`, `username`, `email`, `gender`, `password`, `isfirstLogin`, `icon`, `description`) VALUES
(1, 'sakura', 'sakura@gmail.com', 'F', '123', 'N', '../asset/girl1.jpg', 'I am Sakura, nice to meet you! <3'),
(2, 'tommy', 'tommy@gmail.com', 'M', '111', 'N', '../asset/boy1.jpg', 'I am tommy, Cheers!'),
(3, 'bobo', 'bobo@gmail.com', 'F', '222', 'N', '../asset/girl2.jpg', 'Booboo Bobo!'),
(4, 'jason99', 'jj@gmail.com', 'M', '333', 'N', '../asset/boy2.jpg', 'La Vie en Rose'),
(5, 'cherry', 'cherry@hotmail.com', 'F', 'desh@77', 'N', '../asset/girl4.jpg', 'Do you love Cherry blossom?'),
(6, 'yoyochan', 'yoyochan@hotmail.com', 'F', 'yc233', 'N', '../asset/girl5.jpg', 'Yo!'),
(7, 'richardk', 'rk@gmail.com', 'M', 'rk&3', 'N', '../asset/boy4.jpg', 'Our love was meant to be...'),
(8, 'ryanck8', 'ryan@yahoo.com', 'M', 'ryan666', 'N', '../asset/boy5.jpg', 'Live your life!'),
(9, 'kevin421', 'kevin@yahoo.com', 'M', '421', 'N', '../asset/boy6.jpg', 'I am Kevin, i love listen to any kind of music...'),
(10, 'irenekk', 'ikk@gmail.com', 'F', 'ikk222', 'N', '../asset/girl6.jpg', 'Nice to meet you! I love dancing and singing <3 <3');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `matching`
--
ALTER TABLE `matching`
  ADD PRIMARY KEY (`senderID`,`receiverID`),
  ADD KEY `receiverID` (`receiverID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `matching`
--
ALTER TABLE `matching`
  ADD CONSTRAINT `matching_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `matching_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
