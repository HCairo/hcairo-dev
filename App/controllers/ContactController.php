<?php
namespace Controllers;

use Models\Contact; // Utilisation du modèle Contact
use Views\ContactView; // Utilisation de la vue ContactView

class ContactController {
    protected $contact; // Instance du modèle Contact
    protected $contactView; // Instance de la vue ContactView

    public function __construct() {
        $this->contact = new Contact(); // Initialisation du modèle Contact
        $this->contactView = new ContactView(); // Initialisation de la vue ContactView
    }

    /**
     * Retrieve and display the contact form.
     * 
     * Récupère et affiche le formulaire de contact.
     */
    public function getContact() {
        $this->contactView->initForm(); // Initialise le formulaire de contact
        
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->contact->saveContact(); // Enregistre le contact
        }
    }
}