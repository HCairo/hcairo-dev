/* SCRIPT FOR CREATING THE DATABASE */
/* SCRIPT DE CREATION DE LA BASE DE DONNEES */

-- Drop the database if it exists
-- Supprimer la base de données si elle existe
DROP DATABASE IF EXISTS hcairodev;

-- Create a new database with utf8mb4 character set and collation
-- Créer une nouvelle base de données avec le jeu de caractères utf8mb4 et le classement
CREATE DATABASE hcairodev
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;
USE hcairodev;

-- Table structure for 'admin'
-- Structure de la table 'admin'
CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,  -- Primary key with auto increment / Clé primaire avec auto-incrémentation
    mail VARCHAR(255) NOT NULL,         -- Email of the admin / Email de l'admin
    secret TEXT NOT NULL                -- Secret (e.g., password) / Secret (par exemple, mot de passe)
);

-- Table structure for 'contact'
-- Structure de la table 'contact'
CREATE TABLE contact (
    id INT PRIMARY KEY AUTO_INCREMENT,                   -- Primary key with auto increment / Clé primaire avec auto-incrémentation
    firstname VARCHAR(80) NOT NULL,                      -- First name / Prénom
    lastname VARCHAR(80) NOT NULL,                       -- Last name / Nom de famille
    mail VARCHAR(180) NOT NULL,                          -- Email / Email
    phone VARCHAR(25) NOT NULL,                          -- Phone number / Numéro de téléphone
    subject ENUM('Collaboration', 'General Inquiry',     -- Subject of contact / Sujet du contact
                 'Feedback', 'Support', 'Other'), 
    sent DATETIME DEFAULT CURRENT_TIMESTAMP,             -- Timestamp of when the contact was sent / Date et heure de l'envoi du contact
    received ENUM('NO', 'YES') DEFAULT 'NO'              -- Status of whether the contact was received / Statut de réception du contact
);

-- Table structure for 'skills'
-- Structure de la table 'skills'
CREATE TABLE skills (
    id INT PRIMARY KEY AUTO_INCREMENT,        -- Primary key with auto increment / Clé primaire avec auto-incrémentation
    name VARCHAR(80) NOT NULL,                -- Skill name / Nom de la compétence
    img_url TEXT,                             -- Image URL for the skill / URL de l'image pour la compétence
    level ENUM('Decent', 'Good', 'Pro')       -- Skill level / Niveau de compétence
);

-- Table structure for 'experiences'
-- Structure de la table 'experiences'
CREATE TABLE experiences (
    id INT PRIMARY KEY AUTO_INCREMENT,        -- Primary key with auto increment / Clé primaire avec auto-incrémentation
    company VARCHAR(80) NOT NULL,             -- Company name / Nom de l'entreprise
    img_url TEXT,                             -- Image URL for the company / URL de l'image pour l'entreprise
    role VARCHAR(50) NOT NULL,                -- Role in the company / Rôle dans l'entreprise
    description TEXT,                         -- Description of the experience / Description de l'expérience
    start_date DATE,                          -- Start date of the experience / Date de début de l'expérience
    end_date DATE                             -- End date of the experience / Date de fin de l'expérience
);

-- Table structure for 'projects'
-- Structure de la table 'projects'
CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,        -- Primary key with auto increment / Clé primaire avec auto-incrémentation
    name VARCHAR(80) NOT NULL,                -- Project name / Nom du projet
    img_url TEXT,                             -- Image URL for the project / URL de l'image pour le projet
    description TEXT,                         -- Description of the project / Description du projet
    technology TEXT,                          -- Technologies used in the project / Technologies utilisées dans le projet
    link TEXT                                 -- Link to the project / Lien vers le projet
);

-- Insert data into 'admin' table
-- Insérer des données dans la table 'admin'
INSERT INTO admin (mail, secret) VALUES ('hcairo@dev', '$argon2i$v=19$m=16,t=2,p=1$a3d6NmFsbXlkSjhVZW5LeA$eEXalSjPb6zanT3/WhgHTw');

-- Insert data into 'contact' table
-- Insérer des données dans la table 'contact'
INSERT INTO contact (firstname, lastname, mail, phone) VALUES ('Joe', 'Mister', 'joe@mister.com', '07 29 40 39 26');

-- Insert data into 'experiences' table
-- Insérer des données dans la table 'experiences'
INSERT INTO experiences (id, company, img_url, role, description, start_date, end_date) VALUES
(1, 'Hopitaux de Lyon - Edouard Herriot', './assets/img/experiences/hcl.png', 'Developer', 'Development of a chatbot designed to assist Level 1 IT support by answering common questions. If the chatbot cannot answer a question, it will automatically transfer it to a human agent for further assistance.', '2023-09-03', '2024-10-31');

-- Insert data into 'projects' table
-- Insérer des données dans la table 'projects'
INSERT INTO projects (id, name, img_url, description, technology, link) VALUES
(1, 'NowTes', './assets/img/projects/icon.png', 'Note-taking and task management application.\r\n\r\nDeveloped as part of my Web & Mobile Developer training for my certification.', 'PHP, MYSQL, JS, SCSS, ...', 'http://localhost/project-nowtes'),
(2, 'Eshop - CCI', './assets/img/projects/eshop.png', 'Eshop project created during courses at the CCI Nord Isère.\r\nIntroduction to the MVC model in vanilla PHP.', 'PHP, JS, SCSS', 'http://localhost/E-Commerce-MVC'),
(3, 'ASCII Converter', './assets/img/projects/asciilogo.png', 'Image to ASCII conversion application.\r\nFirst project in Python.', 'Python, Ext. Python, HTML, CSS.', '#');