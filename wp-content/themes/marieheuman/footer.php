<!-- <div class="img-under-header-2"></div> -->

<footer class="footer-blue px-10 md:px-20">
    <div class="flex items-center justify-between py-15 border-b relative gap-4 flex-wrap lg:flex-nowrap">
        <h2>Design de <em>lieux</em>, d'<em>expérience</em> &
            d'<em>identités</em>.</h2>
        <div class="img-footer"></div>
    </div>

    <div class="py-20">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-12">
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
                <?= wp_nav_menu([
                    'theme_location' => 'for_who'
                ]); ?>
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
                <h3 class="mb-4">Suivre</h3>
                <?= wp_nav_menu([
                    'theme_location' => 'reseaux'
                ]); ?>
            </div>
            <div>
                <div>
                    <h3>RECEVOIR LA LETTRE</h3>
                    <p class="mb-6">Projets livrés, textes du journal, réflexions de studio. Sans spam.
                    </p>
                </div>
                <?= do_shortcode("[sibwp_form id=4]") ?>
                <p>Aucun partage avec des tiers. Désinscription en un clic.</p>
            </div>
        </div>
    </div>
    <div class="py-15 border-t flex justify-between credentials">
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