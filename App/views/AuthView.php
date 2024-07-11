<?php
namespace Views;

class AuthView {
    // Méthode pour afficher le formulaire de connexion
    // Method to render the login form
    public function renderLoginForm() {
        echo '<div class="login-form-container" role="form" aria-label="Admin Authentification">
            <h1>Login</h1>
            <form method="post" class="login-form">
                <div class="form-group" role="">
                    <label for="mail">Email</label> <!-- Champ pour l\'adresse email -->
                    <!-- Field for email address -->
                    <input type="email" name="mail" id="mail" required>
                </div>
                <div class="form-group" role="">
                    <label for="secret_phrase">Secret Phrase</label> <!-- Champ pour la phrase secrète -->
                    <!-- Field for secret phrase -->
                    <input type="password" name="secret" id="secret" required>
                </div>
                <button type="submit">Login</button> <!-- Bouton pour se connecter -->
                <!-- Button to log in -->
            </form>';
    }

    // Méthode pour afficher un message
    // Method to display a message
    public function displayMessage($message) {
        echo "<p>$message</p>"; // Affiche le message passé en paramètre
                                // Displays the message passed as parameter
    }
}
