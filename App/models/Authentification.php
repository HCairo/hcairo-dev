<?php
namespace Models;

use App\Database;
use PDO;

class Authentification {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function authenticateUser($mail, $enteredSecretPhrase) {
        $pdo = $this->db->getConnection()->prepare("SELECT secret FROM admin WHERE mail = ?");
        $pdo->execute([$mail]);
        $storedEncryptedSecretPhrase = $pdo->fetchColumn();

        return password_verify($enteredSecretPhrase, $storedEncryptedSecretPhrase);
    }
}