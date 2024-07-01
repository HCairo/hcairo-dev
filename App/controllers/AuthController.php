<?php
namespace Controllers;

use Models\Authentification;
use Views\AuthView;

class AuthController {
    protected $auth;
    protected $authView;

    public function __construct() {
        $this->auth = new Authentification();
        $this->authView = new AuthView();
    }

    public function authenticate() {
        // Check if admin is already authenticated
        if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
            header('Location: dashboard');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST['mail'];
            $enteredSecretPhrase = $_POST['secret'];

            $isValid = $this->auth->authenticateUser($mail, $enteredSecretPhrase);

            if ($isValid) {
                // Set session or token to indicate authenticated user
                $_SESSION['authenticated'] = true;
                $this->authView->displayMessage("Login successfull !");

                echo '<script>
                setTimeout(function() {
                    window.location.href = "dashboard";
                }, 3000);
              </script>';

                exit();
            } else {
                $this->authView->displayMessage("Invalid secret phrase. Please try again.");
                $this->authView->renderLoginForm(); // Render login form again
            }
        } else {
            $this->authView->renderLoginForm();
        }
    }
}