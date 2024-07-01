<?php
namespace Views;

class ContactView {
    // Méthode pour initialiser le formulaire d'inscription
    public function initForm() {
        echo '<div class="contact-form-container">
            <h1>Contact me</h1>
            <form method="post" class="contact-form">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" required>
                </div>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="email" name="mail" id="mail" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select name="subject" id="subject" required>
                        <option value="Collaboration">Collaboration</option>
                        <option value="General Inquiry">General Inquiry</option>
                        <option value="Feedback">Feedback</option>
                        <option value="Support">Support</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <button type="submit">Send</button>
            </form>
            </div>';
    }
}