-- script ARAM
-- postgresql:    	
-------------------------------------------------------

DROP TABLE IF EXISTS utilisateur CASCADE;
DROP TABLE IF EXISTS portfolio CASCADE;
DROP TABLE IF EXISTS page CASCADE;

CREATE TABLE utilisateur(
    idUser SERIAL PRIMARY KEY,
    prenom VARCHAR(20) NOT NULL,
    nom VARCHAR(20) NOT NULL,
    mdp VARCHAR(20) NOT NULL,
    mail VARCHAR(50) NOT NULL
);

CREATE TABLE portfolio(
    idPortfolio SERIAL PRIMARY KEY,
    nomPortfolio VARCHAR(25) NOT NULL,
    estPublic BOOLEAN NOT NULL,
    idUser INTEGER REFERENCES utilisateur(idUser)
);

CREATE TABLE page(
    idPage SERIAL PRIMARY KEY,
    nomPage VARCHAR(25) NOT NULL CHECK (nomPage IN ('CV', 'Competences', 'Projets', 'Contact', 'Accueil')),
    contenu JSON,
    idPortfolio INTEGER REFERENCES portfolio(idPortfolio)
);
