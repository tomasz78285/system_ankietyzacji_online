-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Mar 2021, 14:49
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `system_ankietyzacji`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankiety`
--

CREATE TABLE `ankiety` (
  `id_ankiety` int(11) NOT NULL,
  `nazwa_ankiety` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `grupa_badawcza` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(225) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ankiety`
--

INSERT INTO `ankiety` (`id_ankiety`, `nazwa_ankiety`, `grupa_badawcza`, `autor`) VALUES
(1, 'Ankieta', 'Klient', 'tomek123'),
(2, 'Test', 'Pracownik', 'tomek123'),
(3, 'Edukacja', 'Edukacja', 'tomek123'),
(4, 'B2B', 'Biznes', 'tomek123'),
(5, 'df', 'Inne', 'tomek123');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  ADD PRIMARY KEY (`id_ankiety`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  MODIFY `id_ankiety` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
