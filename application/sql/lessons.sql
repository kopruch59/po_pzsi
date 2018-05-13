-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 12 Maj 2018, 09:16
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
-- Struktura tabeli dla tabeli `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_plan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `id_plan`) VALUES
(37, 'Kolokwium', 'Kolokwium z BCI!', 108),
(38, '', '', 3),
(39, '', '', 1),
(40, '', '', 2),
(41, '', '', 3),
(42, '', '', 3),
(43, '', '', 3),
(44, '', '', 3),
(45, '', '', 3),
(46, '', '', 3),
(47, '', '', 3),
(48, '', '', 3),
(49, '', '', 3),
(50, '', '', 3),
(51, '', '', 3),
(52, '', '', 3),
(53, '', '', 3),
(54, '', '', 3),
(55, '', '', 3),
(56, '', '', 3),
(57, '', '', 3),
(58, '', '', 6),
(59, '', '', 6),
(60, '', '', 6),
(61, '', '', 6),
(62, '', '', 6),
(63, '', '', 6),
(64, '', '', 6),
(65, '', '', 6),
(66, '', '', 6),
(67, '', '', 6),
(68, '', '', 6),
(69, '', '', 6),
(70, '', '', 1),
(71, '', '', 1),
(72, '', '', 1),
(73, '', '', 1),
(74, '', '', 1),
(75, '', '', 1),
(76, '', '', 1),
(77, '', '', 1),
(78, '', '', 7),
(79, '', '', 7),
(80, '', '', 14),
(81, '', '', 2),
(82, '', '', 16),
(83, '', '', 7),
(84, '', '', 7),
(85, '', '', 7),
(86, '', '', 15),
(87, '', '', 15),
(88, '', '', 1),
(89, '', '', 8),
(90, '', '', 8),
(91, '', '', 13),
(92, '', '', 13),
(93, '', '', 7),
(94, '', '', 7),
(95, '', '', 7),
(96, '', '', 1),
(97, '', '', 10),
(98, '', '', 14),
(99, '', '', 14),
(100, '', '', 1),
(101, '', '', 4),
(102, '', '', 10),
(103, '', '', 10),
(104, '', '', 1),
(105, '', '', 7),
(106, '', '', 7),
(107, '', '', 7),
(108, '', '', 7),
(109, '', '', 6),
(110, '', '', 6),
(111, '', '', 6),
(112, '', '', 6),
(113, '', '', 6),
(114, '', '', 1),
(115, '', '', 1),
(116, '', '', 1),
(117, '', '', 6),
(118, '', '', 6),
(119, '', '', 6),
(120, '', '', 11),
(121, '', '', 11),
(122, '', '', 11),
(123, '', '', 11),
(124, '', '', 4),
(125, '', '', 11),
(126, '', '', 11),
(127, '', '', 11),
(128, '', '', 1),
(129, '', '', 6),
(130, '', '', 6),
(131, '', '', 6),
(132, '', '', 9),
(133, '', '', 13),
(134, '', '', 16),
(135, '', '', 3),
(136, '', '', 3),
(137, '', '', 3),
(138, '', '', 6),
(139, '', '', 1),
(140, '', '', 1),
(141, '', '', 2),
(142, '', '', 2),
(143, '', '', 3),
(144, '', '', 3),
(145, '', '', 1),
(146, '', '', 8),
(147, '', '', 8),
(148, '', '', 2),
(149, '', '', 2),
(150, '', '', 7),
(151, '', '', 8),
(152, '', '', 8),
(153, '', '', 6),
(154, '', '', 6),
(155, '', '', 6),
(156, '', '', 6),
(157, '', '', 6),
(158, '', '', 11),
(159, '', '', 11),
(160, '', '', 12),
(161, '', '', 1),
(162, '', '', 12),
(163, '', '', 11),
(164, '', '', 12),
(165, '', '', 12),
(166, '', '', 12),
(167, '', '', 12),
(168, '', '', 12),
(169, '', '', 12),
(170, '', '', 12),
(171, '', '', 12),
(172, '', '', 12),
(173, '', '', 4),
(174, '', '', 9),
(175, '', '', 14),
(176, '', '', 14),
(177, '', '', 8),
(178, '', '', 8),
(179, '', '', 4),
(180, '', '', 4),
(181, '', '', 12),
(182, '', '', 3),
(183, '', '', 6),
(184, '', '', 13),
(185, '', '', 13),
(186, '', '', 13),
(187, '', '', 13),
(188, '', '', 13),
(189, '', '', 13),
(190, '', '', 13),
(191, '', '', 13),
(192, '', '', 13),
(193, '', '', 13),
(194, '', '', 9),
(195, '', '', 16),
(196, '', '', 5),
(197, '', '', 5),
(198, '', '', 15),
(199, '', '', 15),
(200, '', '', 15),
(201, '', '', 15),
(202, '', '', 15),
(203, '', '', 15),
(204, '', '', 15),
(205, '', '', 15),
(206, '', '', 15),
(207, '', '', 15),
(208, '', '', 15),
(209, '', '', 15),
(210, '', '', 12),
(211, '', '', 1),
(212, '', '', 9),
(213, '', '', 9),
(214, '', '', 9),
(215, '', '', 12),
(216, '', '', 12),
(217, '', '', 16),
(218, '', '', 4),
(219, '', '', 4),
(220, '', '', 4),
(221, '', '', 4),
(222, '', '', 12);

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
  `week_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `mondays`
--

INSERT INTO `mondays` (`id`, `date`, `week_number`) VALUES
(9, '2018-02-26', 1),
(10, '2018-03-05', 2),
(11, '2018-03-12', 3),
(12, '2018-03-19', 4),
(13, '2018-03-26', 5),
(14, '2018-04-02', 6),
(15, '2018-04-09', 7),
(16, '2018-04-16', 8),
(17, '2018-04-23', 9),
(18, '2018-04-30', 10),
(19, '2018-05-07', 11),
(20, '2018-05-14', 12),
(21, '2018-05-21', 13),
(22, '2018-05-28', 14),
(23, '2018-06-04', 15),
(24, '2018-06-11', 16),
(25, '2018-06-18', 17);

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
  `room` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson` (`lesson`),
  KEY `day` (`day`),
  KEY `type` (`type`),
  KEY `teacher_name` (`teacher_name`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `plan`
--

INSERT INTO `plan` (`id`, `lesson`, `day`, `type`, `start`, `end`, `group_number`, `teacher_name`, `start_date`, `room`) VALUES
(1, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-02-26', 'P3-119'),
(2, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-03-05', 'P3-119'),
(3, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-03-12', 'P3-119'),
(4, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-03-19', 'P3-119'),
(5, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-03-26', 'P3-119'),
(6, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-04-02', 'P3-119'),
(7, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-04-09', 'P3-119'),
(8, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-04-16', 'P3-119'),
(9, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-04-23', 'P3-119'),
(10, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-04-30', 'P3-119'),
(11, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-05-07', 'P3-119'),
(12, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-05-14', 'P3-119'),
(13, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-05-21', 'P3-119'),
(14, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-05-28', 'P3-119'),
(15, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-06-04', 'P3-119'),
(16, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-06-11', 'P3-119'),
(17, 'Praca przejściowa', 'Czwartek', 'Projekt', '11:55:00', '14:10:00', 'Grupa W3 C5 L8', 'Mroczka', '2018-06-18', 'P3-119'),
(18, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-02-26', 'P3-010'),
(19, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-03-05', 'P3-010'),
(20, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-03-12', 'P3-010'),
(21, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-03-19', 'P3-010'),
(22, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-03-26', 'P3-010'),
(23, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-04-02', 'P3-010'),
(24, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-04-09', 'P3-010'),
(25, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-04-16', 'P3-010'),
(26, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-04-23', 'P3-010'),
(27, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-04-30', 'P3-010'),
(28, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-05-07', 'P3-010'),
(29, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-05-14', 'P3-010'),
(30, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-05-21', 'P3-010'),
(31, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-05-28', 'P3-010'),
(32, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-06-04', 'P3-010'),
(33, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-06-11', 'P3-010'),
(34, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Projekt', '11:55:00', '14:30:00', 'Grupa W3 C5 L8', 'Fedczuk', '2018-06-18', 'P3-010'),
(35, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-02-26', 'P3-121'),
(36, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-03-05', 'P3-121'),
(37, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-03-12', 'P3-121'),
(38, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-03-19', 'P3-121'),
(39, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-03-26', 'P3-121'),
(40, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-02', 'P3-121'),
(41, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-09', 'P3-121'),
(42, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-16', 'P3-121'),
(43, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-23', 'P3-121'),
(44, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-30', 'P3-121'),
(45, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-07', 'P3-121'),
(46, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-14', 'P3-121'),
(47, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-21', 'P3-121'),
(48, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-05-28', 'P3-121'),
(49, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-04', 'P3-121'),
(50, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-11', 'P3-121'),
(51, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Wykład', '11:00:00', '11:45:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-06-18', 'P3-121'),
(52, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-02-26', 'P3-206'),
(53, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-05', 'P3-206'),
(54, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-12', 'P3-206'),
(55, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-19', 'P3-206'),
(56, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-03-26', 'P3-206'),
(57, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-02', 'P3-206'),
(58, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-09', 'P3-206'),
(59, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-16', 'P3-206'),
(60, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-23', 'P3-206'),
(61, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-04-30', 'P3-206'),
(62, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-07', 'P3-206'),
(63, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-14', 'P3-206'),
(64, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-21', 'P3-206'),
(65, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-05-28', 'P3-206'),
(66, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-04', 'P3-206'),
(67, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-11', 'P3-206'),
(68, 'Bazy danych II', 'Środa', 'Wykład', '11:00:00', '12:30:00', 'Grupa W3 C5 L8', 'Piotrowska', '2018-06-18', 'P3-206');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rooms`
--

INSERT INTO `rooms` (`id`, `name`) VALUES
(1, 'P3-006'),
(2, 'P3-007'),
(3, 'P3-009'),
(4, 'P3-010'),
(5, 'P3-026'),
(6, 'P3-105'),
(7, 'P3-106'),
(8, 'P3-107'),
(9, 'P3-108'),
(10, 'P3-109'),
(11, 'P3-119'),
(12, 'P3-120'),
(13, 'P3-121'),
(14, 'P3-205'),
(15, 'P3-206'),
(16, 'P3-207'),
(17, 'P3-208'),
(18, 'P3-209'),
(19, 'P3-210'),
(20, 'P3-221'),
(21, 'P3-222'),
(22, 'P3-223'),
(23, 'P3-306'),
(24, 'P3-307'),
(25, 'P3-308'),
(26, 'P3-309'),
(27, 'P3-310'),
(28, 'P3-313'),
(29, 'P3-320'),
(30, 'P3-321');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `teachers`
--

INSERT INTO `teachers` (`id`, `name`) VALUES
(1, 'Bryniarska'),
(2, 'Wotzka'),
(3, 'Gola'),
(4, 'Mroczka'),
(5, 'Fedczuk'),
(6, 'Żołubak'),
(7, 'Gola'),
(8, 'Zatwarnicka'),
(9, 'Feliks'),
(10, 'Majer'),
(11, 'Płatek'),
(12, 'Piotrowska');

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
