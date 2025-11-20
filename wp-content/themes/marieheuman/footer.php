<footer class="ml-20">
    <div class="flex flex-wrap gap-16 justify-between mb-12">
        <div>
            <img src="<?= get_template_directory_uri() ?>/assets/images/marie-heuman-architecte-interieur-tours-blois-logo-clair.png"
                alt="logo menu" class="logo-menu">
            <p>Architecte d'intérieur & designer global diplômée d'État</p>
            <p>Tours • Blois • Centre-Val de Loire • A distance</p>
            <?= wp_nav_menu([
                'theme_location' => 'reseaux'
            ]); ?>
        </div>
        <div>
            <h2>Navigation</h2>
            <?= wp_nav_menu([
                'theme_location' => 'navigation'
            ]); ?>
        </div>
        <div class="contact">
            <h2>Contact</h2>
            <ul>
                <li class="mail"><a href="mailto:contact@marieheuman.com">contact@marieheuman.com</a></li>
                <li class="tel"><a href="tel:+33661650745">+33 6 61 65 07 45</a></li>
                <li class="loca"><a href="https://maps.app.goo.gl/eZCNJZGNWfbiN7PBA" target="_blank"> Tours, France</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-wrap justify-between footer-bottom">
        <p>© 2025 Marie Heuman • Tous droits réservés.</p>
        <div class="flex flex-wrap gap-8">
            <a href="#">Mentions légales</a>
            <a href="#">Politique de confidentalité</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>