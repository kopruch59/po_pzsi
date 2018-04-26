-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 26 Kwi 2018, 11:20
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
(1, 'Poniedziałek'),
(2, 'Wtorek'),
(3, 'Środa'),
(4, 'Czwartek'),
(5, 'Piątek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `expire` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `name`, `expire`) VALUES
(1, 'Grupa W3 C5 L8', '2018-06-22'),
(2, 'Grupa W2', '0000-00-00');

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
-- Struktura tabeli dla tabeli `mondays`
--

DROP TABLE IF EXISTS `mondays`;
CREATE TABLE IF NOT EXISTS `mondays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `mondays`
--

INSERT INTO `mondays` (`id`, `date`) VALUES
(1, '2018-01-01'),
(2, '2018-01-08'),
(3, '2018-01-15'),
(4, '2018-01-22'),
(5, '2018-01-29'),
(6, '2018-02-05'),
(7, '2018-02-12'),
(8, '2018-02-19'),
(9, '2018-02-26'),
(10, '2018-03-05'),
(11, '2018-03-12'),
(12, '2018-03-19'),
(13, '2018-03-26'),
(14, '2018-04-02'),
(15, '2018-04-09'),
(16, '2018-04-16'),
(17, '2018-04-23'),
(18, '2018-04-30'),
(19, '2018-05-07'),
(20, '2018-05-14'),
(21, '2018-05-21'),
(22, '2018-05-28'),
(23, '2018-06-04'),
(24, '2018-06-11'),
(25, '2018-06-18'),
(26, '2018-06-25');

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
  `group_number` varchar(64) NOT NULL,
  `teacher_name` varchar(64) NOT NULL,
  `start_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson` (`lesson`),
  KEY `day` (`day`),
  KEY `type` (`type`),
  KEY `teacher_name` (`teacher_name`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `plan`
--

INSERT INTO `plan` (`id`, `lesson`, `day`, `type`, `start`, `end`, `group_number`, `teacher_name`, `start_date`) VALUES
(1, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(2, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(3, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-25'),
(4, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-26'),
(5, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(6, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-25'),
(7, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-26'),
(8, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '14:00:00', '15:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(9, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '14:00:00', '15:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(10, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(11, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(12, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(13, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-01'),
(14, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-08'),
(15, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-15'),
(16, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-22'),
(17, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-29'),
(18, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-05'),
(19, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-12'),
(20, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-19'),
(21, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(22, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-26'),
(23, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(24, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-08'),
(25, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-22'),
(26, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-05'),
(27, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-19'),
(28, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(29, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-08'),
(30, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-22'),
(31, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-05'),
(32, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '18:00:00', '19:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-19'),
(33, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '19:00:00', '20:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(34, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '20:00:00', '21:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(35, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '21:00:00', '22:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(36, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '22:00:00', '23:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(37, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '23:00:00', '00:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(38, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '00:00:00', '01:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-24'),
(39, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '00:00:00', '01:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-25'),
(40, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-11'),
(41, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-18'),
(42, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-25'),
(43, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-02'),
(44, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-09'),
(45, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-16'),
(46, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-23'),
(47, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-30'),
(48, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-06'),
(49, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-13'),
(50, 'Techniki internetowe', 'Środa', 'Wykład', '10:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-20'),
(51, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Ćwiczenia', '14:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-28'),
(52, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Ćwiczenia', '14:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-12'),
(53, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Ćwiczenia', '14:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-26'),
(54, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Ćwiczenia', '14:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-09'),
(55, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-02-07'),
(56, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-02-14'),
(57, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-02-21'),
(58, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-02-28'),
(59, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-07'),
(60, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-14'),
(61, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-21'),
(62, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-28'),
(63, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-04'),
(64, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-11'),
(65, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-18'),
(66, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-25'),
(67, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-02'),
(68, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-09'),
(69, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-16'),
(70, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-23'),
(71, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-30'),
(72, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-06'),
(73, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-13'),
(74, 'Język angielski', 'Piątek', 'Laboratorium', '09:00:00', '11:00:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-20');

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
(3, 'Gola');

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
(2, 'Wykład'),
(3, 'Ćwiczenia'),
(4, 'Projekt');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `group_number` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `group_number`) VALUES
(1, 'krzysiek', 'szczupak', 'Grupa W2'),
(2, 'szymon', 'okon', 'Grupa W3 C5 L8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
