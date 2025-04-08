-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Kwi 2025, 22:25
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pyknijmy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `about_me` text NOT NULL,
  `profile_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `email`, `password`, `date`, `about_me`, `profile_image`) VALUES
(2, 328727, 'wae', 'ea@2a', '$2y$10$.uo8LC6KGpWmPniMHSRW..4WwOi7iN16/XDbcW0goAdwT7jKKRwg.', '2025-04-03 12:43:55', '', ''),
(3, 589910, 'admin', 'remuwson@13', '$2y$10$l/VpRuJP1viu92dkwMTn1.QH3UPEcQapKz1/q1TQdYzHWuTc7H3Dq', '2025-04-08 15:51:42', '', ''),
(0, 8572421547762, 'asd', 'asd@asd', '$2y$10$8Y6/46KYahGJLZG/5ZsvBe7dzxe3Pzp2.v/Us.4S60Y/6fPTVfDY6', '2025-04-08 19:11:49', '', ''),
(1, 3199144809510910116, 'szymon', 'nied@pp', '$2y$10$yrd6CvqacatpSdcbknQoo.3.zlJ21iUcptnGZ1t1L1PhDPrH2Igqe', '2025-04-03 12:55:01', 'eaf', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_events`
--

CREATE TABLE `user_events` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `user_events`
--

INSERT INTO `user_events` (`id`, `user_id`, `event_id`) VALUES
(1, 8572421547762, '67cdb4c253b48b7a2729edd7'),
(2, 8572421547762, '67cdbc202161bd17b6e97d5c'),
(3, 8572421547762, '67d5555406e365f70c29d176'),
(4, 8572421547762, '67cdbc2b2161bd17b6e97d5e'),
(5, 8572421547762, '67d560d047e47a4c4fd0f8e2'),
(6, 8572421547762, '67d55a8a06e365f70c29d17a');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `user_events`
--
ALTER TABLE `user_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `user_events`
--
ALTER TABLE `user_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `user_events`
--
ALTER TABLE `user_events`
  ADD CONSTRAINT `user_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
