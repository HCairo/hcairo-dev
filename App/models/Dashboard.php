<?php
namespace Models;

use App\Database;
use PDO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Dashboard {
    protected $db;

    public function __construct() {
        $this->db = new Database(); // Initialise une nouvelle instance de Database
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Retrieve all projects from the database.
     *
     * @return array Array of projects as associative arrays
     */
    public function getProjects() {
        $q = 'SELECT * FROM projects';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieve a project by its ID from the database.
     *
     * @param int $id The ID of the project
     * @return array|null The project as an associative array or null if not found
     */
    public function getProjectById($id) {
        $pdo = $this->db->getConnection()->prepare('SELECT * FROM projects WHERE id = ?');
        $pdo->execute([$id]);
        return $pdo->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Create a new project in the database.
     */
    public function createProject() {
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $technology = htmlspecialchars($_POST['technology']);
        $link = htmlspecialchars($_POST['link']);

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/projects/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'hcairodev.com' . $uploadDir . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
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

    /**
     * Update an existing project in the database.
     */
    public function updateProject() {
        $id = htmlspecialchars($_POST['id']);
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $technology = htmlspecialchars($_POST['technology']);
        $link = htmlspecialchars($_POST['link']);

        // Fetch existing project details
        $existingProject = $this->getProjectById($id);
        $existingImgUrl = $existingProject['img_url'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/projects/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'http://hcairodev.com/' . $uploadFile; // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No new file uploaded, use existing image URL
            $imgUrl = $existingImgUrl;
        }

        $pdo = $this->db->getConnection()->prepare('UPDATE projects SET name = ?, description = ?, technology = ?, link = ?, img_url = ? WHERE id = ?');
        $pdo->execute([$name, $description, $technology, $link, $imgUrl, $id]);
        header('Location: ?action=dashboard&sub=dash_projects');
        exit();
    }

    /**
     * Delete a project from the database.
     *
     * @param int $id The ID of the project to delete
     */
    public function deleteProject($id) {
        $pdo = $this->db->getConnection()->prepare('DELETE FROM projects WHERE id = ?');
        $pdo->execute([$id]);
        header('Location: ?action=dashboard&sub=dash_projects');
        exit();
    }

    /**
     * Retrieve all experiences from the database.
     *
     * @return array Array of experiences as associative arrays
     */
    public function getExperiences() {
        $q = 'SELECT * FROM experiences';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieve an experience by its ID from the database.
     *
     * @param int $id The ID of the experience
     * @return array|null The experience as an associative array or null if not found
     */
    public function getExperienceById($id) {
        $pdo = $this->db->getConnection()->prepare('SELECT * FROM experiences WHERE id = ?');
        $pdo->execute([$id]);
        return $pdo->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Create a new experience in the database.
     */
    public function createExperience() {
        $company = htmlspecialchars($_POST['company']);
        $role = htmlspecialchars($_POST['role']);
        $description = htmlspecialchars($_POST['description']);
        $start_date = htmlspecialchars($_POST['start_date']);
        $end_date = htmlspecialchars($_POST['end_date']);

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/experiences/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'hcairodev.com' . $uploadDir . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
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

    /**
     * Update an existing experience in the database.
     */
    public function updateExperience() {
        $id = htmlspecialchars($_POST['id']);
        $company = htmlspecialchars($_POST['company']);
        $role = htmlspecialchars($_POST['role']);
        $description = htmlspecialchars($_POST['description']);
        $start_date = htmlspecialchars($_POST['start_date']);
        $end_date = htmlspecialchars($_POST['end_date']);

        // Fetch existing experience details
        $existingExperience = $this->getExperienceById($id);
        $existingImgUrl = $existingExperience['img_url'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/experiences/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'hcairodev.com' . $uploadFile; // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No new file uploaded, use existing image URL
            $imgUrl = $existingImgUrl;
        }

        $pdo = $this->db->getConnection()->prepare('UPDATE experiences SET company = ?, role = ?, description = ?, start_date = ?, end_date = ?, img_url = ? WHERE id = ?');
        $pdo->execute([$company, $role, $description, $start_date, $end_date, $imgUrl, $id]);
        header('Location: ?action=dashboard&sub=dash_exp');
        exit();
    }

    /**
     * Delete an experience from the database.
     *
     * @param int $id The ID of the experience to delete
     */
    public function deleteExperience($id) {
        $pdo = $this->db->getConnection()->prepare('DELETE FROM

 experiences WHERE id = ?');
        $pdo->execute([$id]);
        header('Location: ?action=dashboard&sub=dash_exp');
        exit();
    }

    /**
     * Retrieve all skills from the database.
     *
     * @return array Array of skills as associative arrays
     */
    public function getSkills() {
        $q = 'SELECT * FROM skills';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieve a skill by its ID from the database.
     *
     * @param int $id The ID of the skill
     * @return array|null The skill as an associative array or null if not found
     */
    public function getSkillById($id) {
        $pdo = $this->db->getConnection()->prepare('SELECT * FROM skills WHERE id = ?');
        $pdo->execute([$id]);
        return $pdo->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Create a new skill in the database.
     */
    public function createSkill() {
        $name = htmlspecialchars($_POST['name']);
        $level = htmlspecialchars($_POST['level']);

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/skills/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'hcairodev.com' . $uploadDir . basename($_FILES['img_url']['name']); // Adjust URL as per your server setup
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

    /**
     * Update an existing skill in the database.
     */
    public function updateSkill() {
        $id = htmlspecialchars($_POST['id']);
        $name = htmlspecialchars($_POST['name']);
        $level = htmlspecialchars($_POST['level']);

        // Fetch existing skill details
        $existingSkill = $this->getSkillById($id);
        $existingImgUrl = $existingSkill['img_url'];

        // Handle file upload
        if ($_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'assets/img/skills/'; // Adjust this path to your server setup
            $uploadFile = $uploadDir . basename($_FILES['img_url']['name']);

            // Move uploaded file to designated directory
            if (move_uploaded_file($_FILES['img_url']['tmp_name'], $uploadFile)) {
                // File uploaded successfully, now store its URL in the database
                $imgUrl = 'hcairodev.com' . $uploadFile; // Adjust URL as per your server setup
            } else {
                // Error in file upload
                echo "File upload failed.";
                exit;
            }
        } else {
            // No new file uploaded, use existing image URL
            $imgUrl = $existingImgUrl;
        }

        $pdo = $this->db->getConnection()->prepare('UPDATE skills SET name = ?, level = ?, img_url = ? WHERE id = ?');
        $pdo->execute([$name, $level, $imgUrl, $id]);
        header('Location: ?action=dashboard&sub=dash_skills');
        exit();
    }

    /**
     * Delete a skill from the database.
     *
     * @param int $id The ID of the skill to delete
     */
    public function deleteSkill($id) {
        $pdo = $this->db->getConnection()->prepare('DELETE FROM skills WHERE id = ?');
        $pdo->execute([$id]);
        header('Location: ?action=dashboard&sub=dash_skills');
        exit();
    }

    /**
     * Retrieve all contact requests from the database.
     *
     * @return array Array of contact requests as associative arrays
     */
    public function getContact() {
        $q = 'SELECT * FROM contact';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute();
        return $pdo->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Retrieve a contact request by its ID from the database.
     *
     * @param int $id The ID of the contact request
     * @return array|null The contact request as an associative array or null if not found
     */
    public function getContactById($id) {
        $q = 'SELECT * FROM contact WHERE id = ?';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute([$id]);
        return $pdo->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Confirm a contact request and send a confirmation email.
     *
     * @param int $id The ID of the contact request to confirm
     */
    public function confirmContact($id) {
        $id = $this->sanitizeInput($id);

        // Fetch the contact details from the database
        $q = 'SELECT lastname, firstname, mail FROM contact WHERE id = ?';
        $pdo = $this->db->getConnection()->prepare($q);
        $pdo->execute([$id]);
        $contact = $pdo->fetch(\PDO::FETCH_ASSOC);

        if ($contact) {
            $lname = $contact['lastname'];
            $fname = $contact['firstname'];
            $mailAddress = $contact['mail']; // Store email address separately

            // Update the received field
            $q = 'UPDATE contact SET received = "YES" WHERE id = ?';
            $pdo = $this->db->getConnection()->prepare($q);
            $pdo->execute([$id]);

            // Send the confirmation email using PHPMailer
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = $_ENV['MAIL_HOST'];
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV['MAIL_USER'];
                $mail->Password = $_ENV['MAIL_PSWD'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('no-reply@hcairodev.com', 'HCairo@Dev');
                $mail->addAddress($mailAddress, "$lname $fname"); // Add a recipient
                $mail->addReplyTo('no-reply@test.com', 'No Reply');

                //Content
                $mail->isHTML(false);
                $mail->Subject = 'Contact Confirmation';
                $mail->Body    = "Dear $lname $fname,\n\nYour contact request has been received. You will be contacted soon.\n\nBest regards,\nHCairo@Dev";

                $mail->send();
                echo "Confirmation email sent.";
            } catch (Exception $e) {
                echo "Failed to send confirmation email. Error: {$mail->ErrorInfo}";
            }
            header('Location: ?action=dashboard&sub=dash_contact');
            exit();
        } else {
            echo "Contact not found.";
        }
    }

    /**
     * Send a response email to a contact request.
     */
    public function sendResponseContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $mail = $_POST['mail'];
            $message = $_POST['message'];

            // Validate inputs
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                exit();
            }

            if (empty($message)) {
                echo "Message cannot be empty.";
                exit();
            }

            // Fetch contact details from the database
            $q = 'SELECT lastname, firstname, mail FROM contact WHERE id = ?';
            $pdo = $this->db->getConnection()->prepare($q);
            $pdo->execute([$id]);
            $contact = $pdo->fetch(\PDO::FETCH_ASSOC);

            if ($contact) {
                $lname = $contact['lastname'];
                $fname = $contact['firstname'];
                $mailAddress = $contact['mail'];

                try {
                    $mail = new PHPMailer(true);
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = $_ENV['MAIL_HOST'];
                    $mail->SMTPAuth = true;
                    $mail->Username = $_ENV['MAIL_USER'];
                    $mail->Password = $_ENV['MAIL_PSWD'];
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Recipients
                    $mail->setFrom('no-reply@hcairodev.com', 'HCairo Dev');
                    $mail->addAddress($mailAddress, "$lname $fname"); // Add recipient
                    $mail->addReplyTo('no-reply@hcairodev.com', 'No Reply');

                    // Content
                    $mail->isHTML(false);
                    $mail->Subject = 'Response to Your Contact Request';
                    $mail->Body    = "Dear $lname $fname,\n\n" . htmlspecialchars($message) . "\n\nBest regards,\nHCairo@Dev";

                    // Send email
                    $mail->send();
                    echo "Email sent successfully.";

                    // Redirect after sending email
                    header('Location: ?action=dashboard&sub=dash_contact');
                    exit();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Contact not found.";
            }
        }
    }

    public function deleteContactRequest($id) {
        $pdo = $this->db->getConnection()->prepare('DELETE FROM contact WHERE id = ?');
        $pdo->execute([$id]);
        header('Location: ?action=dashboard&sub=dash_contact');
        exit();
    }
}