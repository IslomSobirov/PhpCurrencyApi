-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 07:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `rate` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `rate`) VALUES
(1, 'Австралийский доллар', '47,2908'),
(2, 'Азербайджанский манат', '42,7903'),
(3, 'Фунт стерлингов Соединенного кор', '89,3840'),
(4, 'Армянских драмов', '15,0104'),
(5, 'Белорусский рубль', '29,9385'),
(6, 'Болгарский лев', '40,4786'),
(7, 'Бразильский реал', '12,5978'),
(8, 'Венгерских форинтов', '22,3805'),
(9, 'Гонконгских долларов', '94,4430'),
(10, 'Датская крона', '10,6161'),
(11, 'Доллар США', '73,2056'),
(12, 'Евро', '79,1279'),
(13, 'Индийских рупий', '96,8648'),
(14, 'Казахстанских тенге', '17,4108'),
(15, 'Канадский доллар', '52,1185'),
(16, 'Киргизских сомов', '95,0722'),
(17, 'Китайский юань', '10,3108'),
(18, 'Молдавских леев', '41,1267'),
(19, 'Норвежских крон', '72,1159'),
(20, 'Польский злотый', '17,3761'),
(21, 'Румынский лей', '16,3603'),
(22, 'СДР (специальные права заимствов', '99,4666'),
(23, 'Сингапурский доллар', '51,4301'),
(24, 'Таджикских сомони', '71,3157'),
(25, 'Турецкая лира', '10,5831'),
(26, 'Новый туркменский манат', '20,9458'),
(27, 'Узбекских сумов', '72,1593'),
(28, 'Украинских гривен', '27,4836'),
(29, 'Чешских крон', '28,8325'),
(30, 'Шведских крон', '74,5809'),
(31, 'Швейцарский франк', '75,2370'),
(32, 'Южноафриканских рэндов', '39,7824'),
(33, 'Вон Республики Корея', '59,4795'),
(34, 'Японских иен', '68,3813');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
