<?php
namespace Controllers;

use Models\Experiences;
use Views\ExpView;

class ExpController {
    protected $experiences; // Expériences modèle
    protected $expView; // Vue Expériences

    public function __construct() {
        $this->experiences = new Experiences(); // Initialisation du modèle Expériences
        $this->expView = new ExpView(); // Initialisation de la vue Expériences
    }

    /**
     * Display the experiences by fetching them from the model and rendering the view.
     *
     * Affiche les expériences en les récupérant depuis le modèle et en rendant la vue.
     */
    public function displayExperiences() {
        $exp = $this->experiences->fetchExperiences(); // Récupère les expériences depuis le modèle
        $this->expView->renderView($exp); // Rend la vue Expériences avec les expériences récupérées
    }
}