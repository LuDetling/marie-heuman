<div class="img-under-header-2"></div>

<footer class="md:ml-20">
    <div class="flex flex-wrap gap-10 md:gap-20 justify-between mb-12">
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
                <li class="mail"><a href="mailto:contact@marieheuman.com"><svg xmlns="http://www.w3.org/2000/svg"
                            width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                            <path
                                d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z">
                            </path>
                        </svg>contact@marieheuman.com</a></li>
                <li class="tel"><a href="tel:+33661650745"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                            height="32" fill="#000000" viewBox="0 0 256 256">
                            <path
                                d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z">
                            </path>
                        </svg>+33 6 61 65 07 45</a></li>
                <li class="loca"><a href="https://maps.app.goo.gl/eZCNJZGNWfbiN7PBA" target="_blank"><svg
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                            viewBox="0 0 256 256">
                            <path
                                d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z">
                            </path>
                        </svg>Tours, France</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-wrap justify-between footer-bottom gap-4">
        <p>© 2025 Marie Heuman • Tous droits réservés.</p>
        <div class="flex flex-wrap gap-4">
            <a href="<?= get_permalink(get_page_by_path('mentions-legales')); ?>">Mentions légales</a>
            <a href="<?= get_permalink(get_page_by_path('politique-de-confidentialite')); ?>">Politique de
                confidentialité</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>