-- init.sql
CREATE DATABASE IF NOT EXISTS cyber2;
DROP USER IF EXISTS 'admin'@'%';
CREATE USER 'admin'@'%' IDENTIFIED BY 'P@$$w0rd';
GRANT ALL PRIVILEGES ON cyber2.* TO 'admin'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;

-- Utilise la base de données créée par les variables d'environnement (auth_db)
USE cyber2;


-- Insertion d'un utilisateur par défaut
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,  -- Mot de passe en clair pour la démo
  credit_card VARCHAR(20),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users (username, password, credit_card)
VALUES ('admin', 'secret','XXXX-XX-XXXX-XXXXX');

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(100),
  image_path VARCHAR(255),
  price DECIMAL(10,2),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO products (product_name, image_path, price)
VALUES ('jeux de flechettes', 'images/jeuxflechettes.png',50);
