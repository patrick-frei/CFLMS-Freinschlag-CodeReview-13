-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 10. Aug 2020 um 13:12
-- Server-Version: 8.0.20-0ubuntu0.20.04.1
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr13_Patrick_Freinschlag_bigevents`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE `event` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `event`
--

INSERT INTO `event` (`id`, `name`, `datetime`, `description`, `image`, `capacity`, `email`, `phone`, `street`, `zip_code`, `city`, `url`, `type`) VALUES
(7, 'Hundertwasser - Schiele', '2020-08-07 10:00:00', 'Friedensreich Hundertwasser (1928–2000) shaped 20th-century art beyond the borders of Austria as a painter, designer of living spaces and pioneer of the environmental movement. His life-long, intense exploration of the personality and oeuvre of Egon Schiele (1890–1918) is largely unknown.\r\n\r\nAt the age of 20, when he was a student at the Vienna Academy of Fine Arts, the artist discovered Viennese Modernism through exhibitions and books: Schiele, especially, would later become a central point of reference for the internationally active artist. Hundertwasser honed his draftsmanship by studying Schiele’s drawings, successfully propagated Schiele’s art amongst his fellow artists in Paris, and in 1965 gave one of his works the title 622 Mourning Egon Schiele. Until his death, Hundertwasser surrounded himself in his studios and homes in Venice and New Zealand with reproductions of paintings and drawings by his highly esteemed fellow artist. Hundertwasser’s poetic text “I Love Schiele”, written in 1951, illustrates the extent to which he related to the artist: “I often dream like Schiele, my father, about flowers that are red, and birds and flying fish and gardens in velvet and emerald green and human beings who walk, weeping, in red-yellow and ocean-blue.”\r\n\r\nToday, 20 years after Hundertwasser’s death, the Leopold Museum is dedicating an exhibition, conceived as a dialogue, to these two iconic artists, which comprises some 170 exhibits. Shining the spotlight on central motifs and themes in the works of both artists, such as ensouled nature and the relationship between the individual and society, the exhibition illustrates analogies in their oeuvres that go beyond formal similarities. Through eminent loans from Austrian and international collections and archival material published for the first time, the exhibition retraces the artistic and spiritual kinship of two extraordinary 20th-century Austrian artists, who never had the chance to meet.', '2727f1900ee812ab09e3.jpeg', 3000, 'office@leopoldmuseum.org', '+43 1 525 70 0', 'Museumsplatz 1', '1070', 'Wien', 'www.leopoldmuseum.org', 'Music & Stage Shows'),
(8, 'Vienna Restaurant Week', '2020-08-31 15:00:00', 'Dozens of Vienna\'s top restaurants offer great menus at a reduced fixed price from August 31 to September 6.\r\nThe Vienna Restaurant Week is one of the culinary highlights of the year and offers an ideal opportunity to get to know the wide variety of high-end dining the city has to offer. Once again, excellent menus will be offered at a reduced fixed price. The surprise menus cost €14.50 at lunchtime (for two courses) and €29.50 in the evening (for three courses). For restaurants with two or three toques, there is surcharge of €5 and €10 respectively at lunchtime. In the evening, the price increases by €10 per toque.\r\n\r\nThe Vienna Restaurant Week is held twice a year. Around 80 leading restaurants with up to three toques each participate in the culinary week, offering diverse cooking of every genre. Restaurants participating this time include Sakai, Hansen, Das Spittelberg, Freyenstein, Albert, Labstelle, Lingenhel, Grace, Parlor, Edvard, Ludwig Van and many more.', '7528942ff5084fb126ed.jpeg', 1000, 'mail@restaurantwoche.wien', '01664812234', 'Spittelberg', '1020', 'Wien', 'http://restaurantwoche.wien/', 'Shopping, Wining & Dining'),
(11, 'Cocktail festival in the park', '2020-08-06 00:00:00', 'The who\'s who of the local bar scene is represented at Liquid Market and presents its signature drinks. New this year is that admission is tied to set days and times to prevent crowds of people gathering – but in return you pay a lower price. The ticket prices includes all drinks during your visit.\r\n\r\nThe final of the cocktail competition \"Tiki Match\" takes place on the Thursday. Consequently, there is the possibility to sample tropical cocktail creations every day in the specially constructed Tiki Village.', 'e239ce24f5987dbfd67e.jpeg', 9999, 'mail@liquidmarket.bar', '0664664664', 'Apollogasse 19', '1070', 'Wien', 'www.liquidmarket.bar', 'Lifestyle & Scene'),
(12, 'A virtual way to marvel at Vienna', '2021-01-01 00:00:00', 'You don\'t have to leave home to experience the sparkling magnificence of Vienna\'s museums and sights. Come with us on a virtual voyage of discovery through the collections and rooms of world-famous Viennese institutions like the Albertina, Kunsthistorisches Museum Vienna, Schönbrunn Palace and many other extraordinary places.\r\n\r\nDo you want to get to know the oeuvre of Gustav Klimt from the comfort of your couch, or go on a tour through the vaults of the Capuchin Crypt (Imperial Crypt), where the Habsburgs lie buried? Nothing could be easier. Many museums and sights offer virtual tours and show you the glory of their collections online. Click through the top 100 objects of the Naturhistorisches Museum Vienna, be impressed by the paintings of Egon Schiele in the Leopold Museum, and dive into the centuries-old collections of the Albertina.\r\n\r\nAnd a tip beforehand: The Belvedere invites you to take a virtual live guided tour of the museum on Facebook, every day at 3.00 pm.', 'adbd35416198686f791d.jpeg', 2333, 'mail@sightseeing.at', '010101254', 'Everywhere', '1020', 'Wien', 'wien.gv.at', 'Sightseeing');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `event`
--
ALTER TABLE `event`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
