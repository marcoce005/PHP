CREATE DATABASE formaggi;
USE formaggi;

CREATE TABLE caseifici(
	ID Integer PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(20),
    indirizzo VARCHAR(20),
    citta VARCHAR(20),
    provincia VARCHAR(20),
    logitudine Integer,
    latitudine Integer,
    nome_titolare VARCHAR(20)
);

CREATE TABLE immagini(
	ID Integer PRIMARY KEY AUTO_INCREMENT,
    descrizione TEXT,
    image_path VARCHAR(20),
    id_caseificio Integer NOT NULL,
    FOREIGN KEY(id_caseificio) REFERENCES caseifici(ID)
);

CREATE TABLE clienti(
	CF Integer PRIMARY KEY AUTO_INCREMENT,
    ragionesociale VARCHAR(20),
    indirizzo VARCHAR(20),
    citta VARCHAR(20),
    cap Integer
);

CREATE TABLE forma(
	ID Integer PRIMARY KEY AUTO_INCREMENT,
    caseificio Integer NOT NULL,
    FOREIGN KEY(caseificio) REFERENCES caseifici(ID),
    data_produzione DATE,
    stagionatura Integer,
    scelta VARCHAR(20),
    peso Integer,
    cliente Integer NOT NULL,
    FOREIGN KEY(cliente) REFERENCES clienti(CF),
    data_vendita DATE,
    prezzo Integer
);
