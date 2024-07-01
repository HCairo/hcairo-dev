<?php
namespace Models;

use App\Database;
use PDO;

class Dashboard {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getExperiences() {
        $query = "SELECT * FROM experiences";
        $pdo = $this->db->getConnection()->prepare($query);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjects() {
        $query = "SELECT * FROM projects";
        $pdo = $this->db->getConnection()->prepare($query);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSkills() {
        $query = "SELECT * FROM skills";
        $pdo = $this->db->getConnection()->prepare($query);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }
}