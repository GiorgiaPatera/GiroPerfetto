INSERT INTO `venditore` (`idvenditore`, `username`, `password`, `nome`, `brevedescrizione`, `via`, `comune`, `cap`) VALUES
(1, 'gio@giroperfetto.com', 'pass2025', 'Giorgia Patera', 'venditrice da poco', 'Ungheretti', 'Cesena', 47521),
(2, 'chri@giroperfetto.com', 'pass2025', 'Christian Remschi', 'appassionato di motori', 'Roma', 'Verona', 37100);

ALTER TABLE `venditore`
  MODIFY `idvenditore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
(12, 'ibrida'),
(13, 'nuovo'),
(14, 'usato'),
(15, 'inOfferta');

ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

INSERT INTO `articolo` (`idarticolo`, `titoloarticolo`, `testoarticolo`, `dataarticolo`, `imgarticolo`, `venditore`, `prezzoarticolo`) VALUES
(1, 'Mazda MX-5', '\"Mazda MX-5 è progettata per offrire una esperienza di guida unica e indimenticabile grazie alla sua precisione, alla sua potenza e alle sue prestazioni. I miglioramenti apportati al telaio, alla sicurezza e alla tecnologia nella versione 2024 garantiscono ancora più reattività, uno stile sempre inconfondibile e un piacere di guida senza rivali.\"\r\n\r\n', '2025-01-19', 'mazda-mx-5.jpg', 1, 25300.00),
(2, 'BMW i4', '\"La nuova BMW i4 Gran Coupé è sportiva e 100% elettrica. Invece di emissioni locali, lascia dietro di sé una impressione duratura: il nuovo design della parte anteriore ne enfatizza la indole sportiva. La parte posteriore è caratterizzata da eleganti gruppi ottici che ne esaltano la estetica complessiva. Il nuovo design del volante e la illuminazione a cascata creano un abitacolo dalla atmosfera moderna. Scopri tutte le varianti di modello della nuova BMW Serie Gran Coupé, le sue opzioni di allestimento, i dati tecnici e tutte le possibilità per il acquisto in leasing o con finanziamento.\"\r\n\r\n', '2025-01-21', 'bmw-i4.png', 1, 60000.00);

ALTER TABLE `articolo`
  MODIFY `idarticolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

INSERT INTO `articolo_ha_categoria` (`articolo`, `categoria`) VALUES
(1, 1),
(1, 8),
(1, 12),
(1, 13),
(2, 1),
(2, 7),
(2, 11),
(2, 15);