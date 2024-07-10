<?php
namespace Models;

use App\Database;
use PDO;
use PDOException; // Import PDOException for error handling

class Skills {
    protected $db;

    public function __construct() {
        $this->db = new Database(); // Initialise une nouvelle instance de Database
    }

    /**
     * Fetch all skills from the database.
     *
     * @return array Array of skills as associative arrays
     */
    public function fetchSkills() {
        try {
            $query = 'SELECT * FROM skills';
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