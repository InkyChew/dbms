-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.8-MariaDB
-- PHP 版本： 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `b10623019hw1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `deliverystaff`
--

CREATE TABLE `deliverystaff` (
  `deliveryStaffID` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `deliverystaff`
--

INSERT INTO `deliverystaff` (`deliveryStaffID`, `name`, `tel`) VALUES
(1, 'staff1', '0912345678'),
(2, 'staff2', '0987654321'),
(3, 'staff3', '0999888777'),
(4, 'staff4', '0966555444');

-- --------------------------------------------------------

--
-- 資料表結構 `food`
--

CREATE TABLE `food` (
  `foodID` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `imageURL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `food`
--

INSERT INTO `food` (`foodID`, `name`, `restaurantID`, `price`, `imageURL`, `description`) VALUES
(1, 'drink1', 1, 20, 'drink1.jpg', 'nice drink!'),
(1, 'Ice1', 2, 35, 'ice1.jpg', 'nice ice!'),
(1, 'rice1', 3, 60, 'rice1.jpg', 'nice rice!'),
(1, 'noodle1', 4, 60, 'noodle1.jpg', 'nice noodle!'),
(2, 'drink3', 1, 30, 'drink2.jpg', 'nice drink!'),
(2, 'ice2', 2, 35, 'Ice2.jpg', 'nice ice!'),
(2, 'rice2', 3, 65, 'rice2.jpg', 'nice rice!'),
(2, 'noodle2', 4, 65, 'noodle2.jpg', 'nice noodle!'),
(3, 'rice3', 3, 70, 'rice3.jpg', 'nice rice!'),
(3, 'noodle3', 4, 70, ' noodle3.jpg', 'nice noodle!');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `memberID` int(11) NOT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`memberID`, `account`, `password`, `name`, `gender`, `birthday`, `email`) VALUES
(2, 'yuntech02', 'pwd02', 'member02', 0, '1999-10-30', 'yuntech02@gmail.com'),
(3, 'yuntech03', 'pwd03', 'member03', 1, '1998-01-07', 'yuntech03@gmail.com'),
(4, 'yuntech04', 'pwd04', 'member04', 0, '1998-05-18', 'yuntech04@gmail.com'),
(5, 'yuntech05', 'pwd05', 'member05', 1, '1997-08-22', 'yuntech05@gmail.com'),
(6, 'yuntech06', 'pwd06', 'member06', 0, '1997-04-20', 'yuntech06@gmail.com'),
(7, 'yuntech07', 'pwd07', 'member07', 1, '1998-07-03', 'yuntech07@gmail.com'),
(8, 'yuntech08', 'pwd08', 'member08', 0, '1999-01-01', 'yuntech08@gmail.com'),
(9, 'yuntech09', 'pwd09', 'member09', 1, '1997-12-31', 'yuntech09@gmail.com'),
(10, 'yuntech10', 'pwd10', 'member10', 0, '1997-05-19', 'yuntech10@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderID` int(11) NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `foodID` int(11) NOT NULL,
  `foodCount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `orderdetail`
--

INSERT INTO `orderdetail` (`orderID`, `restaurantID`, `foodID`, `foodCount`) VALUES
(2, 1, 2, 3),
(2, 2, 2, 3),
(2, 4, 1, 6),
(3, 3, 2, 6),
(3, 3, 3, 17),
(3, 4, 2, 6),
(4, 2, 1, 3),
(4, 3, 1, 6),
(4, 4, 3, 2),
(5, 4, 3, 7),
(6, 4, 1, 6),
(7, 1, 2, 3),
(8, 2, 2, 13),
(9, 3, 2, 6),
(10, 2, 2, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `orderhistory`
--

CREATE TABLE `orderhistory` (
  `orderID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `deliveryStaffID` int(11) NOT NULL,
  `creationDatetime` datetime NOT NULL,
  `arrived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `orderhistory`
--

INSERT INTO `orderhistory` (`orderID`, `memberID`, `deliveryStaffID`, `creationDatetime`, `arrived`) VALUES
(2, 2, 2, '2019-11-27 03:55:15', 0),
(3, 3, 3, '2019-11-27 04:05:10', 1),
(4, 4, 4, '2019-11-27 03:15:05', 1),
(5, 5, 1, '2019-11-27 03:25:35', 1),
(6, 6, 2, '2019-11-28 03:25:15', 1),
(7, 7, 2, '2019-11-29 03:55:15', 1),
(8, 8, 3, '2019-11-30 04:05:10', 1),
(9, 9, 4, '2019-12-01 03:15:05', 1),
(10, 10, 1, '2019-12-02 03:25:35', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurantID` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `restaurant`
--

INSERT INTO `restaurant` (`restaurantID`, `name`, `tel`, `address`) VALUES
(1, 'rest1', '055349999', 'No.1, Sec. 3, University Road, Douliu City, Yunlin County'),
(2, 'rest2', '055348888', 'No.2, Sec. 3, University Road, Douliu City, Yunlin County'),
(3, 'rest3', '055347777', 'No.3, Sec. 3, University Road, Douliu City, Yunlin County'),
(4, 'rest4', '055346666', 'No.4, Sec. 3, University Road, Douliu City, Yunlin County');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `restaurantreportview`
-- (請參考以下實際畫面)
--
CREATE TABLE `restaurantreportview` (
`餐廳` varchar(10)
,`餐點` varchar(20)
,`被購買數量` decimal(32,0)
,`銷售總額` decimal(42,0)
);

-- --------------------------------------------------------

--
-- 檢視表結構 `restaurantreportview`
--
DROP TABLE IF EXISTS `restaurantreportview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `restaurantreportview`  AS  select `r`.`name` AS `餐廳`,`f`.`name` AS `餐點`,sum(`o`.`foodCount`) AS `被購買數量`,sum(`f`.`price` * `o`.`foodCount`) AS `銷售總額` from ((`orderdetail` `o` join `restaurant` `r`) join `food` `f`) where `o`.`restaurantID` = `r`.`restaurantID` and `o`.`foodID` = `f`.`foodID` and `r`.`restaurantID` = `f`.`restaurantID` group by `f`.`name` ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `deliverystaff`
--
ALTER TABLE `deliverystaff`
  ADD PRIMARY KEY (`deliveryStaffID`);

--
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`,`restaurantID`),
  ADD KEY `restaurantID` (`restaurantID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- 資料表索引 `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderID`,`restaurantID`,`foodID`),
  ADD KEY `restaurantID` (`restaurantID`),
  ADD KEY `foodID` (`foodID`),
  ADD KEY `orderID` (`orderID`);

--
-- 資料表索引 `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`orderID`) USING BTREE,
  ADD KEY `deliveryStaffID` (`deliveryStaffID`),
  ADD KEY `memberID` (`memberID`);

--
-- 資料表索引 `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurantID`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`restaurantID`) REFERENCES `restaurant` (`restaurantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`restaurantID`) REFERENCES `food` (`restaurantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `orderhistory` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `orderhistory_ibfk_1` FOREIGN KEY (`deliveryStaffID`) REFERENCES `deliverystaff` (`deliveryStaffID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderhistory_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
