<?php
namespace Controllers;

use Models\Legal;
use Views\LegalView;

class LegalController {
    protected $legal; // Modèle de la page des mentions legales
    protected $legalView; // Vue de la page des mentions legales

    public function __construct() {
        $this->legal = new Legal(); // Initialisation du modèle de la page des mentions legales
        $this->legalView = new LegalView(); // Initialisation de la vue de la page des mentions legales
    }

    public function displayPage() {
        $this->legalView->renderView(); // Rend la vue de la page d'accueil avec les projets récupérés
    }
}