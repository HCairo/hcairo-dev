<?php
namespace Views;

class ExpView {
    public function renderView($exp) {
        echo '
        <h2 style="text-align: center; margin: 30px;">My Experiences</h2>';
        foreach ($exp as $e) {
            echo '
            <div class="experiences-container">
                <img class="experiences-icon" src="' . htmlspecialchars($e['img_url']) . '" alt="Experience Image">
                <div class="experiences-details">
                    <h3>' . htmlspecialchars($e['role']) . '</h3>
                    <p>' . htmlspecialchars($e['company']) . '</p>
                    <p>' . htmlspecialchars($e['start_date']) . ' / ' . htmlspecialchars($e['end_date']) .'</p>
                    <p>' . htmlspecialchars($e['description']) . '</p>
                </div>
            </div>';
        }
    }
}
