CREATE DATABASE statistica;
USE statistica;

CREATE TABLE negozio(
id Integer PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(20),
    p_iva VARCHAR(16)
);

CREATE TABLE vendite(
id Integer PRIMARY KEY AUTO_INCREMENT,
    negozio Integer NOT NULL,
    giorno DATE,
    FOREIGN KEY (negozio) REFERENCES negozio(id)
);
