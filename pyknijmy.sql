-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Kwi 2024, 18:59
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
(5, 120250635698476, 'Szymon N', '$2y$10$LcD5VgkuYgqx/QP.n1eD8eqMsuQcOz/dv62SjtJYEtpdVS8tR14TO', '2024-04-26 14:56:07', ''),
(8, 9223372036854775807, 'niedlich3', '$2y$10$bDDbf1pCuB8XsexqmCBRXebwL9eBxEF6RryuTJGnfRBASC1cY6LdK', '2024-04-26 15:29:04', ''),
(9, 21853, 'szymon', '$2y$10$Sx9oOQmSsiOo6aBzQLAQneIXF43znzFt2IwrvaTzpXwULDbD9hbTK', '2024-04-26 15:29:59', ''),
(10, 6444534385226, 'niedlich21', '$2y$10$TUFDoKpxwlrgrKzMZS4Je.17crsmDyWWUfFNxGKs7eH./GiiJAWKy', '2024-04-26 15:31:37', ''),
(11, 740962173246237035, 'niedlich123', '$2y$10$jpxaWpzY.7.QgG318ylBHOPrjTO7dAjaubccdxry3jUveDxwenbNK', '2024-04-26 15:32:00', ''),
(12, 9404779723108243, 'niedlich2115', '$2y$10$vORmgKPvboCR3SdPcsjmHuiMhuPGVPrr9tZ9cjTWQ13mvFhuCqOnK', '2024-04-26 16:46:39', ''),
(13, 341792027, 'niedlich2114', '$2y$10$gIFEFwiK5oAemldKKsYcCOzCFj9p02BidAH/sa9B0b4QyrJ1h8jhW', '2024-04-26 16:50:10', ''),
(14, 187052892, 'oli', '$2y$10$qvvwYzcs1MdIOtSAcd6rmuk06w4uYRVwynmDFDy00JdvOLFkvzRUW', '2024-04-26 16:53:04', ''),
(15, 219760, 'oli1', '$2y$10$RHV16FJx2Xp0.ApCeQJXReLKdGcWJdlM2FI3CIiOB2iTH7Khaq2hy', '2024-04-26 16:53:50', ''),
(16, 3211, 'lol1', '$2y$10$BlKySu8ekA37AM7z1kwdyeSE.ndBcJ229YaURAcJcELjHj3Od8yyW', '2024-04-26 16:54:31', ''),
(17, 285037, 'Szymon_Niedlich', '$2y$10$sUrP5XqblZq13mZbHJox3eHzNYe9nLSnjGimmAPnVmzGEJHL0Ub02', '2024-04-26 16:55:52', ''),
(18, 9223372036854775807, 'niedlich1', '$2y$10$WsvEV/kmqVnjCqJ4VVBeQeeaATUMLOizb9jQ2TNAqJWh/HA6lIWma', '2024-04-26 16:57:22', ''),
(19, 242759652, 'Szymon_N', '$2y$10$Jerk.gVwTTUBdGtJRd1OtesHQqElq6zPfK1aN83MC49wuILkNsWfW', '2024-04-26 16:58:00', ''),
(20, 93762, 'niedlich69', '$2y$10$40wkR4yPxqVcygLsgqg6du2.xWGm6kHtL52t8JJEfOP3bBs3vYVn6', '2024-04-26 16:58:27', '');

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
(30, 'Tanowo', 'Mazowiecka 13', '2024-05-03', '12:30:00', 6, 12, 'Gramy sobie w piłke', 'Piłka nożna'),
(31, 'Tanowo', 'Radosna', '2024-04-28', '12:32:00', 10, 22, 'Testowe', 'Koszykówka'),
(32, 'Tanowo', 'Słoneczna 1', '2024-05-03', '22:21:00', 5, 123, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultricies facilisis tempor. Praesent lorem risus, efficitur nec magna nec, iaculis rutrum est. Quisque dolor neque, ultricies eu vestibulum posuere, ultrices quis diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam euismod tellus lorem, vel fermentum justo cursus eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas et tellus in quam efficitur viverra. Vestibulum tempor eget tortor sit amet laoreet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas libero magna, dictum in tortor id, consequat dignissim eros. Nunc nec tincidunt odio. Mauris laoreet hendrerit porta. Ut ac maximus ante, sed eleifend nunc. Pellentesque eget nisl congue, pulvinar ante ac, ultrices est.  Duis ex tellus, egestas eu odio vitae, euismod euismod purus. Integer justo metus, gravida pulvinar eros in, egestas interdum libero. Aenean tincidunt, nunc ut cursus elementum, lorem dui tincidunt tortor, ac ultrices metus velit vel massa. Fusce eget nisl et neque molestie sollicitudin. Morbi commodo felis dictum diam facilisis, nec convallis erat vehicula. Donec tellus metus, lacinia sed nisi ut, mattis finibus enim. Mauris consectetur egestas erat eu rhoncus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.  Vivamus egestas lectus ut dignissim eleifend. Sed varius velit ex, at maximus sapien varius at. Suspendisse vulputate mi vel velit condimentum iaculis. Phasellus id tortor semper, pulvinar massa faucibus, dictum turpis. Mauris porta condimentum justo, eget vestibulum urna finibus sed. Morbi justo ipsum, fermentum eu scelerisque at, lobortis at erat. Nulla vel gravida lorem. Aliquam erat volutpat. Curabitur vel malesuada justo. Suspendisse ante eros, bibendum sed nisi id, dignissim pulvinar velit. Mauris blandit ultricies dolor sed suscipit. Morbi vitae ullamcorper sem. Maecenas laoreet maximus nunc non viverra.  Proin pharetra leo vel libero rutrum pharetra. Maecenas bibendum arcu eget dui tempus, vel sollicitudin ipsum sodales. Vestibulum porta laoreet massa, non rutrum justo finibus id. Aliquam iaculis, quam sit amet vestibulum malesuada, massa enim volutpat neque, eget venenatis sem velit eu nibh. Praesent fermentum a nunc nec sodales. Fusce non tempor nunc. Suspendisse nunc massa, vulputate eu odio fringilla, mattis aliquet massa. Nunc quis mi feugiat, efficitur elit vitae, aliquet libero. Phasellus id ex a urna maximus lacinia sit amet a lorem.', 'Piłka nożna');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
