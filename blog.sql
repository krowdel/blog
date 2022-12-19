-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Gru 2022, 19:07
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `id_category` int(11) DEFAULT 1,
  `lang` varchar(4) NOT NULL DEFAULT 'pl',
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `shortcontent` text DEFAULT NULL,
  `date_add` datetime NOT NULL,
  `date_up` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `id_category`, `lang`, `title`, `content`, `published`, `shortcontent`, `date_add`, `date_up`) VALUES
(31, 1, 'pl', 'tttttttttfdfdsaf', '<p>sssssssssssss&nbsp;</p>', 1, 'ttttttttttttt', '2022-09-14 20:04:26', '2022-12-19 18:53:48'),
(32, 1, 'de', 'test cate', '<p>fdsafasd</p>', 1, 'sfsdafdsfasfds', '2022-09-14 20:13:13', '2022-09-27 18:10:54'),
(33, 1, 'pl', 'fdsfdsa', '<p>fdsaf</p>', 1, 'fdsfas', '2022-09-17 17:08:23', '2022-09-24 09:29:42'),
(35, 4, 'pl', 'fds testst ', '<p>fdsf fdsf sdaf dasf dfsads fdas fsda ffadsf dsaf fa</p>', 1, 'test ', '2022-09-24 10:11:09', '2022-09-24 10:47:59'),
(36, 8, 'pl', 'subeti', '<p>deszczdeszcze deszcze deszcze jest ok flagaflaga</p>', 0, 'flaga flaga flaga f', '2022-09-24 10:50:31', '2022-09-24 10:50:31'),
(37, 1, 'pl', 'tewss', '<p>fdsf fdsfsdaaf fdsafdsf fdsfsdaf fdas fsdfsdafjestem kotem jestem kotem jestem kotem jestem kotem jestem kotem jestem kotem jestem kotem flaga flaga gafa gafa gafa gafa gafa gafa jest&nbsp;</p>', 0, 'fds', '2022-10-02 13:19:54', '2022-10-02 13:30:41');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articletags`
--

CREATE TABLE `articletags` (
  `id_article` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `lang` varchar(4) NOT NULL DEFAULT 'pl',
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `lang`, `active`) VALUES
(1, 'Wiadomości', 'pl', 1),
(3, 'Popularne', 'en', 1),
(4, 'Cyberbiznes', 'de', 1),
(8, 'test', 'pl', 0),
(9, 'test 2', 'pl', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tags`
--

CREATE TABLE `tags` (
  `name_tag` varchar(120) NOT NULL,
  `id_article` int(11) NOT NULL,
  `lang` varchar(4) NOT NULL DEFAULT 'pl'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tags`
--

INSERT INTO `tags` (`name_tag`, `id_article`, `lang`) VALUES
('tes', 35, 'pl'),
('flafga', 36, 'pl'),
('flaga', 36, 'pl'),
('faka', 36, 'pl'),
('cyberbiznes', 32, 'pl'),
('flaga', 32, 'pl'),
('gospodarka', 32, 'pl'),
('tes', 32, 'pl'),
('cyberbiznes', 37, 'pl'),
('dfsdf', 31, 'pl'),
('cyberbiznes', 31, 'pl'),
('faka', 31, 'pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
