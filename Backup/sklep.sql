-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2026 at 02:56 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE `administratorzy` (
  `id_admina` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `haslo` varchar(35) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` varchar(99) NOT NULL,
  `cena` float NOT NULL,
  `kategoria` varchar(35) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `haslo` varchar(35) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakupy`
--

CREATE TABLE `zakupy` (
  `id_zakupu` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `data_zakupu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`id_admina`),
  ADD KEY `id_admina` (`id_admina`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`id_zakupu`),
  ADD KEY `id_zakupu` (`id_zakupu`,`id_uzytkownika`,`id_produktu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `id_admina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zakupy`
--
ALTER TABLE `zakupy`
  MODIFY `id_zakupu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `zakupy_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`),
  ADD CONSTRAINT `zakupy_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
