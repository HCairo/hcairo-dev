<?php
namespace Views;

class DashboardView {
    public function dashboardMenu() {
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
        echo '<h2 style="text-align: center; margin: 30px;">Projects List</h2>
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
            echo '<tr>
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

        echo '</tbody>
        </table>';
    }

    public function displayCreateProjectForm() {
        echo '<h2 style="text-align: center; margin: 30px;">Create a project</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_create_project" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" name="img_url" id="img_url">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="technology">Technology</label>
                <input type="text" name="technology" id="technology required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" name="link" id="link" required>
            </div>
            <button type="submit">Create Project</button>
        </form>';
    }  

    public function displayEditProjectForm($project) {
        echo '<a href="?action=dashboard&sub=dash_projects" style="text-align: center; margin: 30px; padding: 15px; border-radius:8px; background: #9368B7">←</a>
        <h2 style="text-align: center; margin: 30px;">Edit Project</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_update_project" method="post">
            <input type="hidden" name="id" value="' . htmlspecialchars($project['id']) . '">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="' . htmlspecialchars($project['name']) . '" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="technology">Technology</label>
                <input type="text" name="technology" id="technology" value="' . htmlspecialchars($project['technology']) . '" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" name="link" id="link" value="' . htmlspecialchars($project['link']) . '" required>
            </div>
            <button type="submit">Update Project</button>
        </form>';
    }    

    public function displayExperiences($experiences) {
        echo '<h2 style="text-align: center; margin: 30px;">Experiences List</h2>
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Company</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($experiences as $e) {
            echo '<tr>
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

        echo '</tbody>
        </table>';
    }

    public function displayCreateExperienceForm() {
        echo '<h2 style="text-align: center; margin: 30px;">Create an experience</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_create_experience" method="post">
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" name="img_url" id="img_url">
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company"required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role"required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date"required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date">
            </div>
            <button type="submit">Create Experience</button>
        </form>';
    }    

    public function displayEditExperienceForm($experience) {
        echo '<a href="?action=dashboard&sub=dash_exp" style="text-align: center; margin: 30px; padding: 15px; border-radius:8px; background: #9368B7">←</a>
        <h2 style="text-align: center; margin: 30px;">Edit Experience</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_update_experience" method="post">
            <input type="hidden" name="id" value="' . htmlspecialchars($experience['id']) . '">
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" value="' . htmlspecialchars($experience['company']) . '" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" value="' . htmlspecialchars($experience['role']) . '" required>
            </div>
             <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="' . htmlspecialchars($experience['start_date']) . '" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="' . htmlspecialchars($experience['end_date']) . '">
            </div>
            <button type="submit">Update Experience</button>
        </form>';
    }    

    public function displaySkills($skills) {
        echo '<h2 style="text-align: center; margin: 30px;">Skills List</h2>
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
            echo '<tr>
                <td><img class="dash-block-icon" src="' . htmlspecialchars($s['img_url']) . '" alt="Skill Image" width="50"></td>
                <td>' . htmlspecialchars($s['name']) . '</td>
                <td>' . htmlspecialchars($s['level']) . '</td>
                <td>
                    <a href="?action=dashboard&sub=dash_edit_skill&id=' . htmlspecialchars($s['id']) . '">Modify</a> | 
                    <a href="?action=dashboard&sub=dash_delete_skill&id=' . htmlspecialchars($s['id']) . '" onclick="return confirm(\'Are you sure you want to delete this skill?\')">Delete</a>
                </td>
            </tr>';
        }

        echo '</tbody>
        </table>';
    }

    public function displayCreateSkillForm() {
        echo '<h2 style="text-align: center; margin: 30px;">Create a skill</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_create_skill" method="post">
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" name="img_url" id="img_url">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" name="level" id="level" required>
            </div>
            <button type="submit">Create Skill</button>
        </form>';
    }  

    public function displayEditSkillForm($skill) {
        echo '<a href="?action=dashboard&sub=dash_skills" style="text-align: center; margin: 30px; padding: 15px; border-radius:8px; background: #9368B7">←</a>
        <h2 style="text-align: center; margin: 30px;">Edit Skill</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_update_skill" method="post">
            <input type="hidden" name="id" value="' . htmlspecialchars($skill['id']) . '">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="' . htmlspecialchars($skill['name']) . '" required>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" name="level" id="level" value="' . htmlspecialchars($skill['level']) . '" required>
            </div>
            <button type="submit">Update Skill</button>
        </form>';
    }    
}