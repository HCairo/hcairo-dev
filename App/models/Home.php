<?php
namespace Models;

use App\Database;
use PDO;

class Home {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchProjects() {
        $query = "SELECT * FROM projects LIMIT 2";
        $pdo = $this->db->getConnection()->prepare($query);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }
}