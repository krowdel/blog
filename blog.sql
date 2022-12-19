-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 15 Wrz 2022, 20:07
-- Wersja serwera: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(5, 1, 'pl', 'Jakie korzyści otrzymuje firma korzystając z serwisu cyberbiznes.pl?', '<p><i>Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali <strong>nowymi podatkami, daninami co </strong>w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali <strong>nowymi podatkami, daninami co </strong>w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali <strong>nowymi podatkami, daninami co </strong>w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali <strong>nowymi podatkami, daninami co </strong>w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.</i></p><p><i>Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali <strong>nowymi podatkami, daninami co </strong>w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.</i></p>', 1, 'Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali nowymi podatkami, daninami co w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.', '2022-08-13 09:50:40', '2022-09-10 13:06:18'),
(6, 1, 'pl', 'Wojna na Ukrainie, a jej wpływ na firmy', '<p>Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali nowymi podatkami, daninami co w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali nowymi podatkami, daninami co w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali nowymi podatkami, daninami co w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali nowymi podatkami, daninami co w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.</p>', 1, 'Zmieniająca się rzeczywistość wymusza na przedsiębiorcach dostosowywanie swoich firm do warunków panujących w ich otoczeniu. Rok 2022 rozpoczął się gdy gospodarka cały czas nie wyszła z pandemii covid-19. Wielką niewiadomą jest Polski Ład. Reforma, która miała być panaceum na wiele problemów spowodowała jeszcze więcej problemów. Przedsiębiorcy przyduszeni zostali nowymi podatkami, daninami co w efekcie przekłada się na wzrost cen i inflację. Rosną ceny gazu, energii elektrycznej, rośnie inflacja. Do problemów wewnętrznych dołącza kolejny, prawdopodobnie największy. Wojna na Ukrainie. 24 lutego Rosja zaatakowała Ukrainę. Orędzie Putina nie pozostawia wątpliwości – wojna się rozpoczęła. W Kijowie wyją syreny a rosyjskie i białoruskie czołgi wjeżdżają w głąb Ukrainy. NATO, Unia Europejska wprowadzają sankcje na Rosję. Mówi się o odcięciu Rosji od systemu bankowego SWIFT. Nord Stream2 zostaje zablokowany, nikt tak naprawdę nie wie co będzie dalej z dostawami gazu od którego uzależniona jest Europa (elektrownie gazowe). Wojna i sankcje odbiją się również na polskich przedsiębiorstwach. Gospodarka to mechanizm naczyń połączonych.', '2022-08-13 09:52:28', '2022-09-10 13:05:59'),
(31, 1, 'pl', 'ttttttttt', '<p>sssssssssssss</p>', 0, 'ttttttttttttt', '2022-09-14 20:04:26', '2022-09-14 20:04:26'),
(32, 3, 'de', 'test cate', '<p>fdsafasd</p>', 1, 'sfsda', '2022-09-14 20:13:13', '2022-09-14 20:13:13');

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
(1, 'Wiadomości', 'pl', 0),
(3, 'Popularne', 'en', 0),
(4, 'Cyberbiznes', 'de', 1);

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
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
