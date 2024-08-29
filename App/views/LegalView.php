<?php
namespace Views;

class LegalView {
    // Affiche la page d'accueil de base + les projets les plus récents.
    public function renderView() {
        ?>
            <div class="legal-container">
                <h1>Mentions Légales</h1>
                
                <section class="section legal-section">
                    <h2>Identité du Propriétaire</h2>
                    <p>
                        <?php 
                        // Variables dynamiques pour ajuster les informations
                        $nom = "H. Cairo"; 
                        $adresse = "71 Chemin de Chateau Blanc, 38390 Porcieu-Amblagnieu, France";
                        $email = "hugo.cairoh@gmail.com";
                        $telephone = "+33 6 44 28 35 81";
                        
                        echo "Nom: " . $nom . "<br>";
                        echo "Adresse: " . $adresse . "<br>";
                        echo "Contact: " . $email . " / " . $telephone;
                        ?>
                    </p>
                </section>

                <section class="section legal-section">
                    <h2>Hébergement</h2>
                    <p>
                        <?php 
                        $hebergeur = "OVH";
                        $adresseHebergeur = "2 Rue Kellermann, 59100 Roubaix, France";
                        $contactHebergeur = "+33 9 72 10 10 07";

                        echo "Hébergeur: " . $hebergeur . "<br>";
                        echo "Adresse: " . $adresseHebergeur . "<br>";
                        echo "Contact: " . $contactHebergeur;
                        ?>
                    </p>
                </section>

                <section class="section legal-section">
                    <h2>Responsabilité</h2>
                    <p>
                        <?php 
                        echo "Le propriétaire du site, " . $nom . ", s'efforce de fournir des informations exactes et mises à jour régulièrement. Toutefois, " . $nom . " ne peut être tenu responsable d'éventuelles erreurs ou omissions dans le contenu.";
                        ?>
                    </p>
                </section>

                <hr>

                <header>
                    <h1>Politique de Confidentialité</h1>
                </header>

                <section class="section legal-section">
                    <h2>Collecte de Données</h2>
                    <p>
                        Ce site peut collecter des données personnelles, telles que :
                        <ul>
                            <li>Nom et prénom</li>
                            <li>Adresse email</li>
                            <li>Cookies pour les statistiques de visite</li>
                        </ul>
                    </p>
                    <p>Ces données sont collectées uniquement dans le but d'améliorer l'expérience utilisateur et de faciliter les échanges avec les visiteurs.</p>
                </section>

                <section class="section legal-section">
                    <h2>Utilisation des Données</h2>
                    <p>
                        Les données collectées sont utilisées dans le cadre des finalités suivantes :
                        <ul>
                            <li>Amélioration du site via les statistiques (Google Analytics, par exemple)</li>
                            <li>Envoi de newsletters (si l'utilisateur s'est inscrit)</li>
                            <li>Contact direct avec l'utilisateur en cas de demande spécifique</li>
                        </ul>
                    </p>
                </section>

                <section class="section legal-section">
                    <h2>Conservation des Données</h2>
                    <p>
                        Les données sont conservées pour une durée limitée. Par exemple, les cookies sont conservés pendant une durée maximale de 13 mois, conformément à la législation européenne. Les utilisateurs peuvent demander la suppression de leurs données à tout moment.
                    </p>
                </section>

                <section class="section legal-section">
                    <h2>Droits des Utilisateurs</h2>
                    <p>
                        Conformément à la législation en vigueur, les utilisateurs disposent des droits suivants :
                        <ul>
                            <li>Droit d'accès aux données personnelles</li>
                            <li>Droit de rectification ou de suppression des données</li>
                            <li>Droit d'opposition à l'utilisation des données</li>
                        </ul>
                    </p>
                    <p>Pour exercer ces droits, merci de nous contacter à : <?php echo $email; ?></p>
                </section>
            </div>
        <?php
    }
}
