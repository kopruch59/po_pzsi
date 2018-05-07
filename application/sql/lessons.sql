-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Maj 2018, 17:03
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
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_plan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `id_plan`) VALUES
(37, 'Kolokwium', 'Kolokwium z BCI!', 108);

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
-- Struktura tabeli dla tabeli `mondays`
--

CREATE TABLE `mondays` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(75, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-04-30'),
(76, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-07'),
(77, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-14'),
(78, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-21'),
(79, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-28'),
(80, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-04'),
(81, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-11'),
(82, 'Techniki internetowe', 'Poniedziałek', 'Laboratorium', '12:00:00', '13:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-18'),
(83, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-01'),
(84, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-08'),
(85, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-15'),
(86, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-22'),
(87, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-29'),
(88, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-05'),
(89, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-12'),
(90, 'Narzędzia sztucznej inteligencji', 'Wtorek', 'Laboratorium', '13:00:00', '14:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-19'),
(91, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '14:00:00', '15:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-02'),
(92, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-02'),
(93, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-09'),
(94, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-16'),
(95, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-23'),
(96, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-30'),
(97, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-06'),
(98, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-13'),
(99, 'Projekt zespołowy systemu informatycznego', 'Środa', 'Wykład', '15:00:00', '16:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-20'),
(100, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-03'),
(101, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-10'),
(102, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-17'),
(103, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-24'),
(104, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-31'),
(105, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-07'),
(106, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-14'),
(107, 'Usługi katalogowe w systemach operacyjnych', 'Czwartek', 'Ćwiczenia', '16:00:00', '17:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-21'),
(108, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-04'),
(109, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-11'),
(110, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-18'),
(111, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-05-25'),
(112, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-01'),
(113, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-08'),
(114, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-15'),
(115, 'Zarządzanie projektami informatycznymi', 'Piątek', 'Projekt', '17:00:00', '18:00:00', 'Grupa W3 C5 L8', 'Bryniarska', '2018-06-22');

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
-- Indeksy dla tabeli `events`
--
ALTER TABLE `events`
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
-- Indeksy dla tabeli `mondays`
--
ALTER TABLE `mondays`
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
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- AUTO_INCREMENT dla tabeli `mondays`
--
ALTER TABLE `mondays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
