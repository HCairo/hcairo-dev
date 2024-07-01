<header>
    <div id="menu-container">
            <a id="logo" href="">Hugo Cairo</a>
        <nav id="menu-bar">
            <a href="projects">Projects</a>
            <a href="exp">Experiences</a>
            <a href="skills">Skills</a>
            <a href="contact">Contact</a>
            <a href="auth">Authentification</a>
        </nav>
    </div>
</header>
<script>
    window.onscroll = function() {
    var header = document.querySelector('header');
    if (window.scrollY > 180) {
        header.style.opacity = '0';
        header.style.transition = 'opacity 0.3s ease';
    } else {
        header.style.opacity = '1';
    }
    };
</script>