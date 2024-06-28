<?php
namespace Controllers;

use Models\Projects;
use Views\ProjectsView;

class ProjectsController {
    protected $projects;
    protected $projectsView;

    public function __construct() {
        $this->projects = new Projects();
        $this->projectsView = new ProjectsView();
    }

    public function displayProjects() {
        $pro = $this->projects->fetchProjects();
        $this->projectsView->renderView($pro);
    }
}