<?php
namespace Models;

use App\Database;
use PDO;

class Authentification {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
}
?>