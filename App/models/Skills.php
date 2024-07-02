<?php
namespace Models;

use App\Database;
use PDO;

class Skills {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchSkills() {
        $q = 'SELECT * FROM skills';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }
}