<?php
namespace Views;

class ProjectsView {
    // Display all my projects
    // Afficher tous mes projets
    public function renderView($pro) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Projects overview</h2>'; // Display a heading for projects overview / Affiche un titre pour l'aperçu des projets
        foreach ($pro as $p) {
            echo '
            <div class="project-container" role="figure" aria-label="Projects Information">
                <img class="project-icon" src="' . $p['img_url'] . '" alt="Project Image">
                <div class="project-details">
                    <h2>' . $p['name'] . '</h2>
                    <p>' . $p['description'] . '</p>
                    <p>' . $p['technology'] . '</p>
                </div>
                <a class="project-link" href="' . $p['link'] . '">Quick Look</a>
            </div>
            <span class="project-span"></span>'; // Display each project with its icon, name, description, technology, and a link for quick look / Affiche chaque projet avec son icône, son nom, sa description, sa technologie et un lien pour un aperçu rapide
        }
    }
}
?>