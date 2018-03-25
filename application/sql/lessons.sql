-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 14 Mar 2018, 16:07
-- Wersja serwera: 5.7.19
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt-pon`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `days`
--

DROP TABLE IF EXISTS `days`;
CREATE TABLE IF NOT EXISTS `days` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `days`
--

INSERT INTO `days` (`id`, `name`) VALUES
(1, 'Poniedzialek'),
(2, 'wtorek'),
(3, 'sroda'),
(4, 'czwartek'),
(5, 'piatek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `lessons`
--

INSERT INTO `lessons` (`id`, `name`) VALUES
(1, 'Techniki internetowe'),
(2, 'Narzędzia sztucznej inteligencji'),
(3, 'Projekt zespołowy systemu informatycznego'),
(4, 'Usługi katalogowe w systemach operacyjnych'),
(5, 'Zarządzanie projektami informatycznymi'),
(6, 'Bazy danych II'),
(7, 'Język angielski'),
(8, 'Praca przejściowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson` varchar(64) NOT NULL,
  `day` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `teacher_name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson` (`lesson`),
  KEY `day` (`day`),
  KEY `type` (`type`),
  KEY `teacher_name` (`teacher_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `teachers`
--

INSERT INTO `teachers` (`id`, `name`) VALUES
(1, 'Bryniarska'),
(2, 'Wotzka'),
(3, 'Fedczuk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `type`
--

INSERT INTO `type` (`id`, `Name`) VALUES
(1, 'Laboratorium'),
(2, 'Wyklad'),
(3, 'Cwiczenia'),
(4, 'Projekt');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
