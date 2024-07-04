CREATE DATABASE fatture;
USE fatture;

CREATE TABLE nominativi(
ID Integer PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    cognome VARCHAR(20) NOT NULL,
    ultimo_fatturato Integer NOT NULL,
    regione VARCHAR(20) NOT NULL,
    provincia VARCHAR(20) NOT NULL,
    provvigione Integer NOT NULL
);

INSERT INTO `nominativi` (`ID`, `nome`, `cognome`, `ultimo_fatturato`, `regione`, `provincia`, `provvigione`) VALUES (NULL, 'Ciro', 'Esposito', '120', 'Campania', 'Napoli', '30'), (NULL, 'Gianni', 'Rossi', '34', 'Lombardia', 'Milano', '40');
