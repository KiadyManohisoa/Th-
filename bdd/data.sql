<<<<<<< HEAD
INSERT INTO The_Connection (nom, nomUser, motDePasse, type) VALUES ('John Doe', 'john_doe', MD5('john'), 'a'),
('Jane Smith', 'jane_smith', MD5('jane'), 'u'),
('Alice Johnson', 'alice_j', MD5('alice'), 'u');
=======
-- Inserting test data into The_Connection table with MD5 encryption

-- User with a username and password
INSERT INTO The_Connection (nom, nomUser, motDePasse, type) VALUES ('John Doe', 'john_doe', MD5('john'), 'a');

-- User without a username
INSERT INTO The_Connection (nom, nomUser, motDePasse, type) VALUES ('Jane Smith', 'jane_smith', MD5('jane'), 'u');

-- Another user with a username and password
INSERT INTO The_Connection (nom, nomUser, motDePasse, type) VALUES ('Alice Johnson', 'alice_j', MD5('alice'), 'u');
>>>>>>> f994ae32bb0224e872518e7db9c2f1cc11580ebd