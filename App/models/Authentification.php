<?php
namespace Models;

use App\Database;
use PDO;

class Authentification {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Authenticate user based on email and secret phrase.
     *
     * @param string $mail Email of the user
     * @param string $enteredSecretPhrase Entered secret phrase to verify
     * @return bool Returns true if authentication is successful, false otherwise
     */
    public function authenticateUser($mail, $enteredSecretPhrase) {
        // Prepare and execute SQL query to fetch stored encrypted secret phrase
        // Préparer et exécuter la requête SQL pour récupérer la phrase secrète cryptée stockée
        $pdo = $this->db->getConnection()->prepare("SELECT secret FROM admin WHERE mail = ?");
        $pdo->execute([$mail]);
        $storedEncryptedSecretPhrase = $pdo->fetchColumn();

        // Verify entered secret phrase with stored encrypted secret phrase
        // Vérifier la phrase secrète saisie avec la phrase secrète cryptée stockée
        return password_verify($enteredSecretPhrase, $storedEncryptedSecretPhrase);
    }
}