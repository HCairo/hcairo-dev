<?php
namespace Models;

use App\Database;
use PDO;

class Home {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialise une nouvelle instance de Database
    }

    /**
     * Fetches a limited number of projects from the database.
     *
     * @return array Array of projects as associative arrays
     */
    public function fetchProjects() {
        $query = "SELECT * FROM projects LIMIT 2";
        $pdo = $this->db->getConnection()->prepare($query);
        $pdo->execute();
        return $pdo->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>