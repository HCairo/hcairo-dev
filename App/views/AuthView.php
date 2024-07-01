<?php
namespace Views;

class AuthView {
    public function renderLoginForm() {
        echo '<div class="login-form-container">
            <h1>Login</h1>
            <form method="post" class="login-form">
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" name="mail" id="mail" required>
                </div>
                <div class="form-group">
                    <label for="secret_phrase">Secret Phrase</label>
                    <input type="password" name="secret" id="secret" required>
                </div>
                <button type="submit">Login</button>
            </form>';
    }

    public function displayMessage($message) {
        echo "<p>$message</p>";
    }
}
