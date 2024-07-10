<?php
namespace Views;

class SkillsView {
    // Display all my projects
    // Afficher tous mes compétences
    public function renderView($skill) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Skills overview</h2>'; // Display a heading for skills overview / Affiche un titre pour l'aperçu des compétences
        foreach ($skill as $s) {
            echo '
            <div class="skill-container">
                <img class="skill-icon" src="' . $s['img_url'] . '" alt="Project Image">
                <div class="skill-details">
                    <h2>' . $s['name'] . '</h2>
                    <p>' . $s['level'] . '</p>
                </div>
            </div>
            <span class="skill-span"></span>'; // Display each skill with its icon, name, and level / Affiche chaque compétence avec son icône, son nom et son niveau
        }
    }
}
?>