<?php
namespace Views;

class ProjectsView {
    // Display all my projects
    public function renderView($pro) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Projects overview</h2>';
        foreach ($pro as $p) {
            echo '
            <div class="project-container">
                <img class="project-icon" src="' . htmlspecialchars($p['img_url']) . '" alt="Project Image">
                <div class="project-details">
                    <h2>' . htmlspecialchars($p['name']) . '</h2>
                    <p>' . htmlspecialchars($p['description']) . '</p>
                    <p>' . htmlspecialchars($p['technology']) . '</p>
                </div>
                <a class="project-link" href="' . htmlspecialchars($p['link']) . '">Quick Look</a>
            </div>
            <span class="project-span"></span>';
        }
    }
}