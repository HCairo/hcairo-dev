    // Script to handle header opacity on scroll / Script pour gérer l'opacité de l'en-tête au défilement
    window.onscroll = function() {
        const header = document.querySelector('header');
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