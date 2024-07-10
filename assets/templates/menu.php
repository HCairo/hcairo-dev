<header>
    <div id="menu-container">
        <a id="logo" href="">Hugo Cairo</a> <!-- Site logo with link / Logo du site avec lien -->
        <div class="burger-menu">&#9776;</div> <!-- Burger menu icon / Icône du menu burger -->
        <nav id="menu-bar">
            <a href="projects">Projects</a> <!-- Link to projects page / Lien vers la page Projets -->
            <a href="exp">Experiences</a> <!-- Link to experiences page / Lien vers la page Expériences -->
            <a href="skills">Skills</a> <!-- Link to skills page / Lien vers la page Compétences -->
            <a href="contact">Contact</a> <!-- Link to contact page / Lien vers la page Contact -->
        </nav>
    </div>
</header>

<script>
    // Script to handle header opacity on scroll / Script pour gérer l'opacité de l'en-tête au défilement
    window.onscroll = function() {
        var header = document.querySelector('header');
        if (window.scrollY > 180) {
            header.style.opacity = '0';
            header.style.transition = 'opacity 0.3s ease';
        } else {
            header.style.opacity = '1';
        }
    };

    // Script to toggle burger menu and menu bar visibility / Script pour basculer la visibilité du menu burger et de la barre de menu
    document.querySelector('.burger-menu').addEventListener('click', function() {
        this.classList.toggle('active');
        document.querySelector('#menu-bar').classList.toggle('active');
    });
</script>
