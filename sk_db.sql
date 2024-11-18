-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Lis 2024, 08:17
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sk_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `id_autora` int(11) NOT NULL,
  `imie` char(25) DEFAULT NULL,
  `nazwisko` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`id_autora`, `imie`, `nazwisko`) VALUES
(1, 'Jesse', 'M');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazka`
--

CREATE TABLE `ksiazka` (
  `id_ksiazki` int(11) NOT NULL,
  `tytul` char(45) NOT NULL,
  `id_autora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ksiazka`
--

INSERT INTO `ksiazka` (`id_ksiazki`, `tytul`, `id_autora`) VALUES
(1, 'Test', 1),
(2, 'Test', 1),
(3, 'Test', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiegarnie`
--

CREATE TABLE `ksiegarnie` (
  `id_ksiegarni` int(11) NOT NULL,
  `nazwa` char(45) DEFAULT NULL,
  `id_miasta` int(11) NOT NULL,
  `ulica` char(45) DEFAULT NULL,
  `kod_pocztowy` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ksiegarnie`
--

INSERT INTO `ksiegarnie` (`id_ksiegarni`, `nazwa`, `id_miasta`, `ulica`, `kod_pocztowy`) VALUES
(6, 'Test', 1, 'Test_u', 'test_k'),
(7, 'Test', 1, 'Test_u', 'test_k'),
(8, 'Test', 1, 'Test_u', 'test_k');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miasta`
--

CREATE TABLE `miasta` (
  `id_miasta` int(11) NOT NULL,
  `nazwa` char(45) DEFAULT NULL,
  `id_woj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `miasta`
--

INSERT INTO `miasta` (`id_miasta`, `nazwa`, `id_woj`) VALUES
(1, 'Gliwice', 1),
(2, 'Zabrze', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wojewodztwa`
--

CREATE TABLE `wojewodztwa` (
  `id_woj` int(11) NOT NULL,
  `nazwa` char(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wojewodztwa`
--

INSERT INTO `wojewodztwa` (`id_woj`, `nazwa`) VALUES
(1, 'Śląskie');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`id_autora`);

--
-- Indeksy dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD PRIMARY KEY (`id_ksiazki`),
  ADD KEY `for_k_ksiazka_autor` (`id_autora`);

--
-- Indeksy dla tabeli `ksiegarnie`
--
ALTER TABLE `ksiegarnie`
  ADD PRIMARY KEY (`id_ksiegarni`),
  ADD KEY `for_k_ksiegarnia_miasto` (`id_miasta`);

--
-- Indeksy dla tabeli `miasta`
--
ALTER TABLE `miasta`
  ADD PRIMARY KEY (`id_miasta`),
  ADD KEY `for_k_miasta_woj` (`id_woj`);

--
-- Indeksy dla tabeli `wojewodztwa`
--
ALTER TABLE `wojewodztwa`
  ADD PRIMARY KEY (`id_woj`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `id_autora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `ksiegarnie`
--
ALTER TABLE `ksiegarnie`
  MODIFY `id_ksiegarni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `miasta`
--
ALTER TABLE `miasta`
  MODIFY `id_miasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wojewodztwa`
--
ALTER TABLE `wojewodztwa`
  MODIFY `id_woj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazka`
--
ALTER TABLE `ksiazka`
  ADD CONSTRAINT `for_k_ksiazka_autor` FOREIGN KEY (`id_autora`) REFERENCES `autorzy` (`id_autora`);

--
-- Ograniczenia dla tabeli `ksiegarnie`
--
ALTER TABLE `ksiegarnie`
  ADD CONSTRAINT `for_k_ksiegarnia_miasto` FOREIGN KEY (`id_miasta`) REFERENCES `miasta` (`id_miasta`);

--
-- Ograniczenia dla tabeli `miasta`
--
ALTER TABLE `miasta`
  ADD CONSTRAINT `for_k_miasta_woj` FOREIGN KEY (`id_woj`) REFERENCES `wojewodztwa` (`id_woj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
