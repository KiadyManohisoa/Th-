use db_p16_ETU002375;

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
   dateDebutPlantation DATE NOT NULL,
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

CREATE TABLE The_SalKilo(
   id INT PRIMARY KEY AUTO_INCREMENT,
   salaire DECIMAL(15,2)   NOT NULL,
   dateMouvement DATE NOT NULL
);

CREATE TABLE The_Cueillette (
   id INT PRIMARY KEY AUTO_INCREMENT,
   dateCueillette DATE NOT NULL,
   poids DECIMAL(15,2) NOT NULL,
   bonus SMALLINT NOT NULL,
   mallus SMALLINT NOT NULL,
   commission DECIMAL(14,2) NOT NULL,
   idCueilleur INT REFERENCES The_Cueilleur(id),
   idParcelle INT REFERENCES The_Parcelle(id) 
);

CREATE TABLE The_Depense (
   id INT PRIMARY KEY AUTO_INCREMENT,
   dateDepense DATE NOT NULL,
   idCatDepense INT REFERENCES The_CatDepense(id),
   montant DECIMAL(15,2) NOT NULL
);

CREATE TABLE The_Saison(
   id INT AUTO_INCREMENT,
   dateMouvement DATE NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE The_MoisSaison(
   id INT AUTO_INCREMENT,
   idSaison INT NOT NULL,
   numMois TINYINT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idSaison) REFERENCES The_Saison(id)
);

CREATE TABLE The_ConfigPoids(
   id INT AUTO_INCREMENT,
   poidsMinimal DECIMAL(14,2)   NOT NULL,
   bonus SMALLINT NOT NULL,
   mallus SMALLINT NOT NULL,
   PRIMARY KEY(id)
);

INSERT INTO The_Connection (nom, nomUser, motDePasse, type) VALUES ('John Doe', 'john_doe', MD5('john'), 'a'),
('Jane Smith', 'jane_smith', MD5('jane'), 'u'),
('Alice Johnson', 'alice_j', MD5('alice'), 'u');

--liste des parcelles avec nom de variété
create or replace view v_the_parcelle as select p.id,p.surface,v.nom as variete,p.dateDebutPlantation from The_Parcelle p join The_Variete v on p.idVariete=v.id;