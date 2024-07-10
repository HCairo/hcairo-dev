<?php
namespace Controllers;

use Models\Projects;
use Views\ProjectsView;

class ProjectsController {
    protected $projects; // Modèle de projets
    protected $projectsView; // Vue de projets

    public function __construct() {
        $this->projects = new Projects(); // Initialisation du modèle de projets
        $this->projectsView = new ProjectsView(); // Initialisation de la vue de projets
    }

    /**
     * Display projects by fetching them from the model and rendering the view.
     *
     * Affiche les projets en les récupérant depuis le modèle et en rendant la vue.
     */
    public function displayProjects() {
        $projects = $this->projects->fetchProjects(); // Récupère les projets depuis le modèle
        $this->projectsView->renderView($projects); // Rend la vue de projets avec les projets récupérés
    }
}