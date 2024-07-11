<?php
namespace Views;

class DashboardView {
    // Displays the dashboard menu
    // Affiche le menu du tableau de bord
    public function dashboardMenu() {
        echo '<div id="dashboard-container" role="menu" aria-label="Dashboard Menu">
                <nav id="menu-bar">
                    <a href="?action=dashboard&sub=dash_projects">Projects</a>
                    <a href="?action=dashboard&sub=dash_exp">Experiences</a>
                    <a href="?action=dashboard&sub=dash_skills">Skills</a>
                    <a href="?action=dashboard&sub=dash_contact">Contact</a>
                    <a href="?action=dashboard&sub=dash_out">Log Out</a>
                </nav>
            </div>';
    }

    // Displays a list of projects in a table format
    // Affiche une liste de projets sous forme de tableau
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

    // Displays a form to create a new project
    // Affiche un formulaire pour créer un nouveau projet
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
                <input type="text" name="technology" id="technology" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" name="link" id="link" required>
            </div>
            <button type="submit">Create Project</button>
        </form>';
    }

    // Displays a form to edit an existing project
    // Affiche un formulaire pour modifier un projet existant
    public function displayEditProjectForm($project) {
        echo '<a href="?action=dashboard&sub=dash_projects" style="text-align: center; margin: 30px; padding: 15px; border-radius:8px; background: #9368B7">←</a>
        <h2 style="text-align: center; margin: 30px;">Edit Project</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_update_project" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="' . htmlspecialchars($project['id']) . '">
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" name="img_url" id="img_url">
                <p> Current path to image : ' . htmlspecialchars($project['img_url']) . '<p>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="' . htmlspecialchars($project['name']) . '" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" value="' . htmlspecialchars($project['description']) . '" required>
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

    // Displays a list of experiences in a table format
    // Affiche une liste d'expériences sous forme de tableau
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

    // Displays a form to create a new experience
    // Affiche un formulaire pour créer une nouvelle expérience
    public function displayCreateExperienceForm() {
        echo '<h2 style="text-align: center; margin: 30px;">Create an experience</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_create_experience" method="post" enctype="multipart/form-data">
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

    // Displays a form to edit an existing experience
    // Affiche un formulaire pour modifier une expérience existante
    public function displayEditExperienceForm($experience) {
        echo '<a href="?action=dashboard&sub=dash_exp" style="text-align: center; margin: 30px; padding: 15px; border-radius:8px; background: #9368B7">←</a>
        <h2 style="text-align: center; margin: 30px;">Edit Experience</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_update_experience" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="' . htmlspecialchars($experience['id']) . '">
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" name="img_url" id="img_url">
                <p> Current path to image : ' . htmlspecialchars($experience['img_url']) . '<p>
            </div>
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
                <input type="text" name="description" id="description" value="' . htmlspecialchars($experience['description']) . '" required>
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

    // Displays a list of skills in a table format
    // Affiche une liste de compétences sous forme de tableau
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

    // Displays a form to create a new skill
    // Affiche un formulaire pour créer une nouvelle compétence
    public function displayCreateSkillForm() {
        echo '<h2 style="text-align: center; margin: 30px;">Create a skill</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_create_skill" method="post" enctype="multipart/form-data">
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
                <select name="level" id="level" required>
                    <option value="Decent">Decent</option>
                    <option value="Good">Good</option>
                    <option value="Pro">Pro</option>
                </select>
            </div>
            <button type="submit">Create Skill</button>
        </form>';
    }

    // Displays a form to edit an existing skill
    // Affiche un formulaire pour modifier une compétence existante
    public function displayEditSkillForm($skill) {
        echo '<a href="?action=dashboard&sub=dash_skills" style="text-align: center; margin: 30px; padding: 15px; border-radius:8px; background: #9368B7">←</a>
        <h2 style="text-align: center; margin: 30px;">Edit Skill</h2>
        <form class="dash-form" action="?action=dashboard&sub=dash_update_skill" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="' . htmlspecialchars($skill['id']) . '">
            <div class="form-group">
                <label for="img_url">Image</label>
                <input type="file" name="img_url" id="img_url">
                <p> Current path to image : ' . htmlspecialchars($skill['img_url']) . '<p>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="' . htmlspecialchars($skill['name']) . '" required>
            </div>
            <div class="form-group">
                <label>Current level : ' . htmlspecialchars($skill['level']) . '</label>
                <label for="level">Level</label>
                <select name="level" id="level" required>
                    <option value="Decent">Decent</option>
                    <option value="Good">Good</option>
                    <option value="Pro">Pro</option>
                </select>
            </div>
            <button type="submit">Update Skill</button>
        </form>';
    }

    // Displays a list of contact messages in a table format
    // Affiche une liste de messages de contact sous forme de tableau
    public function displayContact($contact) {
        echo '<h2 style="text-align: center; margin: 30px;">Contact Management</h2>
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Mail</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Sent</th>
                    <th>Received</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($contact as $c) {
            echo '<tr>
                <td>' . htmlspecialchars($c['firstname']) . '</td>
                <td>' . htmlspecialchars($c['lastname']) . '</td>
                <td>' . htmlspecialchars($c['mail']) . '</td>
                <td>' . htmlspecialchars($c['phone']) . '</td>
                <td>' . htmlspecialchars($c['subject']) . '</td>
                <td>' . htmlspecialchars($c['sent']) . '</td>
                <td>' . htmlspecialchars($c['received']) . '</td>
                <td>
                    <a href="?action=dashboard&sub=dash_confirm_contact&id=' . htmlspecialchars($c['id']) . '">Confirm reception</a> | 
                    <a href="?action=dashboard&sub=dash_answer_contact&id=' . htmlspecialchars($c['id']) . '">Answer to user</a>
                </td>
            </tr>';
        }

        echo '</tbody>
        </table>';
    }

    // Displays a form to respond to a contact message
    // Affiche un formulaire pour répondre à un message de contact
    public function displayContactForm($contact) {
        echo '<div class="contact-form-container">
            <h1>Contact Response</h1>
            <form method="POST" enctype="multipart/form-data" action="?action=dashboard&sub=dash_answer_contact" class="contact-form">
                <input type="hidden" name="id" value="' . htmlspecialchars($contact['id'], ENT_QUOTES, 'UTF-8') . '">
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" name="mail" id="mail" value="' . htmlspecialchars($contact['mail'], ENT_QUOTES, 'UTF-8') . '" readonly class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" placeholder="Enter your message here" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send to ' . htmlspecialchars($contact['lastname'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($contact['firstname'], ENT_QUOTES, 'UTF-8') . '</button>
            </form>
        </div>';
    }
}