-- 3. Insertion des données


-- Création des trois utilisateurs
INSERT INTO utilisateur (mdp, mail, nom, prenom)
VALUES ('Password1!', 'user1@mail.com', 'Nom1', 'Prenom1'),
       ('Password2!', 'user2@mail.com', 'Nom2', 'Prenom2'),
       ('Password3!', 'user3@mail.com', 'Nom3', 'Prenom3'),
       ('Password4!', 'user4@mail.com', 'Nom4', 'Prenom4'),
       ('Password5!', 'user5@mail.com', 'Nom5', 'Prenom5'),
       ('Password6!', 'user6@mail.com', 'Nom6', 'Prenom6');

-- Création d'un portfolio pour chaque utilisateur
INSERT INTO portfolio (nomPortfolio, estPublic, idUser)
VALUES ('Portfolio1', true, 1),
       ('Portfolio2', false, 2),
       ('Portfolio3', true, 3),
       ('Portfolio4', true, 4),
       ('Portfolio5', false, 5),
       ('Portfolio6', true, 6);

-- Création de deux pages pour chaque portfolio
INSERT INTO page (nomPage, contenu, idPortfolio)
VALUES ('Page1', null, 1),
       ('Page2', null, 1),
       ('Page1', null, 2),
       ('Page2', null, 2),
       ('Page1', null, 3),
       ('Page2', null, 3),
       ('Page1', null, 4),
       ('Page2', null, 4),
       ('Page1', null, 5),
       ('Page2', null, 5),
       ('Page1', null, 6),
       ('Page2', null, 6);

/**************************************************/

