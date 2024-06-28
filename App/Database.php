<?php
namespace App;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class Database {
    protected $cnx;
    protected $host;
    protected $db;
    protected $login;
    protected $pw;
    
    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_NAME'];
        $this->login = $_ENV['DB_USER'];
        $this->pw = $_ENV['DB_PASS'];

        try {
            $this->cnx = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->login, $this->pw);
            $this->cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    public function getConnection() {
        return $this->cnx;
    }
}
?>