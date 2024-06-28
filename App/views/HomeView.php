<?php
namespace Views;

class HomeView {
    // Display basic homepage + most recent projects.
    public function renderView($projects) {
        echo'
        <div id="speech">
            <h1>👋🏽 Hi there, I am Hugo Cairo</h1>
            <h2>Junior Developer Web & Mobile.</h2>
            <p>A 20-year-old junior developer skilled in languages like MySQL, PHP, and JavaScript. Also familliar with frameworks like Vue.js, React or Symfony. Bilingual in French and English, I\'m passionate about creating innovative web and mobile solutions.</p>
            <p>Here to create bests websites and apps that you\'ve ever seen. Checkout my recent projects, my experiences and skills. If you\'re still reluctant, contact me.</p>
            <a id="contact-home" href="contact">Contact me </a>
        </div>
        <span id="speech-span"></span>';
        ?>
        <h2 style="text-align: center; margin: 30px;">Recent projects</h2>
        <?php foreach ($projects as $p): ?>
            <div class="project-container">
                <img class="project-icon" src="<?= htmlspecialchars($p['img_url']) ?>" alt="Project Image">
                <div class="project-details">
                    <h2><?= htmlspecialchars($p['name']) ?></h2>
                    <p><?= htmlspecialchars($p['description']) ?></p>
                    <p><?= htmlspecialchars($p['technology']) ?></p>
                </div>
                <a class="project-link" href="<?= htmlspecialchars($p['link']) ?>">Quick Look</a>
            </div>
            <span class="project-span"></span>
        <?php endforeach;
        echo'
        <a class="more-project" href="projects">More projects</a>';
    }
}