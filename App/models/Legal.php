<?php
namespace Models;

use App\Database;
use PDO;

class Legal {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Initialise une nouvelle instance de Database
    }
}