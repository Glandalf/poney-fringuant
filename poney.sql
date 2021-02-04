-- Nettoyage et création de la base
DROP DATABASE IF EXISTS poney;
CREATE DATABASE poney;
USE poney;

-- Création des utilisateurs et affectation des droits
CREATE USER IF NOT EXISTS 'toto'@'localhost' IDENTIFIED BY 'super secret';
GRANT ALL ON DATABASE poney TO 'toto'@'localhost';

-- Création des tables
CREATE TABLE adherents (
    adherentID int PRIMARY KEY AUTO_INCREMENT,
    prenom varchar(50) NOT NULL,
    nom varchar(50) NOT NULL,
    pseudo varchar(20) UNIQUE NOT NULL,
    `password` varchar(255) NOT NULL,
    email varchar(128) UNIQUE NOT NULL,
    numero varchar(20) UNIQUE NOT NULL,
    adresse1 varchar(128),
    codePostal int,
    ville varchar(20),
    dateAdhesion date NOT NULL,
    
    INDEX (nom) -- Permet d'optimiser la recherche d'un adhérent par son nom
);

CREATE TABLE interets (
    interetID int PRIMARY KEY AUTO_INCREMENT,
    nom varchar(20) UNIQUE NOT NULL
);

CREATE TABLE profils (
    profilID int PRIMARY KEY AUTO_INCREMENT,
    titre varchar(50) NOT NULL,
    photo varchar(50),
    `description` text NOT NULL,
    adherentID int NOT NULL,

    CONSTRAINT adherentID_FK FOREIGN KEY (adherentID) REFERENCES adherents (adherentID) 
        ON DELETE CASCADE -- Si l'adhérent référencé par la clé est supprimé, le profil le sera aussi 
);

CREATE TABLE interetAdherent (
    centreInteretID int NOT NULL,
    adherentID int NOT NULL,

    PRIMARY KEY (centreInteretID, adherentID), -- La clé primaire de la table interetAdherent est "composée" par un couple centreInteretID et adherentID
    CONSTRAINT interet_FK FOREIGN KEY (centreInteretID) REFERENCES interets (interetID),
    CONSTRAINT adherentID_interet_FK FOREIGN KEY (adherentID) REFERENCES adherents (adherentID)
);

