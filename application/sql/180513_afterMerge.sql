-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Maj 2018, 22:49
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `po_pzsi_student-schedule`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_g`
--

CREATE TABLE `users_g` (
  `id` int(11) NOT NULL,
  `g_email` varchar(100) NOT NULL,
  `g_id` varchar(255) NOT NULL,
  `g_first_name` varchar(100) NOT NULL,
  `g_last_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `group_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users_g`
--

INSERT INTO `users_g` (`id`, `g_email`, `g_id`, `g_first_name`, `g_last_name`, `created`, `modified`, `group_number`) VALUES
(32, 'the.kindly.mallard@gmail.com', '103839721757236608368', 'Kindly', 'Mallard', '2018-05-13 16:23:19', '2018-05-13 21:24:15', 'Grupa W3 C5 L8');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `users_g`
--
ALTER TABLE `users_g`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `g_email` (`g_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `users_g`
--
ALTER TABLE `users_g`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
