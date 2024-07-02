<?php
require_once('vendor/autoload.php');

use Dotenv\Dotenv;
use Controllers\HomeController;
use Controllers\AuthController;
use Controllers\SkillsController;
use Controllers\ExpController;
use Controllers\ContactController;
use Controllers\ProjectsController;
use Controllers\DashboardController;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$action = $_REQUEST['action'] ?? null;

switch ($action) {
    default:
        $controller = new HomeController();
        $controller->displayPage();
        break;
    case 'projects':
        $controller = new ProjectsController();
        $controller->displayProjects();
        break;
    case 'exp':
        $controller = new ExpController();
        $controller->displayExperiences();
        break;
    case 'skills':
        $controller = new SkillsController();
        // Call appropriate method in SkillsController
        break;
    case 'contact':
        $controller = new ContactController();
        $controller->getContact();
        break;
    case 'auth':
        // Handle authentication actions
        $controller = new AuthController();
        $controller->authenticate();
        break;
    case 'dashboard':
        $controller = new DashboardController();
        $controller->dashboardManagement();
        break;
}