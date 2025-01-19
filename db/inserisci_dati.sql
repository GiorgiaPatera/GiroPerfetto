INSERT INTO `venditore` (`idautore`, `username`, `password`, `nome`) VALUES
(1, 'gio@giroperfetto.com', 'pass2025', 'Giorgia Patera'),
(2, 'chri@giroperfetto.com', 'pass2025', 'Christian Remschi');

ALTER TABLE `venditore`
  MODIFY `idautore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

INSERT INTO `categoria` (`idcategoria`, `nomecategoria`) VALUES
(1, 'autovettura'),
(2, 'motoveicolo'),
(3, 'autocarri'),
(4, 'autocaravan'),
(5, 'rosso'),
(6, 'blu'),
(7, 'nero'),
(8, 'bianco'),
(9, 'benzina'),
(10, 'diesel'),
(11, 'elettrica'),
(12, 'ibrida');

ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

INSERT INTO `articolo` (`idarticolo`, `titoloarticolo`, `testoarticolo`, `dataarticolo`, `anteprimaarticolo`, `imgarticolo`, `autore`, `prezzoarticolo`) VALUES
(1, 'Mazda MX-5', '\"Mazda MX-5 è progettata per offrire una esperienza di guida unica e indimenticabile grazie alla sua precisione, alla sua potenza e alle sue prestazioni. I miglioramenti apportati al telaio, alla sicurezza e alla tecnologia nella versione 2024 garantiscono ancora più reattività, uno stile sempre inconfondibile e un piacere di guida senza rivali.\"\r\n\r\n', '2025-01-19', 'Mazda MX-5 è progettata per offrire una esperienza di guida unica e indimenticabile.', 'GiroPerfettoLogo.png', 1, 25300.00);
-- (2, 'Intro alle Tecnologie Web Server Side', '\"\"\r\n\r\n', '2022-10-02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'php.png', 2),
-- (3, 'Intro alle tabelle accessibili', '\"\"\r\n\r\n', '2022-10-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'accessibility.jpg', 1);

ALTER TABLE `articolo`
  MODIFY `idarticolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

INSERT INTO `articolo_ha_categoria` (`articolo`, `categoria`) VALUES
(1, 1),
(1, 8),
(1, 12);