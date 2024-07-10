<?php
namespace Models;

use App\Database;
use PDO;

class Experiences {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialise une nouvelle instance de Database
    }

    /**
     * Fetches all experiences from the database.
     *
     * @return array Array of experiences as associative arrays
     */
    public function fetchExperiences() {
        try {
            $query = "SELECT * FROM experiences";
            $pdo = $this->db->getConnection()->prepare($query);
            $pdo->execute();
            return $pdo->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle database connection or query execution errors
            error_log('Database error: ' . $e->getMessage());
            return []; // Return an empty array or handle error gracefully
        }
    }
}
?>