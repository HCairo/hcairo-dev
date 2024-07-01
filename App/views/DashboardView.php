<?php
namespace Views;

class DashboardView {
    public function dashboardMenu() {
        // Display dashboard content here
        echo '<div id="dashboard-container">
                <nav id="menu-bar">
                    <a href="?action=dashboard">Dashboard</a>
                    <a href="?action=dashboard/projects">Projects</a>
                    <a href="?action=dashboard/exp">Experiences</a>
                    <a href="?action=dashboard/skills">Skills</a>
                    <a href="?action=dashboard/contact">Contact</a>
                    <a href="?action=logout">Log Out</a>
                </nav>
            </div>';
    }

    public function displayProjects($projects) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Projects List</h2>';
        foreach ($projects as $p) {
            echo '
            <div class="dash-container">
                <img class="dash-block-icon" src="' . htmlspecialchars($p['img_url']) . '" alt="Project Image">
                <div class="dash-block-details">
                    <h2>' . htmlspecialchars($p['name']) . '</h2>
                    <p>' . htmlspecialchars($p['description']) . '</p>
                    <p>' . htmlspecialchars($p['technology']) . '</p>
                    <p>' . htmlspecialchars($p['link']) . '</p>
                </div>
            </div>';
        }
    }

    public function displayExperiences($experiences) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Experiences List</h2>';
        foreach ($experiences as $e) {
            echo '
            <div class="dash-container">
                <img class="dash-block-icon" src="' . htmlspecialchars($e['img_url']) . '" alt="Project Image">
                <div class="dash-block-details">
                    <p>' . htmlspecialchars($e['company']) . '</p>
                    <p>' . htmlspecialchars($e['role']) . '</p>
                    <p>' . htmlspecialchars($e['description']) . '</p>
                    <p>' . htmlspecialchars($e['link']) . '</p>
                </div>
            </div>';
        }
    }

    public function displaySkills($skills) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Skills List</h2>';
        foreach ($skills as $s) {
            echo '
            <div class="dash-container">
                <img class="dash-block-icon" src="' . htmlspecialchars($e['img_url']) . '" alt="Project Image">
                <div class="dash-block-details">
                    <p>' . htmlspecialchars($e['name']) . '</p>
                    <p>' . htmlspecialchars($e['level']) . '</p>
                </div>
            </div>';
        }
    }
}