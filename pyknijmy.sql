-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Kwi 2024, 21:48
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
-- Struktura tabeli dla tabeli `wydarzenia`
--

CREATE TABLE `wydarzenia` (
  `id` int(11) UNSIGNED NOT NULL,
  `miasto` text NOT NULL,
  `ulica` text NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `osoby_zapisane` int(11) NOT NULL,
  `max_osoby` int(11) NOT NULL,
  `opis` text NOT NULL,
  `kategoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `wydarzenia`
--

INSERT INTO `wydarzenia` (`id`, `miasto`, `ulica`, `data`, `godzina`, `osoby_zapisane`, `max_osoby`, `opis`, `kategoria`) VALUES
(20, 'Tanowo', 'Tanowska', '2024-04-19', '18:45:00', 3, 32, 'Testowe', 'Siatkówka'),
(25, 'Tanowo', 'Słoneczna 1', '2024-04-19', '23:32:00', 2, 12, 'Gramy sobie w piłke', 'Piłka nożna'),
(26, 'Tanowo', 'Radosna', '2024-04-04', '12:02:00', 13, 24, 'Gramy sobie w piłke', 'Piłka nożna'),
(27, 'Police', 'Piaskowa', '2024-04-30', '12:12:00', 2, 4, 'Koszykówka', 'Koszykówka'),
(28, 'Tanowo', 'Tanowska', '2024-04-19', '12:50:00', 12, 23, 'Testowe', 'Piłka nożna');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
