SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE `us-email` (
  `Business Name` varchar(64) DEFAULT NULL,
  `Category` varchar(44) DEFAULT NULL,
  `Category 2` varchar(55) DEFAULT NULL,
  `Category 3` varchar(58) DEFAULT NULL,
  `Address` varchar(33) DEFAULT NULL,
  `City` varchar(17) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `Postal` varchar(5) DEFAULT NULL,
  `Phone Number` varchar(14) DEFAULT NULL,
  `Website` varchar(113) DEFAULT NULL,
  `Email` varchar(13) DEFAULT NULL,
  `Latitude` varchar(8) DEFAULT NULL,
  `Longitude` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
