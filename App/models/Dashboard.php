<?php
namespace Models;

use App\Database;
use PDO;

class Dashboard {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getProjects() {
        $q = 'SELECT * FROM projects';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getProjectById($id) {
        $pdo = $this->db->getConnection()->prepare('SELECT * FROM projects WHERE id = ?');
        $pdo->execute([$id]);
        return $pdo->fetch(\PDO::FETCH_ASSOC);
    }

    public function createProject() {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $technology = $_POST['technology'];
        $link = $_POST['link'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/projects/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'http://localhost/hcairo@dev/' . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No file uploaded or other upload error handling
            $imgUrl = ''; // Default or existing image URL in case no new image is uploaded
        }

        $pdo = $this->db->getConnection()->prepare('INSERT INTO projects SET name = ?, description = ?, technology = ?, link = ?, img_url = ?');
        $pdo->execute([$name, $description, $technology, $link, $imgUrl]);
    }

    public function updateProject() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $technology = $_POST['technology'];
        $link = $_POST['link'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/projects/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'http://localhost/hcairo@dev/' . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No file uploaded or other upload error handling
            $imgUrl = ''; // Default or existing image URL in case no new image is uploaded
        }
        $pdo = $this->db->getConnection()->prepare('UPDATE projects SET name = ?, description = ?, technology = ?, link = ?, img_url = ? WHERE id = ?');
        $pdo->execute([$name, $description, $technology, $link, $imgUrl, $id]);
        header('Location: ?action=dashboard&sub=dash_projects');
        exit();
    }

    public function deleteProject($id) {
        $pdo = $this->db->getConnection()->prepare('DELETE FROM projects WHERE id = ?');
        $pdo->execute([$id]);
        header('Location: ?action=dashboard&sub=dash_projects');
        exit();
    }

    public function getExperiences() {
        $q = 'SELECT * FROM experiences';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getExperienceById($id) {
        $pdo = $this->db->getConnection()->prepare('SELECT * FROM experiences WHERE id = ?');
        $pdo->execute([$id]);
        return $pdo->fetch(\PDO::FETCH_ASSOC);
    }

    public function createExperience() {
        $company = $_POST['company'];
        $role = $_POST['role'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/experiences/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'http://localhost/hcairo@dev/' . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No file uploaded or other upload error handling
            $imgUrl = ''; // Default or existing image URL in case no new image is uploaded
        }
        $pdo = $this->db->getConnection()->prepare('INSERT INTO experiences SET company = ?, role = ?, description = ?, start_date = ?, end_date = ?, img_url = ?');
        $pdo->execute([$company, $role, $description, $start_date, $end_date, $imgUrl]);
    }

    public function updateExperience() {
        $id = $_POST['id'];
        $company = $_POST['company'];
        $role = $_POST['role'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/projects/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'http://localhost/hcairo@dev/' . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No file uploaded or other upload error handling
            $imgUrl = ''; // Default or existing image URL in case no new image is uploaded
        }
        $pdo = $this->db->getConnection()->prepare('UPDATE experiences SET company = ?, role = ?, description = ?, start_date = ?, end_date = ?, img_url = ? WHERE id = ?');
        $pdo->execute([$company, $role, $description, $start_date, $end_date, $imgUrl, $id]);
        header('Location: ?action=dashboard&sub=dash_exp');
        exit();
    }

    public function deleteExperience($id) {
        $pdo = $this->db->getConnection()->prepare('DELETE FROM experiences WHERE id = ?');
        $pdo->execute([$id]);
        header('Location: ?action=dashboard&sub=dash_exp');
        exit();
    }

    public function getSkills() {
        $q = 'SELECT * FROM skills';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getSkillById($id) {
        $pdo = $this->db->getConnection()->prepare('SELECT * FROM skills WHERE id = ?');
        $pdo->execute([$id]);
        return $pdo->fetch(\PDO::FETCH_ASSOC);
    }

    public function createSkill() {
        $name = $_POST['name'];
        $level = $_POST['level'];
        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/projects/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'http://localhost/hcairo@dev/' . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No file uploaded or other upload error handling
            $imgUrl = ''; // Default or existing image URL in case no new image is uploaded
        }
        $pdo = $this->db->getConnection()->prepare('INSERT INTO skills SET name = ?, level = ?, img_url = ?');
        $pdo->execute([$name, $level, $imgUrl]);
    }

    public function updateSkill() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $level = $_POST['level'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/projects/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'http://localhost/hcairo@dev/' . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No file uploaded or other upload error handling
            $imgUrl = ''; // Default or existing image URL in case no new image is uploaded
        }
        $pdo = $this->db->getConnection()->prepare('UPDATE skills SET name = ?, level = ?, img_url = ? WHERE id = ?');
        $pdo->execute([$name, $level, $imgUrl, $id]);
        header('Location: ?action=dashboard&sub=dash_skills');
        exit();
    }

    public function deleteSkill($id) {
        $pdo = $this->db->getConnection()->prepare('DELETE FROM skills WHERE id = ?');
        $pdo->execute([$id]);
        header('Location: ?action=dashboard&sub=dash_skills');
        exit();
    }    
}