INSERT INTO The_Connection (nom, nomUser, motDePasse, type) VALUES ('John Doe', 'john_doe', MD5('john'), 'a'),
('Jane Smith', 'jane_smith', MD5('jane'), 'u'),
('Alice Johnson', 'alice_j', MD5('alice'), 'u');

--liste des parcelles avec nom de variété
create or replace view v_the_parcelle as select p.id,p.surface,v.nom as variete,p.dateDebutPlantation from The_Parcelle p join The_Variete v on p.idVariete=v.id;