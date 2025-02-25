-- Utilise la base de données créée par les variables d'environnement (auth_db)
USE cyber1;

-- Création d'une table simple pour stocker les utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insertion d'un utilisateur par défaut
INSERT INTO users (username, password)
VALUES ('admin', 'secret');
