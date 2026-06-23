<!-- <div class="img-under-header-2"></div> -->

<footer class="footer-blue">
    <div class="flex items-center justify-between px-[80px] py-20 border-b relative">
        <h2>Design de <em>lieux</em>, d'<em>expérience</em> &
            d'<em>identité</em>.</h2>
        <img src="<?= get_template_directory_uri() ?>/assets/images/marie-heuman-architecte-interieur-tours-blois-monogramme.png"
            alt="logo menu" class="logo-menu w-32 h-32">
    </div>

    <div class="px-[80px] py-20">
        <div class="grid grid-cols-5 gap-12">
            <div>
                <h3>LE STUDIO</h3>
                <p>Marie Heuman EI — Architecture d'intérieur & design global. Pour les lieux professionnels qui veulent
                    faire marque, et les projets résidentiels qui exigent vision d'ensemble. Studio basé en Val de
                    Loire, interventions en France.</p>
            </div>
            <div>
                <h3>Navigation</h3>
                <?= wp_nav_menu([
                    'theme_location' => 'navigation'
                ]); ?>
            </div>
            <div>
                <h3>Pour qui</h3>
            </div>
            <div class="contact">
                <h3>Contact</h3>
                <div class="space-y-3 mb-8 top-contact">
                    <a href="mailto:contact@marieheuman.com">
                        contact@marieheuman.com
                    </a>
                    <a href="tel:+33661650745">
                        +33 6 61 65 07 45
                    </a>
                    <p>
                        Studio à Tours · Atelier à Blois
                    </p>
                    <p>
                        Val de Loire — Interventions en France
                    </p>
                </div>
                <h3>Suivre</h3>
                <?= wp_nav_menu([
                    'theme_location' => 'reseaux'
                ]); ?>
            </div>
        </div>
    </div>
    <div class="px-[80px] py-[60px] border-t flex justify-between credentials">
        <p>© 2026 MARIE HEUMAN · TOUS DROITS RÉSERVÉS</p>
        <div class="flex gap-6">
            <a href="<?= get_permalink(733); ?>">Mentions légales</a>
            <a href="<?= get_permalink(714); ?>">Politique de
                confidentialité</a>
        </div>
    </div>
</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>

</html>