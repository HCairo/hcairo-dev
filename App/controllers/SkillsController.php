<?php
namespace Controllers;

use Models\Skills;
use Views\SkillsView;

class SkillsController {
    protected $skills; // Modèle des compétences
    protected $skillsView; // Vue des compétences

    public function __construct() {
        $this->skills = new Skills(); // Initialisation du modèle des compétences
        $this->skillsView = new SkillsView(); // Initialisation de la vue des compétences
    }

    /**
     * Display skills by fetching them from the model and rendering the view.
     *
     * Affiche les compétences en les récupérant depuis le modèle et en rendant la vue.
     */
    public function displaySkills() {
        $skills = $this->skills->fetchSkills(); // Récupère les compétences depuis le modèle
        $this->skillsView->renderView($skills); // Rend la vue des compétences avec les compétences récupérées
    }
}