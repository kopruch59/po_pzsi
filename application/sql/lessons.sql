-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Kwi 2018, 22:21
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `lessons`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
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

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `expire` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `lesson` varchar(64) NOT NULL,
  `day` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `group_number` varchar(64) NOT NULL,
  `teacher_name` varchar(64) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(39, 'Projekt zespołowy systemu informatycznego', 'Poniedziałek', 'Laboratorium', '00:00:00', '01:00:00', 'Grupa W3 C5 L8', 'Wotzka', '2018-04-25');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL
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

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `group_number` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `group_number`) VALUES
(1, 'krzysiek', 'szczupak', 'Grupa W2'),
(2, 'szymon', 'okon', 'Grupa W3 C5 L8');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson` (`lesson`),
  ADD KEY `day` (`day`),
  ADD KEY `type` (`type`),
  ADD KEY `teacher_name` (`teacher_name`);

--
-- Indeksy dla tabeli `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT dla tabeli `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
