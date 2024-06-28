/* SCRIPT CREATION DE LA DATABASE */
DROP DATABASE IF EXISTS hcairodev;
CREATE DATABASE hcairodev
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;
USE hcairodev;

/* Structure de la table admin */

CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    mail VARCHAR(255) NOT NULL,
    token VARCHAR(255),
    token_expires_at DATETIME
);

/* Structure de la table contact */

CREATE TABLE contact (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(80) NOT NULL,
    lastname VARCHAR(80) NOT NULL,
    mail VARCHAR(180) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    sent DATETIME DEFAULT CURRENT_TIMESTAMP,
    received ENUM('NO', 'YES') DEFAULT 'NO'
);

/* Structure de la table skills */

CREATE TABLE skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    img_url TEXT,
    level ENUM('Decent', 'Good', 'Pro')
);

/* Structure de la table experiences */

CREATE TABLE experiences (
    id INT PRIMARY KEY AUTO_INCREMENT,
    company VARCHAR(80) NOT NULL,
    img_url TEXT,
    role VARCHAR(50) NOT NULL,
    description TEXT,
        start_date DATE,
        end_date DATE
);

/* Structure de la table projects */

CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    img_url TEXT,
    description TEXT,
    technology TEXT,
    link TEXT
);

/* Remplissage de la table admin */

INSERT INTO admin (mail) VALUES ('hcairo@dev');

/* Remplissage de la table contact */

INSERT INTO contact (firstname, lastname, mail, phone) VALUES ('Joe', 'Mister', 'joe@mister.com', '07 29 40 39 26');

/* Remplissage de la table skills */

/* Remplissage de la table experiences */

INSERT INTO experiences (company, role, description, start_date, end_date) VALUES ('Apple', 'DevOps', 'IDK', '2023-04-29', '2024-01-18');

/* Remplissage de la table projects */