<?php
namespace Views;

class ContactView {
    // Méthode pour initialiser le formulaire de contact
    // Method to initialize the contact form
    public function initForm() {
        echo '<div class="contact-form-container" role="form" aria-label="Contact information">
        <h1>Contact me</h1>
        <form method="post" class="contact-form">
            <div class="form-group">
                <label for="firstname">Firstname</label> <!-- Champ pour le prénom -->
                <!-- Field for first name -->
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label> <!-- Champ pour le nom de famille -->
                <!-- Field for last name -->
                <input type="text" name="lastname" id="lastname" required>
            </div>
            <div class="form-group" >
                <label for="mail">Mail</label> <!-- Champ pour l\'adresse email -->
                <!-- Field for email address -->
                <input type="email" name="mail" id="mail" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label> <!-- Champ pour le numéro de téléphone -->
                <!-- Field for phone number -->
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label> <!-- Champ pour le sujet du message -->
                <!-- Field for message subject -->
                <select name="subject" id="subject" required>
                    <option value="Collaboration">Collaboration</option>
                    <option value="General Inquiry">General Inquiry</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Support">Support</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <button type="submit">Send</button> <!-- Bouton pour envoyer le formulaire -->
            <!-- Button to submit the form -->
        </form>
        </div>';
    }
}