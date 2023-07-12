-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.1.101:3306
-- Creato il: Lug 12, 2023 alle 09:07
-- Versione del server: 10.11.4-MariaDB-log
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raw-phpmyadmin`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Autori`
--

CREATE TABLE `Autori` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cognome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dump dei dati per la tabella `Autori`
--

INSERT INTO `Autori` (`ID`, `Nome`, `Cognome`) VALUES
(1, 'John', 'Doe'),
(2, 'Jane', 'Smith'),
(3, 'Michael', 'Johnson'),
(4, 'Sarah', 'Williams'),
(5, 'Robert', 'Brown'),
(6, 'Emily', 'Davis'),
(7, 'David', 'Miller'),
(8, 'Olivia', 'Anderson'),
(9, 'Daniel', 'Wilson'),
(10, 'Sophia', 'Taylor'),
(11, 'Andrew', 'Clark'),
(12, 'Elizabeth', 'Thompson'),
(13, 'William', 'Thomas'),
(14, 'Ava', 'Walker'),
(15, 'Joseph', 'Harris'),
(16, 'Mia', 'Lewis'),
(17, 'Charles', 'Robinson'),
(18, 'Grace', 'Young'),
(19, 'Benjamin', 'Lee'),
(20, 'Chloe', 'Scott'),
(21, 'Samuel', 'Wright'),
(22, 'Victoria', 'Green'),
(23, 'Ethan', 'Hall'),
(24, 'Lily', 'Baker'),
(25, 'Matthew', 'King'),
(26, 'Natalie', 'Adams'),
(27, 'James', 'Parker'),
(28, 'Samantha', 'Hill'),
(29, 'Joshua', 'Cook'),
(30, 'Avery', 'Moore'),
(31, 'Daniel', 'White'),
(32, 'Addison', 'Carter'),
(33, 'David', 'Morris'),
(34, 'Layla', 'Turner'),
(35, 'John', 'Bennett'),
(36, 'Ella', 'Kelly'),
(37, 'Christopher', 'Mitchell'),
(38, 'Scarlett', 'Price'),
(39, 'Andrew', 'Wood'),
(40, 'Hannah', 'Gray'),
(41, 'Joseph', 'Bailey'),
(42, 'Amelia', 'Cole'),
(43, 'Michael', 'Rogers'),
(44, 'Abigail', 'Ward'),
(45, 'Alexander', 'Hayes'),
(46, 'Grace', 'Foster'),
(47, 'Daniel', 'Brooks'),
(48, 'Sophia', 'Cooper'),
(49, 'Lucas', 'Reed'),
(50, 'Avery', 'Peterson'),
(51, 'Ava', 'Sanders'),
(52, 'Ryan', 'Turner'),
(53, 'Lily', 'Morgan'),
(54, 'Benjamin', 'Butler'),
(55, 'Chloe', 'Simmons'),
(56, 'Jacob', 'Fisher'),
(57, 'Ella', 'Cox'),
(58, 'David', 'Barnes'),
(59, 'Elizabeth', 'Ross'),
(60, 'Jackson', 'Perry'),
(61, 'Aria', 'Bryant'),
(62, 'Noah', 'Powell'),
(63, 'Emily', 'Bennett'),
(64, 'Mason', 'Russell'),
(65, 'Sofia', 'Griffin'),
(66, 'Daniel', 'Diaz'),
(67, 'Avery', 'Harrison'),
(68, 'Harper', 'Stewart'),
(69, 'Carter', 'Parker'),
(70, 'Mia', 'Reyes'),
(71, 'William', 'Russell'),
(72, 'Evelyn', 'Ward'),
(73, 'Michael', 'Bell'),
(74, 'Madison', 'Watson'),
(75, 'Matthew', 'Price'),
(76, 'Scarlett', 'Foster'),
(77, 'Oliver', 'Brooks'),
(78, 'Grace', 'Jenkins'),
(79, 'Joshua', 'Wright'),
(80, 'Abigail', 'Carter'),
(81, 'Lucas', 'Cole'),
(82, 'Charlotte', 'Simmons'),
(83, 'Samuel', 'Reed'),
(84, 'Ella', 'Peterson'),
(85, 'Christopher', 'Bailey'),
(86, 'Avery', 'Cooper'),
(87, 'Emma', 'Morris'),
(88, 'Daniel', 'Turner'),
(89, 'Sophia', 'Bennett'),
(90, 'Jackson', 'Kelly'),
(91, 'Aria', 'Mitchell'),
(92, 'Logan', 'Price'),
(93, 'Lily', 'Bryant'),
(94, 'Benjamin', 'Powell'),
(95, 'Chloe', 'Henderson'),
(96, 'Ethan', 'Bennett'),
(97, 'Ava', 'Russell'),
(98, 'Jacob', 'Griffin'),
(99, 'Mia', 'Diaz'),
(100, 'William', 'Harrison'),
(101, 'Harper', 'Stewart'),
(102, 'John', 'Doe'),
(103, 'Jane', 'Smith'),
(104, 'Michael', 'Johnson'),
(105, 'Sarah', 'Williams'),
(106, 'Robert', 'Brown'),
(107, 'Emily', 'Davis'),
(108, 'David', 'Miller'),
(109, 'Olivia', 'Anderson'),
(110, 'Daniel', 'Wilson'),
(111, 'Sophia', 'Taylor'),
(112, 'Andrew', 'Clark'),
(113, 'Elizabeth', 'Thompson'),
(114, 'William', 'Thomas'),
(115, 'Ava', 'Walker'),
(116, 'Joseph', 'Harris'),
(117, 'Mia', 'Lewis'),
(118, 'Charles', 'Robinson'),
(119, 'Grace', 'Young'),
(120, 'Benjamin', 'Lee'),
(121, 'Chloe', 'Scott'),
(122, 'Samuel', 'Wright'),
(123, 'Victoria', 'Green'),
(124, 'Ethan', 'Hall'),
(125, 'Lily', 'Baker'),
(126, 'Matthew', 'King'),
(127, 'Natalie', 'Adams'),
(128, 'James', 'Parker'),
(129, 'Samantha', 'Hill'),
(130, 'Joshua', 'Cook'),
(131, 'Avery', 'Moore'),
(132, 'Daniel', 'White'),
(133, 'Addison', 'Carter'),
(134, 'David', 'Morris'),
(135, 'Layla', 'Turner'),
(136, 'John', 'Bennett'),
(137, 'Ella', 'Kelly'),
(138, 'Christopher', 'Mitchell'),
(139, 'Scarlett', 'Price'),
(140, 'Andrew', 'Wood'),
(141, 'Hannah', 'Gray'),
(142, 'Joseph', 'Bailey'),
(143, 'Amelia', 'Cole'),
(144, 'Michael', 'Rogers'),
(145, 'Abigail', 'Ward'),
(146, 'Alexander', 'Hayes'),
(147, 'Grace', 'Foster'),
(148, 'Daniel', 'Brooks'),
(149, 'Sophia', 'Cooper'),
(150, 'Lucas', 'Reed'),
(151, 'Avery', 'Peterson'),
(152, 'Ava', 'Sanders'),
(153, 'Ryan', 'Turner'),
(154, 'Lily', 'Morgan'),
(155, 'Benjamin', 'Butler'),
(156, 'Chloe', 'Simmons'),
(157, 'Jacob', 'Fisher'),
(158, 'Ella', 'Cox'),
(159, 'David', 'Barnes'),
(160, 'Elizabeth', 'Ross'),
(161, 'Jackson', 'Perry'),
(162, 'Aria', 'Bryant'),
(163, 'Noah', 'Powell'),
(164, 'Emily', 'Bennett'),
(165, 'Mason', 'Russell'),
(166, 'Sofia', 'Griffin'),
(167, 'Daniel', 'Diaz'),
(168, 'Avery', 'Harrison'),
(169, 'Harper', 'Stewart'),
(170, 'Carter', 'Parker'),
(171, 'Mia', 'Reyes'),
(172, 'William', 'Russell'),
(173, 'Evelyn', 'Ward'),
(174, 'Michael', 'Bell'),
(175, 'Madison', 'Watson'),
(176, 'Matthew', 'Price'),
(177, 'Scarlett', 'Foster'),
(178, 'Oliver', 'Brooks'),
(179, 'Grace', 'Jenkins'),
(180, 'Joshua', 'Wright'),
(181, 'Abigail', 'Carter'),
(182, 'Lucas', 'Cole'),
(183, 'Charlotte', 'Simmons'),
(184, 'Samuel', 'Reed'),
(185, 'Ella', 'Peterson'),
(186, 'Christopher', 'Bailey'),
(187, 'Avery', 'Cooper'),
(188, 'Emma', 'Morris'),
(189, 'Daniel', 'Turner'),
(190, 'Sophia', 'Bennett'),
(191, 'Jackson', 'Kelly'),
(192, 'Aria', 'Mitchell'),
(193, 'Logan', 'Price'),
(194, 'Lily', 'Bryant'),
(195, 'Benjamin', 'Powell'),
(196, 'Chloe', 'Henderson'),
(197, 'Ethan', 'Bennett'),
(198, 'Ava', 'Russell'),
(199, 'Jacob', 'Griffin'),
(200, 'Mia', 'Diaz'),
(201, 'William', 'Harrison'),
(202, 'Harper', 'Stewart');

-- --------------------------------------------------------

--
-- Struttura della tabella `Libri`
--

CREATE TABLE `Libri` (
  `ID` int(11) NOT NULL,
  `Titolo` varchar(100) NOT NULL,
  `AnnoPubblicazione` int(11) DEFAULT NULL,
  `AutoreID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dump dei dati per la tabella `Libri`
--

INSERT INTO `Libri` (`ID`, `Titolo`, `AnnoPubblicazione`, `AutoreID`) VALUES
(1, 'Il signore degli anelli', 1954, 1),
(2, 'Harry Potter e la pietra filosofale', 1997, 2),
(3, '1984', 1949, 3),
(4, 'Il conte di Montecristo', 1844, 4),
(5, 'Orgoglio e pregiudizio', 1813, 5),
(6, 'Cime tempestose', 1847, 6),
(7, 'Lo Hobbit', 1937, 1),
(8, 'Moby Dick', 1851, 7),
(9, 'Don Chisciotte', 1605, 8),
(10, 'La fattoria degli animali', 1945, 9),
(11, 'Cronache del ghiaccio e del fuoco', 1996, 10),
(12, 'Il grande Gatsby', 1925, 11),
(13, 'Il nome della rosa', 1980, 12),
(14, 'Anna Karenina', 1877, 13),
(15, 'Il processo', 1925, 14),
(16, 'Il giovane Holden', 1951, 15),
(17, 'Le avventure di Tom Sawyer', 1876, 16),
(18, 'Il padrino', 1969, 17),
(19, '1984', 1949, 3),
(20, 'La metamorfosi', 1915, 14),
(21, 'Cime tempestose', 1847, 6),
(22, 'Lo straniero', 1942, 18),
(23, 'Ulisse', 1922, 19),
(24, 'Il ritratto di Dorian Gray', 1890, 20),
(25, 'Il signore delle mosche', 1954, 21),
(26, 'Delitto e castigo', 1866, 22),
(27, 'La Divina Commedia', 1320, 23),
(28, 'Il vecchio e il mare', 1952, 24),
(29, 'Don Chisciotte', 1605, 8),
(30, 'Lolita', 1955, 25),
(31, 'Le cronache di Narnia', 1950, 26),
(32, 'Moby Dick', 1851, 7),
(33, 'Il giovane Holden', 1951, 15),
(34, 'L\'isola del tesoro', 1883, 27),
(35, 'Cent\'anni di solitudine', 1967, 28),
(36, 'La fattoria degli animali', 1945, 9),
(37, 'Il conte di Montecristo', 1844, 4),
(38, 'Il grande Gatsby', 1925, 11),
(39, '1984', 1949, 3),
(40, 'Lo Hobbit', 1937, 1),
(41, 'Il nome della rosa', 1980, 12),
(42, 'Don Chisciotte', 1605, 8),
(43, 'La fattoria degli animali', 1945, 9),
(44, 'Cronache del ghiaccio e del fuoco', 1996, 10),
(45, 'Il grande Gatsby', 1925, 11),
(46, 'Il nome della rosa', 1980, 12),
(47, 'Anna Karenina', 1877, 13),
(48, 'Il processo', 1925, 14),
(49, 'Il giovane Holden', 1951, 15),
(50, 'Le avventure di Tom Sawyer', 1876, 16),
(51, 'Il padrino', 1969, 17),
(52, '1984', 1949, 3),
(53, 'La metamorfosi', 1915, 14),
(54, 'Cime tempestose', 1847, 6),
(55, 'Lo straniero', 1942, 18),
(56, 'Ulisse', 1922, 19),
(57, 'Il ritratto di Dorian Gray', 1890, 20),
(58, 'Il signore delle mosche', 1954, 21),
(59, 'Delitto e castigo', 1866, 22),
(60, 'La Divina Commedia', 1320, 23),
(61, 'Il vecchio e il mare', 1952, 24),
(62, 'Don Chisciotte', 1605, 8),
(63, 'Lolita', 1955, 25),
(64, 'Le cronache di Narnia', 1950, 26),
(65, 'Moby Dick', 1851, 7),
(66, 'Il giovane Holden', 1951, 15),
(67, 'L\'isola del tesoro', 1883, 27),
(68, 'Cent\'anni di solitudine', 1967, 28),
(69, 'La fattoria degli animali', 1945, 9),
(70, 'Il conte di Montecristo', 1844, 4),
(71, 'Il grande Gatsby', 1925, 11),
(72, '1984', 1949, 3),
(73, 'Lo Hobbit', 1937, 1),
(74, 'Il nome della rosa', 1980, 12),
(75, 'Don Chisciotte', 1605, 8),
(76, 'La fattoria degli animali', 1945, 9),
(77, 'Cronache del ghiaccio e del fuoco', 1996, 10),
(78, 'Il grande Gatsby', 1925, 11),
(79, 'Il nome della rosa', 1980, 12),
(80, 'Anna Karenina', 1877, 13),
(81, 'Il processo', 1925, 14),
(82, 'Il giovane Holden', 1951, 15),
(83, 'Le avventure di Tom Sawyer', 1876, 16),
(84, 'Il padrino', 1969, 17),
(85, '1984', 1949, 3),
(86, 'La metamorfosi', 1915, 14),
(87, 'Cime tempestose', 1847, 6),
(88, 'Lo straniero', 1942, 18),
(89, 'Ulisse', 1922, 19),
(90, 'Il ritratto di Dorian Gray', 1890, 20),
(91, 'Il signore delle mosche', 1954, 21),
(92, 'Delitto e castigo', 1866, 22),
(93, 'La Divina Commedia', 1320, 23),
(94, 'Il vecchio e il mare', 1952, 24),
(95, 'Don Chisciotte', 1605, 8),
(96, 'Lolita', 1955, 25),
(97, 'Le cronache di Narnia', 1950, 26),
(98, 'Moby Dick', 1851, 7),
(99, 'Il giovane Holden', 1951, 15),
(100, 'L\'isola del tesoro', 1883, 27),
(101, 'Cent\'anni di solitudine', 1967, 28),
(102, 'La fattoria degli animali', 1945, 9),
(103, 'Il conte di Montecristo', 1844, 4),
(104, 'Il grande Gatsby', 1925, 11),
(105, '1984', 1949, 3),
(106, 'Lo Hobbit', 1937, 1),
(107, 'Il nome della rosa', 1980, 12),
(108, 'Don Chisciotte', 1605, 8),
(109, 'La fattoria degli animali', 1945, 9),
(110, 'Cronache del ghiaccio e del fuoco', 1996, 10),
(111, 'Il grande Gatsby', 1925, 11),
(112, 'Il nome della rosa', 1980, 12),
(113, 'Anna Karenina', 1877, 13),
(114, 'Il processo', 1925, 14),
(115, 'Il giovane Holden', 1951, 15),
(116, 'Le avventure di Tom Sawyer', 1876, 16),
(117, 'Il padrino', 1969, 17),
(118, '1984', 1949, 3),
(119, 'La metamorfosi', 1915, 14),
(120, 'Cime tempestose', 1847, 6),
(121, 'Lo straniero', 1942, 18),
(122, 'Ulisse', 1922, 19),
(123, 'Il ritratto di Dorian Gray', 1890, 20),
(124, 'Il signore delle mosche', 1954, 21),
(125, 'Delitto e castigo', 1866, 22),
(126, 'La Divina Commedia', 1320, 23),
(127, 'Il vecchio e il mare', 1952, 24),
(128, 'Don Chisciotte', 1605, 8),
(129, 'Lolita', 1955, 25),
(130, 'Le cronache di Narnia', 1950, 26),
(131, 'Moby Dick', 1851, 7),
(132, 'Il giovane Holden', 1951, 15),
(133, 'L\'isola del tesoro', 1883, 27),
(134, 'Cent\'anni di solitudine', 1967, 28);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Autori`
--
ALTER TABLE `Autori`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `Libri`
--
ALTER TABLE `Libri`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Autori`
--
ALTER TABLE `Autori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT per la tabella `Libri`
--
ALTER TABLE `Libri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
