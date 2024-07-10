<?php
namespace Controllers;

use Models\Authentification; // Importing the Authentification model
use Views\AuthView; // Importing the AuthView view

class AuthController {
    protected $auth; // Instance of the Authentification model
    protected $authView; // Instance of the AuthView view

    public function __construct() {
        $this->auth = new Authentification(); // Initializing the Authentification model
        $this->authView = new AuthView(); // Initializing the AuthView view
    }

    /**
     * Handles user authentication.
     * 
     * Gère l'authentification de l'utilisateur.
     */
    public function authenticate() {
        // Check if admin is already authenticated
        // Vérifie si l'administrateur est déjà authentifié
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
            header('Location: dashboard');
            exit();
        }

        // Process authentication attempt
        // Traite la tentative d'authentification
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST['mail'];
            $enteredSecretPhrase = $_POST['secret'];

            // Authenticate user credentials
            // Authentifie les identifiants de l'utilisateur
            $isValid = $this->auth->authenticateUser($mail, $enteredSecretPhrase);

            if ($isValid) {
                // Set session or token to indicate authenticated user
                // Définit une session ou un jeton pour indiquer que l'utilisateur est authentifié
                $_SESSION['authenticated'] = true;
                $this->authView->displayMessage("Connexion réussie !"); // Display success message

                // Redirect to dashboard after a delay
                // Redirige vers le tableau de bord après un délai
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "dashboard";
                    }, 3000);
                </script>';
                exit();
            } else {
                // Display error message and render login form again
                // Affiche un message d'erreur et rend à nouveau le formulaire de connexion
                $this->authView->displayMessage("Phrase secrète invalide. Veuillez réessayer.");
                $this->authView->renderLoginForm();
            }
        } else {
            // Render login form if no POST data received
            // Rend le formulaire de connexion si aucune donnée POST n'est reçue
            $this->authView->renderLoginForm();
        }
    }
}