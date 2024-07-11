<?php
namespace Views;

class ExpView {
    // Display all experiences
    // Affiche toutes les expériences
    public function renderView($exp) {
        echo '
        <h2 style="text-align: center; margin: 30px;">My Experiences</h2>';
        foreach ($exp as $e) {
            echo '
            <div class="experiences-container" role="figure" aria-label="Experience Information">
                <img class="experiences-icon" src="' . $e['img_url'] . '" alt="Experience Image">
                <div class="experiences-details">
                    <h3>' . $e['role'] . '</h3>
                    <p>' . $e['company'] . '</p>
                    <p>' . $e['start_date'] . ' / ' . $e['end_date'] .'</p>
                    <p>' . $e['description'] . '</p>
                </div>
            </div>';
        }
    }
}
?>