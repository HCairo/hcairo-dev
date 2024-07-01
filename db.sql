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
    secret TEXT NOT NULL;
);

/* Structure de la table contact */

CREATE TABLE contact (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(80) NOT NULL,
    lastname VARCHAR(80) NOT NULL,
    mail VARCHAR(180) NOT NULL,
    phone VARCHAR(25) NOT NULL,
    subject ENUM('Collaboration', 'General Inquiry', 'Feedback', 'Support', 'Other'),
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

INSERT INTO admin (mail, secret) VALUES ('hcairo@dev', '$argon2i$v=19$m=16,t=2,p=1$a3d6NmFsbXlkSjhVZW5LeA$eEXalSjPb6zanT3/WhgHTw');

/* Remplissage de la table contact */

INSERT INTO contact (firstname, lastname, mail, phone) VALUES ('Joe', 'Mister', 'joe@mister.com', '07 29 40 39 26');

/* Remplissage de la table skills */

/* Remplissage de la table experiences */

INSERT INTO `experiences` (`id`, `company`, `img_url`, `role`, `description`, `start_date`, `end_date`) VALUES
(1, 'Hopitaux de Lyon - Edouard Herriot', './assets/img/experiences/hcl.png', 'Developer', 'Development of a chatbot designed to assist Level 1 IT support by answering common questions. If the chatbot cannot answer a question, it will automatically transfer it to a human agent for further assistance.', '2023-09-03', '2024-10-31');

/* Remplissage de la table projects */

INSERT INTO `projects` (`id`, `name`, `img_url`, `description`, `technology`, `link`) VALUES
(1, 'NowTes', './assets/img/projects/icon.png', 'Note-taking and task management application.\r\n\r\nDeveloped as part of my Web & Mobile Developer training for my certification.', 'PHP, MYSQL, JS, SCSS, ...', 'http://localhost/project-nowtes'),
(2, 'Eshop - CCI', './assets/img/projects/eshop.png', 'Eshop project created during courses at the CCI Nord Isère.\r\nIntroduction to the MVC model in vanilla PHP.', 'PHP, JS, SCSS', 'http://localhost/E-Commerce-MVC'),
(3, 'ASCII Converter', './assets/img/projects/asciilogo.png', 'Image to ASCII conversion application.\r\nFirst project in Python.', 'Python, Ext. Python, HTML, CSS.', '#');