-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 07:39 PM
-- Server version: 8.0.43
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sign_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`name`, `address`, `contact`, `email`, `password`) VALUES
('Ravi', 'Ravangla', 9933439400, 'abc@gmail.com', '$2y$10$PH2ph/ypUWpKHvgJ/Rjt9.ALrJ9MZtaG3bX8zQRCuWLXGibbcQXcG'),
('ravi', 'Ravangla', 9933439400, 'xyz@gmail.com', '$2y$10$jYdbz5kSzsnGRx8E7LSgSuaQCW0Xhs45.qAsTMsVaOz1Hm771bO2y'),
('ravi', 'Ravangla', 9933439400, 'b240056@nitsikkim.ac.in', '$2y$10$BbsjqXvcDekTJXQuOi47NuGSwU1rvqVMM7xyDW.KgdGg.9/0VHG9e'),
('ravi', 'Ravangla', 9933439400, 'b240056@nitsikkim.ac.in123', '$2y$10$BJCl28qUV8SPQhVIepu2CuXePc/lEbh7RcixRoqlXvedHELkJDbWG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
