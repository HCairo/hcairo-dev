<?php
namespace Controllers;

use Models\Home;
use Views\HomeView;

class HomeController {
    protected $home; // Modèle de la page d'accueil
    protected $homeView; // Vue de la page d'accueil

    public function __construct() {
        $this->home = new Home(); // Initialisation du modèle de la page d'accueil
        $this->homeView = new HomeView(); // Initialisation de la vue de la page d'accueil
    }

    /**
     * Display the home page by fetching projects from the model and rendering the view.
     *
     * Affiche la page d'accueil en récupérant les projets depuis le modèle et en rendant la vue.
     */
    public function displayPage() {
        $projects = $this->home->fetchProjects(); // Récupère les projets depuis le modèle de la page d'accueil
        $this->homeView->renderView($projects); // Rend la vue de la page d'accueil avec les projets récupérés
    }
}