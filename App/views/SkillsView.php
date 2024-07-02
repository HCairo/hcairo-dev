<?php
namespace Views;

class SkillsView {
    // Display all my projects
    public function renderView($skill) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Skills overview</h2>';
        foreach ($skill as $s) {
            echo '
            <div class="skill-container">
                <img class="skill-icon" src="' . htmlspecialchars($s['img_url']) . '" alt="Project Image">
                <div class="skill-details">
                    <h2>' . htmlspecialchars($s['name']) . '</h2>
                    <p>' . htmlspecialchars($s['level']) . '</p>
                </div>
            </div>
            <span class="skill-span"></span>';
        }
    }
}