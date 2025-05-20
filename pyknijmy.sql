-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Maj 2025, 19:51
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
  `profile_image` longblob NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `email`, `password`, `date`, `about_me`, `profile_image`, `birthdate`, `gender`) VALUES
(1, 3199144809510910116, 'szymon', 'nied@pp', '$2y$10$yrd6CvqacatpSdcbknQoo.3.zlJ21iUcptnGZ1t1L1PhDPrH2Igqe', '2025-04-24 10:41:00', 'Podoba mi sie Remek', '', NULL, 'male'),
(2, 328727, 'wae', 'ea@2a', '$2y$10$.uo8LC6KGpWmPniMHSRW..4WwOi7iN16/XDbcW0goAdwT7jKKRwg.', '2025-04-03 12:43:55', '', '', NULL, 'male'),
(3, 589910, 'admin', 'remuwson@13', '$2y$10$l/VpRuJP1viu92dkwMTn1.QH3UPEcQapKz1/q1TQdYzHWuTc7H3Dq', '2025-04-08 15:51:42', '', '', NULL, 'male'),
(4, 685643601, 'remek', 'remek@12', '$2y$10$5zTZi7HPz5bSVLXus.5SR.FSZivt8mYnJ.pCbRlqbJvPzAyjmLFJa', '2025-04-24 13:02:26', 'jestem glupi tzfl!', '', NULL, 'male'),
(5, 8572421547762, 'asd', 'asd@asd', '$2y$10$8Y6/46KYahGJLZG/5ZsvBe7dzxe3Pzp2.v/Us.4S60Y/6fPTVfDY6', '2025-04-24 12:56:11', 'jestem glupi', '', NULL, 'male'),
(10, 41405702141407, 'vfeve', 'qwerty@pp', '$2y$10$r8Ea7Kp7hLiJbpEB0dszX.gX2p6V/9KQB/J/c.WdHLorKYiWs3hxy', '2025-04-24 14:25:31', 'Cześćwe', '', '2025-03-31', 'female'),
(11, 39356086, 'niedlich', 'nied@wp.pl', '$2y$10$uDkJKjehgomSoqZHE.344uhf8AUT3mvbDqH6wous0fihNrmqJoEgW', '2025-05-20 17:47:47', '', '', '2025-04-30', 'other');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
