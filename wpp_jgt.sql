-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Jul 2017 um 17:15
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wpp_jgt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anmeldungen`
--

CREATE TABLE `anmeldungen` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `premieren`
--

CREATE TABLE `premieren` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Produktion` varchar(50) NOT NULL,
  `Spieler` text NOT NULL,
  `PremiereDatum` datetime NOT NULL,
  `Ort` varchar(50) NOT NULL,
  `Beschrieb` text NOT NULL,
  `Video` text NOT NULL,
  `Bilder` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `premieren`
--

INSERT INTO `premieren` (`ID`, `UserID`, `Produktion`, `Spieler`, `PremiereDatum`, `Ort`, `Beschrieb`, `Video`, `Bilder`) VALUES
(38, 1, 'dfs', 'adf', '2017-07-01 13:50:00', 'asfd', 'asdf', 'https://www.youtube.com/watch?v=Uiszqc68l04', '.jpg'),
(39, 1, 'asdasd', 'asdasd', '2017-06-28 13:50:00', 'asdf', 'asf', 'https://www.youtube.com/watch?v=Uiszqc68l04', '.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(7) UNSIGNED NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Activated` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `Confirmation` char(40) NOT NULL DEFAULT '',
  `RegDate` int(11) UNSIGNED NOT NULL,
  `LastLogin` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `GroupID` int(2) UNSIGNED NOT NULL DEFAULT '1',
  `EnsembleName` varchar(50) NOT NULL,
  `StadtKanton` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `Activated`, `Confirmation`, `RegDate`, `LastLogin`, `GroupID`, `EnsembleName`, `StadtKanton`) VALUES
(1, 'testUser', '900769613645e493dfdee30b5473d84b39680c67', 'berke@quickline.ch', 1, '15010109ce734e1b9bcc403b834aa7c24820d87d', 1499448676, 1500572905, 3, 'hÃ¶ttechÃ¤s', '5737 Menziken, Aargau'),
(2, 'test2', 'sdfgsergafadfaweradfasdf', 'sowiso@so.ch', 1, '', 1234124, 124143, 1, '', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `anmeldungen`
--
ALTER TABLE `anmeldungen`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indizes für die Tabelle `premieren`
--
ALTER TABLE `premieren`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `anmeldungen`
--
ALTER TABLE `anmeldungen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `premieren`
--
ALTER TABLE `premieren`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
