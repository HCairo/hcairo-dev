<?php
namespace Views;

class HomeView {
    // Display basic homepage + most recent projects.
    // Affiche la page d'accueil de base + les projets les plus récents.
    public function renderView($projects) {
        echo'
        <div id="speech" role="paragraph" aria-label="Information about me">
            <h1>👋🏽 Hi there, I am Hugo Cairo</h1>
            <h2>Developer Web & Mobile.</h2>
            <p>A 20-year-old developer skilled in languages like MySQL, PHP, and JavaScript. Also familliar with frameworks like Vue.js, React or Symfony. Bilingual in French and English, I\'m passionate about creating innovative web and mobile solutions.</p>
            <p>Here to create bests websites and apps that you\'ve ever seen. Checkout my recent projects, my experiences and skills. If you\'re still reluctant, contact me.</p>
            <a id="contact-home" href="contact">Contact me </a>
        </div>
        <span id="speech-span"></span>';
        ?>
        <h2 style="text-align: center; margin: 30px;">Recent projects</h2>
        <?php foreach ($projects as $p): ?>
            <div class="project-container" role="figure" aria-label="Projects Information">
                <img class="project-icon" src="<?= $p['img_url'] ?>" alt="Project Image">
                <div class="project-details">
                    <h2><?= $p['name'] ?></h2>
                    <p><?= $p['description'] ?></p>
                    <p><?= $p['technology'] ?></p>
                </div>
                <a class="project-link" href="<?= $p['link'] ?>">Quick Look</a>
            </div>
            <span class="project-span"></span>
        <?php endforeach;
        echo'
        <a class="more-project" href="projects">More projects</a>';
    }
}
?>