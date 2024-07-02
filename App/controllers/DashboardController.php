<?php
namespace Controllers;

use Models\Dashboard;
use Views\DashboardView;

class DashboardController {

    protected $dashboard;
    protected $dashView;

    public function __construct() {
        $this->dashboard = new Dashboard();
        $this->dashView = new DashboardView();
    }

    public function dashboardManagement() {
        // Check if user is authenticated
        if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
            // Redirect to login page if not authenticated (though this should not happen in dashboard case)
            header('Location: auth');
            exit();
        }

        $sub = $_REQUEST['sub'] ?? null;

        switch ($sub) {
            default:
                $this->dashView->dashboardMenu();
                break;
            case 'dash_projects':
                $this->manageProjects();
                break;
            case 'dash_exp':
                $this->manageExperiences();
                break;
            case 'dash_skills':
                $this->manageSkills();
                break;
            case 'dash_contact':
                $this->manageContact();
                break;
            case 'dash_out':
                $this->logout();
        }
    }

    public function logout() {
        // Unset session variables or tokens
        session_unset();
        session_destroy();
        header('Location: http://localhost/hcairo@dev/'); // Redirect to homepage or login page
        exit();
    }

    private function manageProjects() {
        // Logic to manage projects
        // Example:
        $projects = $this->dashboard->getProjects();
        $this->dashView->displayProjects($projects);
    }

    private function manageExperiences() {
        // Logic to manage experiences
        // Example:
        $experiences = $this->dashboard->getExperiences();
        $this->dashView->displayExperiences($experiences);
    }

    private function manageSkills() {
        // Logic to manage skills
        // Example:
        $skills = $this->dashboard->getSkills();
        $this->dashView->displaySkills($skills);
    }

    private function manageContact() {
        // Logic to manage contact form
        // Example:

    }
}