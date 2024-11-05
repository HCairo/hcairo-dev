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
        // Sanitize inputs
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $mail = htmlspecialchars($_POST['mail']);
        $phone = htmlspecialchars($_POST['phone']);
        $subject = htmlspecialchars($_POST['subject']);

        try {
            // Check for existing contact
            // Vérifier s'il existe déjà un contact
            $pdo = $this->db->getConnection()->prepare("SELECT * FROM contact WHERE firstname = ? AND lastname = ? AND mail = ? AND phone = ?");
            $pdo->execute([$firstname, $lastname, $mail, $phone]);
            $existingContact = $pdo->fetch(PDO::FETCH_ASSOC);

            if ($existingContact) {
                // Check if the last request was within the allowed interval
                // Vérifier si la dernière demande était dans l'intervalle autorisé
                $lastRequestTime = strtotime($existingContact['sent']);
                $currentTime = time();

                if (($currentTime - $lastRequestTime) < $this->requestInterval) {
                    echo "You have already submitted a request recently. Please try again later.";
                    // Vous avez déjà soumis une demande récemment. Veuillez réessayer plus tard.
                    return;
                }

                // Update existing contact
                // Mettre à jour le contact existant
                $updateQuery = $this->db->getConnection()->prepare("UPDATE contact SET subject = ?, sent = NOW() WHERE id = ?");
                $updateQuery->execute([$subject, $existingContact['id']]);
                echo "<h1>Contact request updated successfully</h1>";
                // Demande de contact mise à jour avec succès
            } else {
                // Insert new contact
                // Insérer un nouveau contact
                $insertQuery = $this->db->getConnection()->prepare("INSERT INTO contact (firstname, lastname, mail, phone, subject, sent) VALUES (?, ?, ?, ?, ?, NOW())");
                $insertQuery->execute([$firstname, $lastname, $mail, $phone, $subject]);
                echo "<h1>Contact request created successfully</h1>";
                // Demande de contact créée avec succès
            }

            header('Location: hcairodev.com'); // Redirect to a desired location
            // Redirection vers l'emplacement souhaité
            exit();
        } catch (\PDOException $e) {
            echo "Error while processing the contact request: " . $e->getMessage();
            // Erreur lors du traitement de la demande de contact
        }
    }
}