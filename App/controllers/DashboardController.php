<?php
namespace Controllers;

use Models\Dashboard;
use Views\DashboardView;

class DashboardController {

    protected $dashboard; // Modèle Dashboard
    protected $dashView; // Vue Dashboard

    public function __construct() {
        $this->dashboard = new Dashboard(); // Initialisation du modèle Dashboard
        $this->dashView = new DashboardView(); // Initialisation de la vue Dashboard
    }

    /**
     * Manage dashboard operations based on sub-actions requested.
     *
     * Gère les opérations du tableau de bord en fonction des sous-actions demandées.
     */
    public function dashboardManagement() {
        // Check if user is authenticated
        if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
            http_response_code(404);
            echo "404 Not Found";
            exit();
        }

        $sub = $_REQUEST['sub'] ?? null;

        $this->dashView->dashboardMenu(); // Display the dashboard menu

        switch ($sub) {
            default:
                break;
            // PROJECTS
            case 'dash_projects':
                $this->manageProjects(); // Manage projects
                $this->dashView->displayCreateProjectForm(); // Display form to create a project
                break;
            case 'dash_edit_project':
                $projectId = $_REQUEST['id'] ?? null;
                if ($projectId) {
                    $project = $this->dashboard->getProjectById($projectId); // Get project by ID
                    $this->dashView->displayEditProjectForm($project); // Display form to edit a project
                }
                break;
            case 'dash_create_project':
                $this->createProject(); // Create a new project
                break;
            case 'dash_update_project':
                $this->updateProject(); // Update an existing project
                break;
            case 'dash_delete_project':
                $id = $_REQUEST['id'] ?? null;
                $this->dashboard->deleteProject($id); // Delete a project
                break;

            // EXPERIENCES
            case 'dash_exp':
                $this->manageExperiences(); // Manage experiences
                $this->dashView->displayCreateExperienceForm(); // Display form to create an experience
                break;
            case 'dash_edit_experience':
                $experienceId = $_REQUEST['id'] ?? null;
                if ($experienceId) {
                    $experience = $this->dashboard->getExperienceById($experienceId); // Get experience by ID
                    $this->dashView->displayEditExperienceForm($experience); // Display form to edit an experience
                }
                break;
            case 'dash_create_experience':
                $this->createExperience(); // Create a new experience
                break;
            case 'dash_update_experience':
                $this->updateExperience(); // Update an existing experience
                break;
            case 'dash_delete_experience':
                $id = $_REQUEST['id'] ?? null;
                $this->dashboard->deleteExperience($id); // Delete an experience
                break;

            // SKILLS
            case 'dash_skills':
                $this->manageSkills(); // Manage skills
                $this->dashView->displayCreateSkillForm(); // Display form to create a skill
                break;
            case 'dash_edit_skill':
                $skillId = $_REQUEST['id'] ?? null;
                if ($skillId) {
                    $skill = $this->dashboard->getSkillById($skillId); // Get skill by ID
                    $this->dashView->displayEditSkillForm($skill); // Display form to edit a skill
                }
                break;
            case 'dash_create_skill':
                $this->createSkill(); // Create a new skill
                break;
            case 'dash_update_skill':
                $this->updateSkill(); // Update an existing skill
                break;
            case 'dash_delete_skill':
                $id = $_REQUEST['id'] ?? null;
                $this->dashboard->deleteSkill($id); // Delete a skill
                break;

            // CONTACT
            case 'dash_contact':
                $this->manageContact(); // Manage contact messages
                break;
            case 'dash_confirm_contact':
                $this->receptionContact(); // Confirm reception of contact message
                break;
            case 'dash_answer_contact':
                $this->sendMsgContact(); // Send a response to a contact message
                break;
            case 'dash_out':
                $this->logout(); // Logout user
                break;
        }
    }

    /**
     * Manage projects and display them using DashboardView.
     *
     * Gère les projets et les affiche en utilisant DashboardView.
     */
    public function manageProjects() {
        $projects = $this->dashboard->getProjects(); // Récupère les projets
        $this->dashView->displayProjects($projects); // Affiche les projets
    }

    /**
     * Create a new project and redirect to dashboard projects section.
     *
     * Crée un nouveau projet et redirige vers la section projets du tableau de bord.
     */
    public function createProject() {
        $this->dashboard->createProject(); // Crée un nouveau projet
        header('Location: ?action=dashboard&sub=dash_projects'); // Redirige vers la section projets du tableau de bord
        exit();
    }

    /**
     * Update an existing project and redirect to dashboard projects section.
     *
     * Met à jour un projet existant et redirige vers la section projets du tableau de bord.
     */
    public function updateProject() {
        $this->dashboard->updateProject(); // Met à jour un projet existant
        header('Location: ?action=dashboard&sub=dash_projects'); // Redirige vers la section projets du tableau de bord
        exit();
    }

    /**
     * Manage experiences and display them using DashboardView.
     *
     * Gère les expériences et les affiche en utilisant DashboardView.
     */
    public function manageExperiences() {
        $experiences = $this->dashboard->getExperiences(); // Récupère les expériences
        $this->dashView->displayExperiences($experiences); // Affiche les expériences
    }

    /**
     * Create a new experience and redirect to dashboard experiences section.
     *
     * Crée une nouvelle expérience et redirige vers la section expériences du tableau de bord.
     */
    public function createExperience() {
        $this->dashboard->createExperience(); // Crée une nouvelle expérience
        header('Location: ?action=dashboard&sub=dash_exp'); // Redirige vers la section expériences du tableau de bord
        exit();
    }

    /**
     * Update an existing experience and redirect to dashboard experiences section.
     *
     * Met à jour une expérience existante et redirige vers la section expériences du tableau de bord.
     */
    public function updateExperience() {
        $this->dashboard->updateExperience(); // Met à jour une expérience existante
        header('Location: ?action=dashboard&sub=dash_exp'); // Redirige vers la section expériences du tableau de bord
        exit();
    }

    /**
     * Manage skills and display them using DashboardView.
     *
     * Gère les compétences et les affiche en utilisant DashboardView.
     */
    public function manageSkills() {
        $skills = $this->dashboard->getSkills(); // Récupère les compétences
        $this->dashView->displaySkills($skills); // Affiche les compétences
    }

    /**
     * Create a new skill and redirect to dashboard skills section.
     *
     * Crée une nouvelle compétence et redirige vers la section compétences du tableau de bord.
     */
    public function createSkill() {
        $this->dashboard->createSkill(); // Crée une nouvelle compétence
        header('Location: ?action=dashboard&sub=dash_skills'); // Redirige vers la section compétences du tableau de bord
        exit();
    }

    /**
     * Update an existing skill and redirect to dashboard skills section.
     *
     * Met à jour une compétence existante et redirige vers la section compétences du tableau de bord.
     */
    public function updateSkill() {
        $this->dashboard->updateSkill(); // Met à jour une compétence existante
        header('Location: ?action=dashboard&sub=dash_skills'); // Redirige vers la section compétences du tableau de bord
        exit();
    }

    /**
     * Manage contact messages and display them using DashboardView.
     *
     * Gère les messages de contact et les affiche en utilisant DashboardView.
     */
    public function manageContact() {
        $contact = $this->dashboard->getContact(); // Récupère les messages de contact
        $this->dashView->displayContact($contact); // Affiche les messages de contact
    }

    /**
     * Confirm reception of a contact message.
     *
     * Confirme la réception d'un message de contact.
     */
    public function receptionContact() {
        $id = $_GET['id']; // Récupère l'ID du message
        $this->dashboard->confirmContact($id); // Confirme la réception du message de contact
    }

    /**
     * Send a response to a contact message.
     *
     * Envoie une réponse à un message de contact.
     */
    public function sendMsgContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dashboard->sendResponseContact(); // Envoie une réponse au message de contact
        } else {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $contact = $this->dashboard->getContactById($id); // Récupère le message de contact par ID
                if ($contact) {
                    $this->dashView->displayContactForm($contact); // Affiche le formulaire de réponse au message de contact
                } else {
                    echo "Contact not found.";
                }
            } else {
                echo "Invalid request. Contact ID is missing.";
            }
        }
    }

    /**
     * Logout user and redirect to homepage.
     *
     * Déconnecte l'utilisateur et redirige vers la page d'accueil.
     */
    public function logout() {
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        header('Location: http://localhost/hcairo@dev/'); // Redirige vers la page d'accueil
        exit();
    }
}