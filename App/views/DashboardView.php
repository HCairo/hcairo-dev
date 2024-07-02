<?php
namespace Views;

class DashboardView {
    public function dashboardMenu() {
        // Display dashboard content here
        echo '<div id="dashboard-container">
                <nav id="menu-bar">
                    <a href="?action=dashboard">Dashboard</a>
                    <a href="?action=dashboard&sub=dash_projects">Projects</a>
                    <a href="?action=dashboard&sub=dash_exp">Experiences</a>
                    <a href="?action=dashboard&sub=dash_skills">Skills</a>
                    <a href="?action=dashboard&sub=dash_contact">Contact</a>
                    <a href="?action=dashboard&sub=dash_out">Log Out</a>
                </nav>
            </div>';
    }

    public function displayProjects($projects) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Projects List</h2>
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Technology</th>
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($projects as $p) {
            echo '
            <tr>
                <td><img class="dash-block-icon" src="' . htmlspecialchars($p['img_url']) . '" alt="Project Image" width="50"></td>
                <td>' . htmlspecialchars($p['name']) . '</td>
                <td>' . htmlspecialchars($p['description']) . '</td>
                <td>' . htmlspecialchars($p['technology']) . '</td>
                <td><a href="' . htmlspecialchars($p['link']) . '" target="_blank">' . htmlspecialchars($p['link']) . '</a></td>
                <td>
                    <a href="?action=dashboard&sub=dash_edit_project&id=' . htmlspecialchars($p['id']) . '">Modify</a> | 
                    <a href="?action=dashboard&sub=dash_delete_project&id=' . htmlspecialchars($p['id']) . '" onclick="return confirm(\'Are you sure you want to delete this project?\')">Delete</a>
                </td>
            </tr>';
        }

        echo '
            </tbody>
        </table>';
    }

    public function displayExperiences($experiences) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Experiences List</h2>
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Company</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>START</th>
                    <th>END</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($experiences as $e) {
            echo '
            <tr>
                <td><img class="dash-block-icon" src="' . htmlspecialchars($e['img_url']) . '" alt="Company Image" width="50"></td>
                <td>' . htmlspecialchars($e['company']) . '</td>
                <td>' . htmlspecialchars($e['role']) . '</td>
                <td>' . htmlspecialchars($e['description']) . '</td>
                <td>' . htmlspecialchars($e['start_date']) . '</td>
                <td>' . htmlspecialchars($e['end_date']) . '</td>
                <td>
                    <a href="?action=dashboard&sub=dash_edit_experience&id=' . htmlspecialchars($e['id']) . '">Modify</a> | 
                    <a href="?action=dashboard&sub=dash_delete_experience&id=' . htmlspecialchars($e['id']) . '" onclick="return confirm(\'Are you sure you want to delete this experience?\')">Delete</a>
                </td>
            </tr>';
        }

        echo '
            </tbody>
        </table>';
    }

    public function displaySkills($skills) {
        echo '
        <h2 style="text-align: center; margin: 30px;">Skills List</h2>
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($skills as $s) {
            echo '
            <tr>
                <td><img class="dash-block-icon" src="' . htmlspecialchars($s['img_url']) . '" alt="Skill Image" width="50"></td>
                <td>' . htmlspecialchars($s['name']) . '</td>
                <td>' . htmlspecialchars($s['level']) . '</td>
                <td>
                    <a href="?action=dashboard&sub=dash_edit_skill&id=' . htmlspecialchars($s['id']) . '">Modify</a> | 
                    <a href="?action=dashboard&sub=dash_delete_skill&id=' . htmlspecialchars($s['id']) . '" onclick="return confirm(\'Are you sure you want to delete this skill?\')">Delete</a>
                </td>
            </tr>';
        }

        echo '
            </tbody>
        </table>';
    }
}