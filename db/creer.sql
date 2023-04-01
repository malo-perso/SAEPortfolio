-- script PAC.sql
-- postgresql:    	
-------------------------------------------------------

DROP TABLE IF EXISTS utilisateur CASCADE;
DROP TABLE IF EXISTS portfolio CASCADE;
DROP TABLE IF EXISTS page CASCADE;

CREATE TABLE utilisateur(
    idUtilisateur SERIAL PRIMARY KEY,
    prenom VARCHAR(20) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    mdp VARCHAR(20) NOT NULL,
    mail VARCHAR(50) NOT NULL
);

CREATE TABLE portfolio(
    idPortfolio SERIAL PRIMARY KEY,
    nomPortfolio VARCHAR(20) NOT NULL,
    estPublic BOOLEAN NOT NULL,
    pseudo VARCHAR(20) REFERENCES utilisateur(idUtilisateur)
);

CREATE TABLE page(
    idPage SERIAL PRIMARY KEY,
    nomPage VARCHAR(20) NOT NULL,
    contenu JSON NOT NULL,
    idPortfolio INTEGER REFERENCES portfolio(idPortfolio),
);