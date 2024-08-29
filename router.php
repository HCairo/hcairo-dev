<?php
// Charger les dépendances de Composer / Load Composer dependencies
require_once('vendor/autoload.php');

// Importer les classes nécessaires / Import necessary classes
use Dotenv\Dotenv;
use Controllers\ExpController;
use Controllers\AuthController;
use Controllers\HomeController;
use Controllers\LegalController;
use Controllers\SkillsController;
use Controllers\ContactController;
use Controllers\ProjectsController;
use Controllers\DashboardController;

// Charger les variables d'environnement depuis le fichier .env / Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Obtenir l'action de la requête / Get the action from the request
$action = $_REQUEST['action'] ?? null;

// Sélectionner le contrôleur approprié en fonction de l'action / Select the appropriate controller based on the action
switch ($action) {
    // Par défaut, afficher la page d'accueil / By default, display the home page
    default:
        $controller = new HomeController();
        $controller->displayPage();
        break;
    // Afficher les projets / Display projects
    case 'projects':
        $controller = new ProjectsController();
        $controller->displayProjects();
        break;
    // Afficher les expériences / Display experiences
    case 'exp':
        $controller = new ExpController();
        $controller->displayExperiences();
        break;
    // Afficher les compétences / Display skills
    case 'skills':
        $controller = new SkillsController();
        $controller->displaySkills();
        break;
    // Afficher les contacts / Display contacts
    case 'contact':
        $controller = new ContactController();
        $controller->getContact();
        break;
    // Gérer l'authentification / Handle authentication
    case 'auth':
        $controller = new AuthController();
        $controller->authenticate();
        break;
    // Gérer le tableau de bord / Handle the dashboard
    case 'dashboard':
        $controller = new DashboardController();
        $controller->dashboardManagement();
        break;
    // Gérer les mentions légales / 
    case 'legal':
        $controller = new LegalController();
        $controller->displayPage();
        break;
}