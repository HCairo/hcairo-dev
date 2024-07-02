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
            header('Location: ?action=auth');
            exit();
        }

        $sub = $_REQUEST['sub'] ?? null;

        $this->dashView->dashboardMenu();

        switch ($sub) {
            default:
                break;
                // PROJECTS
            case 'dash_projects':
                $this->manageProjects();
                $this->dashView->displayCreateProjectForm();
                break;
            case 'dash_edit_project':
                $projectId = $_REQUEST['id'] ?? null;
                if ($projectId) {
                    $project = $this->dashboard->getProjectById($projectId);
                    $this->dashView->displayEditProjectForm($project);
                }
                break;
            case 'dash_create_project':
                $this->createProject();
                break;
            case 'dash_update_project':
                $this->updateProject();
                break;
            case 'dash_delete_project':
                $id = $_REQUEST['id'] ?? null;
                $this->dashboard->deleteProject($id);
                break;

                // EXPERIENCES
            case 'dash_exp':
                $this->manageExperiences();
                $this->dashView->displayCreateExperienceForm();
                break;
            case 'dash_edit_experience':
                $experienceId = $_REQUEST['id'] ?? null;
                if ($experienceId) {
                    $experience = $this->dashboard->getExperienceById($experienceId);
                    $this->dashView->displayEditExperienceForm($experience);
                }
                break;
            case 'dash_create_experience':
                $this->createExperience();
                break;
            case 'dash_update_experience':
                $this->updateExperience();
                break;
            case 'dash_delete_experience':
                $id = $_REQUEST['id'] ?? null;
                $this->dashboard->deleteExperience($id);
                break;

                // SKILLS
            case 'dash_skills':
                $this->manageSkills();
                $this->dashView->displayCreateSkillForm();
                break;
            case 'dash_edit_skill':
                $skillId = $_REQUEST['id'] ?? null;
                if ($skillId) {
                    $skill = $this->dashboard->getSkillById($skillId);
                    $this->dashView->displayEditSkillForm($skill);
                }
                break;
            case 'dash_create_skill':
                $this->createSkill();
                break;
            case 'dash_update_skill':
                $this->updateSkill();
                break;
            case 'dash_delete_skill':
                $id = $_REQUEST['id'] ?? null;
                $this->dashboard->deleteSkill($id);
                break;

                // CONTACT
            case 'dash_contact':
                $this->manageContact();
                break;
            case 'dash_out':
                $this->logout();
                break;
        }
    }

    public function manageProjects() {
        $projects = $this->dashboard->getProjects();
        $this->dashView->displayProjects($projects);
    }

    public function createProject() {
        $this->dashboard->createProject();
        header('Location: ?action=dashboard&sub=dash_projects');
        exit();
    }

    public function updateProject() {
        $this->dashboard->updateProject();
        header('Location: ?action=dashboard&sub=dash_projects');
        exit();
    }


    public function manageExperiences() {
        $experiences = $this->dashboard->getExperiences();
        $this->dashView->displayExperiences($experiences);
    }

    public function createExperience() {
        $this->dashboard->createExperience();
        header('Location: ?action=dashboard&sub=dash_exp');
        exit();
    }

    public function updateExperience() {
        $this->dashboard->updateExperience();
        header('Location: ?action=dashboard&sub=dash_exp');
        exit();
    }


    public function manageSkills() {
        $skills = $this->dashboard->getSkills();
        $this->dashView->displaySkills($skills);
    }

    public function createSkill() {
        $this->dashboard->createSkill();
        header('Location: ?action=dashboard&sub=dash_skills');
        exit();
    }

    public function updateSkill() {
        $this->dashboard->updateSkill();
        header('Location: ?action=dashboard&sub=dash_skills');
        exit();
    }


    public function manageContact() {
        // Your logic for managing contact
    }


    public function logout() {
        session_unset();
        session_destroy();
        header('Location: http://localhost/hcairo@dev/');
        exit();
    }
}
