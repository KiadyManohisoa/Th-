create database the;

use the;

CREATE TABLE The_Connection(
   id INT AUTO_INCREMENT,
   nom VARCHAR(150)  NOT NULL,
   nomUser VARCHAR(20) ,
   motDePasse VARCHAR(260)  NOT NULL,
   type CHAR(1)  NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(nomUser)
);

CREATE TABLE The_Variete(
   id INT AUTO_INCREMENT,
   nom VARCHAR(30) ,
   occupation DECIMAL(15,2)   NOT NULL,
   rendement DECIMAL(15,2)   NOT NULL,
   PRIMARY KEY(id),
   UNIQUE(nom)
);

CREATE TABLE The_Parcelle(
   id INT AUTO_INCREMENT,
   surface DECIMAL(20,6)   NOT NULL,
   idVariete INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idVariete) REFERENCES The_Variete(id)
);

CREATE TABLE The_Cueilleur(
   id INT AUTO_INCREMENT,
   nom VARCHAR(100)  NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE The_CatDepense(
   id INT AUTO_INCREMENT,
   nom VARCHAR(25) ,
   PRIMARY KEY(id),
   UNIQUE(nom)
);

CREATE TABLE The_SalCueilleur(
   id INT AUTO_INCREMENT,
   salaire DECIMAL(15,2)   NOT NULL,
   PRIMARY KEY(id)
);
