<?php
/* Template Name: Page Contact */
get_header();
?>
<main class="ml-20" id="page-contact">
    <section class="header-content">
        <div class="container">
            <?php
            $header = get_field('header_content');
            ?>
            <h1><?= the_title() ?></h1>
            <?= $header['titre'] ?>
        </div>
    </section>
    <section class="decouverte">
        <div class="container">

            <?php
            $contact = get_field('page_contact')['appel'];
            ?>
            <span class="tag-home"><?= $contact['tag'] ?></span>
            <?= $contact['titre'] ?>
            <div class="flex justify-around gap-8">
                <?php
                // On boucle de 1 à 3 pour parcourir les champs numérotés manuellement
                for ($i = 1; $i <= 3; $i++) {
                    // 1. Définition de la clé dynamique (ex: 'icone_titre_1')
                    $groupe_icone = $contact['groupe_icone_titre']['icone_titre_' . $i];
                    // 2. Vérification de l'existence de la donnée pour éviter les erreurs PHP
                    if (isset($groupe_icone)) {

                        // Stockage de la classe de l'icône (ex: 'dashicons-phone')
                
                        // 3. Affichage sécurisé
                        ?>
                        <div class="content-icone-texte">
                            <span class="dashicons <?= esc_attr($groupe_icone['icone']); ?>"></span>
                            <div class="texte"><?= $groupe_icone['description'] ?></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- Début de widget en ligne Calendly -->
            <div class="calendly-inline-widget"
                data-url="https://calendly.com/marieheuman/appeldecouverte?hide_event_type_details=1&hide_gdpr_banner=1&text_color=462620&primary_color=462620"
                style="min-width:320px;height:700px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
            <!-- Fin de widget en ligne Calendly -->
        </div>
    </section>
    <section class="collaboration">
        <div class="container">

            <?php
            $collaboration = $contact["collaboration"];
            ?>
            <span class="tag-home"><?= $collaboration['tag'] ?></span>
            <?= $collaboration['titre'] ?>
            <div class="swiper-navigation">
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper contactSwiper">
                <div class="swiper-wrapper">
                    <?php
                    for ($i = 1; $i <= 3; $i++):
                        $bloc = $collaboration['groupe_collaboration']['collaboration_' . $i];
                        ?>
                        <div class="swiper-slide">
                            <div class="flex gap-4">

                                <span class="dashicons <?= $bloc['icone']; ?>"></span>
                                <div class="content">
                                    <h4><?= $bloc['titre'] ?></h4>
                                    <div class="infos"><?= $bloc['infos'] ?></div>
                                    <div class="texte"><?= $bloc['description'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="soutiens">
        <div class="container">
            <div class="content-soutiens">
                <?= $contact['soutiens'] ?>
            </div>
        </div>
    </section>
    <section class="reseaux">
        <div class="container">
            <span class="tag-home"><?= $contact['reseaux']['tag'] ?></span>
            <?= $contact['reseaux']['titre'] ?>
        </div>
    </section>
    <section class="faq">
        <div class="container">
            <span class="tag-home"><?= $contact['faq']['tag'] ?></span>
            <?= $contact['faq']['titre'] ?>
            <a href="<?= $contact['faq']['lien']['url'] ?>" class="more"><?= $contact['faq']['lien']['title'] ?></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>