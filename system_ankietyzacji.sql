-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Mar 2021, 14:50
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `id_odpowiedzi` int(11) NOT NULL,
  `tresc_odpowiedzi` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `pytanie` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`id_odpowiedzi`, `tresc_odpowiedzi`, `ilosc`, `pytanie`) VALUES
(1, 'Tak', 12, 'Czy uprawiasz sport?'),
(2, 'Nie', 8, 'Czy uprawiasz sport?'),
(3, 'Bardzo czesto', 3, 'Jak czesto chodzisz na silownie?'),
(4, 'Czesto', 4, 'Jak czesto chodzisz na silownie?'),
(5, 'Czasami', 5, 'Jak czesto chodzisz na silownie?'),
(6, 'Nie chodze', 8, 'Jak czesto chodzisz na silownie?'),
(7, 'Pizza', 7, 'Ulubione jedzenie'),
(8, 'Kebab', 4, 'Ulubione jedzenie'),
(9, 'Zupa', 11, 'Ulubione jedzenie'),
(10, 'Bigos', 18, 'Ulubione jedzenie'),
(11, 'Nic', 0, 'Co powiesz?'),
(12, 'Cos', 0, 'Co powiesz?');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `id_pytania` int(11) NOT NULL,
  `tresc_pytania` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nr_pytania_w_ankiecie` int(11) NOT NULL,
  `rodzaj` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ankieta` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`id_pytania`, `tresc_pytania`, `nr_pytania_w_ankiecie`, `rodzaj`, `ankieta`) VALUES
(1, 'Czy uprawiasz sport?', 1, 'zamkniete', 'Ankieta'),
(2, 'Jak czesto chodzisz na silownie?', 2, 'zamkniete', 'Ankieta'),
(3, 'Ulubione jedzenie', 3, 'zamkniete', 'Ankieta'),
(4, 'Co powiesz?', 4, 'otwarte', 'Ankieta');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `e_mail` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nr_telefonu` int(9) NOT NULL,
  `imie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `e_mail`, `nr_telefonu`, `imie`, `nazwisko`) VALUES
(1, 'tomek123', 'haslo123456', 'kad.tom@wp.pl', 789456123, 'Tomasz', 'KadÅ‚ubowski');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  ADD PRIMARY KEY (`id_ankiety`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`id_odpowiedzi`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id_pytania`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  MODIFY `id_ankiety` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id_odpowiedzi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id_pytania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
