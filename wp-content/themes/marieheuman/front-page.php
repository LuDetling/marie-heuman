<?php get_header(); ?>

<main class="md:ml-20 front-page">
    <!-- IMAGE HEADER -->
    <?php
    $image_header = get_field('image_header');
    $text_image_header = get_field('text_image_header');
    $lien_1_image_header = get_field('lien_1_image_header');
    $lien_2_image_header = get_field('lien_2_image_header');
    $logo_header = get_field('logo_header');

    if ($image_header): ?>
        <section class="content-img-header relative">
            <img src="<?= esc_url($image_header['url']); ?>" alt="<?= esc_attr($image_header['alt']); ?>"
                width="<?= esc_attr($image_header['width']); ?>" height="<?= esc_attr($image_header['height']); ?>">
            <div class="absolute md:left-30 z-2">
                <div class="text-img-header">
                    <?= $text_image_header; ?>
                    <div class="flex items-center gap-8 mt-12 flex-wrap">
                        <a href="<?= esc_url($lien_1_image_header['url']) ?>"
                            class="orange-button"><?= esc_html($lien_1_image_header['title']) ?></a>
                        <a href="<?= esc_url($lien_2_image_header['url']) ?>"
                            class="second-link"><?= esc_html($lien_2_image_header['title']) ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <div class="img-under-header-2"></div>
    <!-- END IMAGE HEADER -->

    <!-- MA VISION -->

    <?php
    $tag_ma_vision = get_field('tag_ma_vision');
    $titres_ma_vision = get_field('titres_ma_vision');
    $image_ma_vision = get_field('image_ma_vision');
    $texte_ma_vision = get_field('texte_ma_vision');
    $plus_ma_vision = get_field('plus_ma_vision');
    ?>

    <section class="content-ma-vision section-beige">
        <span class="tag-home"><?= $tag_ma_vision ?></span>
        <?= $titres_ma_vision ?>
        <div class="flex flex-wrap lg:flex-nowrap items-stretch gap-10 md:gap-20">
            <div class="image-ma-vision lg:w-4/10">
                <img src="<?= esc_url($image_ma_vision['url']); ?>" alt="<?= esc_attr($image_ma_vision['alt']); ?>"
                    width="<?= esc_attr($image_ma_vision['width']); ?>"
                    height="<?= esc_attr($image_ma_vision['height']); ?>">
            </div>
            <div class="texte-ma-vision lg:w-6/10">
                <?= $texte_ma_vision ?>
                <div class="mt-8">
                    <a href="<?= esc_url($plus_ma_vision['url']) ?>"
                        class="more"><?= esc_html($plus_ma_vision['title']) ?></a>
                </div>
            </div>
        </div>
    </section>
    <!-- END MA VISION -->



    <!-- SERIVCES -->
    <?php
    $tag_services_accueil = get_field('tag_services_accueil');
    $titres_services_accueil = get_field('titres_services_accueil');
    $lien_1_services_accueil = get_field('lien_1_services_accueil');
    $lien_2_services_accueil = get_field('lien_2_services_accueil');
    ?>
    <section class="content-services-accueil bg-grain section-white">
        <span class="tag-home"><?= $tag_services_accueil ?></span>
        <?= $titres_services_accueil ?>
        <div class="flex gap-4 selector-services flex-wrap">
            <?php
            for ($i = 1; $i <= 3; $i++) {

                $titre_service = get_field('titre_service_' . $i);
                ?>
                <div class="point">
                    <button
                        class="service-button border-marron-button<?= $i == 1 ? ' active-border-marron-button' : '' ?>"><?= $titre_service ?></button>
                </div>
            <?php } ?>
        </div>
        <?php
        for ($i = 1; $i <= 3; $i++) {
            $image_service = get_field('image_service_' . $i);
            $tag_service = get_field('tag_service_' . $i);
            $texte_service = get_field('texte_service_' . $i);
            $plus_service = get_field('plus_service_' . $i);
            ?>
            <div id="<?= "content-service-{$i}" ?>"
                class="flex flex-wrap lg:flex-nowrap item-service gap-10 md:gap-20<?= $i == 1 ? ' active-service' : '' ?>">
                <div class="lg:w-4/10 left-service">
                    <img src="<?= esc_url($image_service['url']); ?>" alt="<?= esc_attr($image_service['alt']); ?>"
                        width="<?= esc_attr($image_service['width']); ?>"
                        height="<?= esc_attr($image_service['height']); ?>">
                </div>
                <div class="lg:w-6/10 right-service">
                    <span class="tag"><?= $tag_service ?></span>
                    <?= $texte_service ?>
                    <div class="mt-8">
                        <a href="<?= esc_url($plus_service['url']) ?>"
                            class="more"><?= esc_html($plus_service['title']) ?></a>
                    </div>
                </div>
            </div>


        <?php } ?>

        <div class="flex gap-10 md:gap-20">
            <div class="lg:w-4/10 hidden lg:block" aria-hidden="true"></div>
            <div class="w-full lg:w-6/10 flex gap-8 mt-12 lg:ml-auto items-center flex-wrap">
                <a href="<?= esc_url($lien_1_services_accueil['url']) ?>"
                    class="orange-button"><?= esc_html($lien_1_services_accueil['title']) ?></a>
                <a href="<?= esc_url($lien_2_services_accueil['url']) ?>"
                    class="second-link-orange"><?= esc_html($lien_2_services_accueil['title']) ?></a>
            </div>
        </div>
    </section>
    <!-- END SERIVCES -->


    <!-- APPROCHE & PHILOSOPHIE -->
    <section class="content-approche section-beige">
        <?php
        $tag_approche_accueil = get_field('tag_approche_accueil');
        $titre_approche_accueil = get_field('titre_approche_accueil');
        $card_1_approche_accueil = get_field('card_1_approche_accueil');
        $card_2_approche_accueil = get_field('card_2_approche_accueil');
        $card_3_approche_accueil = get_field('card_3_approche_accueil');
        $card_4_approche_accueil = get_field('card_4_approche_accueil');
        ?>

        <span class="tag-home"><?= $tag_approche_accueil ?></span>
        <?= $titre_approche_accueil ?>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-20 items-start">
            <?php
            for ($i = 1; $i <= 4; $i++) {
                $card_approche_accueil = get_field('card_' . $i . '_approche_accueil');
                ?>
                <div class="card-approche">
                    <h4><?= $card_approche_accueil['titre_card_approche_accueil'] ?></h4>
                    <div class="tag-card"><?= $card_approche_accueil['tag_card_approche_accueil'] ?></div>
                    <div class="text-card">
                        <?= $card_approche_accueil['texte_card_approche_accueil'] ?>
                    </div>
                    <div class="list-hide-approche">
                        <?= $card_approche_accueil['liste_card_approche_accueil'] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="content-question-conception-accueil">
            <?php
            $question_conception_accueil = get_field("question_conception_accueil")
                ?>
            <h4><?= $question_conception_accueil['titre'] ?></h4>
            <div class="texte-question-conception">
                <?= $question_conception_accueil['texte'] ?>
            </div>
            <a href="<?= esc_url($question_conception_accueil['boutton']['url']) ?>"
                class="orange-button"><?= esc_html($question_conception_accueil['boutton']['title']) ?></a>
        </div>
    </section>
    <!-- END APPROCHE & PHILOSOPHIE -->


    <!-- BLOG -->
    <section class="content-blog-accueil section-white">
        <?php
        $tag_blog_accueil = get_field("tag_blog_accueil");
        $titre_blog_accueil = get_field("titre_blog_accueil");
        ?>

        <span class="tag-home"><?= $tag_blog_accueil ?></span>
        <?= $titre_blog_accueil ?>
        </div>
        <div class="swiper swiperHomeBlog">
            <div class="swiper-wrapper">
                <?php
                $posts = new WP_Query([
                    'post_type' => 'blog',
                    'posts_per_page' => 10,
                ]);
                if ($posts->have_posts()):
                    while ($posts->have_posts()):
                        $posts->the_post();
                        $blog = get_field("contenu_page_blog");
                        ?>
                        <div class="swiper-slide">
                            <article id="card-blog" class="projet-card carousel-item">
                                <div>
                                    <?php if ($blog['image']): ?>
                                        <img src="<?= esc_url($blog['image']['url']); ?>"
                                            alt="<?= esc_attr($blog['image']['alt']); ?>"
                                            width="<?= esc_attr($blog['image']['width']); ?>"
                                            height="<?= esc_attr($blog['image']['height']); ?>">
                                    <?php endif; ?>
                                    <div class="text-card">
                                        <h4><?php the_title(); ?></h4>
                                        <p class="blog-meta">
                                            <?= get_the_date('F o'); ?> •
                                            <?= $blog['temps_de_lecture'] ?> de lecture
                                        </p>

                                        <a href="<?php the_permalink(); ?>" class="more mt-4">Lire l'article</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
        <div class="flex gap-8 swiper-navigation justify-center items-center">
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>
    <!-- END BLOG -->

    <!-- RESSOURCES OFFERTES -->
    <section class="content-ro-accueil section-beige">
        <?php
        $tag_ressources_offertes_accueil = get_field('tag_ressources_offertes_accueil');
        $titre_ressources_offertes_accueil = get_field('titre_ressources_offertes_accueil');
        ?>
        <span class="tag-home"><?= $tag_ressources_offertes_accueil ?></span>
        <?= $titre_ressources_offertes_accueil ?>
        <div class="flex gap-10 md:gap-20 justify-between flex-wrap lg:flex-nowrap">
            <?php
            $fichier_ressources = get_field('fichiers_ressources_accueil');
            if ($fichier_ressources) {
                foreach ($fichier_ressources as $fichier) {
                    ?>
                    <div class="card-ro-accueil gap-4 sm:gap-8 flex w-full section-white flex-wrap sm:flex-nowrap">
                        <div class="content-card-ro-accueil">

                            <div class="flex gap-4 title-icon">
                                <h4><?= $fichier['titre'] ?></h4>
                            </div>

                            <div class="pages">
                                <?php
                                $pdf_path = get_attached_file($fichier['fichier']['ID']); // Récupère le chemin du fichier sur le serveur
                        
                                // Lire le contenu du PDF
                                $content = file_get_contents($pdf_path);

                                // Compter les occurrences de '/Page' dans le fichier
                                if ($content && $fichier['fichier']['subtype'] === 'pdf') {
                                    preg_match_all("/\/Page\W/", $content, $matches);
                                    $page_count = count($matches[0]);
                                    ?>
                                    <span><?= $page_count ?> pages</span>
                                    <?php
                                }
                                ?>
                                <span class="type-file">
                                    <?= $fichier['fichier']['subtype'] ?>
                                </span>
                            </div>
                            <p>
                                <?= $fichier['description'] ?>
                            </p>
                            <a href="<?= $fichier['fichier']['url'] ?>" class="more">
                                Téléchargez</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </section>
    <!-- END RESSOURCES OFFERTES -->
    <!-- CONTACT -->

    <section class="contact-accueil">
        <?php
        $tag_contact_accueil = get_field("tag_contact_accueil");
        $titre_contact_accueil = get_field("titre_contact_accueil");
        ?>
        <span class="tag-home"><?= $tag_contact_accueil ?></span>
        <?= $titre_contact_accueil ?>
        <div class="flex flex-wrap gap-10 md:gap-20 justify-center">
            <?php
            for ($i = 1; $i < 4; $i++) {
                $groupe_contact_accueil = get_field('groupe_' . $i . '_contact_accueil');
                ?>
                <div class="content-groupe-contact-accueil">
                    <?php if (!empty($groupe_contact_accueil['icone'])): ?>
                        <span class="dashicons <?= $groupe_contact_accueil['icone']; ?>"></span>
                    <?php endif; ?>
                    <h4>
                        <?= $groupe_contact_accueil['titre'] ?>
                    </h4>
                    <p class="description">
                        <?= $groupe_contact_accueil['description'] ?>
                    </p>
                </div>
            <?php }
            ?>
        </div>
        <!-- CALENDLY -->

        <div id="custom-booking-app" class="section-white">

            <div id="step-1" class="booking-step active">
                <div class="flex gap-4 justify-between header-form-calendly">
                    <div>
                        <a href="#custom-booking-app" id="previous-date" class="hidden">Précédentes dates</a>
                    </div>
                    <h4 class="step-title">Sélectionnez une date et une heure</h4>
                    <div>
                        <a href="#custom-booking-app" id="next-date">Prochaines dates</a>
                    </div>
                </div>
                <!-- Boucle sur calendar cards qui ouvre un accordeon -->
                <div class="calendar-cards">
                </div>

                <div class="action-area">
                    <div class="flex gap-4 justify-center">
                        <a id="go-to-step-2" href="#custom-booking-app" class="orange-button locked"
                            disabled>Suivant</a>

                    </div>
                    <p class="summary-text"></p>
                    <p class="call"></p>
                    <p class="error"></p>
                </div>
            </div>

            <div id="step-2" class="booking-step hidden">
                <form method="POST" class="form-calendly" id="form-calendly">
                    <div>
                        <label for="lastname" class="required">Nom</label>
                        <input id="lastname" name="lastname" type="text">
                    </div>
                    <div>
                        <label for="firstname" class="required">Prénom</label>
                        <input id="firstname" name="firstname" type="text">
                    </div>
                    <div>
                        <label for="email" class="required">Email</label>
                        <input id="email" name="email" type="text">
                    </div>
                    <div>
                        <label for="phone" class="required">Téléphone</label>
                        <input id="phone" name="phone" type="text">
                    </div>
                </form>

                <div class="action-area flex gap-10 md:gap-20 items-center flex-wrap md:flex-nowrap">
                    <div class="md:w-1/2 w-full">
                        <a id="back-to-step-1" href="#custom-booking-app" class="second-link-orange">Retour</a>
                    </div>
                    <div class="md:w-1/2 w-full">
                        <button class="orange-button" form="form-calendly">Envoyez votre demande</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CALENDLY -->
    </section>



    </section>

    <!-- END CONTACT -->

</main>

<?php get_footer(); ?>