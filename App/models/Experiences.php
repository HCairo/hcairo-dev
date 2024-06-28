<?php
namespace Models;

use App\Database;
use PDO;

class Experiences {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchExperiences() {
        $query = "SELECT * FROM experiences";
        $pdo = $this->db->getConnection()->prepare($query);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }
}