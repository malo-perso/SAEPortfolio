-- script PAC.sql
-- postgresql:    	
-------------------------------------------------------

DROP TABLE IF EXISTS utilisateur CASCADE;
DROP TABLE IF EXISTS portfolio CASCADE;
DROP TABLE IF EXISTS page CASCADE;

CREATE TABLE utilisateur(
    pseudo VARCHAR(20) PRIMARY KEY,
    mdp VARCHAR(20) NOT NULL,
    mail VARCHAR(50) NOT NULL
);

CREATE TABLE portfolio(
    idPortfolio SERIAL PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    estPublic BOOLEAN NOT NULL,
    pseudo VARCHAR(20) REFERENCES utilisateur(pseudo)
);

CREATE TABLE page(
    idPage SERIAL PRIMARY KEY,
    nom VARCHAR(20) NOT NULL,
    contenu VARCHAR(1000) NOT NULL,
    idPortfolio INTEGER REFERENCES portfolio(idPortfolio)
);