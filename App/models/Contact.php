<?php
namespace Models;

use App\Database;
use PDO;

class Contact {
    private $db;
    private $requestInterval = 3600; // Time interval in seconds (1 hour)

    public function __construct() {
        $this->db = new Database();
    }

    public function saveContact() {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mail = $_POST['mail'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];

        try {
            // Check for existing contact
            $pdo = $this->db->getConnection()->prepare("SELECT * FROM contact WHERE firstname = ? AND lastname = ? AND mail = ? AND phone = ?");
            $pdo->execute([$firstname, $lastname, $mail, $phone]);
            $existingContact = $pdo->fetch(PDO::FETCH_ASSOC);

            if ($existingContact) {
                // Check if the last request was within the allowed interval
                $lastRequestTime = strtotime($existingContact['sent']);
                $currentTime = time();

                if (($currentTime - $lastRequestTime) < $this->requestInterval) {
                    echo "You have already submitted a request recently. Please try again later.";
                    return;
                }

                // Update existing contact
                $updateQuery = $this->db->getConnection()->prepare("UPDATE contact SET subject = ?, sent = NOW() WHERE id = ?");
                $updateQuery->execute([$subject, $existingContact['id']]);
                echo "<h1>Contact request updated successfully</h1>";
            } else {
                // Insert new contact
                $insertQuery = $this->db->getConnection()->prepare("INSERT INTO contact (firstname, lastname, mail, phone, subject, sent) VALUES (?, ?, ?, ?, ?, NOW())");
                $insertQuery->execute([$firstname, $lastname, $mail, $phone, $subject]);
                echo "<h1>Contact request created successfully</h1>";
            }

            header('Location: http://localhost/hcairo@dev/'); // Redirect to a desired location
            exit();
        } catch (\PDOException $e) {
            echo "Error while processing the contact request: " . $e->getMessage();
        }
    }
}
