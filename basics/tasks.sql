-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Dez 2021 um 14:28
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `todo_list`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0,
  `priority` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `done`, `priority`, `created_at`) VALUES
(1, 'waschen', 1, 'mittel', '2021-11-25 14:55:07'),
(3, 'putzen', 0, 'hoch', '2021-11-25 16:00:46'),
(4, 'putzen', 1, 'niedrig', '2021-12-02 14:16:41'),
(5, 'a', 0, 'mittel', '2021-12-02 14:30:32'),
(6, 'waschen', 0, 'mittel', '2021-12-02 14:44:19'),
(7, 'tee kochen', 0, 'mittel', '2021-12-02 14:53:51'),
(8, 'laufen', 0, 'niedrig', '2021-12-02 15:01:30');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
