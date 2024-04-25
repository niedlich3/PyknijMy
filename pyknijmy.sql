-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Kwi 2024, 17:07
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
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `about_me` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`, `about_me`) VALUES
(1, 21396, 'niedlich', '123456', '2024-04-25 14:43:23', ''),
(2, 572938, 'Szymon', '123456', '2024-04-23 17:44:19', '');

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
(30, 'Tanowo', 'Mazowiecka 13', '2024-05-03', '12:30:00', 2, 12, 'Gramy sobie w piłke', 'Piłka nożna'),
(31, 'Tanowo', 'Radosna', '2024-04-28', '12:32:00', 1, 22, 'Testowe', 'Koszykówka'),
(32, 'Tanowo', 'Słoneczna 1', '2024-05-03', '22:21:00', 1, 123, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultricies facilisis tempor. Praesent lorem risus, efficitur nec magna nec, iaculis rutrum est. Quisque dolor neque, ultricies eu vestibulum posuere, ultrices quis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam euismod tellus lorem, vel fermentum justo cursus eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas et tellus in quam efficitur viverra. Vestibulum tempor eget tortor sit amet laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas libero magna, dictum in tortor id, consequat dignissim eros. Nunc nec tincidunt odio. Mauris laoreet hendrerit porta. Ut ac maximus ante, sed eleifend nunc. Pellentesque eget nisl congue, pulvinar ante ac, ultrices est.  Duis ex tellus, egestas eu odio vitae, euismod euismod purus. Integer justo metus, gravida pulvinar eros in, egestas interdum libero. Aenean tincidunt, nunc ut cursus elementum, lorem dui tincidunt tortor, ac ultrices metus velit vel massa. Fusce eget nisl et neque molestie sollicitudin. Morbi commodo felis dictum diam facilisis, nec convallis erat vehicula. Donec tellus metus, lacinia sed nisi ut, mattis finibus enim. Mauris consectetur egestas erat eu rhoncus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.  Vivamus egestas lectus ut dignissim eleifend. Sed varius velit ex, at maximus sapien varius at. Suspendisse vulputate mi vel velit condimentum iaculis. Phasellus id tortor semper, pulvinar massa faucibus, dictum turpis. Mauris porta condimentum justo, eget vestibulum urna finibus sed. Morbi justo ipsum, fermentum eu scelerisque at, lobortis at erat. Nulla vel gravida lorem. Aliquam erat volutpat. Curabitur vel malesuada justo. Suspendisse ante eros, bibendum sed nisi id, dignissim pulvinar velit. Mauris blandit ultricies dolor sed suscipit. Morbi vitae ullamcorper sem. Maecenas laoreet maximus nunc non viverra.  Proin pharetra leo vel libero rutrum pharetra. Maecenas bibendum arcu eget dui tempus, vel sollicitudin ipsum sodales. Vestibulum porta laoreet massa, non rutrum justo finibus id. Aliquam iaculis, quam sit amet vestibulum malesuada, massa enim volutpat neque, eget venenatis sem velit eu nibh. Praesent fermentum a nunc nec sodales. Fusce non tempor nunc. Suspendisse nunc massa, vulputate eu odio fringilla, mattis aliquet massa. Nunc quis mi feugiat, efficitur elit vitae, aliquet libero. Phasellus id ex a urna maximus lacinia sit amet a lorem.', 'Piłka nożna');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`);

--
-- Indeksy dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
